<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggaran;

class AnggaranController extends Controller
{
    public function index()
    {
        $anggarans = Anggaran::orderBy('created_at', 'desc')->get();
        // Return view and pass anggarans
        return view('anggaran', compact('anggarans'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_anggaran' => 'required|string',
            'title' => 'required|string',
            'desc' => 'required|string',
            'category' => 'required|string',
            'region' => 'required|string',
            'pagu' => 'required|numeric',
            'realisasi' => 'required|numeric',
            'doc' => 'nullable|url',
        ]);

        $anggaran = Anggaran::updateOrCreate(
            ['kode_anggaran' => $data['kode_anggaran']],
            $data
        );

        return response()->json(['success' => true, 'data' => $anggaran]);
    }

    public function destroy($kode_anggaran)
    {
        Anggaran::where('kode_anggaran', $kode_anggaran)->delete();
        return response()->json(['success' => true]);
    }

    public function reset()
    {
        // Delete all
        Anggaran::truncate();
        
        // Seed default
        $defaults = [
            ['kode_anggaran' => 'ANG-2026-001', 'title' => 'Pembangunan & Renovasi Ruang Kelas SMA/SMK Kab. Seram Bagian Barat', 'desc' => 'Alokasi DAK Fisik Bidang Pendidikan untuk renovasi 12 unit ruang kelas, laboratorium komputer, dan sanitasi sekolah menengah di wilayah SBB.', 'category' => 'Sarpras', 'region' => 'Kab. Seram Bagian Barat', 'pagu' => 12500000000, 'realisasi' => 10200000000, 'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'],
            ['kode_anggaran' => 'ANG-2026-004', 'title' => 'Program Digitalisasi Sekolah & Peralatan TIK ANBK Kepulauan Tanimbar', 'desc' => 'Pengadaan laptop, chromebook, proyektor, serta fasilitas satelit internet broadband untuk sekolah pendukung Asesmen Nasional Mandiri di Tanimbar.', 'category' => 'Sarpras', 'region' => 'Kab. Kepulauan Tanimbar', 'pagu' => 6200000000, 'realisasi' => 5800000000, 'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'],
            ['kode_anggaran' => 'ANG-2026-006', 'title' => 'Pembangunan Laboratorium IPA & Komputer SMA Negeri 1 Namlea Kab. Buru', 'desc' => 'Pekerjaan fisik konstruksi gedung lab sains terpadu, jaringan LAN internal, beserta instrumen praktikum fisika, kimia, dan biologi.', 'category' => 'Sarpras', 'region' => 'Kab. Buru', 'pagu' => 4800000000, 'realisasi' => 4100000000, 'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'],
            ['kode_anggaran' => 'ANG-2026-007', 'title' => 'Rehabilitasi Berat Gedung SMKN 1 Kota Ambon & Peralatan Bengkel Vokasi', 'desc' => 'Revitalisasi ruang praktik keahlian maritim, permesinan, jaringan komputer, serta peremajaan fasilitas belajar bengkel kejuruan di Kota Ambon.', 'category' => 'Sarpras', 'region' => 'Kota Ambon', 'pagu' => 15600000000, 'realisasi' => 14200000000, 'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'],
            ['kode_anggaran' => 'ANG-2026-008', 'title' => 'Pembangunan Rumah Dinas Guru & Asrama Siswa Terpencil Maluku Barat Daya', 'desc' => 'Penyediaan hunian layak bagi tenaga pendidik dan perumahan siswa pulau terluar di wilayah MBD guna menjamin pemerataan mutu pendidikan.', 'category' => 'Sarpras', 'region' => 'Kab. Maluku Barat Daya', 'pagu' => 8400000000, 'realisasi' => 7100000000, 'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'],
            ['kode_anggaran' => 'ANG-2026-009', 'title' => 'Pengadaan Bus Sekolah & Speedboat Transportasi Siswa Kepulauan Aru', 'desc' => 'Pengadaan sarana armada perahu motor antarpulau dan kendaraan darat pendukung mobilitas siswa & guru di gugusan Kepulauan Aru.', 'category' => 'Sarpras', 'region' => 'Kab. Kepulauan Aru', 'pagu' => 9500000000, 'realisasi' => 8900000000, 'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'],
            ['kode_anggaran' => 'ANG-2026-002', 'title' => 'Penyaluran Dana BOS Daerah & Beasiswa Maluku Cerdas 2026', 'desc' => 'Bantuan operasional sekolah daerah bagi jenjang SMA/SMK/SLB serta bantuan biaya pendidikan perguruan tinggi mahasiswa berprestasi.', 'category' => 'BOS', 'region' => 'Kota Ambon', 'pagu' => 28400000000, 'realisasi' => 25100000000, 'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'],
            ['kode_anggaran' => 'ANG-2026-010', 'title' => 'Program Beasiswa Kedokteran & Sains Unggulan Kab. Maluku Tengah', 'desc' => 'Bantuan Beasiswa Pendidikan Tinggi kedokteran, farmasi, dan teknik energi kelautan bagi putra-putri daerah lulusan SMA asal Maluku Tengah.', 'category' => 'BOS', 'region' => 'Kab. Maluku Tengah', 'pagu' => 14000000000, 'realisasi' => 12600000000, 'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'],
            ['kode_anggaran' => 'ANG-2026-011', 'title' => 'BOSDA Jenjang SLB & Sekolah Inklusi Khusus Kota Tual', 'desc' => 'Penyaluran dana dukungan operasional khusus bagi Sekolah Luar Biasa (SLB) dan penyediaan alat bantu aksesibilitas belajar penyandang disabilitas.', 'category' => 'BOS', 'region' => 'Kota Tual', 'pagu' => 7300000000, 'realisasi' => 6800000000, 'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'],
            ['kode_anggaran' => 'ANG-2026-012', 'title' => 'Subsidi Bantuan Biaya Pendidikan Mahasiswa 3T Seram Bagian Timur', 'desc' => 'Bantuan langsung uang kuliah tunggal (UKT) dan biaya hidup untuk mahasiswa kurang mampu yang berasal dari daerah terpencil Seram Bagian Timur.', 'category' => 'BOS', 'region' => 'Kab. Seram Bagian Timur', 'pagu' => 5500000000, 'realisasi' => 4900000000, 'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'],
            ['kode_anggaran' => 'ANG-2026-013', 'title' => 'Beasiswa Afirmasi Pendidikan Menengah (ADEM) Kab. Buru Selatan', 'desc' => 'Program pembiayaan siswa berprestasi asal pedalaman Buru Selatan untuk melanjutkan studi menengah atas berkualitas di pusat provinsi.', 'category' => 'BOS', 'region' => 'Kab. Buru Selatan', 'pagu' => 6100000000, 'realisasi' => 5400000000, 'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'],
            ['kode_anggaran' => 'ANG-2026-003', 'title' => 'Tunjangan Khusus & Insentif Guru Terpencil (3T) Kepulauan Aru', 'desc' => 'Pembayaran alokasi tunjangan profesi dan insentif daerah khusus bagi guru non-PNS dan PNS di wilayah perbatasan dan kepulauan terluar.', 'category' => 'SDM', 'region' => 'Kab. Kepulauan Aru', 'pagu' => 8900000000, 'realisasi' => 8100000000, 'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'],
            ['kode_anggaran' => 'ANG-2026-014', 'title' => 'Sertifikasi Kompetensi & PPG Guru SMA/SMK Kab. Maluku Tenggara', 'desc' => 'Penyelenggaraan Diklat Pendidikan Profesi Guru (PPG), uji sertifikasi guru vokasi, dan peningkatan profesionalisme pimpinan sekolah.', 'category' => 'SDM', 'region' => 'Kab. Maluku Tenggara', 'pagu' => 5200000000, 'realisasi' => 4700000000, 'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'],
            ['kode_anggaran' => 'ANG-2026-015', 'title' => 'Insentif Daerah Honorer/Tenaga Pendidik Non-PNS Maluku Barat Daya', 'desc' => 'Alokasi insentif honor daerah reguler bulanan bagi guru kontrak non-ASN yang mengajar di gugusan pulau terluar kabupaten MBD.', 'category' => 'SDM', 'region' => 'Kab. Maluku Barat Daya', 'pagu' => 11300000000, 'realisasi' => 10500000000, 'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'],
            ['kode_anggaran' => 'ANG-2026-016', 'title' => 'Tunjangan Profesi Guru (TPG) & Sertifikasi Seram Bagian Barat', 'desc' => 'Penyaluran dana TPG Aparatur Sipil Negara (ASN) guru SMA/SMK/SLB semester pertama di wilayah Kabupaten Seram Bagian Barat.', 'category' => 'SDM', 'region' => 'Kab. Seram Bagian Barat', 'pagu' => 18700000000, 'realisasi' => 17200000000, 'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'],
            ['kode_anggaran' => 'ANG-2026-017', 'title' => 'Pelatihan Peningkatan Kapasitas Kepala Sekolah & Pengawas Kab. Buru', 'desc' => 'Program lokakarya kepemimpinan pembelajaran, manajemen kurikulum merdeka, serta digitalisasi tata kelola administrasi sekolah.', 'category' => 'SDM', 'region' => 'Kab. Buru', 'pagu' => 3800000000, 'realisasi' => 3400000000, 'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'],
            ['kode_anggaran' => 'ANG-2026-005', 'title' => 'Pelestarian Sanggar Seni & Pemugaran Cagar Budaya Banda Neira', 'desc' => 'Hibah pembinaan lembaga adat, pemugaran cagar budaya benteng sejarah, serta gelaran Pesona Budaya Negeri-Negeri di Maluku Tengah.', 'category' => 'Kebudayaan', 'region' => 'Kab. Maluku Tengah', 'pagu' => 4500000000, 'realisasi' => 3900000000, 'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'],
            ['kode_anggaran' => 'ANG-2026-018', 'title' => 'Konservasi Benteng Duenstede & Situs Sejarah Saparua', 'desc' => 'Pekerjaan perbaikan fisik penataan situs benteng peninggalan masa kolonial dan pemeliharaan rumah pahlawan nasional Pattimura.', 'category' => 'Kebudayaan', 'region' => 'Kab. Maluku Tengah', 'pagu' => 6800000000, 'realisasi' => 5900000000, 'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'],
            ['kode_anggaran' => 'ANG-2026-019', 'title' => 'Pekan Kebudayaan Daerah & Festival Seni Musik Ukulele Kota Ambon', 'desc' => 'Penyelenggaraan pentas seni daerah tahunan, pawai kebudayaan Maluku, dan perlombaan musik alat musik tradisional khas Ambon.', 'category' => 'Kebudayaan', 'region' => 'Kota Ambon', 'pagu' => 3200000000, 'realisasi' => 3000000000, 'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'],
            ['kode_anggaran' => 'ANG-2026-020', 'title' => 'Digitalisasi Manuskrip Kuno & Warisan Budaya Takbenda (WBTb) Tanimbar', 'desc' => 'Inisiatif pencatatan, dokumentasi audio-visual kain tenun ikat Tanimbar, manuskrip tutur tua, serta perlindungan situs cagar budaya.', 'category' => 'Kebudayaan', 'region' => 'Kab. Kepulauan Tanimbar', 'pagu' => 2900000000, 'realisasi' => 2500000000, 'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'],
            ['kode_anggaran' => 'ANG-2026-021', 'title' => 'Revitalisasi Museum Negeri Siwalima & Pembinaan Sanggar Tari Ambon', 'desc' => 'Pengembangan tata pameran koleksi ethnografi Museum Siwalima serta pembinaan sarana prasarana puluhan sanggar tari tradisional.', 'category' => 'Kebudayaan', 'region' => 'Kota Ambon', 'pagu' => 4100000000, 'realisasi' => 3700000000, 'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'],
            ['kode_anggaran' => 'ANG-2026-022', 'title' => 'Restorasi Rumah Adat (Baileo) & Konservasi Situs Maluku Tenggara', 'desc' => 'Bantuan pemeliharaan fisik gubug adat/Baileo negeri-negeri adat di Maluku Tenggara dalam rangka melestarikan identitas hukum adat.', 'category' => 'Kebudayaan', 'region' => 'Kab. Maluku Tenggara', 'pagu' => 5400000000, 'realisasi' => 4800000000, 'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf']
        ];
        
        foreach ($defaults as $item) {
            Anggaran::create($item);
        }

        return response()->json(['success' => true]);
    }
}

