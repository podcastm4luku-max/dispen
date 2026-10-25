<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananSopSubmission extends Model
{
    use HasFactory;

    protected $table = 'layanan_sop_submissions';

    protected $fillable = [
        'service_code',
        'bidang',
        'service_title',
        'sender_name',
        'phone',
        'email',
        'instance',
        'notes',
        'file_path',
        'file_name',
        'file_size',
        'file_type',
        'status',
        'admin_notes',
    ];

    public function sop()
    {
        return $this->belongsTo(LayananSop::class, 'service_code', 'service_code');
    }
}
