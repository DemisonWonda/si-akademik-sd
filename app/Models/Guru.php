<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi (sesuai tabel gurus)
    protected $fillable = [
        'nip',
        'nama',
        'mapel'
    ];
}
