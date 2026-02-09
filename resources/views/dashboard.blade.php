@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 p-6 font-sans">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800">📊 Dashboard Akademik</h1>
            <p class="text-slate-500 mt-1">Ringkasan statistik sistem akademik</p>
        </div>
        <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-lg shadow border">
            <span class="relative flex h-3 w-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                <span class="relative inline-flex h-3 w-3 rounded-full bg-green-500"></span>
            </span>
            <span class="text-sm font-semibold text-slate-600">
                {{ now()->format('l, d M Y') }}
            </span>
        </div>
    </div>

    {{-- STAT CARDS --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

        @php
            $cards = [
                ['label'=>'Total Siswa','value'=>$siswa,'color'=>'blue','icon'=>'🎓'],
                ['label'=>'Total Guru','value'=>$guru,'color'=>'emerald','icon'=>'👨‍🏫'],
                ['label'=>'Total Kelas','value'=>$kelas,'color'=>'violet','icon'=>'🏫'],
                ['label'=>'Mata Pelajaran','value'=>$mapel,'color'=>'amber','icon'=>'📚'],
            ];
        @endphp

        @foreach($cards as $c)
        <div class="bg-white rounded-2xl p-6 shadow-sm border hover:shadow-lg transition">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm font-semibold text-slate-500 uppercase">{{ $c['label'] }}</p>
                    <h2 class="text-3xl font-extrabold text-slate-800 mt-2">
                        {{ number_format($c['value']) }}
                    </h2>
                </div>
                <div class="text-3xl bg-{{ $c['color'] }}-50 text-{{ $c['color'] }}-600 p-4 rounded-xl">
                    {{ $c['icon'] }}
                </div>
            </div>
        </div>
        @endforeach

    </div>

    {{-- CHART SECTION --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- BAR CHART --}}
        <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-sm border">
            <h3 class="text-xl font-bold text-slate-800 mb-4">📈 Statistik Data</h3>
            <canvas id="barChart" height="120"></canvas>
        </div>

        {{-- PIE CHART --}}
        <div class="bg-white rounded-2xl p-6 shadow-sm border">
            <h3 class="text-xl font-bold text-slate-800 mb-6">👥 Rasio Civitas</h3>
            <canvas id="pieChart"></canvas>

            @php $total = $siswa + $guru; @endphp

            <div class="mt-6 space-y-3 text-sm">
                <div class="flex justify-between">
                    <span class="flex items-center gap-2 text-slate-600">
                        <span class="h-3 w-3 bg-blue-500 rounded-full"></span> Siswa
                    </span>
                    <strong>
                        {{ $total > 0 ? round(($siswa/$total)*100) : 0 }}%
                    </strong>
                </div>

                <div class="flex justify-between">
                    <span class="flex items-center gap-2 text-slate-600">
                        <span class="h-3 w-3 bg-emerald-500 rounded-full"></span> Guru
                    </span>
                    <strong>
                        {{ $total > 0 ? round(($guru/$total)*100) : 0 }}%
                    </strong>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- CHART JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    Chart.defaults.font.family = "'Inter', sans-serif";
    Chart.defaults.color = '#64748b';

    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: ['Siswa', 'Guru', 'Kelas', 'Mapel'],
            datasets: [{
                data: [{{ $siswa }}, {{ $guru }}, {{ $kelas }}, {{ $mapel }}],
                backgroundColor: ['#3b82f6','#10b981','#8b5cf6','#f59e0b'],
                borderRadius: 8,
                barThickness: 40
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { display: false }},
                x: { grid: { display: false }}
            }
        }
    });

    new Chart(document.getElementById('pieChart'), {
        type: 'doughnut',
        data: {
            labels: ['Siswa','Guru'],
            datasets: [{
                data: [{{ $siswa }}, {{ $guru }}],
                backgroundColor: ['#3b82f6','#10b981'],
                borderWidth: 0,
                cutout: '70%'
            }]
        },
        options: { plugins: { legend: { display: false }} }
    });
</script>
@endsection
