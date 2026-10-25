<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonevRegion extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_wilayah',
        'jumlah_sma',
        'jumlah_smk',
        'jumlah_slb',
        'total',
        'link_detail',
        'contoh_sekolah',
        'urutan',
    ];
}