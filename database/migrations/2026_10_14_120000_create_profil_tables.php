<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('visi_misi')) {
            Schema::create('visi_misi', function (Blueprint $table) {
                $table->id();
                $table->string('banner_badge')->default('ARAH KEBIJAKAN');
                $table->string('banner_title')->default('Visi dan Misi');
                $table->text('banner_description')->nullable();
                $table->text('visi_text')->nullable();
                $table->text('misi_description')->nullable();
                $table->json('misi_items')->nullable();
                $table->text('rumusan_singkat_visi')->nullable();
                $table->json('rumusan_singkat_misi')->nullable();
                $table->string('file_path')->nullable();
                $table->string('file_name')->nullable();
                $table->string('file_size')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('tugas_fungsi')) {
            Schema::create('tugas_fungsi', function (Blueprint $table) {
                $table->id();
                $table->string('header_badge')->default('Pemerintah Provinsi Maluku');
                $table->string('header_title')->default('Dinas Pendidikan dan Kebudayaan');
                $table->text('header_subtitle')->nullable();
                $table->string('stat_sekolah')->default('345+');
                $table->string('stat_sekolah_label')->default('Sekolah Menengah');
                $table->string('stat_guru')->default('8.2K');
                $table->string('stat_guru_label')->default('Tenaga Pendidik');
                $table->string('stat_siswa')->default('112K');
                $table->string('stat_siswa_label')->default('Peserta Didik');
                $table->string('stat_cagar_budaya')->default('56+');
                $table->string('stat_cagar_budaya_label')->default('Cagar Budaya');
                $table->text('tugas_pokok')->nullable();
                $table->text('tugas_pembantuan')->nullable();
                $table->string('image_tugas')->nullable();
                $table->json('fungsi_items')->nullable();
                $table->json('ruang_lingkup_items')->nullable();
                $table->text('catatan_kewenangan')->nullable();
                $table->string('file_path')->nullable();
                $table->string('file_name')->nullable();
                $table->string('file_size')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('struktur_organisasi')) {
            Schema::create('struktur_organisasi', function (Blueprint $table) {
                $table->id();
                $table->string('header_badge')->default('Dashboard Informasi');
                $table->string('header_title')->default('Struktur Organisasi');
                $table->string('header_subtitle')->default('Dinas Pendidikan dan Kebudayaan Provinsi Maluku');
                $table->string('bagan_image')->nullable();
                $table->string('file_path')->nullable();
                $table->string('file_name')->nullable();
                $table->string('file_size')->nullable();
                $table->json('kegiatan_utama')->nullable();
                $table->json('unit_kerja')->nullable();
                $table->json('tree_chart_data')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('struktur_organisasi');
        Schema::dropIfExists('tugas_fungsi');
        Schema::dropIfExists('visi_misi');
    }
};
