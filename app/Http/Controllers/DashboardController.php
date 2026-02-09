<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MataPelajaran;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'siswa' => Siswa::count(),
            'guru' => Guru::count(),
            'kelas' => Kelas::count(),
            'mapel' => MataPelajaran::count(),
        ]);
    }
}
