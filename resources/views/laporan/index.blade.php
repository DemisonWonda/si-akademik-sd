@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 p-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
        <h1 class="text-2xl font-bold text-slate-800">
            📄 Data Laporan Absensi
        </h1>

        <a href="{{ route('laporan.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            + Generate Laporan
        </a>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="mb-4 bg-green-100 text-green-700 p-4 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- TABLE --}}
    <div class="bg-white rounded-xl shadow border overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-100 text-slate-700">
                <tr>
                    <th class="p-3 text-left">No</th>
                    <th class="p-3 text-left">Nama Siswa</th>
                    <th class="p-3 text-left">Kelas</th>
                    <th class="p-3 text-center">Hadir</th>
                    <th class="p-3 text-center">Izin</th>
                    <th class="p-3 text-center">Sakit</th>
                    <th class="p-3 text-center">Alpha</th>
                    <th class="p-3 text-center font-bold text-slate-800">
                        Total Hari
                    </th>
                    <th class="p-3 text-left">Periode</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($laporans as $laporan)
                <tr class="border-t hover:bg-slate-50">
                    <td class="p-3">{{ $loop->iteration }}</td>

                    <td class="p-3 font-medium">
                        {{ $laporan->siswa->nama ?? '-' }}
                    </td>

                    <td class="p-3">
                        {{ $laporan->siswa->kelas->nama_kelas ?? '-' }}
                    </td>

                    <td class="p-3 text-center text-green-600 font-semibold">
                        {{ $laporan->hadir }}
                    </td>

                    <td class="p-3 text-center text-blue-600 font-semibold">
                        {{ $laporan->izin }}
                    </td>

                    <td class="p-3 text-center text-yellow-600 font-semibold">
                        {{ $laporan->sakit }}
                    </td>

                    <td class="p-3 text-center text-red-600 font-semibold">
                        {{ $laporan->alpha }}
                    </td>

                    {{-- TOTAL --}}
                    <td class="p-3 text-center font-bold text-slate-800">
                        {{ $laporan->hadir + $laporan->izin + $laporan->sakit + $laporan->alpha }}
                    </td>

                    <td class="p-3 text-sm text-slate-600">
                        {{ $laporan->periode_mulai }} <br>
                        <span class="text-xs">s/d</span><br>
                        {{ $laporan->periode_selesai }}
                    </td>

                    {{-- AKSI --}}
                    <td class="p-3 text-center space-x-2">
                        <a href="{{ route('laporan.print', $laporan->id) }}"
                           target="_blank"
                           class="inline-block bg-slate-600 text-white px-3 py-1 rounded hover:bg-slate-700 text-xs">
                            🖨 Print
                        </a>

                        <!-- <a href="{{ route('laporan.pdf', $laporan->id) }}"
                           class="inline-block bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-xs">
                            📄 PDF
                        </a> -->
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="p-6 text-center text-slate-500">
                        Belum ada data laporan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
