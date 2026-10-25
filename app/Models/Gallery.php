<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries';

    protected $fillable = [
        'title',
        'type',          // 'foto' | 'video'
        'category',      // e.g. 'Kegiatan Kedinasan', 'Pendidikan', 'Kebudayaan', 'Prestasi'
        'file_path',     // uploaded file path
        'media_url',     // external image or youtube embed url
        'thumbnail',     // thumbnail image path/url for videos or photos
        'description',   // caption / deskripsi kegiatan
        'event_date',    // tanggal kegiatan
        'order',         // urutan tampil
        'is_active',     // status aktif
    ];

    protected $appends = [
        'display_url',
        'file_url',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
        'event_date' => 'date',
    ];

    public function getDisplayImageAttribute()
    {
        if ($this->isVideo()) {
            if (!empty($this->thumbnail)) {
                return $this->thumbnail;
            }
            if (!empty($this->media_url) && ($yt = $this->youtubeThumbnail($this->media_url))) {
                return $yt;
            }
            if ($this->isImageFile($this->file_path)) {
                return $this->file_path;
            }
            return '/images/slider-default.jpg';
        }

        // type == 'foto'
        if (!empty($this->file_path)) {
            return $this->file_path;
        }
        if (!empty($this->media_url)) {
            return $this->media_url;
        }
        if (!empty($this->thumbnail)) {
            return $this->thumbnail;
        }
        return '/images/slider-default.jpg';
    }

    public function getDisplayUrlAttribute()
    {
        return $this->toPublicUrl($this->display_image);
    }

    public function getFileUrlAttribute()
    {
        return $this->toPublicUrl($this->file_path);
    }

    public function isVideo(): bool
    {
        return strtolower((string) $this->type) === 'video';
    }

    protected function toPublicUrl(?string $path): ?string
    {
        $path = trim((string) $path);

        if ($path === '') {
            return null;
        }

        if (preg_match('#^https?://#i', $path)) {
            return $path;
        }

        $normalized = ltrim(str_replace('\\', '/', $path), '/');
        $candidates = [$normalized];

        if (preg_match('#^(?:public|storage)/(.+)$#i', $normalized, $m)) {
            array_unshift($candidates, $m[1]);
        } else {
            $candidates[] = 'storage/' . $normalized;
        }

        foreach ($candidates as $candidate) {
            if (is_file(public_path($candidate))) {
                return asset($candidate);
            }
            if (is_file(storage_path('app/public/' . $candidate))) {
                return asset('storage/' . $candidate);
            }
        }

        return asset($normalized);
    }

    private function isImageFile(?string $path): bool
    {
        $path = (string) $path;

        if ($path === '' || preg_match('#^https?://#i', $path)) {
            return false;
        }

        return (bool) preg_match('/\.(jpe?g|png|gif|webp|bmp|avif|svg)$/i', $path);
    }

    private function youtubeThumbnail(string $url): ?string
    {
        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i', $url, $match)) {
            return 'https://img.youtube.com/vi/' . $match[1] . '/hqdefault.jpg';
        }

        return null;
    }
}
