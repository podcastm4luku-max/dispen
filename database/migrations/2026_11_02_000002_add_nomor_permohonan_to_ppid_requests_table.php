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
        Schema::table('ppid_requests', function (Blueprint $table) {
            if (!Schema::hasColumn('ppid_requests', 'nomor_permohonan')) {
                $table->string('nomor_permohonan')->nullable()->after('id')->index();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ppid_requests', function (Blueprint $table) {
            if (Schema::hasColumn('ppid_requests', 'nomor_permohonan')) {
                $table->dropColumn('nomor_permohonan');
            }
        });
    }
};
