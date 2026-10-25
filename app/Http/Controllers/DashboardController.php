<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Complaint;
use App\Models\MonevStat;
use App\Models\MonevRegion;
use App\Models\HeroSlide;
use App\Models\HeroSetting;
use App\Models\FeaturedProgram;
use App\Models\RegulasiDokumen;
use App\Models\TransparansiPoster;
use App\Models\Gallery;
use App\Models\SocialMedia;
use App\Models\PortalNews;
use App\Models\PortalCulture;
use App\Models\PortalService;
use App\Models\Agenda;
use App\Models\VisiMisi;
use App\Models\TugasFungsi;
use App\Models\StrukturOrganisasi;
use App\Models\LayananSop;
use App\Models\LayananSopSubmission;
use App\Models\BannerIklan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita = Post::where('type', '!=', 'Pengumuman')->count();
        $totalPengumuman = Post::where('type', 'Pengumuman')->count();
        $activePengumuman = Post::where('type', 'Pengumuman')->where('status', 'Published')->count();
        
        $newComplaints = Complaint::count();
        $unprocessedComplaints = Complaint::where('status', 'Menunggu Respon')->count();

        $totalPpid = \App\Models\PpidRequest::count();
        $unprocessedPpid = \App\Models\PpidRequest::where('status', 'Menunggu Review')->count();

        $recentPosts = Post::orderBy('created_at', 'desc')->take(5)->get();
        $recentComplaints = Complaint::orderBy('created_at', 'desc')->take(3)->get();
        $recentPpid = \App\Models\PpidRequest::orderBy('created_at', 'desc')->take(3)->get();
        
        $todayVisitors = \App\Models\Visitor::where('date', \Carbon\Carbon::today()->toDateString())->count();
        $totalVisitors = \App\Models\Visitor::count();

        return view('dashboard', compact(
            'totalBerita', 'totalPengumuman', 'activePengumuman',
            'newComplaints', 'unprocessedComplaints',
            'totalPpid', 'unprocessedPpid',
            'recentPosts', 'recentComplaints', 'recentPpid',
            'todayVisitors', 'totalVisitors'
        ));
    }

    public function hero()
    {
        $heroSetting = HeroSetting::first();
        if (!$heroSetting) {
            $heroSetting = HeroSetting::create([
                'campaign_badge' => 'Dinas Pendidikan & kebudayaan Prov. Maluku',
                'title' => 'Mewujudkan Pendidikan Berkualitas & Merata di Bumi Raja-Raja.',
                'title_highlight' => 'Berkualitas & Merata',
                'description' => 'Portal resmi informasi pendidikan, kebudayaan, pelayanan publik, dan transparansi anggaran Dinas Pendidikan dan Kebudayaan Provinsi Maluku.',
                'btn1_text' => 'Layanan Digital',
                'btn1_url' => '#layanan',
                'btn2_text' => 'Transparansi Publik',
                'btn2_url' => '#transparansi',
                'kadis_name' => 'Dr. Sarlota Singerin, S.Pd., M.Pd',
                'kadis_position' => 'Kepala Dinas Pendidikan & Kebudayaan',
                'kadis_photo' => '/images/kadin-sarlota.webp',
                'kadis_quote' => 'Selamat datang di portal resmi kami. Kami berkomitmen menyelenggarakan pelayanan publik yang informatif, transparan, dan akuntabel demi kemajuan pendidikan dan pelestarian kebudayaan di Provinsi Maluku.',
                'kadis_button_text' => 'Baca Selengkapnya',
                'kadis_button_link' => '#',
            ]);
        }
        return view('dashboard', ['view_type' => 'hero', 'hero_setting' => $heroSetting]);
    }

    public function updateHero(Request $request)
    {
        $heroSetting = HeroSetting::first();
        if (!$heroSetting) {
            $heroSetting = new HeroSetting();
        }

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'campaign_badge' => 'nullable|string|max:255',
            'title' => 'nullable|string',
            'title_highlight' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'btn1_text' => 'nullable|string|max:100',
            'btn1_url' => 'nullable|string|max:255',
            'btn2_text' => 'nullable|string|max:100',
            'btn2_url' => 'nullable|string|max:255',
            'kadis_name' => 'nullable|string|max:255',
            'kadis_position' => 'nullable|string|max:255',
            'kadis_quote' => 'nullable|string',
            'kadis_button_text' => 'nullable|string|max:100',
            'kadis_button_link' => 'nullable|string|max:255',
            'kadis_photo' => 'nullable|image|max:5120',
            'kadis_photo_url' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        if ($request->hasFile('kadis_photo')) {
            $file = $request->file('kadis_photo');
            $filename = 'kadis_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $uploadPath = public_path('uploads/kadis');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $file->move($uploadPath, $filename);
            $data['kadis_photo'] = '/uploads/kadis/' . $filename;
        } elseif ($request->filled('kadis_photo_url')) {
            $data['kadis_photo'] = $request->kadis_photo_url;
        }

        unset($data['kadis_photo_url']);

        $heroSetting->fill($data);
        $heroSetting->save();

        return redirect()->route('admin.hero')->with('success', 'Data Banner Utama & Sambutan Kepala Dinas berhasil diperbarui!');
    }

    public function programUnggulan(Request $request)
    {
        $status = $request->query('status', 'all');
        $search = $request->query('q', '');

        $query = LayananSopSubmission::orderBy('created_at', 'desc');

        if ($status === 'Disetujui') {
            $query->whereIn('status', ['Disetujui', 'Selesai']);
        } elseif ($status === 'Ditolak') {
            $query->where('status', 'Ditolak');
        } elseif ($status !== 'all' && !empty($status)) {
            $query->where('status', $status);
        }

        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('sender_name', 'like', "%{$search}%")
                  ->orWhere('service_code', 'like', "%{$search}%")
                  ->orWhere('service_title', 'like', "%{$search}%")
                  ->orWhere('instance', 'like', "%{$search}%")
                  ->orWhere('admin_notes', 'like', "%{$search}%");
            });
        }

        $submissions = $query->paginate(15)->appends($request->all());

        $stats = [
            'total' => LayananSopSubmission::count(),
            'disetujui' => LayananSopSubmission::whereIn('status', ['Disetujui', 'Selesai'])->count(),
            'ditolak' => LayananSopSubmission::where('status', 'Ditolak')->count(),
            'diproses' => LayananSopSubmission::whereNotIn('status', ['Disetujui', 'Selesai', 'Ditolak'])->count(),
        ];

        return view('dashboard', [
            'view_type' => 'program_unggulan',
            'submissions' => $submissions,
            'selectedStatus' => $status,
            'search' => $search,
            'stats' => $stats,
        ]);
    }

    public function storeProgramUnggulan(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'sender_name' => 'required|string|max:255',
            'service_code' => 'required|string|max:50',
            'service_title' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'bidang' => 'nullable|string|max:100',
            'instance' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:100',
            'admin_notes' => 'nullable|string',
            'file' => 'nullable|file|max:15360',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $status = $data['status'];
        $isApproved = in_array($status, ['Disetujui', 'Selesai']);

        $uploadPath = public_path('uploads/sop_submissions');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $origName = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension() ?: 'pdf';
            $safeName = 'dok_' . strtolower(preg_replace('/[^a-zA-Z0-9]/', '_', $data['service_code'])) . '_' . time() . '.' . $ext;
            $file->move($uploadPath, $safeName);

            $filePath = 'uploads/sop_submissions/' . $safeName;
            $fileName = $origName;
            $fileSize = number_format(filesize($uploadPath . '/' . $safeName) / 1024, 1) . ' KB';
            $fileType = $ext;
        } else {
            $fileName = ($isApproved ? 'SK_Disetujui_' : 'Surat_Penolakan_') . str_replace(' ', '_', $data['sender_name']) . '.pdf';
            $safeName = 'sample_' . time() . '_' . uniqid() . '.pdf';
            $sampleSource = public_path('uploads/sop_submissions/SK_Layanan_Disetujui_Izin_Belajar.pdf');
            if (file_exists($sampleSource)) {
                copy($sampleSource, $uploadPath . '/' . $safeName);
            } else {
                file_put_contents($uploadPath . '/' . $safeName, "%PDF-1.4 Official Dinas Dikbud Maluku Document");
            }
            $filePath = 'uploads/sop_submissions/' . $safeName;
            $fileSize = '35 KB';
            $fileType = 'pdf';
        }

        LayananSopSubmission::create([
            'service_code' => $data['service_code'],
            'bidang' => $data['bidang'] ?? 'Kepegawaian',
            'service_title' => $data['service_title'],
            'sender_name' => $data['sender_name'],
            'phone' => $data['phone'] ?? null,
            'email' => $data['email'] ?? null,
            'instance' => $data['instance'] ?? null,
            'notes' => 'Diinput via Admin Dokumen Layanan & SK',
            'file_path' => $filePath,
            'file_name' => $fileName,
            'file_size' => $fileSize,
            'file_type' => $fileType,
            'status' => $status,
            'admin_notes' => $data['admin_notes'] ?? null,
        ]);

        return redirect()->route('admin.program.unggulan')
            ->with('success', "Dokumen Layanan & SK untuk '{$data['sender_name']}' berhasil ditambahkan ke sistem!");
    }

    public function updateProgramUnggulan(Request $request, $id)
    {
        $submission = LayananSopSubmission::findOrFail($id);

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'sender_name' => 'required|string|max:255',
            'service_code' => 'required|string|max:50',
            'service_title' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'bidang' => 'nullable|string|max:100',
            'instance' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:100',
            'admin_notes' => 'nullable|string',
            'file' => 'nullable|file|max:15360',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $uploadPath = public_path('uploads/sop_submissions');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            if ($submission->file_path && file_exists(public_path($submission->file_path))) {
                @unlink(public_path($submission->file_path));
            }

            $origName = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension() ?: 'pdf';
            $safeName = 'dok_' . strtolower(preg_replace('/[^a-zA-Z0-9]/', '_', $data['service_code'])) . '_' . time() . '.' . $ext;
            $file->move($uploadPath, $safeName);

            $submission->file_path = 'uploads/sop_submissions/' . $safeName;
            $submission->file_name = $origName;
            $submission->file_size = number_format(filesize($uploadPath . '/' . $safeName) / 1024, 1) . ' KB';
            $submission->file_type = $ext;
        }

        $submission->sender_name = $data['sender_name'];
        $submission->service_code = $data['service_code'];
        $submission->service_title = $data['service_title'];
        $submission->status = $data['status'];
        $submission->bidang = $data['bidang'] ?? $submission->bidang;
        $submission->instance = $data['instance'] ?? $submission->instance;
        $submission->phone = $data['phone'] ?? $submission->phone;
        $submission->email = $data['email'] ?? $submission->email;
        $submission->admin_notes = $data['admin_notes'] ?? $submission->admin_notes;
        $submission->save();

        return redirect()->route('admin.program.unggulan')
            ->with('success', "Data Dokumen Layanan & SK '{$submission->sender_name}' berhasil diperbarui!");
    }

    public function destroyProgramUnggulan($id)
    {
        $submission = LayananSopSubmission::findOrFail($id);
        if ($submission->file_path && file_exists(public_path($submission->file_path))) {
            @unlink(public_path($submission->file_path));
        }
        $name = $submission->sender_name;
        $submission->delete();

        return redirect()->route('admin.program.unggulan')
            ->with('success', "Dokumen Layanan & SK untuk '{$name}' berhasil dihapus dari sistem!");
    }

    public function dokumenPeraturan()
    {
        $dokumens = RegulasiDokumen::orderBy('no', 'asc')->get();
        return view('dashboard', ['view_type' => 'dokumen_peraturan', 'regulasi_dokumens' => $dokumens]);
    }

    public function storeDokumenPeraturan(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'no' => 'nullable|integer',
            'title' => 'required|string|max:500',
            'tag' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:100',
            'url' => 'nullable|string|max:1000',
            'file_dokumen' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,zip|max:51200',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['no'] = $data['no'] ?? (RegulasiDokumen::count() + 1);
        $data['is_active'] = $request->has('is_active') ? true : false;

        if ($request->hasFile('file_dokumen')) {
            $file = $request->file('file_dokumen');
            $filename = time() . '_' . uniqid() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            $uploadPath = public_path('uploads/dokumen');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $file->move($uploadPath, $filename);
            $data['file_path'] = '/uploads/dokumen/' . $filename;
            $data['url'] = '/uploads/dokumen/' . $filename;
        }

        unset($data['file_dokumen']);

        RegulasiDokumen::create($data);

        return redirect()->route('admin.dokumen.peraturan')->with('success', 'Dokumen Peraturan berhasil ditambahkan ke database!');
    }

    public function updateDokumenPeraturan(Request $request, $id)
    {
        $dokumen = RegulasiDokumen::findOrFail($id);

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'no' => 'nullable|integer',
            'title' => 'required|string|max:500',
            'tag' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:100',
            'url' => 'nullable|string|max:1000',
            'file_dokumen' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,zip|max:51200',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['no'] = $data['no'] ?? $dokumen->no;
        $data['is_active'] = $request->has('is_active') ? true : false;

        if ($request->hasFile('file_dokumen')) {
            $file = $request->file('file_dokumen');
            $filename = time() . '_' . uniqid() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            $uploadPath = public_path('uploads/dokumen');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $file->move($uploadPath, $filename);
            $data['file_path'] = '/uploads/dokumen/' . $filename;
            $data['url'] = '/uploads/dokumen/' . $filename;
        }

        unset($data['file_dokumen']);

        $dokumen->update($data);

        return redirect()->route('admin.dokumen.peraturan')->with('success', 'Dokumen Peraturan berhasil diperbarui!');
    }

    public function destroyDokumenPeraturan($id)
    {
        $dokumen = RegulasiDokumen::findOrFail($id);
        $title = $dokumen->title;
        $dokumen->delete();
        return redirect()->route('admin.dokumen.peraturan')->with('success', 'Dokumen "' . $title . '" berhasil dihapus dari database!');
    }

    public function transparansiPosters()
    {
        $posters = TransparansiPoster::orderBy('order', 'asc')->get();
        return view('dashboard', ['view_type' => 'transparansi_posters', 'transparansi_posters' => $posters]);
    }

    public function storeTransparansiPoster(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'image' => 'nullable|image|max:10240',
            'image_url' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['order'] = $data['order'] ?? (TransparansiPoster::count() + 1);
        $data['is_active'] = $request->has('is_active') ? true : false;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'transparansi_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $uploadPath = public_path('images');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $file->move($uploadPath, $filename);
            $data['image'] = '/images/' . $filename;
        } elseif ($request->filled('image_url')) {
            $data['image'] = $request->image_url;
        } else {
            $data['image'] = '/images/maklumat-pelayanan.jpg';
        }

        unset($data['image_url']);

        TransparansiPoster::create($data);

        return redirect()->route('admin.transparansi.posters')->with('success', 'Poster Transparansi berhasil ditambahkan!');
    }

    public function updateTransparansiPoster(Request $request, $id)
    {
        $poster = TransparansiPoster::findOrFail($id);

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'image' => 'nullable|image|max:10240',
            'image_url' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['order'] = $data['order'] ?? $poster->order;
        $data['is_active'] = $request->has('is_active') ? true : false;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'transparansi_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $uploadPath = public_path('images');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $file->move($uploadPath, $filename);
            $data['image'] = '/images/' . $filename;
        } elseif ($request->filled('image_url')) {
            $data['image'] = $request->image_url;
        }

        unset($data['image_url']);

        $poster->update($data);

        return redirect()->route('admin.transparansi.posters')->with('success', 'Poster Transparansi berhasil diperbarui!');
    }

    public function destroyTransparansiPoster($id)
    {
        $poster = TransparansiPoster::findOrFail($id);
        $title = $poster->title;
        $poster->delete();
        return redirect()->route('admin.transparansi.posters')->with('success', 'Poster "' . $title . '" berhasil dihapus!');
    }

    // ==========================================
    // GALERI MULTIMEDIA (FOTO & VIDEO) CRUD
    // ==========================================
    public function galeri(Request $request)
    {
        $type = $request->query('type');
        $query = Gallery::query();

        if ($type && in_array($type, ['foto', 'video'])) {
            $query->where('type', $type);
        }

        $galleries = $query->orderBy('order', 'asc')->orderBy('created_at', 'desc')->get();
        $totalAll = Gallery::count();
        $totalFoto = Gallery::where('type', 'foto')->count();
        $totalVideo = Gallery::where('type', 'video')->count();

        return view('dashboard', [
            'view_type' => 'galeri',
            'galleries' => $galleries,
            'current_type' => $type ?? 'all',
            'counts' => [
                'all' => $totalAll,
                'foto' => $totalFoto,
                'video' => $totalVideo,
            ]
        ]);
    }

    public function storeGaleri(Request $request)
    {
        $this->ensureGaleriUploadAccepted();

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'type' => 'required|in:foto,video',
            'category' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'event_date' => 'nullable|date',
            'order' => 'nullable|integer',
            'media_url' => 'nullable|string|max:1000',
            'media_url_video' => 'nullable|string|max:1000',
            'thumbnail_url' => 'nullable|string|max:1000',
            'image' => 'nullable|image|max:10240', // 10MB max
            'video_file' => 'nullable|file|mimes:mp4,mov,avi,mkv,webm|max:512000', // 500MB max
            'thumbnail_file' => 'nullable|image|max:5120', // 5MB max
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['order'] = $data['order'] ?? (Gallery::count() + 1);
        $data['is_active'] = $request->has('is_active') ? true : false;
        $data['category'] = $data['category'] ?? ($data['type'] === 'foto' ? 'Kegiatan Dinas' : 'Dokumentasi Video');
        $data['media_url'] = $this->resolveGaleriMediaUrl($data, $data['media_url_video'] ?? null);
        unset($data['media_url_video']);

        if ($data['type'] === 'foto') {
            $data['file_path'] = $this->storeGaleriMedia($request, 'image', 'images/galeri', 'galeri_foto_');
            if (!$data['file_path'] && empty($data['media_url'])) {
                return back()->withErrors(['image' => 'Foto harus diisi: unggah file gambar atau isi URL gambar online.'])->withInput();
            }
        }

        if ($data['type'] === 'video') {
            $data['file_path'] = $this->storeGaleriMedia($request, 'video_file', 'videos', 'galeri_vid_');
            if (!empty($data['media_url'])) {
                list($embedUrl, $ytThumb) = $this->formatYoutubeUrl($data['media_url']);
                $data['media_url'] = $embedUrl;
                if (empty($data['thumbnail']) && empty($data['thumbnail_url']) && !$request->hasFile('thumbnail_file') && $ytThumb) {
                    $data['thumbnail'] = $ytThumb;
                }
            }
            if (!$data['file_path'] && empty($data['media_url'])) {
                return back()->withErrors(['media_url_video' => 'Video harus diisi: unggah file video atau isi tautan YouTube.'])->withInput();
            }

            $thumb = $this->storeGaleriMedia($request, 'thumbnail_file', 'images/galeri', 'thumb_');
            if ($thumb) {
                $data['thumbnail'] = $thumb;
            } elseif (!empty($data['thumbnail_url'])) {
                $data['thumbnail'] = $data['thumbnail_url'];
            }
        }

        unset($data['image'], $data['video_file'], $data['thumbnail_file'], $data['thumbnail_url']);

        Gallery::create($data);

        return redirect()->route('admin.galeri')->with('success', 'Media galeri berhasil ditambahkan!');
    }

    public function updateGaleri(Request $request, $id)
    {
        $this->ensureGaleriUploadAccepted();

        $gallery = Gallery::findOrFail($id);

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'type' => 'required|in:foto,video',
            'category' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'event_date' => 'nullable|date',
            'order' => 'nullable|integer',
            'media_url' => 'nullable|string|max:1000',
            'media_url_video' => 'nullable|string|max:1000',
            'thumbnail_url' => 'nullable|string|max:1000',
            'image' => 'nullable|image|max:10240',
            'video_file' => 'nullable|file|mimes:mp4,mov,avi,mkv,webm|max:512000', // 500MB max
            'thumbnail_file' => 'nullable|image|max:5120',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['order'] = $data['order'] ?? $gallery->order;
        $data['is_active'] = $request->has('is_active') ? true : false;
        $data['category'] = $data['category'] ?? $gallery->category;
        $mediaUrl = $this->resolveGaleriMediaUrl($data, $data['media_url_video'] ?? null);
        unset($data['media_url_video']);

        if ($data['type'] === 'foto') {
            if ($path = $this->storeGaleriMedia($request, 'image', 'images/galeri', 'galeri_foto_')) {
                $data['file_path'] = $path;
            }
            if ($mediaUrl) {
                $data['media_url'] = $mediaUrl;
            } elseif (!$gallery->file_path && !$gallery->media_url) {
                return back()->withErrors(['image' => 'Foto harus diisi: unggah file gambar atau isi URL gambar online.'])->withInput();
            }
        }

        if ($data['type'] === 'video') {
            if ($path = $this->storeGaleriMedia($request, 'video_file', 'videos', 'galeri_vid_')) {
                $data['file_path'] = $path;
            }
            if ($mediaUrl) {
                list($embedUrl, $ytThumb) = $this->formatYoutubeUrl($mediaUrl);
                $data['media_url'] = $embedUrl;
                if (empty($gallery->thumbnail) && empty($data['thumbnail_url']) && !$request->hasFile('thumbnail_file') && $ytThumb) {
                    $data['thumbnail'] = $ytThumb;
                }
            } elseif (!$gallery->file_path && !$gallery->media_url) {
                return back()->withErrors(['media_url_video' => 'Video harus diisi: unggah file video atau isi tautan YouTube.'])->withInput();
            }

            if ($thumb = $this->storeGaleriMedia($request, 'thumbnail_file', 'images/galeri', 'thumb_')) {
                $data['thumbnail'] = $thumb;
            } elseif (!empty($data['thumbnail_url'])) {
                $data['thumbnail'] = $data['thumbnail_url'];
            }
        }

        unset($data['image'], $data['video_file'], $data['thumbnail_file'], $data['thumbnail_url']);

        $gallery->update($data);

        return redirect()->route('admin.galeri')->with('success', 'Media galeri berhasil diperbarui!');
    }

    public function destroyGaleri($id)
    {
        $gallery = Gallery::findOrFail($id);
        $title = $gallery->title;
        $gallery->delete();
        return redirect()->route('admin.galeri')->with('success', 'Media galeri "' . $title . '" berhasil dihapus!');
    }

    private function resolveGaleriMediaUrl(array $data, ?string $videoUrl): ?string
    {
        if (($data['type'] ?? 'foto') === 'video') {
            return $videoUrl ?: ($data['media_url'] ?? null);
        }

        return $data['media_url'] ?? null;
    }

    private function storeGaleriMedia(Request $request, string $field, string $folder, string $prefix): ?string
    {
        if (!$request->hasFile($field)) {
            return null;
        }

        $file = $request->file($field);
        $uploadPath = public_path($folder);

        if (!is_dir($uploadPath)) {
            @mkdir($uploadPath, 0755, true);
        }

        $extension = strtolower(preg_replace('/[^a-z0-9]/i', '', (string) $file->getClientOriginalExtension())) ?: $file->guessExtension();
        $filename = $prefix . time() . '_' . uniqid() . '.' . $extension;

        if (!is_dir($uploadPath) || !is_writable($uploadPath) || !$file->move($uploadPath, $filename)) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                $field => 'File tidak dapat disimpan ke folder public/' . $folder . '. Periksa izin tulis folder tersebut pada hosting.',
            ]);
        }

        return '/' . $folder . '/' . $filename;
    }

    private function ensureGaleriUploadAccepted(): void
    {
        $contentLength = (int) ($_SERVER['CONTENT_LENGTH'] ?? 0);
        if ($contentLength > 0 && empty($_POST) && empty($_FILES)) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'video_file' => 'Ukuran kiriman ' . number_format($contentLength / 1048576, 1) . ' MB melebihi batas server (post_max_size = ' . ini_get('post_max_size') . '). Naikkan batas unggah di php.ini/panel hosting (upload_max_filesize & post_max_size minimal 512M) atau pakai video yang lebih kecil.',
            ]);
        }
    }

    private function formatYoutubeUrl($url)
    {
        if (empty($url)) return [null, null];
        
        $embedUrl = $url;
        $thumbnail = null;

        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i', $url, $match)) {
            $videoId = $match[1];
            $embedUrl = 'https://www.youtube.com/embed/' . $videoId;
            $thumbnail = 'https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg';
        }

        return [$embedUrl, $thumbnail];
    }

    // ==========================================
    // MEDIA SOSIAL CRUD
    // ==========================================

    // ==========================================
    // AKSES CEPAT LAYANAN DIGITAL PUBLIK CRUD
    // ==========================================
    public function layanan()
    {
        $services = PortalService::orderBy('order', 'asc')->orderBy('created_at', 'desc')->get();
        return view('dashboard', [
            'view_type' => 'layanan',
            'services' => $services,
        ]);
    }

    public function storeLayanan(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'badge' => 'nullable|string|max:100',
            'icon' => 'required|string|max:100',
            'icon_color' => 'required|string|max:50',
            'description' => 'required|string',
            'url' => 'required|string|max:500',
            'action_text' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['order'] = $data['order'] ?? (PortalService::count() + 1);
        $data['action_text'] = !empty($data['action_text']) ? $data['action_text'] : 'Akses Layanan';
        $data['is_active'] = $request->has('is_active') ? true : false;

        PortalService::create($data);

        return redirect()->route('admin.layanan')->with('success', 'Layanan Publik "' . $data['title'] . '" berhasil ditambahkan!');
    }

    public function updateLayanan(Request $request, $id)
    {
        $service = PortalService::findOrFail($id);

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'badge' => 'nullable|string|max:100',
            'icon' => 'required|string|max:100',
            'icon_color' => 'required|string|max:50',
            'description' => 'required|string',
            'url' => 'required|string|max:500',
            'action_text' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['order'] = $data['order'] ?? $service->order;
        $data['action_text'] = !empty($data['action_text']) ? $data['action_text'] : ($service->action_text ?: 'Akses Layanan');
        $data['is_active'] = $request->has('is_active') ? true : false;

        $service->update($data);

        return redirect()->route('admin.layanan')->with('success', 'Layanan Publik "' . $service->title . '" berhasil diperbarui!');
    }

    public function destroyLayanan($id)
    {
        $service = PortalService::findOrFail($id);
        $title = $service->title;
        $service->delete();

        return redirect()->route('admin.layanan')->with('success', 'Layanan Publik "' . $title . '" berhasil dihapus!');
    }

    public function sosmed()
    {
        $social_media = SocialMedia::orderBy('order', 'asc')->orderBy('created_at', 'desc')->get();
        return view('dashboard', [
            'view_type' => 'sosmed',
            'social_media' => $social_media,
        ]);
    }

    public function storeSosmed(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'platform' => 'required|string|max:50',
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:255',
            'url' => 'required|string|max:500',
            'icon' => 'nullable|string|max:100',
            'color_class' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['order'] = $data['order'] ?? (SocialMedia::count() + 1);
        $data['is_active'] = $request->has('is_active') ? true : false;

        SocialMedia::create($data);

        return redirect()->route('admin.sosmed')->with('success', 'Media sosial "' . $data['name'] . '" berhasil ditambahkan!');
    }

    public function updateSosmed(Request $request, $id)
    {
        $sosmed = SocialMedia::findOrFail($id);

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'platform' => 'required|string|max:50',
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:255',
            'url' => 'required|string|max:500',
            'icon' => 'nullable|string|max:100',
            'color_class' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['order'] = $data['order'] ?? $sosmed->order;
        $data['is_active'] = $request->has('is_active') ? true : false;

        $sosmed->update($data);

        return redirect()->route('admin.sosmed')->with('success', 'Media sosial "' . $sosmed->name . '" berhasil diperbarui!');
    }

    public function destroySosmed($id)
    {
        $sosmed = SocialMedia::findOrFail($id);
        $name = $sosmed->name;
        $sosmed->delete();

        return redirect()->route('admin.sosmed')->with('success', 'Media sosial "' . $name . '" berhasil dihapus!');
    }

    // ==========================================
    // PORTAL INFORMASI & BUDAYA CRUD
    // ==========================================
    public function portal(Request $request)
    {
        $tab = $request->query('tab', 'news');
        $portal_news = PortalNews::orderBy('created_at', 'desc')->get();
        $portal_cultures = PortalCulture::orderBy('created_at', 'desc')->get();
        $agendas = Agenda::orderBy('date', 'desc')->get();
        $dokumens = RegulasiDokumen::orderBy('no', 'asc')->get();
        $complaints = Complaint::orderBy('created_at', 'desc')->get();

        return view('dashboard', [
            'view_type' => 'portal',
            'tab' => $tab,
            'portal_news' => $portal_news,
            'portal_cultures' => $portal_cultures,
            'agendas' => $agendas,
            'dokumens' => $dokumens,
            'complaints' => $complaints,
        ]);
    }

    public function storePortalNews(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'date' => 'nullable|string|max:100',
            'read_time' => 'nullable|string|max:50',
            'summary' => 'required|string',
            'content' => 'nullable|string',
            'image_file' => 'nullable|image|max:5120',
            'image_url' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $imagePath = $request->input('image_url') ?: 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=800&q=80';
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'portal_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $dest = public_path('images/portal');
            if (!file_exists($dest)) {
                mkdir($dest, 0755, true);
            }
            $file->move($dest, $filename);
            $imagePath = '/images/portal/' . $filename;
        }

        PortalNews::create([
            'title' => $request->title,
            'category' => strtolower($request->category),
            'date' => $request->date ?: date('d M Y'),
            'read_time' => $request->read_time ?: '3 mnt baca',
            'image' => $imagePath,
            'summary' => $request->summary,
            'content' => $request->content ?: ('<p>' . e($request->summary) . '</p>'),
            'is_featured' => $request->has('is_featured') ? true : false,
        ]);

        return redirect()->route('admin.portal', ['tab' => 'news'])->with('success', 'Berita Portal "' . $request->title . '" berhasil ditambahkan!');
    }

    public function updatePortalNews(Request $request, $id)
    {
        $news = PortalNews::findOrFail($id);

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'date' => 'nullable|string|max:100',
            'read_time' => 'nullable|string|max:50',
            'summary' => 'required|string',
            'content' => 'nullable|string',
            'image_file' => 'nullable|image|max:5120',
            'image_url' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $imagePath = $news->image;
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'portal_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $dest = public_path('images/portal');
            if (!file_exists($dest)) {
                mkdir($dest, 0755, true);
            }
            $file->move($dest, $filename);
            $imagePath = '/images/portal/' . $filename;
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->image_url;
        }

        $news->update([
            'title' => $request->title,
            'category' => strtolower($request->category),
            'date' => $request->date ?: $news->date,
            'read_time' => $request->read_time ?: $news->read_time,
            'image' => $imagePath,
            'summary' => $request->summary,
            'content' => $request->content ?: $news->content,
            'is_featured' => $request->has('is_featured') ? true : false,
        ]);

        return redirect()->route('admin.portal', ['tab' => 'news'])->with('success', 'Berita Portal "' . $news->title . '" berhasil diperbarui!');
    }

    public function destroyPortalNews($id)
    {
        $news = PortalNews::findOrFail($id);
        $title = $news->title;
        $news->delete();

        return redirect()->route('admin.portal', ['tab' => 'news'])->with('success', 'Berita Portal "' . $title . '" berhasil dihapus!');
    }

    public function storePortalCulture(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'desc' => 'required|string',
            'image_file' => 'nullable|image|max:5120',
            'image_url' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $imagePath = $request->input('image_url') ?: 'https://images.unsplash.com/photo-1543007630-9710e4a00a20?auto=format&fit=crop&w=600&q=80';
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'culture_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $dest = public_path('images/portal');
            if (!file_exists($dest)) {
                mkdir($dest, 0755, true);
            }
            $file->move($dest, $filename);
            $imagePath = '/images/portal/' . $filename;
        }

        PortalCulture::create([
            'title' => $request->title,
            'type' => $request->type,
            'location' => $request->location,
            'image' => $imagePath,
            'desc' => $request->desc,
        ]);

        return redirect()->route('admin.portal', ['tab' => 'culture'])->with('success', 'Objek Kebudayaan "' . $request->title . '" berhasil ditambahkan!');
    }

    public function updatePortalCulture(Request $request, $id)
    {
        $culture = PortalCulture::findOrFail($id);

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'desc' => 'required|string',
            'image_file' => 'nullable|image|max:5120',
            'image_url' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $imagePath = $culture->image;
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'culture_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $dest = public_path('images/portal');
            if (!file_exists($dest)) {
                mkdir($dest, 0755, true);
            }
            $file->move($dest, $filename);
            $imagePath = '/images/portal/' . $filename;
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->image_url;
        }

        $culture->update([
            'title' => $request->title,
            'type' => $request->type,
            'location' => $request->location,
            'image' => $imagePath,
            'desc' => $request->desc,
        ]);

        return redirect()->route('admin.portal', ['tab' => 'culture'])->with('success', 'Objek Kebudayaan "' . $culture->title . '" berhasil diperbarui!');
    }

    public function destroyPortalCulture($id)
    {
        $id = str_replace('c', '', $id);
        $culture = PortalCulture::findOrFail($id);
        $title = $culture->title;
        $culture->delete();

        return redirect()->route('admin.portal', ['tab' => 'culture'])->with('success', 'Objek Kebudayaan "' . $title . '" berhasil dihapus!');
    }

    public function berita()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['view_type' => 'berita', 'posts' => $posts]);
    }

    public function agenda()
    {
        $agendas = Agenda::orderBy('date', 'desc')->get();
        return view('dashboard', ['view_type' => 'agenda', 'agendas' => $agendas]);
    }

    public function pengaduan()
    {
        $complaints = Complaint::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['view_type' => 'pengaduan', 'complaints' => $complaints]);
    }
    public function ppid()
    {
        $requests = \App\Models\PpidRequest::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['view_type' => 'ppid', 'ppid_requests' => $requests]);
    }

    public function slider()
    {
        $slides = \App\Models\HeroSlide::orderBy('order', 'asc')->get();
        return view('dashboard', ['view_type' => 'slider', 'hero_slides' => $slides]);
    }

    public function storeSlide(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'tag' => 'nullable|string|max:100',
            'image' => 'nullable',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|string|max:500',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['tag'] = $data['tag'] ?? 'Program Prioritas';
        $data['button_text'] = $data['button_text'] ?? 'Baca Selengkapnya';
        $data['button_link'] = $data['button_link'] ?? '#';
        $data['order'] = $data['order'] ?? (\App\Models\HeroSlide::count() + 1);
        $data['is_active'] = $request->has('is_active') ? true : false;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $uploadPath = public_path('uploads/slides');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $file->move($uploadPath, $filename);
            $data['image'] = '/uploads/slides/' . $filename;
        } elseif ($request->filled('image_url')) {
            $data['image'] = $request->image_url;
        } else {
            $data['image'] = 'https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=1200&q=80';
        }

        \App\Models\HeroSlide::create($data);

        return back()->with('success', 'Foto Slide Beranda berhasil ditambahkan!');
    }

    public function updateSlide(Request $request, $id)
    {
        $slide = \App\Models\HeroSlide::findOrFail($id);

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'tag' => 'nullable|string|max:100',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|string|max:500',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['tag'] = $data['tag'] ?? 'Program Prioritas';
        $data['button_text'] = $data['button_text'] ?? 'Baca Selengkapnya';
        $data['button_link'] = $data['button_link'] ?? '#';
        $data['order'] = $data['order'] ?? $slide->order;
        $data['is_active'] = $request->has('is_active') ? true : false;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $uploadPath = public_path('uploads/slides');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $file->move($uploadPath, $filename);
            $data['image'] = '/uploads/slides/' . $filename;
        } elseif ($request->filled('image_url')) {
            $data['image'] = $request->image_url;
        }

        $slide->update($data);

        return back()->with('success', 'Foto Slide Beranda berhasil diperbarui!');
    }

    public function destroySlide($id)
    {
        $slide = \App\Models\HeroSlide::findOrFail($id);
        $slide->delete();

        return back()->with('success', 'Foto Slide Beranda berhasil dihapus!');
    }

    protected function generatePpidNumber(): string
    {
        $year = date('Y');
        $latest = \App\Models\PpidRequest::where('nomor_permohonan', 'LIKE', "PPID-{$year}-%")
            ->orderBy('id', 'desc')
            ->first();

        $nextNum = 1;
        if ($latest && preg_match('/PPID-' . $year . '-(\d+)/', $latest->nomor_permohonan, $matches)) {
            $nextNum = intval($matches[1]) + 1;
        } else {
            $nextNum = max((\App\Models\PpidRequest::max('id') ?? 0) + 1, 1);
        }

        do {
            $candidate = 'PPID-' . $year . '-' . str_pad($nextNum, 4, '0', STR_PAD_LEFT);
            $nextNum++;
        } while (\App\Models\PpidRequest::where('nomor_permohonan', $candidate)->exists());

        return $candidate;
    }

    protected function generateTicketNumber(): string
    {
        $year = date('Y');
        $latest = \App\Models\Complaint::where('ticket_no', 'LIKE', "LAP-{$year}-%")
            ->orderBy('id', 'desc')
            ->first();

        $nextNum = 1;
        if ($latest && preg_match('/LAP-' . $year . '-(\d+)/', $latest->ticket_no, $matches)) {
            $nextNum = intval($matches[1]) + 1;
        } else {
            $nextNum = max((\App\Models\Complaint::max('id') ?? 0) + 1, 1);
        }

        do {
            $candidate = 'LAP-' . $year . '-' . str_pad($nextNum, 4, '0', STR_PAD_LEFT);
            $nextNum++;
        } while (\App\Models\Complaint::where('ticket_no', $candidate)->exists());

        return $candidate;
    }
    public function storePpid(Request $request)
    {
        // Deteksi apakah pengiriman berasal dari form Layanan Aspirasi Pendidikan
        $isAspirasi = $request->input('jenis_form') === 'Aspirasi Pendidikan'
            || ($request->has('nama') && !$request->has('nama_pemohon'))
            || ($request->has('pesan') && !$request->has('rincian'));

        if ($isAspirasi) {
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
                'instansi' => 'nullable|string|max:255',
                'kategori' => 'nullable|string|max:255',
                'whatsapp' => 'required|string|max:50',
                'pesan' => 'required|string',
            ]);

            if ($validator->fails()) {
                if ($request->expectsJson() || $request->ajax()) {
                    return response()->json([
                        'success' => false,
                        'message' => $validator->errors()->first()
                    ], 422);
                }
                return back()->withErrors($validator)->withInput();
            }

            $nama = $request->input('nama');
            $instansi = $request->input('instansi');
            $kategori = $request->input('kategori') ?: 'Layanan Aspirasi';
            $whatsapp = $request->input('whatsapp');
            $pesan = $request->input('pesan');

            $nomorPpid = $this->generatePpidNumber();

            // Simpan ke tabel ppid_requests agar terbaca di database dan menu PPID
            $ppid = \App\Models\PpidRequest::create([
                'nomor_permohonan' => $nomorPpid,
                'nama_pemohon' => $nama,
                'instansi' => $instansi,
                'kategori' => $kategori,
                'tipe_layanan' => 'Aspirasi Pendidikan',
                'nik' => '-',
                'email' => '-',
                'telepon' => $whatsapp,
                'rincian' => $pesan,
                'tujuan' => 'Layanan Aspirasi: ' . $kategori . ($instansi ? " ({$instansi})" : ''),
                'status' => 'Menunggu Review',
            ]);

            // Sinkronkan juga ke tabel complaints (Aspirasi / Pengaduan)
            $ticketNo = $this->generateTicketNumber();
            $complaintTitle = "[{$kategori}] " . $nama . ($instansi ? " ({$instansi})" : '');

            \App\Models\Complaint::create([
                'ticket_no' => $ticketNo,
                'sender_name' => $nama,
                'instansi' => $instansi,
                'kategori' => $kategori,
                'whatsapp' => $whatsapp,
                'title' => $complaintTitle,
                'description' => $pesan,
                'status' => 'Menunggu Respon',
            ]);

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Layanan Aspirasi Pendidikan Anda berhasil terkirim dan tersimpan di database resmi Disdikbud Maluku.',
                    'data' => $ppid
                ]);
            }

            return back()->with('success', 'Layanan Aspirasi Pendidikan Anda berhasil terkirim dan tersimpan di database resmi Disdikbud Maluku.');
        }

        // Formulir Permohonan Data Resmi PPID
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'nama_pemohon' => 'required|string|max:255',
            'nik' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:50',
            'rincian' => 'required|string',
            'tujuan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first()
                ], 422);
            }
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['nomor_permohonan'] = $this->generatePpidNumber();
        $data['tipe_layanan'] = 'Permohonan Data';
        $data['status'] = 'Menunggu Review';
        $created = \App\Models\PpidRequest::create($data);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Formulir Permohonan Data PPID Anda berhasil dikirim dan tersimpan di database resmi Disdikbud Maluku.',
                'data' => $created
            ]);
        }

        return back()->with('success', 'Formulir Permohonan Data PPID Anda berhasil dikirim dan tersimpan di database resmi Disdikbud Maluku.');
    }

    public function storeBerita(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|max:5120', // max 5MB
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $data = $validator->validated();
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }
        
        $data['slug'] = \Illuminate\Support\Str::slug($data['title']) . '-' . time() . '-' . \Illuminate\Support\Str::random(4);
        $data['excerpt'] = \Illuminate\Support\Str::limit(strip_tags($data['content']), 150);
        $data['status'] = 'Published'; // Auto publish
        $data['published_at'] = now();
        $data['views'] = 0;
        
        $post = \App\Models\Post::create($data);

        // Jika user memilih tipe Agenda Kegiatan lewat modal Berita
        if ($data['type'] === 'Agenda Kegiatan') {
            Agenda::firstOrCreate(
                ['title' => $data['title']],
                [
                    'date' => now()->toDateString(),
                    'location' => 'Disdikbud Provinsi Maluku',
                    'image' => $data['image'] ?? null,
                    'description' => $data['content'],
                    'is_public' => 1
                ]
            );
        }
        
        return back()->with('success', 'Konten berita/agenda baru berhasil dipublikasikan!');
    }

    public function updateBerita(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $oldTitle = $post->title;
        
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|max:5120', // max 5MB
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $data = $validator->validated();
        
        if ($request->hasFile('image')) {
            if ($post->image && !str_starts_with($post->image, 'http://') && !str_starts_with($post->image, 'https://')) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        if (empty($post->slug) || $post->title !== $data['title']) {
            $data['slug'] = \Illuminate\Support\Str::slug($data['title']) . '-' . time() . '-' . \Illuminate\Support\Str::random(4);
        }
        $data['excerpt'] = \Illuminate\Support\Str::limit(strip_tags($data['content']), 150);
        
        $post->update($data);

        // Jika tipe adalah Agenda Kegiatan atau sebelumnya Agenda Kegiatan, sinkronkan ke agenda
        if ($post->type === 'Agenda Kegiatan' || $data['type'] === 'Agenda Kegiatan') {
            $agenda = Agenda::where('title', $oldTitle)->first();
            if ($agenda) {
                $agendaUpdate = ['title' => $data['title']];
                if (isset($data['image'])) {
                    if ($agenda->image && $agenda->image !== $data['image'] && !str_starts_with($agenda->image, 'http://') && !str_starts_with($agenda->image, 'https://')) {
                        \Illuminate\Support\Facades\Storage::disk('public')->delete($agenda->image);
                    }
                    $agendaUpdate['image'] = $data['image'];
                }
                $agenda->update($agendaUpdate);
            }
        }
        
        return back()->with('success', 'Konten berhasil diperbarui!');
    }

    public function destroyBerita($id)
    {
        $post = Post::findOrFail($id);
        if ($post->image && !str_starts_with($post->image, 'http://') && !str_starts_with($post->image, 'https://')) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($post->image);
        }
        if ($post->type === 'Agenda Kegiatan') {
            $agenda = Agenda::where('title', $post->title)->first();
            if ($agenda) {
                if ($agenda->image && $agenda->image !== $post->image && !str_starts_with($agenda->image, 'http://') && !str_starts_with($agenda->image, 'https://')) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($agenda->image);
                }
                $agenda->delete();
            }
        }
        $post->delete();
        
        return back()->with('success', 'Konten berhasil dihapus!');
    }

    public function storeAgenda(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|max:5120', // max 5MB
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $data = $validator->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }
        
        $agenda = Agenda::create($data);

        // Sinkronkan ke tabel posts (Berita & Artikel) agar muncul di daftar tabel Judul Konten | Kategori | Status | Aksi
        \App\Models\Post::create([
            'title' => $agenda->title,
            'slug' => \Illuminate\Support\Str::slug($agenda->title) . '-' . time() . '-' . \Illuminate\Support\Str::random(4),
            'type' => 'Agenda Kegiatan',
            'status' => 'Published',
            'image' => $data['image'] ?? null,
            'content' => "Tanggal Kegiatan: " . \Carbon\Carbon::parse($agenda->date)->translatedFormat('d F Y') . "\nLokasi: " . $agenda->location . ($agenda->description ? "\n\n" . $agenda->description : ''),
            'excerpt' => 'Agenda Kegiatan di ' . $agenda->location . ' pada ' . \Carbon\Carbon::parse($agenda->date)->translatedFormat('d F Y'),
            'published_at' => now(),
            'views' => 0,
        ]);

        return back()->with('success', 'Agenda Kegiatan baru berhasil ditambahkan dan disinkronkan ke daftar publikasi konten!');
    }

    public function updateAgenda(Request $request, $id)
    {
        $agenda = Agenda::findOrFail($id);
        $oldTitle = $agenda->title;
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|max:5120', // max 5MB
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $data = $validator->validated();

        if ($request->hasFile('image')) {
            if ($agenda->image && !str_starts_with($agenda->image, 'http://') && !str_starts_with($agenda->image, 'https://')) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($agenda->image);
            }
            $data['image'] = $request->file('image')->store('posts', 'public');
        }
        
        $agenda->update($data);

        // Sinkronkan ke tabel posts
        $post = \App\Models\Post::where('title', $oldTitle)->where('type', 'Agenda Kegiatan')->first();
        if ($post) {
            $updatePostData = [
                'title' => $agenda->title,
                'content' => "Tanggal Kegiatan: " . \Carbon\Carbon::parse($agenda->date)->translatedFormat('d F Y') . "\nLokasi: " . $agenda->location . ($agenda->description ? "\n\n" . $agenda->description : ''),
                'excerpt' => 'Agenda Kegiatan di ' . $agenda->location . ' pada ' . \Carbon\Carbon::parse($agenda->date)->translatedFormat('d F Y'),
            ];
            if (isset($data['image'])) {
                if ($post->image && $post->image !== $data['image'] && !str_starts_with($post->image, 'http://') && !str_starts_with($post->image, 'https://')) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($post->image);
                }
                $updatePostData['image'] = $data['image'];
            }
            $post->update($updatePostData);
        } else {
            \App\Models\Post::create([
                'title' => $agenda->title,
                'slug' => \Illuminate\Support\Str::slug($agenda->title) . '-' . time() . '-' . \Illuminate\Support\Str::random(4),
                'type' => 'Agenda Kegiatan',
                'status' => 'Published',
                'image' => $data['image'] ?? null,
                'content' => "Tanggal Kegiatan: " . \Carbon\Carbon::parse($agenda->date)->translatedFormat('d F Y') . "\nLokasi: " . $agenda->location . ($agenda->description ? "\n\n" . $agenda->description : ''),
                'excerpt' => 'Agenda Kegiatan di ' . $agenda->location . ' pada ' . \Carbon\Carbon::parse($agenda->date)->translatedFormat('d F Y'),
                'published_at' => now(),
                'views' => 0,
            ]);
        }

        return back()->with('success', 'Agenda Kegiatan "' . $agenda->title . '" berhasil diperbarui!');
    }

    public function destroyAgenda($id)
    {
        $agenda = Agenda::findOrFail($id);
        $title = $agenda->title;
        if ($agenda->image && !str_starts_with($agenda->image, 'http://') && !str_starts_with($agenda->image, 'https://')) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($agenda->image);
        }
        $post = \App\Models\Post::where('title', $title)->where('type', 'Agenda Kegiatan')->first();
        if ($post) {
            if ($post->image && $post->image !== $agenda->image && !str_starts_with($post->image, 'http://') && !str_starts_with($post->image, 'https://')) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($post->image);
            }
            $post->delete();
        }
        $agenda->delete();
        return back()->with('success', 'Agenda Kegiatan "' . $title . '" berhasil dihapus!');
    }

    public function storePengaduan(Request $request)
    {
        $senderName = $request->input('sender_name') ?: $request->input('nama');
        $instansi = $request->input('instansi');
        $kategori = $request->input('kategori');
        $whatsapp = $request->input('whatsapp');
        $description = $request->input('description') ?: $request->input('pesan');
        $title = $request->input('title');

        if (empty($title)) {
            $cat = $kategori ?: 'Layanan Aspirasi';
            $title = "[{$cat}] " . ($senderName ?: 'Masyarakat');
            if ($instansi) {
                $title .= " ({$instansi})";
            }
        }

        $inputData = [
            'sender_name' => $senderName,
            'title' => $title,
            'description' => $description,
            'instansi' => $instansi,
            'kategori' => $kategori,
            'whatsapp' => $whatsapp,
        ];

        $validator = \Illuminate\Support\Facades\Validator::make($inputData, [
            'sender_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'instansi' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first()
                ], 422);
            }
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['status'] = 'Menunggu Respon';
        if (empty($data['ticket_no'])) {
            $data['ticket_no'] = $this->generateTicketNumber();
        }
        $created = Complaint::create($data);

        // Sinkronkan juga ke database PPID
        $nomorPpid = $this->generatePpidNumber();
        \App\Models\PpidRequest::create([
            'nomor_permohonan' => $nomorPpid,
            'nama_pemohon' => $senderName,
            'instansi' => $instansi,
            'kategori' => $kategori ?: 'Pengaduan Internal',
            'tipe_layanan' => 'Pengaduan Internal',
            'nik' => '-',
            'email' => '-',
            'telepon' => $whatsapp ?: '-',
            'rincian' => $description,
            'tujuan' => 'Pengaduan Internal: ' . $title,
            'status' => 'Menunggu Review',
        ]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Layanan Aspirasi Pendidikan / Aduan Anda berhasil terkirim dan tersimpan di database PPID Disdikbud Maluku!',
                'data' => $created
            ]);
        }

        return back()->with('success', 'Layanan Aspirasi Pendidikan / Aduan Anda berhasil terkirim dan tersimpan di database PPID Disdikbud Maluku!');
    }

    public function updatePengaduanStatus(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);
        $request->validate([
            'status' => 'required|in:Menunggu Respon,Diproses,Selesai',
        ]);
        $complaint->status = $request->status;
        $complaint->save();
        return back()->with('success', 'Status pengaduan #' . $id . ' berhasil diubah menjadi ' . $complaint->status);
    }

    public function destroyPengaduan($id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->delete();
        return back()->with('success', 'Laporan/Pengaduan berhasil dihapus dari database!');
    }

    public function updatePpidStatus(Request $request, $id)
    {
        $ppid = \App\Models\PpidRequest::findOrFail($id);
        $request->validate([
            'status' => 'required|in:Menunggu Review,Diproses,Selesai,Ditolak',
        ]);
        $ppid->status = $request->status;
        $ppid->save();
        return back()->with('success', 'Status permohonan PPID #' . $id . ' berhasil diperbarui menjadi ' . $ppid->status);
    }

    public function destroyPpid($id)
    {
        $ppid = \App\Models\PpidRequest::findOrFail($id);
        $ppid->delete();
        return back()->with('success', 'Data permohonan PPID berhasil dihapus dari database!');
    }

    public function monev()
    {
        $stats = MonevStat::first();
        if (!$stats) {
            $stats = MonevStat::create([
                'total_sekolah' => '428',
                'total_sekolah_sub' => '+12 dari 2025',
                'siswa_aktif' => '112.450',
                'siswa_aktif_sub' => '+3.2% pendaftar baru',
                'guru_tendik' => '8.942',
                'guru_tendik_sub' => '85% Tersertifikasi',
                'akreditasi_a' => '156',
                'akreditasi_a_sub' => '+15 Sekolah',
                'sarpras_baik' => 65,
                'sarpras_rusak_ringan' => 25,
                'sarpras_rusak_berat' => 10,
                'total_sma' => '245',
                'total_smk' => '183',
                'notes' => 'Data terintegrasi dari sistem Dapodik secara real-time. Diperbarui setiap akhir semester berjalan.',
            ]);
        }
        $regions = MonevRegion::orderBy('urutan', 'asc')->get();
        return view('dashboard', [
            'view_type' => 'monev',
            'monev_stats' => $stats,
            'monev_regions' => $regions
        ]);
    }

    public function updateMonevStats(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'total_sekolah' => 'required|string',
            'total_sekolah_sub' => 'nullable|string',
            'siswa_aktif' => 'required|string',
            'siswa_aktif_sub' => 'nullable|string',
            'guru_tendik' => 'required|string',
            'guru_tendik_sub' => 'nullable|string',
            'akreditasi_a' => 'required|string',
            'akreditasi_a_sub' => 'nullable|string',
            'sarpras_baik' => 'required|numeric|min:0|max:100',
            'sarpras_rusak_ringan' => 'required|numeric|min:0|max:100',
            'sarpras_rusak_berat' => 'required|numeric|min:0|max:100',
            'total_sma' => 'nullable|string',
            'sma_negeri' => 'nullable|string',
            'sma_swasta' => 'nullable|string',
            'total_smk' => 'nullable|string',
            'smk_negeri' => 'nullable|string',
            'smk_swasta' => 'nullable|string',
            'total_slb' => 'nullable|string',
            'slb_negeri' => 'nullable|string',
            'slb_swasta' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $stats = MonevStat::first();
        if (!$stats) {
            $stats = new MonevStat();
        }
        $stats->fill($validator->validated());
        $stats->save();

        return back()->with('success', 'Data Indikator Utama, Satuan Pendidikan & Sarpras Monev berhasil diperbarui!');
    }

    public function storeMonevRegion(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'nama_wilayah' => 'required|string|max:255',
            'jumlah_sma' => 'required|integer|min:0',
            'jumlah_smk' => 'required|integer|min:0',
            'jumlah_slb' => 'nullable|integer|min:0',
            'total' => 'nullable|integer',
            'link_detail' => 'nullable|string|max:500',
            'contoh_sekolah' => 'nullable|string',
            'urutan' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        if (empty($data['total'])) {
            $data['total'] = (int)$data['jumlah_sma'] + (int)$data['jumlah_smk'] + (int)($data['jumlah_slb'] ?? 0);
        }
        if (!isset($data['urutan']) || $data['urutan'] === null) {
            $data['urutan'] = MonevRegion::count() + 1;
        }

        MonevRegion::create($data);

        return back()->with('success', 'Data Wilayah ' . $data['nama_wilayah'] . ' berhasil ditambahkan!');
    }

    public function updateMonevRegion(Request $request, $id)
    {
        $region = MonevRegion::findOrFail($id);

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'nama_wilayah' => 'required|string|max:255',
            'jumlah_sma' => 'required|integer|min:0',
            'jumlah_smk' => 'required|integer|min:0',
            'jumlah_slb' => 'nullable|integer|min:0',
            'total' => 'nullable|integer',
            'link_detail' => 'nullable|string|max:500',
            'contoh_sekolah' => 'nullable|string',
            'urutan' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        if (empty($data['total'])) {
            $data['total'] = (int)$data['jumlah_sma'] + (int)$data['jumlah_smk'] + (int)($data['jumlah_slb'] ?? 0);
        }

        $region->update($data);

        return back()->with('success', 'Data Wilayah ' . $region->nama_wilayah . ' berhasil diperbarui!');
    }

    public function destroyMonevRegion($id)
    {
        $region = MonevRegion::findOrFail($id);
        $name = $region->nama_wilayah;
        $region->delete();

        return back()->with('success', 'Data Wilayah ' . $name . ' berhasil dihapus!');
    }

    public function profil(Request $request)
    {
        $tab = $request->query('tab', 'visi_misi');
        $visiMisi = VisiMisi::first();
        $tugasFungsi = TugasFungsi::first();
        $strukturOrganisasi = StrukturOrganisasi::first();

        return view('dashboard', [
            'view_type' => 'profil',
            'tab' => $tab,
            'visiMisi' => $visiMisi,
            'tugasFungsi' => $tugasFungsi,
            'strukturOrganisasi' => $strukturOrganisasi,
        ]);
    }

    public function visiMisi()
    {
        return redirect()->route('admin.profil', ['tab' => 'visi_misi']);
    }

    public function tugasFungsi()
    {
        return redirect()->route('admin.profil', ['tab' => 'tugas_fungsi']);
    }

    public function strukturOrganisasi()
    {
        return redirect()->route('admin.profil', ['tab' => 'struktur_organisasi']);
    }

    public function updateVisiMisi(Request $request)
    {
        $profil = VisiMisi::first();
        if (!$profil) {
            $profil = new VisiMisi();
        }

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'banner_badge' => 'nullable|string|max:100',
            'banner_title' => 'required|string|max:255',
            'banner_description' => 'nullable|string',
            'visi_text' => 'required|string',
            'misi_description' => 'nullable|string',
            'rumusan_singkat_visi' => 'nullable|string',
            'document_file' => 'nullable|file|max:20480',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $profil->banner_badge = $request->banner_badge ?: 'ARAH KEBIJAKAN';
        $profil->banner_title = $request->banner_title;
        $profil->banner_description = $request->banner_description;
        $profil->visi_text = $request->visi_text;
        $profil->misi_description = $request->misi_description;
        if ($request->has('rumusan_singkat_visi')) {
            $profil->rumusan_singkat_visi = $request->rumusan_singkat_visi;
        }

        if ($request->has('misi_titles') && is_array($request->misi_titles)) {
            $misiItems = [];
            foreach ($request->misi_titles as $i => $title) {
                if (trim($title) !== '') {
                    $misiItems[] = [
                        'id' => $i + 1,
                        'title' => $title,
                        'icon' => $request->misi_icons[$i] ?? 'fa-solid fa-graduation-cap',
                        'short_desc' => $request->misi_short_descs[$i] ?? '',
                        'full_desc' => $request->misi_full_descs[$i] ?? ''
                    ];
                }
            }
            if (!empty($misiItems)) {
                $profil->misi_items = $misiItems;
            }
        }

        if ($request->hasFile('document_file')) {
            $file = $request->file('document_file');
            $dest = public_path('uploads/profil');
            if (!file_exists($dest)) {
                mkdir($dest, 0755, true);
            }

            if ($profil->file_path && file_exists(public_path($profil->file_path))) {
                @unlink(public_path($profil->file_path));
            }

            $origName = $file->getClientOriginalName();
            $filename = 'visimisi_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($dest, $filename);

            $sizeBytes = @filesize($dest . '/' . $filename);
            $sizeFormatted = $sizeBytes ? round($sizeBytes / 1048576, 2) . ' MB' : null;

            $profil->file_path = '/uploads/profil/' . $filename;
            $profil->file_name = $origName;
            $profil->file_size = $sizeFormatted;
        }

        $profil->save();

        return redirect()->route('admin.profil', ['tab' => 'visi_misi'])->with('success', 'Data Visi & Misi dan Dokumen berhasil diperbarui!');
    }

    public function deleteFileVisiMisi()
    {
        $profil = VisiMisi::first();
        if ($profil && $profil->file_path) {
            $fullPath = public_path($profil->file_path);
            if (file_exists($fullPath)) {
                @unlink($fullPath);
            }
            $profil->file_path = null;
            $profil->file_name = null;
            $profil->file_size = null;
            $profil->save();
        }

        return redirect()->route('admin.profil', ['tab' => 'visi_misi'])->with('success', 'File dokumen Visi & Misi berhasil dihapus!');
    }

    public function updateTugasFungsi(Request $request)
    {
        $profil = TugasFungsi::first();
        if (!$profil) {
            $profil = new TugasFungsi();
        }

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'header_badge' => 'nullable|string|max:100',
            'header_title' => 'required|string|max:255',
            'header_subtitle' => 'nullable|string',
            'stat_sekolah' => 'nullable|string|max:50',
            'stat_guru' => 'nullable|string|max:50',
            'stat_siswa' => 'nullable|string|max:50',
            'stat_cagar_budaya' => 'nullable|string|max:50',
            'tugas_pokok' => 'required|string',
            'tugas_pembantuan' => 'nullable|string',
            'catatan_kewenangan' => 'nullable|string',
            'image_file' => 'nullable|image|max:10240',
            'document_file' => 'nullable|file|max:20480',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $profil->header_badge = $request->header_badge ?: 'Pemerintah Provinsi Maluku';
        $profil->header_title = $request->header_title;
        $profil->header_subtitle = $request->header_subtitle;
        $profil->stat_sekolah = $request->stat_sekolah ?: '345+';
        $profil->stat_guru = $request->stat_guru ?: '8.2K';
        $profil->stat_siswa = $request->stat_siswa ?: '112K';
        $profil->stat_cagar_budaya = $request->stat_cagar_budaya ?: '56+';
        $profil->tugas_pokok = $request->tugas_pokok;
        $profil->tugas_pembantuan = $request->tugas_pembantuan;
        $profil->catatan_kewenangan = $request->catatan_kewenangan;

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $dest = public_path('images/profil');
            if (!file_exists($dest)) {
                mkdir($dest, 0755, true);
            }

            if ($profil->image_tugas && str_starts_with($profil->image_tugas, '/images/profil/') && file_exists(public_path($profil->image_tugas))) {
                @unlink(public_path($profil->image_tugas));
            }

            $filename = 'tugas_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($dest, $filename);
            $profil->image_tugas = '/images/profil/' . $filename;
        }

        if ($request->hasFile('document_file')) {
            $file = $request->file('document_file');
            $dest = public_path('uploads/profil');
            if (!file_exists($dest)) {
                mkdir($dest, 0755, true);
            }

            if ($profil->file_path && file_exists(public_path($profil->file_path))) {
                @unlink(public_path($profil->file_path));
            }

            $origName = $file->getClientOriginalName();
            $filename = 'tupoksi_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($dest, $filename);

            $sizeBytes = @filesize($dest . '/' . $filename);
            $sizeFormatted = $sizeBytes ? round($sizeBytes / 1048576, 2) . ' MB' : null;

            $profil->file_path = '/uploads/profil/' . $filename;
            $profil->file_name = $origName;
            $profil->file_size = $sizeFormatted;
        }

        $profil->save();

        return redirect()->route('admin.profil', ['tab' => 'tugas_fungsi'])->with('success', 'Data Tugas & Fungsi dan Dokumen berhasil diperbarui!');
    }

    public function deleteFileTugasFungsi()
    {
        $profil = TugasFungsi::first();
        if ($profil && $profil->file_path) {
            $fullPath = public_path($profil->file_path);
            if (file_exists($fullPath)) {
                @unlink($fullPath);
            }
            $profil->file_path = null;
            $profil->file_name = null;
            $profil->file_size = null;
            $profil->save();
        }

        return redirect()->route('admin.profil', ['tab' => 'tugas_fungsi'])->with('success', 'File dokumen Tupoksi berhasil dihapus!');
    }

    public function deleteImageTugasFungsi()
    {
        $profil = TugasFungsi::first();
        if ($profil && $profil->image_tugas) {
            if (str_starts_with($profil->image_tugas, '/images/profil/') && file_exists(public_path($profil->image_tugas))) {
                @unlink(public_path($profil->image_tugas));
            }
            $profil->image_tugas = 'https://placehold.co/800x600/1e3a8a/ffffff?text=Pendidikan+Maluku';
            $profil->save();
        }

        return redirect()->route('admin.profil', ['tab' => 'tugas_fungsi'])->with('success', 'Foto ilustrasi tugas berhasil direset ke default!');
    }

    public function updateStrukturOrganisasi(Request $request)
    {
        $profil = StrukturOrganisasi::first();
        if (!$profil) {
            $profil = new StrukturOrganisasi();
        }

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'header_badge' => 'nullable|string|max:100',
            'header_title' => 'required|string|max:255',
            'header_subtitle' => 'nullable|string',
            'bagan_file' => 'nullable|image|max:20480',
            'document_file' => 'nullable|file|max:20480',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $profil->header_badge = $request->header_badge ?: 'Dashboard Informasi';
        $profil->header_title = $request->header_title;
        $profil->header_subtitle = $request->header_subtitle;

        if ($request->hasFile('bagan_file')) {
            $file = $request->file('bagan_file');
            $dest = public_path('images/profil');
            if (!file_exists($dest)) {
                mkdir($dest, 0755, true);
            }

            if ($profil->bagan_image && file_exists(public_path($profil->bagan_image))) {
                @unlink(public_path($profil->bagan_image));
            }

            $filename = 'bagan_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($dest, $filename);
            $profil->bagan_image = '/images/profil/' . $filename;
        }

        if ($request->hasFile('document_file')) {
            $file = $request->file('document_file');
            $dest = public_path('uploads/profil');
            if (!file_exists($dest)) {
                mkdir($dest, 0755, true);
            }

            if ($profil->file_path && file_exists(public_path($profil->file_path))) {
                @unlink(public_path($profil->file_path));
            }

            $origName = $file->getClientOriginalName();
            $filename = 'sk_struktur_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($dest, $filename);

            $sizeBytes = @filesize($dest . '/' . $filename);
            $sizeFormatted = $sizeBytes ? round($sizeBytes / 1048576, 2) . ' MB' : null;

            $profil->file_path = '/uploads/profil/' . $filename;
            $profil->file_name = $origName;
            $profil->file_size = $sizeFormatted;
        }

        $profil->save();

        return redirect()->route('admin.profil', ['tab' => 'struktur_organisasi'])->with('success', 'Data Struktur Organisasi dan File berhasil diperbarui!');
    }

    public function deleteBaganStrukturOrganisasi()
    {
        $profil = StrukturOrganisasi::first();
        if ($profil && $profil->bagan_image) {
            $fullPath = public_path($profil->bagan_image);
            if (file_exists($fullPath)) {
                @unlink($fullPath);
            }
            $profil->bagan_image = null;
            $profil->save();
        }

        return redirect()->route('admin.profil', ['tab' => 'struktur_organisasi'])->with('success', 'File bagan struktur organisasi berhasil dihapus!');
    }

    public function deleteFileStrukturOrganisasi()
    {
        $profil = StrukturOrganisasi::first();
        if ($profil && $profil->file_path) {
            $fullPath = public_path($profil->file_path);
            if (file_exists($fullPath)) {
                @unlink($fullPath);
            }
            $profil->file_path = null;
            $profil->file_name = null;
            $profil->file_size = null;
            $profil->save();
        }

        return redirect()->route('admin.profil', ['tab' => 'struktur_organisasi'])->with('success', 'File dokumen SK Struktur Organisasi berhasil dihapus!');
    }


    // =========================================================================
    // LAYANAN SOP 14 KOMPONEN & PENGAJUAN BERKAS DARI APLIKASI
    // =========================================================================

    public function uploadSopSubmission(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'service_code' => 'required|string|max:50',
            'sender_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:100',
            'instance' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'document_file' => 'required|file|max:25600',
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
            }
            return back()->withErrors($validator)->withInput();
        }

        $sop = LayananSop::where('service_code', $request->service_code)->first();
        $bidang = $sop ? $sop->bidang : ($request->bidang ?? 'umum');
        $serviceTitle = $sop ? $sop->service_title : ($request->service_title ?? $request->service_code);

        $file = $request->file('document_file');
        $dest = public_path('uploads/sop_submissions');
        if (!file_exists($dest)) {
            mkdir($dest, 0755, true);
        }

        $origName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $cleanCode = preg_replace('/[^A-Za-z0-9_-]/', '_', $request->service_code);
        $filename = 'sub_' . strtolower($cleanCode) . '_' . time() . '_' . uniqid() . '.' . $extension;
        $file->move($dest, $filename);

        $sizeBytes = @filesize($dest . '/' . $filename);
        $sizeFormatted = $sizeBytes ? round($sizeBytes / 1048576, 2) . ' MB' : null;

        $submission = LayananSopSubmission::create([
            'service_code' => $request->service_code,
            'bidang' => $bidang,
            'service_title' => $serviceTitle,
            'sender_name' => $request->sender_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'instance' => $request->instance,
            'notes' => $request->notes,
            'file_path' => '/uploads/sop_submissions/' . $filename,
            'file_name' => $origName,
            'file_size' => $sizeFormatted,
            'file_type' => $extension,
            'status' => 'Menunggu Review',
        ]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Berkas permohonan layanan berhasil dikirim dan tersimpan di database Dinas Pendidikan!',
                'data' => $submission
            ]);
        }

        return back()->with('success', 'Berkas permohonan layanan ' . $request->service_code . ' berhasil diunggah!');
    }

    public function downloadLayananDocument($id)
    {
        $submission = LayananSopSubmission::findOrFail($id);

        if ($submission->file_path && file_exists(public_path($submission->file_path))) {
            $fullPath = public_path($submission->file_path);
            $downloadName = $submission->file_name ?: basename($submission->file_path);
            return response()->download($fullPath, $downloadName);
        }

        return response()->view('dokumen-layanan-print', [
            'submission' => $submission,
            'isApproved' => in_array($submission->status, ['Disetujui', 'Selesai']),
        ]);
    }

    public function sopIndex(Request $request)
    {
        $tab = $request->query('tab', 'submissions');
        $selectedBidang = $request->query('bidang', 'all');
        $search = $request->query('q', '');

        $subQuery = LayananSopSubmission::orderBy('created_at', 'desc');
        if ($selectedBidang !== 'all') {
            $subQuery->where('bidang', $selectedBidang);
        }
        if (!empty($search)) {
            $subQuery->where(function($q) use ($search) {
                $q->where('sender_name', 'like', "%{$search}%")
                  ->orWhere('service_code', 'like', "%{$search}%")
                  ->orWhere('instance', 'like', "%{$search}%")
                  ->orWhere('service_title', 'like', "%{$search}%");
            });
        }
        $submissions = $subQuery->paginate(15)->appends($request->all());

        $sopQuery = LayananSop::orderBy('service_code', 'asc');
        if ($selectedBidang !== 'all') {
            $sopQuery->where('bidang', $selectedBidang);
        }
        $sops = $sopQuery->get();

        $stats = [
            'total_submissions' => LayananSopSubmission::count(),
            'pending_submissions' => LayananSopSubmission::where('status', 'Menunggu Review')->count(),
            'processed_submissions' => LayananSopSubmission::where('status', 'Diproses')->count(),
            'completed_submissions' => LayananSopSubmission::where('status', 'Selesai')->count(),
            'total_sops' => LayananSop::count(),
            'sops_with_file' => LayananSop::whereNotNull('official_sop_file')->count(),
        ];

        return view('dashboard', [
            'view_type' => 'sop',
            'tab' => $tab,
            'selectedBidang' => $selectedBidang,
            'submissions' => $submissions,
            'sops' => $sops,
            'stats' => $stats,
            'search' => $search
        ]);
    }

    public function uploadMasterSop(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'service_id' => 'required|exists:layanan_sop,id',
            'sop_file' => 'required|file|max:25600',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $sop = LayananSop::findOrFail($request->service_id);
        $file = $request->file('sop_file');
        $dest = public_path('uploads/sop_master');
        if (!file_exists($dest)) {
            mkdir($dest, 0755, true);
        }

        if ($sop->official_sop_file && file_exists(public_path($sop->official_sop_file))) {
            @unlink(public_path($sop->official_sop_file));
        }

        $origName = $file->getClientOriginalName();
        $cleanCode = preg_replace('/[^A-Za-z0-9_-]/', '_', $sop->service_code);
        $filename = 'master_sop_' . strtolower($cleanCode) . '_' . time() . '.' . $file->getClientOriginalExtension();
        $file->move($dest, $filename);

        $sizeBytes = @filesize($dest . '/' . $filename);
        $sizeFormatted = $sizeBytes ? round($sizeBytes / 1048576, 2) . ' MB' : null;

        $sop->official_sop_file = '/uploads/sop_master/' . $filename;
        $sop->official_sop_name = $origName;
        $sop->official_sop_size = $sizeFormatted;
        $sop->save();

        return redirect()->route('admin.sop', ['tab' => 'master', 'bidang' => $sop->bidang])
            ->with('success', "Dokumen SOP 14 Komponen untuk {$sop->service_code} ({$sop->service_title}) berhasil diunggah!");
    }

    public function deleteMasterSop($id)
    {
        $sop = LayananSop::findOrFail($id);
        if ($sop->official_sop_file && file_exists(public_path($sop->official_sop_file))) {
            @unlink(public_path($sop->official_sop_file));
        }
        $sop->official_sop_file = null;
        $sop->official_sop_name = null;
        $sop->official_sop_size = null;
        $sop->save();

        return redirect()->route('admin.sop', ['tab' => 'master', 'bidang' => $sop->bidang])
            ->with('success', "Dokumen SOP resmi untuk {$sop->service_code} berhasil dihapus!");
    }

    public function updateSopSubmissionStatus(Request $request, $id)
    {
        $submission = LayananSopSubmission::findOrFail($id);
        $submission->status = $request->status ?? $submission->status;
        if ($request->has('admin_notes')) {
            $submission->admin_notes = $request->admin_notes;
        }
        $submission->save();

        return back()->with('success', "Status berkas permohonan {$submission->service_code} ({$submission->sender_name}) berhasil diperbarui!");
    }

    public function destroySopSubmission($id)
    {
        $submission = LayananSopSubmission::findOrFail($id);
        if ($submission->file_path && file_exists(public_path($submission->file_path))) {
            @unlink(public_path($submission->file_path));
        }
        $submission->delete();

        return back()->with('success', "Berkas permohonan berhasil dihapus dari database dan server!");
    }

    public function bannerIklan()
    {
        $banners = BannerIklan::orderBy('order', 'asc')->get();
        return view('dashboard', [
            'view_type' => 'banner_iklan',
            'banners' => $banners
        ]);
    }

    public function storeBannerIklan(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'image' => 'nullable|file|image|max:10240',
            'image_url' => 'nullable|string|max:500',
            'link_url' => 'nullable|string|max:500',
            'target' => 'nullable|string|max:20',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (!$request->hasFile('image') && !$request->filled('image_url')) {
            return back()->withErrors(['image' => 'Silakan unggah berkas gambar banner atau isi URL gambar.'])->withInput();
        }

        $data = $validator->validated();
        $data['order'] = $data['order'] ?? (BannerIklan::count() + 1);
        $data['type'] = $request->type ?? 'iklan';
        $data['is_active'] = $request->has('is_active') ? true : false;
        $data['target'] = $request->target ?? '_self';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'banner_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $dest = public_path('uploads/banners');
            if (!file_exists($dest)) {
                mkdir($dest, 0755, true);
            }
            $file->move($dest, $filename);
            $data['image'] = '/uploads/banners/' . $filename;
        } elseif ($request->filled('image_url')) {
            $data['image'] = $request->image_url;
        }

        unset($data['image_url']);

        BannerIklan::create($data);

        return back()->with('success', 'Banner infografis / foto iklan baru berhasil ditambahkan ke database!');
    }

    public function updateBannerIklan(Request $request, $id)
    {
        $banner = BannerIklan::findOrFail($id);

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'image' => 'nullable|file|image|max:10240',
            'image_url' => 'nullable|string|max:500',
            'link_url' => 'nullable|string|max:500',
            'target' => 'nullable|string|max:20',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['order'] = $data['order'] ?? $banner->order;
        $data['type'] = $request->type ?? ($banner->type ?? 'iklan');
        $data['is_active'] = $request->has('is_active') ? true : false;
        $data['target'] = $request->target ?? ($banner->target ?? '_self');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $dest = public_path('uploads/banners');
            if (!file_exists($dest)) {
                mkdir($dest, 0755, true);
            }
            if ($banner->image && str_starts_with($banner->image, '/uploads/banners/') && file_exists(public_path($banner->image))) {
                @unlink(public_path($banner->image));
            }
            $filename = 'banner_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($dest, $filename);
            $data['image'] = '/uploads/banners/' . $filename;
        } elseif ($request->filled('image_url')) {
            $data['image'] = $request->image_url;
        }

        unset($data['image_url']);

        $banner->update($data);

        return back()->with('success', 'Banner infografis / foto iklan berhasil diperbarui!');
    }

    public function destroyBannerIklan($id)
    {
        $banner = BannerIklan::findOrFail($id);
        if ($banner->image && str_starts_with($banner->image, '/uploads/banners/') && file_exists(public_path($banner->image))) {
            @unlink(public_path($banner->image));
        }
        $banner->delete();

        return back()->with('success', 'Banner infografis / foto iklan berhasil dihapus!');
    }

}
