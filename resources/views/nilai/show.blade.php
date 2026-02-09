@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">📄 Detail Nilai</h1>

    <p class="mb-2"><strong>Siswa:</strong> {{ $nilai->siswa->nama }}</p>
    <p class="mb-2"><strong>Mata Pelajaran:</strong> {{ $nilai->mataPelajaran->nama_mapel }}</p>
    <p class="mb-2"><strong>Nilai:</strong> {{ $nilai->nilai }}</p>

    <div class="mt-6">
        <a href="{{ route('nilai.index') }}"
           class="bg-gray-600 text-white px-4 py-2 rounded">Kembali</a>
    </div>
</div>
@endsection
