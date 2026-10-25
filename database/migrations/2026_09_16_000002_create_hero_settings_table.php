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
        if (!Schema::hasTable('hero_settings')) {
            Schema::create('hero_settings', function (Blueprint $table) {
                $table->id();
                $table->string('campaign_badge')->default('Dinas Pendidikan & kebudayaan Prov. Maluku');
                $table->text('title')->nullable();
                $table->string('title_highlight')->nullable()->default('Berkualitas & Merata');
                $table->text('description')->nullable();
                $table->string('btn1_text')->default('Layanan Digital');
                $table->string('btn1_url')->default('#layanan');
                $table->string('btn2_text')->default('Transparansi Publik');
                $table->string('btn2_url')->default('#transparansi');
                
                $table->string('kadis_name')->default('Dr. Sarlota Singerin, S.Pd., M.Pd');
                $table->string('kadis_position')->default('Kepala Dinas Pendidikan & Kebudayaan');
                $table->string('kadis_photo')->default('/images/kadin-sarlota.webp');
                $table->text('kadis_quote')->nullable();
                $table->string('kadis_button_text')->default('Baca Selengkapnya');
                $table->string('kadis_button_link')->default('#');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_settings');
    }
};