const fs = require('fs');
let content = fs.readFileSync('resources/views/portal-resmi.blade.php', 'utf8');

// 1. Data JSON Replacements
content = content.replace(/\/\/ Data Store - News Articles[\s\S]*?const slides = \[[\s\S]*?\];/g, `
        // Data from Database
        const newsData = @json($newsData);
        const cultureData = @json($cultureData);
        const slides = @json($slides);
`);

// 2. Add Header Menu
content = content.replace(/<a href="#pengaduan".*?E-Lapor<\/a>/g, `<a href="#pengaduan" class="px-3 py-2 text-slate-700 dark:text-slate-300 hover:text-red-700 dark:hover:text-amber-400 transition-colors">E-Lapor</a>
                    <a href="javascript:void(0)" onclick="openAdminAuth()" class="px-3 py-2 text-slate-700 dark:text-slate-300 hover:text-red-700 dark:hover:text-amber-400 transition-colors font-bold"><i class="fas fa-lock text-xs mr-1"></i>Admin</a>`);

content = content.replace(/<a href="#pengaduan".*?Layanan Pengaduan<\/a>/g, `<a href="#pengaduan" onclick="toggleMobileMenu()" class="block px-3 py-2 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800">Layanan Pengaduan</a>
            <a href="javascript:void(0)" onclick="openAdminAuth(); toggleMobileMenu();" class="block px-3 py-2 rounded-lg text-red-700 dark:text-amber-400 hover:bg-slate-100 dark:hover:bg-slate-800 font-bold"><i class="fas fa-lock mr-2"></i>Admin Database</a>`);

content = content.replace(/<li><a href="#unduhan".*?Download Regulasi & Juknis<\/a><\/li>/g, `<li><a href="#unduhan" class="hover:text-amber-400 transition-colors">Download Regulasi & Juknis</a></li>
                        <li><a href="javascript:void(0)" onclick="openAdminAuth()" class="hover:text-red-400 transition-colors"><i class="fas fa-lock mr-1"></i>Kelola Data (Admin)</a></li>`);

// 3. Inject Modals and JS (with file upload fields and correct FormData script)
const modalsAndJs = `
    <!-- Admin Auth Modal -->
    <div id="admin-auth-modal" class="fixed inset-0 z-50 hidden bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white dark:bg-slate-900 rounded-3xl max-w-sm w-full p-6 shadow-2xl border border-slate-200 dark:border-slate-800">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-4"><i class="fas fa-shield-alt text-amber-500 mr-2"></i>Akses Admin</h3>
            <p class="text-xs text-slate-500 mb-4">Masukkan kata sandi untuk mengelola data portal.</p>
            <input type="password" id="admin-pass" class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white mb-4 outline-none focus:border-amber-500" placeholder="Kata Sandi">
            <div class="flex gap-2">
                <button onclick="closeAdminAuth()" class="flex-1 py-2 rounded-xl bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold">Batal</button>
                <button onclick="verifyAdminPass()" class="flex-1 py-2 rounded-xl bg-red-700 text-white font-bold hover:bg-red-800">Masuk</button>
            </div>
        </div>
    </div>

    <!-- Admin Dashboard Modal -->
    <div id="admin-dashboard-modal" class="fixed inset-0 z-[60] hidden bg-slate-950/95 backdrop-blur-md flex flex-col items-center justify-start pt-10 px-4 overflow-y-auto">
        <button onclick="closeAdminDashboard()" class="fixed top-6 right-6 text-slate-400 hover:text-white text-3xl z-[70] bg-slate-800 w-12 h-12 rounded-full flex items-center justify-center shadow-lg"><i class="fas fa-times"></i></button>
        
        <div class="w-full max-w-5xl bg-white dark:bg-slate-900 rounded-3xl p-6 sm:p-8 shadow-2xl border border-slate-700 mb-20 relative">
            <h2 class="text-2xl font-black text-slate-900 dark:text-white mb-6 border-b border-slate-200 dark:border-slate-700 pb-4"><i class="fas fa-cogs text-amber-500 mr-2"></i>Kelola Database Portal</h2>
            
            <div class="flex gap-2 mb-6">
                <button onclick="switchAdminTab('news')" id="tab-btn-news" class="px-5 py-2.5 rounded-xl font-bold text-sm bg-red-700 text-white shadow">Kelola Berita</button>
                <button onclick="switchAdminTab('culture')" id="tab-btn-culture" class="px-5 py-2.5 rounded-xl font-bold text-sm bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-300 dark:hover:bg-slate-700">Kelola Kebudayaan</button>
            </div>

            <!-- News Tab -->
            <div id="admin-tab-news">
                <div class="bg-slate-50 dark:bg-slate-800/50 p-5 rounded-2xl border border-slate-200 dark:border-slate-700 mb-6">
                    <h4 class="font-bold text-slate-900 dark:text-white mb-3">Tambah Berita / Pengumuman Baru</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <input type="text" id="add-news-title" placeholder="Judul Berita" class="w-full px-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-white outline-none">
                        <select id="add-news-category" class="w-full px-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-white outline-none">
                            <option value="pengumuman">Pengumuman</option>
                            <option value="beasiswa">Beasiswa</option>
                            <option value="pendidikan">Pendidikan</option>
                            <option value="kebudayaan">Kebudayaan</option>
                        </select>
                        <div class="flex items-center gap-2"><span class="text-xs font-bold text-slate-500 whitespace-nowrap">Unggah Foto (Max 5MB):</span><input type="file" id="add-news-image" accept="image/*" class="w-full text-xs text-slate-900 dark:text-white file:mr-2 file:py-1 file:px-3 file:rounded file:border-0 file:text-xs file:font-bold file:bg-slate-200 file:text-slate-700 hover:file:bg-slate-300 outline-none"></div>
                        <div class="flex items-center gap-2 px-2">
                            <input type="checkbox" id="add-news-featured" class="w-5 h-5 accent-red-700">
                            <label for="add-news-featured" class="text-sm font-bold text-slate-700 dark:text-slate-300">Tampilkan di Carousel Utama?</label>
                        </div>
                    </div>
                    <textarea id="add-news-summary" rows="2" placeholder="Ringkasan (max 2 baris)" class="w-full px-4 py-2 mb-4 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-white outline-none"></textarea>
                    <textarea id="add-news-content" rows="4" placeholder="Konten Berita Lengkap (HTML dibolehkan)" class="w-full px-4 py-2 mb-4 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-white outline-none"></textarea>
                    <button onclick="saveAdminNews()" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-6 py-2 rounded-xl text-sm transition-colors shadow-md">
                        <i class="fas fa-save mr-2"></i> Simpan Berita
                    </button>
                </div>

                <div class="overflow-x-auto rounded-xl border border-slate-200 dark:border-slate-700">
                    <table class="w-full text-left text-sm text-slate-600 dark:text-slate-300">
                        <thead class="bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200 font-bold uppercase text-xs">
                            <tr>
                                <th class="px-4 py-3">ID</th>
                                <th class="px-4 py-3">Judul</th>
                                <th class="px-4 py-3">Kategori</th>
                                <th class="px-4 py-3 text-center">Carousel</th>
                                <th class="px-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 dark:divide-slate-700" id="admin-news-table-body">
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Culture Tab -->
            <div id="admin-tab-culture" class="hidden">
                <div class="bg-slate-50 dark:bg-slate-800/50 p-5 rounded-2xl border border-slate-200 dark:border-slate-700 mb-6">
                    <h4 class="font-bold text-slate-900 dark:text-white mb-3">Tambah Data Kebudayaan</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <input type="text" id="add-cult-title" placeholder="Nama Kebudayaan/Cagar" class="w-full px-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-white outline-none">
                        <select id="add-cult-type" class="w-full px-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-white outline-none">
                            <option value="tarian">Tari Adat</option>
                            <option value="cagar">Cagar Budaya</option>
                            <option value="musik">Alat Musik</option>
                        </select>
                        <input type="text" id="add-cult-location" placeholder="Lokasi (mis: Banda Neira)" class="w-full px-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-white outline-none">
                        <div class="flex items-center gap-2"><span class="text-xs font-bold text-slate-500 whitespace-nowrap">Unggah Foto (Max 5MB):</span><input type="file" id="add-cult-image" accept="image/*" class="w-full text-xs text-slate-900 dark:text-white file:mr-2 file:py-1 file:px-3 file:rounded file:border-0 file:text-xs file:font-bold file:bg-slate-200 file:text-slate-700 hover:file:bg-slate-300 outline-none"></div>
                    </div>
                    <textarea id="add-cult-desc" rows="3" placeholder="Deskripsi Singkat" class="w-full px-4 py-2 mb-4 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-slate-900 dark:text-white outline-none"></textarea>
                    <button onclick="saveAdminCulture()" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-6 py-2 rounded-xl text-sm transition-colors shadow-md">
                        <i class="fas fa-save mr-2"></i> Simpan Kebudayaan
                    </button>
                </div>

                <div class="overflow-x-auto rounded-xl border border-slate-200 dark:border-slate-700">
                    <table class="w-full text-left text-sm text-slate-600 dark:text-slate-300">
                        <thead class="bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200 font-bold uppercase text-xs">
                            <tr>
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3">Jenis</th>
                                <th class="px-4 py-3">Lokasi</th>
                                <th class="px-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 dark:divide-slate-700" id="admin-culture-table-body">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Overlay Modal -->`;
    
content = content.replace('<!-- Search Overlay Modal -->', modalsAndJs);

const adminFunctions = `
        function openAdminAuth() {
            if(sessionStorage.getItem('portal_admin') === 'disdikbud2026') {
                openAdminDashboard();
            } else {
                document.getElementById('admin-auth-modal').classList.remove('hidden');
            }
        }
        function closeAdminAuth() {
            document.getElementById('admin-auth-modal').classList.add('hidden');
        }
        function verifyAdminPass() {
            const val = document.getElementById('admin-pass').value;
            if(val === 'disdikbud2026') {
                sessionStorage.setItem('portal_admin', val);
                closeAdminAuth();
                openAdminDashboard();
            } else {
                alert('Password salah!');
            }
        }
        function openAdminDashboard() {
            document.getElementById('admin-dashboard-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            renderAdminTables();
        }
        function closeAdminDashboard() {
            document.getElementById('admin-dashboard-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        function switchAdminTab(tab) {
            document.getElementById('admin-tab-news').classList.add('hidden');
            document.getElementById('admin-tab-culture').classList.add('hidden');
            
            document.getElementById('tab-btn-news').className = "px-5 py-2.5 rounded-xl font-bold text-sm bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-300 dark:hover:bg-slate-700";
            document.getElementById('tab-btn-culture').className = "px-5 py-2.5 rounded-xl font-bold text-sm bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-300 dark:hover:bg-slate-700";
            
            document.getElementById('admin-tab-' + tab).classList.remove('hidden');
            document.getElementById('tab-btn-' + tab).className = "px-5 py-2.5 rounded-xl font-bold text-sm bg-red-700 text-white shadow";
        }
        
        function renderAdminTables() {
            let newsTbody = document.getElementById('admin-news-table-body');
            newsTbody.innerHTML = '';
            newsData.forEach(n => {
                let isFeaturedHtml = n.is_featured ? '<span class="text-amber-500 font-bold"><i class="fas fa-star"></i> Ya</span>' : '<span class="text-slate-400">Tidak</span>';
                newsTbody.innerHTML += \`
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <td class="px-4 py-3 font-medium">\${n.id}</td>
                        <td class="px-4 py-3 font-bold">\${n.title}</td>
                        <td class="px-4 py-3 uppercase text-xs">\${n.category}</td>
                        <td class="px-4 py-3 text-center">\${isFeaturedHtml}</td>
                        <td class="px-4 py-3 text-center">
                            <button onclick="deleteAdminNews(\${n.id})" class="p-2 rounded bg-red-100 text-red-600 hover:bg-red-600 hover:text-white transition-colors" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>\`;
            });

            let cultTbody = document.getElementById('admin-culture-table-body');
            cultTbody.innerHTML = '';
            cultureData.forEach(c => {
                cultTbody.innerHTML += \`
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <td class="px-4 py-3 font-bold">\${c.title}</td>
                        <td class="px-4 py-3 uppercase text-xs">\${c.type}</td>
                        <td class="px-4 py-3">\${c.location}</td>
                        <td class="px-4 py-3 text-center">
                            <button onclick="deleteAdminCulture('\${c.id}')" class="p-2 rounded bg-red-100 text-red-600 hover:bg-red-600 hover:text-white transition-colors" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>\`;
            });
        }
        
        function getAuthHeaders() {
            return {
                'X-Anggaran-Password': sessionStorage.getItem('portal_admin')
            };
        }

        async function saveAdminNews() {
            let formData = new FormData();
            formData.append('title', document.getElementById('add-news-title').value);
            formData.append('category', document.getElementById('add-news-category').value);
            formData.append('summary', document.getElementById('add-news-summary').value);
            formData.append('content', document.getElementById('add-news-content').value);
            formData.append('is_featured', document.getElementById('add-news-featured').checked ? 1 : 0);
            
            let fileInput = document.getElementById('add-news-image');
            if(fileInput.files.length > 0) {
                let file = fileInput.files[0];
                if(file.size > 5 * 1024 * 1024) return alert("Ukuran foto maksimal 5 MB!");
                formData.append('image', file);
            }
            
            if(!formData.get('title')) return alert("Judul wajib diisi!");
            
            try {
                let res = await fetch('/api/portal/news', {
                    method: 'POST',
                    headers: getAuthHeaders(),
                    body: formData
                });
                if(res.ok) {
                    alertModal("Berita berhasil ditambahkan! Memuat ulang portal...");
                    setTimeout(() => window.location.reload(), 1000);
                } else {
                    alert("Akses ditolak atau terjadi kesalahan saat mengunggah.");
                }
            } catch(e) { console.error(e); }
        }

        async function deleteAdminNews(id) {
            if(!confirm("Yakin ingin menghapus berita ini?")) return;
            try {
                let res = await fetch('/api/portal/news/' + id, {
                    method: 'DELETE',
                    headers: { 'Content-Type': 'application/json', 'X-Anggaran-Password': sessionStorage.getItem('portal_admin') }
                });
                if(res.ok) {
                    alertModal("Berita dihapus!");
                    setTimeout(() => window.location.reload(), 800);
                }
            } catch(e) { console.error(e); }
        }

        async function saveAdminCulture() {
            let formData = new FormData();
            formData.append('title', document.getElementById('add-cult-title').value);
            formData.append('type', document.getElementById('add-cult-type').value);
            formData.append('location', document.getElementById('add-cult-location').value);
            formData.append('desc', document.getElementById('add-cult-desc').value);
            
            let fileInput = document.getElementById('add-cult-image');
            if(fileInput.files.length > 0) {
                let file = fileInput.files[0];
                if(file.size > 5 * 1024 * 1024) return alert("Ukuran foto maksimal 5 MB!");
                formData.append('image', file);
            }
            
            if(!formData.get('title')) return alert("Nama Kebudayaan wajib diisi!");
            
            try {
                let res = await fetch('/api/portal/culture', {
                    method: 'POST',
                    headers: getAuthHeaders(),
                    body: formData
                });
                if(res.ok) {
                    alertModal("Data Kebudayaan ditambahkan! Memuat ulang...");
                    setTimeout(() => window.location.reload(), 1000);
                } else {
                    alert("Akses ditolak atau terjadi kesalahan saat mengunggah.");
                }
            } catch(e) { console.error(e); }
        }

        async function deleteAdminCulture(id) {
            if(!confirm("Yakin ingin menghapus cagar budaya ini?")) return;
            try {
                let res = await fetch('/api/portal/culture/' + id, {
                    method: 'DELETE',
                    headers: { 'Content-Type': 'application/json', 'X-Anggaran-Password': sessionStorage.getItem('portal_admin') }
                });
                if(res.ok) {
                    alertModal("Data dihapus!");
                    setTimeout(() => window.location.reload(), 800);
                }
            } catch(e) { console.error(e); }
        }
        
        function toggleSearchModal() {`;

content = content.replace('function toggleSearchModal() {', adminFunctions);

// Add FABs before </body>
const fabs = `
    <!-- Floating Admin Button -->
    <button onclick="openAdminAuth()" class="fixed bottom-6 left-6 z-50 bg-slate-900 hover:bg-red-700 text-white w-14 h-14 rounded-full shadow-2xl border-2 border-slate-700 hover:border-red-500 flex items-center justify-center transition-all group" title="Admin Database">
        <i class="fas fa-database text-xl group-hover:scale-110 transition-transform"></i>
    </button>
    
    <!-- Kotak Kembali ke Aplikasi Utama -->
    <a href="/" class="fixed bottom-6 right-6 z-50 bg-white dark:bg-slate-800 text-slate-800 dark:text-white px-5 py-3 rounded-2xl shadow-2xl border border-slate-200 dark:border-slate-700 hover:border-red-500 hover:shadow-red-500/20 flex items-center justify-center gap-3 transition-all group font-bold text-sm">
        <div class="w-8 h-8 rounded-full bg-red-100 dark:bg-red-900/50 text-red-600 dark:text-red-400 flex items-center justify-center group-hover:scale-110 transition-transform">
            <i class="fas fa-arrow-left"></i>
        </div>
        <span>Kembali ke Beranda Utama</span>
    </a>
</body>`;
content = content.replace('</body>', fabs);

fs.writeFileSync('resources/views/portal-resmi.blade.php', content);
