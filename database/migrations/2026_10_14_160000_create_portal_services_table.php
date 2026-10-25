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
        if (!Schema::hasTable('portal_services')) {
            Schema::create('portal_services', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('badge')->nullable();
                $table->string('icon')->nullable();
                $table->string('icon_color')->nullable();
                $table->text('description')->nullable();
                $table->string('url')->nullable();
                $table->string('action_text')->nullable();
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
        Schema::dropIfExists('portal_services');
    }
};
