@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Tambah Pengaturan Sekolah</h1>

    <form action="{{ route('pengaturan.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block mb-1">Nama Sekolah</label>
            <input type="text" name="nama_sekolah" class="border px-2 py-1 w-full" required>
        </div>
        <div>
            <label class="block mb-1">Alamat</label>
            <input type="text" name="alamat" class="border px-2 py-1 w-full">
        </div>
        <div>
            <label class="block mb-1">Telepon</label>
            <input type="text" name="telepon" class="border px-2 py-1 w-full">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
