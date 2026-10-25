
                // Data from Database
        const newsData = @json($newsData);
        const cultureData = @json($cultureData);
        const slides = @json($slides);

        // Initialize Page
        document.addEventListener('DOMContentLoaded', () => {
            renderNewsGrid();
            renderCultureGrid();
            initCarousel();
            updateTime();
            setInterval(updateTime, 1000);
            initTheme();
        });

        // Live Clock Function
        function updateTime() {
            const now = new Date();
            const optionsDate = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const dateStr = now.toLocaleDateString('id-ID', optionsDate);
            const timeStr = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' }) + ' WIT';
            
            document.getElementById('current-date').innerText = dateStr;
            document.getElementById('current-time').innerText = timeStr;
        }

        // Theme Toggle
        function initTheme() {
            const themeToggleBtn = document.getElementById('theme-toggle');
            if (themeToggleBtn) {
                if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    document.documentElement.classList.add('dark');
                    updateThemeUI(true);
                } else {
                    document.documentElement.classList.remove('dark');
                    updateThemeUI(false);
                }

                themeToggleBtn.addEventListener('click', () => {
                    const isDark = document.documentElement.classList.toggle('dark');
                    localStorage.theme = isDark ? 'dark' : 'light';
                    updateThemeUI(isDark);
                });
            }
        }

        function updateThemeUI(isDark) {
            const icon = document.getElementById('theme-icon');
            const text = document.getElementById('theme-text');
            if (icon && text) {
                if (isDark) {
                    icon.className = 'fas fa-sun text-amber-400';
                    text.innerText = 'Mode Terang';
                } else {
                    icon.className = 'fas fa-moon text-amber-500';
                    text.innerText = 'Mode Gelap';
                }
            }
        }

        // Carousel Logic
        function initCarousel() {
            const dotsContainer = document.getElementById('slide-dots');
            dotsContainer.innerHTML = '';
            slides.forEach((_, idx) => {
                const dot = document.createElement('button');
                dot.className = `w-2.5 h-2.5 rounded-full transition-all ${idx === 0 ? 'bg-amber-400 w-6' : 'bg-white/50'}`;
                dot.onclick = () => goToSlide(idx);
                dotsContainer.appendChild(dot);
            });
            updateSlideView();
        }

        function goToSlide(idx) {
            currentSlide = idx;
            updateSlideView();
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            updateSlideView();
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            updateSlideView();
        }

        function updateSlideView() {
            const slide = slides[currentSlide];
            document.getElementById('hero-img').src = slide.img;
            document.getElementById('hero-title').innerText = slide.title;
            document.getElementById('hero-desc').innerText = slide.desc;
            document.getElementById('hero-tag').innerText = slide.tag;
            document.getElementById('hero-date').innerHTML = `<i class="far fa-clock mr-1"></i> ${slide.date}`;

            const dots = document.getElementById('slide-dots').children;
            Array.from(dots).forEach((dot, idx) => {
                dot.className = `w-2.5 h-2.5 rounded-full transition-all ${idx === currentSlide ? 'bg-amber-400 w-6' : 'bg-white/50'}`;
            });
        }

        // News Grid Rendering
        function renderNewsGrid() {
            const grid = document.getElementById('news-grid');
            grid.innerHTML = '';

            const filtered = activeCategory === 'semua' 
                ? newsData 
                : newsData.filter(item => item.category === activeCategory);

            if (filtered.length === 0) {
                grid.innerHTML = `<div class="col-span-full text-center py-12 text-slate-500">Tidak ada berita ditemukan untuk kategori ini.</div>`;
                return;
            }

            filtered.forEach(item => {
                const card = document.createElement('article');
                card.className = "bg-white dark:bg-slate-900 rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group";
                card.innerHTML = `
                    <div>
                        <div class="relative overflow-hidden h-48">
                            <img src="${item.image}" alt="${item.title}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <span class="absolute top-3 left-3 bg-red-700 text-white font-extrabold text-[10px] tracking-wide uppercase px-2.5 py-1 rounded-md shadow">
                                ${item.category}
                            </span>
                        </div>
                        <div class="p-5 space-y-2">
                            <div class="flex items-center text-xs text-slate-400 gap-3">
                                <span><i class="far fa-calendar mr-1"></i> ${item.date}</span>
                                <span><i class="far fa-clock mr-1"></i> ${item.readTime}</span>
                            </div>
                            <h3 class="font-bold text-slate-900 dark:text-white text-base group-hover:text-red-600 dark:group-hover:text-amber-400 transition-colors line-clamp-2">
                                ${item.title}
                            </h3>
                            <p class="text-xs text-slate-600 dark:text-slate-400 line-clamp-2 leading-relaxed">
                                ${item.summary}
                            </p>
                        </div>
                    </div>
                    <div class="p-5 pt-0">
                        <button onclick="openNewsDetail(${item.id})" class="w-full py-2.5 rounded-xl bg-slate-100 dark:bg-slate-800 hover:bg-red-700 hover:text-white dark:hover:bg-amber-500 dark:hover:text-slate-950 font-bold text-xs text-slate-700 dark:text-slate-200 transition-colors flex items-center justify-center gap-2">
                            <span>Baca Selengkapnya</span>
                            <i class="fas fa-chevron-right text-[10px]"></i>
                        </button>
                    </div>
                `;
                grid.appendChild(card);
            });
        }

        function filterNews(cat) {
            activeCategory = cat;
            const buttons = document.querySelectorAll('.cat-btn');
            buttons.forEach(btn => {
                btn.classList.remove('bg-red-700', 'text-white', 'shadow');
                btn.classList.add('bg-slate-200', 'dark:bg-slate-800', 'text-slate-700', 'dark:text-slate-300');
            });
            event.target.classList.remove('bg-slate-200', 'dark:bg-slate-800', 'text-slate-700', 'dark:text-slate-300');
            event.target.classList.add('bg-red-700', 'text-white', 'shadow');
            renderNewsGrid();
        }

        // Culture Grid Rendering
        function renderCultureGrid() {
            const container = document.getElementById('culture-grid');
            container.innerHTML = '';

            const filtered = activeCultureTab === 'all' 
                ? cultureData 
                : cultureData.filter(c => c.type === activeCultureTab);

            filtered.forEach(item => {
                const el = document.createElement('div');
                el.className = "group relative rounded-2xl overflow-hidden border border-slate-800 bg-slate-950 h-72 shadow-lg";
                el.innerHTML = `
                    <img src="${item.image}" alt="${item.title}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-70">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
                    <div class="absolute bottom-0 inset-x-0 p-5 space-y-1">
                        <span class="text-[10px] text-amber-400 font-bold uppercase tracking-wider"><i class="fas fa-map-marker-alt mr-1"></i> ${item.location}</span>
                        <h4 class="text-lg font-extrabold text-white">${item.title}</h4>
                        <p class="text-xs text-slate-300 line-clamp-2 opacity-90">${item.desc}</p>
                    </div>
                `;
                container.appendChild(el);
            });
        }

        function filterCulture(type) {
            activeCultureTab = type;
            const tabs = document.querySelectorAll('.culture-tab');
            tabs.forEach(t => {
                t.classList.remove('bg-amber-500', 'text-slate-950');
                t.classList.add('bg-slate-800', 'text-slate-300');
            });
            event.target.classList.remove('bg-slate-800', 'text-slate-300');
            event.target.classList.add('bg-amber-500', 'text-slate-950');
            renderCultureGrid();
        }

        // Modal Action Handlers
        function openNewsDetail(id) {
            const article = newsData.find(n => n.id === id) || {
                title: "Pengumuman Resmi Dinas Pendidikan",
                category: "Pengumuman",
                date: "21 Agustus 2026",
                readTime: "3 mnt baca",
                image: "https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=800&q=80",
                content: "<p>Informasi detail publikasi terkait layanan operasional dan surat edaran dinas dapat dilihat melalui bagian unduhan dokumen resmi.</p>"
            };

            const contentContainer = document.getElementById('modal-article-content');
            contentContainer.innerHTML = `
                <div class="space-y-4">
                    <span class="inline-block bg-red-700 text-white font-bold text-xs uppercase px-3 py-1 rounded-md">
                        ${article.category}
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white leading-tight">
                        ${article.title}
                    </h2>
                    <div class="flex items-center text-xs text-slate-500 space-x-4 border-b border-slate-200 dark:border-slate-800 pb-4">
                        <span><i class="far fa-user mr-1"></i> Humas Disdikbud Maluku</span>
                        <span><i class="far fa-calendar mr-1"></i> ${article.date}</span>
                        <span><i class="far fa-clock mr-1"></i> ${article.readTime}</span>
                    </div>
                    <img src="${article.image}" class="w-full h-64 sm:h-80 object-cover rounded-2xl my-4">
                    <div class="text-slate-700 dark:text-slate-300 text-sm sm:text-base leading-relaxed space-y-4">
                        ${article.content}
                    </div>
                    <div class="pt-6 border-t border-slate-200 dark:border-slate-800 flex justify-between items-center">
                        <span class="text-xs text-slate-500">Bagikan artikel ini:</span>
                        <div class="flex space-x-2">
                            <button onclick="shareArticle('${article.title}')" class="px-3 py-1.5 bg-slate-100 dark:bg-slate-800 rounded-lg text-xs font-bold hover:bg-red-700 hover:text-white transition-colors">
                                <i class="fas fa-share-alt mr-1"></i> Bagikan
                            </button>
                        </div>
                    </div>
                </div>
            `;

            document.getElementById('news-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeNewsModal() {
            document.getElementById('news-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function readFeaturedNews() {
            openNewsDetail(1);
        }

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
                newsTbody.innerHTML += `
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <td class="px-4 py-3 font-medium">${n.id}</td>
                        <td class="px-4 py-3 font-bold">${n.title}</td>
                        <td class="px-4 py-3 uppercase text-xs">${n.category}</td>
                        <td class="px-4 py-3 text-center">${isFeaturedHtml}</td>
                        <td class="px-4 py-3 text-center">
                            <button onclick="deleteAdminNews(${n.id})" class="p-2 rounded bg-red-100 text-red-600 hover:bg-red-600 hover:text-white transition-colors" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                `;
            });

            let cultTbody = document.getElementById('admin-culture-table-body');
            cultTbody.innerHTML = '';
            cultureData.forEach(c => {
                cultTbody.innerHTML += `
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <td class="px-4 py-3 font-bold">${c.title}</td>
                        <td class="px-4 py-3 uppercase text-xs">${c.type}</td>
                        <td class="px-4 py-3">${c.location}</td>
                        <td class="px-4 py-3 text-center">
                            <button onclick="deleteAdminCulture('${c.id}')" class="p-2 rounded bg-red-100 text-red-600 hover:bg-red-600 hover:text-white transition-colors" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                `;
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
        });
                if(res.ok) {
                    alertModal("Data dihapus!");
                    setTimeout(() => window.location.reload(), 800);
                }
            } catch(e) { console.error(e); }
        }

        function toggleSearchModal() {
            const modal = document.getElementById('search-modal');
            modal.classList.toggle('hidden');
            if (!modal.classList.contains('hidden')) {
                document.getElementById('modal-search-input').focus();
            }
        }

        function handleModalSearch() {
            const query = document.getElementById('modal-search-input').value.toLowerCase().trim();
            const container = document.getElementById('search-results-container');
            container.innerHTML = '';

            if (query.length < 2) {
                container.innerHTML = '<div class="text-slate-400 text-xs text-center py-4">Ketik minimal 2 karakter untuk mencari...</div>';
                return;
            }

            const results = newsData.filter(item => 
                item.title.toLowerCase().includes(query) || 
                item.summary.toLowerCase().includes(query) ||
                item.category.toLowerCase().includes(query)
            );

            if (results.length === 0) {
                container.innerHTML = '<div class="text-slate-400 text-xs text-center py-4">Tidak ditemukan hasil yang cocok.</div>';
                return;
            }

            results.forEach(item => {
                const itemEl = document.createElement('div');
                itemEl.className = "p-3 bg-slate-800 hover:bg-slate-700 rounded-xl cursor-pointer transition-colors text-white flex items-center justify-between";
                itemEl.onclick = () => {
                    toggleSearchModal();
                    openNewsDetail(item.id);
                };
                itemEl.innerHTML = `
                    <div>
                        <h5 class="text-xs font-bold text-amber-400">${item.title}</h5>
                        <p class="text-[11px] text-slate-300 line-clamp-1">${item.summary}</p>
                    </div>
                    <i class="fas fa-chevron-right text-xs text-slate-500 ml-2"></i>
                `;
                container.appendChild(itemEl);
            });
        }

        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const icon = document.getElementById('menu-icon');
            menu.classList.toggle('hidden');
            if (menu.classList.contains('hidden')) {
                icon.className = 'fas fa-bars text-xl';
            } else {
                icon.className = 'fas fa-times text-xl';
            }
        }

        function openServiceModal(serviceName) {
            alertModal(`Layanan "${serviceName}" siap diakses. Anda akan diarahkan ke sistem otentikasi portal terpadu.`);
        }

        function downloadDoc(filename) {
            alertModal(`Mengunduh dokumen resmi: ${filename}`);
        }

        function submitComplaint(e) {
            e.preventDefault();
            alertModal('Terima kasih! Laporan aspirasi Anda telah berhasil dikirim ke E-Lapor Disdikbud Maluku. Nomor tiket penanganan akan dikirimkan via WhatsApp.');
            document.getElementById('complaint-form').reset();
        }

        function shareArticle(title) {
            if (navigator.clipboard) {
                navigator.clipboard.writeText(window.location.href);
                alertModal('Tautan artikel berhasil disalin ke clipboard!');
            } else {
                alertModal('Bagikan artikel: ' + title);
            }
        }

        function alertModal(message) {
            const alertBox = document.createElement('div');
            alertBox.className = "fixed bottom-6 right-6 z-50 bg-slate-900 text-white px-5 py-4 rounded-2xl shadow-2xl border border-amber-500/40 flex items-center gap-3 animate-bounce";
            alertBox.innerHTML = `
                <i class="fas fa-info-circle text-amber-400 text-lg"></i>
                <span class="text-xs font-medium max-w-xs">${message}</span>
                <button onclick="this.parentElement.remove()" class="ml-2 text-slate-400 hover:text-white"><i class="fas fa-times"></i></button>
            `;
            document.body.appendChild(alertBox);
            setTimeout(() => alertBox.remove(), 5000);
        }

        function loadMoreNews() {
            const spinner = document.getElementById('load-spinner');
            const btn = document.getElementById('load-more-btn');
            spinner.classList.remove('hidden');
            btn.disabled = true;

            setTimeout(() => {
                spinner.classList.add('hidden');
                btn.disabled = false;
                alertModal('Semua berita terbaru saat ini telah ditampilkan.');
            }, 1200);
        }

        function changeFontSize(delta) {
            const currentSize = parseFloat(window.getComputedStyle(document.body).fontSize);
            const newSize = Math.max(12, Math.min(20, currentSize + delta));
            document.body.style.fontSize = newSize + 'px';
        }
    
