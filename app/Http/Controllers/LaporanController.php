<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Absensi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Tampilkan semua laporan
   public function index()
{
    $laporans = Laporan::with('siswa.kelas')
        ->latest()
        ->get();

    return view('laporan.index', compact('laporans'));
}


    // Form generate laporan
    public function create()
    {
        $siswas = Siswa::orderBy('nama')->get();
        return view('laporan.create', compact('siswas'));
    }

    // Generate & simpan laporan
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'periode_mulai' => 'required|date',
            'periode_selesai' => 'required|date|after_or_equal:periode_mulai',
        ]);

        $absensi = Absensi::where('siswa_id', $request->siswa_id)
            ->whereBetween('tanggal', [
                $request->periode_mulai,
                $request->periode_selesai
            ])
            ->get();

        $data = [
            'siswa_id' => $request->siswa_id,
            'hadir' => $absensi->where('status', 'Hadir')->count(),
            'izin'  => $absensi->where('status', 'Izin')->count(),
            'sakit' => $absensi->where('status', 'Sakit')->count(),
            'alpha' => $absensi->where('status', 'Alpha')->count(),
            'periode_mulai' => $request->periode_mulai,
            'periode_selesai' => $request->periode_selesai,
        ];

        Laporan::create($data);

       return redirect()
    ->route('laporan.index')
    ->with('success', 'Laporan berhasil dibuat');

    }

    // Detail laporan
    public function show(Laporan $laporan)
    {
        return view('laporan.show', compact('laporan'));
    }

    // Hapus laporan
    public function destroy(Laporan $laporan)
    {
        $laporan->delete();

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil dihapus');
    }
    public function print(Laporan $laporan)
{
    $laporan->load('siswa.kelas');

    return view('laporan.print', compact('laporan'));
}



}
