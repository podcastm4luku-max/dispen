<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Standar & Produk Layanan - Dinas Pendidikan dan Kebudayaan Provinsi Maluku</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- React & ReactDOM CDN -->
    <script src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>
    <!-- Babel for JSX -->
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        navy: {
                            700: '#1d2b45',
                            800: '#0f1e36',
                            900: '#0a1428',
                            950: '#050a17',
                        },
                        gold: {
                            300: '#fde047',
                            400: '#facc15',
                            500: '#eab308',
                            600: '#ca8a04',
                            700: '#a16207',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #ffffff;
            color: #0f172a;
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        .gold-gradient-text {
            background: linear-gradient(135deg, #FFE082 0%, #E6C200 50%, #B38F00 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .gold-border-glow {
            box-shadow: 0 0 15px rgba(234, 179, 8, 0.15);
        }
    </style>
</head>
<body class="bg-white min-h-screen antialiased">
    <div id="root"></div>

    <script type="text/babel">
        const { useState, useEffect, useMemo, useRef } = React;

        const MONEV_UNITS = [
            {
                id: "KEPEG",
                code: "UNIT-01",
                title: "Sub Bagian Kepegawaian dan Umum",
                shortName: "Kepegawaian & Umum",
                bgGradient: "from-blue-900 to-navy-900",
                description: "Pelayanan administrasi kepegawaian ASN, pengelolaan persuratan, kenaikan pangkat, cuti, legalisasi, dan tata kelola sarana prasarana dinas.",
                scope: "Administrasi Internal & Pelayanan Umum ASN / Non-ASN",
                statusMonev: "Terintegrasi Digital",
                database: "SIMPEG / E-Office",
                url: "{{ url('/layanan/kepegawaian-dan-umum') }}",
                details: [
                    "Pengurusan Usulan Kenaikan Pangkat (UKP) ASN Dinas Pendidikan dan Kebudayaan (SLA 14 Hari Kerja).",
                    "Penerbitan Surat Keputusan Cuti Tahunan, Alasan Penting, & Cuti Melahirkan (SLA 3 Hari Kerja).",
                    "Layanan Legalisasi Dokumen Kepegawaian, Ijazah, dan Surat Keterangan Umum (SLA 1 Hari Kerja).",
                    "Pengelolaan Sistem Informasi Kepegawaian (SIMPEG) dan Arsip Kepegawaian Terpadu."
                ]
            },
            {
                id: "GTK",
                code: "UNIT-02",
                title: "Unit Kerja Guru dan Tenaga Kependidikan (GTK)",
                shortName: "GTK",
                bgGradient: "from-navy-900 to-indigo-950",
                description: "Peningkatan kualifikasi, sertifikasi profesi (TPG), penerbitan NUPTK, mutasi tugas guru, dan tunjangan khusus guru daerah terpencil se-Maluku.",
                scope: "Sertifikasi, Kesejahteraan, & Pembinaan Karier Guru",
                statusMonev: "Validasi SIMPATIKA & DAPODIK",
                database: "SIMTUN / NUPTK",
                url: "{{ url('/layanan/gtk') }}",
                details: [
                    "Penerbitan & Rekomendasi NUPTK bagi Guru SMA/SMK/SLB se-Provinsi Maluku (SLA 7 Hari Kerja).",
                    "Verifikasi dan Penyaluran Tunjangan Profesi Guru (TPG) & Tunjangan Khusus 3T (SLA 10 Hari Kerja).",
                    "Pengurusan Usulan Mutasi dan Rotasi Guru Antar-Kabupaten/Kota (SLA 12 Hari Kerja).",
                    "Pelaksanaan Program Pengembangan Keprofesian Berkelanjutan (PKB) bagi GTK."
                ]
            },
            {
                id: "SMA",
                code: "UNIT-03",
                title: "Bidang Pembinaan SMA",
                shortName: "Pembinaan SMA",
                bgGradient: "from-navy-900 to-slate-900",
                description: "Pembinaan mutu kurikulum SMA, perizinan operasional satuan pendidikan, fasilitasi mutasi siswa, serta ajang talenta OSN, FLS2N, dan O2SN SMA.",
                scope: "Kurikulum, Kesiswaan, & Kelembagaan Jenjang SMA",
                statusMonev: "100% Satuan Pendidikan Terbina",
                database: "DAPODIK SMA",
                url: "{{ url('/layanan/sma') }}",
                details: [
                    "Rekomendasi Izin Operasional & Akreditasi Satuan Pendidikan SMA Swasta/Negeri (SLA 15 Hari Kerja).",
                    "Pengesahan Dokumen Kurikulum Operasional Satuan Pendidikan (KOSP) SMA (SLA 5 Hari Kerja).",
                    "Layanan Rekomendasi Mutasi Siswa SMA Antar-Provinsi dan Antar-Kabupaten/Kota (SLA 3 Hari Kerja).",
                    "Fasilitasi Penyelenggaraan Ajang Talenta Siswa (OSN, FLS2N, O2SN, LDBI) Tingkat Provinsi."
                ]
            },
            {
                id: "SMK",
                code: "UNIT-04",
                title: "Bidang Pembinaan SMK",
                shortName: "Pembinaan SMK",
                bgGradient: "from-navy-950 to-blue-950",
                description: "Pengembangan Pendidikan Vokasi SMK, perizinan pembukaan keahlian baru, sertifikasi LSP, kemitraan DUDI, dan bantuan prasarana bengkel praktik.",
                scope: "Pendidikan Vokasi, LSP, Kemitraan DUDI SMK",
                statusMonev: "Revitalisasi Vokasi Aktif",
                database: "TAKOLA SMK",
                url: "{{ url('/layanan/smk') }}",
                details: [
                    "Penerbitan Rekomendasi Pembukaan Program/Konsentrasi Keahlian Baru SMK (SLA 14 Hari Kerja).",
                    "Fasilitasi Kerja Sama (MoU) Kemitraan SMK dengan Dunia Usaha & Dunia Industri (DUDI) (SLA 7 Hari Kerja).",
                    "Penyelarasan Kurikulum Vokasi Berbasis Industri dan Sertifikasi Kompetensi Siswa (LSP-P1) (SLA 10 Hari Kerja).",
                    "Monitoring & Evaluasi Bantuan Laboratorium / Bengkel Praktik Vokasi SMK."
                ]
            },
            {
                id: "PK",
                code: "UNIT-05",
                title: "Bidang Pembinaan Pendidikan Khusus",
                shortName: "Pendidikan Khusus (PK)",
                bgGradient: "from-navy-900 to-teal-950",
                description: "Layanan pendidikan inklusif, pembinaan Sekolah Luar Biasa (SLB), bantuan asesmen Anak Berkebutuhan Khusus (ABK), dan beasiswa difabel.",
                scope: "Layanan Pendidikan Inklusif & SLB se-Maluku",
                statusMonev: "Akses Inklusi Terjamin",
                database: "SIM-PKLK",
                url: "{{ url('/layanan/pendidikan-khusus') }}",
                details: [
                    "Penerbitan Rekomendasi Penyelenggaraan Sekolah Inklusif dan Penguatan SLB (SLA 10 Hari Kerja).",
                    "Fasilitasi Asesmen Psikologi & Edukasi Anak Berkebutuhan Khusus (ABK) (SLA 7 Hari Kerja).",
                    "Penyaluran Bantuan Operasional Pendidikan Khusus & Beasiswa Siswa Disabilitas (SLA 10 Hari Kerja).",
                    "Pelatihan Pelatih & Guru Pendamping Khusus (GPK) Pendidikan Inklusi."
                ]
            },
            {
                id: "BDY",
                code: "UNIT-06",
                title: "Bidang Kebudayaan",
                shortName: "Kebudayaan",
                bgGradient: "from-navy-950 to-amber-950",
                description: "Pelestarian Cagar Budaya, pencatatan Warisan Budaya Takbenda (WBTB), fasilitasi event budaya, izin penelitian, dan registrasi sanggar seni.",
                scope: "Pelestarian, Pemajuan, & Tata Kelola Kebudayaan",
                statusMonev: "SRNCB & WBTBI Active",
                database: "WBTBI / SRNCB",
                url: "{{ url('/layanan/kebudayaan') }}",
                details: [
                    "Rekomendasi Penetapan Cagar Budaya Peringkat Provinsi hasil kajian TACB (SLA 19 Hari Kerja).",
                    "Pencatatan & Pengusulan Warisan Budaya Takbenda (WBTB) Provinsi Maluku (SLA 19 Hari Kerja).",
                    "Fasilitasi & Rekomendasi Penyelenggaraan Event/Festival Kebudayaan Daerah (SLA 10 Hari Kerja).",
                    "Registrasi & Pembinaan Komunitas Adat, Lembaga Adat, dan Sanggar Seni (SLA 12 Hari Kerja)."
                ]
            }
        ];

        const ALL_SERVICES_CATALOG = [
            // Sub Bagian Kepegawaian dan Umum
            {
                id: 101,
                code: "KPG-01",
                title: "Layanan Usulan Kenaikan Pangkat (UKP) Pegawai ASN",
                category: "Kepegawaian & Umum",
                unitId: "KEPEG",
                legal: [
                    "Undang-Undang Nomor 20 Tahun 2023 tentang Aparatur Sipil Negara",
                    "Peraturan Pemerintah Nomor 11 Tahun 2017 tentang Manajemen PNS",
                    "Peraturan BKN Nomor 4 Tahun 2023 tentang Periodisasi Kenaikan Pangkat PNS"
                ],
                requirements: [
                    "Surat pengantar dari kepala satuan kerja / sekolah",
                    "Fotokopi SK Pangkat terakhir & SK Jabatan",
                    "Penilaian Kinerja Pegawai (SKP) 2 tahun terakhir dengan predikat minimal Baik"
                ],
                procedure: [
                    "Pemohon/Pengelola Kepegawaian sekolah mengunggah berkas usulan ke portal SIMPEG Dinas",
                    "Staf Subbag Kepegawaian memverifikasi keabsahan dokumen dan syarat administratif",
                    "Kepala Subbag Kepegawaian menyetujui usulan dan meneruskan ke BKD/BKN",
                    "Penerbitan Petikan SK Kenaikan Pangkat dan penyerahan kepada pemohon"
                ],
                sla: "14 Hari Kerja",
                slaDays: 14,
                cost: "GRATIS (Rp 0)",
                product: "Surat Pengantar Usulan UKP & SK Kenaikan Pangkat ASN",
                complaintChannel: "Konsultasi tatap muka / SP4N-LAPOR! / Portal Pengaduan Disdikbud Maluku",
                facilities: ["Komputer Server SIMPEG", "Scanner Dokumen", "Printer Cetak SK"],
                competency: "Memahami regulasi kepegawaian ASN dan mahir pengoperasian SIMPEG.",
                internalSupervision: "Kepala Subbag Kepegawaian & Umum",
                executors: 3,
                guarantee: "Berkas diproses secara transparan, rahasia, dan tanpa pungutan biaya apapun.",
                evaluation: "Survei Kepuasan Masyarakat (SKM) berkala per triwulan."
            },
            {
                id: 102,
                code: "KPG-02",
                title: "Layanan Legalisasi Dokumen Kepegawaian dan Umum",
                category: "Kepegawaian & Umum",
                unitId: "KEPEG",
                legal: [
                    "Peraturan Menteri Pendidikan dan Kebudayaan Nomor 29 Tahun 2014",
                    "Keputusan Kepala Dinas Pendidikan dan Kebudayaan Provinsi Maluku"
                ],
                requirements: [
                    "Dokumen asli yang akan dilegalisasi",
                    "Fotokopi dokumen maksimal 5 lembar per pengajuan",
                    "Kartu identitas diri (KTP/NIP)"
                ],
                procedure: [
                    "Pemohon menyerahkan dokumen asli dan fotokopi di Loket Pelayanan Umum",
                    "Petugas meneliti kesesuaian fotokopi dengan dokumen asli",
                    "Pejabat berwenang membubuhkan stempel dan tanda tangan legalisasi",
                    "Penyerahan dokumen yang telah dilegalisasi kepada pemohon"
                ],
                sla: "1 Hari Kerja (Bisa ditunggu)",
                slaDays: 1,
                cost: "GRATIS (Rp 0)",
                product: "Dokumen Fotokopi ter-Legalisasi Resmi",
                complaintChannel: "Loket Pengaduan Langsung / Website Resmi Disdikbud Maluku",
                facilities: ["Loket Pelayanan", "Stempel Dinas", "Komputer Kasir Registrasi"],
                competency: "Teliti dalam verifikasi keabsahan fisik dokumen resmi.",
                internalSupervision: "Kepala Subbag Kepegawaian & Umum",
                executors: 2,
                guarantee: "Kepastian keabsahan legalitas dokumen dengan pelayanan ramah dan cepat.",
                evaluation: "Evaluasi harian waktu tunggu pelayanan loket."
            },

            // Unit Kerja Guru dan Tenaga Kependidikan (GTK)
            {
                id: 201,
                code: "GTK-01",
                title: "Verifikasi dan Penerbitan Rekomendasi NUPTK Guru",
                category: "GTK",
                unitId: "GTK",
                legal: [
                    "Peraturan Sekjen Kemendikbudristek Nomor 1 Tahun 2021 tentang Juknis NUPTK",
                    "Permendikbudristek tentang Penugasan Guru sebagai Kepala Sekolah"
                ],
                requirements: [
                    "SK Pengangkatan sebagai Guru dari Penyelenggara Pendidikan/Pemerintah Daerah",
                    "Ijazah S-1/D-IV asli",
                    "KTP & SK Pembagian Tugas Mengajar (JTM) terdaftar di DAPODIK"
                ],
                procedure: [
                    "Operator sekolah mengajukan usulan NUPTK melalui aplikasi Verval PTK",
                    "Tim Admin GTK Dinas memverifikasi berkas persyaratan administratif",
                    "Kepala Bidang GTK menyetujui rekomendasi pengajuan ke BPMP/Pusdatin Kemendikbudristek",
                    "Penerbitan NUPTK aktif secara sistem"
                ],
                sla: "7 Hari Kerja",
                slaDays: 7,
                cost: "GRATIS (Rp 0)",
                product: "Surat Rekomendasi Penerbitan NUPTK Aktif Kemendikbudristek",
                complaintChannel: "Layanan Pengaduan GTK / WhatsApp Center Disdikbud Maluku",
                facilities: ["Aplikasi Verval PTK", "Akses Portal DAPODIK", "Jaringan Internet High-Speed"],
                competency: "Menguasai tata kelola DAPODIK & Verval PTK.",
                internalSupervision: "Kepala Bidang Pembinaan GTK",
                executors: 2,
                guarantee: "Proses verifikasi dilakukan objektif sesuai Juknis Teknis Kemendikbudristek.",
                evaluation: "Monitoring mingguan pencapaian SLA verifikasi Verval PTK."
            },
            {
                id: 202,
                code: "GTK-02",
                title: "Layanan Penyaluran Tunjangan Profesi Guru (TPG) & Daerah Khusus",
                category: "GTK",
                unitId: "GTK",
                legal: [
                    "Permendikbudristek Nomor 45 Tahun 2023 tentang Petunjuk Teknis Tunjangan ASN Daerah",
                    "Peraturan Gubernur Maluku tentang Pengelolaan Hibah dan Tunjangan Guru"
                ],
                requirements: [
                    "Sertifikat Pendidik (Serdik) terverifikasi",
                    "Info GTK berstatus Valid (Beban mengajar minimal 24 jam)",
                    "Rekening bank aktif atas nama guru yang bersangkutan"
                ],
                procedure: [
                    "Verifikasi kevalidan data Info GTK dan kelayakan mengajar oleh operator GTK",
                    "Penerbitan Surat Keputusan Tunjangan Profesi (SKTP) oleh Pusat",
                    "Penyusunan SIMBAR dan berkas pencairan oleh Tim Keuangan GTK Dinas",
                    "Transfer dana tunjangan langsung ke rekening bank guru penerima"
                ],
                sla: "10 Hari Kerja (setelah SKTP terbit)",
                slaDays: 10,
                cost: "GRATIS (Rp 0)",
                product: "Surat Perintah Pencairan Dana TPG / Tunjangan Daerah Khusus",
                complaintChannel: "Helpdesk SIMTUN Dinas / Email Pengaduan GTK",
                facilities: ["Sistem Informasi SIMTUN", "Aplikasi Rekonsiliasi Bank"],
                competency: "Ahli analisis data kelayakan mengajar dan keuangan daerah.",
                internalSupervision: "Kepala Dinas & Kepala Bidang GTK",
                executors: 4,
                guarantee: "Penyaluran dana tepat sasaran, tepat jumlah, dan tanpa pemotongan.",
                evaluation: "Rekonsiliasi realisasi penyaluran tunjangan setiap semester."
            },

            // Bidang Pembinaan SMA
            {
                id: 301,
                code: "SMA-01",
                title: "Izin Operasional & Akreditasi Satuan Pendidikan SMA",
                category: "Pembinaan SMA",
                unitId: "SMA",
                legal: [
                    "Undang-Undang Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional",
                    "Permendikbud Nomor 36 Tahun 2014 tentang Pedoman Pendirian Satuan Pendidikan"
                ],
                requirements: [
                    "Surat permohonan pendirian/perpanjangan izin operasional dari yayasan/sekolah",
                    "Hasil studi kelayakan, kurikulum, dan data calon siswa",
                    "Sertifikat kepemilikan tanah & denah bangunan sekolah"
                ],
                procedure: [
                    "Yayasan/Sekolah mengajukan proposal kelayakan kepada Kepala Dinas",
                    "Tim Verifikasi Bidang SMA melakukan visitasi verifikasi lapangan ke lokasi sekolah",
                    "Penyusunan Berita Acara Pemeriksaan (BAP) kelayakan fisik & administratif",
                    "Kepala Dinas menandatangani Surat Izin Operasional SMA"
                ],
                sla: "15 Hari Kerja",
                slaDays: 15,
                cost: "GRATIS (Rp 0)",
                product: "Surat Izin Operasional Satuan Pendidikan SMA",
                complaintChannel: "Konsultasi Langsung Bidang SMA / SP4N-LAPOR!",
                facilities: ["Kendaraan Dinas Visitasi", "Perangkat GPS / Pemetaan Sekolah", "Form BAP Visite"],
                competency: "Tim verifikator berpengalaman dalam manajemen kelembagaan SMA.",
                internalSupervision: "Kepala Bidang Pembinaan SMA",
                executors: 3,
                guarantee: "Transparansi hasil verifikasi visitasi berbasis indikator standar nasional.",
                evaluation: "Rapat evaluasi perizinan kelembagaan SMA tahunan."
            },
            {
                id: 302,
                code: "SMA-02",
                title: "Rekomendasi Mutasi Siswa SMA Antar-Provinsi / Kabupaten",
                category: "Pembinaan SMA",
                unitId: "SMA",
                legal: [
                    "Permendikbud Nomor 1 Tahun 2021 tentang PPDB & Mutasi Siswa",
                    "Petunjuk Teknis Mutasi Peserta Didik Dinas Pendidikan dan Kebudayaan Prov. Maluku"
                ],
                requirements: [
                    "Surat permohonan orang tua/wali murid",
                    "Surat kepindahan/penerimaan dari sekolah asal dan sekolah tujuan",
                    "Buku Rapor asli & Fotokopi ter-legalisasi"
                ],
                procedure: [
                    "Pemohon menyerahkan berkas permohonan ke Seksi Kesiswaan SMA",
                    "Staf memeriksa ketersediaan kuota DAPODIK pada sekolah tujuan",
                    "Kepala Bidang SMA meneliti dokumen dan menyetujui rekomendasi",
                    "Penerbitan Surat Rekomendasi Mutasi Siswa dan pemutakhiran DAPODIK"
                ],
                sla: "3 Hari Kerja",
                slaDays: 3,
                cost: "GRATIS (Rp 0)",
                product: "Surat Rekomendasi Mutasi Siswa SMA",
                complaintChannel: "Loket Pelayanan Kesiswaan / Website Disdikbud",
                facilities: ["Komputer Verifikasi DAPODIK", "Printer Surat Resmi"],
                competency: "Cepat dan responsif dalam pelayanan administrasi kesiswaan.",
                internalSupervision: "Kepala Bidang Pembinaan SMA",
                executors: 2,
                guarantee: "Proses akurat sesuai daya tampung rasional kelas pada DAPODIK.",
                evaluation: "Evaluasi berkala siklus mutasi semesteran."
            },

            // Bidang Pembinaan SMK
            {
                id: 401,
                code: "SMK-01",
                title: "Rekomendasi Izin Pembukaan Program Keahlian Baru SMK",
                category: "Pembinaan SMK",
                unitId: "SMK",
                legal: [
                    "Instruksi Presiden Nomor 9 Tahun 2016 tentang Revitalisasi SMK",
                    "Permendikbudristek Nomor 56/M/2022 tentang Pedoman Penerapan Kurikulum Merdeka Vokasi"
                ],
                requirements: [
                    "Proposal pembukaan konsentrasi keahlian berbasis kebutuhan pasar kerja/DUDI",
                    "Naskah Kerjasama (MoU) dengan DUDI relevan",
                    "Ketersediaan sarana laboratorium/bengkel praktik dan tenaga pengajar vokasi"
                ],
                procedure: [
                    "SMK mengajukan proposal pembukaan program keahlian baru ke Bidang SMK",
                    "Tim Asesor Vokasi menyelenggaraan seminar pemaparan dan visitasi sarpras",
                    "Penerbitan Rekomendasi Kelayakan Jurusan Vokasi Baru oleh Kepala Dinas",
                    "Pendaftaran kode jurusan baru pada aplikasi DAPODIK Vokasi"
                ],
                sla: "14 Hari Kerja",
                slaDays: 14,
                cost: "GRATIS (Rp 0)",
                product: "Surat Rekomendasi Pembukaan Konsentrasi Keahlian Baru SMK",
                complaintChannel: "Helpdesk Vokasi SMK / SP4N-LAPOR!",
                facilities: ["Form Evaluasi Asesmen Vokasi", "Akses Portal Spektrum SMK"],
                competency: "Asesor berpengalaman dalam keselarasan kurikulum industri.",
                internalSupervision: "Kepala Bidang Pembinaan SMK",
                executors: 3,
                guarantee: "Keberlanjutan lulusan terserap industri terjamin melalui analisis DUDI.",
                evaluation: "Tracer study kelulusan SMK tahunan."
            },

            // Bidang Pembinaan Pendidikan Khusus (PK)
            {
                id: 501,
                code: "PLB-01",
                title: "Fasilitasi Asesmen & Layanan Pendidikan Inklusif / SLB",
                category: "Pendidikan Khusus (PK)",
                unitId: "PK",
                legal: [
                    "Permendiknas Nomor 70 Tahun 2009 tentang Pendidikan Inklusif bagi ABK",
                    "Peraturan Daerah Provinsi Maluku tentang Pemenuhan Hak Difabel"
                ],
                requirements: [
                    "Surat pengantar dari sekolah atau permohonan orang tua/lembaga",
                    "Profil singkat Anak Berkebutuhan Khusus (ABK)",
                    "Dokumen medis/psikologis pendukung (bila ada)"
                ],
                procedure: [
                    "Orang tua/Sekolah mengajukan permohonan fasilitasi asesmen ABK",
                    "Tim Pokja Pendidikan Inklusi mendampingi proses tes asesmen kemampuan siswa",
                    "Penyusunan rekomendasi Program Pembelajaran Individual (PPI)",
                    "Penerbitan surat rekomendasi penempatan di Sekolah Inklusi / SLB"
                ],
                sla: "7 Hari Kerja",
                slaDays: 7,
                cost: "GRATIS (Rp 0)",
                product: "Surat Hasil Asesmen & Rekomendasi Layanan Inklusi ABK",
                complaintChannel: "Ruang Konsultasi Inklusi Dinas / Media Sosial Disdikbud",
                facilities: ["Ruang Asesmen Ramah Anak", "Instrumen Asesmen Khusus ABK"],
                competency: "Tim psikolog dan Tenaga Ahli Pendidikan Luar Biasa (PLB).",
                internalSupervision: "Kepala Bidang Pendidikan Khusus",
                executors: 2,
                guarantee: "Pelayanan empatik, humanis, ramah difabel, tanpa diskriminasi.",
                evaluation: "Survei tingkat kepuasan orang tua murid ABK."
            },

            // Bidang Kebudayaan
            {
                id: 601,
                code: "BDY-01",
                title: "Rekomendasi Penetapan Cagar Budaya Peringkat Provinsi",
                category: "Kebudayaan",
                unitId: "BDY",
                legal: [
                    "Undang-Undang Nomor 11 Tahun 2010 tentang Cagar Budaya",
                    "Peraturan Pemerintah Nomor 1 Tahun 2022 tentang Museum",
                    "Peraturan Menteri Pendidikan dan Kebudayaan Nomor 1 Tahun 2015"
                ],
                requirements: [
                    "Surat permohonan penetapan cagar budaya",
                    "Deskripsi dan dokumentasi awal objek yang diusulkan",
                    "Data kepemilikan/pengelolaan objek"
                ],
                procedure: [
                    "Pemohon mengajukan usulan penetapan cagar budaya kepada Dinas",
                    "Staf Bidang Kebudayaan memverifikasi kelengkapan berkas",
                    "Staf mengoordinasikan kajian lapangan bersama Tim Ahli Cagar Budaya (TACB)",
                    "Kepala Dinas menandatangani surat rekomendasi penetapan cagar budaya"
                ],
                sla: "19 Hari Kerja",
                slaDays: 19,
                cost: "GRATIS (Rp 0)",
                product: "Surat Rekomendasi Penetapan Cagar Budaya Peringkat Provinsi",
                complaintChannel: "Konsultasi Kantor Dinas / Website / SP4N-LAPOR!",
                facilities: ["Kamera Dokumentasi Kebudayaan", "GPS Mapper Objek", "Arsip SRNCB"],
                competency: "Kompetensi Arkeologi, Sejarah, & Sertifikasi TACB.",
                internalSupervision: "Kepala Bidang Kebudayaan",
                executors: 4,
                guarantee: "Kajian obyektif berbasis keahlian TACB dan standar pelestarian nasional.",
                evaluation: "Evaluasi berkala sidang kajian cagar budaya."
            },
            {
                id: 602,
                code: "BDY-03",
                title: "Pencatatan Warisan Budaya Takbenda (WBTB) Provinsi Maluku",
                category: "Kebudayaan",
                unitId: "BDY",
                legal: [
                    "Undang-Undang Nomor 5 Tahun 2017 tentang Pemajuan Kebudayaan",
                    "Peraturan Pemerintah Nomor 87 Tahun 2021 tentang Pelaksanaan Pemajuan Kebudayaan"
                ],
                requirements: [
                    "Surat usulan pencatatan warisan budaya takbenda",
                    "Deskripsi karya budaya dan dokumentasi audio-visual",
                    "Bukti eksistensi/pewarisan karya budaya di masyarakat"
                ],
                procedure: [
                    "Pemohon mengajukan usulan pencatatan warisan budaya takbenda",
                    "Staf memverifikasi berkas dan mengoordinasikan kajian verifikasi lapangan",
                    "Penyusunan kajian akademis karya budaya oleh Tim Ahli WBTB",
                    "Unggah data ke sistem Warisan Budaya Takbenda Indonesia (WBTBI)"
                ],
                sla: "19 Hari Kerja",
                slaDays: 19,
                cost: "GRATIS (Rp 0)",
                product: "Surat Pengantar Usulan & Tanda Pencatatan WBTB Sistem Nasional",
                complaintChannel: "Layanan Pengaduan Elektronik Disdikbud / SP4N-LAPOR!",
                facilities: ["Perangkat Audio-Visual", "Portal Sistem WBTBI Kemendikbudristek"],
                competency: "Ahli Etnografi, Antropologi, dan Kebudayaan Lokal Maluku.",
                internalSupervision: "Kepala Bidang Kebudayaan",
                executors: 3,
                guarantee: "Perlindungan hak cipta komunal karya budaya lokal Maluku.",
                evaluation: "Evaluasi tahunan persidangan WBTB tingkat nasional."
            }
        ];

        const DB_SOP_LIST = @json($sopList ?? []);

        function App() {
            const isExternalUrl = (url) => {
                if (!url) return false;
                if (url.startsWith('/') || url.endsWith('.html') || url.startsWith('#')) return false;
                try {
                    const parsed = new URL(url, window.location.origin);
                    return parsed.origin !== window.location.origin;
                } catch (e) {
                    return false;
                }
            };

            const [selectedServiceModal, setSelectedServiceModal] = useState(null);
            const [selectedCardMonev, setSelectedCardMonev] = useState(null);
            const [searchQuery, setSearchQuery] = useState("");
            const [activeCategory, setActiveCategory] = useState("ALL");

            // SOP Upload state
            const [uploadForm, setUploadForm] = useState({
                sender_name: "",
                phone: "",
                email: "",
                instance: "",
                notes: ""
            });
            const [uploadFile, setUploadFile] = useState(null);
            const [isUploading, setIsUploading] = useState(false);
            const [uploadSuccess, setUploadSuccess] = useState(null);
            const [uploadError, setUploadError] = useState(null);
            const fileInputRef = useRef(null);

            useEffect(() => {
                if (selectedServiceModal) {
                    setUploadSuccess(null);
                    setUploadError(null);
                    setUploadFile(null);
                    if (fileInputRef.current) fileInputRef.current.value = "";
                }
            }, [selectedServiceModal]);

            const getBidangFromCode = (code) => {
                if (!code) return 'umum';
                if (code.startsWith('KEP')) return 'kepegawaian';
                if (code.startsWith('SMA')) return 'sma';
                if (code.startsWith('SMK')) return 'smk';
                if (code.startsWith('SLB')) return 'pk';
                if (code.startsWith('BDY')) return 'kebudayaan';
                if (code.startsWith('GTK')) return 'gtk';
                return 'umum';
            };

            const handleFileChange = (e) => {
                if (e.target.files && e.target.files[0]) {
                    setUploadFile(e.target.files[0]);
                }
            };

            const handleUploadSubmit = async (e) => {
                e.preventDefault();
                if (!uploadFile) {
                    setUploadError("Silakan pilih file berkas terlebih dahulu.");
                    return;
                }
                if (!uploadForm.sender_name.trim()) {
                    setUploadError("Nama pemohon/pengusul wajib diisi.");
                    return;
                }
                setIsUploading(true);
                setUploadError(null);
                setUploadSuccess(null);

                try {
                    const formData = new FormData();
                    formData.append('_token', '{{ csrf_token() }}');
                    formData.append('service_code', selectedServiceModal.code);
                    formData.append('service_title', selectedServiceModal.title);
                    formData.append('bidang', getBidangFromCode(selectedServiceModal.code));
                    formData.append('sender_name', uploadForm.sender_name);
                    formData.append('phone', uploadForm.phone || '');
                    formData.append('email', uploadForm.email || '');
                    formData.append('instance', uploadForm.instance || '');
                    formData.append('notes', uploadForm.notes || '');
                    formData.append('document_file', uploadFile);

                    const response = await fetch('/layanan/sop/upload', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                        body: formData
                    });

                    const resData = await response.json();
                    if (response.ok && resData.success) {
                        setUploadSuccess(resData.message || 'Berkas permohonan berhasil dikirim!');
                        setUploadForm({
                            sender_name: "",
                            phone: "",
                            email: "",
                            instance: "",
                            notes: ""
                        });
                        setUploadFile(null);
                        if (fileInputRef.current) fileInputRef.current.value = "";
                    } else {
                        const errs = resData.errors ? Object.values(resData.errors).flat().join(", ") : (resData.message || "Gagal mengunggah berkas");
                        setUploadError(errs);
                    }
                } catch (err) {
                    console.error(err);
                    setUploadError("Terjadi kesalahan jaringan saat mengunggah berkas.");
                } finally {
                    setIsUploading(false);
                }
            };

            const chartLineRef = useRef(null);
            const chartBarRef = useRef(null);
            const lineInstance = useRef(null);
            const barInstance = useRef(null);

            // Filtered Services List
            const filteredServices = useMemo(() => {
                return ALL_SERVICES_CATALOG.filter(service => {
                    const matchesCategory = activeCategory === "ALL" || service.category === activeCategory;
                    const matchesQuery = searchQuery === "" ||
                        service.title.toLowerCase().includes(searchQuery.toLowerCase()) ||
                        service.code.toLowerCase().includes(searchQuery.toLowerCase()) ||
                        service.category.toLowerCase().includes(searchQuery.toLowerCase());
                    return matchesCategory && matchesQuery;
                });
            }, [activeCategory, searchQuery]);

            // Unique Categories for Filter
            const categories = useMemo(() => {
                return [
                    "ALL",
                    "Kepegawaian & Umum",
                    "GTK",
                    "Pembinaan SMA",
                    "Pembinaan SMK",
                    "Pendidikan Khusus (PK)",
                    "Kebudayaan"
                ];
            }, []);

            useEffect(() => {
                if (lineInstance.current) lineInstance.current.destroy();
                if (barInstance.current) barInstance.current.destroy();

                // 1. Line Chart: Tren Rating Produk Layanan (Skala 4.00 - All Units)
                if (chartLineRef.current) {
                    const ctxLine = chartLineRef.current.getContext('2d');
                    lineInstance.current = new Chart(ctxLine, {
                        type: 'line',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
                            datasets: [{
                                label: 'Indeks Kepuasan Layanan Publik Dinas (SKM 4.00)',
                                data: [3.81, 3.84, 3.88, 3.90, 3.92, 3.94, 3.95, 3.97, 3.98, 3.99, 3.99, 4.00],
                                borderColor: '#eab308',
                                backgroundColor: 'rgba(234, 179, 8, 0.12)',
                                fill: true,
                                tension: 0.35,
                                borderWidth: 3,
                                pointBackgroundColor: '#0a1428',
                                pointBorderColor: '#facc15',
                                pointRadius: 5,
                                pointHoverRadius: 8
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    labels: {
                                        font: { family: 'Plus Jakarta Sans', size: 12, weight: 'bold' },
                                        color: '#0f172a'
                                    }
                                },
                                tooltip: {
                                    callbacks: {
                                        label: (context) => ` Skor SKM Dinas: ${context.parsed.y} / 4.00 (Sangat Baik)`
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    min: 3.5,
                                    max: 4.0,
                                    ticks: { color: '#64748b' },
                                    grid: { color: '#e2e8f0' }
                                },
                                x: {
                                    ticks: { color: '#64748b' },
                                    grid: { display: false }
                                }
                            }
                        }
                    });
                }

                // 2. Bar Chart: Top Produk Layanan per Sub Bagian / Bidang
                if (chartBarRef.current) {
                    const ctxBar = chartBarRef.current.getContext('2d');
                    barInstance.current = new Chart(ctxBar, {
                        type: 'bar',
                        data: {
                            labels: ['Kepegawaian & Umum', 'GTK (Sertifikasi/NUPTK)', 'Pembinaan SMA', 'Pembinaan SMK (Vokasi)', 'Pendidikan Khusus (PK)', 'Bidang Kebudayaan'],
                            datasets: [{
                                label: 'Volume Permohonan Terlayani Sesuai SLA (100% On-Time)',
                                data: [1850, 2420, 1290, 1150, 680, 940],
                                backgroundColor: [
                                    '#0a1428', '#1d2b45', '#0284c7', '#2563eb', '#0d9488', '#ca8a04'
                                ],
                                borderRadius: 8
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { display: false }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: { color: '#64748b' },
                                    grid: { color: '#f1f5f9' }
                                },
                                x: {
                                    ticks: { color: '#334155', font: { family: 'Plus Jakarta Sans', size: 10, weight: '700' } },
                                    grid: { display: false }
                                }
                            }
                        }
                    });
                }

                return () => {
                    if (lineInstance.current) lineInstance.current.destroy();
                    if (barInstance.current) barInstance.current.destroy();
                };
            }, []);

            return (
                <div className="min-h-screen flex flex-col bg-white text-slate-900">
                    {/* Upper Header Bar - Government Identifier */}
                    <nav className="bg-navy-950 border-b border-navy-800 text-white sticky top-0 z-30 shadow-lg">
                        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex flex-col sm:flex-row items-center justify-between gap-2">
                            <div className="flex items-center gap-3">
                                <a href="{{ url('/') }}" className="flex items-center gap-2 text-slate-300 hover:text-white transition-colors group">
                                    <svg className="w-4 h-4 text-gold-400 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                    </svg>
                                    <span className="text-xs font-bold text-gold-400 uppercase tracking-wider">Kembali ke Beranda</span>
                                </a>
                                <span className="text-slate-600 hidden sm:inline">|</span>
                                <div className="h-3 w-3 rounded-full bg-gold-400 animate-pulse hidden sm:inline-block"></div>
                                <span className="text-xs sm:text-sm font-semibold text-slate-200 tracking-wider uppercase">
                                    Pemerintah Daerah Provinsi Maluku
                                </span>
                            </div>
                            <div className="flex items-center gap-3">
                                <div className="text-xs font-medium text-gold-400 bg-navy-900 px-3.5 py-1 rounded-full border border-gold-500/30">
                                    Dinas Pendidikan dan Kebudayaan
                                </div>
                                <a href="{{ url('/ppid') }}" className="hidden md:inline-block text-xs font-semibold text-slate-300 hover:text-white transition-colors">PPID</a>
                                <a href="{{ url('/skm') }}" className="hidden md:inline-block text-xs font-semibold text-slate-300 hover:text-white transition-colors">SKM</a>
                                <a href="{{ url('/anggaran') }}" className="hidden md:inline-block text-xs font-semibold text-slate-300 hover:text-white transition-colors">Anggaran</a>
                            </div>
                        </div>
                    </nav>

                    {/* 1. HALAMAN PEMBUKA (HERO SECTION) - TYPOGRAPHY DRIVEN, TANPA LOGO */}
                    <header className="bg-gradient-to-br from-navy-950 via-navy-900 to-navy-800 text-white py-16 px-4 sm:px-6 lg:px-8 border-b-4 border-gold-500 shadow-2xl relative overflow-hidden">
                        <div className="absolute -top-32 -right-32 w-96 h-96 bg-gold-500/10 rounded-full blur-3xl pointer-events-none"></div>
                        <div className="absolute -bottom-32 -left-32 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>

                        <div className="max-w-7xl mx-auto text-center space-y-5 relative z-10">
                            {/* Subjudul Opening Dashboard */}
                            <div className="inline-block">
                                <p className="text-xs sm:text-sm font-extrabold tracking-widest text-gold-400 uppercase bg-navy-900/90 px-5 py-2 rounded-full border border-gold-500/40 shadow-sm">
                                    Dinas Pendidikan & Kebudayaan Provinsi Maluku
                                </p>
                            </div>

                            {/* Judul Utama */}
                            <h1 className="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-white max-w-5xl mx-auto leading-tight">
                                Produk Layanan Dinas Pendidikan & Kebudayaan <span className="gold-gradient-text block mt-1">Provinsi Maluku</span>
                            </h1>

                            <p className="text-xs sm:text-sm text-slate-300 max-w-3xl mx-auto font-medium leading-relaxed">
                                Portal Transparansi Standar Pelayanan Publik Terpadu 6 Unit Kerja & Bidang Pembinaan Pemerintah Daerah Provinsi Maluku
                            </p>

                            {/* Badge Poin Pelayanan */}
                            <div className="pt-3 flex flex-wrap items-center justify-center gap-3 sm:gap-4 text-xs font-semibold text-slate-300">
                                <span className="flex items-center gap-2 bg-navy-900/80 px-3.5 py-1.5 rounded-xl border border-slate-700 shadow-sm">
                                    <span className="w-2 h-2 rounded-full bg-emerald-400"></span> 100% Bebas Biaya (Rp 0 / GRATIS)
                                </span>
                                <span className="flex items-center gap-2 bg-navy-900/80 px-3.5 py-1.5 rounded-xl border border-slate-700 shadow-sm">
                                    <span className="w-2 h-2 rounded-full bg-gold-400"></span> Kepastian Jangka Waktu (SLA On-Time)
                                </span>
                                <span className="flex items-center gap-2 bg-navy-900/80 px-3.5 py-1.5 rounded-xl border border-slate-700 shadow-sm">
                                    <span className="w-2 h-2 rounded-full bg-sky-400"></span> Standar Operasional Prosedur (SOP 14 Komponen)
                                </span>
                            </div>
                        </div>
                    </header>

                    {/* MAIN CONTENT AREA */}
                    <main className="flex-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 w-full space-y-14">

                        {/* 2. KEGIATAN UTAMA MONEV (CARD SECTION - 6 CARDS GRID FOR ALL UNITS) */}
                        <section className="space-y-6">
                            <div className="flex flex-col sm:flex-row items-start sm:items-end justify-between gap-3 border-b border-slate-200 pb-4">
                                <div>
                                    <h2 className="text-xl sm:text-2xl font-extrabold text-navy-950 flex items-center gap-2.5">
                                        <span className="w-2.5 h-7 bg-gold-500 rounded-full"></span>
                                        Kegiatan Utama Monitoring & Evaluasi (Monev)
                                    </h2>
                                    <p className="text-xs sm:text-sm text-slate-500 mt-1">
                                        Ringkasan kinerja pelayanan publik dari 6 Sub Bagian & Bidang Pembinaan Dinas Pendidikan dan Kebudayaan Provinsi Maluku
                                    </p>
                                </div>
                                <span className="text-xs font-bold text-navy-900 bg-gold-400/20 px-3.5 py-1.5 rounded-full border border-gold-500/40">
                                    Total 6 Unit Kerja / Bidang
                                </span>
                            </div>

                            {/* Grid 6 Cards Modern */}
                            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                {MONEV_UNITS.map((unit) => (
                                    <div 
                                        key={unit.id}
                                        className="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group relative overflow-hidden"
                                    >
                                        <div className="absolute top-0 right-0 w-28 h-28 bg-navy-900/5 rounded-bl-full pointer-events-none group-hover:bg-gold-500/10 transition-all"></div>
                                        
                                        <div className="space-y-3 relative z-10">
                                            <div className="flex items-center justify-between">
                                                <span className="text-[11px] font-extrabold text-gold-400 bg-navy-950 px-3 py-1 rounded-lg border border-navy-800 uppercase tracking-wider">
                                                    {unit.code}
                                                </span>
                                                <span className="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-md border border-emerald-200">
                                                    {unit.statusMonev}
                                                </span>
                                            </div>

                                            <h3 className="text-base font-extrabold text-navy-950 group-hover:text-blue-700 transition-colors pt-1">
                                                <a href={unit.url} target={isExternalUrl(unit.url) ? "_blank" : undefined} rel={isExternalUrl(unit.url) ? "noopener noreferrer" : undefined} className="hover:underline flex items-center justify-between gap-1">
                                                    <span>{unit.title}</span>
                                                    <svg className="w-4 h-4 text-gold-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                                    </svg>
                                                </a>
                                            </h3>

                                            <p className="text-xs text-slate-600 leading-relaxed min-h-[3.5rem]">
                                                {unit.description}
                                            </p>

                                            <div className="pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500 font-medium">
                                                <span>Cakupan: <strong className="text-slate-800">{unit.shortName}</strong></span>
                                                <span>Base: <strong className="text-slate-800">{unit.database}</strong></span>
                                            </div>
                                        </div>

                                        <div className="mt-6 flex flex-col sm:flex-row gap-2">
                                            <a href={unit.url} target={isExternalUrl(unit.url) ? "_blank" : undefined} rel={isExternalUrl(unit.url) ? "noopener noreferrer" : undefined} className="flex-1 py-2.5 bg-navy-950 hover:bg-navy-900 text-gold-400 font-bold text-xs rounded-xl shadow transition-all flex items-center justify-center gap-1.5 border border-gold-500/30 group-hover:border-gold-500/60"
                                            >
                                                <span>Akses Layanan</span>
                                                <svg className="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                                </svg>
                                            </a>
                                            <button 
                                                onClick={() => setSelectedCardMonev(unit)}
                                                className="py-2.5 px-3.5 bg-slate-100 hover:bg-slate-200 text-navy-950 font-bold text-xs rounded-xl transition-all border border-slate-200"
                                                title="Detail Laporan Monev"
                                            >
                                                <span>Laporan</span>
                                            </button>
                                        </div>
                                    </div>
                                ))}
                            </div>
                        </section>

                        {/* 3. INFOGRAFIS LAPORAN (GRAFIK DATA) */}
                        <section className="space-y-6">
                            <div className="border-b border-slate-200 pb-4">
                                <h2 className="text-xl sm:text-2xl font-extrabold text-navy-950 flex items-center gap-2.5">
                                    <span className="w-2.5 h-7 bg-navy-950 rounded-full"></span>
                                    Infografis Laporan (Grafik Data)
                                </h2>
                                <p className="text-xs sm:text-sm text-slate-500 mt-1">
                                    Evaluasi data kualitatif dan kuantitatif pelaksanaan standar pelayanan publik 6 Unit Kerja & Bidang Pembinaan
                                </p>
                            </div>

                            {/* Charts Grid */}
                            <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                {/* LINE CHART */}
                                <div className="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
                                    <div>
                                        <div className="flex items-center justify-between border-b border-slate-100 pb-3">
                                            <div>
                                                <h3 className="text-sm font-extrabold text-navy-950 uppercase tracking-wide">
                                                    Line Chart: Tren Rating Produk Layanan
                                                </h3>
                                                <p className="text-xs text-slate-500 mt-0.5">
                                                    Perkembangan Indeks Kepuasan Masyarakat (SKM) Dinas Pendidikan & Kebudayaan
                                                </p>
                                            </div>
                                            <span className="px-3 py-1 bg-amber-50 text-amber-800 font-extrabold text-xs rounded-lg border border-amber-200">
                                                ★ 4.00 / 4.00
                                            </span>
                                        </div>
                                    </div>
                                    <div className="h-64 mt-4 relative">
                                        <canvas ref={chartLineRef}></canvas>
                                    </div>
                                </div>

                                {/* BAR CHART */}
                                <div className="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
                                    <div>
                                        <div className="flex items-center justify-between border-b border-slate-100 pb-3">
                                            <div>
                                                <h3 className="text-sm font-extrabold text-navy-950 uppercase tracking-wide">
                                                    Bar Chart: Top Produk Layanan
                                                </h3>
                                                <p className="text-xs text-slate-500 mt-0.5">
                                                    Volume Berkas Permohonan Terlayani per Sub Bagian / Bidang Pembinaan
                                                </p>
                                            </div>
                                            <span className="px-3 py-1 bg-emerald-50 text-emerald-800 font-extrabold text-xs rounded-lg border border-emerald-200">
                                                Total &gt; 8,000 Berkas
                                            </span>
                                        </div>
                                    </div>
                                    <div className="h-64 mt-4 relative">
                                        <canvas ref={chartBarRef}></canvas>
                                    </div>
                                </div>
                            </div>

                            {/* CATATAN HASIL PELAPORAN */}
                            <div className="bg-gradient-to-r from-navy-950 via-navy-900 to-navy-800 text-white rounded-2xl p-7 shadow-md border-l-4 border-gold-500 relative overflow-hidden">
                                <div className="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                                    <div className="space-y-3 w-full">
                                        <div className="flex items-center gap-2">
                                            <span className="w-2.5 h-2.5 rounded-full bg-gold-400 animate-ping"></span>
                                            <h3 className="text-base font-extrabold text-gold-400 uppercase tracking-wider">
                                                Catatan Hasil Pelaporan
                                            </h3>
                                        </div>

                                        {/* 3 Catatan Pelaporan Mandatori */}
                                        <div className="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2 text-xs sm:text-sm">
                                            <div className="flex items-center gap-3 bg-navy-900/90 px-4 py-3.5 rounded-xl border border-navy-700">
                                                <span className="text-gold-400 font-bold text-lg">📌</span>
                                                <span className="font-semibold text-slate-100">Informatif, terpercaya, berwibawa.</span>
                                            </div>
                                            <div className="flex items-center gap-3 bg-navy-900/90 px-4 py-3.5 rounded-xl border border-navy-700">
                                                <span className="text-gold-400 font-bold text-lg">📌</span>
                                                <span className="font-semibold text-slate-100">Menunjukkan capaian secara data-driven.</span>
                                            </div>
                                            <div className="flex items-center gap-3 bg-navy-900/90 px-4 py-3.5 rounded-xl border border-navy-700">
                                                <span className="text-gold-400 font-bold text-lg">📌</span>
                                                <span className="font-semibold text-slate-100">Disiapkan sebagai bahan laporan pimpinan.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        {/* 4. TOMBOL AKSI (ACTION BUTTON) */}
                        <section className="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm text-center space-y-4">
                            <div className="max-w-2xl mx-auto space-y-2">
                                <span className="inline-block px-4 py-1 bg-gold-400/20 text-gold-700 font-extrabold text-xs rounded-full border border-gold-500/40 uppercase tracking-widest">
                                    Laporan Digital – Wujud Integritas
                                </span>
                                <h3 className="text-xl font-extrabold text-navy-950">
                                    Akses Portal Integrasi Satu Data Pelayanan Publik
                                </h3>
                                <p className="text-xs sm:text-sm text-slate-500">
                                    Akses direktori seluruh produk standar pelayanan publik Dinas Pendidikan dan Kebudayaan Provinsi Maluku lengkap dengan Standar Operasional Prosedur (SOP) 14 Komponen resmi.
                                </p>
                            </div>

                            <div className="pt-2">
                                <button 
                                    onClick={() => {
                                        const el = document.getElementById('directory-section');
                                        if (el) el.scrollIntoView({ behavior: 'smooth' });
                                    }}
                                    className="px-8 py-3.5 bg-gradient-to-r from-navy-950 to-navy-800 hover:from-navy-900 hover:to-navy-700 text-gold-400 font-extrabold text-sm sm:text-base rounded-2xl shadow-lg hover:shadow-gold-500/10 transition-all border-2 border-gold-500/40 inline-flex items-center justify-center gap-3 group"
                                >
                                    <span>Profil Satu Data Dinas Pendidikan dan Kebudayaan Provinsi Maluku</span>
                                    <svg className="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </button>
                            </div>
                        </section>

                        {/* 5. DIREKTORI DETAIL PRODUK LAYANAN */}
                        <section id="directory-section" className="space-y-6 pt-4">
                            <div className="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 border-b border-slate-200 pb-4">
                                <div>
                                    <h2 className="text-xl sm:text-2xl font-extrabold text-navy-950 flex items-center gap-2.5">
                                        <span className="w-2.5 h-7 bg-gold-500 rounded-full"></span>
                                        Direktori Produk Layanan Dinas Pendidikan & Kebudayaan
                                    </h2>
                                    <p className="text-xs sm:text-sm text-slate-500 mt-1">
                                        Pilih kategori unit kerja dan klik pada kartu layanan untuk rincian SOP 14 Komponen resmi
                                    </p>
                                </div>

                                {/* Filter Category Tabs */}
                                <div className="flex items-center gap-1.5 overflow-x-auto custom-scrollbar max-w-full pb-1">
                                    {categories.map((cat) => (
                                        <button
                                            key={cat}
                                            onClick={() => setActiveCategory(cat)}
                                            className={`px-3.5 py-2 rounded-xl text-xs font-bold whitespace-nowrap transition-all ${
                                                activeCategory === cat
                                                    ? "bg-navy-950 text-gold-400 shadow-sm border border-gold-500/40"
                                                    : "bg-white text-slate-600 hover:bg-slate-100 border border-slate-200"
                                            }`}
                                        >
                                            {cat === "ALL" ? `Semua (${ALL_SERVICES_CATALOG.length})` : cat}
                                        </button>
                                    ))}
                                </div>
                            </div>

                            {/* Search Box */}
                            <div className="relative max-w-md">
                                <input 
                                    type="text"
                                    value={searchQuery}
                                    onChange={(e) => setSearchQuery(e.target.value)}
                                    placeholder="Cari jenis layanan, kode, atau kata kunci..."
                                    className="w-full pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-navy-900/20 focus:border-navy-900 transition-all shadow-sm"
                                />
                                <svg className="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>

                            {/* Services Grid */}
                            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                                {filteredServices.map((service) => (
                                    <div 
                                        key={service.id}
                                        className="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group relative overflow-hidden"
                                    >
                                        <div className="space-y-3">
                                            <div className="flex items-center justify-between">
                                                <span className="px-2.5 py-0.5 rounded-md text-[10px] font-extrabold bg-navy-950 text-gold-400 border border-navy-800 uppercase tracking-wide">
                                                    {service.code}
                                                </span>
                                                <span className="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-md border border-emerald-200">
                                                    {service.cost}
                                                </span>
                                            </div>

                                            <h3 className="text-base font-extrabold text-navy-950 group-hover:text-blue-700 transition-colors">
                                                {service.title}
                                            </h3>

                                            <span className="inline-block text-[11px] font-semibold text-slate-600 bg-slate-100 px-2.5 py-0.5 rounded-md">
                                                Unit: {service.category}
                                            </span>

                                            <div className="pt-3 border-t border-slate-100 space-y-1.5 text-xs">
                                                <div className="flex items-center justify-between text-slate-600">
                                                    <span>Jangka Waktu Penyelesaian (SLA):</span>
                                                    <span className="font-semibold text-slate-900">{service.sla}</span>
                                                </div>
                                                <div className="flex items-center justify-between text-slate-600">
                                                    <span>Jumlah Pelaksana:</span>
                                                    <span className="font-semibold text-slate-900">{service.executors} Orang Petugas</span>
                                                </div>
                                            </div>
                                        </div>

                                        <button 
                                            onClick={() => setSelectedServiceModal(service)}
                                            className="mt-6 w-full py-2.5 bg-slate-50 hover:bg-navy-950 hover:text-gold-400 text-navy-950 font-bold text-xs rounded-xl border border-slate-200 transition-all flex items-center justify-center gap-1.5"
                                        >
                                            <span>Lihat SOP 14 Komponen</span>
                                            <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </button>
                                    </div>
                                ))}
                            </div>

                            {filteredServices.length === 0 && (
                                <div className="bg-white p-12 rounded-2xl text-center border border-slate-200 text-slate-500 space-y-2">
                                    <p className="font-bold text-base">Tidak ada layanan yang sesuai kata kunci pencarian</p>
                                    <p className="text-xs">Silakan coba kata kunci lain atau pilih kategori "Semua".</p>
                                </div>
                            )}
                        </section>
                    </main>

                    {/* FOOTER */}
                    <footer className="bg-navy-950 text-slate-400 py-10 border-t-2 border-gold-500/40 mt-auto text-xs">
                        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4 text-center sm:text-left flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div>
                                <p className="font-extrabold text-white text-sm">
                                    Dinas Pendidikan dan Kebudayaan Provinsi Maluku
                                </p>
                                <p className="text-slate-400 text-xs mt-1">
                                    Pemerintah Daerah Provinsi Maluku © 2026. Hak Cipta Dilindungi Undang-Undang.
                                </p>
                            </div>

                            <div className="text-center sm:text-right text-[11px] text-slate-400 space-y-1">
                                <p>Jl. Jend. Ahmad Yani, Kel. Batu Gajah, Kec. Sirimau, Kota Ambon - Maluku</p>
                                <p>Laman Resmi: <a href="https://disdikbud.malukuprov.go.id/" target="_blank" rel="noreferrer" className="text-gold-400 hover:underline font-semibold">https://disdikbud.malukuprov.go.id/</a></p>
                            </div>
                        </div>
                    </footer>

                    {/* MODAL SOP 14 KOMPONEN DETAIL */}
                    {selectedServiceModal && (
                        <div className="fixed inset-0 z-50 bg-navy-950/70 backdrop-blur-sm flex items-center justify-center p-4 overflow-y-auto">
                            <div className="bg-white rounded-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto custom-scrollbar shadow-2xl border border-gold-500/40 my-auto">
                                {/* Modal Header */}
                                <div className="sticky top-0 bg-navy-950 text-white px-6 py-4 border-b border-navy-800 flex items-center justify-between z-10">
                                    <div>
                                        <div className="flex items-center gap-2">
                                            <span className="px-2.5 py-0.5 rounded text-[10px] font-extrabold bg-gold-400 text-navy-950">
                                                {selectedServiceModal.code}
                                            </span>
                                            <span className="text-xs text-gold-300 font-semibold">{selectedServiceModal.category}</span>
                                        </div>
                                        <h3 className="text-base font-extrabold text-white mt-1">
                                            {selectedServiceModal.title}
                                        </h3>
                                    </div>
                                    <button 
                                        onClick={() => setSelectedServiceModal(null)}
                                        className="p-1.5 rounded-lg text-slate-300 hover:text-white hover:bg-navy-900 transition-all"
                                    >
                                        <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>

                                {/* Modal Body - 14 Official Components */}
                                <div className="p-6 space-y-6 text-xs sm:text-sm">
                                    <div className="grid grid-cols-2 gap-3 p-3.5 bg-slate-50 rounded-xl border border-slate-200">
                                        <div>
                                            <p className="text-[10px] text-slate-400 font-bold uppercase">Unit Kerja Penanggung Jawab</p>
                                            <p className="font-bold text-navy-950">{selectedServiceModal.category}</p>
                                        </div>
                                        <div>
                                            <p className="text-[10px] text-slate-400 font-bold uppercase">Biaya / Tarif</p>
                                            <p className="font-bold text-emerald-600">{selectedServiceModal.cost}</p>
                                        </div>
                                    </div>

                                    {/* 1. Jenis Pelayanan */}
                                    <div>
                                        <h4 className="font-extrabold text-navy-950 uppercase text-xs tracking-wider mb-1 flex items-center gap-2">
                                            <span className="w-1.5 h-3 bg-gold-500 rounded"></span> 1. Jenis Pelayanan:
                                        </h4>
                                        <p className="text-slate-800 font-bold bg-slate-50 p-3 rounded-xl border">{selectedServiceModal.title}</p>
                                    </div>

                                    {/* 2. Dasar Hukum */}
                                    <div>
                                        <h4 className="font-extrabold text-navy-950 uppercase text-xs tracking-wider mb-2 flex items-center gap-2">
                                            <span className="w-1.5 h-3 bg-gold-500 rounded"></span> 2. Dasar Hukum:
                                        </h4>
                                        <ol className="list-decimal list-inside space-y-1 text-slate-700 text-xs bg-slate-50 p-3.5 rounded-xl border">
                                            {selectedServiceModal.legal.map((item, i) => (
                                                <li key={i} className="leading-relaxed">{item}</li>
                                            ))}
                                        </ol>
                                    </div>

                                    {/* 3. Persyaratan Pelayanan */}
                                    <div>
                                        <h4 className="font-extrabold text-navy-950 uppercase text-xs tracking-wider mb-2 flex items-center gap-2">
                                            <span className="w-1.5 h-3 bg-gold-500 rounded"></span> 3. Persyaratan Pelayanan:
                                        </h4>
                                        <ol className="list-decimal list-inside space-y-1 text-slate-700 text-xs bg-amber-50/50 p-3.5 rounded-xl border border-amber-200/60">
                                            {selectedServiceModal.requirements.map((item, i) => (
                                                <li key={i} className="font-medium">{item}</li>
                                            ))}
                                        </ol>
                                    </div>

                                    {/* 4. Prosedur */}
                                    <div>
                                        <h4 className="font-extrabold text-navy-950 uppercase text-xs tracking-wider mb-2 flex items-center gap-2">
                                            <span className="w-1.5 h-3 bg-gold-500 rounded"></span> 4. Sistem, Mekanisme, dan Prosedur:
                                        </h4>
                                        <ol className="list-decimal list-inside space-y-2 text-slate-700 text-xs bg-slate-50 p-3.5 rounded-xl border">
                                            {selectedServiceModal.procedure.map((step, i) => (
                                                <li key={i} className="leading-relaxed"><span className="font-semibold text-slate-900">{step}</span></li>
                                            ))}
                                        </ol>
                                    </div>

                                    {/* 5, 6, 7 */}
                                    <div className="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                        <div className="p-3 bg-slate-50 rounded-xl border">
                                            <p className="text-[10px] text-slate-400 font-bold uppercase">5. Jangka Waktu</p>
                                            <p className="font-bold text-navy-950 text-xs mt-0.5">{selectedServiceModal.sla}</p>
                                        </div>
                                        <div className="p-3 bg-slate-50 rounded-xl border">
                                            <p className="text-[10px] text-slate-400 font-bold uppercase">6. Biaya / Tarif</p>
                                            <p className="font-bold text-emerald-600 text-xs mt-0.5">{selectedServiceModal.cost}</p>
                                        </div>
                                        <div className="p-3 bg-slate-50 rounded-xl border">
                                            <p className="text-[10px] text-slate-400 font-bold uppercase">7. Produk Pelayanan</p>
                                            <p className="font-bold text-navy-950 text-xs mt-0.5 line-clamp-3">{selectedServiceModal.product}</p>
                                        </div>
                                    </div>

                                    {/* 8. Pengaduan */}
                                    <div>
                                        <h4 className="font-extrabold text-navy-950 uppercase text-xs tracking-wider mb-1">8. Penanganan Pengaduan, Saran, dan Masukan:</h4>
                                        <div className="text-xs text-slate-600 bg-slate-50 p-3 rounded-xl border space-y-1">
                                            <p>• Konsultasi langsung di Kantor Dinas Pendidikan dan Kebudayaan Prov. Maluku</p>
                                            <p>• Portal Pengaduan Resmi: <a href="https://disdikbud.malukuprov.go.id/pengaduan" target="_blank" rel="noreferrer" className="text-blue-600 hover:underline">https://disdikbud.malukuprov.go.id/pengaduan</a></p>
                                            <p>• Aplikasi Nasional SP4N-LAPOR!</p>
                                        </div>
                                    </div>

                                    {/* 9, 10, 11, 12 */}
                                    <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                                        <div className="p-3 bg-slate-50 rounded-xl border space-y-1">
                                            <p className="font-bold text-navy-950 uppercase text-[10px]">9. Sarana, Prasarana, & Fasilitas</p>
                                            <p className="text-slate-600">{selectedServiceModal.facilities.join(", ")}</p>
                                        </div>
                                        <div className="p-3 bg-slate-50 rounded-xl border space-y-1">
                                            <p className="font-bold text-navy-950 uppercase text-[10px]">10. Kompetensi Pelaksana</p>
                                            <p className="text-slate-600">{selectedServiceModal.competency}</p>
                                        </div>
                                        <div className="p-3 bg-slate-50 rounded-xl border space-y-1">
                                            <p className="font-bold text-navy-950 uppercase text-[10px]">11. Pengawasan Internal</p>
                                            <p className="text-slate-600">{selectedServiceModal.internalSupervision}</p>
                                        </div>
                                        <div className="p-3 bg-slate-50 rounded-xl border space-y-1">
                                            <p className="font-bold text-navy-950 uppercase text-[10px]">12. Jumlah Pelaksana</p>
                                            <p className="text-slate-600 font-bold">{selectedServiceModal.executors} orang petugas</p>
                                        </div>
                                    </div>

                                    {/* 13 & 14 */}
                                    <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                                        <div className="p-3 bg-slate-50 rounded-xl border space-y-1">
                                            <p className="font-bold text-navy-950 uppercase text-[10px]">13. Jaminan Pelayanan</p>
                                            <p className="text-slate-600 leading-relaxed">{selectedServiceModal.guarantee}</p>
                                        </div>
                                        <div className="p-3 bg-slate-50 rounded-xl border space-y-1">
                                            <p className="font-bold text-navy-950 uppercase text-[10px]">14. Evaluasi Kinerja Pelaksana</p>
                                            <p className="text-slate-600 leading-relaxed">{selectedServiceModal.evaluation}</p>
                                        </div>
                                    </div>

                                    {/* Official SOP Download & Input File Permohonan (Database CMS Dikbud) */}
                                    <div className="border-t-2 border-slate-200/80 pt-5 space-y-4">
                                        {/* Unduh Dokumen SOP Resmi (jika ada file di DB) */}
                                        {(() => {
                                            const masterSop = DB_SOP_LIST && DB_SOP_LIST[selectedServiceModal.code];
                                            if (masterSop && masterSop.official_sop_file) {
                                                return (
                                                    <div className="bg-gradient-to-r from-navy-950 via-navy-900 to-navy-800 text-white p-4 rounded-xl border border-gold-500/40 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 shadow-md">
                                                        <div className="flex items-center gap-3">
                                                            <div className="w-10 h-10 rounded-lg bg-gold-400 text-navy-950 flex items-center justify-center font-extrabold text-sm shrink-0 shadow">
                                                                PDF
                                                            </div>
                                                            <div>
                                                                <p className="text-[10px] font-bold text-gold-400 uppercase tracking-wider">Dokumen Resmi SOP Tersedia</p>
                                                                <h5 className="font-bold text-xs sm:text-sm text-white line-clamp-1">{masterSop.official_sop_name || 'Dokumen SOP 14 Komponen ' + selectedServiceModal.code}</h5>
                                                                {masterSop.official_sop_size && (
                                                                    <p className="text-[11px] text-slate-300">Ukuran file: {masterSop.official_sop_size}</p>
                                                                )}
                                                            </div>
                                                        </div>
                                                        <a
                                                            href={masterSop.official_sop_file}
                                                            target="_blank"
                                                            rel="noreferrer"
                                                            className="px-4 py-2 bg-gold-400 hover:bg-gold-500 text-navy-950 font-bold text-xs rounded-lg transition-all flex items-center gap-1.5 shrink-0 shadow"
                                                        >
                                                            <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                                            <span>Unduh Dokumen SOP (PDF)</span>
                                                        </a>
                                                    </div>
                                                );
                                            }
                                            return null;
                                        })()}

                                        {/* Form Input Berkas Permohonan */}
                                        <div className="bg-gradient-to-br from-amber-50/60 to-slate-50 p-5 rounded-2xl border-2 border-dashed border-gold-500/50 space-y-4">
                                            <div className="flex items-start justify-between gap-2 border-b border-gold-200 pb-3">
                                                <div>
                                                    <h4 className="font-extrabold text-navy-900 text-sm flex items-center gap-2">
                                                        <svg className="w-4 h-4 text-gold-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                                        <span>Formulir & Input File Persyaratan Layanan ({selectedServiceModal.code})</span>
                                                    </h4>
                                                    <p className="text-xs text-slate-600 mt-0.5">
                                                        Unggah berkas / kelengkapan persyaratan SOP Anda langsung ke sistem database Dinas Pendidikan Provinsi Maluku.
                                                    </p>
                                                </div>
                                                <span className="px-2.5 py-1 bg-gold-400/20 text-navy-950 border border-gold-400/40 rounded-full text-[10px] font-extrabold uppercase shrink-0">
                                                    Database Terintegrasi
                                                </span>
                                            </div>

                                            {uploadSuccess && (
                                                <div className="p-3 bg-emerald-50 border border-emerald-300 rounded-xl flex items-start gap-2.5 text-xs text-emerald-800">
                                                    <svg className="w-4 h-4 text-emerald-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"/></svg>
                                                    <div>
                                                        <p className="font-bold">Unggah Berkas Berhasil!</p>
                                                        <p className="text-[11px] text-emerald-700 mt-0.5">{uploadSuccess}</p>
                                                    </div>
                                                </div>
                                            )}

                                            {uploadError && (
                                                <div className="p-3 bg-red-50 border border-red-300 rounded-xl flex items-start gap-2.5 text-xs text-red-800">
                                                    <svg className="w-4 h-4 text-red-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                    <div>
                                                        <p className="font-bold">Gagal Mengunggah Berkas</p>
                                                        <p className="text-[11px] text-red-700 mt-0.5">{uploadError}</p>
                                                    </div>
                                                </div>
                                            )}

                                            <form onSubmit={handleUploadSubmit} className="space-y-3.5">
                                                <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                                                    <div>
                                                        <label className="block font-bold text-navy-900 mb-1">
                                                            Nama Pemohon / Pengusul <span className="text-red-500">*</span>
                                                        </label>
                                                        <input 
                                                            type="text" 
                                                            required
                                                            value={uploadForm.sender_name}
                                                            onChange={(e) => setUploadForm({...uploadForm, sender_name: e.target.value})}
                                                            placeholder="Contoh: Bpk. Ahmad Dahlan, S.Pd" 
                                                            className="w-full px-3 py-2 bg-white rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-gold-500 text-xs text-slate-800 placeholder:text-slate-400"
                                                        />
                                                    </div>
                                                    <div>
                                                        <label className="block font-bold text-navy-900 mb-1">
                                                            No. HP / WhatsApp <span className="text-red-500">*</span>
                                                        </label>
                                                        <input 
                                                            type="text" 
                                                            required
                                                            value={uploadForm.phone}
                                                            onChange={(e) => setUploadForm({...uploadForm, phone: e.target.value})}
                                                            placeholder="Contoh: 081234567890" 
                                                            className="w-full px-3 py-2 bg-white rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-gold-500 text-xs text-slate-800 placeholder:text-slate-400"
                                                        />
                                                    </div>
                                                </div>

                                                <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                                                    <div>
                                                        <label className="block font-bold text-navy-900 mb-1">
                                                            Asal Satuan / Sekolah / Instansi
                                                        </label>
                                                        <input 
                                                            type="text" 
                                                            value={uploadForm.instance}
                                                            onChange={(e) => setUploadForm({...uploadForm, instance: e.target.value})}
                                                            placeholder="Contoh: SMA / SMK / SLB / Dinas" 
                                                            className="w-full px-3 py-2 bg-white rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-gold-500 text-xs text-slate-800 placeholder:text-slate-400"
                                                        />
                                                    </div>
                                                    <div>
                                                        <label className="block font-bold text-navy-900 mb-1">
                                                            Email Pemohon (Opsional)
                                                        </label>
                                                        <input 
                                                            type="email" 
                                                            value={uploadForm.email}
                                                            onChange={(e) => setUploadForm({...uploadForm, email: e.target.value})}
                                                            placeholder="pemohon@email.com" 
                                                            className="w-full px-3 py-2 bg-white rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-gold-500 text-xs text-slate-800 placeholder:text-slate-400"
                                                        />
                                                    </div>
                                                </div>

                                                {/* File Upload Input */}
                                                <div>
                                                    <label className="block font-bold text-navy-900 mb-1 text-xs">
                                                        Pilih File Dokumen / Berkas Persyaratan <span className="text-red-500">*</span>
                                                    </label>
                                                    <input 
                                                        ref={fileInputRef}
                                                        type="file" 
                                                        required
                                                        onChange={handleFileChange}
                                                        accept=".pdf,.doc,.docx,.zip,.rar,.jpg,.jpeg,.png"
                                                        className="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-navy-900 file:text-gold-400 hover:file:bg-navy-800 file:cursor-pointer p-1.5 bg-white border border-slate-300 rounded-xl"
                                                    />
                                                    <p className="text-[10px] text-slate-500 mt-1">
                                                        Format: PDF, Word (DOC/DOCX), ZIP, JPG, PNG (Maksimal 25 MB).
                                                    </p>
                                                </div>

                                                {/* Notes */}
                                                <div>
                                                    <label className="block font-bold text-navy-900 mb-1 text-xs">
                                                        Catatan / Rincian Berkas (Opsional)
                                                    </label>
                                                    <textarea 
                                                        rows="2"
                                                        value={uploadForm.notes}
                                                        onChange={(e) => setUploadForm({...uploadForm, notes: e.target.value})}
                                                        placeholder="Tuliskan keterangan berkas atau kelengkapan permohonan..." 
                                                        className="w-full px-3 py-2 bg-white rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-gold-500 text-xs text-slate-800 placeholder:text-slate-400"
                                                    ></textarea>
                                                </div>

                                                <div className="flex items-center justify-end gap-2 pt-1">
                                                    <button
                                                        type="submit"
                                                        disabled={isUploading}
                                                        className="px-5 py-2.5 bg-gold-500 hover:bg-gold-600 disabled:opacity-50 text-navy-950 font-extrabold text-xs rounded-xl shadow-md transition-all flex items-center gap-2"
                                                    >
                                                        {isUploading ? (
                                                            <>
                                                                <svg className="animate-spin h-4 w-4 text-navy-950" fill="none" viewBox="0 0 24 24"><circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4"></circle><path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg>
                                                                <span>Mengunggah Berkas ke Database...</span>
                                                            </>
                                                        ) : (
                                                            <>
                                                                <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                                                                <span>Unggah & Kirim Berkas SOP</span>
                                                            </>
                                                        )}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                {/* Modal Footer */}
                                <div className="bg-slate-50 px-6 py-3.5 border-t border-slate-200 flex justify-end">
                                    <button 
                                        onClick={() => setSelectedServiceModal(null)}
                                        className="px-5 py-2 bg-navy-950 hover:bg-navy-900 text-gold-400 font-bold text-xs rounded-xl shadow transition-all"
                                    >
                                        Tutup Dokumen SOP
                                    </button>
                                </div>
                            </div>
                        </div>
                    )}

                    {/* MODAL MONEV CARD DETAIL REPORT */}
                    {selectedCardMonev && (
                        <div className="fixed inset-0 z-50 bg-navy-950/70 backdrop-blur-sm flex items-center justify-center p-4">
                            <div className="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-gold-500/40 space-y-4 my-auto">
                                <div className="flex items-center justify-between border-b border-slate-100 pb-3">
                                    <div>
                                        <span className="text-[10px] font-extrabold text-gold-600 uppercase tracking-wider">{selectedCardMonev.code}</span>
                                        <h3 className="text-base font-extrabold text-navy-950">
                                            Detail Laporan Monev: {selectedCardMonev.title}
                                        </h3>
                                    </div>
                                    <button 
                                        onClick={() => setSelectedCardMonev(null)}
                                        className="text-slate-400 hover:text-slate-700"
                                    >
                                        ✕
                                    </button>
                                </div>
                                <p className="text-xs font-semibold text-blue-800 bg-blue-50 p-3 rounded-xl border border-blue-100">
                                    Cakupan: {selectedCardMonev.scope}
                                </p>
                                <div className="space-y-2">
                                    <h4 className="text-xs font-extrabold text-navy-950 uppercase">Ringkasan Poin Pelaksanaan Service Level Agreement (SLA):</h4>
                                    <ul className="list-disc list-inside space-y-2 text-xs text-slate-700 bg-slate-50 p-4 rounded-xl border">
                                        {selectedCardMonev.details.map((d, i) => (
                                            <li key={i} className="leading-relaxed">{d}</li>
                                        ))}
                                    </ul>
                                </div>
                                <div className="pt-3 border-t border-slate-100 flex items-center justify-between gap-2">
                                    <a href={selectedCardMonev.url} target={isExternalUrl(selectedCardMonev.url) ? "_blank" : undefined} rel={isExternalUrl(selectedCardMonev.url) ? "noopener noreferrer" : undefined} className="px-4 py-2 bg-gold-400 hover:bg-gold-500 text-navy-950 font-bold text-xs rounded-xl shadow transition-all flex items-center gap-1.5"
                                    >
                                        <span>Buka Portal Google Sites</span>
                                        <svg className="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                    </a>
                                    <button 
                                        onClick={() => setSelectedCardMonev(null)}
                                        className="px-5 py-2 bg-navy-950 text-gold-400 font-bold text-xs rounded-xl shadow hover:bg-navy-900 transition-all"
                                    >
                                        Selesai
                                    </button>
                                </div>
                            </div>
                        </div>
                    )}
                </div>
            );
        }

        ReactDOM.createRoot(document.getElementById('root')).render(<App />);
    </script>
</body>
</html>