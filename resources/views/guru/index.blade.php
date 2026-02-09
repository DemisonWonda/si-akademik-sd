@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">👩‍🏫 Data Guru</h1>
        <a href="{{ route('guru.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Guru
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 border">No</th>
                    <th class="p-3 border">NIP</th>
                    <th class="p-3 border">Nama</th>
                    <th class="p-3 border">Mapel</th>
                    <th class="p-3 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($gurus as $guru)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 border text-center">{{ $loop->iteration }}</td>
                    <td class="p-3 border">{{ $guru->nip }}</td>
                    <td class="p-3 border">{{ $guru->nama }}</td>
                    <td class="p-3 border">{{ $guru->mapel }}</td>
                    <td class="p-3 border text-center space-x-2">
                        <a href="{{ route('guru.show', $guru->id) }}"
                           class="text-blue-600 hover:underline">Detail</a>
                        <a href="{{ route('guru.edit', $guru->id) }}"
                           class="text-yellow-600 hover:underline">Edit</a>
                        <form action="{{ route('guru.destroy', $guru->id) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus data?')"
                                    class="text-red-600 hover:underline">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-4 text-center text-gray-500">
                        Data guru belum ada
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
