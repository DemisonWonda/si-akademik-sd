@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">📄 Detail Mata Pelajaran</h1>

    <p class="mb-3">
        <strong>Nama Mata Pelajaran:</strong> {{ $mapel->nama_mapel }}
    </p>

    <div class="mt-6">
        <a href="{{ route('mata-pelajaran.index') }}"
           class="bg-gray-600 text-white px-4 py-2 rounded">
            Kembali
        </a>
    </div>
</div>
@endsection
