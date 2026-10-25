<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('galleries')) {
            Schema::create('galleries', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('type')->default('foto'); // foto, video
                $table->string('category')->nullable();
                $table->string('file_path')->nullable();
                $table->text('media_url')->nullable();
                $table->string('thumbnail')->nullable();
                $table->text('description')->nullable();
                $table->date('event_date')->nullable();
                $table->integer('order')->default(1);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};