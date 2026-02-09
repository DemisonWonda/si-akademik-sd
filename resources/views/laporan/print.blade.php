<!DOCTYPE html>
<html>
<head>
    <title>Print Laporan</title>
    <style>
        body { font-family: Arial; }
        @media print {
            button { display:none; }
        }
    </style>
</head>
<body onload="window.print()">

<h2>Laporan Absensi</h2>

<p><b>Nama:</b> {{ $laporan->siswa->nama }}</p>
<p><b>Periode:</b> {{ $laporan->periode_mulai }} s/d {{ $laporan->periode_selesai }}</p>

<ul>
    <li>Hadir: {{ $laporan->hadir }}</li>
    <li>Izin: {{ $laporan->izin }}</li>
    <li>Sakit: {{ $laporan->sakit }}</li>
    <li>Alpha: {{ $laporan->alpha }}</li>
</ul>

</body>
</html>
