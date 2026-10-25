<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Aplikasi Survei Kepuasan Masyarakat (SKM)</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Chart.js CDN -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: {
              50: '#eef6ff',
              100: '#e0edff',
              500: '#1d63ed',
              700: '#004080',
              800: '#003366',
              900: '#00264d',
            }
          }
        }
      }
    }
  </script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    body { font-family: 'Inter', sans-serif; }
    
    .radio-card input:checked + div {
      border-color: #004080;
      background-color: #eef6ff;
      box-shadow: 0 4px 6px -1px rgba(0, 64, 128, 0.1), 0 2px 4px -1px rgba(0, 64, 128, 0.06);
    }
    
    .radio-card input:checked + div .radio-indicator {
      border-color: #004080;
      background-color: #004080;
    }

    @media print {
      .no-print { display: none !important; }
      .print-only { display: block !important; }
      body { background: white; }
      .print-shadow-none { box-shadow: none !important; border: 1px solid #ccc; }
    }
  </style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col justify-between">

  <!-- HEADER NAVIGATION -->
  <header class="bg-brand-700 text-white shadow-lg sticky top-0 z-50 no-print">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">
        <div class="flex items-center space-x-3">
          <div class="p-2.5 bg-white/10 rounded-xl backdrop-blur-md">
            <i data-lucide="clipboard-check" class="w-8 h-8 text-blue-200"></i>
          </div>
          <div>
            <h1 class="text-xl font-bold tracking-tight leading-none sm:text-2xl">Survei Kepuasan Masyarakat</h1>
            <p class="text-xs text-blue-200 mt-1 font-medium tracking-wide">Layanan Dalam Satu Genggaman</p>
          </div>
        </div>

        <nav class="flex space-x-2 bg-brand-800/60 p-1.5 rounded-xl border border-white/10">
          <a href="/" class="px-4 py-2 text-sm font-semibold rounded-lg transition-all duration-200 flex items-center space-x-2 text-white bg-slate-900/40 hover:bg-slate-900/60">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            <span class="hidden md:inline">Kembali</span>
          </a>
          <button id="nav-form-btn" onclick="switchTab('form')" class="px-4 py-2 text-sm font-semibold rounded-lg transition-all duration-200 flex items-center space-x-2 bg-white text-brand-700 shadow-sm">
            <i data-lucide="edit-3" class="w-4 h-4"></i>
            <span>Formulir SKM</span>
          </button>
          <button id="nav-dash-btn" onclick="switchTab('dashboard')" class="px-4 py-2 text-sm font-semibold rounded-lg transition-all duration-200 flex items-center space-x-2 text-blue-100 hover:text-white hover:bg-white/10">
            <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
            <span>Dashboard & Laporan</span>
          </button>
          <button id="nav-admin-btn" onclick="switchTab('admin')" class="px-4 py-2 text-sm font-semibold rounded-lg transition-all duration-200 flex items-center space-x-2 text-blue-100 hover:text-white hover:bg-white/10">
            <i data-lucide="database" class="w-4 h-4"></i>
            <span>Database Admin</span>
          </button>
        </nav>
      </div>
    </div>
  </header>

  <!-- MAIN CONTENT CONTAINER -->
  <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-grow w-full">

    <!-- VIEW 1: FORMULIR SURVEI -->
    <section id="view-form" class="space-y-8 transition-opacity duration-300">
      
      <!-- Banner Informasi -->
      <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
        <div class="space-y-1">
          <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-brand-700 border border-blue-100">
            <i data-lucide="info" class="w-3.5 h-3.5 mr-1.5"></i> Standar PermenPAN-RB No. 14 Tahun 2017
          </span>
          <h2 class="text-xl font-bold text-slate-900">Bantu Kami Meningkatkan Kualitas Pelayanan</h2>
          <p class="text-sm text-slate-600">Pendapat Anda sangat berharga untuk perbaikan mutu pelayanan publik yang berkelanjutan.</p>
        </div>
        <div class="w-full md:w-auto flex items-center gap-2 bg-slate-50 p-3 rounded-xl border border-slate-200 text-xs text-slate-500">
          <i data-lucide="lock" class="w-4 h-4 text-emerald-600 shrink-0"></i>
          <span>Respon dijamin kerahasiaannya</span>
        </div>
      </div>

      <form id="skm-form" onsubmit="handleFormSubmit(event)" class="space-y-8">
        
        <!-- SECTION 1: IDENTITAS RESPONDEN -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
          <div class="bg-slate-50/80 px-6 py-4 border-b border-slate-200 flex items-center space-x-3">
            <div class="w-8 h-8 rounded-lg bg-brand-100 text-brand-700 flex items-center justify-center font-bold text-sm">
              1
            </div>
            <div>
              <h3 class="text-base font-bold text-slate-900">Identitas & Profil Responden</h3>
              <p class="text-xs text-slate-500">Silakan lengkapi data demografi Anda</p>
            </div>
          </div>

          <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nama Lengkap -->
            <div>
              <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
              <input type="text" name="nama" required placeholder="Masukkan nama lengkap..." class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-brand-500 focus:border-brand-500">
            </div>

            <!-- Alamat / Domisili -->
            <div>
              <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Alamat / Domisili <span class="text-red-500">*</span></label>
              <input type="text" name="alamat" required placeholder="Masukkan alamat / domisili..." class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-brand-500 focus:border-brand-500">
            </div>

            <!-- Pendidikan -->
            <div>
              <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Tingkat Pendidikan <span class="text-red-500">*</span></label>
              <select name="pendidikan" required class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-brand-500 focus:border-brand-500 bg-white">
                <option value="">-- Pilih Pendidikan --</option>
                <option value="SD">SD / Sederajat</option>
                <option value="SMP">SMP / Sederajat</option>
                <option value="SMA">SMA / SMK / Sederajat</option>
                <option value="S1">Diploma / S1</option>
                <option value="S2">Magister (S2)</option>
                <option value="S3">Doktor (S3)</option>
              </select>
            </div>

            <!-- Pekerjaan -->
            <div>
              <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Pekerjaan Utama <span class="text-red-500">*</span></label>
              <select name="pekerjaan" id="pekerjaan-select" onchange="togglePekerjaanLainnya()" required class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-brand-500 focus:border-brand-500 bg-white">
                <option value="">-- Pilih Pekerjaan --</option>
                <option value="PNS">PNS / ASN</option>
                <option value="TNI">TNI</option>
                <option value="POLRI">POLRI</option>
                <option value="Swasta">Pegawai Swasta</option>
                <option value="Wirausaha">Wirausaha / Wiraswasta</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>

            <!-- Field Tambahan jika Pekerjaan = Lainnya -->
            <div id="pekerjaan-lainnya-wrapper" class="hidden md:col-span-2">
              <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Sebutkan Pekerjaan Lainnya</label>
              <input type="text" name="pekerjaan_lainnya" placeholder="Masukkan jenis pekerjaan..." class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-brand-500 focus:border-brand-500">
            </div>

            <!-- Jenis Kelamin -->
            <div>
              <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Jenis Kelamin <span class="text-red-500">*</span></label>
              <div class="flex space-x-4">
                <label class="flex-1 flex items-center justify-center space-x-2 border border-slate-300 rounded-xl p-2.5 cursor-pointer hover:bg-slate-50 transition-all">
                  <input type="radio" name="jenis_kelamin" value="Laki-laki" required class="text-brand-700 focus:ring-brand-500">
                  <span class="text-sm font-medium text-slate-700">Laki-laki</span>
                </label>
                <label class="flex-1 flex items-center justify-center space-x-2 border border-slate-300 rounded-xl p-2.5 cursor-pointer hover:bg-slate-50 transition-all">
                  <input type="radio" name="jenis_kelamin" value="Perempuan" required class="text-brand-700 focus:ring-brand-500">
                  <span class="text-sm font-medium text-slate-700">Perempuan</span>
                </label>
              </div>
            </div>

            <!-- Waktu Pelayanan -->
            <div>
              <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Waktu Layanan Diakses <span class="text-red-500">*</span></label>
              <div class="flex space-x-4">
                <label class="flex-1 flex items-center justify-center space-x-2 border border-slate-300 rounded-xl p-2.5 cursor-pointer hover:bg-slate-50 transition-all">
                  <input type="radio" name="waktu_pelayanan" value="08.00 – 12.00" required class="text-brand-700 focus:ring-brand-500">
                  <span class="text-sm font-medium text-slate-700">08.00 – 12.00 WIB</span>
                </label>
                <label class="flex-1 flex items-center justify-center space-x-2 border border-slate-300 rounded-xl p-2.5 cursor-pointer hover:bg-slate-50 transition-all">
                  <input type="radio" name="waktu_pelayanan" value="13.00 – 17.00" required class="text-brand-700 focus:ring-brand-500">
                  <span class="text-sm font-medium text-slate-700">13.00 – 17.00 WIB</span>
                </label>
              </div>
            </div>
          </div>
        </div>

        <!-- SECTION 2: 9 UNSUR PENILAIAN PELAYANAN -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
          <div class="bg-slate-50/80 px-6 py-4 border-b border-slate-200 flex items-center justify-between">
            <div class="flex items-center space-x-3">
              <div class="w-8 h-8 rounded-lg bg-brand-100 text-brand-700 flex items-center justify-center font-bold text-sm">
                2
              </div>
              <div>
                <h3 class="text-base font-bold text-slate-900">Pendapat Responden Terhadap Pelayanan</h3>
                <p class="text-xs text-slate-500">Pilih salah satu jawaban yang paling mencerminkan pengalaman Anda</p>
              </div>
            </div>
            <span class="text-xs text-slate-400 font-medium hidden sm:inline">9 Pertanyaan</span>
          </div>

          <div class="p-6 space-y-8 divide-y divide-slate-100">
            
            <!-- Pertanyaan 1 -->
            <div class="pt-6 first:pt-0">
              <p class="text-sm font-bold text-slate-900 mb-3 leading-relaxed">
                1. Bagaimana kesesuaian persyaratan pelayanan dengan jenis pelayanannya?
              </p>
              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <!-- Option A -->
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u1" value="1" required class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 1</span>
                      <span class="text-sm font-medium text-slate-800">Tidak sesuai</span>
                    </div>
                  </div>
                </label>
                <!-- Option B -->
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u1" value="2" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 2</span>
                      <span class="text-sm font-medium text-slate-800">Kurang sesuai</span>
                    </div>
                  </div>
                </label>
                <!-- Option C -->
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u1" value="3" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 3</span>
                      <span class="text-sm font-medium text-slate-800">Sesuai</span>
                    </div>
                  </div>
                </label>
                <!-- Option D -->
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u1" value="4" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 4</span>
                      <span class="text-sm font-medium text-slate-800">Sangat sesuai</span>
                    </div>
                  </div>
                </label>
              </div>
            </div>

            <!-- Pertanyaan 2 -->
            <div class="pt-6">
              <p class="text-sm font-bold text-slate-900 mb-3 leading-relaxed">
                2. Bagaimana kemudahan prosedur pelayanan di unit ini?
              </p>
              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u2" value="1" required class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 1</span>
                      <span class="text-sm font-medium text-slate-800">Tidak mudah</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u2" value="2" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 2</span>
                      <span class="text-sm font-medium text-slate-800">Kurang mudah</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u2" value="3" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 3</span>
                      <span class="text-sm font-medium text-slate-800">Mudah</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u2" value="4" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 4</span>
                      <span class="text-sm font-medium text-slate-800">Sangat mudah</span>
                    </div>
                  </div>
                </label>
              </div>
            </div>

            <!-- Pertanyaan 3 -->
            <div class="pt-6">
              <p class="text-sm font-bold text-slate-900 mb-3 leading-relaxed">
                3. Bagaimana kecepatan waktu dalam memberikan pelayanan?
              </p>
              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u3" value="1" required class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 1</span>
                      <span class="text-sm font-medium text-slate-800">Tidak cepat</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u3" value="2" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 2</span>
                      <span class="text-sm font-medium text-slate-800">Kurang cepat</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u3" value="3" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 3</span>
                      <span class="text-sm font-medium text-slate-800">Cepat</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u3" value="4" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 4</span>
                      <span class="text-sm font-medium text-slate-800">Sangat cepat</span>
                    </div>
                  </div>
                </label>
              </div>
            </div>

            <!-- Pertanyaan 4 -->
            <div class="pt-6">
              <p class="text-sm font-bold text-slate-900 mb-3 leading-relaxed">
                4. Bagaimana kewajaran biaya/tarif dalam pelayanan?
              </p>
              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u4" value="1" required class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 1</span>
                      <span class="text-sm font-medium text-slate-800">Sangat mahal</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u4" value="2" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 2</span>
                      <span class="text-sm font-medium text-slate-800">Cukup mahal</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u4" value="3" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 3</span>
                      <span class="text-sm font-medium text-slate-800">Murah</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u4" value="4" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 4</span>
                      <span class="text-sm font-medium text-slate-800">Gratis / Sesuai Ketentuan</span>
                    </div>
                  </div>
                </label>
              </div>
            </div>

            <!-- Pertanyaan 5 -->
            <div class="pt-6">
              <p class="text-sm font-bold text-slate-900 mb-3 leading-relaxed">
                5. Bagaimana kesesuaian produk pelayanan dengan standar pelayanan?
              </p>
              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u5" value="1" required class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 1</span>
                      <span class="text-sm font-medium text-slate-800">Tidak sesuai</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u5" value="2" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 2</span>
                      <span class="text-sm font-medium text-slate-800">Kurang sesuai</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u5" value="3" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 3</span>
                      <span class="text-sm font-medium text-slate-800">Sesuai</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u5" value="4" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 4</span>
                      <span class="text-sm font-medium text-slate-800">Sangat sesuai</span>
                    </div>
                  </div>
                </label>
              </div>
            </div>

            <!-- Pertanyaan 6 -->
            <div class="pt-6">
              <p class="text-sm font-bold text-slate-900 mb-3 leading-relaxed">
                6. Bagaimana kompetensi / kemampuan petugas dalam pelayanan?
              </p>
              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u6" value="1" required class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 1</span>
                      <span class="text-sm font-medium text-slate-800">Tidak kompeten</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u6" value="2" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 2</span>
                      <span class="text-sm font-medium text-slate-800">Kurang kompeten</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u6" value="3" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 3</span>
                      <span class="text-sm font-medium text-slate-800">Kompeten</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u6" value="4" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 4</span>
                      <span class="text-sm font-medium text-slate-800">Sangat kompeten</span>
                    </div>
                  </div>
                </label>
              </div>
            </div>

            <!-- Pertanyaan 7 -->
            <div class="pt-6">
              <p class="text-sm font-bold text-slate-900 mb-3 leading-relaxed">
                7. Bagaimana perilaku petugas terkait kesopanan dan keramahan?
              </p>
              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u7" value="1" required class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 1</span>
                      <span class="text-sm font-medium text-slate-800">Tidak sopan & ramah</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u7" value="2" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 2</span>
                      <span class="text-sm font-medium text-slate-800">Kurang sopan & ramah</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u7" value="3" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 3</span>
                      <span class="text-sm font-medium text-slate-800">Sopan & ramah</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u7" value="4" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 4</span>
                      <span class="text-sm font-medium text-slate-800">Sangat sopan & ramah</span>
                    </div>
                  </div>
                </label>
              </div>
            </div>

            <!-- Pertanyaan 8 -->
            <div class="pt-6">
              <p class="text-sm font-bold text-slate-900 mb-3 leading-relaxed">
                8. Bagaimana kualitas sarana dan prasarana di unit pelayanan?
              </p>
              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u8" value="1" required class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 1</span>
                      <span class="text-sm font-medium text-slate-800">Buruk</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u8" value="2" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 2</span>
                      <span class="text-sm font-medium text-slate-800">Cukup</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u8" value="3" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 3</span>
                      <span class="text-sm font-medium text-slate-800">Baik</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u8" value="4" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 4</span>
                      <span class="text-sm font-medium text-slate-800">Sangat baik</span>
                    </div>
                  </div>
                </label>
              </div>
            </div>

            <!-- Pertanyaan 9 -->
            <div class="pt-6">
              <p class="text-sm font-bold text-slate-900 mb-3 leading-relaxed">
                9. Bagaimana penanganan pengaduan pengguna layanan?
              </p>
              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u9" value="1" required class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 1</span>
                      <span class="text-sm font-medium text-slate-800">Tidak ada</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u9" value="2" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 2</span>
                      <span class="text-sm font-medium text-slate-800">Ada tapi tak berfungsi</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u9" value="3" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 3</span>
                      <span class="text-sm font-medium text-slate-800">Kurang maksimal</span>
                    </div>
                  </div>
                </label>
                <label class="radio-card cursor-pointer">
                  <input type="radio" name="u9" value="4" class="sr-only">
                  <div class="p-3.5 rounded-xl border border-slate-200 hover:border-brand-500 transition-all flex items-start space-x-3 h-full">
                    <div class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 mt-0.5 shrink-0 transition-all"></div>
                    <div>
                      <span class="block text-xs font-semibold text-slate-500 uppercase">Nilai 4</span>
                      <span class="text-sm font-medium text-slate-800">Dikelola dengan baik</span>
                    </div>
                  </div>
                </label>
              </div>
            </div>

            <!-- Catatan & Saran Tambahan -->
            <div class="pt-6">
              <label class="block text-sm font-bold text-slate-900 mb-2">Saran & Masukan Konstruktif (Opsional)</label>
              <textarea name="saran" rows="3" placeholder="Tuliskan saran atau pengalaman Anda terkait perbaikan pelayanan..." class="w-full rounded-xl border border-slate-300 p-3.5 text-sm focus:ring-2 focus:ring-brand-500 focus:border-brand-500"></textarea>
            </div>

          </div>

          <div class="bg-slate-50 px-6 py-4 border-t border-slate-200 flex justify-end">
            <button id="btn-submit-survey" type="submit" class="px-6 py-3 bg-brand-700 hover:bg-brand-800 text-white font-bold rounded-xl shadow-md transition-all duration-200 flex items-center space-x-2">
              <i data-lucide="send" class="w-4 h-4"></i>
              <span id="btn-submit-text">Kirim Jawaban Survei</span>
            </button>
          </div>
        </div>

      </form>
    </section>


    <!-- VIEW 2: DASHBOARD & ANALISIS SKM -->
    <section id="view-dashboard" class="hidden space-y-8 transition-opacity duration-300">
      
      <!-- Top Action Bar -->
      <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 no-print">
        <div>
          <h2 class="text-xl font-bold text-slate-900">Dashboard Analisis Survei SKM</h2>
          <p class="text-xs text-slate-500 mt-0.5">Rekapitulasi Indeks Kepuasan Masyarakat berbasis standar PermenPAN-RB No. 14/2017</p>
        </div>
        <div class="flex flex-wrap items-center gap-2">
          <button onclick="generateMockData()" class="px-3.5 py-2 text-xs font-semibold bg-white border border-slate-300 rounded-xl hover:bg-slate-50 text-slate-700 shadow-sm flex items-center space-x-1.5">
            <i data-lucide="database" class="w-3.5 h-3.5 text-brand-700"></i>
            <span>Isi Data Simulasi (15 Responden)</span>
          </button>
          <button onclick="window.print()" class="px-3.5 py-2 text-xs font-semibold bg-brand-700 text-white rounded-xl hover:bg-brand-800 shadow-sm flex items-center space-x-1.5">
            <i data-lucide="printer" class="w-3.5 h-3.5"></i>
            <span>Cetak Laporan</span>
          </button>
        </div>
      </div>

      <!-- Overview Metric Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        
        <!-- Total Responden -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
          <div>
            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Responden</p>
            <h3 id="dash-total-responden" class="text-2xl font-black text-slate-900 mt-1">0</h3>
            <p class="text-[11px] text-slate-400 mt-0.5">Sampel masyarakat</p>
          </div>
          <div class="p-3 bg-blue-50 text-brand-700 rounded-xl">
            <i data-lucide="users" class="w-6 h-6"></i>
          </div>
        </div>

        <!-- Nilai IKM Konversi (25-100) -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
          <div>
            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Nilai IKM (Skala 100)</p>
            <h3 id="dash-ikm-score" class="text-2xl font-black text-brand-700 mt-1">0.00</h3>
            <p class="text-[11px] text-slate-400 mt-0.5">NRR Tertimbang x 25</p>
          </div>
          <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl">
            <i data-lucide="award" class="w-6 h-6"></i>
          </div>
        </div>

        <!-- Mutu Pelayanan -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
          <div>
            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Mutu Pelayanan</p>
            <h3 id="dash-mutu-badge" class="text-2xl font-black text-slate-400 mt-1">-</h3>
            <p id="dash-mutu-desc" class="text-[11px] text-slate-400 mt-0.5">Kategori mutu</p>
          </div>
          <div class="p-3 bg-purple-50 text-purple-600 rounded-xl">
            <i data-lucide="shield-check" class="w-6 h-6"></i>
          </div>
        </div>

        <!-- Rata-rata Skor (Skala 1-4) -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
          <div>
            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Rata-rata Skor (1-4)</p>
            <h3 id="dash-nrr-total" class="text-2xl font-black text-slate-900 mt-1">0.00</h3>
            <p class="text-[11px] text-slate-400 mt-0.5">Semua unsur</p>
          </div>
          <div class="p-3 bg-amber-50 text-amber-600 rounded-xl">
            <i data-lucide="star" class="w-6 h-6"></i>
          </div>
        </div>

      </div>

      <!-- Kategori Mutu Legend & Referensi -->
      <div class="bg-slate-100 rounded-xl p-4 border border-slate-200 text-xs grid grid-cols-2 md:grid-cols-4 gap-3 text-slate-600">
        <div class="flex items-center space-x-2">
          <span class="w-3 h-3 rounded-full bg-emerald-500 shrink-0"></span>
          <span><strong>88.31 - 100.00:</strong> Mutu A (Sangat Baik)</span>
        </div>
        <div class="flex items-center space-x-2">
          <span class="w-3 h-3 rounded-full bg-blue-500 shrink-0"></span>
          <span><strong>76.61 - 88.30:</strong> Mutu B (Baik)</span>
        </div>
        <div class="flex items-center space-x-2">
          <span class="w-3 h-3 rounded-full bg-amber-500 shrink-0"></span>
          <span><strong>65.31 - 76.60:</strong> Mutu C (Kurang Baik)</span>
        </div>
        <div class="flex items-center space-x-2">
          <span class="w-3 h-3 rounded-full bg-rose-500 shrink-0"></span>
          <span><strong>25.00 - 65.30:</strong> Mutu D (Tidak Baik)</span>
        </div>
      </div>

      <!-- Visual Charts -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Bar Chart: Skor per Unsur -->
        <div class="lg:col-span-2 bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-sm font-bold text-slate-900">Nilai Rata-Rata (NRR) Per Unsur Pelayanan</h3>
            <span class="text-xs text-slate-400">Skala 1.00 - 4.00</span>
          </div>
          <div class="h-72">
            <canvas id="chart-unsur"></canvas>
          </div>
        </div>

        <!-- Pie Chart: Demografi Pendidikan -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-sm font-bold text-slate-900">Profil Pendidikan</h3>
            <span class="text-xs text-slate-400">Responden</span>
          </div>
          <div class="h-72 flex items-center justify-center">
            <canvas id="chart-pendidikan"></canvas>
          </div>
        </div>
      </div>

      <!-- Rincian Tabel 9 Unsur Pelayanan -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50/80 flex items-center justify-between">
          <h3 class="text-sm font-bold text-slate-900">Rincian Perhitungan 9 Unsur Pelayanan</h3>
          <span class="text-xs text-slate-500">Bobot Nilai = 0.111 / Unsur</span>
        </div>
        <div class="overflow-x-auto">
          <table class="w-full text-left text-sm text-slate-600">
            <thead class="bg-slate-100 text-xs uppercase font-semibold text-slate-700">
              <tr>
                <th class="px-4 py-3">Kode</th>
                <th class="px-4 py-3">Unsur Pelayanan</th>
                <th class="px-4 py-3 text-center">Total Nilai</th>
                <th class="px-4 py-3 text-center">NRR (Total/N)</th>
                <th class="px-4 py-3 text-center">NRR Tertimbang</th>
                <th class="px-4 py-3 text-center">Kategori Unsur</th>
              </tr>
            </thead>
            <tbody id="table-unsur-body" class="divide-y divide-slate-100">
              <!-- Render via JS -->
            </tbody>
          </table>
        </div>
      </div>

      <!-- Riwayat Masukan & Saran -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
        <h3 class="text-sm font-bold text-slate-900 mb-4 flex items-center space-x-2">
          <i data-lucide="message-square" class="w-4 h-4 text-brand-700"></i>
          <span>Saran & Masukan Masuk dari Responden</span>
        </h3>
        <div id="saran-list" class="space-y-3 max-h-60 overflow-y-auto pr-2 text-xs">
          <!-- Render via JS -->
        </div>
      </div>

    </section>

    <!-- VIEW 3: DATABASE RESPONDEN (ADMIN PANEL) -->
    <section id="view-admin" class="hidden space-y-6 transition-opacity duration-300">
      
      <!-- Admin Header Banner -->
      <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
        <div>
          <div class="flex items-center space-x-2">
            <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-amber-100 text-amber-800 border border-amber-200">
              Panel Administrator
            </span>
            <span id="db-connection-status" class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
              <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
              Database Cloud Active
            </span>
          </div>
          <h2 class="text-xl font-bold text-slate-900 mt-1">Database Master Jawaban Survei</h2>
          <p class="text-xs text-slate-500 mt-0.5">Kelola, verifikasi, cari, dan ekspor seluruh log data tanggapan responden secara terperinci.</p>
        </div>

        <div class="flex flex-wrap items-center gap-2">
          <button onclick="exportToCSV()" class="px-4 py-2 text-xs font-bold bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl shadow-sm flex items-center space-x-2 transition-all">
            <i data-lucide="download" class="w-4 h-4"></i>
            <span>Ekspor Excel / CSV</span>
          </button>
          <button onclick="openChangePasswordModal()" class="px-3 py-2 text-xs font-medium bg-amber-50 hover:bg-amber-100 text-amber-700 rounded-xl flex items-center space-x-1.5 border border-amber-200 transition-all">
            <i data-lucide="key-round" class="w-3.5 h-3.5"></i>
            <span>Ubah Password</span>
          </button>
          <button onclick="lockAdminPanel()" class="px-3 py-2 text-xs font-medium bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl flex items-center space-x-1.5 transition-all">
            <i data-lucide="lock" class="w-3.5 h-3.5"></i>
            <span>Kunci Admin</span>
          </button>
        </div>
      </div>

      <!-- Filter & Search Toolbar -->
      <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="w-full sm:w-72 relative">
          <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3 top-3"></i>
          <input type="text" id="admin-search-input" oninput="renderAdminDatabase()" placeholder="Cari pekerjaan, saran, dll..." class="w-full pl-9 pr-4 py-2 text-xs rounded-xl border border-slate-300 focus:ring-2 focus:ring-brand-500 focus:border-brand-500">
        </div>

        <div class="flex flex-wrap items-center gap-3 w-full sm:w-auto">
          <!-- Filter Pendidikan -->
          <select id="admin-filter-edu" onchange="renderAdminDatabase()" class="text-xs rounded-xl border border-slate-300 px-3 py-2 bg-white focus:ring-2 focus:ring-brand-500">
            <option value="">Semua Pendidikan</option>
            <option value="SD">SD</option>
            <option value="SMP">SMP</option>
            <option value="SMA">SMA / SMK</option>
            <option value="S1">Diploma / S1</option>
            <option value="S2">S2</option>
            <option value="S3">S3</option>
          </select>

          <!-- Filter Pekerjaan -->
          <select id="admin-filter-job" onchange="renderAdminDatabase()" class="text-xs rounded-xl border border-slate-300 px-3 py-2 bg-white focus:ring-2 focus:ring-brand-500">
            <option value="">Semua Pekerjaan</option>
            <option value="PNS">PNS / ASN</option>
            <option value="TNI">TNI</option>
            <option value="POLRI">POLRI</option>
            <option value="Swasta">Swasta</option>
            <option value="Wirausaha">Wirausaha</option>
            <option value="Lainnya">Lainnya</option>
          </select>

          <!-- Counter -->
          <span id="admin-record-counter" class="text-xs font-semibold text-brand-700 bg-brand-50 px-3 py-2 rounded-xl border border-brand-100">
            0 Data
          </span>
        </div>
      </div>

      <!-- Database Table Container -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full text-left text-xs text-slate-600">
            <thead class="bg-slate-100 uppercase font-semibold text-slate-700 border-b border-slate-200">
              <tr>
                <th class="px-3 py-3 text-center">No</th>
                <th class="px-3 py-3">Waktu Tanggapan</th>
                <th class="px-3 py-3">Profil Responden</th>
                <th class="px-2 py-3 text-center">JK</th>
                <th class="px-2 py-3 text-center">Waktu</th>
                <th class="px-3 py-3 text-center">Skor 9 Unsur (U1-U9)</th>
                <th class="px-3 py-3 text-center">Rata2</th>
                <th class="px-3 py-3">Saran / Masukan</th>
                <th class="px-3 py-3 text-center">Aksi</th>
              </tr>
            </thead>
            <tbody id="admin-table-body" class="divide-y divide-slate-100">
              <!-- Rendered via JS -->
            </tbody>
          </table>
        </div>
      </div>

    </section>

    <!-- MODAL DETAIL RESPONDEN -->
    <div id="modal-detail" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
      <div class="bg-white rounded-2xl max-w-2xl w-full p-6 shadow-xl space-y-6 max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
          <div class="flex items-center space-x-2">
            <div class="p-2 bg-brand-50 rounded-lg text-brand-700">
              <i data-lucide="user-check" class="w-5 h-5"></i>
            </div>
            <div>
              <h3 class="text-base font-bold text-slate-900">Rincian Jawaban Responden</h3>
              <p id="modal-timestamp" class="text-xs text-slate-400"></p>
            </div>
          </div>
          <button onclick="closeModalDetail()" class="p-1.5 text-slate-400 hover:text-slate-600 rounded-lg hover:bg-slate-100">
            <i data-lucide="x" class="w-5 h-5"></i>
          </button>
        </div>

        <div id="modal-content-body" class="space-y-4">
          <!-- Render Detail Content -->
        </div>

        <div class="pt-4 border-t border-slate-100 flex justify-end">
          <button onclick="closeModalDetail()" class="px-4 py-2 bg-slate-100 text-slate-700 hover:bg-slate-200 font-semibold text-xs rounded-xl">
            Tutup
          </button>
        </div>
      </div>
    </div>

    <!-- MODAL LOGIN ADMIN -->
    <div id="modal-pin" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
      <div class="bg-white rounded-2xl max-w-sm w-full p-6 shadow-xl text-left space-y-4">
        <div class="w-12 h-12 bg-brand-50 text-brand-700 rounded-2xl flex items-center justify-center mx-auto">
          <i data-lucide="shield-lock" class="w-6 h-6"></i>
        </div>
        <div class="text-center">
          <h3 class="text-base font-bold text-slate-900">Akses Database Administrator</h3>
          <p class="text-xs text-slate-500 mt-1">Masukkan Username & Password untuk masuk ke database.</p>
          <p class="text-[10px] text-brand-600 font-mono mt-1">(Default: admin / admin123)</p>
        </div>

        <div id="login-error-msg" class="hidden text-xs text-red-600 bg-red-50 border border-red-200 rounded-xl p-2.5 text-center font-medium"></div>

        <div class="space-y-3">
          <div>
            <label class="block text-xs font-semibold text-slate-700 mb-1">Username</label>
            <input type="text" id="admin-user-input" placeholder="Username" class="w-full text-xs font-medium border border-slate-300 rounded-xl px-3 py-2.5 focus:ring-2 focus:ring-brand-500 focus:border-brand-500">
          </div>
          <div>
            <label class="block text-xs font-semibold text-slate-700 mb-1">Password</label>
            <div class="relative">
              <input type="password" id="admin-pin-input" placeholder="Password" class="w-full text-xs font-medium border border-slate-300 rounded-xl pl-3 pr-9 py-2.5 focus:ring-2 focus:ring-brand-500 focus:border-brand-500">
              <button type="button" onclick="togglePasswordVisibility('admin-pin-input', 'pass-icon')" class="absolute right-2.5 top-2.5 text-slate-400 hover:text-slate-600">
                <i id="pass-icon" data-lucide="eye" class="w-4 h-4"></i>
              </button>
            </div>
          </div>
        </div>

        <div class="flex space-x-2 pt-2">
          <button onclick="cancelAdminPin()" class="flex-1 py-2.5 text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-slate-200 rounded-xl">Batal</button>
          <button onclick="verifyAdminPin()" class="flex-1 py-2.5 text-xs font-bold bg-brand-700 text-white hover:bg-brand-800 rounded-xl shadow-md">Masuk</button>
        </div>
      </div>
    </div>

    <!-- MODAL UBAH PASSWORD ADMIN -->
    <div id="modal-change-pass" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
      <div class="bg-white rounded-2xl max-w-sm w-full p-6 shadow-xl space-y-4">
        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
          <div class="flex items-center space-x-2">
            <i data-lucide="key-round" class="w-5 h-5 text-amber-600"></i>
            <h3 class="text-sm font-bold text-slate-900">Ubah Kredensial Admin</h3>
          </div>
          <button onclick="closeChangePasswordModal()" class="text-slate-400 hover:text-slate-600">
            <i data-lucide="x" class="w-4 h-4"></i>
          </button>
        </div>

        <div id="change-pass-error-msg" class="hidden text-xs text-red-600 bg-red-50 border border-red-200 rounded-xl p-2.5 text-center font-medium"></div>

        <div class="space-y-3 text-xs">
          <div>
            <label class="block font-semibold text-slate-700 mb-1">Username Baru</label>
            <input type="text" id="new-admin-user" placeholder="Username baru" class="w-full border border-slate-300 rounded-xl px-3 py-2 focus:ring-2 focus:ring-brand-500">
          </div>
          <div>
            <label class="block font-semibold text-slate-700 mb-1">Password Lama</label>
            <input type="password" id="old-admin-pass" placeholder="Password saat ini" class="w-full border border-slate-300 rounded-xl px-3 py-2 focus:ring-2 focus:ring-brand-500">
          </div>
          <div>
            <label class="block font-semibold text-slate-700 mb-1">Password Baru</label>
            <input type="password" id="new-admin-pass" placeholder="Password baru" class="w-full border border-slate-300 rounded-xl px-3 py-2 focus:ring-2 focus:ring-brand-500">
          </div>
        </div>

        <div class="flex space-x-2 pt-2">
          <button onclick="closeChangePasswordModal()" class="flex-1 py-2 text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-slate-200 rounded-xl">Batal</button>
          <button onclick="saveNewPassword()" class="flex-1 py-2 text-xs font-bold bg-amber-600 text-white hover:bg-amber-700 rounded-xl shadow-md">Simpan Credential</button>
        </div>
      </div>
    </div>

    <!-- TOAST NOTIFIKASI SINKRONISASI -->
    <div id="toast-container" class="fixed bottom-5 right-5 z-50 flex flex-col gap-2 pointer-events-none"></div>

    <!-- MODAL KONFIRMASI KUSTOM (PENGGANTI CONFIRM) -->
    <div id="modal-confirm" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
      <div class="bg-white rounded-2xl max-w-sm w-full p-6 shadow-xl space-y-4 text-center">
        <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-2xl flex items-center justify-center mx-auto">
          <i data-lucide="alert-triangle" class="w-6 h-6"></i>
        </div>
        <div>
          <h3 id="confirm-title" class="text-base font-bold text-slate-900">Konfirmasi</h3>
          <p id="confirm-message" class="text-xs text-slate-500 mt-1">Apakah Anda yakin ingin melanjutkan aksi ini?</p>
        </div>
        <div class="flex space-x-2 pt-2">
          <button id="confirm-cancel-btn" class="flex-1 py-2.5 text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-slate-200 rounded-xl">Batal</button>
          <button id="confirm-ok-btn" class="flex-1 py-2.5 text-xs font-bold bg-red-600 text-white hover:bg-red-700 rounded-xl shadow-md">Ya, Lanjutkan</button>
        </div>
      </div>
    </div>

  </main>

  <!-- FOOTER -->
  <footer class="bg-brand-900 text-slate-400 py-6 border-t border-brand-800 text-xs no-print">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-2">
      <p class="font-medium text-slate-300">&copy; 2026 Layanan Dalam Satu Genggaman — Survei Kepuasan Masyarakat (SKM)</p>
      <p class="text-slate-500">Pedoman Penyusunan Berdasarkan Peraturan Menteri PAN-RB Nomor 14 Tahun 2017</p>
    </div>
  </footer>

  <!-- SCRIPT LOGIC -->
  <!-- Firebase Cloud Integration -->
  <script type="module">
    import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-app.js";
    import { getAuth, signInAnonymously, signInWithCustomToken } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-auth.js";
    import { getFirestore, collection, addDoc, deleteDoc, doc, onSnapshot, getDocs } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-firestore.js";

    const appId = typeof __app_id !== 'undefined' ? __app_id : 'skm-app-default';
    let db = null;
    let auth = null;
    let currentUser = null;

    async function initFirebase() {
      if (typeof __firebase_config !== 'undefined') {
        try {
          const config = JSON.parse(__firebase_config);
          const app = initializeApp(config);
          db = getFirestore(app);
          auth = getAuth(app);

          if (typeof __initial_auth_token !== 'undefined' && __initial_auth_token) {
            const userCred = await signInWithCustomToken(auth, __initial_auth_token);
            currentUser = userCred.user;
          } else {
            const userCred = await signInAnonymously(auth);
            currentUser = userCred.user;
          }

          window.db = db;
          window.auth = auth;
          window.appId = appId;
          window.currentUser = currentUser;

          setupRealtimeListeners();
        } catch (e) {
          console.error("Firebase init error:", e);
          fallbackToLocalStatus();
        }
      } else {
        fallbackToLocalStatus();
      }
    }

    function setupRealtimeListeners() {
      if (!db || !currentUser) return;
      const responsesRef = collection(db, 'artifacts', appId, 'public', 'data', 'responses');
      onSnapshot(responsesRef, (snapshot) => {
        const data = [];
        snapshot.forEach((doc) => {
          data.push({ id: doc.id, ...doc.data() });
        });
        data.sort((a, b) => new Date(b.timestamp) - new Date(a.timestamp));
        window.surveyData = data;
        if (typeof window.updateDashboard === 'function') window.updateDashboard();
        if (window.isAdminAuthenticated && typeof window.renderAdminDatabase === 'function') {
          window.renderAdminDatabase();
        }
      }, (err) => {
        console.error("Firestore snapshot error:", err);
      });
    }

    function fallbackToLocalStatus() {
      const statusElem = document.getElementById('db-connection-status');
      if (statusElem) {
        statusElem.className = "inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-700 border border-slate-200";
        statusElem.innerHTML = `<span class="w-2 h-2 rounded-full bg-slate-400"></span> Local Storage (Offline)`;
      }
    }

    initFirebase();
  </script>

  <script>
    // State Data Survei & Admin Credentials
    window.surveyData = JSON.parse(localStorage.getItem('skm_survey_responses')) || [];
    window.isAdminAuthenticated = false;
    let adminCreds = JSON.parse(localStorage.getItem('skm_admin_creds')) || { username: 'admin', password: 'admin123' };

    // Custom Toast Notification System
    function showToast(message, type = 'success') {
      const container = document.getElementById('toast-container');
      if (!container) return;

      const toast = document.createElement('div');
      toast.className = `pointer-events-auto flex items-center space-x-3 px-4 py-3 rounded-xl shadow-xl text-xs font-semibold transition-all duration-300 transform translate-y-2 opacity-0 text-white ${
        type === 'success' ? 'bg-emerald-600' :
        type === 'error' ? 'bg-rose-600' :
        type === 'warning' ? 'bg-amber-600' : 'bg-brand-700'
      }`;

      const iconName = type === 'success' ? 'check-circle' : type === 'error' ? 'x-circle' : 'info';
      toast.innerHTML = `
        <i data-lucide="${iconName}" class="w-4 h-4 shrink-0"></i>
        <span>${message}</span>
      `;

      container.appendChild(toast);
      lucide.createIcons();

      requestAnimationFrame(() => {
        toast.classList.remove('translate-y-2', 'opacity-0');
      });

      setTimeout(() => {
        toast.classList.add('opacity-0', 'translate-y-2');
        setTimeout(() => toast.remove(), 300);
      }, 3500);
    }

    // Custom Modal Confirmation System
    let pendingConfirmCallback = null;

    function showConfirmModal(title, message, onConfirm) {
      document.getElementById('confirm-title').innerText = title;
      document.getElementById('confirm-message').innerText = message;
      pendingConfirmCallback = onConfirm;

      const modal = document.getElementById('modal-confirm');
      modal.classList.remove('hidden');

      const cancelBtn = document.getElementById('confirm-cancel-btn');
      const okBtn = document.getElementById('confirm-ok-btn');

      cancelBtn.onclick = () => {
        modal.classList.add('hidden');
        pendingConfirmCallback = null;
      };

      okBtn.onclick = () => {
        modal.classList.add('hidden');
        if (pendingConfirmCallback) pendingConfirmCallback();
        pendingConfirmCallback = null;
      };
    }

    // Chart Instances
    let chartUnsurInstance = null;
    let chartPendidikanInstance = null;

    const UNSUR_TITLES = [
      "1. Persyaratan",
      "2. Prosedur",
      "3. Waktu Pelayanan",
      "4. Biaya / Tarif",
      "5. Produk Spesifikasi",
      "6. Kompetensi Petugas",
      "7. Perilaku / Sopan Ramah",
      "8. Sarana & Prasarana",
      "9. Penanganan Pengaduan"
    ];

    document.addEventListener('DOMContentLoaded', () => {
      lucide.createIcons();
      updateDashboard();
      
      // Enter key handler untuk login
      document.getElementById('admin-pin-input')?.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') verifyAdminPin();
      });
      document.getElementById('admin-user-input')?.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') document.getElementById('admin-pin-input').focus();
      });
    });

    function togglePekerjaanLainnya() {
      const select = document.getElementById('pekerjaan-select');
      const wrapper = document.getElementById('pekerjaan-lainnya-wrapper');
      if (select && wrapper) {
        if (select.value === 'Lainnya') {
          wrapper.classList.remove('hidden');
        } else {
          wrapper.classList.add('hidden');
        }
      }
    }

    // Toggle Password Visibility
    function togglePasswordVisibility(inputId, iconId) {
      const input = document.getElementById(inputId);
      const icon = document.getElementById(iconId);
      if (input.type === 'password') {
        input.type = 'text';
        icon.setAttribute('data-lucide', 'eye-off');
      } else {
        input.type = 'password';
        icon.setAttribute('data-lucide', 'eye');
      }
      lucide.createIcons();
    }

    // Switch View Tab
    function switchTab(tab) {
      const formView = document.getElementById('view-form');
      const dashView = document.getElementById('view-dashboard');
      const adminView = document.getElementById('view-admin');

      const formBtn = document.getElementById('nav-form-btn');
      const dashBtn = document.getElementById('nav-dash-btn');
      const adminBtn = document.getElementById('nav-admin-btn');

      if (tab === 'admin' && !window.isAdminAuthenticated) {
        document.getElementById('modal-pin').classList.remove('hidden');
        document.getElementById('admin-user-input').focus();
        return;
      }

      formView.classList.add('hidden');
      dashView.classList.add('hidden');
      adminView.classList.add('hidden');

      const inactiveClass = "px-4 py-2 text-sm font-semibold rounded-lg transition-all duration-200 flex items-center space-x-2 text-blue-100 hover:text-white hover:bg-white/10";
      const activeClass = "px-4 py-2 text-sm font-semibold rounded-lg transition-all duration-200 flex items-center space-x-2 bg-white text-brand-700 shadow-sm";

      formBtn.className = inactiveClass;
      dashBtn.className = inactiveClass;
      adminBtn.className = inactiveClass;

      if (tab === 'form') {
        formView.classList.remove('hidden');
        formBtn.className = activeClass;
      } else if (tab === 'dashboard') {
        dashView.classList.remove('hidden');
        dashBtn.className = activeClass;
        updateDashboard();
      } else if (tab === 'admin') {
        adminView.classList.remove('hidden');
        adminBtn.className = activeClass;
        renderAdminDatabase();
      }
    }

    // Admin Login Verification
    function verifyAdminPin() {
      const userInput = document.getElementById('admin-user-input').value.trim();
      const passInput = document.getElementById('admin-pin-input').value;
      const errorMsg = document.getElementById('login-error-msg');

      if (userInput === adminCreds.username && passInput === adminCreds.password) {
        window.isAdminAuthenticated = true;
        errorMsg.classList.add('hidden');
        document.getElementById('modal-pin').classList.add('hidden');
        document.getElementById('admin-user-input').value = '';
        document.getElementById('admin-pin-input').value = '';
        switchTab('admin');
      } else {
        errorMsg.innerText = 'Username atau Password salah!';
        errorMsg.classList.remove('hidden');
      }
    }

    function cancelAdminPin() {
      document.getElementById('modal-pin').classList.add('hidden');
      document.getElementById('login-error-msg').classList.add('hidden');
      document.getElementById('admin-user-input').value = '';
      document.getElementById('admin-pin-input').value = '';
    }

    function lockAdminPanel() {
      window.isAdminAuthenticated = false;
      switchTab('form');
      showToast('Panel Admin berhasil dikunci.', 'info');
    }

    // Modal Ubah Password
    function openChangePasswordModal() {
      document.getElementById('new-admin-user').value = adminCreds.username;
      document.getElementById('old-admin-pass').value = '';
      document.getElementById('new-admin-pass').value = '';
      document.getElementById('change-pass-error-msg').classList.add('hidden');
      document.getElementById('modal-change-pass').classList.remove('hidden');
    }

    function closeChangePasswordModal() {
      document.getElementById('modal-change-pass').classList.add('hidden');
    }

    function saveNewPassword() {
      const newUsername = document.getElementById('new-admin-user').value.trim();
      const oldPassword = document.getElementById('old-admin-pass').value;
      const newPassword = document.getElementById('new-admin-pass').value;
      const errorElem = document.getElementById('change-pass-error-msg');

      if (!newUsername || !oldPassword || !newPassword) {
        errorElem.innerText = 'Semua field wajib diisi!';
        errorElem.classList.remove('hidden');
        return;
      }

      if (oldPassword !== adminCreds.password) {
        errorElem.innerText = 'Password lama Anda tidak sesuai!';
        errorElem.classList.remove('hidden');
        return;
      }

      adminCreds = { username: newUsername, password: newPassword };
      localStorage.setItem('skm_admin_creds', JSON.stringify(adminCreds));
      showToast('Kredensial Admin berhasil diperbarui!', 'success');
      closeChangePasswordModal();
    }

    // Render Admin Database Table
    function renderAdminDatabase() {
      const tbody = document.getElementById('admin-table-body');
      tbody.innerHTML = '';

      const searchKeyword = document.getElementById('admin-search-input').value.toLowerCase();
      const filterEdu = document.getElementById('admin-filter-edu').value;
      const filterJob = document.getElementById('admin-filter-job').value;

      const filtered = (window.surveyData || []).filter(item => {
        const matchSearch = (item.nama || '').toLowerCase().includes(searchKeyword) ||
                            (item.alamat || '').toLowerCase().includes(searchKeyword) ||
                            (item.pekerjaan || '').toLowerCase().includes(searchKeyword) ||
                            (item.saran || '').toLowerCase().includes(searchKeyword) ||
                            (item.pendidikan || '').toLowerCase().includes(searchKeyword);
        const matchEdu = filterEdu ? item.pendidikan === filterEdu : true;
        const matchJob = filterJob ? item.pekerjaan === filterJob : true;

        return matchSearch && matchEdu && matchJob;
      });

      document.getElementById('admin-record-counter').innerText = `${filtered.length} / ${(window.surveyData || []).length} Data`;

      if (filtered.length === 0) {
        tbody.innerHTML = `
          <tr>
            <td colspan="9" class="px-4 py-8 text-center text-slate-400 italic">Tidak ada data jawaban survei yang cocok.</td>
          </tr>
        `;
        return;
      }

      filtered.forEach((item, idx) => {
        const scores = [item.u1, item.u2, item.u3, item.u4, item.u5, item.u6, item.u7, item.u8, item.u9];
        const avg = (scores.reduce((a, b) => a + b, 0) / 9).toFixed(2);
        const originalIndex = window.surveyData.indexOf(item);

        const tr = document.createElement('tr');
        tr.className = "hover:bg-slate-50 transition-colors";

        const scoreBadges = scores.map(s => {
          let bg = "bg-slate-100 text-slate-600";
          if (s === 4) bg = "bg-emerald-100 text-emerald-800 font-bold";
          else if (s === 3) bg = "bg-blue-100 text-blue-800";
          else if (s === 2) bg = "bg-amber-100 text-amber-800";
          else if (s === 1) bg = "bg-rose-100 text-rose-800";
          return `<span class="inline-block px-1.5 py-0.5 text-[10px] rounded ${bg}">${s}</span>`;
        }).join(' ');

        tr.innerHTML = `
          <td class="px-3 py-3 text-center font-bold text-slate-500">${idx + 1}</td>
          <td class="px-3 py-3 text-slate-600 whitespace-nowrap">${new Date(item.timestamp).toLocaleString('id-ID')}</td>
          <td class="px-3 py-3 font-medium text-slate-900">
            <div class="font-bold text-slate-900">${item.nama || 'Anonim'}</div>
            <div class="text-[11px] text-slate-600">${item.pekerjaan} • ${item.pendidikan}</div>
            <div class="text-[10px] text-slate-400 font-normal truncate max-w-[150px]" title="${item.alamat || '-'}">${item.alamat || '-'}</div>
          </td>
          <td class="px-2 py-3 text-center whitespace-nowrap text-slate-600">${item.jenis_kelamin}</td>
          <td class="px-2 py-3 text-center whitespace-nowrap text-slate-500 text-[11px]">${item.waktu_pelayanan}</td>
          <td class="px-3 py-3 text-center whitespace-nowrap">${scoreBadges}</td>
          <td class="px-3 py-3 text-center font-bold text-brand-700">${avg}</td>
          <td class="px-3 py-3 text-slate-600 max-w-xs truncate" title="${item.saran}">
            ${item.saran && item.saran !== '-' ? item.saran : '<span class="text-slate-300 italic">Tanpa saran</span>'}
          </td>
          <td class="px-3 py-3 text-center whitespace-nowrap space-x-1">
            <button onclick="showResponseDetail(${originalIndex})" class="px-2 py-1 bg-brand-50 text-brand-700 hover:bg-brand-100 rounded-lg text-[11px] font-semibold">
              Detail
            </button>
            <button onclick="deleteSingleResponse(${originalIndex})" class="px-2 py-1 bg-red-50 text-red-600 hover:bg-red-100 rounded-lg text-[11px] font-semibold">
              Hapus
            </button>
          </td>
        `;
        tbody.appendChild(tr);
      });
    }

    // Modal Detail View
    function showResponseDetail(index) {
      const item = window.surveyData[index];
      if (!item) return;

      document.getElementById('modal-timestamp').innerText = `Waktu Submit: ${new Date(item.timestamp).toLocaleString('id-ID')}`;
      const container = document.getElementById('modal-content-body');

      let html = `
        <div class="grid grid-cols-2 gap-3 bg-slate-50 p-3 rounded-xl text-xs">
          <div><strong class="text-slate-500">Nama Lengkap:</strong> <span class="text-slate-900 font-semibold">${item.nama || 'Anonim'}</span></div>
          <div><strong class="text-slate-500">Alamat / Domisili:</strong> <span class="text-slate-800">${item.alamat || '-'}</span></div>
          <div><strong class="text-slate-500">Pendidikan:</strong> <span class="text-slate-800">${item.pendidikan}</span></div>
          <div><strong class="text-slate-500">Pekerjaan:</strong> <span class="text-slate-800">${item.pekerjaan}</span></div>
          <div><strong class="text-slate-500">Jenis Kelamin:</strong> <span class="text-slate-800">${item.jenis_kelamin}</span></div>
          <div><strong class="text-slate-500">Jam Layanan:</strong> <span class="text-slate-800">${item.waktu_pelayanan}</span></div>
        </div>

        <div class="space-y-2">
          <h4 class="text-xs font-bold text-slate-700 uppercase">Rincian Nilai 9 Unsur:</h4>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs">
      `;

      UNSUR_TITLES.forEach((title, i) => {
        const score = item[`u${i + 1}`];
        html += `
          <div class="flex items-center justify-between p-2 rounded-lg border border-slate-100 bg-white">
            <span class="text-slate-600 font-medium">${title}</span>
            <span class="px-2 py-0.5 rounded font-bold ${score >= 3 ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800'}">Nilai ${score}</span>
          </div>
        `;
      });

      html += `
          </div>
        </div>

        <div class="bg-blue-50/50 p-3 rounded-xl border border-blue-100 text-xs">
          <strong class="text-brand-700">Saran / Masukan Responden:</strong>
          <p class="text-slate-700 mt-1 italic">"${item.saran}"</p>
        </div>
      `;

      container.innerHTML = html;
      document.getElementById('modal-detail').classList.remove('hidden');
    }

    function closeModalDetail() {
      document.getElementById('modal-detail').classList.add('hidden');
    }

    // Delete Single Record
    function deleteSingleResponse(index) {
      showConfirmModal(
        'Hapus Jawaban Responden',
        'Apakah Anda yakin ingin menghapus data tanggapan ini dari database?',
        async () => {
          const item = window.surveyData[index];
          if (item && item.id && window.db && window.currentUser) {
            try {
              const { doc, deleteDoc } = await import("https://www.gstatic.com/firebasejs/11.6.1/firebase-firestore.js");
              const docRef = doc(window.db, 'artifacts', window.appId, 'public', 'data', 'responses', item.id);
              await deleteDoc(docRef);
              showToast('Data tanggapan terhapus dari database cloud.', 'success');
            } catch (err) {
              console.error("Error deleting doc:", err);
              showToast('Gagal menghapus data dari cloud.', 'error');
            }
          } else {
            window.surveyData.splice(index, 1);
            localStorage.setItem('skm_survey_responses', JSON.stringify(window.surveyData));
            renderAdminDatabase();
            updateDashboard();
            showToast('Data tanggapan terhapus dari penyimpanan lokal.', 'success');
          }
        }
      );
    }

    // Ekspor ke CSV
    function exportToCSV() {
      if (!window.surveyData || window.surveyData.length === 0) {
        showToast('Belum ada data tanggapan untuk diekspor!', 'warning');
        return;
      }

      let csv = 'No,Waktu,Nama,Alamat,Pendidikan,Pekerjaan,Jenis Kelamin,Waktu Layanan,U1,U2,U3,U4,U5,U6,U7,U8,U9,Rata-Rata,Saran\n';

      window.surveyData.forEach((item, i) => {
        const scores = [item.u1, item.u2, item.u3, item.u4, item.u5, item.u6, item.u7, item.u8, item.u9];
        const avg = (scores.reduce((a, b) => a + b, 0) / 9).toFixed(2);
        const cleanNama = `"${(item.nama || 'Anonim').replace(/"/g, '""')}"`;
        const cleanAlamat = `"${(item.alamat || '-').replace(/"/g, '""')}"`;
        const cleanSaran = `"${(item.saran || '-').replace(/"/g, '""')}"`;
        
        csv += `${i + 1},"${item.timestamp}",${cleanNama},${cleanAlamat},${item.pendidikan},"${item.pekerjaan}",${item.jenis_kelamin},"${item.waktu_pelayanan}",${item.u1},${item.u2},${item.u3},${item.u4},${item.u5},${item.u6},${item.u7},${item.u8},${item.u9},${avg},${cleanSaran}\n`;
      });

      const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
      const url = URL.createObjectURL(blob);
      const link = document.createElement('a');
      link.setAttribute('href', url);
      link.setAttribute('download', `Database_SKM_Responden_${new Date().toISOString().slice(0, 10)}.csv`);
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
      showToast('File CSV berhasil diunduh.', 'success');
    }

    // Handle Submit Form
    async function handleFormSubmit(event) {
      event.preventDefault();
      const form = event.target;
      const formData = new FormData(form);

      const submitBtn = document.getElementById('btn-submit-survey');
      const submitText = document.getElementById('btn-submit-text');
      
      if (submitBtn) submitBtn.disabled = true;
      if (submitText) submitText.innerText = "Menyimpan ke Database...";

      const response = {
        timestamp: new Date().toISOString(),
        nama: formData.get('nama') || 'Anonim',
        alamat: formData.get('alamat') || '-',
        pendidikan: formData.get('pendidikan'),
        pekerjaan: formData.get('pekerjaan') === 'Lainnya' ? formData.get('pekerjaan_lainnya') : formData.get('pekerjaan'),
        jenis_kelamin: formData.get('jenis_kelamin'),
        waktu_pelayanan: formData.get('waktu_pelayanan'),
        u1: parseInt(formData.get('u1')),
        u2: parseInt(formData.get('u2')),
        u3: parseInt(formData.get('u3')),
        u4: parseInt(formData.get('u4')),
        u5: parseInt(formData.get('u5')),
        u6: parseInt(formData.get('u6')),
        u7: parseInt(formData.get('u7')),
        u8: parseInt(formData.get('u8')),
        u9: parseInt(formData.get('u9')),
        saran: formData.get('saran') || '-'
      };

      try {
        try {
          const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
          const apiResp = await fetch('/api/skm/store', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Accept': 'application/json',
              'X-CSRF-TOKEN': csrfToken || ''
            },
            body: JSON.stringify(response)
          });
          const apiJson = await apiResp.json();
          if (apiJson.success) {
            response.id = apiJson.data.id;
          }
        } catch(apiErr) {
          console.warn('API store warning:', apiErr);
        }

        window.surveyData.unshift(response);
        updateDashboard();
        showToast('Jawaban survei Anda berhasil disimpan ke Database Disdikbud!', 'success');

        form.reset();
        togglePekerjaanLainnya();
        switchTab('dashboard');
      } catch (err) {
        console.error("Error submitting survey response:", err);
        showToast('Terjadi kendala jaringan saat menyimpan data.', 'error');
      } finally {
        if (submitBtn) submitBtn.disabled = false;
        if (submitText) submitText.innerText = "Kirim Jawaban Survei";
      }
    }

    // Update Dashboard Logic
    function updateDashboard() {
      const data = window.surveyData || [];
      const N = data.length;
      document.getElementById('dash-total-responden').innerText = N;

      if (N === 0) {
        document.getElementById('dash-ikm-score').innerText = "0.00";
        document.getElementById('dash-nrr-total').innerText = "0.00";
        document.getElementById('dash-mutu-badge').innerText = "-";
        document.getElementById('dash-mutu-desc').innerText = "Belum ada data";
        renderEmptyTable();
        renderCharts([], {});
        renderSaran([]);
        return;
      }

      // Hitung NRR (Nilai Rata-Rata) tiap Unsur
      const sums = [0, 0, 0, 0, 0, 0, 0, 0, 0];
      const eduCounts = {};

      data.forEach(item => {
        for (let i = 1; i <= 9; i++) {
          sums[i - 1] += item[`u${i}`] || 0;
        }
        if (item.pendidikan) {
          eduCounts[item.pendidikan] = (eduCounts[item.pendidikan] || 0) + 1;
        }
      });

      const nrrs = sums.map(sum => sum / N);
      const nrrsTertimbang = nrrs.map(nrr => nrr * 0.111);
      const totalNRRTertimbang = nrrsTertimbang.reduce((a, b) => a + b, 0);
      const ikmScore = totalNRRTertimbang * 25;
      const nrrAverageAll = nrrs.reduce((a, b) => a + b, 0) / 9;

      document.getElementById('dash-ikm-score').innerText = ikmScore.toFixed(2);
      document.getElementById('dash-nrr-total').innerText = nrrAverageAll.toFixed(2);

      // Kategori Mutu Pelayanan
      let mutu = "";
      let mutuDesc = "";
      let mutuColor = "";

      if (ikmScore >= 88.31) {
        mutu = "A";
        mutuDesc = "Sangat Baik";
        mutuColor = "text-emerald-600";
      } else if (ikmScore >= 76.61) {
        mutu = "B";
        mutuDesc = "Baik";
        mutuColor = "text-blue-600";
      } else if (ikmScore >= 65.31) {
        mutu = "C";
        mutuDesc = "Kurang Baik";
        mutuColor = "text-amber-600";
      } else {
        mutu = "D";
        mutuDesc = "Tidak Baik";
        mutuColor = "text-rose-600";
      }

      const badgeElem = document.getElementById('dash-mutu-badge');
      badgeElem.innerText = `Mutu ${mutu}`;
      badgeElem.className = `text-2xl font-black mt-1 ${mutuColor}`;
      document.getElementById('dash-mutu-desc').innerText = mutuDesc;

      // Render Table Unsur
      renderTableUnsur(sums, nrrs, nrrsTertimbang, N);

      // Render Charts
      renderCharts(nrrs, eduCounts);

      // Render Saran
      renderSaran(data.map(d => ({ text: d.saran, date: d.timestamp })));
    }

    function renderTableUnsur(sums, nrrs, nrrsTertimbang, N) {
      const tbody = document.getElementById('table-unsur-body');
      tbody.innerHTML = '';

      UNSUR_TITLES.forEach((title, idx) => {
        const sum = sums[idx];
        const nrr = nrrs[idx];
        const tertimbang = nrrsTertimbang[idx];
        
        let kat = "Sangat Baik";
        if (nrr < 2.60) kat = "Tidak Baik";
        else if (nrr < 3.064) kat = "Kurang Baik";
        else if (nrr < 3.532) kat = "Baik";

        const tr = document.createElement('tr');
        tr.className = "hover:bg-slate-50 transition-colors";
        tr.innerHTML = `
          <td class="px-4 py-3 font-semibold text-brand-700">U${idx + 1}</td>
          <td class="px-4 py-3 font-medium text-slate-900">${title}</td>
          <td class="px-4 py-3 text-center font-mono">${sum}</td>
          <td class="px-4 py-3 text-center font-mono font-bold">${nrr.toFixed(2)}</td>
          <td class="px-4 py-3 text-center font-mono text-slate-500">${tertimbang.toFixed(3)}</td>
          <td class="px-4 py-3 text-center">
            <span class="inline-block px-2.5 py-1 text-[10px] font-bold rounded-full bg-slate-100 text-slate-700 border border-slate-200">
              ${kat}
            </span>
          </td>
        `;
        tbody.appendChild(tr);
      });
    }

    function renderEmptyTable() {
      const tbody = document.getElementById('table-unsur-body');
      tbody.innerHTML = `
        <tr>
          <td colspan="6" class="px-4 py-8 text-center text-slate-400 italic">Belum ada data responden terdata.</td>
        </tr>
      `;
    }

    function renderCharts(nrrs, eduCounts) {
      // 1. Chart Unsur (Bar)
      const ctxUnsur = document.getElementById('chart-unsur').getContext('2d');
      if (chartUnsurInstance) chartUnsurInstance.destroy();

      chartUnsurInstance = new Chart(ctxUnsur, {
        type: 'bar',
        data: {
          labels: ['U1', 'U2', 'U3', 'U4', 'U5', 'U6', 'U7', 'U8', 'U9'],
          datasets: [{
            label: 'Skor NRR',
            data: nrrs,
            backgroundColor: '#004080',
            borderRadius: 8,
            borderSkipped: false,
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            y: { min: 0, max: 4, ticks: { stepSize: 1 } }
          },
          plugins: {
            legend: { display: false }
          }
        }
      });

      // 2. Chart Pendidikan (Doughnut)
      const ctxEdu = document.getElementById('chart-pendidikan').getContext('2d');
      if (chartPendidikanInstance) chartPendidikanInstance.destroy();

      const labels = Object.keys(eduCounts);
      const dataValues = Object.values(eduCounts);

      chartPendidikanInstance = new Chart(ctxEdu, {
        type: 'doughnut',
        data: {
          labels: labels.length ? labels : ['Belum Ada Data'],
          datasets: [{
            data: dataValues.length ? dataValues : [1],
            backgroundColor: ['#004080', '#1d63ed', '#60a5fa', '#93c5fd', '#c7d2fe', '#e0e7ff'],
            borderWidth: 2
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: { position: 'bottom', labels: { boxWidth: 12, font: { size: 10 } } }
          }
        }
      });
    }

    function renderSaran(saranList) {
      const container = document.getElementById('saran-list');
      container.innerHTML = '';

      const validSaran = saranList.filter(s => s.text && s.text !== '-');
      if (validSaran.length === 0) {
        container.innerHTML = '<p class="text-slate-400 italic">Belum ada saran khusus dari responden.</p>';
        return;
      }

      validSaran.forEach(item => {
        const div = document.createElement('div');
        div.className = "p-3 bg-slate-50 rounded-xl border border-slate-200 text-slate-700 space-y-1";
        div.innerHTML = `
          <p class="font-medium text-slate-800">"${item.text}"</p>
          <span class="text-[10px] text-slate-400 block">${new Date(item.date).toLocaleString('id-ID')}</span>
        `;
        container.appendChild(div);
      });
    }

    // Isi Data Simulasi
    async function generateMockData() {
      const namaOptions = ['Ahmad Subagja', 'Siti Rahmawati', 'Budi Santoso', 'Dewi Lestari', 'Eko Prasetyo', 'Rina Wijaya'];
      const alamatOptions = ['Jl. Merdeka No. 12', 'Kel. Sukajadi', 'Kec. Lowokwaru', 'Desa Maju Jaya', 'Jl. Mawar No. 45'];
      const eduOptions = ['SD', 'SMP', 'SMA', 'S1', 'S2'];
      const jobOptions = ['PNS', 'Swasta', 'Wirausaha', 'TNI', 'POLRI'];
      const timeOptions = ['08.00 – 12.00', '13.00 – 17.00'];
      const genderOptions = ['Laki-laki', 'Perempuan'];

      const mockData = [];
      for (let i = 0; i < 15; i++) {
        mockData.push({
          timestamp: new Date().toISOString(),
          nama: namaOptions[Math.floor(Math.random() * namaOptions.length)],
          alamat: alamatOptions[Math.floor(Math.random() * alamatOptions.length)],
          pendidikan: eduOptions[Math.floor(Math.random() * eduOptions.length)],
          pekerjaan: jobOptions[Math.floor(Math.random() * jobOptions.length)],
          jenis_kelamin: genderOptions[Math.floor(Math.random() * genderOptions.length)],
          waktu_pelayanan: timeOptions[Math.floor(Math.random() * timeOptions.length)],
          u1: Math.floor(Math.random() * 2) + 3,
          u2: Math.floor(Math.random() * 2) + 3,
          u3: Math.floor(Math.random() * 3) + 2,
          u4: 4,
          u5: Math.floor(Math.random() * 2) + 3,
          u6: Math.floor(Math.random() * 2) + 3,
          u7: Math.floor(Math.random() * 2) + 3,
          u8: Math.floor(Math.random() * 3) + 2,
          u9: Math.floor(Math.random() * 2) + 3,
          saran: i % 3 === 0 ? "Pelayanan sudah sangat memuaskan, pertahankan keramahan petugas!" : "-"
        });
      }

      if (window.db && window.currentUser) {
        const { collection, addDoc } = await import("https://www.gstatic.com/firebasejs/11.6.1/firebase-firestore.js");
        const responsesRef = collection(window.db, 'artifacts', window.appId, 'public', 'data', 'responses');
        for (const item of mockData) {
          await addDoc(responsesRef, item);
        }
      } else {
        window.surveyData = mockData;
        localStorage.setItem('skm_survey_responses', JSON.stringify(window.surveyData));
        updateDashboard();
      }
      showToast('15 data simulasi berhasil ditambahkan ke database Admin!', 'success');
    }

    // Reset Data
    function clearSurveyData() {
      showConfirmModal(
        'Reset Seluruh Data Survei',
        'Apakah Anda yakin ingin menghapus SELURUH data tanggapan dari database? Tindakan ini tidak dapat dibatalkan.',
        async () => {
          if (window.db && window.currentUser) {
            try {
              const { collection, getDocs, doc, deleteDoc } = await import("https://www.gstatic.com/firebasejs/11.6.1/firebase-firestore.js");
              const responsesRef = collection(window.db, 'artifacts', window.appId, 'public', 'data', 'responses');
              const snapshot = await getDocs(responsesRef);
              const deletePromises = snapshot.docs.map(d => deleteDoc(doc(window.db, 'artifacts', window.appId, 'public', 'data', 'responses', d.id)));
              await Promise.all(deletePromises);
              showToast('Database cloud berhasil di-reset.', 'success');
            } catch (e) {
              console.error("Error clearing docs:", e);
              showToast('Gagal mereset database cloud.', 'error');
            }
          } else {
            const dbResponses = @json($responses ?? []);
window.surveyData = Array.isArray(dbResponses) && dbResponses.length > 0 ? dbResponses : [];
            localStorage.removeItem('skm_survey_responses');
            updateDashboard();
            showToast('Penyimpanan lokal telah dibersihkan.', 'success');
          }
        }
      );
    }
  </script>
</body>
</html>

