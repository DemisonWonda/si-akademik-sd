@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">📝 Data Nilai</h1>
        <a href="{{ route('nilai.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Input Nilai
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded overflow-x-auto">
        <table class="w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 border w-16">No</th>
                    <th class="p-3 border">Siswa</th>
                    <th class="p-3 border">Mata Pelajaran</th>
                    <th class="p-3 border w-24">Nilai</th>
                    <th class="p-3 border w-48 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($nilais as $n)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 border text-center">{{ $loop->iteration }}</td>
                    <td class="p-3 border">{{ $n->siswa->nama }}</td>
                    <td class="p-3 border">{{ $n->mataPelajaran->nama_mapel }}</td>
                    <td class="p-3 border text-center font-semibold">{{ $n->nilai }}</td>
                    <td class="p-3 border text-center space-x-2">
                        <a href="{{ route('nilai.show', $n->id) }}" class="text-blue-600 hover:underline">Detail</a>
                        <a href="{{ route('nilai.edit', $n->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                        <form action="{{ route('nilai.destroy', $n->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Hapus nilai ini?')" class="text-red-600 hover:underline">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-4 text-center text-gray-500">
                        Data nilai belum tersedia
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
