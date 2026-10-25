<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ppid_requests', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemohon');
            $table->string('nik', 16);
            $table->string('email');
            $table->string('telepon');
            $table->text('rincian');
            $table->string('tujuan');
            $table->enum('status', ['Menunggu Review', 'Diproses', 'Selesai', 'Ditolak'])->default('Menunggu Review');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ppid_requests');
    }
};
