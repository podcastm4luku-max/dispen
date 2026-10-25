<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas dan Fungsi - Dinas Pendidikan dan Kebudayaan Provinsi Maluku</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Tailwind Config for Custom Colors/Fonts -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* Custom styles for subtle animations */
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px -5px rgba(30, 58, 138, 0.12), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
        }
        .gradient-text {
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .slide {
            opacity: 0;
            transition: opacity 1s ease-in-out, transform 6s linear;
            transform: scale(1);
        }
        .slide.active {
            opacity: 1;
            transform: scale(1.05);
        }
    </style>
</head>
<body class="font-sans antialiased text-slate-800 bg-slate-50 selection:bg-brand-600 selection:text-white">

    <!-- Top Government Ribbon Bar -->
    <div class="bg-slate-900 border-b border-slate-800 text-white text-xs py-2 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span class="font-medium text-slate-300">Pemerintah Provinsi Maluku</span>
            </div>
            <div class="flex items-center gap-4 text-slate-400">
                <a href="{{ url('/standar-pelayanan') }}" class="hover:text-white transition-colors">Standar Pelayanan</a>
                <span class="text-slate-600">|</span>
                <a href="{{ url('/') }}" class="hover:text-amber-400 transition-colors font-medium">Portal Resmi</a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <nav class="sticky top-0 w-full z-50 bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo & Brand Link -->
                <a href="{{ url('/') }}" class="flex-shrink-0 flex items-center gap-3.5 group">
                    <div class="w-11 h-11 bg-gradient-to-tr from-brand-900 via-brand-800 to-brand-600 text-white rounded-xl flex items-center justify-center text-xl shadow-md group-hover:scale-105 transition-transform">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <div>
                        <h1 class="font-bold text-base sm:text-lg leading-tight text-slate-900 group-hover:text-brand-600 transition-colors">
                            Dinas Pendidikan &amp; Kebudayaan
                        </h1>
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Provinsi Maluku</p>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-1 sm:space-x-2">
                    <a href="{{ url('/') }}" class="text-slate-600 hover:text-brand-700 hover:bg-slate-100/70 px-3.5 py-2 rounded-lg text-sm font-semibold transition-all flex items-center gap-2">
                        <i class="fa-solid fa-arrow-left text-xs text-brand-600"></i>
                        <span>Beranda</span>
                    </a>
                    <a href="#tugas" class="text-slate-700 hover:text-brand-700 hover:bg-slate-100/70 px-3.5 py-2 rounded-lg text-sm font-semibold transition-all">
                        Tugas Utama
                    </a>
                    <a href="#fungsi" class="text-slate-700 hover:text-brand-700 hover:bg-slate-100/70 px-3.5 py-2 rounded-lg text-sm font-semibold transition-all">
                        Fungsi Utama
                    </a>
                    <a href="#ruang-lingkup" class="text-slate-700 hover:text-brand-700 hover:bg-slate-100/70 px-3.5 py-2 rounded-lg text-sm font-semibold transition-all">
                        Ruang Lingkup
                    </a>
                    <div class="h-5 w-[1px] bg-slate-200 mx-2"></div>
                    <a href="{{ url('/standar-pelayanan') }}" class="bg-brand-50 text-brand-700 hover:bg-brand-600 hover:text-white border border-brand-200/80 px-4 py-2 rounded-lg text-sm font-semibold transition-all shadow-sm">
                        Standar Pelayanan
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="lg:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-slate-700 hover:text-brand-600 hover:bg-slate-100 focus:outline-none p-2 rounded-lg transition-colors" aria-label="Menu">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu (Hidden by default) -->
        <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-slate-200 shadow-xl">
            <div class="px-4 pt-3 pb-5 space-y-2">
                <a href="{{ url('/') }}" class="flex items-center gap-2 px-3.5 py-2.5 rounded-lg text-base font-bold text-brand-700 bg-brand-50 border border-brand-100">
                    <i class="fa-solid fa-arrow-left text-sm"></i>
                    <span>Kembali ke Beranda</span>
                </a>
                <a href="#tugas" class="block px-3.5 py-2 rounded-lg text-base font-medium text-slate-700 hover:text-brand-600 hover:bg-slate-50 transition-colors">
                    Tugas Utama
                </a>
                <a href="#fungsi" class="block px-3.5 py-2 rounded-lg text-base font-medium text-slate-700 hover:text-brand-600 hover:bg-slate-50 transition-colors">
                    Fungsi Utama
                </a>
                <a href="#ruang-lingkup" class="block px-3.5 py-2 rounded-lg text-base font-medium text-slate-700 hover:text-brand-600 hover:bg-slate-50 transition-colors">
                    Ruang Lingkup
                </a>
                <div class="pt-2 border-t border-slate-100">
                    <a href="{{ url('/standar-pelayanan') }}" class="block text-center px-4 py-2.5 rounded-lg text-sm font-semibold text-white bg-brand-600 hover:bg-brand-700 transition-colors shadow-sm">
                        Lihat Standar Pelayanan
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="relative pt-24 pb-28 lg:pt-32 lg:pb-36 overflow-hidden text-white bg-slate-900">
        <!-- Slider Images -->
        <div id="slider" class="absolute inset-0 z-0">
            <div class="slide active absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&w=1920&q=80');"></div>
            <div class="slide absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1920&q=80');"></div>
            <div class="slide absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1514525253161-7a46d19cd819?auto=format&fit=crop&w=1920&q=80');"></div>
        </div>
        
        <!-- Dark Overlay for Readability -->
        <div class="absolute inset-0 bg-slate-950/65 z-0"></div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 mb-8 shadow-lg">
                <span class="flex h-2 w-2 rounded-full bg-emerald-400 shadow-[0_0_8px_rgba(74,222,128,0.8)]"></span>
                <span class="text-sm font-medium tracking-wide">{{ $profil->header_badge ?? 'Pemerintah Provinsi Maluku' }}</span>
            </div>
            
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-6 leading-tight drop-shadow-lg">
                {{ $profil->header_title ?? 'Dinas Pendidikan dan Kebudayaan' }}
            </h2>
            
            <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-200 font-light drop-shadow leading-relaxed">
                {{ $profil->header_subtitle ?? 'Membangun generasi cerdas, berkarakter, dan melestarikan warisan budaya luhur di Bumi Raja-Raja.' }}
            </p>
            
            <div class="mt-10 flex justify-center gap-4">
                <a href="#tugas" class="px-8 py-3.5 border-2 border-transparent text-base font-bold rounded-xl text-brand-900 bg-white hover:bg-gray-100 shadow-[0_0_20px_rgba(255,255,255,0.3)] hover:scale-105 transition-all">
                    Pelajari Profil
                </a>
            </div>
        </div>
    </header>

    <!-- Floating Dashboard Infografis (Tema Warna Kemdikbud/Dinas Pendidikan) -->
    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 mb-12">
        <div class="bg-gradient-to-r from-[#004a87] to-[#005a9c] rounded-2xl shadow-2xl border-b-4 border-[#ffc107] overflow-hidden">
            <div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-white/20 divide-y md:divide-y-0">
                <!-- Stat 1 -->
                <div class="p-6 text-center hover:bg-white/5 transition-colors duration-300">
                    <div class="w-12 h-12 mx-auto bg-white/10 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-[#ffc107]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="text-3xl font-extrabold text-white mb-1">{{ $profil->stat_sekolah ?? '345+' }}</h3>
                    <p class="text-sm font-medium text-blue-100 uppercase tracking-wider">{{ $profil->stat_sekolah_label ?? 'Sekolah Menengah' }}</p>
                </div>
                <!-- Stat 2 -->
                <div class="p-6 text-center hover:bg-white/5 transition-colors duration-300">
                    <div class="w-12 h-12 mx-auto bg-white/10 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-[#ffc107]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-3xl font-extrabold text-white mb-1">{{ $profil->stat_guru ?? '8.2K' }}</h3>
                    <p class="text-sm font-medium text-blue-100 uppercase tracking-wider">{{ $profil->stat_guru_label ?? 'Tenaga Pendidik' }}</p>
                </div>
                <!-- Stat 3 -->
                <div class="p-6 text-center hover:bg-white/5 transition-colors duration-300">
                    <div class="w-12 h-12 mx-auto bg-white/10 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-[#ffc107]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="text-3xl font-extrabold text-white mb-1">{{ $profil->stat_siswa ?? '112K' }}</h3>
                    <p class="text-sm font-medium text-blue-100 uppercase tracking-wider">{{ $profil->stat_siswa_label ?? 'Peserta Didik' }}</p>
                </div>
                <!-- Stat 4 -->
                <div class="p-6 text-center hover:bg-white/5 transition-colors duration-300">
                    <div class="w-12 h-12 mx-auto bg-white/10 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-[#ffc107]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path></svg>
                    </div>
                    <h3 class="text-3xl font-extrabold text-white mb-1">{{ $profil->stat_cagar_budaya ?? '56+' }}</h3>
                    <p class="text-sm font-medium text-blue-100 uppercase tracking-wider">{{ $profil->stat_cagar_budaya_label ?? 'Cagar Budaya' }}</p>
                </div>
                    <h3 class="text-3xl font-extrabold text-white mb-1"></h3>
                    <p class="text-sm font-medium text-blue-100 uppercase tracking-wider"></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tugas Utama Section -->
    <section id="tugas" class="pt-8 pb-20 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:flex lg:items-center lg:gap-16">
                <div class="lg:w-1/2 mb-10 lg:mb-0">
                    <div class="aspect-w-16 aspect-h-9 rounded-2xl overflow-hidden shadow-2xl relative">
                        <!-- Relevant image from database or default -->
                        <img src="{{ !empty($profil->image_tugas) ? (str_starts_with($profil->image_tugas, 'http') ? $profil->image_tugas : asset($profil->image_tugas)) : 'https://placehold.co/800x600/1e3a8a/ffffff?text=Pendidikan+Maluku' }}" alt="Ilustrasi Tugas Dinas" class="object-cover w-full h-full">
                        <div class="absolute inset-0 bg-gradient-to-tr from-brand-900/60 to-transparent"></div>
                    </div>
                </div>
                
                <div class="lg:w-1/2">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-1 bg-brand-600 rounded-full"></div>
                        <h3 class="text-brand-600 font-bold uppercase tracking-widest text-sm">Tugas Pokok</h3>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-6">Tugas Utama Dinas</h2>
                    
                    <div class="prose prose-lg text-slate-600">
                        <p class="leading-relaxed">
                            {!! nl2br(e($profil->tugas_pokok ?? 'Dinas Pendidikan dan Kebudayaan memiliki tugas pokok membantu Gubernur dalam melaksanakan Urusan Pemerintahan di bidang pendidikan dan bidang kebudayaan yang menjadi kewenangan daerah.')) !!}
                        </p>
                        @if(!empty($profil->tugas_pembantuan))
                        <p class="mt-4 leading-relaxed border-l-4 border-brand-500 pl-4 bg-brand-50 py-3 pr-3 rounded-r-lg">
                            {!! nl2br(e($profil->tugas_pembantuan)) !!}
                        </p>
                        @endif
                    </div>

                    @if(!empty($profil->file_path))
                    <div class="mt-8 flex flex-wrap items-center gap-4 p-4 rounded-xl bg-slate-50 border border-slate-200">
                        <div class="w-10 h-10 rounded-lg bg-brand-900 text-white flex items-center justify-center flex-shrink-0 shadow-sm">
                            <i class="fa-solid fa-file-pdf text-lg text-amber-400"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-bold text-slate-900 truncate">{{ $profil->file_name ?? 'Dokumen Resmi Tupoksi Dinas' }}</p>
                            <p class="text-xs text-slate-500">{{ $profil->file_size ?? 'Dokumen PDF' }}</p>
                        </div>
                        <a href="{{ asset($profil->file_path) }}" target="_blank" download class="inline-flex items-center gap-1.5 px-4 py-2 bg-brand-900 hover:bg-brand-800 text-white text-xs font-bold rounded-lg shadow-sm transition-colors">
                            <i class="fa-solid fa-download"></i> Unduh Dokumen
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Fungsi Utama Section -->
    <section id="fungsi" class="py-20 bg-slate-50 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h3 class="text-brand-600 font-bold uppercase tracking-widest text-sm mb-2">Peran & Tanggung Jawab</h3>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Fungsi Utama</h2>
                <p class="text-lg text-slate-600">
                    Dalam melaksanakan tugas pokok tersebut, Dinas Pendidikan dan Kebudayaan Provinsi Maluku menyelenggarakan fungsi-fungsi berikut:
                </p>
            </div>

            <!-- Grid container -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Card 1 -->
                <div class="bg-white rounded-2xl p-8 border border-slate-100 card-hover">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6 text-brand-600">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3">Perumusan Kebijakan Teknis</h4>
                    <p class="text-slate-600 leading-relaxed text-sm">Menyusun dan merumuskan kebijakan daerah di sektor pendidikan (menengah dan khusus) serta pelestarian kebudayaan daerah.</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-2xl p-8 border border-slate-100 card-hover">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6 text-green-600">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3">Pelaksanaan Kebijakan</h4>
                    <p class="text-slate-600 leading-relaxed text-sm">Melaksanakan program dan kegiatan terkait pengelolaan pendidikan dan kebudayaan sesuai dengan visi dan misi Pemerintah Provinsi Maluku.</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-2xl p-8 border border-slate-100 card-hover">
                    <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mb-6 text-purple-600">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3">Pemantauan dan Evaluasi</h4>
                    <p class="text-slate-600 leading-relaxed text-sm">Melaksanakan pengawasan, evaluasi, serta pelaporan terhadap seluruh penyelenggaraan urusan pendidikan dan kebudayaan di wilayah Maluku.</p>
                </div>

                <!-- Card 4 -->
                <div class="bg-white rounded-2xl p-8 border border-slate-100 card-hover">
                    <div class="w-14 h-14 bg-amber-100 rounded-xl flex items-center justify-center mb-6 text-amber-600">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3">Pelaksanaan Administrasi</h4>
                    <p class="text-slate-600 leading-relaxed text-sm">Menyelenggarakan urusan kesekretariatan yang meliputi perencanaan program, pengelolaan keuangan, tata usaha, perlengkapan, dan kepegawaian internal dinas.</p>
                </div>

                <!-- Card 5 -->
                <div class="bg-white rounded-2xl p-8 border border-slate-100 card-hover">
                    <div class="w-14 h-14 bg-rose-100 rounded-xl flex items-center justify-center mb-6 text-rose-600">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3">Pembinaan UPTD & Cabang</h4>
                    <p class="text-slate-600 leading-relaxed text-sm">Membina dan mengoordinasikan Unit Pelaksana Teknis Daerah (UPTD) serta Cabang Dinas Pendidikan yang tersebar di berbagai kabupaten/kota di Maluku.</p>
                </div>

                <!-- Card 6 -->
                <div class="bg-white rounded-2xl p-8 border border-slate-100 card-hover">
                    <div class="w-14 h-14 bg-teal-100 rounded-xl flex items-center justify-center mb-6 text-teal-600">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3">Tugas Lainnya</h4>
                    <p class="text-slate-600 leading-relaxed text-sm">Melaksanakan fungsi dan tugas tambahan yang diberikan oleh Gubernur sesuai dengan lingkup kewenangannya.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- Ruang Lingkup Kewenangan Section -->
    <section id="ruang-lingkup" class="py-20 bg-white border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-1 bg-brand-600 rounded-full"></div>
                    <h3 class="text-brand-600 font-bold uppercase tracking-widest text-sm">Batas Kewenangan</h3>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Ruang Lingkup Kewenangan</h2>
                <p class="text-lg text-slate-600 max-w-3xl">
                    Sesuai dengan <strong class="text-slate-800">Undang-Undang Nomor 23 Tahun 2014</strong> tentang Pemerintahan Daerah, kewenangan Dinas Pendidikan di tingkat Provinsi berfokus pada area berikut:
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                
                <!-- Main Focus Areas (Col-span 8) -->
                <div class="lg:col-span-8 space-y-6">
                    <!-- Item 1 -->
                    <div class="flex bg-slate-50 rounded-2xl p-6 border border-slate-200 hover:border-brand-300 transition-colors">
                        <div class="flex-shrink-0 mr-6 mt-1">
                            <div class="w-12 h-12 rounded-full bg-brand-100 flex items-center justify-center text-brand-600 font-bold text-lg">
                                01
                            </div>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-slate-900 mb-2">Pendidikan Menengah</h4>
                            <p class="text-slate-600 leading-relaxed">
                                Pengelolaan, pembinaan, dan penjaminan mutu jenjang <strong>Sekolah Menengah Atas (SMA)</strong> dan <strong>Sekolah Menengah Kejuruan (SMK)</strong> di seluruh wilayah Provinsi Maluku.
                            </p>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="flex bg-slate-50 rounded-2xl p-6 border border-slate-200 hover:border-brand-300 transition-colors">
                        <div class="flex-shrink-0 mr-6 mt-1">
                            <div class="w-12 h-12 rounded-full bg-brand-100 flex items-center justify-center text-brand-600 font-bold text-lg">
                                02
                            </div>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-slate-900 mb-2">Pendidikan Khusus</h4>
                            <p class="text-slate-600 leading-relaxed">
                                Pengelolaan dan penyelenggaraan <strong>Sekolah Luar Biasa (SLB)</strong> atau program-program pendidikan layanan khusus yang menjamin kesetaraan akses pendidikan bagi anak berkebutuhan khusus.
                            </p>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="flex bg-slate-50 rounded-2xl p-6 border border-slate-200 hover:border-brand-300 transition-colors">
                        <div class="flex-shrink-0 mr-6 mt-1">
                            <div class="w-12 h-12 rounded-full bg-brand-100 flex items-center justify-center text-brand-600 font-bold text-lg">
                                03
                            </div>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-slate-900 mb-2">Kebudayaan Daerah Lintas Wilayah</h4>
                            <p class="text-slate-600 leading-relaxed">
                                Pengelolaan kebudayaan yang masyarakat pelakunya lintas daerah kabupaten/kota dalam 1 (satu) daerah provinsi, termasuk upaya pelestarian tradisi, pengembangan kesenian lokal, dan pelindungan cagar budaya tingkat provinsi.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Info Box (Col-span 4) -->
                <div class="lg:col-span-4">
                    <div class="bg-amber-50 rounded-2xl p-8 border border-amber-200 h-full flex flex-col justify-center">
                        <div class="w-12 h-12 bg-amber-200 rounded-full flex items-center justify-center mb-6 text-amber-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h4 class="text-lg font-bold text-amber-900 mb-3">Catatan Penting Kewenangan</h4>
                        <p class="text-amber-800 leading-relaxed text-sm mb-4">
                            Sesuai aturan desentralisasi, Dinas Pendidikan tingkat Provinsi <strong>tidak mengelola</strong> jenjang pendidikan dasar.
                        </p>
                        <div class="bg-amber-100/50 rounded-lg p-4">
                            <p class="text-amber-900 text-sm font-medium">
                                {!! nl2br(e($profil->catatan_kewenangan ?? 'Untuk jenjang Sekolah Dasar (SD) dan Sekolah Menengah Pertama (SMP), pengelolaannya berada sepenuhnya di bawah kewenangan Dinas Pendidikan tingkat Kabupaten/Kota masing-masing.')) !!}
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 py-12 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Branding -->
                <div class="col-span-1 md:col-span-2 lg:col-span-1">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-brand-800 text-white rounded-xl flex items-center justify-center text-xl shadow-md">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <div>
                            <h2 class="font-bold text-lg leading-tight text-white">Dinas Pendidikan &amp; Kebudayaan</h2>
                            <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Provinsi Maluku</p>
                        </div>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed max-w-sm">
                        Lembaga pemerintah daerah yang bertanggung jawab atas penyelenggaraan urusan pendidikan dan kebudayaan di wilayah Provinsi Maluku.
                    </p>
                </div>
                
                <!-- Links -->
                <div>
                    <h4 class="text-white font-bold mb-4 uppercase tracking-wider text-sm">Pintasan</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#tugas" class="hover:text-brand-400 transition-colors">Tugas Utama</a></li>
                        <li><a href="#fungsi" class="hover:text-brand-400 transition-colors">Fungsi Utama</a></li>
                        <li><a href="#ruang-lingkup" class="hover:text-brand-400 transition-colors">Ruang Lingkup</a></li>
                        <li><a href="{{ url('/standar-pelayanan') }}" class="hover:text-brand-400 transition-colors">Standar Pelayanan</a></li>
                    </ul>
                </div>

                <!-- Contact placeholder -->
                <div>
                    <h4 class="text-white font-bold mb-4 uppercase tracking-wider text-sm">Kontak Instansi</h4>
                    <ul class="space-y-2 text-sm text-slate-400">
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 flex-shrink-0 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>Jl. Pendidikan No. 1, Ambon, Provinsi Maluku</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-slate-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500">
                    &copy; 2026 Dinas Pendidikan dan Kebudayaan Provinsi Maluku. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

        <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');

            if (btn && menu) {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    menu.classList.toggle('hidden');
                });

                const mobileLinks = menu.querySelectorAll('a');
                mobileLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        menu.classList.add('hidden');
                    });
                });
            }
        });
    </script>
</body>
</html>