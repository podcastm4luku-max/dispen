<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->string('instansi')->nullable()->after('sender_name');
            $table->string('kategori')->nullable()->after('instansi');
            $table->string('whatsapp')->nullable()->after('kategori');
        });
    }

    public function down(): void
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->dropColumn(['instansi', 'kategori', 'whatsapp']);
        });
    }
};