<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Tampilkan semua nilai
     */
    public function index()
    {
        $nilais = Nilai::with(['siswa','mataPelajaran'])->get();
        return view('nilai.index', compact('nilais'));
    }

    /**
     * Form tambah nilai
     */
    public function create()
    {
        $siswas = Siswa::all();
        $mapels = MataPelajaran::all();
        return view('nilai.create', compact('siswas','mapels'));
    }

    /**
     * Simpan nilai
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'mata_pelajaran_id' => 'required|exists:mata_pelajarans,id',
            'nilai' => 'required|integer|min:0|max:100'
        ]);

        Nilai::create($request->all());

        return redirect()
            ->route('nilai.index')
            ->with('success', 'Nilai berhasil disimpan');
    }

    /**
     * Detail nilai
     */
    public function show(Nilai $nilai)
    {
        return view('nilai.show', compact('nilai'));
    }

    /**
     * Form edit nilai
     */
    public function edit(Nilai $nilai)
    {
        $siswas = Siswa::all();
        $mapels = MataPelajaran::all();
        return view('nilai.edit', compact('nilai','siswas','mapels'));
    }

    /**
     * Update nilai
     */
    public function update(Request $request, Nilai $nilai)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'mata_pelajaran_id' => 'required|exists:mata_pelajarans,id',
            'nilai' => 'required|integer|min:0|max:100'
        ]);

        $nilai->update($request->all());

        return redirect()
            ->route('nilai.index')
            ->with('success', 'Nilai berhasil diperbarui');
    }

    /**
     * Hapus nilai
     */
    public function destroy(Nilai $nilai)
    {
        $nilai->delete();

        return redirect()
            ->route('nilai.index')
            ->with('success', 'Nilai berhasil dihapus');
    }
}
