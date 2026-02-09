<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'hadir',
        'izin',
        'sakit',
        'alpha',
        'periode_mulai',
        'periode_selesai',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    
}
