@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">✏️ Edit Absensi</h1>

    <form method="POST" action="{{ route('absensi.update', $absensi->id) }}">
        @csrf @method('PUT')

        <div class="mb-4">
            <label class="block mb-1">Siswa</label>
            <select name="siswa_id" class="w-full border rounded px-3 py-2">
                @foreach($siswas as $s)
                    <option value="{{ $s->id }}" {{ $absensi->siswa_id == $s->id ? 'selected' : '' }}>
                        {{ $s->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Tanggal</label>
            <input type="date" name="tanggal"
                   value="{{ $absensi->tanggal }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                @foreach(['Hadir','Izin','Sakit','Alpha'] as $st)
                    <option value="{{ $st }}" {{ $absensi->status == $st ? 'selected' : '' }}>
                        {{ $st }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('absensi.index') }}" class="text-gray-600">← Kembali</a>
            <button class="bg-yellow-500 text-white px-4 py-2 rounded">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
