<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    protected $table = 'struktur_organisasi';
    protected $guarded = [];

    protected $casts = [
        'kegiatan_utama' => 'array',
        'unit_kerja' => 'array',
        'tree_chart_data' => 'array',
    ];
}
