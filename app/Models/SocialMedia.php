<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $table = 'social_media';

    protected $fillable = [
        'platform',
        'name',
        'username',
        'url',
        'icon',
        'color_class',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function getIconClassAttribute(): string
    {
        if (!empty($this->icon)) {
            return $this->icon;
        }

        return match (strtolower($this->platform)) {
            'instagram', 'ig' => 'fab fa-instagram',
            'tiktok' => 'fab fa-tiktok',
            'youtube', 'yt' => 'fab fa-youtube',
            'facebook', 'fb' => 'fab fa-facebook-f',
            'twitter', 'x' => 'fab fa-x-twitter',
            default => 'fas fa-share-alt',
        };
    }

    public function getBadgeBgClassAttribute(): string
    {
        if (!empty($this->color_class)) {
            return $this->color_class;
        }

        return match (strtolower($this->platform)) {
            'instagram', 'ig' => 'bg-gradient-to-tr from-amber-500 via-pink-600 to-purple-600',
            'tiktok' => 'bg-slate-900 border border-slate-700',
            'youtube', 'yt' => 'bg-red-600',
            'facebook', 'fb' => 'bg-blue-600',
            'twitter', 'x' => 'bg-black',
            default => 'bg-dikbud-primary',
        };
    }
}