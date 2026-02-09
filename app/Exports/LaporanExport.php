<?php

namespace App\Exports;

use App\Models\Laporan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Laporan::with('siswa')->get()->map(function ($l) {
            return [
                $l->siswa->nama,
                $l->periode_mulai,
                $l->periode_selesai,
                $l->hadir,
                $l->izin,
                $l->sakit,
                $l->alpha,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama Siswa',
            'Periode Mulai',
            'Periode Selesai',
            'Hadir',
            'Izin',
            'Sakit',
            'Alpha',
        ];
    }
}
