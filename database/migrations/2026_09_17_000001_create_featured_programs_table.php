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
        if (!Schema::hasTable('featured_programs')) {
            Schema::create('featured_programs', function (Blueprint $table) {
                $table->id();
                $table->string('kategori')->default('Program');
                $table->string('title');
                $table->text('description')->nullable();
                $table->string('icon')->default('https://placehold.co/100x100/1e3a8a/ffffff?text=Icon');
                $table->string('link')->nullable();
                $table->integer('order')->default(1);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('featured_programs');
    }
};