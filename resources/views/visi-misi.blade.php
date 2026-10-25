<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi dan Misi - Dinas Pendidikan dan Kebudayaan Provinsi Maluku</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Merriweather:ital,wght@0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Merriweather', 'serif'],
                    },
                    colors: {
                        primary: '#1e3a8a', // Deep Blue
                        secondary: '#d97706', // Amber/Gold for "Indonesia Emas"
                        accent: '#f59e0b',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #f8fafc;
        }
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .mission-card:hover .icon-container {
            background-color: #1e3a8a;
            color: #ffffff;
        }
    </style>
</head>
<body class="font-sans text-gray-800 antialiased selection:bg-secondary selection:text-white">

    <!-- Navbar -->
    <nav class="fixed w-full z-50 transition-all duration-300 bg-white shadow-md bg-opacity-95 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="{{ url('/') }}" class="flex-shrink-0 flex items-center gap-3 hover:opacity-90 transition-opacity">
                    <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center text-xl shadow-lg">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <div>
                        <h1 class="font-bold text-primary text-sm sm:text-base leading-tight uppercase tracking-wide">
                            Dinas Pendidikan <br><span class="text-secondary">& Kebudayaan</span>
                        </h1>
                        <p class="text-xs text-gray-500 font-medium tracking-widest">Provinsi Maluku</p>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-6">
                    <a href="{{ url('/') }}" class="text-gray-600 hover:text-primary px-3 py-2 text-sm font-semibold transition flex items-center gap-1.5"><i class="fa-solid fa-arrow-left text-xs"></i> Beranda</a>
                    <a href="#visi-misi" class="text-primary border-b-2 border-primary px-3 py-2 text-sm font-semibold transition">Visi &amp; Misi</a>
                    <a href="#rumusan-singkat" class="text-gray-600 hover:text-primary px-3 py-2 text-sm font-semibold transition">Ringkasan</a>
                    <div class="h-5 w-[1px] bg-slate-200"></div>
                    <a href="{{ url('/standar-pelayanan') }}" class="bg-blue-50 text-primary hover:bg-primary hover:text-white border border-blue-200 px-4 py-2 rounded-lg text-sm font-semibold transition-all">Standar Pelayanan</a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="lg:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-slate-700 hover:text-primary p-2 focus:outline-none rounded-lg" aria-label="Menu">
                        <i id="mobile-menu-icon" class="fa-solid fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Drawer -->
        <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-slate-200 shadow-xl">
            <div class="px-4 pt-3 pb-5 space-y-2">
                <a href="{{ url('/') }}" class="flex items-center gap-2 px-3.5 py-2.5 rounded-lg text-base font-bold text-primary bg-blue-50 border border-blue-100">
                    <i class="fa-solid fa-arrow-left text-sm"></i>
                    <span>Kembali ke Beranda</span>
                </a>
                <a href="#visi-misi" class="block px-3.5 py-2 rounded-lg text-base font-medium text-slate-700 hover:text-primary hover:bg-slate-50 transition-colors">
                    Visi &amp; Misi
                </a>
                <a href="#rumusan-singkat" class="block px-3.5 py-2 rounded-lg text-base font-medium text-slate-700 hover:text-primary hover:bg-slate-50 transition-colors">
                    Ringkasan Rumusan
                </a>
                <div class="pt-2 border-t border-slate-100">
                    <a href="{{ url('/standar-pelayanan') }}" class="block text-center px-4 py-2.5 rounded-lg text-sm font-semibold text-white bg-primary hover:bg-blue-800 transition-colors shadow-sm">
                        Standar Pelayanan
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="relative pt-32 pb-20 lg:pt-40 lg:pb-28 bg-primary overflow-hidden bg-pattern">
        <div class="absolute inset-0 bg-gradient-to-b from-primary/90 to-primary/40 z-0"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center text-white">
            <span class="inline-block py-1 px-3 rounded-full bg-secondary/20 text-secondary border border-secondary/50 text-sm font-semibold tracking-wider mb-4">
                {{ $profil->banner_badge ?? 'ARAH KEBIJAKAN' }}
            </span>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 font-serif drop-shadow-lg">
                {{ $profil->banner_title ?? 'Visi dan Misi' }}
            </h2>
            <p class="text-lg md:text-xl text-blue-100 max-w-3xl mx-auto font-light leading-relaxed">
                {{ $profil->banner_description ?? 'Menjadi kompas panduan dalam memajukan sektor pendidikan dan pelestarian kebudayaan di Provinsi Maluku menuju Indonesia Emas 2045.' }}
            </p>
        </div>
        
        <!-- Decorative bottom wave -->
        <div class="absolute bottom-0 w-full overflow-hidden leading-none z-10">
            <svg class="relative block w-full h-[50px] md:h-[100px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C59.71,118.08,130.83,119.26,200.7,112.5,241.6,108.62,282.84,87.69,321.39,56.44Z" fill="#f8fafc"></path>
            </svg>
        </div>
    </header>

    <!-- Main Content -->
    <main id="visi-misi" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        
        <!-- VISI Section -->
        <section class="mb-20">
            <div class="text-center mb-10">
                <h3 class="text-3xl font-bold text-gray-900 mb-4 tracking-tight">VISI</h3>
                <div class="w-24 h-1 bg-secondary mx-auto rounded-full"></div>
            </div>
            
            <div class="relative bg-white rounded-3xl shadow-xl p-10 lg:p-16 text-center border-t-4 border-secondary overflow-hidden">
                <i class="fa-solid fa-quote-left absolute top-8 left-8 text-4xl text-gray-100"></i>
                <i class="fa-solid fa-quote-right absolute bottom-8 right-8 text-4xl text-gray-100"></i>
                
                <p class="relative z-10 text-2xl md:text-3xl lg:text-4xl font-serif text-primary leading-snug md:leading-tight">
                    {!! nl2br(e($profil->visi_text ?? "“Terwujudnya Pendidikan dan Kebudayaan Maluku yang Berkualitas, Merata, Inklusif, Berkarakter, Berbudaya, dan Berdaya Saing untuk Mewujudkan Maluku yang Maju, Adil dan Sejahtera Menuju Indonesia Emas 2045.”")) !!}
                </p>
            </div>
            @if(!empty($profil->file_path))
            <div class="mt-8 flex justify-center">
                <a href="{{ asset($profil->file_path) }}" target="_blank" download class="inline-flex items-center gap-2.5 px-6 py-3 rounded-xl bg-primary text-white hover:bg-blue-900 shadow-md hover:shadow-lg transition-all text-sm font-semibold transform hover:-translate-y-0.5">
                    <i class="fa-solid fa-file-pdf text-secondary text-base"></i>
                    <span>Unduh Dokumen Resmi SK ({{ $profil->file_size ?? "Dokumen PDF" }})</span>
                </a>
            </div>
            @endif
        </section>

        <!-- MISI Section -->
        <section class="mb-24">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold text-gray-900 mb-4 tracking-tight">MISI</h3>
                <div class="w-24 h-1 bg-primary mx-auto rounded-full mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">{{ $profil->misi_description ?? "Untuk mewujudkan visi tersebut, Dinas Pendidikan dan Kebudayaan Provinsi Maluku menetapkan misi sebagai berikut:" }}</p>
            </div>

            <!-- Misi Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if(!empty($profil->misi_items) && is_array($profil->misi_items))
                    @foreach($profil->misi_items as $item)
                    <div class="mission-card bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 flex flex-col group">
                        <div class="icon-container w-14 h-14 bg-blue-50 text-primary rounded-2xl flex items-center justify-center text-2xl mb-6 transition-colors duration-300">
                            <i class="{{ $item['icon'] ?? 'fa-solid fa-graduation-cap' }}"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-primary transition-colors">{{ $item['title'] ?? '' }}</h4>
                        <p class="text-gray-600 text-sm leading-relaxed flex-grow">
                            @if(!empty($item['short_desc']))
                            <strong>{{ $item['short_desc'] }}</strong><br><br>
                            @endif
                            {{ $item['full_desc'] ?? '' }}
                        </p>
                    </div>
                    @endforeach
                @endif
            </div>
        </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 py-10 border-t-4 border-secondary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-slate-800 text-white rounded-full flex items-center justify-center text-xl">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <div>
                    <h5 class="font-bold text-white tracking-wide">Dinas Pendidikan & Kebudayaan</h5>
                    <p class="text-xs text-slate-400">Provinsi Maluku</p>
                </div>
            </div>
            
            <div class="text-sm text-center md:text-right">
                <p>&copy; 2026 Dinas Pendidikan dan Kebudayaan Provinsi Maluku.</p>
                <p class="mt-1">Hak Cipta Dilindungi Undang-Undang.</p>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            const icon = document.getElementById('mobile-menu-icon');

            if (btn && menu) {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    menu.classList.toggle('hidden');
                    if (icon) {
                        if (menu.classList.contains('hidden')) {
                            icon.className = 'fa-solid fa-bars text-2xl';
                        } else {
                            icon.className = 'fa-solid fa-xmark text-2xl';
                        }
                    }
                });

                const links = menu.querySelectorAll('a');
                links.forEach(l => {
                    l.addEventListener('click', () => {
                        menu.classList.add('hidden');
                        if (icon) icon.className = 'fa-solid fa-bars text-2xl';
                    });
                });
            }
        });
    </script>
</body>
</html>