<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortalNews;
use App\Models\PortalCulture;
use App\Models\Agenda;
use App\Models\RegulasiDokumen;
use App\Models\MonevStat;
use App\Models\PortalService;

class PortalController extends Controller
{
    public function index()
    {
        // Seed default data if empty
        if (PortalNews::count() === 0) {
            $this->seedDefaults();
        }

        $newsData = PortalNews::orderBy('created_at', 'desc')->get()->map(function ($news) {
            return [
                'id' => $news->id,
                'title' => $news->title,
                'category' => $news->category,
                'date' => $news->date,
                'readTime' => $news->read_time,
                'image' => $news->image,
                'summary' => $news->summary,
                'content' => $news->content,
                'is_featured' => $news->is_featured
            ];
        });

        $cultureData = PortalCulture::orderBy('created_at', 'desc')->get()->map(function ($c) {
            return [
                'id' => 'c' . $c->id,
                'title' => $c->title,
                'type' => $c->type,
                'location' => $c->location,
                'image' => $c->image,
                'desc' => $c->desc
            ];
        });

        $slides = PortalNews::where('is_featured', true)
            ->orderByRaw('CASE WHEN id = 1 THEN 0 ELSE 1 END')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($s) {
                return [
                    'id' => $s->id,
                    'title' => $s->title,
                    'tag' => 'Program Unggulan',
                    'desc' => $s->summary,
                    'img' => $s->image,
                    'date' => $s->date
                ];
            });
        
        // If no featured, just take top 3
        if($slides->isEmpty()){
             $slides = PortalNews::take(3)->get()->map(function ($s) {
                return [
                    'id' => $s->id,
                    'title' => $s->title,
                    'tag' => 'Info Terkini',
                    'desc' => $s->summary,
                    'img' => $s->image,
                    'date' => $s->date
                ];
            });
        }

        $sideAnnouncements = PortalNews::whereIn('title', [
            'Petunjuk Teknis PPDB SMA/SMK Negeri Se-Provinsi Maluku TA 2026/2027',
            'Inventarisasi Karya Budaya Takbenda Kepulauan Banda & Seram',
            'Pengumuman Peserta Tunjangan Profesi Guru (TPG) Triwulan III'
        ])->orderByRaw("FIELD(title, 
            'Petunjuk Teknis PPDB SMA/SMK Negeri Se-Provinsi Maluku TA 2026/2027', 
            'Inventarisasi Karya Budaya Takbenda Kepulauan Banda & Seram', 
            'Pengumuman Peserta Tunjangan Profesi Guru (TPG) Triwulan III')")
        ->get();

        if ($sideAnnouncements->count() < 3) {
            $existingIds = $sideAnnouncements->pluck('id')->toArray();
            $more = PortalNews::whereNotIn('id', $existingIds)
                ->where(function ($q) {
                    $q->where('category', 'like', '%ppdb%')
                      ->orWhere('category', 'like', '%kebudayaan%')
                      ->orWhere('category', 'like', '%guru%')
                      ->orWhere('category', 'like', '%pengumuman%');
                })
                ->orderBy('created_at', 'desc')
                ->take(3 - $sideAnnouncements->count())
                ->get();
            $sideAnnouncements = $sideAnnouncements->concat($more);
        }

        if ($sideAnnouncements->isEmpty()) {
            $sideAnnouncements = PortalNews::orderBy('created_at', 'desc')->take(3)->get();
        }

        $agendas = Agenda::orderBy('date', 'asc')->where('date', '>=', now()->startOfDay())->take(6)->get();
        if ($agendas->isEmpty()) {
            $agendas = Agenda::orderBy('date', 'desc')->take(6)->get();
        }
        $dokumens = RegulasiDokumen::where('is_active', true)->orderBy('no', 'asc')->get();
        if ($dokumens->isEmpty()) {
            $dokumens = RegulasiDokumen::orderBy('no', 'asc')->get();
        }

        $monevStats = MonevStat::first();

        $services = PortalService::where('is_active', true)->orderBy('order', 'asc')->get();
        if ($services->isEmpty()) {
            $services = PortalService::orderBy('order', 'asc')->get();
        }

        return view('portal-resmi', compact('newsData', 'cultureData', 'slides', 'sideAnnouncements', 'agendas', 'dokumens', 'monevStats', 'services'));
    }

    public function storeNews(Request $request)
    {
        $imagePath = $request->image;
        if ($request->hasFile('image')) {
            $request->validate(['image' => 'file|max:5120']); // 5 MB max
            $path = $request->file('image')->store('portal', 'public');
            $imagePath = '/storage/' . $path;
        }

        $news = PortalNews::create([
            'title' => $request->title,
            'category' => $request->category,
            'date' => $request->date ?? date('d M Y'),
            'read_time' => $request->read_time ?? '3 mnt baca',
            'image' => $imagePath,
            'summary' => $request->summary,
            'content' => $request->content,
            'is_featured' => $request->boolean('is_featured')
        ]);
        return response()->json(['success' => true, 'data' => $news]);
    }

    public function destroyNews($id)
    {
        PortalNews::destroy($id);
        return response()->json(['success' => true]);
    }

    public function storeCulture(Request $request)
    {
        $imagePath = $request->image;
        if ($request->hasFile('image')) {
            $request->validate(['image' => 'file|max:5120']); // 5 MB max
            $path = $request->file('image')->store('portal', 'public');
            $imagePath = '/storage/' . $path;
        }

        $culture = PortalCulture::create([
            'title' => $request->title,
            'type' => $request->type,
            'location' => $request->location,
            'image' => $imagePath,
            'desc' => $request->desc
        ]);
        return response()->json(['success' => true, 'data' => $culture]);
    }

    public function destroyCulture($id)
    {
        $id = str_replace('c', '', $id);
        PortalCulture::destroy($id);
        return response()->json(['success' => true]);
    }

    private function seedDefaults()
    {
        PortalNews::insert([
            [
                'title' => 'Peluncuran Program Beasiswa Maluku Cerdas 2026 Untuk 1.500 Student Daerah',
                'category' => 'beasiswa',
                'date' => '22 Ags 2026',
                'read_time' => '4 mnt baca',
                'image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=800&q=80',
                'summary' => 'Pemerintah Provinsi Maluku melalui Dinas Pendidikan resmi membuka pendaftaran bantuan biaya pendidikan untuk jenjang SMA/SMK dan Mahasiswa.',
                'content' => '<p class="mb-4">Dinas Pendidikan dan Kebudayaan Provinsi Maluku secara resmi meluncurkan program <strong>Beasiswa Maluku Cerdas 2026</strong>. Program prioritas ini menargetkan sebanyak 1.500 penerima manfaat yang terdiri dari siswa SMA/SMK kurang mampu dan berprestasi, serta mahasiswa asal Maluku yang menempuh pendidikan perguruan tinggi.</p>',
                'is_featured' => true,
            ],
            [
                'title' => 'Digitalisasi Sekolah di Wilayah 3T: Disdikbud Salurkan 5.000 Unit Tablet Pembelajaran',
                'category' => 'pendidikan',
                'date' => '20 Ags 2026',
                'read_time' => '3 mnt baca',
                'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=800&q=80',
                'summary' => 'Upaya pemerataan akses pendidikan digital dilakukan dengan menyalurkan perangkat tablet edukasi ke pulau-pulau terpencil di Maluku.',
                'content' => '<p class="mb-4">Guna mempercepat digitalisasi pendidikan di kepulauan, Dinas Pendidikan dan Kebudayaan Provinsi Maluku mulai mendistribusikan 5.000 unit perangkat peranti pintar (tablet) ke berbagai sekolah di Kabupaten Maluku Barat Daya, Kepulauan Aru, dan Buru Selatan.</p>',
                'is_featured' => true,
            ],
            [
                'title' => 'Festival Budaya Negeri Raja-Raja 2026 Siap Digelar di Kota Ambon',
                'category' => 'kebudayaan',
                'date' => '18 Ags 2026',
                'read_time' => '5 mnt baca',
                'image' => 'https://images.unsplash.com/photo-1533105079780-92b9be482077?auto=format&fit=crop&w=800&q=80',
                'summary' => 'Ajang tahunan pameran kebudayaan, seni tari tradisional, dan pameran cagar budaya akan menghadirkan kontingen dari 11 Kabupaten/Kota.',
                'content' => '<p class="mb-4">Pemerintah Provinsi Maluku melalui Bidang Kebudayaan kembali menggelar Festival Budaya Negeri Raja-Raja. Acara ini merupakan ajang konsolidasi budaya terbesar yang mempertemukan para seniman, maestro tradisi, dan komunitas adat se-Maluku.</p>',
                'is_featured' => true,
            ]
        ]);

        PortalCulture::insert([
            [
                'title' => 'Tari Cakalang & Bambu Gila',
                'type' => 'tarian',
                'location' => 'Maluku Tengah & Ambon',
                'image' => 'https://images.unsplash.com/photo-1543007630-9710e4a00a20?auto=format&fit=crop&w=600&q=80',
                'desc' => 'Tarian khas Maluku yang menggambarkan kegagahan, spiritualitas, serta semangat gotong royong masyarakat nelayan.'
            ],
            [
                'title' => 'Benteng Belgica Banda Neira',
                'type' => 'cagar',
                'location' => 'Kepulauan Banda',
                'image' => 'https://images.unsplash.com/photo-1596402184320-417e7178b2cd?auto=format&fit=crop&w=600&q=80',
                'desc' => 'Benteng bersejarah peninggalan abad ke-17 bernilai arsitektur unik berbentuk pentagon di tengah kepulauan rempah.'
            ],
            [
                'title' => 'Alat Musik Tifa & Totobuang',
                'type' => 'musik',
                'location' => 'Seluruh Wilayah Maluku',
                'image' => 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&w=600&q=80',
                'desc' => 'Instrumen musik pukul tradisional yang mengiringi tarian, prosesi adat upacara pela gandong, dan acara kenegaraan.'
            ]
        ]);
    }
}

