@extends('layout.v_template')
@section('content')
<div class="container-fluid">

    <!-- 🔹 Alert sukses kalau profil diperbarui -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- 🔹 Tombol Edit Profil -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-brown-800">Dashboard Pemilik Budidaya</h1>
        <button class="btn btn-brown" data-bs-toggle="modal" data-bs-target="#editProfileModal">
            <i class="fas fa-user-edit"></i> Edit Profil
        </button>
    </div>

    {{-- === Dashboard Asli Tetap === --}}
    <div class="row">
        <!-- Total Pesanan -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-brown shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-brown text-uppercase mb-1">Total Pesanan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPesanan }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-brown-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Pendapatan -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-brown shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-brown text-uppercase mb-1">Pendapatan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill-wave fa-2x text-brown-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Stok Produk -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-brown shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-brown text-uppercase mb-1">Total Stok Produk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalStok }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes fa-2x text-brown-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="row">

    <!-- Jumlah Tanam -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-brown shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-brown text-uppercase mb-1">Jumlah Tanam</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahTanam }} Rak</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-seedling fa-2x text-brown-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jumlah Panen -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-brown shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-brown text-uppercase mb-1">Jumlah Panen</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahPanen }} Kg</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-spa fa-2x text-brown-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Total Pesan Masuk -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-brown shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-brown text-uppercase mb-1">Pesan Masuk</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-envelope fa-2x text-brown-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Grafik dan Pie Chart -->
    <div class="row">
        <!-- Grafik Penjualan -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-brown">Statistik Penjualan Bulanan</h6>
                </div>
                <div class="card-body">
                    <canvas id="salesChart" height=""></canvas>
                </div>
            </div>
        </div>

        <!-- Pie Chart Metode Pembayaran -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-brown">Sumber Pendapatan</h6>
                </div>
                <div class="card-body">
                    <canvas id="revenuePieChart" height="300"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- 🔹 Modal Edit Profil -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ Auth::user()->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Baru (opsional)</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Isi jika ingin mengganti password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-brown">Simpan Perubahan</button>
                </div>
            </div>
        </form>
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
    // Data Penjualan Bulanan
    const salesChart = new Chart(document.getElementById('salesChart'), {
        type: 'line',
        data: {
            labels: [
                @foreach(range(1, 12) as $bulan)
                    "{{ \Carbon\Carbon::create()->month($bulan)->translatedFormat('F') }}",
                @endforeach
            ],
            datasets: [{
                label: 'Penjualan (Rp)',
                data: [
                    @foreach(range(1, 12) as $bulan)
                        {{ $penjualanPerBulan[$bulan] ?? 0 }},
                    @endforeach
                ],
                backgroundColor: 'rgba(139, 69, 19, 0.2)',
                borderColor: '#8B4513',
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            scales: { y: { beginAtZero: true } }
        }
    });

    // Pie Chart Metode Pembayaran
    const revenuePieChart = new Chart(document.getElementById('revenuePieChart'), {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($metodePembayaran->keys()) !!},
            datasets: [{
                data: {!! json_encode($metodePembayaran->values()) !!},
                backgroundColor: ['#007bff', '#28a745', '#ffc107', '#17a2b8'],
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
</script>
@endpush
