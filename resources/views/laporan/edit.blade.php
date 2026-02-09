@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6">
    <h1 class="text-xl font-bold mb-4">✏️ Edit Laporan</h1>

    <form method="POST" action="{{ route('laporan.update',$laporan->id) }}" class="space-y-4">
        @csrf @method('PUT')

        <select name="siswa_id" class="w-full border p-2" required>
            @foreach($siswas as $siswa)
                <option value="{{ $siswa->id }}"
                    {{ $laporan->siswa_id == $siswa->id ? 'selected' : '' }}>
                    {{ $siswa->nama }}
                </option>
            @endforeach
        </select>

        <input type="date" name="periode_mulai"
               value="{{ $laporan->periode_mulai }}"
               class="w-full border p-2" required>

        <input type="date" name="periode_selesai"
               value="{{ $laporan->periode_selesai }}"
               class="w-full border p-2" required>

        <button class="bg-yellow-600 text-white px-4 py-2 rounded">
            Update Laporan
        </button>
    </form>
</div>
@endsection
