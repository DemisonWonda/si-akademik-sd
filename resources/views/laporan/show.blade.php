@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6">
    <h1 class="text-xl font-bold mb-4">📄 Detail Laporan</h1>

    <ul class="space-y-2">
        <li><b>Siswa:</b> {{ $laporan->siswa->nama }}</li>
        <li><b>Periode:</b> {{ $laporan->periode_mulai }} s/d {{ $laporan->periode_selesai }}</li>
        <li><b>Hadir:</b> {{ $laporan->hadir }}</li>
        <li><b>Izin:</b> {{ $laporan->izin }}</li>
        <li><b>Sakit:</b> {{ $laporan->sakit }}</li>
        <li><b>Alpha:</b> {{ $laporan->alpha }}</li>
    </ul>

    <a href="{{ route('laporan.index') }}"
       class="inline-block mt-4 bg-gray-600 text-white px-4 py-2 rounded">
        Kembali
    </a>
</div>
@endsection
