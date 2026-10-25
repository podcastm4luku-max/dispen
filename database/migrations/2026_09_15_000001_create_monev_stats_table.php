<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('monev_stats', function (Blueprint $table) {
            $table->id();
            $table->string('total_sekolah')->default('428');
            $table->string('total_sekolah_sub')->default('+12 dari 2025');
            $table->string('siswa_aktif')->default('112.450');
            $table->string('siswa_aktif_sub')->default('+3.2% pendaftar baru');
            $table->string('guru_tendik')->default('8.942');
            $table->string('guru_tendik_sub')->default('85% Tersertifikasi');
            $table->string('akreditasi_a')->default('156');
            $table->string('akreditasi_a_sub')->default('+15 Sekolah');
            $table->integer('sarpras_baik')->default(65);
            $table->integer('sarpras_rusak_ringan')->default(25);
            $table->integer('sarpras_rusak_berat')->default(10);
            $table->string('total_sma')->default('245');
            $table->string('total_smk')->default('183');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('monev_stats');
    }
};