<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Tampilkan semua data guru
     */
    public function index()
    {
        $gurus = Guru::all();
        return view('guru.index', compact('gurus'));
    }

    /**
     * Form tambah guru
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Simpan data guru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip'  => 'required|unique:gurus',
            'nama' => 'required',
            'mapel'=> 'required'
        ]);

        Guru::create($request->all());

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil disimpan');
    }

    /**
     * Detail guru
     */
    public function show(Guru $guru)
    {
        return view('guru.show', compact('guru'));
    }

    /**
     * Form edit guru
     */
    public function edit(Guru $guru)
    {
        return view('guru.edit', compact('guru'));
    }

    /**
     * Update data guru
     */
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nip'  => 'required|unique:gurus,nip,' . $guru->id,
            'nama' => 'required',
            'mapel'=> 'required'
        ]);

        $guru->update($request->all());

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil diperbarui');
    }

    /**
     * Hapus data guru
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil dihapus');
    }
}
