<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Layanan Bidang Kebudayaan - Dinas Pendidikan dan Kebudayaan Provinsi Maluku</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- React & ReactDOM CDN -->
    <script src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>
    <!-- Babel for JSX -->
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        navy: {
                            700: '#1d2b45',
                            800: '#0f1e36',
                            900: '#0a1428',
                            950: '#050a17',
                        },
                        gold: {
                            300: '#fde047',
                            400: '#facc15',
                            500: '#eab308',
                            600: '#ca8a04',
                            700: '#a16207',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #ffffff;
            color: #0f172a;
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        .gold-gradient-text {
            background: linear-gradient(135deg, #FFE082 0%, #E6C200 50%, #B38F00 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .gold-border-glow {
            box-shadow: 0 0 15px rgba(234, 179, 8, 0.15);
        }
    </style>
</head>
<body class="bg-white min-h-screen antialiased">
    <div id="root"></div>

    <script type="text/babel">
        const { useState, useEffect, useMemo, useRef } = React;

        const BUDAYA_SERVICES = [
            {
                id: 1,
                code: "BDY-01",
                title: "Rekomendasi Penetapan Cagar Budaya Peringkat Provinsi",
                category: "Cagar Budaya & Permuseuman",
                legal: [
                    "Undang-Undang Nomor 11 Tahun 2010 tentang Cagar Budaya",
                    "Peraturan Pemerintah Nomor 1 Tahun 2022 tentang Museum",
                    "Peraturan Menteri Pendidikan dan Kebudayaan Nomor 1 Tahun 2015 tentang Tim Ahli Cagar Budaya dan Cagar Budaya",
                    "Peraturan Menteri Pendidikan dan Kebudayaan Nomor 106 Tahun 2014 tentang Sensus Cagar Budaya",
                    "Peraturan Daerah / Peraturan Gubernur Setempat tentang Pelestarian dan Pengelolaan Cagar Budaya di Wilayah Provinsi"
                ],
                requirements: [
                    "Surat permohonan penetapan cagar budaya",
                    "Deskripsi dan dokumentasi awal objek yang diusulkan",
                    "Data kepemilikan/pengelolaan objek"
                ],
                procedure: [
                    "Pemohon mengajukan usulan penetapan cagar budaya kepada Dinas Pendidikan dan Kebudayaan Provinsi Maluku",
                    "Staf Bidang Kebudayaan memverifikasi kelengkapan berkas dan menjadwalkan kajian Tim Ahli Cagar Budaya (TACB)",
                    "Staf mengoordinasikan kajian lapangan bersama TACB",
                    "Kepala Bidang Kebudayaan menyusun konsep surat rekomendasi berdasarkan hasil kajian TACB",
                    "Kepala Dinas menandatangani surat rekomendasi penetapan cagar budaya",
                    "Staf menyampaikan surat rekomendasi kepada pemohon dan instansi penetapan berwenang serta meregistrasikan data pada Sistem Registrasi Nasional Cagar Budaya (SRNCB)"
                ],
                sla: "Paling lama 19 (sembilan belas) hari kerja sejak berkas dinyatakan lengkap",
                slaDays: 19,
                cost: "Tidak dikenakan biaya (GRATIS)",
                product: "Surat rekomendasi penetapan cagar budaya yang ditandatangani Kepala Dinas dan diterima pemohon/instansi penetapan berwenang untuk diproses lebih lanjut",
                complaintChannel: "Melalui konsultasi langsung di kantor Dinas Pendidikan dan Kebudayaan Provinsi Maluku / Layanan Pengaduan Elektronik: https://disdikbud.malukuprov.go.id/pengaduan / Website: https://disdikbud.malukuprov.go.id/ / SP4N-LAPOR! / Media Sosial (Tiktok Dinas Pendidikan dan Kebudayaan Prov. Maluku)",
                facilities: ["Alat tulis kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi, dan menggunakan komputer.",
                internalSupervision: "Atasan langsung",
                executors: 1,
                guarantee: "1. Bersifat rahasia (data informasi pengguna layanan dijamin keamanannya dan digunakan semata-mata hanya untuk kepentingan pelayanan); 2. Melayani secara profesional sesuai dengan standar pelayanan yang berlaku; 3. Sarana pelayanan dan sarana penunjang layanan menjamin/mendukung keamanan, kenyamanan, dan keselamatan pengguna layanan.",
                evaluation: "1. Dilakukan survei kepuasan masyarakat/pegawai (SKM); 2. Dilakukan evaluasi pelayanan baik secara berkala maupun apabila diperlukan sewaktu-waktu."
            },
            {
                id: 2,
                code: "BDY-02",
                title: "Izin Pembawaan Cagar Budaya Keluar Daerah Provinsi",
                category: "Cagar Budaya & Permuseuman",
                legal: [
                    "Undang-undang Nomor 11 Tahun 2010 tentang Cagar Budaya"
                ],
                requirements: [
                    "Surat permohonan izin pembawaan cagar budaya keluar daerah",
                    "Data registrasi objek cagar budaya",
                    "Rencana pengamanan dan jadwal pembawaan objek"
                ],
                procedure: [
                    "Pemohon mengajukan permohonan izin pembawaan cagar budaya keluar daerah",
                    "Staf Bidang Kebudayaan memverifikasi status registrasi objek dan kelengkapan berkas",
                    "Staf mengoordinasikan kajian kelayakan bersama Tim Ahli Cagar Budaya (TACB)",
                    "Kepala Bidang Kebudayaan menyusun konsep surat izin pembawaan cagar budaya",
                    "Kepala Dinas menandatangani surat izin pembawaan cagar budaya keluar daerah",
                    "Staf menyampaikan surat izin kepada pemohon dan instansi terkait serta memutakhirkan data mutasi objek pada Sistem Registrasi Nasional Cagar Budaya (SRNCB)"
                ],
                sla: "Paling lama 13 (tiga belas) hari kerja sejak berkas dinyatakan lengkap",
                slaDays: 13,
                cost: "Tidak dikenakan biaya (GRATIS)",
                product: "Surat izin pembawaan cagar budaya keluar daerah yang ditandatangani Kepala Dinas dan diterima pemohon untuk diproses lebih lanjut",
                complaintChannel: "Melalui konsultasi langsung di kantor Dinas Pendidikan dan Kebudayaan Provinsi Maluku / Layanan Pengaduan Elektronik: https://disdikbud.malukuprov.go.id/pengaduan / Website: https://disdikbud.malukuprov.go.id/ / SP4N-LAPOR! / Media Sosial (Tiktok Dinas Pendidikan dan Kebudayaan Prov. Maluku)",
                facilities: ["Alat tulis kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi, dan menggunakan komputer.",
                internalSupervision: "Atasan langsung",
                executors: 4,
                guarantee: "1. Bersifat rahasia (data informasi pengguna layanan dijamin keamanannya dan digunakan semata-mata hanya untuk kepentingan pelayanan); 2. Melayani secara profesional sesuai dengan standar pelayanan yang berlaku; 3. Sarana pelayanan dan sarana penunjang layanan menjamin/mendukung keamanan, kenyamanan, dan keselamatan pengguna layanan.",
                evaluation: "1. Dilakukan survei kepuasan masyarakat/pegawai (SKM); 2. Dilakukan evaluasi pelayanan baik secara berkala maupun apabila diperlukan sewaktu-waktu."
            },
            {
                id: 3,
                code: "BDY-03",
                title: "Pencatatan Warisan Budaya Tak Benda (WBTB) Provinsi",
                category: "Warisan Budaya Takbenda",
                legal: [
                    "Undang-Undang Nomor 5 Tahun 2017 tentang Pemajuan Kebudayaan",
                    "Peraturan Pemerintah Nomor 87 Tahun 2021 tentang Peraturan Pelaksanaan Undang-Undang Nomor 5 Tahun 2017 tentang Pemajuan Kebudayaan",
                    "Peraturan Menteri Pendidikan dan Kebudayaan Nomor 106 Tahun 2013 tentang Warisan Budaya Takbenda Indonesia",
                    "Keputusan Menteri Pendidikan, Kebudayaan, Riset, dan Teknologi Nomor 315/M/2023 tentang Penetapan Warisan Budaya Takbenda Indonesia (beserta pembaruannya untuk penetapan tahun berjalan)"
                ],
                requirements: [
                    "Surat usulan pencatatan warisan budaya takbenda",
                    "Deskripsi karya budaya dan dokumentasi audio-visual",
                    "Bukti eksistensi/pewarisan karya budaya"
                ],
                procedure: [
                    "Pemohon mengajukan usulan pencatatan warisan budaya takbenda",
                    "Staf Bidang Kebudayaan memverifikasi kelengkapan berkas dan menjadwalkan kajian tim ahli warisan budaya takbenda",
                    "Staf mengoordinasikan kajian dan verifikasi lapangan bersama tim ahli",
                    "Kepala Bidang Kebudayaan menyusun konsep surat pengantar usulan pencatatan ke Kementerian yang membidangi kebudayaan",
                    "Kepala Dinas menandatangani surat pengantar usulan pencatatan warisan budaya takbenda",
                    "Staf menyampaikan/mengunggah usulan pada sistem Warisan Budaya Takbenda Indonesia (WBTBI) dan menyampaikan tembusan kepada pemohon"
                ],
                sla: "Paling lama 19 (sembilan belas) hari kerja sejak berkas dinyatakan lengkap",
                slaDays: 19,
                cost: "Tidak dikenakan biaya (GRATIS)",
                product: "Surat pengantar usulan pencatatan warisan budaya takbenda yang ditandatangani Kepala Dinas dan tercatat pada sistem Warisan Budaya Takbenda Indonesia (WBTBI)",
                complaintChannel: "Melalui konsultasi langsung di kantor Dinas Pendidikan dan Kebudayaan Provinsi Maluku / Layanan Pengaduan Elektronik: https://disdikbud.malukuprov.go.id/pengaduan / Website: https://disdikbud.malukuprov.go.id/ / SP4N-LAPOR! / Media Sosial (Tiktok Dinas Pendidikan dan Kebudayaan Prov. Maluku)",
                facilities: ["Alat tulis kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi, dan menggunakan komputer.",
                internalSupervision: "Atasan langsung",
                executors: 1,
                guarantee: "1. Bersifat rahasia (data informasi pengguna layanan dijamin keamanannya dan digunakan semata-mata hanya untuk kepentingan pelayanan); 2. Melayani secara profesional sesuai dengan standar pelayanan yang berlaku; 3. Sarana pelayanan dan sarana penunjang layanan menjamin/mendukung keamanan, kenyamanan, dan keselamatan pengguna layanan.",
                evaluation: "1. Dilakukan survei kepuasan masyarakat/pegawai (SKM); 2. Dilakukan evaluasi pelayanan baik secara berkala maupun apabila diperlukan sewaktu-waktu."
            },
            {
                id: 4,
                code: "BDY-04",
                title: "Fasilitasi dan Rekomendasi Event atau Festival Budaya",
                category: "Kesenian & Event",
                legal: [
                    "Undang-Undang Nomor 5 Tahun 2017 tentang Pemajuan Kebudayaan",
                    "Peraturan Pemerintah Nomor 87 Tahun 2021 tentang Peraturan Pelaksanaan Undang-Undang Nomor 5 Tahun 2017 tentang Pemajuan Kebudayaan",
                    "Peraturan Presiden Nomor 114 Tahun 2022 tentang Strategi Kebudayaan",
                    "Peraturan Menteri Pendidikan, Kebudayaan, Riset, dan Teknologi Nomor 38 Tahun 2023 tentang Pedoman Fasilitasi Bidang Kebudayaan"
                ],
                requirements: [
                    "Surat permohonan fasilitasi/rekomendasi event atau festival budaya",
                    "Proposal kegiatan",
                    "Susunan panitia dan rencana anggaran kegiatan"
                ],
                procedure: [
                    "Pemohon mengajukan proposal fasilitasi/rekomendasi event atau festival budaya",
                    "Staf Bidang Kebudayaan memverifikasi kelengkapan proposal dan kesesuaian jadwal",
                    "Staf menelaah kesesuaian kegiatan dengan program pemajuan kebudayaan daerah",
                    "Kepala Bidang Kebudayaan menyusun konsep surat fasilitasi/rekomendasi penyelenggaraan event budaya",
                    "Kepala Dinas menandatangani surat fasilitasi/rekomendasi event atau festival budaya",
                    "Staf menyampaikan surat fasilitasi/rekomendasi kepada pemohon dan memutakhirkan kalender event budaya daerah"
                ],
                sla: "Paling lama 10 (sepuluh) hari kerja sejak berkas dinyatakan lengkap",
                slaDays: 10,
                cost: "Tidak dikenakan biaya (GRATIS)",
                product: "Surat fasilitasi/rekomendasi event atau festival budaya yang ditandatangani Kepala Dinas dan diterima pemohon untuk pelaksanaan kegiatan",
                complaintChannel: "Melalui konsultasi langsung di kantor Dinas Pendidikan dan Kebudayaan Provinsi Maluku / Layanan Pengaduan Elektronik: https://disdikbud.malukuprov.go.id/pengaduan / Website: https://disdikbud.malukuprov.go.id/ / SP4N-LAPOR! / Media Sosial (Tiktok Dinas Pendidikan dan Kebudayaan Prov. Maluku)",
                facilities: ["Alat tulis kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi, dan menggunakan komputer.",
                internalSupervision: "Atasan langsung",
                executors: 1,
                guarantee: "1. Bersifat rahasia (data informasi pengguna layanan dijamin keamanannya dan digunakan semata-mata hanya untuk kepentingan pelayanan); 2. Melayani secara profesional sesuai dengan standar pelayanan yang berlaku; 3. Sarana pelayanan dan sarana penunjang layanan menjamin/mendukung keamanan, kenyamanan, dan keselamatan pengguna layanan.",
                evaluation: "1. Dilakukan survei kepuasan masyarakat/pegawai (SKM); 2. Dilakukan evaluasi pelayanan baik secara berkala maupun apabila diperlukan sewaktu-waktu."
            },
            {
                id: 5,
                code: "BDY-05",
                title: "Rekomendasi Izin Penelitian Cagar Budaya dan Kebudayaan",
                category: "Cagar Budaya & Permuseuman",
                legal: [
                    "Peraturan Pemerintah Nomor 1 Tahun 2022 Tentang Register Nasional dan Pelestarian Cagar Budaya",
                    "Peraturan Menteri Pendidikan, Kebudayaan, Riset, dan Teknologi Nomor 36 Tahun 2023 tentang Penyelenggaraan Register Nasional Cagar Budaya"
                ],
                requirements: [
                    "Surat permohonan rekomendasi izin penelitian",
                    "Proposal penelitian",
                    "Surat pengantar lembaga/institusi asal peneliti"
                ],
                procedure: [
                    "Pemohon mengajukan permohonan rekomendasi izin penelitian dengan melampirkan proposal penelitian",
                    "Staf Bidang Kebudayaan memverifikasi kelengkapan berkas dan kesesuaian objek penelitian",
                    "Staf menelaah kesesuaian objek dan metodologi penelitian dengan ketentuan pelestarian",
                    "Kepala Bidang Kebudayaan menyusun konsep surat rekomendasi izin penelitian",
                    "Kepala Dinas menandatangani surat rekomendasi izin penelitian",
                    "Staf menyampaikan surat rekomendasi kepada pemohon dan menindaklanjuti penerimaan salinan hasil penelitian"
                ],
                sla: "Paling lama 10 (sepuluh) hari kerja sejak berkas dinyatakan lengkap",
                slaDays: 10,
                cost: "Tidak dikenakan biaya (GRATIS)",
                product: "Surat rekomendasi izin penelitian cagar budaya/kebudayaan yang ditandatangani Kepala Dinas dan diterima pemohon untuk diproses lebih lanjut",
                complaintChannel: "Melalui konsultasi langsung di kantor Dinas Pendidikan dan Kebudayaan Provinsi Maluku / Layanan Pengaduan Elektronik: https://disdikbud.malukuprov.go.id/pengaduan / Website: https://disdikbud.malukuprov.go.id/ / SP4N-LAPOR! / Media Sosial (Tiktok Dinas Pendidikan dan Kebudayaan Prov. Maluku)",
                facilities: ["Alat tulis kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi, dan menggunakan komputer.",
                internalSupervision: "Atasan langsung",
                executors: 2,
                guarantee: "1. Bersifat rahasia (data informasi pengguna layanan dijamin keamanannya dan digunakan semata-mata hanya untuk kepentingan pelayanan); 2. Melayani secara profesional sesuai dengan standar pelayanan yang berlaku; 3. Sarana pelayanan dan sarana penunjang layanan menjamin/mendukung keamanan, kenyamanan, dan keselamatan pengguna layanan.",
                evaluation: "1. Dilakukan survei kepuasan masyarakat/pegawai (SKM); 2. Dilakukan evaluasi pelayanan baik secara berkala maupun apabila diperlukan sewaktu-waktu."
            },
            {
                id: 6,
                code: "BDY-06",
                title: "Pembinaan dan Registrasi Komunitas/Lembaga Adat serta Sanggar Seni",
                category: "Komunitas & Lembaga Adat",
                legal: [
                    "Peraturan Menteri dalam Negeri Nomor 18 Tahun 2018 Tentang Lembaga Kemasyarakatan Desa dan Lembaga Adat Desa",
                    "Peraturan Menteri Kebudayaan dan Pariwisata Nomor 21 Tahun 2015 Tentang Standar Usaha Sanggar Seni"
                ],
                requirements: [
                    "Surat permohonan registrasi/pembinaan",
                    "Profil dan susunan pengurus komunitas/lembaga adat/sanggar seni",
                    "Dokumentasi kegiatan yang telah dilaksanakan"
                ],
                procedure: [
                    "Pemohon mengajukan permohonan registrasi/pembinaan komunitas, lembaga adat, atau sanggar seni",
                    "Staf Bidang Kebudayaan memverifikasi kelengkapan administrasi dan legalitas komunitas",
                    "Staf melakukan verifikasi lapangan atas eksistensi dan kegiatan komunitas/sanggar",
                    "Kepala Bidang Kebudayaan menyusun konsep surat/piagam registrasi dan pembinaan",
                    "Kepala Dinas menandatangani surat/piagam registrasi komunitas, lembaga adat, atau sanggar seni",
                    "Staf menyampaikan surat/piagam registrasi kepada pemohon dan memutakhirkan basis data komunitas, lembaga adat, dan sanggar seni daerah"
                ],
                sla: "Paling lama 12 (dua belas) hari kerja sejak berkas dinyatakan lengkap",
                slaDays: 12,
                cost: "Tidak dikenakan biaya (GRATIS)",
                product: "Surat/piagam registrasi komunitas, lembaga adat, atau sanggar seni yang ditandatangani Kepala Dinas dan diterima pemohon",
                complaintChannel: "Melalui konsultasi langsung di kantor Dinas Pendidikan dan Kebudayaan Provinsi Maluku / Layanan Pengaduan Elektronik: https://disdikbud.malukuprov.go.id/pengaduan / Website: https://disdikbud.malukuprov.go.id/ / SP4N-LAPOR! / Media Sosial (Tiktok Dinas Pendidikan dan Kebudayaan Prov. Maluku)",
                facilities: ["Alat tulis kantor", "Komputer", "Printer"],
                competency: "Memiliki kemampuan berkomunikasi, dan menggunakan komputer.",
                internalSupervision: "Atasan langsung",
                executors: 2,
                guarantee: "1. Bersifat rahasia (data informasi pengguna layanan dijamin keamanannya dan digunakan semata-mata hanya untuk kepentingan pelayanan); 2. Melayani secara profesional sesuai dengan standar pelayanan yang berlaku; 3. Sarana pelayanan dan sarana penunjang layanan menjamin/mendukung keamanan, kenyamanan, dan keselamatan pengguna layanan.",
                evaluation: "1. Dilakukan survei kepuasan masyarakat/pegawai (SKM); 2. Dilakukan evaluasi pelayanan baik secara berkala maupun apabila diperlukan sewaktu-waktu."
            }
        ];

        const DB_SOP_LIST = @json($sopList ?? []);

        function App() {
            const [selectedServiceModal, setSelectedServiceModal] = useState(null);
            const [selectedCardMonev, setSelectedCardMonev] = useState(null);
            const [searchQuery, setSearchQuery] = useState("");
            const [activeCategory, setActiveCategory] = useState("ALL");

            // SOP Upload state
            const [uploadForm, setUploadForm] = useState({
                sender_name: "",
                phone: "",
                email: "",
                instance: "",
                notes: ""
            });
            const [uploadFile, setUploadFile] = useState(null);
            const [isUploading, setIsUploading] = useState(false);
            const [uploadSuccess, setUploadSuccess] = useState(null);
            const [uploadError, setUploadError] = useState(null);
            const fileInputRef = useRef(null);

            useEffect(() => {
                if (selectedServiceModal) {
                    setUploadSuccess(null);
                    setUploadError(null);
                    setUploadFile(null);
                    if (fileInputRef.current) fileInputRef.current.value = "";
                }
            }, [selectedServiceModal]);

            const handleFileChange = (e) => {
                if (e.target.files && e.target.files[0]) {
                    setUploadFile(e.target.files[0]);
                }
            };

            const handleUploadSubmit = async (e) => {
                e.preventDefault();
                if (!uploadFile) {
                    setUploadError("Silakan pilih file berkas terlebih dahulu.");
                    return;
                }
                if (!uploadForm.sender_name.trim()) {
                    setUploadError("Nama pemohon/pengusul wajib diisi.");
                    return;
                }
                setIsUploading(true);
                setUploadError(null);
                setUploadSuccess(null);

                try {
                    const formData = new FormData();
                    formData.append('_token', '{{ csrf_token() }}');
                    formData.append('service_code', selectedServiceModal.code);
                    formData.append('service_title', selectedServiceModal.title);
                    formData.append('bidang', 'kebudayaan');
                    formData.append('sender_name', uploadForm.sender_name);
                    formData.append('phone', uploadForm.phone || '');
                    formData.append('email', uploadForm.email || '');
                    formData.append('instance', uploadForm.instance || '');
                    formData.append('notes', uploadForm.notes || '');
                    formData.append('document_file', uploadFile);

                    const response = await fetch('/layanan/sop/upload', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                        body: formData
                    });

                    const resData = await response.json();
                    if (response.ok && resData.success) {
                        setUploadSuccess(resData.message || 'Berkas permohonan berhasil dikirim!');
                        setUploadForm({
                            sender_name: "",
                            phone: "",
                            email: "",
                            instance: "",
                            notes: ""
                        });
                        setUploadFile(null);
                        if (fileInputRef.current) fileInputRef.current.value = "";
                    } else {
                        const errs = resData.errors ? Object.values(resData.errors).flat().join(", ") : (resData.message || "Gagal mengunggah berkas");
                        setUploadError(errs);
                    }
                } catch (err) {
                    console.error(err);
                    setUploadError("Terjadi kesalahan jaringan saat mengunggah berkas.");
                } finally {
                    setIsUploading(false);
                }
            };

            const chartLineRef = useRef(null);
            const chartBarRef = useRef(null);
            const lineInstance = useRef(null);
            const barInstance = useRef(null);

            // Filtered Services List
            const filteredServices = useMemo(() => {
                return BUDAYA_SERVICES.filter(service => {
                    const matchesCategory = activeCategory === "ALL" || service.category === activeCategory;
                    const matchesQuery = searchQuery === "" ||
                        service.title.toLowerCase().includes(searchQuery.toLowerCase()) ||
                        service.code.toLowerCase().includes(searchQuery.toLowerCase()) ||
                        service.requirements.some(r => r.toLowerCase().includes(searchQuery.toLowerCase()));
                    return matchesCategory && matchesQuery;
                });
            }, [activeCategory, searchQuery]);

            // Unique Categories
            const categories = useMemo(() => {
                const set = new Set(BUDAYA_SERVICES.map(s => s.category));
                return ["ALL", ...Array.from(set)];
            }, []);

            useEffect(() => {
                if (lineInstance.current) lineInstance.current.destroy();
                if (barInstance.current) barInstance.current.destroy();

                // 1. Line Chart: Tren Rating Produk Layanan Kebudayaan
                if (chartLineRef.current) {
                    const ctxLine = chartLineRef.current.getContext('2d');
                    lineInstance.current = new Chart(ctxLine, {
                        type: 'line',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
                            datasets: [{
                                label: 'Indeks Kepuasan Layanan Kebudayaan (Skala 4.00)',
                                data: [3.82, 3.86, 3.89, 3.91, 3.93, 3.95, 3.96, 3.97, 3.98, 3.99, 3.99, 4.00],
                                borderColor: '#eab308',
                                backgroundColor: 'rgba(234, 179, 8, 0.12)',
                                fill: true,
                                tension: 0.35,
                                borderWidth: 3,
                                pointBackgroundColor: '#0f1e36',
                                pointBorderColor: '#eab308',
                                pointRadius: 5,
                                pointHoverRadius: 7
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    labels: {
                                        font: { family: 'Plus Jakarta Sans', size: 12, weight: 'bold' },
                                        color: '#0f172a'
                                    }
                                },
                                tooltip: {
                                    callbacks: {
                                        label: (context) => ` Skor SKM: ${context.parsed.y} / 4.00 (Sangat Baik)`
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    min: 3.5,
                                    max: 4.0,
                                    ticks: { color: '#64748b' },
                                    grid: { color: '#e2e8f0' }
                                },
                                x: {
                                    ticks: { color: '#64748b' },
                                    grid: { display: false }
                                }
                            }
                        }
                    });
                }

                // 2. Bar Chart: Top Produk Layanan Kebudayaan
                if (chartBarRef.current) {
                    const ctxBar = chartBarRef.current.getContext('2d');
                    barInstance.current = new Chart(ctxBar, {
                        type: 'bar',
                        data: {
                            labels: ['Komunitas & Sanggar', 'Event & Festival', 'Pencatatan WBTB', 'Cagar Budaya', 'Izin Penelitian', 'Izin Pembawaan'],
                            datasets: [{
                                label: 'Volume Layanan Terproses Tepat Waktu (SLA 100%)',
                                data: [520, 380, 290, 160, 140, 85],
                                backgroundColor: [
                                    '#0f1e36', '#1d2b45', '#0284c7', '#ca8a04', '#059669', '#d97706'
                                ],
                                borderRadius: 6
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { display: false }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: { color: '#64748b' },
                                    grid: { color: '#f1f5f9' }
                                },
                                x: {
                                    ticks: { color: '#475569', font: { family: 'Plus Jakarta Sans', size: 10, weight: '600' } },
                                    grid: { display: false }
                                }
                            }
                        }
                    });
                }

                return () => {
                    if (lineInstance.current) lineInstance.current.destroy();
                    if (barInstance.current) barInstance.current.destroy();
                };
            }, []);

            return (
                <div className="min-h-screen flex flex-col bg-white">
                    {/* Upper Header Bar - Government Identifier */}
                    <nav className="bg-navy-900 border-b border-navy-800 text-white sticky top-0 z-30 shadow-md">
                        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex flex-col sm:flex-row items-center justify-between gap-2">
                            <div className="flex items-center gap-3">
                                <div className="h-3 w-3 rounded-full bg-gold-400 animate-pulse"></div>
                                <span className="text-xs sm:text-sm font-semibold text-slate-200 tracking-wider uppercase">
                                    Dinas Pendidikan dan Kebudayaan Provinsi Maluku
                                </span>
                            </div>
                            <div className="text-xs font-medium text-gold-400 bg-navy-800/80 px-3 py-1 rounded-full border border-gold-500/20">
                                Unit Kerja: Bidang Kebudayaan
                            </div>
                        </div>
                    </nav>

                    {}
                    {/* 1. HALAMAN PEMBUKA (HERO SECTION) - TYPOGRAPHY DRIVEN, TANPA LOGO */}
                    <header className="bg-gradient-to-br from-navy-950 via-navy-900 to-navy-800 text-white py-14 px-4 sm:px-6 lg:px-8 border-b-4 border-gold-500 shadow-xl relative overflow-hidden">
                        <div className="absolute -top-24 -right-24 w-96 h-96 bg-gold-500/10 rounded-full blur-3xl pointer-events-none"></div>
                        <div className="absolute -bottom-24 -left-24 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>

                        <div className="max-w-7xl mx-auto text-center space-y-4 relative z-10">
                            <div className="inline-block">
                                <p className="text-xs sm:text-sm font-extrabold tracking-widest text-gold-400 uppercase bg-navy-800/90 px-4 py-1.5 rounded-full border border-gold-500/30">
                                    Dinas Pendidikan & Kebudayaan Provinsi Maluku
                                </p>
                            </div>
                            
                            <h1 className="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-white max-w-4xl mx-auto leading-tight">
                                Produk Layanan Dinas Pendidikan & Kebudayaan <span className="gold-gradient-text block mt-1">Provinsi Maluku</span>
                            </h1>

                            <p className="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto font-normal leading-relaxed">
                                Unit Kerja: Bidang Kebudayaan - Dinas Pendidikan dan Kebudayaan Provinsi Maluku
                            </p>

                            <div className="pt-2 flex flex-wrap items-center justify-center gap-4 text-xs font-semibold text-slate-300">
                                <span className="flex items-center gap-1.5 bg-navy-800/60 px-3 py-1 rounded-lg border border-slate-700">
                                    <span className="w-2 h-2 rounded-full bg-emerald-400"></span> 100% Bebas Biaya (Rp 0 / GRATIS)
                                </span>
                                <span className="flex items-center gap-1.5 bg-navy-800/60 px-3 py-1 rounded-lg border border-slate-700">
                                    <span className="w-2 h-2 rounded-full bg-gold-400"></span> Kepastian Jangka Waktu (SLA)
                                </span>
                                <span className="flex items-center gap-1.5 bg-navy-800/60 px-3 py-1 rounded-lg border border-slate-700">
                                    <span className="w-2 h-2 rounded-full bg-sky-400"></span> Pemajuan & Pelestarian Kebudayaan
                                </span>
                            </div>
                        </div>
                    </header>

                    {/* MAIN CONTENT AREA */}
                    <main className="flex-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full space-y-12">
                        {}
                        {/* 2. KEGIATAN UTAMA MONEV (CARD SECTION - 3 CARDS GRID FOR BIDANG KEBUDAYAAN) */}
                        <section className="space-y-4">
                            <div className="flex flex-col sm:flex-row items-start sm:items-end justify-between gap-2 border-b border-slate-200 pb-3">
                                <div>
                                    <h2 className="text-xl font-bold text-navy-900 flex items-center gap-2">
                                        <span className="w-2 h-6 bg-gold-500 rounded-full"></span>
                                        Kegiatan Utama Monitoring & Evaluasi (Monev)
                                    </h2>
                                    <p className="text-xs text-slate-500 mt-0.5">
                                        Cakupan pembinaan, pelestarian cagar budaya, pencatatan WBTB, fasilitasi event, dan tata kelola sanggar seni se-Provinsi Maluku
                                    </p>
                                </div>
                                <span className="text-[11px] font-bold text-navy-800 bg-gold-400/20 px-3 py-1 rounded-full border border-gold-500/30">
                                    Unit Kerja: Bidang Kebudayaan
                                </span>
                            </div>

                            <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                                {/* CARD 1: Cagar Budaya & Permuseuman */}
                                <div className="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group relative overflow-hidden">
                                    <div className="absolute top-0 right-0 w-24 h-24 bg-navy-900/5 rounded-bl-full pointer-events-none group-hover:bg-gold-500/10 transition-all"></div>
                                    <div className="space-y-3">
                                        <div className="w-12 h-12 rounded-xl bg-navy-900 text-gold-400 font-extrabold text-xs text-center flex items-center justify-center shadow leading-tight p-1">
                                            CAGAR BUDAYA
                                        </div>
                                        <h3 className="text-base font-bold text-navy-900 group-hover:text-blue-700 transition-colors">
                                            Bidang Kebudayaan
                                        </h3>
                                        <p className="text-xs text-slate-600 leading-relaxed">
                                            Pengawasan rekomendasi penetapan Cagar Budaya peringkat provinsi, perizinan pembawaan keluar daerah, serta pendaftaran kajian penelitian kebudayaan.
                                        </p>
                                        <div className="pt-2 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                                            <span>Monev TACB: <strong>Terkoordinasi</strong></span>
                                            <span>Database: <strong>SRNCB</strong></span>
                                        </div>
                                    </div>
                                    <button 
                                        onClick={() => setSelectedCardMonev({
                                            title: "Bidang Kebudayaan - Pelestarian Cagar Budaya",
                                            scope: "Pengelolaan & Perlindungan Cagar Budaya Peringkat Provinsi",
                                            details: [
                                                "Monitoring verifikasi faktual kajian Tim Ahli Cagar Budaya (TACB) provinsi (SLA 19 Hari).",
                                                "Verifikasi dokumen kelayakan izin pembawaan cagar budaya keluar daerah (SLA 13 Hari).",
                                                "Penerbitan rekomendasi izin penelitian cagar budaya & kebudayaan bagi akademisi dan lembaga (SLA 10 Hari).",
                                                "Pemutakhiran status registrasi cagar budaya daerah pada Sistem Registrasi Nasional Cagar Budaya (SRNCB)."
                                            ]
                                        })}
                                        className="mt-6 w-full py-2.5 bg-navy-900 hover:bg-navy-800 text-gold-400 font-bold text-xs rounded-xl shadow transition-all flex items-center justify-center gap-2 border border-gold-500/30"
                                    >
                                        <span>Detail Laporan</span>
                                        <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </button>
                                </div>

                                {/* CARD 2: Warisan Budaya Takbenda & Kesenian */}
                                <div className="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group relative overflow-hidden">
                                    <div className="absolute top-0 right-0 w-24 h-24 bg-navy-900/5 rounded-bl-full pointer-events-none group-hover:bg-gold-500/10 transition-all"></div>
                                    <div className="space-y-3">
                                        <div className="w-12 h-12 rounded-xl bg-navy-900 text-gold-400 font-extrabold text-xs text-center flex items-center justify-center shadow leading-tight p-1">
                                            WBTB & EVENT
                                        </div>
                                        <h3 className="text-base font-bold text-navy-900 group-hover:text-blue-700 transition-colors">
                                            Bidang Kebudayaan
                                        </h3>
                                        <p className="text-xs text-slate-600 leading-relaxed">
                                            Monitoring usulan pencatatan Warisan Budaya Takbenda (WBTB) Provinsi Maluku dan fasilitasi rekomendasi penyelenggaraan event/festival budaya.
                                        </p>
                                        <div className="pt-2 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                                            <span>Pencatatan: <strong>WBTBI Kemdikbud</strong></span>
                                            <span>Kalender: <strong>Event Aktif</strong></span>
                                        </div>
                                    </div>
                                    <button 
                                        onClick={() => setSelectedCardMonev({
                                            title: "Bidang Kebudayaan - WBTB & Festival Budaya",
                                            scope: "Pencatatan Karya Budaya Takbenda & Dukungan Festival Daerah",
                                            details: [
                                                "Pendampingan & verifikasi kajian usulan karya budaya untuk pencatatan WBTB Provinsi ke tingkat nasional (SLA 19 Hari).",
                                                "Fasilitasi rekomendasi dan sinkronisasi penyelenggaraan event/festival kebudayaan lokal & regional (SLA 10 Hari).",
                                                "Monitoring dokumen pendukung audio-visual karya budaya tradisional Maluku.",
                                                "Integrasi kalender event kebudayaan antar-kabupaten/kota se-Provinsi Maluku."
                                            ]
                                        })}
                                        className="mt-6 w-full py-2.5 bg-navy-900 hover:bg-navy-800 text-gold-400 font-bold text-xs rounded-xl shadow transition-all flex items-center justify-center gap-2 border border-gold-500/30"
                                    >
                                        <span>Detail Laporan</span>
                                        <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </button>
                                </div>

                                {/* CARD 3: Komunitas, Sanggar & Lembaga Adat */}
                                <div className="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group relative overflow-hidden">
                                    <div className="absolute top-0 right-0 w-24 h-24 bg-navy-900/5 rounded-bl-full pointer-events-none group-hover:bg-gold-500/10 transition-all"></div>
                                    <div className="space-y-3">
                                        <div className="w-12 h-12 rounded-xl bg-navy-900 text-gold-400 font-extrabold text-xs text-center flex items-center justify-center shadow leading-tight p-1">
                                            SANGGAR & ADAT
                                        </div>
                                        <h3 className="text-base font-bold text-navy-900 group-hover:text-blue-700 transition-colors">
                                            Bidang Kebudayaan
                                        </h3>
                                        <p className="text-xs text-slate-600 leading-relaxed">
                                            Pendataan, verifikasi eksistensi, pembinaan berkelanjutan, serta penerbitan piagam registrasi resmi sanggar seni, lembaga adat, dan komunitas budaya.
                                        </p>
                                        <div className="pt-2 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                                            <span>Jangkauan: <strong>11 Kab/Kota</strong></span>
                                            <span>Status: <strong>Terverifikasi</strong></span>
                                        </div>
                                    </div>
                                    <button 
                                        onClick={() => setSelectedCardMonev({
                                            title: "Bidang Kebudayaan - Pembinaan Komunitas & Adat",
                                            scope: "Registrasi & Pembinaan Sanggar Seni, Komunitas, dan Lembaga Adat",
                                            details: [
                                                "Verifikasi administrasi dan kelayakan kelembagaan sanggar seni & lembaga adat daerah (SLA 12 Hari).",
                                                "Verifikasi lapangan atas keaktifan dan eksistensi komunitas budaya lokal.",
                                                "Penerbitan surat/piagam registrasi resmi dari Dinas Pendidikan dan Kebudayaan Provinsi Maluku.",
                                                "Pemutakhiran basis data kebudayaan daerah secara terpadu dan berkelanjutan."
                                            ]
                                        })}
                                        className="mt-6 w-full py-2.5 bg-navy-900 hover:bg-navy-800 text-gold-400 font-bold text-xs rounded-xl shadow transition-all flex items-center justify-center gap-2 border border-gold-500/30"
                                    >
                                        <span>Detail Laporan</span>
                                        <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </button>
                                </div>
                            </div>
                        </section>

                        {}
                        {/* 3. INFOGRAFIS LAPORAN (GRAFIK DATA) */}
                        <section className="space-y-6">
                            <div className="border-b border-slate-200 pb-3">
                                <h2 className="text-xl font-bold text-navy-900 flex items-center gap-2">
                                    <span className="w-2 h-6 bg-navy-900 rounded-full"></span>
                                    Infografis Laporan (Grafik Data)
                                </h2>
                                <p className="text-xs text-slate-500 mt-0.5">
                                    Evaluasi data kualitatif dan kuantitatif pelaksanaan standar pelayanan publik Unit Kerja Bidang Kebudayaan
                                </p>
                            </div>

                            <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                {/* LINE CHART: Tren Rating Produk Layanan */}
                                <div className="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
                                    <div>
                                        <div className="flex items-center justify-between border-b border-slate-100 pb-3">
                                            <div>
                                                <h3 className="text-sm font-bold text-navy-900 uppercase tracking-wide">
                                                    Line Chart: Tren Rating Produk Layanan
                                                </h3>
                                                <p className="text-xs text-slate-500 mt-0.5">
                                                    Perkembangan Indeks Kepuasan Masyarakat (SKM) Bidang Kebudayaan
                                                </p>
                                            </div>
                                            <span className="px-2.5 py-1 bg-amber-50 text-amber-700 font-bold text-xs rounded-lg border border-amber-200">
                                                ★ 4.00 / 4.00
                                            </span>
                                        </div>
                                    </div>
                                    <div className="h-64 mt-4 relative">
                                        <canvas ref={chartLineRef}></canvas>
                                    </div>
                                </div>

                                {/* BAR CHART: Top Produk Layanan */}
                                <div className="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
                                    <div>
                                        <div className="flex items-center justify-between border-b border-slate-100 pb-3">
                                            <div>
                                                <h3 className="text-sm font-bold text-navy-900 uppercase tracking-wide">
                                                    Bar Chart: Top Produk Layanan
                                                </h3>
                                                <p className="text-xs text-slate-500 mt-0.5">
                                                    Volume Permohonan Berkas Kebudayaan Terlayani (SLA 100% On-Time)
                                                </p>
                                            </div>
                                            <span className="px-2.5 py-1 bg-emerald-50 text-emerald-700 font-bold text-xs rounded-lg border border-emerald-200">
                                                Total &gt; 1,500 Berkas
                                            </span>
                                        </div>
                                    </div>
                                    <div className="h-64 mt-4 relative">
                                        <canvas ref={chartBarRef}></canvas>
                                    </div>
                                </div>
                            </div>

                            {/* CATATAN HASIL PELAPORAN */}
                            <div className="bg-gradient-to-r from-navy-950 via-navy-900 to-navy-800 text-white rounded-2xl p-6 shadow-md border-l-4 border-gold-500 relative overflow-hidden">
                                <div className="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                                    <div className="space-y-2 w-full">
                                        <div className="flex items-center gap-2">
                                            <span className="w-2.5 h-2.5 rounded-full bg-gold-400 animate-ping"></span>
                                            <h3 className="text-base font-extrabold text-gold-400 uppercase tracking-wider">
                                                Catatan Hasil Pelaporan
                                            </h3>
                                        </div>
                                        <div className="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-2 text-xs sm:text-sm">
                                            <div className="flex items-center gap-2 bg-navy-800/80 px-3.5 py-3 rounded-xl border border-navy-700">
                                                <span className="text-gold-400 font-bold text-base">📌</span>
                                                <span className="font-semibold text-slate-100">Informatif, terpercaya, berwibawa.</span>
                                            </div>
                                            <div className="flex items-center gap-2 bg-navy-800/80 px-3.5 py-3 rounded-xl border border-navy-700">
                                                <span className="text-gold-400 font-bold text-base">📌</span>
                                                <span className="font-semibold text-slate-100">Menunjukkan capaian secara data-driven.</span>
                                            </div>
                                            <div className="flex items-center gap-2 bg-navy-800/80 px-3.5 py-3 rounded-xl border border-navy-700">
                                                <span className="text-gold-400 font-bold text-base">📌</span>
                                                <span className="font-semibold text-slate-100">Disiapkan sebagai bahan laporan pimpinan.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        {}
                        {/* 4. TOMBOL AKSI (ACTION BUTTON) */}
                        <section className="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm text-center space-y-4">
                            <div className="max-w-2xl mx-auto space-y-2">
                                <span className="inline-block px-3.5 py-1 bg-gold-400/20 text-gold-700 font-bold text-xs rounded-full border border-gold-500/30 uppercase tracking-widest">
                                    Laporan Digital – Wujud Integritas
                                </span>
                                <h3 className="text-xl font-extrabold text-navy-900">
                                    Akses Portal Integrasi Satu Data Pelayanan Publik
                                </h3>
                                <p className="text-xs text-slate-500">
                                    Lihat seluruh produk standar pelayanan publik Unit Kerja Bidang Kebudayaan lengkap dengan standar operasional prosedur (SOP) resmi 14 komponen.
                                </p>
                            </div>

                            <div className="pt-2">
                                <button 
                                    onClick={() => {
                                        const el = document.getElementById('directory-section');
                                        if (el) el.scrollIntoView({ behavior: 'smooth' });
                                    }}
                                    className="px-8 py-3.5 bg-gradient-to-r from-navy-900 to-navy-800 hover:from-navy-800 hover:to-navy-700 text-gold-400 font-extrabold text-sm sm:text-base rounded-2xl shadow-lg hover:shadow-gold-500/10 transition-all border-2 border-gold-500/40 inline-flex items-center justify-center gap-3 group"
                                >
                                    <span>Profil Satu Data Dinas Pendidikan dan Kebudayaan Provinsi Maluku</span>
                                    <svg className="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                </button>
                            </div>
                        </section>

                        {}
                        {/* 5. DIREKTORI DETAIL PRODUK LAYANAN BIDANG KEBUDAYAAN */}
                        <section id="directory-section" className="space-y-6 pt-4">
                            <div className="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 border-b border-slate-200 pb-4">
                                <div>
                                    <h2 className="text-xl font-bold text-navy-900 flex items-center gap-2">
                                        <span className="w-2 h-6 bg-gold-500 rounded-full"></span>
                                        Direktori Produk Layanan Bidang Kebudayaan
                                    </h2>
                                    <p className="text-xs text-slate-500 mt-0.5">
                                        Klik pada kartu layanan untuk menampilkan rincian SOP 14 komponen lengkap
                                    </p>
                                </div>

                                {/* Filter Category Tabs */}
                                <div className="flex items-center gap-1.5 overflow-x-auto custom-scrollbar max-w-full pb-1">
                                    {categories.map((cat) => (
                                        <button
                                            key={cat}
                                            onClick={() => setActiveCategory(cat)}
                                            className={`px-3 py-1.5 rounded-xl text-xs font-bold whitespace-nowrap transition-all ${
                                                activeCategory === cat
                                                    ? "bg-navy-900 text-gold-400 shadow-sm border border-gold-500/40"
                                                    : "bg-white text-slate-600 hover:bg-slate-100 border border-slate-200"
                                            }`}
                                        >
                                            {cat === "ALL" ? `Semua (${BUDAYA_SERVICES.length})` : cat}
                                        </button>
                                    ))}
                                </div>
                            </div>

                            {/* Search Box */}
                            <div className="relative max-w-md">
                                <input 
                                    type="text"
                                    value={searchQuery}
                                    onChange={(e) => setSearchQuery(e.target.value)}
                                    placeholder="Cari jenis layanan kebudayaan, kode, atau persyaratan..."
                                    className="w-full pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-navy-900/20 focus:border-navy-900 transition-all shadow-sm"
                                />
                                <svg className="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            </div>

                            {/* Services Grid */}
                            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                                {filteredServices.map((service) => (
                                    <div 
                                        key={service.id}
                                        className="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group relative overflow-hidden"
                                    >
                                        <div className="space-y-3">
                                            <div className="flex items-center justify-between">
                                                <span className="px-2.5 py-0.5 rounded-md text-[10px] font-extrabold bg-navy-900 text-gold-400 border border-navy-700 uppercase tracking-wide">
                                                    {service.code}
                                                </span>
                                                <span className="text-[11px] font-bold text-emerald-600 bg-emerald-50 px-2.5 py-0.5 rounded-md border border-emerald-200">
                                                    {service.cost}
                                                </span>
                                            </div>

                                            <h3 className="text-base font-bold text-navy-900 group-hover:text-blue-700 transition-colors">
                                                {service.title}
                                            </h3>

                                            <span className="inline-block text-[11px] font-medium text-slate-500 bg-slate-100 px-2 py-0.5 rounded">
                                                {service.category}
                                            </span>

                                            <div className="pt-2 border-t border-slate-100 space-y-1.5 text-xs">
                                                <div className="flex items-center justify-between text-slate-600">
                                                    <span>Jangka Waktu (SLA):</span>
                                                    <span className="font-semibold text-slate-800">{service.sla}</span>
                                                </div>
                                                <div className="flex items-center justify-between text-slate-600">
                                                    <span>Jumlah Pelaksana:</span>
                                                    <span className="font-semibold text-slate-800">{service.executors} Orang</span>
                                                </div>
                                            </div>
                                        </div>

                                        <button 
                                            onClick={() => setSelectedServiceModal(service)}
                                            className="mt-6 w-full py-2.5 bg-slate-50 hover:bg-navy-900 hover:text-gold-400 text-navy-900 font-bold text-xs rounded-xl border border-slate-200 transition-all flex items-center justify-center gap-1.5"
                                        >
                                            <span>Lihat SOP 14 Komponen</span>
                                            <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 5l7 7-7 7"/></svg>
                                        </button>
                                    </div>
                                ))}
                            </div>

                            {filteredServices.length === 0 && (
                                <div className="bg-white p-12 rounded-2xl text-center border border-slate-200 text-slate-500 space-y-2">
                                    <p className="font-bold text-base">Tidak ada layanan yang sesuai kata kunci pencarian</p>
                                    <p className="text-xs">Silakan coba kata kunci lain atau klik opsi kategori "Semua".</p>
                                </div>
                            )}
                        </section>
                    </main>

                    {}
                    {/* FOOTER */}
                    <footer className="bg-navy-950 text-slate-400 py-8 border-t-2 border-gold-500/40 mt-auto text-xs">
                        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3 text-center sm:text-left flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div>
                                <p className="font-bold text-white text-sm">
                                    Unit Kerja: Bidang Kebudayaan
                                </p>
                                <p className="text-slate-400 text-xs mt-0.5">
                                    Dinas Pendidikan dan Kebudayaan Provinsi Maluku © 2026
                                </p>
                            </div>

                            <div className="text-center sm:text-right text-[11px] text-slate-400 space-y-0.5">
                                <p>Jl. Jend. Ahmad Yani, Kel. Batu Gajah, Kec. Sirimau, Ambon - Maluku</p>
                                <p>Laman Resmi: <a href="https://disdikbud.malukuprov.go.id/" target="_blank" rel="noreferrer" className="text-gold-400 hover:underline">https://disdikbud.malukuprov.go.id/</a></p>
                            </div>
                        </div>
                    </footer>

                    {}
                    {/* MODAL SOP 14 KOMPONEN DETAIL */}
                    {selectedServiceModal && (
                        <div className="fixed inset-0 z-50 bg-navy-950/70 backdrop-blur-sm flex items-center justify-center p-4 overflow-y-auto">
                            <div className="bg-white rounded-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto custom-scrollbar shadow-2xl border border-gold-500/30 my-auto">
                                {/* Modal Header */}
                                <div className="sticky top-0 bg-navy-900 text-white px-6 py-4 border-b border-navy-800 flex items-center justify-between z-10">
                                    <div>
                                        <div className="flex items-center gap-2">
                                            <span className="px-2 py-0.5 rounded text-[10px] font-extrabold bg-gold-400 text-navy-950">
                                                {selectedServiceModal.code}
                                            </span>
                                            <span className="text-xs text-gold-300 font-medium">{selectedServiceModal.category}</span>
                                        </div>
                                        <h3 className="text-base font-bold text-white mt-1">
                                            {selectedServiceModal.title}
                                        </h3>
                                    </div>
                                    <button 
                                        onClick={() => setSelectedServiceModal(null)}
                                        className="p-1.5 rounded-lg text-slate-300 hover:text-white hover:bg-navy-800 transition-all"
                                    >
                                        <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                    </button>
                                </div>

                                {/* Modal Body - 14 Official Components */}
                                <div className="p-6 space-y-6 text-xs sm:text-sm">
                                    {/* Component F & Cost */}
                                    <div className="grid grid-cols-2 gap-3 p-3.5 bg-slate-50 rounded-xl border border-slate-200">
                                        <div>
                                            <p className="text-[10px] text-slate-400 font-bold uppercase">F. Unit Kerja Penanggung Jawab</p>
                                            <p className="font-bold text-navy-900">Bidang Kebudayaan</p>
                                        </div>
                                        <div>
                                            <p className="text-[10px] text-slate-400 font-bold uppercase">Biaya / Tarif</p>
                                            <p className="font-bold text-emerald-600">{selectedServiceModal.cost}</p>
                                        </div>
                                    </div>

                                    {/* Component 1: Jenis Pelayanan */}
                                    <div>
                                        <h4 className="font-extrabold text-navy-900 uppercase text-xs tracking-wider mb-1 flex items-center gap-2">
                                            <span className="w-1.5 h-3 bg-gold-500 rounded"></span> 1. Jenis Pelayanan:
                                        </h4>
                                        <p className="text-slate-800 font-bold bg-slate-50 p-2.5 rounded-xl border">{selectedServiceModal.title}</p>
                                    </div>

                                    {/* Component 2: Dasar Hukum */}
                                    <div>
                                        <h4 className="font-extrabold text-navy-900 uppercase text-xs tracking-wider mb-2 flex items-center gap-2">
                                            <span className="w-1.5 h-3 bg-gold-500 rounded"></span> 2. Dasar Hukum:
                                        </h4>
                                        <ol className="list-decimal list-inside space-y-1 text-slate-700 text-xs bg-slate-50 p-3.5 rounded-xl border">
                                            {selectedServiceModal.legal.map((item, i) => (
                                                <li key={i} className="leading-relaxed">{item}</li>
                                            ))}
                                        </ol>
                                    </div>

                                    {/* Component 3: Persyaratan Pelayanan */}
                                    <div>
                                        <h4 className="font-extrabold text-navy-900 uppercase text-xs tracking-wider mb-2 flex items-center gap-2">
                                            <span className="w-1.5 h-3 bg-gold-500 rounded"></span> 3. Persyaratan Pelayanan:
                                        </h4>
                                        <ol className="list-decimal list-inside space-y-1 text-slate-700 text-xs bg-amber-50/50 p-3.5 rounded-xl border border-amber-200/60">
                                            {selectedServiceModal.requirements.map((item, i) => (
                                                <li key={i} className="font-medium">{item}</li>
                                            ))}
                                        </ol>
                                    </div>

                                    {/* Component 4: Sistem, Mekanisme dan Prosedur */}
                                    <div>
                                        <h4 className="font-extrabold text-navy-900 uppercase text-xs tracking-wider mb-2 flex items-center gap-2">
                                            <span className="w-1.5 h-3 bg-gold-500 rounded"></span> 4. Sistem, Mekanisme, dan Prosedur:
                                        </h4>
                                        <ol className="list-decimal list-inside space-y-2 text-slate-700 text-xs bg-slate-50 p-3.5 rounded-xl border">
                                            {selectedServiceModal.procedure.map((step, i) => (
                                                <li key={i} className="leading-relaxed"><span className="font-semibold text-slate-900">{step}</span></li>
                                            ))}
                                        </ol>
                                    </div>

                                    {/* Components 5, 6, 7 */}
                                    <div className="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                        <div className="p-3 bg-slate-50 rounded-xl border">
                                            <p className="text-[10px] text-slate-400 font-bold uppercase">5. Jangka Waktu Penyelesaian</p>
                                            <p className="font-bold text-navy-900 text-xs mt-0.5">{selectedServiceModal.sla}</p>
                                        </div>
                                        <div className="p-3 bg-slate-50 rounded-xl border">
                                            <p className="text-[10px] text-slate-400 font-bold uppercase">6. Biaya / Tarif</p>
                                            <p className="font-bold text-emerald-600 text-xs mt-0.5">{selectedServiceModal.cost}</p>
                                        </div>
                                        <div className="p-3 bg-slate-50 rounded-xl border">
                                            <p className="text-[10px] text-slate-400 font-bold uppercase">7. Produk Pelayanan</p>
                                            <p className="font-bold text-navy-900 text-xs mt-0.5 line-clamp-3">{selectedServiceModal.product}</p>
                                        </div>
                                    </div>

                                    {/* Component 8: Penanganan Pengaduan */}
                                    <div>
                                        <h4 className="font-extrabold text-navy-900 uppercase text-xs tracking-wider mb-1">8. Penanganan Pengaduan, Saran, dan Masukan:</h4>
                                        <div className="text-xs text-slate-600 bg-slate-50 p-3 rounded-xl border space-y-1">
                                            <p>• Konsultasi langsung di kantor Dinas Pendidikan dan Kebudayaan Provinsi Maluku</p>
                                            <p>• Layanan Pengaduan Elektronik: <a href="https://disdikbud.malukuprov.go.id/pengaduan" target="_blank" rel="noreferrer" className="text-blue-600 hover:underline">https://disdikbud.malukuprov.go.id/pengaduan</a></p>
                                            <p>• Website: <a href="https://disdikbud.malukuprov.go.id/" target="_blank" rel="noreferrer" className="text-blue-600 hover:underline">https://disdikbud.malukuprov.go.id/</a></p>
                                            <p>• SP4N-LAPOR!</p>
                                            <p>• Media Sosial (Tiktok Dinas Pendidikan dan Kebudayaan Prov. Maluku)</p>
                                        </div>
                                    </div>

                                    {/* Components 9, 10, 11, 12 */}
                                    <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                                        <div className="p-3 bg-slate-50 rounded-xl border space-y-1">
                                            <p className="font-bold text-navy-900 uppercase text-[10px]">9. Sarana, Prasarana, dan/atau Fasilitas</p>
                                            <p className="text-slate-600">{selectedServiceModal.facilities.join(", ")}</p>
                                        </div>
                                        <div className="p-3 bg-slate-50 rounded-xl border space-y-1">
                                            <p className="font-bold text-navy-900 uppercase text-[10px]">10. Kompetensi Pelaksana</p>
                                            <p className="text-slate-600">{selectedServiceModal.competency}</p>
                                        </div>
                                        <div className="p-3 bg-slate-50 rounded-xl border space-y-1">
                                            <p className="font-bold text-navy-900 uppercase text-[10px]">11. Pengawasan Internal</p>
                                            <p className="text-slate-600">{selectedServiceModal.internalSupervision}</p>
                                        </div>
                                        <div className="p-3 bg-slate-50 rounded-xl border space-y-1">
                                            <p className="font-bold text-navy-900 uppercase text-[10px]">12. Jumlah Pelaksana</p>
                                            <p className="text-slate-600 font-bold">{selectedServiceModal.executors} orang</p>
                                        </div>
                                    </div>

                                    {/* Components 13 & 14 */}
                                    <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                                        <div className="p-3 bg-slate-50 rounded-xl border space-y-1">
                                            <p className="font-bold text-navy-900 uppercase text-[10px]">13. Jaminan Pelayanan</p>
                                            <p className="text-slate-600 leading-relaxed">{selectedServiceModal.guarantee}</p>
                                        </div>
                                        <div className="p-3 bg-slate-50 rounded-xl border space-y-1">
                                            <p className="font-bold text-navy-900 uppercase text-[10px]">14. Evaluasi Kinerja Pelaksana</p>
                                            <p className="text-slate-600 leading-relaxed">{selectedServiceModal.evaluation}</p>
                                        </div>
                                    </div>

                                    {/* Official SOP Download & Input File Permohonan (Database CMS Dikbud) */}
                                    <div className="border-t-2 border-slate-200/80 pt-5 space-y-4">
                                        {/* Unduh Dokumen SOP Resmi (jika ada file di DB) */}
                                        {(() => {
                                            const masterSop = DB_SOP_LIST && DB_SOP_LIST[selectedServiceModal.code];
                                            if (masterSop && masterSop.official_sop_file) {
                                                return (
                                                    <div className="bg-gradient-to-r from-navy-950 via-navy-900 to-navy-800 text-white p-4 rounded-xl border border-gold-500/40 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 shadow-md">
                                                        <div className="flex items-center gap-3">
                                                            <div className="w-10 h-10 rounded-lg bg-gold-400 text-navy-950 flex items-center justify-center font-extrabold text-sm shrink-0 shadow">
                                                                PDF
                                                            </div>
                                                            <div>
                                                                <p className="text-[10px] font-bold text-gold-400 uppercase tracking-wider">Dokumen Resmi SOP Tersedia</p>
                                                                <h5 className="font-bold text-xs sm:text-sm text-white line-clamp-1">{masterSop.official_sop_name || 'Dokumen SOP 14 Komponen ' + selectedServiceModal.code}</h5>
                                                                {masterSop.official_sop_size && (
                                                                    <p className="text-[11px] text-slate-300">Ukuran file: {masterSop.official_sop_size}</p>
                                                                )}
                                                            </div>
                                                        </div>
                                                        <a
                                                            href={masterSop.official_sop_file}
                                                            target="_blank"
                                                            rel="noreferrer"
                                                            className="px-4 py-2 bg-gold-400 hover:bg-gold-500 text-navy-950 font-bold text-xs rounded-lg transition-all flex items-center gap-1.5 shrink-0 shadow"
                                                        >
                                                            <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                                            <span>Unduh Dokumen SOP (PDF)</span>
                                                        </a>
                                                    </div>
                                                );
                                            }
                                            return null;
                                        })()}

                                        {/* Form Input Berkas Permohonan */}
                                        <div className="bg-gradient-to-br from-amber-50/60 to-slate-50 p-5 rounded-2xl border-2 border-dashed border-gold-500/50 space-y-4">
                                            <div className="flex items-start justify-between gap-2 border-b border-gold-200 pb-3">
                                                <div>
                                                    <h4 className="font-extrabold text-navy-900 text-sm flex items-center gap-2">
                                                        <svg className="w-4 h-4 text-gold-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                                        <span>Formulir & Input File Persyaratan Layanan ({selectedServiceModal.code})</span>
                                                    </h4>
                                                    <p className="text-xs text-slate-600 mt-0.5">
                                                        Unggah berkas / kelengkapan persyaratan SOP Anda langsung ke sistem database Dinas Pendidikan Provinsi Maluku.
                                                    </p>
                                                </div>
                                                <span className="px-2.5 py-1 bg-gold-400/20 text-navy-950 border border-gold-400/40 rounded-full text-[10px] font-extrabold uppercase shrink-0">
                                                    Database Terintegrasi
                                                </span>
                                            </div>

                                            {uploadSuccess && (
                                                <div className="p-3 bg-emerald-50 border border-emerald-300 rounded-xl flex items-start gap-2.5 text-xs text-emerald-800">
                                                    <svg className="w-4 h-4 text-emerald-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"/></svg>
                                                    <div>
                                                        <p className="font-bold">Unggah Berkas Berhasil!</p>
                                                        <p className="text-[11px] text-emerald-700 mt-0.5">{uploadSuccess}</p>
                                                    </div>
                                                </div>
                                            )}

                                            {uploadError && (
                                                <div className="p-3 bg-red-50 border border-red-300 rounded-xl flex items-start gap-2.5 text-xs text-red-800">
                                                    <svg className="w-4 h-4 text-red-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                    <div>
                                                        <p className="font-bold">Gagal Mengunggah Berkas</p>
                                                        <p className="text-[11px] text-red-700 mt-0.5">{uploadError}</p>
                                                    </div>
                                                </div>
                                            )}

                                            <form onSubmit={handleUploadSubmit} className="space-y-3.5">
                                                <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                                                    <div>
                                                        <label className="block font-bold text-navy-900 mb-1">
                                                            Nama Pemohon / Pengusul <span className="text-red-500">*</span>
                                                        </label>
                                                        <input 
                                                            type="text" 
                                                            required
                                                            value={uploadForm.sender_name}
                                                            onChange={(e) => setUploadForm({...uploadForm, sender_name: e.target.value})}
                                                            placeholder="Contoh: Bpk. Ahmad Dahlan, S.Pd" 
                                                            className="w-full px-3 py-2 bg-white rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-gold-500 text-xs text-slate-800 placeholder:text-slate-400"
                                                        />
                                                    </div>
                                                    <div>
                                                        <label className="block font-bold text-navy-900 mb-1">
                                                            No. HP / WhatsApp <span className="text-red-500">*</span>
                                                        </label>
                                                        <input 
                                                            type="text" 
                                                            required
                                                            value={uploadForm.phone}
                                                            onChange={(e) => setUploadForm({...uploadForm, phone: e.target.value})}
                                                            placeholder="Contoh: 081234567890" 
                                                            className="w-full px-3 py-2 bg-white rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-gold-500 text-xs text-slate-800 placeholder:text-slate-400"
                                                        />
                                                    </div>
                                                </div>

                                                <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                                                    <div>
                                                        <label className="block font-bold text-navy-900 mb-1">
                                                            Asal Sanggar / Komunitas / Instansi
                                                        </label>
                                                        <input 
                                                            type="text" 
                                                            value={uploadForm.instance}
                                                            onChange={(e) => setUploadForm({...uploadForm, instance: e.target.value})}
                                                            placeholder="Contoh: Sanggar Seni Siwalima / Komunitas" 
                                                            className="w-full px-3 py-2 bg-white rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-gold-500 text-xs text-slate-800 placeholder:text-slate-400"
                                                        />
                                                    </div>
                                                    <div>
                                                        <label className="block font-bold text-navy-900 mb-1">
                                                            Email Pemohon (Opsional)
                                                        </label>
                                                        <input 
                                                            type="email" 
                                                            value={uploadForm.email}
                                                            onChange={(e) => setUploadForm({...uploadForm, email: e.target.value})}
                                                            placeholder="pemohon@email.com" 
                                                            className="w-full px-3 py-2 bg-white rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-gold-500 text-xs text-slate-800 placeholder:text-slate-400"
                                                        />
                                                    </div>
                                                </div>

                                                {/* File Upload Input */}
                                                <div>
                                                    <label className="block font-bold text-navy-900 mb-1 text-xs">
                                                        Pilih File Dokumen / Berkas Persyaratan <span className="text-red-500">*</span>
                                                    </label>
                                                    <input 
                                                        ref={fileInputRef}
                                                        type="file" 
                                                        required
                                                        onChange={handleFileChange}
                                                        accept=".pdf,.doc,.docx,.zip,.rar,.jpg,.jpeg,.png"
                                                        className="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-navy-900 file:text-gold-400 hover:file:bg-navy-800 file:cursor-pointer p-1.5 bg-white border border-slate-300 rounded-xl"
                                                    />
                                                    <p className="text-[10px] text-slate-500 mt-1">
                                                        Format: PDF, Word (DOC/DOCX), ZIP, JPG, PNG (Maksimal 25 MB).
                                                    </p>
                                                </div>

                                                {/* Notes */}
                                                <div>
                                                    <label className="block font-bold text-navy-900 mb-1 text-xs">
                                                        Catatan / Rincian Berkas (Opsional)
                                                    </label>
                                                    <textarea 
                                                        rows="2"
                                                        value={uploadForm.notes}
                                                        onChange={(e) => setUploadForm({...uploadForm, notes: e.target.value})}
                                                        placeholder="Tuliskan keterangan berkas atau kelengkapan permohonan..." 
                                                        className="w-full px-3 py-2 bg-white rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-gold-500 text-xs text-slate-800 placeholder:text-slate-400"
                                                    ></textarea>
                                                </div>

                                                <div className="flex items-center justify-end gap-2 pt-1">
                                                    <button
                                                        type="submit"
                                                        disabled={isUploading}
                                                        className="px-5 py-2.5 bg-gold-500 hover:bg-gold-600 disabled:opacity-50 text-navy-950 font-extrabold text-xs rounded-xl shadow-md transition-all flex items-center gap-2"
                                                    >
                                                        {isUploading ? (
                                                            <>
                                                                <svg className="animate-spin h-4 w-4 text-navy-950" fill="none" viewBox="0 0 24 24"><circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4"></circle><path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg>
                                                                <span>Mengunggah Berkas ke Database...</span>
                                                            </>
                                                        ) : (
                                                            <>
                                                                <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                                                                <span>Unggah & Kirim Berkas SOP</span>
                                                            </>
                                                        )}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                {/* Modal Footer */}
                                <div className="bg-slate-50 px-6 py-3 border-t border-slate-200 flex justify-end">
                                    <button 
                                        onClick={() => setSelectedServiceModal(null)}
                                        className="px-5 py-2 bg-navy-900 hover:bg-navy-800 text-gold-400 font-bold text-xs rounded-xl shadow transition-all"
                                    >
                                        Tutup Dokumen SOP
                                    </button>
                                </div>
                            </div>
                        </div>
                    )}

                    {}
                    {/* MODAL MONEV CARD DETAIL REPORT */}
                    {selectedCardMonev && (
                        <div className="fixed inset-0 z-50 bg-navy-950/70 backdrop-blur-sm flex items-center justify-center p-4">
                            <div className="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-gold-500/40 space-y-4 my-auto">
                                <div className="flex items-center justify-between border-b border-slate-100 pb-3">
                                    <h3 className="text-base font-extrabold text-navy-900">
                                        Detail Laporan: {selectedCardMonev.title}
                                    </h3>
                                    <button 
                                        onClick={() => setSelectedCardMonev(null)}
                                        className="text-slate-400 hover:text-slate-700"
                                    >
                                        ✕
                                    </button>
                                </div>
                                <p className="text-xs font-semibold text-blue-700 bg-blue-50 p-2.5 rounded-lg">
                                    Cakupan: {selectedCardMonev.scope}
                                </p>
                                <div className="space-y-2">
                                    <h4 className="text-xs font-bold text-navy-900 uppercase">Ringkasan Kegiatan Monev:</h4>
                                    <ul className="list-disc list-inside space-y-1.5 text-xs text-slate-700">
                                        {selectedCardMonev.details.map((d, i) => (
                                            <li key={i}>{d}</li>
                                        ))}
                                    </ul>
                                </div>
                                <div className="pt-3 border-t border-slate-100 flex justify-end">
                                    <button 
                                        onClick={() => setSelectedCardMonev(null)}
                                        className="px-4 py-2 bg-navy-900 text-gold-400 font-bold text-xs rounded-xl"
                                    >
                                        Selesai
                                    </button>
                                </div>
                            </div>
                        </div>
                    )}
                </div>
            );
        }

        ReactDOM.createRoot(document.getElementById('root')).render(<App />);
    </script>
</body>
</html>