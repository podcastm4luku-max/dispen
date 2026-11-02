<!DOCTYPE html>
<html lang="id-ID" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinas Pendidikan dan Kebudayaan Provinsi Maluku</title>
    <meta name="description" content="Website resmi Dinas Pendidikan dan Kebudayaan Provinsi Maluku. Pusat informasi pendidikan, transparansi publik, dan layanan masyarakat.">
    <link rel="icon" type="image/png" href="{{ asset('images/logo-maluku.png') }}?v={{ filemtime(public_path('images/logo-maluku.png')) }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v={{ filemtime(public_path('favicon.ico')) }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Merriweather:wght@700;900&display=swap" rel="stylesheet">
    
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Konfigurasi Tema Tailwind Kustom untuk Pemerintah Provinsi -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Merriweather', 'serif'], // Untuk heading khusus/sambutan
                    },
                    colors: {
                        dikbud: {
                            dark: '#0f172a',    // slate-900 - Header/Footer
                            primary: '#1e3a8a', // blue-900 - Warna Utama
                            secondary: '#2563eb',// blue-600 - Hover/Aksen
                            accent: '#f59e0b',  // amber-500 - Warna Emas Maluku
                            light: '#f8fafc',   // slate-50 - Background
                        }
                    },
                    boxShadow: {
                        'soft': '0 4px 20px -2px rgba(0, 0, 0, 0.05)',
                        'glow': '0 0 15px rgba(37, 99, 235, 0.3)',
                    }
                }
            }
        }
    </script>
    <style>
        /* Animasi Kustom */
        .fade-in { animation: fadeIn 0.5s ease-in; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #94a3b8; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #475569; }

        /* Dropdown Hover Logic for Desktop */
        @media (min-width: 1024px) {
            .nav-item:hover .dropdown-menu { display: block; }
        }
        
        /* Banner Pattern */
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="bg-dikbud-light text-slate-800 antialiased selection:bg-dikbud-accent selection:text-white">

    <!-- Top Bar (Pemerintah Provinsi) -->
    <div class="bg-dikbud-dark text-slate-300 text-xs py-2 hidden md:block">
        <div class="w-full px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <span class="flex items-center gap-1"><span class="material-icons-outlined text-[14px]">public</span> Portal Resmi Dinas Pendidikan & Kebudayaan Provinsi Maluku</span>
                <span class="flex items-center gap-1"><span class="material-icons-outlined text-[14px]">contact_support</span> Call Center: 1500-XXX</span>
            </div>
            <div class="flex items-center gap-4">
                <a href="/login" class="hover:text-white flex items-center gap-1 transition-colors"><span class="material-icons-outlined text-[14px]">login</span> Login Admin / CMS</a>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="sticky top-0 w-full z-50 bg-white border-b border-slate-200 shadow-sm transition-all duration-300" id="navbar">
        <div class="w-full px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo & Text (Left) -->
                <div class="flex-1 flex items-center justify-start">
                    <div class="flex-shrink-0 flex items-center gap-3">
                        <!-- Placeholder Logo Garuda/Pemprov -->
                        <img src="{{ asset('images/logo-maluku.png') }}?v={{ filemtime(public_path('images/logo-maluku.png')) }}" alt="Logo Maluku" class="w-12 h-12 object-contain drop-shadow-md">
                        <div class="flex flex-col">
                            <span class="font-bold text-dikbud-primary text-sm sm:text-base leading-tight">DINAS PENDIDIKAN & KEBUDAYAAN</span>
                            <span class="font-medium text-slate-500 text-xs sm:text-sm leading-tight">PROVINSI MALUKU</span>
                        </div>
                    </div>
                </div>

                <!-- Desktop Menu (Center) -->
                <div class="hidden lg:flex items-center justify-center h-full space-x-1">
                    <a href="#" class="px-3 py-2 text-sm font-semibold text-dikbud-primary border-b-2 border-dikbud-primary">Beranda</a>
                    
                    <!-- Profil Dropdown -->
                    <div class="nav-item relative h-full flex items-center">
                        <button class="px-3 py-2 text-sm font-semibold text-slate-600 hover:text-dikbud-secondary flex items-center gap-1 transition-colors">
                            Profil OPD <span class="material-icons-outlined text-[16px]">expand_more</span>
                        </button>
                        <div class="dropdown-menu absolute top-full left-0 w-56 bg-white border border-slate-200 shadow-xl rounded-b-lg hidden overflow-hidden">
                            <a href="#" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary border-b border-slate-100">Sejarah Dinas</a>
                            <a href="{{ url('/visi-misi') }}" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary border-b border-slate-100">Visi dan Misi</a>
                            <a href="{{ url('/tugas-fungsi') }}" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary border-b border-slate-100">Tugas dan Fungsi</a>
                            <a href="{{ url('/struktur-organisasi') }}" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary border-b border-slate-100">Struktur Organisasi</a>
                            <a href="#" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary">Profil Pejabat</a>
                        </div>
                    </div>

                    <!-- Informasi Dropdown -->
                    <div class="nav-item relative h-full flex items-center">
                        <button class="px-3 py-2 text-sm font-semibold text-slate-600 hover:text-dikbud-secondary flex items-center gap-1 transition-colors">
                            Berita & Info <span class="material-icons-outlined text-[16px]">expand_more</span>
                        </button>
                        <div class="dropdown-menu absolute top-full left-0 w-56 bg-white border border-slate-200 shadow-xl rounded-b-lg hidden overflow-hidden">
                            <a href="/berita-terkini" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary border-b border-slate-100">Berita Dinas</a>
                            <a href="/berita-terkini#pengumuman" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary border-b border-slate-100">Pengumuman</a>
                            <a href="#" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary border-b border-slate-100">Press Release</a>
                            <a href="#galeri" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary">Dokumentasi Kegiatan</a>
                        </div>
                    </div>

                    <!-- Transparansi Dropdown -->
                    <div class="nav-item relative h-full flex items-center">
                        <button class="px-3 py-2 text-sm font-semibold text-slate-600 hover:text-dikbud-secondary flex items-center gap-1 transition-colors">
                            Transparansi <span class="material-icons-outlined text-[16px]">expand_more</span>
                        </button>
                        <div class="dropdown-menu absolute top-full left-0 w-64 bg-white border border-slate-200 shadow-xl rounded-b-lg hidden overflow-hidden">
                            <a href="{{ url('/ppid') }}" class="block px-4 py-3 text-sm font-bold text-dikbud-primary bg-slate-50 border-b border-slate-200">Daftar Informasi Publik (PPID)</a>
                            <a href="{{ url('/dokumen-peraturan') }}" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary border-b border-slate-100 flex items-center justify-between">
                                <span>Download Dokumen Publik</span>
                                <span class="material-icons-outlined text-[16px] text-dikbud-secondary">file_download</span>
                            </a>
                            <a href="#transparansi" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary border-b border-slate-100">Informasi Berkala</a>
                            <a href="#transparansi" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary border-b border-slate-100">Informasi Setiap Saat & Serta Merta</a>
                            <a href="{{ url('/dokumen-peraturan') }}" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary border-b border-slate-100">Dokumen Peraturan & Laporan</a>
                            <a href="/anggaran" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary">Informasi Anggaran</a>
                        </div>
                    </div>

                    <!-- Layanan Dropdown -->
                    <div class="nav-item relative h-full flex items-center">
                        <button class="px-3 py-2 text-sm font-semibold text-slate-600 hover:text-dikbud-secondary flex items-center gap-1 transition-colors">
                            Layanan <span class="material-icons-outlined text-[16px]">expand_more</span>
                        </button>
                        <div class="dropdown-menu absolute top-full right-0 w-56 bg-white border border-slate-200 shadow-xl rounded-b-lg hidden overflow-hidden">
                            <a href="#monev" class="block px-4 py-3 text-sm font-bold text-dikbud-primary hover:bg-slate-50 border-b border-slate-100 flex justify-between items-center transition-colors">Dashboard Monev <span class="material-icons-outlined text-[16px]">analytics</span></a>
                            <a href="/pengaduan" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary border-b border-slate-100 transition-colors">Formulir Pengaduan</a>
                            <a href="/ppid" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary border-b border-slate-100 transition-colors">Permohonan Informasi</a>
                            <a href="/standar-pelayanan" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary border-b border-slate-100 transition-colors">Standar & Prosedur Pelayanan</a>
                            <a href="/skm" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary transition-colors">Survei Kepuasan Masyarakat</a>
                        </div>
                    </div>

                    <!-- Galeri Dropdown / Link (Setelah Layanan) -->
                    <div class="nav-item relative h-full flex items-center">
                        <a href="{{ url('/galeri') }}" class="px-3 py-2 text-sm font-semibold text-slate-600 hover:text-dikbud-secondary flex items-center gap-1 transition-colors">
                            Galeri Foto <span class="material-icons-outlined text-[16px]">expand_more</span>
                        </a>
                        <div class="dropdown-menu absolute top-full right-0 w-56 bg-white border border-slate-200 shadow-xl rounded-b-lg hidden overflow-hidden">
                            <a href="{{ url('/galeri') }}" class="block px-4 py-3 text-sm font-bold text-dikbud-primary hover:bg-slate-50 border-b border-slate-100 transition-colors">Semua Galeri Multimedia</a>
                            <a href="{{ route('galeri', ['type' => 'foto']) }}" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary border-b border-slate-100 transition-colors flex items-center gap-2"><span class="material-icons text-sm text-blue-600">photo_camera</span> Galeri Foto Kegiatan</a>
                            <a href="{{ route('galeri', ['type' => 'video']) }}" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary transition-colors flex items-center gap-2"><span class="material-icons text-sm text-red-600">videocam</span> Galeri Video & Liputan</a>
                        </div>
                    </div>

                    <!-- Media Sosial Dropdown (di samping Galeri Foto) -->
                    <div class="nav-item relative h-full flex items-center">
                        <button class="px-3 py-2 text-sm font-semibold text-slate-600 hover:text-dikbud-secondary flex items-center gap-1 transition-colors">
                            <span class="material-icons-outlined text-[16px] text-pink-600">share</span> Media Sosial <span class="material-icons-outlined text-[16px]">expand_more</span>
                        </button>
                        <div class="dropdown-menu absolute top-full right-0 w-64 bg-white border border-slate-200 shadow-xl rounded-b-lg hidden overflow-hidden z-50">
                            <div class="px-4 py-2.5 bg-slate-50 border-b border-slate-200 text-xs font-bold text-slate-500 uppercase tracking-wider flex items-center justify-between">
                                <span>Media Sosial Resmi</span>
                                <span class="text-[10px] text-slate-400 font-normal">Disdikbud Maluku</span>
                            </div>
                            @if(isset($socialMediaLinks) && $socialMediaLinks->count() > 0)
                                @foreach($socialMediaLinks as $sosmed)
                                <a href="{{ $sosmed->url }}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 border-b border-slate-100 last:border-0 transition-colors group">
                                    <span class="w-8 h-8 rounded-lg flex items-center justify-center text-white shadow-sm transition-transform group-hover:scale-110 {{ $sosmed->badge_bg_class }}">
                                        <i class="{{ $sosmed->icon_class }} text-sm"></i>
                                    </span>
                                    <div class="flex flex-col flex-1 min-w-0">
                                        <span class="font-semibold text-xs text-slate-800 group-hover:text-dikbud-primary truncate">{{ $sosmed->name }}</span>
                                        <span class="text-[11px] text-slate-400 truncate">{{ $sosmed->username ?: $sosmed->url }}</span>
                                    </div>
                                    <span class="material-icons-outlined text-slate-400 text-[14px] group-hover:translate-x-0.5 transition-transform">open_in_new</span>
                                </a>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- Search Button -->
                    <button class="ml-4 p-2 text-slate-500 hover:text-dikbud-primary transition-colors">
                        <span class="material-icons">search</span>
                    </button>
                </div>

                <!-- Right Balance & Mobile Menu Button -->
                <div class="flex-1 flex items-center justify-end">
                    <div class="lg:hidden">
                        <button id="mobile-menu-btn" class="text-slate-600 hover:text-dikbud-primary focus:outline-none p-2">
                            <span class="material-icons text-3xl">menu</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu (Hidden by default) -->
        <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-slate-200 h-screen overflow-y-auto pb-24">
            <div class="px-4 py-4 space-y-1">
                <a href="#" class="block px-3 py-3 rounded-md text-base font-bold text-dikbud-primary bg-slate-50">Beranda</a>
                <div class="border-b border-slate-100 py-2">
                    <p class="px-3 py-2 text-sm font-semibold text-slate-400 uppercase tracking-wider">Profil OPD</p>
                    <a href="{{ url('/visi-misi') }}" class="block px-3 py-2 text-base text-slate-600 hover:text-dikbud-primary">Visi dan Misi</a>
                </div>
                <div class="border-b border-slate-100 py-2">
                    <p class="px-3 py-2 text-sm font-semibold text-slate-400 uppercase tracking-wider">Informasi Publik & Transparansi</p>
                    <a href="/berita-terkini" class="block px-3 py-2 text-base text-slate-600 hover:text-dikbud-primary">Berita & Pengumuman</a>
                    <a href="{{ url('/ppid') }}" class="block px-3 py-2 text-base text-slate-600 hover:text-dikbud-primary">Daftar Dokumen Publik (PPID)</a>
                    <a href="{{ url('/dokumen-peraturan') }}" class="block px-3 py-2 text-base text-slate-600 hover:text-dikbud-primary flex items-center justify-between">
                        <span>Unduh / Download Dokumen</span>
                        <span class="material-icons-outlined text-[18px] text-dikbud-secondary">file_download</span>
                    </a>
                </div>
                <div class="py-2">
                    <p class="px-3 py-2 text-sm font-semibold text-slate-400 uppercase tracking-wider">Layanan Masyarakat</p>
                    <a href="/pengaduan" class="block px-3 py-2 text-base text-slate-600 hover:text-dikbud-primary">Buat Pengaduan</a>
                    <a href="/ppid" class="block px-3 py-2 text-base text-slate-600 hover:text-dikbud-primary">Permohonan Informasi</a>
                    <a href="/standar-pelayanan" class="block px-3 py-2 text-base text-slate-600 hover:text-dikbud-primary">Standar & Prosedur Pelayanan</a>
                    <a href="/skm" class="block px-3 py-2 text-base text-slate-600 hover:text-dikbud-primary">Survei Kepuasan Masyarakat</a>
                </div>
                <div class="py-2 border-t border-slate-100">
                    <p class="px-3 py-2 text-sm font-semibold text-slate-400 uppercase tracking-wider">Dokumentasi</p>
                    <a href="{{ url('/galeri') }}" class="block px-3 py-2 text-base text-slate-600 hover:text-dikbud-primary flex items-center justify-between">
                        <span>Galeri Foto & Video</span>
                        <span class="material-icons-outlined text-[18px] text-dikbud-primary">collections</span>
                    </a>
                </div>
                <div class="py-2 border-t border-slate-100">
                    <p class="px-3 py-2 text-sm font-semibold text-slate-400 uppercase tracking-wider">Media Sosial Resmi</p>
                    @if(isset($socialMediaLinks) && $socialMediaLinks->count() > 0)
                        @foreach($socialMediaLinks as $sosmed)
                        <a href="{{ $sosmed->url }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-between px-3 py-2.5 text-base text-slate-600 hover:text-dikbud-primary">
                            <span class="flex items-center gap-2.5 text-sm font-medium">
                                <span class="w-6 h-6 rounded flex items-center justify-center text-white text-xs {{ $sosmed->badge_bg_class }}">
                                    <i class="{{ $sosmed->icon_class }}"></i>
                                </span>
                                {{ $sosmed->name }}
                            </span>
                            <span class="material-icons-outlined text-[16px] text-slate-400">open_in_new</span>
                        </a>
                        @endforeach
                    @endif
                </div>
                <a href="/login" class="block mt-6 px-3 py-3 rounded-lg text-center text-base font-bold bg-dikbud-primary text-white">Login Administrator</a>
            </div>
        </div>
    </nav>

    <!-- Running Text Informasi Resmi / Pengumuman -->
    <div class="bg-gradient-to-r from-slate-900 via-blue-950 to-slate-900 text-white border-y border-amber-500/30 shadow-md relative z-30">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 flex items-center py-2 sm:py-2.5 gap-3 sm:gap-4">
            <div class="flex-shrink-0 flex items-center gap-1.5 bg-amber-500 text-slate-950 px-3 py-1 rounded-full font-black text-[11px] sm:text-xs uppercase tracking-wider shadow-sm">
                <span class="material-icons text-[15px] animate-pulse">campaign</span>
                <span class="whitespace-nowrap">Sekilas Info</span>
            </div>
            <div class="flex-1 overflow-hidden flex items-center">
                <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="5" direction="left" class="cursor-pointer">
                    <span class="inline-flex items-center text-xs sm:text-sm font-semibold tracking-wide text-slate-100">
                        <span class="text-amber-400 font-bold mr-3">✦</span>
                        <span class="text-white">Selamat Datang di Website Resmi Dinas Pendidikan dan Kebudayaan Provinsi Maluku — Bersama Mewujudkan Pendidikan Maluku yang Berkualitas, Merata, Inklusif, dan Berdaya Saing.</span>
                        <span class="text-amber-400 font-bold mx-8">✦</span>
                        <span class="text-white">Selamat Datang di Website Resmi Dinas Pendidikan dan Kebudayaan Provinsi Maluku — Bersama Mewujudkan Pendidikan Maluku yang Berkualitas, Merata, Inklusif, dan Berdaya Saing.</span>
                        <span class="text-amber-400 font-bold mx-8">✦</span>
                    </span>
                </marquee>
            </div>
        </div>
    </div>

    <!-- Hero / Banner Section with Dynamic Multi-Slide -->
    <section id="hero-slider" class="relative bg-dikbud-dark overflow-hidden min-h-[580px] lg:min-h-[620px] flex items-center group">
        <!-- Slide 0: Dasboar Utama & Sambutan Kepala Dinas (Halaman Pertama) -->
        <div class="hero-slide-item w-full relative transition-opacity duration-700 ease-in-out opacity-100 z-10" data-slide-index="0">
            <!-- Simulated Slider Background -->
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-dikbud-primary/90 mix-blend-multiply z-10"></div>
                <div class="absolute inset-0 bg-pattern opacity-20 z-10"></div>
                <!-- Fallback solid color -->
                <div class="w-full h-full bg-slate-800"></div>
            </div>

            <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 flex flex-col md:flex-row items-center gap-10">
                <!-- Text Content -->
                <div class="w-full md:w-3/5 text-center md:text-left fade-in">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/10 border border-white/20 text-dikbud-accent text-xs font-semibold mb-6 backdrop-blur-sm">
                        <span class="material-icons-outlined text-[14px]">campaign</span> {{ $heroSetting->campaign_badge ?? 'Dinas Pendidikan & kebudayaan Prov. Maluku' }}
                    </div>
                    <h1 class="text-3xl md:text-5xl lg:text-6xl font-black text-white leading-tight mb-6">
                        @if(isset($heroSetting) && !empty($heroSetting->title_highlight) && str_contains($heroSetting->title ?? '', $heroSetting->title_highlight))
                            {!! str_replace($heroSetting->title_highlight, '<span class="text-transparent bg-clip-text bg-gradient-to-r from-dikbud-accent to-yellow-200">' . e($heroSetting->title_highlight) . '</span>', e($heroSetting->title)) !!}
                        @else
                            {{ $heroSetting->title ?? 'Mewujudkan Pendidikan Berkualitas & Merata di Bumi Raja-Raja.' }}
                        @endif
                    </h1>
                    <p class="text-base md:text-lg text-slate-300 mb-8 max-w-2xl leading-relaxed">
                        {{ $heroSetting->description ?? 'Portal resmi informasi pendidikan, kebudayaan, pelayanan publik, dan transparansi anggaran Dinas Pendidikan dan Kebudayaan Provinsi Maluku.' }}
                    </p>
                    <div class="flex flex-wrap justify-center md:justify-start gap-4">
                        <a href="{{ $heroSetting->btn1_url ?? '#layanan' }}" class="px-6 py-3 rounded-lg font-bold bg-dikbud-accent text-dikbud-dark hover:bg-yellow-400 transition-colors shadow-lg flex items-center gap-2">
                            <span class="material-icons-outlined">apps</span> {{ $heroSetting->btn1_text ?? 'Layanan Digital' }}
                        </a>
                        <a href="{{ $heroSetting->btn2_url ?? '#transparansi' }}" class="px-6 py-3 rounded-lg font-bold bg-white/10 text-white hover:bg-white/20 border border-white/20 backdrop-blur-sm transition-colors flex items-center gap-2">
                            <span class="material-icons-outlined">policy</span> {{ $heroSetting->btn2_text ?? 'Transparansi Publik' }}
                        </a>
                    </div>
                </div>

                <!-- Sambutan Kepala OPD (Floating Card) -->
                <div class="w-full md:w-2/5 fade-in" style="animation-delay: 0.2s;">
                    <div class="bg-white rounded-2xl p-6 shadow-2xl relative border-t-4 border-dikbud-secondary">
                        <div class="absolute -top-10 right-6 w-20 h-20 bg-slate-200 rounded-xl border-4 border-white shadow-lg overflow-hidden flex items-center justify-center">
                            @php
                                $kadisPhoto = $heroSetting->kadis_photo ?? '/images/kadin-sarlota.webp';
                                if (!str_starts_with($kadisPhoto, 'http') && !str_starts_with($kadisPhoto, '/')) {
                                    $kadisPhoto = '/' . $kadisPhoto;
                                }
                            @endphp
                            <img src="{{ asset($kadisPhoto) }}" alt="{{ $heroSetting->kadis_name ?? 'Dr. Sarlota Singerin, S.Pd., M.Pd' }}" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-lg font-bold text-dikbud-primary mb-1 mt-2">{{ $heroSetting->kadis_name ?? 'Dr. Sarlota Singerin, S.Pd., M.Pd' }}</h3>
                        <p class="text-xs text-slate-500 font-semibold mb-4 uppercase tracking-wider">{{ $heroSetting->kadis_position ?? 'Kepala Dinas Pendidikan & Kebudayaan' }}</p>
                        
                        <div class="relative">
                            <span class="material-icons absolute -top-2 -left-2 text-slate-200 text-3xl z-0 transform rotate-180">format_quote</span>
                            <p class="text-slate-600 text-sm leading-relaxed relative z-10 italic font-serif">
                                "{{ $heroSetting->kadis_quote ?? 'Selamat datang di portal resmi kami. Kami berkomitmen menyelenggarakan pelayanan publik yang informatif, transparan, dan akuntabel demi kemajuan pendidikan dan pelestarian kebudayaan di Provinsi Maluku.' }}"
                            </p>
                        </div>
                        <a href="{{ $heroSetting->kadis_button_link ?? '#' }}" class="mt-4 text-sm font-semibold text-dikbud-secondary hover:text-dikbud-primary flex items-center gap-1">
                            {{ $heroSetting->kadis_button_text ?? 'Baca Selengkapnya' }} <span class="material-icons text-[16px]">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dynamic Photo Slides from Database (Full Image Background: Tidak Terpotong & Menampilkan Gambar Utuh) -->
        @if(isset($heroSlides) && $heroSlides->isNotEmpty())
            @foreach($heroSlides as $idx => $hSlide)
            <div class="hero-slide-item w-full absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none z-0 overflow-hidden bg-slate-950" data-slide-index="{{ $idx + 1 }}">
                <!-- Ambient Backdrop: Mengisi 100% Seluruh Layar dengan Ekstensi Warna Asli Foto (Blur Alami Tanpa Batas) -->
                <div class="absolute inset-0 overflow-hidden select-none pointer-events-none z-0">
                    <img src="{{ $hSlide->image }}" alt="" aria-hidden="true" class="w-full h-full object-cover object-center blur-2xl scale-110 opacity-70">
                    <div class="absolute inset-0 bg-slate-950/20"></div>
                </div>

                <!-- Foto Asli: 100% UTUH, FULL GAMBAR, TIDAK TERPOTONG SAMA SEKALI (Object Contain Bebas Potongan) -->
                @if($hSlide->button_link && $hSlide->button_link != '#' && $hSlide->button_link != '')
                <a href="{{ $hSlide->button_link }}" class="relative z-10 w-full h-full flex items-center justify-center cursor-pointer group/slide" title="{{ $hSlide->title }}">
                    <img src="{{ $hSlide->image }}" alt="{{ $hSlide->title }}" class="w-full h-full object-contain object-center select-none transform transition-transform duration-700 group-hover/slide:scale-[1.01]">
                </a>
                @else
                <div class="relative z-10 w-full h-full flex items-center justify-center">
                    <img src="{{ $hSlide->image }}" alt="{{ $hSlide->title }}" class="w-full h-full object-contain object-center select-none">
                </div>
                @endif
            </div>
            @endforeach
        @endif

        <!-- Navigation Arrows -->
        <button onclick="prevHeroSlide()" class="absolute left-3 sm:left-6 top-1/2 -translate-y-1/2 z-30 w-11 h-11 rounded-full bg-black/40 hover:bg-dikbud-primary text-white border border-white/20 backdrop-blur-md flex items-center justify-center transition-all shadow-lg hover:scale-110 opacity-75 group-hover:opacity-100" title="Slide Sebelumnya">
            <span class="material-icons text-2xl">chevron_left</span>
        </button>
        <button onclick="nextHeroSlide()" class="absolute right-3 sm:right-6 top-1/2 -translate-y-1/2 z-30 w-11 h-11 rounded-full bg-black/40 hover:bg-dikbud-primary text-white border border-white/20 backdrop-blur-md flex items-center justify-center transition-all shadow-lg hover:scale-110 opacity-75 group-hover:opacity-100" title="Slide Selanjutnya">
            <span class="material-icons text-2xl">chevron_right</span>
        </button>

        <!-- Bottom Slide Indicators / Dots -->
        <div class="absolute bottom-5 inset-x-0 z-30 flex justify-center items-center gap-2.5" id="hero-slider-dots">
            <button onclick="goToHeroSlide(0)" class="hero-dot w-8 h-2.5 rounded-full bg-dikbud-accent transition-all shadow" title="Beranda Utama"></button>
            @if(isset($heroSlides) && $heroSlides->isNotEmpty())
                @foreach($heroSlides as $idx => $hSlide)
                <button onclick="goToHeroSlide({{ $idx + 1 }})" class="hero-dot w-2.5 h-2.5 rounded-full bg-white/40 hover:bg-white/70 transition-all shadow" title="Slide Foto {{ $idx + 1 }}"></button>
                @endforeach
            @endif
        </div>
    </section>

    <!-- Direktori Layanan Cepat (Quick Links) -->
    <section class="relative -mt-8 z-30 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
        <div class="bg-white rounded-xl shadow-soft border border-slate-100 p-2 sm:p-4">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-2 sm:gap-4">
                <a href="/portal-resmi" class="flex flex-col items-center p-4 rounded-lg hover:bg-slate-50 transition-colors group text-center">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                        <span class="material-icons">school</span>
                    </div>
                    <span class="text-xs font-bold text-slate-700">Kunjungi Portal Berita & Informasi Disdikbud Maluku</span>
                </a>
                <a href="/ppid" class="flex flex-col items-center p-4 rounded-lg hover:bg-slate-50 transition-colors group text-center">
                    <div class="w-12 h-12 bg-green-50 text-green-600 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                        <span class="material-icons">description</span>
                    </div>
                    <span class="text-xs font-bold text-slate-700">Permohonan Info</span>
                </a>
                <a href="/pengaduan" class="flex flex-col items-center p-4 rounded-lg hover:bg-slate-50 transition-colors group text-center">
                    <div class="w-12 h-12 bg-red-50 text-red-600 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                        <span class="material-icons">campaign</span>
                    </div>
                    <span class="text-xs font-bold text-slate-700">Lapor / Pengaduan</span>
                </a>
                <a href="{{ url('/dokumen-peraturan') }}" class="flex flex-col items-center p-4 rounded-lg hover:bg-slate-50 transition-colors group text-center">
                    <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                        <span class="material-icons">account_balance_wallet</span>
                    </div>
                    <span class="text-xs font-bold text-slate-700">Dokumen Peraturan</span>
                </a>
                <a href="/standar-pelayanan" class="flex flex-col items-center p-4 rounded-lg hover:bg-slate-50 transition-colors group text-center">
                    <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                        <span class="material-icons">rule</span>
                    </div>
                    <span class="text-xs font-bold text-slate-700">Standar Pelayanan</span>
                </a>
                <a href="/skm" class="flex flex-col items-center p-4 rounded-lg hover:bg-slate-50 transition-colors group text-center hidden md:flex">
                    <div class="w-12 h-12 bg-teal-50 text-teal-600 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                        <span class="material-icons">question_answer</span>
                    </div>
                    <span class="text-xs font-bold text-slate-700">Survei Kepuasan Masyarakat</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Kotak Infografis Banner Foto Gubernur & Iklan Berjalan (Slider Di Bawah Dasbor Utama - Ukuran Besar & Elegan) -->
    @if(isset($bannerIklans) && $bannerIklans->isNotEmpty())
    <section class="max-w-[1440px] mx-auto px-3 sm:px-6 lg:px-8 mb-16 relative z-20">
        <div id="infografis-banner-carousel" class="relative group overflow-hidden rounded-2xl md:rounded-3xl shadow-xl border border-sky-300/80 bg-[#cfe2ed]">
            <!-- Carousel Slides Track: Slide Horizontal Tanpa Tumpukan Transparansi Teks -->
            <div class="relative w-full aspect-[1881/502] min-h-[220px] sm:min-h-[320px] md:min-h-[400px] lg:min-h-[460px] overflow-hidden bg-[#cfe2ed]">
                <div id="banner-slides-track" class="flex w-full h-full transition-transform duration-700 ease-in-out" style="transform: translateX(0%);">
                    @foreach($bannerIklans as $idx => $bIklan)
                    <div class="banner-slide-item w-full h-full shrink-0 min-w-full relative flex items-center justify-center" data-banner-index="{{ $idx }}">
                        @if($bIklan->link_url && $bIklan->link_url !== '#' && $bIklan->link_url !== '')
                        <a href="{{ $bIklan->link_url }}" target="{{ $bIklan->target ?? '_self' }}" class="block w-full h-full relative cursor-pointer group/banner" title="{{ $bIklan->title }}">
                            <img src="{{ Str::startsWith($bIklan->image, 'http') ? $bIklan->image : asset($bIklan->image) }}" alt="{{ $bIklan->title }}" class="w-full h-full object-cover sm:object-contain object-center transform group-hover/banner:scale-[1.01] transition-transform duration-500">
                        </a>
                        @else
                        <div class="w-full h-full relative">
                            <img src="{{ Str::startsWith($bIklan->image, 'http') ? $bIklan->image : asset($bIklan->image) }}" alt="{{ $bIklan->title }}" class="w-full h-full object-cover sm:object-contain object-center">
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            @if($bannerIklans->count() > 1)
            <!-- Navigation Chevrons (Besar & Elegan) -->
            <button onclick="prevBannerSlide()" type="button" class="absolute left-3 sm:left-6 top-1/2 -translate-y-1/2 z-30 w-11 h-11 sm:w-13 sm:h-13 md:w-14 md:h-14 rounded-full bg-slate-900/50 hover:bg-dikbud-primary text-white backdrop-blur-md flex items-center justify-center transition-all duration-300 opacity-80 group-hover:opacity-100 shadow-xl border border-white/30 hover:scale-110" title="Slide Sebelumnya (Hendrik Lewerissa / Wakil Gubernur)">
                <span class="material-icons text-2xl sm:text-3xl md:text-4xl select-none leading-none">chevron_left</span>
            </button>
            <button onclick="nextBannerSlide()" type="button" class="absolute right-3 sm:right-6 top-1/2 -translate-y-1/2 z-30 w-11 h-11 sm:w-13 sm:h-13 md:w-14 md:h-14 rounded-full bg-slate-900/50 hover:bg-dikbud-primary text-white backdrop-blur-md flex items-center justify-center transition-all duration-300 opacity-80 group-hover:opacity-100 shadow-xl border border-white/30 hover:scale-110" title="Slide Selanjutnya">
                <span class="material-icons text-2xl sm:text-3xl md:text-4xl select-none leading-none">chevron_right</span>
            </button>

            <!-- Bottom Slide Indicators / Dots (● ● ●) -->
            <div class="absolute bottom-3 sm:bottom-5 inset-x-0 z-30 flex justify-center items-center gap-2.5 sm:gap-3" id="banner-slider-dots">
                @foreach($bannerIklans as $idx => $bIklan)
                <button onclick="goToBannerSlide({{ $idx }})" type="button" class="banner-dot rounded-full transition-all duration-300 {{ $idx === 0 ? 'w-6 sm:w-8 h-2 sm:h-2.5 bg-teal-400 ring-2 ring-white/80 shadow-md' : 'w-2 sm:w-2.5 h-2 sm:h-2.5 bg-slate-700/60 hover:bg-slate-900' }}" title="Slide {{ $idx + 1 }}: {{ $bIklan->title }}"></button>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    @endif

    <!-- Main Content Area: Berita, Pengumuman & Agenda -->
    <section id="berita" class="py-12 bg-dikbud-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="flex justify-between items-end mb-8 border-b-2 border-slate-200 pb-4">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-dikbud-primary flex items-center gap-2">
                        <span class="material-icons text-dikbud-accent text-3xl">article</span> Berita & Informasi
                    </h2>
                    <p class="text-sm text-slate-500 mt-1">Kabar terbaru seputar pendidikan dan kebudayaan di Maluku.</p>
                </div>
                <a href="/portal-resmi" class="hidden sm:flex items-center text-sm font-semibold text-dikbud-secondary hover:text-dikbud-primary">
                    Lihat Semua <span class="material-icons text-[18px]">arrow_forward</span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Left Column: Berita Utama (Wider) -->
                  <div class="md:col-span-2 space-y-6">
                      @if(isset($recentPosts) && $recentPosts->count() > 0)
                      <!-- Featured News Card -->
                      <article onclick="window.location.href='{{ route('berita.show', $recentPosts[0]->id) }}'" class="bg-white rounded-xl overflow-hidden shadow-soft border border-slate-100 group cursor-pointer">
                          <div class="relative h-64 sm:h-80 w-full bg-slate-200 overflow-hidden">
                              @php
                                  $mainImg = $recentPosts[0]->image ? (\Illuminate\Support\Str::startsWith($recentPosts[0]->image, ['http://', 'https://']) ? $recentPosts[0]->image : (\Illuminate\Support\Str::startsWith($recentPosts[0]->image, ['/uploads', 'uploads']) ? asset($recentPosts[0]->image) : (\Illuminate\Support\Str::startsWith($recentPosts[0]->image, ['/storage', 'storage']) ? asset(ltrim($recentPosts[0]->image, '/')) : asset('storage/' . $recentPosts[0]->image)))) : 'https://placehold.co/800x400/1e3a8a/ffffff?text=Kegiatan+Pendidikan+Maluku';
                              @endphp
                              <img src="{{ $mainImg }}" alt="Berita" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                              <div class="absolute top-4 left-4 bg-dikbud-accent text-dikbud-dark text-xs font-bold px-3 py-1 rounded">
                                  Berita Utama
                              </div>
                          </div>
                          <div class="p-6">
                              <div class="flex items-center gap-4 text-xs text-slate-500 mb-3">
                                  <span class="flex items-center gap-1"><span class="material-icons-outlined text-[14px]">calendar_today</span> {{ $recentPosts[0]->created_at ? $recentPosts[0]->created_at->translatedFormat('d F Y') : ($recentPosts[0]->date ?? '') }}</span>
                                  <span class="flex items-center gap-1"><span class="material-icons-outlined text-[14px]">folder</span> {{ $recentPosts[0]->type }}</span>
                              </div>
                              <h3 class="text-xl md:text-2xl font-bold text-slate-800 mb-3 group-hover:text-dikbud-secondary transition-colors">
                                  {{ $recentPosts[0]->title }}
                              </h3>
                              <p class="text-slate-600 text-sm leading-relaxed mb-4 line-clamp-2">
                                  {{ $recentPosts[0]->excerpt ?? \Illuminate\Support\Str::limit($recentPosts[0]->content, 150) }}
                              </p>
                              <span class="text-dikbud-secondary text-sm font-semibold flex items-center gap-1">Baca Selengkapnya <span class="material-icons text-[16px]">arrow_right_alt</span></span>
                          </div>
                      </article>

                      <!-- Secondary News Grid -->
                      @if($recentPosts->count() > 1)
                      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                          @foreach($recentPosts->skip(1) as $post)
                          @php
                              $secImg = $post->image ? (\Illuminate\Support\Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : (\Illuminate\Support\Str::startsWith($post->image, ['/uploads', 'uploads']) ? asset($post->image) : (\Illuminate\Support\Str::startsWith($post->image, ['/storage', 'storage']) ? asset(ltrim($post->image, '/')) : asset('storage/' . $post->image)))) : 'https://placehold.co/400x300/2563eb/ffffff?text=Berita+Pendidikan';
                          @endphp
                          <article onclick="window.location.href='{{ route('berita.show', $post->id) }}'" class="bg-white rounded-xl overflow-hidden shadow-soft border border-slate-100 group cursor-pointer flex flex-col">
                              <div class="h-40 bg-slate-200 overflow-hidden">
                                  <img src="{{ $secImg }}" alt="Berita" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                              </div>
                              <div class="p-4 flex-1 flex flex-col">
                                  <span class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider mb-2">{{ $post->type }}</span>
                                  <h3 class="text-base font-bold text-slate-800 mb-2 leading-tight group-hover:text-dikbud-secondary">{{ $post->title }}</h3>
                                  <p class="text-xs text-slate-500 mt-auto">{{ $post->created_at ? $post->created_at->translatedFormat('d F Y') : ($post->date ?? '') }}</p>
                              </div>
                          </article>
                          @endforeach
                      </div>
                      @endif
                      @else
                      <div class="bg-white rounded-xl p-8 text-center text-slate-500 border border-slate-100">Belum ada berita yang dipublikasikan.</div>
                      @endif
                  </div>

                  <!-- Right Column: Pengumuman & Agenda -->
                <div class="space-y-8">
                    <!-- Pengumuman Section -->
                    <div id="pengumuman" class="bg-white rounded-xl shadow-soft border border-slate-100 p-6">
                        <div class="flex items-center gap-2 border-b border-slate-100 pb-3 mb-4">
                            <span class="material-icons text-dikbud-secondary">campaign</span>
                            <h3 class="text-lg font-bold text-slate-800">Berita Terbaru</h3>
                        </div>
                        <ul class="space-y-4">
    @forelse($pengumumans as $index => $pengumuman)
    <li class="{{ $index > 0 ? 'border-t border-slate-50 pt-4 ' : '' }}group cursor-pointer">
        <a href="{{ route('berita.show', $pengumuman->id) }}" class="block">
            <div class="flex justify-between items-start gap-2">
                <p class="text-sm font-semibold text-slate-700 group-hover:text-dikbud-secondary line-clamp-2">{{ $pengumuman->title }}</p>
                @if(str_contains(strtolower($pengumuman->title), 'penting'))
                <span class="bg-red-100 text-red-700 text-[10px] font-bold px-2 py-0.5 rounded uppercase flex-shrink-0">Penting</span>
                @endif
            </div>
            <span class="text-xs text-slate-400 mt-1 block">{{ $pengumuman->created_at ? $pengumuman->created_at->translatedFormat('d M Y') : ($pengumuman->date ?? '') }}</span>
        </a>
    </li>
    @empty
    <li class="text-sm text-slate-500 text-center py-4">Belum ada pengumuman.</li>
    @endforelse
</ul>
<button class="w-full mt-5 py-2 bg-slate-50 hover:bg-slate-100 text-dikbud-secondary text-sm font-semibold rounded transition-colors">Lihat Semua Pengumuman</button>
                    </div>

                    <!-- Agenda Kegiatan -->
                    <div class="bg-gradient-to-br from-dikbud-primary to-dikbud-dark rounded-xl shadow-lg p-6 text-white">
                        <div class="flex items-center gap-2 border-b border-white/20 pb-3 mb-4">
                            <span class="material-icons text-dikbud-accent">event_note</span>
                            <h3 class="text-lg font-bold">Agenda Kegiatan</h3>
                        </div>
                        <ul class="space-y-4">
    @forelse($agendas as $index => $agenda)
    <li class="flex gap-4 items-start{{ $index > 0 ? ' border-t border-white/10 pt-4' : '' }}">
        <div class="bg-white/10 rounded-lg p-2 text-center min-w-[50px] border border-white/20">
            <span class="block text-xs font-semibold text-dikbud-accent uppercase">{{ \Carbon\Carbon::parse($agenda->date)->translatedFormat('M') }}</span>
            <span class="block text-xl font-bold">{{ \Carbon\Carbon::parse($agenda->date)->format('d') }}</span>
        </div>
        <div class="flex-1 min-w-0">
            <h4 class="text-sm font-bold leading-tight mb-1 cursor-pointer hover:text-dikbud-accent transition-colors">{{ $agenda->title }}</h4>
            <p class="text-xs text-slate-300 flex items-center gap-1"><span class="material-icons-outlined text-[12px]">location_on</span> {{ $agenda->location }}</p>
        </div>
        @if(!empty($agenda->image))
        <div class="w-12 h-12 rounded-lg overflow-hidden shrink-0 border border-white/20">
            <img src="{{ \Illuminate\Support\Str::startsWith($agenda->image, ['http://', 'https://']) ? $agenda->image : (\Illuminate\Support\Str::startsWith($agenda->image, ['/uploads', 'uploads']) ? asset($agenda->image) : (\Illuminate\Support\Str::startsWith($agenda->image, ['/storage', 'storage']) ? asset(ltrim($agenda->image, '/')) : asset('storage/' . $agenda->image))) }}" alt="{{ $agenda->title }}" class="w-full h-full object-cover">
        </div>
        @endif
    </li>
    @empty
    <li class="text-sm text-slate-300 text-center py-4">Belum ada agenda kegiatan.</li>
    @endforelse
</ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seksi Transparansi & Informasi Publik (Sesuai UU KIP) -->
    <section id="transparansi" class="py-16 bg-white border-y border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-10">
                <h2 class="text-3xl md:text-4xl font-black text-slate-800 mb-4">
                    Transparansi <span class="text-dikbud-secondary">Informasi Publik</span>
                </h2>
                <p class="text-slate-500">Penyediaan informasi publik secara terbuka, berkala, dan setiap saat sesuai dengan amanat Undang-Undang Keterbukaan Informasi Publik (UU KIP).</p>
            </div>

            <!-- 3 Poster Transparansi Informasi Publik Berjejer ke Kanan (Dinamis dari Database) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 items-stretch">
                @forelse($transparansiPosters as $poster)
                <div class="bg-white rounded-2xl border border-slate-200 shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group flex flex-col">
                    <div class="overflow-hidden bg-slate-50 flex items-center justify-center p-2">
                        <img src="{{ Str::startsWith($poster->image, 'http') ? $poster->image : asset($poster->image) }}" alt="{{ $poster->title }}" class="w-full h-auto max-h-[600px] object-contain rounded-xl group-hover:scale-[1.02] transition-transform duration-300">
                    </div>
                </div>
                @empty
                <!-- Fallback Default jika belum ada poster -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group flex flex-col">
                    <div class="overflow-hidden bg-slate-50 flex items-center justify-center p-2">
                        <img src="{{ asset('images/maklumat-pelayanan.jpg') }}" alt="Maklumat Pelayanan Dinas Pendidikan dan Kebudayaan Provinsi Maluku" class="w-full h-auto max-h-[600px] object-contain rounded-xl group-hover:scale-[1.02] transition-transform duration-300">
                    </div>
                </div>
                <div class="bg-white rounded-2xl border border-slate-200 shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group flex flex-col">
                    <div class="overflow-hidden bg-slate-50 flex items-center justify-center p-2">
                        <img src="{{ asset('images/jam-pelayanan.jpg') }}" alt="Jam Pelayanan Dinas Pendidikan dan Kebudayaan Provinsi Maluku" class="w-full h-auto max-h-[600px] object-contain rounded-xl group-hover:scale-[1.02] transition-transform duration-300">
                    </div>
                </div>
                <div class="bg-white rounded-2xl border border-slate-200 shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group flex flex-col">
                    <div class="overflow-hidden bg-slate-50 flex items-center justify-center p-2">
                        <img src="{{ asset('images/skm-publik.jpg') }}" alt="Survei Kepuasan Masyarakat Dinas Pendidikan dan Kebudayaan Provinsi Maluku" class="w-full h-auto max-h-[600px] object-contain rounded-xl group-hover:scale-[1.02] transition-transform duration-300">
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Dashboard Monitoring & Evaluasi SMA/SMK -->
    <section id="monev" class="py-16 bg-slate-100 border-b border-slate-200 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-pattern opacity-5 pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-end mb-8 border-b-2 border-slate-200 pb-4">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-dikbud-primary flex items-center gap-2">
                        <span class="material-icons text-dikbud-accent text-3xl">analytics</span> Dashboard Monev SMA/SMK
                    </h2>
                    <p class="text-sm text-slate-500 mt-1">Monitoring dan Evaluasi Data Pokok Pendidikan Menengah Provinsi Maluku.</p>
                </div>
                <div class="flex flex-wrap items-center gap-3 mt-4 md:mt-0">
                    <button onclick="openModal('modal-sekolah')" class="px-4 py-2 bg-white text-dikbud-primary border border-slate-200 text-sm font-semibold rounded-lg hover:bg-slate-50 transition-colors flex items-center gap-2 shadow-sm">
                        <span class="material-icons-outlined text-[16px]">format_list_numbered</span> Detail Jumlah Sekolah
                    </button>
                    <a href="/login" class="px-4 py-2 bg-dikbud-primary text-white text-sm font-semibold rounded-lg hover:bg-dikbud-secondary transition-colors flex items-center gap-2 shadow-sm">
                        Akses Portal Monev <span class="material-icons-outlined text-[16px]">open_in_new</span>
                    </a>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                <!-- Stat 1 -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 hover:-translate-y-1 transition-transform">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center"><span class="material-icons">school</span></div>
                        <span class="text-sm font-semibold text-slate-500">Total SMA/SMK</span>
                    </div>
                    <h3 class="text-3xl font-black text-slate-800">{{ $monevStats->total_sekolah ?? '428' }}</h3>
                    <p class="text-xs text-green-600 font-medium mt-1 flex items-center gap-1"><span class="material-icons text-[12px]">trending_up</span> {{ $monevStats->total_sekolah_sub ?? '+12 dari 2025' }}</p>
                </div>
                <!-- Stat 2 -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 hover:-translate-y-1 transition-transform">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center"><span class="material-icons">people</span></div>
                        <span class="text-sm font-semibold text-slate-500">Siswa Aktif</span>
                    </div>
                    <h3 class="text-3xl font-black text-slate-800">{{ $monevStats->siswa_aktif ?? '112.450' }}</h3>
                    <p class="text-xs text-green-600 font-medium mt-1 flex items-center gap-1"><span class="material-icons text-[12px]">trending_up</span> {{ $monevStats->siswa_aktif_sub ?? '+3.2% pendaftar baru' }}</p>
                </div>
                <!-- Stat 3 -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 hover:-translate-y-1 transition-transform">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center"><span class="material-icons">badge</span></div>
                        <span class="text-sm font-semibold text-slate-500">Guru & Tendik</span>
                    </div>
                    <h3 class="text-3xl font-black text-slate-800">{{ $monevStats->guru_tendik ?? '8.942' }}</h3>
                    <p class="text-xs text-slate-500 font-medium mt-1 flex items-center gap-1"><span class="material-icons text-[12px]">check_circle</span> {{ $monevStats->guru_tendik_sub ?? '85% Tersertifikasi' }}</p>
                </div>
                <!-- Stat 4 -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 hover:-translate-y-1 transition-transform">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center"><span class="material-icons">verified</span></div>
                        <span class="text-sm font-semibold text-slate-500">Akreditasi A</span>
                    </div>
                    <h3 class="text-3xl font-black text-slate-800">{{ $monevStats->akreditasi_a ?? '156' }}</h3>
                    <p class="text-xs text-green-600 font-medium mt-1 flex items-center gap-1"><span class="material-icons text-[12px]">trending_up</span> {{ $monevStats->akreditasi_a_sub ?? '+15 Sekolah' }}</p>
                </div>
            </div>

            <!-- Simulated Charts/Bars -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Sebaran Wilayah -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
                    <h4 class="text-sm font-bold text-slate-800 mb-5">Sebaran Sekolah per Wilayah (Top 5)</h4>
                    <div class="space-y-5">
                        @php
                            $topRegions = (isset($monevRegions) && $monevRegions->isNotEmpty()) ? $monevRegions->take(5) : collect([
                                (object)['nama_wilayah' => 'Kota Ambon', 'total' => 85],
                                (object)['nama_wilayah' => 'Kab. Maluku Tengah', 'total' => 72],
                                (object)['nama_wilayah' => 'Kab. Seram Bagian Barat', 'total' => 54],
                                (object)['nama_wilayah' => 'Kab. Maluku Tenggara', 'total' => 48],
                                (object)['nama_wilayah' => 'Kab. Buru', 'total' => 41],
                            ]);
                            $barColors = ['bg-dikbud-primary', 'bg-dikbud-secondary', 'bg-blue-400', 'bg-blue-300', 'bg-blue-200'];
                        @endphp
                        @foreach($topRegions as $idx => $reg)
                        <div>
                            <div class="flex justify-between text-xs font-semibold mb-1.5 text-slate-600"><span>{{ $reg->nama_wilayah }}</span><span>{{ $reg->total }} Sekolah</span></div>
                            <div class="w-full bg-slate-100 rounded-full h-2"><div class="{{ $barColors[$idx] ?? 'bg-blue-200' }} h-2 rounded-full" style="width: {{ min(100, $reg->total) }}%"></div></div>
                        </div>
                        @endforeach
                    </div>
                </div>

                @php
                    $baik = (float)($monevStats->sarpras_baik ?? 65);
                    $ringan = (float)($monevStats->sarpras_rusak_ringan ?? 25);
                    $berat = (float)($monevStats->sarpras_rusak_berat ?? 10);
                    $offsetRingan = - $baik;
                    $offsetBerat = - ($baik + $ringan);
                @endphp
                <!-- Kondisi Sarpras -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 flex flex-col justify-between">
                    <div>
                        <h4 class="text-sm font-bold text-slate-800 mb-5">Status Kondisi Sarana Prasarana</h4>
                        <div class="flex flex-col sm:flex-row items-center gap-6 mb-4">
                            <div class="relative w-32 h-32 flex-shrink-0">
                                <!-- CSS Pie Chart Simulation -->
                                <svg viewBox="0 0 36 36" class="w-32 h-32 transform -rotate-90 drop-shadow-sm">
                                    <path class="text-slate-100" stroke-width="6" stroke="currentColor" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                                    <path class="text-dikbud-secondary" stroke-dasharray="{{ $baik }}, 100" stroke-width="6" stroke="currentColor" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                                    <path class="text-dikbud-accent" stroke-dasharray="{{ $ringan }}, 100" stroke-dashoffset="{{ $offsetRingan }}" stroke-width="6" stroke="currentColor" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                                    <path class="text-red-400" stroke-dasharray="{{ $berat }}, 100" stroke-dashoffset="{{ $offsetBerat }}" stroke-width="6" stroke="currentColor" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                                </svg>
                                <!-- Center Text -->
                                <div class="absolute inset-0 flex flex-col items-center justify-center">
                                    <span class="text-2xl font-black text-slate-800">{{ $baik }}%</span>
                                    <span class="text-[9px] text-slate-500 uppercase font-bold tracking-wider">Kondisi Baik</span>
                                </div>
                            </div>
                            <div class="space-y-3 flex-1 w-full">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="flex items-center gap-2 text-slate-600 font-medium"><span class="w-3 h-3 rounded-full bg-dikbud-secondary shadow-sm"></span> Kondisi Baik</span>
                                    <span class="font-bold text-slate-800">{{ $baik }}%</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="flex items-center gap-2 text-slate-600 font-medium"><span class="w-3 h-3 rounded-full bg-dikbud-accent shadow-sm"></span> Rusak Ringan</span>
                                    <span class="font-bold text-slate-800">{{ $ringan }}%</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="flex items-center gap-2 text-slate-600 font-medium"><span class="w-3 h-3 rounded-full bg-red-400 shadow-sm"></span> Rusak Berat</span>
                                    <span class="font-bold text-slate-800">{{ $berat }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-blue-50 p-3 rounded-lg border border-blue-100 flex gap-2 items-start mt-4">
                        <span class="material-icons text-blue-500 text-lg">info</span>
                        <p class="text-xs text-blue-800 leading-relaxed">{{ $monevStats->notes ?? 'Data terintegrasi dari sistem Dapodik secara real-time. Diperbarui setiap akhir semester berjalan.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pojok Layanan Masyarakat (Sebelumnya Pojok Baca / Program Unggulan) -->
    <section id="pojok-layanan" class="py-14 bg-slate-50/80 border-t border-slate-200/80">
        <div id="pojok-baca" class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
            <div id="program-unggulan" class="flex flex-col items-center justify-center text-center mb-10">
                <span class="inline-block px-3.5 py-1 bg-emerald-100 text-emerald-800 font-bold text-xs uppercase tracking-wider rounded-full mb-2">Layanan Publik Terpadu</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">Pojok Layanan Masyarakat</h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-1 max-w-xl mx-auto">Akses cepat pengurusan dan unduh dokumen permohonan layanan publik resmi Dinas Pendidikan dan Kebudayaan Provinsi Maluku.</p>
                <div class="w-12 h-1 bg-emerald-600 mt-2.5 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3.5 sm:gap-4">
                <!-- Card 1: Layanan Disetujui -->
                <div onclick="openDokumenLayananModal('Disetujui')" class="group bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-md hover:border-emerald-300 p-3.5 flex items-center gap-3.5 transition-all duration-300 hover:-translate-y-1 cursor-pointer">
                    <div class="w-13 h-13 sm:w-14 sm:h-14 rounded-2xl bg-[#059669] flex items-center justify-center flex-shrink-0 text-white shadow-sm transition-transform duration-300 group-hover:scale-105">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="font-bold text-slate-800 text-[14px] sm:text-[15px] leading-snug group-hover:text-emerald-700 transition-colors truncate">
                            Layanan Disetujui
                        </h4>
                        <p class="text-[11px] sm:text-xs text-slate-500 leading-tight mt-0.5 line-clamp-2">
                            Unduh dokumen & SK layanan yang telah disetujui
                        </p>
                    </div>
                </div>

                <!-- Card 2: Layanan Ditolak -->
                <div onclick="openDokumenLayananModal('Ditolak')" class="group bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-md hover:border-red-300 p-3.5 flex items-center gap-3.5 transition-all duration-300 hover:-translate-y-1 cursor-pointer">
                    <div class="w-13 h-13 sm:w-14 sm:h-14 rounded-2xl bg-[#dc2626] flex items-center justify-center flex-shrink-0 text-white shadow-sm transition-transform duration-300 group-hover:scale-105">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="font-bold text-slate-800 text-[14px] sm:text-[15px] leading-snug group-hover:text-red-700 transition-colors truncate">
                            Layanan Ditolak
                        </h4>
                        <p class="text-[11px] sm:text-xs text-slate-500 leading-tight mt-0.5 line-clamp-2">
                            Unduh surat keterangan penolakan & catatan revisi
                        </p>
                    </div>
                </div>

                <!-- Card 3: Standar Pelayanan (SOP) -->
                <a href="{{ url('/standar-pelayanan') }}" class="group bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-md hover:border-slate-300 p-3.5 flex items-center gap-3.5 transition-all duration-300 hover:-translate-y-1">
                    <div class="w-13 h-13 sm:w-14 sm:h-14 rounded-2xl bg-[#004b93] flex items-center justify-center flex-shrink-0 text-white shadow-sm transition-transform duration-300 group-hover:scale-105">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="font-bold text-slate-800 text-[14px] sm:text-[15px] leading-snug group-hover:text-dikbud-primary transition-colors truncate">
                            Standar Pelayanan (SOP)
                        </h4>
                        <p class="text-[11px] sm:text-xs text-slate-500 leading-tight mt-0.5 line-clamp-2">
                            Panduan 14 komponen & pengajuan berkas online
                        </p>
                    </div>
                </a>

                <!-- Card 4: Permohonan PPID -->
                <a href="{{ url('/ppid') }}" class="group bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-md hover:border-slate-300 p-3.5 flex items-center gap-3.5 transition-all duration-300 hover:-translate-y-1">
                    <div class="w-13 h-13 sm:w-14 sm:h-14 rounded-2xl bg-[#7c3aed] flex items-center justify-center flex-shrink-0 text-white shadow-sm transition-transform duration-300 group-hover:scale-105">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="font-bold text-slate-800 text-[14px] sm:text-[15px] leading-snug group-hover:text-dikbud-primary transition-colors truncate">
                            Permohonan PPID
                        </h4>
                        <p class="text-[11px] sm:text-xs text-slate-500 leading-tight mt-0.5 line-clamp-2">
                            Layanan keterbukaan informasi publik resmi
                        </p>
                    </div>
                </a>

                <!-- Card 5: Layanan Pengaduan -->
                <a href="{{ url('/pengaduan') }}" class="group bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-md hover:border-slate-300 p-3.5 flex items-center gap-3.5 transition-all duration-300 hover:-translate-y-1">
                    <div class="w-13 h-13 sm:w-14 sm:h-14 rounded-2xl bg-[#e67e00] flex items-center justify-center flex-shrink-0 text-white shadow-sm transition-transform duration-300 group-hover:scale-105">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18 11v2h4v-2h-4zm-2 6.61c.96.71 2.21 1.65 3.2 2.39.4-.53.8-1.07 1.2-1.6-.99-.74-2.24-1.68-3.2-2.4-.4.54-.8 1.08-1.2 1.61zM20.4 5.6c-.4-.53-.8-1.07-1.2-1.6-.99.74-2.24 1.68-3.2 2.4.4.53.8 1.07 1.2 1.6.96-.72 2.21-1.65 3.2-2.4zM4 9c-1.1 0-2 .9-2 2v2c0 1.1.9 2 2 2h1v4h2v-4h1l5 3V6L8 9H4zm9 1.43v3.14L10.38 12 13 10.43z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="font-bold text-slate-800 text-[14px] sm:text-[15px] leading-snug group-hover:text-dikbud-primary transition-colors truncate">
                            Layanan Pengaduan
                        </h4>
                        <p class="text-[11px] sm:text-xs text-slate-500 leading-tight mt-0.5 line-clamp-2">
                            Sampaikan aspirasi & laporan pengaduan Anda
                        </p>
                    </div>
                </a>

                <!-- Card 6: Cek Status & Berkas -->
                <div onclick="openDokumenLayananModal('all')" class="group bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-md hover:border-cyan-300 p-3.5 flex items-center gap-3.5 transition-all duration-300 hover:-translate-y-1 cursor-pointer">
                    <div class="w-13 h-13 sm:w-14 sm:h-14 rounded-2xl bg-[#00838f] flex items-center justify-center flex-shrink-0 text-white shadow-sm transition-transform duration-300 group-hover:scale-105">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="font-bold text-slate-800 text-[14px] sm:text-[15px] leading-snug group-hover:text-cyan-700 transition-colors truncate">
                            Cek Status & Berkas
                        </h4>
                        <p class="text-[11px] sm:text-xs text-slate-500 leading-tight mt-0.5 line-clamp-2">
                            Lacak verifikasi berkas permohonan masyarakat
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dikbud-dark text-slate-400 pt-16 pb-8 border-t-4 border-dikbud-secondary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <!-- Info Instansi -->
                <div class="lg:col-span-1">
                    <div class="flex items-center gap-3 mb-6">
                        <img src="{{ asset('images/logo-maluku.png') }}?v={{ filemtime(public_path('images/logo-maluku.png')) }}" alt="Logo Maluku" class="w-10 h-10 object-contain drop-shadow-md">
                        <div>
                            <h3 class="text-white font-bold text-sm leading-tight">Dinas Pendidikan & Kebudayaan</h3>
                            <p class="text-dikbud-accent text-xs font-semibold">Provinsi Maluku</p>
                        </div>
                    </div>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start gap-2">
                            <span class="material-icons-outlined text-[18px] text-slate-500 mt-0.5">location_on</span>
                            <span>Jl. Ahmad Yani No.XX, Kota Ambon, Maluku, Kode Pos 97114</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="material-icons-outlined text-[18px] text-slate-500">phone</span>
                            <span>(0911) - 352389, 352367</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="material-icons-outlined text-[18px] text-slate-500">email</span>
                            <span>dikbud@malukuprov.go.id</span>
                        </li>
                    </ul>
                </div>

                <!-- Link Cepat -->
                <div>
                    <h3 class="text-white font-bold mb-6 text-sm uppercase tracking-wider">Tautan Publik</h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="hover:text-dikbud-accent transition-colors">Profil Dinas</a></li>
                        <li><a href="/berita-terkini" class="hover:text-dikbud-accent transition-colors">Berita & Informasi</a></li>
                        <li><a href="/anggaran" class="hover:text-dikbud-accent transition-colors">Transparansi Anggaran</a></li>
                        <li><a href="/standar-pelayanan" class="hover:text-dikbud-accent transition-colors">Standar Pelayanan (SOP)</a></li>
                        <li><a href="#" class="hover:text-dikbud-accent transition-colors">Peta Situs</a></li>
                    </ul>
                </div>

                <!-- Layanan Eksternal -->
                <div>
                    <h3 class="text-white font-bold mb-6 text-sm uppercase tracking-wider">Layanan Terkait</h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="hover:text-white transition-colors flex items-center gap-2"><span class="material-icons text-[14px]">link</span> Pemprov Maluku</a></li>
                        <li><a href="#" class="hover:text-white transition-colors flex items-center gap-2"><span class="material-icons text-[14px]">link</span> Kemendikbudristek RI</a></li>
                        <li><a href="#" class="hover:text-white transition-colors flex items-center gap-2"><span class="material-icons text-[14px]">link</span> Dapodik</a></li>
                        <li><a href="#" class="hover:text-white transition-colors flex items-center gap-2"><span class="material-icons text-[14px]">link</span> E-Rapor</a></li>
                        <li><a href="{{ url('/ppid') }}" class="hover:text-white transition-colors flex items-center gap-2"><span class="material-icons text-[14px]">link</span> PPID Provinsi Maluku</a></li>
                    </ul>
                </div>

                <!-- Interaksi & Admin -->
                <div>
                    <h3 class="text-white font-bold mb-6 text-sm uppercase tracking-wider">Sosial Media Resmi</h3>
                    <div class="flex flex-wrap gap-2.5 mb-8">
                        @if(isset($socialMediaLinks) && $socialMediaLinks->count() > 0)
                            @foreach($socialMediaLinks as $sosmed)
                            <a href="{{ $sosmed->url }}" target="_blank" rel="noopener noreferrer" title="{{ $sosmed->name }} ({{ $sosmed->username }})" class="w-10 h-10 rounded-lg {{ $sosmed->badge_bg_class }} text-white flex items-center justify-center hover:opacity-90 hover:scale-105 transition-all shadow-md">
                                <i class="{{ $sosmed->icon_class }} text-base"></i>
                            </a>
                            @endforeach
                        @endif
                    </div>
                    
                    <div class="border-t border-slate-700 pt-6">
                        <p class="text-xs mb-2">Akses khusus pengelola website:</p>
                        <a href="/login" id="btn-login-admin" class="inline-flex items-center gap-2 px-4 py-2 bg-slate-800 hover:bg-slate-700 border border-slate-600 rounded text-sm text-white font-medium transition-colors">
                            <span class="material-icons-outlined text-[16px]">admin_panel_settings</span> Login Administrator
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs">
                <p>&copy; 2026 Dinas Pendidikan dan Kebudayaan Provinsi Maluku.</p>
                <div class="space-x-4">
                    <a href="#" class="hover:text-white">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-white">Syarat Penggunaan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- ================= MODALS SECTION ================= -->

    <!-- Modal Formulir Pengaduan -->
    <div id="modal-pengaduan" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="closeModal('modal-pengaduan')"></div>
        <div class="relative bg-white w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
            <!-- Header -->
            <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
                <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                    <span class="material-icons text-red-500">campaign</span> Formulir Pengaduan Masyarakat
                </h3>
                <button onclick="closeModal('modal-pengaduan')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <!-- Body -->
            <div class="p-6 overflow-y-auto">
                <div class="bg-blue-50 border border-blue-200 text-blue-800 p-4 rounded-lg text-sm mb-6 flex gap-3">
                    <span class="material-icons text-blue-500">info</span>
                    <p>Silakan isi form pengaduan layanan di bawah ini. Identitas pelapor akan dijaga kerahasiaannya.</p>
                </div>
                <form class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap *</label>
                            <input type="text" class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-dikbud-secondary focus:border-dikbud-secondary outline-none text-sm" placeholder="Nama Anda">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">NIK (Nomor Induk Kependudukan) *</label>
                            <input type="number" class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-dikbud-secondary focus:border-dikbud-secondary outline-none text-sm" placeholder="16 Digit NIK">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">No. HP / WhatsApp *</label>
                            <input type="tel" class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-dikbud-secondary focus:border-dikbud-secondary outline-none text-sm" placeholder="08xx...">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                            <input type="email" class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-dikbud-secondary focus:border-dikbud-secondary outline-none text-sm" placeholder="email@contoh.com">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Kategori Pengaduan *</label>
                        <select class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-dikbud-secondary focus:border-dikbud-secondary outline-none text-sm bg-white">
                            <option>Pilih Kategori...</option>
                            <option>Pelayanan Pendidikan Dasar/Menengah</option>
                            <option>Pungutan Liar / Pungli</option>
                            <option>Fasilitas Sekolah</option>
                            <option>Kinerja Pegawai/Guru</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Isi Laporan / Pengaduan *</label>
                        <textarea rows="4" class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-dikbud-secondary focus:border-dikbud-secondary outline-none text-sm" placeholder="Jelaskan secara rinci kronologi pengaduan Anda..."></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Lampiran Bukti (Opsional)</label>
                        <input type="file" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-slate-50 file:text-slate-700 hover:file:bg-slate-100">
                    </div>
                </form>
            </div>
            <!-- Footer Modal -->
            <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
                <button onclick="closeModal('modal-pengaduan')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
                <button class="px-4 py-2 text-sm font-bold bg-dikbud-secondary text-white hover:bg-dikbud-primary rounded-lg transition-colors shadow-md">Kirim Pengaduan</button>
            </div>
        </div>
    </div>

    <!-- Modal Permohonan Informasi (PPID) -->
    <div id="modal-permohonan" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="closeModal('modal-permohonan')"></div>
        <div class="relative bg-white w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
            <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
                <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                    <span class="material-icons text-green-500">description</span> Form Permohonan Informasi Publik
                </h3>
                <button onclick="closeModal('modal-permohonan')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <div class="p-6 overflow-y-auto">
                 <div class="bg-amber-50 border border-amber-200 text-amber-800 p-4 rounded-lg text-sm mb-6 flex gap-3">
                    <span class="material-icons text-amber-500">warning</span>
                    <p>Formulir ini sesuai dengan standar UU No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik.</p>
                </div>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Rincian Informasi yang Dibutuhkan *</label>
                        <textarea rows="3" class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-dikbud-secondary focus:border-dikbud-secondary outline-none text-sm" placeholder="Sebutkan jenis dokumen atau informasi spesifik yang Anda minta..."></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Tujuan Penggunaan Informasi *</label>
                        <input type="text" class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-dikbud-secondary focus:border-dikbud-secondary outline-none text-sm" placeholder="Misal: Penelitian, Data Statistik, dll">
                    </div>
                    <div class="border-t border-slate-200 pt-4 mt-4">
                        <p class="text-sm font-bold text-slate-800 mb-3">Data Pemohon</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Kategori Pemohon *</label>
                                <select class="w-full border border-slate-300 rounded-lg px-4 py-2 outline-none text-sm bg-white">
                                    <option>Perorangan</option>
                                    <option>Kelompok / Ormas</option>
                                    <option>Badan Hukum / Instansi</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">No. Identitas (KTP/SIM/Paspor) *</label>
                                <input type="text" class="w-full border border-slate-300 rounded-lg px-4 py-2 outline-none text-sm">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-sm font-medium text-slate-700 mb-1">Unggah Scan Identitas (KTP) *</label>
                                <input type="file" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-slate-50 file:text-slate-700 hover:file:bg-slate-100">
                                <p class="text-xs text-slate-400 mt-1">Format: JPG, PNG, PDF (Maks 2MB)</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
                <button onclick="closeModal('modal-permohonan')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
                <button class="px-4 py-2 text-sm font-bold bg-green-600 text-white hover:bg-green-700 rounded-lg transition-colors shadow-md">Ajukan Permohonan</button>
            </div>
        </div>
    </div>

    <!-- Modal Detail Jumlah Sekolah -->
    <div id="modal-sekolah" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="closeModal('modal-sekolah')"></div>
        <div class="relative bg-white w-full max-w-4xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
            <!-- Header -->
            <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
                <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                    <span class="material-icons text-blue-500">format_list_numbered</span> Monitoring Rincian Jumlah Sekolah
                </h3>
                <button onclick="closeModal('modal-sekolah')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <!-- Body -->
            <div class="p-6 overflow-y-auto">
                <!-- Summary Breakdown Cards (6 Kotak Satuan Pendidikan) -->
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 mb-6">
                    <!-- Kotak SMA Negeri -->
                    <div class="bg-blue-50/90 border border-blue-200 p-3.5 rounded-xl flex flex-col justify-between shadow-sm hover:shadow transition-shadow">
                        <div>
                            <p class="text-xs text-blue-700 font-bold uppercase tracking-wider mb-1">SMA Negeri</p>
                            <h4 class="text-2xl lg:text-3xl font-black text-blue-900">{{ $monevStats->sma_negeri ?? '168' }}</h4>
                        </div>
                        <div class="text-[11px] text-blue-700 font-semibold mt-2 pt-2 border-t border-blue-200/80">
                            Sekolah Negeri
                        </div>
                    </div>

                    <!-- Kotak SMA Swasta -->
                    <div class="bg-sky-50/90 border border-sky-200 p-3.5 rounded-xl flex flex-col justify-between shadow-sm hover:shadow transition-shadow">
                        <div>
                            <p class="text-xs text-sky-700 font-bold uppercase tracking-wider mb-1">SMA Swasta</p>
                            <h4 class="text-2xl lg:text-3xl font-black text-sky-900">{{ $monevStats->sma_swasta ?? '77' }}</h4>
                        </div>
                        <div class="text-[11px] text-sky-700 font-semibold mt-2 pt-2 border-t border-sky-200/80">
                            Sekolah Swasta
                        </div>
                    </div>

                    <!-- Kotak SMK Negeri -->
                    <div class="bg-amber-50/90 border border-amber-200 p-3.5 rounded-xl flex flex-col justify-between shadow-sm hover:shadow transition-shadow">
                        <div>
                            <p class="text-xs text-amber-800 font-bold uppercase tracking-wider mb-1">SMK Negeri</p>
                            <h4 class="text-2xl lg:text-3xl font-black text-amber-900">{{ $monevStats->smk_negeri ?? '112' }}</h4>
                        </div>
                        <div class="text-[11px] text-amber-800 font-semibold mt-2 pt-2 border-t border-amber-200/80">
                            Sekolah Negeri
                        </div>
                    </div>

                    <!-- Kotak SMK Swasta -->
                    <div class="bg-orange-50/90 border border-orange-200 p-3.5 rounded-xl flex flex-col justify-between shadow-sm hover:shadow transition-shadow">
                        <div>
                            <p class="text-xs text-orange-800 font-bold uppercase tracking-wider mb-1">SMK Swasta</p>
                            <h4 class="text-2xl lg:text-3xl font-black text-orange-900">{{ $monevStats->smk_swasta ?? '71' }}</h4>
                        </div>
                        <div class="text-[11px] text-orange-800 font-semibold mt-2 pt-2 border-t border-orange-200/80">
                            Sekolah Swasta
                        </div>
                    </div>

                    <!-- Kotak SLB -->
                    <div class="bg-purple-50/90 border border-purple-200 p-3.5 rounded-xl flex flex-col justify-between shadow-sm hover:shadow transition-shadow">
                        <div>
                            <p class="text-xs text-purple-700 font-bold uppercase tracking-wider mb-1">Kotak SLB</p>
                            <h4 class="text-2xl lg:text-3xl font-black text-purple-900">{{ $monevStats->total_slb ?? '24' }}</h4>
                        </div>
                        <div class="flex items-center justify-between text-[11px] text-purple-800 font-semibold mt-2 pt-2 border-t border-purple-200/80">
                            <span>Neg: {{ $monevStats->slb_negeri ?? '14' }}</span>
                            <span>Swa: {{ $monevStats->slb_swasta ?? '10' }}</span>
                        </div>
                    </div>

                    <!-- Kotak Total Keseluruhan -->
                    <div class="bg-emerald-50/90 border border-emerald-200 p-3.5 rounded-xl flex flex-col justify-between shadow-sm hover:shadow transition-shadow">
                        <div>
                            <p class="text-xs text-emerald-700 font-bold uppercase tracking-wider mb-1">Total Keseluruhan</p>
                            <h4 class="text-2xl lg:text-3xl font-black text-emerald-900">{{ $monevStats->total_sekolah ?? '452' }}</h4>
                        </div>
                        <div class="text-[11px] text-emerald-800 font-semibold mt-2 pt-2 border-t border-emerald-200/80 text-center sm:text-left">
                            Semua Satuan
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto border border-slate-200 rounded-lg">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-slate-700 text-sm border-b border-slate-200">
                                <th class="p-4 font-bold">Kabupaten / Kota</th>
                                <th class="p-4 font-bold text-center">SMA</th>
                                <th class="p-4 font-bold text-center">SMK</th>
                                <th class="p-4 font-bold text-center">SLB</th>
                                <th class="p-4 font-bold text-center bg-slate-100">Total</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-slate-600">
                            @if(isset($monevRegions) && $monevRegions->isNotEmpty())
                                @foreach($monevRegions as $reg)
                                <tr class="border-b border-slate-100 hover:bg-blue-50/50 transition-colors">
                                    <td class="p-4">
                                        <div class="font-medium text-slate-800">{{ $reg->nama_wilayah }}</div>
                                        @if($reg->link_detail || $reg->contoh_sekolah)
                                        <details class="text-xs mt-1 group cursor-pointer">
                                            <summary class="font-semibold text-dikbud-secondary list-none flex items-center gap-0.5 w-max outline-none">
                                                <span class="material-icons text-[16px] group-open:rotate-180 transition-transform">arrow_drop_down</span> 
                                                @if($reg->link_detail)
                                                <a href="{{ $reg->link_detail }}" target="_blank" onclick="event.stopPropagation()" class="hover:underline flex items-center gap-1">Detail Sekolah <span class="material-icons-outlined text-[12px]">open_in_new</span></a>
                                                @else
                                                <span class="hover:underline flex items-center gap-1">Detail Sekolah</span>
                                                @endif
                                            </summary>
                                            <div class="mt-2 p-3 bg-white border border-blue-100 rounded-lg shadow-sm">
                                                <ul class="pl-4 list-disc space-y-1 text-slate-600">
                                                    @foreach(explode(',', $reg->contoh_sekolah ?? '') as $school)
                                                        @if(trim($school))
                                                        <li>{{ trim($school) }}</li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </details>
                                        @endif
                                    </td>
                                    <td class="p-4 text-center align-top">{{ $reg->jumlah_sma }}</td>
                                    <td class="p-4 text-center align-top">{{ $reg->jumlah_smk }}</td>
                                    <td class="p-4 text-center align-top">{{ $reg->jumlah_slb ?? 0 }}</td>
                                    <td class="p-4 text-center font-black text-dikbud-primary bg-slate-50/50 align-top">{{ $reg->total }}</td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Footer Modal -->
            <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-between items-center rounded-b-2xl">
                <span class="text-xs font-semibold text-slate-500 flex items-center gap-1"><span class="material-icons text-[16px] text-blue-500">info</span> Data bersumber dari Dapodik</span>
                <button onclick="closeModal('modal-sekolah')" class="px-5 py-2 text-sm font-bold bg-slate-200 text-slate-700 hover:bg-slate-300 rounded-lg transition-colors">Tutup</button>
            </div>
        </div>
    </div>

    <!-- Script Interaktivitas -->
    <script>
        // Modal Control Logic
        function openModal(id) {
            const modal = document.getElementById(id);
            if(modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden'; 
            }
        }

        function closeModal(id) {
            const modal = document.getElementById(id);
            if(modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = 'auto'; 
            }
        }

                document.addEventListener('DOMContentLoaded', () => {
            const navbar = document.getElementById('navbar');
            const mobileBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            // Scroll Effect for Navbar shadow
            if (navbar) {
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 10) {
                        navbar.classList.add('shadow-md');
                    } else {
                        navbar.classList.remove('shadow-md');
                    }
                });
            }

            // Toggle Mobile Menu
            if (mobileBtn && mobileMenu) {
                mobileBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    mobileMenu.classList.toggle('hidden');
                    const icon = mobileBtn.querySelector('.material-icons');
                    if (icon) {
                        if (mobileMenu.classList.contains('hidden')) {
                            icon.textContent = 'menu';
                            document.body.style.overflow = 'auto';
                        } else {
                            icon.textContent = 'close';
                            document.body.style.overflow = 'hidden';
                        }
                    }
                });

                // Close when clicking link
                const mobileLinks = mobileMenu.querySelectorAll('a');
                mobileLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        mobileMenu.classList.add('hidden');
                        const icon = mobileBtn.querySelector('.material-icons');
                        if (icon) icon.textContent = 'menu';
                        document.body.style.overflow = 'auto';
                    });
                });
            }
        });
    </script>
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

    <!-- Modal Dokumen Layanan (Disetujui & Ditolak) -->
    <div id="modal-dokumen-layanan" class="fixed inset-0 z-[70] hidden bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-3 sm:p-5 overflow-y-auto">
        <div class="bg-white dark:bg-slate-900 rounded-3xl max-w-4xl w-full max-h-[92vh] shadow-2xl border border-slate-200 dark:border-slate-800 overflow-hidden flex flex-col my-auto">
            <!-- Header -->
            <div class="p-5 sm:p-6 bg-slate-50 dark:bg-slate-800/60 border-b border-slate-200 dark:border-slate-700/80 flex items-center justify-between gap-4">
                <div class="flex items-center gap-3.5">
                    <div id="modal-dokumen-icon-bg" class="w-12 h-12 rounded-2xl bg-emerald-600 text-white flex items-center justify-center shadow-md">
                        <i id="modal-dokumen-icon" class="fas fa-file-invoice text-xl"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-emerald-100 text-emerald-800 dark:bg-emerald-950/60 dark:text-emerald-400 border border-emerald-300 dark:border-emerald-700" id="modal-dokumen-badge">Pojok Layanan Masyarakat</span>
                            <span class="text-xs text-slate-400">Dinas Dikbud Maluku</span>
                        </div>
                        <h3 id="modal-dokumen-title" class="text-lg sm:text-xl font-black text-slate-900 dark:text-white leading-tight mt-0.5">
                            Dokumen Layanan Masyarakat
                        </h3>
                    </div>
                </div>
                <button onclick="closeDokumenLayananModal()" class="w-10 h-10 rounded-xl bg-slate-200 hover:bg-slate-300 dark:bg-slate-800 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 flex items-center justify-center transition-colors">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <!-- Controls: Filter Tabs & Live Search -->
            <div class="p-4 sm:p-5 border-b border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3">
                <div class="flex items-center gap-1.5 p-1 bg-slate-100 dark:bg-slate-800 rounded-xl">
                    <button type="button" onclick="setDokumenTab('all')" id="dokumen-tab-all" class="dokumen-tab-btn px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all">
                        Semua (<span id="count-all">0</span>)
                    </button>
                    <button type="button" onclick="setDokumenTab('Disetujui')" id="dokumen-tab-disetujui" class="dokumen-tab-btn px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all">
                        <i class="fas fa-check-circle text-emerald-500 mr-1"></i> Disetujui (<span id="count-disetujui">0</span>)
                    </button>
                    <button type="button" onclick="setDokumenTab('Ditolak')" id="dokumen-tab-ditolak" class="dokumen-tab-btn px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all">
                        <i class="fas fa-times-circle text-red-500 mr-1"></i> Ditolak (<span id="count-ditolak">0</span>)
                    </button>
                </div>

                <div class="relative flex-1 max-w-sm">
                    <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                    <input type="text" id="dokumen-search-input" oninput="filterDokumenList()" placeholder="Cari nama pemohon, kode layanan, atau perihal..." class="w-full pl-9 pr-3.5 py-2 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                </div>
            </div>

            <!-- List Body -->
            <div id="dokumen-list-container" class="p-4 sm:p-6 overflow-y-auto space-y-3.5 flex-1 bg-slate-50/50 dark:bg-slate-950/40 custom-scrollbar max-h-[55vh]">
                <!-- Item-item dokumen dirender via JS -->
            </div>

            <!-- Footer -->
            <div class="p-4 sm:p-5 bg-slate-50 dark:bg-slate-800/70 border-t border-slate-200 dark:border-slate-700/80 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs">
                <div class="flex items-center gap-2 text-slate-500 dark:text-slate-400">
                    <i class="fas fa-shield-alt text-emerald-600 text-sm"></i>
                    <span>Semua berkas bertanda tangan elektronik resmi & sah dari verifikator Dinas Dikbud Maluku.</span>
                </div>
                <button type="button" onclick="closeDokumenLayananModal()" class="px-5 py-2 rounded-xl bg-slate-200 hover:bg-slate-300 dark:bg-slate-700 dark:hover:bg-slate-600 text-slate-800 dark:text-white font-bold transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <script>
        
        // Data from Database
        const newsData = @json($newsData);
        const cultureData = @json($cultureData);
        const slides = @json($slides);


        // Initialize Page
        document.addEventListener('DOMContentLoaded', () => {
            initBannerSlider();
            initHeroSlider();
            try { initTheme(); } catch (e) { console.debug(e); }
            try { updateTime(); setInterval(updateTime, 1000); } catch (e) { console.debug(e); }
            try { renderNewsGrid(); } catch (e) { console.debug(e); }
            try { renderCultureGrid(); } catch (e) { console.debug(e); }
            try { initCarousel(); } catch (e) { console.debug(e); }
        });

        // Inisialisasi mandiri bila DOM sudah siap
        if (document.readyState === 'complete' || document.readyState === 'interactive') {
            setTimeout(() => {
                initBannerSlider();
                initHeroSlider();
            }, 100);
        }

        // Hero Multi-Slide Slider Logic
        let currentHeroSlide = 0;
        let heroSlideTimer = null;

        function initHeroSlider() {
            const heroSection = document.getElementById('hero-slider');
            if (!heroSection) return;

            const slideItems = heroSection.querySelectorAll('.hero-slide-item');
            if (slideItems.length <= 1) return;

            startHeroSlideTimer();

            // Pause on hover
            heroSection.addEventListener('mouseenter', () => {
                if (heroSlideTimer) clearInterval(heroSlideTimer);
            });
            heroSection.addEventListener('mouseleave', () => {
                startHeroSlideTimer();
            });
        }

        function startHeroSlideTimer() {
            if (heroSlideTimer) clearInterval(heroSlideTimer);
            heroSlideTimer = setInterval(() => {
                nextHeroSlide();
            }, 7000);
        }

        function showHeroSlide(index) {
            const heroSection = document.getElementById('hero-slider');
            if (!heroSection) return;

            const slideItems = heroSection.querySelectorAll('.hero-slide-item');
            if (slideItems.length === 0) return;

            currentHeroSlide = (index + slideItems.length) % slideItems.length;

            slideItems.forEach((item, idx) => {
                if (idx === currentHeroSlide) {
                    item.classList.remove('opacity-0', 'pointer-events-none', 'z-0');
                    item.classList.add('opacity-100', 'z-10');
                } else {
                    item.classList.remove('opacity-100', 'z-10');
                    item.classList.add('opacity-0', 'pointer-events-none', 'z-0');
                }
            });

            // Update dots
            const dotsContainer = document.getElementById('hero-slider-dots');
            if (dotsContainer) {
                const dots = dotsContainer.querySelectorAll('.hero-dot');
                dots.forEach((dot, idx) => {
                    if (idx === currentHeroSlide) {
                        dot.className = 'hero-dot w-8 h-2.5 rounded-full bg-dikbud-accent transition-all shadow';
                    } else {
                        dot.className = 'hero-dot w-2.5 h-2.5 rounded-full bg-white/40 hover:bg-white/70 transition-all shadow';
                    }
                });
            }
        }

        function nextHeroSlide() {
            showHeroSlide(currentHeroSlide + 1);
            startHeroSlideTimer();
        }

        function prevHeroSlide() {
            showHeroSlide(currentHeroSlide - 1);
            startHeroSlideTimer();
        }

        function goToHeroSlide(index) {
            showHeroSlide(index);
            startHeroSlideTimer();
        }

        // Banner Iklan & Infografis Gubernur Slider Logic
        let currentBannerSlide = 0;
        let bannerSlideTimer = null;

        function initBannerSlider() {
            const container = document.getElementById('infografis-banner-carousel');
            if (!container) return;

            const slides = container.querySelectorAll('.banner-slide-item');
            if (slides.length <= 1) return;

            startBannerSlideTimer();

            container.addEventListener('mouseenter', () => {
                if (bannerSlideTimer) clearInterval(bannerSlideTimer);
            });
            container.addEventListener('mouseleave', () => {
                startBannerSlideTimer();
            });

            // Touch Swipe Support for mobile devices
            let touchStartX = 0;
            let touchEndX = 0;
            container.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
            }, { passive: true });
            container.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                if (touchStartX - touchEndX > 50) {
                    nextBannerSlide();
                } else if (touchEndX - touchStartX > 50) {
                    prevBannerSlide();
                }
            }, { passive: true });
        }

        function startBannerSlideTimer() {
            if (bannerSlideTimer) clearInterval(bannerSlideTimer);
            bannerSlideTimer = setInterval(() => {
                nextBannerSlide();
            }, 5000);
        }

        function showBannerSlide(index) {
            const container = document.getElementById('infografis-banner-carousel');
            if (!container) return;

            const slides = container.querySelectorAll('.banner-slide-item');
            if (slides.length === 0) return;

            currentBannerSlide = (index + slides.length) % slides.length;

            const track = document.getElementById('banner-slides-track');
            if (track) {
                track.style.transform = `translateX(-${currentBannerSlide * 100}%)`;
            }

            // Update dots
            const dotsContainer = document.getElementById('banner-slider-dots');
            if (dotsContainer) {
                const dots = dotsContainer.querySelectorAll('.banner-dot');
                dots.forEach((dot, idx) => {
                    if (idx === currentBannerSlide) {
                        dot.className = 'banner-dot rounded-full transition-all duration-300 w-6 sm:w-8 h-2 sm:h-2.5 bg-teal-400 shadow-md ring-2 ring-white/80';
                    } else {
                        dot.className = 'banner-dot rounded-full transition-all duration-300 w-2 sm:w-2.5 h-2 sm:h-2.5 bg-slate-700/60 hover:bg-slate-900';
                    }
                });
            }
        }

        function nextBannerSlide() {
            showBannerSlide(currentBannerSlide + 1);
            startBannerSlideTimer();
        }

        function prevBannerSlide() {
            showBannerSlide(currentBannerSlide - 1);
            startBannerSlideTimer();
        }

        function goToBannerSlide(index) {
            showBannerSlide(index);
            startBannerSlideTimer();
        }

        // Live Clock Function
        function updateTime() {
            const now = new Date();
            const optionsDate = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const dateStr = now.toLocaleDateString('id-ID', optionsDate);
            const timeStr = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' }) + ' WIT';
            
            const dateEl = document.getElementById('current-date');
            const timeEl = document.getElementById('current-time');
            if (dateEl) dateEl.innerText = dateStr;
            if (timeEl) timeEl.innerText = timeStr;
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
            if (!dotsContainer) return;
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
            if (!slides || !slides[currentSlide]) return;
            const slide = slides[currentSlide];
            const imgEl = document.getElementById('hero-img');
            const titleEl = document.getElementById('hero-title');
            const descEl = document.getElementById('hero-desc');
            const tagEl = document.getElementById('hero-tag');
            const dateEl = document.getElementById('hero-date');
            if (imgEl) imgEl.src = slide.img;
            if (titleEl) titleEl.innerText = slide.title;
            if (descEl) descEl.innerText = slide.desc;
            if (tagEl) tagEl.innerText = slide.tag;
            if (dateEl) dateEl.innerHTML = `<i class="far fa-clock mr-1"></i> ${slide.date}`;

            const dotsContainer = document.getElementById('slide-dots');
            if (dotsContainer) {
                const dots = dotsContainer.children;
                Array.from(dots).forEach((dot, idx) => {
                    dot.className = `w-2.5 h-2.5 rounded-full transition-all ${idx === currentSlide ? 'bg-amber-400 w-6' : 'bg-white/50'}`;
                });
            }
        }

        // News Grid Rendering
        function renderNewsGrid() {
            const grid = document.getElementById('news-grid');
            if (!grid) return;
            grid.innerHTML = '';

            const filtered = activeCategory === 'semua' 
                ? newsData 
                : newsData.filter(item => item.category === activeCategory);

            if (filtered.length === 0) {
                grid.innerHTML = `<div class="col-span-full text-center py-12 text-slate-500">Tidak ada berita ditemukan untuk kategori ini.</div>`;
                return;
            }

            filtered.forEach(item => {
                const card = document.createElement('article');
                card.className = "bg-white dark:bg-slate-900 rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group";
                card.innerHTML = `
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
                `;
                grid.appendChild(card);
            });
        }

        function filterNews(cat) {
            activeCategory = cat;
            const buttons = document.querySelectorAll('.cat-btn');
            buttons.forEach(btn => {
                btn.classList.remove('bg-red-700', 'text-white', 'shadow');
                btn.classList.add('bg-slate-200', 'dark:bg-slate-800', 'text-slate-700', 'dark:text-slate-300');
            });
            event.target.classList.remove('bg-slate-200', 'dark:bg-slate-800', 'text-slate-700', 'dark:text-slate-300');
            event.target.classList.add('bg-red-700', 'text-white', 'shadow');
            renderNewsGrid();
        }

        // Culture Grid Rendering
        function renderCultureGrid() {
            const container = document.getElementById('culture-grid');
            if (!container) return;
            container.innerHTML = '';

            const filtered = activeCultureTab === 'all' 
                ? cultureData 
                : cultureData.filter(c => c.type === activeCultureTab);

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
            openNewsDetail(1);
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

        function submitComplaint(e) {
            e.preventDefault();
            alertModal('Terima kasih! Laporan aspirasi Anda telah berhasil dikirim ke E-Lapor Disdikbud Maluku. Nomor tiket penanganan akan dikirimkan via WhatsApp.');
            document.getElementById('complaint-form').reset();
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

        // Layanan Submissions Data from Database
        const rawLayananSubmissions = @json($layananSubmissions ?? []);
        let activeDokumenTab = 'all';

        function openDokumenLayananModal(initialTab = 'all') {
            const modal = document.getElementById('modal-dokumen-layanan');
            if (!modal) return;

            activeDokumenTab = initialTab;
            const searchInput = document.getElementById('dokumen-search-input');
            if (searchInput) searchInput.value = '';

            updateDokumenCounts();
            setDokumenTab(initialTab);
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeDokumenLayananModal() {
            const modal = document.getElementById('modal-dokumen-layanan');
            if (modal) {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        }

        function updateDokumenCounts() {
            const countAll = rawLayananSubmissions.length;
            const countDisetujui = rawLayananSubmissions.filter(s => ['Disetujui', 'Selesai'].includes(s.status)).length;
            const countDitolak = rawLayananSubmissions.filter(s => s.status === 'Ditolak').length;

            const elAll = document.getElementById('count-all');
            const elDisetujui = document.getElementById('count-disetujui');
            const elDitolak = document.getElementById('count-ditolak');

            if (elAll) elAll.textContent = countAll;
            if (elDisetujui) elDisetujui.textContent = countDisetujui;
            if (elDitolak) elDitolak.textContent = countDitolak;
        }

        function setDokumenTab(tab) {
            activeDokumenTab = tab;
            const tabs = ['all', 'Disetujui', 'Ditolak'];
            tabs.forEach(t => {
                const btn = document.getElementById('dokumen-tab-' + t.toLowerCase());
                if (btn) {
                    if (t === tab) {
                        btn.className = 'dokumen-tab-btn px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all bg-white dark:bg-slate-900 shadow-sm ' +
                            (t === 'Disetujui' ? 'text-emerald-600 dark:text-emerald-400' : (t === 'Ditolak' ? 'text-red-600 dark:text-red-400' : 'text-slate-800 dark:text-white'));
                    } else {
                        btn.className = 'dokumen-tab-btn px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-white';
                    }
                }
            });

            // Update modal header badge & styling
            const badgeEl = document.getElementById('modal-dokumen-badge');
            const titleEl = document.getElementById('modal-dokumen-title');
            const iconBg = document.getElementById('modal-dokumen-icon-bg');
            const iconEl = document.getElementById('modal-dokumen-icon');

            if (tab === 'Disetujui') {
                if (badgeEl) {
                    badgeEl.textContent = 'Layanan Telah Disetujui';
                    badgeEl.className = 'px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-emerald-100 text-emerald-800 dark:bg-emerald-950/60 dark:text-emerald-400 border border-emerald-300 dark:border-emerald-700';
                }
                if (titleEl) titleEl.textContent = 'Unduh Dokumen & SK Disetujui';
                if (iconBg) iconBg.className = 'w-12 h-12 rounded-2xl bg-emerald-600 text-white flex items-center justify-center shadow-md';
                if (iconEl) iconEl.className = 'fas fa-check-circle text-xl';
            } else if (tab === 'Ditolak') {
                if (badgeEl) {
                    badgeEl.textContent = 'Layanan Ditolak / Revisi';
                    badgeEl.className = 'px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-red-100 text-red-800 dark:bg-red-950/60 dark:text-red-400 border border-red-300 dark:border-red-700';
                }
                if (titleEl) titleEl.textContent = 'Unduh Surat Penolakan & Catatan';
                if (iconBg) iconBg.className = 'w-12 h-12 rounded-2xl bg-red-600 text-white flex items-center justify-center shadow-md';
                if (iconEl) iconEl.className = 'fas fa-times-circle text-xl';
            } else {
                if (badgeEl) {
                    badgeEl.textContent = 'Pojok Layanan Masyarakat';
                    badgeEl.className = 'px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-blue-100 text-blue-800 dark:bg-blue-950/60 dark:text-blue-400 border border-blue-300 dark:border-blue-700';
                }
                if (titleEl) titleEl.textContent = 'Semua Berkas Dokumen Layanan';
                if (iconBg) iconBg.className = 'w-12 h-12 rounded-2xl bg-slate-800 text-white flex items-center justify-center shadow-md';
                if (iconEl) iconEl.className = 'fas fa-folder-open text-xl';
            }

            filterDokumenList();
        }

        function filterDokumenList() {
            const container = document.getElementById('dokumen-list-container');
            if (!container) return;

            const query = (document.getElementById('dokumen-search-input')?.value || '').toLowerCase().trim();

            let filtered = rawLayananSubmissions;

            if (activeDokumenTab === 'Disetujui') {
                filtered = filtered.filter(s => ['Disetujui', 'Selesai'].includes(s.status));
            } else if (activeDokumenTab === 'Ditolak') {
                filtered = filtered.filter(s => s.status === 'Ditolak');
            }

            if (query) {
                filtered = filtered.filter(s => 
                    (s.sender_name && s.sender_name.toLowerCase().includes(query)) ||
                    (s.service_title && s.service_title.toLowerCase().includes(query)) ||
                    (s.service_code && s.service_code.toLowerCase().includes(query)) ||
                    (s.instance && s.instance.toLowerCase().includes(query)) ||
                    (s.admin_notes && s.admin_notes.toLowerCase().includes(query))
                );
            }

            if (filtered.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-12 px-4">
                        <div class="w-16 h-16 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center mx-auto text-slate-400 text-2xl mb-3">
                            <i class="fas fa-file-excel"></i>
                        </div>
                        <h4 class="font-bold text-slate-700 dark:text-slate-300 text-sm">Tidak ada dokumen ditemukan</h4>
                        <p class="text-xs text-slate-400 mt-1">Coba gunakan kata kunci pencarian lain atau pilih tab filter yang berbeda.</p>
                    </div>
                `;
                return;
            }

            let html = '';
            filtered.forEach(item => {
                const isApproved = ['Disetujui', 'Selesai'].includes(item.status);
                const isRejected = item.status === 'Ditolak';

                const statusBadge = isApproved 
                    ? `<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-black bg-emerald-100 text-emerald-800 dark:bg-emerald-950/60 dark:text-emerald-400 border border-emerald-300 dark:border-emerald-700"><i class="fas fa-check-circle"></i> Disetujui</span>`
                    : (isRejected 
                        ? `<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-black bg-red-100 text-red-800 dark:bg-red-950/60 dark:text-red-400 border border-red-300 dark:border-red-700"><i class="fas fa-times-circle"></i> Ditolak</span>`
                        : `<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-black bg-amber-100 text-amber-800 dark:bg-amber-950/60 dark:text-amber-400 border border-amber-300 dark:border-amber-700"><i class="fas fa-clock"></i> ` + (item.status || 'Dalam Proses') + `</span>`);

                const downloadUrl = `/layanan/dokumen/download/` + item.id;
                const downloadBtnClass = isApproved 
                    ? 'bg-emerald-600 hover:bg-emerald-700 text-white' 
                    : (isRejected ? 'bg-red-600 hover:bg-red-700 text-white' : 'bg-slate-800 hover:bg-slate-900 text-white');

                const downloadBtnText = isApproved ? 'Unduh SK Resmi' : (isRejected ? 'Unduh Surat Penolakan' : 'Unduh Berkas');

                const dateStr = item.created_at ? new Date(item.created_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' }) : '-';

                const notesBox = item.admin_notes ? `
                    <div class="mt-3 p-3 rounded-xl ` + (isApproved ? 'bg-emerald-50/80 dark:bg-emerald-950/30 border border-emerald-200/80 dark:border-emerald-800/50 text-emerald-900 dark:text-emerald-300' : 'bg-red-50/80 dark:bg-red-950/30 border border-red-200/80 dark:border-red-800/50 text-red-900 dark:text-red-300') + ` text-xs">
                        <div class="font-bold flex items-center gap-1.5 mb-0.5">
                            <i class="fas ` + (isApproved ? 'fa-info-circle' : 'fa-exclamation-triangle') + `"></i>
                            <span>` + (isApproved ? 'Catatan Verifikator Dinas:' : 'Alasan / Catatan Penolakan:') + `</span>
                        </div>
                        <p class="leading-relaxed">` + item.admin_notes + `</p>
                    </div>
                ` : '';

                html += `
                    <div class="p-4 sm:p-5 bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-md transition-all">
                        <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-3">
                            <div class="space-y-1.5 flex-1 min-w-0">
                                <div class="flex flex-wrap items-center gap-2">
                                    ` + statusBadge + `
                                    <span class="px-2.5 py-0.5 rounded-md text-[11px] font-bold bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300">
                                        Kode: ` + (item.service_code || '-') + `
                                    </span>
                                    <span class="text-[11px] text-slate-400 flex items-center gap-1">
                                        <i class="far fa-calendar-alt"></i> ` + dateStr + `
                                    </span>
                                </div>
                                <h4 class="text-base sm:text-lg font-extrabold text-slate-800 dark:text-white leading-snug">
                                    ` + (item.service_title || 'Permohonan Layanan') + `
                                </h4>
                                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-slate-500 dark:text-slate-400 pt-0.5">
                                    <span class="flex items-center gap-1 font-semibold text-slate-700 dark:text-slate-300">
                                        <i class="fas fa-user-circle text-slate-400"></i> ` + item.sender_name + `
                                    </span>
                                    ` + (item.instance ? `<span class="flex items-center gap-1"><i class="fas fa-building text-slate-400"></i> ` + item.instance + `</span>` : '') + `
                                    <span class="flex items-center gap-1 text-[11px] text-slate-400 truncate max-w-xs">
                                        <i class="fas fa-file-pdf text-red-500"></i> ` + (item.file_name || 'dokumen.pdf') + `
                                    </span>
                                </div>
                            </div>
                            <div class="flex sm:flex-col items-center gap-2 flex-shrink-0 pt-2 sm:pt-0">
                                <a href="` + downloadUrl + `" class="flex-1 sm:flex-none w-full sm:w-auto inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl font-bold text-xs ` + downloadBtnClass + ` shadow-sm hover:scale-[1.02] active:scale-[0.98] transition-all whitespace-nowrap">
                                    <i class="fas fa-download"></i>
                                    <span>` + downloadBtnText + `</span>
                                </a>
                                <a href="` + downloadUrl + `" target="_blank" class="px-3 py-2.5 rounded-xl text-xs font-bold bg-slate-100 hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 transition-colors" title="Buka Pratinjau Dokumen">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            </div>
                        </div>
                        ` + notesBox + `
                    </div>
                `;
            });

            container.innerHTML = html;
        }

        // Close on ESC
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeDokumenLayananModal();
            }
        });

    </script>
<script>
    const newsData = @json($newsData);
    const cultureData = @json($cultureData);
</script>
</body>
</html>
































