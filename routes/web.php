<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    // Fetch directly from CMS Dikbud (Post Model) for Beranda Utama
    $recentPosts = \App\Models\Post::where('type', '!=', 'Pengumuman')
        ->where('status', 'Published')
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();
        
    $pengumumans = \App\Models\Post::where('type', 'Pengumuman')
        ->where('status', 'Published')
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();

    $agendas = \App\Models\Agenda::orderBy('date', 'asc')->where('date', '>=', now())->take(3)->get();
    if($agendas->isEmpty()) $agendas = \App\Models\Agenda::orderBy('date', 'desc')->take(3)->get();
    
    // Portal News Data (for the portal admin modal if opened from welcome)
    $newsData = \App\Models\PortalNews::orderBy('created_at', 'desc')->get()->map(function ($news) {
        return [
            'id' => $news->id,
            'title' => $news->title,
            'category' => $news->category,
            'date' => $news->date,
            'readTime' => $news->read_time,
            'image' => $news->image,
            'summary' => $news->summary,
            'content' => $news->content,
            'is_featured' => $news->is_featured
        ];
    });

    $cultureData = \App\Models\PortalCulture::orderBy('created_at', 'desc')->get()->map(function ($c) {
        return [
            'id' => 'c' . $c->id,
            'title' => $c->title,
            'type' => $c->type,
            'location' => $c->location,
            'image' => $c->image,
            'desc' => $c->desc
        ];
    });

    $slides = \App\Models\PortalNews::where('is_featured', true)
        ->orderByRaw('CASE WHEN id = 1 THEN 0 ELSE 1 END')
        ->orderBy('created_at', 'desc')
        ->get()
        ->map(function ($s) {
            return [
                'id' => $s->id,
                'title' => $s->title,
                'tag' => 'Program Unggulan',
                'date' => $s->date,
                'image' => $s->image,
                'link' => '#',
                'desc' => $s->summary
            ];
        });
    
    if($slides->isEmpty()){
        $slides = \App\Models\PortalNews::take(3)->get()->map(function ($s) {
            return [
                'id' => $s->id,
                'title' => $s->title,
                'tag' => 'Info Terkini',
                'date' => $s->date,
                'image' => $s->image,
                'link' => '#',
                'desc' => $s->summary
            ];
        });
    }

    $monevStats = \App\Models\MonevStat::first();
    $monevRegions = \App\Models\MonevRegion::orderBy('urutan', 'asc')->get();
    $heroSlides = \App\Models\HeroSlide::where('is_active', true)->orderBy('order', 'asc')->get();
    $heroSetting = \App\Models\HeroSetting::first();
    if (!$heroSetting) {
        $heroSetting = \App\Models\HeroSetting::create([
            'campaign_badge' => 'Dinas Pendidikan & kebudayaan Prov. Maluku',
            'title' => 'Mewujudkan Pendidikan Berkualitas & Merata di Bumi Raja-Raja.',
            'title_highlight' => 'Berkualitas & Merata',
            'description' => 'Portal resmi informasi pendidikan, kebudayaan, pelayanan publik, dan transparansi anggaran Dinas Pendidikan dan Kebudayaan Provinsi Maluku.',
            'btn1_text' => 'Layanan Digital',
            'btn1_url' => '#layanan',
            'btn2_text' => 'Transparansi Publik',
            'btn2_url' => '#transparansi',
            'kadis_name' => 'Dr. Sarlota Singerin, S.Pd., M.Pd',
            'kadis_position' => 'Kepala Dinas Pendidikan & Kebudayaan',
            'kadis_photo' => '/images/kadin-sarlota.webp',
            'kadis_quote' => 'Selamat datang di portal resmi kami. Kami berkomitmen menyelenggarakan pelayanan publik yang informatif, transparan, dan akuntabel demi kemajuan pendidikan dan pelestarian kebudayaan di Provinsi Maluku.',
            'kadis_button_text' => 'Baca Selengkapnya',
            'kadis_button_link' => '#',
        ]);
    }

    $featuredPrograms = \App\Models\FeaturedProgram::where('is_active', true)->orderBy('order', 'asc')->get();
    $transparansiPosters = \App\Models\TransparansiPoster::where('is_active', true)->orderBy('order', 'asc')->get();
    $bannerIklans = \App\Models\BannerIklan::where('is_active', true)->orderBy('order', 'asc')->get();
    $layananSubmissions = \App\Models\LayananSopSubmission::orderBy('created_at', 'desc')->get();

    return view('welcome', compact('recentPosts', 'pengumumans', 'agendas', 'newsData', 'cultureData', 'slides', 'monevStats', 'monevRegions', 'heroSlides', 'heroSetting', 'featuredPrograms', 'transparansiPosters', 'bannerIklans', 'layananSubmissions'));
});

Route::get('/ppid', function () {
    $totalPpid = \App\Models\PpidRequest::count();
    $totalAspirasi = \App\Models\Complaint::count();
    $totalBerita = \App\Models\Post::where('status', 'Published')->count();
    $kabarPendidikan = \App\Models\Post::where('status', 'Published')
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();
    return view('ppid', compact('totalPpid', 'totalAspirasi', 'totalBerita', 'kabarPendidikan'));
})->name('ppid');

Route::redirect('/index.html', '/');
Route::redirect('/index.php', '/');
Route::redirect('/ppid.html', '/ppid');
Route::redirect('/pengaduan.html', '/pengaduan');
Route::redirect('/dashboard.html', '/dashboard');

Route::get('/pengaduan', function () {
    return view('pengaduan');
})->name('pengaduan');

Route::get('/lapor', function () {
    return redirect()->route('pengaduan');
});

Route::post('/pengaduan/store', [\App\Http\Controllers\DashboardController::class, 'storePengaduan'])->name('pengaduan.store');


// SKM Database API Endpoints
Route::get('/api/skm/responses', function () {
    return response()->json(\App\Models\SkmResponse::orderBy('created_at', 'desc')->get());
});

Route::post('/api/skm/store', function (\Illuminate\Http\Request $request) {
    $data = $request->validate([
        'nama' => 'nullable|string',
        'alamat' => 'nullable|string',
        'pendidikan' => 'nullable|string',
        'pekerjaan' => 'nullable|string',
        'jenis_kelamin' => 'nullable|string',
        'waktu_pelayanan' => 'nullable|string',
        'u1' => 'required|integer|min:1|max:4',
        'u2' => 'required|integer|min:1|max:4',
        'u3' => 'required|integer|min:1|max:4',
        'u4' => 'required|integer|min:1|max:4',
        'u5' => 'required|integer|min:1|max:4',
        'u6' => 'required|integer|min:1|max:4',
        'u7' => 'required|integer|min:1|max:4',
        'u8' => 'required|integer|min:1|max:4',
        'u9' => 'required|integer|min:1|max:4',
        'saran' => 'nullable|string',
    ]);
    if (empty($data['nama'])) $data['nama'] = 'Anonim';
    $resp = \App\Models\SkmResponse::create($data);
    return response()->json(['success' => true, 'data' => $resp]);
});

Route::get('/skm', function () {
    $responses = \App\Models\SkmResponse::orderBy('created_at', 'desc')->get()->map(function($r) {
        return [
            'id' => $r->id,
            'timestamp' => $r->created_at ? $r->created_at->toISOString() : now()->toISOString(),
            'nama' => $r->nama,
            'alamat' => $r->alamat,
            'pendidikan' => $r->pendidikan,
            'pekerjaan' => $r->pekerjaan,
            'jenis_kelamin' => $r->jenis_kelamin,
            'waktu_pelayanan' => $r->waktu_pelayanan,
            'u1' => (int)$r->u1,
            'u2' => (int)$r->u2,
            'u3' => (int)$r->u3,
            'u4' => (int)$r->u4,
            'u5' => (int)$r->u5,
            'u6' => (int)$r->u6,
            'u7' => (int)$r->u7,
            'u8' => (int)$r->u8,
            'u9' => (int)$r->u9,
            'saran' => $r->saran,
        ];
    });
    return view('skm', compact('responses'));
})->name('skm');

Route::get('/standar-pelayanan', function () {
    $sopList = \App\Models\LayananSop::all()->keyBy('service_code');
    return view('standar-pelayanan', compact('sopList'));
})->name('standar.pelayanan');

Route::get('/struktur-organisasi', function () {
    $profil = \App\Models\StrukturOrganisasi::first();
    return view('struktur-organisasi', compact('profil'));
})->name('struktur.organisasi');

Route::get('/visi-misi', function () {
    $profil = \App\Models\VisiMisi::first();
    return view('visi-misi', compact('profil'));
})->name('visi.misi');

Route::get('/visi-dan-misi', function () {
    return redirect()->route('visi.misi');
});

Route::get('/tugas-fungsi', function () {
    $profil = \App\Models\TugasFungsi::first();
    return view('tugas-fungsi', compact('profil'));
})->name('tugas.fungsi');

Route::get('/tugas-dan-fungsi', function () {
    return redirect()->route('tugas.fungsi');
});

Route::get('/dokumen-peraturan', function () {
    $dokumens = \App\Models\RegulasiDokumen::where('is_active', true)->orderBy('no', 'asc')->get();
    return view('dokumen-peraturan', compact('dokumens'));
})->name('dokumen.peraturan');

Route::get('/dokumen', function () {
    return redirect()->route('dokumen.peraturan');
});

Route::get('/regulasi', function () {
    return redirect()->route('dokumen.peraturan');
});

Route::get('/struktur', function () {
    return redirect()->route('struktur.organisasi');
});

Route::get('/galeri', function () {
    $type = request('type');
    $category = request('category');
    
    $query = \App\Models\Gallery::where('is_active', true);
    
    if ($type && in_array($type, ['foto', 'video'])) {
        $query->where('type', $type);
    }
    if ($category && $category !== 'all') {
        $query->where('category', $category);
    }
    
    $galleries = $query->orderBy('order', 'asc')->orderBy('created_at', 'desc')->get();
    $categories = \App\Models\Gallery::where('is_active', true)->whereNotNull('category')->distinct()->pluck('category');
    
    $totalFoto = \App\Models\Gallery::where('is_active', true)->where('type', 'foto')->count();
    $totalVideo = \App\Models\Gallery::where('is_active', true)->where('type', 'video')->count();
    $totalAll = \App\Models\Gallery::where('is_active', true)->count();
    
    return view('galeri', compact('galleries', 'categories', 'totalFoto', 'totalVideo', 'totalAll', 'type', 'category'));
})->name('galeri');

Route::get('/galeri-foto', function () {
    return redirect()->route('galeri', ['type' => 'foto']);
});

Route::get('/galeri-video', function () {
    return redirect()->route('galeri', ['type' => 'video']);
});

Route::post('/layanan/sop/upload', [\App\Http\Controllers\DashboardController::class, 'uploadSopSubmission'])->name('layanan.sop.upload');
Route::get('/layanan/dokumen/download/{id}', [\App\Http\Controllers\DashboardController::class, 'downloadLayananDocument'])->name('layanan.dokumen.download');

Route::get('/layanan', function () {
    return redirect()->route('standar.pelayanan');
});

Route::get('/layanan/kepegawaian-dan-umum', function () {
    $sopList = \App\Models\LayananSop::where('bidang', 'kepegawaian')->get()->keyBy('service_code');
    return view('layanan-kepegawaian', compact('sopList'));
})->name('layanan.kepegawaian');

Route::get('/layanan-kepegawaian', function () {
    return redirect()->route('layanan.kepegawaian');
});

Route::get('/layanan/gtk', function () {
    $sopList = \App\Models\LayananSop::where('bidang', 'gtk')->get()->keyBy('service_code');
    return view('layanan-gtk', compact('sopList'));
})->name('layanan.gtk');

Route::get('/layanan-gtk', function () {
    return redirect()->route('layanan.gtk');
});

Route::get('/layanan/sma', function () {
    $sopList = \App\Models\LayananSop::where('bidang', 'sma')->get()->keyBy('service_code');
    return view('layanan-sma', compact('sopList'));
})->name('layanan.sma');

Route::get('/layanan-sma', function () {
    return redirect()->route('layanan.sma');
});

Route::get('/layanan/bidang-pembinaan-sma', function () {
    return redirect()->route('layanan.sma');
});

Route::get('/layanan/smk', function () {
    $sopList = \App\Models\LayananSop::where('bidang', 'smk')->get()->keyBy('service_code');
    return view('layanan-smk', compact('sopList'));
})->name('layanan.smk');

Route::get('/layanan-smk', function () {
    return redirect()->route('layanan.smk');
});

Route::get('/layanan/bidang-pembinaan-smk', function () {
    return redirect()->route('layanan.smk');
});

Route::get('/layanan/pendidikan-khusus', function () {
    $sopList = \App\Models\LayananSop::where('bidang', 'pk')->get()->keyBy('service_code');
    return view('layanan-pk', compact('sopList'));
})->name('layanan.pk');

Route::get('/layanan/pk', function () {
    return redirect()->route('layanan.pk');
});

Route::get('/layanan-pk', function () {
    return redirect()->route('layanan.pk');
});

Route::get('/layanan/pembinaan-pendidikan-khusus', function () {
    return redirect()->route('layanan.pk');
});

Route::get('/layanan/kebudayaan', function () {
    $sopList = \App\Models\LayananSop::where('bidang', 'kebudayaan')->get()->keyBy('service_code');
    return view('layanan-kebudayaan', compact('sopList'));
})->name('layanan.kebudayaan');

Route::get('/layanan-kebudayaan', function () {
    return redirect()->route('layanan.kebudayaan');
});

Route::get('/layanan/bidang-kebudayaan', function () {
    return redirect()->route('layanan.kebudayaan');
});

Route::get('/berita-terkini', function () {
    $recentPosts = \App\Models\Post::where('type', '!=', 'Pengumuman')->orderBy('created_at', 'desc')->get();
    $pengumumans = \App\Models\Post::where('type', 'Pengumuman')->orderBy('created_at', 'desc')->take(5)->get();
    $agendas = \App\Models\Agenda::orderBy('date', 'asc')->where('date', '>=', now())->take(5)->get();
    if($agendas->isEmpty()) $agendas = \App\Models\Agenda::orderBy('date', 'desc')->take(5)->get();
    $monevStats = \App\Models\MonevStat::first();
    $monevRegions = \App\Models\MonevRegion::orderBy('urutan', 'asc')->get();
    return view('berita-terkini', compact('recentPosts', 'pengumumans', 'agendas', 'monevStats', 'monevRegions'));
})->name('berita.terkini');

Route::get('/berita/{id}', function ($id) {
    // Try to find in CMS Dikbud (Post Model) first
    $postModel = \App\Models\Post::find($id);
    if ($postModel) {
        $post = $postModel;
    } else {
        $post = \App\Models\PortalNews::findOrFail($id);
        $post->type = ucfirst($post->category);
        if (!$post->created_at) {
            $post->created_at = now();
        }
        if (str_starts_with($post->image, '/storage/')) {
            $post->image = str_replace('/storage/', '', $post->image);
        }
    }
    
    // Fetch sidebar pengumumans from CMS first, fallback to PortalNews if empty
    $cmsPengumuman = \App\Models\Post::where('type', 'Pengumuman')->where('status', 'Published')->orderBy('created_at', 'desc')->take(3)->get();
    if ($cmsPengumuman->isEmpty()) {
        $pengumumans = \App\Models\PortalNews::where('category', 'pengumuman')->orderBy('created_at', 'desc')->take(3)->get()->map(function($n) {
            $n->type = 'Pengumuman';
            if (!$n->created_at) {
                $n->created_at = now();
            }
            return $n;
        });
    } else {
        $pengumumans = $cmsPengumuman;
    }

    $agendas = \App\Models\Agenda::orderBy('date', 'asc')->where('date', '>=', now())->take(3)->get();
    if($agendas->isEmpty()) $agendas = \App\Models\Agenda::orderBy('date', 'desc')->take(3)->get();
    $monevStats = \App\Models\MonevStat::first();
    $monevRegions = \App\Models\MonevRegion::orderBy('urutan', 'asc')->get();
    return view('berita', compact('post', 'pengumumans', 'agendas', 'monevStats', 'monevRegions'));
})->name('berita.show');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/ppid/store', [\App\Http\Controllers\DashboardController::class, 'storePpid'])->name('ppid.store');
Route::post('/pengaduan/store', [\App\Http\Controllers\DashboardController::class, 'storePengaduan'])->name('pengaduan.store');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/berita', [\App\Http\Controllers\DashboardController::class, 'berita'])->name('admin.berita');
    Route::get('/admin/agenda', [\App\Http\Controllers\DashboardController::class, 'agenda'])->name('admin.agenda');
    Route::get('/admin/pengaduan', [\App\Http\Controllers\DashboardController::class, 'pengaduan'])->name('admin.pengaduan');
    Route::get('/admin/ppid', [\App\Http\Controllers\DashboardController::class, 'ppid'])->name('admin.ppid');
    Route::get('/admin/monev', [\App\Http\Controllers\DashboardController::class, 'monev'])->name('admin.monev');
    Route::post('/admin/monev/stats', [\App\Http\Controllers\DashboardController::class, 'updateMonevStats'])->name('admin.monev.stats');
    Route::post('/admin/monev/region/store', [\App\Http\Controllers\DashboardController::class, 'storeMonevRegion'])->name('admin.monev.region.store');
    Route::put('/admin/monev/region/{id}', [\App\Http\Controllers\DashboardController::class, 'updateMonevRegion'])->name('admin.monev.region.update');
    Route::delete('/admin/monev/region/{id}', [\App\Http\Controllers\DashboardController::class, 'destroyMonevRegion'])->name('admin.monev.region.destroy');
    Route::post('/admin/berita/store', [\App\Http\Controllers\DashboardController::class, 'storeBerita'])->name('admin.berita.store');
    Route::put('/admin/berita/{id}', [\App\Http\Controllers\DashboardController::class, 'updateBerita'])->name('admin.berita.update');
    Route::delete('/admin/berita/{id}', [\App\Http\Controllers\DashboardController::class, 'destroyBerita'])->name('admin.berita.destroy');
    Route::post('/admin/agenda/store', [\App\Http\Controllers\DashboardController::class, 'storeAgenda'])->name('admin.agenda.store');
    Route::put('/admin/agenda/{id}', [\App\Http\Controllers\DashboardController::class, 'updateAgenda'])->name('admin.agenda.update');
    Route::delete('/admin/agenda/{id}', [\App\Http\Controllers\DashboardController::class, 'destroyAgenda'])->name('admin.agenda.destroy');
    Route::put('/admin/pengaduan/{id}/status', [\App\Http\Controllers\DashboardController::class, 'updatePengaduanStatus'])->name('admin.pengaduan.status');
    Route::delete('/admin/pengaduan/{id}', [\App\Http\Controllers\DashboardController::class, 'destroyPengaduan'])->name('admin.pengaduan.destroy');
    Route::get('/admin/slider', [\App\Http\Controllers\DashboardController::class, 'slider'])->name('admin.slider');
    Route::post('/admin/slider/store', [\App\Http\Controllers\DashboardController::class, 'storeSlide'])->name('admin.slider.store');
    Route::put('/admin/slider/{id}', [\App\Http\Controllers\DashboardController::class, 'updateSlide'])->name('admin.slider.update');
    Route::delete('/admin/slider/{id}', [\App\Http\Controllers\DashboardController::class, 'destroySlide'])->name('admin.slider.destroy');
    Route::get('/admin/hero', [\App\Http\Controllers\DashboardController::class, 'hero'])->name('admin.hero');
    Route::post('/admin/hero/update', [\App\Http\Controllers\DashboardController::class, 'updateHero'])->name('admin.hero.update');
    Route::get('/admin/program-unggulan', [\App\Http\Controllers\DashboardController::class, 'programUnggulan'])->name('admin.program.unggulan');
    Route::post('/admin/program-unggulan/store', [\App\Http\Controllers\DashboardController::class, 'storeProgramUnggulan'])->name('admin.program.unggulan.store');
    Route::put('/admin/program-unggulan/{id}', [\App\Http\Controllers\DashboardController::class, 'updateProgramUnggulan'])->name('admin.program.unggulan.update');
    Route::delete('/admin/program-unggulan/{id}', [\App\Http\Controllers\DashboardController::class, 'destroyProgramUnggulan'])->name('admin.program.unggulan.destroy');
    Route::get('/admin/dokumen-peraturan', [\App\Http\Controllers\DashboardController::class, 'dokumenPeraturan'])->name('admin.dokumen.peraturan');
    Route::post('/admin/dokumen-peraturan/store', [\App\Http\Controllers\DashboardController::class, 'storeDokumenPeraturan'])->name('admin.dokumen.peraturan.store');
    Route::put('/admin/dokumen-peraturan/{id}', [\App\Http\Controllers\DashboardController::class, 'updateDokumenPeraturan'])->name('admin.dokumen.peraturan.update');
    Route::delete('/admin/dokumen-peraturan/{id}', [\App\Http\Controllers\DashboardController::class, 'destroyDokumenPeraturan'])->name('admin.dokumen.peraturan.destroy');
    Route::get('/admin/transparansi-poster', [\App\Http\Controllers\DashboardController::class, 'transparansiPosters'])->name('admin.transparansi.posters');
    Route::post('/admin/transparansi-poster/store', [\App\Http\Controllers\DashboardController::class, 'storeTransparansiPoster'])->name('admin.transparansi.posters.store');
    Route::put('/admin/transparansi-poster/{id}', [\App\Http\Controllers\DashboardController::class, 'updateTransparansiPoster'])->name('admin.transparansi.posters.update');
    Route::delete('/admin/transparansi-poster/{id}', [\App\Http\Controllers\DashboardController::class, 'destroyTransparansiPoster'])->name('admin.transparansi.posters.destroy');
    Route::get('/admin/galeri', [\App\Http\Controllers\DashboardController::class, 'galeri'])->name('admin.galeri');
    Route::post('/admin/galeri/store', [\App\Http\Controllers\DashboardController::class, 'storeGaleri'])->name('admin.galeri.store');
    Route::put('/admin/galeri/{id}', [\App\Http\Controllers\DashboardController::class, 'updateGaleri'])->name('admin.galeri.update');
    Route::delete('/admin/galeri/{id}', [\App\Http\Controllers\DashboardController::class, 'destroyGaleri'])->name('admin.galeri.destroy');
    Route::get('/admin/sosmed', [\App\Http\Controllers\DashboardController::class, 'sosmed'])->name('admin.sosmed');
    Route::get('/admin/layanan', [\App\Http\Controllers\DashboardController::class, 'layanan'])->name('admin.layanan');
    Route::post('/admin/layanan/store', [\App\Http\Controllers\DashboardController::class, 'storeLayanan'])->name('admin.layanan.store');
    Route::put('/admin/layanan/{id}', [\App\Http\Controllers\DashboardController::class, 'updateLayanan'])->name('admin.layanan.update');
    Route::delete('/admin/layanan/{id}', [\App\Http\Controllers\DashboardController::class, 'destroyLayanan'])->name('admin.layanan.destroy');

    Route::post('/admin/sosmed/store', [\App\Http\Controllers\DashboardController::class, 'storeSosmed'])->name('admin.sosmed.store');
    Route::put('/admin/sosmed/{id}', [\App\Http\Controllers\DashboardController::class, 'updateSosmed'])->name('admin.sosmed.update');
    Route::delete('/admin/sosmed/{id}', [\App\Http\Controllers\DashboardController::class, 'destroySosmed'])->name('admin.sosmed.destroy');
    Route::get('/admin/portal', [\App\Http\Controllers\DashboardController::class, 'portal'])->name('admin.portal');
    Route::post('/admin/portal/news/store', [\App\Http\Controllers\DashboardController::class, 'storePortalNews'])->name('admin.portal.news.store');
    Route::put('/admin/portal/news/{id}', [\App\Http\Controllers\DashboardController::class, 'updatePortalNews'])->name('admin.portal.news.update');
    Route::delete('/admin/portal/news/{id}', [\App\Http\Controllers\DashboardController::class, 'destroyPortalNews'])->name('admin.portal.news.destroy');
    Route::post('/admin/portal/culture/store', [\App\Http\Controllers\DashboardController::class, 'storePortalCulture'])->name('admin.portal.culture.store');
    Route::put('/admin/portal/culture/{id}', [\App\Http\Controllers\DashboardController::class, 'updatePortalCulture'])->name('admin.portal.culture.update');
    Route::delete('/admin/portal/culture/{id}', [\App\Http\Controllers\DashboardController::class, 'destroyPortalCulture'])->name('admin.portal.culture.destroy');
    Route::put('/admin/ppid/{id}/status', [\App\Http\Controllers\DashboardController::class, 'updatePpidStatus'])->name('admin.ppid.status');
    Route::delete('/admin/ppid/{id}', [\App\Http\Controllers\DashboardController::class, 'destroyPpid'])->name('admin.ppid.destroy');

    // Profil Instansi (Visi-Misi, Tugas-Fungsi, Struktur-Organisasi)
    Route::get('/admin/profil', [\App\Http\Controllers\DashboardController::class, 'profil'])->name('admin.profil');
    Route::get('/admin/visi-misi', [\App\Http\Controllers\DashboardController::class, 'visiMisi'])->name('admin.visi_misi');
    Route::get('/admin/tugas-fungsi', [\App\Http\Controllers\DashboardController::class, 'tugasFungsi'])->name('admin.tugas_fungsi');
    Route::get('/admin/struktur-organisasi', [\App\Http\Controllers\DashboardController::class, 'strukturOrganisasi'])->name('admin.struktur_organisasi');

    Route::post('/admin/profil/visi-misi/update', [\App\Http\Controllers\DashboardController::class, 'updateVisiMisi'])->name('admin.visi_misi.update');
    Route::delete('/admin/profil/visi-misi/delete-file', [\App\Http\Controllers\DashboardController::class, 'deleteFileVisiMisi'])->name('admin.visi_misi.delete_file');

    Route::post('/admin/profil/tugas-fungsi/update', [\App\Http\Controllers\DashboardController::class, 'updateTugasFungsi'])->name('admin.tugas_fungsi.update');
    Route::delete('/admin/profil/tugas-fungsi/delete-file', [\App\Http\Controllers\DashboardController::class, 'deleteFileTugasFungsi'])->name('admin.tugas_fungsi.delete_file');
    Route::delete('/admin/profil/tugas-fungsi/delete-image', [\App\Http\Controllers\DashboardController::class, 'deleteImageTugasFungsi'])->name('admin.tugas_fungsi.delete_image');

    Route::post('/admin/profil/struktur-organisasi/update', [\App\Http\Controllers\DashboardController::class, 'updateStrukturOrganisasi'])->name('admin.struktur_organisasi.update');
    Route::delete('/admin/profil/struktur-organisasi/delete-file', [\App\Http\Controllers\DashboardController::class, 'deleteFileStrukturOrganisasi'])->name('admin.struktur_organisasi.delete_file');
    Route::delete('/admin/profil/struktur-organisasi/delete-bagan', [\App\Http\Controllers\DashboardController::class, 'deleteBaganStrukturOrganisasi'])->name('admin.struktur_organisasi.delete_bagan');

    // SOP 14 Komponen & Pengajuan Berkas Layanan
    Route::get('/admin/sop', [\App\Http\Controllers\DashboardController::class, 'sopIndex'])->name('admin.sop');
    Route::post('/admin/sop/upload-master', [\App\Http\Controllers\DashboardController::class, 'uploadMasterSop'])->name('admin.sop.upload_master');
    Route::delete('/admin/sop/delete-master/{id}', [\App\Http\Controllers\DashboardController::class, 'deleteMasterSop'])->name('admin.sop.delete_master');
    Route::put('/admin/sop/submission/{id}/status', [\App\Http\Controllers\DashboardController::class, 'updateSopSubmissionStatus'])->name('admin.sop.submission.status');
    Route::delete('/admin/sop/submission/{id}', [\App\Http\Controllers\DashboardController::class, 'destroySopSubmission'])->name('admin.sop.submission.destroy');

    // Banner Infografis & Foto Iklan
    Route::get('/admin/banner-iklan', [\App\Http\Controllers\DashboardController::class, 'bannerIklan'])->name('admin.banner_iklan');
    Route::post('/admin/banner-iklan/store', [\App\Http\Controllers\DashboardController::class, 'storeBannerIklan'])->name('admin.banner_iklan.store');
    Route::put('/admin/banner-iklan/{id}', [\App\Http\Controllers\DashboardController::class, 'updateBannerIklan'])->name('admin.banner_iklan.update');
    Route::delete('/admin/banner-iklan/{id}', [\App\Http\Controllers\DashboardController::class, 'destroyBannerIklan'])->name('admin.banner_iklan.destroy');
});





Route::get('/anggaran', [\App\Http\Controllers\AnggaranController::class, 'index'])->name('anggaran');

// API untuk Anggaran SPA (Protected by custom API password)
Route::middleware(['anggaran.api'])->group(function () {
    Route::post('/admin/anggaran/store', [\App\Http\Controllers\AnggaranController::class, 'store'])->name('admin.anggaran.store');
    Route::delete('/admin/anggaran/{kode}', [\App\Http\Controllers\AnggaranController::class, 'destroy'])->name('admin.anggaran.destroy');
    Route::post('/admin/anggaran/reset', [\App\Http\Controllers\AnggaranController::class, 'reset'])->name('admin.anggaran.reset');
});


Route::get('/portal-resmi', [\App\Http\Controllers\PortalController::class, 'index'])->name('portal-resmi');

// Portal Admin APIs
Route::middleware(['anggaran.api'])->group(function () {
    Route::post('/api/portal/news', [\App\Http\Controllers\PortalController::class, 'storeNews']);
    Route::delete('/api/portal/news/{id}', [\App\Http\Controllers\PortalController::class, 'destroyNews']);
    Route::post('/api/portal/culture', [\App\Http\Controllers\PortalController::class, 'storeCulture']);
    Route::delete('/api/portal/culture/{id}', [\App\Http\Controllers\PortalController::class, 'destroyCulture']);
});












