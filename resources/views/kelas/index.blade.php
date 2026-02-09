@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">🏫 Data Kelas</h1>
        <a href="{{ route('kelas.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Kelas
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded">
        <table class="w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 border w-20">No</th>
                    <th class="p-3 border">Nama Kelas</th>
                    <th class="p-3 border w-48 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kelas as $kls)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 border text-center">{{ $loop->iteration }}</td>
                    <td class="p-3 border">{{ $kls->nama_kelas }}</td>
                    <td class="p-3 border text-center space-x-2">
                        <a href="{{ route('kelas.show', $kls->id) }}"
                           class="text-blue-600 hover:underline">Detail</a>
                        <a href="{{ route('kelas.edit', $kls->id) }}"
                           class="text-yellow-600 hover:underline">Edit</a>
                        <form action="{{ route('kelas.destroy', $kls->id) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus kelas ini?')"
                                    class="text-red-600 hover:underline">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="p-4 text-center text-gray-500">
                        Data kelas belum tersedia
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
