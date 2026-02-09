@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">✏️ Edit Mata Pelajaran</h1>

    <form method="POST" action="{{ route('mata-pelajaran.update', $mapel->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1">Nama Mata Pelajaran</label>
            <input type="text" name="nama_mapel"
                   class="w-full border rounded px-3 py-2"
                   value="{{ $mapel->nama_mapel }}">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('mata-pelajaran.index') }}" class="text-gray-600">← Kembali</a>
            <button class="bg-yellow-500 text-white px-4 py-2 rounded">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
