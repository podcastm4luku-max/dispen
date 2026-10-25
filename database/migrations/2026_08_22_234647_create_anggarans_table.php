<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anggarans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_anggaran')->unique();
            $table->string('title');
            $table->text('desc')->nullable();
            $table->string('category');
            $table->string('region');
            $table->bigInteger('pagu')->default(0);
            $table->bigInteger('realisasi')->default(0);
            $table->string('doc')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggarans');
    }
};
