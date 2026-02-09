@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 p-6">

    {{-- HEADER --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-800">➕ Generate Laporan Absensi</h1>
        <p class="text-slate-500">Pilih siswa dan periode laporan</p>
    </div>

    {{-- ERROR VALIDASI --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-4 rounded-lg">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM --}}
    <div class="bg-white rounded-xl shadow border p-6 max-w-xl">
        <form action="{{ route('laporan.store') }}" method="POST" class="space-y-5">
            @csrf

            {{-- SISWA --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">
                    Siswa
                </label>
                <select name="siswa_id"
                    class="w-full rounded-lg border-slate-300 focus:border-blue-500 focus:ring-blue-500">
                    <option value="">-- Pilih Siswa --</option>
                    @foreach($siswas as $siswa)
                        <option value="{{ $siswa->id }}">
                            {{ $siswa->nama }} ({{ $siswa->kelas->nama_kelas ?? '-' }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- PERIODE --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">
                        Periode Mulai
                    </label>
                    <input type="date" name="periode_mulai"
                        class="w-full rounded-lg border-slate-300 focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">
                        Periode Selesai
                    </label>
                    <input type="date" name="periode_selesai"
                        class="w-full rounded-lg border-slate-300 focus:border-blue-500 focus:ring-blue-500">
                </div>
            </div>

            {{-- BUTTON --}}
            <div class="flex gap-3">
                <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
                    Generate
                </button>
                <a href="{{ route('laporan.index') }}"
                    class="px-5 py-2 rounded-lg border text-slate-600 hover:bg-slate-100">
                    Kembali
                </a>
            </div>
        </form>
    </div>

</div>
@endsection
