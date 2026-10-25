<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    use HasFactory;

    protected $table = 'visi_misi';
    protected $guarded = [];

    protected $casts = [
        'misi_items' => 'array',
        'rumusan_singkat_misi' => 'array',
    ];
}
