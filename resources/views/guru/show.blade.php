@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">📄 Detail Guru</h1>

    <div class="space-y-3">
        <p><strong>NIP:</strong> {{ $guru->nip }}</p>
        <p><strong>Nama:</strong> {{ $guru->nama }}</p>
        <p><strong>Mata Pelajaran:</strong> {{ $guru->mapel }}</p>
    </div>

    <div class="mt-6">
        <a href="{{ route('guru.index') }}"
           class="bg-gray-600 text-white px-4 py-2 rounded">
            Kembali
        </a>
    </div>
</div>
@endsection
