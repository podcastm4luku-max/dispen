<!DOCTYPE html>
<html lang="id-ID">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Dikbud Maluku</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com">
    function openTambahAgendaModal() {
        const form = document.getElementById('form-tambah-agenda');
        if (form) form.reset();
        const modal = document.getElementById('modal-tambah-agenda');
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
    }

    function openEditAgendaModal(item) {
        const form = document.getElementById('form-edit-agenda');
        if (!form) return;
        form.action = '/admin/agenda/' + item.id;
        document.getElementById('edit-agenda-title').value = item.title || '';
        document.getElementById('edit-agenda-date').value = item.date || '';
        document.getElementById('edit-agenda-location').value = item.location || '';

        const modal = document.getElementById('modal-edit-agenda');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

</script>
    
<!-- Modal Tambah Media Galeri -->
<div id="modal-tambah-galeri" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-tambah-galeri').classList.add('hidden')"></div>
    <div class="relative bg-white w-full max-w-xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
            <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                <span class="material-icons text-dikbud-secondary">add_photo_alternate</span> Tambah Media Galeri (Foto / Video)
            </h3>
            <button onclick="document.getElementById('modal-tambah-galeri').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                <span class="material-icons">close</span>
            </button>
        </div>
        <div class="p-6 overflow-y-auto space-y-4">
            <form id="form-tambah-galeri" action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <!-- Tipe Media Switcher -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Jenis Media <span class="text-red-500">*</span></label>
                        <div class="grid grid-cols-2 gap-3">
                            <label class="flex items-center justify-center gap-2 p-3 border-2 border-dikbud-primary bg-blue-50/50 rounded-xl cursor-pointer text-xs font-bold text-dikbud-primary transition-all" id="label-tambah-type-foto">
                                <input type="radio" name="type" value="foto" checked onchange="toggleGaleriTypeForm('foto', 'tambah')" class="hidden">
                                <span class="material-icons text-sm">photo_camera</span> Foto / Gambar
                            </label>
                            <label class="flex items-center justify-center gap-2 p-3 border-2 border-slate-200 hover:border-slate-300 rounded-xl cursor-pointer text-xs font-bold text-slate-600 transition-all" id="label-tambah-type-video">
                                <input type="radio" name="type" value="video" onchange="toggleGaleriTypeForm('video', 'tambah')" class="hidden">
                                <span class="material-icons text-sm">videocam</span> Video (YouTube / MP4)
                            </label>
                        </div>
                    </div>

                    <!-- Judul & Kategori -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Judul Kegiatan / Dokumentasi <span class="text-red-500">*</span></label>
                        <input type="text" name="title" required placeholder="Contoh: Rapat Koordinasi Kurikulum Merdeka Maluku 2026" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium">
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Kategori</label>
                            <input type="text" name="category" placeholder="Contoh: Kegiatan Dinas, Kebudayaan, Prestasi" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Tanggal Kegiatan</label>
                            <input type="date" name="event_date" value="{{ date('Y-m-d') }}" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                    </div>

                    <!-- Conditional Inputs: Foto -->
                    <div id="box-tambah-foto" class="space-y-3 p-3.5 bg-blue-50/40 rounded-xl border border-blue-100">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Unggah File Foto / Gambar</label>
                            <input type="file" name="image" accept="image/*" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-white file:text-dikbud-primary hover:file:bg-slate-100 cursor-pointer">
                            <p class="text-[11px] text-slate-400 mt-1">Format: JPG, PNG, WEBP (Maksimal 10MB)</p>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Atau URL Gambar Online</label>
                            <input type="text" name="media_url" placeholder="https://..." class="w-full px-3.5 py-2 bg-white rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                    </div>

                    <!-- Conditional Inputs: Video -->
                    <div id="box-tambah-video" class="hidden space-y-3 p-3.5 bg-red-50/40 rounded-xl border border-red-100">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Tautan / Link Video YouTube <span class="text-red-500">*</span></label>
                            <input type="text" id="tambah-video-yt" name="media_url_video" placeholder="Contoh: https://www.youtube.com/watch?v=xxxx atau https://youtu.be/xxxx" class="w-full px-3.5 py-2 bg-white rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                            <p class="text-[11px] text-slate-400 mt-1">Thumbnail YouTube akan otomatis terambil secara otomatis.</p>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Atau Unggah File Video MP4 (Opsional)</label>
                            <input type="file" name="video_file" accept="video/mp4,video/webm" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-white file:text-red-600 hover:file:bg-slate-100 cursor-pointer">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Custom Thumbnail Video (Opsional)</label>
                            <input type="file" name="thumbnail_file" accept="image/*" class="w-full text-xs text-slate-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:bg-white file:text-slate-700 cursor-pointer">
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Deskripsi / Keterangan Singkat</label>
                        <textarea name="description" rows="2" placeholder="Uraian singkat mengenai kegiatan dokumentasi ini..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm"></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-3 pt-1">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Urutan</label>
                            <input type="number" name="order" value="1" min="1" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div class="flex items-center pt-5">
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 text-dikbud-primary rounded focus:ring-dikbud-primary border-slate-300">
                                <span class="text-xs font-semibold text-slate-700">Tampilkan di Galeri Publik</span>
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
            <button onclick="document.getElementById('modal-tambah-galeri').classList.add('hidden')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
            <button type="submit" form="form-tambah-galeri" class="px-4 py-2 text-sm font-bold bg-dikbud-primary text-white hover:bg-dikbud-dark rounded-lg transition-colors shadow-md">Simpan Media</button>
        </div>
    </div>
</div>

<!-- Modal Edit Media Galeri -->
<div id="modal-edit-galeri" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-edit-galeri').classList.add('hidden')"></div>
    <div class="relative bg-white w-full max-w-xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
            <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                <span class="material-icons text-dikbud-secondary">edit</span> Edit Media Galeri
            </h3>
            <button onclick="document.getElementById('modal-edit-galeri').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                <span class="material-icons">close</span>
            </button>
        </div>
        <div class="p-6 overflow-y-auto space-y-4">
            <form id="form-edit-galeri" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <!-- Tipe Media Selector (Readonly/Disabled for stability) -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Tipe Media</label>
                        <input type="text" id="edit-galeri-type-badge" readonly class="w-full px-3 py-2 bg-slate-100 rounded-lg border border-slate-200 text-xs font-bold text-slate-600">
                        <input type="hidden" id="edit-galeri-type" name="type" value="foto">
                    </div>

                    <!-- Current Media Preview -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Preview Media Saat Ini</label>
                        <div class="flex items-center gap-3 p-2.5 bg-slate-50 border border-slate-200 rounded-xl">
                            <img id="edit-galeri-preview-img" src="" alt="Preview" class="w-20 h-14 object-cover rounded-lg border border-slate-200 bg-white">
                            <div class="text-xs text-slate-500 overflow-hidden flex-1">
                                <span class="font-bold text-slate-700 block">Tautan / Path Aktif:</span>
                                <span id="edit-galeri-preview-path" class="break-all text-[11px] text-slate-500 block truncate"></span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Judul Kegiatan / Dokumentasi <span class="text-red-500">*</span></label>
                        <input type="text" id="edit-galeri-title" name="title" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium">
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Kategori</label>
                            <input type="text" id="edit-galeri-category" name="category" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Tanggal Kegiatan</label>
                            <input type="date" id="edit-galeri-event-date" name="event_date" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                    </div>

                    <!-- Photo replacement box -->
                    <div id="box-edit-foto" class="space-y-3 p-3.5 bg-blue-50/40 rounded-xl border border-blue-100">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Ganti File Foto Baru</label>
                            <input type="file" name="image" accept="image/*" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-white file:text-dikbud-primary cursor-pointer">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Atau Ubah URL Gambar Online</label>
                            <input type="text" id="edit-galeri-media-url-foto" name="media_url" placeholder="https://..." class="w-full px-3.5 py-2 bg-white rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                    </div>

                    <!-- Video replacement box -->
                    <div id="box-edit-video" class="hidden space-y-3 p-3.5 bg-red-50/40 rounded-xl border border-red-100">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Tautan / Link YouTube</label>
                            <input type="text" id="edit-galeri-media-url-video" name="media_url_video" placeholder="https://www.youtube.com/watch?v=..." class="w-full px-3.5 py-2 bg-white rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Ganti File Video MP4</label>
                            <input type="file" name="video_file" accept="video/mp4,video/webm" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-white file:text-red-600 cursor-pointer">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Ganti Thumbnail Video</label>
                            <input type="file" name="thumbnail_file" accept="image/*" class="w-full text-xs text-slate-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:bg-white file:text-slate-700 cursor-pointer">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Deskripsi / Keterangan</label>
                        <textarea id="edit-galeri-description" name="description" rows="2" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm"></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-3 pt-1">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Urutan</label>
                            <input type="number" id="edit-galeri-order" name="order" value="1" min="1" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div class="flex items-center pt-5">
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" id="edit-galeri-is-active" name="is_active" value="1" class="w-4 h-4 text-dikbud-primary rounded focus:ring-dikbud-primary border-slate-300">
                                <span class="text-xs font-semibold text-slate-700">Tampilkan di Galeri Publik</span>
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
            <button onclick="document.getElementById('modal-edit-galeri').classList.add('hidden')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
            <button type="submit" form="form-edit-galeri" class="px-4 py-2 text-sm font-bold bg-dikbud-primary text-white hover:bg-dikbud-dark rounded-lg transition-colors shadow-md">Simpan Perubahan</button>
        </div>
    </div>
</div>

<script>

    function toggleGaleriTypeForm(type, prefix) {
        const boxFoto = document.getElementById('box-' + prefix + '-foto');
        const boxVideo = document.getElementById('box-' + prefix + '-video');
        const labelFoto = document.getElementById('label-' + prefix + '-type-foto');
        const labelVideo = document.getElementById('label-' + prefix + '-type-video');

        if (type === 'video') {
            boxFoto.classList.add('hidden');
            boxVideo.classList.remove('hidden');
            if (labelFoto && labelVideo) {
                labelFoto.className = 'flex items-center justify-center gap-2 p-3 border-2 border-slate-200 hover:border-slate-300 rounded-xl cursor-pointer text-xs font-bold text-slate-600 transition-all';
                labelVideo.className = 'flex items-center justify-center gap-2 p-3 border-2 border-red-600 bg-red-50/50 rounded-xl cursor-pointer text-xs font-bold text-red-600 transition-all';
            }
        } else {
            boxVideo.classList.add('hidden');
            boxFoto.classList.remove('hidden');
            if (labelFoto && labelVideo) {
                labelFoto.className = 'flex items-center justify-center gap-2 p-3 border-2 border-dikbud-primary bg-blue-50/50 rounded-xl cursor-pointer text-xs font-bold text-dikbud-primary transition-all';
                labelVideo.className = 'flex items-center justify-center gap-2 p-3 border-2 border-slate-200 hover:border-slate-300 rounded-xl cursor-pointer text-xs font-bold text-slate-600 transition-all';
            }
        }
    }

    function openTambahGaleriModal() {
        document.getElementById('form-tambah-galeri').reset();
        toggleGaleriTypeForm('foto', 'tambah');
        document.getElementById('modal-tambah-galeri').classList.remove('hidden');
        document.getElementById('modal-tambah-galeri').classList.add('flex');
    }

    function openEditGaleriModal(item) {
        const form = document.getElementById('form-edit-galeri');
        form.action = '/admin/galeri/' + item.id;
        document.getElementById('edit-galeri-type').value = item.type;
        document.getElementById('edit-galeri-type-badge').value = item.type === 'video' ? 'VIDEO DOKUMENTASI' : 'FOTO KEGIATAN';
        document.getElementById('edit-galeri-title').value = item.title || '';
        document.getElementById('edit-galeri-category').value = item.category || '';
        document.getElementById('edit-galeri-description').value = item.description || '';
        document.getElementById('edit-galeri-order').value = item.order || 1;
        document.getElementById('edit-galeri-is-active').checked = Boolean(item.is_active);

        if (item.event_date) {
            const d = new Date(item.event_date);
            const formatted = d.toISOString().split('T')[0];
            document.getElementById('edit-galeri-event-date').value = formatted;
        } else {
            document.getElementById('edit-galeri-event-date').value = '';
        }

        const boxEditFoto = document.getElementById('box-edit-foto');
        const boxEditVideo = document.getElementById('box-edit-video');

        if (item.type === 'video') {
            boxEditFoto.classList.add('hidden');
            boxEditVideo.classList.remove('hidden');
            document.getElementById('edit-galeri-media-url-video').value = item.media_url || '';
        } else {
            boxEditVideo.classList.add('hidden');
            boxEditFoto.classList.remove('hidden');
            document.getElementById('edit-galeri-media-url-foto').value = item.media_url || '';
        }

        let previewSrc = item.display_url || '/images/slider-default.jpg';
        document.getElementById('edit-galeri-preview-img').src = previewSrc;
        document.getElementById('edit-galeri-preview-path').innerText = item.file_path || item.media_url || item.thumbnail || '-';

        const modal = document.getElementById('modal-edit-galeri');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

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
    
    function openTambahAgendaModal() {
        const form = document.getElementById('form-tambah-agenda');
        if (form) form.reset();
        const modal = document.getElementById('modal-tambah-agenda');
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
    }

    function openEditAgendaModal(item) {
        const form = document.getElementById('form-edit-agenda');
        if (!form) return;
        form.action = '/admin/agenda/' + item.id;
        document.getElementById('edit-agenda-title').value = item.title || '';
        document.getElementById('edit-agenda-date').value = item.date || '';
        document.getElementById('edit-agenda-location').value = item.location || '';

        const modal = document.getElementById('modal-edit-agenda');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

</script>
</head>
<body class="bg-slate-50 font-sans flex h-screen overflow-hidden text-slate-800">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col hidden md:flex transition-all">
        <div class="h-16 flex items-center gap-3 px-6 border-b border-slate-100">
            <div class="w-8 h-8 bg-dikbud-primary rounded-full flex items-center justify-center overflow-hidden">
                <img src="{{ asset('images/logo-dikbud.png') }}?v={{ filemtime(public_path('images/logo-dikbud.png')) }}" alt="Logo Dinas Pendidikan dan Kebudayaan Provinsi Maluku" class="w-full h-full object-contain p-0.5">
            </div>
            <span class="font-bold text-sm text-dikbud-primary">CMS Dikbud</span>
        </div>
        
        <div class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
            <p class="px-3 text-xs font-bold text-slate-400 uppercase tracking-wider mb-2 mt-4">Menu Utama</p>
            <a href="/dashboard" class="flex items-center gap-3 px-3 py-2.5 {{ (!isset($view_type) || $view_type == 'overview') ? 'bg-dikbud-primary text-white font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-dikbud-primary' }} rounded-lg font-medium text-sm transition-colors">
                <span class="material-icons-outlined text-[20px]">dashboard</span> Dashboard
            </a>
            <a href="/admin/berita" class="flex items-center gap-3 px-3 py-2.5 {{ (isset($view_type) && $view_type == 'berita') ? 'bg-dikbud-primary text-white font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-dikbud-primary' }} rounded-lg font-medium text-sm transition-colors">
                <span class="material-icons-outlined text-[20px]">article</span> Berita & Artikel
            </a>
            <a href="{{ route('admin.agenda') }}" class="flex items-center gap-3 px-3 py-2.5 {{ (isset($view_type) && $view_type == 'agenda') ? 'bg-dikbud-primary text-white font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-dikbud-primary' }} rounded-lg font-medium text-sm transition-colors">
                <span class="material-icons-outlined text-[20px]">calendar_month</span> Agenda Kegiatan Dinas
            </a>
            <a href="{{ route('admin.dokumen.peraturan') }}" class="flex items-center gap-3 px-3 py-2.5 {{ (isset($view_type) && $view_type == 'dokumen_peraturan') ? 'bg-dikbud-primary text-white font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-dikbud-primary' }} rounded-lg font-medium text-sm transition-colors">
                <span class="material-icons-outlined text-[20px]">download</span> Pusat Unduhan Dokumen
            </a>
            <a href="{{ route('admin.portal') }}" class="flex items-center gap-3 px-3 py-2.5 {{ (isset($view_type) && $view_type == 'portal') ? 'bg-dikbud-primary text-white font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-dikbud-primary' }} rounded-lg font-medium text-sm transition-colors">
                <span class="material-icons-outlined text-[20px]">public</span> Portal Berita & Budaya
            </a>
            <a href="{{ route('admin.hero') }}" class="flex items-center gap-3 px-3 py-2.5 {{ (isset($view_type) && $view_type == 'hero') ? 'bg-dikbud-primary text-white font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-dikbud-primary' }} rounded-lg font-medium text-sm transition-colors">
                <span class="material-icons-outlined text-[20px]">campaign</span> Banner & Sambutan Kadis
            </a>
            <a href="{{ route('admin.program.unggulan') }}" class="flex items-center gap-3 px-3 py-2.5 {{ (isset($view_type) && $view_type == 'program_unggulan') ? 'bg-dikbud-primary text-white font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-dikbud-primary' }} rounded-lg font-medium text-sm transition-colors">
                <span class="material-icons-outlined text-[20px]">verified</span> Dokumen SK &amp; Layanan Disetujui
            </a>
            <a href="{{ route('admin.transparansi.posters') }}" class="flex items-center gap-3 px-3 py-2.5 {{ (isset($view_type) && $view_type == 'transparansi_posters') ? 'bg-dikbud-primary text-white font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-dikbud-primary' }} rounded-lg font-medium text-sm transition-colors">
                <span class="material-icons-outlined text-[20px]">aspect_ratio</span> Poster Transparansi
            </a>
            <a href="{{ route('admin.galeri') }}" class="flex items-center gap-3 px-3 py-2.5 {{ (isset($view_type) && $view_type == 'galeri') ? 'bg-dikbud-primary text-white font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-dikbud-primary' }} rounded-lg font-medium text-sm transition-colors">
                <span class="material-icons-outlined text-[20px]">collections</span> Galeri Foto & Video
            </a>
            <a href="{{ route('admin.sosmed') }}" class="flex items-center gap-3 px-3 py-2.5 {{ (isset($view_type) && $view_type == 'sosmed') ? 'bg-dikbud-primary text-white font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-dikbud-primary' }} rounded-lg font-medium text-sm transition-colors">
                <span class="material-icons-outlined text-[20px]">share</span> Media Sosial
            </a>
            <a href="{{ route('admin.slider') }}" class="flex items-center gap-3 px-3 py-2.5 {{ (isset($view_type) && $view_type == 'slider') ? 'bg-dikbud-primary text-white font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-dikbud-primary' }} rounded-lg font-medium text-sm transition-colors">
                <span class="material-icons-outlined text-[20px]">photo_library</span> Foto Slide Beranda
            </a>
            <a href="{{ route('admin.banner_iklan') }}" class="flex items-center gap-3 px-3 py-2.5 {{ (isset($view_type) && $view_type == 'banner_iklan') ? 'bg-dikbud-primary text-white font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-dikbud-primary' }} rounded-lg font-medium text-sm transition-colors">
                <span class="material-icons-outlined text-[20px]">view_carousel</span> Banner Infografis & Iklan
            </a>
            <a href="{{ route('admin.monev') }}" class="flex items-center gap-3 px-3 py-2.5 {{ (isset($view_type) && $view_type == 'monev') ? 'bg-dikbud-primary text-white font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-dikbud-primary' }} rounded-lg font-medium text-sm transition-colors">
                <span class="material-icons-outlined text-[20px]">analytics</span> Data Monev SMA/SMK
            </a>
            
                        <p class="px-3 text-xs font-bold text-slate-400 uppercase tracking-wider mb-2 mt-6">Profil & Kelembagaan</p>
            <a href="{{ route('admin.profil', ['tab' => 'visi_misi']) }}" class="flex items-center gap-3 px-3 py-2.5 {{ (isset($view_type) && $view_type == 'profil' && (!isset($tab) || $tab == 'visi_misi')) ? 'bg-dikbud-primary text-white font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-dikbud-primary' }} rounded-lg font-medium text-sm transition-colors">
                <span class="material-icons-outlined text-[20px]">visibility</span> Visi &amp; Misi
            </a>
            <a href="{{ route('admin.profil', ['tab' => 'tugas_fungsi']) }}" class="flex items-center gap-3 px-3 py-2.5 {{ (isset($view_type) && $view_type == 'profil' && (isset($tab) && $tab == 'tugas_fungsi')) ? 'bg-dikbud-primary text-white font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-dikbud-primary' }} rounded-lg font-medium text-sm transition-colors">
                <span class="material-icons-outlined text-[20px]">assignment</span> Tugas &amp; Fungsi
            </a>
            <a href="{{ route('admin.profil', ['tab' => 'struktur_organisasi']) }}" class="flex items-center gap-3 px-3 py-2.5 {{ (isset($view_type) && $view_type == 'profil' && (isset($tab) && $tab == 'struktur_organisasi')) ? 'bg-dikbud-primary text-white font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-dikbud-primary' }} rounded-lg font-medium text-sm transition-colors">
                <span class="material-icons-outlined text-[20px]">account_tree</span> Struktur Organisasi
            </a>
            
<p class="px-3 text-xs font-bold text-slate-400 uppercase tracking-wider mb-2 mt-6">Layanan Publik</p>
            <a href="{{ route('admin.sop') }}" class="flex items-center gap-3 px-3 py-2.5 {{ (isset($view_type) && $view_type == 'sop') ? 'bg-dikbud-primary text-white font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-dikbud-primary' }} rounded-lg font-medium text-sm transition-colors">
                <span class="material-icons-outlined text-[20px]">assignment_turned_in</span> SOP 14 Komponen &amp; Berkas
            </a>
            <a href="{{ route('admin.layanan') }}" class="flex items-center gap-3 px-3 py-2.5 {{ (isset($view_type) && $view_type == 'layanan') ? 'bg-dikbud-primary text-white font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-dikbud-primary' }} rounded-lg font-medium text-sm transition-colors">
                <span class="material-icons-outlined text-[20px]">room_service</span> Layanan Publik Digital
            </a>
            <a href="/admin/pengaduan" class="flex items-center justify-between px-3 py-2.5 {{ (isset($view_type) && $view_type == 'pengaduan') ? 'bg-dikbud-primary text-white font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-dikbud-primary' }} rounded-lg font-medium text-sm transition-colors">
                <div class="flex items-center gap-3">
                    <span class="material-icons-outlined text-[20px]">support_agent</span> Layanan Pengaduan (E-Lapor)
                </div>
            </a>
            <a href="/admin/ppid" class="flex items-center gap-3 px-3 py-2.5 {{ (isset($view_type) && $view_type == 'ppid') ? 'bg-dikbud-primary text-white font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-dikbud-primary' }} rounded-lg font-medium text-sm transition-colors">
                <span class="material-icons-outlined text-[20px]">policy</span> Permohonan PPID
            </a>
            
            <p class="px-3 text-xs font-bold text-slate-400 uppercase tracking-wider mb-2 mt-6">Pengaturan</p>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-50 hover:text-dikbud-primary rounded-lg font-medium text-sm transition-colors">
                <span class="material-icons-outlined text-[20px]">settings</span> Konfigurasi Web
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-50 hover:text-dikbud-primary rounded-lg font-medium text-sm transition-colors">
                <span class="material-icons-outlined text-[20px]">people</span> Manajemen User
            </a>
        </div>
        
        <div class="p-4 border-t border-slate-200">
            <a href="/logout" class="flex items-center gap-3 px-3 py-2 text-red-600 hover:bg-red-50 rounded-lg font-medium text-sm transition-colors w-full">
                <span class="material-icons-outlined text-[20px]">logout</span> Keluar
            </a>
        </div>
    </aside>

    <!-- Main Wrapper -->
    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        <!-- Top Header -->
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-6 z-10">
            <div class="flex items-center gap-4">
                <button class="md:hidden text-slate-500 hover:text-dikbud-primary">
                    <span class="material-icons">menu</span>
                </button>
                <div class="relative hidden sm:block">
                    <span class="material-icons-outlined absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400 text-[18px]">search</span>
                    <input type="text" placeholder="Cari data..." class="pl-10 pr-4 py-1.5 border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-dikbud-secondary w-64">
                </div>
            </div>
            <div class="flex items-center gap-4">
                <button class="relative text-slate-500 hover:text-dikbud-primary transition-colors">
                    <span class="material-icons-outlined">notifications</span>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full border border-white"></span>
                </button>
                <div class="h-8 w-px bg-slate-200 mx-2"></div>
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-dikbud-primary text-white font-bold flex items-center justify-center text-xs shadow">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <div class="hidden sm:block">
                        <p class="text-xs font-bold text-slate-700">{{ Auth::user()->name ?? 'Administrator Utama Disdikbud Maluku' }}</p>
                        <p class="text-[10px] text-slate-500">{{ Auth::user()->email ?? 'admin@malukuprov.go.id' }}</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="flex-1 overflow-y-auto p-6">
            @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-3">
                    <span class="material-icons text-emerald-600">check_circle</span>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700"><span class="material-icons text-sm">close</span></button>
            </div>
            @endif

            @if(isset($errors) && $errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-xl shadow-sm">
                <div class="flex items-center gap-3 mb-2">
                    <span class="material-icons text-red-600">error</span>
                    <span class="text-sm font-bold">Terjadi kesalahan input:</span>
                </div>
                <ul class="list-disc pl-8 text-xs space-y-1">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(!isset($view_type))
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800">Ikhtisar Dashboard</h1>
                    <p class="text-sm text-slate-500 mt-1">Selamat datang kembali, <strong>{{ Auth::user()->name ?? 'Administrator' }}</strong>! Berikut adalah ringkasan aktivitas web Anda.</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg text-xs font-semibold">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Database Terhubung
                    </span>
                    <a href="/" target="_blank" class="hidden sm:flex items-center gap-2 px-4 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors shadow-sm">
                        <span class="material-icons-outlined text-[16px]">visibility</span> Lihat Website
                    </a>
                </div>
            </div>

            <!-- Database Account Info Banner -->
            <div class="bg-gradient-to-r from-dikbud-dark to-dikbud-primary rounded-2xl p-5 mb-6 text-white shadow-md flex flex-col md:flex-row md:items-center justify-between gap-4 border border-blue-900">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-white/10 backdrop-blur border border-white/20 flex items-center justify-center text-amber-300 flex-shrink-0">
                        <span class="material-icons text-2xl">account_circle</span>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h3 class="font-bold text-base text-white">{{ Auth::user()->name ?? 'Administrator Utama Disdikbud Maluku' }}</h3>
                            <span class="bg-amber-400/20 text-amber-300 text-[10px] font-bold px-2 py-0.5 rounded-full border border-amber-400/30 uppercase tracking-wider">Akun Database Utama</span>
                        </div>
                        <p class="text-xs text-blue-200 mt-0.5 flex items-center gap-2 flex-wrap">
                            <span><span class="text-slate-400">Email:</span> {{ Auth::user()->email ?? 'admin@malukuprov.go.id' }}</span>
                            <span>•</span>
                            <span><span class="text-slate-400">Role:</span> Super Administrator</span>
                            <span>•</span>
                            <span><span class="text-slate-400">Database Engine:</span> SQLite Connected</span>
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.pengaduan') }}" class="px-3.5 py-2 bg-white/10 hover:bg-white/20 border border-white/20 rounded-xl text-xs font-semibold text-white transition flex items-center gap-1.5">
                        <span class="material-icons text-sm">support_agent</span> Kelola Aspirasi
                    </a>
                    <a href="{{ route('admin.ppid') }}" class="px-3.5 py-2 bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold rounded-xl text-xs transition flex items-center gap-1.5">
                        <span class="material-icons text-sm">policy</span> Permohonan PPID
                    </a>
                </div>
            </div>

            <!-- Stats Widget -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm flex items-center justify-between hover:border-dikbud-secondary transition-colors">
                    <div>
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Total Berita</p>
                        <h3 class="text-2xl font-black text-slate-800">{{ $totalBerita }}</h3>
                        <p class="text-xs text-emerald-600 mt-1 font-medium">+5 Bulan ini</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center">
                        <span class="material-icons">article</span>
                    </div>
                </div>
                <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm flex items-center justify-between hover:border-dikbud-secondary transition-colors">
                    <div>
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Pengumuman</p>
                        <h3 class="text-2xl font-black text-slate-800">{{ $totalPengumuman }}</h3>
                        <p class="text-xs text-emerald-600 mt-1 font-medium">{{ $activePengumuman }} Sedang aktif</p>
                    </div>
                    <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-full flex items-center justify-center">
                        <span class="material-icons">campaign</span>
                    </div>
                </div>
                <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm flex items-center justify-between hover:border-dikbud-secondary transition-colors">
                    <div>
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Pengaduan & Aspirasi</p>
                        <h3 class="text-2xl font-black text-slate-800">{{ $newComplaints }}</h3>
                        <p class="text-xs text-red-500 mt-1 font-medium">{{ $unprocessedComplaints }} Belum diproses</p>
                    </div>
                    <div class="w-12 h-12 bg-red-50 text-red-600 rounded-full flex items-center justify-center">
                        <span class="material-icons">support_agent</span>
                    </div>
                </div>
                <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm flex items-center justify-between hover:border-dikbud-secondary transition-colors">
                    <div>
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Pengunjung Web</p>
                        <h3 class="text-2xl font-black text-slate-800">{{ $totalVisitors }}</h3>
                        <p class="text-xs text-emerald-600 mt-1 font-medium">{{ $todayVisitors }} Kunjungan hari ini</p>
                    </div>
                    <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center">
                        <span class="material-icons">trending_up</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Data Tabel (Berita Terbaru) -->
                <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                    <div class="px-5 py-4 border-b border-slate-200 flex justify-between items-center bg-slate-50/50">
                        <h3 class="font-bold text-slate-800">Publikasi Terbaru</h3>
                        <a href="{{ route('admin.berita') }}" class="text-dikbud-secondary text-sm font-semibold hover:underline">Lihat Semua</a>
                    </div>
                    <div class="overflow-x-auto flex-1">
                        <table class="w-full text-left text-sm">
                            <thead class="text-xs text-slate-500 bg-slate-50 border-b border-slate-200 uppercase">
                                <tr>
                                    <th class="px-5 py-3 font-semibold">Judul Konten</th>
                                    <th class="px-5 py-3 font-semibold">Kategori</th>
                                    <th class="px-5 py-3 font-semibold">Status</th>
                                    <th class="px-5 py-3 font-semibold text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-slate-600">
                                @foreach($recentPosts as $post)
                                <tr>
                                    <td class="px-5 py-3 font-medium text-slate-800">{{ $post->title }}</td>
                                    <td class="px-5 py-3">{{ $post->type }}</td>
                                    <td class="px-5 py-3">
                                        @if($post->status == 'Published')
                                        <span class="bg-emerald-100 text-emerald-700 px-2 py-1 rounded text-xs font-semibold">{{ $post->status }}</span>
                                        @else
                                        <span class="bg-amber-100 text-amber-700 px-2 py-1 rounded text-xs font-semibold">{{ $post->status }}</span>
                                        @endif
                                    </td>
                                    <td class="px-5 py-3 text-right">
                                        <button onclick="openEditBeritaModal({{ $post->id }})" class="text-slate-400 hover:text-dikbud-secondary"><span class="material-icons-outlined text-[18px]">edit</span></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Laporan Masuk -->
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm flex flex-col">
                    <div class="px-5 py-4 border-b border-slate-200 bg-slate-50/50 flex justify-between items-center">
                        <h3 class="font-bold text-slate-800">Layanan & Aspirasi Masuk</h3>
                        <span class="text-xs font-bold text-red-600 bg-red-50 px-2 py-0.5 rounded-full">{{ $unprocessedComplaints }} Baru</span>
                    </div>
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <ul class="space-y-4">
                            @foreach($recentComplaints as $complaint)
                            <li class="flex gap-3 items-start border-b border-slate-100 pb-3">
                                <div class="w-8 h-8 rounded-full {{ $complaint->status == 'Menunggu Respon' ? 'bg-red-100 text-red-600' : ($complaint->status == 'Diproses' ? 'bg-amber-100 text-amber-600' : 'bg-green-100 text-green-600') }} flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <span class="material-icons text-[16px]">support_agent</span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between gap-1 mb-1">
                                        <p class="text-xs font-bold text-slate-800 truncate">{{ $complaint->sender_name }}</p>
                                        <span class="text-[9px] {{ $complaint->status == 'Menunggu Respon' ? 'bg-red-100 text-red-700' : ($complaint->status == 'Diproses' ? 'bg-amber-100 text-amber-700' : 'bg-emerald-100 text-emerald-700') }} px-1.5 py-0.5 rounded font-bold whitespace-nowrap">{{ $complaint->status }}</span>
                                    </div>
                                    <p class="text-[11px] font-semibold text-slate-700 leading-tight mb-0.5 truncate">{{ $complaint->title }}</p>
                                    @if($complaint->instansi)
                                    <p class="text-[10px] text-blue-600 mb-1">📍 {{ $complaint->instansi }}</p>
                                    @endif
                                    <p class="text-xs text-slate-500 line-clamp-1">{{ $complaint->description }}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('admin.pengaduan') }}" class="w-full mt-4 py-2 border border-slate-200 text-slate-600 text-sm font-semibold rounded-lg hover:bg-slate-50 transition-colors text-center block">Kelola Semua Laporan & Aspirasi</a>
                    </div>
                </div>
            </div>
            
            @elseif($view_type == "berita")
              <div class="mb-6 flex justify-between items-center">
                  <div>
                      <h1 class="text-2xl font-bold text-slate-800">Manajemen Berita & Artikel</h1>
                      <p class="text-sm text-slate-500 mt-1">Kelola publikasi dan artikel pada website utama.</p>
                  </div>
                  <div class="flex gap-2">
    <button onclick="openTambahAgendaModal()" class="bg-dikbud-secondary hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded flex items-center gap-2">
        <span class="material-icons-outlined text-[20px]">event</span> Tambah Agenda
    </button>
    <button onclick="openTambahBeritaModal()" class="bg-dikbud-primary hover:bg-dikbud-dark text-white font-bold py-2 px-4 rounded flex items-center gap-2">
        <span class="material-icons-outlined text-[20px]">add</span> Tambah Berita
    </button>
</div>
              </div>
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left text-sm">
                        <thead class="text-xs text-slate-500 bg-slate-50 border-b border-slate-200 uppercase">
                            <tr>
                                <th class="px-5 py-3 font-semibold">Judul Konten</th>
                                <th class="px-5 py-3 font-semibold">Kategori</th>
                                <th class="px-5 py-3 font-semibold">Status</th>
                                <th class="px-5 py-3 font-semibold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-600">
                            @foreach($posts as $post)
                            <tr>
                                <td class="px-5 py-3 font-medium text-slate-800">{{ $post->title }}</td>
                                <td class="px-5 py-3">{{ $post->type }}</td>
                                <td class="px-5 py-3">
                                    <span class="{{ $post->status == "Published" ? "bg-emerald-100 text-emerald-700" : "bg-amber-100 text-amber-700" }} px-2 py-1 rounded text-xs font-semibold">{{ $post->status }}</span>
                                </td>
                                <td class="px-5 py-3 text-right">
                                    <button onclick="openEditBeritaModal({{ $post->id }})" class="text-slate-400 hover:text-dikbud-secondary"><span class="material-icons-outlined text-[18px]">edit</span></button>
                                    <form action="{{ route('admin.berita.destroy', $post->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus item ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-slate-400 hover:text-red-600"><span class="material-icons-outlined text-[18px]">delete</span></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            
            @elseif($view_type == "agenda")
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                        <span class="material-icons text-dikbud-primary">calendar_month</span> Manajemen Agenda Kegiatan Dinas
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">Kelola jadwal rapat, kunjungan kerja, bimtek, sosialisasi, dan agenda resmi Dinas Pendidikan & Kebudayaan Provinsi Maluku.</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('portal-resmi') }}#agenda" target="_blank" class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors shadow-sm">
                        <span class="material-icons-outlined text-sm">visibility</span> Lihat di Portal
                    </a>
                    <button onclick="openTambahAgendaModal()" class="flex items-center gap-2 px-4 py-2 bg-dikbud-primary hover:bg-dikbud-dark text-white rounded-lg text-sm font-bold shadow-md transition-colors">
                        <span class="material-icons text-sm">add_circle</span> Tambah Agenda Kegiatan
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left text-sm">
                        <thead class="text-xs text-slate-500 bg-slate-50 border-b border-slate-200 uppercase">
                            <tr>
                                <th class="px-5 py-3 font-semibold text-center w-16">No</th>
                                <th class="px-5 py-3 font-semibold w-48">Tanggal Kegiatan</th>
                                <th class="px-5 py-3 font-semibold">Nama Kegiatan / Agenda</th>
                                <th class="px-5 py-3 font-semibold">Lokasi Pelaksanaan</th>
                                <th class="px-5 py-3 font-semibold text-right w-36">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-600">
                            @forelse($agendas as $index => $item)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-5 py-4 text-center font-bold text-slate-500">{{ $index + 1 }}</td>
                                <td class="px-5 py-4">
                                    <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-blue-50 text-dikbud-primary border border-blue-200 rounded-xl text-xs font-bold shadow-sm">
                                        <span class="material-icons text-[15px] text-dikbud-primary">event</span>
                                        <span>{{ \Carbon\Carbon::parse($item->date)->translatedFormat('d F Y') }}</span>
                                    </div>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="font-bold text-slate-800 text-sm">{{ $item->title }}</div>
                                    <span class="text-xs text-slate-400 mt-0.5 block">Tersinkron ke Portal & Beranda</span>
                                </td>
                                <td class="px-5 py-4 text-xs font-medium text-slate-700">
                                    <span class="flex items-center gap-1.5">
                                        <span class="material-icons text-[16px] text-red-600 shrink-0">location_on</span>
                                        <span>{{ $item->location }}</span>
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <button onclick="openEditAgendaModal({{ json_encode($item) }})" title="Edit Agenda" class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors">
                                            <span class="material-icons text-[18px]">edit</span>
                                        </button>
                                        <form action="{{ route('admin.agenda.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus agenda ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Hapus Agenda" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                                <span class="material-icons text-[18px]">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-5 py-8 text-center text-slate-400 text-sm">Belum ada agenda kegiatan. Silakan klik Tambah Agenda Kegiatan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @elseif($view_type == "pengaduan")
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                        <span class="material-icons text-dikbud-primary">support_agent</span> Layanan Pengaduan & Aspirasi Masyarakat (E-Lapor)
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">Daftar aduan masyarakat, permohonan informasi, dan aspirasi terpadu dari E-Lapor Portal Resmi & Layanan Pengaduan Disdikbud Maluku.</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('portal-resmi') }}#pengaduan" target="_blank" class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors shadow-sm">
                        <span class="material-icons-outlined text-sm">visibility</span> Form E-Lapor Portal
                    </a>
                    <span class="text-xs font-bold bg-blue-50 text-dikbud-primary border border-blue-200 px-3.5 py-2 rounded-lg">
                        Total Aduan: {{ count($complaints) }}
                    </span>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left text-sm">
                        <thead class="text-xs text-slate-500 bg-slate-50 border-b border-slate-200 uppercase">
                            <tr>
                                <th class="px-5 py-3 font-semibold w-12 text-center">No</th>
                                <th class="px-5 py-3 font-semibold">Pelapor & Kontak</th>
                                <th class="px-5 py-3 font-semibold">Kategori & Asal / Kota</th>
                                <th class="px-5 py-3 font-semibold">Isi Aspirasi / Pengaduan</th>
                                <th class="px-5 py-3 font-semibold text-center">Status</th>
                                <th class="px-5 py-3 font-semibold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-600">
                            @forelse($complaints as $index => $c)
                            <tr class="hover:bg-slate-50/70 transition-colors">
                                <td class="px-5 py-3.5 text-center text-xs font-bold text-slate-400">{{ $index + 1 }}</td>
                                <td class="px-5 py-3.5 font-medium text-slate-800">
                                    <div class="font-bold text-slate-900 flex items-center gap-1.5">
                                        <span class="material-icons text-slate-400 text-[16px]">person</span>
                                        {{ $c->sender_name }}
                                    </div>
                                    @if($c->whatsapp)
                                    <div class="mt-1">
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $c->whatsapp) }}" target="_blank" class="inline-flex items-center gap-1 px-2 py-0.5 bg-emerald-50 text-emerald-700 border border-emerald-200 rounded text-xs font-bold hover:bg-emerald-100 transition-colors">
                                            <i class="fab fa-whatsapp text-emerald-600"></i> {{ $c->whatsapp }}
                                        </a>
                                    </div>
                                    @else
                                    <span class="text-xs text-slate-400 block mt-1">Tanpa Kontak</span>
                                    @endif
                                </td>
                                <td class="px-5 py-3.5">
                                    <div class="mb-1">
                                        <span class="bg-amber-100 text-amber-800 text-[11px] font-bold px-2 py-0.5 rounded-full border border-amber-200">
                                            {{ $c->kategori ?? 'Layanan Aspirasi' }}
                                        </span>
                                    </div>
                                    @if($c->instansi)
                                    <span class="inline-flex items-center gap-1 text-xs text-blue-700 bg-blue-50 px-2 py-0.5 rounded font-medium">
                                        <span class="material-icons text-[12px]">location_city</span> {{ $c->instansi }}
                                    </span>
                                    @else
                                    <span class="text-xs text-slate-400">Provinsi Maluku</span>
                                    @endif
                                </td>
                                <td class="px-5 py-3.5 max-w-sm">
                                    <p class="font-bold text-slate-800 text-xs mb-1">{{ $c->title }}</p>
                                    <p class="text-xs text-slate-600 leading-relaxed line-clamp-3">{{ $c->description }}</p>
                                    <span class="text-[10px] text-slate-400 block mt-1.5">Masuk: {{ $c->created_at ? $c->created_at->translatedFormat('d M Y, H:i') . ' WIT' : 'Baru saja' }}</span>
                                </td>
                                <td class="px-5 py-3.5 text-center whitespace-nowrap">
                                    <form action="{{ route('admin.pengaduan.status', $c->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" onchange="this.form.submit()" class="text-xs font-bold px-2.5 py-1 rounded-lg border {{ $c->status == 'Menunggu Respon' ? 'bg-red-50 text-red-700 border-red-200' : ($c->status == 'Diproses' ? 'bg-amber-50 text-amber-700 border-amber-200' : 'bg-emerald-50 text-emerald-700 border-emerald-200') }} outline-none cursor-pointer shadow-sm">
                                            <option value="Menunggu Respon" {{ $c->status == 'Menunggu Respon' ? 'selected' : '' }}>Menunggu Respon</option>
                                            <option value="Diproses" {{ $c->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                            <option value="Selesai" {{ $c->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="px-5 py-3.5 text-right whitespace-nowrap">
                                    <form action="{{ route('admin.pengaduan.destroy', $c->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus laporan aspirasi dari {{ $c->sender_name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-slate-400 hover:text-red-600 p-1 transition-colors" title="Hapus Laporan">
                                            <span class="material-icons-outlined text-[18px]">delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-5 py-8 text-center text-slate-400 text-sm">Belum ada data pengaduan / aspirasi masyarakat.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @elseif($view_type == "monev")
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                        <span class="material-icons text-dikbud-primary">analytics</span> Manajemen Data Monev SMA/SMK
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">Monitoring dan Evaluasi Data Pokok Pendidikan Menengah & Sarpras Provinsi Maluku.</p>
                </div>
                <div class="flex items-center gap-2">
                    <a href="/#monev" target="_blank" class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors shadow-sm">
                        <span class="material-icons-outlined text-[16px]">visibility</span> Lihat di Website
                    </a>
                </div>
            </div>

            <!-- Tab / Section 1: Indikator Utama & Sarpras -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 mb-8">
                <div class="border-b border-slate-100 pb-4 mb-6 flex justify-between items-center">
                    <div>
                        <h3 class="font-bold text-base text-slate-800 flex items-center gap-2">
                            <span class="material-icons text-dikbud-secondary text-[20px]">tune</span> Indikator Utama & Sarana Prasarana
                        </h3>
                        <p class="text-xs text-slate-500 mt-0.5">Ubah angka statistik dan persentase yang tampil pada portal depan.</p>
                    </div>
                </div>

                <form action="{{ route('admin.monev.stats') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- 4 Kartu Indikator Utama -->
                    <div>
                        <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">4 Kartu Statistik Utama</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <!-- Stat 1 -->
                            <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl space-y-3">
                                <div class="flex items-center gap-2">
                                    <span class="material-icons text-blue-600 text-sm">school</span>
                                    <span class="text-xs font-bold text-slate-700">Total SMA/SMK</span>
                                </div>
                                <div>
                                    <label class="block text-[11px] text-slate-500 mb-1">Angka / Nilai</label>
                                    <input type="text" name="total_sekolah" value="{{ old('total_sekolah', $monev_stats->total_sekolah ?? '428') }}" required class="w-full px-3 py-1.5 bg-white border border-slate-300 rounded-lg text-sm font-bold text-slate-800 focus:border-dikbud-primary outline-none">
                                </div>
                                <div>
                                    <label class="block text-[11px] text-slate-500 mb-1">Keterangan Sub</label>
                                    <input type="text" name="total_sekolah_sub" value="{{ old('total_sekolah_sub', $monev_stats->total_sekolah_sub ?? '+12 dari 2025') }}" class="w-full px-3 py-1.5 bg-white border border-slate-300 rounded-lg text-xs text-slate-600 focus:border-dikbud-primary outline-none">
                                </div>
                            </div>

                            <!-- Stat 2 -->
                            <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl space-y-3">
                                <div class="flex items-center gap-2">
                                    <span class="material-icons text-emerald-600 text-sm">people</span>
                                    <span class="text-xs font-bold text-slate-700">Siswa Aktif</span>
                                </div>
                                <div>
                                    <label class="block text-[11px] text-slate-500 mb-1">Angka / Nilai</label>
                                    <input type="text" name="siswa_aktif" value="{{ old('siswa_aktif', $monev_stats->siswa_aktif ?? '112.450') }}" required class="w-full px-3 py-1.5 bg-white border border-slate-300 rounded-lg text-sm font-bold text-slate-800 focus:border-dikbud-primary outline-none">
                                </div>
                                <div>
                                    <label class="block text-[11px] text-slate-500 mb-1">Keterangan Sub</label>
                                    <input type="text" name="siswa_aktif_sub" value="{{ old('siswa_aktif_sub', $monev_stats->siswa_aktif_sub ?? '+3.2% pendaftar baru') }}" class="w-full px-3 py-1.5 bg-white border border-slate-300 rounded-lg text-xs text-slate-600 focus:border-dikbud-primary outline-none">
                                </div>
                            </div>

                            <!-- Stat 3 -->
                            <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl space-y-3">
                                <div class="flex items-center gap-2">
                                    <span class="material-icons text-amber-600 text-sm">badge</span>
                                    <span class="text-xs font-bold text-slate-700">Guru & Tendik</span>
                                </div>
                                <div>
                                    <label class="block text-[11px] text-slate-500 mb-1">Angka / Nilai</label>
                                    <input type="text" name="guru_tendik" value="{{ old('guru_tendik', $monev_stats->guru_tendik ?? '8.942') }}" required class="w-full px-3 py-1.5 bg-white border border-slate-300 rounded-lg text-sm font-bold text-slate-800 focus:border-dikbud-primary outline-none">
                                </div>
                                <div>
                                    <label class="block text-[11px] text-slate-500 mb-1">Keterangan Sub</label>
                                    <input type="text" name="guru_tendik_sub" value="{{ old('guru_tendik_sub', $monev_stats->guru_tendik_sub ?? '85% Tersertifikasi') }}" class="w-full px-3 py-1.5 bg-white border border-slate-300 rounded-lg text-xs text-slate-600 focus:border-dikbud-primary outline-none">
                                </div>
                            </div>

                            <!-- Stat 4 -->
                            <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl space-y-3">
                                <div class="flex items-center gap-2">
                                    <span class="material-icons text-purple-600 text-sm">verified</span>
                                    <span class="text-xs font-bold text-slate-700">Akreditasi A</span>
                                </div>
                                <div>
                                    <label class="block text-[11px] text-slate-500 mb-1">Angka / Nilai</label>
                                    <input type="text" name="akreditasi_a" value="{{ old('akreditasi_a', $monev_stats->akreditasi_a ?? '156') }}" required class="w-full px-3 py-1.5 bg-white border border-slate-300 rounded-lg text-sm font-bold text-slate-800 focus:border-dikbud-primary outline-none">
                                </div>
                                <div>
                                    <label class="block text-[11px] text-slate-500 mb-1">Keterangan Sub</label>
                                    <input type="text" name="akreditasi_a_sub" value="{{ old('akreditasi_a_sub', $monev_stats->akreditasi_a_sub ?? '+15 Sekolah') }}" class="w-full px-3 py-1.5 bg-white border border-slate-300 rounded-lg text-xs text-slate-600 focus:border-dikbud-primary outline-none">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Breakdown Jenjang & Satuan Pendidikan -->
                    <div class="pt-4 border-t border-slate-100 space-y-4">
                        <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Rincian Total Jenjang & Satuan Pendidikan</h4>
                        
                        <!-- Grid 3 Kolom: SMA, SMK, SLB -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- SMA Box -->
                            <div class="p-4 bg-blue-50/70 border border-blue-200 rounded-xl space-y-2.5">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-bold text-blue-900 flex items-center gap-1.5"><span class="material-icons text-blue-600 text-sm">school</span> Jenjang SMA</span>
                                    <span class="text-[10px] font-bold px-2 py-0.5 bg-blue-200 text-blue-800 rounded">SMA</span>
                                </div>
                                <div>
                                    <label class="block text-[11px] text-blue-800 font-semibold mb-1">Total SMA</label>
                                    <input type="text" name="total_sma" value="{{ old('total_sma', $monev_stats->total_sma ?? '245') }}" class="w-full px-3 py-1.5 bg-white border border-blue-300 rounded-lg text-sm font-bold text-blue-900 focus:border-blue-600 outline-none">
                                </div>
                                <div class="grid grid-cols-2 gap-2 pt-2 border-t border-blue-200/80">
                                    <div>
                                        <label class="block text-[10px] text-slate-600 font-medium mb-0.5">SMA Negeri</label>
                                        <input type="text" name="sma_negeri" value="{{ old('sma_negeri', $monev_stats->sma_negeri ?? '168') }}" class="w-full px-2.5 py-1 bg-white border border-slate-300 rounded text-xs font-semibold focus:border-blue-600 outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] text-slate-600 font-medium mb-0.5">SMA Swasta</label>
                                        <input type="text" name="sma_swasta" value="{{ old('sma_swasta', $monev_stats->sma_swasta ?? '77') }}" class="w-full px-2.5 py-1 bg-white border border-slate-300 rounded text-xs font-semibold focus:border-blue-600 outline-none">
                                    </div>
                                </div>
                            </div>

                            <!-- SMK Box -->
                            <div class="p-4 bg-amber-50/70 border border-amber-200 rounded-xl space-y-2.5">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-bold text-amber-900 flex items-center gap-1.5"><span class="material-icons text-amber-600 text-sm">precision_manufacturing</span> Jenjang SMK</span>
                                    <span class="text-[10px] font-bold px-2 py-0.5 bg-amber-200 text-amber-800 rounded">SMK</span>
                                </div>
                                <div>
                                    <label class="block text-[11px] text-amber-800 font-semibold mb-1">Total SMK</label>
                                    <input type="text" name="total_smk" value="{{ old('total_smk', $monev_stats->total_smk ?? '183') }}" class="w-full px-3 py-1.5 bg-white border border-amber-300 rounded-lg text-sm font-bold text-amber-900 focus:border-amber-600 outline-none">
                                </div>
                                <div class="grid grid-cols-2 gap-2 pt-2 border-t border-amber-200/80">
                                    <div>
                                        <label class="block text-[10px] text-slate-600 font-medium mb-0.5">SMK Negeri</label>
                                        <input type="text" name="smk_negeri" value="{{ old('smk_negeri', $monev_stats->smk_negeri ?? '112') }}" class="w-full px-2.5 py-1 bg-white border border-slate-300 rounded text-xs font-semibold focus:border-amber-600 outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] text-slate-600 font-medium mb-0.5">SMK Swasta</label>
                                        <input type="text" name="smk_swasta" value="{{ old('smk_swasta', $monev_stats->smk_swasta ?? '71') }}" class="w-full px-2.5 py-1 bg-white border border-slate-300 rounded text-xs font-semibold focus:border-amber-600 outline-none">
                                    </div>
                                </div>
                            </div>

                            <!-- SLB Box -->
                            <div class="p-4 bg-purple-50/70 border border-purple-200 rounded-xl space-y-2.5">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-bold text-purple-900 flex items-center gap-1.5"><span class="material-icons text-purple-600 text-sm">accessibility_new</span> Jenjang SLB</span>
                                    <span class="text-[10px] font-bold px-2 py-0.5 bg-purple-200 text-purple-800 rounded">SLB</span>
                                </div>
                                <div>
                                    <label class="block text-[11px] text-purple-800 font-semibold mb-1">Total SLB</label>
                                    <input type="text" name="total_slb" value="{{ old('total_slb', $monev_stats->total_slb ?? '24') }}" class="w-full px-3 py-1.5 bg-white border border-purple-300 rounded-lg text-sm font-bold text-purple-900 focus:border-purple-600 outline-none">
                                </div>
                                <div class="grid grid-cols-2 gap-2 pt-2 border-t border-purple-200/80">
                                    <div>
                                        <label class="block text-[10px] text-slate-600 font-medium mb-0.5">SLB Negeri</label>
                                        <input type="text" name="slb_negeri" value="{{ old('slb_negeri', $monev_stats->slb_negeri ?? '14') }}" class="w-full px-2.5 py-1 bg-white border border-slate-300 rounded text-xs font-semibold focus:border-purple-600 outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] text-slate-600 font-medium mb-0.5">SLB Swasta</label>
                                        <input type="text" name="slb_swasta" value="{{ old('slb_swasta', $monev_stats->slb_swasta ?? '10') }}" class="w-full px-2.5 py-1 bg-white border border-slate-300 rounded text-xs font-semibold focus:border-purple-600 outline-none">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Status Kondisi Sarpras -->
                    <div class="pt-4 border-t border-slate-100">
                        <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Status Kondisi Sarpras (%)</h4>
                        <div class="grid grid-cols-3 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Kondisi Baik (%)</label>
                                <input type="number" step="0.1" name="sarpras_baik" value="{{ old('sarpras_baik', $monev_stats->sarpras_baik ?? 65) }}" required class="w-full px-3 py-2 bg-slate-50 border border-slate-300 rounded-lg text-sm font-semibold focus:bg-white focus:border-dikbud-primary outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Rusak Ringan (%)</label>
                                <input type="number" step="0.1" name="sarpras_rusak_ringan" value="{{ old('sarpras_rusak_ringan', $monev_stats->sarpras_rusak_ringan ?? 25) }}" required class="w-full px-3 py-2 bg-slate-50 border border-slate-300 rounded-lg text-sm font-semibold focus:bg-white focus:border-dikbud-primary outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Rusak Berat (%)</label>
                                <input type="number" step="0.1" name="sarpras_rusak_berat" value="{{ old('sarpras_rusak_berat', $monev_stats->sarpras_rusak_berat ?? 10) }}" required class="w-full px-3 py-2 bg-slate-50 border border-slate-300 rounded-lg text-sm font-semibold focus:bg-white focus:border-dikbud-primary outline-none">
                            </div>
                        </div>
                    </div>

                    <!-- Catatan / Sumber Data -->
                    <div class="pt-4 border-t border-slate-100">
                        <label class="block text-xs font-bold text-slate-700 mb-1">Catatan Sumber Data Dapodik</label>
                        <textarea name="notes" rows="2" class="w-full px-3 py-2 bg-slate-50 border border-slate-300 rounded-lg text-sm focus:bg-white focus:border-dikbud-primary outline-none">{{ old('notes', $monev_stats->notes ?? 'Data terintegrasi dari sistem Dapodik secara real-time. Diperbarui setiap akhir semester berjalan.') }}</textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-2.5 bg-dikbud-primary hover:bg-dikbud-dark text-white font-bold text-sm rounded-lg shadow-md transition-colors flex items-center gap-2">
                            <span class="material-icons text-sm">save</span> Simpan Perubahan Indikator
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tab / Section 2: Sebaran Wilayah / Kabupaten & Kota -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div>
                        <h3 class="font-bold text-slate-800 flex items-center gap-2">
                            <span class="material-icons text-blue-600 text-[20px]">map</span> Sebaran Sekolah per Kabupaten / Kota
                        </h3>
                        <p class="text-xs text-slate-500 mt-0.5">Kelola rincian jumlah SMA dan SMK per wilayah di Provinsi Maluku.</p>
                    </div>
                    <button onclick="openTambahWilayahModal()" class="px-4 py-2 bg-dikbud-secondary hover:bg-blue-700 text-white text-xs font-bold rounded-lg transition-colors flex items-center gap-1.5 shadow-sm">
                        <span class="material-icons text-sm">add</span> Tambah Wilayah
                    </button>
                </div>

                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left text-sm">
                        <thead class="text-xs text-slate-500 bg-slate-50 border-b border-slate-200 uppercase">
                            <tr>
                                <th class="px-5 py-3 font-semibold text-center w-16">Urutan</th>
                                <th class="px-5 py-3 font-semibold">Kabupaten / Kota</th>
                                <th class="px-5 py-3 font-semibold text-center">SMA</th>
                                <th class="px-5 py-3 font-semibold text-center">SMK</th>
                                <th class="px-5 py-3 font-semibold text-center">SLB</th>
                                <th class="px-5 py-3 font-semibold text-center bg-slate-100">Total</th>
                                <th class="px-5 py-3 font-semibold">Detail Sekolah</th>
                                <th class="px-5 py-3 font-semibold text-right w-24">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-600">
                            @foreach($monev_regions as $reg)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-5 py-3 text-center font-bold text-slate-500">{{ $reg->urutan }}</td>
                                <td class="px-5 py-3 font-bold text-slate-800">
                                    {{ $reg->nama_wilayah }}
                                    @if($reg->link_detail)
                                    <a href="{{ $reg->link_detail }}" target="_blank" class="text-xs text-blue-500 hover:underline block font-normal flex items-center gap-0.5 mt-0.5">
                                        <span class="material-icons text-[12px]">link</span> {{ Str::limit($reg->link_detail, 30) }}
                                    </a>
                                    @endif
                                </td>
                                <td class="px-5 py-3 text-center font-semibold text-blue-700 bg-blue-50/30">{{ $reg->jumlah_sma }}</td>
                                <td class="px-5 py-3 text-center font-semibold text-amber-700 bg-amber-50/30">{{ $reg->jumlah_smk }}</td>
                                <td class="px-5 py-3 text-center font-semibold text-purple-700 bg-purple-50/30">{{ $reg->jumlah_slb ?? 0 }}</td>
                                <td class="px-5 py-3 text-center font-black text-slate-900 bg-slate-100/70">{{ $reg->total }}</td>
                                <td class="px-5 py-3 text-xs text-slate-500">{{ Str::limit($reg->contoh_sekolah ?? '-', 45) }}</td>
                                <td class="px-5 py-3 text-right whitespace-nowrap">
                                    <button onclick="openEditWilayahModal({{ json_encode($reg) }})" class="text-slate-400 hover:text-dikbud-secondary mr-2" title="Edit">
                                        <span class="material-icons-outlined text-[18px]">edit</span>
                                    </button>
                                    <form action="{{ route('admin.monev.region.destroy', $reg->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data wilayah {{ $reg->nama_wilayah }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-slate-400 hover:text-red-600" title="Hapus">
                                            <span class="material-icons-outlined text-[18px]">delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @elseif($view_type == "ppid")
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                        <span class="material-icons text-dikbud-primary">policy</span> Permohonan Informasi Publik (PPID)
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">Daftar formulir permohonan data dan informasi resmi dari masyarakat.</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold bg-amber-50 text-amber-800 border border-amber-200 px-3 py-1.5 rounded-lg">
                        Total Permohonan: {{ count($ppid_requests) }}
                    </span>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left text-sm">
                        <thead class="text-xs text-slate-500 bg-slate-50 border-b border-slate-200 uppercase">
                            <tr>
                                <th class="px-5 py-3 font-semibold w-12 text-center">No</th>
                                <th class="px-5 py-3 font-semibold">Pemohon & Identitas</th>
                                <th class="px-5 py-3 font-semibold">Kontak</th>
                                <th class="px-5 py-3 font-semibold">Rincian Informasi & Tujuan</th>
                                <th class="px-5 py-3 font-semibold text-center">Status</th>
                                <th class="px-5 py-3 font-semibold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-600">
                            @forelse($ppid_requests as $index => $req)
                            <tr class="hover:bg-slate-50/70 transition-colors">
                                <td class="px-5 py-3.5 text-center text-xs font-bold text-slate-400">{{ $index + 1 }}</td>
                                <td class="px-5 py-3.5 font-medium text-slate-800">
                                    <div class="font-bold text-slate-900">{{ $req->nama_pemohon }}</div>
                                    <span class="text-xs text-slate-500 block font-mono">{{ (!empty($req->nik) && $req->nik !== '-') ? 'NIK: ' . $req->nik : (!empty($req->instansi) ? 'Instansi: ' . $req->instansi : 'NIK: -') }}</span>
                                </td>
                                <td class="px-5 py-3.5 text-xs">
                                    @if(!empty($req->email) && $req->email !== '-')<div class="text-slate-800 font-medium">{{ $req->email }}</div>@endif
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $req->telepon) }}" target="_blank" class="text-emerald-700 font-semibold hover:underline inline-flex items-center gap-1 mt-0.5">
                                        <span class="material-icons text-[12px] text-emerald-600">chat</span> {{ $req->telepon }}
                                    </a>
                                </td>
                                <td class="px-5 py-3.5 max-w-xs">
                                    <p class="font-semibold text-slate-800 text-xs mb-1">{{ $req->rincian }}</p>
                                    <p class="text-xs text-slate-500"><strong class="text-slate-700">Tujuan:</strong> {{ $req->tujuan }}</p>
                                    <span class="text-[10px] text-slate-400 block mt-1">Diterima: {{ $req->created_at ? $req->created_at->format('d M Y, H:i') . ' WIT' : '-' }}</span>
                                </td>
                                <td class="px-5 py-3.5 text-center whitespace-nowrap">
                                    <form action="{{ route('admin.ppid.status', $req->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" onchange="this.form.submit()" class="text-xs font-bold px-2.5 py-1 rounded-lg border {{ $req->status == 'Menunggu Review' ? 'bg-amber-50 text-amber-700 border-amber-200' : ($req->status == 'Diproses' ? 'bg-blue-50 text-blue-700 border-blue-200' : ($req->status == 'Selesai' ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : 'bg-red-50 text-red-700 border-red-200')) }} outline-none cursor-pointer shadow-sm">
                                            <option value="Menunggu Review" {{ $req->status == 'Menunggu Review' ? 'selected' : '' }}>Menunggu Review</option>
                                            <option value="Diproses" {{ $req->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                            <option value="Selesai" {{ $req->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                            <option value="Ditolak" {{ $req->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="px-5 py-3.5 text-right whitespace-nowrap">
                                    <form action="{{ route('admin.ppid.destroy', $req->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus permohonan data dari {{ $req->nama_pemohon }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-slate-400 hover:text-red-600 p-1 transition-colors" title="Hapus Permohonan">
                                            <span class="material-icons-outlined text-[18px]">delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-5 py-8 text-center text-slate-400 text-sm">Belum ada formulir permohonan informasi publik PPID.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @elseif($view_type == "slider")
            <!-- View: Slider Hero / Foto Slide Beranda -->
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                        <span class="material-icons text-dikbud-primary">photo_library</span> Foto Slide Beranda Utama
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">Kelola foto slide, judul, keterangan, dan tautan yang tampil pada slider beranda utama website.</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="/#hero-slider" target="_blank" class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors shadow-sm">
                        <span class="material-icons-outlined text-sm">visibility</span> Lihat di Beranda
                    </a>
                    <button onclick="openTambahSlideModal()" class="flex items-center gap-2 px-4 py-2 bg-dikbud-primary hover:bg-dikbud-dark text-white rounded-lg text-sm font-bold shadow-md transition-colors">
                        <span class="material-icons text-sm">add_photo_alternate</span> Tambah Slide Foto
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left text-sm">
                        <thead class="text-xs text-slate-500 bg-slate-50 border-b border-slate-200 uppercase">
                            <tr>
                                <th class="px-5 py-3 font-semibold text-center w-16">Urutan</th>
                                <th class="px-5 py-3 font-semibold w-24">Foto Slide</th>
                                <th class="px-5 py-3 font-semibold">Judul & Keterangan</th>
                                <th class="px-5 py-3 font-semibold text-center">Tag / Kategori</th>
                                <th class="px-5 py-3 font-semibold">Tautan Tombol</th>
                                <th class="px-5 py-3 font-semibold text-center">Status</th>
                                <th class="px-5 py-3 font-semibold text-right w-24">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-600">
                            @forelse($hero_slides as $slide)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-5 py-4 text-center font-bold text-slate-500">{{ $slide->order }}</td>
                                <td class="px-5 py-4">
                                    <div class="w-20 h-14 rounded-lg overflow-hidden border border-slate-200 shadow-sm bg-slate-100 flex-shrink-0">
                                        <img src="{{ $slide->image }}" alt="{{ $slide->title }}" class="w-full h-full object-cover">
                                    </div>
                                </td>
                                <td class="px-5 py-4 max-w-sm">
                                    <h4 class="font-bold text-slate-800 text-sm leading-snug mb-1">{{ $slide->title }}</h4>
                                    <p class="text-xs text-slate-500 line-clamp-2">{{ $slide->subtitle ?? '-' }}</p>
                                </td>
                                <td class="px-5 py-4 text-center">
                                    <span class="inline-block px-2.5 py-1 text-xs font-semibold rounded-full bg-blue-50 text-blue-700 border border-blue-200">
                                        {{ $slide->tag }}
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-xs">
                                    <span class="font-semibold text-slate-700 block">{{ $slide->button_text ?? 'Baca Selengkapnya' }}</span>
                                    <span class="text-slate-400 block font-mono text-[11px] truncate max-w-[150px]">{{ $slide->button_link }}</span>
                                </td>
                                <td class="px-5 py-4 text-center">
                                    @if($slide->is_active)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-bold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif
                                    </span>
                                    @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-bold rounded-full bg-slate-100 text-slate-500 border border-slate-200">
                                        Nonaktif
                                    </span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-right whitespace-nowrap">
                                    <button onclick="openEditSlideModal({{ json_encode($slide) }})" class="text-slate-400 hover:text-dikbud-secondary mr-2 p-1" title="Edit Slide">
                                        <span class="material-icons-outlined text-[18px]">edit</span>
                                    </button>
                                    <form action="{{ route('admin.slider.destroy', $slide->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus slide foto ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-slate-400 hover:text-red-600 p-1" title="Hapus Slide">
                                            <span class="material-icons-outlined text-[18px]">delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-5 py-8 text-center text-slate-400 text-sm">Belum ada slide foto beranda. Silakan tambahkan slide baru.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @elseif($view_type == "hero")
            <!-- View: Banner Dasbor Utama & Sambutan Kepala Dinas -->
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                        <span class="material-icons text-dikbud-primary">campaign</span> Banner Dasbor & Sambutan Kepala Dinas
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">Kelola teks slogan banner utama, tombol navigasi, dan kotak foto profil serta sambutan Kepala Dinas pada halaman utama website.</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="/#hero-slider" target="_blank" class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors shadow-sm">
                        <span class="material-icons-outlined text-sm">visibility</span> Lihat di Beranda
                    </a>
                </div>
            </div>

            <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                    <!-- Left: Hero Banner Settings -->
                    <div class="lg:col-span-7 space-y-6">
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                            <div class="flex items-center gap-3 pb-4 mb-5 border-b border-slate-100">
                                <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                                    <span class="material-icons text-xl">view_headline</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-800 text-base">Teks Banner Utama (Sisi Kiri)</h3>
                                    <p class="text-xs text-slate-400">Pengaturan slogan, badge instansi, dan tombol aksi beranda.</p>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Badge Kampanye / Tagline Atas <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <span class="material-icons absolute left-3 top-2.5 text-slate-400 text-sm">campaign</span>
                                        <input type="text" name="campaign_badge" value="{{ old('campaign_badge', $hero_setting->campaign_badge ?? 'Dinas Pendidikan & kebudayaan Prov. Maluku') }}" required class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary text-sm font-medium outline-none">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Judul Slogan Utama <span class="text-red-500">*</span>
                                    </label>
                                    <textarea name="title" rows="2" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary text-sm font-semibold outline-none">{{ old('title', $hero_setting->title ?? 'Mewujudkan Pendidikan Berkualitas & Merata di Bumi Raja-Raja.') }}</textarea>
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Kata / Kalimat Sorotan Warna (Highlight Gradient)
                                    </label>
                                    <input type="text" name="title_highlight" value="{{ old('title_highlight', $hero_setting->title_highlight ?? 'Berkualitas & Merata') }}" placeholder="Contoh: Berkualitas & Merata" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary text-sm font-medium outline-none">
                                    <p class="text-[11px] text-slate-400 mt-1">Kata di atas akan otomatis diberi warna gradasi emas menawan pada judul.</p>
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Deskripsi Singkat / Paragraf Portal <span class="text-red-500">*</span>
                                    </label>
                                    <textarea name="description" rows="3" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary text-sm outline-none">{{ old('description', $hero_setting->description ?? 'Portal resmi informasi pendidikan, kebudayaan, pelayanan publik, dan transparansi anggaran Dinas Pendidikan dan Kebudayaan Provinsi Maluku.') }}</textarea>
                                </div>

                                <div class="pt-2 border-t border-slate-100">
                                    <p class="text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">Pengaturan Tombol Aksi</p>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="p-3 bg-amber-50/50 rounded-xl border border-amber-200/60 space-y-2">
                                            <span class="text-[11px] font-bold text-amber-800 uppercase">Tombol 1 (Aksen Emas)</span>
                                            <div>
                                                <label class="block text-[10px] font-semibold text-slate-600 mb-0.5">Teks Tombol</label>
                                                <input type="text" name="btn1_text" value="{{ old('btn1_text', $hero_setting->btn1_text ?? 'Layanan Digital') }}" class="w-full px-3 py-1.5 text-xs rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none">
                                            </div>
                                            <div>
                                                <label class="block text-[10px] font-semibold text-slate-600 mb-0.5">Tautan (URL / Anchor)</label>
                                                <input type="text" name="btn1_url" value="{{ old('btn1_url', $hero_setting->btn1_url ?? '#layanan') }}" class="w-full px-3 py-1.5 text-xs rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none">
                                            </div>
                                        </div>

                                        <div class="p-3 bg-slate-50 rounded-xl border border-slate-200 space-y-2">
                                            <span class="text-[11px] font-bold text-slate-700 uppercase">Tombol 2 (Transparan)</span>
                                            <div>
                                                <label class="block text-[10px] font-semibold text-slate-600 mb-0.5">Teks Tombol</label>
                                                <input type="text" name="btn2_text" value="{{ old('btn2_text', $hero_setting->btn2_text ?? 'Transparansi Publik') }}" class="w-full px-3 py-1.5 text-xs rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none">
                                            </div>
                                            <div>
                                                <label class="block text-[10px] font-semibold text-slate-600 mb-0.5">Tautan (URL / Anchor)</label>
                                                <input type="text" name="btn2_url" value="{{ old('btn2_url', $hero_setting->btn2_url ?? '#transparansi') }}" class="w-full px-3 py-1.5 text-xs rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Kadis Box Settings & Action -->
                    <div class="lg:col-span-5 space-y-6">
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                            <div class="flex items-center gap-3 pb-4 mb-5 border-b border-slate-100">
                                <div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                                    <span class="material-icons text-xl">person_pin</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-800 text-base">Kotak Foto & Sambutan Kadis</h3>
                                    <p class="text-xs text-slate-400">Profil, foto kepala dinas, dan kutipan sambutan.</p>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Nama Kepala Dinas <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="kadis_name" value="{{ old('kadis_name', $hero_setting->kadis_name ?? 'Dr. Sarlota Singerin, S.Pd., M.Pd') }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary text-sm font-semibold outline-none">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Jabatan Resmi <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="kadis_position" value="{{ old('kadis_position', $hero_setting->kadis_position ?? 'Kepala Dinas Pendidikan & Kebudayaan') }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary text-sm font-medium outline-none">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Foto Kepala Dinas
                                    </label>
                                    <div class="flex items-center gap-4 p-3 bg-slate-50 rounded-xl border border-slate-200 mb-2">
                                        @php
                                            $currPhoto = $hero_setting->kadis_photo ?? '/images/kadin-sarlota.webp';
                                            if (!str_starts_with($currPhoto, 'http') && !str_starts_with($currPhoto, '/')) {
                                                $currPhoto = '/' . $currPhoto;
                                            }
                                        @endphp
                                        <div class="w-16 h-16 rounded-xl overflow-hidden border-2 border-white shadow bg-white flex-shrink-0">
                                            <img src="{{ asset($currPhoto) }}" alt="Foto Kadis" class="w-full h-full object-cover">
                                        </div>
                                        <div class="text-xs text-slate-500">
                                            <p class="font-semibold text-slate-700">Foto Saat Ini</p>
                                            <p class="text-[11px] text-slate-400 truncate max-w-[200px]">{{ $hero_setting->kadis_photo ?? 'Default (kadin-sarlota.webp)' }}</p>
                                        </div>
                                    </div>
                                    <input type="file" name="kadis_photo" accept="image/*" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-dikbud-primary file:text-white hover:file:bg-dikbud-dark cursor-pointer">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Isi Kutipan Sambutan / Quote <span class="text-red-500">*</span>
                                    </label>
                                    <textarea name="kadis_quote" rows="4" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary text-sm italic font-serif outline-none">{{ old('kadis_quote', $hero_setting->kadis_quote ?? 'Selamat datang di portal resmi kami. Kami berkomitmen menyelenggarakan pelayanan publik yang informatif, transparan, dan akuntabel demi kemajuan pendidikan dan pelestarian kebudayaan di Provinsi Maluku.') }}</textarea>
                                </div>

                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-[11px] font-bold text-slate-700 mb-1">Teks Tombol</label>
                                        <input type="text" name="kadis_button_text" value="{{ old('kadis_button_text', $hero_setting->kadis_button_text ?? 'Baca Selengkapnya') }}" class="w-full px-3 py-2 text-xs rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-[11px] font-bold text-slate-700 mb-1">Tautan Tombol</label>
                                        <input type="text" name="kadis_button_link" value="{{ old('kadis_button_link', $hero_setting->kadis_button_link ?? '#') }}" class="w-full px-3 py-2 text-xs rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Action Card -->
                        <div class="bg-gradient-to-r from-dikbud-primary to-blue-900 rounded-2xl p-5 text-white shadow-lg flex items-center justify-between">
                            <div>
                                <h4 class="font-bold text-sm">Simpan Pembaruan</h4>
                                <p class="text-[11px] text-blue-200">Perubahan langsung tayang di beranda website.</p>
                            </div>
                            <button type="submit" class="px-5 py-2.5 bg-amber-400 hover:bg-amber-500 text-slate-950 font-bold rounded-xl text-sm shadow transition-all flex items-center gap-2">
                                <span class="material-icons text-sm">save</span> Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            @elseif($view_type == "program_unggulan")
            <!-- View: Dokumen SK Disetujui & Ditolak (Pojok Layanan Masyarakat) -->
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                        <span class="material-icons text-dikbud-primary">verified</span> Dokumen SK Layanan Disetujui &amp; Ditolak
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">Kelola data permohonan layanan publik, dokumen SK yang telah disetujui, dan surat keterangan penolakan yang tampil pada menu unduh dokumen di beranda portal.</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="/#pojok-layanan" target="_blank" class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors shadow-sm">
                        <span class="material-icons-outlined text-sm">visibility</span> Lihat di Beranda
                    </a>
                    <button onclick="openTambahProgramModal()" class="flex items-center gap-2 px-4 py-2 bg-dikbud-primary hover:bg-dikbud-dark text-white rounded-lg text-sm font-bold shadow-md transition-colors">
                        <span class="material-icons text-sm">add_circle</span> Tambah Dokumen / SK
                    </button>
                </div>
            </div>

            <!-- Stats Bar -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-6">
                <a href="{{ route('admin.program.unggulan', ['status' => 'all']) }}" class="bg-white rounded-xl p-4 border {{ ($selectedStatus ?? 'all') == 'all' ? 'border-dikbud-primary ring-2 ring-dikbud-primary/20' : 'border-slate-200' }} shadow-sm flex items-center gap-3 hover:bg-slate-50 transition-all">
                    <div class="w-10 h-10 rounded-lg bg-blue-50 text-dikbud-primary flex items-center justify-center font-bold">
                        <span class="material-icons text-xl">folder_shared</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-medium">Semua Dokumen</p>
                        <h4 class="text-lg font-black text-slate-800">{{ $stats['total'] ?? 0 }}</h4>
                    </div>
                </a>
                <a href="{{ route('admin.program.unggulan', ['status' => 'Disetujui']) }}" class="bg-white rounded-xl p-4 border {{ ($selectedStatus ?? '') == 'Disetujui' ? 'border-emerald-500 ring-2 ring-emerald-500/20' : 'border-slate-200' }} shadow-sm flex items-center gap-3 hover:bg-slate-50 transition-all">
                    <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold">
                        <span class="material-icons text-xl">check_circle</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-medium">Layanan Disetujui</p>
                        <h4 class="text-lg font-black text-emerald-600">{{ $stats['disetujui'] ?? 0 }}</h4>
                    </div>
                </a>
                <a href="{{ route('admin.program.unggulan', ['status' => 'Ditolak']) }}" class="bg-white rounded-xl p-4 border {{ ($selectedStatus ?? '') == 'Ditolak' ? 'border-red-500 ring-2 ring-red-500/20' : 'border-slate-200' }} shadow-sm flex items-center gap-3 hover:bg-slate-50 transition-all">
                    <div class="w-10 h-10 rounded-lg bg-red-50 text-red-600 flex items-center justify-center font-bold">
                        <span class="material-icons text-xl">cancel</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-medium">Layanan Ditolak</p>
                        <h4 class="text-lg font-black text-red-600">{{ $stats['ditolak'] ?? 0 }}</h4>
                    </div>
                </a>
                <a href="{{ route('admin.program.unggulan', ['status' => 'Diproses']) }}" class="bg-white rounded-xl p-4 border {{ ($selectedStatus ?? '') == 'Diproses' ? 'border-amber-500 ring-2 ring-amber-500/20' : 'border-slate-200' }} shadow-sm flex items-center gap-3 hover:bg-slate-50 transition-all">
                    <div class="w-10 h-10 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center font-bold">
                        <span class="material-icons text-xl">pending_actions</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-medium">Proses / Review</p>
                        <h4 class="text-lg font-black text-amber-600">{{ $stats['diproses'] ?? 0 }}</h4>
                    </div>
                </a>
            </div>

            <!-- Table Card with Search & Filters -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                <div class="p-4 bg-slate-50 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-bold text-slate-700 uppercase tracking-wider">Daftar Dokumen Layanan &amp; SK Resmi</span>
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-slate-200 text-slate-700">
                            {{ method_exists($submissions, 'total') ? $submissions->total() : count($submissions) }} Data
                        </span>
                    </div>
                    <form method="GET" action="{{ route('admin.program.unggulan') }}" class="flex items-center gap-2">
                        <input type="hidden" name="status" value="{{ $selectedStatus ?? 'all' }}">
                        <div class="relative">
                            <span class="material-icons absolute left-2.5 top-2 text-slate-400 text-sm">search</span>
                            <input type="text" name="q" value="{{ $search ?? '' }}" placeholder="Cari nama, kode, instansi..." class="pl-8 pr-3 py-1.5 text-xs rounded-lg border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary outline-none">
                        </div>
                        <button type="submit" class="px-3 py-1.5 bg-dikbud-primary hover:bg-dikbud-dark text-white text-xs font-bold rounded-lg transition-colors">Cari</button>
                        @if(!empty($search))
                        <a href="{{ route('admin.program.unggulan', ['status' => $selectedStatus ?? 'all']) }}" class="px-2.5 py-1.5 bg-slate-200 hover:bg-slate-300 text-slate-700 text-xs font-bold rounded-lg transition-colors" title="Reset Pencarian">
                            <span class="material-icons text-xs">close</span>
                        </a>
                        @endif
                    </form>
                </div>

                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left text-sm">
                        <thead class="text-[11px] text-slate-500 bg-slate-50 border-b border-slate-200 uppercase tracking-wider font-semibold">
                            <tr>
                                <th class="px-4 py-3 text-center w-12">No</th>
                                <th class="px-4 py-3">Layanan &amp; Kode</th>
                                <th class="px-4 py-3">Pemohon &amp; Instansi</th>
                                <th class="px-4 py-3">Berkas Dokumen SK</th>
                                <th class="px-4 py-3">Catatan Verifikator</th>
                                <th class="px-4 py-3 text-center">Status</th>
                                <th class="px-4 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-xs text-slate-600">
                            @forelse($submissions as $index => $sub)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-4 py-3 text-center font-bold text-slate-400">
                                    {{ method_exists($submissions, 'firstItem') ? $submissions->firstItem() + $index : $index + 1 }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-2">
                                        <span class="px-2 py-0.5 rounded font-extrabold text-[10px] bg-blue-100 text-blue-900 border border-blue-200">
                                            {{ $sub->service_code }}
                                        </span>
                                        <span class="font-bold text-slate-800">{{ $sub->service_title ?? $sub->service_code }}</span>
                                    </div>
                                    <span class="text-[10px] text-slate-400 uppercase tracking-wider block mt-0.5">Bidang: {{ strtoupper($sub->bidang ?? 'Kepegawaian') }}</span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="font-bold text-slate-900 text-[13px]">{{ $sub->sender_name }}</div>
                                    <div class="text-[11px] text-slate-500 mt-0.5 flex flex-col gap-0.5">
                                        @if($sub->instance)
                                        <span class="text-slate-600 font-medium flex items-center gap-1">
                                            <span class="material-icons text-[12px] text-slate-400">business</span> {{ $sub->instance }}
                                        </span>
                                        @endif
                                        @if($sub->phone)
                                        <span class="text-slate-400 text-[10px] flex items-center gap-1">
                                            <span class="material-icons text-[11px] text-slate-400">call</span> {{ $sub->phone }}
                                        </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-lg {{ in_array($sub->status, ['Disetujui', 'Selesai']) ? 'bg-emerald-50 text-emerald-600' : ($sub->status === 'Ditolak' ? 'bg-red-50 text-red-600' : 'bg-blue-50 text-blue-600') }} flex items-center justify-center font-bold flex-shrink-0">
                                            <span class="material-icons text-base">picture_as_pdf</span>
                                        </div>
                                        <div class="min-w-0 max-w-[200px]">
                                            <p class="font-bold text-slate-800 truncate text-[11px]" title="{{ $sub->file_name }}">{{ $sub->file_name }}</p>
                                            <a href="{{ route('layanan.dokumen.download', $sub->id) }}" class="text-[10px] text-dikbud-secondary hover:underline font-semibold inline-flex items-center gap-0.5">
                                                <span class="material-icons text-[11px]">download</span> Unduh Dokumen
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 max-w-[220px]">
                                    @if($sub->admin_notes)
                                    <div class="p-2 rounded-lg {{ in_array($sub->status, ['Disetujui', 'Selesai']) ? 'bg-emerald-50/60 border border-emerald-100 text-emerald-900' : ($sub->status === 'Ditolak' ? 'bg-red-50/60 border border-red-100 text-red-900' : 'bg-slate-50 border border-slate-200 text-slate-700') }} text-[11px] leading-relaxed line-clamp-3" title="{{ $sub->admin_notes }}">
                                        {{ $sub->admin_notes }}
                                    </div>
                                    @else
                                    <span class="text-slate-400 italic text-[11px]">- Belum ada catatan -</span>
                                    @endif
                                    <span class="text-[10px] text-slate-400 block mt-1">{{ $sub->created_at ? $sub->created_at->format('d M Y H:i') : '' }}</span>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    @php
                                        $badgeColor = match($sub->status) {
                                            'Disetujui', 'Selesai' => 'bg-emerald-100 text-emerald-800 border-emerald-200',
                                            'Ditolak' => 'bg-red-100 text-red-800 border-red-200',
                                            'Diproses' => 'bg-blue-100 text-blue-800 border-blue-200',
                                            default => 'bg-amber-100 text-amber-800 border-amber-200'
                                        };
                                    @endphp
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-bold border {{ $badgeColor }}">
                                        @if(in_array($sub->status, ['Disetujui', 'Selesai']))
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Disetujui
                                        @elseif($sub->status === 'Ditolak')
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Ditolak
                                        @else
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> {{ $sub->status }}
                                        @endif
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <a href="{{ route('layanan.dokumen.download', $sub->id) }}" target="_blank" class="p-1.5 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded-lg text-xs font-bold transition-colors" title="Unduh / Pratinjau SK">
                                            <span class="material-icons text-sm">download</span>
                                        </a>
                                        <button type="button" onclick="openEditProgramModal({{ json_encode($sub) }})" class="p-1.5 bg-amber-50 hover:bg-amber-100 text-amber-700 rounded-lg text-xs font-bold transition-colors" title="Edit Data &amp; Dokumen SK">
                                            <span class="material-icons text-sm">edit</span>
                                        </button>
                                        <form action="{{ route('admin.program.unggulan.destroy', $sub->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data dokumen layanan {{ $sub->sender_name }}?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1.5 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg text-xs font-bold transition-colors" title="Hapus Data">
                                                <span class="material-icons text-sm">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-5 py-12 text-center text-slate-400">
                                    <span class="material-icons text-4xl text-slate-300 mb-2">folder_off</span>
                                    <p class="font-bold text-sm text-slate-600">Belum ada data dokumen permohonan layanan.</p>
                                    <p class="text-xs text-slate-400 mt-1">Klik tombol "Tambah Dokumen / SK" untuk menambahkan berkas layanan baru.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if(method_exists($submissions, 'hasPages') && $submissions->hasPages())
                <div class="p-4 border-t border-slate-200 bg-slate-50">
                    {{ $submissions->links() }}
                </div>
                @endif
            </div>
            @elseif($view_type == "dokumen_peraturan")
            <!-- View: Dokumen Peraturan & SK -->
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                        <span class="material-icons text-dikbud-primary">folder_special</span> Dokumen Peraturan & SK Resmi
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">Kelola data dan file unduhan dokumen regulasi, Standar Pelayanan Publik, LKIP, dan SK resmi yang tampil di halaman Download Dokumen.</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('dokumen.peraturan') }}" target="_blank" class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors shadow-sm">
                        <span class="material-icons-outlined text-sm">visibility</span> Lihat di Website
                    </a>
                    <button onclick="openTambahDokumenModal()" class="flex items-center gap-2 px-4 py-2 bg-dikbud-primary hover:bg-dikbud-dark text-white rounded-lg text-sm font-bold shadow-md transition-colors">
                        <span class="material-icons text-sm">add_circle</span> Tambah Dokumen
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left text-sm">
                        <thead class="text-xs text-slate-500 bg-slate-50 border-b border-slate-200 uppercase">
                            <tr>
                                <th class="px-5 py-3 font-semibold text-center w-16">No.</th>
                                <th class="px-5 py-3 font-semibold">Nama Dokumen & Regulasi</th>
                                <th class="px-5 py-3 font-semibold">Kategori / Tag</th>
                                <th class="px-5 py-3 font-semibold text-center w-24">Badge</th>
                                <th class="px-5 py-3 font-semibold text-center w-28">Status</th>
                                <th class="px-5 py-3 font-semibold text-right w-36">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-600">
                            @forelse($regulasi_dokumens as $doc)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-5 py-4 text-center font-bold text-slate-500">{{ $doc->no }}</td>
                                <td class="px-5 py-4">
                                    <div class="font-bold text-slate-800 text-sm flex items-start gap-2">
                                        <span class="material-icons text-red-500 text-[18px] flex-shrink-0 mt-0.5">picture_as_pdf</span>
                                        <span>{{ $doc->title }}</span>
                                    </div>
                                    <div class="text-[11px] text-slate-400 mt-1 truncate max-w-md">
                                        @if($doc->file_path)
                                            <span class="text-emerald-600 font-semibold flex items-center gap-1"><span class="material-icons text-[13px]">check_circle</span> File Upload: {{ basename($doc->file_path) }}</span>
                                        @else
                                            <span class="text-slate-400 truncate block">URL: {{ $doc->url }}</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-block px-2.5 py-1 bg-slate-100 text-slate-700 rounded-md text-xs font-medium">
                                        {{ $doc->tag ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-center">
                                    @if($doc->badge)
                                    <span class="inline-block px-2.5 py-1 bg-blue-50 text-dikbud-primary border border-blue-200 rounded-md text-xs font-bold">
                                        {{ $doc->badge }}
                                    </span>
                                    @else
                                    <span class="text-slate-300">-</span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-center">
                                    @if($doc->is_active)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif
                                    </span>
                                    @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-slate-100 text-slate-500 rounded-full text-xs font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Nonaktif
                                    </span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <a href="{{ $doc->file_path ? asset($doc->file_path) : $doc->url }}" target="_blank" title="Unduh File" class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                            <span class="material-icons text-[18px]">download</span>
                                        </a>
                                        <button onclick="openEditDokumenModal({{ json_encode($doc) }})" title="Edit Dokumen" class="p-1.5 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors">
                                            <span class="material-icons text-[18px]">edit</span>
                                        </button>
                                        <form action="{{ route('admin.dokumen.peraturan.destroy', $doc->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokumen ini dari database?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Hapus Dokumen" class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                                <span class="material-icons text-[18px]">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-5 py-8 text-center text-slate-400 text-sm">Belum ada dokumen peraturan. Silakan klik Tambah Dokumen.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @elseif($view_type == "transparansi_posters")
            <!-- View: Poster Transparansi Informasi Publik -->
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                        <span class="material-icons text-dikbud-primary">aspect_ratio</span> Poster Transparansi Informasi Publik
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">Kelola data dan gambar poster transparansi (Maklumat Pelayanan, Jam Pelayanan, SKM) yang tampil di halaman beranda.</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="/#transparansi" target="_blank" class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors shadow-sm">
                        <span class="material-icons-outlined text-sm">visibility</span> Lihat di Beranda
                    </a>
                    <button onclick="openTambahPosterModal()" class="flex items-center gap-2 px-4 py-2 bg-dikbud-primary hover:bg-dikbud-dark text-white rounded-lg text-sm font-bold shadow-md transition-colors">
                        <span class="material-icons text-sm">add_photo_alternate</span> Tambah Poster
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left text-sm">
                        <thead class="text-xs text-slate-500 bg-slate-50 border-b border-slate-200 uppercase">
                            <tr>
                                <th class="px-5 py-3 font-semibold text-center w-16">Urutan</th>
                                <th class="px-5 py-3 font-semibold w-28">Preview</th>
                                <th class="px-5 py-3 font-semibold">Judul Poster & File</th>
                                <th class="px-5 py-3 font-semibold text-center w-28">Status</th>
                                <th class="px-5 py-3 font-semibold text-right w-32">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-600">
                            @forelse($transparansi_posters as $poster)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-5 py-4 text-center font-bold text-slate-500">{{ $poster->order }}</td>
                                <td class="px-5 py-4">
                                    <div class="w-20 h-24 rounded-lg overflow-hidden bg-slate-100 border border-slate-200 shadow-sm flex items-center justify-center group relative">
                                        <img src="{{ Str::startsWith($poster->image, 'http') ? $poster->image : asset($poster->image) }}" alt="{{ $poster->title }}" class="w-full h-full object-cover">
                                        <a href="{{ Str::startsWith($poster->image, 'http') ? $poster->image : asset($poster->image) }}" target="_blank" class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center text-white transition-opacity">
                                            <span class="material-icons text-sm">open_in_new</span>
                                        </a>
                                    </div>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="font-bold text-slate-800 text-sm">
                                        {{ $poster->title }}
                                    </div>
                                    <div class="text-xs text-slate-400 mt-1 truncate max-w-md">
                                        Path: <code class="bg-slate-100 px-1.5 py-0.5 rounded text-slate-600 text-[11px]">{{ $poster->image }}</code>
                                    </div>
                                </td>
                                <td class="px-5 py-4 text-center">
                                    @if($poster->is_active)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif
                                    </span>
                                    @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-slate-100 text-slate-500 rounded-full text-xs font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Nonaktif
                                    </span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <button onclick="openEditPosterModal({{ json_encode($poster) }})" title="Edit Poster" class="p-1.5 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors">
                                            <span class="material-icons text-[18px]">edit</span>
                                        </button>
                                        <form action="{{ route('admin.transparansi.posters.destroy', $poster->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus poster ini dari database?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Hapus Poster" class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                                <span class="material-icons text-[18px]">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-5 py-8 text-center text-slate-400 text-sm">Belum ada poster transparansi. Silakan klik Tambah Poster.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @elseif($view_type == "banner_iklan")
            <!-- View: Banner Infografis & Iklan Website -->
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                        <span class="material-icons text-dikbud-primary">view_carousel</span> Banner Infografis &amp; Foto Iklan Website
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">Kelola banner foto Gubernur, infografis visi-misi, serta banner slide iklan yang tampil di bawah dashboard utama halaman beranda.</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="/#infografis-banner-carousel" target="_blank" class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors shadow-sm">
                        <span class="material-icons-outlined text-sm">visibility</span> Lihat di Beranda
                    </a>
                    <button onclick="openTambahBannerModal()" class="flex items-center gap-2 px-4 py-2 bg-dikbud-primary hover:bg-dikbud-dark text-white rounded-lg text-sm font-bold shadow-md transition-colors">
                        <span class="material-icons text-sm">add_photo_alternate</span> Tambah Banner Iklan
                    </button>
                </div>
            </div>

            <!-- Ringkasan Statistik Banner -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                        <span class="material-icons text-2xl">collections_bookmark</span>
                    </div>
                    <div>
                        <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Banner</span>
                        <h4 class="text-2xl font-bold text-slate-800">{{ $banners->count() }}</h4>
                    </div>
                </div>
                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                        <span class="material-icons text-2xl">check_circle</span>
                    </div>
                    <div>
                        <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Banner Aktif</span>
                        <h4 class="text-2xl font-bold text-emerald-600">{{ $banners->where('is_active', true)->count() }}</h4>
                    </div>
                </div>
                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center">
                        <span class="material-icons text-2xl">account_box</span>
                    </div>
                    <div>
                        <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Banner Gubernur / Utama</span>
                        <h4 class="text-2xl font-bold text-sky-700">{{ $banners->where('type', 'gubernur')->count() }}</h4>
                    </div>
                </div>
            </div>

            <!-- Tabel Daftar Banner -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                <div class="px-5 py-4 border-b border-slate-200 bg-slate-50 flex items-center justify-between">
                    <div>
                        <span class="text-xs font-bold text-slate-700 uppercase tracking-wider">Daftar Foto Banner Infografis &amp; Iklan di Beranda</span>
                        <p class="text-xs text-slate-400 mt-0.5">Urutan 1 akan menjadi banner slide pertama di bawah dasbor utama.</p>
                    </div>
                </div>
                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left text-sm">
                        <thead class="text-xs text-slate-500 bg-slate-50 border-b border-slate-200 uppercase">
                            <tr>
                                <th class="px-5 py-3 font-semibold text-center w-16">Urutan</th>
                                <th class="px-5 py-3 font-semibold w-48">Foto Banner</th>
                                <th class="px-5 py-3 font-semibold">Judul &amp; Informasi</th>
                                <th class="px-5 py-3 font-semibold">Tipe &amp; Tautan</th>
                                <th class="px-5 py-3 font-semibold text-center w-28">Status</th>
                                <th class="px-5 py-3 font-semibold text-right w-32">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-600">
                            @forelse($banners as $banner)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-5 py-4 text-center font-bold text-slate-700">#{{ $banner->order }}</td>
                                <td class="px-5 py-4">
                                    <div class="w-44 h-16 rounded-lg overflow-hidden bg-slate-100 border border-slate-200 shadow-sm flex items-center justify-center group relative">
                                        <img src="{{ Str::startsWith($banner->image, 'http') ? $banner->image : asset($banner->image) }}" alt="{{ $banner->title }}" class="w-full h-full object-cover">
                                        <a href="{{ Str::startsWith($banner->image, 'http') ? $banner->image : asset($banner->image) }}" target="_blank" class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center text-white transition-opacity">
                                            <span class="material-icons text-sm">open_in_new</span>
                                        </a>
                                    </div>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="font-bold text-slate-800 text-sm">
                                        {{ $banner->title }}
                                    </div>
                                    @if($banner->subtitle)
                                    <div class="text-xs font-semibold text-sky-700 mt-0.5">
                                        {{ $banner->subtitle }}
                                    </div>
                                    @endif
                                    @if($banner->description)
                                    <div class="text-xs text-slate-500 mt-1 line-clamp-2 max-w-md">
                                        {{ $banner->description }}
                                    </div>
                                    @endif
                                    <div class="text-[11px] text-slate-400 mt-1 truncate max-w-sm">
                                        File: <code class="bg-slate-100 px-1 py-0.5 rounded text-slate-600">{{ $banner->image }}</code>
                                    </div>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-block px-2 py-0.5 rounded text-[11px] font-bold uppercase {{ $banner->type == 'gubernur' ? 'bg-sky-100 text-sky-800' : 'bg-purple-100 text-purple-800' }} mb-1">
                                        {{ $banner->type ?? 'iklan' }}
                                    </span>
                                    <div class="text-xs text-slate-600 truncate max-w-xs">
                                        @if($banner->link_url && $banner->link_url !== '#')
                                        <a href="{{ $banner->link_url }}" target="{{ $banner->target ?? '_self' }}" class="text-blue-600 hover:underline flex items-center gap-1">
                                            <span class="material-icons text-[14px]">link</span> {{ $banner->link_url }}
                                        </a>
                                        @else
                                        <span class="text-slate-400">Tidak ada tautan</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-5 py-4 text-center">
                                    @if($banner->is_active)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif
                                    </span>
                                    @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-slate-100 text-slate-500 rounded-full text-xs font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Nonaktif
                                    </span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <button onclick="openEditBannerModal({{ json_encode($banner) }})" title="Edit Banner" class="p-1.5 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors">
                                            <span class="material-icons text-[18px]">edit</span>
                                        </button>
                                        <form action="{{ route('admin.banner_iklan.destroy', $banner->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus banner ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Hapus Banner" class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                                <span class="material-icons text-[18px]">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-5 py-8 text-center text-slate-400 text-sm">Belum ada banner infografis atau iklan. Silakan klik "Tambah Banner Iklan".</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @elseif($view_type == "galeri")
            <!-- View: Galeri Foto & Video CRUD -->
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                        <span class="material-icons text-dikbud-primary">collections</span> Galeri Foto & Video
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">Kelola arsip dokumentasi visual foto kegiatan resmi, festival kebudayaan, dan video liputan Disdikbud Maluku.</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('galeri') }}" target="_blank" class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors shadow-sm">
                        <span class="material-icons-outlined text-sm">visibility</span> Lihat Galeri Publik
                    </a>
                    <button onclick="openTambahGaleriModal()" class="flex items-center gap-2 px-4 py-2 bg-dikbud-primary hover:bg-dikbud-dark text-white rounded-lg text-sm font-bold shadow-md transition-colors">
                        <span class="material-icons text-sm">add_photo_alternate</span> Tambah Media
                    </button>
                </div>
            </div>

            @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl flex items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                    <span class="material-icons text-emerald-600">check_circle</span>
                    <span class="text-sm font-bold">{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700">
                    <span class="material-icons text-sm">close</span>
                </button>
            </div>
            @endif

            @if(isset($errors) && $errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-xl">
                <div class="flex items-center gap-3 mb-2">
                    <span class="material-icons text-red-600">error</span>
                    <span class="text-sm font-bold">Terjadi kesalahan validasi:</span>
                </div>
                <ul class="list-disc list-inside text-xs space-y-1 text-red-700 pl-7">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Quick Filter Tabs -->
            <div class="flex items-center gap-2 mb-4">
                <a href="{{ route('admin.galeri') }}" class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-colors {{ ($current_type ?? 'all') == 'all' ? 'bg-dikbud-primary text-white shadow-sm' : 'bg-white border border-slate-200 text-slate-600 hover:bg-slate-50' }}">
                    Semua Media ({{ $counts['all'] ?? count($galleries) }})
                </a>
                <a href="{{ route('admin.galeri', ['type' => 'foto']) }}" class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-colors {{ ($current_type ?? 'all') == 'foto' ? 'bg-dikbud-primary text-white shadow-sm' : 'bg-white border border-slate-200 text-slate-600 hover:bg-slate-50' }}">
                    <span class="inline-flex items-center gap-1"><span class="material-icons text-[14px]">photo_camera</span> Foto ({{ $counts['foto'] ?? 0 }})</span>
                </a>
                <a href="{{ route('admin.galeri', ['type' => 'video']) }}" class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-colors {{ ($current_type ?? 'all') == 'video' ? 'bg-dikbud-primary text-white shadow-sm' : 'bg-white border border-slate-200 text-slate-600 hover:bg-slate-50' }}">
                    <span class="inline-flex items-center gap-1"><span class="material-icons text-[14px]">videocam</span> Video ({{ $counts['video'] ?? 0 }})</span>
                </a>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left text-sm">
                        <thead class="text-xs text-slate-500 bg-slate-50 border-b border-slate-200 uppercase">
                            <tr>
                                <th class="px-5 py-3 font-semibold text-center w-16">Urutan</th>
                                <th class="px-5 py-3 font-semibold w-28">Preview</th>
                                <th class="px-5 py-3 font-semibold">Judul Kegiatan & Kategori</th>
                                <th class="px-5 py-3 font-semibold text-center w-24">Tipe</th>
                                <th class="px-5 py-3 font-semibold text-center w-32">Tanggal</th>
                                <th class="px-5 py-3 font-semibold text-center w-28">Status</th>
                                <th class="px-5 py-3 font-semibold text-right w-32">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-600">
                            @forelse($galleries as $item)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-5 py-4 text-center font-bold text-slate-500">{{ $item->order }}</td>
                                <td class="px-5 py-4">
                                    <div class="w-20 h-14 rounded-lg overflow-hidden bg-slate-900 border border-slate-200 shadow-sm flex items-center justify-center group relative">
                                        <img src="{{ $item->display_url }}" alt="{{ $item->title }}" loading="lazy" class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center text-white transition-opacity">
                                            <span class="material-icons text-sm">{{ $item->type === 'video' ? 'play_circle' : 'open_in_new' }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="font-bold text-slate-800 text-sm">
                                        {{ $item->title }}
                                    </div>
                                    <div class="flex items-center gap-2 mt-1">
                                        @if($item->category)
                                        <span class="inline-block px-2 py-0.5 bg-slate-100 text-slate-600 rounded text-[11px] font-medium">
                                            {{ $item->category }}
                                        </span>
                                        @endif
                                        @if($item->description)
                                        <span class="text-xs text-slate-400 truncate max-w-xs">{{ Str::limit($item->description, 50) }}</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-5 py-4 text-center">
                                    @if($item->type === 'video')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-red-50 text-red-700 rounded-full text-xs font-bold">
                                        <span class="material-icons text-[13px]">videocam</span> Video
                                    </span>
                                    @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-bold">
                                        <span class="material-icons text-[13px]">photo_camera</span> Foto
                                    </span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-center text-xs text-slate-500">
                                    {{ $item->event_date ? $item->event_date->format('d/m/Y') : '-' }}
                                </td>
                                <td class="px-5 py-4 text-center">
                                    @if($item->is_active)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif
                                    </span>
                                    @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-slate-100 text-slate-500 rounded-full text-xs font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Nonaktif
                                    </span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <button onclick="openEditGaleriModal({{ json_encode($item) }})" title="Edit Media" class="p-1.5 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors">
                                            <span class="material-icons text-[18px]">edit</span>
                                        </button>
                                        <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus media ini dari galeri?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Hapus Media" class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                                <span class="material-icons text-[18px]">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-5 py-8 text-center text-slate-400 text-sm">Belum ada media di galeri. Silakan klik Tambah Media.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
                        </div>
                        @elseif($view_type == "layanan")
            <!-- View: Kelola Layanan Publik Digital -->
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                        <span class="material-icons text-dikbud-primary">room_service</span> Kelola Layanan Publik Digital
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">Kelola kartu "Akses Cepat Layanan Pendidikan & Kebudayaan" (PPDB, Beasiswa, Legalisir, Cagar Budaya, dll) pada Portal Resmi.</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="/portal-resmi#layanan" target="_blank" class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors shadow-sm">
                        <span class="material-icons-outlined text-sm">visibility</span> Lihat di Portal
                    </a>
                    <button onclick="openTambahLayananModal()" class="flex items-center gap-2 px-4 py-2 bg-dikbud-primary hover:bg-dikbud-dark text-white rounded-lg text-sm font-bold shadow-md transition-colors">
                        <span class="material-icons text-sm">add_circle</span> Tambah Layanan Digital
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left text-sm">
                        <thead class="text-xs text-slate-500 bg-slate-50 border-b border-slate-200 uppercase">
                            <tr>
                                <th class="px-5 py-3 font-semibold text-center w-16">Urutan</th>
                                <th class="px-5 py-3 font-semibold w-56">Layanan & Ikon</th>
                                <th class="px-5 py-3 font-semibold">Kategori / Badge</th>
                                <th class="px-5 py-3 font-semibold">Deskripsi Layanan</th>
                                <th class="px-5 py-3 font-semibold">Tautan Target (URL)</th>
                                <th class="px-5 py-3 font-semibold text-center w-28">Status</th>
                                <th class="px-5 py-3 font-semibold text-right w-32">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-600">
                            @forelse($services as $item)
                            @php
                                $colorMap = [
                                    'red' => 'bg-red-100 text-red-700 border-red-200',
                                    'amber' => 'bg-amber-100 text-amber-700 border-amber-200',
                                    'sky' => 'bg-sky-100 text-sky-700 border-sky-200',
                                    'emerald' => 'bg-emerald-100 text-emerald-700 border-emerald-200',
                                    'purple' => 'bg-purple-100 text-purple-700 border-purple-200',
                                    'rose' => 'bg-rose-100 text-rose-700 border-rose-200',
                                    'indigo' => 'bg-indigo-100 text-indigo-700 border-indigo-200',
                                    'blue' => 'bg-blue-100 text-blue-700 border-blue-200',
                                ];
                                $cBadge = $colorMap[$item->icon_color] ?? 'bg-blue-100 text-blue-700 border-blue-200';
                            @endphp
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-5 py-4 text-center font-bold text-slate-500">{{ $item->order }}</td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-xl flex items-center justify-center text-base shadow-sm border {{ $cBadge }}">
                                            <i class="{{ $item->icon }}"></i>
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-800 text-sm">{{ $item->title }}</div>
                                            <div class="text-[11px] text-slate-400 font-mono">{{ $item->icon }} ({{ $item->icon_color }})</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-4">
                                    @if($item->badge)
                                    <span class="inline-block px-2.5 py-1 bg-slate-100 text-slate-700 rounded-md text-xs font-bold border border-slate-200">
                                        {{ $item->badge }}
                                    </span>
                                    @else
                                    <span class="text-slate-400 text-xs">-</span>
                                    @endif
                                </td>
                                <td class="px-5 py-4">
                                    <p class="text-xs text-slate-600 line-clamp-2 max-w-sm" title="{{ $item->description }}">{{ $item->description }}</p>
                                </td>
                                <td class="px-5 py-4">
                                    <div>
                                        <a href="{{ $item->url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-xs text-blue-600 hover:text-blue-800 hover:underline max-w-xs truncate font-medium">
                                            <span class="truncate">{{ $item->url }}</span>
                                            <span class="material-icons-outlined text-[13px] flex-shrink-0">open_in_new</span>
                                        </a>
                                        <div class="text-[11px] text-slate-400 mt-0.5">Tombol: <span class="font-semibold text-slate-600">{{ $item->action_text ?: 'Akses Layanan' }}</span></div>
                                    </div>
                                </td>
                                <td class="px-5 py-4 text-center">
                                    @if($item->is_active)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif
                                    </span>
                                    @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-slate-100 text-slate-500 rounded-full text-xs font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Nonaktif
                                    </span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <button onclick='openEditLayananModal(@json($item))' title="Edit Layanan" class="p-1.5 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors">
                                            <span class="material-icons text-[18px]">edit</span>
                                        </button>
                                        <form action="{{ route('admin.layanan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan publik ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Hapus Layanan" class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                                <span class="material-icons text-[18px]">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-5 py-8 text-center text-slate-400 text-sm">Belum ada data layanan digital. Silakan klik Tambah Layanan Digital.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
@elseif($view_type == "sosmed")
            <!-- View: Kelola Media Sosial Resmi -->
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                        <span class="material-icons text-dikbud-primary">share</span> Kelola Media Sosial Resmi
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">Kelola tautan resmi Instagram, TikTok, YouTube, Facebook, dan akun media sosial Disdikbud Maluku lainnya.</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="/" target="_blank" class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors shadow-sm">
                        <span class="material-icons-outlined text-sm">visibility</span> Lihat di Website
                    </a>
                    <button onclick="openTambahSosmedModal()" class="flex items-center gap-2 px-4 py-2 bg-dikbud-primary hover:bg-dikbud-dark text-white rounded-lg text-sm font-bold shadow-md transition-colors">
                        <span class="material-icons text-sm">add_link</span> Tambah Media Sosial
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left text-sm">
                        <thead class="text-xs text-slate-500 bg-slate-50 border-b border-slate-200 uppercase">
                            <tr>
                                <th class="px-5 py-3 font-semibold text-center w-16">Urutan</th>
                                <th class="px-5 py-3 font-semibold w-56">Platform & Ikon</th>
                                <th class="px-5 py-3 font-semibold">Nama / Label</th>
                                <th class="px-5 py-3 font-semibold">Username / Handle</th>
                                <th class="px-5 py-3 font-semibold">Tautan URL</th>
                                <th class="px-5 py-3 font-semibold text-center w-28">Status</th>
                                <th class="px-5 py-3 font-semibold text-right w-32">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-600">
                            @forelse($social_media as $item)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-5 py-4 text-center font-bold text-slate-500">{{ $item->order }}</td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl flex items-center justify-center text-white shadow-sm {{ $item->badge_bg_class }}">
                                            <i class="{{ $item->icon_class }} text-base"></i>
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-800 capitalize text-sm">{{ $item->platform }}</div>
                                            <div class="text-[11px] text-slate-400 font-mono">{{ $item->icon_class }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="font-semibold text-slate-800">{{ $item->name }}</div>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-block px-2.5 py-1 bg-slate-100 text-slate-700 rounded-lg text-xs font-medium">
                                        {{ $item->username ?: '-' }}
                                    </span>
                                </td>
                                <td class="px-5 py-4">
                                    <a href="{{ $item->url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-xs text-blue-600 hover:text-blue-800 hover:underline max-w-xs truncate font-medium">
                                        <span class="truncate">{{ $item->url }}</span>
                                        <span class="material-icons-outlined text-[13px] flex-shrink-0">open_in_new</span>
                                    </a>
                                </td>
                                <td class="px-5 py-4 text-center">
                                    @if($item->is_active)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif
                                    </span>
                                    @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-slate-100 text-slate-500 rounded-full text-xs font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Nonaktif
                                    </span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <button onclick="openEditSosmedModal({{ json_encode($item) }})" title="Edit Media Sosial" class="p-1.5 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors">
                                            <span class="material-icons text-[18px]">edit</span>
                                        </button>
                                        <form action="{{ route('admin.sosmed.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus media sosial ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Hapus Media Sosial" class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                                <span class="material-icons text-[18px]">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-5 py-8 text-center text-slate-400 text-sm">Belum ada data media sosial. Silakan klik Tambah Media Sosial.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                            </div>
            @elseif($view_type == "portal")
            <!-- View: Kelola Konten Portal Berita & Kebudayaan -->
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                        <span class="material-icons text-dikbud-primary">public</span> Kelola Portal Berita, Budaya & Layanan
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">Kelola data berita portal, ragam seni & budaya, agenda kegiatan dinas, pusat unduhan dokumen, serta layanan pengaduan E-Lapor.</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('portal-resmi') }}" target="_blank" class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors shadow-sm">
                        <span class="material-icons-outlined text-sm">visibility</span> Kunjungi Portal Resmi
                    </a>
                    @if(($tab ?? 'news') == 'news')
                    <button onclick="openTambahPortalNewsModal()" class="flex items-center gap-2 px-4 py-2 bg-dikbud-primary hover:bg-dikbud-dark text-white rounded-lg text-sm font-bold shadow-md transition-colors">
                        <span class="material-icons text-sm">add_circle</span> Tambah Berita Portal
                    </button>
                    @elseif(($tab ?? 'news') == 'culture')
                    <button onclick="openTambahPortalCultureModal()" class="flex items-center gap-2 px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white rounded-lg text-sm font-bold shadow-md transition-colors">
                        <span class="material-icons text-sm">add_photo_alternate</span> Tambah Objek Budaya
                    </button>
                    @elseif(($tab ?? 'news') == 'agenda')
                    <button onclick="openTambahAgendaModal()" class="flex items-center gap-2 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-bold shadow-md transition-colors">
                        <span class="material-icons text-sm">event</span> Tambah Agenda Baru
                    </button>
                    @elseif(($tab ?? 'news') == 'dokumen')
                    <a href="{{ route('admin.dokumen.peraturan') }}" class="flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-bold shadow-md transition-colors">
                        <span class="material-icons text-sm">upload_file</span> Kelola Master Dokumen
                    </a>
                    @elseif(($tab ?? 'news') == 'elapor')
                    <a href="{{ route('admin.pengaduan') }}" class="flex items-center gap-2 px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-sm font-bold shadow-md transition-colors">
                        <span class="material-icons text-sm">mark_email_read</span> Respon Aduan Masuk
                    </a>
                    @endif
                </div>
            </div>

            <!-- Tab Switcher -->
            <div class="flex items-center gap-2 sm:gap-4 mb-6 border-b border-slate-200 overflow-x-auto pb-0.5">
                <a href="{{ route('admin.portal', ['tab' => 'news']) }}" class="pb-3 px-2 font-bold text-sm flex items-center gap-2 border-b-2 whitespace-nowrap transition-all {{ ($tab ?? 'news') == 'news' ? 'border-dikbud-primary text-dikbud-primary' : 'border-transparent text-slate-500 hover:text-slate-800' }}">
                    <span class="material-icons text-[18px]">article</span> Berita & Artikel ({{ count($portal_news ?? []) }})
                </a>
                <a href="{{ route('admin.portal', ['tab' => 'culture']) }}" class="pb-3 px-2 font-bold text-sm flex items-center gap-2 border-b-2 whitespace-nowrap transition-all {{ ($tab ?? 'news') == 'culture' ? 'border-dikbud-primary text-dikbud-primary' : 'border-transparent text-slate-500 hover:text-slate-800' }}">
                    <span class="material-icons text-[18px]">museum</span> Ragam Seni Budaya ({{ count($portal_cultures ?? []) }})
                </a>
                <a href="{{ route('admin.portal', ['tab' => 'agenda']) }}" class="pb-3 px-2 font-bold text-sm flex items-center gap-2 border-b-2 whitespace-nowrap transition-all {{ ($tab ?? 'news') == 'agenda' ? 'border-dikbud-primary text-dikbud-primary' : 'border-transparent text-slate-500 hover:text-slate-800' }}">
                    <span class="material-icons text-[18px]">calendar_month</span> Agenda Kegiatan Dinas ({{ count($agendas ?? []) }})
                </a>
                <a href="{{ route('admin.portal', ['tab' => 'dokumen']) }}" class="pb-3 px-2 font-bold text-sm flex items-center gap-2 border-b-2 whitespace-nowrap transition-all {{ ($tab ?? 'news') == 'dokumen' ? 'border-dikbud-primary text-dikbud-primary' : 'border-transparent text-slate-500 hover:text-slate-800' }}">
                    <span class="material-icons text-[18px]">download</span> Pusat Unduhan Dokumen ({{ count($dokumens ?? []) }})
                </a>
                
            </div>

            @if(($tab ?? 'news') == 'news')
            <!-- TAB 1: Berita Portal -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left text-sm">
                        <thead class="text-xs text-slate-500 bg-slate-50 border-b border-slate-200 uppercase">
                            <tr>
                                <th class="px-5 py-3 font-semibold text-center w-16">ID</th>
                                <th class="px-5 py-3 font-semibold w-24">Gambar</th>
                                <th class="px-5 py-3 font-semibold">Judul & Kategori</th>
                                <th class="px-5 py-3 font-semibold text-center w-36">Tanggal / Waktu</th>
                                <th class="px-5 py-3 font-semibold text-center w-32">Headline Slider</th>
                                <th class="px-5 py-3 font-semibold text-right w-32">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-600">
                            @forelse($portal_news as $item)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-5 py-4 text-center font-bold text-slate-500">{{ $item->id }}</td>
                                <td class="px-5 py-4">
                                    <div class="w-16 h-12 rounded-lg overflow-hidden bg-slate-100 border border-slate-200 shadow-sm flex items-center justify-center">
                                        <img src="{{ Str::startsWith($item->image, 'http') ? $item->image : asset($item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                                    </div>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="font-bold text-slate-800 text-sm">{{ $item->title }}</div>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="inline-block px-2 py-0.5 bg-blue-50 text-dikbud-primary rounded text-[11px] font-semibold uppercase">
                                            {{ $item->category }}
                                        </span>
                                        <span class="text-xs text-slate-400">• {{ $item->read_time }}</span>
                                    </div>
                                </td>
                                <td class="px-5 py-4 text-center text-xs font-medium text-slate-600">{{ $item->date }}</td>
                                <td class="px-5 py-4 text-center">
                                    @if($item->is_featured)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-amber-100 text-amber-800 rounded-full text-xs font-bold">
                                        <span class="material-icons text-[14px]">star</span> Headline
                                    </span>
                                    @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-slate-100 text-slate-500 rounded-full text-xs font-semibold">
                                        Standar
                                    </span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <button onclick="openEditPortalNewsModal({{ json_encode($item) }})" title="Edit Berita Portal" class="p-1.5 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors">
                                            <span class="material-icons text-[18px]">edit</span>
                                        </button>
                                        <form action="{{ route('admin.portal.news.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita portal ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Hapus Berita" class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                                <span class="material-icons text-[18px]">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-5 py-8 text-center text-slate-400 text-sm">Belum ada data berita portal. Silakan klik Tambah Berita Portal.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @elseif(($tab ?? 'news') == 'culture')
            <!-- TAB 2: Ragam Budaya Maluku -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left text-sm">
                        <thead class="text-xs text-slate-500 bg-slate-50 border-b border-slate-200 uppercase">
                            <tr>
                                <th class="px-5 py-3 font-semibold text-center w-16">ID</th>
                                <th class="px-5 py-3 font-semibold w-24">Gambar</th>
                                <th class="px-5 py-3 font-semibold">Judul Objek Budaya</th>
                                <th class="px-5 py-3 font-semibold">Tipe / Kategori</th>
                                <th class="px-5 py-3 font-semibold">Lokasi Asal</th>
                                <th class="px-5 py-3 font-semibold text-right w-32">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-600">
                            @forelse($portal_cultures as $item)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-5 py-4 text-center font-bold text-slate-500">{{ $item->id }}</td>
                                <td class="px-5 py-4">
                                    <div class="w-16 h-12 rounded-lg overflow-hidden bg-slate-100 border border-slate-200 shadow-sm flex items-center justify-center">
                                        <img src="{{ Str::startsWith($item->image, 'http') ? $item->image : asset($item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                                    </div>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="font-bold text-slate-800 text-sm">{{ $item->title }}</div>
                                    <div class="text-xs text-slate-400 mt-0.5 line-clamp-1 max-w-sm">{{ $item->desc }}</div>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-block px-2.5 py-1 bg-amber-50 text-amber-800 rounded-lg text-xs font-semibold">
                                        {{ $item->type }}
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-xs font-medium text-slate-600">
                                    <span class="flex items-center gap-1">
                                        <span class="material-icons-outlined text-[14px] text-slate-400">location_on</span>
                                        {{ $item->location }}
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <button onclick="openEditPortalCultureModal({{ json_encode($item) }})" title="Edit Objek Budaya" class="p-1.5 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors">
                                            <span class="material-icons text-[18px]">edit</span>
                                        </button>
                                        <form action="{{ route('admin.portal.culture.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus objek kebudayaan ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Hapus Budaya" class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                                <span class="material-icons text-[18px]">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-5 py-8 text-center text-slate-400 text-sm">Belum ada data objek kebudayaan. Silakan klik Tambah Objek Budaya.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @elseif(($tab ?? 'news') == 'agenda')
            <!-- TAB 3: Agenda Kegiatan Dinas -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                <div class="p-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
                    <span class="text-xs font-bold text-slate-600 uppercase tracking-wider">Daftar Jadwal & Agenda Dinas Terdaftar</span>
                    <button onclick="openTambahAgendaModal()" class="px-3 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-xs font-bold flex items-center gap-1">
                        <span class="material-icons text-[14px]">add</span> Tambah Agenda
                    </button>
                </div>
                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left text-sm">
                        <thead class="text-xs text-slate-500 bg-slate-50 border-b border-slate-200 uppercase">
                            <tr>
                                <th class="px-5 py-3 font-semibold text-center w-16">ID</th>
                                <th class="px-5 py-3 font-semibold w-40">Tanggal</th>
                                <th class="px-5 py-3 font-semibold">Nama Kegiatan / Agenda</th>
                                <th class="px-5 py-3 font-semibold">Lokasi Pelaksanaan</th>
                                <th class="px-5 py-3 font-semibold text-right w-32">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-600">
                            @forelse($agendas as $item)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-5 py-4 text-center font-bold text-slate-500">{{ $item->id }}</td>
                                <td class="px-5 py-4">
                                    <div class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-emerald-50 text-emerald-800 rounded-lg text-xs font-bold">
                                        <span class="material-icons text-[14px]">event</span>
                                        {{ \Carbon\Carbon::parse($item->date)->translatedFormat('d M Y') }}
                                    </div>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="font-bold text-slate-800 text-sm">{{ $item->title }}</div>
                                </td>
                                <td class="px-5 py-4 text-xs font-medium text-slate-600">
                                    <span class="flex items-center gap-1">
                                        <span class="material-icons-outlined text-[14px] text-red-500">location_on</span>
                                        {{ $item->location }}
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <button onclick="openEditAgendaModal({{ json_encode($item) }})" title="Edit Agenda" class="p-1.5 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors">
                                            <span class="material-icons text-[18px]">edit</span>
                                        </button>
                                        <form action="{{ route('admin.agenda.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus agenda ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Hapus Agenda" class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                                <span class="material-icons text-[18px]">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-5 py-8 text-center text-slate-400 text-sm">Belum ada data agenda kegiatan. Silakan klik Tambah Agenda.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @elseif(($tab ?? 'news') == 'dokumen')
            <!-- TAB 4: Pusat Unduhan Dokumen -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                <div class="p-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
                    <div>
                        <span class="text-xs font-bold text-slate-600 uppercase tracking-wider">Daftar Dokumen Regulasi & Unduhan Publik</span>
                        <p class="text-xs text-slate-400 mt-0.5">Dokumen ini tampil pada bagian Pusat Unduhan di Halaman Portal Resmi dan Beranda.</p>
                    </div>
                    <a href="{{ route('admin.dokumen.peraturan') }}" class="px-3.5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-xs font-bold flex items-center gap-1.5 shadow-sm">
                        <span class="material-icons text-[16px]">tune</span> Buka Manajemen Master Dokumen
                    </a>
                </div>
                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left text-sm">
                        <thead class="text-xs text-slate-500 bg-slate-50 border-b border-slate-200 uppercase">
                            <tr>
                                <th class="px-5 py-3 font-semibold text-center w-16">No</th>
                                <th class="px-5 py-3 font-semibold">Nama Dokumen & Regulasi</th>
                                <th class="px-5 py-3 font-semibold">Kategori / Tag</th>
                                <th class="px-5 py-3 font-semibold text-center">Status</th>
                                <th class="px-5 py-3 font-semibold text-right">Tautan / Download</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-600">
                            @forelse($dokumens as $item)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-5 py-4 text-center font-bold text-slate-500">{{ $item->no }}</td>
                                <td class="px-5 py-4">
                                    <div class="font-bold text-slate-800 text-sm">{{ $item->title }}</div>
                                    <div class="text-xs text-slate-400 mt-0.5">Diunduh: {{ number_format($item->download_count ?? 0, 0, ',', '.') }}x</div>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-block px-2.5 py-1 bg-slate-100 text-slate-700 rounded-lg text-xs font-semibold">
                                        {{ $item->tag ?? 'Dokumen Resmi' }}
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-center">
                                    @if($item->is_active)
                                    <span class="px-2.5 py-1 bg-emerald-100 text-emerald-800 rounded-full text-xs font-bold">Aktif</span>
                                    @else
                                    <span class="px-2.5 py-1 bg-slate-200 text-slate-600 rounded-full text-xs">Nonaktif</span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <a href="{{ $item->url ?: ($item->file_path ? asset($item->file_path) : '#') }}" target="_blank" class="inline-flex items-center gap-1 px-3 py-1.5 bg-slate-100 hover:bg-dikbud-primary hover:text-white rounded-lg text-xs font-semibold text-slate-700 transition-colors">
                                        <span class="material-icons text-[14px]">download</span> Unduh File
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-5 py-8 text-center text-slate-400 text-sm">Belum ada dokumen yang tersedia.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @elseif(($tab ?? 'news') == 'elapor')
            <!-- TAB 5: Layanan Pengaduan E-Lapor -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                <div class="p-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
                    <div>
                        <span class="text-xs font-bold text-slate-600 uppercase tracking-wider">Aspirasi & Laporan Masyarakat Masuk</span>
                        <p class="text-xs text-slate-400 mt-0.5">Semua laporan dari form E-Lapor Portal Resmi tersimpan otomatis di sistem ini.</p>
                    </div>
                    <a href="{{ route('admin.pengaduan') }}" class="px-3.5 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-xs font-bold flex items-center gap-1.5 shadow-sm">
                        <span class="material-icons text-[16px]">admin_panel_settings</span> Buka Panel Layanan Pengaduan Lengkap
                    </a>
                </div>
                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left text-sm">
                        <thead class="text-xs text-slate-500 bg-slate-50 border-b border-slate-200 uppercase">
                            <tr>
                                <th class="px-5 py-3 font-semibold text-center w-16">ID</th>
                                <th class="px-5 py-3 font-semibold">Pelapor & Kontak</th>
                                <th class="px-5 py-3 font-semibold">Kategori & Asal</th>
                                <th class="px-5 py-3 font-semibold">Rincian Laporan</th>
                                <th class="px-5 py-3 font-semibold text-center">Status</th>
                                <th class="px-5 py-3 font-semibold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-600">
                            @forelse($complaints as $item)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-5 py-4 text-center font-bold text-slate-500">{{ $item->id }}</td>
                                <td class="px-5 py-4">
                                    <div class="font-bold text-slate-800 text-sm">{{ $item->sender_name }}</div>
                                    <div class="text-xs text-slate-400 flex items-center gap-1 mt-0.5">
                                        <span class="material-icons text-[12px]">phone</span> {{ $item->whatsapp ?: '-' }}
                                    </div>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-block px-2.5 py-1 bg-amber-50 text-amber-800 rounded-lg text-xs font-semibold">
                                        {{ $item->kategori ?: 'Umum' }}
                                    </span>
                                    <div class="text-xs text-slate-500 mt-1">{{ $item->instansi ?: 'Prov. Maluku' }}</div>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="text-xs text-slate-700 line-clamp-2 max-w-sm">{{ $item->description }}</div>
                                </td>
                                <td class="px-5 py-4 text-center">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-bold {{ $item->status == 'Selesai' ? 'bg-emerald-100 text-emerald-800' : ($item->status == 'Diproses' ? 'bg-blue-100 text-blue-800' : 'bg-amber-100 text-amber-800') }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <a href="{{ route('admin.pengaduan') }}" class="px-3 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-xs font-bold transition-colors">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-5 py-8 text-center text-slate-400 text-sm">Belum ada aduan masyarakat yang masuk.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
            @elseif($view_type == "profil")
            <!-- View: Kelola Profil & Kelembagaan Instansi -->
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                        <span class="material-icons text-dikbud-primary">domain</span> Kelola Profil &amp; Kelembagaan Instansi
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">Kelola data visi misi, tugas pokok &amp; fungsi, serta struktur organisasi beserta file dokumen &amp; gambar bagan resmi.</p>
                </div>
                <div class="flex items-center gap-3">
                    @if(($tab ?? 'visi_misi') == 'visi_misi')
                    <a href="{{ route('visi.misi') }}" target="_blank" class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors shadow-sm">
                        <span class="material-icons-outlined text-sm">visibility</span> Pratinjau Visi &amp; Misi
                    </a>
                    @elseif(($tab ?? 'visi_misi') == 'tugas_fungsi')
                    <a href="{{ route('tugas.fungsi') }}" target="_blank" class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors shadow-sm">
                        <span class="material-icons-outlined text-sm">visibility</span> Pratinjau Tugas &amp; Fungsi
                    </a>
                    @elseif(($tab ?? 'visi_misi') == 'struktur_organisasi')
                    <a href="{{ route('struktur.organisasi') }}" target="_blank" class="flex items-center gap-2 px-4 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors shadow-sm">
                        <span class="material-icons-outlined text-sm">visibility</span> Pratinjau Struktur Organisasi
                    </a>
                    @endif
                </div>
            </div>

            <!-- Tab Switcher -->
            <div class="flex items-center gap-2 sm:gap-4 mb-6 border-b border-slate-200 overflow-x-auto pb-0.5">
                <a href="{{ route('admin.profil', ['tab' => 'visi_misi']) }}" class="pb-3 px-3 font-bold text-sm flex items-center gap-2 border-b-2 whitespace-nowrap transition-all {{ ($tab ?? 'visi_misi') == 'visi_misi' ? 'border-dikbud-primary text-dikbud-primary' : 'border-transparent text-slate-500 hover:text-slate-800' }}">
                    <span class="material-icons text-[18px]">visibility</span> Visi &amp; Misi
                </a>
                <a href="{{ route('admin.profil', ['tab' => 'tugas_fungsi']) }}" class="pb-3 px-3 font-bold text-sm flex items-center gap-2 border-b-2 whitespace-nowrap transition-all {{ ($tab ?? 'visi_misi') == 'tugas_fungsi' ? 'border-dikbud-primary text-dikbud-primary' : 'border-transparent text-slate-500 hover:text-slate-800' }}">
                    <span class="material-icons text-[18px]">assignment</span> Tugas &amp; Fungsi
                </a>
                <a href="{{ route('admin.profil', ['tab' => 'struktur_organisasi']) }}" class="pb-3 px-3 font-bold text-sm flex items-center gap-2 border-b-2 whitespace-nowrap transition-all {{ ($tab ?? 'visi_misi') == 'struktur_organisasi' ? 'border-dikbud-primary text-dikbud-primary' : 'border-transparent text-slate-500 hover:text-slate-800' }}">
                    <span class="material-icons text-[18px]">account_tree</span> Struktur Organisasi
                </a>
            </div>

            @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="material-icons text-emerald-600">check_circle</span>
                    <span class="text-sm font-semibold">{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700">
                    <span class="material-icons text-sm">close</span>
                </button>
            </div>
            @endif

            @if(isset($errors) && $errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-xl">
                <div class="flex items-center gap-3 mb-2">
                    <span class="material-icons text-red-600">error</span>
                    <span class="text-sm font-bold">Terjadi kesalahan validasi:</span>
                </div>
                <ul class="list-disc list-inside text-xs space-y-1 text-red-700 pl-7">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(($tab ?? 'visi_misi') == 'visi_misi')
            <!-- TAB 1: Visi & Misi -->
            <form action="{{ route('admin.visi_misi.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                    <!-- Left: Teks Banner & Visi Misi -->
                    <div class="lg:col-span-7 space-y-6">
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                            <div class="flex items-center gap-3 pb-4 mb-5 border-b border-slate-100">
                                <div class="w-9 h-9 rounded-xl bg-blue-50 text-dikbud-primary flex items-center justify-center">
                                    <span class="material-icons text-xl">flag</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-800 text-base">Banner &amp; Judul Header</h3>
                                    <p class="text-xs text-slate-400">Pengaturan label badge, judul utama, dan kalimat pengantar halaman.</p>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Badge Banner Atas <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="banner_badge" value="{{ old('banner_badge', $visiMisi->banner_badge ?? 'ARAH KEBIJAKAN') }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary text-sm font-medium outline-none">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Judul Halaman <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="banner_title" value="{{ old('banner_title', $visiMisi->banner_title ?? 'Visi dan Misi') }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary text-sm font-bold outline-none">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Deskripsi Singkat Banner
                                    </label>
                                    <textarea name="banner_description" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary text-sm font-medium outline-none">{{ old('banner_description', $visiMisi->banner_description ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                            <div class="flex items-center gap-3 pb-4 mb-5 border-b border-slate-100">
                                <div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                                    <span class="material-icons text-xl">auto_awesome</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-800 text-base">Rumusan Visi &amp; Misi Utama</h3>
                                    <p class="text-xs text-slate-400">Pernyataan visi pembangunan dan narasi pengantar misi.</p>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Pernyataan VISI <span class="text-red-500">*</span>
                                    </label>
                                    <textarea name="visi_text" rows="4" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary text-sm font-medium outline-none leading-relaxed">{{ old('visi_text', $visiMisi->visi_text ?? '') }}</textarea>
                                    <p class="text-xs text-slate-400 mt-1">Pernyataan visi utama yang tampil di kartu utama halaman Visi &amp; Misi.</p>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Teks Pengantar MISI
                                    </label>
                                    <textarea name="misi_description" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary text-sm font-medium outline-none">{{ old('misi_description', $visiMisi->misi_description ?? '') }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Rumusan Singkat VISI
                                    </label>
                                    <textarea name="rumusan_singkat_visi" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary text-sm font-medium outline-none">{{ old('rumusan_singkat_visi', $visiMisi->rumusan_singkat_visi ?? '') }}</textarea>
                                    <p class="text-xs text-slate-400 mt-1">Teks yang ditampilkan pada panel Rumusan Singkat di bagian bawah halaman.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: File Dokumen SK Visi & Misi & Aksi -->
                    <div class="lg:col-span-5 space-y-6">
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                            <div class="flex items-center gap-3 pb-4 mb-5 border-b border-slate-100">
                                <div class="w-9 h-9 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center">
                                    <span class="material-icons text-xl">attach_file</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-800 text-base">File Dokumen Resmi SK Visi Misi</h3>
                                    <p class="text-xs text-slate-400">Unggah, ganti, atau hapus file dokumen pendukung (PDF/DOCX).</p>
                                </div>
                            </div>

                            <!-- Current File Status -->
                            <div class="mb-5">
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                                    Status Dokumen Saat Ini:
                                </label>
                                @if(!empty($visiMisi->file_path))
                                <div class="p-4 rounded-xl border border-blue-200 bg-blue-50/50 flex flex-col gap-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-blue-600 text-white flex items-center justify-center flex-shrink-0 shadow-sm">
                                            <span class="material-icons text-xl">picture_as_pdf</span>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <p class="text-sm font-bold text-slate-800 truncate" title="{{ $visiMisi->file_name ?? basename($visiMisi->file_path) }}">
                                                {{ $visiMisi->file_name ?? basename($visiMisi->file_path) }}
                                            </p>
                                            <p class="text-xs text-slate-500">Ukuran: {{ $visiMisi->file_size ?? 'Dokumen Resmi' }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2 pt-2 border-t border-blue-200/60">
                                        <a href="{{ asset($visiMisi->file_path) }}" target="_blank" download class="flex-1 flex items-center justify-center gap-1.5 px-3 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-lg text-xs font-bold text-slate-700 shadow-sm transition-colors">
                                            <span class="material-icons text-[16px]">download</span> Unduh File
                                        </a>
                                        <button type="button" onclick="if(confirm('Apakah Anda yakin ingin menghapus file dokumen SK Visi Misi ini? File fisik dan tautan di web publik akan dihapus.')) { document.getElementById('form-delete-visimisi-file').submit(); }" class="flex items-center justify-center gap-1.5 px-3 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-xs font-bold shadow-sm transition-colors">
                                            <span class="material-icons text-[16px]">delete</span> Hapus File
                                        </button>
                                    </div>
                                </div>
                                <p class="text-xs text-slate-500 mt-2 flex items-center gap-1">
                                    <span class="material-icons text-[14px] text-emerald-600">info</span>
                                    File aktif akan otomatis terganti jika Anda memilih file baru di bawah.
                                </p>
                                @else
                                <div class="p-5 rounded-xl border border-dashed border-slate-300 bg-slate-50 text-center">
                                    <span class="material-icons text-slate-400 text-3xl mb-1">upload_file</span>
                                    <p class="text-xs font-semibold text-slate-600">Belum ada file dokumen resmi yang diunggah.</p>
                                    <p class="text-[11px] text-slate-400 mt-0.5">Silakan pilih file di bawah untuk menambahkan tombol unduhan dokumen resmi di web publik.</p>
                                </div>
                                @endif
                            </div>

                            <!-- Upload New / Replacement File -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                    {{ !empty($visiMisi->file_path) ? 'Pilih File Baru (Mengganti File Lama)' : 'Unggah File Dokumen Resmi' }}
                                </label>
                                <input type="file" name="document_file" accept=".pdf,.doc,.docx,.zip,.png,.jpg" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-dikbud-primary hover:file:bg-blue-100 border border-slate-300 rounded-xl cursor-pointer">
                                <p class="text-[11px] text-slate-400 mt-1.5">Format didukung: PDF, DOC, DOCX, ZIP. Maksimal 20MB.</p>
                            </div>
                        </div>

                        <!-- Submit Box -->
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-3">
                            <button type="submit" class="w-full flex items-center justify-center gap-2 px-5 py-3.5 bg-dikbud-primary hover:bg-dikbud-dark text-white rounded-xl font-bold shadow-md hover:shadow-lg transition-all text-sm">
                                <span class="material-icons text-lg">save</span> Simpan Perubahan Visi &amp; Misi
                            </button>
                            <a href="{{ route('visi.misi') }}" target="_blank" class="w-full flex items-center justify-center gap-2 px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-semibold transition-colors text-xs">
                                <span class="material-icons text-sm">open_in_new</span> Lihat Halaman Visi Misi Publik
                            </a>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Hidden Form for Delete File -->
            <form id="form-delete-visimisi-file" action="{{ route('admin.visi_misi.delete_file') }}" method="POST" class="hidden">
                @csrf
                @method('DELETE')
            </form>

            @elseif(($tab ?? 'visi_misi') == 'tugas_fungsi')
            <!-- TAB 2: Tugas & Fungsi -->
            <form action="{{ route('admin.tugas_fungsi.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                    <!-- Left: Header, Stats, Tugas Pokok -->
                    <div class="lg:col-span-7 space-y-6">
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                            <div class="flex items-center gap-3 pb-4 mb-5 border-b border-slate-100">
                                <div class="w-9 h-9 rounded-xl bg-blue-50 text-dikbud-primary flex items-center justify-center">
                                    <span class="material-icons text-xl">view_headline</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-800 text-base">Header &amp; Slogan Halaman</h3>
                                    <p class="text-xs text-slate-400">Pengaturan banner atas dan teks pengantar profil tugas fungsi.</p>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Badge Pita Atas <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="header_badge" value="{{ old('header_badge', $tugasFungsi->header_badge ?? 'Pemerintah Provinsi Maluku') }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary text-sm font-medium outline-none">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Judul Utama Banner <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="header_title" value="{{ old('header_title', $tugasFungsi->header_title ?? 'Dinas Pendidikan dan Kebudayaan') }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary text-sm font-bold outline-none">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Slogan / Subtitle
                                    </label>
                                    <textarea name="header_subtitle" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary text-sm font-medium outline-none">{{ old('header_subtitle', $tugasFungsi->header_subtitle ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- 4 Statistik Floating Dashboard -->
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                            <div class="flex items-center gap-3 pb-4 mb-5 border-b border-slate-100">
                                <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                                    <span class="material-icons text-xl">analytics</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-800 text-base">4 Kartu Statistik Floating Infografis</h3>
                                    <p class="text-xs text-slate-400">Nilai statistik ringkas yang tampil pada floating banner halaman publik.</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Sekolah</label>
                                    <input type="text" name="stat_sekolah" value="{{ old('stat_sekolah', $tugasFungsi->stat_sekolah ?? '345+') }}" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-sm font-bold outline-none focus:border-dikbud-primary">
                                    <span class="text-[10px] text-slate-400">Sekolah Menengah</span>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Guru</label>
                                    <input type="text" name="stat_guru" value="{{ old('stat_guru', $tugasFungsi->stat_guru ?? '8.2K') }}" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-sm font-bold outline-none focus:border-dikbud-primary">
                                    <span class="text-[10px] text-slate-400">Tenaga Pendidik</span>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Siswa</label>
                                    <input type="text" name="stat_siswa" value="{{ old('stat_siswa', $tugasFungsi->stat_siswa ?? '112K') }}" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-sm font-bold outline-none focus:border-dikbud-primary">
                                    <span class="text-[10px] text-slate-400">Peserta Didik</span>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Budaya</label>
                                    <input type="text" name="stat_cagar_budaya" value="{{ old('stat_cagar_budaya', $tugasFungsi->stat_cagar_budaya ?? '56+') }}" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-sm font-bold outline-none focus:border-dikbud-primary">
                                    <span class="text-[10px] text-slate-400">Cagar Budaya</span>
                                </div>
                            </div>
                        </div>

                        <!-- Tugas Pokok & Pembantuan -->
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                            <div class="flex items-center gap-3 pb-4 mb-5 border-b border-slate-100">
                                <div class="w-9 h-9 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
                                    <span class="material-icons text-xl">assignment</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-800 text-base">Uraian Tugas Pokok &amp; Pembantuan</h3>
                                    <p class="text-xs text-slate-400">Narasi tugas utama dinas dan catatan batasan kewenangan daerah.</p>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Tugas Pokok Dinas <span class="text-red-500">*</span>
                                    </label>
                                    <textarea name="tugas_pokok" rows="4" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary text-sm font-medium outline-none leading-relaxed">{{ old('tugas_pokok', $tugasFungsi->tugas_pokok ?? '') }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Tugas Pembantuan
                                    </label>
                                    <textarea name="tugas_pembantuan" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary text-sm font-medium outline-none leading-relaxed">{{ old('tugas_pembantuan', $tugasFungsi->tugas_pembantuan ?? '') }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Catatan Penting Kewenangan (UU 23/2014)
                                    </label>
                                    <textarea name="catatan_kewenangan" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary text-sm font-medium outline-none leading-relaxed">{{ old('catatan_kewenangan', $tugasFungsi->catatan_kewenangan ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Media & Dokumen Tupoksi -->
                    <div class="lg:col-span-5 space-y-6">
                        <!-- Foto Ilustrasi Tugas Dinas -->
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                            <div class="flex items-center gap-3 pb-4 mb-5 border-b border-slate-100">
                                <div class="w-9 h-9 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center">
                                    <span class="material-icons text-xl">image</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-800 text-base">Foto Ilustrasi Tugas</h3>
                                    <p class="text-xs text-slate-400">Gambar yang tampil mendampingi narasi Tugas Pokok Dinas.</p>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div class="rounded-xl overflow-hidden border border-slate-200 bg-slate-100 relative group aspect-video">
                                    <img src="{{ !empty($tugasFungsi->image_tugas) ? (str_starts_with($tugasFungsi->image_tugas, 'http') ? $tugasFungsi->image_tugas : asset($tugasFungsi->image_tugas)) : 'https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=1000&q=80' }}" alt="Ilustrasi Tugas" class="w-full h-full object-cover">
                                    @if(!empty($tugasFungsi->image_tugas) && str_starts_with($tugasFungsi->image_tugas, '/images/profil/'))
                                    <div class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center p-4">
                                        <button type="button" onclick="if(confirm('Reset foto ilustrasi ke default sistem?')) { document.getElementById('form-delete-tugas-image').submit(); }" class="px-3 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-xs font-bold flex items-center gap-1.5 shadow-md">
                                            <span class="material-icons text-sm">refresh</span> Reset ke Default
                                        </button>
                                    </div>
                                    @endif
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Ganti Foto Ilustrasi
                                    </label>
                                    <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 border border-slate-300 rounded-xl cursor-pointer">
                                    <p class="text-[11px] text-slate-400 mt-1.5">Format: JPG, PNG, WEBP. Maksimal 10MB.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Dokumen Resmi Pergub Tupoksi -->
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                            <div class="flex items-center gap-3 pb-4 mb-5 border-b border-slate-100">
                                <div class="w-9 h-9 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center">
                                    <span class="material-icons text-xl">file_present</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-800 text-base">File Dokumen Resmi Tupoksi</h3>
                                    <p class="text-xs text-slate-400">Unggah, ganti, atau hapus dokumen Pergub Tupoksi.</p>
                                </div>
                            </div>

                            <div class="mb-5">
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                                    Status Dokumen Saat Ini:
                                </label>
                                @if(!empty($tugasFungsi->file_path))
                                <div class="p-4 rounded-xl border border-blue-200 bg-blue-50/50 flex flex-col gap-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-blue-600 text-white flex items-center justify-center flex-shrink-0 shadow-sm">
                                            <span class="material-icons text-xl">description</span>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <p class="text-sm font-bold text-slate-800 truncate" title="{{ $tugasFungsi->file_name ?? basename($tugasFungsi->file_path) }}">
                                                {{ $tugasFungsi->file_name ?? basename($tugasFungsi->file_path) }}
                                            </p>
                                            <p class="text-xs text-slate-500">Ukuran: {{ $tugasFungsi->file_size ?? 'Dokumen Resmi' }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2 pt-2 border-t border-blue-200/60">
                                        <a href="{{ asset($tugasFungsi->file_path) }}" target="_blank" download class="flex-1 flex items-center justify-center gap-1.5 px-3 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-lg text-xs font-bold text-slate-700 shadow-sm transition-colors">
                                            <span class="material-icons text-[16px]">download</span> Unduh File
                                        </a>
                                        <button type="button" onclick="if(confirm('Hapus file dokumen Tupoksi ini?')) { document.getElementById('form-delete-tugas-file').submit(); }" class="flex items-center justify-center gap-1.5 px-3 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-xs font-bold shadow-sm transition-colors">
                                            <span class="material-icons text-[16px]">delete</span> Hapus File
                                        </button>
                                    </div>
                                </div>
                                <p class="text-xs text-slate-500 mt-2 flex items-center gap-1">
                                    <span class="material-icons text-[14px] text-emerald-600">info</span>
                                    File aktif akan otomatis diganti jika Anda memilih file baru di bawah.
                                </p>
                                @else
                                <div class="p-5 rounded-xl border border-dashed border-slate-300 bg-slate-50 text-center">
                                    <span class="material-icons text-slate-400 text-3xl mb-1">upload_file</span>
                                    <p class="text-xs font-semibold text-slate-600">Belum ada file dokumen Tupoksi yang diunggah.</p>
                                    <p class="text-[11px] text-slate-400 mt-0.5">Unggah dokumen resmi Pergub Tupoksi agar dapat diunduh masyarakat di web publik.</p>
                                </div>
                                @endif
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                    {{ !empty($tugasFungsi->file_path) ? 'Pilih File Baru (Mengganti File Lama)' : 'Unggah File Dokumen Tupoksi' }}
                                </label>
                                <input type="file" name="document_file" accept=".pdf,.doc,.docx,.zip,.png,.jpg" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 border border-slate-300 rounded-xl cursor-pointer">
                                <p class="text-[11px] text-slate-400 mt-1.5">Format: PDF, DOC, DOCX. Maksimal 20MB.</p>
                            </div>
                        </div>

                        <!-- Submit Box -->
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-3">
                            <button type="submit" class="w-full flex items-center justify-center gap-2 px-5 py-3.5 bg-dikbud-primary hover:bg-dikbud-dark text-white rounded-xl font-bold shadow-md hover:shadow-lg transition-all text-sm">
                                <span class="material-icons text-lg">save</span> Simpan Perubahan Tugas &amp; Fungsi
                            </button>
                            <a href="{{ route('tugas.fungsi') }}" target="_blank" class="w-full flex items-center justify-center gap-2 px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-semibold transition-colors text-xs">
                                <span class="material-icons text-sm">open_in_new</span> Lihat Halaman Tugas &amp; Fungsi Publik
                            </a>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Hidden Forms for Tugas Fungsi -->
            <form id="form-delete-tugas-file" action="{{ route('admin.tugas_fungsi.delete_file') }}" method="POST" class="hidden">
                @csrf
                @method('DELETE')
            </form>
            <form id="form-delete-tugas-image" action="{{ route('admin.tugas_fungsi.delete_image') }}" method="POST" class="hidden">
                @csrf
                @method('DELETE')
            </form>

            @elseif(($tab ?? 'visi_misi') == 'struktur_organisasi')
            <!-- TAB 3: Struktur Organisasi -->
            <form action="{{ route('admin.struktur_organisasi.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                    <!-- Left: Header & Informasi -->
                    <div class="lg:col-span-7 space-y-6">
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                            <div class="flex items-center gap-3 pb-4 mb-5 border-b border-slate-100">
                                <div class="w-9 h-9 rounded-xl bg-blue-50 text-dikbud-primary flex items-center justify-center">
                                    <span class="material-icons text-xl">account_tree</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-800 text-base">Header Struktur Organisasi</h3>
                                    <p class="text-xs text-slate-400">Pengaturan label dan judul banner halaman Struktur Organisasi.</p>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Badge Banner Atas <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="header_badge" value="{{ old('header_badge', $strukturOrganisasi->header_badge ?? 'Dashboard Informasi') }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary text-sm font-medium outline-none">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Judul Utama Halaman <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="header_title" value="{{ old('header_title', $strukturOrganisasi->header_title ?? 'Struktur Organisasi') }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary text-sm font-bold outline-none">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Subtitle / Instansi
                                    </label>
                                    <textarea name="header_subtitle" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary text-sm font-medium outline-none">{{ old('header_subtitle', $strukturOrganisasi->header_subtitle ?? 'Dinas Pendidikan dan Kebudayaan Provinsi Maluku') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Info Panel Diagram & Unit Kerja -->
                        <div class="bg-gradient-to-br from-slate-900 to-dikbud-primary rounded-2xl p-6 text-white shadow-md">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center flex-shrink-0 text-amber-400 text-2xl border border-white/20">
                                    <span class="material-icons">hub</span>
                                </div>
                                <div>
                                    <h4 class="text-base font-bold mb-1">Visualisasi Hierarki Interaktif ECharts</h4>
                                    <p class="text-xs text-blue-100 leading-relaxed">
                                        Halaman Struktur Organisasi publik secara interaktif memvisualisasikan hierarki jabatan (Kepala Dinas, Sekretariat, Bidang SMA, SMK, SLB, Ketenagaan, Kebudayaan, Cabang Dinas &amp; Fungsional) beserta 3 Kegiatan Utama.
                                    </p>
                                    <div class="mt-4 pt-3 border-t border-white/15 flex flex-wrap items-center gap-3 text-xs text-amber-300 font-semibold">
                                        <span class="flex items-center gap-1"><span class="material-icons text-sm">check_circle</span> 9 Unit Kerja Aktif</span>
                                        <span class="flex items-center gap-1"><span class="material-icons text-sm">check_circle</span> Interactive Tree Zoom</span>
                                        <span class="flex items-center gap-1"><span class="material-icons text-sm">check_circle</span> Bar Chart Distribusi</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: File Bagan Gambar & SK Struktur Organisasi -->
                    <div class="lg:col-span-5 space-y-6">
                        <!-- File Bagan Gambar (Flowchart / Diagram Image) -->
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                            <div class="flex items-center gap-3 pb-4 mb-5 border-b border-slate-100">
                                <div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                                    <span class="material-icons text-xl">schema</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-800 text-base">File Gambar Bagan Struktur</h3>
                                    <p class="text-xs text-slate-400">Unggah, ganti, atau hapus gambar bagan struktur organisasi.</p>
                                </div>
                            </div>

                            <div class="mb-5">
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                                    Bagan Gambar Saat Ini:
                                </label>
                                @if(!empty($strukturOrganisasi->bagan_image))
                                <div class="space-y-3 p-3 rounded-xl border border-amber-200 bg-amber-50/50">
                                    <div class="aspect-video bg-white rounded-lg border border-amber-200 overflow-hidden relative group">
                                        <img src="{{ asset($strukturOrganisasi->bagan_image) }}" alt="Bagan Struktur Organisasi" class="w-full h-full object-contain p-2">
                                        <div class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2 p-2">
                                            <a href="{{ asset($strukturOrganisasi->bagan_image) }}" target="_blank" class="px-3 py-1.5 bg-white text-slate-800 rounded-lg text-xs font-bold flex items-center gap-1 shadow">
                                                <span class="material-icons text-xs">zoom_in</span> Lihat Penuh
                                            </a>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <a href="{{ asset($strukturOrganisasi->bagan_image) }}" target="_blank" download class="flex-1 flex items-center justify-center gap-1.5 px-3 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-lg text-xs font-bold text-slate-700 shadow-sm transition-colors">
                                            <span class="material-icons text-[16px]">download</span> Unduh Bagan
                                        </a>
                                        <button type="button" onclick="if(confirm('Hapus file gambar bagan struktur organisasi ini?')) { document.getElementById('form-delete-struktur-bagan').submit(); }" class="flex items-center justify-center gap-1.5 px-3 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-xs font-bold shadow-sm transition-colors">
                                            <span class="material-icons text-[16px]">delete</span> Hapus Bagan
                                        </button>
                                    </div>
                                </div>
                                <p class="text-xs text-slate-500 mt-2 flex items-center gap-1">
                                    <span class="material-icons text-[14px] text-emerald-600">info</span>
                                    Bagan aktif akan otomatis diganti jika Anda memilih gambar baru di bawah.
                                </p>
                                @else
                                <div class="p-5 rounded-xl border border-dashed border-slate-300 bg-slate-50 text-center">
                                    <span class="material-icons text-slate-400 text-3xl mb-1">add_photo_alternate</span>
                                    <p class="text-xs font-semibold text-slate-600">Belum ada file gambar bagan resmi.</p>
                                    <p class="text-[11px] text-slate-400 mt-0.5">Unggah gambar diagram bagan dinas untuk menampilkan foto bagan resmi di web publik.</p>
                                </div>
                                @endif
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                    {{ !empty($strukturOrganisasi->bagan_image) ? 'Pilih Gambar Baru (Mengganti Bagan Lama)' : 'Unggah File Gambar Bagan' }}
                                </label>
                                <input type="file" name="bagan_file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-amber-50 file:text-amber-800 hover:file:bg-amber-100 border border-slate-300 rounded-xl cursor-pointer">
                                <p class="text-[11px] text-slate-400 mt-1.5">Format: JPG, PNG, WEBP. Maksimal 20MB.</p>
                            </div>
                        </div>

                        <!-- File Dokumen SK Struktur Organisasi (PDF/Doc) -->
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                            <div class="flex items-center gap-3 pb-4 mb-5 border-b border-slate-100">
                                <div class="w-9 h-9 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center">
                                    <span class="material-icons text-xl">description</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-800 text-base">File Dokumen SK Struktur</h3>
                                    <p class="text-xs text-slate-400">Unggah, ganti, atau hapus dokumen SK Penetapan Struktur Organisasi.</p>
                                </div>
                            </div>

                            <div class="mb-5">
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                                    Status Dokumen SK Saat Ini:
                                </label>
                                @if(!empty($strukturOrganisasi->file_path))
                                <div class="p-4 rounded-xl border border-blue-200 bg-blue-50/50 flex flex-col gap-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-blue-600 text-white flex items-center justify-center flex-shrink-0 shadow-sm">
                                            <span class="material-icons text-xl">picture_as_pdf</span>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <p class="text-sm font-bold text-slate-800 truncate" title="{{ $strukturOrganisasi->file_name ?? basename($strukturOrganisasi->file_path) }}">
                                                {{ $strukturOrganisasi->file_name ?? basename($strukturOrganisasi->file_path) }}
                                            </p>
                                            <p class="text-xs text-slate-500">Ukuran: {{ $strukturOrganisasi->file_size ?? 'Dokumen Resmi' }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2 pt-2 border-t border-blue-200/60">
                                        <a href="{{ asset($strukturOrganisasi->file_path) }}" target="_blank" download class="flex-1 flex items-center justify-center gap-1.5 px-3 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-lg text-xs font-bold text-slate-700 shadow-sm transition-colors">
                                            <span class="material-icons text-[16px]">download</span> Unduh SK
                                        </a>
                                        <button type="button" onclick="if(confirm('Hapus file dokumen SK Struktur Organisasi ini?')) { document.getElementById('form-delete-struktur-file').submit(); }" class="flex items-center justify-center gap-1.5 px-3 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-xs font-bold shadow-sm transition-colors">
                                            <span class="material-icons text-[16px]">delete</span> Hapus SK
                                        </button>
                                    </div>
                                </div>
                                <p class="text-xs text-slate-500 mt-2 flex items-center gap-1">
                                    <span class="material-icons text-[14px] text-emerald-600">info</span>
                                    File SK akan otomatis diganti jika Anda memilih dokumen baru di bawah.
                                </p>
                                @else
                                <div class="p-5 rounded-xl border border-dashed border-slate-300 bg-slate-50 text-center">
                                    <span class="material-icons text-slate-400 text-3xl mb-1">upload_file</span>
                                    <p class="text-xs font-semibold text-slate-600">Belum ada file dokumen SK yang diunggah.</p>
                                    <p class="text-[11px] text-slate-400 mt-0.5">Unggah dokumen resmi SK Struktur Organisasi untuk publikasi resmi.</p>
                                </div>
                                @endif
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                    {{ !empty($strukturOrganisasi->file_path) ? 'Pilih File Baru (Mengganti Dokumen SK Lama)' : 'Unggah File Dokumen SK' }}
                                </label>
                                <input type="file" name="document_file" accept=".pdf,.doc,.docx,.zip,.png,.jpg" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 border border-slate-300 rounded-xl cursor-pointer">
                                <p class="text-[11px] text-slate-400 mt-1.5">Format: PDF, DOC, DOCX. Maksimal 20MB.</p>
                            </div>
                        </div>

                        <!-- Submit Box -->
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-3">
                            <button type="submit" class="w-full flex items-center justify-center gap-2 px-5 py-3.5 bg-dikbud-primary hover:bg-dikbud-dark text-white rounded-xl font-bold shadow-md hover:shadow-lg transition-all text-sm">
                                <span class="material-icons text-lg">save</span> Simpan Perubahan Struktur Organisasi
                            </button>
                            <a href="{{ route('struktur.organisasi') }}" target="_blank" class="w-full flex items-center justify-center gap-2 px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-semibold transition-colors text-xs">
                                <span class="material-icons text-sm">open_in_new</span> Lihat Halaman Struktur Organisasi Publik
                            </a>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Hidden Forms for Struktur Organisasi -->
            <form id="form-delete-struktur-bagan" action="{{ route('admin.struktur_organisasi.delete_bagan') }}" method="POST" class="hidden">
                @csrf
                @method('DELETE')
            </form>
            <form id="form-delete-struktur-file" action="{{ route('admin.struktur_organisasi.delete_file') }}" method="POST" class="hidden">
                @csrf
                @method('DELETE')
            </form>
            @endif
            @elseif($view_type == "sop")
            <!-- View: Kelola SOP 14 Komponen & Berkas Permohonan Masuk -->
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                        <span class="material-icons text-dikbud-primary">assignment_turned_in</span> SOP 14 Komponen &amp; Berkas Layanan
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">Kelola dokumen resmi SOP 14 Komponen seluruh layanan bidang dan monitor berkas persyaratan yang diunggah pemohon dari aplikasi.</p>
                </div>
                <div class="flex items-center gap-2 flex-wrap">
                    <a href="{{ route('standar.pelayanan') }}" target="_blank" class="flex items-center gap-2 px-3.5 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg text-xs font-bold hover:bg-slate-50 transition-colors shadow-sm">
                        <span class="material-icons-outlined text-sm">visibility</span> Portal Standar Pelayanan
                    </a>
                    <button onclick="document.getElementById('modal-upload-master-sop').classList.remove('hidden'); document.getElementById('modal-upload-master-sop').classList.add('flex')" class="flex items-center gap-1.5 px-3.5 py-2 bg-dikbud-primary hover:bg-dikbud-dark text-white rounded-lg text-xs font-bold shadow-md transition-colors">
                        <span class="material-icons text-sm">upload_file</span> Unggah File SOP Master
                    </button>
                </div>
            </div>

            <!-- Stats Bar -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 mb-6">
                <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-blue-50 text-dikbud-primary flex items-center justify-center font-bold">
                        <span class="material-icons text-xl">folder_shared</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-medium">Total Berkas</p>
                        <h4 class="text-lg font-black text-slate-800">{{ $stats['total_submissions'] ?? 0 }}</h4>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center font-bold">
                        <span class="material-icons text-xl">pending_actions</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-medium">Menunggu</p>
                        <h4 class="text-lg font-black text-amber-600">{{ $stats['pending_submissions'] ?? 0 }}</h4>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold">
                        <span class="material-icons text-xl">autorenew</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-medium">Diproses</p>
                        <h4 class="text-lg font-black text-indigo-600">{{ $stats['processed_submissions'] ?? 0 }}</h4>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold">
                        <span class="material-icons text-xl">task_alt</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-medium">Selesai</p>
                        <h4 class="text-lg font-black text-emerald-600">{{ $stats['completed_submissions'] ?? 0 }}</h4>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center font-bold">
                        <span class="material-icons text-xl">format_list_bulleted</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-medium">Total SOP</p>
                        <h4 class="text-lg font-black text-purple-700">{{ $stats['total_sops'] ?? 0 }}</h4>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-teal-50 text-teal-600 flex items-center justify-center font-bold">
                        <span class="material-icons text-xl">description</span>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-medium">File SOP Ada</p>
                        <h4 class="text-lg font-black text-teal-700">{{ $stats['sops_with_file'] ?? 0 }}</h4>
                    </div>
                </div>
            </div>

            <!-- Tab Switcher (Submissions vs Master) -->
            <div class="flex items-center gap-2 sm:gap-4 mb-4 border-b border-slate-200 overflow-x-auto pb-0.5">
                <a href="{{ route('admin.sop', ['tab' => 'submissions', 'bidang' => $selectedBidang]) }}" class="pb-3 px-3 font-bold text-sm flex items-center gap-2 border-b-2 whitespace-nowrap transition-all {{ ($tab ?? 'submissions') == 'submissions' ? 'border-dikbud-primary text-dikbud-primary' : 'border-transparent text-slate-500 hover:text-slate-800' }}">
                    <span class="material-icons text-[18px]">inbox</span> Berkas Masuk dari Aplikasi ({{ $stats['total_submissions'] ?? 0 }})
                </a>
                <a href="{{ route('admin.sop', ['tab' => 'master', 'bidang' => $selectedBidang]) }}" class="pb-3 px-3 font-bold text-sm flex items-center gap-2 border-b-2 whitespace-nowrap transition-all {{ ($tab ?? 'submissions') == 'master' ? 'border-dikbud-primary text-dikbud-primary' : 'border-transparent text-slate-500 hover:text-slate-800' }}">
                    <span class="material-icons text-[18px]">menu_book</span> Master Dokumen SOP 14 Komponen ({{ $stats['total_sops'] ?? 0 }})
                </a>
            </div>

            <!-- Bidang Filter Pills -->
            <div class="flex items-center gap-2 mb-6 overflow-x-auto pb-2">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mr-1">Bidang:</span>
                @php
                    $bidangList = [
                        'all' => 'Semua Bidang',
                        'kepegawaian' => 'Kepegawaian (KEP)',
                        'sma' => 'Pembinaan SMA (SMA)',
                        'smk' => 'Pembinaan SMK (SMK)',
                        'pk' => 'Pendidikan Khusus (SLB)',
                        'kebudayaan' => 'Kebudayaan (BDY)',
                        'gtk' => 'GTK (Pendidik)'
                    ];
                @endphp
                @foreach($bidangList as $bKey => $bLabel)
                <a href="{{ route('admin.sop', ['tab' => $tab, 'bidang' => $bKey]) }}" class="px-3 py-1.5 rounded-lg text-xs font-bold whitespace-nowrap transition-all {{ ($selectedBidang ?? 'all') == $bKey ? 'bg-navy-900 bg-slate-800 text-white shadow-sm' : 'bg-white border border-slate-200 text-slate-600 hover:bg-slate-50' }}">
                    {{ $bLabel }}
                </a>
                @endforeach
            </div>

            @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="material-icons text-emerald-600">check_circle</span>
                    <span class="text-sm font-semibold">{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700">
                    <span class="material-icons text-sm">close</span>
                </button>
            </div>
            @endif

            @if(isset($errors) && $errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-xl">
                <div class="flex items-center gap-3 mb-2">
                    <span class="material-icons text-red-600">error</span>
                    <span class="text-sm font-bold">Terjadi kesalahan validasi:</span>
                </div>
                <ul class="list-disc list-inside text-xs space-y-1 text-red-700 pl-7">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(($tab ?? 'submissions') == 'submissions')
            <!-- TAB 1: Berkas Permohonan Masuk dari Aplikasi -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                <div class="p-4 bg-slate-50 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div>
                        <span class="text-xs font-bold text-slate-700 uppercase tracking-wider">Daftar Berkas Permohonan SOP Masuk</span>
                        <p class="text-xs text-slate-400 mt-0.5">Semua berkas yang diunggah pengguna/pegawai dari modal SOP 14 Komponen di web publik.</p>
                    </div>
                    <form method="GET" action="{{ route('admin.sop') }}" class="flex items-center gap-2">
                        <input type="hidden" name="tab" value="submissions">
                        <input type="hidden" name="bidang" value="{{ $selectedBidang }}">
                        <div class="relative">
                            <span class="material-icons absolute left-2.5 top-2 text-slate-400 text-sm">search</span>
                            <input type="text" name="q" value="{{ $search ?? '' }}" placeholder="Cari nama, kode, instansi..." class="pl-8 pr-3 py-1.5 text-xs rounded-lg border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary outline-none">
                        </div>
                        <button type="submit" class="px-3 py-1.5 bg-slate-200 hover:bg-slate-300 text-slate-700 text-xs font-bold rounded-lg transition-colors">Cari</button>
                    </form>
                </div>

                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left text-sm">
                        <thead class="text-[11px] text-slate-500 bg-slate-50 border-b border-slate-200 uppercase tracking-wider font-semibold">
                            <tr>
                                <th class="px-4 py-3 text-center w-12">No</th>
                                <th class="px-4 py-3">Layanan &amp; Kode</th>
                                <th class="px-4 py-3">Pemohon &amp; Kontak</th>
                                <th class="px-4 py-3">Berkas Dokumen</th>
                                <th class="px-4 py-3">Catatan</th>
                                <th class="px-4 py-3 text-center">Status</th>
                                <th class="px-4 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-xs text-slate-600">
                            @forelse($submissions as $index => $sub)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-4 py-3 text-center font-bold text-slate-400">{{ $submissions->firstItem() + $index }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-2">
                                        <span class="px-2 py-0.5 rounded font-extrabold text-[10px] bg-blue-100 text-blue-900 border border-blue-200">
                                            {{ $sub->service_code }}
                                        </span>
                                        <span class="font-bold text-slate-800">{{ $sub->service_title ?? $sub->service_code }}</span>
                                    </div>
                                    <span class="text-[10px] text-slate-400 uppercase tracking-wider block mt-0.5">Bidang: {{ strtoupper($sub->bidang ?? 'Umum') }}</span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="font-bold text-slate-900">{{ $sub->sender_name }}</div>
                                    <div class="text-[11px] text-slate-500 mt-0.5">
                                        @if($sub->phone)
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $sub->phone) }}" target="_blank" class="text-emerald-600 hover:underline inline-flex items-center gap-1 font-semibold">
                                            <span class="material-icons text-[12px]">phone</span> {{ $sub->phone }}
                                        </a>
                                        @endif
                                        @if($sub->instance)
                                        <span class="block text-slate-400 text-[10px]">Asal: {{ $sub->instance }}</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center font-bold flex-shrink-0">
                                            <span class="material-icons text-base">description</span>
                                        </div>
                                        <div class="min-w-0 max-w-[200px]">
                                            <p class="font-bold text-slate-800 truncate" title="{{ $sub->file_name }}">{{ $sub->file_name }}</p>
                                            <p class="text-[10px] text-slate-400">{{ $sub->file_size ?? 'Berkas' }} &bull; {{ strtoupper($sub->file_type ?? 'file') }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 max-w-[200px]">
                                    <p class="text-slate-600 line-clamp-2" title="{{ $sub->notes ?? '-' }}">{{ $sub->notes ?: '-' }}</p>
                                    <span class="text-[10px] text-slate-400">{{ $sub->created_at ? $sub->created_at->format('d M Y H:i') : '' }}</span>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    @php
                                        $badgeColor = match($sub->status) {
                                            'Selesai' => 'bg-emerald-100 text-emerald-800 border-emerald-200',
                                            'Diproses' => 'bg-blue-100 text-blue-800 border-blue-200',
                                            'Ditolak' => 'bg-red-100 text-red-800 border-red-200',
                                            default => 'bg-amber-100 text-amber-800 border-amber-200'
                                        };
                                    @endphp
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold border {{ $badgeColor }}">
                                        {{ $sub->status }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <a href="{{ asset($sub->file_path) }}" target="_blank" download class="p-1.5 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded-lg text-xs font-bold transition-colors" title="Unduh Berkas">
                                            <span class="material-icons text-sm">download</span>
                                        </a>
                                        <button type="button" onclick="openStatusModal({{ $sub->id }}, '{{ $sub->service_code }}', '{{ addslashes($sub->sender_name) }}', '{{ $sub->status }}', '{{ addslashes($sub->admin_notes ?? '') }}')" class="p-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-xs font-bold transition-colors" title="Ubah Status">
                                            <span class="material-icons text-sm">edit_note</span>
                                        </button>
                                        <form action="{{ route('admin.sop.submission.destroy', $sub->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berkas permohonan ini? File fisik di server juga akan dihapus permanen.')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1.5 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg text-xs font-bold transition-colors" title="Hapus Berkas">
                                                <span class="material-icons text-sm">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-5 py-12 text-center text-slate-400">
                                    <span class="material-icons text-4xl text-slate-300 mb-2">folder_off</span>
                                    <p class="font-bold text-sm text-slate-600">Belum ada berkas permohonan yang masuk dari aplikasi.</p>
                                    <p class="text-xs text-slate-400 mt-1">Saat masyarakat atau guru mengunggah berkas pada modal "Lihat SOP 14 Komponen", data akan otomatis tampil di sini.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($submissions->hasPages())
                <div class="p-4 border-t border-slate-200 bg-slate-50">
                    {{ $submissions->links() }}
                </div>
                @endif
            </div>

            @elseif(($tab ?? 'submissions') == 'master')
            <!-- TAB 2: Master Dokumen SOP 14 Komponen per Bidang -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                <div class="p-4 bg-slate-50 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div>
                        <span class="text-xs font-bold text-slate-700 uppercase tracking-wider">Katalog Layanan &amp; File Dokumen SOP 14 Komponen</span>
                        <p class="text-xs text-slate-400 mt-0.5">Unggah berkas dokumen resmi SOP (PDF) untuk setiap jenis layanan agar dapat diunduh publik.</p>
                    </div>
                    <button onclick="document.getElementById('modal-upload-master-sop').classList.remove('hidden'); document.getElementById('modal-upload-master-sop').classList.add('flex')" class="flex items-center gap-1.5 px-3 py-1.5 bg-dikbud-primary hover:bg-dikbud-dark text-white rounded-lg text-xs font-bold shadow transition-colors">
                        <span class="material-icons text-sm">upload_file</span> Unggah File SOP
                    </button>
                </div>

                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left text-sm">
                        <thead class="text-[11px] text-slate-500 bg-slate-50 border-b border-slate-200 uppercase tracking-wider font-semibold">
                            <tr>
                                <th class="px-4 py-3 text-center w-12">No</th>
                                <th class="px-4 py-3">Kode &amp; Bidang</th>
                                <th class="px-4 py-3">Nama Layanan &amp; Kategori</th>
                                <th class="px-4 py-3">SLA / Waktu</th>
                                <th class="px-4 py-3">Status File SOP Resmi</th>
                                <th class="px-4 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-xs text-slate-600">
                            @forelse($sops as $idx => $item)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-4 py-3 text-center font-bold text-slate-400">{{ $idx + 1 }}</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-0.5 rounded font-extrabold text-[11px] bg-slate-800 text-gold-400 bg-navy-900 border border-slate-700">
                                        {{ $item->service_code }}
                                    </span>
                                    <span class="text-[10px] text-slate-400 uppercase tracking-wider block mt-1 font-semibold">{{ strtoupper($item->bidang) }}</span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="font-bold text-slate-900 text-xs sm:text-sm">{{ $item->service_title }}</div>
                                    <span class="inline-block px-2 py-0.5 bg-slate-100 text-slate-600 rounded text-[10px] mt-1 font-medium">
                                        {{ $item->category ?: 'Layanan' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="text-slate-700 font-semibold">{{ $item->sla ?: 'Sesuai Ketentuan' }}</span>
                                    <span class="text-[10px] text-emerald-600 block mt-0.5 font-bold">{{ $item->cost }}</span>
                                </td>
                                <td class="px-4 py-3">
                                    @if(!empty($item->official_sop_file))
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold flex-shrink-0">
                                            <span class="material-icons text-sm">picture_as_pdf</span>
                                        </div>
                                        <div class="min-w-0 max-w-[200px]">
                                            <p class="font-bold text-emerald-950 truncate" title="{{ $item->official_sop_name }}">{{ $item->official_sop_name }}</p>
                                            <p class="text-[10px] text-emerald-700">{{ $item->official_sop_size ?? 'PDF' }}</p>
                                        </div>
                                    </div>
                                    @else
                                    <span class="inline-flex items-center gap-1 text-[11px] text-slate-400 italic">
                                        <span class="material-icons text-[14px]">info</span> Belum ada file SOP resmi
                                    </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        @if(!empty($item->official_sop_file))
                                        <a href="{{ asset($item->official_sop_file) }}" target="_blank" download class="p-1.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 rounded-lg text-xs font-bold transition-colors" title="Unduh SOP">
                                            <span class="material-icons text-sm">download</span>
                                        </a>
                                        <form action="{{ route('admin.sop.delete_master', $item->id) }}" method="POST" onsubmit="return confirm('Hapus file master SOP resmi untuk {{ $item->service_code }}?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1.5 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg text-xs font-bold transition-colors" title="Hapus File">
                                                <span class="material-icons text-sm">delete</span>
                                            </button>
                                        </form>
                                        @endif
                                        <button type="button" onclick="openUploadModal({{ $item->id }}, '{{ $item->service_code }}', '{{ addslashes($item->service_title) }}')" class="px-2.5 py-1.5 bg-dikbud-primary hover:bg-dikbud-dark text-white rounded-lg text-xs font-bold flex items-center gap-1 shadow-sm transition-colors">
                                            <span class="material-icons text-xs">{{ !empty($item->official_sop_file) ? 'sync' : 'upload' }}</span>
                                            <span>{{ !empty($item->official_sop_file) ? 'Ganti' : 'Unggah' }}</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-5 py-8 text-center text-slate-400">Tidak ada layanan ditemukan untuk bidang ini.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

            <!-- Modal Upload Master SOP -->
            <div id="modal-upload-master-sop" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
                <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm" onclick="document.getElementById('modal-upload-master-sop').classList.add('hidden')"></div>
                <div class="relative bg-white w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden flex flex-col fade-in">
                    <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center">
                        <h3 class="text-base font-bold text-dikbud-primary flex items-center gap-2">
                            <span class="material-icons text-dikbud-secondary">upload_file</span> Unggah File SOP 14 Komponen
                        </h3>
                        <button onclick="document.getElementById('modal-upload-master-sop').classList.add('hidden')" class="text-slate-400 hover:text-slate-700">
                            <span class="material-icons">close</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.sop.upload_master') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                        @csrf
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Pilih Jenis Layanan <span class="text-red-500">*</span></label>
                            <select name="service_id" id="modal-select-service" required class="w-full px-3 py-2.5 rounded-xl border border-slate-300 text-xs font-semibold focus:border-dikbud-primary outline-none">
                                @foreach($sops as $s)
                                <option value="{{ $s->id }}">{{ $s->service_code }} - {{ $s->service_title }} ({{ strtoupper($s->bidang) }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">File Dokumen Resmi SOP 14 Komponen <span class="text-red-500">*</span></label>
                            <input type="file" name="sop_file" required accept=".pdf,.doc,.docx,.zip,.png,.jpg" class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-dikbud-primary hover:file:bg-blue-100 border border-slate-300 rounded-xl cursor-pointer">
                            <p class="text-[11px] text-slate-400 mt-1">Format: PDF, DOC, DOCX. Maksimal 25MB.</p>
                        </div>
                        <div class="pt-3 border-t border-slate-100 flex justify-end gap-2">
                            <button type="button" onclick="document.getElementById('modal-upload-master-sop').classList.add('hidden')" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-bold">Batal</button>
                            <button type="submit" class="px-5 py-2 bg-dikbud-primary hover:bg-dikbud-dark text-white rounded-xl text-xs font-bold shadow-md">Unggah Sekarang</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal Update Status Submission -->
            <div id="modal-status-submission" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
                <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm" onclick="document.getElementById('modal-status-submission').classList.add('hidden')"></div>
                <div class="relative bg-white w-full max-w-md rounded-2xl shadow-2xl overflow-hidden flex flex-col fade-in">
                    <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center">
                        <h3 class="text-base font-bold text-slate-800 flex items-center gap-2">
                            <span class="material-icons text-dikbud-primary">edit_note</span> Perbarui Status Permohonan
                        </h3>
                        <button onclick="document.getElementById('modal-status-submission').classList.add('hidden')" class="text-slate-400 hover:text-slate-700">
                            <span class="material-icons">close</span>
                        </button>
                    </div>
                    <form id="form-update-status" method="POST" class="p-6 space-y-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <p class="text-xs text-slate-500">Pemohon: <span id="status-modal-sender" class="font-bold text-slate-800"></span></p>
                            <p class="text-xs text-slate-500">Layanan: <span id="status-modal-code" class="font-bold text-blue-700"></span></p>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Pilih Status Baru <span class="text-red-500">*</span></label>
                            <select name="status" id="status-modal-select" required class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs font-semibold focus:border-dikbud-primary outline-none">
                                <option value="Menunggu Review">Menunggu Review</option>
                                <option value="Diproses">Diproses</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Ditolak">Ditolak</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Catatan Verifikator / Admin</label>
                            <textarea name="admin_notes" id="status-modal-notes" rows="3" placeholder="Tuliskan catatan tindak lanjut atau alasan..." class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:border-dikbud-primary outline-none"></textarea>
                        </div>
                        <div class="pt-3 border-t border-slate-100 flex justify-end gap-2">
                            <button type="button" onclick="document.getElementById('modal-status-submission').classList.add('hidden')" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-bold">Batal</button>
                            <button type="submit" class="px-5 py-2 bg-dikbud-primary hover:bg-dikbud-dark text-white rounded-xl text-xs font-bold shadow-md">Simpan Status</button>
                        </div>
                    </form>
                </div>
            </div>

            <script>
                function openUploadModal(serviceId, serviceCode, serviceTitle) {
                    const sel = document.getElementById('modal-select-service');
                    if (sel) {
                        sel.value = serviceId;
                    }
                    const m = document.getElementById('modal-upload-master-sop');
                    if (m) {
                        m.classList.remove('hidden');
                        m.classList.add('flex');
                    }
                }

                function openStatusModal(subId, code, sender, status, notes) {
                    const form = document.getElementById('form-update-status');
                    if (form) {
                        form.action = '/admin/sop/submission/' + subId + '/status';
                    }
                    document.getElementById('status-modal-code').innerText = code;
                    document.getElementById('status-modal-sender').innerText = sender;
                    document.getElementById('status-modal-select').value = status;
                    document.getElementById('status-modal-notes').value = notes || '';
                    const m = document.getElementById('modal-status-submission');
                    if (m) {
                        m.classList.remove('hidden');
                        m.classList.add('flex');
                    }
                }
            </script>
            @endif

        </div>
    </main>

    <!-- Modal Tambah Wilayah Monev -->
    <div id="modal-tambah-wilayah" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-tambah-wilayah').classList.add('hidden')"></div>
        <div class="relative bg-white w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
            <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
                <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                    <span class="material-icons text-dikbud-secondary">add_location_alt</span> Tambah Wilayah Sekolah
                </h3>
                <button onclick="document.getElementById('modal-tambah-wilayah').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                    <span class="material-icons">close</span>
                </button>
            </div>
            
            <div class="overflow-y-auto p-6">
                <form id="form-tambah-wilayah" action="{{ route('admin.monev.region.store') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Kabupaten / Kota <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_wilayah" required placeholder="Contoh: Kab. Seram Bagian Timur" class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div class="grid grid-cols-3 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Jumlah SMA <span class="text-red-500">*</span></label>
                                <input type="number" name="jumlah_sma" value="0" min="0" required class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Jumlah SMK <span class="text-red-500">*</span></label>
                                <input type="number" name="jumlah_smk" value="0" min="0" required class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Jumlah SLB <span class="text-red-500">*</span></label>
                                <input type="number" name="jumlah_slb" value="0" min="0" required class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Urutan Tampilan</label>
                            <input type="number" name="urutan" value="1" min="1" class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Tautan Detail (Opsional)</label>
                            <input type="url" name="link_detail" placeholder="https://..." class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Contoh Nama Sekolah (Opsional)</label>
                            <textarea name="contoh_sekolah" rows="2" placeholder="Contoh: SMAN 1 Bula, SMKN 1 SBT" class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
                <button onclick="document.getElementById('modal-tambah-wilayah').classList.add('hidden')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
                <button type="submit" form="form-tambah-wilayah" class="px-4 py-2 text-sm font-bold bg-dikbud-primary text-white hover:bg-dikbud-dark rounded-lg transition-colors shadow-md">Simpan Wilayah</button>
            </div>
        </div>
    </div>

    <!-- Modal Edit Wilayah Monev -->
    <div id="modal-edit-wilayah" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-edit-wilayah').classList.add('hidden')"></div>
        <div class="relative bg-white w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
            <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
                <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                    <span class="material-icons text-dikbud-secondary">edit_location_alt</span> Edit Wilayah Sekolah
                </h3>
                <button onclick="document.getElementById('modal-edit-wilayah').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                    <span class="material-icons">close</span>
                </button>
            </div>
            
            <div class="overflow-y-auto p-6">
                <form id="form-edit-wilayah" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Kabupaten / Kota <span class="text-red-500">*</span></label>
                            <input type="text" id="edit-nama-wilayah" name="nama_wilayah" required class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div class="grid grid-cols-3 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Jumlah SMA <span class="text-red-500">*</span></label>
                                <input type="number" id="edit-jumlah-sma" name="jumlah_sma" min="0" required class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Jumlah SMK <span class="text-red-500">*</span></label>
                                <input type="number" id="edit-jumlah-smk" name="jumlah_smk" min="0" required class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Jumlah SLB <span class="text-red-500">*</span></label>
                                <input type="number" id="edit-jumlah-slb" name="jumlah_slb" min="0" required class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Urutan Tampilan</label>
                            <input type="number" id="edit-urutan" name="urutan" min="1" class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Tautan Detail (Opsional)</label>
                            <input type="url" id="edit-link-detail" name="link_detail" placeholder="https://..." class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Contoh Nama Sekolah (Opsional)</label>
                            <textarea id="edit-contoh-sekolah" name="contoh_sekolah" rows="2" class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
                <button onclick="document.getElementById('modal-edit-wilayah').classList.add('hidden')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
                <button type="submit" form="form-edit-wilayah" class="px-4 py-2 text-sm font-bold bg-dikbud-primary text-white hover:bg-dikbud-dark rounded-lg transition-colors shadow-md">Simpan Perubahan</button>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Berita -->
    <div id="modal-tambah-berita" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-tambah-berita').classList.add('hidden'); document.getElementById('modal-tambah-berita').classList.remove('flex')"></div>
        <div class="relative bg-white w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
            <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
                <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                    <span class="material-icons text-dikbud-secondary">article</span> Tambah Berita / Pengumuman
                </h3>
                <button onclick="document.getElementById('modal-tambah-berita').classList.add('hidden'); document.getElementById('modal-tambah-berita').classList.remove('flex')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                    <span class="material-icons">close</span>
                </button>
            </div>
            
            <div class="overflow-y-auto p-6">
                <form id="form-tambah-berita" action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-5">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1">Judul Konten <span class="text-red-500">*</span></label>
                            <input type="text" name="title" required placeholder="Masukkan judul..." class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary outline-none transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                            <select name="type" required class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary outline-none transition-all bg-white">
                                <option value="Berita">Berita Utama</option>
                                <option value="Program Prioritas">Program Prioritas</option>
                                <option value="Agenda Kegiatan">Agenda Kegiatan</option>
                                <option value="Kebudayaan">Kebudayaan</option>
                                <option value="Tenaga Pendidik">Tenaga Pendidik</option>
                                <option value="Pengumuman">Pengumuman</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1">Kotak Foto (Maks 5 MB)</label>
                            <input type="file" name="image" accept="image/*" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary outline-none transition-all text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-dikbud-primary file:text-white hover:file:bg-dikbud-dark">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1">Isi / Konten <span class="text-red-500">*</span></label>
                            <textarea name="content" required rows="6" placeholder="Tuliskan isi berita atau pengumuman..." class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary outline-none transition-all"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
                <button onclick="document.getElementById('modal-tambah-berita').classList.add('hidden'); document.getElementById('modal-tambah-berita').classList.remove('flex')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
                <button type="submit" form="form-tambah-berita" class="px-4 py-2 text-sm font-bold bg-dikbud-primary text-white hover:bg-dikbud-dark rounded-lg transition-colors shadow-md">Publikasikan</button>
            </div>
        </div>
    </div>

<!-- Modal Tambah Agenda -->
<div id="modal-tambah-agenda" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-tambah-agenda').classList.add('hidden'); document.getElementById('modal-tambah-agenda').classList.remove('flex')"></div>
    <div class="relative bg-white w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
            <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                <span class="material-icons text-dikbud-secondary">event</span> Tambah Agenda Kegiatan
            </h3>
            <button onclick="document.getElementById('modal-tambah-agenda').classList.add('hidden'); document.getElementById('modal-tambah-agenda').classList.remove('flex')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                <span class="material-icons">close</span>
            </button>
        </div>
        
        <div class="overflow-y-auto p-6">
            <form id="form-tambah-agenda" action="{{ route('admin.agenda.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Kegiatan / Agenda <span class="text-red-500">*</span></label>
                        <input type="text" name="title" required placeholder="Masukkan nama kegiatan..." class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Tanggal Kegiatan <span class="text-red-500">*</span></label>
                        <input type="date" name="date" required class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Lokasi Kegiatan <span class="text-red-500">*</span></label>
                        <input type="text" name="location" required placeholder="Contoh: Aula Dinas Dikbud, LPMP Maluku..." class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Kotak Foto / Banner Agenda (Opsional, Maks 5 MB)</label>
                        <input type="file" name="image" accept="image/*" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary outline-none transition-all text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-dikbud-primary file:text-white hover:file:bg-dikbud-dark">
                    </div>
                </div>
            </form>
        </div>
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
            <button onclick="document.getElementById('modal-tambah-agenda').classList.add('hidden'); document.getElementById('modal-tambah-agenda').classList.remove('flex')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
            <button type="submit" form="form-tambah-agenda" class="px-4 py-2 text-sm font-bold bg-dikbud-secondary text-white hover:bg-yellow-500 rounded-lg transition-colors shadow-md">Simpan Agenda</button>
        </div>
    </div>
</div>


<!-- Modal Edit Agenda -->
<div id="modal-edit-agenda" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-edit-agenda').classList.add('hidden'); document.getElementById('modal-edit-agenda').classList.remove('flex')"></div>
    <div class="relative bg-white w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
            <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                <span class="material-icons text-dikbud-secondary">edit_calendar</span> Edit Agenda Kegiatan
            </h3>
            <button onclick="document.getElementById('modal-edit-agenda').classList.add('hidden'); document.getElementById('modal-edit-agenda').classList.remove('flex')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                <span class="material-icons">close</span>
            </button>
        </div>
        
        <div class="overflow-y-auto p-6">
            <form id="form-edit-agenda" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Kegiatan / Agenda <span class="text-red-500">*</span></label>
                        <input type="text" id="edit-agenda-title" name="title" required placeholder="Masukkan nama kegiatan..." class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Tanggal Kegiatan <span class="text-red-500">*</span></label>
                        <input type="date" id="edit-agenda-date" name="date" required class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Lokasi Kegiatan <span class="text-red-500">*</span></label>
                        <input type="text" id="edit-agenda-location" name="location" required placeholder="Contoh: Aula Dinas Dikbud, LPMP Maluku..." class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Ubah Foto / Banner Agenda (Opsional, Maks 5 MB)</label>
                        <input type="file" name="image" accept="image/*" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-dikbud-primary focus:ring-1 focus:ring-dikbud-primary outline-none transition-all text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-dikbud-primary file:text-white hover:file:bg-dikbud-dark">
                    </div>
                </div>
            </form>
        </div>
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
            <button onclick="document.getElementById('modal-edit-agenda').classList.add('hidden'); document.getElementById('modal-edit-agenda').classList.remove('flex')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
            <button type="submit" form="form-edit-agenda" class="px-4 py-2 text-sm font-bold bg-dikbud-primary text-white hover:bg-dikbud-dark rounded-lg transition-colors shadow-md">Simpan Perubahan</button>
        </div>
    </div>
</div>

<!-- Modal Tambah Slide Foto -->
<div id="modal-tambah-slide" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-tambah-slide').classList.add('hidden')"></div>
    <div class="relative bg-white w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
            <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                <span class="material-icons text-dikbud-secondary">add_photo_alternate</span> Tambah Foto Slide Beranda
            </h3>
            <button onclick="document.getElementById('modal-tambah-slide').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                <span class="material-icons">close</span>
            </button>
        </div>
        
        <div class="overflow-y-auto p-6">
            <form id="form-tambah-slide" action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Judul Utama Slide <span class="text-red-500">*</span></label>
                        <input type="text" name="title" required placeholder="Contoh: Disdikbud Maluku Salurkan Bantuan..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Subjudul / Deskripsi Singkat</label>
                        <textarea name="subtitle" rows="3" placeholder="Tuliskan ringkasan singkat informasi slide..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm"></textarea>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Tag / Kategori</label>
                            <input type="text" name="tag" value="Program Prioritas" placeholder="Contoh: Program Prioritas, Kebudayaan..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Urutan Tampilan</label>
                            <input type="number" name="order" value="1" min="1" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Upload File Foto Banner (Maks 5 MB)</label>
                        <input type="file" name="image" accept="image/*" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 text-xs text-slate-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-bold file:bg-dikbud-primary file:text-white hover:file:bg-dikbud-dark">
                        <span class="text-[11px] text-slate-400 block mt-1">Atau masukkan tautan / URL foto online di bawah ini:</span>
                        <input type="url" name="image_url" placeholder="https://..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-xs mt-1">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Teks Tombol</label>
                            <input type="text" name="button_text" value="Baca Selengkapnya" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Tautan / Link Tombol</label>
                            <input type="text" name="button_link" value="/berita-terkini" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                    </div>
                    <div class="pt-2">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 text-dikbud-primary rounded focus:ring-dikbud-primary border-slate-300">
                            <span class="text-xs font-semibold text-slate-700">Aktifkan Slide (Tampilkan di Beranda)</span>
                        </label>
                    </div>
                </div>
            </form>
        </div>
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
            <button onclick="document.getElementById('modal-tambah-slide').classList.add('hidden')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
            <button type="submit" form="form-tambah-slide" class="px-4 py-2 text-sm font-bold bg-dikbud-primary text-white hover:bg-dikbud-dark rounded-lg transition-colors shadow-md">Simpan Slide</button>
        </div>
    </div>
</div>

<!-- Modal Edit Slide Foto -->
<div id="modal-edit-slide" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-edit-slide').classList.add('hidden')"></div>
    <div class="relative bg-white w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
            <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                <span class="material-icons text-dikbud-secondary">edit</span> Edit Foto Slide Beranda
            </h3>
            <button onclick="document.getElementById('modal-edit-slide').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                <span class="material-icons">close</span>
            </button>
        </div>
        
        <div class="overflow-y-auto p-6">
            <form id="form-edit-slide" action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Judul Utama Slide <span class="text-red-500">*</span></label>
                        <input type="text" id="edit-slide-title" name="title" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Subjudul / Deskripsi Singkat</label>
                        <textarea id="edit-slide-subtitle" name="subtitle" rows="3" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm"></textarea>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Tag / Kategori</label>
                            <input type="text" id="edit-slide-tag" name="tag" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Urutan Tampilan</label>
                            <input type="number" id="edit-slide-order" name="order" min="1" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Ganti Foto Slide (Opsional)</label>
                        <input type="file" name="image" accept="image/*" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 text-xs text-slate-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-bold file:bg-dikbud-primary file:text-white hover:file:bg-dikbud-dark">
                        <span class="text-[11px] text-slate-400 block mt-1">Atau gunakan URL foto baru:</span>
                        <input type="url" id="edit-slide-image-url" name="image_url" placeholder="https://..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-xs mt-1">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Teks Tombol</label>
                            <input type="text" id="edit-slide-button-text" name="button_text" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Tautan / Link Tombol</label>
                            <input type="text" id="edit-slide-button-link" name="button_link" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                    </div>
                    <div class="pt-2">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="edit-slide-is-active" name="is_active" value="1" class="w-4 h-4 text-dikbud-primary rounded focus:ring-dikbud-primary border-slate-300">
                            <span class="text-xs font-semibold text-slate-700">Aktifkan Slide (Tampilkan di Beranda)</span>
                        </label>
                    </div>
                </div>
            </form>
        </div>
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
            <button onclick="document.getElementById('modal-edit-slide').classList.add('hidden')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
            <button type="submit" form="form-edit-slide" class="px-4 py-2 text-sm font-bold bg-dikbud-primary text-white hover:bg-dikbud-dark rounded-lg transition-colors shadow-md">Simpan Perubahan</button>
        </div>
    </div>
</div>

<!-- Modal Tambah Dokumen / SK Layanan -->
<div id="modal-tambah-program" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-tambah-program').classList.add('hidden')"></div>
    <div class="relative bg-white w-full max-w-xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
            <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                <span class="material-icons text-dikbud-secondary">add_circle</span> Tambah Dokumen / SK Layanan
            </h3>
            <button onclick="document.getElementById('modal-tambah-program').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                <span class="material-icons">close</span>
            </button>
        </div>
        
        <div class="overflow-y-auto p-6">
            <form id="form-tambah-program" action="{{ route('admin.program.unggulan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Pemohon / Pegawai <span class="text-red-500">*</span></label>
                            <input type="text" name="sender_name" required placeholder="Contoh: Drs. Willem Latumahina, M.Pd" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-semibold">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Instansi / Asal Sekolah</label>
                            <input type="text" name="instance" placeholder="Contoh: SMAN 1 Ambon, Cabang Dinas..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Nomor Telepon / WhatsApp</label>
                            <input type="text" name="phone" placeholder="08xxxxxxxxxx" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Email Pemohon</label>
                            <input type="email" name="email" placeholder="pemohon@email.com" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Kode Layanan <span class="text-red-500">*</span></label>
                            <input type="text" name="service_code" required placeholder="Contoh: KEP-07, DIK-01" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm uppercase font-mono">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Bidang Layanan</label>
                            <select name="bidang" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm bg-white">
                                <option value="Kepegawaian">Kepegawaian</option>
                                <option value="SMA">SMA</option>
                                <option value="SMK">SMK</option>
                                <option value="SLB">SLB</option>
                                <option value="Kebudayaan">Kebudayaan</option>
                                <option value="Sekretariat">Sekretariat / Umum</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Status Dokumen <span class="text-red-500">*</span></label>
                            <select name="status" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm bg-white font-bold text-slate-800">
                                <option value="Disetujui" selected class="text-emerald-700">Disetujui (SK Terbit)</option>
                                <option value="Ditolak" class="text-red-700">Ditolak / Catatan Revisi</option>
                                <option value="Diproses" class="text-blue-700">Diproses</option>
                                <option value="Selesai" class="text-emerald-700">Selesai</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Nama / Perihal Layanan <span class="text-red-500">*</span></label>
                        <input type="text" name="service_title" required placeholder="Contoh: Penerbitan Izin Belajar dan Tugas Belajar" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Catatan Verifikator / Alasan Penolakan</label>
                        <textarea name="admin_notes" rows="3" placeholder="Tuliskan catatan persetujuan verifikator dinas atau poin-poin alasan penolakan dan revisi berkas..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm leading-relaxed"></textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Unggah Berkas SK / Dokumen Resmi (PDF / DOC, Maks 15 MB)</label>
                        <input type="file" name="file" accept=".pdf,.doc,.docx" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 text-xs text-slate-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-bold file:bg-dikbud-primary file:text-white hover:file:bg-dikbud-dark">
                        <span class="text-[11px] text-slate-400 block mt-1">Kosongkan jika ingin sistem menggunakan template resmi otomatis.</span>
                    </div>
                </div>
            </form>
        </div>
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
            <button onclick="document.getElementById('modal-tambah-program').classList.add('hidden')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
            <button type="submit" form="form-tambah-program" class="px-4 py-2 text-sm font-bold bg-dikbud-primary text-white hover:bg-dikbud-dark rounded-lg transition-colors shadow-md">Simpan Dokumen / SK</button>
        </div>
    </div>
</div>

<!-- Modal Edit Dokumen / SK Layanan -->
<div id="modal-edit-program" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-edit-program').classList.add('hidden')"></div>
    <div class="relative bg-white w-full max-w-xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
            <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                <span class="material-icons text-dikbud-secondary">edit</span> Edit Dokumen / SK Layanan
            </h3>
            <button onclick="document.getElementById('modal-edit-program').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                <span class="material-icons">close</span>
            </button>
        </div>
        
        <div class="overflow-y-auto p-6">
            <form id="form-edit-program" action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Pemohon / Pegawai <span class="text-red-500">*</span></label>
                            <input type="text" id="edit-program-sender-name" name="sender_name" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-semibold">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Instansi / Asal Sekolah</label>
                            <input type="text" id="edit-program-instance" name="instance" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Nomor Telepon / WhatsApp</label>
                            <input type="text" id="edit-program-phone" name="phone" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Email Pemohon</label>
                            <input type="email" id="edit-program-email" name="email" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Kode Layanan <span class="text-red-500">*</span></label>
                            <input type="text" id="edit-program-service-code" name="service_code" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm uppercase font-mono">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Bidang Layanan</label>
                            <select id="edit-program-bidang" name="bidang" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm bg-white">
                                <option value="Kepegawaian">Kepegawaian</option>
                                <option value="SMA">SMA</option>
                                <option value="SMK">SMK</option>
                                <option value="SLB">SLB</option>
                                <option value="Kebudayaan">Kebudayaan</option>
                                <option value="Sekretariat">Sekretariat / Umum</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Status Dokumen <span class="text-red-500">*</span></label>
                            <select id="edit-program-status" name="status" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm bg-white font-bold text-slate-800">
                                <option value="Disetujui" class="text-emerald-700">Disetujui (SK Terbit)</option>
                                <option value="Ditolak" class="text-red-700">Ditolak / Catatan Revisi</option>
                                <option value="Diproses" class="text-blue-700">Diproses</option>
                                <option value="Selesai" class="text-emerald-700">Selesai</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Nama / Perihal Layanan <span class="text-red-500">*</span></label>
                        <input type="text" id="edit-program-service-title" name="service_title" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Catatan Verifikator / Alasan Penolakan</label>
                        <textarea id="edit-program-admin-notes" name="admin_notes" rows="3" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm leading-relaxed"></textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Ganti Berkas SK / Dokumen (Opsional, PDF/DOC Maks 15 MB)</label>
                        <input type="file" name="file" accept=".pdf,.doc,.docx" class="w-full px-3 py-1.5 rounded-lg border border-slate-300 text-xs text-slate-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-bold file:bg-dikbud-primary file:text-white hover:file:bg-dikbud-dark">
                        <span class="text-[11px] text-slate-400 block mt-1">Biarkan kosong jika tidak ingin memperbarui berkas yang sudah ada.</span>
                    </div>
                </div>
            </form>
        </div>
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
            <button onclick="document.getElementById('modal-edit-program').classList.add('hidden')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
            <button type="submit" form="form-edit-program" class="px-4 py-2 text-sm font-bold bg-dikbud-primary text-white hover:bg-dikbud-dark rounded-lg transition-colors shadow-md">Simpan Perubahan</button>
        </div>
    </div>
</div>

<!-- Modal Tambah Dokumen Peraturan -->
<div id="modal-tambah-dokumen" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-tambah-dokumen').classList.add('hidden')"></div>
    <div class="relative bg-white w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
            <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                <span class="material-icons text-dikbud-secondary">note_add</span> Tambah Dokumen Peraturan & SK
            </h3>
            <button onclick="document.getElementById('modal-tambah-dokumen').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                <span class="material-icons">close</span>
            </button>
        </div>
        
        <div class="overflow-y-auto p-6">
            <form id="form-tambah-dokumen" action="{{ route('admin.dokumen.peraturan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <div class="grid grid-cols-4 gap-3">
                        <div class="col-span-1">
                            <label class="block text-xs font-semibold text-slate-700 mb-1">No. Urut</label>
                            <input type="number" name="no" value="{{ (isset($regulasi_dokumens) ? count($regulasi_dokumens) : 0) + 1 }}" min="1" class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm text-center font-bold">
                        </div>
                        <div class="col-span-3">
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Kategori / Uraian Tag</label>
                            <input type="text" name="tag" placeholder="Contoh: Standar Pelayanan 2026" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Dokumen / Regulasi <span class="text-red-500">*</span></label>
                        <input type="text" name="title" required placeholder="Contoh: SK Standar Pelayanan Publik 2026" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Label Badge (Singkat)</label>
                        <input type="text" name="badge" placeholder="Contoh: FIKS, SK 2026, LKIP 2025" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Tautan / Download URL (Eksternal)</label>
                        <input type="url" name="url" placeholder="https://disdikbud.malukuprov.go.id/storage/..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        <p class="text-[11px] text-slate-400 mt-1">Masukkan URL dokumen PDF atau unggah file langsung di bawah.</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Atau Upload File Dokumen (PDF)</label>
                        <input type="file" name="file_dokumen" accept=".pdf,.doc,.docx,.xls,.xlsx,.zip" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-100 file:text-dikbud-primary hover:file:bg-slate-200 cursor-pointer">
                    </div>

                    <div class="pt-2">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 text-dikbud-primary rounded focus:ring-dikbud-primary border-slate-300">
                            <span class="text-xs font-semibold text-slate-700">Aktifkan Dokumen (Tampilkan di Daftar Download)</span>
                        </label>
                    </div>
                </div>
            </form>
        </div>
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
            <button onclick="document.getElementById('modal-tambah-dokumen').classList.add('hidden')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
            <button type="submit" form="form-tambah-dokumen" class="px-4 py-2 text-sm font-bold bg-dikbud-primary text-white hover:bg-dikbud-dark rounded-lg transition-colors shadow-md">Simpan Dokumen</button>
        </div>
    </div>
</div>

<!-- Modal Edit Dokumen Peraturan -->
<div id="modal-edit-dokumen" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-edit-dokumen').classList.add('hidden')"></div>
    <div class="relative bg-white w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
            <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                <span class="material-icons text-dikbud-secondary">edit_note</span> Edit Dokumen Peraturan & SK
            </h3>
            <button onclick="document.getElementById('modal-edit-dokumen').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                <span class="material-icons">close</span>
            </button>
        </div>
        
        <div class="overflow-y-auto p-6">
            <form id="form-edit-dokumen" action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div class="grid grid-cols-4 gap-3">
                        <div class="col-span-1">
                            <label class="block text-xs font-semibold text-slate-700 mb-1">No. Urut</label>
                            <input type="number" id="edit-doc-no" name="no" value="1" min="1" class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm text-center font-bold">
                        </div>
                        <div class="col-span-3">
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Kategori / Uraian Tag</label>
                            <input type="text" id="edit-doc-tag" name="tag" placeholder="Contoh: Standar Pelayanan 2026" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Dokumen / Regulasi <span class="text-red-500">*</span></label>
                        <input type="text" id="edit-doc-title" name="title" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Label Badge (Singkat)</label>
                        <input type="text" id="edit-doc-badge" name="badge" placeholder="Contoh: FIKS, SK 2026, LKIP 2025" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Tautan / Download URL (Eksternal)</label>
                        <input type="text" id="edit-doc-url" name="url" placeholder="https://disdikbud.malukuprov.go.id/storage/..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Ganti File Dokumen (PDF Baru)</label>
                        <input type="file" name="file_dokumen" accept=".pdf,.doc,.docx,.xls,.xlsx,.zip" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-100 file:text-dikbud-primary hover:file:bg-slate-200 cursor-pointer">
                    </div>

                    <div class="pt-2">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="edit-doc-is-active" name="is_active" value="1" class="w-4 h-4 text-dikbud-primary rounded focus:ring-dikbud-primary border-slate-300">
                            <span class="text-xs font-semibold text-slate-700">Aktifkan Dokumen (Tampilkan di Daftar Download)</span>
                        </label>
                    </div>
                </div>
            </form>
        </div>
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
            <button onclick="document.getElementById('modal-edit-dokumen').classList.add('hidden')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
            <button type="submit" form="form-edit-dokumen" class="px-4 py-2 text-sm font-bold bg-dikbud-primary text-white hover:bg-dikbud-dark rounded-lg transition-colors shadow-md">Simpan Perubahan</button>
        </div>
    </div>
</div>

<!-- Modal Tambah Banner Infografis & Iklan -->
<div id="modal-tambah-banner" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-tambah-banner').classList.add('hidden')"></div>
    <div class="relative bg-white w-full max-w-xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
            <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                <span class="material-icons text-dikbud-secondary">add_photo_alternate</span> Tambah Banner Infografis / Iklan
            </h3>
            <button onclick="document.getElementById('modal-tambah-banner').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                <span class="material-icons">close</span>
            </button>
        </div>
        <div class="p-6 overflow-y-auto space-y-4">
            <form id="form-tambah-banner" action="{{ route('admin.banner_iklan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <div class="grid grid-cols-4 gap-3">
                        <div class="col-span-1">
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Urutan</label>
                            <input type="number" name="order" value="1" min="1" class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm text-center font-bold">
                        </div>
                        <div class="col-span-3">
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Judul Banner <span class="text-red-500">*</span></label>
                            <input type="text" name="title" required placeholder="Contoh: Hendrik Lewerissa, S.H., LL.M." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Subtitle / Jabatan</label>
                            <input type="text" name="subtitle" placeholder="Contoh: GUBERNUR PROVINSI MALUKU" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Tipe Banner</label>
                            <select name="type" class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium">
                                <option value="gubernur">Banner Foto Gubernur / Visi Misi</option>
                                <option value="iklan" selected>Banner Iklan / Spanduk Informasi</option>
                                <option value="infografis">Infografis Pendidikan</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Unggah Berkas Foto Banner (Rekomendasi rasio ~1024x269 atau horizontal)</label>
                        <input type="file" name="image" accept="image/*" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-100 file:text-dikbud-primary hover:file:bg-slate-200 cursor-pointer">
                        <p class="text-[11px] text-slate-400 mt-1">Format gambar: JPG, PNG, WEBP (Maksimal 10MB)</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Atau Gunakan URL / Path Lokal Gambar</label>
                        <input type="text" name="image_url" placeholder="/uploads/banners/... atau https://..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        <div class="col-span-2">
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Tautan URL Tujuan</label>
                            <input type="text" name="link_url" placeholder="/visi-misi atau https://..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div class="col-span-1">
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Target Link</label>
                            <select name="target" class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium">
                                <option value="_self">Tab Sama (_self)</option>
                                <option value="_blank">Tab Baru (_blank)</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Deskripsi / Kutipan Teks Visi (Opsional)</label>
                        <textarea name="description" rows="2" placeholder="Teks keterangan atau kutipan visi pembangunan..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm"></textarea>
                    </div>

                    <div class="pt-2">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 text-dikbud-primary rounded focus:ring-dikbud-primary border-slate-300">
                            <span class="text-xs font-semibold text-slate-700">Aktifkan &amp; Tampilkan di Slider Beranda</span>
                        </label>
                    </div>
                </div>
            </form>
        </div>
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
            <button onclick="document.getElementById('modal-tambah-banner').classList.add('hidden')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
            <button type="submit" form="form-tambah-banner" class="px-4 py-2 text-sm font-bold bg-dikbud-primary text-white hover:bg-dikbud-dark rounded-lg transition-colors shadow-md">Simpan Banner</button>
        </div>
    </div>
</div>

<!-- Modal Edit Banner Infografis & Iklan -->
<div id="modal-edit-banner" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-edit-banner').classList.add('hidden')"></div>
    <div class="relative bg-white w-full max-w-xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
            <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                <span class="material-icons text-dikbud-secondary">edit</span> Edit Foto Banner &amp; Iklan
            </h3>
            <button onclick="document.getElementById('modal-edit-banner').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                <span class="material-icons">close</span>
            </button>
        </div>
        <div class="p-6 overflow-y-auto space-y-4">
            <form id="form-edit-banner" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <!-- Current Image Preview -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Foto Banner Saat Ini</label>
                        <div class="flex items-center gap-3 p-2.5 bg-slate-50 border border-slate-200 rounded-xl">
                            <img id="edit-banner-preview-img" src="" alt="Preview" class="w-36 h-14 object-cover rounded border border-slate-200 bg-white">
                            <div class="text-xs text-slate-500 overflow-hidden flex-1">
                                <span class="font-bold text-slate-700 block">File / Path Aktif:</span>
                                <span id="edit-banner-preview-path" class="break-all text-[11px] text-slate-500 block truncate"></span>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-4 gap-3">
                        <div class="col-span-1">
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Urutan</label>
                            <input type="number" id="edit-banner-order" name="order" value="1" min="1" class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm text-center font-bold">
                        </div>
                        <div class="col-span-3">
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Judul Banner <span class="text-red-500">*</span></label>
                            <input type="text" id="edit-banner-title" name="title" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Subtitle / Jabatan</label>
                            <input type="text" id="edit-banner-subtitle" name="subtitle" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Tipe Banner</label>
                            <select id="edit-banner-type" name="type" class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium">
                                <option value="gubernur">Banner Foto Gubernur / Visi Misi</option>
                                <option value="iklan">Banner Iklan / Spanduk Informasi</option>
                                <option value="infografis">Infografis Pendidikan</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Ganti Foto Banner Baru (Kosongkan jika tidak diubah)</label>
                        <input type="file" name="image" accept="image/*" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-100 file:text-dikbud-primary hover:file:bg-slate-200 cursor-pointer">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Atau Ubah URL / Path Gambar</label>
                        <input type="text" id="edit-banner-image-url" name="image_url" placeholder="/uploads/banners/... atau https://..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        <div class="col-span-2">
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Tautan URL Tujuan</label>
                            <input type="text" id="edit-banner-link" name="link_url" placeholder="/visi-misi atau https://..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div class="col-span-1">
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Target Link</label>
                            <select id="edit-banner-target" name="target" class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium">
                                <option value="_self">Tab Sama (_self)</option>
                                <option value="_blank">Tab Baru (_blank)</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Deskripsi / Kutipan Teks Visi (Opsional)</label>
                        <textarea id="edit-banner-description" name="description" rows="2" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm"></textarea>
                    </div>

                    <div class="pt-2">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="edit-banner-is-active" name="is_active" value="1" class="w-4 h-4 text-dikbud-primary rounded focus:ring-dikbud-primary border-slate-300">
                            <span class="text-xs font-semibold text-slate-700">Aktifkan &amp; Tampilkan di Slider Beranda</span>
                        </label>
                    </div>
                </div>
            </form>
        </div>
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
            <button onclick="document.getElementById('modal-edit-banner').classList.add('hidden')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
            <button type="submit" form="form-edit-banner" class="px-4 py-2 text-sm font-bold bg-dikbud-primary text-white hover:bg-dikbud-dark rounded-lg transition-colors shadow-md">Simpan Perubahan</button>
        </div>
    </div>
</div>

<!-- Modal Tambah Poster Transparansi -->
<div id="modal-tambah-poster" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-tambah-poster').classList.add('hidden')"></div>
    <div class="relative bg-white w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
            <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                <span class="material-icons text-dikbud-secondary">add_photo_alternate</span> Tambah Poster Transparansi
            </h3>
            <button onclick="document.getElementById('modal-tambah-poster').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                <span class="material-icons">close</span>
            </button>
        </div>
        <div class="p-6 overflow-y-auto space-y-4">
            <form id="form-tambah-poster" action="{{ route('admin.transparansi.posters.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <div class="grid grid-cols-4 gap-3">
                        <div class="col-span-1">
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Urutan</label>
                            <input type="number" name="order" value="1" min="1" class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm text-center font-bold">
                        </div>
                        <div class="col-span-3">
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Judul Poster <span class="text-red-500">*</span></label>
                            <input type="text" name="title" required placeholder="Contoh: Maklumat Pelayanan Publik" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Unggah File Gambar</label>
                        <input type="file" name="image" accept="image/*" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-100 file:text-dikbud-primary hover:file:bg-slate-200 cursor-pointer">
                        <p class="text-[11px] text-slate-400 mt-1">Format: JPG, PNG, WEBP (Maks. 10MB)</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Atau Gunakan URL / Path Lokal</label>
                        <input type="text" name="image_url" placeholder="/images/maklumat-pelayanan.jpg atau https://..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                    </div>

                    <div class="pt-2">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 text-dikbud-primary rounded focus:ring-dikbud-primary border-slate-300">
                            <span class="text-xs font-semibold text-slate-700">Aktifkan Poster (Tampilkan di Beranda)</span>
                        </label>
                    </div>
                </div>
            </form>
        </div>
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
            <button onclick="document.getElementById('modal-tambah-poster').classList.add('hidden')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
            <button type="submit" form="form-tambah-poster" class="px-4 py-2 text-sm font-bold bg-dikbud-primary text-white hover:bg-dikbud-dark rounded-lg transition-colors shadow-md">Simpan Poster</button>
        </div>
    </div>
</div>

<!-- Modal Edit Poster Transparansi -->
<div id="modal-edit-poster" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-edit-poster').classList.add('hidden')"></div>
    <div class="relative bg-white w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
            <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                <span class="material-icons text-dikbud-secondary">edit</span> Edit Poster Transparansi
            </h3>
            <button onclick="document.getElementById('modal-edit-poster').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                <span class="material-icons">close</span>
            </button>
        </div>
        <div class="p-6 overflow-y-auto space-y-4">
            <form id="form-edit-poster" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div class="grid grid-cols-4 gap-3">
                        <div class="col-span-1">
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Urutan</label>
                            <input type="number" id="edit-poster-order" name="order" value="1" min="1" class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm text-center font-bold">
                        </div>
                        <div class="col-span-3">
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Judul Poster <span class="text-red-500">*</span></label>
                            <input type="text" id="edit-poster-title" name="title" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium">
                        </div>
                    </div>

                    <!-- Current Image Preview -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Gambar Saat Ini</label>
                        <div class="flex items-center gap-3 p-2 bg-slate-50 border border-slate-200 rounded-lg">
                            <img id="edit-poster-preview-img" src="" alt="Preview" class="w-16 h-20 object-cover rounded border border-slate-200 bg-white">
                            <div class="text-xs text-slate-500 overflow-hidden">
                                <span class="font-bold text-slate-700 block">File / Path:</span>
                                <span id="edit-poster-preview-path" class="break-all text-[11px] text-slate-500 block"></span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Ganti Gambar (File Baru)</label>
                        <input type="file" name="image" accept="image/*" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-100 file:text-dikbud-primary hover:file:bg-slate-200 cursor-pointer">
                        <p class="text-[11px] text-slate-400 mt-1">Kosongkan jika tidak ingin mengubah file gambar.</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Atau Ubah URL / Path Gambar</label>
                        <input type="text" id="edit-poster-image-url" name="image_url" placeholder="/images/maklumat-pelayanan.jpg atau https://..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                    </div>

                    <div class="pt-2">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="edit-poster-is-active" name="is_active" value="1" class="w-4 h-4 text-dikbud-primary rounded focus:ring-dikbud-primary border-slate-300">
                            <span class="text-xs font-semibold text-slate-700">Aktifkan Poster (Tampilkan di Beranda)</span>
                        </label>
                    </div>
                </div>
            </form>
        </div>
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
            <button onclick="document.getElementById('modal-edit-poster').classList.add('hidden')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
            <button type="submit" form="form-edit-poster" class="px-4 py-2 text-sm font-bold bg-dikbud-primary text-white hover:bg-dikbud-dark rounded-lg transition-colors shadow-md">Simpan Perubahan</button>
        </div>
    </div>
</div>

<script>
    const postsData = @json($posts ?? $recentPosts ?? []);

    function openTambahBannerModal() {
        document.getElementById('form-tambah-banner').reset();
        document.getElementById('modal-tambah-banner').classList.remove('hidden');
        document.getElementById('modal-tambah-banner').classList.add('flex');
    }

    function openEditBannerModal(banner) {
        const form = document.getElementById('form-edit-banner');
        form.action = '/admin/banner-iklan/' + banner.id;
        document.getElementById('edit-banner-order').value = banner.order || 1;
        document.getElementById('edit-banner-title').value = banner.title || '';
        document.getElementById('edit-banner-subtitle').value = banner.subtitle || '';
        document.getElementById('edit-banner-type').value = banner.type || 'iklan';
        document.getElementById('edit-banner-link').value = banner.link_url || '';
        document.getElementById('edit-banner-target').value = banner.target || '_self';
        document.getElementById('edit-banner-description').value = banner.description || '';
        document.getElementById('edit-banner-is-active').checked = Boolean(banner.is_active);
        document.getElementById('edit-banner-image-url').value = (banner.image && (banner.image.startsWith('http') || banner.image.startsWith('/images/'))) ? banner.image : '';

        let imgSrc = banner.image || '';
        if (imgSrc && !imgSrc.startsWith('http') && !imgSrc.startsWith('/')) {
            imgSrc = '/' + imgSrc;
        }
        document.getElementById('edit-banner-preview-img').src = imgSrc;
        document.getElementById('edit-banner-preview-path').innerText = banner.image || '-';

        const modal = document.getElementById('modal-edit-banner');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function openTambahPosterModal() {
        document.getElementById('form-tambah-poster').reset();
        document.getElementById('modal-tambah-poster').classList.remove('hidden');
        document.getElementById('modal-tambah-poster').classList.add('flex');
    }

    function openEditPosterModal(poster) {
        const form = document.getElementById('form-edit-poster');
        form.action = '/admin/transparansi-poster/' + poster.id;
        document.getElementById('edit-poster-order').value = poster.order || 1;
        document.getElementById('edit-poster-title').value = poster.title || '';
        document.getElementById('edit-poster-is-active').checked = Boolean(poster.is_active);
        document.getElementById('edit-poster-image-url').value = (poster.image && (poster.image.startsWith('http') || poster.image.startsWith('/images/'))) ? poster.image : '';
        
        let imgSrc = poster.image || '';
        if (imgSrc && !imgSrc.startsWith('http') && !imgSrc.startsWith('/')) {
            imgSrc = '/' + imgSrc;
        }
        document.getElementById('edit-poster-preview-img').src = imgSrc;
        document.getElementById('edit-poster-preview-path').innerText = poster.image;

        const modal = document.getElementById('modal-edit-poster');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function openTambahDokumenModal() {
        document.getElementById('form-tambah-dokumen').reset();
        document.getElementById('modal-tambah-dokumen').classList.remove('hidden');
        document.getElementById('modal-tambah-dokumen').classList.add('flex');
    }

    function openEditDokumenModal(doc) {
        const form = document.getElementById('form-edit-dokumen');
        form.action = '/admin/dokumen-peraturan/' + doc.id;
        document.getElementById('edit-doc-no').value = doc.no || 1;
        document.getElementById('edit-doc-title').value = doc.title || '';
        document.getElementById('edit-doc-tag').value = doc.tag || '';
        document.getElementById('edit-doc-badge').value = doc.badge || '';
        document.getElementById('edit-doc-url').value = doc.url || '';
        document.getElementById('edit-doc-is-active').checked = Boolean(doc.is_active);

        const modal = document.getElementById('modal-edit-dokumen');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function openTambahProgramModal() {
        document.getElementById('form-tambah-program').reset();
        document.getElementById('modal-tambah-program').classList.remove('hidden');
        document.getElementById('modal-tambah-program').classList.add('flex');
    }

    function openEditProgramModal(sub) {
        const form = document.getElementById('form-edit-program');
        form.action = '/admin/program-unggulan/' + sub.id;
        document.getElementById('edit-program-sender-name').value = sub.sender_name || '';
        document.getElementById('edit-program-instance').value = sub.instance || '';
        document.getElementById('edit-program-phone').value = sub.phone || '';
        document.getElementById('edit-program-email').value = sub.email || '';
        document.getElementById('edit-program-service-code').value = sub.service_code || '';
        document.getElementById('edit-program-service-title').value = sub.service_title || '';
        document.getElementById('edit-program-bidang').value = sub.bidang || 'Kepegawaian';
        document.getElementById('edit-program-status').value = sub.status || 'Disetujui';
        document.getElementById('edit-program-admin-notes').value = sub.admin_notes || '';

        const modal = document.getElementById('modal-edit-program');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function openTambahSlideModal() {
        document.getElementById('form-tambah-slide').reset();
        document.getElementById('modal-tambah-slide').classList.remove('hidden');
        document.getElementById('modal-tambah-slide').classList.add('flex');
    }

    function openEditSlideModal(slide) {
        const form = document.getElementById('form-edit-slide');
        form.action = '/admin/slider/' + slide.id;
        document.getElementById('edit-slide-title').value = slide.title || '';
        document.getElementById('edit-slide-subtitle').value = slide.subtitle || '';
        document.getElementById('edit-slide-tag').value = slide.tag || 'Program Prioritas';
        document.getElementById('edit-slide-order').value = slide.order || 1;
        document.getElementById('edit-slide-button-text').value = slide.button_text || 'Baca Selengkapnya';
        document.getElementById('edit-slide-button-link').value = slide.button_link || '#';
        document.getElementById('edit-slide-is-active').checked = Boolean(slide.is_active);
        document.getElementById('edit-slide-image-url').value = (slide.image && slide.image.startsWith('http')) ? slide.image : '';

        const modal = document.getElementById('modal-edit-slide');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function openTambahWilayahModal() {
        document.getElementById('form-tambah-wilayah').reset();
        document.getElementById('modal-tambah-wilayah').classList.remove('hidden');
        document.getElementById('modal-tambah-wilayah').classList.add('flex');
    }

    function openEditWilayahModal(reg) {
        const form = document.getElementById('form-edit-wilayah');
        form.action = '/admin/monev/region/' + reg.id;
        document.getElementById('edit-nama-wilayah').value = reg.nama_wilayah;
        document.getElementById('edit-jumlah-sma').value = reg.jumlah_sma;
        document.getElementById('edit-jumlah-smk').value = reg.jumlah_smk;
        document.getElementById('edit-jumlah-slb').value = reg.jumlah_slb || 0;
        document.getElementById('edit-urutan').value = reg.urutan || 1;
        document.getElementById('edit-link-detail').value = reg.link_detail || '';
        document.getElementById('edit-contoh-sekolah').value = reg.contoh_sekolah || '';

        const modal = document.getElementById('modal-edit-wilayah');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function openTambahBeritaModal() {
        const modal = document.getElementById('modal-tambah-berita');
        const form = document.getElementById('form-tambah-berita');
        if (form) {
            form.reset();
            form.action = "{{ route('admin.berita.store') }}";
        }
        const methodInput = document.getElementById('form-method');
        if (methodInput) {
            methodInput.remove();
        }
        if (modal) {
            modal.querySelector('h3').innerHTML = '<span class="material-icons text-dikbud-secondary">article</span> Tambah Berita / Pengumuman';
            const submitBtn = modal.querySelector('button[form="form-tambah-berita"]');
            if (submitBtn) submitBtn.innerText = 'Publikasikan';
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
    }

    function openEditBeritaModal(id) {
        const post = postsData.find(p => p.id === id);
        if (!post) return;

        const modal = document.getElementById('modal-tambah-berita');
        const form = document.getElementById('form-tambah-berita');
        
        // Change Form Action & Method
        form.action = '/admin/berita/' + id;
        
        // Inject PUT method if not exists
        let methodInput = document.getElementById('form-method');
        if (!methodInput) {
            methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.id = 'form-method';
            methodInput.value = 'PUT';
            form.appendChild(methodInput);
        }

        // Fill form fields
        form.querySelector('input[name="title"]').value = post.title;
        form.querySelector('select[name="type"]').value = post.type;
        form.querySelector('textarea[name="content"]').value = post.content || '';

        // Change modal title and button text
        modal.querySelector('h3').innerHTML = '<span class="material-icons text-dikbud-secondary">edit</span> Edit ' + (post.type === 'Agenda Kegiatan' ? 'Agenda Kegiatan' : 'Berita / Pengumuman');
        modal.querySelector('button[form="form-tambah-berita"]').innerText = 'Simpan Perubahan';

        // Show Modal
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    // Reset Form when Add Button is clicked
    document.addEventListener('DOMContentLoaded', () => {
        const addBtn = document.querySelector('button[onclick*="modal-tambah-berita"]');
        if (addBtn) {
            addBtn.addEventListener('click', (e) => {
                openTambahBeritaModal();
            });
        }
    });

    function openTambahAgendaModal() {
        const form = document.getElementById('form-tambah-agenda');
        if (form) form.reset();
        const modal = document.getElementById('modal-tambah-agenda');
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
    }

    function openEditAgendaModal(item) {
        const form = document.getElementById('form-edit-agenda');
        if (!form) return;
        form.reset();
        form.action = '/admin/agenda/' + item.id;
        document.getElementById('edit-agenda-title').value = item.title || '';
        document.getElementById('edit-agenda-date').value = item.date || '';
        document.getElementById('edit-agenda-location').value = item.location || '';

        const modal = document.getElementById('modal-edit-agenda');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

</script>

    <!-- Modal Tambah Media Sosial -->
    <!-- Modal Tambah Layanan Digital -->
<div id="modal-tambah-layanan" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-tambah-layanan').classList.add('hidden')"></div>
    <div class="relative bg-white w-full max-w-xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
            <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                <span class="material-icons text-dikbud-secondary">add_circle</span> Tambah Layanan Publik Digital
            </h3>
            <button onclick="document.getElementById('modal-tambah-layanan').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                <span class="material-icons">close</span>
            </button>
        </div>
        <div class="p-6 overflow-y-auto space-y-4">
            <form id="form-tambah-layanan" action="{{ route('admin.layanan.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <!-- Nama Layanan & Kategori/Badge -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Layanan <span class="text-red-500">*</span></label>
                        <input type="text" name="title" id="tambah-layanan-title" required placeholder="Contoh: PPDB Maluku Online" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium">
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Kategori / Badge Label</label>
                            <input type="text" name="badge" id="tambah-layanan-badge" placeholder="Contoh: Penerimaan Siswa" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Tema Warna Ikon <span class="text-red-500">*</span></label>
                            <select name="icon_color" id="tambah-layanan-icon-color" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium bg-white">
                                <option value="red">Merah (Red)</option>
                                <option value="amber">Kuning Emas (Amber)</option>
                                <option value="sky">Biru Muda (Sky)</option>
                                <option value="emerald">Hijau (Emerald)</option>
                                <option value="purple">Ungu (Purple)</option>
                                <option value="rose">Merah Muda (Rose)</option>
                                <option value="indigo">Indigo (Indigo)</option>
                                <option value="blue">Biru (Blue)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Icon Class & Presets -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Icon FontAwesome / Class <span class="text-red-500">*</span></label>
                        <input type="text" name="icon" id="tambah-layanan-icon" required value="fas fa-graduation-cap" placeholder="Contoh: fas fa-graduation-cap" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-mono text-xs">
                        <div class="flex items-center gap-1.5 mt-2 flex-wrap text-xs">
                            <span class="text-[11px] text-slate-400">Pilihan cepat:</span>
                            <button type="button" onclick="setLayananIconPreset('fas fa-graduation-cap', 'tambah')" class="px-2 py-0.5 bg-slate-100 hover:bg-slate-200 rounded text-[11px] text-slate-700 font-mono"><i class="fas fa-graduation-cap mr-1"></i>Toga</button>
                            <button type="button" onclick="setLayananIconPreset('fas fa-award', 'tambah')" class="px-2 py-0.5 bg-slate-100 hover:bg-slate-200 rounded text-[11px] text-slate-700 font-mono"><i class="fas fa-award mr-1"></i>Beasiswa</button>
                            <button type="button" onclick="setLayananIconPreset('fas fa-certificate', 'tambah')" class="px-2 py-0.5 bg-slate-100 hover:bg-slate-200 rounded text-[11px] text-slate-700 font-mono"><i class="fas fa-certificate mr-1"></i>Ijazah</button>
                            <button type="button" onclick="setLayananIconPreset('fas fa-archway', 'tambah')" class="px-2 py-0.5 bg-slate-100 hover:bg-slate-200 rounded text-[11px] text-slate-700 font-mono"><i class="fas fa-archway mr-1"></i>Budaya</button>
                            <button type="button" onclick="setLayananIconPreset('fas fa-file-shield', 'tambah')" class="px-2 py-0.5 bg-slate-100 hover:bg-slate-200 rounded text-[11px] text-slate-700 font-mono"><i class="fas fa-file-shield mr-1"></i>PPID</button>
                            <button type="button" onclick="setLayananIconPreset('fas fa-bullhorn', 'tambah')" class="px-2 py-0.5 bg-slate-100 hover:bg-slate-200 rounded text-[11px] text-slate-700 font-mono"><i class="fas fa-bullhorn mr-1"></i>Pengaduan</button>
                        </div>
                    </div>

                    <!-- Tautan URL & Teks Tombol -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Tautan Target (URL) <span class="text-red-500">*</span></label>
                            <input type="text" name="url" id="tambah-layanan-url" required value="/standar-pelayanan" placeholder="Contoh: /standar-pelayanan atau https://..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Teks Tombol / Tautan</label>
                            <input type="text" name="action_text" id="tambah-layanan-action-text" value="Akses Layanan" placeholder="Contoh: Akses Portal" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium">
                        </div>
                    </div>

                    <!-- Deskripsi Singkat -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Deskripsi Layanan <span class="text-red-500">*</span></label>
                        <textarea name="description" id="tambah-layanan-description" rows="3" required placeholder="Uraian singkat mengenai layanan pendidikan atau kebudayaan ini..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm"></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-3 pt-1">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Nomor Urutan</label>
                            <input type="number" name="order" id="tambah-layanan-order" value="1" min="1" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div class="flex items-center pt-5">
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="is_active" id="tambah-layanan-is-active" value="1" checked class="w-4 h-4 text-dikbud-primary rounded focus:ring-dikbud-primary border-slate-300">
                                <span class="text-xs font-semibold text-slate-700">Tampilkan di Portal Publik</span>
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
            <button onclick="document.getElementById('modal-tambah-layanan').classList.add('hidden')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
            <button type="submit" form="form-tambah-layanan" class="px-4 py-2 text-sm font-bold bg-dikbud-primary text-white hover:bg-dikbud-dark rounded-lg transition-colors shadow-md">Simpan Layanan</button>
        </div>
    </div>
</div>

<!-- Modal Edit Layanan Digital -->
<div id="modal-edit-layanan" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-edit-layanan').classList.add('hidden')"></div>
    <div class="relative bg-white w-full max-w-xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
        <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
            <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                <span class="material-icons text-dikbud-secondary">edit</span> Edit Layanan Publik Digital
            </h3>
            <button onclick="document.getElementById('modal-edit-layanan').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                <span class="material-icons">close</span>
            </button>
        </div>
        <div class="p-6 overflow-y-auto space-y-4">
            <form id="form-edit-layanan" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <!-- Nama Layanan & Kategori/Badge -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Layanan <span class="text-red-500">*</span></label>
                        <input type="text" name="title" id="edit-layanan-title" required placeholder="Contoh: PPDB Maluku Online" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium">
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Kategori / Badge Label</label>
                            <input type="text" name="badge" id="edit-layanan-badge" placeholder="Contoh: Penerimaan Siswa" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Tema Warna Ikon <span class="text-red-500">*</span></label>
                            <select name="icon_color" id="edit-layanan-icon-color" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium bg-white">
                                <option value="red">Merah (Red)</option>
                                <option value="amber">Kuning Emas (Amber)</option>
                                <option value="sky">Biru Muda (Sky)</option>
                                <option value="emerald">Hijau (Emerald)</option>
                                <option value="purple">Ungu (Purple)</option>
                                <option value="rose">Merah Muda (Rose)</option>
                                <option value="indigo">Indigo (Indigo)</option>
                                <option value="blue">Biru (Blue)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Icon Class & Presets -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Icon FontAwesome / Class <span class="text-red-500">*</span></label>
                        <input type="text" name="icon" id="edit-layanan-icon" required placeholder="Contoh: fas fa-graduation-cap" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-mono text-xs">
                        <div class="flex items-center gap-1.5 mt-2 flex-wrap text-xs">
                            <span class="text-[11px] text-slate-400">Pilihan cepat:</span>
                            <button type="button" onclick="setLayananIconPreset('fas fa-graduation-cap', 'edit')" class="px-2 py-0.5 bg-slate-100 hover:bg-slate-200 rounded text-[11px] text-slate-700 font-mono"><i class="fas fa-graduation-cap mr-1"></i>Toga</button>
                            <button type="button" onclick="setLayananIconPreset('fas fa-award', 'edit')" class="px-2 py-0.5 bg-slate-100 hover:bg-slate-200 rounded text-[11px] text-slate-700 font-mono"><i class="fas fa-award mr-1"></i>Beasiswa</button>
                            <button type="button" onclick="setLayananIconPreset('fas fa-certificate', 'edit')" class="px-2 py-0.5 bg-slate-100 hover:bg-slate-200 rounded text-[11px] text-slate-700 font-mono"><i class="fas fa-certificate mr-1"></i>Ijazah</button>
                            <button type="button" onclick="setLayananIconPreset('fas fa-archway', 'edit')" class="px-2 py-0.5 bg-slate-100 hover:bg-slate-200 rounded text-[11px] text-slate-700 font-mono"><i class="fas fa-archway mr-1"></i>Budaya</button>
                            <button type="button" onclick="setLayananIconPreset('fas fa-file-shield', 'edit')" class="px-2 py-0.5 bg-slate-100 hover:bg-slate-200 rounded text-[11px] text-slate-700 font-mono"><i class="fas fa-file-shield mr-1"></i>PPID</button>
                            <button type="button" onclick="setLayananIconPreset('fas fa-bullhorn', 'edit')" class="px-2 py-0.5 bg-slate-100 hover:bg-slate-200 rounded text-[11px] text-slate-700 font-mono"><i class="fas fa-bullhorn mr-1"></i>Pengaduan</button>
                        </div>
                    </div>

                    <!-- Tautan URL & Teks Tombol -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Tautan Target (URL) <span class="text-red-500">*</span></label>
                            <input type="text" name="url" id="edit-layanan-url" required placeholder="Contoh: /standar-pelayanan atau https://..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Teks Tombol / Tautan</label>
                            <input type="text" name="action_text" id="edit-layanan-action-text" placeholder="Contoh: Akses Portal" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium">
                        </div>
                    </div>

                    <!-- Deskripsi Singkat -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Deskripsi Layanan <span class="text-red-500">*</span></label>
                        <textarea name="description" id="edit-layanan-description" rows="3" required placeholder="Uraian singkat mengenai layanan pendidikan atau kebudayaan ini..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm"></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-3 pt-1">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Nomor Urutan</label>
                            <input type="number" name="order" id="edit-layanan-order" min="1" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>
                        <div class="flex items-center pt-5">
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="is_active" id="edit-layanan-is-active" value="1" class="w-4 h-4 text-dikbud-primary rounded focus:ring-dikbud-primary border-slate-300">
                                <span class="text-xs font-semibold text-slate-700">Tampilkan di Portal Publik</span>
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
            <button onclick="document.getElementById('modal-edit-layanan').classList.add('hidden')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
            <button type="submit" form="form-edit-layanan" class="px-4 py-2 text-sm font-bold bg-dikbud-primary text-white hover:bg-dikbud-dark rounded-lg transition-colors shadow-md">Simpan Perubahan</button>
        </div>
    </div>
</div>
<div id="modal-tambah-sosmed" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-tambah-sosmed').classList.add('hidden')"></div>
        <div class="relative bg-white w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
            <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
                <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                    <span class="material-icons text-dikbud-secondary">add_link</span> Tambah Media Sosial
                </h3>
                <button onclick="document.getElementById('modal-tambah-sosmed').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <div class="p-6 overflow-y-auto space-y-4">
                <form id="form-tambah-sosmed" action="{{ route('admin.sosmed.store') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <!-- Platform Dropdown -->
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Pilih Platform <span class="text-red-500">*</span></label>
                            <select name="platform" id="tambah-sosmed-platform" onchange="onPlatformPresetChange('tambah')" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium bg-white">
                                <option value="instagram">Instagram</option>
                                <option value="tiktok">TikTok</option>
                                <option value="youtube">YouTube</option>
                                <option value="facebook">Facebook</option>
                                <option value="twitter">X / Twitter</option>
                                <option value="other">Lainnya / Custom</option>
                            </select>
                        </div>

                        <!-- Nama / Label Akun -->
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Nama / Label Akun <span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="tambah-sosmed-name" required value="Instagram Resmi" placeholder="Contoh: Instagram Resmi Disdikbud" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium">
                        </div>

                        <!-- Username / Handle -->
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Username / Handle</label>
                            <input type="text" name="username" id="tambah-sosmed-username" value="@disdikbud_maluku" placeholder="Contoh: @disdikbud_maluku" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>

                        <!-- Tautan URL -->
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Tautan / URL Lengkap <span class="text-red-500">*</span></label>
                            <input type="url" name="url" id="tambah-sosmed-url" required value="https://www.instagram.com/disdikbud_maluku" placeholder="Contoh: https://www.instagram.com/disdikbud_maluku" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>

                        <!-- Icon & Color Class -->
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Ikon (FontAwesome)</label>
                                <input type="text" name="icon" id="tambah-sosmed-icon" value="fab fa-instagram" placeholder="fab fa-instagram" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-mono text-xs">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Urutan Tampil</label>
                                <input type="number" name="order" id="tambah-sosmed-order" value="1" min="1" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                            </div>
                        </div>

                        <!-- Status Aktif -->
                        <div class="flex items-center pt-2">
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 text-dikbud-primary rounded focus:ring-dikbud-primary border-slate-300">
                                <span class="text-xs font-semibold text-slate-700">Tampilkan di Menu Media Sosial & Footer</span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
                <button onclick="document.getElementById('modal-tambah-sosmed').classList.add('hidden')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
                <button type="submit" form="form-tambah-sosmed" class="px-4 py-2 text-sm font-bold bg-dikbud-primary text-white hover:bg-dikbud-dark rounded-lg transition-colors shadow-md">Simpan Media Sosial</button>
            </div>
        </div>
    </div>

    <!-- Modal Edit Media Sosial -->
    <div id="modal-edit-sosmed" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-edit-sosmed').classList.add('hidden')"></div>
        <div class="relative bg-white w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
            <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
                <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                    <span class="material-icons text-dikbud-secondary">edit</span> Edit Media Sosial
                </h3>
                <button onclick="document.getElementById('modal-edit-sosmed').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <div class="p-6 overflow-y-auto space-y-4">
                <form id="form-edit-sosmed" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <!-- Platform Dropdown -->
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Pilih Platform <span class="text-red-500">*</span></label>
                            <select name="platform" id="edit-sosmed-platform" onchange="onPlatformPresetChange('edit')" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium bg-white">
                                <option value="instagram">Instagram</option>
                                <option value="tiktok">TikTok</option>
                                <option value="youtube">YouTube</option>
                                <option value="facebook">Facebook</option>
                                <option value="twitter">X / Twitter</option>
                                <option value="other">Lainnya / Custom</option>
                            </select>
                        </div>

                        <!-- Nama / Label Akun -->
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Nama / Label Akun <span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="edit-sosmed-name" required placeholder="Contoh: Instagram Resmi Disdikbud" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium">
                        </div>

                        <!-- Username / Handle -->
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Username / Handle</label>
                            <input type="text" name="username" id="edit-sosmed-username" placeholder="Contoh: @disdikbud_maluku" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>

                        <!-- Tautan URL -->
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Tautan / URL Lengkap <span class="text-red-500">*</span></label>
                            <input type="url" name="url" id="edit-sosmed-url" required placeholder="Contoh: https://www.instagram.com/disdikbud_maluku" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                        </div>

                        <!-- Icon & Color Class -->
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Ikon (FontAwesome)</label>
                                <input type="text" name="icon" id="edit-sosmed-icon" placeholder="fab fa-instagram" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-mono text-xs">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Urutan Tampil</label>
                                <input type="number" name="order" id="edit-sosmed-order" min="1" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                            </div>
                        </div>

                        <!-- Status Aktif -->
                        <div class="flex items-center pt-2">
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="is_active" id="edit-sosmed-is-active" value="1" class="w-4 h-4 text-dikbud-primary rounded focus:ring-dikbud-primary border-slate-300">
                                <span class="text-xs font-semibold text-slate-700">Tampilkan di Menu Media Sosial & Footer</span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
                <button onclick="document.getElementById('modal-edit-sosmed').classList.add('hidden')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
                <button type="submit" form="form-edit-sosmed" class="px-4 py-2 text-sm font-bold bg-dikbud-primary text-white hover:bg-dikbud-dark rounded-lg transition-colors shadow-md">Simpan Perubahan</button>
            </div>
        </div>
    </div>

<script>
        function openTambahLayananModal() {
        const form = document.getElementById('form-tambah-layanan');
        if (form) form.reset();
        document.getElementById('tambah-layanan-icon-color').value = 'red';
        document.getElementById('tambah-layanan-icon').value = 'fas fa-graduation-cap';
        document.getElementById('tambah-layanan-action-text').value = 'Akses Layanan';
        document.getElementById('tambah-layanan-url').value = '/standar-pelayanan';
        document.getElementById('tambah-layanan-is-active').checked = true;

        const modal = document.getElementById('modal-tambah-layanan');
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
    }

    function openEditLayananModal(item) {
        const form = document.getElementById('form-edit-layanan');
        if (!form) return;
        form.action = '/admin/layanan/' + item.id;
        document.getElementById('edit-layanan-title').value = item.title || '';
        document.getElementById('edit-layanan-badge').value = item.badge || '';
        document.getElementById('edit-layanan-icon-color').value = item.icon_color || 'blue';
        document.getElementById('edit-layanan-icon').value = item.icon || 'fas fa-laptop';
        document.getElementById('edit-layanan-url').value = item.url || '#';
        document.getElementById('edit-layanan-action-text').value = item.action_text || 'Akses Layanan';
        document.getElementById('edit-layanan-description').value = item.description || '';
        document.getElementById('edit-layanan-order').value = item.order || 1;
        document.getElementById('edit-layanan-is-active').checked = Boolean(item.is_active);

        const modal = document.getElementById('modal-edit-layanan');
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
    }

    function setLayananIconPreset(iconClass, mode) {
        const input = document.getElementById(mode + '-layanan-icon');
        if (input) input.value = iconClass;
    }

    function openTambahSosmedModal() {
        document.getElementById('form-tambah-sosmed').reset();
        document.getElementById('tambah-sosmed-platform').value = 'instagram';
        onPlatformPresetChange('tambah');
        document.getElementById('modal-tambah-sosmed').classList.remove('hidden');
        document.getElementById('modal-tambah-sosmed').classList.add('flex');
    }

    function openEditSosmedModal(item) {
        const form = document.getElementById('form-edit-sosmed');
        form.action = '/admin/sosmed/' + item.id;
        document.getElementById('edit-sosmed-platform').value = item.platform || 'instagram';
        document.getElementById('edit-sosmed-name').value = item.name || '';
        document.getElementById('edit-sosmed-username').value = item.username || '';
        document.getElementById('edit-sosmed-url').value = item.url || '';
        document.getElementById('edit-sosmed-icon').value = item.icon || '';
        document.getElementById('edit-sosmed-order').value = item.order || 1;
        document.getElementById('edit-sosmed-is-active').checked = Boolean(item.is_active);

        const modal = document.getElementById('modal-edit-sosmed');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function onPlatformPresetChange(mode) {
        const platform = document.getElementById(mode + '-sosmed-platform').value;
        const iconInput = document.getElementById(mode + '-sosmed-icon');
        const nameInput = document.getElementById(mode + '-sosmed-name');
        const urlInput = document.getElementById(mode + '-sosmed-url');
        const userInput = document.getElementById(mode + '-sosmed-username');

        const presets = {
            instagram: { icon: 'fab fa-instagram', name: 'Instagram Resmi', url: 'https://www.instagram.com/disdikbud_maluku', user: '@disdikbud_maluku' },
            tiktok: { icon: 'fab fa-tiktok', name: 'TikTok Resmi', url: 'https://www.tiktok.com/@disdikbud.maluku', user: '@disdikbud.maluku' },
            youtube: { icon: 'fab fa-youtube', name: 'YouTube Channel', url: 'https://www.youtube.com/@disdikbudmaluku', user: 'Disdikbud Maluku' },
            facebook: { icon: 'fab fa-facebook-f', name: 'Facebook Fanpage', url: 'https://www.facebook.com/disdikbudmaluku', user: 'Dinas Pendidikan dan Kebudayaan Prov Maluku' },
            twitter: { icon: 'fab fa-x-twitter', name: 'X / Twitter Resmi', url: 'https://twitter.com/disdikbudmaluku', user: '@disdikbudmaluku' },
            other: { icon: 'fas fa-globe', name: 'Media Sosial / Website', url: 'https://', user: '' }
        };

        if (presets[platform]) {
            if (iconInput) iconInput.value = presets[platform].icon;
            if (mode === 'tambah') {
                if (nameInput) nameInput.value = presets[platform].name;
                if (urlInput) urlInput.value = presets[platform].url;
                if (userInput) userInput.value = presets[platform].user;
            }
        }
    }

    function openTambahAgendaModal() {
        const form = document.getElementById('form-tambah-agenda');
        if (form) form.reset();
        const modal = document.getElementById('modal-tambah-agenda');
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
    }

    function openEditAgendaModal(item) {
        const form = document.getElementById('form-edit-agenda');
        if (!form) return;
        form.action = '/admin/agenda/' + item.id;
        document.getElementById('edit-agenda-title').value = item.title || '';
        document.getElementById('edit-agenda-date').value = item.date || '';
        document.getElementById('edit-agenda-location').value = item.location || '';

        const modal = document.getElementById('modal-edit-agenda');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

</script>

    <!-- Modal Tambah Berita Portal -->
    <div id="modal-tambah-portal-news" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-tambah-portal-news').classList.add('hidden')"></div>
        <div class="relative bg-white w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
            <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
                <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                    <span class="material-icons text-dikbud-secondary">add_circle</span> Tambah Berita Portal
                </h3>
                <button onclick="document.getElementById('modal-tambah-portal-news').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <div class="p-6 overflow-y-auto space-y-4">
                <form id="form-tambah-portal-news" action="{{ route('admin.portal.news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Judul Artikel / Berita <span class="text-red-500">*</span></label>
                            <input type="text" name="title" required placeholder="Judul artikel berita..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium">
                        </div>
                        <div class="grid grid-cols-3 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                                <select name="category" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm bg-white">
                                    <option value="berita">Berita</option>
                                    <option value="kebudayaan">Kebudayaan</option>
                                    <option value="pengumuman">Pengumuman</option>
                                    <option value="beasiswa">Beasiswa</option>
                                    <option value="pendidikan">Pendidikan</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Tanggal Terbit</label>
                                <input type="text" name="date" value="{{ date('d M Y') }}" placeholder="Contoh: 22 Ags 2026" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Estimasi Baca</label>
                                <input type="text" name="read_time" value="3 mnt baca" placeholder="Contoh: 3 mnt baca" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Unggah Gambar Sampul / Banner</label>
                            <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-100 file:text-dikbud-primary cursor-pointer mb-2">
                            <input type="text" name="image_url" placeholder="Atau paste URL Gambar online (https://...)" class="w-full px-3.5 py-1.5 text-xs rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Ringkasan Berita (Summary) <span class="text-red-500">*</span></label>
                            <textarea name="summary" required rows="2" placeholder="Ringkasan singkat yang tampil pada kartu berita..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm"></textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Konten Lengkap Berita</label>
                            <textarea name="content" rows="5" placeholder="Tuliskan isi artikel lengkap atau paragraf..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-sans"></textarea>
                        </div>
                        <div class="flex items-center pt-2">
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="is_featured" value="1" class="w-4 h-4 text-dikbud-primary rounded focus:ring-dikbud-primary border-slate-300">
                                <span class="text-xs font-semibold text-slate-700">Jadikan Headline Slider di Halaman Portal Resmi</span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
                <button onclick="document.getElementById('modal-tambah-portal-news').classList.add('hidden')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
                <button type="submit" form="form-tambah-portal-news" class="px-4 py-2 text-sm font-bold bg-dikbud-primary text-white hover:bg-dikbud-dark rounded-lg transition-colors shadow-md">Simpan Berita</button>
            </div>
        </div>
    </div>

    <!-- Modal Edit Berita Portal -->
    <div id="modal-edit-portal-news" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-edit-portal-news').classList.add('hidden')"></div>
        <div class="relative bg-white w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
            <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
                <h3 class="text-lg font-bold text-dikbud-primary flex items-center gap-2">
                    <span class="material-icons text-dikbud-secondary">edit</span> Edit Berita Portal
                </h3>
                <button onclick="document.getElementById('modal-edit-portal-news').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <div class="p-6 overflow-y-auto space-y-4">
                <form id="form-edit-portal-news" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Judul Artikel / Berita <span class="text-red-500">*</span></label>
                            <input type="text" name="title" id="edit-portal-news-title" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-medium">
                        </div>
                        <div class="grid grid-cols-3 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                                <select name="category" id="edit-portal-news-category" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm bg-white">
                                    <option value="berita">Berita</option>
                                    <option value="kebudayaan">Kebudayaan</option>
                                    <option value="pengumuman">Pengumuman</option>
                                    <option value="beasiswa">Beasiswa</option>
                                    <option value="pendidikan">Pendidikan</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Tanggal Terbit</label>
                                <input type="text" name="date" id="edit-portal-news-date" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Estimasi Baca</label>
                                <input type="text" name="read_time" id="edit-portal-news-read-time" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Ganti Gambar Sampul (Opsional)</label>
                            <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-100 file:text-dikbud-primary cursor-pointer mb-2">
                            <input type="text" name="image_url" id="edit-portal-news-image-url" placeholder="Atau update URL Gambar" class="w-full px-3.5 py-1.5 text-xs rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Ringkasan Berita (Summary) <span class="text-red-500">*</span></label>
                            <textarea name="summary" id="edit-portal-news-summary" required rows="2" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm"></textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Konten Lengkap Berita</label>
                            <textarea name="content" id="edit-portal-news-content" rows="5" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-dikbud-primary outline-none text-sm font-sans"></textarea>
                        </div>
                        <div class="flex items-center pt-2">
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="is_featured" id="edit-portal-news-is-featured" value="1" class="w-4 h-4 text-dikbud-primary rounded focus:ring-dikbud-primary border-slate-300">
                                <span class="text-xs font-semibold text-slate-700">Jadikan Headline Slider di Halaman Portal Resmi</span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
                <button onclick="document.getElementById('modal-edit-portal-news').classList.add('hidden')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
                <button type="submit" form="form-edit-portal-news" class="px-4 py-2 text-sm font-bold bg-dikbud-primary text-white hover:bg-dikbud-dark rounded-lg transition-colors shadow-md">Simpan Perubahan</button>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Objek Budaya -->
    <div id="modal-tambah-portal-culture" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-tambah-portal-culture').classList.add('hidden')"></div>
        <div class="relative bg-white w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
            <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
                <h3 class="text-lg font-bold text-amber-700 flex items-center gap-2">
                    <span class="material-icons text-amber-600">museum</span> Tambah Objek Kebudayaan Maluku
                </h3>
                <button onclick="document.getElementById('modal-tambah-portal-culture').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <div class="p-6 overflow-y-auto space-y-4">
                <form id="form-tambah-portal-culture" action="{{ route('admin.portal.culture.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Nama / Judul Objek Budaya <span class="text-red-500">*</span></label>
                            <input type="text" name="title" required placeholder="Contoh: Benteng Belgica Banda Neira" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-amber-600 outline-none text-sm font-medium">
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Tipe / Kategori <span class="text-red-500">*</span></label>
                                <input type="text" name="type" required placeholder="Contoh: Cagar Budaya, Seni Tari" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-amber-600 outline-none text-sm">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Lokasi Asal <span class="text-red-500">*</span></label>
                                <input type="text" name="location" required placeholder="Contoh: Kepulauan Banda, Maluku Tengah" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-amber-600 outline-none text-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Unggah Foto Objek Budaya</label>
                            <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-100 file:text-amber-700 cursor-pointer mb-2">
                            <input type="text" name="image_url" placeholder="Atau paste URL Gambar online (https://...)" class="w-full px-3.5 py-1.5 text-xs rounded-lg border border-slate-300 focus:border-amber-600 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Deskripsi Singkat <span class="text-red-500">*</span></label>
                            <textarea name="desc" required rows="3" placeholder="Uraian ringkas nilai sejarah, fungsi tradisi, atau keunikan..." class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-amber-600 outline-none text-sm"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
                <button onclick="document.getElementById('modal-tambah-portal-culture').classList.add('hidden')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
                <button type="submit" form="form-tambah-portal-culture" class="px-4 py-2 text-sm font-bold bg-amber-600 text-white hover:bg-amber-700 rounded-lg transition-colors shadow-md">Simpan Objek Budaya</button>
            </div>
        </div>
    </div>

    <!-- Modal Edit Objek Budaya -->
    <div id="modal-edit-portal-culture" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm transition-opacity" onclick="document.getElementById('modal-edit-portal-culture').classList.add('hidden')"></div>
        <div class="relative bg-white w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[95vh] fade-in">
            <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center sticky top-0 z-10">
                <h3 class="text-lg font-bold text-amber-700 flex items-center gap-2">
                    <span class="material-icons text-amber-600">edit</span> Edit Objek Kebudayaan
                </h3>
                <button onclick="document.getElementById('modal-edit-portal-culture').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 p-1 rounded-full hover:bg-slate-200 transition-colors">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <div class="p-6 overflow-y-auto space-y-4">
                <form id="form-edit-portal-culture" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Nama / Judul Objek Budaya <span class="text-red-500">*</span></label>
                            <input type="text" name="title" id="edit-portal-culture-title" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-amber-600 outline-none text-sm font-medium">
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Tipe / Kategori <span class="text-red-500">*</span></label>
                                <input type="text" name="type" id="edit-portal-culture-type" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-amber-600 outline-none text-sm">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Lokasi Asal <span class="text-red-500">*</span></label>
                                <input type="text" name="location" id="edit-portal-culture-location" required class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-amber-600 outline-none text-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Ganti Foto Objek Budaya (Opsional)</label>
                            <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-100 file:text-amber-700 cursor-pointer mb-2">
                            <input type="text" name="image_url" id="edit-portal-culture-image-url" placeholder="Atau update URL Gambar" class="w-full px-3.5 py-1.5 text-xs rounded-lg border border-slate-300 focus:border-amber-600 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Deskripsi Singkat <span class="text-red-500">*</span></label>
                            <textarea name="desc" id="edit-portal-culture-desc" required rows="3" class="w-full px-3.5 py-2 rounded-lg border border-slate-300 focus:border-amber-600 outline-none text-sm"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex justify-end gap-3 rounded-b-2xl">
                <button onclick="document.getElementById('modal-edit-portal-culture').classList.add('hidden')" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded-lg transition-colors">Batal</button>
                <button type="submit" form="form-edit-portal-culture" class="px-4 py-2 text-sm font-bold bg-amber-600 text-white hover:bg-amber-700 rounded-lg transition-colors shadow-md">Simpan Perubahan</button>
            </div>
        </div>
    </div>

<script>
    function openTambahPortalNewsModal() {
        document.getElementById('form-tambah-portal-news').reset();
        document.getElementById('modal-tambah-portal-news').classList.remove('hidden');
        document.getElementById('modal-tambah-portal-news').classList.add('flex');
    }

    function openEditPortalNewsModal(item) {
        const form = document.getElementById('form-edit-portal-news');
        form.action = '/admin/portal/news/' + item.id;
        document.getElementById('edit-portal-news-title').value = item.title || '';
        document.getElementById('edit-portal-news-category').value = item.category || 'berita';
        document.getElementById('edit-portal-news-date').value = item.date || '';
        document.getElementById('edit-portal-news-read-time').value = item.read_time || '';
        document.getElementById('edit-portal-news-image-url').value = item.image || '';
        document.getElementById('edit-portal-news-summary').value = item.summary || '';
        document.getElementById('edit-portal-news-content').value = item.content || '';
        document.getElementById('edit-portal-news-is-featured').checked = Boolean(item.is_featured);

        const modal = document.getElementById('modal-edit-portal-news');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function openTambahPortalCultureModal() {
        document.getElementById('form-tambah-portal-culture').reset();
        document.getElementById('modal-tambah-portal-culture').classList.remove('hidden');
        document.getElementById('modal-tambah-portal-culture').classList.add('flex');
    }

    function openEditPortalCultureModal(item) {
        const form = document.getElementById('form-edit-portal-culture');
        form.action = '/admin/portal/culture/' + item.id;
        document.getElementById('edit-portal-culture-title').value = item.title || '';
        document.getElementById('edit-portal-culture-type').value = item.type || '';
        document.getElementById('edit-portal-culture-location').value = item.location || '';
        document.getElementById('edit-portal-culture-image-url').value = item.image || '';
        document.getElementById('edit-portal-culture-desc').value = item.desc || '';

        const modal = document.getElementById('modal-edit-portal-culture');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function openTambahAgendaModal() {
        const form = document.getElementById('form-tambah-agenda');
        if (form) form.reset();
        const modal = document.getElementById('modal-tambah-agenda');
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
    }

    function openEditAgendaModal(item) {
        const form = document.getElementById('form-edit-agenda');
        if (!form) return;
        form.action = '/admin/agenda/' + item.id;
        document.getElementById('edit-agenda-title').value = item.title || '';
        document.getElementById('edit-agenda-date').value = item.date || '';
        document.getElementById('edit-agenda-location').value = item.location || '';

        const modal = document.getElementById('modal-edit-agenda');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

</script>
</body>
</html>













