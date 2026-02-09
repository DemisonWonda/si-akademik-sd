<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Tampilkan semua kelas
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Form tambah kelas
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Simpan data kelas
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required'
        ]);

        Kelas::create($request->all());

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas berhasil disimpan');
    }

    /**
     * Detail kelas
     */
    public function show(Kelas $kelas)
    {
        return view('kelas.show', compact('kelas'));
    }

    /**
     * Form edit kelas
     */
    public function edit(Kelas $kelas)
    {
        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Update data kelas
     */
    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'nama_kelas' => 'required'
        ]);

        $kelas->update($request->all());

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas berhasil diperbarui');
    }

    /**
     * Hapus data kelas
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas berhasil dihapus');
    }
}
