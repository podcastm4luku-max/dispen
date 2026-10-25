<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Produk Layanan GTK - Dinas Pendidikan & Kebudayaan Provinsi Maluku</title>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<script>
tailwind.config = {
theme: {
extend: {
fontFamily: {
sans: ['"Plus Jakarta Sans"', 'sans-serif'],
},
colors: {
navy: {
DEFAULT: '#0A192F',
dark: '#020C1B',
light: '#112240',
card: '#172A45',
border: '#233554'
},
gold: {
DEFAULT: '#D4AF37',
hover: '#C5A028',
light: '#F4E8C1',
accent: '#FFD700',
glow: 'rgba(212, 175, 55, 0.25)'
}
}
}
}
}
</script>
<style>
body {
font-family: 'Plus Jakarta Sans', sans-serif;
background-color: #F8FAFC;
color: #0F172A;
}
.hero-pattern {
background-color: #0A192F;
background-image: radial-gradient(rgba(212, 175, 55, 0.12) 1px, transparent 0);
background-size: 28px 28px;
}
.gold-gradient-text {
background: linear-[#D4AF37], #FFD700);
background: linear-gradient(135deg, #FFE89C 0%, #D4AF37 50%, #9A7B1C 100%);
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;
}
.gold-border-glow {
box-shadow: 0 0 15px rgba(212, 175, 55, 0.2);
}
.glass-card {
background: rgba(17, 34, 64, 0.85);
backdrop-filter: blur(12px);
border: 1px solid rgba(212, 175, 55, 0.25);
}
/* Custom Scrollbar */
::-webkit-scrollbar {
width: 8px;
height: 8px;
}
::-webkit-scrollbar-track {
background: #0A192F;
}
::-webkit-scrollbar-thumb {
background: #D4AF37;
border-radius: 4px;
}
::-webkit-scrollbar-thumb:hover {
background: #FFD700;
}
</style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased selection:bg-amber-400 selection:text-slate-900">
<!-- TOP NAVIGATION HEADER -->
<nav class="sticky top-0 z-40 bg-navy text-white border-b border-gold/30 shadow-lg">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex items-center justify-between h-20">
<div class="flex items-center gap-3">
<div class="w-2 h-8 bg-gold rounded-full"></div>
<div>
<span class="text-xs uppercase tracking-widest text-gold font-bold block">Pemerintah Daerah Provinsi Maluku</span>
<h1 class="text-sm md:text-base font-bold text-white tracking-wide">Dinas Pendidikan dan Kebudayaan</h1>
</div>
</div>
<div class="hidden md:flex items-center space-x-5 text-sm font-medium">
<a href="{{ url('/standar-pelayanan') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-md bg-navy-light text-gold border border-gold/40 hover:bg-gold hover:text-navy transition font-semibold text-xs uppercase tracking-wider">
<i class="fa-solid fa-arrow-left"></i> Standar Layanan
</a>
<a href="#hero" class="text-white hover:text-gold transition">Beranda</a>
<a href="#hero" class="text-white hover:text-gold transition">Beranda</a>
<a href="#monev" class="text-white hover:text-gold transition">Kegiatan Monev</a>
<a href="#infografis" class="text-white hover:text-gold transition">Infografis Data</a>
<a href="#layanan" class="text-white hover:text-gold transition">Produk Layanan GTK</a>
<a href="#laporan" class="px-4 py-2 rounded-lg bg-gold text-navy font-bold hover:bg-yellow-400 transition shadow-md">
<i class="fa-solid fa-file-invoice mr-1.5"></i> Satu Data
</a>
</div>
<div class="md:hidden">
<button id="mobileMenuBtn" class="text-gold focus:outline-none p-2 text-xl" aria-label="Open Menu">
<i class="fa-solid fa-bars"></i>
</button>
</div>
</div>
</div>
<!-- Mobile menu dropdown -->
<div id="mobileMenu" class="hidden md:hidden bg-navy-light border-b border-gold/30 px-4 pt-2 pb-4 space-y-2">
<a href="{{ url('/standar-pelayanan') }}" class="block py-2 text-gold font-bold"><i class="fa-solid fa-arrow-left mr-2"></i>Kembali ke Standar Pelayanan</a>
<a href="#hero" class="block py-2 text-white hover:text-gold font-medium">Beranda</a>
<a href="#monev" class="block py-2 text-white hover:text-gold font-medium">Kegiatan Monev</a>
<a href="#infografis" class="block py-2 text-white hover:text-gold font-medium">Infografis Data</a>
<a href="#layanan" class="block py-2 text-white hover:text-gold font-medium">Produk Layanan GTK</a>
<a href="#laporan" class="block py-2 text-gold font-bold">Profil Satu Data</a>
</div>
</nav>
<!-- 1. HALAMAN PEMBUKA (HERO SECTION) -->
<header id="hero" class="hero-pattern relative text-white py-16 md:py-24 border-b-4 border-gold">
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
<!-- Badge Subtitle -->
<div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-navy-light/90 border border-gold/40 text-gold text-xs sm:text-sm font-semibold mb-6 shadow-sm">
<i class="fa-solid fa-building-columns text-gold"></i>
<span>Dinas Pendidikan & Kebudayaan Provinsi Maluku</span>
</div>
<!-- Judul Utama & Subjudul (Tegas, Tanpa Logo, Fokus Teks) -->
<h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight mb-4 uppercase">
Produk Layanan <span class="gold-gradient-text block mt-1">Dinas Pendidikan & Kebudayaan</span>
</h1>
<p class="text-lg sm:text-xl md:text-2xl text-slate-300 max-w-3xl mx-auto font-light leading-relaxed mb-8">
Unit Kerja Guru dan Tenaga Kependidikan (GTK) — Mewujudkan Tata Kelola Layanan Pendidik yang Transparan, Akuntabel, dan Data-Driven di Provinsi Maluku
</p>
<!-- Quick Metrics Header Cards -->
<div class="grid grid-cols-2 sm:grid-cols-4 gap-4 max-w-4xl mx-auto mt-12 text-left">
<div class="glass-card p-4 rounded-xl">
<span class="text-xs text-slate-400 block font-medium">Layanan GTK</span>
<span class="text-2xl sm:text-3xl font-extrabold text-gold">4 Layanan</span>
<span class="text-xs text-emerald-400 block mt-1"><i class="fa-solid fa-check-circle"></i> Standar Terpadu</span>
</div>
<div class="glass-card p-4 rounded-xl">
<span class="text-xs text-slate-400 block font-medium">Biaya Layanan</span>
<span class="text-2xl sm:text-3xl font-extrabold text-emerald-400">100% GRATIS</span>
<span class="text-xs text-slate-300 block mt-1"><i class="fa-solid fa-shield-halved text-gold"></i> Bebas Pungli</span>
</div>
<div class="glass-card p-4 rounded-xl">
<span class="text-xs text-slate-400 block font-medium">Rata-Rata SLA</span>
<span class="text-2xl sm:text-3xl font-extrabold text-gold">5.7 Hari</span>
<span class="text-xs text-slate-300 block mt-1"><i class="fa-solid fa-clock text-gold"></i> Kerja Terukur</span>
</div>
<div class="glass-card p-4 rounded-xl">
<span class="text-xs text-slate-400 block font-medium">Indeks SKM</span>
<span class="text-2xl sm:text-3xl font-extrabold text-amber-300">4.88 / 5.0</span>
<span class="text-xs text-emerald-400 block mt-1"><i class="fa-solid fa-star"></i> Sangat Baik</span>
</div>
</div>
</div>
</header>
<!-- 2. KEGIATAN UTAMA MONEV (CARD SECTION) -->
<section id="monev" class="py-16 bg-slate-100">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center max-w-3xl mx-auto mb-12">
<div class="inline-block px-3 py-1 bg-amber-100 text-navy font-bold text-xs uppercase tracking-wider rounded-md mb-2">
Monitoring & Evaluasi Digital
</div>
<h2 class="text-3xl font-extrabold text-navy sm:text-4xl">Kegiatan Utama Monev GTK</h2>
<p class="mt-3 text-slate-600 text-base">
Pemantauan secara berkala pada seluruh satuan pendidikan menengah dan khusus di 11 Kabupaten/Kota se-Provinsi Maluku.
</p>
</div>
<!-- 3 Modern Cards Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Card 1: SMA -->
<div class="bg-white rounded-2xl shadow-md border border-slate-200 overflow-hidden hover:shadow-xl transition-all duration-300 group flex flex-col justify-between">
<div>
<div class="bg-navy p-6 relative overflow-hidden">
<div class="absolute right-3 top-3 text-gold/10 text-6xl font-black group-hover:scale-110 transition-transform">
<i class="fa-solid fa-school"></i>
</div>
<span class="px-3 py-1 bg-gold/20 text-gold text-xs font-bold rounded-full border border-gold/40">Monev Card 1</span>
<h3 class="text-xl font-bold text-white mt-3">Satuan Pendidikan SMA</h3>
<p class="text-xs text-slate-300 mt-1">Sekolah Menengah Atas Negeri & Swasta</p>
</div>
<div class="p-6 space-y-4">
<div class="flex justify-between items-center text-sm border-b pb-2">
<span class="text-slate-500"><i class="fa-solid fa-calculator text-navy mr-1.5"></i> Total Sekolah Target</span>
<span class="font-bold text-navy">284 SMA</span>
</div>
<div class="flex justify-between items-center text-sm border-b pb-2">
<span class="text-slate-500"><i class="fa-solid fa-user-graduate text-navy mr-1.5"></i> Guru Terverifikasi</span>
<span class="font-bold text-navy">6,420 Guru</span>
</div>
<div class="flex justify-between items-center text-sm border-b pb-2">
<span class="text-slate-500"><i class="fa-solid fa-chart-line text-emerald-600 mr-1.5"></i> Capaian Sertifikasi</span>
<span class="font-bold text-emerald-600">88.4%</span>
</div>
<p class="text-xs text-slate-600 leading-relaxed bg-slate-50 p-3 rounded-lg border border-slate-200">
Ringkasan: Pengawasan beban kerja mengajar 24 jam linier, pemutakhiran sertifikasi pendidik, dan penyaluran TPG SMA berjalan optimal.
</p>
</div>
</div>
<div class="p-6 pt-0">
<button onclick="openMonevModal('SMA')" class="w-full py-3 px-4 bg-navy hover:bg-navy-light text-white font-bold rounded-xl flex items-center justify-center gap-2 transition group-hover:bg-gold group-hover:text-navy">
<span>Detail Laporan</span>
<i class="fa-solid fa-arrow-right text-xs"></i>
</button>
</div>
</div>
<!-- Card 2: SMK -->
<div class="bg-white rounded-2xl shadow-md border border-slate-200 overflow-hidden hover:shadow-xl transition-all duration-300 group flex flex-col justify-between">
<div>
<div class="bg-navy p-6 relative overflow-hidden">
<div class="absolute right-3 top-3 text-gold/10 text-6xl font-black group-hover:scale-110 transition-transform">
<i class="fa-solid fa-gears"></i>
</div>
<span class="px-3 py-1 bg-gold/20 text-gold text-xs font-bold rounded-full border border-gold/40">Monev Card 2</span>
<h3 class="text-xl font-bold text-white mt-3">Satuan Pendidikan SMK</h3>
<p class="text-xs text-slate-300 mt-1">Sekolah Menengah Kejuruan Vokasi</p>
</div>
<div class="p-6 space-y-4">
<div class="flex justify-between items-center text-sm border-b pb-2">
<span class="text-slate-500"><i class="fa-solid fa-calculator text-navy mr-1.5"></i> Total Sekolah Target</span>
<span class="font-bold text-navy">118 SMK</span>
</div>
<div class="flex justify-between items-center text-sm border-b pb-2">
<span class="text-slate-500"><i class="fa-solid fa-user-gear text-navy mr-1.5"></i> Guru Kejuruan/Produktif</span>
<span class="font-bold text-navy">3,150 Guru</span>
</div>
<div class="flex justify-between items-center text-sm border-b pb-2">
<span class="text-slate-500"><i class="fa-solid fa-chart-line text-emerald-600 mr-1.5"></i> Keaktifan SIMPKB</span>
<span class="font-bold text-emerald-600">92.1%</span>
</div>
<p class="text-xs text-slate-600 leading-relaxed bg-slate-50 p-3 rounded-lg border border-slate-200">
Ringkasan: Pemetaan kompetensi guru kejuruan berbasis industri, penerbitan NUPTK guru produktif baru, serta fasilitasi magang guru SMK.
</p>
</div>
</div>
<div class="p-6 pt-0">
<button onclick="openMonevModal('SMK')" class="w-full py-3 px-4 bg-navy hover:bg-navy-light text-white font-bold rounded-xl flex items-center justify-center gap-2 transition group-hover:bg-gold group-hover:text-navy">
<span>Detail Laporan</span>
<i class="fa-solid fa-arrow-right text-xs"></i>
</button>
</div>
</div>
<!-- Card 3: Negeri Dan Swasta -->
<div class="bg-white rounded-2xl shadow-md border border-slate-200 overflow-hidden hover:shadow-xl transition-all duration-300 group flex flex-col justify-between">
<div>
<div class="bg-navy p-6 relative overflow-hidden">
<div class="absolute right-3 top-3 text-gold/10 text-6xl font-black group-hover:scale-110 transition-transform">
<i class="fa-solid fa-scale-balanced"></i>
</div>
<span class="px-3 py-1 bg-gold/20 text-gold text-xs font-bold rounded-full border border-gold/40">Monev Card 3</span>
<h3 class="text-xl font-bold text-white mt-3">Satuan Pendidikan Negeri & Swasta</h3>
<p class="text-xs text-slate-300 mt-1">Sinergi Integrasi Data GTK SLB, SMA, SMK</p>
</div>
<div class="p-6 space-y-4">
<div class="flex justify-between items-center text-sm border-b pb-2">
<span class="text-slate-500"><i class="fa-solid fa-building text-navy mr-1.5"></i> Total Lembaga Terdata</span>
<span class="font-bold text-navy">425 Satuan</span>
</div>
<div class="flex justify-between items-center text-sm border-b pb-2">
<span class="text-slate-500"><i class="fa-solid fa-id-card text-navy mr-1.5"></i> Cakupan Validasi NUPTK</span>
<span class="font-bold text-navy">96.8% Valid</span>
</div>
<div class="flex justify-between items-center text-sm border-b pb-2">
<span class="text-slate-500"><i class="fa-solid fa-chart-line text-emerald-600 mr-1.5"></i> Kelancaran Tunjangan</span>
<span class="font-bold text-emerald-600">95.4%</span>
</div>
<p class="text-xs text-slate-600 leading-relaxed bg-slate-50 p-3 rounded-lg border border-slate-200">
Ringkasan: Evaluasi kesetaraan layanan publik GTK sekolah negeri dan swasta, sinkronisasi Dapodik, dan mitigasi kendala info GTK.
</p>
</div>
</div>
<div class="p-6 pt-0">
<button onclick="openMonevModal('NegeriSwasta')" class="w-full py-3 px-4 bg-navy hover:bg-navy-light text-white font-bold rounded-xl flex items-center justify-center gap-2 transition group-hover:bg-gold group-hover:text-navy">
<span>Detail Laporan</span>
<i class="fa-solid fa-arrow-right text-xs"></i>
</button>
</div>
</div>
</div>
</div>
</section>
<!-- 3. INFOGRAFIS LAPORAN (GRAFIK DATA) -->
<section id="infografis" class="py-16 bg-white border-t border-b border-slate-200">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center max-w-3xl mx-auto mb-12">
<span class="text-xs font-bold text-gold bg-navy px-3 py-1 rounded-full uppercase tracking-wider">Visualisasi Analitis</span>
<h2 class="text-3xl font-extrabold text-navy mt-2 sm:text-4xl">Infografis Laporan & Tren Layanan</h2>
<p class="text-slate-600 mt-2">Data real-time evaluasi indeks kepuasan dan volume pemanfaatan produk layanan GTK.</p>
</div>
<!-- Charts Container Grid -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
<!-- Line Chart Container -->
<div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 shadow-sm">
<div class="flex justify-between items-center mb-4">
<div>
<h3 class="font-bold text-navy text-lg">Tren Rating Produk Layanan</h3>
<p class="text-xs text-slate-500">Evaluasi Skala Kepuasan Publik 2025 - 2026</p>
</div>
<span class="text-xs font-semibold px-2.5 py-1 bg-emerald-100 text-emerald-800 rounded-md">
<i class="fa-solid fa-arrow-trend-up mr-1"></i> +4.2%
</span>
</div>
<div class="relative h-72 w-full">
<canvas id="lineChartRating"></canvas>
</div>
</div>
<!-- Bar Chart Container -->
<div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 shadow-sm">
<div class="flex justify-between items-center mb-4">
<div>
<h3 class="font-bold text-navy text-lg">Top Produk Layanan Diproses</h3>
<p class="text-xs text-slate-500">Volume Berkas Usulan Layanan GTK (2025/2026)</p>
</div>
<span class="text-xs font-semibold px-2.5 py-1 bg-navy text-gold rounded-md">
Akumulasi Berkas
</span>
</div>
<div class="relative h-72 w-full">
<canvas id="barChartProduk"></canvas>
</div>
</div>
</div>
<!-- Catatan Hasil Pelaporan -->
<div class="bg-navy p-6 rounded-2xl text-white border-l-8 border-gold shadow-md flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
<div class="space-y-1">
<div class="flex items-center gap-2 text-gold font-bold text-sm">
<i class="fa-solid fa-clipboard-check"></i>
<span>CATATAN HASIL PELAPORAN</span>
</div>
<ul class="text-sm text-slate-200 space-y-1 font-light">
<li class="flex items-center gap-2"><i class="fa-solid fa-circle text-[6px] text-gold"></i> <strong>Informatif, Terpercaya, Berwibawa:</strong> Seluruh indikator kinerja berbasis validasi Dapodik & SIMPKB.</li>
<li class="flex items-center gap-2"><i class="fa-solid fa-circle text-[6px] text-gold"></i> <strong>Capaian Data-Driven:</strong> Penyelesaian SLA rata-rata di bawah 7 hari kerja tanpa biaya (100% Gratis).</li>
<li class="flex items-center gap-2"><i class="fa-solid fa-circle text-[6px] text-gold"></i> <strong>Penyajian Laporan Pimpinan:</strong> Disiapkan secara terstruktur sebagai bahan masukan strategis Kepala Dinas & Gubernur Maluku.</li>
</ul>
</div>
<div class="shrink-0">
<span class="inline-flex items-center gap-2 px-4 py-2 bg-gold/20 text-gold border border-gold/40 text-xs font-bold rounded-xl">
<i class="fa-solid fa-file-shield text-base"></i> Dokumen Terverifikasi
</span>
</div>
</div>
</div>
</section>
<!-- 4. RINCIAN STANDAR PRODUK LAYANAN GTK (DETAIL KELENGKAPAN) -->
<section id="layanan" class="py-16 bg-slate-100">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center max-w-3xl mx-auto mb-12">
<span class="text-xs font-bold text-navy bg-gold px-3 py-1 rounded-full uppercase tracking-wider">Standar Pelayanan Publik</span>
<h2 class="text-3xl font-extrabold text-navy sm:text-4xl mt-2">Katalog & Standar Layanan GTK</h2>
<p class="text-slate-600 mt-2">4 Layanan Utama Bidang Guru dan Tenaga Kependidikan Dinas Pendidikan & Kebudayaan Provinsi Maluku.</p>
</div>
<!-- Interactive Tabs for Services -->
<div class="flex flex-wrap justify-center gap-2 mb-8" id="serviceTabs">
<button onclick="switchServiceTab('sertifikasi')" id="tab-sertifikasi" class="px-5 py-2.5 rounded-xl text-sm font-bold transition shadow-sm bg-navy text-gold border border-gold">
1. Sertifikasi Pendidik
</button>
<button onclick="switchServiceTab('nuptk')" id="tab-nuptk" class="px-5 py-2.5 rounded-xl text-sm font-bold transition shadow-sm bg-white text-slate-700 hover:bg-slate-200 border border-slate-300">
2. NUPTK
</button>
<button onclick="switchServiceTab('tunjangan')" id="tab-tunjangan" class="px-5 py-2.5 rounded-xl text-sm font-bold transition shadow-sm bg-white text-slate-700 hover:bg-slate-200 border border-slate-300">
3. Tunjangan Pendidik
</button>
<button onclick="switchServiceTab('simpkb')" id="tab-simpkb" class="px-5 py-2.5 rounded-xl text-sm font-bold transition shadow-sm bg-white text-slate-700 hover:bg-slate-200 border border-slate-300">
4. SIMPKB & PKB
</button>
</div>
<!-- Service Content Display Box -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-xl overflow-hidden" id="serviceDetailContainer">
<!-- Content will be injected dynamically via JS based on user selected tab -->
</div>
</div>
</section>
<!-- 5. TOMBOL AKSI & HALAMAN PENUTUP -->
<section id="laporan" class="py-20 bg-navy text-white relative overflow-hidden border-t-4 border-gold">
<div class="max-w-5xl mx-auto px-4 text-center relative z-10">
<span class="inline-block px-4 py-1.5 rounded-full bg-gold/20 text-gold text-xs font-bold uppercase tracking-widest border border-gold/40 mb-6">
Laporan Digital – Wujud Integritas
</span>
<h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold leading-tight text-white mb-6">
Satu Data Guru & Tenaga Kependidikan<br>Provinsi Maluku
</h2>
<p class="text-slate-300 text-base sm:text-lg max-w-2xl mx-auto mb-10 font-light">
Mewujudkan akuntabilitas publik melalui sistem monitoring digital yang presisi, terintegrasi dengan Ditjen GTK, Kemendikbudristek, dan Pemprov Maluku.
</p>
<!-- Main CTA Button -->
<div class="flex flex-col sm:flex-row items-center justify-center gap-4">
<button onclick="showSatuDataModal()" class="w-full sm:w-auto px-8 py-4 bg-gold hover:bg-yellow-400 text-navy font-black text-base rounded-2xl shadow-xl transition transform hover:-translate-y-1 flex items-center justify-center gap-3">
<i class="fa-solid fa-database text-lg"></i>
<span>Profil Satu Data Dinas Pendidikan dan Kebudayaan Provinsi Maluku</span>
</button>
</div>
<div class="mt-8 flex items-center justify-center gap-6 text-slate-400 text-xs">
<span><i class="fa-solid fa-shield text-gold mr-1"></i> Bebas Biaya (100% Gratis)</span>
<span><i class="fa-solid fa-check-double text-gold mr-1"></i> Terintegrasi Dapodik</span>
<span><i class="fa-solid fa-lock text-gold mr-1"></i> Data Terjamin Rahasia</span>
</div>
</div>
</section>
<!-- FOOTER -->
<footer class="bg-navy-dark text-slate-400 py-12 border-t border-slate-800 text-xs">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
<div>
<h4 class="text-white font-bold text-sm mb-3">Unit Kerja Bidang GTK</h4>
<p class="text-slate-400 leading-relaxed">
Dinas Pendidikan dan Kebudayaan Provinsi Maluku<br>
Pemerintah Daerah Provinsi Maluku
</p>
<p class="mt-3 text-slate-500">
Sistem Manajemen Pelayanan Guru dan Tenaga Kependidikan terintegrasi.
</p>
</div>
<div>
<h4 class="text-white font-bold text-sm mb-3">Kanal Pengaduan & Layanan</h4>
<ul class="space-y-2">
<li><i class="fa-solid fa-globe text-gold mr-2"></i> Website: <a href="https://disdikbud.malukuprov.go.id/" target="_blank" class="hover:text-gold underline">disdikbud.malukuprov.go.id</a></li>
<li><i class="fa-solid fa-laptop text-gold mr-2"></i> Pengaduan: <a href="https://disdikbud.malukuprov.go.id/pengaduan" target="_blank" class="hover:text-gold underline">disdikbud.malukuprov.go.id/pengaduan</a></li>
<li><i class="fa-solid fa-bullhorn text-gold mr-2"></i> SP4N-LAPOR! & TikTok Resmi Disdikbud Maluku</li>
</ul>
</div>
<div>
<h4 class="text-white font-bold text-sm mb-3">Landasan Komitmen</h4>
<p class="text-slate-400 leading-relaxed mb-2">
"Melayani secara profesional, transparan, serta menjamin kerahasiaan dan keamanan data pengguna layanan sesuai standar regulasi nasional."
</p>
<span class="text-gold font-semibold">© 2026 Dinas Pendidikan & Kebudayaan Provinsi Maluku.</span>
</div>
</div>
</footer>
<!-- MODAL MONEV DETAIL -->
<div id="monevModal" class="fixed inset-0 z-50 bg-black/70 backdrop-blur-sm hidden items-center justify-center p-4">
<div class="bg-white rounded-2xl max-w-2xl w-full p-6 shadow-2xl border border-gold/40 relative max-h-[90vh] overflow-y-auto">
<button onclick="closeMonevModal()" class="absolute top-4 right-4 text-slate-400 hover:text-navy text-xl p-2">
<i class="fa-solid fa-xmark"></i>
</button>
<div id="monevModalContent">
<!-- Injected via JS -->
</div>
</div>
</div>
<!-- MODAL SATU DATA -->
<div id="satuDataModal" class="fixed inset-0 z-50 bg-black/70 backdrop-blur-sm hidden items-center justify-center p-4">
<div class="bg-navy text-white rounded-2xl max-w-3xl w-full p-6 sm:p-8 shadow-2xl border-2 border-gold relative max-h-[90vh] overflow-y-auto">
<button onclick="closeSatuDataModal()" class="absolute top-4 right-4 text-slate-400 hover:text-gold text-xl p-2">
<i class="fa-solid fa-xmark"></i>
</button>
<div class="flex items-center gap-3 mb-6">
<div class="w-12 h-12 rounded-xl bg-gold/20 flex items-center justify-center text-gold text-2xl font-bold border border-gold/40">
<i class="fa-solid fa-database"></i>
</div>
<div>
<span class="text-xs text-gold uppercase tracking-widest font-bold">Laporan Digital – Wujud Integritas</span>
<h3 class="text-xl sm:text-2xl font-bold">Profil Satu Data GTK Maluku</h3>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
<div class="bg-navy-light p-4 rounded-xl border border-slate-700">
<span class="text-xs text-slate-400">Total Pendidik (Guru)</span>
<p class="text-2xl font-black text-gold">9,570 Orang</p>
<span class="text-xs text-emerald-400">Terdaftar Aktif Dapodik</span>
</div>
<div class="bg-navy-light p-4 rounded-xl border border-slate-700">
<span class="text-xs text-slate-400">Tenaga Kependidikan</span>
<p class="text-2xl font-black text-gold">2,340 Orang</p>
<span class="text-xs text-emerald-400">Admin/TU/Laboran</span>
</div>
</div>
<div class="space-y-4 text-sm text-slate-300">
<h4 class="font-bold text-white border-b border-slate-700 pb-2">Status Penyaluran Tunjangan & Sertifikasi 2026:</h4>
<ul class="space-y-2">
<li class="flex justify-between items-center bg-navy-card p-3 rounded-lg">
<span>Penerima Tunjangan Profesi Guru (TPG)</span>
<span class="font-bold text-gold">5,820 Guru</span>
</li>
<li class="flex justify-between items-center bg-navy-card p-3 rounded-lg">
<span>Penerima Tunjangan Khusus 3T Maluku</span>
<span class="font-bold text-gold">1,410 Guru</span>
</li>
<li class="flex justify-between items-center bg-navy-card p-3 rounded-lg">
<span>Pemilik NUPTK Terverifikasi Kemendikbud</span>
<span class="font-bold text-gold">10,980 PTK</span>
</li>
</ul>
</div>
<div class="mt-8 pt-4 border-t border-slate-800 flex justify-end">
<button onclick="closeSatuDataModal()" class="px-6 py-2.5 bg-gold text-navy font-bold rounded-xl hover:bg-yellow-400">
Tutup Ringkasan
</button>
</div>
</div>
</div>
<script>
const DB_SOP_LIST = @json($sopList ?? []);

// Data standard 14 components for the 4 GTK Services
const serviceData = {
sertifikasi: {
code: "GTK-01",
title: "Sertifikasi Pendidik (PPG Dalam Jabatan)",
dasarHukum: "Peraturan Menteri Pendidikan, Kebudayaan, Riset, dan Teknologi Nomor 54 Tahun 2022 Tata Cara Memperoleh Sertifikat Pendidik bagi Guru dalam Jabatan",
persyaratan: [
"Guru merupakan pendidik aktif yang datanya terdaftar pada Data Pokok Pendidikan (Dapodik);",
"Memiliki akun aplikasi SIMPKB yang aktif;",
"Melampirkan ijazah dan transkrip nilai;",
"Melampirkan Surat Keputusan (SK) pengangkatan sebagai guru;",
"Memenuhi masa kerja dan persyaratan lain sesuai kuota dan ketentuan Pendidikan Profesi Guru (PPG) Dalam Jabatan yang ditetapkan oleh Ditjen GTK."
],
prosedur: [
"Guru mendaftar dan melengkapi berkas usul melalui aplikasi SIMPKB serta menyampaikan salinan berkas kepada Bidang GTK;",
"Staf Bidang GTK memverifikasi kesesuaian data guru pada Dapodik dan SIMPKB dengan persyaratan PPG Dalam Jabatan;",
"Koordinator wilayah terkait meneliti dan menyusun daftar usulan calon peserta;",
"Kepala Bidang GTK menyetujui dan menyusun surat pengantar usulan;",
"Kepala Dinas menandatangani surat pengantar usulan calon peserta PPG;",
"Staf menyampaikan/mengunggah usulan pada aplikasi SIMPKB untuk diproses lebih lanjut oleh Ditjen GTK;",
"Staf memantau hasil kelulusan dan mendokumentasikan guru yang telah memperoleh sertifikat pendidik."
],
jangkaWaktu: "Paling lama 7 (tujuh) hari kerja sejak berkas dinyatakan lengkap untuk proses pengusulan tingkat Dinas, sebelum diproses lebih lanjut oleh Direktorat Jenderal Guru dan Tenaga Kependidikan (Ditjen GTK)",
biaya: "Tidak dikenakan biaya (GRATIS)",
produk: "Surat pengantar usulan calon peserta Pendidikan Profesi Guru (PPG) Dalam Jabatan, dan sertifikat pendidik bagi guru yang dinyatakan lulus",
pengaduan: [
"Melalui konsultasi langsung di kantor Dinas Pendidikan dan Kebudayaan Provinsi Maluku",
"Layanan Pengaduan Elektronik: https://disdikbud.malukuprov.go.id/pengaduan",
"Website resmi: https://disdikbud.malukuprov.go.id/",
"SP4N-LAPOR!",
"Media Sosial (TikTok Dinas Pendidikan dan Kebudayaan Prov. Maluku)"
],
sarpras: ["1. Alat Tulis Kantor", "2. Komputer", "3. Printer"],
kompetensi: "Memiliki kemampuan berkomunikasi, dan menggunakan komputer.",
pengawasan: "Atasan langsung",
jumlahPelaksana: "1 orang",
jaminan: [
"Bersifat rahasia (data informasi pengguna layanan dijamin keamanannya dan digunakan semata-mata hanya untuk kepentingan pelayanan)",
"Melayani secara profesional sesuai dengan standar pelayanan yang berlaku",
"Sarana pelayanan dan sarana penunjang layanan menjamin/mendukung keamanan, kenyamanan, dan keselamatan pengguna layanan."
],
evaluasi: [
"Dilakukan survei kepuasan masyarakat/pegawai (SKM);",
"Dilakukan evaluasi pelayanan baik secara berkala maupun apabila diperlukan sewaktu-waktu."
]
},
nuptk: {
code: "GTK-02",
title: "Nomor Unik Pendidik dan Tenaga Kependidikan (NUPTK)",
dasarHukum: "1. Permendikbud No. 79/2015 penerbitan & pengelolaan master referensi pendidikan oleh PDSPK;\n2. Persesjen Kemendikbud No. 1/2018 Juknis NUPTK;\n3. Permendikbud No. 32/2018 SPM Pendidikan;\n4. Kepmendikbudristek No. 303/M/2022 Aturan Terbaru NUPTK.",
persyaratan: [
"Ijazah S1/D4;",
"SK Pengangkatan;",
"Kartu Tanda Penduduk (KTP);",
"Data Riwayat Mengajar terdaftar di Dapodik."
],
prosedur: [
"Pemohon menyampaikan kelengkapan data melalui Operator Dapodik sekolah;",
"Operator Dapodik menginput dan memutakhirkan data pemohon pada aplikasi Dapodik;",
"Staf Bidang GTK memverifikasi kelengkapan dan kevalidan data pada laman Verval PTK;",
"Kepala Bidang GTK menyetujui usulan penerbitan NUPTK pada aplikasi Verval PTK;",
"Staf memantau proses penerbitan NUPTK oleh Kementerian melalui Verval PTK;",
"Staf menginformasikan NUPTK yang telah terbit kepada pemohon melalui sekolah/Operator Dapodik;",
"Staf mendokumentasikan dan memutakhirkan daftar NUPTK pendidik dan tenaga kependidikan."
],
jangkaWaktu: "Paling lama 5 (lima) hari kerja sejak berkas dinyatakan lengkap untuk proses verifikasi tingkat Dinas, sebelum diproses melalui Verval PTK",
biaya: "Tidak dikenakan biaya (GRATIS)",
produk: "Nomor Unik Pendidik dan Tenaga Kependidikan (NUPTK) yang telah terbit resmi",
pengaduan: [
"Melalui konsultasi langsung di kantor Dinas Pendidikan dan Kebudayaan Provinsi Maluku",
"Layanan Pengaduan Elektronik: https://disdikbud.malukuprov.go.id/pengaduan",
"Website: https://disdikbud.malukuprov.go.id/",
"SP4N-LAPOR!",
"Media Sosial (TikTok Disdikbud Prov. Maluku)"
],
sarpras: ["1. Alat Tulis Kantor", "2. Komputer", "3. Printer"],
kompetensi: "Memiliki kemampuan berkomunikasi, dan menggunakan komputer.",
pengawasan: "Atasan langsung",
jumlahPelaksana: "1 orang",
jaminan: [
"Bersifat rahasia (data informasi pengguna layanan dijamin keamanannya dan digunakan semata-mata hanya untuk kepentingan pelayanan)",
"Melayani secara profesional sesuai dengan standar pelayanan yang berlaku",
"Sarana pelayanan mendukung keamanan, kenyamanan, dan keselamatan pengguna layanan."
],
evaluasi: [
"Dilakukan survei kepuasan masyarakat/pegawai (SKM);",
"Dilakukan evaluasi pelayanan berkala maupun sewaktu-waktu."
]
},
tunjangan: {
code: "GTK-03",
title: "Tunjangan Pendidik (TPG & Tunjangan Khusus)",
dasarHukum: "1. UU No. 20/2003 tentang Sisdiknas;\n2. PP No. 74/2008 tentang Guru;\n3. PP No. 41/2009 tentang Tunjangan Profesi Guru dan Dosen serta Tunjangan Khusus.",
persyaratan: [
"Data beban kerja mengajar (minimal 24 jam linier);",
"SK Pembagian Tugas Mengajar;",
"Sertifikat Pendidik (Serdik);",
"Data linieritas mata pelajaran."
],
prosedur: [
"Guru melengkapi data kelayakan tunjangan (beban kerja, kehadiran, linieritas) melalui Operator Dapodik;",
"Operator Dapodik menginput dan memutakhirkan data pada aplikasi Dapodik/Info GTK;",
"Staf Bidang GTK memverifikasi kelayakan calon penerima tunjangan sesuai juknis tahun berjalan;",
"Kepala Bidang GTK meneliti dan menyetujui daftar calon penerima tunjangan;",
"Kepala Dinas menandatangani surat pengesahan/usulan daftar penerima tunjangan;",
"Staf menyampaikan daftar penerima tunjangan kepada Kementerian (melalui Info GTK) dan BPKAD Provinsi Maluku untuk pencairan;",
"Staf mendokumentasikan dan memutakhirkan data penerima tunjangan per periode."
],
jangkaWaktu: "Paling lama 10 (sepuluh) hari kerja per periode verifikasi sebelum diproses lebih lanjut oleh Kementerian/BPKAD",
biaya: "Tidak dikenakan biaya (GRATIS)",
produk: "Surat pengesahan/usulan daftar penerima tunjangan profesi/tunjangan khusus guru yang ditandatangani Kepala Dinas",
pengaduan: [
"Konsultasi langsung di Kantor Disdikbud Provinsi Maluku",
"Layanan Pengaduan Elektronik: https://disdikbud.malukuprov.go.id/pengaduan",
"SP4N-LAPOR!",
"TikTok Dinas Pendidikan dan Kebudayaan Prov. Maluku"
],
sarpras: ["1. Alat Tulis Kantor", "2. Komputer", "3. Printer"],
kompetensi: "Memiliki kemampuan berkomunikasi, dan menggunakan komputer.",
pengawasan: "Atasan langsung",
jumlahPelaksana: "1 orang",
jaminan: [
"Bersifat rahasia (keamanan data dijamin sepenuhnya)",
"Melayani secara profesional sesuai standar pelayanan",
"Mendukung kenyamanan dan keselamatan pengguna layanan"
],
evaluasi: [
"Survei Kepuasan Masyarakat/Pegawai (SKM)",
"Evaluasi berkala kinerja pelayanan"
]
},
simpkb: {
code: "GTK-04",
title: "Fasilitasi SIMPKB (Pengembangan Keprofesian Berkelanjutan)",
dasarHukum: "1. UU No. 20/2003 Sisdiknas;\n2. PP No. 19/2017 Perubahan atas PP No. 74/2008 tentang Guru;\n3. Perpres No. 95/2018 tentang SPBE.",
persyaratan: [
"NUPTK terdaftar;",
"Data akun SIMPKB / Platfrom Merdeka Mengajar (PMM)."
],
prosedur: [
"Guru mengajukan permohonan fasilitasi/pendampingan akun SIMPKB (aktivasi akun, reset akses, atau kendala teknis);",
"Staf Bidang GTK memverifikasi identitas dan status kepegawaian pemohon pada Dapodik;",
"Koordinator wilayah terkait menelaah dan menindaklanjuti permohonan (aktivasi/reset akun/koordinasi Ditjen GTK);",
"Staf mendampingi guru mengakses dan menyelesaikan aktivitas PKB pada SIMPKB/PMM;",
"Kepala Bidang GTK memantau rekapitulasi capaian PKB guru pada wilayah kerja Dinas secara berkala;",
"Staf mendokumentasikan hasil fasilitasi dan memutakhirkan rekapitulasi aktivitas PKB guru."
],
jangkaWaktu: "Paling lama 5 (lima) hari kerja untuk fasilitasi/pendampingan akun dan aktivitas SIMPKB",
biaya: "Tidak dikenakan biaya (GRATIS)",
produk: "Akun SIMPKB aktif dan aktivitas Pengembangan Keprofesian Berkelanjutan (PKB) guru yang terfasilitasi",
pengaduan: [
"Konsultasi langsung di kantor Dinas Pendidikan dan Kebudayaan Provinsi Maluku",
"Layanan Pengaduan Elektronik: https://disdikbud.malukuprov.go.id/pengaduan",
"Website: https://disdikbud.malukuprov.go.id/",
"SP4N-LAPOR!",
"Media Sosial TikTok Disdikbud Prov. Maluku"
],
sarpras: ["1. Alat Tulis Kantor", "2. Komputer", "3. Printer"],
kompetensi: "Memiliki kemampuan berkomunikasi, dan menggunakan komputer.",
pengawasan: "Atasan langsung",
jumlahPelaksana: "4 orang",
jaminan: [
"Bersifat rahasia (data informasi dijamin keamanannya)",
"Melayani secara profesional sesuai standar",
"Sarana penunjang mendukung keamanan dan kenyamanan"
],
evaluasi: [
"Survei Kepuasan Masyarakat (SKM)",
"Evaluasi berkala secara sistematis"
]
}
};
function switchServiceTab(key) {
const keys = ['sertifikasi', 'nuptk', 'tunjangan', 'simpkb'];
keys.forEach(k => {
const btn = document.getElementById(`tab-${k}`);
if (k === key) {
btn.className = "px-5 py-2.5 rounded-xl text-sm font-bold transition shadow-sm bg-navy text-gold border border-gold";
} else {
btn.className = "px-5 py-2.5 rounded-xl text-sm font-bold transition shadow-sm bg-white text-slate-700 hover:bg-slate-200 border border-slate-300";
}
});
const data = serviceData[key];
const container = document.getElementById('serviceDetailContainer');
container.innerHTML = `
<div class="bg-navy p-6 text-white border-b border-gold flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
<div>
<span class="text-xs font-bold text-gold uppercase tracking-wider block">Unit Kerja: Bidang GTK</span>
<h3 class="text-xl sm:text-2xl font-bold">${data.title}</h3>
</div>
<div class="flex items-center gap-2">
<span class="px-3 py-1 bg-emerald-500/20 text-emerald-400 font-bold text-xs rounded-full border border-emerald-500/40">
${data.biaya}
</span>
<span class="px-3 py-1 bg-amber-500/20 text-amber-300 font-bold text-xs rounded-full border border-amber-500/40">
<i class="fa-solid fa-clock mr-1"></i> SLA: ${data.jangkaWaktu.split(' ')[2] || '5-10'} Hari Kerja
</span>
</div>
</div>
<div class="p-6 md:p-8 space-y-6">
<!-- Dasar Hukum & Produk -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="bg-slate-50 p-4 rounded-xl border border-slate-200">
<h4 class="font-bold text-navy text-sm mb-2 flex items-center gap-2">
<i class="fa-solid fa-scale-balanced text-gold"></i> 2. Dasar Hukum
</h4>
<p class="text-xs text-slate-700 whitespace-pre-line leading-relaxed">${data.dasarHukum}</p>
</div>
<div class="bg-slate-50 p-4 rounded-xl border border-slate-200">
<h4 class="font-bold text-navy text-sm mb-2 flex items-center gap-2">
<i class="fa-solid fa-award text-gold"></i> 7. Produk Pelayanan
</h4>
<p class="text-xs text-slate-700 leading-relaxed font-semibold text-navy">${data.produk}</p>
</div>
</div>
<!-- Persyaratan & Prosedur -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="bg-slate-50 p-4 rounded-xl border border-slate-200">
<h4 class="font-bold text-navy text-sm mb-2 flex items-center gap-2">
<i class="fa-solid fa-list-check text-gold"></i> 3. Persyaratan Pelayanan
</h4>
<ul class="space-y-2 text-xs text-slate-700">
${data.persyaratan.map(p => `<li class="flex items-start gap-2"><i class="fa-solid fa-check text-emerald-600 mt-0.5"></i> <span>${p}</span></li>`).join('')}
</ul>
</div>
<div class="bg-slate-50 p-4 rounded-xl border border-slate-200">
<h4 class="font-bold text-navy text-sm mb-2 flex items-center gap-2">
<i class="fa-solid fa-diagram-project text-gold"></i> 4. Sistem, Mekanisme, dan Prosedur
</h4>
<ol class="space-y-2 text-xs text-slate-700">
${data.prosedur.map((pr, idx) => `<li class="flex items-start gap-2"><span class="font-bold text-navy bg-amber-100 text-[10px] w-4 h-4 rounded-full flex items-center justify-center shrink-0 mt-0.5">${idx+1}</span> <span>${pr}</span></li>`).join('')}
</ol>
</div>
</div>
<!-- Detail Pelaksanaan & Sarpras Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
<div class="p-3 bg-white rounded-xl border border-slate-200">
<span class="text-[11px] text-slate-500 font-bold block">5. Jangka Waktu Penyelesaian</span>
<p class="text-xs font-medium text-slate-800 mt-1">${data.jangkaWaktu}</p>
</div>
<div class="p-3 bg-white rounded-xl border border-slate-200">
<span class="text-[11px] text-slate-500 font-bold block">12. Jumlah Pelaksana</span>
<p class="text-xs font-bold text-navy mt-1"><i class="fa-solid fa-user-gear mr-1 text-gold"></i> ${data.jumlahPelaksana}</p>
</div>
<div class="p-3 bg-white rounded-xl border border-slate-200">
<span class="text-[11px] text-slate-500 font-bold block">10. Kompetensi Pelaksana</span>
<p class="text-xs text-slate-700 mt-1">${data.kompetensi}</p>
</div>
<div class="p-3 bg-white rounded-xl border border-slate-200">
<span class="text-[11px] text-slate-500 font-bold block">11. Pengawasan Internal</span>
<p class="text-xs text-slate-700 mt-1">${data.pengawasan}</p>
</div>
</div>
<!-- Pengaduan & Jaminan Pelayanan -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t pt-4">
<div>
<h4 class="font-bold text-navy text-sm mb-2"><i class="fa-solid fa-headset text-gold mr-1"></i> 8. Penanganan Pengaduan, Saran & Masukan</h4>
<ul class="space-y-1.5 text-xs text-slate-600">
${data.pengaduan.map(peng => `<li class="flex items-center gap-1.5"><i class="fa-solid fa-angle-right text-gold"></i> ${peng}</li>`).join('')}
</ul>
</div>
<div>
<h4 class="font-bold text-navy text-sm mb-2"><i class="fa-solid fa-shield-halved text-gold mr-1"></i> 13 & 14. Jaminan & Evaluasi Kinerja</h4>
<p class="text-xs text-slate-600 font-semibold mb-1">Jaminan Pelayanan:</p>
<ul class="space-y-1 text-xs text-slate-600 mb-3">
${data.jaminan.map(j => `<li class="flex items-start gap-1"><i class="fa-solid fa-shield-cat text-emerald-600 mt-0.5"></i> ${j}</li>`).join('')}
</ul>
<p class="text-xs text-slate-600 font-semibold mb-1">Evaluasi Kinerja:</p>
<ul class="space-y-1 text-xs text-slate-600">
${data.evaluasi.map(e => `<li class="flex items-start gap-1"><i class="fa-solid fa-chart-line text-blue-600 mt-0.5"></i> ${e}</li>`).join('')}
</ul>
</div>
</div>
<!-- Official SOP Download & Input File Permohonan (Database CMS Dikbud) -->
<div class="border-t-2 border-slate-200/80 pt-6 mt-6 space-y-4">
${(() => {
    const masterSop = DB_SOP_LIST && DB_SOP_LIST[data.code];
    if (masterSop && masterSop.official_sop_file) {
        return `
        <div class="bg-navy text-white p-4 rounded-xl border border-gold/40 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 shadow-md">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-gold text-navy flex items-center justify-center font-extrabold text-sm shrink-0 shadow">
                    PDF
                </div>
                <div>
                    <p class="text-[10px] font-bold text-gold uppercase tracking-wider">Dokumen Resmi SOP Tersedia</p>
                    <h5 class="font-bold text-xs sm:text-sm text-white">${masterSop.official_sop_name || 'Dokumen SOP 14 Komponen ' + data.code}</h5>
                    ${masterSop.official_sop_size ? `<p class="text-[11px] text-slate-300">Ukuran file: ${masterSop.official_sop_size}</p>` : ''}
                </div>
            </div>
            <a href="${masterSop.official_sop_file}" target="_blank" rel="noreferrer" class="px-4 py-2 bg-gold hover:bg-yellow-400 text-navy font-bold text-xs rounded-lg transition-all flex items-center gap-1.5 shrink-0 shadow">
                <i class="fa-solid fa-download"></i>
                <span>Unduh Dokumen SOP (PDF)</span>
            </a>
        </div>
        `;
    }
    return '';
})()}

    <div class="bg-gradient-to-br from-amber-50/60 to-slate-50 p-5 rounded-2xl border-2 border-dashed border-amber-300 space-y-4">
        <div class="flex items-start justify-between gap-2 border-b border-amber-200 pb-3">
            <div>
                <h4 class="font-bold text-navy text-sm flex items-center gap-2">
                    <i class="fa-solid fa-cloud-arrow-up text-gold"></i>
                    <span>Formulir & Input File Persyaratan Layanan (${data.code})</span>
                </h4>
                <p class="text-xs text-slate-600 mt-0.5">
                    Unggah berkas / kelengkapan persyaratan SOP Anda langsung ke sistem database Dinas Pendidikan Provinsi Maluku.
                </p>
            </div>
            <span class="px-2.5 py-1 bg-amber-100 text-navy border border-amber-300 rounded-full text-[10px] font-extrabold uppercase shrink-0">
                Database Terintegrasi
            </span>
        </div>

        <div id="gtkUploadAlert" class="hidden"></div>

        <form onsubmit="submitGtkSopForm(event, '${data.code}', '${data.title}')" class="space-y-3.5">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                <div>
                    <label class="block font-bold text-navy mb-1">
                        Nama Pemohon / Pengusul <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="sender_name" required placeholder="Contoh: Bpk. Ahmad Dahlan, S.Pd" class="w-full px-3 py-2 bg-white rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-gold text-xs text-slate-800">
                </div>
                <div>
                    <label class="block font-bold text-navy mb-1">
                        No. HP / WhatsApp <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="phone" required placeholder="Contoh: 081234567890" class="w-full px-3 py-2 bg-white rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-gold text-xs text-slate-800">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                <div>
                    <label class="block font-bold text-navy mb-1">
                        Asal Sekolah / Satuan Pendidikan
                    </label>
                    <input type="text" name="instance" placeholder="Contoh: SMAN 2 Ambon" class="w-full px-3 py-2 bg-white rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-gold text-xs text-slate-800">
                </div>
                <div>
                    <label class="block font-bold text-navy mb-1">
                        Email Pemohon (Opsional)
                    </label>
                    <input type="email" name="email" placeholder="pemohon@email.com" class="w-full px-3 py-2 bg-white rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-gold text-xs text-slate-800">
                </div>
            </div>

            <div>
                <label class="block font-bold text-navy mb-1 text-xs">
                    Pilih File Dokumen / Berkas Persyaratan <span class="text-red-500">*</span>
                </label>
                <input type="file" name="document_file" required accept=".pdf,.doc,.docx,.zip,.rar,.jpg,.jpeg,.png" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-navy file:text-gold hover:file:bg-slate-800 file:cursor-pointer p-1.5 bg-white border border-slate-300 rounded-xl">
                <p class="text-[10px] text-slate-500 mt-1">
                    Format: PDF, Word (DOC/DOCX), ZIP, JPG, PNG (Maksimal 25 MB).
                </p>
            </div>

            <div>
                <label class="block font-bold text-navy mb-1 text-xs">
                    Catatan / Rincian Berkas (Opsional)
                </label>
                <textarea name="notes" rows="2" placeholder="Tuliskan keterangan berkas atau kelengkapan permohonan..." class="w-full px-3 py-2 bg-white rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-gold text-xs text-slate-800"></textarea>
            </div>

            <div class="flex items-center justify-end gap-2 pt-1">
                <button type="submit" class="px-5 py-2.5 bg-gold hover:bg-yellow-400 text-navy font-extrabold text-xs rounded-xl shadow-md transition-all flex items-center gap-2">
                    <i class="fa-solid fa-paper-plane"></i>
                    <span>Unggah & Kirim Berkas SOP</span>
                </button>
            </div>
        </form>
    </div>
</div>
</div>
`;
}

async function submitGtkSopForm(e, serviceCode, serviceTitle) {
    e.preventDefault();
    const form = e.target;
    const fileInput = form.querySelector('input[type="file"]');
    if (!fileInput.files || !fileInput.files[0]) {
        alert("Silakan pilih file dokumen terlebih dahulu.");
        return;
    }
    const btn = form.querySelector('button[type="submit"]');
    const oldHtml = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin mr-1"></i> Mengunggah Berkas...';

    const alertBox = document.getElementById('gtkUploadAlert');

    try {
        const formData = new FormData(form);
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('service_code', serviceCode);
        formData.append('service_title', serviceTitle);
        formData.append('bidang', 'gtk');

        const res = await fetch('/layanan/sop/upload', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            },
            body: formData
        });

        const data = await res.json();
        if (res.ok && data.success) {
            alertBox.className = "p-3 bg-emerald-50 border border-emerald-300 rounded-xl text-xs text-emerald-800";
            alertBox.innerHTML = `<strong>Unggah Berkas Berhasil!</strong><p>${data.message || 'Berkas permohonan berhasil dikirim ke database!'}</p>`;
            alertBox.classList.remove('hidden');
            form.reset();
        } else {
            const errs = data.errors ? Object.values(data.errors).flat().join(", ") : (data.message || "Gagal mengunggah berkas");
            alertBox.className = "p-3 bg-red-50 border border-red-300 rounded-xl text-xs text-red-800";
            alertBox.innerHTML = `<strong>Gagal Mengunggah Berkas:</strong><p>${errs}</p>`;
            alertBox.classList.remove('hidden');
        }
    } catch(err) {
        console.error(err);
        alertBox.className = "p-3 bg-red-50 border border-red-300 rounded-xl text-xs text-red-800";
        alertBox.innerHTML = `<strong>Kesalahan Jaringan:</strong><p>Gagal menghubungi server.</p>`;
        alertBox.classList.remove('hidden');
    } finally {
        btn.disabled = false;
        btn.innerHTML = oldHtml;
    }
}
function openMonevModal(type) {
const modal = document.getElementById('monevModal');
const content = document.getElementById('monevModalContent');
let title = "";
let description = "";
let dataTable = [];
if(type === 'SMA') {
title = "Detail Laporan Monev - Satuan Pendidikan SMA";
description = "Capaian verifikasi berkas GTK, pemutakhiran Dapodik, dan penyaluran TPG SMA di Kabupaten/Kota se-Maluku.";
dataTable = [
{ wilayah: "Kota Ambon", sekolah: 38, guru: 1240, status: "100% Selesai" },
{ wilayah: "Kab. Maluku Tengah", sekolah: 52, guru: 1420, status: "98% Selesai" },
{ wilayah: "Kab. Seram Bagian Barat", sekolah: 34, guru: 820, status: "96% Selesai" },
{ wilayah: "Kab. Maluku Tenggara", sekolah: 28, guru: 640, status: "95% Selesai" },
{ wilayah: "Kab. Kepulauan Aru", sekolah: 22, guru: 480, status: "92% Verifikasi" }
];
} else if(type === 'SMK') {
title = "Detail Laporan Monev - Satuan Pendidikan SMK";
description = "Evaluasi ketersediaan guru produktif kejuruan, sertifikasi keahlian, dan penerbitan NUPTK SMK.";
dataTable = [
{ wilayah: "Kota Ambon", sekolah: 22, guru: 850, status: "100% Selesai" },
{ wilayah: "Kab. Maluku Tengah", sekolah: 26, guru: 710, status: "97% Selesai" },
{ wilayah: "Kota Tual", sekolah: 12, guru: 340, status: "96% Selesai" },
{ wilayah: "Kab. Buru", sekolah: 18, guru: 420, status: "94% Selesai" },
{ wilayah: "Kab. Maluku Barat Daya", sekolah: 10, guru: 210, status: "90% Verifikasi" }
];
} else {
title = "Detail Laporan Monev - Satuan Pendidikan Negeri & Swasta";
description = "Ringkasan kesetaraan fasilitasi SIMPKB, validasi NUPTK, dan layanan bantuan teknis GTK Negeri & Swasta.";
dataTable = [
{ wilayah: "SMA Negeri (Seluruh Maluku)", sekolah: 210, guru: 5100, status: "Terintegrasi 99%" },
{ wilayah: "SMA Swasta (Seluruh Maluku)", sekolah: 74, guru: 1320, status: "Terintegrasi 95%" },
{ wilayah: "SMK Negeri (Seluruh Maluku)", sekolah: 86, guru: 2400, status: "Terintegrasi 98%" },
{ wilayah: "SMK Swasta (Seluruh Maluku)", sekolah: 32, guru: 750, status: "Terintegrasi 92%" },
{ wilayah: "SLB Negeri & Swasta", sekolah: 23, guru: 340, status: "Terintegrasi 96%" }
];
}
content.innerHTML = `
<div class="border-b pb-4 mb-4">
<span class="px-2.5 py-1 bg-amber-100 text-navy font-bold text-xs rounded-md uppercase">Laporan Detail Monev</span>
<h3 class="text-xl font-bold text-navy mt-2">${title}</h3>
<p class="text-xs text-slate-600 mt-1">${description}</p>
</div>
<div class="overflow-x-auto mb-4">
<table class="w-full text-xs text-left text-slate-700 border border-slate-200 rounded-lg overflow-hidden">
<thead class="bg-navy text-white uppercase text-[10px]">
<tr>
<th class="p-3">Wilayah / Target</th>
<th class="p-3 text-center">Jumlah Satuan</th>
<th class="p-3 text-center">Jumlah GTK</th>
<th class="p-3 text-center">Status Verifikasi</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-200">
${dataTable.map(item => `
<tr class="hover:bg-slate-50">
<td class="p-3 font-semibold text-navy">${item.wilayah}</td>
<td class="p-3 text-center">${item.sekolah}</td>
<td class="p-3 text-center font-medium">${item.guru}</td>
<td class="p-3 text-center"><span class="px-2 py-0.5 bg-emerald-100 text-emerald-800 font-bold rounded-full">${item.status}</span></td>
</tr>
`).join('')}
</tbody>
</table>
</div>
<div class="bg-slate-100 p-3 rounded-lg text-xs text-slate-600 flex items-center gap-2">
<i class="fa-solid fa-info-circle text-navy text-sm"></i>
<span>Data hasil pemantauan telah disahkan oleh Koordinator Wilayah GTK Dinas Pendidikan dan Kebudayaan Provinsi Maluku.</span>
</div>
`;
modal.classList.remove('hidden');
modal.classList.add('flex');
}
function closeMonevModal() {
const modal = document.getElementById('monevModal');
modal.classList.add('hidden');
modal.classList.remove('flex');
}
function showSatuDataModal() {
const modal = document.getElementById('satuDataModal');
modal.classList.remove('hidden');
modal.classList.add('flex');
}
function closeSatuDataModal() {
const modal = document.getElementById('satuDataModal');
modal.classList.add('hidden');
modal.classList.remove('flex');
}
window.addEventListener('DOMContentLoaded', () => {
// Render default tab
switchServiceTab('sertifikasi');
// Mobile menu toggle
const mobileBtn = document.getElementById('mobileMenuBtn');
const mobileMenu = document.getElementById('mobileMenu');
if(mobileBtn) {
mobileBtn.addEventListener('click', () => {
mobileMenu.classList.toggle('hidden');
});
}
// 1. Line Chart: Rating Produk Layanan
const ctxLine = document.getElementById('lineChartRating').getContext('2d');
new Chart(ctxLine, {
type: 'line',
data: {
labels: ['Triwulan I 2025', 'Triwulan II 2025', 'Triwulan III 2025', 'Triwulan IV 2025', 'Triwulan I 2026'],
datasets: [{
label: 'Indeks Kepuasan Layanan (SKM)',
data: [4.62, 4.70, 4.78, 4.82, 4.88],
borderColor: '#D4AF37',
backgroundColor: 'rgba(212, 175, 55, 0.15)',
borderWidth: 3,
fill: true,
tension: 0.35,
pointBackgroundColor: '#0A192F',
pointBorderColor: '#D4AF37',
pointRadius: 5
}]
},
options: {
responsive: true,
maintainAspectRatio: false,
plugins: {
legend: { display: true, position: 'top' },
tooltip: {
callbacks: {
label: function(context) { return ` Rating SKM: ${context.raw} / 5.00`; }
}
}
},
scales: {
y: {
min: 4.0,
max: 5.0,
grid: { color: 'rgba(0,0,0,0.05)' }
},
x: { grid: { display: false } }
}
}
});
// 2. Bar Chart: Top Produk Layanan
const ctxBar = document.getElementById('barChartProduk').getContext('2d');
new Chart(ctxBar, {
type: 'bar',
data: {
labels: ['Sertifikasi PPG', 'NUPTK Baru', 'Tunjangan Profesi', 'Aktivasi SIMPKB'],
datasets: [{
label: 'Jumlah Usulan Diproses',
data: [2450, 1890, 5820, 3100],
backgroundColor: [
'#0A192F',
'#112240',
'#D4AF37',
'#233554'
],
borderRadius: 8,
borderWidth: 1,
borderColor: '#0A192F'
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
grid: { color: 'rgba(0,0,0,0.05)' }
},
x: { grid: { display: false } }
}
}
});
});
</script>
</body>
</html>