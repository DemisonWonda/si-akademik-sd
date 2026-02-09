@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">📅 Data Absensi</h1>
        <a href="{{ route('absensi.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Input Absensi
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
                    <th class="p-3 border">Nama Siswa</th>
                    <th class="p-3 border w-32">Tanggal</th>
                    <th class="p-3 border w-32">Status</th>
                    <th class="p-3 border w-48 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($absensis as $a)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 border text-center">{{ $loop->iteration }}</td>
                    <td class="p-3 border">{{ $a->siswa->nama }}</td>
                    <td class="p-3 border text-center">{{ $a->tanggal }}</td>
                    <td class="p-3 border text-center font-semibold
                        @if($a->status=='Hadir') text-green-600
                        @elseif($a->status=='Izin') text-yellow-600
                        @elseif($a->status=='Sakit') text-blue-600
                        @else text-red-600 @endif">
                        {{ $a->status }}
                    </td>
                    <td class="p-3 border text-center space-x-2">
                        <a href="{{ route('absensi.show', $a->id) }}"
                           class="text-blue-600 hover:underline">Detail</a>
                        <a href="{{ route('absensi.edit', $a->id) }}"
                           class="text-yellow-600 hover:underline">Edit</a>
                        <form action="{{ route('absensi.destroy', $a->id) }}"
                              method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Hapus absensi ini?')"
                                    class="text-red-600 hover:underline">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-4 text-center text-gray-500">
                        Data absensi belum tersedia
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
