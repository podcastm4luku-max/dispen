<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonevStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_sekolah',
        'total_sekolah_sub',
        'siswa_aktif',
        'siswa_aktif_sub',
        'guru_tendik',
        'guru_tendik_sub',
        'akreditasi_a',
        'akreditasi_a_sub',
        'sarpras_baik',
        'sarpras_rusak_ringan',
        'sarpras_rusak_berat',
        'total_sma',
        'sma_negeri',
        'sma_swasta',
        'total_smk',
        'smk_negeri',
        'smk_swasta',
        'total_slb',
        'slb_negeri',
        'slb_swasta',
        'notes',
    ];
}