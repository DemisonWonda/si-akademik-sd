@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">➕ Input Nilai</h1>

    <form method="POST" action="{{ route('nilai.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Siswa</label>
            <select name="siswa_id" class="w-full border rounded px-3 py-2">
                <option value="">-- Pilih Siswa --</option>
                @foreach($siswas as $s)
                    <option value="{{ $s->id }}">{{ $s->nama }}</option>
                @endforeach
            </select>
            @error('siswa_id') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Mata Pelajaran</label>
            <select name="mata_pelajaran_id" class="w-full border rounded px-3 py-2">
                <option value="">-- Pilih Mapel --</option>
                @foreach($mapels as $m)
                    <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                @endforeach
            </select>
            @error('mata_pelajaran_id') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Nilai</label>
            <input type="number" name="nilai" min="0" max="100"
                   class="w-full border rounded px-3 py-2"
                   placeholder="0 - 100">
            @error('nilai') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('nilai.index') }}" class="text-gray-600">← Kembali</a>
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection
