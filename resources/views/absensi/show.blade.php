@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">📄 Detail Absensi</h1>

    <p class="mb-2"><strong>Siswa:</strong> {{ $absensi->siswa->nama }}</p>
    <p class="mb-2"><strong>Tanggal:</strong> {{ $absensi->tanggal }}</p>
    <p class="mb-2"><strong>Status:</strong> {{ $absensi->status }}</p>

    <div class="mt-6">
        <a href="{{ route('absensi.index') }}"
           class="bg-gray-600 text-white px-4 py-2 rounded">
            Kembali
        </a>
    </div>
</div>
@endsection
