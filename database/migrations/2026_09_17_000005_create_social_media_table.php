<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('social_media')) {
            Schema::create('social_media', function (Blueprint $table) {
                $table->id();
                $table->string('platform'); // instagram, tiktok, youtube, facebook, other
                $table->string('name'); // e.g. Instagram Resmi
                $table->string('username')->nullable(); // e.g. @disdikbud_maluku
                $table->string('url'); // full URL
                $table->string('icon')->nullable(); // FontAwesome class
                $table->string('color_class')->nullable(); // tailwind background / gradient class
                $table->integer('order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('social_media');
    }
};