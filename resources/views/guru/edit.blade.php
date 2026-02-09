@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">✏️ Edit Guru</h1>

    <form method="POST" action="{{ route('guru.update', $guru->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1">NIP</label>
            <input type="text" name="nip"
                   class="w-full border rounded px-3 py-2"
                   value="{{ $guru->nip }}">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Nama</label>
            <input type="text" name="nama"
                   class="w-full border rounded px-3 py-2"
                   value="{{ $guru->nama }}">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Mata Pelajaran</label>
            <input type="text" name="mapel"
                   class="w-full border rounded px-3 py-2"
                   value="{{ $guru->mapel }}">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('guru.index') }}" class="text-gray-600">← Kembali</a>
            <button class="bg-yellow-500 text-white px-4 py-2 rounded">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
