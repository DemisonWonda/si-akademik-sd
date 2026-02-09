@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">✏️ Edit Nilai</h1>

    <form method="POST" action="{{ route('nilai.update', $nilai->id) }}">
        @csrf @method('PUT')

        <div class="mb-4">
            <label class="block mb-1">Siswa</label>
            <select name="siswa_id" class="w-full border rounded px-3 py-2">
                @foreach($siswas as $s)
                    <option value="{{ $s->id }}" {{ $nilai->siswa_id == $s->id ? 'selected' : '' }}>
                        {{ $s->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Mata Pelajaran</label>
            <select name="mata_pelajaran_id" class="w-full border rounded px-3 py-2">
                @foreach($mapels as $m)
                    <option value="{{ $m->id }}" {{ $nilai->mata_pelajaran_id == $m->id ? 'selected' : '' }}>
                        {{ $m->nama_mapel }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Nilai</label>
            <input type="number" name="nilai" min="0" max="100"
                   value="{{ $nilai->nilai }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('nilai.index') }}" class="text-gray-600">← Kembali</a>
            <button class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
        </div>
    </form>
</div>
@endsection
