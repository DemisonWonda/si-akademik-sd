<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaturan;

class PengaturanController extends Controller
{
    // Menampilkan list pengaturan
    public function index()
    {
        $pengaturans = Pengaturan::all();
        return view('pengaturan.index', compact('pengaturans'));
    }

    // Form create (opsional)
    public function create()
    {
        return view('pengaturan.create');
    }

    // Simpan data
    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
        ]);

        Pengaturan::create($request->all());

        return redirect()->route('pengaturan.index')->with('success', 'Data berhasil disimpan.');
    }
}
