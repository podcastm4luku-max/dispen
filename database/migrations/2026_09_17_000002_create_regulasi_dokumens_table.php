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
        if (!Schema::hasTable('regulasi_dokumens')) {
            Schema::create('regulasi_dokumens', function (Blueprint $table) {
                $table->id();
                $table->integer('no')->default(1);
                $table->string('title');
                $table->string('tag')->nullable();
                $table->string('badge')->nullable();
                $table->text('url')->nullable();
                $table->string('file_path')->nullable();
                $table->boolean('is_active')->default(true);
                $table->integer('download_count')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regulasi_dokumens');
    }
};