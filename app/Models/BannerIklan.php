<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerIklan extends Model
{
    use HasFactory;

    protected $table = 'banner_iklans';

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'image',
        'link_url',
        'target',
        'type',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];
}
