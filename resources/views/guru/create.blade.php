@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">➕ Tambah Guru</h1>

    <form method="POST" action="{{ route('guru.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">NIP</label>
            <input type="text" name="nip"
                   class="w-full border rounded px-3 py-2"
                   value="{{ old('nip') }}">
            @error('nip') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Nama</label>
            <input type="text" name="nama"
                   class="w-full border rounded px-3 py-2"
                   value="{{ old('nama') }}">
            @error('nama') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Mata Pelajaran</label>
            <input type="text" name="mapel"
                   class="w-full border rounded px-3 py-2"
                   value="{{ old('mapel') }}"
                   placeholder="Contoh: Matematika">
            @error('mapel') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('guru.index') }}" class="text-gray-600">← Kembali</a>
            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
