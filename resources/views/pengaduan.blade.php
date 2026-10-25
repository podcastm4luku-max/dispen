<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Pengaduan &amp; SP4N-LAPOR! - Dinas Pendidikan &amp; Kebudayaan Provinsi Maluku</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Tailwind Config -->
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
                        },
                        lapor: {
                            red: '#e11d48',
                            darkred: '#be123c',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px -5px rgba(0, 0, 0, 0.08);
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
                <a href="{{ url('/') }}" class="hover:text-amber-400 transition-colors font-medium">Kembali ke Beranda Utama</a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <nav class="sticky top-0 w-full z-50 bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo & Brand Link -->
                <a href="{{ url('/') }}" class="flex-shrink-0 flex items-center gap-3.5 group">
                    <div class="w-11 h-11 bg-gradient-to-tr from-red-600 via-rose-600 to-amber-500 text-white rounded-xl flex items-center justify-center text-xl shadow-md group-hover:scale-105 transition-transform">
                        <i class="fa-solid fa-bullhorn"></i>
                    </div>
                    <div>
                        <h1 class="font-bold text-base sm:text-lg leading-tight text-slate-900 group-hover:text-red-600 transition-colors">
                            Layanan Pengaduan
                        </h1>
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Disdikbud Provinsi Maluku</p>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-2">
                    <a href="{{ url('/') }}" class="text-slate-700 hover:text-brand-700 hover:bg-slate-100/70 px-3.5 py-2 rounded-lg text-sm font-bold transition-all flex items-center gap-2">
                        <i class="fa-solid fa-arrow-left text-xs text-brand-600"></i>
                        <span>Kembali ke Beranda</span>
                    </a>
                    <a href="#sp4n-lapor" class="text-slate-700 hover:text-red-600 hover:bg-slate-100/70 px-3.5 py-2 rounded-lg text-sm font-semibold transition-all">
                        SP4N-LAPOR!
                    </a>
                    <a href="#form-internal" class="text-slate-700 hover:text-brand-700 hover:bg-slate-100/70 px-3.5 py-2 rounded-lg text-sm font-semibold transition-all">
                        Formulir Pengaduan
                    </a>
                    <a href="#alur" class="text-slate-700 hover:text-brand-700 hover:bg-slate-100/70 px-3.5 py-2 rounded-lg text-sm font-semibold transition-all">
                        Alur &amp; Prosedur
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

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-slate-200 shadow-xl">
            <div class="px-4 pt-3 pb-5 space-y-2">
                <a href="{{ url('/') }}" class="flex items-center gap-2 px-3.5 py-2.5 rounded-lg text-base font-bold text-brand-700 bg-brand-50 border border-brand-100">
                    <i class="fa-solid fa-arrow-left text-sm"></i>
                    <span>Kembali ke Beranda Utama</span>
                </a>
                <a href="#sp4n-lapor" class="block px-3.5 py-2 rounded-lg text-base font-medium text-slate-700 hover:text-red-600 hover:bg-slate-50 transition-colors">
                    Kanal Nasional SP4N-LAPOR!
                </a>
                <a href="#form-internal" class="block px-3.5 py-2 rounded-lg text-base font-medium text-slate-700 hover:text-brand-600 hover:bg-slate-50 transition-colors">
                    Formulir Pengaduan Internal
                </a>
                <a href="#alur" class="block px-3.5 py-2 rounded-lg text-base font-medium text-slate-700 hover:text-brand-600 hover:bg-slate-50 transition-colors">
                    Alur &amp; Waktu Penanganan
                </a>
                <div class="pt-2 border-t border-slate-100">
                    <a href="{{ url('/standar-pelayanan') }}" class="block text-center px-4 py-2.5 rounded-lg text-sm font-semibold text-white bg-brand-600 hover:bg-brand-700 transition-colors shadow-sm">
                        Lihat Standar Pelayanan
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Header -->
    <header class="relative bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 text-white py-16 lg:py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-red-500/20 text-red-300 border border-red-500/40 text-xs sm:text-sm font-semibold tracking-wider mb-6">
                <i class="fa-solid fa-shield-halved"></i>
                <span>LAYANAN ASPIRASI DAN PENGADUAN ONLINE RAKYAT</span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight mb-4 leading-tight">
                Layanan Pengaduan &amp; Aspirasi Publik
            </h1>
            <p class="text-slate-300 max-w-3xl mx-auto text-base sm:text-lg font-light leading-relaxed mb-8">
                Sampaikan laporan, kritik, masukan, dan pengaduan terkait pelayanan publik bidang pendidikan dan kebudayaan di Provinsi Maluku secara mudah, transparan, dan terintegrasi.
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <a href="#sp4n-lapor" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white text-sm sm:text-base font-bold rounded-xl shadow-lg hover:shadow-red-600/30 transition-all flex items-center gap-2">
                    <i class="fa-solid fa-external-link-alt"></i>
                    <span>Kanal Nasional SP4N-LAPOR!</span>
                </a>
                <a href="#form-internal" class="px-6 py-3 bg-white/10 hover:bg-white/20 text-white border border-white/20 text-sm sm:text-base font-bold rounded-xl backdrop-blur-md transition-all flex items-center gap-2">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span>Formulir Pengaduan Cepat</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        @if(session('success'))
        <div class="mb-8 p-4 bg-emerald-50 border border-emerald-300 text-emerald-800 rounded-xl flex items-center gap-3 shadow-sm">
            <i class="fa-solid fa-circle-check text-emerald-600 text-xl"></i>
            <div>
                <p class="font-bold">Laporan Berhasil Terkirim!</p>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
        </div>
        @endif
    

        <!-- 2 Pilihan Kanal Pengaduan -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-16">
            
            <!-- Card 1: SP4N-LAPOR! Kanal Nasional -->
            <div id="sp4n-lapor" class="lg:col-span-6 bg-white rounded-3xl p-8 border-2 border-red-100 shadow-xl relative overflow-hidden flex flex-col justify-between">
                <div class="absolute top-0 right-0 bg-red-600 text-white text-[11px] font-bold px-4 py-1.5 rounded-bl-2xl uppercase tracking-wider">
                    Kanal Resmi Nasional
                </div>

                <div>
                    <div class="w-14 h-14 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center text-2xl mb-6 shadow-sm">
                        <i class="fa-solid fa-tower-broadcast"></i>
                    </div>

                    <h2 class="text-2xl font-bold text-slate-900 mb-3">
                        SP4N-LAPOR! Republik Indonesia
                    </h2>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6">
                        Sistem Pengelolaan Pengaduan Pelayanan Publik Nasional terintegrasi dengan Kementerian PAN-RB, Kantor Staf Presiden (KSP), dan Ombudsman RI.
                    </p>

                    <div class="space-y-3.5 mb-8">
                        <div class="flex items-start gap-3 text-sm text-slate-700">
                            <i class="fa-solid fa-check-circle text-red-500 mt-1"></i>
                            <span><strong>3 Klasifikasi Laporan:</strong> Pengaduan Layanan, Aspirasi Pembangunan, dan Permintaan Informasi.</span>
                        </div>
                        <div class="flex items-start gap-3 text-sm text-slate-700">
                            <i class="fa-solid fa-check-circle text-red-500 mt-1"></i>
                            <span><strong>Fitur Anonim &amp; Rahasia:</strong> Identitas pelapor dijamin aman dan terlindungi undang-undang.</span>
                        </div>
                        <div class="flex items-start gap-3 text-sm text-slate-700">
                            <i class="fa-solid fa-check-circle text-red-500 mt-1"></i>
                            <span><strong>Tracking Nomor Laporan:</strong> Pantau progres tindak lanjut pengaduan Anda secara real-time.</span>
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-slate-100 flex flex-col sm:flex-row gap-3">
                    <a href="https://prod.lapor.go.id/" target="_blank" rel="noopener noreferrer" class="flex-1 text-center px-6 py-3.5 bg-red-600 hover:bg-red-700 text-white font-bold rounded-xl shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2">
                        <span>Buka SP4N-LAPOR!</span>
                        <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                    </a>
                    <a href="https://www.lapor.go.id" target="_blank" rel="noopener noreferrer" class="px-5 py-3.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-center text-sm transition-colors">
                        Info Portal
                    </a>
                </div>
            </div>

            <!-- Card 2: Formulir Pengaduan Internal Disdikbud Maluku -->
            <div id="form-internal" class="lg:col-span-6 bg-white rounded-3xl p-8 border border-slate-200 shadow-xl flex flex-col justify-between">
                <div>
                    <div class="w-14 h-14 bg-brand-50 text-brand-600 rounded-2xl flex items-center justify-center text-2xl mb-6 shadow-sm">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </div>

                    <h2 class="text-2xl font-bold text-slate-900 mb-2">
                        Formulir Pengaduan Internal
                    </h2>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6">
                        Kirimkan pengaduan langsung ke tim penanganan pengaduan Dinas Pendidikan dan Kebudayaan Provinsi Maluku.
                    </p>

                    <form action="{{ route('pengaduan.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nama Pelapor / Pengadu *</label>
                            <input type="text" name="sender_name" required placeholder="Masukkan nama lengkap" class="w-full px-4 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:border-brand-600 focus:ring-2 focus:ring-brand-100 outline-none transition-all">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Judul Laporan / Subjek Pengaduan *</label>
                            <input type="text" name="title" required placeholder="Contoh: Pengaduan Fasilitas SMA / Layanan Ijazah" class="w-full px-4 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:border-brand-600 focus:ring-2 focus:ring-brand-100 outline-none transition-all">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Uraian / Kronologi Pengaduan *</label>
                            <textarea name="description" rows="4" required placeholder="Tuliskan detail kronologi, lokasi kejadian, satuan pendidikan terkait, dan permasalahan yang dihadapi..." class="w-full px-4 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:border-brand-600 focus:ring-2 focus:ring-brand-100 outline-none transition-all resize-none"></textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="w-full py-3.5 bg-brand-700 hover:bg-brand-800 text-white font-bold rounded-xl shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2">
                                <i class="fa-solid fa-paper-plane text-sm"></i>
                                <span>Kirim Pengaduan Sekarang</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <!-- Alur Penanganan Pengaduan -->
        <section id="alur" class="mb-16 bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="text-brand-600 font-bold uppercase tracking-widest text-xs">Standard Operating Procedure</span>
                <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-2 mb-4">Alur &amp; Waktu Penanganan Pengaduan</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Setiap pengaduan yang masuk ditangani secara profesional dan berjenjang sesuai tata kelola pelayanan publik.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Step 1 -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200 text-center card-hover">
                    <div class="w-12 h-12 bg-brand-100 text-brand-700 rounded-full flex items-center justify-center text-lg font-black mx-auto mb-4">
                        1
                    </div>
                    <h4 class="font-bold text-slate-900 mb-2">Penyampaian</h4>
                    <p class="text-xs text-slate-600 leading-relaxed">Masyarakat menyampaikan laporan melalui SP4N-LAPOR!, formulir elektronik, atau meja pengaduan langsung.</p>
                </div>

                <!-- Step 2 -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200 text-center card-hover">
                    <div class="w-12 h-12 bg-brand-100 text-brand-700 rounded-full flex items-center justify-center text-lg font-black mx-auto mb-4">
                        2
                    </div>
                    <h4 class="font-bold text-slate-900 mb-2">Verifikasi Data</h4>
                    <p class="text-xs text-slate-600 leading-relaxed">Admin pengaduan memverifikasi kelengkapan identitas dan substansi laporan dalam waktu <strong>1 - 3 hari kerja</strong>.</p>
                </div>

                <!-- Step 3 -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200 text-center card-hover">
                    <div class="w-12 h-12 bg-brand-100 text-brand-700 rounded-full flex items-center justify-center text-lg font-black mx-auto mb-4">
                        3
                    </div>
                    <h4 class="font-bold text-slate-900 mb-2">Tindak Lanjut</h4>
                    <p class="text-xs text-slate-600 leading-relaxed">Bidang teknis terkait (SMA, SMK, PK, GTK, Kebudayaan, Umum) melakukan klarifikasi &amp; investigasi lapangan.</p>
                </div>

                <!-- Step 4 -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200 text-center card-hover">
                    <div class="w-12 h-12 bg-emerald-100 text-emerald-700 rounded-full flex items-center justify-center text-lg font-black mx-auto mb-4">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <h4 class="font-bold text-slate-900 mb-2">Penyelesaian</h4>
                    <p class="text-xs text-slate-600 leading-relaxed">Jawaban dan rekomendasi penyelesaian disampaikan kembali kepada pelapor secara transparan.</p>
                </div>
            </div>
        </section>

        <!-- Saluran Kontak Alternatif -->
        <section class="bg-gradient-to-r from-brand-900 to-slate-900 rounded-3xl p-8 sm:p-12 text-white shadow-xl">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                <div class="md:col-span-8">
                    <h3 class="text-2xl font-bold mb-3">Butuh Konsultasi / Pengaduan Langsung?</h3>
                    <p class="text-blue-100 text-sm leading-relaxed mb-6">
                        Anda dapat berkunjung langsung ke Meja Layanan Pengaduan Tatap Muka di Kantor Dinas Pendidikan dan Kebudayaan Provinsi Maluku pada jam operasional kerja.
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center text-amber-400">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-white">Alamat Kantor</p>
                                <p class="text-xs text-slate-300">Jl. Pendidikan No. 1, Kota Ambon</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center text-emerald-400">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-white">Jam Operasional</p>
                                <p class="text-xs text-slate-300">Senin - Jumat, 08:00 - 16:00 WIT</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-4 text-center md:text-right">
                    <a href="{{ url('/') }}" class="inline-flex items-center gap-2 px-6 py-3.5 bg-white text-brand-900 font-bold rounded-xl shadow-lg hover:bg-amber-400 hover:text-slate-900 transition-all">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>Kembali ke Beranda</span>
                    </a>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 py-10 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-slate-800 text-white rounded-xl flex items-center justify-center text-xl">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <div>
                    <h5 class="font-bold text-white tracking-wide">Dinas Pendidikan &amp; Kebudayaan</h5>
                    <p class="text-xs text-slate-400">Provinsi Maluku</p>
                </div>
            </div>
            
            <div class="text-sm text-center md:text-right">
                <p>&copy; 2026 Dinas Pendidikan dan Kebudayaan Provinsi Maluku.</p>
                <p class="mt-1 text-xs text-slate-500">Kanal Layanan Pengaduan Masyarakat Terpadu.</p>
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