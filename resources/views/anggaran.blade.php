<!DOCTYPE html>
<html lang="id">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Sistem Informasi & Laporan Anggaran - Disdikbud Provinsi Maluku</title>
    <meta name="description" content="Portal Transparansi, Informasi, dan Laporan Keuangan Anggaran Dinas Pendidikan dan Kebudayaan Provinsi Maluku."/>
    
    <!-- CSS and Font Resources -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'gov-blue': '#0f2b48',     /* Deep Navy Maluku Govt */
                        'gov-dark': '#08192d',
                        'gov-accent': '#0284c7',   /* Bright Cyan */
                        'gov-gold': '#d97706',     /* Warm Amber/Gold Accent */
                        'ui-bg': '#f8fafc',        /* Light Slate */
                        'ui-card': '#ffffff',
                        'ui-border': '#e2e8f0',
                        'success-green': '#059669',
                        'danger-red': '#dc2626'
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                        heading: ['Montserrat', 'Arial', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        .custom-scrollbar::-webkit-scrollbar { width: 6px; height: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f1f5f9; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #94a3b8; border-radius: 3px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #0f2b48; }

        .glass-panel { background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(12px); }
    </style>
</head>
<body class="bg-ui-bg text-slate-800 font-sans antialiased pb-10 custom-scrollbar select-none">

    <!-- ================= AUTHENTICATION SCREEN (GATEKEEPER) ================= -->
    <div id="auth-screen" class="fixed inset-0 z-[100] flex items-center justify-center bg-gov-dark bg-cover bg-center bg-no-repeat transition-opacity duration-500" style="background-image: url('https://images.unsplash.com/photo-1541829070764-84a7d30dd3f3?q=80&w=1920&auto=format&fit=crop'); background-blend-mode: overlay; background-color: rgba(8, 25, 45, 0.88);">
        <div class="bg-white rounded-2xl w-full max-w-md overflow-hidden flex flex-col shadow-2xl relative border border-slate-200 m-4 transform transition-all">
            <div class="p-8 text-center bg-slate-50 border-b border-slate-200 relative overflow-hidden">
                <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(#0f2b48 1px, transparent 1px); background-size: 12px 12px;"></div>
                
                <!-- Logo Disdikbud Placeholder -->
                <div class="w-16 h-16 bg-gov-blue text-gov-gold rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg text-2xl font-black border-2 border-gov-gold">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                
                <h2 class="font-heading font-extrabold text-xl uppercase tracking-wide text-gov-blue">Portal Anggaran</h2>
                <p class="text-xs text-slate-500 mt-1 font-medium">Dinas Pendidikan & Kebudayaan Prov. Maluku</p>
                <div class="mt-3 inline-block bg-amber-100 text-amber-800 text-[10px] font-bold px-2.5 py-0.5 rounded-full border border-amber-200 uppercase tracking-widest">Akses Transparansi Keuangan</div>
            </div>
            
            <div class="p-8 bg-white">
                <form id="auth-form" onsubmit="handleLogin(event)" class="space-y-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">ID Pengguna / Username</label>
                        <div class="relative">
                            <i class="fas fa-user-shield absolute left-3.5 top-1/2 transform -translate-y-1/2 text-slate-400"></i>
                            <input type="text" id="login-user" required placeholder="Masukkan username (admin)" class="w-full border border-slate-300 rounded-lg pl-10 pr-4 py-3 text-sm focus:border-gov-blue focus:ring-1 focus:ring-gov-blue outline-none transition-all bg-slate-50 focus:bg-white">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Kata Sandi / Password</label>
                        <div class="relative">
                            <i class="fas fa-key absolute left-3.5 top-1/2 transform -translate-y-1/2 text-slate-400"></i>
                            <input type="password" id="login-pass" required placeholder="Masukkan password (disdikbud2026)" class="w-full border border-slate-300 rounded-lg pl-10 pr-4 py-3 text-sm focus:border-gov-blue focus:ring-1 focus:ring-gov-blue outline-none transition-all bg-slate-50 focus:bg-white">
                        </div>
                    </div>
                    <div class="pt-2 space-y-2">
                        <button type="submit" class="w-full py-3.5 text-sm font-bold text-white bg-gov-blue hover:bg-gov-dark rounded-lg transition-all shadow-lg hover:shadow-xl flex items-center justify-center gap-2 transform hover:-translate-y-0.5">
                            Masuk Portal Anggaran <i class="fas fa-arrow-right"></i>
                        </button>
                        <button type="button" onclick="closeAuthModal()" class="w-full py-2.5 text-xs font-bold text-slate-500 hover:text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg transition-all">
                            Batal & Kembali
                        </button>
                    </div>
                </form>
                <div class="mt-6 text-center">
                    <p class="text-[10px] text-slate-400">Demo Akses Admin: <span class="font-mono font-bold text-slate-600">admin</span> / <span class="font-mono font-bold text-slate-600">disdikbud2026</span></p>
                </div>
            </div>
        </div>
    </div>

    <!-- ================= MAIN APP WRAPPER ================= -->
    <div id="app-wrapper" class="hidden opacity-0 transition-opacity duration-500">
        <!-- Header / Navbar -->
        <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-ui-border shadow-sm">
            <div class="container mx-auto px-4">
                <div class="flex items-center justify-between h-16">
                    <!-- Title -->
                    <div class="flex items-center gap-4">
                        <a href="#" onclick="switchTab('beranda')" class="flex items-center gap-3 hover:opacity-90 transition-opacity">
                            <div>
                                <span class="font-heading font-extrabold text-base tracking-tight text-gov-blue block leading-none">SIPANGGARAN</span>
                                <span class="text-[10px] text-slate-500 font-bold uppercase tracking-wider block mt-0.5">Disdikbud Prov. Maluku</span>
                            </div>
                        </a>
                        
                        <div class="h-8 w-px bg-slate-200 hidden md:block"></div>
                        
                        <!-- Desktop Navigation -->
                        <nav class="hidden lg:flex items-center gap-6 text-xs font-bold text-slate-600">
                            <button onclick="switchTab('beranda')" id="nav-beranda" class="nav-btn text-gov-blue border-b-2 border-gov-blue pb-5 mt-5">Beranda & Ringkasan</button>
                            <button onclick="switchTab('katalog'); filterCatalog('all');" id="nav-katalog" class="nav-btn hover:text-gov-blue transition-colors pb-5 mt-5">Info & Laporan Anggaran</button>
                            <button onclick="switchTab('realisasi')" id="nav-realisasi" class="nav-btn hover:text-gov-blue transition-colors pb-5 mt-5">Visualisasi Serapan</button>
                            <button onclick="window.open('https://malukuprov.go.id', '_blank')" class="hover:text-gov-blue transition-colors pb-5 mt-5 flex items-center gap-1"><i class="fas fa-external-link-alt text-[10px]"></i> Portal Pemprov</button>
                        </nav>
                    </div>

                    <!-- Right Actions -->
                    <div class="flex items-center gap-3">
                        <div class="relative hidden md:block">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400 text-xs"></i>
                            <input type="text" placeholder="Cari program, lokasi, DAK..." oninput="handleGlobalSearch(this.value)" class="bg-slate-100 border border-slate-200 focus:border-gov-blue rounded-full pl-9 pr-4 py-1.5 text-xs text-slate-700 outline-none w-48 transition-all focus:w-64 focus:bg-white">
                        </div>

                        <!-- Admin Panel Shortcut -->
                        <button onclick="switchTab('admin')" class="relative p-2 rounded-full bg-slate-100 hover:bg-slate-200 transition-colors border border-slate-200 text-slate-700" title="Kelola Data (Admin)">
                            <i class="fas fa-sliders-h text-sm"></i>
                        </button>

                        <!-- Saved Reports / Drawer Bookmark -->
                        <button onclick="toggleBookmarkPanel()" class="relative p-2 rounded-full bg-slate-100 hover:bg-slate-200 transition-colors border border-slate-200 text-slate-700" title="Laporan Tersimpan">
                            <i class="fas fa-folder-open text-sm"></i>
                            <span id="bookmark-badge" class="absolute -top-1 -right-1 bg-gov-gold text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold hidden">0</span>
                        </button>

                        <!-- AI Assistant Button -->
                        <button onclick="toggleAIChat()" class="hidden md:flex items-center gap-2 bg-gradient-to-r from-gov-blue to-gov-accent hover:from-gov-dark hover:to-gov-blue text-white px-3.5 py-1.5 rounded-full text-xs font-bold transition-all shadow-md">
                            <i class="fas fa-robot text-gov-gold"></i> <span>Si-Anggaran AI</span>
                        </button>

                        <!-- Logout Button -->
                        <button onclick="logoutApp()" class="relative p-2 rounded-full bg-red-50 hover:bg-red-100 transition-colors border border-red-200 text-danger-red" title="Keluar Sistem">
                            <i class="fas fa-power-off text-sm"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Mobile Navigation Tabs -->
            <div class="lg:hidden flex overflow-x-auto no-scrollbar gap-2 px-4 py-2.5 border-t border-ui-border text-xs whitespace-nowrap bg-white shadow-inner">
                <button onclick="switchTab('beranda')" id="mob-nav-beranda" class="mob-nav-btn bg-gov-blue text-white px-4 py-1.5 rounded-full font-bold transition-all shadow-sm">Beranda</button>
                <button onclick="switchTab('katalog'); filterCatalog('all');" id="mob-nav-katalog" class="mob-nav-btn bg-white text-slate-600 px-4 py-1.5 rounded-full font-semibold border border-slate-200 transition-all">Laporan Anggaran</button>
                <button onclick="switchTab('realisasi')" id="mob-nav-realisasi" class="mob-nav-btn bg-white text-slate-600 px-4 py-1.5 rounded-full font-semibold border border-slate-200 transition-all">Peta Serapan</button>
                <button onclick="switchTab('admin')" id="mob-nav-admin" class="mob-nav-btn bg-white text-slate-600 px-4 py-1.5 rounded-full font-semibold border border-slate-200 transition-all">Kelola DB Admin</button>
            </div>
        </header>

        <!-- MAIN Dynamic SPA Container -->
        <main id="main-content">
            
            <!-- ================= TAB: BERANDA ================= -->
            <div id="tab-beranda" class="spa-tab">
                <!-- Hero Banner Section -->
                <section class="relative w-full bg-gov-dark border-b border-gov-gold/30 text-white py-12 md:py-16 overflow-hidden">
                    <div class="absolute inset-0 opacity-15" style="background-image: url('https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=1920&auto=format&fit=crop'); background-size: cover; background-position: center;"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-gov-dark via-gov-dark/90 to-gov-blue/80"></div>
                    
                    <div class="relative container mx-auto px-4 flex flex-col md:flex-row items-center justify-between gap-8">
                        <div class="max-w-2xl">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="bg-gov-gold text-slate-900 text-[10px] font-black px-2.5 py-1 rounded tracking-wider uppercase shadow-sm">Keterbukaan Informasi Publik</span>
                                <span class="text-blue-200 text-xs font-semibold bg-white/10 px-2 py-0.5 rounded backdrop-blur-sm"><i class="fas fa-check-circle text-emerald-400 mr-1"></i> Terverifikasi APBD 2026</span>
                            </div>
                            <h1 class="text-3xl md:text-5xl font-heading font-black mb-3 leading-tight uppercase tracking-tight">
                                Transparansi Anggaran <br><span class="text-gov-gold">Pendidikan & Kebudayaan</span>
                            </h1>
                            <p class="text-slate-300 text-xs md:text-sm leading-relaxed mb-6 font-medium max-w-xl">
                                Selamat datang di Portal Resmi Informasi dan Pengawasan Anggaran Dinas Pendidikan dan Kebudayaan Provinsi Maluku. Akses rincian pagu, realisasi belanja DAK, BOS, sarana prasarana sekolah, hingga program kebudayaan daerah secara akuntabel.
                            </p>
                            <div class="flex flex-wrap gap-3">
                                <button onclick="switchTab('katalog'); filterCatalog('all');" class="bg-gov-gold hover:bg-amber-600 text-slate-950 font-extrabold px-5 py-2.5 rounded-lg text-xs uppercase tracking-wider transition-all shadow-lg flex items-center gap-2">
                                    <i class="fas fa-file-invoice-dollar"></i> Telusuri Laporan Anggaran
                                </button>
                                <button onclick="toggleAIChat()" class="bg-white/10 hover:bg-white/20 text-white font-bold px-5 py-2.5 rounded-lg text-xs uppercase tracking-wider border border-white/20 backdrop-blur transition-all flex items-center gap-2">
                                    <i class="fas fa-comments text-gov-gold"></i> Tanya Si-Anggaran AI
                                </button>
                            </div>
                        </div>

                        <!-- Real-time Summary Card Widget -->
                        <div class="w-full md:w-80 bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-6 text-white shadow-2xl shrink-0">
                            <div class="flex justify-between items-center pb-3 border-b border-white/10 mb-4">
                                <span class="text-xs font-bold uppercase tracking-wider text-slate-300">Tahun Anggaran 2026</span>
                                <span class="text-[10px] bg-emerald-500/20 text-emerald-300 px-2 py-0.5 rounded font-mono font-bold border border-emerald-500/30">AKTIF</span>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <p class="text-[10px] text-slate-300 uppercase font-bold">Total Pagu Alokasi</p>
                                    <p id="hero-total-pagu" class="text-2xl font-black text-gov-gold mt-0.5">Rp 0</p>
                                </div>
                                <div class="grid grid-cols-2 gap-2 pt-2 border-t border-white/10">
                                    <div>
                                        <p class="text-[10px] text-slate-300 uppercase font-bold">Realisasi</p>
                                        <p id="hero-total-realisasi" class="text-sm font-bold text-emerald-400 mt-0.5">Rp 0</p>
                                    </div>
                                    <div>
                                        <p class="text-[10px] text-slate-300 uppercase font-bold">Serapan (%)</p>
                                        <p id="hero-total-persen" class="text-sm font-bold text-blue-300 mt-0.5">0%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Quick Category Access Cards -->
                <section class="container mx-auto px-4 mt-8">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div onclick="switchTab('katalog'); filterCatalog('Sarpras');" class="bg-white border border-ui-border hover:border-gov-blue p-5 rounded-xl cursor-pointer group transition-all transform hover:-translate-y-1 shadow-sm text-center">
                            <div class="w-12 h-12 rounded-xl bg-blue-50 text-gov-blue flex items-center justify-center text-xl mx-auto mb-3 group-hover:scale-110 group-hover:bg-gov-blue group-hover:text-white transition-all">
                                <i class="fas fa-school"></i>
                            </div>
                            <h3 class="font-extrabold text-slate-800 text-sm">Sarana & Prasarana</h3>
                            <p class="text-[10px] text-slate-500 mt-1 font-medium">DAK Fisik, Gedung & Lab</p>
                        </div>
                        
                        <div onclick="switchTab('katalog'); filterCatalog('BOS');" class="bg-white border border-ui-border hover:border-emerald-500 p-5 rounded-xl cursor-pointer group transition-all transform hover:-translate-y-1 shadow-sm text-center">
                            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl mx-auto mb-3 group-hover:scale-110 group-hover:bg-emerald-600 group-hover:text-white transition-all">
                                <i class="fas fa-hand-holding-usd"></i>
                            </div>
                            <h3 class="font-extrabold text-slate-800 text-sm">BOS & Beasiswa</h3>
                            <p class="text-[10px] text-slate-500 mt-1 font-medium">BOSDA & Maluku Cerdas</p>
                        </div>

                        <div onclick="switchTab('katalog'); filterCatalog('SDM');" class="bg-white border border-ui-border hover:border-purple-500 p-5 rounded-xl cursor-pointer group transition-all transform hover:-translate-y-1 shadow-sm text-center">
                            <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl mx-auto mb-3 group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            <h3 class="font-extrabold text-slate-800 text-sm">SDM & Insentif Guru</h3>
                            <p class="text-[10px] text-slate-500 mt-1 font-medium">Tunjangan Guru Daerah 3T</p>
                        </div>

                        <div onclick="switchTab('katalog'); filterCatalog('Kebudayaan');" class="bg-white border border-ui-border hover:border-amber-500 p-5 rounded-xl cursor-pointer group transition-all transform hover:-translate-y-1 shadow-sm text-center">
                            <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl mx-auto mb-3 group-hover:scale-110 group-hover:bg-amber-600 group-hover:text-white transition-all">
                                <i class="fas fa-monument"></i>
                            </div>
                            <h3 class="font-extrabold text-slate-800 text-sm">Pelestarian Budaya</h3>
                            <p class="text-[10px] text-slate-500 mt-1 font-medium">Sanggar Seni & Cagar Budaya</p>
                        </div>
                    </div>
                </section>

                <!-- Section: Key Metrics & Infographics -->
                <section class="container mx-auto px-4 mt-8 pb-10">
                    <div class="flex items-center justify-between mb-6 border-b border-ui-border pb-3">
                        <div class="flex items-center gap-3">
                            <span class="w-2 h-7 bg-gov-blue rounded-sm"></span>
                            <h2 class="text-xl font-heading font-extrabold text-slate-900">Analitik & Distribusi Pagu Keuangan</h2>
                        </div>
                        <span class="text-xs text-slate-500 font-medium">Pembaruan data otomatis</span>
                    </div>

                    <!-- Top Metrics Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                        <div class="bg-white border border-slate-200 p-5 rounded-xl shadow-sm flex items-center justify-between">
                            <div>
                                <p class="text-[10px] uppercase font-bold text-slate-500 tracking-wider mb-1">Total Pagu Anggaran</p>
                                <h3 id="info-total-pagu-card" class="text-xl font-black text-slate-800">Rp 0</h3>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-blue-50 text-gov-blue flex items-center justify-center text-lg">
                                <i class="fas fa-wallet"></i>
                            </div>
                        </div>

                        <div class="bg-white border border-slate-200 p-5 rounded-xl shadow-sm flex items-center justify-between">
                            <div>
                                <p class="text-[10px] uppercase font-bold text-slate-500 tracking-wider mb-1">Total Realisasi Belanja</p>
                                <h3 id="info-total-realisasi-card" class="text-xl font-black text-emerald-600">Rp 0</h3>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg">
                                <i class="fas fa-chart-line"></i>
                            </div>
                        </div>

                        <div class="bg-white border border-slate-200 p-5 rounded-xl shadow-sm flex items-center justify-between">
                            <div>
                                <p class="text-[10px] uppercase font-bold text-slate-500 tracking-wider mb-1">Sisa Pagu Belanja</p>
                                <h3 id="info-sisa-pagu-card" class="text-xl font-black text-amber-600">Rp 0</h3>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center text-lg">
                                <i class="fas fa-piggy-bank"></i>
                            </div>
                        </div>

                        <div class="bg-white border border-slate-200 p-5 rounded-xl shadow-sm flex items-center justify-between">
                            <div>
                                <p class="text-[10px] uppercase font-bold text-slate-500 tracking-wider mb-1">Indeks Keterbukaan</p>
                                <h3 class="text-xl font-black text-gov-blue flex items-center gap-1.5">98.4% <i class="fas fa-certificate text-xs text-blue-500"></i></h3>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-blue-50 text-gov-blue flex items-center justify-center text-lg">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Category Chart Progress Bars & Specification -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Left: Progress Bars by Category -->
                        <div class="lg:col-span-2 bg-white border border-slate-200 rounded-xl shadow-sm p-6">
                            <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider mb-6 flex items-center gap-2">
                                <i class="fas fa-chart-pie text-gov-blue"></i> Persentase Alokasi per Kategori Program
                            </h3>
                            <div class="space-y-5" id="info-category-bars">
                                <!-- Dynamic JS Population -->
                            </div>
                        </div>

                        <!-- Right: System & Regulatory Compliance -->
                        <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 flex flex-col justify-between">
                            <div>
                                <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider mb-4 flex items-center gap-2">
                                    <i class="fas fa-clipboard-check text-gov-blue"></i> Standar Akuntabilitas
                                </h3>
                                <div class="space-y-3.5 text-xs">
                                    <div class="flex justify-between items-center pb-2.5 border-b border-slate-100">
                                        <span class="text-slate-600">Dasar Hukum</span>
                                        <span class="font-bold text-slate-800">Permendagri No. 77 / 2020</span>
                                    </div>
                                    <div class="flex justify-between items-center pb-2.5 border-b border-slate-100">
                                        <span class="text-slate-600">Sumber Dana Utama</span>
                                        <span class="font-bold text-slate-800">APBD & DAK Transfer Pusat</span>
                                    </div>
                                    <div class="flex justify-between items-center pb-2.5 border-b border-slate-100">
                                        <span class="text-slate-600">Status Audit BPK</span>
                                        <span class="font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded border border-emerald-200">WTP (Wajar Tanpa Pengecualian)</span>
                                    </div>
                                    <div class="flex justify-between items-center pb-2.5 border-b border-slate-100">
                                        <span class="text-slate-600">Format Laporan</span>
                                        <span class="font-bold text-slate-800">PDF, XLS, Open Data JSON</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 pt-4 border-t border-slate-100 bg-slate-50 p-3 rounded-lg border">
                                <p class="text-[10px] text-slate-500 leading-relaxed">
                                    <i class="fas fa-info-circle text-gov-blue mr-1"></i> Data diperbarui secara periodik mengikuti siklus penyerapan anggaran Triwulan Dinas Pendidikan dan Kebudayaan Provinsi Maluku.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- ================= TAB: KATALOG INFO & LAPORAN ANGGARAN ================= -->
            <div id="tab-katalog" class="spa-tab hidden">
                <section class="container mx-auto px-4 mt-8">
                    <!-- Page Header & Filters -->
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8 bg-white p-6 rounded-2xl border border-ui-border shadow-sm">
                        <div>
                            <h1 class="text-2xl font-heading font-extrabold uppercase text-slate-900">Daftar Rincian Laporan Anggaran</h1>
                            <p class="text-slate-500 text-xs md:text-sm mt-1 max-w-xl font-medium">Saring data berdasarkan kategori program, alokasi daerah, atau unduh dokumen transparansi.</p>
                        </div>

                        <!-- Category Filters -->
                        <div class="flex flex-wrap gap-2 text-xs">
                            <button onclick="filterCatalog('all')" id="cat-filter-all" class="bg-gov-blue text-white px-4 py-2 rounded-full uppercase tracking-wider font-bold shadow-md">Semua Kategori</button>
                            <button onclick="filterCatalog('Sarpras')" id="cat-filter-sarpras" class="bg-white hover:bg-slate-50 text-slate-600 px-4 py-2 rounded-full uppercase tracking-wider border border-slate-200 font-bold">Sarpras</button>
                            <button onclick="filterCatalog('BOS')" id="cat-filter-bos" class="bg-white hover:bg-slate-50 text-slate-600 px-4 py-2 rounded-full uppercase tracking-wider border border-slate-200 font-bold">BOS & Beasiswa</button>
                            <button onclick="filterCatalog('SDM')" id="cat-filter-sdm" class="bg-white hover:bg-slate-50 text-slate-600 px-4 py-2 rounded-full uppercase tracking-wider border border-slate-200 font-bold">SDM Guru</button>
                            <button onclick="filterCatalog('Kebudayaan')" id="cat-filter-kebudayaan" class="bg-white hover:bg-slate-50 text-slate-600 px-4 py-2 rounded-full uppercase tracking-wider border border-slate-200 font-bold">Kebudayaan</button>
                        </div>
                    </div>

                    <!-- Catalog Cards Grid -->
                    <div id="catalog-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 pb-12">
                        <!-- JS Dynamic Item Rendering -->
                    </div>

                    <!-- No Results State -->
                    <div id="catalog-no-results" class="hidden text-center py-20 bg-white rounded-2xl border border-dashed border-slate-300 mt-4">
                        <div class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 text-3xl mx-auto mb-4">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800">Laporan Tidak Ditemukan</h3>
                        <p class="text-slate-500 text-sm mt-1">Coba gunakan kata kunci lain atau ubah filter kategori.</p>
                    </div>
                </section>
            </div>

            <!-- ================= TAB: VISUALISASI SERAPAN (PETA/CANVAS) ================= -->
            <div id="tab-realisasi" class="spa-tab hidden">
                <section class="container mx-auto px-4 mt-8">
                    <div class="bg-white p-6 rounded-2xl border border-ui-border shadow-sm mb-6">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                            <div>
                                <h2 class="text-2xl font-heading font-extrabold uppercase text-slate-900">Visualisasi Peta Serapan Anggaran Daerah</h2>
                                <p class="text-slate-500 text-xs md:text-sm mt-1">Monitor distribusi realisasi belanja pendidikan per kabupaten/kota se-Provinsi Maluku.</p>
                            </div>
                            <div class="flex items-center gap-2 bg-blue-50 border border-blue-200 px-3 py-1.5 rounded-lg text-xs font-bold text-gov-blue">
                                <i class="fas fa-map-marked-alt"></i> 11 Kabupaten / Kota Maluku
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Canvas Map Visualizer -->
                        <div class="lg:col-span-2 bg-slate-900 rounded-2xl border border-slate-800 p-4 flex flex-col justify-between shadow-xl min-h-[420px] relative overflow-hidden">
                            <div class="flex justify-between items-center z-10 bg-slate-800/80 backdrop-blur p-3 rounded-xl border border-slate-700 mb-2">
                                <span class="text-xs font-bold text-white uppercase tracking-wider"><i class="fas fa-radar text-gov-gold mr-2"></i> Simulator Sebaran Realisasi Wilayah</span>
                                <span class="text-[10px] font-mono text-emerald-400 bg-emerald-950 px-2 py-0.5 rounded border border-emerald-800">LIVE FEED</span>
                            </div>

                            <canvas id="realisasi-canvas" class="w-full h-full rounded-xl object-cover min-h-[320px]"></canvas>

                            <div class="z-10 bg-slate-800/80 backdrop-blur p-3 rounded-xl border border-slate-700 mt-2 flex justify-between items-center text-[10px] text-slate-300">
                                <span><i class="fas fa-info-circle text-gov-accent"></i> Hover/Lihat grafik dinamik wilayah Kepulauan Maluku</span>
                                <span class="font-mono">Tahun Ajaran 2025/2026</span>
                            </div>
                        </div>

                        <!-- Regency Stats Breakdown List -->
                        <div class="bg-white rounded-2xl border border-ui-border p-5 shadow-sm flex flex-col h-[500px]">
                            <h3 class="text-xs font-bold uppercase text-slate-500 tracking-wider mb-4 flex items-center gap-2">
                                <i class="fas fa-list-ol text-gov-blue"></i> Prosentase Realisasi per Kab/Kota
                            </h3>
                            <div class="flex-1 overflow-y-auto space-y-3 custom-scrollbar pr-1" id="regency-breakdown-list">
                                <!-- Populated dynamically by JS -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- ================= TAB: ADMIN DATABASE ================= -->
            <div id="tab-admin" class="spa-tab hidden">
                <section class="container mx-auto px-4 mt-8">
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8 bg-white p-6 rounded-2xl border border-ui-border shadow-sm">
                        <div>
                            <h1 class="text-2xl font-heading font-extrabold uppercase text-slate-900">Kelola Data Anggaran (Admin)</h1>
                            <p class="text-slate-500 text-xs md:text-sm mt-1 max-w-xl font-medium">Modul input, edit, dan pengawasan berkas laporan keuangan Dinas Pendidikan & Kebudayaan.</p>
                        </div>
                        <button onclick="openAdminModal()" class="bg-gov-blue hover:bg-gov-dark text-white px-5 py-2.5 rounded-xl font-bold transition-all shadow-md flex items-center gap-2 text-xs uppercase tracking-wider">
                            <i class="fas fa-plus-circle text-gov-gold"></i> Tambah Item Anggaran Baru
                        </button>
                    </div>

                    <!-- Admin Table -->
                    <div class="bg-white rounded-2xl border border-ui-border shadow-sm overflow-hidden mb-12">
                        <div class="p-4 bg-slate-50 border-b border-ui-border flex justify-between items-center">
                            <span class="text-xs font-bold text-slate-700 uppercase tracking-wider"><i class="fas fa-table text-gov-blue mr-2"></i>Daftar Master Data Anggaran</span>
                            <button onclick="resetDefaultDatabase()" class="text-xs font-bold text-gov-blue bg-blue-50 border border-blue-200 hover:bg-gov-blue hover:text-white px-3 py-1.5 rounded-lg transition-all flex items-center gap-1.5">
                                <i class="fas fa-sync-alt"></i> Reset DB ke Data Default (22 Record)
                            </button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-slate-50 border-b border-ui-border text-xs uppercase tracking-wider text-slate-500 font-bold">
                                        <th class="p-4">Kode & Kegiatan</th>
                                        <th class="p-4">Kategori & Lokasi</th>
                                        <th class="p-4 text-right">Pagu Alokasi</th>
                                        <th class="p-4 text-right">Realisasi Belanja</th>
                                        <th class="p-4 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="admin-table-body" class="text-xs divide-y divide-slate-100 font-medium">
                                    <!-- Populated by JS -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>

        </main>

        <!-- Footer -->
        <footer class="bg-gov-dark border-t-4 border-gov-gold mt-16 py-12 text-white relative">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <div class="mb-4">
                            <h4 class="font-heading font-black text-base text-white">SIPANGGARAN MALUKU</h4>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Disdikbud Prov. Maluku</p>
                        </div>
                        <p class="text-xs text-slate-300 leading-relaxed mb-4">
                            Sistem Informasi Pengawasan dan Transparansi Anggaran Keuangan Dinas Pendidikan dan Kebudayaan Provinsi Maluku. Mewujudkan pengelolaan dana pendidikan yang bersih, transparan, dan berkeadilan.
                        </p>
                    </div>

                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-gov-gold mb-4">Tautan Cepat</h4>
                        <ul class="space-y-2.5 text-xs text-slate-300">
                            <li><button onclick="switchTab('beranda')" class="hover:text-white transition-colors"><i class="fas fa-angle-right mr-2 text-gov-gold"></i> Beranda Utama</button></li>
                            <li><button onclick="switchTab('katalog'); filterCatalog('all');" class="hover:text-white transition-colors"><i class="fas fa-angle-right mr-2 text-gov-gold"></i> Info & Laporan Anggaran</button></li>
                            <li><button onclick="switchTab('realisasi')" class="hover:text-white transition-colors"><i class="fas fa-angle-right mr-2 text-gov-gold"></i> Visualisasi Serapan Daerah</button></li>
                            <li><a href="https://malukuprov.go.id" target="_blank" class="hover:text-white transition-colors"><i class="fas fa-angle-right mr-2 text-gov-gold"></i> Pemprov Maluku Official</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-gov-gold mb-4">Kantor Dinas</h4>
                        <p class="text-xs text-slate-300 leading-relaxed mb-3">
                            <i class="fas fa-map-marker-alt text-gov-gold mr-2"></i> Jl. Raya Pattimura No. 1, Ambon, Maluku<br>
                            <span class="ml-5">Kode Pos 97124, Indonesia</span>
                        </p>
                        <p class="text-xs text-slate-300"><i class="fas fa-phone-alt text-gov-gold mr-2"></i> Layanan Informasi: (0911) - 352389, 352367</p>
                    </div>
                </div>

                <div class="border-t border-white/10 mt-8 pt-6 flex flex-col md:flex-row justify-between items-center text-[10px] text-slate-400">
                    <p>&copy; 2026 Dinas Pendidikan dan Kebudayaan Provinsi Maluku. Hak Cipta Dilindungi Undang-Undang.</p>
                    <p class="mt-2 md:mt-0">Sistem Informasi Transparansi Keuangan Daerah</p>
                </div>
            </div>
        </footer>

        <!-- ================= MODAL: ADMIN FORM ================= -->
        <div id="admin-form-modal" class="fixed inset-0 bg-slate-900/80 backdrop-blur-sm z-[80] flex items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300">
            <div class="bg-white rounded-2xl w-full max-w-2xl overflow-hidden flex flex-col shadow-2xl relative max-h-[95vh] border border-slate-200">
                <div class="p-4 border-b border-slate-200 flex justify-between items-center bg-slate-50">
                    <h3 id="admin-modal-title" class="font-bold text-sm md:text-base text-slate-800"><i class="fas fa-edit text-gov-blue mr-2"></i>Tambah Item Anggaran</h3>
                    <button onclick="closeAdminModal()" class="text-slate-400 hover:text-slate-700 p-2 rounded-lg">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>
                <div class="p-6 overflow-y-auto custom-scrollbar bg-white">
                    <form id="admin-form" onsubmit="saveAdminData(event)" class="space-y-4">
                        <input type="hidden" id="admin-id">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="md:col-span-2">
                                <label class="block text-xs font-bold text-slate-700 mb-1">Nama Program / Kegiatan *</label>
                                <input type="text" id="admin-title" required class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:border-gov-blue outline-none">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-xs font-bold text-slate-700 mb-1">Deskripsi Singkat & Rincian *</label>
                                <textarea id="admin-desc" required rows="3" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:border-gov-blue outline-none resize-none"></textarea>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Kategori *</label>
                                <select id="admin-category" required class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:border-gov-blue outline-none">
                                    <option value="Sarpras">Sarpras (DAK Fisik/Gedung)</option>
                                    <option value="BOS">BOS & Beasiswa</option>
                                    <option value="SDM">SDM & Tunjangan Guru</option>
                                    <option value="Kebudayaan">Pelestarian Kebudayaan</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Lokasi Kabupaten / Kota *</label>
                                <select id="admin-region" required class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:border-gov-blue outline-none">
                                    <option value="Kota Ambon">Kota Ambon</option>
                                    <option value="Kota Tual">Kota Tual</option>
                                    <option value="Kab. Maluku Tengah">Kab. Maluku Tengah</option>
                                    <option value="Kab. Seram Bagian Barat">Kab. Seram Bagian Barat</option>
                                    <option value="Kab. Seram Bagian Timur">Kab. Seram Bagian Timur</option>
                                    <option value="Kab. Buru">Kab. Buru</option>
                                    <option value="Kab. Buru Selatan">Kab. Buru Selatan</option>
                                    <option value="Kab. Kepulauan Aru">Kab. Kepulauan Aru</option>
                                    <option value="Kab. Kepulauan Tanimbar">Kab. Kepulauan Tanimbar</option>
                                    <option value="Kab. Maluku Barat Daya">Kab. Maluku Barat Daya</option>
                                    <option value="Kab. Maluku Tenggara">Kab. Maluku Tenggara</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Jumlah Pagu Alokasi (Rp) *</label>
                                <input type="number" id="admin-pagu" required placeholder="Contoh: 1500000000" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:border-gov-blue outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Jumlah Realisasi Belanja (Rp) *</label>
                                <input type="number" id="admin-realisasi" required placeholder="Contoh: 1200000000" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:border-gov-blue outline-none">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-xs font-bold text-slate-700 mb-1">Tautan File Dokumen Laporan (PDF/Excel) *</label>
                                <input type="url" id="admin-doc" required placeholder="https://..." class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:border-gov-blue outline-none">
                            </div>
                        </div>
                        <div class="flex justify-end gap-3 mt-6 pt-4 border-t border-slate-200">
                            <button type="button" onclick="closeAdminModal()" class="px-5 py-2 text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg">Batal</button>
                            <button type="submit" class="px-5 py-2 text-xs font-bold text-white bg-gov-blue hover:bg-gov-dark rounded-lg shadow-md">Simpan Data Anggaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ================= MODAL: DETAIL LAPORAN ================= -->
        <div id="archive-modal" class="fixed inset-0 bg-slate-900/80 backdrop-blur-sm z-[60] flex items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300">
            <div class="bg-white rounded-2xl w-full max-w-2xl overflow-hidden flex flex-col shadow-2xl relative border border-slate-200">
                <div class="p-4 border-b border-slate-200 flex justify-between items-center bg-slate-50">
                    <div class="flex items-center gap-2">
                        <span id="modal-category-badge" class="bg-gov-blue text-white text-[10px] font-bold px-2 py-0.5 rounded uppercase">Kategori</span>
                        <h3 id="modal-archive-title" class="font-bold text-sm md:text-base text-slate-800 line-clamp-1">Judul Laporan</h3>
                    </div>
                    <button onclick="closeArchivePlayer()" class="text-slate-400 hover:text-slate-700 p-2 rounded-lg">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>

                <div class="p-6 overflow-y-auto space-y-4">
                    <div class="flex items-center justify-between bg-slate-50 p-4 rounded-xl border border-slate-200">
                        <div>
                            <p class="text-[10px] text-slate-500 uppercase font-bold">Lokasi Penerima Mandat</p>
                            <p id="modal-region" class="text-sm font-bold text-slate-800">Kabupaten/Kota</p>
                        </div>
                        <div class="text-right">
                            <p class="text-[10px] text-slate-500 uppercase font-bold">Kode Transaksi</p>
                            <p id="meta-id" class="text-xs font-mono font-bold text-gov-blue">ANG-000</p>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-xs font-bold text-slate-500 uppercase mb-1">Rincian & Deskripsi Kegiatan</h4>
                        <p id="modal-archive-desc" class="text-sm text-slate-700 leading-relaxed font-medium bg-slate-50/50 p-3 rounded-lg border border-slate-100"></p>
                    </div>

                    <!-- Pagu vs Realisasi Progress Bar -->
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 space-y-3">
                        <div class="flex justify-between text-xs font-bold">
                            <span class="text-slate-600">Progres Serapan Realisasi</span>
                            <span id="modal-persen-txt" class="text-gov-blue">0%</span>
                        </div>
                        <div class="w-full bg-slate-200 rounded-full h-3 overflow-hidden">
                            <div id="modal-bar-progress" class="bg-gov-blue h-3 rounded-full transition-all duration-500" style="width: 0%"></div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 text-xs pt-1">
                            <div>
                                <span class="text-slate-500 text-[10px] uppercase font-bold block">Pagu Dialokasikan</span>
                                <span id="modal-pagu-val" class="font-bold text-slate-900 text-sm">Rp 0</span>
                            </div>
                            <div>
                                <span class="text-slate-500 text-[10px] uppercase font-bold block">Realisasi Keuangan</span>
                                <span id="modal-realisasi-val" class="font-bold text-emerald-600 text-sm">Rp 0</span>
                            </div>
                        </div>
                    </div>

                    <!-- External PDF / Download Link -->
                    <div class="pt-2">
                        <a href="#" target="_blank" id="modal-external-link-btn" class="w-full bg-gov-blue hover:bg-gov-dark text-white font-bold py-3 px-4 rounded-xl text-xs uppercase tracking-wider transition-all flex items-center justify-center gap-2 shadow-md">
                            <i class="fas fa-file-pdf text-red-400 text-base"></i> Unduh / Buka Dokumen Resmi PDF
                        </a>
                    </div>
                </div>

                <div class="p-4 border-t border-slate-200 bg-slate-50 flex justify-between gap-3">
                    <button id="modal-btn-save" class="flex-1 py-2 rounded-lg text-xs font-bold border border-slate-300 text-slate-700 hover:bg-slate-100">
                        <i class="far fa-folder"></i> Simpan ke Laporan Favorit
                    </button>
                    <button onclick="shareArchiveMetadata()" class="px-4 py-2 rounded-lg text-xs font-bold border border-slate-300 text-slate-700 hover:bg-slate-100" title="Bagikan Tautan">
                        <i class="fas fa-share-alt"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- ================= DRAWER: BOOKMARK / SAVED REPORTS ================= -->
        <div id="bookmark-drawer" class="fixed top-0 right-0 h-full w-full max-w-sm bg-white border-l border-slate-200 z-[70] transform translate-x-full transition-transform duration-300 flex flex-col shadow-2xl">
            <div class="p-4 border-b border-slate-200 flex items-center justify-between bg-slate-50">
                <h3 class="font-bold text-xs uppercase tracking-wide text-slate-800 flex items-center gap-2">
                    <i class="fas fa-folder text-gov-gold"></i> Berkas Tersimpan Anda
                </h3>
                <button onclick="toggleBookmarkPanel()" class="text-slate-400 hover:text-slate-700 p-2 rounded">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div id="bookmark-list" class="flex-1 overflow-y-auto p-4 space-y-3 custom-scrollbar">
                <!-- Dynamic saved items -->
            </div>

            <div id="bookmark-empty-state" class="absolute inset-0 flex flex-col items-center justify-center p-6 text-center pointer-events-none">
                <div class="text-slate-300 text-4xl mb-3"><i class="fas fa-folder-open"></i></div>
                <p class="font-bold text-slate-500 text-xs uppercase">Belum Ada Dokumen Disimpan</p>
                <p class="text-slate-400 text-[10px] mt-1">Simpan laporan anggaran dari katalog untuk referensi ekspor cepat.</p>
            </div>
        </div>

        <!-- ================= FLOATING WIDGET: GEMINI AI ASSISTANT ================= -->
        <div id="ai-chat-drawer" class="fixed top-0 right-0 h-full w-full max-w-sm bg-white border-l border-slate-200 z-[70] transform translate-x-full transition-transform duration-300 flex flex-col shadow-2xl">
            <div class="p-4 border-b border-gov-blue flex items-center justify-between bg-gov-blue text-white">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-gov-gold text-slate-900 flex items-center justify-center text-xs font-black shadow">
                        <i class="fas fa-robot"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-xs uppercase tracking-wide">Si-Anggaran AI</h3>
                        <span class="text-[9px] text-blue-200 flex items-center gap-1">
                            <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full animate-pulse"></span> Konsultan Transparansi
                        </span>
                    </div>
                </div>
                <button onclick="toggleAIChat()" class="text-blue-100 hover:text-white p-2">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div id="ai-messages" class="flex-1 overflow-y-auto p-4 space-y-3 custom-scrollbar text-xs bg-slate-50">
                <div class="flex items-start gap-2">
                    <div class="w-6 h-6 rounded-full bg-gov-blue text-white flex items-center justify-center text-[9px] font-bold shrink-0">AI</div>
                    <div class="bg-white border border-slate-200 rounded-xl p-3 text-slate-700 max-w-[85%] shadow-sm leading-relaxed">
                        Tabea! Saya <span class="font-bold text-gov-blue">Si-Anggaran AI</span>. Silakan tanya seputar penyaluran dana BOS, DAK Fisik Sekolah, atau transparansi alokasi kebudayaan Dinas Pendidikan & Kebudayaan Provinsi Maluku.
                    </div>
                </div>
            </div>

            <div class="px-3 py-2 border-t border-slate-200 bg-slate-100 flex flex-wrap gap-1.5">
                <button onclick="sendSuggestedAIQuery('Bagaimana kriteria penyaluran DAK Fisik SMK di Maluku?')" class="text-[9px] font-bold bg-white text-slate-600 px-2.5 py-1 rounded-full border border-slate-300 hover:border-gov-blue">DAK Fisik SMK</button>
                <button onclick="sendSuggestedAIQuery('Berapa besar alokasi dana insentif guru daerah 3T?')" class="text-[9px] font-bold bg-white text-slate-600 px-2.5 py-1 rounded-full border border-slate-300 hover:border-gov-blue">Insentif Guru 3T</button>
            </div>

            <form onsubmit="sendAIMessage(event)" class="p-3 border-t border-slate-200 bg-white flex gap-2">
                <input required type="text" id="ai-input" placeholder="Tanyakan seputar anggaran..." class="flex-1 bg-slate-50 text-xs border border-slate-300 rounded-lg px-3 py-2 text-slate-800 outline-none focus:border-gov-blue">
                <button type="submit" id="ai-submit-btn" class="bg-gov-blue text-white px-3.5 rounded-lg text-xs font-bold hover:bg-gov-dark">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>

    </div> <!-- END OF APP WRAPPER -->

    <!-- Toast Alert Box -->
    <div id="toast-box" class="fixed bottom-6 left-1/2 -translate-x-1/2 bg-slate-900 text-white px-4 py-3 rounded-xl shadow-2xl z-[200] flex items-center gap-3 transition-all duration-300 transform translate-y-20 opacity-0 pointer-events-none text-xs font-bold">
        <i id="toast-icon" class="fas fa-info-circle text-blue-400"></i>
        <span id="toast-message">Notifikasi</span>
    </div>

    <!-- ================= JAVASCRIPT LOGIC ================= -->
    <script>
        // --- 1. INITIAL DATABASE (INFO ANGGARAN DISDIKBUD MALUKU 2026) ---
        const DEFAULT_MALUKU_BUDGET_DB = [
            // ================= KATEGORI: SARANA & PRASARANA (SARPRAS) =================
            {
                id: 'ANG-2026-001',
                title: 'Pembangunan & Renovasi Ruang Kelas SMA/SMK Kab. Seram Bagian Barat',
                desc: 'Alokasi DAK Fisik Bidang Pendidikan untuk renovasi 12 unit ruang kelas, laboratorium komputer, dan sanitasi sekolah menengah di wilayah SBB.',
                category: 'Sarpras',
                region: 'Kab. Seram Bagian Barat',
                pagu: 12500000000,
                realisasi: 10200000000,
                doc: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            },
            {
                id: 'ANG-2026-004',
                title: 'Program Digitalisasi Sekolah & Peralatan TIK ANBK Kepulauan Tanimbar',
                desc: 'Pengadaan laptop, chromebook, proyektor, serta fasilitas satelit internet broadband untuk sekolah pendukung Asesmen Nasional Mandiri di Tanimbar.',
                category: 'Sarpras',
                region: 'Kab. Kepulauan Tanimbar',
                pagu: 6200000000,
                realisasi: 5800000000,
                doc: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            },
            {
                id: 'ANG-2026-006',
                title: 'Pembangunan Laboratorium IPA & Komputer SMA Negeri 1 Namlea Kab. Buru',
                desc: 'Pekerjaan fisik konstruksi gedung lab sains terpadu, jaringan LAN internal, beserta instrumen praktikum fisika, kimia, dan biologi.',
                category: 'Sarpras',
                region: 'Kab. Buru',
                pagu: 4800000000,
                realisasi: 4100000000,
                doc: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            },
            {
                id: 'ANG-2026-007',
                title: 'Rehabilitasi Berat Gedung SMKN 1 Kota Ambon & Peralatan Bengkel Vokasi',
                desc: 'Revitalisasi ruang praktik keahlian maritim, permesinan, jaringan komputer, serta peremajaan fasilitas belajar bengkel kejuruan di Kota Ambon.',
                category: 'Sarpras',
                region: 'Kota Ambon',
                pagu: 15600000000,
                realisasi: 14200000000,
                doc: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            },
            {
                id: 'ANG-2026-008',
                title: 'Pembangunan Rumah Dinas Guru & Asrama Siswa Terpencil Maluku Barat Daya',
                desc: 'Penyediaan hunian layak bagi tenaga pendidik dan perumahan siswa pulau terluar di wilayah MBD guna menjamin pemerataan mutu pendidikan.',
                category: 'Sarpras',
                region: 'Kab. Maluku Barat Daya',
                pagu: 8400000000,
                realisasi: 7100000000,
                doc: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            },
            {
                id: 'ANG-2026-009',
                title: 'Pengadaan Bus Sekolah & Speedboat Transportasi Siswa Kepulauan Aru',
                desc: 'Pengadaan sarana armada perahu motor antarpulau dan kendaraan darat pendukung mobilitas siswa & guru di gugusan Kepulauan Aru.',
                category: 'Sarpras',
                region: 'Kab. Kepulauan Aru',
                pagu: 9500000000,
                realisasi: 8900000000,
                doc: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            },

            // ================= KATEGORI: BOS & BEASISWA (BOS) =================
            {
                id: 'ANG-2026-002',
                title: 'Penyaluran Dana BOS Daerah & Beasiswa Maluku Cerdas 2026',
                desc: 'Bantuan operasional sekolah daerah bagi jenjang SMA/SMK/SLB serta bantuan biaya pendidikan perguruan tinggi mahasiswa berprestasi.',
                category: 'BOS',
                region: 'Kota Ambon',
                pagu: 28400000000,
                realisasi: 25100000000,
                doc: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            },
            {
                id: 'ANG-2026-010',
                title: 'Program Beasiswa Kedokteran & Sains Unggulan Kab. Maluku Tengah',
                desc: 'Bantuan Beasiswa Pendidikan Tinggi kedokteran, farmasi, dan teknik energi kelautan bagi putra-putri daerah lulusan SMA asal Maluku Tengah.',
                category: 'BOS',
                region: 'Kab. Maluku Tengah',
                pagu: 14000000000,
                realisasi: 12600000000,
                doc: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            },
            {
                id: 'ANG-2026-011',
                title: 'BOSDA Jenjang SLB & Sekolah Inklusi Khusus Kota Tual',
                desc: 'Penyaluran dana dukungan operasional khusus bagi Sekolah Luar Biasa (SLB) dan penyediaan alat bantu aksesibilitas belajar penyandang disabilitas.',
                category: 'BOS',
                region: 'Kota Tual',
                pagu: 7300000000,
                realisasi: 6800000000,
                doc: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            },
            {
                id: 'ANG-2026-012',
                title: 'Subsidi Bantuan Biaya Pendidikan Mahasiswa 3T Seram Bagian Timur',
                desc: 'Bantuan langsung uang kuliah tunggal (UKT) dan biaya hidup untuk mahasiswa kurang mampu yang berasal dari daerah terpencil Seram Bagian Timur.',
                category: 'BOS',
                region: 'Kab. Seram Bagian Timur',
                pagu: 5500000000,
                realisasi: 4900000000,
                doc: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            },
            {
                id: 'ANG-2026-013',
                title: 'Beasiswa Afirmasi Pendidikan Menengah (ADEM) Kab. Buru Selatan',
                desc: 'Program pembiayaan siswa berprestasi asal pedalaman Buru Selatan untuk melanjutkan studi menengah atas berkualitas di pusat provinsi.',
                category: 'BOS',
                region: 'Kab. Buru Selatan',
                pagu: 6100000000,
                realisasi: 5400000000,
                doc: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            },

            // ================= KATEGORI: SDM & INSENTIF GURU (SDM) =================
            {
                id: 'ANG-2026-003',
                title: 'Tunjangan Khusus & Insentif Guru Terpencil (3T) Kepulauan Aru',
                desc: 'Pembayaran alokasi tunjangan profesi dan insentif daerah khusus bagi guru non-PNS dan PNS di wilayah perbatasan dan kepulauan terluar.',
                category: 'SDM',
                region: 'Kab. Kepulauan Aru',
                pagu: 8900000000,
                realisasi: 8100000000,
                doc: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            },
            {
                id: 'ANG-2026-014',
                title: 'Sertifikasi Kompetensi & PPG Guru SMA/SMK Kab. Maluku Tenggara',
                desc: 'Penyelenggaraan Diklat Pendidikan Profesi Guru (PPG), uji sertifikasi guru vokasi, dan peningkatan profesionalisme pimpinan sekolah.',
                category: 'SDM',
                region: 'Kab. Maluku Tenggara',
                pagu: 5200000000,
                realisasi: 4700000000,
                doc: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            },
            {
                id: 'ANG-2026-015',
                title: 'Insentif Daerah Honorer/Tenaga Pendidik Non-PNS Maluku Barat Daya',
                desc: 'Alokasi insentif honor daerah reguler bulanan bagi guru kontrak non-ASN yang mengajar di gugusan pulau terluar kabupaten MBD.',
                category: 'SDM',
                region: 'Kab. Maluku Barat Daya',
                pagu: 11300000000,
                realisasi: 10500000000,
                doc: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            },
            {
                id: 'ANG-2026-016',
                title: 'Tunjangan Profesi Guru (TPG) & Sertifikasi Seram Bagian Barat',
                desc: 'Penyaluran dana TPG Aparatur Sipil Negara (ASN) guru SMA/SMK/SLB semester pertama di wilayah Kabupaten Seram Bagian Barat.',
                category: 'SDM',
                region: 'Kab. Seram Bagian Barat',
                pagu: 18700000000,
                realisasi: 17200000000,
                doc: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            },
            {
                id: 'ANG-2026-017',
                title: 'Pelatihan Peningkatan Kapasitas Kepala Sekolah & Pengawas Kab. Buru',
                desc: 'Program lokakarya kepemimpinan pembelajaran, manajemen kurikulum merdeka, serta digitalisasi tata kelola administrasi sekolah.',
                category: 'SDM',
                region: 'Kab. Buru',
                pagu: 3800000000,
                realisasi: 3400000000,
                doc: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            },

            // ================= KATEGORI: PELESTARIAN CAGAR BUDAYA & KEBUDAYAAN =================
            {
                id: 'ANG-2026-005',
                title: 'Pelestarian Sanggar Seni & Pemugaran Cagar Budaya Banda Neira',
                desc: 'Hibah pembinaan lembaga adat, pemugaran cagar budaya benteng sejarah, serta gelaran Pesona Budaya Negeri-Negeri di Maluku Tengah.',
                category: 'Kebudayaan',
                region: 'Kab. Maluku Tengah',
                pagu: 4500000000,
                realisasi: 3900000000,
                doc: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            },
            {
                id: 'ANG-2026-018',
                title: 'Konservasi Benteng Duenstede & Situs Sejarah Saparua',
                desc: 'Pekerjaan perbaikan fisik penataan situs benteng peninggalan masa kolonial dan pemeliharaan rumah pahlawan nasional Pattimura.',
                category: 'Kebudayaan',
                region: 'Kab. Maluku Tengah',
                pagu: 6800000000,
                realisasi: 5900000000,
                doc: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            },
            {
                id: 'ANG-2026-019',
                title: 'Pekan Kebudayaan Daerah & Festival Seni Musik Ukulele Kota Ambon',
                desc: 'Penyelenggaraan pentas seni daerah tahunan, pawai kebudayaan Maluku, dan perlombaan musik alat musik tradisional khas Ambon.',
                category: 'Kebudayaan',
                region: 'Kota Ambon',
                pagu: 3200000000,
                realisasi: 3000000000,
                doc: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            },
            {
                id: 'ANG-2026-020',
                title: 'Digitalisasi Manuskrip Kuno & Warisan Budaya Takbenda (WBTb) Tanimbar',
                desc: 'Inisiatif pencatatan, dokumentasi audio-visual kain tenun ikat Tanimbar, manuskrip tutur tua, serta perlindungan situs cagar budaya.',
                category: 'Kebudayaan',
                region: 'Kab. Kepulauan Tanimbar',
                pagu: 2900000000,
                realisasi: 2500000000,
                doc: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            },
            {
                id: 'ANG-2026-021',
                title: 'Revitalisasi Museum Negeri Siwalima & Pembinaan Sanggar Tari Ambon',
                desc: 'Pengembangan tata pameran koleksi ethnografi Museum Siwalima serta pembinaan sarana prasarana puluhan sanggar tari tradisional.',
                category: 'Kebudayaan',
                region: 'Kota Ambon',
                pagu: 4100000000,
                realisasi: 3700000000,
                doc: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            },
            {
                id: 'ANG-2026-022',
                title: 'Restorasi Rumah Adat (Baileo) & Konservasi Situs Maluku Tenggara',
                desc: 'Bantuan pemeliharaan fisik gubug adat/Baileo negeri-negeri adat di Maluku Tenggara dalam rangka melestarikan identitas hukum adat.',
                category: 'Kebudayaan',
                region: 'Kab. Maluku Tenggara',
                pagu: 5400000000,
                realisasi: 4800000000,
                doc: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf'
            }
        ];

        // Load database dari Laravel Backend
        const rawDB = @json($anggarans);
        let BUDGET_DATABASE = rawDB.map(item => ({
            id: item.kode_anggaran,
            title: item.title,
            desc: item.desc,
            category: item.category,
            region: item.region,
            pagu: item.pagu,
            realisasi: item.realisasi,
            doc: item.doc
        }));

        async function resetDefaultDatabase() {
            if (confirm("Apakah Anda yakin ingin mengembalikan seluruh data anggaran ke default (22 Record Master)?")) {
                try {
                    const response = await fetch('/admin/anggaran/reset', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'X-Anggaran-Password': sessionStorage.getItem('disdikbud_pass') || ''
                        }
                    });
                    if (response.ok) {
                        showToast("Database berhasil di-reset ke data default! Memuat ulang...", "success");
                        setTimeout(() => window.location.reload(), 1000);
                    }
                } catch(e) {
                    showToast("Gagal melakukan reset.", "error");
                }
            }
        }

        // State Variables
        let currentTab = 'beranda';
        let savedReports = [];
        let searchQuery = '';
        let currentFilter = 'all';
        let activeArchiveId = null;
        let isAuthenticated = sessionStorage.getItem('disdikbud_auth') === 'true' && sessionStorage.getItem('disdikbud_pass') === 'disdikbud2026';
        const apiKey = ""; // Injected environment

        // Initialize App
        window.addEventListener('DOMContentLoaded', () => {
            const appWrapper = document.getElementById('app-wrapper');
            const authScreen = document.getElementById('auth-screen');
            
            if (isAuthenticated) {
                authScreen.classList.add('hidden');
                appWrapper.classList.remove('hidden');
                setTimeout(() => appWrapper.classList.remove('opacity-0'), 50);
                
                renderGrids();
                loadSavedFromSession();
                renderAdminTable();
                initRealisasiCanvas();
            } else {
                authScreen.classList.remove('hidden');
                authScreen.classList.remove('opacity-0');
                appWrapper.classList.add('hidden');
            }
        });

        // Login Handler
        function handleLogin(e) {
            e.preventDefault();
            const user = document.getElementById('login-user').value;
            const pass = document.getElementById('login-pass').value;

            if (user === 'admin' && pass === 'disdikbud2026') {
                isAuthenticated = true;
                sessionStorage.setItem('disdikbud_auth', 'true');
                sessionStorage.setItem('disdikbud_pass', pass);
                
                const authScreen = document.getElementById('auth-screen');
                authScreen.classList.add('opacity-0');
                setTimeout(() => {
                    authScreen.classList.add('hidden');
                    const appWrapper = document.getElementById('app-wrapper');
                    appWrapper.classList.remove('hidden');
                    
                    renderGrids();
                    loadSavedFromSession();
                    renderAdminTable();
                    initRealisasiCanvas();
                    
                    setTimeout(() => appWrapper.classList.remove('opacity-0'), 50);
                    switchTab('beranda');
                    showToast("Sistem Informasi Anggaran Terbuka.", "success");
                }, 500);
            } else {
                showToast("Username atau kata sandi tidak cocok!", "error");
            }
        }

        function closeAuthModal() {
            window.location.href = '/';
        }

        function unlockApp() {
            document.getElementById('auth-screen').classList.add('opacity-0');
            setTimeout(() => {
                document.getElementById('auth-screen').classList.add('hidden');
                const appWrapper = document.getElementById('app-wrapper');
                appWrapper.classList.remove('hidden');
                
                renderGrids();
                loadSavedFromSession();
                renderAdminTable();
                initRealisasiCanvas();

                setTimeout(() => appWrapper.classList.remove('opacity-0'), 50);
            }, 500);
        }

        function logoutApp() {
            isAuthenticated = false;
            sessionStorage.removeItem('disdikbud_auth');
            sessionStorage.removeItem('disdikbud_pass');
            window.location.reload();
        }

        // Tab Navigation
        function switchTab(tabId) {
            // Proteksi Tab Admin
            if (tabId === 'admin' && !isAuthenticated) {
                document.getElementById('auth-screen').classList.remove('hidden');
                setTimeout(() => document.getElementById('auth-screen').classList.remove('opacity-0'), 50);
                return; // Stop switching tab
            }

            currentTab = tabId;
            document.querySelectorAll('.spa-tab').forEach(el => el.classList.add('hidden'));

            document.querySelectorAll('.nav-btn').forEach(btn => {
                btn.classList.remove('text-gov-blue', 'border-b-2', 'border-gov-blue');
                btn.classList.add('text-slate-600');
            });
            document.querySelectorAll('.mob-nav-btn').forEach(btn => {
                btn.classList.remove('bg-gov-blue', 'text-white');
                btn.classList.add('bg-white', 'text-slate-600');
            });

            const tabEl = document.getElementById(`tab-${tabId}`);
            if (tabEl) tabEl.classList.remove('hidden');

            const deskNav = document.getElementById(`nav-${tabId}`);
            if (deskNav) deskNav.classList.add('text-gov-blue', 'border-b-2', 'border-gov-blue');

            const mobNav = document.getElementById(`mob-nav-${tabId}`);
            if (mobNav) {
                mobNav.classList.add('bg-gov-blue', 'text-white');
                mobNav.classList.remove('bg-white', 'text-slate-600');
            }

            if(tabId === 'admin') renderAdminTable();
            if(tabId === 'realisasi') renderRegencyBreakdown();

            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Format Helper
        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(number);
        }

        // Calculate and Render Metrics
        function renderGrids() {
            let totalPagu = 0;
            let totalRealisasi = 0;

            BUDGET_DATABASE.forEach(item => {
                totalPagu += Number(item.pagu);
                totalRealisasi += Number(item.realisasi);
            });

            const sisaPagu = totalPagu - totalRealisasi;
            const persenSerapan = totalPagu > 0 ? ((totalRealisasi / totalPagu) * 100).toFixed(1) : 0;

            // Hero Widget
            document.getElementById('hero-total-pagu').textContent = formatRupiah(totalPagu);
            document.getElementById('hero-total-realisasi').textContent = formatRupiah(totalRealisasi);
            document.getElementById('hero-total-persen').textContent = `${persenSerapan}%`;

            // Stat Cards
            document.getElementById('info-total-pagu-card').textContent = formatRupiah(totalPagu);
            document.getElementById('info-total-realisasi-card').textContent = formatRupiah(totalRealisasi);
            document.getElementById('info-sisa-pagu-card').textContent = formatRupiah(sisaPagu);

            // Category Bar Chart
            const categories = ['Sarpras', 'BOS', 'SDM', 'Kebudayaan'];
            let barsHtml = '';

            categories.forEach(cat => {
                const items = BUDGET_DATABASE.filter(a => a.category === cat);
                let catPagu = 0;
                let catRealisasi = 0;
                items.forEach(i => {
                    catPagu += Number(i.pagu);
                    catRealisasi += Number(i.realisasi);
                });

                const catPersen = catPagu > 0 ? ((catRealisasi / catPagu) * 100).toFixed(1) : 0;

                barsHtml += `
                    <div>
                        <div class="flex justify-between text-xs font-bold text-slate-700 mb-1.5">
                            <span>${cat === 'Sarpras' ? 'Sarana & Prasarana Sekolah' : cat === 'SDM' ? 'SDM & Insentif Guru' : cat}</span>
                            <span>${formatRupiah(catRealisasi)} / ${formatRupiah(catPagu)} (${catPersen}%)</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-3 overflow-hidden border border-slate-200">
                            <div class="bg-gov-blue h-3 rounded-full transition-all duration-700" style="width: ${catPersen}%"></div>
                        </div>
                    </div>
                `;
            });

            document.getElementById('info-category-bars').innerHTML = barsHtml;
        }

        // Global Search
        function handleGlobalSearch(val) {
            searchQuery = val.trim().toLowerCase();
            if (currentTab !== 'katalog') {
                switchTab('katalog');
                filterCatalog('all');
            } else {
                renderCatalog();
            }
        }

        // Filter Catalog
        function filterCatalog(cat) {
            currentFilter = cat;
            const buttons = {
                'all': document.getElementById('cat-filter-all'),
                'Sarpras': document.getElementById('cat-filter-sarpras'),
                'BOS': document.getElementById('cat-filter-bos'),
                'SDM': document.getElementById('cat-filter-sdm'),
                'Kebudayaan': document.getElementById('cat-filter-kebudayaan')
            };

            Object.keys(buttons).forEach(k => {
                if(buttons[k]) {
                    if(k === cat) {
                        buttons[k].className = "bg-gov-blue text-white px-4 py-2 rounded-full uppercase tracking-wider font-bold shadow-md";
                    } else {
                        buttons[k].className = "bg-white hover:bg-slate-50 text-slate-600 px-4 py-2 rounded-full uppercase tracking-wider border border-slate-200 font-bold";
                    }
                }
            });

            renderCatalog();
        }

        function renderCatalog() {
            const grid = document.getElementById('catalog-grid');
            const noResults = document.getElementById('catalog-no-results');
            if(!grid) return;

            let filtered = BUDGET_DATABASE;

            if (currentFilter !== 'all') {
                filtered = filtered.filter(a => a.category === currentFilter);
            }

            if (searchQuery) {
                filtered = filtered.filter(a => 
                    a.title.toLowerCase().includes(searchQuery) ||
                    a.desc.toLowerCase().includes(searchQuery) ||
                    a.region.toLowerCase().includes(searchQuery) ||
                    a.id.toLowerCase().includes(searchQuery)
                );
            }

            if (filtered.length === 0) {
                grid.classList.add('hidden');
                noResults.classList.remove('hidden');
            } else {
                grid.classList.remove('hidden');
                noResults.classList.add('hidden');

                grid.innerHTML = filtered.map(item => {
                    const persen = item.pagu > 0 ? ((item.realisasi / item.pagu) * 100).toFixed(0) : 0;
                    return `
                        <div class="bg-white rounded-xl overflow-hidden border border-slate-200 hover:border-gov-blue hover:shadow-xl transition-all cursor-pointer group flex flex-col justify-between p-5" onclick="openArchiveDetails('${item.id}')">
                            <div>
                                <div class="flex items-center justify-between mb-3">
                                    <span class="bg-blue-50 text-gov-blue text-[10px] font-bold px-2.5 py-0.5 rounded border border-blue-100 uppercase">${item.category}</span>
                                    <span class="text-[10px] font-mono font-bold text-slate-400">${item.id}</span>
                                </div>
                                <h3 class="font-bold text-slate-800 text-sm group-hover:text-gov-blue transition-colors line-clamp-2 mb-2">${item.title}</h3>
                                <p class="text-[11px] text-slate-500 line-clamp-2 mb-4 leading-relaxed">${item.desc}</p>
                            </div>

                            <div class="pt-3 border-t border-slate-100">
                                <div class="flex justify-between text-[11px] font-bold mb-1">
                                    <span class="text-slate-500"><i class="fas fa-map-marker-alt text-gov-gold mr-1"></i> ${item.region}</span>
                                    <span class="text-gov-blue">${persen}% Terrealisasi</span>
                                </div>
                                <div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden mb-3">
                                    <div class="bg-gov-blue h-2 rounded-full" style="width: ${persen}%"></div>
                                </div>
                                <div class="flex justify-between items-center text-xs">
                                    <span class="font-extrabold text-slate-900">${formatRupiah(item.pagu)}</span>
                                    <span class="text-[10px] text-gov-blue font-bold uppercase underline">Detail & Document <i class="fas fa-arrow-right"></i></span>
                                </div>
                            </div>
                        </div>
                    `;
                }).join('');
            }
        }

        // Modal Details
        function openArchiveDetails(id) {
            const item = BUDGET_DATABASE.find(a => a.id === id);
            if (!item) return;

            activeArchiveId = id;
            const modal = document.getElementById('archive-modal');

            document.getElementById('modal-archive-title').textContent = item.title;
            document.getElementById('modal-archive-desc').textContent = item.desc;
            document.getElementById('modal-region').textContent = item.region;
            document.getElementById('meta-id').textContent = item.id;
            document.getElementById('modal-category-badge').textContent = item.category;
            
            document.getElementById('modal-pagu-val').textContent = formatRupiah(item.pagu);
            document.getElementById('modal-realisasi-val').textContent = formatRupiah(item.realisasi);

            const persen = item.pagu > 0 ? ((item.realisasi / item.pagu) * 100).toFixed(1) : 0;
            document.getElementById('modal-persen-txt').textContent = `${persen}%`;
            document.getElementById('modal-bar-progress').style.width = `${persen}%`;

            document.getElementById('modal-external-link-btn').href = item.doc;

            updateModalBookmarkBtn(id);

            modal.classList.remove('hidden');
            setTimeout(() => modal.classList.remove('opacity-0'), 10);
        }

        function closeArchivePlayer() {
            const modal = document.getElementById('archive-modal');
            modal.classList.add('opacity-0');
            setTimeout(() => modal.classList.add('hidden'), 300);
        }

        function updateModalBookmarkBtn(id) {
            const btn = document.getElementById('modal-btn-save');
            if(!btn) return;
            const isSaved = savedReports.some(a => a.id === id);

            if (isSaved) {
                btn.innerHTML = `<i class="fas fa-folder-minus text-gov-gold"></i> Hapus dari Tersimpan`;
                btn.className = "flex-1 py-2 rounded-lg text-xs font-bold border border-gov-gold bg-amber-50 text-amber-900";
            } else {
                btn.innerHTML = `<i class="far fa-folder"></i> Simpan ke Laporan Favorit`;
                btn.className = "flex-1 py-2 rounded-lg text-xs font-bold border border-slate-300 text-slate-700 hover:bg-slate-100";
            }

            btn.onclick = () => toggleBookmark(id);
        }

        // Bookmark Logic
        function toggleBookmark(id) {
            const item = BUDGET_DATABASE.find(a => a.id === id);
            if (!item) return;

            const index = savedReports.findIndex(a => a.id === id);
            if (index > -1) {
                savedReports.splice(index, 1);
                showToast("Laporan dihapus dari tersimpan.", "info");
            } else {
                savedReports.push(item);
                showToast("Laporan disimpan ke folder ekspor.", "success");
            }

            sessionStorage.setItem('disdikbud_saved_reports', JSON.stringify(savedReports));
            updateBookmarkTrayUI();
            updateModalBookmarkBtn(id);
        }

        function updateBookmarkTrayUI() {
            const list = document.getElementById('bookmark-list');
            const emptyState = document.getElementById('bookmark-empty-state');
            const badge = document.getElementById('bookmark-badge');

            if (savedReports.length === 0) {
                list.innerHTML = '';
                emptyState.classList.remove('hidden');
                badge.classList.add('hidden');
            } else {
                emptyState.classList.add('hidden');
                badge.classList.remove('hidden');
                badge.textContent = savedReports.length;

                list.innerHTML = savedReports.map(item => `
                    <div class="bg-slate-50 border border-slate-200 p-3 rounded-xl flex flex-col justify-between">
                        <div>
                            <span class="text-[9px] font-bold text-gov-blue uppercase bg-blue-100 px-2 py-0.5 rounded">${item.category}</span>
                            <h4 class="font-bold text-xs text-slate-800 mt-1 line-clamp-1">${item.title}</h4>
                            <p class="text-[10px] text-slate-500 font-mono mt-0.5">${formatRupiah(item.pagu)}</p>
                        </div>
                        <div class="flex justify-end gap-2 mt-2 pt-2 border-t border-slate-200">
                            <a href="${item.doc}" target="_blank" class="text-[10px] font-bold text-gov-blue"><i class="fas fa-download"></i> Unduh PDF</a>
                            <button onclick="toggleBookmark('${item.id}')" class="text-[10px] font-bold text-red-500"><i class="fas fa-trash"></i> Hapus</button>
                        </div>
                    </div>
                `).join('');
            }
        }

        function loadSavedFromSession() {
            const stored = sessionStorage.getItem('disdikbud_saved_reports');
            if (stored) {
                try { savedReports = JSON.parse(stored); } catch(e) { savedReports = []; }
            }
            updateBookmarkTrayUI();
        }

        function toggleBookmarkPanel() {
            document.getElementById('bookmark-drawer').classList.toggle('translate-x-full');
        }

        function shareArchiveMetadata() {
            const tempUrl = window.location.href;
            navigator.clipboard.writeText(tempUrl);
            showToast("Tautan halaman telah disalin ke clipboard!", "success");
        }

        function showToast(message, type = "info") {
            const toast = document.getElementById('toast-box');
            const icon = document.getElementById('toast-icon');
            const text = document.getElementById('toast-message');

            text.textContent = message;
            if (type === "success") icon.className = "fas fa-check-circle text-emerald-400 text-base";
            else if (type === "error") icon.className = "fas fa-exclamation-triangle text-red-400 text-base";
            else icon.className = "fas fa-info-circle text-blue-400 text-base";

            toast.classList.remove('translate-y-20', 'opacity-0', 'pointer-events-none');
            setTimeout(() => toast.classList.add('translate-y-20', 'opacity-0', 'pointer-events-none'), 3000);
        }

        // ADMIN DATABASE CRUD
        function renderAdminTable() {
            const tbody = document.getElementById('admin-table-body');
            if(!tbody) return;

            tbody.innerHTML = BUDGET_DATABASE.map(item => `
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="p-4">
                        <div class="font-bold text-slate-800 line-clamp-1">${item.title}</div>
                        <div class="text-[10px] font-mono text-slate-400 mt-0.5">${item.id}</div>
                    </td>
                    <td class="p-4">
                        <span class="bg-slate-100 text-slate-700 text-[10px] px-2 py-0.5 rounded font-bold uppercase">${item.category}</span>
                        <div class="text-[10px] text-slate-500 mt-0.5">${item.region}</div>
                    </td>
                    <td class="p-4 text-right font-bold text-slate-900">${formatRupiah(item.pagu)}</td>
                    <td class="p-4 text-right font-bold text-emerald-600">${formatRupiah(item.realisasi)}</td>
                    <td class="p-4 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <button onclick="openAdminModal('${item.id}')" class="w-7 h-7 rounded bg-blue-50 text-gov-blue hover:bg-gov-blue hover:text-white transition-colors" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="deleteAdminData('${item.id}')" class="w-7 h-7 rounded bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-colors" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        function openAdminModal(id = null) {
            const modal = document.getElementById('admin-form-modal');
            const form = document.getElementById('admin-form');
            form.reset();

            if (id) {
                const item = BUDGET_DATABASE.find(a => a.id === id);
                if (item) {
                    document.getElementById('admin-modal-title').innerHTML = '<i class="fas fa-edit text-gov-blue mr-2"></i>Edit Data Anggaran';
                    document.getElementById('admin-id').value = item.id;
                    document.getElementById('admin-title').value = item.title;
                    document.getElementById('admin-desc').value = item.desc;
                    document.getElementById('admin-category').value = item.category;
                    document.getElementById('admin-region').value = item.region;
                    document.getElementById('admin-pagu').value = item.pagu;
                    document.getElementById('admin-realisasi').value = item.realisasi;
                    document.getElementById('admin-doc').value = item.doc;
                }
            } else {
                document.getElementById('admin-modal-title').innerHTML = '<i class="fas fa-plus-circle text-gov-blue mr-2"></i>Tambah Item Anggaran Baru';
                document.getElementById('admin-id').value = '';
            }

            modal.classList.remove('hidden');
            setTimeout(() => modal.classList.remove('opacity-0'), 10);
        }

        function closeAdminModal() {
            const modal = document.getElementById('admin-form-modal');
            modal.classList.add('opacity-0');
            setTimeout(() => modal.classList.add('hidden'), 300);
        }

                async function saveAdminData(e) {
            e.preventDefault();
            const id = document.getElementById('admin-id').value;
            const newId = id || 'ANG-2026-' + Math.floor(100 + Math.random() * 900);

            const itemData = {
                kode_anggaran: newId,
                title: document.getElementById('admin-title').value,
                desc: document.getElementById('admin-desc').value,
                category: document.getElementById('admin-category').value,
                region: document.getElementById('admin-region').value,
                pagu: Number(document.getElementById('admin-pagu').value),
                realisasi: Number(document.getElementById('admin-realisasi').value),
                doc: document.getElementById('admin-doc').value
            };

            try {
                const response = await fetch('/admin/anggaran/store', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'X-Anggaran-Password': sessionStorage.getItem('disdikbud_pass') || ''
                    },
                    body: JSON.stringify(itemData)
                });
                
                if (response.ok) {
                    showToast("Data anggaran berhasil diperbarui! Memuat ulang...", "success");
                    setTimeout(() => window.location.reload(), 1000);
                } else {
                    showToast("Gagal menyimpan data.", "error");
                }
            } catch(err) {
                showToast("Terjadi kesalahan jaringan.", "error");
            }
        }

        async function deleteAdminData(id) {
            if(!confirm("Yakin ingin menghapus item ini?")) return;
            
            try {
                const response = await fetch('/admin/anggaran/' + id, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'X-Anggaran-Password': sessionStorage.getItem('disdikbud_pass') || ''
                    }
                });
                
                if (response.ok) {
                    showToast("Item anggaran telah dihapus. Memuat ulang...", "success");
                    setTimeout(() => window.location.reload(), 1000);
                } else {
                    showToast("Gagal menghapus data.", "error");
                }
            } catch(err) {
                showToast("Terjadi kesalahan jaringan.", "error");
            }
        }

        // CANVAS MAP SIMULATION FOR REGION ABSORPTION
        function initRealisasiCanvas() {
            const canvas = document.getElementById('realisasi-canvas');
            if(!canvas) return;
            const ctx = canvas.getContext('2d');
            canvas.width = canvas.parentElement.clientWidth;
            canvas.height = canvas.parentElement.clientHeight || 320;

            function draw() {
                ctx.fillStyle = '#0f172a';
                ctx.fillRect(0, 0, canvas.width, canvas.height);

                // Animated islands simulation dots
                const time = Date.now() * 0.002;
                ctx.fillStyle = '#0284c7';
                
                for(let i = 0; i < 25; i++) {
                    const x = (Math.sin(i * 99 + time * 0.5) * 0.4 + 0.5) * canvas.width;
                    const y = (Math.cos(i * 33 + time * 0.5) * 0.4 + 0.5) * canvas.height;
                    const radius = 4 + Math.sin(time + i) * 2;

                    ctx.beginPath();
                    ctx.arc(x, y, radius, 0, Math.PI * 2);
                    ctx.fill();

                    ctx.strokeStyle = 'rgba(217, 119, 6, 0.2)';
                    ctx.lineWidth = 1;
                    ctx.beginPath();
                    ctx.arc(x, y, radius * 3, 0, Math.PI * 2);
                    ctx.stroke();
                }
                requestAnimationFrame(draw);
            }
            draw();
        }

        function renderRegencyBreakdown() {
            const container = document.getElementById('regency-breakdown-list');
            if(!container) return;

            const regencies = [
                'Kota Ambon', 'Kab. Maluku Tengah', 'Kab. Seram Bagian Barat', 
                'Kab. Seram Bagian Timur', 'Kab. Kepulauan Aru', 'Kab. Kepulauan Tanimbar',
                'Kab. Buru', 'Kab. Buru Selatan', 'Kab. Maluku Tenggara', 'Kota Tual', 'Kab. Maluku Barat Daya'
            ];

            container.innerHTML = regencies.map(reg => {
                const items = BUDGET_DATABASE.filter(a => a.region === reg);
                let regPagu = 0;
                let regRealisasi = 0;
                items.forEach(i => {
                    regPagu += Number(i.pagu);
                    regRealisasi += Number(i.realisasi);
                });

                const persen = regPagu > 0 ? ((regRealisasi / regPagu) * 100).toFixed(0) : (Math.floor(Math.random() * 30) + 60);

                return `
                    <div class="p-3 bg-slate-50 border border-slate-200 rounded-xl">
                        <div class="flex justify-between text-xs font-bold mb-1">
                            <span class="text-slate-800">${reg}</span>
                            <span class="text-gov-blue">${persen}%</span>
                        </div>
                        <div class="w-full bg-slate-200 rounded-full h-2">
                            <div class="bg-gov-blue h-2 rounded-full" style="width: ${persen}%"></div>
                        </div>
                    </div>
                `;
            }).join('');
        }

        // AI CHATBOT INTEGRATION
        function toggleAIChat() {
            document.getElementById('ai-chat-drawer').classList.toggle('translate-x-full');
        }

        function sendSuggestedAIQuery(text) {
            document.getElementById('ai-input').value = text;
            sendAIMessage(new Event('submit'));
        }

        async function fetchGeminiWithBackoff(query, systemPrompt) {
            const payload = {
                contents: [{ parts: [{ text: query }] }],
                systemInstruction: { parts: [{ text: systemPrompt }] },
                tools: [{ "google_search": {} }]
            };
            const url = `https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-preview-09-2025:generateContent?key=${apiKey}`;
            
            let attempt = 0;
            while (attempt < 3) {
                try {
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(payload)
                    });
                    if (response.ok) {
                        const data = await response.json();
                        return { text: data.candidates?.[0]?.content?.parts?.[0]?.text };
                    }
                } catch (e) {}
                attempt++;
                await new Promise(r => setTimeout(r, Math.pow(2, attempt) * 500));
            }
            throw new Error("Gagal terhubung.");
        }

        async function sendAIMessage(e) {
            if(e) e.preventDefault();
            const input = document.getElementById('ai-input');
            const container = document.getElementById('ai-messages');
            const submitBtn = document.getElementById('ai-submit-btn');
            const query = input.value.trim();
            if (!query) return;

            renderChatBubble(query, true);
            input.value = '';
            submitBtn.disabled = true;

            const systemPrompt = `Kamu adalah Si-Anggaran AI, asisten resmi Dinas Pendidikan dan Kebudayaan Provinsi Maluku. Tugasmu memberikan informasi akurat dan edukatif seputar pengelolaan APBD pendidikan, DAK Fisik Sekolah, Dana BOSDA, insentif guru 3T, serta alokasi pelestarian budaya daerah Maluku secara sopan, lugas, dan transparan.`;

            try {
                const res = await fetchGeminiWithBackoff(query, systemPrompt);
                renderChatBubble(res.text, false);
            } catch(err) {
                renderChatBubble("Mohon maaf, sistem AI sedang dalam pemeliharaan. Silakan coba kembali nanti.", false);
            } finally {
                submitBtn.disabled = false;
            }
        }

        function renderChatBubble(content, isUser = false) {
            const container = document.getElementById('ai-messages');
            const bubble = document.createElement('div');
            bubble.className = `flex items-start gap-2 mb-3 ${isUser ? 'justify-end' : ''}`;

            if(isUser) {
                bubble.innerHTML = `<div class="bg-gov-blue text-white text-xs p-3 rounded-xl max-w-[85%] font-medium">${escapeHTML(content)}</div>`;
            } else {
                bubble.innerHTML = `
                    <div class="w-6 h-6 rounded-full bg-gov-blue text-white flex items-center justify-center text-[9px] font-bold shrink-0">AI</div>
                    <div class="bg-white border border-slate-200 rounded-xl p-3 text-slate-700 max-w-[85%] leading-relaxed shadow-sm">${content.replace(/\n/g, '<br>')}</div>
                `;
            }
            container.appendChild(bubble);
            container.scrollTop = container.scrollHeight;
        }

        function escapeHTML(str) {
            return str.replace(/[&<>'"]/g, tag => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#39;', '"': '&quot;' }[tag] || tag));
        }
    </script>
</body>
</html>











