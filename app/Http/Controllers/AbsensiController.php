<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Tampilkan data absensi
     */
    public function index()
    {
        $absensis = Absensi::with('siswa')->orderBy('tanggal', 'desc')->get();
        return view('absensi.index', compact('absensis'));
    }

    /**
     * Form input absensi
     */
    public function create()
    {
        $siswas = Siswa::all();
        return view('absensi.create', compact('siswas'));
    }

    /**
     * Simpan absensi
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'tanggal'  => 'required|date',
            'status'   => 'required|in:Hadir,Izin,Sakit,Alpha'
        ]);

        Absensi::create($request->all());

        return redirect()
            ->route('absensi.index')
            ->with('success', 'Absensi berhasil disimpan');
    }

    /**
     * Detail absensi
     */
    public function show(Absensi $absensi)
    {
        return view('absensi.show', compact('absensi'));
    }

    /**
     * Form edit absensi
     */
    public function edit(Absensi $absensi)
    {
        $siswas = Siswa::all();
        return view('absensi.edit', compact('absensi', 'siswas'));
    }

    /**
     * Update absensi
     */
    public function update(Request $request, Absensi $absensi)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'tanggal'  => 'required|date',
            'status'   => 'required|in:Hadir,Izin,Sakit,Alpha'
        ]);

        $absensi->update($request->all());

        return redirect()
            ->route('absensi.index')
            ->with('success', 'Absensi berhasil diperbarui');
    }

    /**
     * Hapus absensi
     */
    public function destroy(Absensi $absensi)
    {
        $absensi->delete();

        return redirect()
            ->route('absensi.index')
            ->with('success', 'Absensi berhasil dihapus');
    }
}
