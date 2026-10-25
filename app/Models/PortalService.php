<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortalService extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'badge',
        'icon',
        'icon_color',
        'description',
        'url',
        'action_text',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];
}
