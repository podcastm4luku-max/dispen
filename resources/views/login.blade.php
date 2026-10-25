<!DOCTYPE html>
<html lang="id-ID">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator - Dikbud Maluku</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        dikbud: {
                            dark: '#0f172a', primary: '#1e3a8a', secondary: '#2563eb', accent: '#f59e0b'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center p-4">

    <!-- Back to Home -->
    <a href="/" class="absolute top-6 left-6 flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-dikbud-primary transition-colors">
        <span class="material-icons text-[18px]">arrow_back</span> Kembali ke Beranda
    </a>

    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row">
        <!-- Left Side: Branding -->
        <div class="w-full md:w-1/2 bg-dikbud-dark p-10 flex flex-col justify-center relative overflow-hidden text-white">
            <div class="absolute inset-0 bg-dikbud-primary/80 mix-blend-multiply z-10"></div>
            <!-- Pattern -->
            <div class="absolute inset-0 z-10 opacity-20" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
            
            <div class="relative z-20">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-inner mb-6 overflow-hidden">
                    <img src="{{ asset('images/logo-dikbud.png') }}?v={{ filemtime(public_path('images/logo-dikbud.png')) }}" alt="Logo Dinas Pendidikan dan Kebudayaan Provinsi Maluku" class="w-full h-full object-contain p-1.5">
                </div>
                <h2 class="text-3xl font-black mb-2">CMS Administrator</h2>
                <p class="text-slate-300 text-sm leading-relaxed mb-8">Sistem Informasi Manajemen Website Dinas Pendidikan dan Kebudayaan Provinsi Maluku.</p>
                <div class="p-4 bg-white/10 rounded-lg border border-white/20 backdrop-blur-sm">
                    <p class="text-xs text-slate-200">
                        <span class="material-icons text-[14px] align-middle mr-1 text-dikbud-accent">warning</span> 
                        Halaman ini terbatas hanya untuk pengelola sistem (Admin/Operator).
                    </p>
                </div>
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="w-full md:w-1/2 p-10 lg:p-12 flex flex-col justify-center">
            <div class="mb-8">
                <h3 class="text-2xl font-bold text-slate-800">Selamat Datang</h3>
                <p class="text-sm text-slate-500 mt-1">Silakan masuk ke akun Anda.</p>
            </div>

            <form action="/login" method="POST" class="space-y-5">
                @csrf
                @error('email')
                    <div class="p-3 bg-red-50 text-red-600 rounded-lg text-sm mb-4 border border-red-200">
                        {{ $message }}
                    </div>
                @enderror
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Username / Email</label>
                    <div class="relative">
                        <span class="material-icons absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400">person_outline</span>
                        <input type="email" name="email" value="{{ old('email', 'admin@malukuprov.go.id') }}" placeholder="admin@malukuprov.go.id" class="w-full pl-10 pr-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-dikbud-secondary focus:border-dikbud-secondary outline-none text-sm transition-all" required>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Password</label>
                    <div class="relative">
                        <span class="material-icons absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400">lock_outline</span>
                        <input id="passwordInput" type="password" name="password" autocomplete="new-password" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;" class="w-full pl-10 pr-10 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-dikbud-secondary focus:border-dikbud-secondary outline-none text-sm transition-all" required>
                        <button type="button" id="togglePassword" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-400 hover:text-slate-600 focus:outline-none">
                            <span id="toggleIcon" class="material-icons text-[18px]">visibility_off</span>
                        </button>
                    </div>
                </div>
                
                <div class="flex items-center justify-between mt-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 text-dikbud-primary border-slate-300 rounded focus:ring-dikbud-primary">
                        <span class="text-xs font-medium text-slate-600">Ingat Saya</span>
                    </label>
                    <a href="#" class="text-xs font-bold text-dikbud-secondary hover:underline">Lupa Password?</a>
                </div>

                <button type="submit" class="w-full mt-6 py-2.5 bg-dikbud-primary text-white text-sm font-bold rounded-lg hover:bg-dikbud-secondary transition-colors shadow-lg shadow-blue-900/20 flex justify-center items-center gap-2">
                    Masuk Dashboard <span class="material-icons text-[18px]">login</span>
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-slate-100 text-center">
                <p class="text-xs text-slate-400">&copy; 2026 Dikbud Maluku. Dilindungi Hak Cipta.</p>
            </div>
        </div>
    </div>
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('passwordInput');
        const toggleIcon = document.getElementById('toggleIcon');

        // Pastikan kolom password selalu kosong dan tidak terisi otomatis saat dimuat
        if (passwordInput) {
            passwordInput.value = '';
        }
        window.addEventListener('DOMContentLoaded', function () {
            if (passwordInput) {
                passwordInput.value = '';
            }
        });

        togglePassword.addEventListener('click', function () {
            // Toggle the type attribute
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle the icon
            toggleIcon.textContent = type === 'password' ? 'visibility_off' : 'visibility';
        });
    </script>
</body>
</html>
