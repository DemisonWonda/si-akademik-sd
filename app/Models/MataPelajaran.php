<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi
    protected $fillable = [
        'nama_mapel'
    ];

    // Relasi ke nilai
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
