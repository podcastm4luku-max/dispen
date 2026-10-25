<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Post;
use App\Models\Agenda;
use App\Models\Complaint;
use App\Models\PpidRequest;
use App\Models\Anggaran;
use App\Models\PortalNews;
use App\Models\PortalCulture;
use App\Models\SkmResponse;
use App\Models\Visitor;
use App\Models\MonevStat;
use App\Models\MonevRegion;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. User Admin (Max 1-5 records)
        User::updateOrCreate(
            ['email' => 'admin@malukuprov.go.id'],
            [
                'name' => 'Administrator Utama Disdikbud Maluku',
                'password' => Hash::make('admin12345'),
            ]
        );

        // 2. Berita & Pengumuman (Post Model - Max 5 records)
        Post::truncate();
        $posts = [
            [
                'title' => 'Disdikbud Maluku Salurkan Dana BOS Tahap I ke 1.500 Sekolah se-Maluku',
                'type' => 'Program Prioritas',
                'status' => 'Published',
                'content' => 'Dinas Pendidikan dan Kebudayaan Provinsi Maluku resmi menyalurkan Dana Bantuan Operasional Sekolah (BOS) Tahap I Tahun Anggaran 2026 kepada lebih dari 1.500 satuan pendidikan SMA, SMK, dan SLB di seluruh wilayah kabupaten/kota se-Provinsi Maluku guna menunjang kelancaran operasional belajar mengajar.',
                'image' => 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=1200&auto=format&fit=crop',
                'created_at' => \Carbon\Carbon::create(2026, 1, 20, 9, 0, 0),
            ],
            [
                'title' => 'Pameran Seni Budaya Maluku Digelar Meriah di Taman Budaya Karang Panjang',
                'type' => 'Kebudayaan',
                'status' => 'Published',
                'content' => 'Taman Budaya Karang Panjang Kota Ambon menjadi saksi semaraknya Pameran Seni Budaya dan Warisan Takbenda Maluku 2026. Acara yang dibuka oleh Disdikbud Maluku ini menampilkan ragam tari tradisional, pameran tenun ikat, seni musik hawaian, serta kuliner khas kepulauan.',
                'image' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?q=80&w=1200&auto=format&fit=crop',
                'created_at' => \Carbon\Carbon::create(2026, 1, 15, 10, 30, 0),
            ],
            [
                'title' => 'Pelatihan Peningkatan Kompetensi Guru SMA/SMK se-Provinsi Maluku',
                'type' => 'Tenaga Pendidik',
                'status' => 'Published',
                'content' => 'Bidang Pembinaan GTK Disdikbud Maluku menyelenggarakan bimbingan teknis dan lokakarya peningkatan kompetensi pedagogik serta digitalisasi pembelajaran bagi ratusan guru SMA dan SMK se-Provinsi Maluku guna meningkatkan mutu kelulusan siswa.',
                'image' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=1200&auto=format&fit=crop',
                'created_at' => \Carbon\Carbon::create(2026, 1, 8, 8, 0, 0),
            ],
            [
                'title' => 'Disdikbud Maluku Gelar Rakor Penguatan Mutu Pendidikan SMA/SMK Se-Provinsi Maluku 2026',
                'type' => 'Berita',
                'status' => 'Published',
                'content' => 'Dinas Pendidikan dan Kebudayaan Provinsi Maluku menggelar Rapat Koordinasi (Rakor) Penguatan Mutu Pendidikan Menengah dan Khusus tahun 2026. Kegiatan yang dihadiri oleh seluruh Kepala Cabang Dinas dan Kepala SMA/SMK/SLB se-Maluku ini berfokus pada pemerataan fasilitas pembelajaran digital, penguatan Kurikulum Merdeka berbasis kearifan lokal, serta peningkatan akreditasi satuan pendidikan di wilayah kepulauan.',
                'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1200&auto=format&fit=crop',
                'created_at' => \Carbon\Carbon::create(2026, 1, 3, 9, 0, 0),
            ],
            [
                'title' => 'Pengumuman Penyaluran Dana BOS Daerah & Beasiswa Maluku Cerdas Tahap I Tahun 2026',
                'type' => 'Pengumuman',
                'status' => 'Published',
                'content' => 'Diberitahukan kepada seluruh satuan pendidikan SMA, SMK, dan SLB di Provinsi Maluku bahwa pencairan Dana Bantuan Operasional Sekolah Daerah (BOSDA) dan Beasiswa Afirmasi Mahasiswa Berprestasi Maluku Cerdas Tahap I Tahun Anggaran 2026 telah disalurkan ke rekening resmi masing-masing sekolah dan penerima manfaat.',
                'image' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?q=80&w=1200&auto=format&fit=crop',
                'created_at' => \Carbon\Carbon::create(2026, 1, 1, 14, 0, 0),
            ],
        ];
        foreach ($posts as $p) {
            Post::create($p);
        }

        // 3. Agenda Kegiatan (Agenda Model - Max 5 records)
        Agenda::truncate();
        $agendas = [
            [
                'title' => 'Rapat Koordinasi Evaluasi Penyerapan DAK Fisik &amp; Non-Fisik Pendidikan 2026',
                'date' => now()->addDays(2)->format('Y-m-d'),
                'location' => 'Aula Utama Lantai 3 Kantor Disdikbud Prov. Maluku (09:00 WIT)',
            ],
            [
                'title' => 'Bimbingan Teknis Implementasi Kurikulum Merdeka Jenjang SMA/SMK Kepulauan',
                'date' => now()->addDays(5)->format('Y-m-d'),
                'location' => 'Hotel Marina Ambon &amp; Virtual Zoom (08:30 WIT)',
            ],
            [
                'title' => 'Pekan Seni Budaya Daerah &amp; Pameran Cagar Budaya Maluku 2026',
                'date' => now()->addDays(8)->format('Y-m-d'),
                'location' => 'Taman Budaya Karang Panjang Kota Ambon (10:00 WIT)',
            ],
            [
                'title' => 'Uji Sertifikasi Profesi dan Uji Kompetensi Keahlian (UKK) Siswa SMK',
                'date' => now()->addDays(12)->format('Y-m-d'),
                'location' => 'LSP SMKN 1 dan SMKN 3 Kota Ambon (08:00 WIT)',
            ],
            [
                'title' => 'Sosialisasi Pengawasan Pelayanan Publik &amp; Pencegahan Pungli Bersama Ombudsman RI',
                'date' => now()->addDays(15)->format('Y-m-d'),
                'location' => 'Ruang Rapat Integritas Disdikbud Maluku (09:00 WIT)',
            ],
        ];
        foreach ($agendas as $a) {
            Agenda::create($a);
        }

        // 4. Transparansi Anggaran (Anggaran Model - Max 5 records)
        Anggaran::truncate();
        $anggarans = [
            [
                'kode_anggaran' => 'ANG-2026-001',
                'title' => 'Pembangunan &amp; Renovasi Ruang Kelas SMA/SMK Kab. Seram Bagian Barat',
                'desc' => 'Alokasi DAK Fisik Bidang Pendidikan untuk renovasi 12 unit ruang kelas, laboratorium komputer, dan sanitasi sekolah menengah di wilayah SBB.',
                'category' => 'Sarpras',
                'region' => 'Kab. Seram Bagian Barat',
                'pagu' => 12500000000,
                'realisasi' => 10200000000,
                'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf',
            ],
            [
                'kode_anggaran' => 'ANG-2026-002',
                'title' => 'Penyaluran Dana BOS Daerah &amp; Beasiswa Maluku Cerdas 2026',
                'desc' => 'Bantuan operasional sekolah daerah bagi jenjang SMA/SMK/SLB serta bantuan biaya pendidikan perguruan tinggi mahasiswa berprestasi.',
                'category' => 'BOS',
                'region' => 'Kota Ambon',
                'pagu' => 28400000000,
                'realisasi' => 25100000000,
                'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf',
            ],
            [
                'kode_anggaran' => 'ANG-2026-003',
                'title' => 'Tunjangan Khusus &amp; Insentif Guru Terpencil (3T) Kepulauan Aru',
                'desc' => 'Pembayaran alokasi tunjangan profesi dan insentif daerah khusus bagi guru non-PNS dan PNS di wilayah perbatasan dan kepulauan terluar.',
                'category' => 'SDM',
                'region' => 'Kab. Kepulauan Aru',
                'pagu' => 8900000000,
                'realisasi' => 8100000000,
                'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf',
            ],
            [
                'kode_anggaran' => 'ANG-2026-004',
                'title' => 'Program Digitalisasi Sekolah &amp; Peralatan TIK ANBK Kepulauan Tanimbar',
                'desc' => 'Pengadaan laptop, chromebook, proyektor, serta fasilitas satelit internet broadband untuk sekolah pendukung Asesmen Nasional Mandiri di Tanimbar.',
                'category' => 'Sarpras',
                'region' => 'Kab. Kepulauan Tanimbar',
                'pagu' => 6200000000,
                'realisasi' => 5800000000,
                'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf',
            ],
            [
                'kode_anggaran' => 'ANG-2026-005',
                'title' => 'Pelestarian Sanggar Seni &amp; Pemugaran Cagar Budaya Banda Neira',
                'desc' => 'Hibah pembinaan lembaga adat, pemugaran cagar budaya benteng sejarah, serta gelaran Pesona Budaya Negeri-Negeri di Maluku Tengah.',
                'category' => 'Kebudayaan',
                'region' => 'Kab. Maluku Tengah',
                'pagu' => 4500000000,
                'realisasi' => 3900000000,
                'doc' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf',
            ],
        ];
        foreach ($anggarans as $ang) {
            Anggaran::create($ang);
        }

        // 5. Portal News (PortalNews Model - Max 5 records)
        PortalNews::truncate();
        $pNews = [
            [
                'title' => 'Digitalisasi Sekolah Kepulauan: 120 Sekolah di Maluku Terima Perangkat Satelit dan Chromebook',
                'category' => 'berita',
                'date' => '10 Sep 2026',
                'read_time' => '3 Menit',
                'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=1200&auto=format&fit=crop',
                'summary' => 'Pemerataan akses teknologi informasi melalui bantuan perangkat satelit internet bagi satuan pendidikan di pulau terluar.',
                'content' => 'Pemerataan akses teknologi informasi di satuan pendidikan 3T Maluku menjadi prioritas utama. Melalui program DAK Digitalisasi 2026, sebanyak 120 sekolah di wilayah terpencil mendapatkan fasilitas internet satelit dan laboratorium chromebook guna mendukung Asesmen Nasional Berbasis Komputer (ANBK).',
                'is_featured' => true,
            ],
            [
                'title' => 'Revitalisasi Bahasa Daerah Maluku Masuk Kurikulum Muatan Lokal SMA dan SMK',
                'category' => 'kebudayaan',
                'date' => '08 Sep 2026',
                'read_time' => '4 Menit',
                'image' => 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?q=80&w=1200&auto=format&fit=crop',
                'summary' => 'Penguatan identitas kearifan lokal melalui modul pembelajaran bahasa ibu dan tradisi lisan di sekolah menengah.',
                'content' => 'Sebagai langkah konkret pelestarian warisan budaya takbenda, Disdikbud Maluku resmi mengesahkan kurikulum muatan lokal bahasa daerah yang akan diajarkan di jenjang SMA, SMK, dan SLB di seluruh kabupaten/kota.',
                'is_featured' => true,
            ],
            [
                'title' => 'Disdikbud Maluku Buka 1.500 Kuota Beasiswa Pendidikan Tinggi Maluku Cerdas',
                'category' => 'pengumuman',
                'date' => '06 Sep 2026',
                'read_time' => '2 Menit',
                'image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1200&auto=format&fit=crop',
                'summary' => 'Peluang beasiswa kuliah bagi mahasiswa berprestasi dan kurang mampu di berbagai perguruan tinggi unggulan.',
                'content' => 'Pemerintah Provinsi Maluku melalui Dinas Pendidikan dan Kebudayaan membuka pendaftaran program Beasiswa Maluku Cerdas 2026 untuk jenjang Diploma, S1, S2, serta Beasiswa Afirmasi Dokter Spesialis bagi putra-putri daerah.',
                'is_featured' => true,
            ],
            [
                'title' => 'Pameran Cagar Budaya Benteng Bersejarah dan Naskah Kuno di Museum Siwalima Ambon',
                'category' => 'kebudayaan',
                'date' => '04 Sep 2026',
                'read_time' => '3 Menit',
                'image' => 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?q=80&w=1200&auto=format&fit=crop',
                'summary' => 'Pameran edukatif menampilkan koleksi manuskrip kuno, senjata tradisional, dan dokumentasi benteng kolonial Maluku.',
                'content' => 'Museum Negeri Siwalima menghadirkan pameran bertajuk Jejak Rempah dan Benteng Pusaka Maluku yang memamerkan puluhan naskah kuno serta artefak sejarah untuk memperkaya wawasan sejarah generasi muda.',
                'is_featured' => false,
            ],
            [
                'title' => 'Pelatihan Guru Penggerak dan Peningkatan Standar Manajemen Mutu Sekolah Mandiri',
                'category' => 'berita',
                'date' => '01 Sep 2026',
                'read_time' => '4 Menit',
                'image' => 'https://images.unsplash.com/photo-1531403009284-440f080d1e12?q=80&w=1200&auto=format&fit=crop',
                'summary' => 'Lokakarya kepemimpinan instruksional bagi kepala sekolah dan pengawas dalam transformasi digital pendidikan.',
                'content' => 'Sebanyak 180 calon kepala sekolah dan guru penggerak menyelesaikan pelatihan intensif manajemen sekolah berbasis data dan kurikulum merdeka guna menciptakan iklim belajar yang aman, ramah anak, dan berkualitas.',
                'is_featured' => false,
            ],
            [
                'title' => 'Petunjuk Teknis PPDB SMA/SMK Negeri Se-Provinsi Maluku TA 2026/2027',
                'category' => 'PPDB 2026',
                'date' => '21 Ags 2026',
                'read_time' => '3 Menit',
                'image' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?q=80&w=1200&auto=format&fit=crop',
                'summary' => 'Unduh draf regulasi dan tahapan pendaftaran ulang.',
                'content' => '<p class="mb-4">Dinas Pendidikan dan Kebudayaan Provinsi Maluku menerbitkan Petunjuk Teknis Penerimaan Peserta Didik Baru (PPDB) jenjang SMA/SMK Negeri Tahun Ajaran 2026/2027.</p><p class="mb-4">Calon peserta didik dan orang tua diimbau untuk memedomani jadwal pendaftaran, zonasi, afirmasi, perpindahan tugas orang tua, serta jalur prestasi yang telah ditetapkan secara transparan.</p>',
                'is_featured' => false,
            ],
            [
                'title' => 'Inventarisasi Karya Budaya Takbenda Kepulauan Banda & Seram',
                'category' => 'Kebudayaan',
                'date' => '20 Ags 2026',
                'read_time' => '4 Menit',
                'image' => 'https://images.unsplash.com/photo-1599561046251-bfb9465b4c44?q=80&w=1200&auto=format&fit=crop',
                'summary' => 'Tim Cagar Budaya melakukan pendokumentasian tradisi tutur.',
                'content' => '<p class="mb-4">Tim Ahli Cagar Budaya dan Warisan Budaya Takbenda Disdikbud Maluku melaksanakan inventarisasi karya budaya lisan dan tradisi tutur di wilayah Kepulauan Banda dan Pulau Seram guna perlindungan warisan leluhur.</p>',
                'is_featured' => false,
            ],
            [
                'title' => 'Pengumuman Peserta Tunjangan Profesi Guru (TPG) Triwulan III',
                'category' => 'Sertifikasi Guru',
                'date' => '18 Ags 2026',
                'read_time' => '2 Menit',
                'image' => 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=1200&auto=format&fit=crop',
                'summary' => 'Penyaluran dana TPG untuk jenjang SMA/SMK/SLB Maluku.',
                'content' => '<p class="mb-4">Bidang Ketenagaan Dinas Pendidikan dan Kebudayaan Provinsi Maluku mengumumkan verifikasi berkas dan data calon penerima Tunjangan Profesi Guru (TPG) Triwulan III Tahun 2026 jenjang SMA, SMK, dan SLB.</p>',
                'is_featured' => false,
            ],
        ];
        foreach ($pNews as $pn) {
            PortalNews::create($pn);
        }

        // 6. Portal Culture (PortalCulture Model - Max 5 records)
        PortalCulture::truncate();
        $cultures = [
            [
                'title' => 'Benteng Amsterdam (Hila, Maluku Tengah)',
                'type' => 'Cagar Budaya',
                'location' => 'Kecamatan Leihitu, Kab. Maluku Tengah',
                'image' => 'https://images.unsplash.com/photo-1599561046251-bfb9465b4c44?q=80&w=800&auto=format&fit=crop',
                'desc' => 'Benteng peninggalan era kolonial VOC yang didirikan pada abad ke-17, menjadi saksi sejarah perdagangan rempah pala dan cengkih di Maluku.',
            ],
            [
                'title' => 'Tradisi Pela Gandong (Kearifan Hidup Basudara)',
                'type' => 'Warisan Budaya Takbenda',
                'location' => 'Provinsi Maluku',
                'image' => 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?q=80&w=800&auto=format&fit=crop',
                'desc' => 'Sistem kekerabatan adat yang mengikat dua atau lebih negeri/desa secara persaudaraan abadi untuk saling tolong-menolong dan menjaga perdamaian.',
            ],
            [
                'title' => 'Kain Tenun Ikat Tanimbar',
                'type' => 'Karya Seni Tradisional',
                'location' => 'Kabupaten Kepulauan Tanimbar',
                'image' => 'https://images.unsplash.com/photo-1606760227091-3dd870d97f1d?q=80&w=800&auto=format&fit=crop',
                'desc' => 'Kain tradisional khas bernilai seni tinggi yang ditenun dengan motif geometris sarat filosofi spiritual dan status sosial masyarakat Tanimbar.',
            ],
            [
                'title' => 'Tari Cakalele &amp; Tari Lenso',
                'type' => 'Seni Pertunjukan Tradisional',
                'location' => 'Kota Ambon &amp; Maluku Tengah',
                'image' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?q=80&w=800&auto=format&fit=crop',
                'desc' => 'Tarian perang adat Cakalele serta tari penyambutan tamu Lenso yang menggunakan sapu tangan putih sebagai simbol ketulusan dan persahabatan.',
            ],
            [
                'title' => 'Musik Tradisional Hawaian &amp; Alat Musik Tahuri',
                'type' => 'Musik Tradisional Daerah',
                'location' => 'Kota Ambon (UNESCO City of Music)',
                'image' => 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?q=80&w=800&auto=format&fit=crop',
                'desc' => 'Irama dawai khas Maluku berpadu tiupan kerang laut (Tahuri) yang menghasilkan harmoni musik tradisional melegenda di nusantara.',
            ],
        ];
        foreach ($cultures as $cult) {
            PortalCulture::create($cult);
        }

        // 7. Pengaduan Masyarakat (Complaint Model - Max 5 records)
        Complaint::truncate();
        $complaints = [
            [
                'sender_name' => 'Hendrik Pattinama, S.Pd',
                'instansi' => 'SMAN 2 Leihitu',
                'kategori' => 'Fasilitas Sekolah',
                'whatsapp' => '081245678901',
                'title' => 'Permohonan Penambahan Meja Kursi Belajar SMAN 2 Leihitu',
                'description' => 'Ruang kelas X baru membutuhkan penambahan 30 pasang meja kursi siswa untuk menampung rombongan belajar tahun ajaran baru.',
                'status' => 'Selesai',
                'created_at' => now()->subDays(5),
            ],
            [
                'sender_name' => 'Siti Rahma Lestaluhu',
                'instansi' => 'SMA Negeri 1 Buru Selatan',
                'kategori' => 'Fasilitas Sekolah',
                'whatsapp' => '081389012345',
                'title' => 'Kendala Jaringan Satelit ANBK di SMA Negeri 1 Buru Selatan',
                'description' => 'Perangkat komputer sekolah memerlukan optimalisasi jaringan internet satelit menjelang gladi bersih Asesmen Nasional.',
                'status' => 'Diproses',
                'created_at' => now()->subDays(3),
            ],
            [
                'sender_name' => 'Markus Wattimena',
                'instansi' => 'Masyarakat / Orang Tua',
                'kategori' => 'Lainnya',
                'whatsapp' => '082198765432',
                'title' => 'Klarifikasi Biaya Administrasi Legalisir Ijazah',
                'description' => 'Mohon konfirmasi mengenai SOP dan penegasan bebas biaya untuk layanan legalisir ijazah di Cabang Dinas.',
                'status' => 'Diproses',
                'created_at' => now()->subDays(2),
            ],
            [
                'sender_name' => 'Nurul Aini, S.Pd',
                'instansi' => 'SLB Negeri Kota Tual',
                'kategori' => 'Tenaga Pendidik',
                'whatsapp' => '085244556677',
                'title' => 'Usulan Pelatihan Seni Budaya Inklusi untuk Guru SLB Kota Tual',
                'description' => 'Permohonan bimbingan teknis bagi guru pendamping khusus dalam mengajar seni tari dan kriya untuk anak berkebutuhan khusus.',
                'status' => 'Menunggu Respon',
                'created_at' => now()->subDays(1),
            ],
            [
                'sender_name' => 'Dominggus Sahertian',
                'instansi' => 'SMAN 1 Kairatu SBB',
                'kategori' => 'Fasilitas Sekolah',
                'whatsapp' => '081344112233',
                'title' => 'Laporan Kerusakan Plafon Laboratorium IPA SBB',
                'description' => 'Plafon laboratorium IPA mengalami rembesan air saat hujan lebat dan membutuhkan perbaikan ringan demi keselamatan praktikum siswa.',
                'status' => 'Menunggu Respon',
                'created_at' => now(),
            ],
        ];
        foreach ($complaints as $c) {
            Complaint::create($c);
        }

        // 8. Permohonan Informasi Publik PPID (PpidRequest Model - Max 5 records)
        PpidRequest::truncate();
        $ppidRequests = [
            [
                'nama_pemohon' => 'Dr. Ahmad Renhoat, M.Si',
                'nik' => '8171011203850001',
                'email' => 'ahmad.renhoat@univ-pattimura.ac.id',
                'telepon' => '081245678901',
                'rincian' => 'Data Statistik Jumlah Siswa dan Guru Jenjang SMA/SMK/SLB Se-Provinsi Maluku Tahun Ajaran 2025/2026',
                'tujuan' => 'Penelitian Ilmiah dan Penyusunan Jurnal Manajemen Pendidikan Daerah Kepulauan',
                'created_at' => now()->subDays(6),
            ],
            [
                'nama_pemohon' => 'Maria Magdalena Soumokil',
                'nik' => '8171024508920002',
                'email' => 'maria.soumokil@pers.id',
                'telepon' => '081389012345',
                'rincian' => 'Dokumen Laporan Realisasi Penyerapan DAK Fisik Pendidikan Bidang SMA/SMK Triwulan I &amp; II 2026',
                'tujuan' => 'Kebutuhan Data Peliputan Jurnalistik Transparansi Anggaran Pemerintah Daerah',
                'created_at' => now()->subDays(4),
            ],
            [
                'nama_pemohon' => 'Faisal Tuasikal, S.Pd',
                'nik' => '8101031904880003',
                'email' => 'faisal.tuasikal@gmail.com',
                'telepon' => '082198765432',
                'rincian' => 'Daftar Cagar Budaya dan Sanggar Seni Terdaftar di Bidang Kebudayaan Provinsi Maluku',
                'tujuan' => 'Penyusunan Bahan Ajar Kurikulum Muatan Lokal Kebudayaan Negeri Adat',
                'created_at' => now()->subDays(3),
            ],
            [
                'nama_pemohon' => 'Yuliana Tetelepta',
                'nik' => '8103046206950004',
                'email' => 'yuliana.tetelepta@gmail.com',
                'telepon' => '085244556677',
                'rincian' => 'Informasi Prosedur Resmi Rekomendasi Mutasi/Pindah Sekolah Peserta Didik Antar-Provinsi',
                'tujuan' => 'Kelengkapan Berkas Administrasi Kepindahan Sekolah Putra/Putri',
                'created_at' => now()->subDays(2),
            ],
            [
                'nama_pemohon' => 'Ibrahim Pellu',
                'nik' => '8106012301900005',
                'email' => 'ibrahim.pellu@lsm-maluku.org',
                'telepon' => '081344112233',
                'rincian' => 'Dokumen Rencana Kerja Pemerintah Daerah (RKPD) Sektor Pendidikan dan Kebudayaan Tahun 2026',
                'tujuan' => 'Kajian Advokasi Kebijakan Publik Lembaga Swadaya Masyarakat Maluku',
                'created_at' => now()->subDays(1),
            ],
        ];
        foreach ($ppidRequests as $pr) {
            PpidRequest::create($pr);
        }

        // 9. Survei Kepuasan Masyarakat (SkmResponse Model - Max 5 records)
        SkmResponse::truncate();
        $skmResponses = [
            [
                'nama' => 'Reinhard Latumahina, S.Sos',
                'alamat' => 'Kec. Sirimau, Kota Ambon',
                'pendidikan' => 'S1',
                'pekerjaan' => 'PNS / ASN',
                'jenis_kelamin' => 'Laki-laki',
                'waktu_pelayanan' => 'Pagi (08:00 - 11:30 WIT)',
                'u1' => 4, 'u2' => 4, 'u3' => 4, 'u4' => 4, 'u5' => 4, 'u6' => 4, 'u7' => 4, 'u8' => 4, 'u9' => 4,
                'saran' => 'Pelayanan di Meja Pelayanan Terpadu Satu Pintu (PTSP) sangat ramah, cepat, dan transparan.',
                'created_at' => now()->subDays(4),
            ],
            [
                'nama' => 'Nurhasanah Bugis',
                'alamat' => 'Kec. Namlea, Kab. Buru',
                'pendidikan' => 'S1',
                'pekerjaan' => 'Guru / Pendidik',
                'jenis_kelamin' => 'Perempuan',
                'waktu_pelayanan' => 'Siang (13:00 - 15:30 WIT)',
                'u1' => 4, 'u2' => 4, 'u3' => 3, 'u4' => 4, 'u5' => 4, 'u6' => 4, 'u7' => 4, 'u8' => 4, 'u9' => 4,
                'saran' => 'Proses verifikasi berkas sertifikasi dan NUPTK sudah sangat jelas alurnya.',
                'created_at' => now()->subDays(3),
            ],
            [
                'nama' => 'Stevanus Matitaputty',
                'alamat' => 'Kec. Saparua, Kab. Maluku Tengah',
                'pendidikan' => 'SMA / Sederajat',
                'pekerjaan' => 'Wiraswasta / Pelaku Budaya',
                'jenis_kelamin' => 'Laki-laki',
                'waktu_pelayanan' => 'Pagi (09:30 WIT)',
                'u1' => 4, 'u2' => 3, 'u3' => 4, 'u4' => 4, 'u5' => 4, 'u6' => 4, 'u7' => 3, 'u8' => 4, 'u9' => 4,
                'saran' => 'Informasi pendaftaran sanggar seni dan cagar budaya dipermudah dengan layanan daring.',
                'created_at' => now()->subDays(2),
            ],
            [
                'nama' => 'Fatimah Wael',
                'alamat' => 'Kec. Huamual, Kab. SBB',
                'pendidikan' => 'D3',
                'pekerjaan' => 'Tenaga Administrasi Sekolah',
                'jenis_kelamin' => 'Perempuan',
                'waktu_pelayanan' => 'Pagi (10:15 WIT)',
                'u1' => 4, 'u2' => 4, 'u3' => 4, 'u4' => 4, 'u5' => 4, 'u6' => 4, 'u7' => 4, 'u8' => 4, 'u9' => 4,
                'saran' => 'Petugas front office sangat membantu menjelaskan persyaratan legalisir ijazah hilang.',
                'created_at' => now()->subDays(1),
            ],
            [
                'nama' => 'Otniel Tuhumury',
                'alamat' => 'Kec. Baguala, Kota Ambon',
                'pendidikan' => 'S2',
                'pekerjaan' => 'Dosen / Peneliti',
                'jenis_kelamin' => 'Laki-laki',
                'waktu_pelayanan' => 'Siang (14:00 WIT)',
                'u1' => 4, 'u2' => 4, 'u3' => 4, 'u4' => 4, 'u5' => 4, 'u6' => 4, 'u7' => 4, 'u8' => 4, 'u9' => 4,
                'saran' => 'Layanan data PPID dan keterbukaan informasi publik patut diapresiasi.',
                'created_at' => now(),
            ],
        ];
        foreach ($skmResponses as $skm) {
            SkmResponse::create($skm);
        }

        // 10. Statistik Pengunjung (Visitor Model - Max 5 records)
        Visitor::truncate();
        for ($i = 4; $i >= 0; $i--) {
            Visitor::create([
                'ip_address' => '192.168.1.' . (10 + $i),
                'date' => now()->subDays($i)->toDateString(),
            ]);
        }

        // 11. Monev Data Pokok Pendidikan Menengah (MonevStat & MonevRegion Models)
        MonevStat::truncate();
        MonevStat::create([
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

        MonevRegion::truncate();
        $regions = [
            [
                'nama_wilayah' => 'Kota Ambon',
                'jumlah_sma' => 48,
                'jumlah_smk' => 37,
                'total' => 85,
                'link_detail' => null,
                'contoh_sekolah' => 'SMA LKMD Laha, SMAN 1 Ambon, SMAN 2 Ambon, SMKN 1 Ambon',
                'urutan' => 1,
            ],
            [
                'nama_wilayah' => 'Kab. Maluku Tengah',
                'jumlah_sma' => 45,
                'jumlah_smk' => 27,
                'total' => 72,
                'link_detail' => null,
                'contoh_sekolah' => 'SMAN 1 Maluku Tengah, SMAN 2 Masohi, SMKN 1 Masohi',
                'urutan' => 2,
            ],
            [
                'nama_wilayah' => 'Kab. Seram Bagian Barat',
                'jumlah_sma' => 32,
                'jumlah_smk' => 22,
                'total' => 54,
                'link_detail' => null,
                'contoh_sekolah' => 'SMAN 1 Piru, SMAN 2 Kairatu, SMKN 1 Huamual',
                'urutan' => 3,
            ],
            [
                'nama_wilayah' => 'Kab. Maluku Tenggara',
                'jumlah_sma' => 28,
                'jumlah_smk' => 20,
                'total' => 48,
                'link_detail' => null,
                'contoh_sekolah' => 'SMAN 1 Kei Kecil, SMAN 2 Langgur, SMKN 1 Kei Kecil',
                'urutan' => 4,
            ],
            [
                'nama_wilayah' => 'Kab. Buru',
                'jumlah_sma' => 25,
                'jumlah_smk' => 16,
                'total' => 41,
                'link_detail' => null,
                'contoh_sekolah' => 'SMAN 1 Namlea, SMAN 2 Buru, SMKN 1 Namlea',
                'urutan' => 5,
            ],
            [
                'nama_wilayah' => 'Kab. Kepulauan Tanimbar',
                'jumlah_sma' => 20,
                'jumlah_smk' => 15,
                'total' => 35,
                'link_detail' => null,
                'contoh_sekolah' => 'SMAN 1 Saumlaki, SMAN 2 Tanimbar Selatan, SMKN 1 Saumlaki',
                'urutan' => 6,
            ],
            [
                'nama_wilayah' => 'Kota Tual',
                'jumlah_sma' => 15,
                'jumlah_smk' => 12,
                'total' => 27,
                'link_detail' => null,
                'contoh_sekolah' => 'SMAN 1 Tual, SMAN 2 Dullah Selatan, SMKN 1 Tual',
                'urutan' => 7,
            ],
            [
                'nama_wilayah' => 'Kab. Lainnya (Total)',
                'jumlah_sma' => 32,
                'jumlah_smk' => 34,
                'total' => 66,
                'link_detail' => null,
                'contoh_sekolah' => 'Aru, SBT, MBD, Bursel',
                'urutan' => 8,
            ],
        ];
        foreach ($regions as $reg) {
            MonevRegion::create($reg);
        }

        // 12. HeroSetting
        if (!\App\Models\HeroSetting::exists()) {
            \App\Models\HeroSetting::create([
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

        // 13. HeroSlides (Dynamic photo slider)
        if (!\App\Models\HeroSlide::exists()) {
            $slides = [
                [
                    'title' => 'kantprt',
                    'subtitle' => null,
                    'tag' => 'Program Prioritas',
                    'image' => '/uploads/slides/1791966139_6acf3bbbbfc62.jpg',
                    'button_text' => 'Baca Selengkapnya',
                    'button_link' => '/berita-terkini',
                    'order' => 1,
                    'is_active' => true,
                ],
                [
                    'title' => 'mm',
                    'subtitle' => 'mmm',
                    'tag' => 'Program Prioritas',
                    'image' => '/uploads/slides/1791966598_6acf3d86918de.png',
                    'button_text' => 'Baca Selengkapnya',
                    'button_link' => '/berita-terkini',
                    'order' => 2,
                    'is_active' => true,
                ],
                [
                    'title' => '2222',
                    'subtitle' => null,
                    'tag' => 'Program Prioritas',
                    'image' => '/uploads/slides/1791966755_6acf3e23e4f84.jpeg',
                    'button_text' => 'Baca Selengkapnya',
                    'button_link' => '/berita-terkini',
                    'order' => 3,
                    'is_active' => true,
                ],
            ];
            foreach ($slides as $sl) {
                \App\Models\HeroSlide::create($sl);
            }
        }

        // 14. Banner & Foto Iklan / Infografis Gubernur
        if (!\App\Models\BannerIklan::exists()) {
            $banners = [
                [
                    'title' => 'Hendrik Lewerissa, S.H., LL.M.',
                    'subtitle' => 'GUBERNUR PROVINSI MALUKU',
                    'type' => 'banner',
                    'description' => "Visi pembangunan Provinsi Maluku tahun 2025 – 2030 yaitu:\n\"Transformasi Maluku Menuju Maluku Yang Maju, Adil dan Sejahtera Menyongsong Indonesia Emas 2045\".",
                    'image' => '/uploads/banners/banner_gubernur_hendrik_lewerissa_hd.png',
                    'link_url' => '#',
                    'target' => '_self',
                    'order' => 1,
                    'is_active' => true,
                ],
                [
                    'title' => 'H. Abdullah Vanath, S.Sos., M.M.A.',
                    'subtitle' => 'WAKIL GUBERNUR PROVINSI MALUKU',
                    'type' => 'banner',
                    'description' => 'Mendukung percepatan pembangunan pendidikan berkualitas dan kebudayaan unggul di Bumi Raja-Raja Maluku.',
                    'image' => '/uploads/banners/banner_1791963817_6acf32a904b5b.png',
                    'link_url' => '#',
                    'target' => '_self',
                    'order' => 2,
                    'is_active' => true,
                ],
            ];
            foreach ($banners as $b) {
                \App\Models\BannerIklan::create($b);
            }
        }

        // 15. Master Layanan SOP (KEP-01 to KEP-10)
        if (!\App\Models\LayananSop::exists()) {
            $sops = [
                [
                    'service_code' => 'KEP-01',
                    'bidang' => 'kepegawaian',
                    'service_title' => 'Surat / Naskah Dinas',
                    'category' => 'Administrasi Persuratan',
                    'sla' => 'Surat Masuk ≤ 1 hari kerja, Surat Keluar ≤ 2 hari kerja',
                    'cost' => 'Gratis (Rp 0)',
                    'executors' => '15 Orang',
                    'description' => 'Layanan pengelolaan dan administrasi persuratan dinas masuk dan keluar.',
                ],
                [
                    'service_code' => 'KEP-02',
                    'bidang' => 'kepegawaian',
                    'service_title' => 'Layanan Kenaikan Pangkat',
                    'category' => 'Karier & Pangkat ASN',
                    'sla' => 'Maksimal 10 (sepuluh) hari kerja',
                    'cost' => 'Gratis (Rp 0)',
                    'executors' => '11 Orang',
                    'description' => 'Layanan pemrosesan usulan kenaikan pangkat PNS di lingkungan Disdikbud Maluku.',
                ],
                [
                    'service_code' => 'KEP-03',
                    'bidang' => 'kepegawaian',
                    'service_title' => 'Kenaikan Gaji Berkala (KGB)',
                    'category' => 'Hak & Kesejahteraan PNS',
                    'sla' => 'Paling lama 5 (lima) hari kerja sebelum TMT KGB',
                    'cost' => 'Gratis (Rp 0)',
                    'executors' => '11 Orang',
                    'description' => 'Layanan penerbitan Surat Pemberitahuan Kenaikan Gaji Berkala (KGB).',
                ],
                [
                    'service_code' => 'KEP-04',
                    'bidang' => 'kepegawaian',
                    'service_title' => 'Layanan Izin Praktik Kerja Industri (PKL Siswa/Mahasiswa)',
                    'category' => 'Kemitraan Pendidikan',
                    'sla' => 'Maksimal 3 (tiga) hari kerja',
                    'cost' => 'Gratis (Rp 0)',
                    'executors' => '1 Orang',
                    'description' => 'Penerbitan surat izin dan rekomendasi praktik kerja industri/lapangan.',
                ],
                [
                    'service_code' => 'KEP-05',
                    'bidang' => 'kepegawaian',
                    'service_title' => 'Layanan Izin Cuti PNS',
                    'category' => 'Hak & Kesejahteraan PNS',
                    'sla' => 'Maksimal 3 (tiga) hari kerja (Cuti Sakit mendesak diproses lebih cepat)',
                    'cost' => 'Gratis (Rp 0)',
                    'executors' => '11 Orang',
                    'description' => 'Layanan administrasi permohonan berbagai jenis cuti pegawai negeri sipil.',
                ],
                [
                    'service_code' => 'KEP-06',
                    'bidang' => 'kepegawaian',
                    'service_title' => 'Layanan Izin Perceraian PNS',
                    'category' => 'Status Hukum & Kepegawaian',
                    'sla' => 'Maksimal 10 (sepuluh) hari kerja',
                    'cost' => 'Gratis (Rp 0)',
                    'executors' => '1 Orang',
                    'description' => 'Pemeriksaan berkas dan penerbitan izin/surat keterangan perceraian PNS.',
                ],
                [
                    'service_code' => 'KEP-07',
                    'bidang' => 'kepegawaian',
                    'service_title' => 'Penerbitan Izin Belajar dan Tugas Belajar',
                    'category' => 'Pengembangan Kompetensi',
                    'sla' => 'Maksimal 7 (tujuh) hari kerja',
                    'cost' => 'Gratis (Rp 0)',
                    'executors' => '11 Orang',
                    'description' => 'Pemrosesan usulan rekomendasi dan SK Izin Belajar / Tugas Belajar ASN.',
                ],
                [
                    'service_code' => 'KEP-08',
                    'bidang' => 'kepegawaian',
                    'service_title' => 'Usul Pensiun PNS',
                    'category' => 'Pensiun & BUP',
                    'sla' => 'Maksimal 10 (sepuluh) hari kerja',
                    'cost' => 'Gratis (Rp 0)',
                    'executors' => '11 Orang',
                    'description' => 'Layanan pengusulan pensiun BUP, janda/duda, maupun atas permintaan sendiri.',
                ],
                [
                    'service_code' => 'KEP-09',
                    'bidang' => 'kepegawaian',
                    'service_title' => 'Layanan Izin Penelitian',
                    'category' => 'Riset & Akademik',
                    'sla' => 'Maksimal 10 (sepuluh) hari kerja',
                    'cost' => 'Gratis (Rp 0)',
                    'executors' => '11 Orang',
                    'description' => 'Rekomendasi dan surat izin penelitian bagi mahasiswa, dosen, dan peneliti.',
                ],
                [
                    'service_code' => 'KEP-10',
                    'bidang' => 'kepegawaian',
                    'service_title' => 'Usul Penyesuaian Gelar Akademik',
                    'category' => 'Pengembangan Kualifikasi',
                    'sla' => 'Maksimal 10 (sepuluh) hari kerja',
                    'cost' => 'Gratis (Rp 0)',
                    'executors' => '11 Orang',
                    'description' => 'Verifikasi dokumen dan pencantuman gelar akademik dalam data kepegawaian ASN.',
                ],
            ];
            foreach ($sops as $sp) {
                \App\Models\LayananSop::create($sp);
            }
        }

        // 16. Profil: Visi Misi, Tugas Fungsi, Struktur Organisasi
        if (!\App\Models\VisiMisi::exists()) {
            \App\Models\VisiMisi::create([
                'banner_badge' => 'ARAH KEBIJAKAN',
                'banner_title' => 'Visi dan Misi',
                'banner_description' => 'Menjadi kompas panduan dalam memajukan sektor pendidikan dan pelestarian kebudayaan di Provinsi Maluku menuju Indonesia Emas 2045.',
                'visi_text' => 'Mewujudkan Maluku yang Terkelola Secara Jujur, Bersih dan Melayani, Terjamin Kesejahteraannya dan Berdaulat Atas Gugusan Kepulauannya.',
                'misi_description' => 'Berdasarkan visi pembangunan daerah, misi Dinas Pendidikan dan Kebudayaan Provinsi Maluku dirumuskan ke dalam pilar-pilar strategis peningkatan mutu SDM dan pemajuan kebudayaan.',
                'misi_items' => [
                    'Meningkatkan aksesibilitas dan pemerataan layanan pendidikan bermutu di seluruh gugus kepulauan Provinsi Maluku.',
                    'Meningkatkan kompetensi, kualifikasi, dan kesejahteraan pendidik serta tenaga kependidikan secara berkelanjutan.',
                    'Melestarikan, mengembangkan, dan memanfaatkan nilai seni, cagar budaya, serta warisan budaya takbenda daerah.',
                    'Memperkuat tata kelola birokrasi pendidikan yang transparan, akuntabel, dan berbasis teknologi digital.'
                ],
                'rumusan_singkat_visi' => 'Terwujudnya Generasi Maluku yang Cerdas, Berkarakter, Berdaya Saing Global, dan Berakar Kuat pada Nilai Kearifan Budaya Bahari.',
                'rumusan_singkat_misi' => [
                    'Pendidikan Inklusif & Merata untuk Seluruh Wilayah Kepulauan',
                    'SDM Pendidik Profesional & Sejahtera Berstandar Nasional',
                    'Pelestarian Cagar Budaya & Warisan Luhur Budaya Maluku',
                    'Transformasi Digital & Akuntabilitas Tata Kelola Publik'
                ],
            ]);
        }

        if (!\App\Models\TugasFungsi::exists()) {
            \App\Models\TugasFungsi::create([
                'header_badge' => 'Pemerintah Provinsi Maluku',
                'header_title' => 'Dinas Pendidikan dan Kebudayaan',
                'header_subtitle' => 'Melaksanakan urusan pemerintahan daerah di bidang pendidikan menengah, khusus, dan kebudayaan sesuai kewenangan provinsi.',
                'stat_sekolah' => '345+',
                'stat_sekolah_label' => 'Sekolah Menengah',
                'stat_guru' => '8.2K',
                'stat_guru_label' => 'Tenaga Pendidik',
                'stat_siswa' => '112K',
                'stat_siswa_label' => 'Peserta Didik',
                'stat_cagar_budaya' => '56+',
                'stat_cagar_budaya_label' => 'Cagar Budaya',
                'tugas_pokok' => 'Dinas Pendidikan dan Kebudayaan Provinsi Maluku mempunyai tugas membantu Gubernur melaksanakan urusan pemerintahan konkuren di bidang pendidikan dan kebudayaan yang menjadi kewenangan daerah serta tugas pembantuan yang ditugaskan kepada Daerah Provinsi.',
                'tugas_pembantuan' => 'Melaksanakan tugas pembantuan yang diberikan oleh Pemerintah Pusat kepada Pemerintah Daerah Provinsi Maluku sesuai ketentuan peraturan perundang-undangan.',
                'fungsi_items' => [
                    'Perumusan kebijakan teknis di bidang pendidikan menengah, pendidikan khusus, dan kebudayaan.',
                    'Pelaksanaan kebijakan teknis pembinaan sekolah menengah atas, kejuruan, dan luar biasa.',
                    'Pelaksanaan pembinaan dan pelestarian cagar budaya, permuseuman, serta warisan budaya takbenda.',
                    'Pelaksanaan evaluasi dan pelaporan di bidang pendidikan dan kebudayaan.',
                    'Pelaksanaan administrasi dinas sesuai dengan lingkup tugasnya.'
                ],
            ]);
        }

        if (!\App\Models\StrukturOrganisasi::exists()) {
            \App\Models\StrukturOrganisasi::create([
                'header_badge' => 'Dashboard Informasi',
                'header_title' => 'Struktur Organisasi',
                'header_subtitle' => 'Dinas Pendidikan dan Kebudayaan Provinsi Maluku',
                'bagan_image' => '/images/struktur_organisasi.png',
            ]);
        }
    }
}
