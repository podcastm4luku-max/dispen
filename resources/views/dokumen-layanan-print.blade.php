<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen Layanan - {{ $submission->service_code }} - {{ $submission->sender_name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        @media print {
            .no-print { display: none !important; }
            body { padding: 0; background: white; }
        }
    </style>
</head>
<body class="bg-slate-100 font-sans p-4 sm:p-8 text-slate-800 antialiased">

    <!-- Action Bar (No Print) -->
    <div class="max-w-4xl mx-auto mb-6 flex justify-between items-center no-print">
        <a href="{{ url('/') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white text-slate-700 border border-slate-300 rounded-xl font-bold text-sm shadow-sm hover:bg-slate-50 transition-colors">
            <span class="material-icons text-sm">arrow_back</span> Kembali ke Beranda
        </a>
        <button onclick="window.print()" class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-700 hover:bg-blue-800 text-white rounded-xl font-bold text-sm shadow-md transition-colors">
            <span class="material-icons text-sm">print</span> Cetak / Simpan PDF
        </button>
    </div>

    <!-- Official Document Sheet -->
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl border border-slate-200 p-8 sm:p-12 relative overflow-hidden">
        
        <!-- Kop Surat Resmi Dinas Pendidikan & Kebudayaan Provinsi Maluku -->
        <div class="border-b-4 border-double border-slate-800 pb-5 mb-8 flex items-center gap-6">
            <img src="{{ asset('images/logo-maluku.png') }}" alt="Logo Maluku" class="w-20 h-20 object-contain">
            <div class="flex-1 text-center">
                <h3 class="font-extrabold text-slate-900 text-lg uppercase tracking-wide">Pemerintah Provinsi Maluku</h3>
                <h2 class="font-black text-blue-950 text-xl sm:text-2xl uppercase tracking-wider">Dinas Pendidikan dan Kebudayaan</h2>
                <p class="text-xs text-slate-600 mt-1">Jalan Jenderal Achmad Yani No. 1, Kota Ambon, Maluku 97114</p>
                <p class="text-[11px] text-slate-500">Laman: disdikbud.malukuprov.go.id | Pos-el: dikbud@malukuprov.go.id | Telp: (0911) 352389</p>
            </div>
        </div>

        <!-- Document Status Banner -->
        @php
            $isApproved = in_array($submission->status, ['Disetujui', 'Selesai']);
        @endphp

        <div class="mb-8 p-4 rounded-xl {{ $isApproved ? 'bg-emerald-50 border border-emerald-300 text-emerald-900' : 'bg-red-50 border border-red-300 text-red-900' }} flex items-center justify-between">
            <div class="flex items-center gap-3">
                <span class="material-icons text-3xl {{ $isApproved ? 'text-emerald-600' : 'text-red-600' }}">
                    {{ $isApproved ? 'verified' : 'cancel' }}
                </span>
                <div>
                    <h4 class="font-black text-sm uppercase tracking-wide">
                        {{ $isApproved ? 'Surat Keterangan Persetujuan Layanan' : 'Surat Pemberitahuan Penolakan / Revisi Berkas' }}
                    </h4>
                    <p class="text-xs {{ $isApproved ? 'text-emerald-700' : 'text-red-700' }}">
                        Status Resmi: <strong>{{ $submission->status }}</strong> &bull; Nomor Registrasi: #REG-{{ str_pad($submission->id, 5, '0', STR_PAD_LEFT) }}/{{ strtoupper($submission->service_code) }}/{{ date('Y') }}
                    </p>
                </div>
            </div>
            <div class="text-right text-xs font-semibold {{ $isApproved ? 'text-emerald-700' : 'text-red-700' }}">
                Diterbitkan: {{ $submission->updated_at ? $submission->updated_at->translatedFormat('d F Y') : now()->translatedFormat('d F Y') }}
            </div>
        </div>

        <!-- Document Body -->
        <div class="space-y-6 text-sm text-slate-700">
            <p class="leading-relaxed">
                Menerangkan bahwa permohonan layanan publik elektronik melalui portal resmi Dinas Pendidikan dan Kebudayaan Provinsi Maluku dengan rincian sebagai berikut:
            </p>

            <!-- Table of Details -->
            <div class="bg-slate-50 rounded-xl border border-slate-200 overflow-hidden">
                <table class="w-full text-left text-xs sm:text-sm">
                    <tbody class="divide-y divide-slate-200">
                        <tr>
                            <td class="px-4 py-3 font-bold text-slate-600 w-1/3 bg-slate-100/60">Kode & Layanan</td>
                            <td class="px-4 py-3 font-black text-slate-900">{{ $submission->service_code }} - {{ $submission->service_title }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 font-bold text-slate-600 bg-slate-100/60">Nama Pemohon</td>
                            <td class="px-4 py-3 font-bold text-slate-900">{{ $submission->sender_name }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 font-bold text-slate-600 bg-slate-100/60">Instansi / Unit Kerja</td>
                            <td class="px-4 py-3 text-slate-800">{{ $submission->instance ?: '-' }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 font-bold text-slate-600 bg-slate-100/60">Kontak Pemohon</td>
                            <td class="px-4 py-3 text-slate-800">{{ $submission->phone ?: '-' }} &bull; {{ $submission->email ?: '-' }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 font-bold text-slate-600 bg-slate-100/60">Tanggal Pengajuan</td>
                            <td class="px-4 py-3 text-slate-800">{{ $submission->created_at ? $submission->created_at->translatedFormat('d F Y - H:i WIT') : '-' }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 font-bold text-slate-600 bg-slate-100/60">Catatan Pemohon</td>
                            <td class="px-4 py-3 text-slate-800">{{ $submission->notes ?: '-' }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 font-bold text-slate-600 bg-slate-100/60 align-top">Catatan Resmi Verifikator Dinas</td>
                            <td class="px-4 py-3 text-slate-900 font-semibold leading-relaxed">
                                {{ $submission->admin_notes ?: ($isApproved ? 'Berkas permohonan telah diverifikasi lengkap dan disetujui sesuai dengan Standar Operasional Prosedur (SOP) Dinas Pendidikan dan Kebudayaan Provinsi Maluku.' : 'Berkas belum memenuhi persyaratan administrasi yang ditentukan.') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Conclusion statement -->
            <p class="leading-relaxed pt-2">
                @if($isApproved)
                    Demikian surat persetujuan layanan ini diterbitkan secara sah dan dapat dipergunakan sebagaimana mestinya untuk keperluan administrasi resmi.
                @else
                    Demikian pemberitahuan ini disampaikan. Pemohon diharapkan melengkapi persyaratan yang dinyatakan kurang pada catatan verifikator di atas dan melakukan pengajuan kembali.
                @endif
            </p>
        </div>

        <!-- Signature Section -->
        <div class="mt-12 pt-6 border-t border-slate-200 flex justify-between items-end">
            <div class="text-xs text-slate-500">
                <p>Dokumen ini diterbitkan secara elektronik oleh:</p>
                <p class="font-bold text-slate-700">Sistem Informasi Layanan Publik (SILAP) Disdikbud Maluku</p>
                <p class="mt-2 text-[10px]">ID Verifikasi: {{ md5($submission->id . $submission->created_at) }}</p>
            </div>
            <div class="text-center">
                <p class="text-xs text-slate-600">Ambon, {{ $submission->updated_at ? $submission->updated_at->translatedFormat('d F Y') : now()->translatedFormat('d F Y') }}</p>
                <p class="text-xs font-bold text-slate-800 mt-1">a.n. Kepala Dinas Pendidikan & Kebudayaan<br>Provinsi Maluku</p>
                
                <div class="my-3 flex items-center justify-center">
                    <div class="w-20 h-20 border border-slate-300 rounded-lg flex items-center justify-center bg-slate-50 text-[10px] text-slate-400 font-mono text-center p-1">
                        [QR Code Verifikasi Resmi]
                    </div>
                </div>

                <p class="text-xs font-bold text-slate-900 underline">Dr. Sarlota Singerin, S.Pd., M.Pd</p>
                <p class="text-[11px] text-slate-500">Pembina Utama Muda (IV/c)</p>
            </div>
        </div>

    </div>

</body>
</html>
