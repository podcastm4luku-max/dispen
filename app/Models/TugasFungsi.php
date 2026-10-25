<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasFungsi extends Model
{
    use HasFactory;

    protected $table = 'tugas_fungsi';
    protected $guarded = [];

    protected $casts = [
        'fungsi_items' => 'array',
        'ruang_lingkup_items' => 'array',
    ];
}
