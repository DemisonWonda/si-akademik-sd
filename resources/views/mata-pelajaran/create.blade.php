@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">➕ Tambah Mata Pelajaran</h1>

    <form method="POST" action="{{ route('mata-pelajaran.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Nama Mata Pelajaran</label>
            <input type="text" name="nama_mapel"
                   class="w-full border rounded px-3 py-2"
                   placeholder="Contoh: Matematika"
                   value="{{ old('nama_mapel') }}">
            @error('nama_mapel')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('mata-pelajaran.index') }}" class="text-gray-600">← Kembali</a>
            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
