<!DOCTYPE html>
<html lang="id-ID" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinas Pendidikan dan Kebudayaan Provinsi Maluku</title>
    <meta name="description" content="Website resmi Dinas Pendidikan dan Kebudayaan Provinsi Maluku. Pusat informasi pendidikan, transparansi publik, dan layanan masyarakat.">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Merriweather:wght@700;900&display=swap" rel="stylesheet">
    
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
                        <img src="{{ asset('images/logo-maluku.png') }}" alt="Logo Maluku" class="w-12 h-12 object-contain drop-shadow-md">
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

                    <!-- Galeri Foto & Video -->
                    <a href="{{ url('/galeri') }}" class="px-3 py-2 text-sm font-semibold text-slate-600 hover:text-dikbud-secondary transition-colors flex items-center gap-1">
                        <span class="material-icons-outlined text-[16px]">collections</span> Galeri Foto
                    </a>

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
                    <p class="px-3 py-2 text-sm font-semibold text-slate-400 uppercase tracking-wider">Dokumentasi & Media</p>
                    <a href="{{ url('/galeri') }}" class="block px-3 py-2 text-base text-slate-600 hover:text-dikbud-primary flex items-center justify-between">
                        <span>Galeri Foto & Video</span>
                        <span class="material-icons-outlined text-[18px] text-dikbud-primary">collections</span>
                    </a>
                </div>
                <div class="py-2 border-t border-slate-100">
                    <p class="px-3 py-2 text-sm font-semibold text-slate-400 uppercase tracking-wider">Media Sosial Resmi</p>
                    @if(isset($socialMediaLinks) && $socialMediaLinks->count() > 0)
                        @foreach($socialMediaLinks as $sosmed)
                        <a href="{{ $sosmed->url }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-between px-3 py-2 text-sm text-slate-600 hover:text-dikbud-primary">
                            <span class="flex items-center gap-2">
                                <span class="w-5 h-5 rounded flex items-center justify-center text-white text-[10px] {{ $sosmed->badge_bg_class }}">
                                    <i class="{{ $sosmed->icon_class }}"></i>
                                </span>
                                {{ $sosmed->name }}
                            </span>
                            <span class="material-icons-outlined text-[14px] text-slate-400">open_in_new</span>
                        </a>
                        @endforeach
                    @endif
                </div>
                <a href="/login" class="block mt-6 px-3 py-3 rounded-lg text-center text-base font-bold bg-dikbud-primary text-white">Login Administrator</a>
            </div>
        </div>
    </nav>

    
<section class="py-12 bg-white min-h-[60vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Left Column (Article) -->
            <div class="md:col-span-2">
                <a href="/" class="inline-flex items-center gap-2 text-dikbud-secondary hover:text-dikbud-primary font-semibold mb-6 transition-colors">
                    <span class="material-icons text-[20px]">arrow_back</span> Kembali ke Beranda
                </a>

                <article class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100">
                    @if($post->image)
                    @php
                        $postImageSrc = \Illuminate\Support\Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : (\Illuminate\Support\Str::startsWith($post->image, ['/uploads', 'uploads']) ? asset($post->image) : (\Illuminate\Support\Str::startsWith($post->image, ['/storage', 'storage']) ? asset(ltrim($post->image, '/')) : asset('storage/' . $post->image)));
                    @endphp
                    <div class="w-full h-64 md:h-96 overflow-hidden bg-slate-100">
                        <img src="{{ $postImageSrc }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                    </div>
                    @endif
                    <div class="p-6 md:p-10">
                        <div class="flex items-center gap-4 text-sm text-slate-500 mb-4">
                            <span class="flex items-center gap-1"><span class="material-icons-outlined text-[16px]">calendar_today</span> {{ $post->created_at ? $post->created_at->translatedFormat('d F Y') : ($post->date ?? '') }}</span>
                            <span class="flex items-center gap-1"><span class="material-icons-outlined text-[16px]">folder</span> {{ $post->type }}</span>
                            <span class="flex items-center gap-1"><span class="material-icons-outlined text-[16px]">person</span> Administrator</span>
                        </div>
                        
                        <h1 class="text-2xl md:text-4xl font-bold text-dikbud-primary mb-6 leading-tight">
                            {{ $post->title }}
                        </h1>
                        
                        <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed text-base md:text-lg">
                            {!! nl2br(e($post->content)) !!}
                        </div>
                    </div>
                </article>
            </div>
            
            <!-- Right Column (Sidebar) -->
            <div class="space-y-8">
                <!-- Pengumuman Section -->
                <div id="pengumuman" class="bg-white rounded-xl shadow-soft border border-slate-100 p-6 sticky top-28">
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
                
                <!-- Agenda Kegiatan (Added to match screenshot) -->
                <div class="bg-gradient-to-br from-dikbud-primary to-dikbud-dark rounded-xl shadow-lg p-6 text-white sticky top-[400px]">
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
        <div>
            <h4 class="text-sm font-bold leading-tight mb-1 cursor-pointer hover:text-dikbud-accent transition-colors">{{ $agenda->title }}</h4>
            <p class="text-xs text-slate-300 flex items-center gap-1"><span class="material-icons-outlined text-[12px]">location_on</span> {{ $agenda->location }}</p>
        </div>
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

<!-- Footer -->
    <footer class="bg-dikbud-dark text-slate-400 pt-16 pb-8 border-t-4 border-dikbud-secondary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <!-- Info Instansi -->
                <div class="lg:col-span-1">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-dikbud-primary rounded-full flex items-center justify-center">
                            <span class="material-icons text-white">account_balance</span>
                        </div>
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
                    <h3 class="text-white font-bold mb-6 text-sm uppercase tracking-wider">Sosial Media & CMS</h3>
                    <div class="flex space-x-3 mb-8">
                        <a href="#" class="w-10 h-10 rounded bg-white/5 flex items-center justify-center hover:bg-dikbud-secondary hover:text-white transition-colors"><span class="material-icons">facebook</span></a>
                        <a href="#" class="w-10 h-10 rounded bg-white/5 flex items-center justify-center hover:bg-dikbud-secondary hover:text-white transition-colors"><span class="material-icons">camera_alt</span></a>
                        <a href="#" class="w-10 h-10 rounded bg-white/5 flex items-center justify-center hover:bg-red-600 hover:text-white transition-colors"><span class="material-icons">play_arrow</span></a>
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
        <div class="relative bg-white w-full max-w-5xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
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
</body>
</html>






















