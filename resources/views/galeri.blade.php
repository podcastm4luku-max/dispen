<!DOCTYPE html>
<html lang="id-ID" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Foto & Video - Dinas Pendidikan dan Kebudayaan Provinsi Maluku</title>
    <meta name="description" content="Dokumentasi foto dan video resmi kegiatan, program pendidikan, dan pelestarian kebudayaan Dinas Pendidikan dan Kebudayaan Provinsi Maluku.">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Material & FontAwesome Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] },
                    colors: {
                        dikbud: {
                            dark: '#0f172a',
                            primary: '#1e3a8a',
                            secondary: '#2563eb',
                            accent: '#f59e0b',
                            light: '#f8fafc',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .nav-item:hover .dropdown-menu { display: block; }
        .gallery-card { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .gallery-card:hover { transform: translateY(-4px); }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased flex flex-col min-h-screen">

    <!-- Top Bar -->
    <div class="bg-dikbud-dark text-slate-300 text-xs py-2 hidden md:block border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <span class="flex items-center gap-1"><span class="material-icons-outlined text-[14px] text-dikbud-accent">public</span> Portal Resmi Disdikbud Maluku</span>
                <span class="flex items-center gap-1"><span class="material-icons-outlined text-[14px] text-dikbud-accent">phone</span> (0911) - 352389, 352367</span>
            </div>
            <div class="flex items-center gap-4">
                <a href="/login" class="text-slate-300 hover:text-white flex items-center gap-1 transition-colors"><span class="material-icons-outlined text-[14px]">lock</span> Login Admin</a>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="sticky top-0 w-full z-50 bg-white border-b border-slate-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <img src="{{ asset('images/logo-maluku.png') }}" alt="Logo Maluku" class="w-11 h-11 object-contain drop-shadow-md">
                    <div class="flex flex-col">
                        <span class="font-bold text-dikbud-primary text-sm sm:text-base leading-tight">DINAS PENDIDIKAN & KEBUDAYAAN</span>
                        <span class="font-medium text-slate-500 text-xs leading-tight">PROVINSI MALUKU</span>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-1">
                    <a href="{{ url('/') }}" class="px-3 py-2 text-sm font-semibold text-slate-600 hover:text-dikbud-primary transition-colors">Beranda</a>
                    
                    <div class="nav-item relative h-full flex items-center">
                        <button class="px-3 py-2 text-sm font-semibold text-slate-600 hover:text-dikbud-primary flex items-center gap-1 transition-colors">
                            Profil OPD <span class="material-icons-outlined text-[16px]">expand_more</span>
                        </button>
                        <div class="dropdown-menu absolute top-full left-0 w-56 bg-white border border-slate-200 shadow-xl rounded-b-lg hidden overflow-hidden">
                            <a href="{{ url('/visi-misi') }}" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-primary border-b border-slate-100">Visi & Misi</a>
                            <a href="{{ url('/tugas-fungsi') }}" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-primary border-b border-slate-100">Tugas & Fungsi</a>
                            <a href="{{ url('/struktur-organisasi') }}" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-primary">Struktur Organisasi</a>
                        </div>
                    </div>

                    <a href="{{ url('/berita-terkini') }}" class="px-3 py-2 text-sm font-semibold text-slate-600 hover:text-dikbud-primary transition-colors">Berita & Info</a>
                    <a href="{{ url('/dokumen-peraturan') }}" class="px-3 py-2 text-sm font-semibold text-slate-600 hover:text-dikbud-primary transition-colors">Transparansi</a>
                    <a href="{{ url('/#layanan') }}" class="px-3 py-2 text-sm font-semibold text-slate-600 hover:text-dikbud-primary transition-colors">Layanan</a>
                    
                    <!-- Menu Galeri Aktif -->
                    <a href="{{ url('/galeri') }}" class="px-3 py-2 text-sm font-bold text-dikbud-primary border-b-2 border-dikbud-primary">Galeri Foto</a>

                    <!-- Media Sosial Dropdown (di samping Galeri Foto) -->
                    <div class="nav-item relative h-full flex items-center">
                        <button class="px-3 py-2 text-sm font-semibold text-slate-600 hover:text-dikbud-primary flex items-center gap-1 transition-colors">
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

                    <a href="{{ url('/') }}" class="ml-4 px-3.5 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold rounded-lg transition-colors flex items-center gap-1.5">
                        <span class="material-icons-outlined text-[14px]">arrow_back</span> Ke Beranda
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="lg:hidden text-slate-600 hover:text-dikbud-primary p-2">
                    <span class="material-icons text-2xl">menu</span>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-slate-200 px-4 py-3 space-y-2">
            <a href="{{ url('/') }}" class="block px-3 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50 rounded-lg">Beranda Utama</a>
            <a href="{{ url('/berita-terkini') }}" class="block px-3 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50 rounded-lg">Berita & Informasi</a>
            <a href="{{ url('/dokumen-peraturan') }}" class="block px-3 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50 rounded-lg">Dokumen Peraturan & SK</a>
            <a href="{{ url('/galeri') }}" class="block px-3 py-2 text-sm font-bold text-dikbud-primary bg-blue-50 rounded-lg">Galeri Foto & Video</a>
            <a href="{{ url('/pengaduan') }}" class="block px-3 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50 rounded-lg">Layanan Pengaduan</a>
            <div class="pt-2 border-t border-slate-100">
                <p class="px-3 py-1 text-xs font-bold text-slate-400 uppercase tracking-wider">Media Sosial</p>
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
        </div>
    </nav>

    <!-- Header Hero Galeri -->
    <header class="bg-gradient-to-r from-dikbud-dark via-dikbud-primary to-slate-900 text-white py-14 px-4 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 text-dikbud-accent text-xs font-bold mb-3 backdrop-blur-sm">
                        <span class="material-icons-outlined text-[14px]">collections</span> Dokumentasi Multimedia Resmi
                    </div>
                    <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight">Galeri Foto & Video</h1>
                    <p class="text-slate-300 text-sm md:text-base mt-2 max-w-2xl leading-relaxed">
                        Arsip dokumentasi visual kegiatan kedinasan, program pendidikan, festival kebudayaan daerah, dan prestasi pelajar Maluku.
                    </p>
                </div>
                
                <!-- Quick Stats Badge -->
                <div class="flex items-center gap-3">
                    <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl px-5 py-3 text-center">
                        <div class="text-2xl font-black text-amber-400">{{ $totalAll }}</div>
                        <div class="text-[11px] text-slate-300 uppercase font-semibold tracking-wider">Total Media</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl px-5 py-3 text-center">
                        <div class="text-2xl font-black text-blue-300">{{ $totalFoto }}</div>
                        <div class="text-[11px] text-slate-300 uppercase font-semibold tracking-wider">Foto</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl px-5 py-3 text-center">
                        <div class="text-2xl font-black text-emerald-300">{{ $totalVideo }}</div>
                        <div class="text-[11px] text-slate-300 uppercase font-semibold tracking-wider">Video</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <!-- Filter Bar & Search -->
        <div class="bg-white rounded-2xl border border-slate-200 p-4 mb-8 shadow-sm flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            
            <!-- Type Tabs Filter -->
            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('galeri') }}" class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ empty($type) || $type == 'all' ? 'bg-dikbud-primary text-white shadow-md' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                    <span class="inline-flex items-center gap-1.5"><span class="material-icons-outlined text-[14px]">grid_view</span> Semua ({{ $totalAll }})</span>
                </a>
                <a href="{{ route('galeri', ['type' => 'foto', 'category' => $category]) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $type == 'foto' ? 'bg-dikbud-primary text-white shadow-md' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                    <span class="inline-flex items-center gap-1.5"><span class="material-icons-outlined text-[14px]">photo_camera</span> Foto ({{ $totalFoto }})</span>
                </a>
                <a href="{{ route('galeri', ['type' => 'video', 'category' => $category]) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $type == 'video' ? 'bg-dikbud-primary text-white shadow-md' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                    <span class="inline-flex items-center gap-1.5"><span class="material-icons-outlined text-[14px]">videocam</span> Video ({{ $totalVideo }})</span>
                </a>
            </div>

            <!-- Search Input -->
            <div class="relative w-full md:w-72">
                <span class="material-icons-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[18px]">search</span>
                <input type="text" id="gallery-search" placeholder="Cari kegiatan / judul..." class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:outline-none focus:border-dikbud-primary focus:bg-white transition-all">
            </div>
        </div>

        <!-- Category Pills (Optional Sub-Filter) -->
        @if(!empty($categories) && count($categories) > 0)
        <div class="flex flex-wrap items-center gap-2 mb-8">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mr-1">Kategori:</span>
            <a href="{{ route('galeri', ['type' => $type]) }}" class="px-3 py-1 rounded-full text-xs font-medium transition-colors {{ empty($category) ? 'bg-dikbud-accent text-slate-900 font-bold' : 'bg-white border border-slate-200 text-slate-600 hover:bg-slate-100' }}">
                Semua Kategori
            </a>
            @foreach($categories as $cat)
            <a href="{{ route('galeri', ['type' => $type, 'category' => $cat]) }}" class="px-3 py-1 rounded-full text-xs font-medium transition-colors {{ $category == $cat ? 'bg-dikbud-accent text-slate-900 font-bold' : 'bg-white border border-slate-200 text-slate-600 hover:bg-slate-100' }}">
                {{ $cat }}
            </a>
            @endforeach
        </div>
        @endif

        <!-- Media Grid -->
        <div id="gallery-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($galleries as $item)
            <div class="gallery-item gallery-card bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl flex flex-col group cursor-pointer"
                 data-title="{{ strtolower($item->title) }}"
                 data-category="{{ strtolower($item->category ?? '') }}"
                 data-description="{{ strtolower($item->description ?? '') }}"
                 onclick="openMediaModal({{ json_encode($item) }})">
                
                <!-- Thumbnail Container -->
                <div class="relative aspect-video bg-slate-900 overflow-hidden">
                    <img src="{{ $item->display_url }}" 
                         alt="{{ $item->title }}" 
                         loading="lazy"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    
                    <!-- Overlay Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent opacity-60 group-hover:opacity-80 transition-opacity"></div>
                    
                    <!-- Type Badge -->
                    <div class="absolute top-3 left-3">
                        @if($item->type === 'video')
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-red-600 text-white shadow-md">
                            <span class="material-icons text-[14px]">videocam</span> Video
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-blue-600 text-white shadow-md">
                            <span class="material-icons text-[14px]">photo_camera</span> Foto
                        </span>
                        @endif
                    </div>

                    <!-- Category Badge -->
                    @if($item->category)
                    <div class="absolute top-3 right-3">
                        <span class="inline-block px-2.5 py-1 rounded-full text-[10px] font-bold bg-white/90 text-slate-800 backdrop-blur-sm shadow">
                            {{ $item->category }}
                        </span>
                    </div>
                    @endif

                    <!-- Center Play Icon for Video / Zoom Icon for Photo -->
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                        @if($item->type === 'video')
                        <div class="w-12 h-12 rounded-full bg-red-600/90 text-white flex items-center justify-center group-hover:scale-110 group-hover:bg-red-600 transition-all shadow-xl">
                            <span class="material-icons text-2xl">play_arrow</span>
                        </div>
                        @else
                        <div class="w-10 h-10 rounded-full bg-white/30 text-white backdrop-blur-md flex items-center justify-center opacity-0 group-hover:opacity-100 group-hover:scale-110 transition-all shadow-lg">
                            <span class="material-icons text-xl">zoom_in</span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Content Info -->
                <div class="p-5 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-2 text-[11px] text-slate-400 mb-2">
                            <span class="material-icons-outlined text-[13px]">calendar_today</span>
                            <span>{{ $item->event_date ? $item->event_date->isoFormat('D MMMM Y') : $item->created_at->isoFormat('D MMMM Y') }}</span>
                        </div>
                        <h3 class="font-bold text-slate-800 text-sm leading-snug group-hover:text-dikbud-secondary transition-colors line-clamp-2">
                            {{ $item->title }}
                        </h3>
                        @if($item->description)
                        <p class="text-xs text-slate-500 mt-2 line-clamp-2 leading-relaxed">
                            {{ $item->description }}
                        </p>
                        @endif
                    </div>

                    <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-dikbud-secondary">
                        <span>{{ $item->type === 'video' ? 'Putar Video' : 'Lihat Foto Resolusi Penuh' }}</span>
                        <span class="material-icons-outlined text-[16px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-16 text-center">
                <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-full flex items-center justify-center mx-auto mb-3">
                    <span class="material-icons text-3xl">perm_media</span>
                </div>
                <h4 class="text-base font-bold text-slate-700">Belum Ada Dokumentasi Media</h4>
                <p class="text-xs text-slate-400 mt-1">Dokumentasi foto dan video akan segera diunggah oleh admin.</p>
            </div>
            @endforelse
        </div>

        <div id="no-search-results" class="hidden py-16 text-center">
            <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-full flex items-center justify-center mx-auto mb-3">
                <span class="material-icons text-3xl">search_off</span>
            </div>
            <h4 class="text-base font-bold text-slate-700">Tidak ada media yang cocok dengan pencarian</h4>
            <p class="text-xs text-slate-400 mt-1">Coba gunakan kata kunci lain.</p>
        </div>
    </main>

    <!-- Modal Lightbox / Player Media -->
    <div id="media-modal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-slate-950/80 backdrop-blur-sm transition-opacity" onclick="closeMediaModal()"></div>
        
        <!-- Modal Card -->
        <div class="relative bg-white w-full max-w-4xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[92vh] z-10">
            <!-- Header -->
            <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex items-center justify-between">
                <div class="flex items-center gap-2 overflow-hidden">
                    <span id="modal-type-icon" class="material-icons text-dikbud-primary">collections</span>
                    <h3 id="modal-title" class="font-bold text-slate-800 text-sm md:text-base truncate">Judul Media</h3>
                </div>
                <button onclick="closeMediaModal()" class="p-1 rounded-full text-slate-400 hover:text-slate-700 hover:bg-slate-200 transition-colors">
                    <span class="material-icons">close</span>
                </button>
            </div>

            <!-- Modal Body (Media Content) -->
            <div class="overflow-y-auto p-4 sm:p-6 space-y-4">
                <!-- Video Container (Hidden for Photos) -->
                <div id="modal-video-box" class="hidden aspect-video bg-black rounded-xl overflow-hidden shadow-inner">
                    <!-- YouTube iframe or HTML5 video dynamically injected -->
                </div>

                <!-- Photo Container (Hidden for Videos) -->
                <div id="modal-photo-box" class="hidden flex items-center justify-center bg-slate-900 rounded-xl overflow-hidden max-h-[60vh]">
                    <img id="modal-photo-img" src="" alt="Preview" class="max-w-full max-h-[60vh] object-contain">
                </div>

                <!-- Media Details -->
                <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                    <div class="flex flex-wrap items-center justify-between gap-2 text-xs text-slate-500 mb-2">
                        <div class="flex items-center gap-3">
                            <span id="modal-category" class="px-2.5 py-0.5 rounded-full font-bold bg-blue-100 text-blue-800">Kategori</span>
                            <span id="modal-date" class="flex items-center gap-1"><span class="material-icons-outlined text-[13px]">event</span> Tanggal</span>
                        </div>
                        <a id="modal-download-link" href="#" target="_blank" class="inline-flex items-center gap-1 text-dikbud-primary hover:underline font-bold">
                            <span class="material-icons-outlined text-[14px]">open_in_new</span> Buka Tautan Asli
                        </a>
                    </div>
                    <p id="modal-description" class="text-xs sm:text-sm text-slate-600 leading-relaxed"></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dikbud-dark text-slate-400 text-sm mt-auto border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div class="md:col-span-2">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('images/logo-maluku.png') }}" alt="Logo Maluku" class="w-10 h-10 object-contain">
                        <div>
                            <h3 class="text-white font-bold text-sm leading-tight">Dinas Pendidikan & Kebudayaan</h3>
                            <p class="text-dikbud-accent text-xs font-semibold">Provinsi Maluku</p>
                        </div>
                    </div>
                    <ul class="space-y-2 text-xs text-slate-400">
                        <li class="flex items-center gap-2">
                            <span class="material-icons-outlined text-[16px] text-slate-500">location_on</span>
                            <span>Jl. Ahmad Yani No.XX, Kota Ambon, Maluku, 97114</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="material-icons-outlined text-[16px] text-slate-500">phone</span>
                            <span>(0911) - 352389, 352367</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="material-icons-outlined text-[16px] text-slate-500">email</span>
                            <span>dikbud@malukuprov.go.id</span>
                        </li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold text-xs uppercase tracking-wider mb-3">Tautan Terkait</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="{{ url('/') }}" class="hover:text-white transition-colors">Beranda Utama</a></li>
                        <li><a href="{{ url('/dokumen-peraturan') }}" class="hover:text-white transition-colors">Dokumen Peraturan</a></li>
                        <li><a href="{{ url('/ppid') }}" class="hover:text-white transition-colors">Layanan PPID</a></li>
                        <li><a href="{{ url('/pengaduan') }}" class="hover:text-white transition-colors">Lapor Pengaduan</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold text-xs uppercase tracking-wider mb-3">Dokumentasi</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="{{ route('galeri', ['type' => 'foto']) }}" class="hover:text-white transition-colors">Galeri Foto Kegiatan</a></li>
                        <li><a href="{{ route('galeri', ['type' => 'video']) }}" class="hover:text-white transition-colors">Video Liputan</a></li>
                        <li><a href="/login" class="hover:text-white transition-colors">Akses CMS Galeri</a></li>
                    </ul>
                </div>
            </div>

            <div class="pt-6 border-t border-slate-800 text-xs text-slate-500 flex flex-col md:flex-row justify-between items-center gap-2">
                <p>&copy; 2026 Dinas Pendidikan dan Kebudayaan Provinsi Maluku. Hak Cipta Dilindungi.</p>
                <p>Sistem Informasi Portal & Galeri Terintegrasi</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript Filter & Modal Logic -->
    <script>
        // Mobile Menu Toggle
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileBtn && mobileMenu) {
            mobileBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Live Search
        const searchInput = document.getElementById('gallery-search');
        const galleryItems = document.querySelectorAll('.gallery-item');
        const noResults = document.getElementById('no-search-results');

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                const query = this.value.toLowerCase().trim();
                let matchCount = 0;

                galleryItems.forEach(item => {
                    const title = item.dataset.title || '';
                    const cat = item.dataset.category || '';
                    const desc = item.dataset.description || '';

                    if (title.includes(query) || cat.includes(query) || desc.includes(query)) {
                        item.style.display = '';
                        matchCount++;
                    } else {
                        item.style.display = 'none';
                    }
                });

                if (matchCount === 0 && galleryItems.length > 0) {
                    noResults.classList.remove('hidden');
                } else {
                    noResults.classList.add('hidden');
                }
            });
        }

        // Modal Functionality
        const mediaModal = document.getElementById('media-modal');
        const modalTitle = document.getElementById('modal-title');
        const modalTypeIcon = document.getElementById('modal-type-icon');
        const modalCategory = document.getElementById('modal-category');
        const modalDate = document.getElementById('modal-date');
        const modalDesc = document.getElementById('modal-description');
        const modalDownloadLink = document.getElementById('modal-download-link');
        const modalVideoBox = document.getElementById('modal-video-box');
        const modalPhotoBox = document.getElementById('modal-photo-box');
        const modalPhotoImg = document.getElementById('modal-photo-img');

        function videoMime(url) {
            const ext = (url.split('?')[0].match(/\.([a-z0-9]+)$/i) || [, 'mp4'])[1].toLowerCase();
            return ({ webm: 'video/webm', ogg: 'video/ogg', mov: 'video/quicktime', mkv: 'video/x-matroska' })[ext] || 'video/mp4';
        }

        function openMediaModal(item) {
            modalTitle.innerText = item.title;
            modalCategory.innerText = item.category || 'Dokumentasi';
            modalDesc.innerText = item.description || 'Tidak ada deskripsi tambahan.';
            
            const eventDate = item.event_date ? new Date(item.event_date).toLocaleDateString('id-ID', { year: 'numeric', month: 'long', day: 'numeric' }) : '';
            modalDate.innerHTML = `<span class="material-icons-outlined text-[13px]">event</span> ${eventDate || 'Terbaru'}`;

            if (item.type === 'video') {
                modalTypeIcon.innerText = 'videocam';
                modalPhotoBox.classList.add('hidden');
                modalVideoBox.classList.remove('hidden');

                if (item.media_url && /youtube\.com|youtu\.be/i.test(item.media_url)) {
                    modalVideoBox.innerHTML = `<iframe src="${item.media_url}?autoplay=1" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
                    modalDownloadLink.href = item.media_url;
                } else if (item.file_url) {
                    modalVideoBox.innerHTML = `<video controls autoplay class="w-full h-full"><source src="${item.file_url}" type="${videoMime(item.file_url)}">Browser Anda tidak mendukung tag video.</video>`;
                    modalDownloadLink.href = item.file_url;
                } else if (item.media_url && /^https?:\/\//i.test(item.media_url)) {
                    modalVideoBox.innerHTML = `<iframe src="${item.media_url}" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
                    modalDownloadLink.href = item.media_url;
                } else {
                    modalVideoBox.innerHTML = `<div class="w-full h-full flex items-center justify-center text-white text-xs">Video tidak dapat dimuat.</div>`;
                    modalDownloadLink.href = '#';
                }
            } else {
                modalTypeIcon.innerText = 'photo_camera';
                modalVideoBox.classList.add('hidden');
                modalVideoBox.innerHTML = '';
                modalPhotoBox.classList.remove('hidden');

                const imgSrc = item.display_url || item.file_url || '/images/slider-default.jpg';
                modalPhotoImg.src = imgSrc;
                modalDownloadLink.href = imgSrc;
            }

            mediaModal.classList.remove('hidden');
            mediaModal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeMediaModal() {
            mediaModal.classList.add('hidden');
            mediaModal.classList.remove('flex');
            modalVideoBox.innerHTML = ''; // Stop video playback
            document.body.style.overflow = 'auto';
        }

        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !mediaModal.classList.contains('hidden')) {
                closeMediaModal();
            }
        });
    </script>
</body>
</html>