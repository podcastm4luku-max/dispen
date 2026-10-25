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
        Schema::create('hero_slides', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Slide');
            $table->text('subtitle')->nullable();
            $table->string('tag')->nullable()->default('Program Prioritas');
            $table->text('image');
            $table->string('button_text')->nullable()->default('Baca Selengkapnya');
            $table->string('button_link')->nullable()->default('#');
            $table->integer('order')->default(1);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_slides');
    }
};
