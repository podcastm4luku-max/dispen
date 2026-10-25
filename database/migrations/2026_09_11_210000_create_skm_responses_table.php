<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skm_responses', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->default('Anonim');
            $table->string('alamat')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('waktu_pelayanan')->nullable();
            $table->integer('u1')->default(4);
            $table->integer('u2')->default(4);
            $table->integer('u3')->default(4);
            $table->integer('u4')->default(4);
            $table->integer('u5')->default(4);
            $table->integer('u6')->default(4);
            $table->integer('u7')->default(4);
            $table->integer('u8')->default(4);
            $table->integer('u9')->default(4);
            $table->text('saran')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skm_responses');
    }
};
