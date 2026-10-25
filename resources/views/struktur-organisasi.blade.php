<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi | Disdikbud Provinsi Maluku</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- ECharts for Data Visualization -->
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.5.0/dist/echarts.min.js"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        navy: '#003A8F',
                        lightblue: '#1F6ED4',
                        gold: '#D4AF37',
                        goldlight: '#F3D053',
                    },
                    boxShadow: {
                        'glow': '0 0 15px rgba(212, 175, 55, 0.5)',
                        'card': '0 10px 30px -5px rgba(0, 58, 143, 0.1)',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #1F6ED4;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #003A8F;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .hero-pattern {
            background-color: #003A8F;
            background-image: radial-gradient(circle at top right, #1F6ED4 0%, transparent 40%),
                              radial-gradient(circle at bottom left, rgba(212, 175, 55, 0.15) 0%, transparent 30%);
        }
    </style>
</head>
<body class="antialiased text-slate-800">
    <!-- Top Government & Navigation Bar -->
    <nav class="bg-slate-900 border-b border-slate-800 text-white sticky top-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex flex-col sm:flex-row items-center justify-between gap-3">
            <div class="flex items-center gap-3">
                <a href="{{ url('/') }}" class="flex items-center gap-2 text-slate-300 hover:text-white transition-colors group">
                    <svg class="w-4 h-4 text-gold group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span class="text-xs font-bold text-gold uppercase tracking-wider">Kembali ke Beranda</span>
                </a>
                <span class="text-slate-600 hidden sm:inline">|</span>
                <a href="{{ url('/standar-pelayanan') }}" class="text-xs font-semibold text-slate-300 hover:text-white transition-colors hidden sm:inline">
                    Standar Pelayanan
                </a>
            </div>
            <div class="flex items-center gap-2 text-xs text-slate-300">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span>Pemerintah Provinsi Maluku</span>
            </div>
        </div>
    </nav>

    <!-- Hero Section (Tanpa Logo, Background Biru Tua + Aksen Emas) -->
    <header class="relative hero-pattern text-white min-h-[50vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        
        <div class="relative z-10 container mx-auto px-6 py-20 text-center">
            <span class="inline-block py-1 px-3 rounded-full bg-gold/20 border border-gold/50 text-gold font-semibold text-sm tracking-wider uppercase mb-6 shadow-glow">
                {{ $profil->header_badge ?? 'Dashboard Informasi' }}
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight mb-4 drop-shadow-lg">
                {{ $profil->header_title ?? 'Struktur Organisasi' }}
            </h1>
            <h2 class="text-2xl md:text-3xl font-light text-blue-100 max-w-3xl mx-auto border-t border-white/20 pt-4 mt-2">
                {{ $profil->header_subtitle ?? 'Dinas Pendidikan dan Kebudayaan Provinsi Maluku' }}
            </h2>
            <div class="mt-10 flex justify-center">
                <a href="#charts" class="animate-bounce inline-flex items-center justify-center w-12 h-12 rounded-full bg-white/10 hover:bg-white/20 transition-colors text-gold border border-white/20">
                    <i class="fas fa-chevron-down text-xl"></i>
                </a>
            </div>
        </div>
    </header>

    <!-- 3 Kegiatan Utama Section -->
    <section class="container mx-auto px-6 -mt-16 relative z-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="glass-panel p-8 rounded-2xl shadow-card transform hover:-translate-y-2 transition-all duration-300 border-t-4 border-t-lightblue group">
                <div class="w-14 h-14 rounded-xl bg-lightblue/10 text-lightblue flex items-center justify-center text-2xl mb-6 group-hover:bg-lightblue group-hover:text-white transition-colors duration-300">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3 class="text-xl font-bold text-navy mb-3">Peningkatan Mutu Pendidikan</h3>
                <p class="text-slate-600 leading-relaxed text-sm">
                    Pengelolaan dan standarisasi pendidikan menengah (SMA/SMK) serta pendidikan layanan khusus (SLB) secara komprehensif.
                </p>
            </div>

            <!-- Card 2 -->
            <div class="glass-panel p-8 rounded-2xl shadow-card transform hover:-translate-y-2 transition-all duration-300 border-t-4 border-t-gold group">
                <div class="w-14 h-14 rounded-xl bg-gold/10 text-gold flex items-center justify-center text-2xl mb-6 group-hover:bg-gold group-hover:text-navy transition-colors duration-300">
                    <i class="fas fa-landmark"></i>
                </div>
                <h3 class="text-xl font-bold text-navy mb-3">Pelestarian Kebudayaan</h3>
                <p class="text-slate-600 leading-relaxed text-sm">
                    Menjaga, merawat, dan mempromosikan tradisi, sejarah, kesenian, serta manajemen cagar budaya daerah Maluku.
                </p>
            </div>

            <!-- Card 3 -->
            <div class="glass-panel p-8 rounded-2xl shadow-card transform hover:-translate-y-2 transition-all duration-300 border-t-4 border-t-navy group">
                <div class="w-14 h-14 rounded-xl bg-navy/10 text-navy flex items-center justify-center text-2xl mb-6 group-hover:bg-navy group-hover:text-white transition-colors duration-300">
                    <i class="fas fa-network-wired"></i>
                </div>
                <h3 class="text-xl font-bold text-navy mb-3">Tata Kelola & Akuntabilitas</h3>
                <p class="text-slate-600 leading-relaxed text-sm">
                    Meningkatkan kapasitas aparatur, kepegawaian, serta memastikan transparansi dan integritas administrasi publik.
                </p>
            </div>
        </div>
    </section>

    @if(!empty($profil->bagan_image) || !empty($profil->file_path))
    <!-- Bagan Resmi & Dokumen SK Section (Tampil saat diunggah dari CMS) -->
    <section class="container mx-auto px-6 pt-16">
        <div class="bg-white rounded-3xl p-8 lg:p-12 shadow-card border border-slate-100">
            <div class="text-center max-w-3xl mx-auto mb-10">
                <span class="inline-block py-1 px-3 rounded-full bg-gold/15 text-yellow-800 border border-gold/30 text-xs font-bold uppercase tracking-wider mb-3">
                    Dokumentasi Resmi
                </span>
                <h2 class="text-2xl md:text-3xl font-bold text-navy mb-3">Bagan Resmi &amp; Keputusan Struktur Organisasi</h2>
                <div class="w-20 h-1 bg-gold mx-auto rounded-full mb-4"></div>
                <p class="text-slate-500 text-sm">Dokumen dan bagan skematik resmi Dinas Pendidikan dan Kebudayaan Provinsi Maluku.</p>
            </div>

            <div class="grid grid-cols-1 {{ (!empty($profil->bagan_image) && !empty($profil->file_path)) ? 'lg:grid-cols-12' : '' }} gap-8 items-center">
                @if(!empty($profil->bagan_image))
                <div class="{{ !empty($profil->file_path) ? 'lg:col-span-8' : 'w-full' }} space-y-4">
                    <div class="rounded-2xl border border-slate-200 overflow-hidden bg-slate-50 relative group shadow-sm">
                        <img src="{{ asset($profil->bagan_image) }}" alt="Bagan Struktur Organisasi Resmi" class="w-full max-h-[600px] object-contain mx-auto p-4">
                        <div class="absolute inset-0 bg-navy/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center p-4">
                            <a href="{{ asset($profil->bagan_image) }}" target="_blank" class="px-5 py-2.5 bg-white text-navy font-bold rounded-xl shadow-lg hover:bg-gold hover:text-white transition-all text-sm flex items-center gap-2">
                                <i class="fas fa-search-plus"></i> Lihat Bagan Resolusi Penuh
                            </a>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-xs text-slate-500 px-2">
                        <span><i class="fas fa-info-circle text-lightblue mr-1"></i> Klik gambar atau tombol untuk memperbesar bagan</span>
                        <a href="{{ asset($profil->bagan_image) }}" target="_blank" download class="font-bold text-navy hover:text-gold transition-colors flex items-center gap-1">
                            <i class="fas fa-download"></i> Unduh Gambar Bagan
                        </a>
                    </div>
                </div>
                @endif

                @if(!empty($profil->file_path))
                <div class="{{ !empty($profil->bagan_image) ? 'lg:col-span-4' : 'max-w-md mx-auto w-full' }}">
                    <div class="p-6 rounded-2xl bg-gradient-to-br from-navy to-lightblue text-white shadow-card space-y-5">
                        <div class="w-14 h-14 rounded-2xl bg-white/10 flex items-center justify-center text-gold text-2xl border border-white/20">
                            <i class="fas fa-file-pdf"></i>
                        </div>
                        <div>
                            <span class="text-[11px] font-bold text-gold uppercase tracking-wider">SK Penetapan Resmi</span>
                            <h4 class="text-lg font-bold text-white mt-1 leading-snug">{{ $profil->file_name ?? 'Surat Keputusan Struktur Organisasi' }}</h4>
                            <p class="text-xs text-blue-100 mt-2">Ukuran berkas: {{ $profil->file_size ?? 'Dokumen PDF' }}</p>
                        </div>
                        <div class="pt-2">
                            <a href="{{ asset($profil->file_path) }}" target="_blank" download class="w-full py-3 px-4 bg-gold hover:bg-goldlight text-navy font-bold rounded-xl shadow-md transition-all flex items-center justify-center gap-2 text-sm">
                                <i class="fas fa-download"></i> Unduh Dokumen SK
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    @endif

    <!-- Grafik Dashboard Section -->
    <section id="charts" class="container mx-auto px-6 py-20">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-navy mb-4">Grafik Organisasi Disdikbud</h2>
            <div class="w-24 h-1 bg-gold mx-auto rounded-full"></div>
            <p class="text-slate-500 mt-4 max-w-2xl mx-auto">Visualisasi hierarki dan distribusi unit kerja berdasarkan Peraturan Gubernur mengenai Organisasi Perangkat Daerah Provinsi Maluku.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Line/Tree Chart (Struktur Organisasi) -->
            <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-card border border-slate-100 flex flex-col">
                <div class="flex items-center justify-between mb-6 border-b border-slate-100 pb-4">
                    <h3 class="text-lg font-bold text-navy flex items-center">
                        <i class="fas fa-project-diagram text-lightblue mr-3"></i> 
                        Hierarki Struktur Organisasi (Line Chart)
                    </h3>
                    <span class="text-xs font-semibold bg-slate-100 text-slate-500 py-1 px-3 rounded-full">Zoomable</span>
                </div>
                <div id="treeChart" class="w-full flex-grow min-h-[500px]"></div>
            </div>

            <!-- Bar Chart (Top Struktur) -->
            <div class="bg-white p-6 rounded-2xl shadow-card border border-slate-100 flex flex-col">
                <div class="flex items-center justify-between mb-6 border-b border-slate-100 pb-4">
                    <h3 class="text-lg font-bold text-navy flex items-center">
                        <i class="fas fa-chart-bar text-gold mr-3"></i> 
                        Distribusi Unit Kerja (Bar Chart)
                    </h3>
                </div>
                <div id="barChart" class="w-full flex-grow min-h-[400px] lg:min-h-[500px]"></div>
            </div>
        </div>
    </section>

    <!-- Rincian Struktur Organisasi -->
    <section class="bg-slate-100 py-20 border-t border-slate-200">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-navy mb-4">Rincian Hierarki Unit Kerja</h2>
                <div class="w-24 h-1 bg-lightblue mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Unit 1 -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition-shadow relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-navy"></div>
                    <div class="flex items-center mb-4">
                        <div class="w-8 h-8 rounded-full bg-navy/10 text-navy font-bold flex items-center justify-center mr-3">1</div>
                        <h4 class="font-bold text-lg text-slate-800">Kepala Dinas</h4>
                    </div>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Pucuk pimpinan yang mengoordinasikan seluruh perumusan kebijakan teknis, penyelenggaraan urusan pendidikan menengah, layanan khusus, dan pengelolaan kebudayaan di Provinsi Maluku.
                    </p>
                </div>

                <!-- Unit 2 -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition-shadow relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-lightblue"></div>
                    <div class="flex items-center mb-4">
                        <div class="w-8 h-8 rounded-full bg-lightblue/10 text-lightblue font-bold flex items-center justify-center mr-3">2</div>
                        <h4 class="font-bold text-lg text-slate-800">Sekretariat</h4>
                    </div>
                    <p class="text-slate-600 text-sm leading-relaxed mb-3">
                        Mengoordinasikan urusan administratif, keuangan, dan tata kelola sumber daya internal.
                    </p>
                    <ul class="text-sm text-slate-500 space-y-2 list-disc pl-5">
                        <li>Subbag Perencanaan dan Evaluasi</li>
                        <li>Subbag Keuangan</li>
                        <li>Subbag Umum dan Kepegawaian</li>
                    </ul>
                </div>

                <!-- Unit 3 -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition-shadow relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-gold"></div>
                    <div class="flex items-center mb-4">
                        <div class="w-8 h-8 rounded-full bg-gold/20 text-yellow-700 font-bold flex items-center justify-center mr-3">3</div>
                        <h4 class="font-bold text-lg text-slate-800">Bidang Pembinaan SMA</h4>
                    </div>
                    <p class="text-slate-600 text-sm leading-relaxed mb-3">
                        Menjalankan fungsi pengawasan dan tata kelola SMA negeri maupun swasta.
                    </p>
                    <ul class="text-sm text-slate-500 space-y-2 list-disc pl-5">
                        <li>Seksi Kurikulum dan Penilaian</li>
                        <li>Seksi Peserta Didik</li>
                        <li>Seksi Kelembagaan dan Sarpras</li>
                    </ul>
                </div>

                <!-- Unit 4 -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition-shadow relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-navy"></div>
                    <div class="flex items-center mb-4">
                        <div class="w-8 h-8 rounded-full bg-navy/10 text-navy font-bold flex items-center justify-center mr-3">4</div>
                        <h4 class="font-bold text-lg text-slate-800">Bidang Pembinaan SMK</h4>
                    </div>
                    <p class="text-slate-600 text-sm leading-relaxed mb-3">
                        Fokus pada standarisasi pendidikan vokasi, kejuruan, dan kemitraan industri.
                    </p>
                    <ul class="text-sm text-slate-500 space-y-2 list-disc pl-5">
                        <li>Seksi Kurikulum dan Penilaian</li>
                        <li>Seksi Peserta Didik</li>
                        <li>Seksi Kelembagaan dan Sarpras</li>
                    </ul>
                </div>

                <!-- Unit 5 -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition-shadow relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-lightblue"></div>
                    <div class="flex items-center mb-4">
                        <div class="w-8 h-8 rounded-full bg-lightblue/10 text-lightblue font-bold flex items-center justify-center mr-3">5</div>
                        <h4 class="font-bold text-lg text-slate-800">Bidang Pembinaan SLB</h4>
                    </div>
                    <p class="text-slate-600 text-sm leading-relaxed mb-3">
                        Menaungi penyelenggaraan Sekolah Luar Biasa (SLB) dan pendidikan layanan khusus inklusif.
                    </p>
                    <ul class="text-sm text-slate-500 space-y-2 list-disc pl-5">
                        <li>Seksi Kurikulum dan Penilaian</li>
                        <li>Seksi Peserta Didik</li>
                        <li>Seksi Kelembagaan dan Sarpras</li>
                    </ul>
                </div>

                <!-- Unit 6 -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition-shadow relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-gold"></div>
                    <div class="flex items-center mb-4">
                        <div class="w-8 h-8 rounded-full bg-gold/20 text-yellow-700 font-bold flex items-center justify-center mr-3">6</div>
                        <h4 class="font-bold text-lg text-slate-800">Bidang Pembinaan Ketenagaan</h4>
                    </div>
                    <p class="text-slate-600 text-sm leading-relaxed mb-3">
                        Mengelola pemetaan, mutasi, dan pengembangan kompetensi pendidik dan tenaga kependidikan.
                    </p>
                    <ul class="text-sm text-slate-500 space-y-2 list-disc pl-5">
                        <li>Seksi PTK SMA</li>
                        <li>Seksi PTK SMK</li>
                        <li>Seksi PTK Pendidikan Khusus</li>
                    </ul>
                </div>

                <!-- Unit 7 -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition-shadow relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-navy"></div>
                    <div class="flex items-center mb-4">
                        <div class="w-8 h-8 rounded-full bg-navy/10 text-navy font-bold flex items-center justify-center mr-3">7</div>
                        <h4 class="font-bold text-lg text-slate-800">Bidang Kebudayaan</h4>
                    </div>
                    <p class="text-slate-600 text-sm leading-relaxed mb-3">
                        Bertugas melestarikan budaya lokal, tradisi, dan manajemen peninggalan sejarah di wilayah Maluku.
                    </p>
                    <ul class="text-sm text-slate-500 space-y-2 list-disc pl-5">
                        <li>Seksi Sejarah dan Tradisi</li>
                        <li>Seksi Kesenian</li>
                        <li>Seksi Cagar Budaya & Permuseuman</li>
                    </ul>
                </div>

                <!-- Unit 8 -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition-shadow relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-lightblue"></div>
                    <div class="flex items-center mb-4">
                        <div class="w-8 h-8 rounded-full bg-lightblue/10 text-lightblue font-bold flex items-center justify-center mr-3">8</div>
                        <h4 class="font-bold text-lg text-slate-800">Cabang Dinas & UPTD</h4>
                    </div>
                    <p class="text-slate-600 text-sm leading-relaxed mb-3">
                        Unit teknis pelayanan dan operasional khusus di luar struktur bidang utama.
                    </p>
                    <ul class="text-sm text-slate-500 space-y-2 list-disc pl-5">
                        <li>Cabang Dinas (Gugus Kab/Kota)</li>
                        <li>UPTD Balai Teknologi Komunikasi</li>
                        <li>UPTD Museum Siwalima</li>
                    </ul>
                </div>

                <!-- Unit 9 -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition-shadow relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-gold"></div>
                    <div class="flex items-center mb-4">
                        <div class="w-8 h-8 rounded-full bg-gold/20 text-yellow-700 font-bold flex items-center justify-center mr-3">9</div>
                        <h4 class="font-bold text-lg text-slate-800">Jabatan Fungsional</h4>
                    </div>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Terdiri dari para ahli seperti Pengawas Sekolah, Analis Kebijakan, dan Arsiparis. Bekerja profesional dan independen namun tetap dalam koordinasi dinas.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA & Footer Section -->
    <footer class="bg-navy text-white relative overflow-hidden pt-20 pb-10">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/black-scales.png')] opacity-20"></div>
        
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Pelaporan Satu Data Digital</h2>
            <p class="text-blue-200 mb-8 max-w-2xl mx-auto text-lg">
                Sistem informasi terpusat untuk transparansi, efisiensi, dan integrasi seluruh data pendidikan dan kebudayaan di Provinsi Maluku.
            </p>
            
            <a href="{{ url('/standar-pelayanan') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-gold to-yellow-500 text-navy font-bold rounded-full shadow-glow hover:scale-105 transition-transform duration-300 mb-6 group">
                <i class="fas fa-database mr-3 group-hover:animate-pulse"></i>
                Satu Data Terintegrasi
            </a>
            
            <div class="mt-4 mb-16">
                <span class="text-xl font-light tracking-widest text-white/80 border-t border-b border-white/20 py-2 px-6 uppercase shadow-sm">
                    "Wujud Integritas"
                </span>
            </div>
            
            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-blue-200">
                <p>&copy; 2026 Dinas Pendidikan dan Kebudayaan Provinsi Maluku.</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="#" class="hover:text-gold transition-colors"><i class="fab fa-facebook text-xl"></i></a>
                    <a href="#" class="hover:text-gold transition-colors"><i class="fab fa-instagram text-xl"></i></a>
                    <a href="#" class="hover:text-gold transition-colors"><i class="fab fa-youtube text-xl"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts for Data Visualization -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            
            // 1. Line Chart: Struktur Organisasi (Using Echarts Tree representation)
            const treeChartDom = document.getElementById('treeChart');
            const treeChart = echarts.init(treeChartDom);
            
            const orgData = {
                name: 'Kepala Dinas',
                itemStyle: { color: '#003A8F', borderColor: '#D4AF37', borderWidth: 2 },
                label: { fontWeight: 'bold', fontSize: 14 },
                children: [
                    {
                        name: 'Sekretariat',
                        itemStyle: { color: '#1F6ED4' },
                        children: [
                            { name: 'Perencanaan\n& Evaluasi', value: 1 },
                            { name: 'Keuangan', value: 1 },
                            { name: 'Umum &\nKepegawaian', value: 1 }
                        ]
                    },
                    {
                        name: 'Bid. SMA',
                        itemStyle: { color: '#1F6ED4' },
                        children: [
                            { name: 'Kurikulum', value: 1 },
                            { name: 'Peserta Didik', value: 1 },
                            { name: 'Kelembagaan\n& Sarpras', value: 1 }
                        ]
                    },
                    {
                        name: 'Bid. SMK',
                        itemStyle: { color: '#1F6ED4' },
                        children: [
                            { name: 'Kurikulum', value: 1 },
                            { name: 'Peserta Didik', value: 1 },
                            { name: 'Kelembagaan\n& Sarpras', value: 1 }
                        ]
                    },
                    {
                        name: 'Bid. SLB',
                        itemStyle: { color: '#1F6ED4' },
                        children: [
                            { name: 'Kurikulum', value: 1 },
                            { name: 'Peserta Didik', value: 1 },
                            { name: 'Kelembagaan\n& Sarpras', value: 1 }
                        ]
                    },
                    {
                        name: 'Bid. Ketenagaan',
                        itemStyle: { color: '#1F6ED4' },
                        children: [
                            { name: 'PTK SMA', value: 1 },
                            { name: 'PTK SMK', value: 1 },
                            { name: 'PTK P.Khusus', value: 1 }
                        ]
                    },
                    {
                        name: 'Bid. Kebudayaan',
                        itemStyle: { color: '#1F6ED4' },
                        children: [
                            { name: 'Sejarah\n& Tradisi', value: 1 },
                            { name: 'Kesenian', value: 1 },
                            { name: 'Cagar Budaya\n& Museum', value: 1 }
                        ]
                    },
                    {
                        name: 'UPTD / Cabdin',
                        itemStyle: { color: '#D4AF37' },
                        label: { color: '#003A8F', fontWeight: 'bold' },
                        children: [
                            { name: 'Cabang Dinas', value: 1 },
                            { name: 'Balai Tekom', value: 1 },
                            { name: 'Museum Siwalima', value: 1 }
                        ]
                    },
                    {
                        name: 'Jabatan Fungsional',
                        itemStyle: { color: '#64748B' },
                        children: [
                            { name: 'Pengawas', value: 1 },
                            { name: 'Analis', value: 1 },
                            { name: 'Arsiparis', value: 1 }
                        ]
                    }
                ]
            };

            const treeOption = {
                tooltip: {
                    trigger: 'item',
                    triggerOn: 'mousemove'
                },
                series: [
                    {
                        type: 'tree',
                        data: [orgData],
                        top: '5%',
                        left: '8%',
                        bottom: '5%',
                        right: '15%',
                        symbolSize: 9,
                        orient: 'LR', // Left to Right Orientation
                        edgeShape: 'polyline', // Sharp angled lines to look like an org chart
                        edgeForkPosition: '63%',
                        initialTreeDepth: 2,
                        lineStyle: {
                            color: '#cbd5e1',
                            width: 2,
                        },
                        label: {
                            backgroundColor: '#fff',
                            position: 'left',
                            verticalAlign: 'middle',
                            align: 'right',
                            fontSize: 12,
                            padding: [4, 8],
                            borderRadius: 4,
                            borderWidth: 1,
                            borderColor: '#e2e8f0',
                            color: '#334155'
                        },
                        leaves: {
                            label: {
                                position: 'right',
                                verticalAlign: 'middle',
                                align: 'left',
                                backgroundColor: '#f8fafc',
                                borderWidth: 0
                            }
                        },
                        expandAndCollapse: true,
                        animationDuration: 550,
                        animationDurationUpdate: 750
                    }
                ]
            };
            treeChart.setOption(treeOption);

            // 2. Bar Chart: Top Struktur Organisasi (Jumlah Unit/Seksi per Bidang)
            const barChartDom = document.getElementById('barChart');
            const barChart = echarts.init(barChartDom);
            
            const barOption = {
                color: ['#003A8F', '#1F6ED4', '#D4AF37'],
                tooltip: {
                    trigger: 'axis',
                    axisPointer: { type: 'shadow' }
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                xAxis: {
                    type: 'value',
                    boundaryGap: [0, 0.01],
                    splitLine: { lineStyle: { color: '#f1f5f9', type: 'dashed' } }
                },
                yAxis: {
                    type: 'category',
                    data: ['Sekretariat', 'Bidang SMA', 'Bidang SMK', 'Bidang SLB', 'Bidang Ketenagaan', 'Bidang Kebudayaan', 'UPTD & Cabdin'],
                    axisLabel: {
                        fontWeight: '500',
                        color: '#475569'
                    }
                },
                series: [
                    {
                        name: 'Jumlah Seksi/Sub-Unit',
                        type: 'bar',
                        barWidth: '50%',
                        itemStyle: {
                            borderRadius: [0, 4, 4, 0],
                            color: new echarts.graphic.LinearGradient(0, 0, 1, 0, [
                                { offset: 0, color: '#1F6ED4' },
                                { offset: 1, color: '#003A8F' }
                            ])
                        },
                        data: [
                            {value: 3, itemStyle: { color: '#64748B' }},
                            {value: 3, itemStyle: { color: '#1F6ED4' }},
                            {value: 3, itemStyle: { color: '#1F6ED4' }},
                            {value: 3, itemStyle: { color: '#1F6ED4' }},
                            {value: 3, itemStyle: { color: '#1F6ED4' }},
                            {value: 3, itemStyle: { color: '#1F6ED4' }},
                            {value: 3, itemStyle: { color: '#D4AF37' }},
                        ],
                        label: {
                            show: true,
                            position: 'insideRight',
                            formatter: '{c} Unit',
                            color: '#fff',
                            fontWeight: 'bold'
                        }
                    }
                ]
            };
            barChart.setOption(barOption);

            // Resize charts on window resize
            window.addEventListener('resize', () => {
                treeChart.resize();
                barChart.resize();
            });
        });
    </script>
</body>
</html>