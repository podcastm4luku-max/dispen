<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen Peraturan & Regulasi Resmi - Dinas Pendidikan dan Kebudayaan Provinsi Maluku</title>
    <meta name="description" content="Pusat unduh dan arsip resmi Dokumen Peraturan, Standar Pelayanan Publik, LKIP, dan Surat Keputusan (SK) Dinas Pendidikan dan Kebudayaan Provinsi Maluku.">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        dikbud: {
                            primary: '#1e3a8a',
                            secondary: '#0284c7',
                            accent: '#f59e0b',
                            dark: '#0f172a',
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
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased selection:bg-dikbud-primary selection:text-white flex flex-col min-h-screen">

    <!-- Top Bar -->
    <div class="bg-dikbud-dark text-white text-xs py-2 px-4 border-b border-slate-800">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <span class="flex items-center gap-1"><i class="fas fa-phone text-dikbud-accent text-[10px]"></i> (0911) - 352389, 352367</span>
                <span class="hidden sm:flex items-center gap-1"><i class="fas fa-envelope text-dikbud-accent text-[10px]"></i> disdikbud@malukuprov.go.id</span>
            </div>
            <div class="flex items-center space-x-3">
                <a href="/login" class="text-dikbud-accent hover:underline flex items-center gap-1 font-semibold">
                    <i class="fas fa-lock text-[10px]"></i> Login Admin
                </a>
            </div>
        </div>
    </div>

    <!-- Navigation Header -->
    <nav class="sticky top-0 w-full z-50 bg-white border-b border-slate-200 shadow-sm transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo & Brand (Left) -->
                <div class="flex items-center flex-shrink-0">
                    <a href="{{ url('/') }}" class="flex items-center gap-3">
                        <img src="/images/logo-maluku.webp" alt="Logo Maluku" class="h-12 w-auto drop-shadow" onerror="this.src='/images/logo-placeholder.webp'">
                        <div>
                            <span class="block text-xs font-bold tracking-wider text-dikbud-secondary uppercase">Pemerintah Provinsi Maluku</span>
                            <span class="block text-base font-extrabold text-slate-900 leading-tight">DINAS PENDIDIKAN & KEBUDAYAAN</span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation Menu (Center) -->
                <div class="hidden lg:flex items-center justify-center space-x-1 h-full mx-auto">
                    <a href="{{ url('/') }}" class="px-3 py-2 text-sm font-semibold text-slate-600 hover:text-dikbud-secondary transition-colors">Beranda</a>
                    
                    <!-- Profil Dropdown -->
                    <div class="nav-item relative h-full flex items-center">
                        <button class="px-3 py-2 text-sm font-semibold text-slate-600 hover:text-dikbud-secondary flex items-center gap-1 transition-colors">
                            Profil OPD <span class="material-icons-outlined text-[16px]">expand_more</span>
                        </button>
                        <div class="dropdown-menu absolute top-full left-0 w-56 bg-white border border-slate-200 shadow-xl rounded-b-lg hidden overflow-hidden">
                            <a href="{{ url('/visi-misi') }}" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary border-b border-slate-100">Visi dan Misi</a>
                            <a href="{{ url('/struktur-organisasi') }}" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary border-b border-slate-100">Struktur Organisasi</a>
                            <a href="{{ url('/tugas-fungsi') }}" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary">Tugas dan Fungsi</a>
                        </div>
                    </div>

                    <!-- Berita Dropdown -->
                    <div class="nav-item relative h-full flex items-center">
                        <button class="px-3 py-2 text-sm font-semibold text-slate-600 hover:text-dikbud-secondary flex items-center gap-1 transition-colors">
                            Berita & Info <span class="material-icons-outlined text-[16px]">expand_more</span>
                        </button>
                        <div class="dropdown-menu absolute top-full left-0 w-56 bg-white border border-slate-200 shadow-xl rounded-b-lg hidden overflow-hidden">
                            <a href="/portal-resmi" class="block px-4 py-3 text-sm font-bold text-dikbud-primary bg-slate-50 border-b border-slate-200">Portal Berita Utama</a>
                            <a href="/berita-terkini" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary border-b border-slate-100">Berita Pendidikan Terkini</a>
                            <a href="/berita-terkini#pengumuman" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary border-b border-slate-100">Pengumuman</a>
                        </div>
                    </div>

                    <!-- Transparansi Dropdown -->
                    <div class="nav-item relative h-full flex items-center">
                        <button class="px-3 py-2 text-sm font-bold text-dikbud-primary hover:text-dikbud-secondary flex items-center gap-1 transition-colors">
                            Transparansi <span class="material-icons-outlined text-[16px]">expand_more</span>
                        </button>
                        <div class="dropdown-menu absolute top-full left-0 w-64 bg-white border border-slate-200 shadow-xl rounded-b-lg hidden overflow-hidden">
                            <a href="{{ url('/ppid') }}" class="block px-4 py-3 text-sm font-bold text-dikbud-primary bg-slate-50 border-b border-slate-200">Daftar Informasi Publik (PPID)</a>
                            <a href="{{ url('/dokumen-peraturan') }}" class="block px-4 py-3 text-sm font-bold text-dikbud-secondary bg-blue-50/60 hover:bg-blue-100/60 border-b border-slate-100 flex items-center justify-between">
                                <span>Dokumen Peraturan & Download</span>
                                <span class="material-icons-outlined text-[16px] text-dikbud-secondary">file_download</span>
                            </a>
                            <a href="{{ url('/ppid') }}" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary border-b border-slate-100">Informasi Berkala</a>
                            <a href="{{ url('/anggaran') }}" class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-dikbud-secondary">Informasi Anggaran</a>
                        </div>
                    </div>

                    <!-- Layanan Dropdown -->
                    <div class="nav-item relative h-full flex items-center">
                        <button class="px-3 py-2 text-sm font-semibold text-slate-600 hover:text-dikbud-secondary flex items-center gap-1 transition-colors">
                            Layanan <span class="material-icons-outlined text-[16px]">expand_more</span>
                        </button>
                        <div class="dropdown-menu absolute top-full right-0 w-56 bg-white border border-slate-200 shadow-xl rounded-b-lg hidden overflow-hidden">
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
                </div>

                <!-- Right Action & Mobile Toggle -->
                <div class="flex items-center gap-3">
                    <a href="{{ url('/') }}" class="hidden sm:inline-flex items-center gap-1.5 text-xs font-bold text-dikbud-primary bg-blue-50 border border-blue-200 hover:bg-dikbud-primary hover:text-white px-3.5 py-2 rounded-lg transition-all">
                        <i class="fas fa-home"></i> Beranda
                    </a>
                    <div class="lg:hidden">
                        <button id="mobile-menu-btn" class="text-slate-600 hover:text-dikbud-primary focus:outline-none p-2" aria-label="Menu">
                            <span class="material-icons text-3xl">menu</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu (Hidden by default) -->
        <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-slate-200 shadow-lg">
            <div class="px-4 py-4 space-y-2">
                <a href="{{ url('/') }}" class="block px-3 py-2 text-base font-semibold text-slate-700 hover:text-dikbud-primary">Beranda</a>
                <a href="{{ url('/visi-misi') }}" class="block px-3 py-2 text-base text-slate-600 hover:text-dikbud-primary">Visi dan Misi</a>
                <a href="{{ url('/standar-pelayanan') }}" class="block px-3 py-2 text-base text-slate-600 hover:text-dikbud-primary">Standar Pelayanan</a>
                <a href="{{ url('/dokumen-peraturan') }}" class="block px-3 py-2 text-base font-bold text-dikbud-primary bg-blue-50 rounded-lg">Dokumen Peraturan (Download)</a>
                <a href="{{ url('/galeri') }}" class="block px-3 py-2 text-base text-slate-600 hover:text-dikbud-primary">Galeri Foto & Video</a>
                <div class="pt-2 border-t border-slate-100">
                    <p class="px-3 py-1 text-xs font-bold text-slate-400 uppercase tracking-wider">Media Sosial Resmi</p>
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
                <a href="{{ url('/ppid') }}" class="block px-3 py-2 text-base text-slate-600 hover:text-dikbud-primary">PPID & Dokumen Publik</a>
                <a href="{{ url('/pengaduan') }}" class="block px-3 py-2 text-base text-slate-600 hover:text-dikbud-primary">Lapor / Pengaduan</a>
            </div>
        </div>
    </nav>

    <!-- Header Banner -->
    <header class="bg-gradient-to-r from-dikbud-dark via-slate-900 to-dikbud-primary text-white py-12 md:py-16 relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(#38bdf8_1px,transparent_1px)] [background-size:24px_24px] opacity-10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Breadcrumbs -->
            <nav class="flex items-center text-xs text-slate-300 gap-2 mb-4 font-medium">
                <a href="{{ url('/') }}" class="hover:text-dikbud-accent transition-colors flex items-center gap-1">
                    <i class="fas fa-home"></i> Beranda
                </a>
                <span>/</span>
                <span class="text-slate-400">Transparansi</span>
                <span>/</span>
                <span class="text-dikbud-accent font-semibold">Dokumen Peraturan</span>
            </nav>

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 bg-dikbud-accent/20 text-dikbud-accent border border-dikbud-accent/30 rounded-full text-xs font-bold uppercase tracking-wider mb-3">
                        <i class="fas fa-file-contract"></i> Regulasi & SK Resmi
                    </div>
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold tracking-tight text-white">
                        Dokumen Peraturan & Standar Pelayanan
                    </h1>
                    <p class="text-slate-300 text-sm md:text-base mt-2 max-w-2xl leading-relaxed">
                        Pusat arsip dan unduhan resmi Surat Keputusan (SK), Standar Pelayanan Publik, Laporan Kinerja Instansi Pemerintah (LKIP), Maklumat Pelayanan, dan Regulasi Dinas Pendidikan & Kebudayaan Provinsi Maluku.
                    </p>
                </div>
                
                <div class="bg-white/10 backdrop-blur-md border border-white/15 p-4 rounded-2xl flex items-center gap-4 flex-shrink-0">
                    <div class="w-12 h-12 rounded-xl bg-dikbud-accent text-dikbud-dark flex items-center justify-center text-2xl font-black shadow-lg">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <div>
                        <div class="text-2xl font-extrabold text-white">15</div>
                        <div class="text-xs text-slate-200 font-medium">Dokumen Resmi Tersedia</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-grow py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Filter & Search Controls -->
            <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm mb-8 flex flex-col md:flex-row gap-4 items-center justify-between">
                <!-- Search Input -->
                <div class="relative w-full md:w-96">
                    <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                    <input type="text" id="searchInput" placeholder="Cari nama dokumen atau SK..." 
                           class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-dikbud-primary focus:bg-white transition-all">
                </div>

                <!-- Info summary -->
                <div class="text-xs text-slate-500 font-medium flex items-center gap-2 self-start md:self-center">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 inline-block"></span>
                    <span>Format: Dokumen PDF Resmi • Akses Terbuka untuk Publik</span>
                </div>
            </div>

            <!-- Documents Table Card -->
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
                <div class="px-6 py-4.5 bg-gradient-to-r from-slate-50 to-white border-b border-slate-200 flex items-center justify-between">
                    <div>
                        <h2 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
                            <span class="material-icons-outlined text-dikbud-primary text-xl">file_download</span>
                            Daftar Download Dokumen
                        </h2>
                        <p class="text-xs text-slate-500 mt-0.5">Silakan klik tombol "Download" untuk mengunduh dokumen resmi dalam format PDF.</p>
                    </div>
                    <span id="docCounter" class="text-xs font-bold text-dikbud-primary bg-blue-50 border border-blue-200 px-3 py-1 rounded-lg hidden sm:inline-block">
                        Total 15 Dokumen
                    </span>
                </div>

                <!-- Responsive Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse" id="docsTable">
                        <thead>
                            <tr class="bg-slate-100/80 text-slate-700 text-xs uppercase tracking-wider font-bold border-b border-slate-200">
                                <th class="py-3.5 px-4 w-16 text-center">No.</th>
                                <th class="py-3.5 px-6">Nama Dokumen &amp; Uraian Regulasi</th>
                                <th class="py-3.5 px-6 w-44 text-center">Aksi / Unduh</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm">
                            @php
                                if (!isset($dokumens) || (is_object($dokumens) && method_exists($dokumens, 'isEmpty') && $dokumens->isEmpty())) {
                                    $dokumens = \App\Models\RegulasiDokumen::where('is_active', true)->orderBy('no', 'asc')->get();
                                }
                            @endphp

                            @foreach($dokumens as $doc)
                            @php
                                $docNo = is_object($doc) ? $doc->no : $doc['no'];
                                $docTitle = is_object($doc) ? $doc->title : $doc['title'];
                                $docTag = is_object($doc) ? $doc->tag : $doc['tag'];
                                $docBadge = is_object($doc) ? $doc->badge : $doc['badge'];
                                $docUrl = is_object($doc) ? ($doc->file_path ? asset($doc->file_path) : $doc->url) : $doc['url'];
                            @endphp
                            <tr class="doc-row hover:bg-blue-50/40 transition-colors group">
                                <td class="py-4 px-4 text-center font-bold text-slate-500">
                                    <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-slate-100 group-hover:bg-dikbud-primary group-hover:text-white transition-colors text-xs">
                                        {{ $docNo }}
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-start gap-3">
                                        <div class="w-9 h-9 rounded-lg bg-red-50 text-red-600 flex items-center justify-center flex-shrink-0 mt-0.5 border border-red-100 shadow-sm">
                                            <i class="fas fa-file-pdf text-base"></i>
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-slate-900 group-hover:text-dikbud-primary transition-colors leading-snug doc-title">
                                                {{ $docTitle }}
                                            </h3>
                                            <div class="flex flex-wrap items-center gap-2 mt-1.5">
                                                @if($docTag)
                                                <span class="inline-block px-2 py-0.5 bg-slate-100 text-slate-600 rounded text-[11px] font-medium">
                                                    {{ $docTag }}
                                                </span>
                                                @endif
                                                @if($docBadge)
                                                <span class="inline-block px-2 py-0.5 bg-blue-100/70 text-dikbud-primary rounded text-[10px] font-bold">
                                                    {{ $docBadge }}
                                                </span>
                                                @endif
                                                <span class="text-[11px] text-slate-400">• PDF Resmi Disdikbud Maluku</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <a href="{{ $docUrl }}" target="_blank" rel="noopener noreferrer" 
                                       class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-xl bg-dikbud-primary hover:bg-blue-800 text-white font-bold text-xs shadow-sm hover:shadow transition-all group/btn w-full sm:w-auto">
                                        <i class="fas fa-download text-xs group-hover/btn:-translate-y-0.5 transition-transform"></i>
                                        <span>Download</span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- No Results State (Hidden by default) -->
                <div id="noResults" class="hidden py-12 text-center">
                    <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-full flex items-center justify-center mx-auto mb-3 text-2xl">
                        <i class="fas fa-search"></i>
                    </div>
                    <p class="font-bold text-slate-700">Dokumen tidak ditemukan</p>
                    <p class="text-xs text-slate-500 mt-1">Coba gunakan kata kunci pencarian yang lain.</p>
                </div>
            </div>

            <!-- Additional Help / Info Box -->
            <div class="mt-8 bg-gradient-to-r from-blue-50 via-sky-50 to-indigo-50 border border-blue-200/80 rounded-2xl p-6 flex flex-col md:flex-row items-center justify-between gap-4 shadow-sm">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-dikbud-primary text-white flex items-center justify-center text-xl flex-shrink-0 shadow-md">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <div>
                        <h4 class="font-extrabold text-slate-900 text-sm">Membutuhkan Dokumen Publik Lainnya?</h4>
                        <p class="text-xs text-slate-600 mt-0.5">Anda dapat mengajukan permohonan informasi publik secara resmi melalui Portal PPID Dinas Pendidikan & Kebudayaan Provinsi Maluku.</p>
                    </div>
                </div>
                <a href="{{ url('/ppid') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-white border border-blue-300 text-dikbud-primary hover:bg-dikbud-primary hover:text-white font-bold text-xs transition-all shadow-sm flex-shrink-0">
                    <span>Ajukan Permohonan PPID</span>
                    <i class="fas fa-arrow-right text-[10px]"></i>
                </a>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dikbud-dark text-slate-400 text-sm py-8 border-t border-slate-800 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-3">
                <img src="/images/logo-maluku.webp" alt="Logo Maluku" class="h-8 w-auto opacity-90" onerror="this.src='/images/logo-placeholder.webp'">
                <p class="text-xs text-slate-400">
                    &copy; 2026 Dinas Pendidikan dan Kebudayaan Provinsi Maluku. Hak Cipta Dilindungi.
                </p>
            </div>
            <div class="flex items-center gap-4 text-xs font-semibold">
                <a href="{{ url('/') }}" class="hover:text-dikbud-accent transition-colors">Beranda</a>
                <a href="{{ url('/standar-pelayanan') }}" class="hover:text-dikbud-accent transition-colors">Standar Pelayanan</a>
                <a href="{{ url('/ppid') }}" class="hover:text-dikbud-accent transition-colors">PPID</a>
                <a href="{{ url('/pengaduan') }}" class="hover:text-dikbud-accent transition-colors">Pengaduan</a>
            </div>
        </div>
    </footer>

    <!-- Search JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Mobile Menu Toggle
            const mobileBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileBtn && mobileMenu) {
                mobileBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            }

            // Realtime Table Filter
            const searchInput = document.getElementById('searchInput');
            const rows = document.querySelectorAll('.doc-row');
            const noResults = document.getElementById('noResults');
            const docCounter = document.getElementById('docCounter');

            if (searchInput) {
                searchInput.addEventListener('input', function () {
                    const term = this.value.toLowerCase().trim();
                    let matchCount = 0;

                    rows.forEach(row => {
                        const title = row.querySelector('.doc-title').textContent.toLowerCase();
                        if (title.includes(term)) {
                            row.style.display = '';
                            matchCount++;
                        } else {
                            row.style.display = 'none';
                        }
                    });

                    if (matchCount === 0) {
                        noResults.classList.remove('hidden');
                    } else {
                        noResults.classList.add('hidden');
                    }

                    if (docCounter) {
                        docCounter.textContent = `Menampilkan ${matchCount} Dokumen`;
                    }
                });
            }
        });
    </script>
</body>
</html>