<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananSop extends Model
{
    use HasFactory;

    protected $table = 'layanan_sop';

    protected $fillable = [
        'service_code',
        'bidang',
        'service_title',
        'category',
        'sla',
        'cost',
        'executors',
        'description',
        'official_sop_file',
        'official_sop_name',
        'official_sop_size',
    ];

    public function submissions()
    {
        return $this->hasMany(LayananSopSubmission::class, 'service_code', 'service_code');
    }
}
