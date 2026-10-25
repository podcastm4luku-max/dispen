<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('monev_regions', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wilayah');
            $table->integer('jumlah_sma')->default(0);
            $table->integer('jumlah_smk')->default(0);
            $table->integer('total')->default(0);
            $table->string('link_detail')->nullable();
            $table->text('contoh_sekolah')->nullable();
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('monev_regions');
    }
};