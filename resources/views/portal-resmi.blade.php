<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Resmi Dinas Pendidikan dan Kebudayaan Provinsi Maluku</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        maluku: {
                            red: '#991B1B',
                            gold: '#D97706',
                            blue: '#0284C7',
                            navy: '#0F172A',
                            accent: '#F59E0B'
                        }
                    }
                }
            }
        }
    </script>

    <style>
        .ticker-wrap {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
        }
        .ticker-move {
            display: inline-block;
            animation: ticker 35s linear infinite;
        }
        .ticker-move:hover {
            animation-play-state: paused;
        }
        @keyframes ticker {
            0% { transform: translate3d(0, 0, 0); }
            100% { transform: translate3d(-50%, 0, 0); }
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .dark .glass-card {
            background: rgba(30, 41, 59, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(0,0,0,0.05);
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(2, 132, 199, 0.4);
            border-radius: 4px;
        }
    </style>
</head>
<body class="bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-100 font-sans transition-colors duration-300">

    <!-- Top Utility Bar -->
    <div class="bg-slate-900 text-slate-200 text-xs py-2 px-4 border-b border-slate-800">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-2">
            <div class="flex items-center space-x-4">
                <span class="flex items-center gap-1.5"><i class="far fa-calendar-alt text-maluku-gold"></i> <span id="current-date">Sabtu, 23 Agustus 2026</span></span>
                <span class="hidden sm:inline-block">|</span>
                <span class="hidden sm:flex items-center gap-1.5"><i class="far fa-clock text-maluku-gold"></i> <span id="current-time">09:23 WIT</span></span>
                <span class="hidden md:inline-block">|</span>
                <span class="hidden md:inline text-slate-400">Ambon, Maluku - Indonesia</span>
            </div>
            
            <!-- Breaking News Ticker -->
            <div class="w-full md:w-1/2 flex items-center overflow-hidden bg-slate-800/80 rounded-full px-3 py-1 text-slate-300">
                <span class="bg-red-700 text-white font-bold px-2 py-0.5 rounded-full text-[10px] tracking-wide uppercase mr-2 shrink-0 animate-pulse">INFO</span>
                <div class="ticker-wrap text-xs">
                    <div class="ticker-move" id="ticker-content">
                        <span>Pendaftaran Beasiswa Maluku Cerdas 2026 Telah Dibuka</span>
                        <span class="mx-4 text-slate-500">•</span>
                        <span>Juknis PPDB SMA/SMK Provinsi Maluku Tahun Ajaran 2026/2027 Resmi Diterbitkan</span>
                        <span class="mx-4 text-slate-500">•</span>
                        <span>Festival Budaya Banda Neira 2026 Digelar September Mendatang</span>
                        <span class="mx-4 text-slate-500">•</span>
                        <span>Pendaftaran Beasiswa Maluku Cerdas 2026 Telah Dibuka</span>
                        <span class="mx-4 text-slate-500">•</span>
                        <span>Juknis PPDB SMA/SMK Provinsi Maluku Tahun Ajaran 2026/2027 Resmi Diterbitkan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Navigation -->
    <header class="sticky top-0 z-40 bg-white/90 dark:bg-slate-900/90 backdrop-blur-md shadow-md border-b border-slate-200 dark:border-slate-800 transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo & Branding -->
                <a href="#" class="flex items-center space-x-3 group">
                    <img src="{{ asset('images/logo-maluku.png') }}?v={{ filemtime(public_path('images/logo-maluku.png')) }}" alt="Logo Maluku" class="w-12 h-12 object-contain drop-shadow-md">
                    <div>
                        <div class="text-xs font-bold uppercase tracking-wider text-red-800 dark:text-amber-400">Pemerintah Provinsi Maluku</div>
                        <div class="text-lg font-black text-slate-900 dark:text-white leading-tight">Dinas Pendidikan & Kebudayaan</div>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex items-center space-x-1 font-medium text-sm">
                    <a href="#beranda" class="px-3 py-2 text-red-700 dark:text-amber-400 font-semibold border-b-2 border-red-700 dark:border-amber-400">Beranda</a>
                    <a href="#berita" class="px-3 py-2 text-slate-700 dark:text-slate-300 hover:text-red-700 dark:hover:text-amber-400 transition-colors">Berita & Informasi</a>
                    <a href="#layanan" class="px-3 py-2 text-slate-700 dark:text-slate-300 hover:text-red-700 dark:hover:text-amber-400 transition-colors">Layanan Publik</a>
                    <a href="#kebudayaan" class="px-3 py-2 text-slate-700 dark:text-slate-300 hover:text-red-700 dark:hover:text-amber-400 transition-colors">Kebudayaan</a>
                    <a href="#agenda" class="px-3 py-2 text-slate-700 dark:text-slate-300 hover:text-red-700 dark:hover:text-amber-400 transition-colors">Agenda</a>
                    <a href="#unduhan" class="px-3 py-2 text-slate-700 dark:text-slate-300 hover:text-red-700 dark:hover:text-amber-400 transition-colors">Dokumen</a>
                    <a href="{{ url('/pengaduan') }}" class="px-3 py-2 text-slate-700 dark:text-slate-300 hover:text-red-700 dark:hover:text-amber-400 transition-colors">E-Lapor</a>
                    <a href="{{ route('admin.portal') }}" class="px-3 py-2 text-slate-700 dark:text-slate-300 hover:text-red-700 dark:hover:text-amber-400 transition-colors font-bold"><i class="fas fa-lock text-xs mr-1"></i>Admin</a>
                </nav>

                <!-- Search & Actions -->
                <div class="hidden sm:flex items-center space-x-3">
                    <button onclick="toggleSearchModal()" class="p-2.5 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors" title="Cari Informasi">
                        <i class="fas fa-search"></i>
                    </button>
                    <a href="{{ url('/pengaduan') }}" class="bg-gradient-to-r from-red-700 to-amber-600 hover:from-red-800 hover:to-amber-700 text-white font-semibold px-4 py-2 rounded-xl text-sm shadow-md hover:shadow-lg transition-all flex items-center gap-2">
                        <i class="fas fa-headset"></i>
                        <span>Pengaduan Publik</span>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button onclick="toggleMobileMenu()" class="lg:hidden p-2 rounded-lg text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800">
                    <i class="fas fa-bars text-xl" id="menu-icon"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden lg:hidden border-t border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 px-4 pt-2 pb-6 space-y-2">
            <a href="#beranda" onclick="toggleMobileMenu()" class="block px-3 py-2 rounded-lg bg-red-50 dark:bg-slate-800 text-red-700 dark:text-amber-400 font-semibold">Beranda</a>
            <a href="#berita" onclick="toggleMobileMenu()" class="block px-3 py-2 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800">Berita & Informasi</a>
            <a href="#layanan" onclick="toggleMobileMenu()" class="block px-3 py-2 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800">Layanan Publik</a>
            <a href="#kebudayaan" onclick="toggleMobileMenu()" class="block px-3 py-2 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800">Kebudayaan Maluku</a>
            <a href="#agenda" onclick="toggleMobileMenu()" class="block px-3 py-2 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800">Agenda Kegiatan</a>
            <a href="#unduhan" onclick="toggleMobileMenu()" class="block px-3 py-2 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800">Unduhan Dokumen</a>
            <a href="{{ url('/pengaduan') }}" onclick="toggleMobileMenu()" class="block px-3 py-2 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800">Layanan Pengaduan</a>
            <a href="{{ route('admin.portal') }}" class="block px-3 py-2 rounded-lg text-red-700 dark:text-amber-400 hover:bg-slate-100 dark:hover:bg-slate-800 font-bold"><i class="fas fa-lock mr-2"></i>Admin Database</a>
            <div class="pt-2 flex gap-2">
                <button onclick="toggleSearchModal(); toggleMobileMenu();" class="flex-1 py-2 bg-slate-100 dark:bg-slate-800 rounded-lg font-medium text-slate-700 dark:text-slate-300 text-center">
                    <i class="fas fa-search mr-2"></i> Cari
                </button>
            </div>
        </div>
    </header>

    <!-- Hero Section Carousel -->
    <section id="beranda" class="relative overflow-hidden bg-slate-900 text-white">
        <!-- Background Pattern Decor -->
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#d97706_1px,transparent_1px)] [background-size:16px_16px]"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20 relative z-10">
            <div class="grid lg:grid-cols-12 gap-8 items-center">
                
                <!-- Main Carousel Slide Area -->
                <div class="lg:col-span-8">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-slate-700/50 group" id="hero-slider">
                        <!-- Slide Content Container -->
                        <div class="relative h-[360px] sm:h-[450px] w-full">
                            <img id="hero-img" src="{{ $slides[0]['img'] ?? 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=1200&auto=format&fit=crop' }}" alt="Hero Maluku Education" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/60 to-transparent"></div>
                            
                            <!-- Slide Overlay Text -->
                            <div class="absolute bottom-0 left-0 right-0 p-6 sm:p-10 space-y-3">
                                <span id="hero-tag" class="px-3 py-1 bg-amber-500 text-slate-950 font-extrabold text-xs tracking-wider rounded-full uppercase">{{ $slides[0]['tag'] ?? 'Program Unggulan' }}</span>
                                <h1 id="hero-title" class="text-2xl sm:text-4xl font-extrabold text-white leading-tight drop-shadow-md">
                                    {{ $slides[0]['title'] ?? 'Digitalisasi Sekolah Kepulauan: 120 Sekolah di Maluku Terima Perangkat Satelit dan Chromebook' }}
                                </h1>
                                <p id="hero-desc" class="text-slate-300 text-sm sm:text-base line-clamp-2 max-w-2xl">
                                    {{ $slides[0]['desc'] ?? 'Pemerataan akses teknologi informasi melalui bantuan perangkat satelit internet bagi satuan pendidikan di pulau terluar.' }}
                                </p>
                                <div class="pt-2 flex items-center gap-4">
                                    <button onclick="readFeaturedNews()" class="bg-red-700 hover:bg-red-800 text-white font-semibold px-5 py-2.5 rounded-xl text-sm transition-all shadow-lg flex items-center gap-2">
                                        <span>Baca Selengkapnya</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                    <span id="hero-date" class="text-xs text-slate-400"><i class="far fa-clock mr-1"></i> {{ $slides[0]['date'] ?? '10 Sep 2026' }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Carousel Controls -->
                        <button onclick="prevSlide()" class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-slate-900/60 text-white hover:bg-red-700 transition-colors flex items-center justify-center opacity-0 group-hover:opacity-100">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button onclick="nextSlide()" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-slate-900/60 text-white hover:bg-red-700 transition-colors flex items-center justify-center opacity-0 group-hover:opacity-100">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        
                        <!-- Slide Indicator Dots -->
                        <div class="absolute top-4 right-4 flex space-x-2" id="slide-dots">
                            <!-- Dots generated by JS -->
                        </div>
                    </div>
                </div>

                <!-- Side Featured Announcements Column -->
                <div class="lg:col-span-4 space-y-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-bold text-white flex items-center gap-2">
                            <i class="fas fa-bullhorn text-amber-500"></i>
                            Pengumuman Penting
                        </h3>
                        <a href="#berita" class="text-xs text-amber-400 hover:underline">Lihat Semua</a>
                    </div>

                    <!-- Side Cards -->
                    <div class="space-y-3">
                        @php
                            $tagColors = ['text-amber-400', 'text-red-400', 'text-sky-400'];
                        @endphp
                        @forelse($sideAnnouncements as $idx => $announcement)
                            @php
                                $catLower = strtolower($announcement->category ?? '');
                                if (str_contains($catLower, 'budaya') || str_contains($catLower, 'kebudayaan')) {
                                    $colorClass = 'text-red-400';
                                } elseif (str_contains($catLower, 'guru') || str_contains($catLower, 'sertifikasi')) {
                                    $colorClass = 'text-sky-400';
                                } elseif (str_contains($catLower, 'ppdb')) {
                                    $colorClass = 'text-amber-400';
                                } else {
                                    $colorClass = $tagColors[$idx % count($tagColors)];
                                }
                            @endphp
                            <div onclick="openNewsDetail({{ $announcement->id }})" class="p-4 rounded-2xl bg-slate-800/80 border border-slate-700/80 hover:border-amber-500/50 transition-all cursor-pointer group">
                                <div class="flex justify-between items-start mb-1">
                                    <span class="text-[10px] font-bold {{ $colorClass }} uppercase tracking-wide">{{ $announcement->category }}</span>
                                    <span class="text-[10px] text-slate-400">{{ $announcement->date }}</span>
                                </div>
                                <h4 class="text-sm font-semibold text-slate-100 group-hover:text-amber-300 transition-colors line-clamp-2">
                                    {{ $announcement->title }}
                                </h4>
                                <p class="text-xs text-slate-400 mt-1 line-clamp-1">{{ $announcement->summary }}</p>
                            </div>
                        @empty
                            <div class="p-4 rounded-2xl bg-slate-800/80 border border-slate-700/80 text-xs text-slate-400 text-center">
                                Belum ada pengumuman tersedia.
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Public Digital Services Portal Section -->
    <section id="layanan" class="py-16 bg-slate-100 dark:bg-slate-900/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="text-xs font-extrabold tracking-wider uppercase text-red-700 dark:text-amber-400 bg-red-100 dark:bg-red-950/60 px-3 py-1 rounded-full">Layanan Publik Digital</span>
                <h2 class="text-3xl font-extrabold text-slate-900 dark:text-white mt-3">Akses Cepat Layanan Pendidikan & Kebudayaan</h2>
                <p class="text-slate-600 dark:text-slate-400 mt-2 text-sm sm:text-base">
                    Kemudahan akses pelayanan publik berbasis elektronik untuk masyarakat, siswa, guru, dan penggiat budaya di Maluku.
                </p>
            </div>

            @php
                $colorStyles = [
                    'red' => ['bg' => 'bg-red-100 dark:bg-red-900/40', 'text' => 'text-red-700 dark:text-red-400', 'hover' => 'group-hover:bg-red-700 group-hover:text-white', 'link' => 'text-red-700 dark:text-amber-400'],
                    'amber' => ['bg' => 'bg-amber-100 dark:bg-amber-900/40', 'text' => 'text-amber-700 dark:text-amber-400', 'hover' => 'group-hover:bg-amber-600 group-hover:text-white', 'link' => 'text-amber-700 dark:text-amber-400'],
                    'sky' => ['bg' => 'bg-sky-100 dark:bg-sky-900/40', 'text' => 'text-sky-700 dark:text-sky-400', 'hover' => 'group-hover:bg-sky-600 group-hover:text-white', 'link' => 'text-sky-700 dark:text-sky-400'],
                    'emerald' => ['bg' => 'bg-emerald-100 dark:bg-emerald-900/40', 'text' => 'text-emerald-700 dark:text-emerald-400', 'hover' => 'group-hover:bg-emerald-600 group-hover:text-white', 'link' => 'text-emerald-700 dark:text-emerald-400'],
                    'purple' => ['bg' => 'bg-purple-100 dark:bg-purple-900/40', 'text' => 'text-purple-700 dark:text-purple-400', 'hover' => 'group-hover:bg-purple-600 group-hover:text-white', 'link' => 'text-purple-700 dark:text-purple-400'],
                    'rose' => ['bg' => 'bg-rose-100 dark:bg-rose-900/40', 'text' => 'text-rose-700 dark:text-rose-400', 'hover' => 'group-hover:bg-rose-600 group-hover:text-white', 'link' => 'text-rose-700 dark:text-rose-400'],
                    'indigo' => ['bg' => 'bg-indigo-100 dark:bg-indigo-900/40', 'text' => 'text-indigo-700 dark:text-indigo-400', 'hover' => 'group-hover:bg-indigo-600 group-hover:text-white', 'link' => 'text-indigo-700 dark:text-indigo-400'],
                    'blue' => ['bg' => 'bg-blue-100 dark:bg-blue-900/40', 'text' => 'text-blue-700 dark:text-blue-400', 'hover' => 'group-hover:bg-blue-600 group-hover:text-white', 'link' => 'text-blue-700 dark:text-blue-400'],
                ];
            @endphp

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($services as $srv)
                @php
                    $theme = $colorStyles[$srv->icon_color] ?? $colorStyles['blue'];
                @endphp
                <div class="glass-card p-6 rounded-2xl hover:-translate-y-1.5 transition-all shadow-md hover:shadow-xl border border-slate-200/80 dark:border-slate-800 flex flex-col justify-between group relative">
                    @if(!empty($srv->badge))
                    <span class="absolute top-4 right-4 text-[10px] font-extrabold uppercase px-2.5 py-1 rounded-full bg-slate-200/90 dark:bg-slate-800 text-slate-700 dark:text-slate-300 shadow-sm border border-slate-300/50 dark:border-slate-700/50">
                        {{ $srv->badge }}
                    </span>
                    @endif
                    <div>
                        <div class="w-14 h-14 rounded-2xl {{ $theme['bg'] }} {{ $theme['text'] }} flex items-center justify-center text-2xl mb-4 {{ $theme['hover'] }} transition-colors shadow-sm">
                            <i class="{{ $srv->icon ?: 'fas fa-laptop' }}"></i>
                        </div>
                        <h3 class="font-bold text-lg text-slate-900 dark:text-white mb-2">{{ $srv->title }}</h3>
                        <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed mb-4">
                            {{ $srv->description }}
                        </p>
                    </div>
                    @if(!empty($srv->url) && $srv->url !== '#')
                    <a href="{{ $srv->url }}" class="inline-flex items-center text-xs font-bold {{ $theme['link'] }} group-hover:translate-x-1 transition-transform">
                        {{ $srv->action_text ?: 'Akses Layanan' }} <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    @else
                    <a href="javascript:void(0)" onclick="openServiceModal('{{ addslashes($srv->title) }}')" class="inline-flex items-center text-xs font-bold {{ $theme['link'] }} group-hover:translate-x-1 transition-transform">
                        {{ $srv->action_text ?: 'Akses Layanan' }} <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    @endif
                </div>
                @empty
                <div class="col-span-full text-center py-8 text-slate-500">
                    Belum ada data layanan publik yang aktif.
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Main News Center Section -->
    <section id="berita" class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
                <div>
                    <span class="text-xs font-extrabold tracking-wider uppercase text-red-700 dark:text-amber-400 bg-red-100 dark:bg-red-950/60 px-3 py-1 rounded-full">Informasi Terkini</span>
                    <h2 class="text-3xl font-extrabold text-slate-900 dark:text-white mt-2">Kabar & Pengumuman Dinas</h2>
                </div>

                <!-- Category Tabs -->
                <div class="flex flex-wrap gap-2" id="news-categories">
                    <button onclick="filterNews('semua')" class="cat-btn active px-4 py-2 rounded-xl text-xs font-bold transition-all bg-red-700 text-white shadow">Semua</button>
                    <button onclick="filterNews('pendidikan')" class="cat-btn px-4 py-2 rounded-xl text-xs font-bold transition-all bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-300">Pendidikan</button>
                    <button onclick="filterNews('kebudayaan')" class="cat-btn px-4 py-2 rounded-xl text-xs font-bold transition-all bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-300">Kebudayaan</button>
                    <button onclick="filterNews('beasiswa')" class="cat-btn px-4 py-2 rounded-xl text-xs font-bold transition-all bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-300">Beasiswa</button>
                    <button onclick="filterNews('pengumuman')" class="cat-btn px-4 py-2 rounded-xl text-xs font-bold transition-all bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-300">Pengumuman</button>
                </div>
            </div>

            <!-- News Grid Container -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="news-grid">
                <!-- Dynamic Content Populated by JavaScript -->
            </div>

            <!-- Load More News Button -->
            <div class="text-center mt-12">
                <button onclick="loadMoreNews()" id="load-more-btn" class="inline-flex items-center gap-2 bg-slate-200 dark:bg-slate-800 hover:bg-red-700 hover:text-white dark:hover:bg-amber-500 dark:hover:text-slate-950 text-slate-800 dark:text-slate-200 font-bold px-6 py-3 rounded-xl text-sm transition-all shadow">
                    <span>Muat Berita Lainnya</span>
                    <i class="fas fa-spinner fa-spin hidden" id="load-spinner"></i>
                </button>
            </div>

        </div>
    </section>

    <!-- Cultural Heritage Showcase Section -->
    <section id="kebudayaan" class="py-16 bg-slate-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#f59e0b_1px,transparent_1px)] [background-size:24px_24px]"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row justify-between lg:items-end mb-12 gap-6">
                <div>
                    <span class="text-xs font-bold text-amber-400 uppercase tracking-widest bg-amber-400/10 px-3 py-1 rounded-full border border-amber-400/20">Warisan Nusantara</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold mt-3">Pesona Kebudayaan Maluku</h2>
                    <p class="text-slate-400 max-w-xl text-sm mt-2">
                        Melestarikan karya seni, tradisi tutur, adat istiadat, dan situs sejarah dari bumi Siwalima untuk generasi mendatang.
                    </p>
                </div>
                <div class="flex space-x-2">
                    <button onclick="filterCulture('all')" class="culture-tab active px-4 py-2 rounded-lg text-xs font-bold bg-amber-500 text-slate-950">Semua Warisan</button>
                    <button onclick="filterCulture('tarian')" class="culture-tab px-4 py-2 rounded-lg text-xs font-bold bg-slate-800 text-slate-300 hover:bg-slate-700">Tari Adat</button>
                    <button onclick="filterCulture('cagar')" class="culture-tab px-4 py-2 rounded-lg text-xs font-bold bg-slate-800 text-slate-300 hover:bg-slate-700">Cagar Budaya</button>
                    <button onclick="filterCulture('musik')" class="culture-tab px-4 py-2 rounded-lg text-xs font-bold bg-slate-800 text-slate-300 hover:bg-slate-700">Alat Musik</button>
                </div>
            </div>

            <!-- Culture Grid Gallery -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6" id="culture-grid">
                <!-- Dynamically Inserted Culture Items -->
            </div>
        </div>
    </section>

    <!-- Agenda & Download Center Grid -->
    <section id="agenda" class="py-16 bg-slate-50 dark:bg-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-10">
                
                <!-- Upcoming Agenda Events -->
                <div class="lg:col-span-6 space-y-6">
                    <div class="flex items-center justify-between border-b border-slate-200 dark:border-slate-800 pb-4">
                        <div>
                            <span class="text-xs font-extrabold uppercase text-red-700 dark:text-amber-400">Jadwal Penting</span>
                            <h3 class="text-2xl font-extrabold text-slate-900 dark:text-white">Agenda Kegiatan Dinas</h3>
                        </div>
                        <i class="far fa-calendar-check text-2xl text-red-700 dark:text-amber-400"></i>
                    </div>

                    <div class="space-y-4" id="agenda-list">
                        @php
                            $colors = [
                                ['bg' => 'bg-red-100 dark:bg-red-950', 'text' => 'text-red-800 dark:text-amber-400', 'badge' => 'bg-red-50 dark:bg-red-900/40 text-red-700 dark:text-red-300'],
                                ['bg' => 'bg-amber-100 dark:bg-amber-950', 'text' => 'text-amber-800 dark:text-amber-400', 'badge' => 'bg-amber-50 dark:bg-amber-900/40 text-amber-700 dark:text-amber-300'],
                                ['bg' => 'bg-sky-100 dark:bg-sky-950', 'text' => 'text-sky-800 dark:text-sky-400', 'badge' => 'bg-sky-50 dark:bg-sky-900/40 text-sky-700 dark:text-sky-300'],
                                ['bg' => 'bg-emerald-100 dark:bg-emerald-950', 'text' => 'text-emerald-800 dark:text-emerald-400', 'badge' => 'bg-emerald-50 dark:bg-emerald-900/40 text-emerald-700 dark:text-emerald-300'],
                            ];
                        @endphp
                        @forelse($agendas as $index => $agenda)
                        @php
                            $c = $colors[$index % count($colors)];
                            $dt = \Carbon\Carbon::parse($agenda->date);
                        @endphp
                        <!-- Agenda Item -->
                        <div class="flex gap-4 p-4 rounded-2xl bg-white dark:bg-slate-900 shadow-sm border border-slate-200 dark:border-slate-800 hover:shadow-md transition-shadow">
                            <div class="w-16 h-16 rounded-xl {{ $c['bg'] }} {{ $c['text'] }} flex flex-col items-center justify-center shrink-0">
                                <span class="text-xs uppercase font-extrabold">{{ $dt->translatedFormat('M') }}</span>
                                <span class="text-xl font-black">{{ $dt->format('d') }}</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded {{ $c['badge'] }}">{{ $agenda->kategori ?? 'Agenda Disdikbud' }} • {{ $dt->format('Y') }}</span>
                                <h4 class="font-bold text-slate-900 dark:text-white text-sm mt-1 leading-snug">{!! $agenda->title !!}</h4>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 flex items-center gap-1">
                                    <i class="fas fa-map-marker-alt text-red-600 shrink-0"></i> 
                                    <span class="truncate">{!! $agenda->location !!}</span>
                                </p>
                            </div>
                        </div>
                        @empty
                        <div class="p-8 text-center text-slate-400 bg-white dark:bg-slate-900 rounded-2xl border border-dashed border-slate-300 dark:border-slate-800">
                            <i class="far fa-calendar-times text-3xl mb-2 text-slate-300 dark:text-slate-600 block"></i>
                            <span class="text-xs">Belum ada agenda kegiatan yang dijadwalkan.</span>
                        </div>
                        @endforelse
                    </div>
                </div>

                <!-- Download Center Section -->
                <div id="unduhan" class="lg:col-span-6 space-y-6">
                    <div class="flex items-center justify-between border-b border-slate-200 dark:border-slate-800 pb-4">
                        <div>
                            <span class="text-xs font-extrabold uppercase text-red-700 dark:text-amber-400">Transparansi Publik</span>
                            <h3 class="text-2xl font-extrabold text-slate-900 dark:text-white">Pusat Unduhan Dokumen</h3>
                        </div>
                        <a href="{{ url('/dokumen-peraturan') }}" class="text-xs font-bold text-red-700 dark:text-amber-400 hover:underline flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-red-50 dark:bg-red-950/40 border border-red-200 dark:border-red-900/40 transition-colors">
                            <span>Daftar Download Dokumen</span>
                            <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>

                    <div class="space-y-3 max-h-[520px] overflow-y-auto pr-1" id="dokumen-list">
                        @forelse($dokumens as $index => $dok)
                        @php
                            $docNo = $dok->no ?? ($index + 1);
                            $docTitle = $dok->title;
                            $docTag = $dok->tag;
                            $docBadge = $dok->badge;
                            $docUrl = $dok->file_path ? asset($dok->file_path) : ($dok->url ?: '#');
                        @endphp
                        <!-- Doc Item -->
                        <div class="p-4 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 flex items-center justify-between hover:border-red-500 transition-colors gap-3 group">
                            <div class="flex items-start space-x-3 overflow-hidden min-w-0">
                                <div class="w-10 h-10 rounded-xl bg-red-50 dark:bg-red-950/60 text-red-600 dark:text-red-400 flex items-center justify-center font-bold shrink-0 border border-red-100 dark:border-red-900/40 shadow-sm mt-0.5">
                                    <i class="fas fa-file-pdf text-lg"></i>
                                </div>
                                <div class="overflow-hidden min-w-0">
                                    <div class="flex items-center gap-2">
                                        <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-slate-100 dark:bg-slate-800 text-[10px] font-bold text-slate-600 dark:text-slate-300 shrink-0">
                                            {{ $docNo }}
                                        </span>
                                        <h4 class="text-xs sm:text-sm font-bold text-slate-900 dark:text-white truncate group-hover:text-red-600 dark:group-hover:text-amber-400 transition-colors" title="{{ $docTitle }}">
                                            {!! $docTitle !!}
                                        </h4>
                                    </div>
                                    <div class="flex flex-wrap items-center gap-1.5 mt-1.5">
                                        @if($docTag)
                                        <span class="inline-block px-2 py-0.5 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 rounded text-[10px] font-medium">
                                            {{ $docTag }}
                                        </span>
                                        @endif
                                        @if($docBadge)
                                        <span class="inline-block px-2 py-0.5 bg-blue-100/70 dark:bg-blue-950 text-blue-700 dark:text-blue-300 rounded text-[10px] font-bold">
                                            {{ $docBadge }}
                                        </span>
                                        @endif
                                        <span class="text-[10px] text-slate-400">• PDF Resmi Disdikbud Maluku</span>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ $docUrl }}" target="_blank" rel="noopener noreferrer" class="px-3.5 py-2 rounded-xl bg-red-700 hover:bg-red-800 text-white transition-colors text-xs font-bold flex items-center gap-1.5 shrink-0 shadow-sm">
                                <i class="fas fa-download text-xs"></i> 
                                <span class="hidden sm:inline">Download</span>
                            </a>
                        </div>
                        @empty
                        <div class="p-8 text-center text-slate-400 bg-white dark:bg-slate-900 rounded-2xl border border-dashed border-slate-300 dark:border-slate-800">
                            <i class="far fa-folder-open text-3xl mb-2 text-slate-300 dark:text-slate-600 block"></i>
                            <span class="text-xs">Belum ada dokumen publik yang dipublikasikan.</span>
                        </div>
                        @endforelse
                    </div>

                    <div class="pt-2 text-center">
                        <a href="{{ url('/dokumen-peraturan') }}" class="inline-flex items-center gap-2 text-xs font-bold text-red-700 dark:text-amber-400 hover:underline">
                            <i class="fas fa-layer-group"></i>
                            <span>Buka Halaman Lengkap Regulasi &amp; Dokumen Resmi ({{ count($dokumens ?? []) }} Dokumen)</span>
                            <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-slate-950 text-slate-400 pt-16 pb-8 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-slate-800">
                
                <!-- Col 1: About -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/logo-maluku.png') }}?v={{ filemtime(public_path('images/logo-maluku.png')) }}" alt="Logo Maluku" class="w-10 h-10 object-contain drop-shadow-md">
                        <span class="font-extrabold text-white text-lg leading-tight">DISDIKBUD MALUKU</span>
                    </div>
                    <p class="text-xs leading-relaxed text-slate-400">
                        Dinas Pendidikan dan Kebudayaan Provinsi Maluku berkoordinasi dalam penyelenggaraan urusan pemerintahan di bidang pendidikan menengah, khusus, serta pelestarian kebudayaan di Provinsi Maluku.
                    </p>
                    <div class="flex space-x-3 pt-2">
                        <a href="#" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-red-700 text-white flex items-center justify-center transition-colors"><i class="fab fa-facebook-f text-xs"></i></a>
                        <a href="#" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-red-700 text-white flex items-center justify-center transition-colors"><i class="fab fa-instagram text-xs"></i></a>
                        <a href="#" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-red-700 text-white flex items-center justify-center transition-colors"><i class="fab fa-youtube text-xs"></i></a>
                        <a href="#" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-red-700 text-white flex items-center justify-center transition-colors"><i class="fab fa-twitter text-xs"></i></a>
                    </div>
                </div>

                <!-- Col 2: Quick Links -->
                <div>
                    <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 border-l-2 border-amber-500 pl-2">Tautan Cepat</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="#beranda" class="hover:text-amber-400 transition-colors">Beranda Utama</a></li>
                        <li><a href="#berita" class="hover:text-amber-400 transition-colors">Portal Berita & Edukasi</a></li>
                        <li><a href="#layanan" class="hover:text-amber-400 transition-colors">PPDB Online Maluku</a></li>
                        <li><a href="#layanan" class="hover:text-amber-400 transition-colors">Beasiswa Maluku Cerdas</a></li>
                        <li><a href="#kebudayaan" class="hover:text-amber-400 transition-colors">Cagar Budaya Maluku</a></li>
                        <li><a href="#unduhan" class="hover:text-amber-400 transition-colors">Download Regulasi & Juknis</a></li>
                        <li><a href="{{ route('admin.portal') }}" class="hover:text-red-400 transition-colors"><i class="fas fa-lock mr-1"></i>Kelola Data (Admin)</a></li>
                    </ul>
                </div>

                <!-- Col 3: Contact Info -->
                <div>
                    <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 border-l-2 border-amber-500 pl-2">Kontak Kantor</h4>
                    <ul class="space-y-3 text-xs">
                        <li class="flex items-start space-x-3">
                            <i class="fas fa-map-marker-alt text-amber-500 mt-0.5"></i>
                            <span>Jl. Jl. Jenderal A. Yani, Kota Ambon, Maluku 97124</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fas fa-phone text-amber-500"></i>
                            <span>(0911) - 352389, 352367</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-amber-500"></i>
                            <span>disdikbud@malukuprov.go.id</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fas fa-clock text-amber-500"></i>
                            <span>Senin - Jumat: 08:00 - 16:30 WIT</span>
                        </li>
                    </ul>
                </div>

                <!-- Col 4: Map Location -->
                <div>
                    <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 border-l-2 border-amber-500 pl-2">Lokasi Kantor</h4>
                    <div class="rounded-2xl overflow-hidden border border-slate-800 h-36 bg-slate-900 relative flex items-center justify-center group">
                        <img src="https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?auto=format&fit=crop&w=400&q=80" alt="Map Preview" class="w-full h-full object-cover opacity-50 group-hover:opacity-75 transition-opacity">
                        <a href="https://maps.google.com" target="_blank" class="absolute bg-slate-950/80 text-white font-bold text-xs px-3 py-1.5 rounded-lg backdrop-blur-sm border border-slate-700 flex items-center gap-1 hover:bg-red-700 transition-colors">
                            <i class="fas fa-external-link-alt"></i> Buka Google Maps
                        </a>
                    </div>
                </div>

            </div>

            <!-- Bottom Copyright -->
            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center text-xs text-slate-500 gap-2">
                <div>
                    © 2026 Dinas Pendidikan dan Kebudayaan Provinsi Maluku. Hak Cipta Dilindungi Undang-Undang.
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-slate-400">Kebijakan Privasi</a>
                    <span>•</span>
                    <a href="#" class="hover:text-slate-400">Syarat & Ketentuan</a>
                    <span>•</span>
                    <a href="#" class="hover:text-slate-400">Peta Situs</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- News Reader Article Modal -->
    <div id="news-modal" class="fixed inset-0 z-50 hidden bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white dark:bg-slate-900 rounded-3xl max-w-3xl w-full max-h-[90vh] overflow-y-auto custom-scrollbar shadow-2xl border border-slate-200 dark:border-slate-800 relative">
            <!-- Modal Close Button -->
            <button onclick="closeNewsModal()" class="sticky top-4 right-4 ml-auto w-10 h-10 rounded-full bg-slate-900/70 text-white flex items-center justify-center hover:bg-red-700 transition-colors z-20">
                <i class="fas fa-times"></i>
            </button>
            
            <div class="p-6 sm:p-8 -mt-10" id="modal-article-content">
                <!-- Dynamically Populated Article -->
            </div>
        </div>
    </div>

    
    <!-- Admin Auth Modal -->
    <div id="admin-auth-modal" class="fixed inset-0 z-50 hidden bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white dark:bg-slate-900 rounded-3xl max-w-sm w-full p-6 shadow-2xl border border-slate-200 dark:border-slate-800">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-4"><i class="fas fa-shield-alt text-amber-500 mr-2"></i>Akses Admin</h3>
            <p class="text-xs text-slate-500 mb-4">Masukkan kata sandi untuk mengelola data portal.</p>
            <input type="password" id="admin-pass" class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white mb-4 outline-none focus:border-amber-500" placeholder="Kata Sandi">
            <div class="flex gap-2">
                <button onclick="closeAdminAuth()" class="flex-1 py-2 rounded-xl bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold">Batal</button>
                <button onclick="verifyAdminPass()" class="flex-1 py-2 rounded-xl bg-red-700 text-white font-bold hover:bg-red-800">Masuk</button>
            </div>
        </div>
    </div>

    <!-- Admin Dashboard Modal -->
    <div id="admin-dashboard-modal" class="fixed inset-0 z-[60] hidden bg-slate-950/95 backdrop-blur-md flex flex-col items-center justify-start pt-10 px-4 overflow-y-auto">
        <button onclick="closeAdminDashboard()" class="fixed top-6 right-6 text-slate-400 hover:text-white text-3xl z-[70] bg-slate-800 w-12 h-12 rounded-full flex items-center justify-center shadow-lg"><i class="fas fa-times"></i></button>
        
        <div class="w-full max-w-5xl bg-white dark:bg-slate-900 rounded-3xl p-6 sm:p-8 shadow-2xl border border-slate-700 mb-20 relative">
            <h2 class="text-2xl font-black text-slate-900 dark:text-white mb-6 border-b border-slate-200 dark:border-slate-700 pb-4"><i class="fas fa-cogs text-amber-500 mr-2"></i>Kelola Database Portal</h2>
            
            <div class="flex gap-2 mb-6">
                <button onclick="switchAdminTab('news')" id="tab-btn-news" class="px-5 py-2.5 rounded-xl font-bold text-sm bg-red-700 text-white shadow">Kabar & Pengumuman Dinas</button>
                <button onclick="switchAdminTab('culture')" id="tab-btn-culture" class="px-5 py-2.5 rounded-xl font-bold text-sm bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-300 dark:hover:bg-slate-700">Kelola Kebudayaan</button>
            </div>

            <!-- News Tab -->
            <div id="admin-tab-news">
                <div class="bg-slate-50 dark:bg-slate-800/50 p-5 rounded-2xl border border-slate-200 dark:border-slate-700 mb-6">
                    <h4 class="font-bold text-slate-900 dark:text-white mb-3">Tambah Kabar & Pengumuman Dinas Baru</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <input type="text" id="add-news-title" placeholder="Judul Kabar / Pengumuman" class="w-full px-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-white outline-none">
                        <select id="add-news-category" class="w-full px-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-white outline-none">
                            <option value="pengumuman">Pengumuman</option>
                            <option value="beasiswa">Beasiswa</option>
                            <option value="pendidikan">Pendidikan</option>
                            <option value="kebudayaan">Kebudayaan</option>
                        </select>
                        <div class="flex items-center gap-2"><span class="text-xs font-bold text-slate-500 whitespace-nowrap">Unggah Foto (Max 5MB):</span><input type="file" id="add-news-image" accept="image/*" class="w-full text-xs text-slate-900 dark:text-white file:mr-2 file:py-1 file:px-3 file:rounded file:border-0 file:text-xs file:font-bold file:bg-slate-200 file:text-slate-700 hover:file:bg-slate-300 outline-none"></div>
                        <div class="flex items-center gap-2 px-2">
                            <input type="checkbox" id="add-news-featured" class="w-5 h-5 accent-red-700">
                            <label for="add-news-featured" class="text-sm font-bold text-slate-700 dark:text-slate-300">Tampilkan di Carousel Utama?</label>
                        </div>
                    </div>
                    <textarea id="add-news-summary" rows="2" placeholder="Ringkasan (max 2 baris)" class="w-full px-4 py-2 mb-4 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-white outline-none"></textarea>
                    <textarea id="add-news-content" rows="4" placeholder="Konten Berita Lengkap (HTML dibolehkan)" class="w-full px-4 py-2 mb-4 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-white outline-none"></textarea>
                    <button onclick="saveAdminNews()" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-6 py-2 rounded-xl text-sm transition-colors shadow-md">
                        <i class="fas fa-save mr-2"></i> Simpan Berita
                    </button>
                </div>

                <div class="overflow-x-auto rounded-xl border border-slate-200 dark:border-slate-700">
                    <table class="w-full text-left text-sm text-slate-600 dark:text-slate-300">
                        <thead class="bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200 font-bold uppercase text-xs">
                            <tr>
                                <th class="px-4 py-3">ID</th>
                                <th class="px-4 py-3">Judul Kabar / Pengumuman</th>
                                <th class="px-4 py-3">Kategori</th>
                                <th class="px-4 py-3 text-center">Carousel</th>
                                <th class="px-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 dark:divide-slate-700" id="admin-news-table-body">
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Culture Tab -->
            <div id="admin-tab-culture" class="hidden">
                <div class="bg-slate-50 dark:bg-slate-800/50 p-5 rounded-2xl border border-slate-200 dark:border-slate-700 mb-6">
                    <h4 class="font-bold text-slate-900 dark:text-white mb-3">Tambah Data Kebudayaan</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <input type="text" id="add-cult-title" placeholder="Nama Kebudayaan/Cagar" class="w-full px-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-white outline-none">
                        <select id="add-cult-type" class="w-full px-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-white outline-none">
                            <option value="tarian">Tari Adat</option>
                            <option value="cagar">Cagar Budaya</option>
                            <option value="musik">Alat Musik</option>
                        </select>
                        <input type="text" id="add-cult-location" placeholder="Lokasi (mis: Banda Neira)" class="w-full px-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-white outline-none">
                        <div class="flex items-center gap-2"><span class="text-xs font-bold text-slate-500 whitespace-nowrap">Unggah Foto (Max 5MB):</span><input type="file" id="add-cult-image" accept="image/*" class="w-full text-xs text-slate-900 dark:text-white file:mr-2 file:py-1 file:px-3 file:rounded file:border-0 file:text-xs file:font-bold file:bg-slate-200 file:text-slate-700 hover:file:bg-slate-300 outline-none"></div>
                    </div>
                    <textarea id="add-cult-desc" rows="3" placeholder="Deskripsi Singkat" class="w-full px-4 py-2 mb-4 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-white outline-none"></textarea>
                    <button onclick="saveAdminCulture()" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-6 py-2 rounded-xl text-sm transition-colors shadow-md">
                        <i class="fas fa-save mr-2"></i> Simpan Kebudayaan
                    </button>
                </div>

                <div class="overflow-x-auto rounded-xl border border-slate-200 dark:border-slate-700">
                    <table class="w-full text-left text-sm text-slate-600 dark:text-slate-300">
                        <thead class="bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200 font-bold uppercase text-xs">
                            <tr>
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3">Jenis</th>
                                <th class="px-4 py-3">Lokasi</th>
                                <th class="px-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 dark:divide-slate-700" id="admin-culture-table-body">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Overlay Modal -->
    <div id="search-modal" class="fixed inset-0 z-50 hidden bg-slate-950/90 backdrop-blur-md flex flex-col items-center justify-start pt-20 px-4">
        <button onclick="toggleSearchModal()" class="absolute top-6 right-6 text-slate-400 hover:text-white text-2xl">
            <i class="fas fa-times"></i>
        </button>
        <div class="w-full max-w-2xl space-y-4">
            <h3 class="text-white font-bold text-xl text-center">Cari Berita & Informasi Disdikbud Maluku</h3>
            <div class="relative">
                <input type="text" id="modal-search-input" onkeyup="handleModalSearch()" placeholder="Ketik kata kunci (misal: Beasiswa, PPDB, Guru, Banda)..." class="w-full pl-12 pr-4 py-4 rounded-2xl bg-slate-800 border border-slate-700 text-white text-base focus:ring-2 focus:ring-amber-500 outline-none">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
            </div>
            <div id="search-results-container" class="space-y-2 max-h-96 overflow-y-auto custom-scrollbar pt-2">
                <!-- Search results will appear here -->
            </div>
        </div>
    </div>

    <script>
        
        // Data from Database
        const newsData = @json($newsData);
        const cultureData = @json($cultureData);
        const slides = @json($slides);


                let activeCategory = 'semua';
        let activeCultureTab = 'all';
        let currentSlide = 0;

        // Initialize Page
        document.addEventListener('DOMContentLoaded', () => {
            renderNewsGrid();
            renderCultureGrid();
            initCarousel();
            updateTime();
            setInterval(updateTime, 1000);
            initTheme();
        });

        // Live Clock Function
        function updateTime() {
            const now = new Date();
            const optionsDate = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const dateStr = now.toLocaleDateString('id-ID', optionsDate);
            const timeStr = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' }) + ' WIT';
            
            document.getElementById('current-date').innerText = dateStr;
            document.getElementById('current-time').innerText = timeStr;
        }

        // Theme Toggle
        function initTheme() {
            const themeToggleBtn = document.getElementById('theme-toggle');
            if (themeToggleBtn) {
                if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    document.documentElement.classList.add('dark');
                    updateThemeUI(true);
                } else {
                    document.documentElement.classList.remove('dark');
                    updateThemeUI(false);
                }

                themeToggleBtn.addEventListener('click', () => {
                    const isDark = document.documentElement.classList.toggle('dark');
                    localStorage.theme = isDark ? 'dark' : 'light';
                    updateThemeUI(isDark);
                });
            }
        }

        function updateThemeUI(isDark) {
            const icon = document.getElementById('theme-icon');
            const text = document.getElementById('theme-text');
            if (icon && text) {
                if (isDark) {
                    icon.className = 'fas fa-sun text-amber-400';
                    text.innerText = 'Mode Terang';
                } else {
                    icon.className = 'fas fa-moon text-amber-500';
                    text.innerText = 'Mode Gelap';
                }
            }
        }

        // Carousel Logic
        function initCarousel() {
            const dotsContainer = document.getElementById('slide-dots');
            dotsContainer.innerHTML = '';
            slides.forEach((_, idx) => {
                const dot = document.createElement('button');
                dot.className = `w-2.5 h-2.5 rounded-full transition-all ${idx === 0 ? 'bg-amber-400 w-6' : 'bg-white/50'}`;
                dot.onclick = () => goToSlide(idx);
                dotsContainer.appendChild(dot);
            });
            updateSlideView();
        }

        function goToSlide(idx) {
            currentSlide = idx;
            updateSlideView();
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            updateSlideView();
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            updateSlideView();
        }

        function updateSlideView() {
            const slide = slides[currentSlide];
            document.getElementById('hero-img').src = slide.img;
            document.getElementById('hero-title').innerText = slide.title;
            document.getElementById('hero-desc').innerText = slide.desc;
            document.getElementById('hero-tag').innerText = slide.tag;
            document.getElementById('hero-date').innerHTML = `<i class="far fa-clock mr-1"></i> ${slide.date}`;

            const dots = document.getElementById('slide-dots').children;
            Array.from(dots).forEach((dot, idx) => {
                dot.className = `w-2.5 h-2.5 rounded-full transition-all ${idx === currentSlide ? 'bg-amber-400 w-6' : 'bg-white/50'}`;
            });
        }

        // News Grid Rendering
        function renderNewsGrid() {
            const grid = document.getElementById('news-grid');
            grid.className = ""; // Reset grid class to allow custom inner layout
            grid.innerHTML = '';

            const filtered = activeCategory === 'semua' 
                ? newsData 
                : newsData.filter(item => {
                    const c = (item.category || '').toLowerCase();
                    return c === activeCategory.toLowerCase() || c.includes(activeCategory.toLowerCase());
                });

            if (filtered.length === 0) {
                grid.innerHTML = `<div class="text-center py-12 text-slate-500">Tidak ada berita ditemukan untuk kategori ini.</div>`;
                return;
            }

            // Headline Item (First item)
            const headline = filtered[0];
            
            // Sidebar Items (Next 5 items)
            const sidebarItems = filtered.slice(1, 6);
            
            // Grid Items (All remaining items)
            const gridItems = filtered.slice(6);

            // Construct Top Layout (Headline + Sidebar)
            let topHtml = `
                <div class="grid lg:grid-cols-12 gap-8 mb-8">
                    <!-- Left: Headline Card -->
                    <div class="lg:col-span-8">
                        <article onclick="openNewsDetail(${headline.id})" class="relative rounded-3xl overflow-hidden shadow-xl border border-slate-200 dark:border-slate-800 group cursor-pointer h-[380px] sm:h-[450px] w-full flex flex-col justify-end">
                            <img src="${headline.image}" alt="${headline.title}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/60 to-transparent"></div>
                            
                            <div class="relative p-6 sm:p-10 space-y-3 z-10 text-white">
                                <div class="flex items-center gap-2">
                                    <span class="px-3 py-1 bg-red-700 text-white font-extrabold text-[10px] tracking-wider rounded-full uppercase">HEADLINE UTAMA</span>
                                    <span class="px-3 py-1 bg-amber-500 text-slate-950 font-extrabold text-[10px] tracking-wider rounded-full uppercase">${headline.category}</span>
                                    <span class="text-xs text-slate-300 font-semibold"><i class="far fa-calendar mr-1"></i> ${headline.date}</span>
                                </div>
                                <h1 class="text-xl sm:text-3xl font-extrabold text-white leading-tight line-clamp-2">
                                    ${headline.title}
                                </h1>
                                <p class="text-slate-300 text-xs sm:text-sm line-clamp-2 leading-relaxed">
                                    ${headline.summary}
                                </p>
                                <div class="pt-2 flex items-center justify-between">
                                    <span class="text-xs text-slate-400 font-medium">Humas Disdikbud Maluku � Berita Terkini</span>
                                    <span class="text-xs text-amber-400 hover:underline flex items-center gap-1 font-bold">Baca Selengkapnya <i class="fas fa-arrow-right"></i></span>
                                </div>
                            </div>
                        </article>
                    </div>

                    <!-- Right: Berita Terbaru Sidebar -->
                    <div class="lg:col-span-4 flex flex-col">
                        <div class="border-t-4 border-red-700 pt-3 mb-4">
                            <h3 class="text-lg font-black text-slate-900 dark:text-white uppercase tracking-wider">BERITA TERBARU</h3>
                        </div>
                        <div class="space-y-4 flex-1 overflow-y-auto max-h-[380px] pr-2 custom-scrollbar">
            `;

            sidebarItems.forEach(item => {
                topHtml += `
                    <div onclick="openNewsDetail(${item.id})" class="pb-3 border-b border-slate-100 dark:border-slate-800 cursor-pointer group">
                        <div class="flex gap-2 items-center text-[10px] mb-1">
                            <span class="text-red-700 dark:text-red-400 font-bold uppercase">Baru</span>
                            <span class="text-slate-400 font-semibold uppercase">${item.category}</span>
                            <span class="text-slate-400">� ${item.date}</span>
                        </div>
                        <h4 class="text-xs font-bold text-slate-800 dark:text-slate-200 group-hover:text-red-700 dark:group-hover:text-amber-400 transition-colors line-clamp-2 leading-snug">
                            ${item.title}
                        </h4>
                    </div>
                `;
            });

            topHtml += `
                        </div>
                    </div>
                </div>
            `;

            // Adsense Placeholder
            const adsenseHtml = `
                <div class="w-full bg-slate-100 dark:bg-slate-800/50 rounded-2xl p-4 border border-slate-200 dark:border-slate-700/80 text-center text-xs text-slate-400 font-mono my-8 uppercase tracking-widest">
                    RUANG IKLAN GOOGLE ADSENSE (728X90)
                </div>
            `;

            // Maluku Terkini Section (Remaining grid cards)
            let gridHeaderHtml = `
                <div class="flex items-center justify-between border-b border-slate-200 dark:border-slate-800 pb-3 mb-6 mt-12">
                    <h3 class="text-xl font-black text-slate-900 dark:text-white uppercase tracking-wider"><span class="border-b-4 border-red-700 pb-3">MALUKU TERKINI</span></h3>
                    <a href="#berita" class="text-xs text-red-700 dark:text-amber-400 font-bold hover:underline">Lihat Semua <i class="fas fa-chevron-right text-[10px]"></i></a>
                </div>
            `;

            let cardsHtml = `<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">`;
            if (gridItems.length === 0) {
                cardsHtml += `<div class="col-span-full text-center py-6 text-slate-500 text-xs">Semua berita telah ditampilkan di atas.</div>`;
            } else {
                gridItems.forEach(item => {
                    cardsHtml += `
                        <article class="bg-white dark:bg-slate-900 rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
                            <div>
                                <div class="relative overflow-hidden h-48">
                                    <img src="${item.image}" alt="${item.title}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    <span class="absolute top-3 left-3 bg-red-700 text-white font-extrabold text-[10px] tracking-wide uppercase px-2.5 py-1 rounded-md shadow">
                                        ${item.category}
                                    </span>
                                </div>
                                <div class="p-5 space-y-2">
                                    <div class="flex items-center text-xs text-slate-400 gap-3">
                                        <span><i class="far fa-calendar mr-1"></i> ${item.date}</span>
                                        <span><i class="far fa-clock mr-1"></i> ${item.readTime}</span>
                                    </div>
                                    <h3 class="font-bold text-slate-900 dark:text-white text-base group-hover:text-red-600 dark:group-hover:text-amber-400 transition-colors line-clamp-2">
                                        ${item.title}
                                    </h3>
                                    <p class="text-xs text-slate-600 dark:text-slate-400 line-clamp-2 leading-relaxed">
                                        ${item.summary}
                                    </p>
                                </div>
                            </div>
                            <div class="p-5 pt-0">
                                <button onclick="openNewsDetail(${item.id})" class="w-full py-2.5 rounded-xl bg-slate-100 dark:bg-slate-800 hover:bg-red-700 hover:text-white dark:hover:bg-amber-500 dark:hover:text-slate-950 font-bold text-xs text-slate-700 dark:text-slate-200 transition-colors flex items-center justify-center gap-2">
                                    <span>Baca Selengkapnya</span>
                                    <i class="fas fa-chevron-right text-[10px]"></i>
                                </button>
                            </div>
                        </article>
                    `;
                });
            }
            cardsHtml += `</div>`;

            // Append all to main container
            grid.innerHTML = topHtml + adsenseHtml + gridHeaderHtml + cardsHtml;
        }

        // Culture Grid Rendering
        function renderCultureGrid() {
            const container = document.getElementById('culture-grid');
            container.innerHTML = '';

            const filtered = activeCultureTab === 'all' 
                ? cultureData 
                : cultureData.filter(c => {
                    const t = (c.type || '').toLowerCase();
                    if (activeCultureTab === 'tarian') {
                        return t.includes('tari') || t.includes('seni') || t === 'tarian';
                    }
                    if (activeCultureTab === 'cagar') {
                        return t.includes('cagar') || t.includes('benteng') || t.includes('warisan') || t === 'cagar';
                    }
                    if (activeCultureTab === 'musik') {
                        return t.includes('musik') || t.includes('alat') || t.includes('tifa') || t === 'musik';
                    }
                    return t === activeCultureTab.toLowerCase();
                });

            filtered.forEach(item => {
                const el = document.createElement('div');
                el.className = "group relative rounded-2xl overflow-hidden border border-slate-800 bg-slate-950 h-72 shadow-lg";
                el.innerHTML = `
                    <img src="${item.image}" alt="${item.title}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-70">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
                    <div class="absolute bottom-0 inset-x-0 p-5 space-y-1">
                        <span class="text-[10px] text-amber-400 font-bold uppercase tracking-wider"><i class="fas fa-map-marker-alt mr-1"></i> ${item.location}</span>
                        <h4 class="text-lg font-extrabold text-white">${item.title}</h4>
                        <p class="text-xs text-slate-300 line-clamp-2 opacity-90">${item.desc}</p>
                    </div>
                `;
                container.appendChild(el);
            });
        }

        function filterNews(cat) {
            activeCategory = cat;
            const buttons = document.querySelectorAll('.cat-btn');
            buttons.forEach(btn => {
                btn.className = "cat-btn px-4 py-2 rounded-xl text-xs font-bold transition-all bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-300";
            });
            if (window.event && window.event.target) {
                window.event.target.className = "cat-btn active px-4 py-2 rounded-xl text-xs font-bold transition-all bg-red-700 text-white shadow";
            }
            renderNewsGrid();
        }

        function filterCulture(type) {
            activeCultureTab = type;
            const tabs = document.querySelectorAll('.culture-tab');
            tabs.forEach(t => {
                t.classList.remove('bg-amber-500', 'text-slate-950');
                t.classList.add('bg-slate-800', 'text-slate-300');
            });
            event.target.classList.remove('bg-slate-800', 'text-slate-300');
            event.target.classList.add('bg-amber-500', 'text-slate-950');
            renderCultureGrid();
        }

        // Modal Action Handlers
        function openNewsDetail(id) {
            const article = newsData.find(n => n.id === id) || {
                title: "Pengumuman Resmi Dinas Pendidikan",
                category: "Pengumuman",
                date: "21 Agustus 2026",
                readTime: "3 mnt baca",
                image: "https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=800&q=80",
                content: "<p>Informasi detail publikasi terkait layanan operasional dan surat edaran dinas dapat dilihat melalui bagian unduhan dokumen resmi.</p>"
            };

            const contentContainer = document.getElementById('modal-article-content');
            contentContainer.innerHTML = `
                <div class="space-y-4">
                    <span class="inline-block bg-red-700 text-white font-bold text-xs uppercase px-3 py-1 rounded-md">
                        ${article.category}
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white leading-tight">
                        ${article.title}
                    </h2>
                    <div class="flex items-center text-xs text-slate-500 space-x-4 border-b border-slate-200 dark:border-slate-800 pb-4">
                        <span><i class="far fa-user mr-1"></i> Humas Disdikbud Maluku</span>
                        <span><i class="far fa-calendar mr-1"></i> ${article.date}</span>
                        <span><i class="far fa-clock mr-1"></i> ${article.readTime}</span>
                    </div>
                    <img src="${article.image}" class="w-full h-64 sm:h-80 object-cover rounded-2xl my-4">
                    <div class="text-slate-700 dark:text-slate-300 text-sm sm:text-base leading-relaxed space-y-4">
                        ${article.content}
                    </div>
                    <div class="pt-6 border-t border-slate-200 dark:border-slate-800 flex justify-between items-center">
                        <span class="text-xs text-slate-500">Bagikan artikel ini:</span>
                        <div class="flex space-x-2">
                            <button onclick="shareArticle('${article.title}')" class="px-3 py-1.5 bg-slate-100 dark:bg-slate-800 rounded-lg text-xs font-bold hover:bg-red-700 hover:text-white transition-colors">
                                <i class="fas fa-share-alt mr-1"></i> Bagikan
                            </button>
                        </div>
                    </div>
                </div>
            `;

            document.getElementById('news-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeNewsModal() {
            document.getElementById('news-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function readFeaturedNews() {
            if (slides && slides[currentSlide] && slides[currentSlide].id) {
                openNewsDetail(slides[currentSlide].id);
            } else {
                openNewsDetail(1);
            }
        }

        
        function openAdminAuth() {
            if(sessionStorage.getItem('portal_admin') === 'disdikbud2026') {
                openAdminDashboard();
            } else {
                document.getElementById('admin-auth-modal').classList.remove('hidden');
            }
        }
        function closeAdminAuth() {
            document.getElementById('admin-auth-modal').classList.add('hidden');
        }
        function verifyAdminPass() {
            const val = document.getElementById('admin-pass').value;
            if(val === 'disdikbud2026') {
                sessionStorage.setItem('portal_admin', val);
                closeAdminAuth();
                openAdminDashboard();
            } else {
                alert('Password salah!');
            }
        }
        function openAdminDashboard() {
            document.getElementById('admin-dashboard-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            renderAdminTables();
        }
        function closeAdminDashboard() {
            document.getElementById('admin-dashboard-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        function switchAdminTab(tab) {
            document.getElementById('admin-tab-news').classList.add('hidden');
            document.getElementById('admin-tab-culture').classList.add('hidden');
            
            document.getElementById('tab-btn-news').className = "px-5 py-2.5 rounded-xl font-bold text-sm bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-300 dark:hover:bg-slate-700";
            document.getElementById('tab-btn-culture').className = "px-5 py-2.5 rounded-xl font-bold text-sm bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-300 dark:hover:bg-slate-700";
            
            document.getElementById('admin-tab-' + tab).classList.remove('hidden');
            document.getElementById('tab-btn-' + tab).className = "px-5 py-2.5 rounded-xl font-bold text-sm bg-red-700 text-white shadow";
        }
        
        function renderAdminTables() {
            let newsTbody = document.getElementById('admin-news-table-body');
            newsTbody.innerHTML = '';
            newsData.forEach(n => {
                let isFeaturedHtml = n.is_featured ? '<span class="text-amber-500 font-bold"><i class="fas fa-star"></i> Ya</span>' : '<span class="text-slate-400">Tidak</span>';
                newsTbody.innerHTML += `
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <td class="px-4 py-3 font-medium">${n.id}</td>
                        <td class="px-4 py-3 font-bold">${n.title}</td>
                        <td class="px-4 py-3 uppercase text-xs">${n.category}</td>
                        <td class="px-4 py-3 text-center">${isFeaturedHtml}</td>
                        <td class="px-4 py-3 text-center">
                            <button onclick="deleteAdminNews(${n.id})" class="p-2 rounded bg-red-100 text-red-600 hover:bg-red-600 hover:text-white transition-colors" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>`;
            });

            let cultTbody = document.getElementById('admin-culture-table-body');
            cultTbody.innerHTML = '';
            cultureData.forEach(c => {
                cultTbody.innerHTML += `
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <td class="px-4 py-3 font-bold">${c.title}</td>
                        <td class="px-4 py-3 uppercase text-xs">${c.type}</td>
                        <td class="px-4 py-3">${c.location}</td>
                        <td class="px-4 py-3 text-center">
                            <button onclick="deleteAdminCulture('${c.id}')" class="p-2 rounded bg-red-100 text-red-600 hover:bg-red-600 hover:text-white transition-colors" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>`;
            });
        }
        
        function getAuthHeaders() {
            return {
                'X-Anggaran-Password': sessionStorage.getItem('portal_admin')
            };
        }

        async function saveAdminNews() {
            let formData = new FormData();
            formData.append('title', document.getElementById('add-news-title').value);
            formData.append('category', document.getElementById('add-news-category').value);
            formData.append('summary', document.getElementById('add-news-summary').value);
            formData.append('content', document.getElementById('add-news-content').value);
            formData.append('is_featured', document.getElementById('add-news-featured').checked ? 1 : 0);
            
            let fileInput = document.getElementById('add-news-image');
            if(fileInput.files.length > 0) {
                let file = fileInput.files[0];
                if(file.size > 5 * 1024 * 1024) return alert("Ukuran foto maksimal 5 MB!");
                formData.append('image', file);
            }
            
            if(!formData.get('title')) return alert("Judul wajib diisi!");
            
            try {
                let res = await fetch('/api/portal/news', {
                    method: 'POST',
                    headers: getAuthHeaders(),
                    body: formData
                });
                if(res.ok) {
                    alertModal("Berita berhasil ditambahkan! Memuat ulang portal...");
                    setTimeout(() => window.location.reload(), 1000);
                } else {
                    alert("Akses ditolak atau terjadi kesalahan saat mengunggah.");
                }
            } catch(e) { console.error(e); }
        }

        async function deleteAdminNews(id) {
            if(!confirm("Yakin ingin menghapus berita ini?")) return;
            try {
                let res = await fetch('/api/portal/news/' + id, {
                    method: 'DELETE',
                    headers: { 'Content-Type': 'application/json', 'X-Anggaran-Password': sessionStorage.getItem('portal_admin') }
                });
                if(res.ok) {
                    alertModal("Berita dihapus!");
                    setTimeout(() => window.location.reload(), 800);
                }
            } catch(e) { console.error(e); }
        }

        async function saveAdminCulture() {
            let formData = new FormData();
            formData.append('title', document.getElementById('add-cult-title').value);
            formData.append('type', document.getElementById('add-cult-type').value);
            formData.append('location', document.getElementById('add-cult-location').value);
            formData.append('desc', document.getElementById('add-cult-desc').value);
            
            let fileInput = document.getElementById('add-cult-image');
            if(fileInput.files.length > 0) {
                let file = fileInput.files[0];
                if(file.size > 5 * 1024 * 1024) return alert("Ukuran foto maksimal 5 MB!");
                formData.append('image', file);
            }
            
            if(!formData.get('title')) return alert("Nama Kebudayaan wajib diisi!");
            
            try {
                let res = await fetch('/api/portal/culture', {
                    method: 'POST',
                    headers: getAuthHeaders(),
                    body: formData
                });
                if(res.ok) {
                    alertModal("Data Kebudayaan ditambahkan! Memuat ulang...");
                    setTimeout(() => window.location.reload(), 1000);
                } else {
                    alert("Akses ditolak atau terjadi kesalahan saat mengunggah.");
                }
            } catch(e) { console.error(e); }
        }

        async function deleteAdminCulture(id) {
            if(!confirm("Yakin ingin menghapus cagar budaya ini?")) return;
            try {
                let res = await fetch('/api/portal/culture/' + id, {
                    method: 'DELETE',
                    headers: { 'Content-Type': 'application/json', 'X-Anggaran-Password': sessionStorage.getItem('portal_admin') }
                });
                if(res.ok) {
                    alertModal("Data dihapus!");
                    setTimeout(() => window.location.reload(), 800);
                }
            } catch(e) { console.error(e); }
        }
        
        function toggleSearchModal() {
            const modal = document.getElementById('search-modal');
            modal.classList.toggle('hidden');
            if (!modal.classList.contains('hidden')) {
                document.getElementById('modal-search-input').focus();
            }
        }

        function handleModalSearch() {
            const query = document.getElementById('modal-search-input').value.toLowerCase().trim();
            const container = document.getElementById('search-results-container');
            container.innerHTML = '';

            if (query.length < 2) {
                container.innerHTML = '<div class="text-slate-400 text-xs text-center py-4">Ketik minimal 2 karakter untuk mencari...</div>';
                return;
            }

            const results = newsData.filter(item => 
                item.title.toLowerCase().includes(query) || 
                item.summary.toLowerCase().includes(query) ||
                item.category.toLowerCase().includes(query)
            );

            if (results.length === 0) {
                container.innerHTML = '<div class="text-slate-400 text-xs text-center py-4">Tidak ditemukan hasil yang cocok.</div>';
                return;
            }

            results.forEach(item => {
                const itemEl = document.createElement('div');
                itemEl.className = "p-3 bg-slate-800 hover:bg-slate-700 rounded-xl cursor-pointer transition-colors text-white flex items-center justify-between";
                itemEl.onclick = () => {
                    toggleSearchModal();
                    openNewsDetail(item.id);
                };
                itemEl.innerHTML = `
                    <div>
                        <h5 class="text-xs font-bold text-amber-400">${item.title}</h5>
                        <p class="text-[11px] text-slate-300 line-clamp-1">${item.summary}</p>
                    </div>
                    <i class="fas fa-chevron-right text-xs text-slate-500 ml-2"></i>
                `;
                container.appendChild(itemEl);
            });
        }

        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const icon = document.getElementById('menu-icon');
            menu.classList.toggle('hidden');
            if (menu.classList.contains('hidden')) {
                icon.className = 'fas fa-bars text-xl';
            } else {
                icon.className = 'fas fa-times text-xl';
            }
        }

        function openServiceModal(serviceName) {
            alertModal(`Layanan "${serviceName}" siap diakses. Anda akan diarahkan ke sistem otentikasi portal terpadu.`);
        }

        function downloadDoc(filename) {
            alertModal(`Mengunduh dokumen resmi: ${filename}`);
        }

        function shareArticle(title) {
            if (navigator.clipboard) {
                navigator.clipboard.writeText(window.location.href);
                alertModal('Tautan artikel berhasil disalin ke clipboard!');
            } else {
                alertModal('Bagikan artikel: ' + title);
            }
        }

        function alertModal(message) {
            const alertBox = document.createElement('div');
            alertBox.className = "fixed bottom-6 right-6 z-50 bg-slate-900 text-white px-5 py-4 rounded-2xl shadow-2xl border border-amber-500/40 flex items-center gap-3 animate-bounce";
            alertBox.innerHTML = `
                <i class="fas fa-info-circle text-amber-400 text-lg"></i>
                <span class="text-xs font-medium max-w-xs">${message}</span>
                <button onclick="this.parentElement.remove()" class="ml-2 text-slate-400 hover:text-white"><i class="fas fa-times"></i></button>
            `;
            document.body.appendChild(alertBox);
            setTimeout(() => alertBox.remove(), 5000);
        }

        function loadMoreNews() {
            const spinner = document.getElementById('load-spinner');
            const btn = document.getElementById('load-more-btn');
            spinner.classList.remove('hidden');
            btn.disabled = true;

            setTimeout(() => {
                spinner.classList.add('hidden');
                btn.disabled = false;
                alertModal('Semua berita terbaru saat ini telah ditampilkan.');
            }, 1200);
        }

        function changeFontSize(delta) {
            const currentSize = parseFloat(window.getComputedStyle(document.body).fontSize);
            const newSize = Math.max(12, Math.min(20, currentSize + delta));
            document.body.style.fontSize = newSize + 'px';
        }
    </script>
    
    <!-- Kotak Kembali ke Aplikasi Utama -->
    <a href="/" class="fixed bottom-6 right-6 z-50 bg-white dark:bg-slate-800 text-slate-800 dark:text-white px-5 py-3 rounded-2xl shadow-2xl border border-slate-200 dark:border-slate-700 hover:border-red-500 hover:shadow-red-500/20 flex items-center justify-center gap-3 transition-all group font-bold text-sm">
        <div class="w-8 h-8 rounded-full bg-red-100 dark:bg-red-900/50 text-red-600 dark:text-red-400 flex items-center justify-center group-hover:scale-110 transition-transform">
            <i class="fas fa-arrow-left"></i>
        </div>
        <span>Kembali ke Beranda Utama</span>
    </a>
</body>
</html>





