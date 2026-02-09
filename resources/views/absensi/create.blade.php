@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">➕ Input Absensi</h1>

    <form method="POST" action="{{ route('absensi.store') }}">
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
            <label class="block mb-1">Tanggal</label>
            <input type="date" name="tanggal"
                   class="w-full border rounded px-3 py-2"
                   value="{{ date('Y-m-d') }}">
            @error('tanggal') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="">-- Pilih Status --</option>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Alpha">Alpha</option>
            </select>
            @error('status') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('absensi.index') }}" class="text-gray-600">← Kembali</a>
            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
