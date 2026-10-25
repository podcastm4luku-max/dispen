<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegulasiDokumen extends Model
{
    use HasFactory;

    protected $table = 'regulasi_dokumens';

    protected $fillable = [
        'no',
        'title',
        'tag',
        'badge',
        'url',
        'file_path',
        'is_active',
        'download_count',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'no' => 'integer',
        'download_count' => 'integer',
    ];
}