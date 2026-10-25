<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PPID Dinas Pendidikan dan Kebudayaan Provinsi Maluku</title>
    <meta name="description" content="Portal Resmi PPID Dinas Pendidikan dan Kebudayaan Provinsi Maluku. Layanan informasi publik yang transparan, akuntabel, dan terintegrasi.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        dikbud: {
                            blue: '#1e3a8a',
                            light: '#3b82f6',
                            dark: '#172554',
                            accent: '#f59e0b',
                            gold: '#d97706'
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .dropdown:hover .dropdown-menu { display: block; }
        .hero-pattern {
            background: linear-gradient(135deg, #0b1329 0%, #1e3a8a 50%, #172554 100%);
            position: relative;
        }
        .hero-pattern::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23f59e0b' fill-opacity='0.07'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4H4zM6 34v-4H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            pointer-events: none;
        }
        .ticker-wrapper { overflow: hidden; white-space: nowrap; width: 100%; }
        .ticker-content { animation: ticker 45s linear infinite; }
        .ticker-content:hover { animation-play-state: paused; }
        @keyframes ticker {
            0% { transform: translateX(100vw); }
            100% { transform: translateX(-100%); }
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased flex flex-col min-h-screen">

    <!-- Toast Notification Container -->
    <div id="toast-container" class="fixed bottom-5 right-5 z-[100] flex flex-col gap-2 pointer-events-none"></div>

    <!-- Top Bar -->
    <div class="bg-dikbud-dark text-white text-xs md:text-sm py-2.5 hidden md:block border-b border-blue-900/40">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="font-semibold text-amber-300 hover:text-white flex items-center gap-1.5 transition-colors mr-3 py-0.5 px-2.5 rounded bg-blue-900/60 border border-amber-400/30">
                <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i> Beranda Utama
            </a>
            <span class="font-medium tracking-wide flex items-center gap-2">
                <i data-lucide="shield-check" class="w-4 h-4 text-dikbud-accent"></i>
                PPID Utama Dinas Pendidikan dan Kebudayaan Provinsi Maluku
            </span>
            <div class="flex items-center space-x-6">
                <a href="tel:0911352389" class="flex items-center hover:text-blue-300 transition-colors">
                    <i data-lucide="phone" class="w-4 h-4 mr-2 text-blue-300"></i> (0911) - 352389, 352367
                </a>
                <a href="mailto:ppid@disdikbud.malukuprov.go.id" class="flex items-center hover:text-blue-300 transition-colors">
                    <i data-lucide="mail" class="w-4 h-4 mr-2 text-blue-300"></i> ppid@disdikbud.malukuprov.go.id
                </a>
            </div>
        </div>
    </div>

    <!-- Header / Navigation -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3.5 flex justify-between items-center">
            <!-- Logo Area -->
            <a href="#" class="flex items-center gap-3 flex-shrink-0 group">
                <div class="bg-dikbud-blue text-white p-2.5 rounded-xl shadow-md group-hover:bg-dikbud-dark transition-colors">
                    <i data-lucide="book-open" class="w-6 h-6"></i>
                </div>
                <div>
                    <h1 class="font-bold text-gray-900 leading-tight text-sm md:text-base tracking-tight">DISDIKBUD<br><span class="text-dikbud-light font-medium text-xs tracking-wider">PROVINSI MALUKU</span></h1>
                </div>
            </a>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" aria-label="Toggle navigation" class="md:hidden text-dikbud-blue focus:outline-none bg-blue-50 hover:bg-blue-100 p-2.5 rounded-xl transition-colors">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>

            <!-- Desktop Menu -->
            <nav class="hidden md:flex space-x-7 text-sm font-semibold text-gray-700" id="main-nav">
                <a href="#" class="text-dikbud-blue border-b-2 border-dikbud-blue pb-1 transition-all">Beranda</a>
                
                <div class="relative dropdown">
                    <button class="hover:text-dikbud-light flex items-center py-1 transition-colors">
                        Profil <i data-lucide="chevron-down" class="w-4 h-4 ml-1 opacity-75"></i>
                    </button>
                    <div class="dropdown-menu absolute hidden bg-white shadow-xl rounded-xl mt-1 py-2 w-56 border border-gray-100">
                        <a href="javascript:void(0)" onclick="openModal('modal-profil')" class="block px-5 py-2.5 hover:bg-blue-50 hover:text-dikbud-blue transition-colors">Profil Singkat</a>
                        <a href="javascript:void(0)" onclick="openModal('modal-visi')" class="block px-5 py-2.5 hover:bg-blue-50 hover:text-dikbud-blue transition-colors">Visi & Misi</a>
                        <a href="javascript:void(0)" onclick="openModal('modal-tugas')" class="block px-5 py-2.5 hover:bg-blue-50 hover:text-dikbud-blue transition-colors">Tugas & Fungsi</a>
                        <a href="javascript:void(0)" onclick="openModal('modal-struktur')" class="block px-5 py-2.5 hover:bg-blue-50 hover:text-dikbud-blue transition-colors">Struktur Organisasi</a>
                    </div>
                </div>
                
                <a href="javascript:void(0)" onclick="openModal('modal-regulasi')" class="hover:text-dikbud-light py-1 transition-colors">Regulasi</a>
                
                <div class="relative dropdown">
                    <button class="hover:text-dikbud-light flex items-center py-1 transition-colors">
                        Informasi Publik <i data-lucide="chevron-down" class="w-4 h-4 ml-1 opacity-75"></i>
                    </button>
                    <div class="dropdown-menu absolute hidden bg-white shadow-xl rounded-xl mt-1 py-2 w-56 border border-gray-100">
                        <a href="javascript:void(0)" onclick="openModal('modal-info-setiap-saat')" class="block px-5 py-2.5 hover:bg-blue-50 hover:text-dikbud-blue transition-colors">Informasi Setiap Saat</a>
                        <a href="javascript:void(0)" onclick="openModal('modal-info-berkala')" class="block px-5 py-2.5 hover:bg-blue-50 hover:text-dikbud-blue transition-colors">Informasi Berkala</a>
                    </div>
                </div>
                
                <div class="relative dropdown">
                    <button class="hover:text-dikbud-light flex items-center py-1 transition-colors">
                        Layanan <i data-lucide="chevron-down" class="w-4 h-4 ml-1 opacity-75"></i>
                    </button>
                    <div class="dropdown-menu absolute hidden bg-white shadow-xl rounded-xl mt-1 py-2 w-64 border border-gray-100">
                        <a href="javascript:void(0)" onclick="openModal('modal-layanan-pengaduan')" class="block px-5 py-2.5 hover:bg-blue-50 hover:text-dikbud-blue transition-colors">Pengaduan Masyarakat</a>
                        <a href="javascript:void(0)" onclick="openModal('modal-layanan-agenda')" class="block px-5 py-2.5 hover:bg-blue-50 hover:text-dikbud-blue transition-colors">Kalender Pendidikan</a>
                    </div>
                </div>
                
                <a href="javascript:void(0)" onclick="openModal('modal-pusat-data')" class="hover:text-dikbud-light py-1 transition-colors">Data Pokok</a>
                <a href="javascript:void(0)" onclick="openModal('modal-arsip')" class="hover:text-dikbud-light py-1 transition-colors">Arsip</a>
                <a href="javascript:void(0)" onclick="openModal('modal-akun-database')" class="hover:text-dikbud-light py-1 transition-colors flex items-center gap-1.5 text-dikbud-blue font-bold">
                    <i data-lucide="database" class="w-4 h-4 text-amber-500"></i> Akun Database
                </a>
            </nav>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t p-4 flex flex-col space-y-3 font-medium text-gray-700 shadow-inner">
            <a href="#" class="text-dikbud-blue pl-2 border-l-4 border-dikbud-blue font-semibold">Beranda</a>
            <a href="javascript:void(0)" onclick="openModal('modal-profil'); toggleMobileMenu();" class="hover:text-dikbud-light pl-2">Profil Singkat</a>
            <a href="javascript:void(0)" onclick="openModal('modal-visi'); toggleMobileMenu();" class="hover:text-dikbud-light pl-2">Visi & Misi</a>
            <a href="javascript:void(0)" onclick="openModal('modal-tugas'); toggleMobileMenu();" class="hover:text-dikbud-light pl-2">Tugas & Fungsi</a>
            <a href="javascript:void(0)" onclick="openModal('modal-struktur'); toggleMobileMenu();" class="hover:text-dikbud-light pl-2">Struktur Organisasi</a>
            
            <a href="javascript:void(0)" onclick="openModal('modal-regulasi'); toggleMobileMenu();" class="hover:text-dikbud-light pl-2 border-t pt-2 mt-1">Regulasi</a>
            
            <div class="border-t pt-2 mt-1 text-gray-400 text-xs font-bold pl-2 uppercase tracking-wider">Informasi Publik</div>
            <a href="javascript:void(0)" onclick="openModal('modal-info-setiap-saat'); toggleMobileMenu();" class="hover:text-dikbud-light pl-4 text-sm">Informasi Setiap Saat</a>
            <a href="javascript:void(0)" onclick="openModal('modal-info-berkala'); toggleMobileMenu();" class="hover:text-dikbud-light pl-4 text-sm">Informasi Berkala</a>
            
            <div class="border-t pt-2 mt-1 text-gray-400 text-xs font-bold pl-2 uppercase tracking-wider">Layanan</div>
            <a href="javascript:void(0)" onclick="openModal('modal-layanan-pengaduan'); toggleMobileMenu();" class="hover:text-dikbud-light pl-4 text-sm">Pengaduan Masyarakat</a>
            <a href="javascript:void(0)" onclick="openModal('modal-layanan-agenda'); toggleMobileMenu();" class="hover:text-dikbud-light pl-4 text-sm">Kalender Pendidikan</a>
            
            <a href="javascript:void(0)" onclick="openModal('modal-pusat-data'); toggleMobileMenu();" class="hover:text-dikbud-light pl-2 border-t pt-2 mt-1">Data Pokok</a>
            <a href="javascript:void(0)" onclick="openModal('modal-arsip'); toggleMobileMenu();" class="hover:text-dikbud-light pl-2">Arsip</a>
            <a href="javascript:void(0)" onclick="openModal('modal-akun-database'); toggleMobileMenu();" class="hover:text-dikbud-light pl-2 flex items-center gap-2 text-dikbud-blue font-bold">
                <i data-lucide="database" class="w-4 h-4 text-amber-500"></i> Akun Database
            </a>
        </div>
    </header>

    <main class="flex-grow">
        <!-- Running Text Informasi Publik -->
        <div class="bg-dikbud-blue text-white py-2.5 overflow-hidden shadow-md relative z-40 border-b border-blue-900/50">
            <div class="ticker-wrapper">
                <div class="ticker-content w-max text-xs md:text-sm font-semibold tracking-wide inline-flex items-center gap-4">
                    <span>SELAMAT DATANG DI PPID DISDIKBUD PROVINSI MALUKU – MENCERDASKAN KEHIDUPAN BANGSA MELALUI KETERBUKAAN INFORMASI</span>
                    <span class="text-yellow-400">★</span>
                    <span>LAYANAN INFORMASI PUBLIK SEKTOR PENDIDIKAN TERSEDIA SETIAP HARI KERJA (08.00 - 16.00 WIT)</span>
                    <span class="text-yellow-400">★</span>
                    <span>AKSES DATA SEKOLAH, GURU, DAN KEBUDAYAAN MUDAH, CEPAT, DAN TERINTEGRASI</span>
                    <span class="text-yellow-400">★</span>
                    <span>BERSAMA WUJUDKAN MALUKU YANG TERBUKA, PARTISIPATIF, DAN AKUNTABEL</span>
                    <span class="text-yellow-400">★</span>
                    <span>KAMI SIAP MELAYANI PERMINTAAN INFORMASI SESUAI UNDANG-UNDANG KETERBUKAAN INFORMASI PUBLIK NO. 14 TAHUN 2008</span>
                    <span class="text-transparent pr-10">.</span>
                </div>
            </div>
        </div>

        <!-- Welcome & Hero Section -->
        <section class="hero-pattern py-12 md:py-20 relative overflow-hidden border-b-4 border-dikbud-accent">
            <div class="container mx-auto px-4 relative z-10">
                <div class="flex flex-col lg:flex-row items-center gap-10 lg:gap-16">
                    
                    <!-- Teks Sambutan -->
                    <div class="lg:w-1/2 w-full">
                        <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-gradient-to-r from-amber-500/20 via-amber-400/10 to-blue-900/40 border border-amber-400/40 text-amber-300 text-xs font-bold uppercase tracking-widest mb-6 backdrop-blur-md shadow-lg shadow-amber-500/5">
                            <span class="relative flex h-2.5 w-2.5">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-amber-400"></span>
                            </span>
                            <span>Portal Resmi Keterbukaan Informasi Publik</span>
                        </div>
                        
                        <div class="flex flex-col xl:flex-row xl:items-end gap-6 mb-6">
                            <div>
                                <p class="text-amber-300/90 font-semibold text-xs md:text-sm tracking-widest uppercase mb-1.5 flex items-center gap-2">
                                    <i data-lucide="shield-check" class="w-4 h-4 text-amber-400"></i> Layanan Informasi Transparan & Akuntabel
                                </p>
                                <h1 class="text-3xl md:text-5xl lg:text-5xl font-black text-white leading-[1.15] tracking-tight">
                                    Selamat Datang di <br>
                                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-200 via-yellow-400 to-amber-500 drop-shadow-md">
                                        PPID Disdikbud
                                    </span>
                                    <span class="block text-2xl md:text-4xl lg:text-4xl font-bold mt-1 text-blue-100">
                                        Provinsi Maluku
                                    </span>
                                </h1>
                            </div>
                            
                            <!-- Kotak Infografis Layanan -->
                            <div class="bg-slate-900/80 backdrop-blur-md p-3.5 rounded-xl shadow-2xl border-l-4 border-amber-400 flex-shrink-0 border border-blue-500/30">
                                <div class="flex items-center gap-3">
                                    <div class="bg-amber-400/20 p-2.5 rounded-full text-amber-300 shadow-inner border border-amber-400/30">
                                        <i data-lucide="map-pin" class="w-5 h-5"></i>
                                    </div>
                                    <div>
                                        <p class="text-[10px] text-amber-300 font-semibold uppercase tracking-wider mb-0.5">Pusat Layanan PPID</p>
                                        <p class="text-xs md:text-sm font-bold text-white leading-tight">Gedung Disdikbud<br>Jl. Jenderal A. Yani Kota Ambon</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <p class="text-base md:text-lg text-blue-100/90 leading-relaxed mb-8 max-w-2xl font-normal">
                            Kami berkomitmen mewujudkan tata kelola pemerintahan yang baik melalui pelayanan informasi publik yang Cepat, Tepat, dan Transparan di bidang Pendidikan dan Kebudayaan.
                        </p>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-xl">
                            <a href="#form-permohonan" class="bg-gradient-to-r from-amber-500 to-yellow-500 hover:from-amber-600 hover:to-yellow-600 text-slate-950 font-bold px-5 py-3.5 rounded-xl shadow-lg shadow-amber-500/20 hover:shadow-amber-500/40 transition-all flex items-center justify-center gap-2 transform hover:-translate-y-0.5 w-full text-center text-sm">
                                <i data-lucide="file-text" class="w-4 h-4 flex-shrink-0"></i> Permohonan Informasi
                            </a>
                            <a href="javascript:void(0)" onclick="openModal('modal-layanan-pengaduan')" class="bg-red-600 hover:bg-red-700 text-white px-5 py-3.5 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all flex items-center justify-center gap-2 transform hover:-translate-y-0.5 w-full text-center text-sm border border-red-500/50">
                                <i data-lucide="megaphone" class="w-4 h-4 flex-shrink-0"></i> Pengaduan Masyarakat
                            </a>
                        </div>
                    </div>

                    <!-- Kotak Form Aspirasi Singkat -->
                    <div class="lg:w-1/2 w-full relative">
                        <div class="absolute -top-6 -right-6 w-32 h-32 bg-amber-500/20 rounded-full mix-blend-screen filter blur-xl opacity-70 animate-blob"></div>
                        <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-blue-400/20 rounded-full mix-blend-screen filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
                        
                        <div class="bg-slate-900/90 backdrop-blur-md p-6 md:p-8 rounded-2xl shadow-2xl border-t-8 border-amber-400 border border-blue-900/60 relative z-10">
                            <div class="flex items-center gap-4 mb-6 border-b border-slate-800 pb-4">
                                <div class="bg-amber-400/20 p-3 rounded-xl text-amber-400 border border-amber-400/30">
                                    <i data-lucide="message-square-plus" class="w-6 h-6"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-white">Layanan Aspirasi Pendidikan</h3>
                                    <p class="text-xs text-blue-200/80">Sampaikan aspirasi atau aduan terkait layanan sekolah</p>
                                </div>
                            </div>
                            
                            <form action="{{ route('ppid.store') }}" method="POST" class="space-y-3.5" onsubmit="submitFormToDrive(event, 'Aspirasi Pendidikan')">
                                @csrf
                                <input type="hidden" name="jenis_form" value="Aspirasi Pendidikan">
                                <div>
                                    <input type="text" name="nama" class="w-full px-4 py-2.5 bg-slate-800/80 border border-slate-700 rounded-xl focus:ring-2 focus:ring-amber-400 focus:border-amber-400 text-white placeholder-slate-400 outline-none transition text-sm" placeholder="Nama Lengkap Pelapor" required>
                                </div>
                                <div>
                                    <input type="text" name="instansi" class="w-full px-4 py-2.5 bg-slate-800/80 border border-slate-700 rounded-xl focus:ring-2 focus:ring-amber-400 focus:border-amber-400 text-white placeholder-slate-400 outline-none transition text-sm" placeholder="Asal Sekolah / Instansi (Opsional)">
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <select name="kategori" class="w-full px-4 py-2.5 bg-slate-800/80 border border-slate-700 rounded-xl focus:ring-2 focus:ring-amber-400 focus:border-amber-400 text-slate-300 outline-none transition text-sm" required>
                                        <option value="" class="bg-slate-900 text-white">Kategori Laporan...</option>
                                        <option value="Fasilitas Sekolah" class="bg-slate-900 text-white">Fasilitas Sekolah</option>
                                        <option value="Dana BOS" class="bg-slate-900 text-white">Dana BOS / Bantuan</option>
                                        <option value="Tenaga Pendidik" class="bg-slate-900 text-white">Tenaga Pendidik</option>
                                        <option value="Lainnya" class="bg-slate-900 text-white">Lainnya</option>
                                    </select>
                                    <input type="tel" name="whatsapp" class="w-full px-4 py-2.5 bg-slate-800/80 border border-slate-700 rounded-xl focus:ring-2 focus:ring-amber-400 focus:border-amber-400 text-white placeholder-slate-400 outline-none transition text-sm" placeholder="No. WhatsApp Aktif" required>
                                </div>
                                <div>
                                    <textarea name="pesan" rows="3" class="w-full px-4 py-2.5 bg-slate-800/80 border border-slate-700 rounded-xl focus:ring-2 focus:ring-amber-400 focus:border-amber-400 text-white placeholder-slate-400 outline-none transition text-sm resize-none" placeholder="Tuliskan detail aspirasi Anda di sini..." required></textarea>
                                </div>
                                
                                <button type="submit" class="w-full bg-gradient-to-r from-amber-500 to-yellow-500 hover:from-amber-600 hover:to-yellow-600 text-slate-950 font-extrabold py-3 rounded-xl shadow-lg shadow-amber-500/25 transition duration-300 flex justify-center items-center gap-2 text-sm">
                                    <i data-lucide="send" class="w-4 h-4"></i> Kirim Laporan
                                </button>
                                <p class="text-[10px] text-slate-400 text-center">*Identitas pelapor akan dirahasiakan sesuai ketentuan yang berlaku.</p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Section Prosedur & Form Permohonan -->
        <section id="form-permohonan" class="py-16 bg-white border-t border-gray-100">
            <div class="container mx-auto px-4">
                <div class="flex flex-col lg:flex-row gap-12 items-start">
                    
                    <!-- Penjelasan Prosedur -->
                    <div class="lg:w-5/12 w-full">
                        <div class="mb-2 text-dikbud-blue font-bold tracking-wider text-xs uppercase">Layanan PPID</div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Prosedur Permintaan Informasi Publik</h2>
                        
                        <div class="space-y-6">
                            <!-- Step 1 -->
                            <div class="flex items-start gap-4 group">
                                <div class="flex-shrink-0 w-10 h-10 bg-blue-50 border-2 border-dikbud-blue text-dikbud-blue rounded-full flex items-center justify-center font-bold text-base group-hover:bg-dikbud-blue group-hover:text-white transition-colors shadow-sm">1</div>
                                <div>
                                    <h3 class="font-bold text-base text-gray-800 mb-1">Isi Formulir Permohonan</h3>
                                    <p class="text-sm text-gray-600 leading-relaxed">Lengkapi data diri (KTP/Identitas Resmi) dan deskripsikan data pendidikan atau kebudayaan yang Anda butuhkan dengan jelas.</p>
                                </div>
                            </div>
                            
                            <!-- Step 2 -->
                            <div class="flex items-start gap-4 group">
                                <div class="flex-shrink-0 w-10 h-10 bg-blue-50 border-2 border-dikbud-blue text-dikbud-blue rounded-full flex items-center justify-center font-bold text-base group-hover:bg-dikbud-blue group-hover:text-white transition-colors shadow-sm">2</div>
                                <div>
                                    <h3 class="font-bold text-base text-gray-800 mb-1">Verifikasi Tim PPID</h3>
                                    <p class="text-sm text-gray-600 leading-relaxed">Petugas PPID Disdikbud akan memverifikasi permohonan Anda dan mengkoordinasikan dengan bidang terkait (SMA/SMK, GTK, Kebudayaan).</p>
                                </div>
                            </div>
                            
                            <!-- Step 3 -->
                            <div class="flex items-start gap-4 group">
                                <div class="flex-shrink-0 w-10 h-10 bg-blue-50 border-2 border-dikbud-blue text-dikbud-blue rounded-full flex items-center justify-center font-bold text-base group-hover:bg-dikbud-blue group-hover:text-white transition-colors shadow-sm">3</div>
                                <div>
                                    <h3 class="font-bold text-base text-gray-800 mb-1">Penyerahan Informasi</h3>
                                    <p class="text-sm text-gray-600 leading-relaxed">Informasi atau salinan dokumen akan dikirimkan melalui email/WhatsApp resmi sesuai jangka waktu UU KIP.</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 p-4 bg-blue-50 rounded-xl border border-blue-100 flex items-center gap-3">
                            <i data-lucide="clock" class="w-6 h-6 text-dikbud-blue flex-shrink-0"></i>
                            <p class="text-xs text-gray-700 leading-snug">
                                <strong>Jangka Waktu Respon:</strong> Maksimal 10 Hari Kerja (+ 7 hari kerja perpanjangan jika membutuhkan koordinasi lanjutan).
                            </p>
                        </div>
                    </div>

                    <!-- Form Permohonan Card -->
                    <div class="lg:w-7/12 w-full">
                        <div class="bg-white p-6 md:p-8 rounded-2xl shadow-xl border border-gray-100">
                            <div class="flex justify-between items-center mb-6 border-b border-gray-100 pb-4">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900">Formulir Permohonan Data</h3>
                                    <p class="text-xs text-gray-500 mt-0.5">PPID Dinas Pendidikan dan Kebudayaan Maluku</p>
                                </div>
                                <i data-lucide="file-spreadsheet" class="w-7 h-7 text-dikbud-blue"></i>
                            </div>
                            
                            <form action="{{ route('ppid.store') }}" method="POST" class="space-y-4" onsubmit="submitFormToDrive(event, 'Permohonan Data')">
                                @csrf
                                <input type="hidden" name="jenis_form" value="Permohonan Data">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="space-y-1">
                                        <label class="text-xs font-semibold text-gray-700">Nama Lengkap Pemohon</label>
                                        <input type="text" name="nama_pemohon" class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-dikbud-blue focus:bg-white outline-none transition text-sm" placeholder="Sesuai KTP" required>
                                    </div>
                                    <div class="space-y-1">
                                        <label class="text-xs font-semibold text-gray-700">Nomor Induk Kependudukan (NIK)</label>
                                        <input type="text" name="nik" maxlength="16" class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-dikbud-blue focus:bg-white outline-none transition text-sm" placeholder="16 Digit NIK" required>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="space-y-1">
                                        <label class="text-xs font-semibold text-gray-700">Email Aktif</label>
                                        <input type="email" name="email" class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-dikbud-blue focus:bg-white outline-none transition text-sm" placeholder="contoh@email.com" required>
                                    </div>
                                    <div class="space-y-1">
                                        <label class="text-xs font-semibold text-gray-700">Nomor HP / WhatsApp</label>
                                        <input type="tel" name="telepon" class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-dikbud-blue focus:bg-white outline-none transition text-sm" placeholder="08xx-xxxx-xxxx" required>
                                    </div>
                                </div>

                                <div class="space-y-1">
                                    <label class="text-xs font-semibold text-gray-700">Rincian Informasi / Dokumen yang Diminta</label>
                                    <textarea name="rincian" rows="3" class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-dikbud-blue focus:bg-white outline-none transition text-sm resize-none" placeholder="Contoh: Salinan SK Juknis PPDB 2026, Data Jumlah Guru Honorer Per Kabupaten..." required></textarea>
                                </div>

                                <div class="space-y-1">
                                    <label class="text-xs font-semibold text-gray-700">Tujuan Penggunaan Informasi</label>
                                    <input type="text" name="tujuan" class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-dikbud-blue focus:bg-white outline-none transition text-sm" placeholder="Contoh: Penelitian Skripsi, Studi Kebijakan, Laporan Publik..." required>
                                </div>

                                <div class="pt-2">
                                    <button type="submit" class="w-full bg-dikbud-blue hover:bg-dikbud-dark text-white font-bold py-3.5 rounded-xl shadow-lg hover:shadow-xl transition duration-300 flex justify-center items-center gap-2 text-sm">
                                        <i data-lucide="send" class="w-4 h-4"></i> Kirim Permohonan Resmi
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Kategori Informasi Section -->
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center max-w-2xl mx-auto mb-12">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Kategori Informasi Publik</h2>
                    <p class="text-sm text-gray-600">Diklasifikasikan berdasarkan UU No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik di Lingkungan Pemerintah Daerah.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 border-b-4 border-transparent hover:border-dikbud-blue group">
                        <div class="w-12 h-12 bg-blue-50 text-dikbud-blue rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                            <i data-lucide="bar-chart-2" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-lg font-bold mb-2 text-gray-900">Informasi Berkala</h3>
                        <p class="text-gray-500 text-xs leading-relaxed">Diperbarui rutin: Profil Dinas, LAKIP, DPA, Rekapitulasi Dapodik, dan Kalender Pendidikan.</p>
                    </div>
                    
                    <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 border-b-4 border-transparent hover:border-dikbud-blue group">
                        <div class="w-12 h-12 bg-blue-50 text-dikbud-blue rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                            <i data-lucide="alert-circle" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-lg font-bold mb-2 text-gray-900">Informasi Serta Merta</h3>
                        <p class="text-gray-500 text-xs leading-relaxed">Pengumuman darurat, kebijakan penutupan sekolah kondisi khusus, atau tanggap bencana.</p>
                    </div>

                    <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 border-b-4 border-transparent hover:border-dikbud-blue group">
                        <div class="w-12 h-12 bg-blue-50 text-dikbud-blue rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                            <i data-lucide="folder-search" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-lg font-bold mb-2 text-gray-900">Informasi Setiap Saat</h3>
                        <p class="text-gray-500 text-xs leading-relaxed">Daftar Dokumen Pelaksanaan Anggaran, SK Kadis, Peraturan Daerah, dan Regulasi Teknis.</p>
                    </div>

                    <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 border-b-4 border-transparent hover:border-red-500 group">
                        <div class="w-12 h-12 bg-red-50 text-red-500 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                            <i data-lucide="shield-alert" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-lg font-bold mb-2 text-gray-900">Informasi Dikecualikan</h3>
                        <p class="text-gray-500 text-xs leading-relaxed">Rahasia pribadi pegawai/siswa, dokumen pengadaan belum final, dan informasi rahasia negara.</p>
                    </div>
                </div>

                <!-- Maklumat Pelayanan PPID -->
                <div class="mt-14 bg-gradient-to-r from-dikbud-dark to-dikbud-blue rounded-3xl p-8 md:p-12 shadow-2xl relative overflow-hidden border border-blue-900">
                    <div class="relative z-10 text-center max-w-3xl mx-auto">
                        <div class="inline-flex items-center justify-center p-3.5 bg-white/10 rounded-full mb-5 border border-white/20 backdrop-blur-sm">
                            <i data-lucide="shield-check" class="w-7 h-7 text-dikbud-accent"></i>
                        </div>
                        <h3 class="text-xl md:text-2xl font-bold mb-4 text-white uppercase tracking-wider">Maklumat Pelayanan Informasi Publik</h3>
                        <p class="text-sm md:text-base text-blue-50 italic leading-relaxed font-light mb-6">
                            "Kami bersungguh-sungguh memberikan pelayanan informasi publik yang cepat, tepat, akurat, dan transparan. Serta berkomitmen untuk mewujudkan tata kelola pemerintahan yang bersih di sektor pendidikan dan kebudayaan sesuai dengan Undang-Undang Keterbukaan Informasi Publik."
                        </p>
                        <div class="text-xs md:text-sm text-dikbud-accent font-bold uppercase tracking-widest">
                            Kepala Dinas Pendidikan dan Kebudayaan Provinsi Maluku
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Kabar Pendidikan -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-end mb-8 border-b pb-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Kabar Pendidikan</h2>
                        <p class="text-xs text-gray-500 mt-1">Berita dan Informasi Terkini Disdikbud Provinsi Maluku</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @forelse($kabarPendidikan as $item)
                        @php
                            $type = $item->type ?? 'Program Prioritas';
                            $badgeClass = 'text-dikbud-blue';
                            $bgClass = 'bg-blue-100 text-dikbud-blue';
                            $iconName = 'graduation-cap';
                            
                            if (stripos($type, 'kebudayaan') !== false || stripos($type, 'budaya') !== false || stripos($type, 'seni') !== false) {
                                $badgeClass = 'text-dikbud-accent';
                                $bgClass = 'bg-amber-100 text-amber-600';
                                $iconName = 'palette';
                            } elseif (stripos($type, 'tenaga pendidik') !== false || stripos($type, 'guru') !== false || stripos($type, 'tendik') !== false || stripos($type, 'pendidik') !== false) {
                                $badgeClass = 'text-emerald-600';
                                $bgClass = 'bg-emerald-100 text-emerald-600';
                                $iconName = 'users';
                            } elseif (stripos($type, 'pengumuman') !== false) {
                                $badgeClass = 'text-rose-600';
                                $bgClass = 'bg-rose-100 text-rose-600';
                                $iconName = 'megaphone';
                            }
                            $formattedDate = $item->created_at ? \Carbon\Carbon::parse($item->created_at)->locale('id')->translatedFormat('d F Y') : '20 Januari 2026';
                            
                            $imageUrl = null;
                            if (!empty($item->image)) {
                                if (\Illuminate\Support\Str::startsWith($item->image, ['http://', 'https://'])) {
                                    $imageUrl = $item->image;
                                } else {
                                    $imageUrl = asset('storage/' . $item->image);
                                }
                            }
                        @endphp
                        <a href="{{ route('berita.show', $item->id) }}" class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition border border-gray-100 flex flex-col group block">
                            @if($imageUrl)
                                <div class="h-40 w-full overflow-hidden relative bg-slate-100">
                                    <img src="{{ $imageUrl }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'h-40 {{ $bgClass }} flex items-center justify-center\'><i data-lucide=\'{{ $iconName }}\' class=\'w-10 h-10 group-hover:scale-110 transition-transform duration-300\'></i></div>'; lucide.createIcons();">
                                </div>
                            @else
                                <div class="h-40 {{ $bgClass }} flex items-center justify-center">
                                    <i data-lucide="{{ $iconName }}" class="w-10 h-10 group-hover:scale-110 transition-transform duration-300"></i>
                                </div>
                            @endif
                            <div class="p-5 flex-grow flex flex-col justify-between">
                                <div>
                                    <span class="text-[10px] font-bold {{ $badgeClass }} uppercase tracking-wider">{{ $item->type }}</span>
                                    <h3 class="font-bold text-base mt-1 mb-2 text-gray-900 leading-snug group-hover:text-dikbud-blue transition-colors line-clamp-2">
                                        {{ $item->title }}
                                    </h3>
                                </div>
                                <p class="text-xs text-gray-400 mt-3 flex items-center">
                                    <i data-lucide="calendar" class="w-3.5 h-3.5 mr-1.5"></i> {{ $formattedDate }}
                                </p>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-3 text-center py-8 text-gray-400 text-sm">
                            Belum ada kabar pendidikan terbaru dari database.
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- MODAL DIALOGS -->

        <!-- Modal 1: Profil Singkat -->
        <div id="modal-profil" class="fixed inset-0 z-[60] hidden overflow-y-auto" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="closeModal('modal-profil')"></div>
            <div class="flex min-h-full items-center justify-center p-4">
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all w-full max-w-2xl border-t-8 border-dikbud-blue p-6 md:p-8">
                    <div class="flex justify-between items-center border-b border-gray-100 pb-4 mb-4">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                            <i data-lucide="building" class="w-5 h-5 text-dikbud-blue"></i> Profil Singkat
                        </h3>
                        <button onclick="closeModal('modal-profil')" class="text-gray-400 hover:text-red-500 transition-colors">
                            <i data-lucide="x" class="w-6 h-6"></i>
                        </button>
                    </div>
                    <div class="space-y-3 text-sm text-gray-600 leading-relaxed text-justify">
                        <p>Dinas Pendidikan dan Kebudayaan (Disdikbud) Provinsi Maluku adalah unsur pelaksana urusan pemerintahan daerah di bidang pendidikan menengah, pendidikan khusus, dan kebudayaan yang menjadi kewenangan daerah provinsi.</p>
                        <p>Pejabat Pengelola Informasi dan Dokumentasi (PPID) Disdikbud Maluku dibentuk untuk merealisasikan amanat UU Keterbukaan Informasi Publik. PPID bertugas mengelola, menyediakan, dan melayani permohonan informasi publik terkait kebijakan pendidikan, data sekolah, serta program kebudayaan secara transparan dan akuntabel kepada masyarakat luas.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 2: Visi & Misi -->
        <div id="modal-visi" class="fixed inset-0 z-[60] hidden overflow-y-auto" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="closeModal('modal-visi')"></div>
            <div class="flex min-h-full items-center justify-center p-4">
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all w-full max-w-2xl border-t-8 border-dikbud-blue p-6 md:p-8">
                    <div class="flex justify-between items-center border-b border-gray-100 pb-4 mb-4">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                            <i data-lucide="target" class="w-5 h-5 text-dikbud-blue"></i> Visi & Misi
                        </h3>
                        <button onclick="closeModal('modal-visi')" class="text-gray-400 hover:text-red-500 transition-colors">
                            <i data-lucide="x" class="w-6 h-6"></i>
                        </button>
                    </div>
                    <div class="space-y-4 text-sm text-gray-600">
                        <div class="bg-blue-50 p-4 rounded-xl border border-blue-100">
                            <h4 class="font-bold text-dikbud-blue text-base mb-1">Visi Pemerintah Provinsi</h4>
                            <p class="leading-relaxed">"Maluku yang Dikelola Secara Jujur, Bersih, dan Melayani, Terjamin dalam Kesejahteraan, dan Berdaulat atas Gugusan Kepulauan."</p>
                        </div>
                        <div>
                            <h4 class="font-bold text-dikbud-dark text-base mb-2">Misi Utama</h4>
                            <ul class="space-y-2">
                                <li class="flex items-start gap-2">
                                    <i data-lucide="check-circle-2" class="w-4 h-4 text-green-500 flex-shrink-0 mt-0.5"></i>
                                    <span>Mewujudkan akses dan pemerataan mutu pendidikan menengah & khusus bagi seluruh masyarakat Maluku.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i data-lucide="check-circle-2" class="w-4 h-4 text-green-500 flex-shrink-0 mt-0.5"></i>
                                    <span>Meningkatkan profesionalisme, kompetensi, dan kesejahteraan tenaga pendidik (GTK).</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i data-lucide="check-circle-2" class="w-4 h-4 text-green-500 flex-shrink-0 mt-0.5"></i>
                                    <span>Melestarikan, mengembangka, dan mempromosikan kekayaan seni dan budaya lokal Maluku.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 3: Tugas & Fungsi -->
        <div id="modal-tugas" class="fixed inset-0 z-[60] hidden overflow-y-auto" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="closeModal('modal-tugas')"></div>
            <div class="flex min-h-full items-center justify-center p-4">
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all w-full max-w-3xl border-t-8 border-dikbud-blue p-6 md:p-8">
                    <div class="flex justify-between items-center border-b border-gray-100 pb-4 mb-4">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                            <i data-lucide="briefcase" class="w-5 h-5 text-dikbud-blue"></i> Tugas & Fungsi
                        </h3>
                        <button onclick="closeModal('modal-tugas')" class="text-gray-400 hover:text-red-500 transition-colors">
                            <i data-lucide="x" class="w-6 h-6"></i>
                        </button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm text-gray-600">
                        <div>
                            <h4 class="font-bold text-dikbud-blue mb-2 border-b pb-1">Tugas Pokok</h4>
                            <ul class="list-disc pl-4 space-y-1.5 leading-relaxed">
                                <li>Melaksanakan urusan pemerintahan daerah di bidang pendidikan menengah (SMA, SMK) dan pendidikan khusus (SLB).</li>
                                <li>Mengelola urusan kebudayaan, pelestarian cagar budaya, dan museum daerah.</li>
                                <li>Melaksanakan kewenangan dekonsentrasi dan tugas pembantuan bidang pendidikan.</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-bold text-dikbud-blue mb-2 border-b pb-1">Fungsi Utama</h4>
                            <ul class="list-disc pl-4 space-y-1.5 leading-relaxed">
                                <li>Perumusan kebijakan teknis bidang pendidikan dan kebudayaan.</li>
                                <li>Penyelenggaraan pelayanan publik (DPA, BOS, Sertifikasi Guru).</li>
                                <li>Pembinaan, pengawasan, dan evaluasi program pendidikan daerah.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 4: Struktur Organisasi -->
        <div id="modal-struktur" class="fixed inset-0 z-[60] hidden overflow-y-auto" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="closeModal('modal-struktur')"></div>
            <div class="flex min-h-full items-center justify-center p-4">
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all w-full max-w-3xl border-t-8 border-dikbud-blue p-6 md:p-8">
                    <div class="flex justify-between items-center border-b border-gray-100 pb-4 mb-4">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                            <i data-lucide="network" class="w-5 h-5 text-dikbud-blue"></i> Struktur Organisasi PPID
                        </h3>
                        <button onclick="closeModal('modal-struktur')" class="text-gray-400 hover:text-red-500 transition-colors">
                            <i data-lucide="x" class="w-6 h-6"></i>
                        </button>
                    </div>
                    <div class="text-center text-gray-600 bg-gray-50 rounded-xl p-8 border border-dashed border-gray-300">
                        <i data-lucide="users" class="w-12 h-12 text-gray-300 mx-auto mb-3"></i>
                        <p class="mb-4 text-xs md:text-sm">Bagan Struktur Organisasi Dinas Pendidikan dan Kebudayaan Provinsi Maluku (Kepala Dinas selaku Atasan PPID, Sekretaris selaku Ketua PPID, Kabid SMA, Kabid SMK, Kabid GTK, Kabid Kebudayaan).</p>
                        <button onclick="showToast('Mengunduh Bagan Struktur Organisasi (PDF)...')" class="font-semibold text-sm text-dikbud-blue hover:text-dikbud-dark hover:underline inline-flex items-center gap-2 transition-colors">
                            <i data-lucide="download-cloud" class="w-4 h-4"></i> Unduh Bagan Struktur (PDF)
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 5: Regulasi -->
        <div id="modal-regulasi" class="fixed inset-0 z-[60] hidden overflow-y-auto" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="closeModal('modal-regulasi')"></div>
            <div class="flex min-h-full items-center justify-center p-4">
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all w-full max-w-2xl border-t-8 border-dikbud-blue p-6 md:p-8">
                    <div class="flex justify-between items-center border-b border-gray-100 pb-4 mb-4">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                            <i data-lucide="book-open" class="w-5 h-5 text-dikbud-blue"></i> Regulasi
                        </h3>
                        <button onclick="closeModal('modal-regulasi')" class="text-gray-400 hover:text-red-500 transition-colors">
                            <i data-lucide="x" class="w-6 h-6"></i>
                        </button>
                    </div>
                    <div class="space-y-3 text-sm text-gray-600">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Dasar Hukum Keterbukaan Informasi:</p>
                        <ul class="space-y-2">
                            <li class="p-3 bg-gray-50 rounded-xl border border-gray-100 flex items-center justify-between text-xs font-medium">
                                <span>1. UU No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik (KIP)</span>
                                <i data-lucide="file-text" class="w-4 h-4 text-dikbud-blue"></i>
                            </li>
                            <li class="p-3 bg-gray-50 rounded-xl border border-gray-100 flex items-center justify-between text-xs font-medium">
                                <span>2. UU No. 20 Tahun 2003 tentang Sistem Pendidikan Nasional</span>
                                <i data-lucide="file-text" class="w-4 h-4 text-dikbud-blue"></i>
                            </li>
                            <li class="p-3 bg-gray-50 rounded-xl border border-gray-100 flex items-center justify-between text-xs font-medium">
                                <span>3. Permendagri No. 3 Tahun 2017 tentang Pedoman Pengelolaan PPID</span>
                                <i data-lucide="file-text" class="w-4 h-4 text-dikbud-blue"></i>
                            </li>
                            <li class="p-3 bg-gray-50 rounded-xl border border-gray-100 flex items-center justify-between text-xs font-medium">
                                <span>4. Pergub Maluku tentang Standar Pelayanan Minimal Pendidikan</span>
                                <i data-lucide="file-text" class="w-4 h-4 text-dikbud-blue"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 6: Informasi Setiap Saat -->
        <div id="modal-info-setiap-saat" class="fixed inset-0 z-[60] hidden overflow-y-auto" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="closeModal('modal-info-setiap-saat')"></div>
            <div class="flex min-h-full items-center justify-center p-4">
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all w-full max-w-2xl border-t-8 border-dikbud-blue p-6 md:p-8">
                    <div class="flex justify-between items-center border-b border-gray-100 pb-4 mb-4">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                            <i data-lucide="folder-search" class="w-5 h-5 text-dikbud-blue"></i> Informasi Setiap Saat
                        </h3>
                        <button onclick="closeModal('modal-info-setiap-saat')" class="text-gray-400 hover:text-red-500 transition-colors">
                            <i data-lucide="x" class="w-6 h-6"></i>
                        </button>
                    </div>
                    <div class="text-xs text-gray-600 space-y-2">
                        <a href="javascript:void(0)" onclick="showToast('Mengunduh Daftar Informasi Publik...')" class="flex items-center justify-between p-3 bg-blue-50/50 rounded-xl text-dikbud-blue hover:bg-blue-100 transition">
                            <span class="font-medium">1. Daftar Informasi Publik (DIP) Disdikbud</span>
                            <i data-lucide="download" class="w-4 h-4"></i>
                        </a>
                        <a href="javascript:void(0)" onclick="showToast('Mengunduh Rencana Strategis...')" class="flex items-center justify-between p-3 bg-blue-50/50 rounded-xl text-dikbud-blue hover:bg-blue-100 transition">
                            <span class="font-medium">2. Rencana Strategis (Renstra) Pendidikan Maluku</span>
                            <i data-lucide="download" class="w-4 h-4"></i>
                        </a>
                        <a href="#form-permohonan" onclick="closeModal('modal-info-setiap-saat')" class="flex items-center justify-between p-3 bg-blue-50/50 rounded-xl text-dikbud-blue hover:bg-blue-100 transition">
                            <span class="font-medium">3. Surat Keputusan (SK) Kepala Dinas</span>
                            <span class="text-[10px] bg-amber-100 text-amber-800 font-bold px-2 py-0.5 rounded">Via Permohonan</span>
                        </a>
                        <a href="#form-permohonan" onclick="closeModal('modal-info-setiap-saat')" class="flex items-center justify-between p-3 bg-blue-50/50 rounded-xl text-dikbud-blue hover:bg-blue-100 transition">
                            <span class="font-medium">4. Dokumen Pelaksanaan Anggaran (DPA) Rinci</span>
                            <span class="text-[10px] bg-amber-100 text-amber-800 font-bold px-2 py-0.5 rounded">Via Permohonan</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 7: Informasi Berkala -->
        <div id="modal-info-berkala" class="fixed inset-0 z-[60] hidden overflow-y-auto" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="closeModal('modal-info-berkala')"></div>
            <div class="flex min-h-full items-center justify-center p-4">
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all w-full max-w-2xl border-t-8 border-dikbud-blue p-6 md:p-8">
                    <div class="flex justify-between items-center border-b border-gray-100 pb-4 mb-4">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                            <i data-lucide="bar-chart-2" class="w-5 h-5 text-dikbud-blue"></i> Informasi Berkala
                        </h3>
                        <button onclick="closeModal('modal-info-berkala')" class="text-gray-400 hover:text-red-500 transition-colors">
                            <i data-lucide="x" class="w-6 h-6"></i>
                        </button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-xs">
                        <div class="p-3 bg-blue-50/50 rounded-xl border border-blue-100">
                            <h5 class="font-bold text-dikbud-blue mb-1">1. Data Pendidikan</h5>
                            <p class="text-gray-600">Rekapitulasi Dapodik siswa & guru SMA/SMK se-Kabupaten/Kota.</p>
                        </div>
                        <div class="p-3 bg-amber-50/50 rounded-xl border border-amber-100">
                            <h5 class="font-bold text-amber-600 mb-1">2. Laporan Keuangan</h5>
                            <p class="text-gray-600">Ringkasan DPA, Penyaluran BOS, dan LAKIP tahunan.</p>
                        </div>
                        <div class="p-3 bg-emerald-50/50 rounded-xl border border-emerald-100">
                            <h5 class="font-bold text-emerald-600 mb-1">3. Kepegawaian (GTK)</h5>
                            <p class="text-gray-600">Sertifikasi Guru, PPG, dan kuota PPPK Guru.</p>
                        </div>
                        <div class="p-3 bg-purple-50/50 rounded-xl border border-purple-100">
                            <h5 class="font-bold text-purple-600 mb-1">4. Kalender Akademik</h5>
                            <p class="text-gray-600">Jadwal PPDB, ujian nasional, dan libur sekolah.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 8: Layanan Pengaduan -->
        <div id="modal-layanan-pengaduan" class="fixed inset-0 z-[60] hidden overflow-y-auto" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="closeModal('modal-layanan-pengaduan')"></div>
            <div class="flex min-h-full items-center justify-center p-4">
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all w-full max-w-lg border-t-8 border-dikbud-blue p-6 md:p-8">
                    <div class="flex justify-between items-center border-b border-gray-100 pb-4 mb-4">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                            <i data-lucide="headphones" class="w-5 h-5 text-dikbud-blue"></i> Pengaduan Masyarakat
                        </h3>
                        <button onclick="closeModal('modal-layanan-pengaduan')" class="text-gray-400 hover:text-red-500 transition-colors">
                            <i data-lucide="x" class="w-6 h-6"></i>
                        </button>
                    </div>
                    <div class="text-xs text-gray-600 space-y-3">
                        <p>Saluran resmi pengaduan terkait layanan pendidikan (Pungli, fasilitas rusak, oknum guru, dll):</p>
                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-200 space-y-2">
                            <p><strong>Email:</strong> pengaduan@disdikbud.malukuprov.go.id</p>
                            <p><strong>WhatsApp Hotline:</strong> 0811-1234-5678</p>
                            <p><strong>Kanal Nasional:</strong> <a href="https://www.lapor.go.id" target="_blank" class="text-dikbud-blue hover:underline">www.lapor.go.id</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 9: Kalender Pendidikan -->
        <div id="modal-layanan-agenda" class="fixed inset-0 z-[60] hidden overflow-y-auto" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="closeModal('modal-layanan-agenda')"></div>
            <div class="flex min-h-full items-center justify-center p-4">
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all w-full max-w-lg border-t-8 border-dikbud-blue p-6 md:p-8">
                    <div class="flex justify-between items-center border-b border-gray-100 pb-4 mb-4">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                            <i data-lucide="calendar-days" class="w-5 h-5 text-dikbud-blue"></i> Kalender Pendidikan
                        </h3>
                        <button onclick="closeModal('modal-layanan-agenda')" class="text-gray-400 hover:text-red-500 transition-colors">
                            <i data-lucide="x" class="w-6 h-6"></i>
                        </button>
                    </div>
                    <div class="space-y-3 text-xs text-gray-600">
                        <div class="border-l-4 border-dikbud-blue pl-3 py-1.5 bg-gray-50 rounded-r-lg">
                            <p class="font-bold text-gray-800">Ujian Sekolah SMA/SMK</p>
                            <p class="text-dikbud-blue text-[10px] mt-0.5">Maret 2026</p>
                        </div>
                        <div class="border-l-4 border-amber-500 pl-3 py-1.5 bg-gray-50 rounded-r-lg">
                            <p class="font-bold text-gray-800">Pendaftaran PPDB Online Maluku</p>
                            <p class="text-amber-600 text-[10px] mt-0.5">Juni - Juli 2026</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 10: Pusat Data / Dapodik Interaktif -->
        <div id="modal-pusat-data" class="fixed inset-0 z-[60] hidden overflow-y-auto" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="closeModal('modal-pusat-data')"></div>
            <div class="flex min-h-full items-center justify-center p-4">
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all w-full max-w-3xl border-t-8 border-dikbud-blue p-6 md:p-8">
                    <div class="flex justify-between items-center border-b border-gray-100 pb-4 mb-4">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                            <i data-lucide="database" class="w-5 h-5 text-dikbud-blue"></i> Portal Data Pokok Pendidikan (Dapodik)
                        </h3>
                        <button onclick="closeModal('modal-pusat-data')" class="text-gray-400 hover:text-red-500 transition-colors">
                            <i data-lucide="x" class="w-6 h-6"></i>
                        </button>
                    </div>

                    <div id="auth-section" class="max-w-xs mx-auto text-center py-4">
                        <i data-lucide="shield-lock" class="w-12 h-12 text-dikbud-blue mx-auto mb-3"></i>
                        <h4 class="text-sm font-bold text-gray-800 mb-1">Otentikasi Akses Internal</h4>
                        <p class="text-xs text-gray-500 mb-4">Gunakan Kata Sandi Pegawai (Sandi Demo: <code class="bg-gray-100 px-1 py-0.5 rounded text-dikbud-blue">dikbud2026</code>)</p>
                        <input type="password" id="passport-input" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-dikbud-blue outline-none text-center tracking-widest text-sm mb-2" placeholder="••••••••">
                        <p id="auth-error" class="text-xs text-red-500 hidden mb-2 font-medium">Sandi tidak valid!</p>
                        <button onclick="checkPassport('dapodik')" class="w-full bg-dikbud-blue hover:bg-dikbud-dark text-white font-bold py-2.5 rounded-xl transition text-xs shadow-md">
                            Buka Portal Data
                        </button>
                    </div>

                    <div id="success-section" class="hidden">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-xs font-bold text-green-700 bg-green-50 px-3 py-1 rounded-full border border-green-200">
                                Access Granted: Sistem Rekapitulasi Sekolah 2026
                            </span>
                            <input type="text" id="filter-dapodik" onkeyup="filterTable('table-dapodik', 'filter-dapodik')" placeholder="Cari kabupaten/sekolah..." class="text-xs px-3 py-1.5 border border-gray-200 rounded-lg outline-none focus:ring-1 focus:ring-dikbud-blue">
                        </div>
                        <div class="overflow-x-auto max-h-64 border rounded-xl">
                            <table id="table-dapodik" class="w-full text-left text-xs text-gray-600">
                                <thead class="bg-gray-100 text-gray-800 sticky top-0 font-bold border-b">
                                    <tr>
                                        <th class="p-2.5">Kabupaten / Kota</th>
                                        <th class="p-2.5 text-center">SMA</th>
                                        <th class="p-2.5 text-center">SMK</th>
                                        <th class="p-2.5 text-center">SLB</th>
                                        <th class="p-2.5 text-right">Total Guru</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    <tr class="hover:bg-gray-50"><td class="p-2.5 font-medium">Kota Ambon</td><td class="p-2.5 text-center">24</td><td class="p-2.5 text-center">12</td><td class="p-2.5 text-center">4</td><td class="p-2.5 text-right">1.240</td></tr>
                                    <tr class="hover:bg-gray-50"><td class="p-2.5 font-medium">Kab. Maluku Tengah</td><td class="p-2.5 text-center">42</td><td class="p-2.5 text-center">18</td><td class="p-2.5 text-center">3</td><td class="p-2.5 text-right">1.850</td></tr>
                                    <tr class="hover:bg-gray-50"><td class="p-2.5 font-medium">Kab. Seram Bagian Barat</td><td class="p-2.5 text-center">28</td><td class="p-2.5 text-center">10</td><td class="p-2.5 text-center">2</td><td class="p-2.5 text-right">980</td></tr>
                                    <tr class="hover:bg-gray-50"><td class="p-2.5 font-medium">Kab. Maluku Tenggara</td><td class="p-2.5 text-center">20</td><td class="p-2.5 text-center">8</td><td class="p-2.5 text-center">2</td><td class="p-2.5 text-right">720</td></tr>
                                    <tr class="hover:bg-gray-50"><td class="p-2.5 font-medium">Kab. Kepulauan Aru</td><td class="p-2.5 text-center">15</td><td class="p-2.5 text-center">6</td><td class="p-2.5 text-center">1</td><td class="p-2.5 text-right">540</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <!-- Modal 12: Akun Database Interaktif -->
        <div id="modal-akun-database" class="fixed inset-0 z-[60] hidden overflow-y-auto" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="closeModal('modal-akun-database')"></div>
            <div class="flex min-h-full items-center justify-center p-4">
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all w-full max-w-lg border-t-8 border-dikbud-blue p-6 md:p-8">
                    <div class="flex justify-between items-center border-b border-gray-100 pb-4 mb-5">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center gap-2.5">
                            <div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center border border-amber-200/80">
                                <i data-lucide="database" class="w-5 h-5"></i>
                            </div>
                            <span>Akun Database PPID & CMS</span>
                        </h3>
                        <button onclick="closeModal('modal-akun-database')" class="text-gray-400 hover:text-red-500 transition-colors p-1">
                            <i data-lucide="x" class="w-6 h-6"></i>
                        </button>
                    </div>

                    <div class="space-y-4">
                        <!-- Status Koneksi DB -->
                        <div class="flex items-center justify-between p-3.5 bg-emerald-50/80 border border-emerald-200 rounded-xl">
                            <div class="flex items-center gap-2.5">
                                <span class="w-3 h-3 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span class="text-xs font-bold text-emerald-800">Status Koneksi Database</span>
                            </div>
                            <span class="text-[11px] font-extrabold bg-emerald-200/60 text-emerald-900 px-2.5 py-0.5 rounded-full uppercase">Terhubung / Aktif</span>
                        </div>

                        <!-- Info Akun Utama -->
                        <div class="bg-slate-900 text-white p-5 rounded-xl border border-slate-800 shadow-md relative overflow-hidden">
                            <div class="flex items-start gap-3.5">
                                <div class="w-11 h-11 rounded-full bg-amber-400/20 text-amber-400 flex items-center justify-center font-bold text-base border border-amber-400/30 flex-shrink-0">
                                    <i data-lucide="user-check" class="w-6 h-6"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm text-white leading-tight">Administrator Utama Disdikbud Maluku</h4>
                                    <p class="text-xs text-blue-200 mt-0.5">admin@malukuprov.go.id</p>
                                    <div class="mt-2.5 flex flex-wrap gap-1.5 text-[10px]">
                                        <span class="bg-amber-400/20 text-amber-300 px-2 py-0.5 rounded font-semibold border border-amber-400/30">Super Admin</span>
                                        <span class="bg-blue-500/20 text-blue-300 px-2 py-0.5 rounded font-semibold border border-blue-400/30">PPID Administrator</span>
                                        <span class="bg-slate-800 text-slate-300 px-2 py-0.5 rounded font-semibold border border-slate-700">SQLite Database</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Rincian Data Terhubung -->
                        <div class="grid grid-cols-3 gap-2 text-xs">
                            <a href="{{ route('admin.pengaduan') }}" class="p-2.5 bg-blue-50/60 hover:bg-blue-100 border border-blue-100 rounded-xl transition block text-center group">
                                <p class="text-[10px] text-gray-500 font-medium group-hover:text-dikbud-blue">Layanan Aspirasi</p>
                                <p class="text-xs font-bold text-dikbud-blue mt-0.5 flex items-center justify-center gap-1">
                                    <i data-lucide="message-square" class="w-3 h-3"></i> <span id="stat-total-aspirasi">{{ $totalAspirasi }}</span> Data
                                </p>
                            </a>
                            <a href="{{ route('admin.ppid') }}" class="p-2.5 bg-amber-50/60 hover:bg-amber-100 border border-amber-100 rounded-xl transition block text-center group">
                                <p class="text-[10px] text-gray-500 font-medium group-hover:text-amber-700">Permohonan PPID</p>
                                <p class="text-xs font-bold text-amber-700 mt-0.5 flex items-center justify-center gap-1">
                                    <i data-lucide="file-spreadsheet" class="w-3 h-3"></i> <span id="stat-total-ppid">{{ $totalPpid }}</span> Data
                                </p>
                            </a>
                            <a href="{{ route('admin.berita') }}" class="p-2.5 bg-emerald-50/60 hover:bg-emerald-100 border border-emerald-100 rounded-xl transition block text-center group">
                                <p class="text-[10px] text-gray-500 font-medium group-hover:text-emerald-700">Kabar Berita</p>
                                <p class="text-xs font-bold text-emerald-700 mt-0.5 flex items-center justify-center gap-1">
                                    <i data-lucide="newspaper" class="w-3 h-3"></i> {{ $totalBerita ?? 5 }} Data
                                </p>
                            </a>
                        </div>

                        <!-- Tombol Akses Dashboard -->
                        <div class="pt-2 flex flex-col sm:flex-row gap-2">
                            <a href="{{ route('dashboard') }}" class="flex-1 bg-dikbud-blue hover:bg-dikbud-dark text-white font-bold py-2.5 px-3 rounded-xl text-xs flex items-center justify-center gap-1.5 shadow-md transition">
                                <i data-lucide="layout-dashboard" class="w-4 h-4"></i> Dashboard Admin
                            </a>
                            <a href="{{ route('admin.ppid') }}" class="bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold py-2.5 px-3 rounded-xl text-xs flex items-center justify-center gap-1.5 shadow-md transition">
                                <i data-lucide="shield-check" class="w-4 h-4"></i> Kelola PPID
                            </a>
                            <a href="{{ route('admin.berita') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-3 rounded-xl text-xs flex items-center justify-center gap-1.5 shadow-md transition">
                                <i data-lucide="file-text" class="w-4 h-4"></i> Kelola Berita
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 11: Arsip Digital Interaktif -->
        <div id="modal-arsip" class="fixed inset-0 z-[60] hidden overflow-y-auto" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="closeModal('modal-arsip')"></div>
            <div class="flex min-h-full items-center justify-center p-4">
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all w-full max-w-3xl border-t-8 border-dikbud-blue p-6 md:p-8">
                    <div class="flex justify-between items-center border-b border-gray-100 pb-4 mb-4">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                            <i data-lucide="archive" class="w-5 h-5 text-dikbud-blue"></i> Arsip Digital Dokumen Resmi
                        </h3>
                        <button onclick="closeModal('modal-arsip')" class="text-gray-400 hover:text-red-500 transition-colors">
                            <i data-lucide="x" class="w-6 h-6"></i>
                        </button>
                    </div>

                    <div id="auth-section-arsip" class="max-w-xs mx-auto text-center py-4">
                        <i data-lucide="lock" class="w-12 h-12 text-dikbud-blue mx-auto mb-3"></i>
                        <h4 class="text-sm font-bold text-gray-800 mb-1">Akses Direktori Arsip</h4>
                        <p class="text-xs text-gray-500 mb-4">Sandi Akses: <code class="bg-gray-100 px-1 py-0.5 rounded text-dikbud-blue">dikbud2026</code></p>
                        <input type="password" id="passport-input-arsip" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-dikbud-blue outline-none text-center tracking-widest text-sm mb-2" placeholder="••••••••">
                        <p id="auth-error-arsip" class="text-xs text-red-500 hidden mb-2 font-medium">Sandi tidak valid!</p>
                        <button onclick="checkPassport('arsip')" class="w-full bg-dikbud-blue hover:bg-dikbud-dark text-white font-bold py-2.5 rounded-xl transition text-xs shadow-md">
                            Buka Direktori Arsip
                        </button>
                    </div>

                    <div id="success-section-arsip" class="hidden">
                        <div class="space-y-2 text-xs">
                            <div class="p-3 bg-gray-50 rounded-xl border flex justify-between items-center">
                                <div>
                                    <p class="font-bold text-gray-800">SK Kadis PPDB Tahun 2025/2026.pdf</p>
                                    <p class="text-[10px] text-gray-400">Terbit: 10 Mei 2025 • Ukuran: 1.4 MB</p>
                                </div>
                                <button onclick="showToast('Simulasi: Mengunduh file SK...')" class="bg-blue-50 text-dikbud-blue px-3 py-1.5 rounded-lg hover:bg-blue-100 font-semibold">
                                    Unduh
                                </button>
                            </div>
                            <div class="p-3 bg-gray-50 rounded-xl border flex justify-between items-center">
                                <div>
                                    <p class="font-bold text-gray-800">Laporan Realisasi Dana BOS Prov. Maluku 2025.pdf</p>
                                    <p class="text-[10px] text-gray-400">Terbit: 15 Des 2025 • Ukuran: 3.2 MB</p>
                                </div>
                                <button onclick="showToast('Simulasi: Mengunduh Laporan BOS...')" class="bg-blue-50 text-dikbud-blue px-3 py-1.5 rounded-lg hover:bg-blue-100 font-semibold">
                                    Unduh
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 pt-12 pb-6 border-t-4 border-dikbud-accent">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">
                <div class="lg:col-span-2">
                    <h2 class="text-white font-bold text-lg mb-3 flex items-center gap-2">
                        <i data-lucide="book-open" class="w-5 h-5 text-dikbud-accent"></i> Disdikbud Maluku
                    </h2>
                    <p class="text-xs leading-relaxed text-gray-400 max-w-md mb-4">
                        Dinas Pendidikan dan Kebudayaan Provinsi Maluku berkomitmen penuh meningkatkan mutu layanan pendidikan, memperluas akses belajar, dan melestarikan kekayaan budaya di seluruh gugusan kepulauan Maluku.
                    </p>
                </div>

                <div>
                    <h3 class="text-white font-bold text-sm mb-4 border-b border-gray-800 pb-1.5 inline-block">Tautan Cepat</h3>
                    <ul class="space-y-2 text-xs">
                        <li><a href="javascript:void(0)" onclick="openModal('modal-profil')" class="hover:text-dikbud-light transition">Profil PPID</a></li>
                        <li><a href="#form-permohonan" class="hover:text-dikbud-light transition">Formulir Permohonan</a></li>
                        <li><a href="javascript:void(0)" onclick="openModal('modal-regulasi')" class="hover:text-dikbud-light transition">Regulasi KIP</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white font-bold text-sm mb-4 border-b border-gray-800 pb-1.5 inline-block">Hubungi Kami</h3>
                    <ul class="space-y-2.5 text-xs text-gray-400">
                        <li class="flex items-start">
                            <i data-lucide="map-pin" class="w-4 h-4 mr-2 text-dikbud-light flex-shrink-0 mt-0.5"></i>
                            <span>Jl. Jenderal A. Yani, Kota Ambon, Maluku</span>
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="phone" class="w-4 h-4 mr-2 text-dikbud-light flex-shrink-0"></i>
                            <span>(0911) - 352389, 352367</span>
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="mail" class="w-4 h-4 mr-2 text-dikbud-light flex-shrink-0"></i>
                            <span>ppid@disdikbud.malukuprov.go.id</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-6 text-center md:flex md:justify-between text-[11px] text-gray-500">
                <p>&copy; 2026 PPID Dinas Pendidikan dan Kebudayaan Provinsi Maluku. Hak Cipta Dilindungi.</p>
                <div class="mt-2 md:mt-0 space-x-3">
                    <a href="#" class="hover:text-gray-400">Kebijakan Privasi</a>
                    <span>•</span>
                    <a href="#" class="hover:text-gray-400">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Inisialisasi ikon Lucide
        lucide.createIcons();

        // Mobile Menu Toggle
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        function toggleMobileMenu() {
            mobileMenu.classList.toggle('hidden');
        }

        if (mobileBtn) {
            mobileBtn.addEventListener('click', toggleMobileMenu);
        }

        // Custom Toast Notification
        function showToast(message) {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            
            toast.className = 'bg-gray-900 text-white text-xs px-5 py-3 rounded-xl shadow-2xl border border-gray-700 transform transition-all duration-300 translate-y-5 opacity-0 flex items-center gap-2 font-medium';
            toast.innerHTML = `<i data-lucide="check-circle" class="w-4 h-4 text-green-400 flex-shrink-0"></i> <span>${message}</span>`;
            
            container.appendChild(toast);
            lucide.createIcons();

            setTimeout(() => {
                toast.classList.remove('translate-y-5', 'opacity-0');
            }, 10);

            setTimeout(() => {
                toast.classList.add('translate-y-5', 'opacity-0');
                setTimeout(() => toast.remove(), 300);
            }, 4000);
        }

        // Modal Functionality
        function openModal(id) {
            const modal = document.getElementById(id);
            if (!modal) return;
            
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            lucide.createIcons();

            // Reset auth state on open
            if(id === 'modal-pusat-data') {
                document.getElementById('passport-input').value = "";
                document.getElementById('auth-error').classList.add('hidden');
                document.getElementById('auth-section').classList.remove('hidden');
                document.getElementById('success-section').classList.add('hidden');
            }
            if(id === 'modal-arsip') {
                document.getElementById('passport-input-arsip').value = "";
                document.getElementById('auth-error-arsip').classList.add('hidden');
                document.getElementById('auth-section-arsip').classList.remove('hidden');
                document.getElementById('success-section-arsip').classList.add('hidden');
            }
        }

        function closeModal(id) {
            const modal = document.getElementById(id);
            if (!modal) return;
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Passcode verification
        function checkPassport(type) {
            const inputId = type === 'dapodik' ? 'passport-input' : 'passport-input-arsip';
            const errorId = type === 'dapodik' ? 'auth-error' : 'auth-error-arsip';
            const authId = type === 'dapodik' ? 'auth-section' : 'auth-section-arsip';
            const successId = type === 'dapodik' ? 'success-section' : 'success-section-arsip';

            const input = document.getElementById(inputId).value;
            const errorMsg = document.getElementById(errorId);
            const authSection = document.getElementById(authId);
            const successSection = document.getElementById(successId);

            if(input === "dikbud2026") {
                errorMsg.classList.add('hidden');
                authSection.classList.add('hidden');
                successSection.classList.remove('hidden');
                lucide.createIcons();
            } else {
                errorMsg.classList.remove('hidden');
            }
        }

        // Table Filter helper
        function filterTable(tableId, inputId) {
            const input = document.getElementById(inputId);
            const filter = input.value.toLowerCase();
            const table = document.getElementById(tableId);
            const tr = table.getElementsByTagName("tr");

            for (let i = 1; i < tr.length; i++) {
                let td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    let txtValue = td.textContent || td.innerText;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        // Form Submit Handler (Sinkron Database PPID & Layanan Aspirasi)
        async function submitFormToDrive(event, jenisForm) {
            event.preventDefault();
            const form = event.target;
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            submitBtn.innerHTML = '<span class="animate-spin inline-block mr-2">🌀</span> Memproses...';
            submitBtn.disabled = true;

            const formData = new FormData(form);
            if (!formData.has('jenis_form')) {
                formData.append('jenis_form', jenisForm);
            }

            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                || (form.querySelector('input[name="_token"]') ? form.querySelector('input[name="_token"]').value : '');

            try {
                const response = await fetch("{{ route('ppid.store') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    showToast(result.message || `Formulir ${jenisForm} Anda berhasil terkirim dan tersimpan di database resmi Disdikbud Maluku.`);
                    form.reset();

                    // Update badge hitungan PPID & Aspirasi secara realtime
                    const ppidCounter = document.getElementById('stat-total-ppid');
                    if (ppidCounter) {
                        const cur = parseInt(ppidCounter.innerText) || 0;
                        ppidCounter.innerText = cur + 1;
                    }
                    if (jenisForm === 'Aspirasi Pendidikan') {
                        const aspCounter = document.getElementById('stat-total-aspirasi');
                        if (aspCounter) {
                            const cur = parseInt(aspCounter.innerText) || 0;
                            aspCounter.innerText = cur + 1;
                        }
                    }
                } else {
                    const errorMsg = result.message || 'Gagal mengirim formulir. Silakan lengkapi seluruh isian yang diperlukan.';
                    showToast('⚠️ ' + errorMsg);
                }
            } catch (err) {
                console.error(err);
                showToast('⚠️ Terjadi kendala saat mengirim. Silakan periksa koneksi Anda dan coba lagi.');
            } finally {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }
        }
    </script>

    @if(session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            showToast("{{ session('success') }}");
        });
    </script>
    @endif

</body>
</html>