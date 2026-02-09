<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Sekolah</title>
       <meta charset="UTF-8">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style class="bg-slate-50">
        body { margin:0; font-family: Arial; }
        .sidebar {
            width: 220px;
            height: 100vh;
            background: #1e293b;
            color: white;
            position: fixed;
        }
        .sidebar h2 {
            text-align: center;
            padding: 15px;
            background: #0f172a;
        }
        .sidebar a {
            display: block;
            color: white;
            padding: 12px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #334155;
        }
        .content {
            margin-left: 220px;
            padding: 20px;
            background: #f1f5f9;
            min-height: 100vh;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 6px;
            margin-bottom: 15px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(200px,1fr));
            gap: 15px;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<aside class="w-64 bg-gray-800 text-white flex flex-col fixed h-screen shadow-lg">
    <!-- Logo -->
   <div class="flex items-center gap-3 p-4 bg-gray-900">
    <img src="{{ asset('images/logo-sekolah.png') }}" 
         alt="Logo Sekolah" 
         class="w-12 h-12 rounded-full object-cover">
    <span class="text-lg md:text-xl font-bold text-blue-500">SD KOYA</span>
</div>


    <!-- Menu -->
    <nav class="flex-1 p-4 space-y-2">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2 p-3 rounded hover:bg-gray-700 transition">📊 Dashboard</a>
        <a href="{{ route('siswa.index') }}" class="flex items-center gap-2 p-3 rounded hover:bg-gray-700 transition">👨‍🎓 Siswa</a>
        <a href="{{ route('guru.index') }}" class="flex items-center gap-2 p-3 rounded hover:bg-gray-700 transition">👩‍🏫 Guru</a>
        <a href="{{ route('kelas.index') }}" class="flex items-center gap-2 p-3 rounded hover:bg-gray-700 transition">🏫 Kelas</a>
        <a href="{{ route('mata-pelajaran.index') }}" class="flex items-center gap-2 p-3 rounded hover:bg-gray-700 transition">📘 Mata Pelajaran</a>
        <a href="{{ route('nilai.index') }}" class="flex items-center gap-2 p-3 rounded hover:bg-gray-700 transition">📝 Nilai</a>
        <a href="{{ route('absensi.index') }}" class="flex items-center gap-2 p-3 rounded hover:bg-gray-700 transition">📅 Absensi</a>
        <a href="{{ route('laporan.index') }}" class="flex items-center gap-2 p-3 rounded hover:bg-gray-700 transition">📊 Laporan</a>
        <a href="{{ route('pengaturan.index') }}" class="flex items-center gap-2 p-3 rounded hover:bg-gray-700 transition">⚙️ Pengaturan</a>
    
       <!-- Divider -->
    <hr class="border-gray-600 my-2">

    <!-- Logout Button -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="flex items-center gap-2 p-3 w-full rounded hover:bg-red-600 transition text-white">
            🔒 Keluar
        </button>
    </form>
    
    </nav>
</aside>


<div class="content">
    @yield('content')
</div>

</body>
</html>
