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
        // 1. Master Tabel SOP Layanan per Bidang
        Schema::create('layanan_sop', function (Blueprint $table) {
            $table->id();
            $table->string('service_code', 50)->unique();
            $table->string('bidang', 50)->index();
            $table->string('service_title');
            $table->string('category', 100)->nullable();
            $table->string('sla')->nullable();
            $table->string('cost')->default('Gratis (Rp 0)');
            $table->string('executors')->nullable();
            $table->text('description')->nullable();
            $table->string('official_sop_file')->nullable();
            $table->string('official_sop_name')->nullable();
            $table->string('official_sop_size', 50)->nullable();
            $table->timestamps();
        });

        // 2. Tabel Berkas Upload / Permohonan SOP yang Masuk dari Aplikasi Web & CMS
        Schema::create('layanan_sop_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('service_code', 50)->index();
            $table->string('bidang', 50)->nullable()->index();
            $table->string('service_title')->nullable();
            $table->string('sender_name');
            $table->string('phone', 50)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('instance')->nullable();
            $table->text('notes')->nullable();
            $table->string('file_path');
            $table->string('file_name');
            $table->string('file_size', 50)->nullable();
            $table->string('file_type', 50)->nullable();
            $table->string('status', 50)->default('Menunggu Review');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_sop_submissions');
        Schema::dropIfExists('layanan_sop');
    }
};
