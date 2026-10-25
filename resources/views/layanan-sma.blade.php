<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Layanan Bidang Pembinaan SMA - Dinas Pendidikan dan Kebudayaan Provinsi Maluku</title>
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

        // Data Produk Layanan Unit Kerja: Bidang Pembinaan SMA
        const SMA_SERVICES = [
            {
                id: 1,
                code: "SMA-01",
                title: "Rekomendasi Mutasi (Perpindahan) Siswa SMA",
                category: "Kesiswaan & Mutasi",
                legal: [
                    "Undang-Undang Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional",
                    "Peraturan Pemerintah Nomor 17 Tahun 2010 tentang Pengelolaan dan Penyelenggaraan Pendidikan"
                ],
                requirements: [
                    "Surat permohonan pindah",
                    "Rapor / nilai terakhir",
                    "Surat pindah / keterangan pindah tugas orang tua (jika ada)",
                    "Surat keterangan diterima dari sekolah tujuan"
                ],
                procedure: [
                    "Orang tua/wali/siswa mengajukan permohonan rekomendasi mutasi dengan melampirkan berkas persyaratan.",
                    "Staf meneliti kelengkapan berkas dan memeriksa data siswa serta daya tampung sekolah tujuan pada Dapodik.",
                    "Koordinator wilayah terkait menelaah kesesuaian program peminatan dan daya tampung sekolah tujuan.",
                    "Kepala Bidang Pembinaan SMA menyetujui dan memaraf konsep surat rekomendasi mutasi.",
                    "Kepala Dinas menandatangani surat rekomendasi mutasi siswa.",
                    "Staf menyampaikan surat rekomendasi kepada pemohon, sekolah asal, dan sekolah tujuan.",
                    "Operator Dapodik sekolah asal/tujuan memutakhirkan status mutasi siswa pada Dapodik."
                ],
                sla: "Paling lama 5 (lima) hari kerja sejak berkas dinyatakan lengkap",
                slaDays: 5,
                cost: "Gratis (Rp 0)",
                product: "Surat rekomendasi mutasi (perpindahan) siswa SMA yang ditandatangani Kepala Dinas",
                complaintChannel: "Konsultasi Kantor Dinas / https://disdikbud.malukuprov.go.id/pengaduan / SP4N-LAPOR! / TikTok Resmi Disdikbud Prov. Maluku",
                facilities: ["Alat Tulis Kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi dan menggunakan komputer",
                internalSupervision: "Atasan langsung",
                executors: 3,
                guarantee: "1. Bersifat rahasia (data informasi pengguna layanan dijamin keamanannya dan digunakan semata-mata hanya untuk kepentingan pelayanan); 2. Melayani secara profesional sesuai dengan standar pelayanan yang berlaku; 3. Sarana pelayanan dan sarana penunjang layanan menjamin/mendukung keamanan, kenyamanan, dan keselamatan pengguna layanan.",
                evaluation: "1. Dilakukan survei kepuasan masyarakat/pegawai (SKM); 2. Dilakukan evaluasi pelayanan baik secara berkala maupun apabila diperlukan sewaktu-waktu."
            },
            {
                id: 2,
                code: "SMA-02",
                title: "Surat Keterangan Pengganti Ijazah STTB / NEM / SKHUN / SKYBS yang Hilang",
                category: "Dokumen & Legalitas",
                legal: [
                    "Undang-Undang Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional",
                    "Peraturan Pemerintah Nomor 57 Tahun 2021 tentang Standar Nasional Pendidikan jo PP No. 4 Tahun 2022",
                    "Peraturan Menteri Pendidikan dan Kebudayaan Nomor 29 Tahun 2014 tentang Pengesahan Fotokopi Ijazah/STTB, Surat Keterangan Pengganti Ijazah/STTB Jenjang Pendidikan Dasar dan Menengah"
                ],
                requirements: [
                    "Surat permohonan",
                    "Surat keterangan kehilangan dari kepolisian atau dokumen rusak yang bersangkutan",
                    "Fotokopi identitas",
                    "Pas foto"
                ],
                procedure: [
                    "Pemohon mengajukan permohonan surat keterangan pengganti dengan melampirkan berkas persyaratan.",
                    "Staf meneliti kelengkapan berkas dan menelusuri data kelulusan pada arsip/buku induk sekolah asal atau arsip Dinas.",
                    "Staf memverifikasi kesesuaian data dan menyusun konsep surat keterangan pengganti.",
                    "Kepala Bidang Pembinaan SMA memaraf konsep surat keterangan pengganti.",
                    "Kepala Dinas menandatangani surat keterangan pengganti.",
                    "Staf mencatat pada register dan menyerahkan surat keterangan pengganti kepada pemohon."
                ],
                sla: "Paling lama 7 (tujuh) hari kerja sejak berkas dinyatakan lengkap",
                slaDays: 7,
                cost: "Gratis (Rp 0)",
                product: "Surat keterangan pengganti Ijazah/STTB/NEM/SKHUN/SKYBS yang ditandatangani Kepala Dinas dan diserahkan kepada pemohon",
                complaintChannel: "Konsultasi Kantor Dinas / https://disdikbud.malukuprov.go.id/pengaduan / SP4N-LAPOR! / TikTok Resmi Disdikbud Prov. Maluku",
                facilities: ["Alat Tulis Kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi dan menggunakan komputer",
                internalSupervision: "Atasan langsung",
                executors: 2,
                guarantee: "1. Bersifat rahasia (data informasi pengguna layanan dijamin keamanannya); 2. Melayani secara profesional sesuai standar; 3. Sarana penunjang menjamin keselamatan & kenyamanan.",
                evaluation: "1. Dilakukan survei kepuasan masyarakat/pegawai (SKM); 2. Dilakukan evaluasi pelayanan secara berkala."
            },
            {
                id: 3,
                code: "SMA-03",
                title: "Nomor Pokok Sekolah Nasional (NPSN)",
                category: "Kelembagaan & Perizinan",
                legal: [
                    "Undang-Undang Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional",
                    "Peraturan Pemerintah Nomor 57 Tahun 2021 jo PP No. 4 Tahun 2022 tentang Standar Nasional Pendidikan",
                    "Peraturan Menteri Pendidikan dan Kebudayaan Nomor 79 Tahun 2015 tentang Data Pokok Pendidikan",
                    "Permendikbudristek Nomor 31 Tahun 2022 tentang Satu Data Pendidikan, Kebudayaan, Riset, dan Teknologi"
                ],
                requirements: [
                    "Izin pendirian / izin operasional satuan pendidikan",
                    "Profil sekolah",
                    "Data siswa, guru, dan sarana prasarana"
                ],
                procedure: [
                    "Sekolah mengajukan permohonan NPSN melalui Operator Dapodik dengan melampirkan berkas legalitas.",
                    "Operator Dapodik menginput profil sekolah pada aplikasi Dapodik.",
                    "Staf Bidang Pembinaan SMA memverifikasi kesesuaian dan kelengkapan data pada laman Verval SP.",
                    "Kepala Bidang Pembinaan SMA menyetujui usulan penerbitan NPSN pada aplikasi Verval SP.",
                    "Staf memantau proses penerbitan NPSN oleh Kementerian melalui Verval SP.",
                    "Staf menginformasikan NPSN yang telah terbit kepada sekolah pemohon."
                ],
                sla: "Paling lama 5 (lima) hari kerja sejak berkas dinyatakan lengkap (untuk verifikasi tingkat Dinas)",
                slaDays: 5,
                cost: "Gratis (Rp 0)",
                product: "Nomor Pokok Sekolah Nasional (NPSN) yang telah terbit dan diinformasikan kepada sekolah pemohon",
                complaintChannel: "Konsultasi Kantor Dinas / https://disdikbud.malukuprov.go.id/pengaduan / SP4N-LAPOR! / TikTok Resmi Disdikbud Prov. Maluku",
                facilities: ["Alat Tulis Kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi dan menggunakan komputer",
                internalSupervision: "Atasan langsung",
                executors: 2,
                guarantee: "1. Bersifat rahasia; 2. Melayani secara profesional; 3. Sarana pelayanan menjamin kenyamanan & keselamatan.",
                evaluation: "1. Dilakukan survei kepuasan masyarakat/pegawai (SKM); 2. Evaluasi berkala."
            },
            {
                id: 4,
                code: "SMA-04",
                title: "Rekomendasi dan Izin Pendirian Satuan Pendidikan SMA",
                category: "Kelembagaan & Perizinan",
                legal: [
                    "Undang-Undang Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional",
                    "PP No. 57 Tahun 2021 jo PP No. 4 Tahun 2022 tentang Standar Nasional Pendidikan",
                    "Permendikbud Nomor 36 Tahun 2014 tentang Pedoman Pendirian, Perubahan, dan Penutupan Satuan Pendidikan Dasar & Menengah",
                    "Permendikbudristek Nomor 47 Tahun 2023 tentang Pedoman Penyelenggaraan Perizinan Berusaha, Akreditasi, dan Sertifikasi Pendidikan"
                ],
                requirements: [
                    "Proposal pendirian",
                    "Studi kelayakan",
                    "Bukti kepemilikan / penguasaan lahan dan bangunan",
                    "Rencana induk pengembangan sekolah",
                    "Susunan pengurus / badan penyelenggara"
                ],
                procedure: [
                    "Pemrakarsa mengajukan permohonan izin pendirian satuan pendidikan dengan melampirkan proposal dan studi kelayakan.",
                    "Staf meneliti kelengkapan administrasi dan menjadwalkan verifikasi lapangan.",
                    "Tim verifikasi lapangan meninjau kesesuaian lokasi, sarana prasarana, dan aspek kebutuhan/kelayakan pendirian.",
                    "Staf terkait menelaah hasil verifikasi dan menyusun rekomendasi kelayakan pendirian.",
                    "Kepala Bidang Pembinaan SMA menyetujui dan menyusun konsep surat izin pendirian.",
                    "Kepala Dinas menandatangani surat izin pendirian satuan pendidikan.",
                    "Staf menyampaikan surat izin pendirian kepada pemrakarsa dan mengarsipkan berkas."
                ],
                sla: "Paling lama 15 (lima belas) hari kerja sejak berkas dinyatakan lengkap",
                slaDays: 15,
                cost: "Gratis (Rp 0)",
                product: "Surat izin pendirian satuan pendidikan (SMA) yang ditandatangani Kepala Dinas dan diserahkan kepada pemrakarsa",
                complaintChannel: "Konsultasi Kantor Dinas / https://disdikbud.malukuprov.go.id/pengaduan / SP4N-LAPOR! / TikTok Resmi Disdikbud Prov. Maluku",
                facilities: ["Alat Tulis Kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi dan menggunakan komputer",
                internalSupervision: "Atasan langsung",
                executors: 2,
                guarantee: "1. Data dijamin keamanannya; 2. Pelayanan profesional sesuai standar; 3. Sarana menjamin keselamatan.",
                evaluation: "Survei Kepuasan Masyarakat/Pegawai (SKM) & Evaluasi Berkala"
            },
            {
                id: 5,
                code: "SMA-05",
                title: "Verifikasi Dan Supervisi Kurikulum Satuan Pendidikan (KSP)",
                category: "Kurikulum & Data",
                legal: [
                    "Undang-Undang Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional",
                    "PP No. 57 Tahun 2021 jo PP No. 4 Tahun 2022 tentang Standar Nasional Pendidikan",
                    "Permendikbudristek Nomor 12 Tahun 2024 tentang Kurikulum pada PAUD, Jenjang Pendidikan Dasar, dan Jenjang Pendidikan Menengah",
                    "Permendiknas Nomor 19 Tahun 2007 & Permendikbud Nomor 22 Tahun 2016"
                ],
                requirements: [
                    "Dokumen KSP (identitas, dasar pemikiran, visi-misi-tujuan, pengorganisasian pembelajaran, rencana pembelajaran)",
                    "Berita acara penetapan"
                ],
                procedure: [
                    "Sekolah menyusun dan menetapkan dokumen KSP melalui rapat dewan pendidik, kemudian menyampaikannya kepada Dinas untuk diverifikasi.",
                    "Pengawas Sekolah melakukan supervisi dan pendampingan penyusunan KSP ke satuan pendidikan binaan.",
                    "Staf Bidang Pembinaan SMA memverifikasi kelengkapan komponen minimum dokumen KSP sesuai kerangka Kurikulum Merdeka.",
                    "Pengawas Sekolah menyusun catatan/rekomendasi perbaikan (apabila diperlukan) dan menyampaikannya kepada sekolah.",
                    "Sekolah menindaklanjuti catatan/rekomendasi dan menyampaikan dokumen KSP final.",
                    "Kepala Bidang Pembinaan SMA menandatangani berita acara hasil verifikasi dan supervisi KSP.",
                    "Staf mendokumentasikan hasil verifikasi dan supervisi serta memutakhirkan rekapitulasi KSP satuan pendidikan."
                ],
                sla: "Paling lama 10 (sepuluh) hari kerja sejak dokumen KSP disampaikan",
                slaDays: 10,
                cost: "Gratis (Rp 0)",
                product: "Berita acara hasil verifikasi dan supervisi Kurikulum Satuan Pendidikan (KSP) yang ditandatangani Kepala Bidang Pembinaan SMA",
                complaintChannel: "Konsultasi Kantor Dinas / https://disdikbud.malukuprov.go.id/pengaduan / SP4N-LAPOR! / TikTok Resmi Disdikbud Prov. Maluku",
                facilities: ["Alat Tulis Kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi dan menggunakan komputer",
                internalSupervision: "Atasan langsung",
                executors: 3,
                guarantee: "1. Bersifat rahasia; 2. Melayani secara profesional; 3. Sarana penunjang aman & nyaman.",
                evaluation: "Survei Kepuasan Masyarakat/Pegawai (SKM) & Evaluasi Berkala"
            },
            {
                id: 6,
                code: "SMA-06",
                title: "Legalisir STTB / Ijazah dan NEM / SKHUN / SKYBS",
                category: "Dokumen & Legalitas",
                legal: [
                    "Undang-Undang Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional",
                    "Permendikbud No. 29 Tahun 2014 tentang Pengesahan Fotokopi Ijazah/STTB Jenjang Dikdasmen",
                    "Peraturan Sekjen Kemendikbudristek Nomor 1 Tahun 2022 tentang Blangko Ijazah"
                ],
                requirements: [
                    "Dokumen asli (STTB/Ijazah, NEM/SKHUN/SKYBS)",
                    "Fotokopi dokumen",
                    "Identitas pemohon"
                ],
                procedure: [
                    "Pemohon mengajukan permohonan legalisir dengan menunjukkan dokumen asli dan menyerahkan fotokopi yang akan dilegalisir.",
                    "Staf mencocokkan fotokopi dengan dokumen asli dan/atau arsip buku induk.",
                    "Staf terkait memaraf dokumen yang telah dicocokkan.",
                    "Kepala Bidang Pembinaan SMA menandatangani dan membubuhkan cap legalisir.",
                    "Staf mencatat pada register dan menyerahkan dokumen terlegalisir kepada pemohon."
                ],
                sla: "Paling lama 1 (satu) hari kerja sejak berkas dinyatakan lengkap",
                slaDays: 1,
                cost: "Gratis (Rp 0)",
                product: "Dokumen STTB/Ijazah dan NEM/SKHUN/SKYBS yang telah dilegalisir (ditandatangani dan dibubuhi cap legalisir)",
                complaintChannel: "Konsultasi Kantor Dinas / https://disdikbud.malukuprov.go.id/pengaduan / SP4N-LAPOR! / TikTok Resmi Disdikbud Prov. Maluku",
                facilities: ["Alat Tulis Kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi dan menggunakan komputer",
                internalSupervision: "Atasan langsung",
                executors: 1,
                guarantee: "1. Rahasia & Aman; 2. Melayani profesional; 3. Sarana penunjang menjamin keselamatan.",
                evaluation: "Survei Kepuasan Masyarakat/Pegawai (SKM) & Evaluasi Berkala"
            },
            {
                id: 7,
                code: "SMA-07",
                title: "Rekomendasi Izin Operasional SMA",
                category: "Kelembagaan & Perizinan",
                legal: [
                    "Peraturan Menteri Pendidikan dan Kebudayaan Nomor 36 Tahun 2014 tentang Pedoman Pendirian, Perubahan, dan Penutupan Satuan Pendidikan Dasar dan Menengah"
                ],
                requirements: [
                    "Izin pendirian satuan pendidikan",
                    "Data sarana prasarana",
                    "Data pendidik dan tenaga kependidikan",
                    "Data calon peserta didik"
                ],
                procedure: [
                    "Pemrakarsa mengajukan permohonan rekomendasi izin operasional dengan melampirkan bukti pemenuhan standar minimal.",
                    "Staf meneliti kelengkapan berkas dan menjadwalkan verifikasi lapangan kesiapan operasional.",
                    "Tim verifikasi lapangan meninjau kesiapan sarana prasarana, pendidik, dan calon peserta didik.",
                    "Staf terkait menelaah hasil verifikasi dan menyusun rekomendasi kesiapan operasional.",
                    "Kepala Bidang Pembinaan SMA menyetujui dan menyusun konsep surat izin operasional.",
                    "Kepala Dinas menandatangani surat izin operasional satuan pendidikan.",
                    "Staf menyampaikan surat izin operasional kepada pemrakarsa dan mengarsipkan berkas."
                ],
                sla: "Paling lama 10 (sepuluh) hari kerja sejak berkas dinyatakan lengkap",
                slaDays: 10,
                cost: "Gratis (Rp 0)",
                product: "Surat izin operasional satuan pendidikan (SMA) yang ditandatangani Kepala Dinas dan diserahkan kepada pemrakarsa",
                complaintChannel: "Konsultasi Kantor Dinas / https://disdikbud.malukuprov.go.id/pengaduan / SP4N-LAPOR! / TikTok Resmi Disdikbud Prov. Maluku",
                facilities: ["Alat Tulis Kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi dan menggunakan komputer",
                internalSupervision: "Atasan langsung",
                executors: 2,
                guarantee: "1. Bersifat rahasia; 2. Melayani secara profesional; 3. Sarana pendukung aman & nyaman.",
                evaluation: "Survei Kepuasan Masyarakat/Pegawai (SKM) & Evaluasi Berkala"
            },
            {
                id: 8,
                code: "SMA-08",
                title: "Bantuan Operasional Satuan Pendidikan (BOSP) SMA",
                category: "Pemerataan & Pendanaan",
                legal: [
                    "Undang-Undang Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional",
                    "Undang-Undang Nomor 23 Tahun 2014 tentang Pemerintahan Daerah jo UU No. 6 Tahun 2023",
                    "Permendikbudristek Nomor 63 Tahun 2023 tentang Petunjuk Teknis Pengelolaan Dana BOSP",
                    "Peraturan Menteri Keuangan tentang Pengelolaan DAK Nonfisik Dana BOSP"
                ],
                requirements: [
                    "Data Dapodik terkini",
                    "Rencana kerja tahunan sekolah (RKAS)"
                ],
                procedure: [
                    "Staf Dinas melakukan verifikasi nomor rekening Satuan Pendidikan SMA pada aplikasi BOS Salur dan diverifikasi oleh bank penyalur di Prov. Maluku.",
                    "Staf memantau proses penyaluran dana BOSP dari Kementerian ke rekening sekolah.",
                    "Sekolah melakukan verifikasi penerimaan dana BOSP pada Website BOS Salur.",
                    "Sekolah menyusun Rencana Kegiatan dan Anggaran Sekolah (RKAS) berbasis BOSP melalui aplikasi ARKAS.",
                    "Staf Bidang Pembinaan SMA memverifikasi kesesuaian RKAS dengan data Dapodik dan ketentuan penggunaan BOSP pada aplikasi MARKAS Kemdikdasmen.",
                    "Staf menolak/menyetujui Rancangan Kertas Kerja Sekolah pada website MARKAS Kemdikdasmen.",
                    "Sekolah menyusun dan menyampaikan laporan pertanggungjawaban penggunaan BOSP melalui ARKAS dan Dinas.",
                    "Staf memverifikasi laporan pertanggungjawaban dan mendokumentasikan rekapitulasi BOSP per satuan pendidikan."
                ],
                sla: "Paling lama 10 (sepuluh) hari kerja per tahap penyaluran",
                slaDays: 10,
                cost: "Gratis (Rp 0)",
                product: "Dana Bantuan Operasional Satuan Pendidikan (BOSP) yang tersalur ke rekening sekolah",
                complaintChannel: "Konsultasi Kantor Dinas / https://disdikbud.malukuprov.go.id/pengaduan / SP4N-LAPOR! / TikTok Resmi Disdikbud Prov. Maluku",
                facilities: ["Alat Tulis Kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi dan menggunakan komputer",
                internalSupervision: "Atasan langsung",
                executors: 4,
                guarantee: "1. Terjamin kerahasiaannya; 2. Melayani profesional; 3. Sarana aman dan nyaman.",
                evaluation: "Survei Kepuasan Masyarakat/Pegawai (SKM) & Evaluasi Berkala"
            },
            {
                id: 9,
                code: "SMA-09",
                title: "Sistem Penerimaan Murid Baru (SPMB) SMA",
                category: "Kesiswaan & Mutasi",
                legal: [
                    "Peraturan Menteri Pendidikan Dasar dan Menengah Nomor 3 Tahun 2025 tentang Sistem Penerimaan Murid Baru"
                ],
                requirements: [
                    "Regulasi SPMB Kementerian",
                    "Data daya tampung sekolah"
                ],
                procedure: [
                    "Dinas menyusun dan menetapkan petunjuk teknis SPMB tingkat provinsi (jalur, kuota, jadwal) mengacu pada regulasi Kementerian.",
                    "Kepala Dinas menandatangani dan mengesahkan juknis SPMB tingkat provinsi.",
                    "Sekolah/Panitia SPMB melaksanakan sosialisasi, pendaftaran, dan seleksi calon murid baru sesuai jalur yang berlaku.",
                    "Staf Bidang Pembinaan SMA memantau dan memverifikasi pelaksanaan SPMB pada sekolah binaan.",
                    "Sekolah mengumumkan hasil SPMB dan melakukan daftar ulang murid yang diterima.",
                    "Operator sekolah menginput data murid baru pada aplikasi Dapodik.",
                    "Staf mendokumentasikan dan merekapitulasi hasil pelaksanaan SPMB seluruh sekolah."
                ],
                sla: "Sesuai jadwal SPMB yang ditetapkan setiap tahun ajaran",
                slaDays: 14,
                cost: "Gratis (Rp 0)",
                product: "Pengumuman / daftar murid baru yang diterima melalui Sistem Penerimaan Murid Baru (SPMB) SMA",
                complaintChannel: "Konsultasi Kantor Dinas / https://disdikbud.malukuprov.go.id/pengaduan / SP4N-LAPOR! / TikTok Resmi Disdikbud Prov. Maluku",
                facilities: ["Alat Tulis Kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi dan menggunakan komputer",
                internalSupervision: "Atasan langsung",
                executors: 4,
                guarantee: "1. Bersifat rahasia; 2. Melayani secara profesional; 3. Sarana penunjang menjamin keselamatan & kenyamanan.",
                evaluation: "Survei Kepuasan Masyarakat/Pegawai (SKM) & Evaluasi Berkala"
            },
            {
                id: 10,
                code: "SMA-10",
                title: "Fasilitasi Data Pokok Pendidikan (DAPODIK) SMA",
                category: "Kurikulum & Data",
                legal: [
                    "Undang-Undang Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional",
                    "PP No. 57 Tahun 2021 jo PP No. 4 Tahun 2022 tentang Standar Nasional Pendidikan",
                    "Permendikbud Nomor 79 Tahun 2015 tentang Data Pokok Pendidikan",
                    "Permendikbudristek Nomor 31 Tahun 2022 tentang Satu Data Pendidikan"
                ],
                requirements: [
                    "Data satuan pendidikan",
                    "Data peserta didik dan pendidik",
                    "Data sarana prasarana"
                ],
                procedure: [
                    "Operator Dapodik sekolah menginput dan memutakhirkan data satuan pendidikan, peserta didik, pendidik, dan sarana prasarana secara berkala.",
                    "Sekolah mengajukan permohonan fasilitasi/pendampingan apabila terdapat kendala teknis (sinkronisasi, akun, atau kesalahan data).",
                    "Staf Bidang Pembinaan SMA memverifikasi kelengkapan dan kevalidan data pada aplikasi Dapodik.",
                    "Staf terkait menelaah data bermasalah dan mengoordinasikan penyelesaian dengan sekolah/Kementerian.",
                    "Staf mendampingi operator sekolah menyelesaikan perbaikan data dan sinkronisasi Dapodik.",
                    "Kepala Bidang Pembinaan SMA memantau rekapitulasi status kelengkapan data Dapodik seluruh sekolah binaan secara berkala.",
                    "Staf mendokumentasikan hasil fasilitasi dan memutakhirkan rekapitulasi data Dapodik."
                ],
                sla: "Paling lama 5 (lima) hari kerja untuk fasilitasi / pendampingan dan verifikasi data",
                slaDays: 5,
                cost: "Gratis (Rp 0)",
                product: "Data Dapodik satuan pendidikan yang termutakhirkan dan tersinkron",
                complaintChannel: "Konsultasi Kantor Dinas / https://disdikbud.malukuprov.go.id/pengaduan / SP4N-LAPOR! / TikTok Resmi Disdikbud Prov. Maluku",
                facilities: ["Alat Tulis Kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi dan menggunakan komputer",
                internalSupervision: "Atasan langsung",
                executors: 1,
                guarantee: "1. Bersifat rahasia; 2. Melayani secara profesional; 3. Sarana penunjang menjamin keselamatan & kenyamanan.",
                evaluation: "Survei Kepuasan Masyarakat/Pegawai (SKM) & Evaluasi Berkala"
            },
            {
                id: 11,
                code: "SMA-11",
                title: "Surat Keterangan Kesalahan Penulisan Ijazah / STTB",
                category: "Dokumen & Legalitas",
                legal: [
                    "Permendikbud Nomor 29 Tahun 2014 tentang Pengesahan Fotokopi Ijazah/STTB, Surat Keterangan Pengganti Ijazah/STTB Jenjang Dikdasmen"
                ],
                requirements: [
                    "Surat permohonan",
                    "Ijazah / STTB asli yang terdapat kesalahan",
                    "Akta kelahiran / KK / KTP sebagai bukti data yang benar"
                ],
                procedure: [
                    "Pemohon mengajukan permohonan surat keterangan kesalahan penulisan dengan melampirkan bukti data yang benar.",
                    "Staf meneliti kelengkapan berkas dan mencocokkan data pada arsip/buku induk kelulusan.",
                    "Staf teknis memverifikasi kesesuaian bukti dan menyusun konsep surat keterangan koreksi.",
                    "Kepala Bidang Pembinaan SMA memaraf konsep surat keterangan koreksi.",
                    "Kepala Dinas menandatangani surat keterangan kesalahan penulisan ijazah/STTB.",
                    "Staf mencatat pada register dan menyerahkan surat keterangan kepada pemohon."
                ],
                sla: "Paling lama 5 (lima) hari kerja sejak berkas dinyatakan lengkap",
                slaDays: 5,
                cost: "Gratis (Rp 0)",
                product: "Surat keterangan kesalahan penulisan Ijazah/STTB yang ditandatangani Kepala Dinas dan diserahkan kepada pemohon",
                complaintChannel: "Konsultasi Kantor Dinas / https://disdikbud.malukuprov.go.id/pengaduan / SP4N-LAPOR! / TikTok Resmi Disdikbud Prov. Maluku",
                facilities: ["Alat Tulis Kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi dan menggunakan komputer",
                internalSupervision: "Atasan langsung",
                executors: 3,
                guarantee: "1. Bersifat rahasia; 2. Melayani secara profesional; 3. Sarana penunjang menjamin keselamatan & kenyamanan.",
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
                    formData.append('bidang', 'sma');
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
                return SMA_SERVICES.filter(service => {
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
                const set = new Set(SMA_SERVICES.map(s => s.category));
                return ["ALL", ...Array.from(set)];
            }, []);

            useEffect(() => {
                // Destroy previous chart instances before re-render
                if (lineInstance.current) lineInstance.current.destroy();
                if (barInstance.current) barInstance.current.destroy();

                // 1. Line Chart: Tren Rating Produk Layanan (SKM / Indeks Kepuasan)
                if (chartLineRef.current) {
                    const ctxLine = chartLineRef.current.getContext('2d');
                    lineInstance.current = new Chart(ctxLine, {
                        type: 'line',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
                            datasets: [{
                                label: 'Indeks Kepuasan Layanan Bidang SMA (Skala 4.00)',
                                data: [3.75, 3.80, 3.84, 3.87, 3.90, 3.92, 3.94, 3.95, 3.97, 3.98, 3.98, 3.99],
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

                // 2. Bar Chart: Top Produk Layanan Bidang Pembinaan SMA
                if (chartBarRef.current) {
                    const ctxBar = chartBarRef.current.getContext('2d');
                    barInstance.current = new Chart(ctxBar, {
                        type: 'bar',
                        data: {
                            labels: ['Mutasi Siswa', 'BOSP SMA', 'Legalisir', 'Pengganti Ijazah', 'KSP Kurikulum', 'Dapodik SMA', 'SPMB SMA', 'Izin Pendirian'],
                            datasets: [{
                                label: 'Volume Layanan Terproses Tepat Waktu (SLA 100%)',
                                data: [1850, 1420, 1280, 960, 840, 750, 620, 310],
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
                                <div className="h-3 w-3 rounded-full bg-gold-400 animate-pulse"></div>
                                <span className="text-xs sm:text-sm font-semibold text-slate-200 tracking-wider uppercase">
                                    Pemerintah Daerah Provinsi Maluku
                                </span>
                            </div>
                            <div className="text-xs font-medium text-gold-400 bg-navy-800/80 px-3 py-1 rounded-full border border-gold-500/20">
                                Unit Kerja: Bidang Pembinaan SMA
                            </div>
                        </div>
                    </nav>

                    {/* 1. HERO SECTION (HALAMAN PEMBUKA) - TYPOGRAPHY DRIVEN, NO LOGO */}
                    <header className="bg-gradient-to-br from-navy-950 via-navy-900 to-navy-800 text-white py-12 px-4 sm:px-6 lg:px-8 border-b-4 border-gold-500 shadow-xl relative overflow-hidden">
                        <div className="absolute -top-24 -right-24 w-96 h-96 bg-gold-500/10 rounded-full blur-3xl pointer-events-none"></div>
                        <div className="absolute -bottom-24 -left-24 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>

                        <div className="max-w-7xl mx-auto text-center space-y-4 relative z-10">
                            <div className="inline-block">
                                <p className="text-xs sm:text-sm font-extrabold tracking-widest text-gold-400 uppercase bg-navy-800/90 px-4 py-1.5 rounded-full border border-gold-500/30">
                                    Dinas Pendidikan & Kebudayaan Provinsi Maluku
                                </p>
                            </div>
                            
                            <h1 className="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-white max-w-4xl mx-auto leading-tight">
                                Produk Layanan Dinas Pendidikan & Kebudayaan <span className="gold-gradient-text block mt-1">Provinsi Maluku</span>
                            </h1>

                            <p className="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto font-normal leading-relaxed">
                                Unit Kerja: Bidang Pembinaan SMA - Dinas Pendidikan dan Kebudayaan Provinsi Maluku
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
                        {}
                        {/* 2. KEGIATAN UTAMA MONEV (CARD SECTION - 3 CARDS GRID) */}
                        <section className="space-y-4">
                            <div className="flex flex-col sm:flex-row items-start sm:items-end justify-between gap-2 border-b border-slate-200 pb-3">
                                <div>
                                    <h2 className="text-xl font-bold text-navy-900 flex items-center gap-2">
                                        <span className="w-2 h-6 bg-gold-500 rounded-full"></span>
                                        Kegiatan Utama Monitoring & Evaluasi (Monev)
                                    </h2>
                                    <p className="text-xs text-slate-500 mt-0.5">
                                        Cakupan layanan pembinaan, supervisi kurikulum, pendataan, dan tata kelola satuan pendidikan SMA se-Provinsi Maluku
                                    </p>
                                </div>
                                <span className="text-[11px] font-bold text-navy-800 bg-gold-400/20 px-3 py-1 rounded-full border border-gold-500/30">
                                    Bidang Pembinaan SMA
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
                                            Pengelolaan mutasi siswa, verifikasi Kurikulum Satuan Pendidikan (KSP), fasilitasi Dana BOSP SMA, penyaluran SPMB, serta pendampingan Dapodik SMA.
                                        </p>
                                        <div className="pt-2 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                                            <span>Monev Kurikulum & BOSP: <strong>Aktif</strong></span>
                                            <span>SLA Max: <strong>10-15 Hari</strong></span>
                                        </div>
                                    </div>
                                    <button 
                                        onClick={() => setSelectedCardMonev({
                                            title: "Satuan Pendidikan SMA",
                                            scope: "Pembinaan, Kurikulum & Aksesibilitas SMA Negeri/Swasta",
                                            details: [
                                                "Pengawasan dan Evaluasi Mutasi Siswa SMA antar kabupaten/kota dan luar provinsi.",
                                                "Verifikasi & Supervisi Kurikulum Satuan Pendidikan (KSP) berbasis Kurikulum Merdeka.",
                                                "Pengawasan dan Verifikasi Penggunaan Dana Bantuan Operasional Satuan Pendidikan (BOSP) SMA melalui MARKAS Kemdikdasmen.",
                                                "Pendampingan dan Sinkronisasi Data Pokok Pendidikan (Dapodik) SMA secara menyeluruh."
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
                                            Koordinasi dan pemantauan standar kelayakan kelembagaan, penyelarasan kurikulum kejuruan, serta pertukaran data siswa/alumni pada jenjang pendidikan kejuruan.
                                        </p>
                                        <div className="pt-2 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                                            <span>Sinergi Data: <strong>Dapodik / Verval SP</strong></span>
                                            <span>Status: <strong>Terkoordinasi</strong></span>
                                        </div>
                                    </div>
                                    <button 
                                        onClick={() => setSelectedCardMonev({
                                            title: "Satuan Pendidikan SMK",
                                            scope: "Pemantauan Sinergi Lintas Bidang Pendidikan Kejuruan",
                                            details: [
                                                "Sinergi verifikasi data NPSN dan Verval Satuan Pendidikan jenjang SMK.",
                                                "Pemantauan keterikatan data kelulusan & legalisir pengganti ijazah.",
                                                "Integrasi sistem penerimaan murid baru dan verifikasi kelayakan sarana pendidikan.",
                                                "Koordinasi penjaminan mutu bersama Bidang Pembinaan SMK."
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
                                            Layanan perizinan pendirian, penerbitan Izin Operasional SMA, pengasahan/legalisir ijazah, koreksi penulisan ijazah, dan penetapan kuota SPMB se-Provinsi Maluku.
                                        </p>
                                        <div className="pt-2 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                                            <span>Jangkauan: <strong>11 Kab/Kota</strong></span>
                                            <span>Izin Pendirian: <strong>15 Hari SLA</strong></span>
                                        </div>
                                    </div>
                                    <button 
                                        onClick={() => setSelectedCardMonev({
                                            title: "Satuan Pendidikan Negeri Dan Swasta",
                                            scope: "Perizinan Kelembagaan & Pengesahan Dokumen Resmi",
                                            details: [
                                                "Proses Rekomendasi & Izin Pendirian Satuan Pendidikan SMA Baru (SLA 15 Hari).",
                                                "Penerbitan Rekomendasi Izin Operasional SMA Negeri/Swasta (SLA 10 Hari).",
                                                "Pelayanan Legalisir Ijazah / STTB Cepat (SLA 1 Hari Kerja).",
                                                "Penerbitan Surat Keterangan Kesalahan Penulisan / Pengganti Ijazah Hilang."
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

                        {}
                        {/* 3. INFOGRAFIS LAPORAN (GRAFIK DATA) */}
                        <section className="space-y-6">
                            <div className="border-b border-slate-200 pb-3">
                                <h2 className="text-xl font-bold text-navy-900 flex items-center gap-2">
                                    <span className="w-2 h-6 bg-navy-900 rounded-full"></span>
                                    Infografis Laporan (Grafik Data Performansi Layanan)
                                </h2>
                                <p className="text-xs text-slate-500 mt-0.5">
                                    Evaluasi data kualitatif dan kuantitatif pelaksanaan standar pelayanan publik Bidang Pembinaan SMA
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
                                                    Perkembangan Indeks Kepuasan Masyarakat (SKM) Bulanan Bidang Pembinaan SMA
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
                            <div className="bg-gradient-to-r from-navy-950 via-navy-900 to-navy-800 text-white rounded-2xl p-6 shadow-md border-l-4 border-gold-500 relative overflow-hidden">
                                <div className="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                                    <div className="space-y-2 w-full">
                                        <div className="flex items-center gap-2">
                                            <span className="w-2.5 h-2.5 rounded-full bg-gold-400 animate-ping"></span>
                                            <h3 className="text-base font-extrabold text-gold-400 uppercase tracking-wider">
                                                Catatan Hasil Pelaporan
                                            </h3>
                                        </div>
                                        <div className="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-2 text-xs sm:text-sm">
                                            <div className="flex items-center gap-2 bg-navy-800/80 px-3 py-2.5 rounded-xl border border-navy-700">
                                                <span className="text-gold-400 font-bold text-base">📌</span>
                                                <span className="font-semibold text-slate-100">Informatif, terpercaya, berwibawa.</span>
                                            </div>
                                            <div className="flex items-center gap-2 bg-navy-800/80 px-3 py-2.5 rounded-xl border border-navy-700">
                                                <span className="text-gold-400 font-bold text-base">📌</span>
                                                <span className="font-semibold text-slate-100">Menunjukkan capaian secara data-driven.</span>
                                            </div>
                                            <div className="flex items-center gap-2 bg-navy-800/80 px-3 py-2.5 rounded-xl border border-navy-700">
                                                <span className="text-gold-400 font-bold text-base">📌</span>
                                                <span className="font-semibold text-slate-100">Disiapkan sebagai bahan laporan pimpinan.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        {}
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
                                    Lihat seluruh produk standar pelayanan publik Bidang Pembinaan SMA lengkap dengan standar operasional prosedur (SOP) resmi 14 komponen.
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

                        {}
                        {/* 5. DIREKTORI DETAIL PRODUK LAYANAN BIDANG PEMBINAAN SMA */}
                        <section id="directory-section" className="space-y-6 pt-4">
                            <div className="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 border-b border-slate-200 pb-4">
                                <div>
                                    <h2 className="text-xl font-bold text-navy-900 flex items-center gap-2">
                                        <span className="w-2 h-6 bg-gold-500 rounded-full"></span>
                                        Direktori Produk Layanan Bidang Pembinaan SMA
                                    </h2>
                                    <p className="text-xs text-slate-500 mt-0.5">
                                        Klik pada kartu layanan untuk menampilkan rincian SOP 14 komponen lengkap
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
                                            {cat === "ALL" ? `Semua (${SMA_SERVICES.length})` : cat}
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
                                    <p className="font-bold text-base">Tidak ada layanan yang sesuai kata kunci pencarian</p>
                                    <p className="text-xs">Silakan coba kata kunci lain atau klik opsi kategori "Semua".</p>
                                </div>
                            )}
                        </section>
                    </main>

                    {}
                    {/* FOOTER */}
                    <footer className="bg-navy-950 text-slate-400 py-8 border-t-2 border-gold-500/40 mt-auto text-xs">
                        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3 text-center sm:text-left flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div>
                                <p className="font-bold text-white text-sm">
                                    Bidang Pembinaan SMA
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

                    {}
                    {/* MODAL SOP 14 KOMPONEN DETAIL */}
                    {selectedServiceModal && (
                        <div className="fixed inset-0 z-50 bg-navy-950/70 backdrop-blur-sm flex items-center justify-center p-4 overflow-y-auto">
                            <div className="bg-white rounded-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto custom-scrollbar shadow-2xl border border-gold-500/30 my-auto">
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
                                            <p className="text-[10px] text-slate-400 font-bold uppercase">1. Unit Kerja Penanggung Jawab</p>
                                            <p className="font-bold text-navy-900">Bidang Pembinaan SMA</p>
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
                                            <p className="font-bold text-navy-900 text-xs mt-0.5 line-clamp-3">{selectedServiceModal.product}</p>
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
                                            <p className="text-slate-600 leading-relaxed">{selectedServiceModal.guarantee}</p>
                                        </div>
                                        <div className="p-3 bg-slate-50 rounded-xl border space-y-1">
                                            <p className="font-bold text-navy-900 uppercase text-[10px]">14. Evaluasi Kinerja Pelaksana</p>
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
                            <div className="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-gold-500/40 space-y-4 my-auto">
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