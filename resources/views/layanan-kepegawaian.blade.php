<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Layanan Sub Bagian Kepegawaian dan Umum - Dinas Pendidikan dan Kebudayaan Provinsi Maluku</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
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
            background-color: #f8fafc;
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
<body class="bg-slate-50 min-h-screen antialiased">
    <div id="root"></div>

    <script type="text/babel">
        const { useState, useEffect, useMemo, useRef } = React;

        // Data 10 Produk Layanan Sub Bagian Kepegawaian dan Umum
        const KEPEGAWAIAN_SERVICES = [
            {
                id: 1,
                code: "KEP-01",
                title: "Surat / Naskah Dinas",
                category: "Administrasi Persuratan",
                legal: [
                    "Undang-Undang Republik Indonesia Nomor 43 Tahun 2009 tentang Kearsipan",
                    "Peraturan Pemerintah Republik Indonesia Nomor 28 Tahun 2012 tentang Pelaksanaan UU Kearsipan",
                    "Peraturan PermenPAN-RB Nomor 15 Tahun 2014 tentang Pedoman Standar Pelayanan",
                    "Peraturan Gubernur Maluku Nomor 39 Tahun 2023 tentang Tata Naskah Dinas"
                ],
                requirements: ["Dokumen / berkas administrasi yang sesuai"],
                procedure: [
                    "Pengirim menyampaikan surat/naskah dinas kepada loket persuratan Sub Bagian Kepegawaian dan Umum.",
                    "Staf mencatat surat masuk dalam buku agenda dan memberi lembar disposisi.",
                    "Kepala Sub Bagian meneliti dan meneruskan surat kepada Sekretaris/Kepala Dinas sesuai substansi.",
                    "Sekretaris/Kepala Dinas memberikan disposisi dan menugaskan Bidang/Unit Terkait untuk menindaklanjuti.",
                    "Bidang/Unit Terkait menindaklanjuti, termasuk menyusun surat balasan/naskah dinas keluar apabila diperlukan.",
                    "Staf Sub Bagian Kepegawaian dan Umum memberi nomor, mencatat dalam buku agenda surat keluar, dan mengirimkan surat keluar.",
                    "Staf mengarsipkan surat masuk dan tembusan surat keluar sesuai klasifikasi dan Jadwal Retensi Arsip."
                ],
                sla: "Surat Masuk ≤ 1 hari kerja, Surat Keluar ≤ 2 hari kerja",
                slaDays: 2,
                cost: "Gratis (Rp 0)",
                product: "Surat masuk yang teragenda & terdisposisi, serta surat keluar yang teragenda & terkirim",
                complaintChannel: "Konsultasi Kantor / https://disdikbud.malukuprov.go.id/pengaduan / SP4N-LAPOR! / TikTok Resmi",
                facilities: ["Buku agenda", "Komputer", "Printer", "Buku ekspedisi"],
                competency: "SMA / Memiliki kemampuan berkomunikasi dan menggunakan komputer",
                internalSupervision: "Atasan langsung",
                executors: 15,
                guarantee: "Bersifat rahasia, melayani secara profesional, sarana penunjang menjamin keselamatan & kenyamanan",
                evaluation: "Survei Kepuasan Masyarakat/Pegawai (SKM) & Evaluasi Berkala"
            },
            {
                id: 2,
                code: "KEP-02",
                title: "Layanan Kenaikan Pangkat",
                category: "Karier & Pangkat ASN",
                legal: [
                    "Undang-Undang Nomor 20 Tahun 2023 tentang Aparatur Sipil Negara",
                    "Peraturan Pemerintah Nomor 5 Tahun 2024 tentang Peraturan Gaji PNS",
                    "Peraturan Pemerintah Nomor 17 Tahun 2020 tentang Perubahan PP No. 11 Tahun 2017 tentang Manajemen PNS",
                    "Peraturan Badan Kepegawaian Negara Nomor 4 Tahun 2023 tentang Periodesasi Kenaikan Pangkat PNS"
                ],
                requirements: [
                    "SK Pangkat Terakhir",
                    "SKP / Penilaian Kinerja 2 (dua) tahun terakhir",
                    "Ijazah (bila kenaikan pangkat penyesuaian ijazah)",
                    "Surat Pengantar dari Atasan Langsung"
                ],
                procedure: [
                    "Staf mengajukan usul kenaikan pangkat kepada atasan langsung.",
                    "Pegawai pada Kabupaten/Kota (Kecuali Kota Ambon) mengajukan usul kenaikan pangkat melalui Kepala Sekolah di Satuan Pendidikan masing-masing.",
                    "Kepala Sekolah menyampaikan daftar/usulan kepada Kepala Cabang Dinas masing-masing Kabupaten/Kota.",
                    "Daftar/usulan ditandatangani oleh Kepala Cabang Dinas dan disampaikan kepada Kasubbag Kepegawaian dan Umum di Ambon.",
                    "Untuk Pegawai di Kota Ambon: Pegawai mengajukan usul kepada Kepala Sekolah, selanjutnya disampaikan ke Kasubbag Kepegawaian via TU Sekolah.",
                    "Staf Sub Bagian Kepegawaian dan Umum meneliti kelengkapan dan memverifikasi berkas sesuai syarat kenaikan pangkat.",
                    "Kasubbag Kepegawaian dan Umum menyusun konsep Nota Usul/Daftar Usul Penetapan Kenaikan Pangkat.",
                    "Sekretaris meneliti & membubuhkan paraf; Kepala Dinas menandatangani usul kenaikan pangkat.",
                    "Staf menyampaikan daftar usul dan berkas usul kepada BKD Provinsi Maluku melalui aplikasi layanan kepegawaian.",
                    "Staf mendokumentasikan dan mengarsipkan berkas kenaikan pangkat."
                ],
                sla: "Maksimal 10 (sepuluh) hari kerja",
                slaDays: 10,
                cost: "Gratis (Rp 0)",
                product: "Usul kenaikan pangkat yang ditandatangani Kepala Dinas dan diterima BKD Provinsi Maluku",
                complaintChannel: "Konsultasi Kantor / https://disdikbud.malukuprov.go.id/pengaduan / SP4N-LAPOR! / TikTok Resmi",
                facilities: ["Alat Tulis Kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi dan menggunakan komputer",
                internalSupervision: "Atasan langsung",
                executors: 11,
                guarantee: "Bersifat rahasia, melayani secara profesional, sarana penunjang menjamin keselamatan & kenyamanan",
                evaluation: "Survei Kepuasan Masyarakat/Pegawai (SKM) & Evaluasi Berkala"
            },
            {
                id: 3,
                code: "KEP-03",
                title: "Kenaikan Gaji Berkala (KGB)",
                category: "Hak & Kesejahteraan PNS",
                legal: [
                    "Undang-Undang Nomor 20 Tahun 2023 tentang Aparatur Sipil Negara",
                    "Peraturan Pemerintah Nomor 5 Tahun 2024 tentang Peraturan Gaji PNS",
                    "Peraturan Pemerintah Nomor 17 Tahun 2020 tentang Manajemen PNS",
                    "Keputusan Presiden Nomor 16 Tahun 1994 tentang Kenaikan Gaji Berkala"
                ],
                requirements: [
                    "Data kepegawaian",
                    "SK KGB Terakhir"
                ],
                procedure: [
                    "Staf/Pegawai mengajukan usul kenaikan gaji berkala kepada atasan langsung/Kepala Sekolah.",
                    "Kepala Sekolah menyampaikan usulan via Cabang Dinas (Kab/Kota) atau langsung via TU Sekolah (Kota Ambon).",
                    "Staf Sub Bagian Kepegawaian dan Umum memantau dan menyusun daftar pegawai yang memasuki masa KGB.",
                    "Staf menyusun konsep Surat Keputusan Kenaikan Gaji Berkala (SKKGB).",
                    "Kasubbag Kepegawaian meneliti konsep SKKGB; Sekretaris memaraf; Kepala Dinas menandatangani SKKGB.",
                    "Staf menyampaikan SKKGB kepada pegawai yang bersangkutan dan tembusan ke BKD Prov. Maluku sebagai dasar pembayaran gaji.",
                    "Staf mendokumentasikan dan mengarsipkan SKKGB."
                ],
                sla: "Paling lama 5 (lima) hari kerja sebelum TMT KGB",
                slaDays: 5,
                cost: "Gratis (Rp 0)",
                product: "Surat Pemberitahuan Kenaikan Gaji Berkala (SKKGB) yang ditandatangani Kepala Dinas",
                complaintChannel: "Konsultasi Kantor / https://disdikbud.malukuprov.go.id/pengaduan / SP4N-LAPOR! / TikTok Resmi",
                facilities: ["Komputer", "Printer", "Tabel Gaji"],
                competency: "Memiliki kemampuan berkomunikasi dan menggunakan komputer",
                internalSupervision: "Atasan langsung",
                executors: 11,
                guarantee: "Bersifat rahasia, melayani secara profesional, sarana penunjang menjamin keselamatan & kenyamanan",
                evaluation: "Survei Kepuasan Masyarakat/Pegawai (SKM) & Evaluasi Berkala"
            },
            {
                id: 4,
                code: "KEP-04",
                title: "Layanan Izin Praktik Kerja Industri (PKL Siswa/Mahasiswa)",
                category: "Kemitraan Pendidikan",
                legal: [
                    "Peraturan Menteri Pendidikan dan Kebudayaan Nomor 50 Tahun 2020 tentang Praktik Kerja Lapangan bagi Peserta Didik"
                ],
                requirements: [
                    "Surat pengantar dari sekolah/kampus",
                    "Proposal / rencana kegiatan PKL",
                    "Daftar nama peserta"
                ],
                procedure: [
                    "Pemohon mengajukan surat permohonan PKL/Prakerin dari sekolah/kampus.",
                    "Staf meneliti kelengkapan berkas dan kapasitas penerimaan peserta.",
                    "Kasubbag Kepegawaian dan Umum menyusun konsep surat persetujuan dan menentukan penempatan peserta pada Bidang terkait.",
                    "Sekretaris meneliti dan membubuhkan paraf; Kepala Dinas menandatangani surat persetujuan.",
                    "Staf menyampaikan surat persetujuan kepada pemohon dan menempatkan peserta bersama pembimbing lapangan.",
                    "Staf mendokumentasikan dan mengarsipkan berkas PKL/Prakerin."
                ],
                sla: "Maksimal 3 (tiga) hari kerja",
                slaDays: 3,
                cost: "Gratis (Rp 0)",
                product: "Surat persetujuan penerimaan peserta Praktik Kerja Lapangan/Industri (PKL/Prakerin)",
                complaintChannel: "Konsultasi Kantor / https://disdikbud.malukuprov.go.id/pengaduan / SP4N-LAPOR! / TikTok Resmi",
                facilities: ["Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi dan menggunakan komputer",
                internalSupervision: "Atasan langsung",
                executors: 1,
                guarantee: "Bersifat rahasia, melayani secara profesional, sarana penunjang menjamin keselamatan & kenyamanan",
                evaluation: "Survei Kepuasan Masyarakat/Pegawai (SKM) & Evaluasi Berkala"
            },
            {
                id: 5,
                code: "KEP-05",
                title: "Layanan Izin Cuti PNS",
                category: "Hak & Kesejahteraan PNS",
                legal: [
                    "Undang-Undang Nomor 20 Tahun 2023 tentang Aparatur Sipil Negara",
                    "Peraturan Pemerintah Nomor 17 Tahun 2020 tentang Manajemen PNS",
                    "Perubahan Atas Peraturan BKN Nomor 24 Tahun 2017 tentang Tata Cara Pemberian Cuti PNS"
                ],
                requirements: [
                    "Surat pengantar dari sekolah / unit kerja",
                    "Permohonan cuti (Tahunan/Sakit/Alasan Penting/Besar/Melahirkan)",
                    "Dokumen medis/pendukung (untuk Cuti Sakit)"
                ],
                procedure: [
                    "Pegawai mengajukan permohonan cuti kepada atasan langsung / Kepala Sekolah.",
                    "Kepala Sekolah memberikan pertimbangan dan rekomendasi persetujuan/penolakan.",
                    "Kepala Sekolah menyampaikan rekomendasi kepada Kepala Cabang Dinas (Kab/Kota) atau langsung ke Kasubbag Kepegawaian (Kota Ambon).",
                    "Staf Sub Bagian Kepegawaian dan Umum meneliti kelengkapan berkas dan sisa hak cuti pegawai.",
                    "Kasubbag Kepegawaian menyusun konsep Surat Izin Cuti; Kepala Dinas menandatangani/menyetujui.",
                    "Staf menyampaikan Surat Izin Cuti kepada pegawai, mencatat dalam Kartu Cuti, dan mengarsipkan berkas."
                ],
                sla: "Maksimal 3 (tiga) hari kerja (Cuti Sakit mendesak diproses lebih cepat)",
                slaDays: 3,
                cost: "Gratis (Rp 0)",
                product: "Surat Izin Cuti yang ditandatangani / disetujui Kepala Dinas",
                complaintChannel: "Konsultasi Kantor / https://disdikbud.malukuprov.go.id/pengaduan / SP4N-LAPOR! / TikTok Resmi",
                facilities: ["Alat Tulis Kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi dan menggunakan komputer",
                internalSupervision: "Atasan langsung",
                executors: 11,
                guarantee: "Bersifat rahasia, melayani secara profesional, sarana penunjang menjamin keselamatan & kenyamanan",
                evaluation: "Survei Kepuasan Masyarakat/Pegawai (SKM) & Evaluasi Berkala"
            },
            {
                id: 6,
                code: "KEP-06",
                title: "Layanan Izin Perceraian PNS",
                category: "Status Hukum & Kepegawaian",
                legal: [
                    "Undang-Undang Nomor 20 Tahun 2023 tentang Aparatur Sipil Negara",
                    "Peraturan Pemerintah Nomor 17 Tahun 2020 tentang Manajemen PNS",
                    "PP Nomor 45 Tahun 1990 jo PP Nomor 10 Tahun 1983 tentang Izin Perkawinan & Perceraian PNS"
                ],
                requirements: [
                    "Surat permohonan izin perceraian tertulis",
                    "Surat keterangan / alasan perceraian lengkap"
                ],
                procedure: [
                    "Pegawai mengajukan permohonan izin perceraian secara tertulis kepada atasan melalui Sub Bagian Kepegawaian dan Umum.",
                    "Staf meneliti kelengkapan berkas dan mencatatnya sebagai berkas rahasia.",
                    "Kasubbag Kepegawaian dan Umum melakukan telaah dan menyusun konsep surat keterangan/pertimbangan atasan.",
                    "Sekretaris meneliti & memaraf; Kepala Dinas menandatangani surat keterangan/izin atasan.",
                    "Staf menyampaikan surat keterangan kepada pegawai untuk diteruskan ke BKD Provinsi Maluku.",
                    "Staf mendokumentasikan dan mengarsipkan berkas secara rahasia."
                ],
                sla: "Maksimal 10 (sepuluh) hari kerja",
                slaDays: 10,
                cost: "Gratis (Rp 0)",
                product: "Surat keterangan / izin perceraian dari atasan yang ditandatangani Kepala Dinas",
                complaintChannel: "Konsultasi Kantor / https://disdikbud.malukuprov.go.id/pengaduan / SP4N-LAPOR! / TikTok Resmi",
                facilities: ["Alat Tulis Kantor", "Komputer", "Printer (Kerahasiaan Terjamin)"],
                competency: "Memiliki kemampuan berkomunikasi dan menggunakan komputer",
                internalSupervision: "Atasan langsung",
                executors: 1,
                guarantee: "Bersifat rahasia, melayani secara profesional, sarana penunjang menjamin keselamatan & kenyamanan",
                evaluation: "Survei Kepuasan Masyarakat/Pegawai (SKM) & Evaluasi Berkala"
            },
            {
                id: 7,
                code: "KEP-07",
                title: "Penerbitan Izin Belajar dan Tugas Belajar",
                category: "Pengembangan Kompetensi",
                legal: [
                    "Undang-Undang Nomor 20 Tahun 2023 tentang Aparatur Sipil Negara",
                    "Peraturan Pemerintah Nomor 17 Tahun 2020 tentang Manajemen PNS",
                    "SE MENPAN-RB Nomor 4 Tahun 2013 tentang Pemberian Tugas Belajar dan Izin Belajar bagi PNS"
                ],
                requirements: [
                    "Surat permohonan",
                    "Surat keterangan terdaftar / diterima dari Perguruan Tinggi",
                    "Fotokopi SK Pangkat Terakhir",
                    "SKP 2 (dua) tahun terakhir"
                ],
                procedure: [
                    "Pegawai mengajukan permohonan izin belajar / tugas belajar kepada Kepala Sekolah.",
                    "Kepala Sekolah memberikan rekomendasi persetujuan dan meneruskan via Cabang Dinas (Kab/Kota) atau langsung ke Subbag Kepegawaian (Kota Ambon).",
                    "Staf Sub Bagian Kepegawaian dan Umum meneliti kelengkapan dan kesesuaian bidang studi dengan tugas dan fungsi jabatan.",
                    "Kasubbag Kepegawaian menyusun konsep Surat Izin Belajar / Tugas Belajar.",
                    "Sekretaris meneliti & memaraf; Kepala Dinas menandatangani Surat Izin.",
                    "Staf menyampaikan surat izin kepada pegawai dan tembusan ke BKD Prov. Maluku.",
                    "Staf mendokumentasikan dan mengarsipkan berkas."
                ],
                sla: "Maksimal 7 (tujuh) hari kerja",
                slaDays: 7,
                cost: "Gratis (Rp 0)",
                product: "Surat Izin Belajar / Tugas Belajar yang ditandatangani Kepala Dinas",
                complaintChannel: "Konsultasi Kantor / https://disdikbud.malukuprov.go.id/pengaduan / SP4N-LAPOR! / TikTok Resmi",
                facilities: ["Alat Tulis Kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi dan menggunakan komputer",
                internalSupervision: "Atasan langsung",
                executors: 11,
                guarantee: "Bersifat rahasia, melayani secara profesional, sarana penunjang menjamin keselamatan & kenyamanan",
                evaluation: "Survei Kepuasan Masyarakat/Pegawai (SKM) & Evaluasi Berkala"
            },
            {
                id: 8,
                code: "KEP-08",
                title: "Usul Pensiun PNS",
                category: "Pensiun & BUP",
                legal: [
                    "Undang-Undang Nomor 20 Tahun 2023 tentang Aparatur Sipil Negara",
                    "Peraturan Pemerintah Nomor 17 Tahun 2020 tentang Manajemen PNS",
                    "PP Nomor 8 Tahun 2024 tentang Penetapan Pensiun Pokok PNS & Janda/Dudanya",
                    "Peraturan BKN Nomor 2 Tahun 2024 tentang Juknis Penetapan & Penyesuaian Pensiun Pokok"
                ],
                requirements: [
                    "Data kepegawaian lengkap (SK CPNS, SK PNS, SK Pangkat Terakhir, Karpeg, Dokumen Keluarga)"
                ],
                procedure: [
                    "Staf Sub Bagian Kepegawaian dan Umum memantau dan menyusun daftar pegawai yang memasuki Masa Persiapan Pensiun (MPP) / Batas Usia Pensiun.",
                    "Staf memberitahukan dan meminta pegawai bersangkutan melengkapi berkas usul pensiun.",
                    "Pegawai menyampaikan berkas usul melalui Kepala Sekolah dan Cabang Dinas (Kab/Kota) atau TU Sekolah (Kota Ambon).",
                    "Kasubbag Kepegawaian dan Umum meneliti kelengkapan dan menyusun konsep Usul Pensiun.",
                    "Sekretaris meneliti & memaraf; Kepala Dinas menandatangani Surat Usul Pensiun.",
                    "Staf menyampaikan berkas usul pensiun ke BKD Provinsi Maluku untuk diteruskan ke BKN.",
                    "Staf mendokumentasikan dan mengarsipkan berkas."
                ],
                sla: "Maksimal 10 (sepuluh) hari kerja",
                slaDays: 10,
                cost: "Gratis (Rp 0)",
                product: "Surat usul pensiun yang ditandatangani Kepala Dinas dan diteruskan ke BKD & BKN",
                complaintChannel: "Konsultasi Kantor / https://disdikbud.malukuprov.go.id/pengaduan / SP4N-LAPOR! / TikTok Resmi",
                facilities: ["Alat Tulis Kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi dan menggunakan komputer",
                internalSupervision: "Atasan langsung",
                executors: 11,
                guarantee: "Bersifat rahasia, melayani secara profesional, sarana penunjang menjamin keselamatan & kenyamanan",
                evaluation: "Survei Kepuasan Masyarakat/Pegawai (SKM) & Evaluasi Berkala"
            },
            {
                id: 9,
                code: "KEP-09",
                title: "Layanan Izin Penelitian",
                category: "Riset & Akademik",
                legal: [
                    "Undang-Undang Nomor 20 Tahun 2023 tentang Aparatur Sipil Negara",
                    "Peraturan Pemerintah Nomor 17 Tahun 2020 tentang Manajemen PNS",
                    "Surat Edaran MENPAN-RB Nomor 28 Tahun 2021 tentang Pengembangan Kompetensi PNS",
                    "Peraturan Pemerintah Nomor 48 Tahun 2009 tentang Perizinan Penelitian, Pengembangan & IPTEK"
                ],
                requirements: [
                    "Surat pengantar dari perguruan tinggi / sekolah",
                    "Proposal penelitian",
                    "Rekomendasi penelitian dari Bakesbangpol / BRIDA (apabila dipersyaratkan)"
                ],
                procedure: [
                    "Pemohon mengajukan surat permohonan izin penelitian.",
                    "Staf meneliti kelengkapan dan kesesuaian objek penelitian dengan lingkup Dinas.",
                    "Kasubbag Kepegawaian dan Umum menyusun konsep Surat Izin Penelitian.",
                    "Sekretaris meneliti & memaraf; Kepala Dinas menandatangani Surat Izin Penelitian.",
                    "Staf menyampaikan surat izin penelitian kepada pemohon.",
                    "Staf mendokumentasikan, mengarsipkan berkas, serta mencatat kewajiban penyerahan hasil penelitian."
                ],
                sla: "Maksimal 10 (sepuluh) hari kerja",
                slaDays: 10,
                cost: "Gratis (Rp 0)",
                product: "Surat Izin Penelitian yang ditandatangani Kepala Dinas",
                complaintChannel: "Konsultasi Kantor / https://disdikbud.malukuprov.go.id/pengaduan / SP4N-LAPOR! / TikTok Resmi",
                facilities: ["Alat Tulis Kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi dan menggunakan komputer",
                internalSupervision: "Atasan langsung",
                executors: 11,
                guarantee: "Bersifat rahasia, melayani secara profesional, sarana penunjang menjamin keselamatan & kenyamanan",
                evaluation: "Survei Kepuasan Masyarakat/Pegawai (SKM) & Evaluasi Berkala"
            },
            {
                id: 10,
                code: "KEP-10",
                title: "Usul Penyesuaian Gelar Akademik",
                category: "Pengembangan Kualifikasi",
                legal: [
                    "Undang-Undang Nomor 20 Tahun 2023 tentang Aparatur Sipil Negara",
                    "Peraturan Pemerintah Nomor 17 Tahun 2020 tentang Manajemen PNS",
                    "Peraturan Pemerintah Nomor 49 Tahun 2018 tentang Manajemen PPPK",
                    "Surat Edaran Kepala BKN Nomor 3 Tahun 2025 tentang Layanan Pencantuman Gelar Bagi ASN"
                ],
                requirements: [
                    "Fotokopi ijazah dan transkrip nilai yang telah dilegalisasi",
                    "Surat Izin Belajar / Tugas Belajar",
                    "SK Pangkat Terakhir",
                    "Uraian tugas yang relevan dengan ijazah baru"
                ],
                procedure: [
                    "Pegawai mengajukan usul penyesuaian gelar/ijazah.",
                    "Pegawai menyampaikan berkas usulan kepada Kepala Sekolah / Cabang Dinas.",
                    "Kepala Sekolah/Cabang Dinas menyampaikan rekomendasi kepada Kasubbag Kepegawaian dan Umum.",
                    "Staf meneliti kelengkapan dan relevansi ijazah dengan tugas jabatan.",
                    "Kasubbag Kepegawaian dan Umum menyusun konsep Usul Penyesuaian Ijazah.",
                    "Sekretaris meneliti & memaraf; Kepala Dinas menandatangani usul.",
                    "Staf menyampaikan berkas usul kepada BKD/BKPSDM Provinsi Maluku untuk diproses lebih lanjut.",
                    "Staf mendokumentasikan dan mengarsipkan berkas."
                ],
                sla: "Maksimal 10 (sepuluh) hari kerja",
                slaDays: 10,
                cost: "Gratis (Rp 0)",
                product: "Surat usul penyesuaian ijazah/gelar akademik yang ditandatangani Kepala Dinas dan diteruskan ke BKD Prov. Maluku",
                complaintChannel: "Konsultasi Kantor / https://disdikbud.malukuprov.go.id/pengaduan / SP4N-LAPOR! / TikTok Resmi",
                facilities: ["Alat Tulis Kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi dan menggunakan komputer",
                internalSupervision: "Atasan langsung",
                executors: 11,
                guarantee: "Bersifat rahasia, melayani secara profesional, sarana penunjang menjamin keselamatan & kenyamanan",
                evaluation: "Survei Kepuasan Masyarakat/Pegawai (SKM) & Evaluasi Berkala"
            }
        ];

        const DB_SOP_LIST = @json($sopList ?? []);

        function App() {
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
                    formData.append('bidang', 'kepegawaian');
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
                return KEPEGAWAIAN_SERVICES.filter(service => {
                    const matchesCategory = activeCategory === "ALL" || service.category === activeCategory;
                    const matchesQuery = searchQuery === "" ||
                        service.title.toLowerCase().includes(searchQuery.toLowerCase()) ||
                        service.code.toLowerCase().includes(searchQuery.toLowerCase()) ||
                        service.requirements.some(r => r.toLowerCase().includes(searchQuery.toLowerCase()));
                    return matchesCategory && matchesQuery;
                });
            }, [activeCategory, searchQuery]);

            // Unique Categories
            const categories = useMemo(() => {
                const set = new Set(KEPEGAWAIAN_SERVICES.map(s => s.category));
                return ["ALL", ...Array.from(set)];
            }, []);

            useEffect(() => {
                // Destroy previous instances
                if (lineInstance.current) lineInstance.current.destroy();
                if (barInstance.current) barInstance.current.destroy();

                // 1. Line Chart: Tren Rating Produk Layanan (Indeks Kepuasan Masyarakat / SKM)
                if (chartLineRef.current) {
                    const ctxLine = chartLineRef.current.getContext('2d');
                    lineInstance.current = new Chart(ctxLine, {
                        type: 'line',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
                            datasets: [{
                                label: 'Indeks Kepuasan Layanan (Skala 4.00)',
                                data: [3.72, 3.78, 3.82, 3.85, 3.88, 3.91, 3.93, 3.94, 3.96, 3.97, 3.98, 3.99],
                                borderColor: '#eab308',
                                backgroundColor: 'rgba(234, 179, 8, 0.12)',
                                fill: true,
                                tension: 0.35,
                                borderWidth: 3,
                                pointBackgroundColor: '#0f1e36',
                                pointBorderColor: '#eab308',
                                pointRadius: 5,
                                pointHoverRadius: 7
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
                                        label: (context) => ` SKM Score: ${context.parsed.y} / 4.00 (Sangat Baik)`
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

                // 2. Bar Chart: Top Produk Layanan Berdasarkan Volume Pengajuan & Tingkat Penyelesaian On-Time
                if (chartBarRef.current) {
                    const ctxBar = chartBarRef.current.getContext('2d');
                    barInstance.current = new Chart(ctxBar, {
                        type: 'bar',
                        data: {
                            labels: ['Naskah Dinas', 'KGB', 'Kenaikan Pangkat', 'Cuti PNS', 'Izin Belajar', 'Pensiun', 'Izin PKL', 'Penyesuaian Gelar'],
                            datasets: [{
                                label: 'Jumlah Berkas Terlayani (SLA 100%)',
                                data: [1420, 890, 650, 420, 310, 245, 180, 115],
                                backgroundColor: [
                                    '#0f1e36', '#1d2b45', '#0284c7', '#0369a1', '#075985', '#0c4a6e', '#ca8a04', '#eab308'
                                ],
                                borderRadius: 6
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
                                    ticks: { color: '#475569', font: { family: 'Plus Jakarta Sans', size: 10 } },
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
                <div className="min-h-screen flex flex-col bg-slate-50">
                    {/* Upper Header Bar - Government Identifier */}
                    <nav className="bg-navy-900 border-b border-navy-800 text-white sticky top-0 z-30 shadow-md">
                        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex flex-col sm:flex-row items-center justify-between gap-2">
                            <div className="flex items-center gap-3">
                                <a href="{{ url('/standar-pelayanan') }}" className="flex items-center gap-2 text-slate-300 hover:text-white transition-colors group">
                                    <svg className="w-4 h-4 text-gold-400 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                    </svg>
                                    <span className="text-xs font-bold text-gold-400 uppercase tracking-wider">Ke Direktori Standar Layanan</span>
                                </a>
                                <span className="text-slate-600 hidden sm:inline">|</span>
                                <a href="{{ url('/') }}" className="text-xs font-semibold text-slate-300 hover:text-white transition-colors hidden sm:inline">
                                    Beranda Utama
                                </a>
                                <span className="text-slate-600 hidden sm:inline">|</span>
                                <div className="h-3 w-3 rounded-full bg-gold-400 animate-pulse hidden sm:inline-block"></div>
                                <span className="text-xs sm:text-sm font-semibold text-slate-200 tracking-wider uppercase">
                                    Pemerintah Daerah Provinsi Maluku
                                </span>
                            </div>
                            <div className="flex items-center gap-3">
                                <div className="text-xs font-medium text-gold-400 bg-navy-800/80 px-3 py-1 rounded-full border border-gold-500/20">
                                    Unit Kerja: Sub Bagian Kepegawaian dan Umum
                                </div>
                            </div>
                        </div>
                    </nav>

                    {/* 1. HERO SECTION (HALAMAN PEMBUKA) - NO LOGO, TYPOGRAPHY DRIVEN */}
                    <header className="bg-gradient-to-br from-navy-950 via-navy-900 to-navy-800 text-white py-12 px-4 sm:px-6 lg:px-8 border-b-4 border-gold-500 shadow-xl relative overflow-hidden">
                        {/* Elegant background glow */}
                        <div className="absolute -top-24 -right-24 w-96 h-96 bg-gold-500/10 rounded-full blur-3xl pointer-events-none"></div>
                        <div className="absolute -bottom-24 -left-24 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>

                        <div className="max-w-7xl mx-auto text-center space-y-4 relative z-10">
                            <div className="inline-block">
                                <p className="text-xs sm:text-sm font-extrabold tracking-widest text-gold-400 uppercase bg-navy-800/90 px-4 py-1.5 rounded-full border border-gold-500/30">
                                    Dinas Pendidikan dan Kebudayaan Provinsi Maluku
                                </p>
                            </div>
                            
                            <h1 className="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-white max-w-4xl mx-auto leading-tight">
                                Produk Layanan Dinas Pendidikan & Kebudayaan <span className="gold-gradient-text block mt-1">Provinsi Maluku</span>
                            </h1>

                            <p className="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto font-normal leading-relaxed">
                                Sub Bagian Kepegawaian dan Umum - Dinas Pendidikan & Kebudayaan Provinsi Maluku
                            </p>

                            <div className="pt-2 flex flex-wrap items-center justify-center gap-4 text-xs font-semibold text-slate-300">
                                <span className="flex items-center gap-1.5 bg-navy-800/60 px-3 py-1 rounded-lg border border-slate-700">
                                    <span className="w-2 h-2 rounded-full bg-emerald-400"></span> 100% Bebas Biaya (Rp 0)
                                </span>
                                <span className="flex items-center gap-1.5 bg-navy-800/60 px-3 py-1 rounded-lg border border-slate-700">
                                    <span className="w-2 h-2 rounded-full bg-gold-400"></span> Kepastian Jangka Waktu (SLA)
                                </span>
                                <span className="flex items-center gap-1.5 bg-navy-800/60 px-3 py-1 rounded-lg border border-slate-700">
                                    <span className="w-2 h-2 rounded-full bg-sky-400"></span> Akuntabel & Transparan
                                </span>
                            </div>
                        </div>
                    </header>

                    {/* MAIN CONTENT AREA */}
                    <main className="flex-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full space-y-12">
                        {/* 2. KEGIATAN UTAMA MONEV (CARD SECTION - 3 CARDS GRID) */}
                        <section className="space-y-4">
                            <div className="flex flex-col sm:flex-row items-start sm:items-end justify-between gap-2 border-b border-slate-200 pb-3">
                                <div>
                                    <h2 className="text-xl font-bold text-navy-900 flex items-center gap-2">
                                        <span className="w-2 h-6 bg-gold-500 rounded-full"></span>
                                        Kegiatan Utama Monitoring & Evaluasi (Monev)
                                    </h2>
                                    <p className="text-xs text-slate-500 mt-0.5">
                                        Cakupan layanan kepegawaian dan tata kelola persuratan pada satuan pendidikan se-Provinsi Maluku
                                    </p>
                                </div>
                                <span className="text-[11px] font-bold text-navy-800 bg-gold-400/20 px-3 py-1 rounded-full border border-gold-500/30">
                                    Subbag Kepegawaian & Umum
                                </span>
                            </div>

                            <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                                {/* CARD 1: Satuan Pendidikan SMA */}
                                <div className="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group relative overflow-hidden">
                                    <div className="absolute top-0 right-0 w-24 h-24 bg-navy-900/5 rounded-bl-full pointer-events-none group-hover:bg-gold-500/10 transition-all"></div>
                                    <div className="space-y-3">
                                        <div className="w-12 h-12 rounded-xl bg-navy-900 text-gold-400 font-extrabold text-lg flex items-center justify-center shadow">
                                            SMA
                                        </div>
                                        <h3 className="text-base font-bold text-navy-900 group-hover:text-blue-700 transition-colors">
                                            Satuan Pendidikan SMA
                                        </h3>
                                        <p className="text-xs text-slate-600 leading-relaxed">
                                            Pengelolaan berkas Kenaikan Pangkat, Kenaikan Gaji Berkala (KGB), Cuti PNS, Izin Belajar, dan Pensiun bagi Guru serta Tenaga Kependidikan jenjang SMA Negeri/Swasta.
                                        </p>
                                        <div className="pt-2 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                                            <span>Verifikasi Berkas: <strong>Aktif</strong></span>
                                            <span>SLA Max: <strong>10 Hari</strong></span>
                                        </div>
                                    </div>
                                    <button 
                                        onClick={() => setSelectedCardMonev({
                                            title: "Satuan Pendidikan SMA",
                                            scope: "Layanan Kepegawaian & Administrasi Guru/PTK SMA",
                                            details: [
                                                "Pendataan & Verifikasi Usul Kenaikan Pangkat Guru/PTK SMA se-Provinsi Maluku.",
                                                "Pemrosesan KGB Otomatis & Penertiban SKKGB Tepat Waktu.",
                                                "Fasilitasi Izin Belajar & Penyesuaian Gelar Akademik Guru SMA.",
                                                "Pelayanan Administrasi Cuti & Pensiun BUP Guru SMA."
                                            ]
                                        })}
                                        className="mt-6 w-full py-2.5 bg-navy-900 hover:bg-navy-800 text-gold-400 font-bold text-xs rounded-xl shadow transition-all flex items-center justify-center gap-2 border border-gold-500/30"
                                    >
                                        <span>Detail Laporan</span>
                                        <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </button>
                                </div>

                                {/* CARD 2: Satuan Pendidikan SMK */}
                                <div className="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group relative overflow-hidden">
                                    <div className="absolute top-0 right-0 w-24 h-24 bg-navy-900/5 rounded-bl-full pointer-events-none group-hover:bg-gold-500/10 transition-all"></div>
                                    <div className="space-y-3">
                                        <div className="w-12 h-12 rounded-xl bg-navy-900 text-gold-400 font-extrabold text-lg flex items-center justify-center shadow">
                                            SMK
                                        </div>
                                        <h3 className="text-base font-bold text-navy-900 group-hover:text-blue-700 transition-colors">
                                            Satuan Pendidikan SMK
                                        </h3>
                                        <p className="text-xs text-slate-600 leading-relaxed">
                                            Fasilitasi perizinan Praktik Kerja Industri (PKL/Prakerin) Siswa/Mahasiswa, pengelolaan administrasi kepegawaian Guru Kejuruan (Produktif) serta Tenaga Kependidikan SMK.
                                        </p>
                                        <div className="pt-2 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                                            <span>PKL / Prakerin: <strong>3 Hari SLA</strong></span>
                                            <span>Administrasi: <strong>Terpadu</strong></span>
                                        </div>
                                    </div>
                                    <button 
                                        onClick={() => setSelectedCardMonev({
                                            title: "Satuan Pendidikan SMK",
                                            scope: "Layanan PKL Industri & Kepegawaian SMK",
                                            details: [
                                                "Penerbitan Surat Persetujuan PKL/Prakerin Siswa/Mahasiswa Maksimal 3 Hari Kerja.",
                                                "Penataan Administrasi & Mutasi Guru Produktif/Kejuruan SMK.",
                                                "Pengolahan KGB & Kenaikan Pangkat Pegawai SMK Negeri/Swasta.",
                                                "Pencatatan & Pengarsipan Berkas Jabatan Fungsional Guru SMK."
                                            ]
                                        })}
                                        className="mt-6 w-full py-2.5 bg-navy-900 hover:bg-navy-800 text-gold-400 font-bold text-xs rounded-xl shadow transition-all flex items-center justify-center gap-2 border border-gold-500/30"
                                    >
                                        <span>Detail Laporan</span>
                                        <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </button>
                                </div>

                                {/* CARD 3: Satuan Pendidikan Negeri Dan Swasta */}
                                <div className="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group relative overflow-hidden">
                                    <div className="absolute top-0 right-0 w-24 h-24 bg-navy-900/5 rounded-bl-full pointer-events-none group-hover:bg-gold-500/10 transition-all"></div>
                                    <div className="space-y-3">
                                        <div className="w-12 h-12 rounded-xl bg-navy-900 text-gold-400 font-extrabold text-xs text-center flex items-center justify-center shadow leading-tight p-1">
                                            NEGERI & SWASTA
                                        </div>
                                        <h3 className="text-base font-bold text-navy-900 group-hover:text-blue-700 transition-colors">
                                            Satuan Pendidikan Negeri Dan Swasta
                                        </h3>
                                        <p className="text-xs text-slate-600 leading-relaxed">
                                            Layanan persuratan naskah dinas, rekomendasi izin penelitian instansi/sekolah, serta koordinasi layanan kepegawaian terpadu melalui Cabang Dinas 11 Kab/Kota & Kota Ambon.
                                        </p>
                                        <div className="pt-2 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                                            <span>Jangkauan: <strong>11 Kab/Kota</strong></span>
                                            <span>Persuratan: <strong>1-2 Hari</strong></span>
                                        </div>
                                    </div>
                                    <button 
                                        onClick={() => setSelectedCardMonev({
                                            title: "Satuan Pendidikan Negeri Dan Swasta",
                                            scope: "Layanan Persuratan & Terpadu Cabang Dinas",
                                            details: [
                                                "Pengelolaan Surat Masuk & Disposisi Cepat Maksimal 1 Hari Kerja.",
                                                "Penerbitan Surat Izin Penelitian Sekolah/Kampus Maksimal 10 Hari Kerja.",
                                                "Koordinasi Terpadu Layanan Kepegawaian melalui Kantor Cabang Dinas.",
                                                "Layanan Konsultasi & Pengaduan Publik Bebas Biaya (Rp 0)."
                                            ]
                                        })}
                                        className="mt-6 w-full py-2.5 bg-navy-900 hover:bg-navy-800 text-gold-400 font-bold text-xs rounded-xl shadow transition-all flex items-center justify-center gap-2 border border-gold-500/30"
                                    >
                                        <span>Detail Laporan</span>
                                        <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </button>
                                </div>
                            </div>
                        </section>

                        {/* 3. INFOGRAFIS LAPORAN (GRAFIK DATA) */}
                        <section className="space-y-6">
                            <div className="border-b border-slate-200 pb-3">
                                <h2 className="text-xl font-bold text-navy-900 flex items-center gap-2">
                                    <span className="w-2 h-6 bg-navy-900 rounded-full"></span>
                                    Infografis Laporan (Grafik Data Performansi Layanan)
                                </h2>
                                <p className="text-xs text-slate-500 mt-0.5">
                                    Evaluasi data kualitatif dan kuantitatif pelaksanaan standar pelayanan publik Subbag Kepegawaian dan Umum
                                </p>
                            </div>

                            <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                {/* LINE CHART: Tren Rating Produk Layanan */}
                                <div className="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
                                    <div>
                                        <div className="flex items-center justify-between border-b border-slate-100 pb-3">
                                            <div>
                                                <h3 className="text-sm font-bold text-navy-900 uppercase tracking-wide">
                                                    Line Chart: Tren Rating Produk Layanan
                                                </h3>
                                                <p className="text-xs text-slate-500 mt-0.5">
                                                    Perkembangan Indeks Kepuasan Masyarakat (SKM) Bulanan
                                                </p>
                                            </div>
                                            <span className="px-2.5 py-1 bg-amber-50 text-amber-700 font-bold text-xs rounded-lg border border-amber-200">
                                                ★ 3.99 / 4.00
                                            </span>
                                        </div>
                                    </div>
                                    <div className="h-64 mt-4 relative">
                                        <canvas ref={chartLineRef}></canvas>
                                    </div>
                                </div>

                                {/* BAR CHART: Top Produk Layanan */}
                                <div className="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
                                    <div>
                                        <div className="flex items-center justify-between border-b border-slate-100 pb-3">
                                            <div>
                                                <h3 className="text-sm font-bold text-navy-900 uppercase tracking-wide">
                                                    Bar Chart: Top Produk Layanan
                                                </h3>
                                                <p className="text-xs text-slate-500 mt-0.5">
                                                    Volume Permohonan Berkas Terlayani (SLA 100% On-Time)
                                                </p>
                                            </div>
                                            <span className="px-2.5 py-1 bg-emerald-50 text-emerald-700 font-bold text-xs rounded-lg border border-emerald-200">
                                                Total &gt; 4,000 Berkas
                                            </span>
                                        </div>
                                    </div>
                                    <div className="h-64 mt-4 relative">
                                        <canvas ref={chartBarRef}></canvas>
                                    </div>
                                </div>
                            </div>

                            {/* CATATAN HASIL PELAPORAN */}
                            <div className="bg-gradient-to-r from-navy-950 via-navy-900 to-navy-800 text-white rounded-2xl p-6 shadow-md border-l-4 border-gold-500 relative overflow-hidden">
                                <div className="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                                    <div className="space-y-2">
                                        <div className="flex items-center gap-2">
                                            <span className="w-2.5 h-2.5 rounded-full bg-gold-400 animate-ping"></span>
                                            <h3 className="text-base font-extrabold text-gold-400 uppercase tracking-wider">
                                                Catatan Hasil Pelaporan
                                            </h3>
                                        </div>
                                        <div className="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-2 text-xs sm:text-sm">
                                            <div className="flex items-center gap-2 bg-navy-800/80 px-3 py-2 rounded-xl border border-navy-700">
                                                <span className="text-gold-400 font-bold text-base">📌</span>
                                                <span className="font-semibold text-slate-100">Informatif, terpercaya, berwibawa.</span>
                                            </div>
                                            <div className="flex items-center gap-2 bg-navy-800/80 px-3 py-2 rounded-xl border border-navy-700">
                                                <span className="text-gold-400 font-bold text-base">📌</span>
                                                <span className="font-semibold text-slate-100">Menunjukkan capaian secara data-driven.</span>
                                            </div>
                                            <div className="flex items-center gap-2 bg-navy-800/80 px-3 py-2 rounded-xl border border-navy-700">
                                                <span className="text-gold-400 font-bold text-base">📌</span>
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
                                <span className="inline-block px-3 py-1 bg-gold-400/20 text-gold-700 font-bold text-xs rounded-full border border-gold-500/30 uppercase tracking-widest">
                                    Laporan Digital – Wujud Integritas
                                </span>
                                <h3 className="text-xl font-extrabold text-navy-900">
                                    Akses Portal Integrasi Satu Data Pelayanan Publik
                                </h3>
                                <p className="text-xs text-slate-500">
                                    Lihat seluruh 10 produk standar pelayanan publik Sub Bagian Kepegawaian dan Umum lengkap dengan standar operasional prosedur (SOP) resmi.
                                </p>
                            </div>

                            <div className="pt-2">
                                <button 
                                    onClick={() => {
                                        const el = document.getElementById('directory-section');
                                        if (el) el.scrollIntoView({ behavior: 'smooth' });
                                    }}
                                    className="px-8 py-3.5 bg-gradient-to-r from-navy-900 to-navy-800 hover:from-navy-800 hover:to-navy-700 text-gold-400 font-extrabold text-sm sm:text-base rounded-2xl shadow-lg hover:shadow-gold-500/10 transition-all border-2 border-gold-500/40 inline-flex items-center justify-center gap-3 group"
                                >
                                    <span>Profil Satu Data Dinas Pendidikan dan Kebudayaan Provinsi Maluku</span>
                                    <svg className="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                </button>
                            </div>
                        </section>

                        {/* 5. DIREKTORI DETAIL 10 PRODUK LAYANAN KEPEGAWAIAN DAN UMUM */}
                        <section id="directory-section" className="space-y-6 pt-4">
                            <div className="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 border-b border-slate-200 pb-4">
                                <div>
                                    <h2 className="text-xl font-bold text-navy-900 flex items-center gap-2">
                                        <span className="w-2 h-6 bg-gold-500 rounded-full"></span>
                                        Direktori Produk Layanan Subbag Kepegawaian dan Umum (10 Layanan)
                                    </h2>
                                    <p className="text-xs text-slate-500 mt-0.5">
                                        Klik pada kartu layanan untuk menampilkan dokumen rincian SOP 14 komponen lengkap
                                    </p>
                                </div>

                                {/* Filter Category Tabs */}
                                <div className="flex items-center gap-1.5 overflow-x-auto custom-scrollbar max-w-full pb-1">
                                    {categories.map((cat) => (
                                        <button
                                            key={cat}
                                            onClick={() => setActiveCategory(cat)}
                                            className={`px-3 py-1.5 rounded-xl text-xs font-bold whitespace-nowrap transition-all ${
                                                activeCategory === cat
                                                    ? "bg-navy-900 text-gold-400 shadow-sm border border-gold-500/40"
                                                    : "bg-white text-slate-600 hover:bg-slate-100 border border-slate-200"
                                            }`}
                                        >
                                            {cat === "ALL" ? "Semua (10)" : cat}
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
                                    placeholder="Cari jenis layanan, kode, atau persyaratan..."
                                    className="w-full pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-navy-900/20 focus:border-navy-900 transition-all shadow-sm"
                                />
                                <svg className="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            </div>

                            {/* Services Grid */}
                            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                                {filteredServices.map((service) => (
                                    <div 
                                        key={service.id}
                                        className="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group relative overflow-hidden"
                                    >
                                        <div className="space-y-3">
                                            <div className="flex items-center justify-between">
                                                <span className="px-2.5 py-0.5 rounded-md text-[10px] font-extrabold bg-navy-900 text-gold-400 border border-navy-700 uppercase tracking-wide">
                                                    {service.code}
                                                </span>
                                                <span className="text-[11px] font-bold text-emerald-600 bg-emerald-50 px-2.5 py-0.5 rounded-md border border-emerald-200">
                                                    {service.cost}
                                                </span>
                                            </div>

                                            <h3 className="text-sm font-bold text-navy-900 group-hover:text-blue-700 transition-colors line-clamp-2">
                                                {service.title}
                                            </h3>

                                            <span className="inline-block text-[11px] font-medium text-slate-500 bg-slate-100 px-2 py-0.5 rounded">
                                                {service.category}
                                            </span>

                                            <div className="pt-2 border-t border-slate-100 space-y-1.5 text-xs">
                                                <div className="flex items-center justify-between text-slate-600">
                                                    <span>Jangka Waktu (SLA):</span>
                                                    <span className="font-semibold text-slate-800">{service.sla}</span>
                                                </div>
                                                <div className="flex items-center justify-between text-slate-600">
                                                    <span>Jumlah Pelaksana:</span>
                                                    <span className="font-semibold text-slate-800">{service.executors} Orang</span>
                                                </div>
                                            </div>
                                        </div>

                                        <button 
                                            onClick={() => setSelectedServiceModal(service)}
                                            className="mt-5 w-full py-2 bg-slate-50 hover:bg-navy-900 hover:text-gold-400 text-navy-900 font-bold text-xs rounded-xl border border-slate-200 transition-all flex items-center justify-center gap-1.5"
                                        >
                                            <span>Lihat SOP 14 Komponen</span>
                                            <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 5l7 7-7 7"/></svg>
                                        </button>
                                    </div>
                                ))}
                            </div>

                            {filteredServices.length === 0 && (
                                <div className="bg-white p-12 rounded-2xl text-center border border-slate-200 text-slate-500 space-y-2">
                                    <p className="font-bold text-base">Tidak ada layanan kepegawaian yang sesuai kata kunci</p>
                                    <p className="text-xs">Silakan coba pencarian lain atau pilih kategori "Semua".</p>
                                </div>
                            )}
                        </section>
                    </main>

                    {/* FOOTER */}
                    <footer className="bg-navy-950 text-slate-400 py-8 border-t-2 border-gold-500/40 mt-auto text-xs">
                        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3 text-center sm:text-left flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div>
                                <p className="font-bold text-white text-sm">
                                    Sub Bagian Kepegawaian dan Umum
                                </p>
                                <p className="text-slate-400 text-xs mt-0.5">
                                    Dinas Pendidikan dan Kebudayaan Provinsi Maluku © 2026
                                </p>
                            </div>

                            <div className="text-center sm:text-right text-[11px] text-slate-400 space-y-0.5">
                                <p>Jl. Jend. Ahmad Yani, Kel. Batu Gajah, Kec. Sirimau, Ambon - Maluku</p>
                                <p>Laman Resmi: <a href="https://disdikbud.malukuprov.go.id/" target="_blank" rel="noreferrer" className="text-gold-400 hover:underline">https://disdikbud.malukuprov.go.id/</a></p>
                            </div>
                        </div>
                    </footer>

                    {/* MODAL SOP 14 KOMPONEN DETAIL */}
                    {selectedServiceModal && (
                        <div className="fixed inset-0 z-50 bg-navy-950/70 backdrop-blur-sm flex items-center justify-center p-4 overflow-y-auto">
                            <div className="bg-white rounded-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto custom-scrollbar shadow-2xl border border-gold-500/30">
                                {/* Modal Header */}
                                <div className="sticky top-0 bg-navy-900 text-white px-6 py-4 border-b border-navy-800 flex items-center justify-between z-10">
                                    <div>
                                        <div className="flex items-center gap-2">
                                            <span className="px-2 py-0.5 rounded text-[10px] font-extrabold bg-gold-400 text-navy-950">
                                                {selectedServiceModal.code}
                                            </span>
                                            <span className="text-xs text-gold-300 font-medium">{selectedServiceModal.category}</span>
                                        </div>
                                        <h3 className="text-base font-bold text-white mt-1">
                                            {selectedServiceModal.title}
                                        </h3>
                                    </div>
                                    <button 
                                        onClick={() => setSelectedServiceModal(null)}
                                        className="p-1.5 rounded-lg text-slate-300 hover:text-white hover:bg-navy-800 transition-all"
                                    >
                                        <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                    </button>
                                </div>

                                {/* Modal Body - 14 Official Components */}
                                <div className="p-6 space-y-6 text-xs sm:text-sm">
                                    {/* Component 1 & Unit Kerja */}
                                    <div className="grid grid-cols-2 gap-3 p-3.5 bg-slate-50 rounded-xl border border-slate-200">
                                        <div>
                                            <p className="text-[10px] text-slate-400 font-bold uppercase">Unit Kerja Penanggung Jawab</p>
                                            <p className="font-bold text-navy-900">Sub Bagian Kepegawaian dan Umum</p>
                                        </div>
                                        <div>
                                            <p className="text-[10px] text-slate-400 font-bold uppercase">Biaya / Tarif</p>
                                            <p className="font-bold text-emerald-600">{selectedServiceModal.cost}</p>
                                        </div>
                                    </div>

                                    {/* Component 2: Dasar Hukum */}
                                    <div>
                                        <h4 className="font-extrabold text-navy-900 uppercase text-xs tracking-wider mb-2 flex items-center gap-2">
                                            <span className="w-1.5 h-3 bg-gold-500 rounded"></span> 2. Dasar Hukum:
                                        </h4>
                                        <ul className="list-disc list-inside space-y-1 text-slate-700 text-xs bg-slate-50 p-3 rounded-xl border">
                                            {selectedServiceModal.legal.map((item, i) => (
                                                <li key={i} className="leading-relaxed">{item}</li>
                                            ))}
                                        </ul>
                                    </div>

                                    {/* Component 3: Persyaratan Pelayanan */}
                                    <div>
                                        <h4 className="font-extrabold text-navy-900 uppercase text-xs tracking-wider mb-2 flex items-center gap-2">
                                            <span className="w-1.5 h-3 bg-gold-500 rounded"></span> 3. Persyaratan Pelayanan:
                                        </h4>
                                        <ul className="list-disc list-inside space-y-1 text-slate-700 text-xs bg-amber-50/50 p-3 rounded-xl border border-amber-200/60">
                                            {selectedServiceModal.requirements.map((item, i) => (
                                                <li key={i} className="font-medium">{item}</li>
                                            ))}
                                        </ul>
                                    </div>

                                    {/* Component 4: Sistem, Mekanisme dan Prosedur */}
                                    <div>
                                        <h4 className="font-extrabold text-navy-900 uppercase text-xs tracking-wider mb-2 flex items-center gap-2">
                                            <span className="w-1.5 h-3 bg-gold-500 rounded"></span> 4. Sistem, Mekanisme, dan Prosedur:
                                        </h4>
                                        <ol className="list-decimal list-inside space-y-2 text-slate-700 text-xs bg-slate-50 p-3.5 rounded-xl border">
                                            {selectedServiceModal.procedure.map((step, i) => (
                                                <li key={i} className="leading-relaxed"><span className="font-semibold text-slate-900">{step}</span></li>
                                            ))}
                                        </ol>
                                    </div>

                                    {/* Components 5, 6, 7 */}
                                    <div className="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                        <div className="p-3 bg-slate-50 rounded-xl border">
                                            <p className="text-[10px] text-slate-400 font-bold uppercase">5. Jangka Waktu</p>
                                            <p className="font-bold text-navy-900 text-xs mt-0.5">{selectedServiceModal.sla}</p>
                                        </div>
                                        <div className="p-3 bg-slate-50 rounded-xl border">
                                            <p className="text-[10px] text-slate-400 font-bold uppercase">6. Biaya / Tarif</p>
                                            <p className="font-bold text-emerald-600 text-xs mt-0.5">{selectedServiceModal.cost}</p>
                                        </div>
                                        <div className="p-3 bg-slate-50 rounded-xl border">
                                            <p className="text-[10px] text-slate-400 font-bold uppercase">7. Produk Pelayanan</p>
                                            <p className="font-bold text-navy-900 text-xs mt-0.5 line-clamp-2">{selectedServiceModal.product}</p>
                                        </div>
                                    </div>

                                    {/* Component 8: Penanganan Pengaduan */}
                                    <div>
                                        <h4 className="font-extrabold text-navy-900 uppercase text-xs tracking-wider mb-1">8. Penanganan Pengaduan, Saran, dan Masukan:</h4>
                                        <p className="text-xs text-slate-600 bg-slate-50 p-2.5 rounded-lg border">{selectedServiceModal.complaintChannel}</p>
                                    </div>

                                    {/* Components 9, 10, 11, 12 */}
                                    <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                                        <div className="p-3 bg-slate-50 rounded-xl border space-y-1">
                                            <p className="font-bold text-navy-900 uppercase text-[10px]">9. Sarana / Prasarana Facilities</p>
                                            <p className="text-slate-600">{selectedServiceModal.facilities.join(", ")}</p>
                                        </div>
                                        <div className="p-3 bg-slate-50 rounded-xl border space-y-1">
                                            <p className="font-bold text-navy-900 uppercase text-[10px]">10. Kompetensi Pelaksana</p>
                                            <p className="text-slate-600">{selectedServiceModal.competency}</p>
                                        </div>
                                        <div className="p-3 bg-slate-50 rounded-xl border space-y-1">
                                            <p className="font-bold text-navy-900 uppercase text-[10px]">11. Pengawasan Internal</p>
                                            <p className="text-slate-600">{selectedServiceModal.internalSupervision}</p>
                                        </div>
                                        <div className="p-3 bg-slate-50 rounded-xl border space-y-1">
                                            <p className="font-bold text-navy-900 uppercase text-[10px]">12. Jumlah Pelaksana</p>
                                            <p className="text-slate-600 font-bold">{selectedServiceModal.executors} Orang</p>
                                        </div>
                                    </div>

                                    {/* Components 13 & 14 */}
                                    <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                                        <div className="p-3 bg-slate-50 rounded-xl border space-y-1">
                                            <p className="font-bold text-navy-900 uppercase text-[10px]">13. Jaminan Pelayanan</p>
                                            <p className="text-slate-600">{selectedServiceModal.guarantee}</p>
                                        </div>
                                        <div className="p-3 bg-slate-50 rounded-xl border space-y-1">
                                            <p className="font-bold text-navy-900 uppercase text-[10px]">14. Evaluasi Kinerja Pelaksana</p>
                                            <p className="text-slate-600">{selectedServiceModal.evaluation}</p>
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
                                                            Asal Sekolah / Instansi
                                                        </label>
                                                        <input 
                                                            type="text" 
                                                            value={uploadForm.instance}
                                                            onChange={(e) => setUploadForm({...uploadForm, instance: e.target.value})}
                                                            placeholder="Contoh: SMAN 1 Ambon / Dinas" 
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
                                <div className="bg-slate-50 px-6 py-3 border-t border-slate-200 flex justify-end">
                                    <button 
                                        onClick={() => setSelectedServiceModal(null)}
                                        className="px-5 py-2 bg-navy-900 hover:bg-navy-800 text-gold-400 font-bold text-xs rounded-xl shadow transition-all"
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
                            <div className="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-gold-500/40 space-y-4">
                                <div className="flex items-center justify-between border-b border-slate-100 pb-3">
                                    <h3 className="text-base font-extrabold text-navy-900">
                                        Detail Laporan: {selectedCardMonev.title}
                                    </h3>
                                    <button 
                                        onClick={() => setSelectedCardMonev(null)}
                                        className="text-slate-400 hover:text-slate-700"
                                    >
                                        ✕
                                    </button>
                                </div>
                                <p className="text-xs font-semibold text-blue-700 bg-blue-50 p-2 rounded-lg">
                                    Cakupan: {selectedCardMonev.scope}
                                </p>
                                <div className="space-y-2">
                                    <h4 className="text-xs font-bold text-navy-900 uppercase">Ringkasan Kegiatan Monev:</h4>
                                    <ul className="list-disc list-inside space-y-1.5 text-xs text-slate-700">
                                        {selectedCardMonev.details.map((d, i) => (
                                            <li key={i}>{d}</li>
                                        ))}
                                    </ul>
                                </div>
                                <div className="pt-3 border-t border-slate-100 flex justify-end">
                                    <button 
                                        onClick={() => setSelectedCardMonev(null)}
                                        className="px-4 py-2 bg-navy-900 text-gold-400 font-bold text-xs rounded-xl"
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

        // Render React Application
        ReactDOM.createRoot(document.getElementById('root')).render(<App />);
    </script>
</body>
</html>