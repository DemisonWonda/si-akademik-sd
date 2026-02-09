@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Data Pengaturan Sekolah</h1>

    <a href="{{ route('pengaturan.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Data</a>

    <table class="table-auto w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Nama Sekolah</th>
                <th class="px-4 py-2 border">Alamat</th>
                <th class="px-4 py-2 border">Telepon</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengaturans as $item)
                <tr>
                    <td class="px-4 py-2 border">{{ $item->id }}</td>
                    <td class="px-4 py-2 border">{{ $item->nama_sekolah }}</td>
                    <td class="px-4 py-2 border">{{ $item->alamat }}</td>
                    <td class="px-4 py-2 border">{{ $item->telepon }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
