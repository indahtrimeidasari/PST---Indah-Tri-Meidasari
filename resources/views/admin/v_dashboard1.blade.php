@extends('layout.v_template1')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-brown-800">Dashboard Pegawai</h1>
    </div>

    <!-- Kartu Statistik -->
    <div class="row">
        <!-- Total Media Tanam -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-brown shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-brown text-uppercase mb-1">Total Media Tanam</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahMediaTanam }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-leaf fa-2x text-brown-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Panen -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-brown shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-brown text-uppercase mb-1">Total Panen (kg)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPanen }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-seedling fa-2x text-brown-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panen Bulan Ini -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-brown shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-brown text-uppercase mb-1">Panen Bulan Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $panenBulanIni }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-brown-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik Panen Bulanan -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-brown">Grafik Panen Bulanan</h6>
                </div>
                <div class="card-body">
                    <canvas id="grafikPanen" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .text-brown { color: #8B4513 !important; }
    .text-brown-300 { color: #A0522D; }
    .text-brown-800 { color: #5C4033; }
    .border-left-brown { border-left: .25rem solid #8B4513 !important; }
    .btn-brown { background-color: #8B4513; color: white; }
    .btn-brown:hover { background-color: #5C4033; color: white; }
    .text-gray-800 { color: #5a5c69; }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('grafikPanen').getContext('2d');
    const grafikPanen = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
            ],
            datasets: [{
                label: 'Jumlah Panen (kg)',
                data: [
                    {{ $grafikPanen[1] ?? 0 }}, {{ $grafikPanen[2] ?? 0 }}, {{ $grafikPanen[3] ?? 0 }},
                    {{ $grafikPanen[4] ?? 0 }}, {{ $grafikPanen[5] ?? 0 }}, {{ $grafikPanen[6] ?? 0 }},
                    {{ $grafikPanen[7] ?? 0 }}, {{ $grafikPanen[8] ?? 0 }}, {{ $grafikPanen[9] ?? 0 }},
                    {{ $grafikPanen[10] ?? 0 }}, {{ $grafikPanen[11] ?? 0 }}, {{ $grafikPanen[12] ?? 0 }}
                ],
                backgroundColor: '#8B4513'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>

@endpush
