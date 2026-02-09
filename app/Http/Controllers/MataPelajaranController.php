<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    /**
     * Tampilkan semua mata pelajaran
     */
    public function index()
    {
        $mapels = MataPelajaran::all();
        return view('mata-pelajaran.index', compact('mapels'));
    }

    /**
     * Form tambah mata pelajaran
     */
    public function create()
    {
        return view('mata-pelajaran.create');
    }

    /**
     * Simpan data mata pelajaran
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_mapel' => 'required'
        ]);

        MataPelajaran::create($request->all());

        return redirect()
            ->route('mata-pelajaran.index')
            ->with('success', 'Data mata pelajaran berhasil disimpan');
    }

    /**
     * Detail mata pelajaran
     */
    public function show(MataPelajaran $mata_pelajaran)
    {
        return view('mata-pelajaran.show', compact('mata_pelajaran'));
    }

    /**
     * Form edit mata pelajaran
     */
    public function edit(MataPelajaran $mata_pelajaran)
    {
        return view('mata-pelajaran.edit', compact('mata_pelajaran'));
    }

    /**
     * Update data mata pelajaran
     */
    public function update(Request $request, MataPelajaran $mata_pelajaran)
    {
        $request->validate([
            'nama_mapel' => 'required'
        ]);

        $mata_pelajaran->update($request->all());

        return redirect()
            ->route('mata-pelajaran.index')
            ->with('success', 'Data mata pelajaran berhasil diperbarui');
    }

    /**
     * Hapus data mata pelajaran
     */
    public function destroy(MataPelajaran $mata_pelajaran)
    {
        $mata_pelajaran->delete();

        return redirect()
            ->route('mata-pelajaran.index')
            ->with('success', 'Data mata pelajaran berhasil dihapus');
    }
}
