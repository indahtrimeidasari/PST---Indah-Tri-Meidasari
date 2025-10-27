<ul class="navbar-nav sidebar sidebar-dark accordion bg-brown shadow" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center py-3" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-leaf fa-lg"></i>
        </div>
        <div class="sidebar-brand-text mx-3 text-light">DATA PENJUALAN</div>
    </a>

    <hr class="sidebar-divider my-0 bg-light">

    <!-- Home -->
    <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center text-light" href="/admin">
            <i class="fas fa-tachometer-alt mr-2"></i>
            <span>Home</span>
        </a>
    </li>

    <hr class="sidebar-divider bg-light">

    <!-- Pesanan -->
    <li class="nav-item {{ Request::is('pesanan') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center text-light" href="/pesanan">
            <i class="fas fa-box-open mr-2"></i>
            <span>Pesanan</span>
        </a>
    </li>

    <!-- Keuangan -->
    <li class="nav-item {{ Request::is('keuangan') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center text-light" href="/keuangan">
            <i class="fas fa-wallet mr-2"></i>
            <span>Keuangan</span>
        </a>
    </li>

    <!-- Produk -->
    <li class="nav-item {{ Request::is('produk') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center text-light" href="/produk">
            <i class="fas fa-boxes mr-2"></i>
            <span>Produk</span>
        </a>
    </li>

    <!-- Media Tanam -->
    <li class="nav-item {{ Request::is('mediatanam') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center text-light" href="/mediatanam">
            <i class="fas fa-seedling mr-2"></i>
            <span>Media Tanam</span>
        </a>
    </li>

    <!-- Panen -->
    <li class="nav-item {{ Request::is('panen') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center text-light" href="/panen">
            <i class="fas fa-carrot mr-2"></i>
            <span>Hasil Panen</span>
        </a>
    </li>

    <!-- Pesan Masuk -->
    <li class="nav-item {{ Request::is('pesan-masuk') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center text-light" href="/pesan-masuk">
            <i class="fas fa-box-open mr-2"></i>
            <span>Pesan Masuk</span>
        </a>
    </li>

    <!-- Laporan Transaksi -->
    <li class="nav-item {{ Request::is('laporantransaksi') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center text-light" href="/laporantransaksi">
            <i class="fas fa-wallet mr-2"></i>
            <span>Laporan Transaksi</span>
        </a>
    </li>

    <!-- Logout -->
    <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST" class="nav-link p-0 m-0 d-flex align-items-center">
            @csrf
            <button type="submit" class="btn btn-link text-left text-light w-100" style="text-decoration: none;">
                <i class="fas fa-sign-out-alt mr-2"></i>
                <span>Logout</span>
            </button>
        </form>
    </li>

    <hr class="sidebar-divider bg-light">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0 bg-light" id="sidebarToggle"></button>
    </div>
</ul>

<!-- CSS SIDEBAR -->
<style>
    .bg-brown {
        background-color: #5C4033 !important;
    }

    .sidebar .nav-link,
    .sidebar .collapse-inner a {
        color: #f8f8f8 !important;
        font-size: 0.95rem;
        transition: all 0.2s ease-in-out;
    }

    .sidebar .nav-link i {
        min-width: 1.5rem;
        text-align: center;
    }

    .sidebar .nav-link:hover,
    .sidebar .collapse-inner a:hover {
        background-color: #A0522D !important;
        color: #fff !important;
        font-weight: 600;
    }

    .sidebar .collapse-inner {
        background-color: #7B4F2C !important;
    }

    .sidebar .collapse-header {
        color: #ffffff !important;
        font-size: 0.85rem;
        padding-left: 1.5rem;
    }

    .sidebar .nav-item.active > .nav-link {
        background-color: #8B4513 !important;
        color: white !important;
        font-weight: bold;
    }

    .sidebar .sidebar-brand-text {
        font-size: 1rem;
        font-weight: 600;
    }

    .sidebar .fas {
        color: #f8f8f8 !important;
    }

    #sidebarToggle {
        background-color: #DDD;
    }

    .collapse-inner .collapse-item {
        padding: 0.5rem 1.5rem;
    }

    @media (max-width: 768px) {
        .sidebar .nav-link span {
            font-size: 0.85rem;
        }

        .sidebar .sidebar-brand-text {
            font-size: 0.85rem;
        }
    }
</style>
