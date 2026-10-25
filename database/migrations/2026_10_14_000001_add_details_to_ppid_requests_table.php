<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ppid_requests', function (Blueprint $table) {
            $table->string('nik', 50)->nullable()->change();
            $table->string('email', 255)->nullable()->change();
            if (!Schema::hasColumn('ppid_requests', 'instansi')) {
                $table->string('instansi', 255)->nullable()->after('nama_pemohon');
            }
            if (!Schema::hasColumn('ppid_requests', 'kategori')) {
                $table->string('kategori', 255)->nullable()->after('instansi');
            }
            if (!Schema::hasColumn('ppid_requests', 'tipe_layanan')) {
                $table->string('tipe_layanan', 100)->default('Permohonan Data')->after('kategori');
            }
        });
    }

    public function down(): void
    {
        Schema::table('ppid_requests', function (Blueprint $table) {
            $cols = [];
            if (Schema::hasColumn('ppid_requests', 'instansi')) $cols[] = 'instansi';
            if (Schema::hasColumn('ppid_requests', 'kategori')) $cols[] = 'kategori';
            if (Schema::hasColumn('ppid_requests', 'tipe_layanan')) $cols[] = 'tipe_layanan';
            if (!empty($cols)) {
                $table->dropColumn($cols);
            }
        });
    }
};
