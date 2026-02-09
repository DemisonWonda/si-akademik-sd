<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    // Nama tabel (karena bukan plural default "kelas")
    protected $table = 'kelas';

    // Kolom yang boleh diisi
    protected $fillable = [
        'nama_kelas'
    ];

    // Relasi ke siswa
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
