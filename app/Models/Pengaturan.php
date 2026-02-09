<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use HasFactory;

    // Tabel yang digunakan
    protected $table = 'pengaturans';

    // Field yang bisa diisi massal (mass assignment)
    protected $fillable = [
        'nama_sekolah',
        'alamat',
        'telepon',
    ];

    // Jika ingin menonaktifkan timestamps
    // public $timestamps = false;
}
