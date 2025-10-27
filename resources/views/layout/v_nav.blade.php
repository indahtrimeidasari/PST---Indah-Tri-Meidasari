<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #5C4033;">

    <!-- Sidebar Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center py-3" href="{{ url('/dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-leaf"></i>
        </div>
        <div class="sidebar-brand-text mx-3 text-light">SMART TECH</div>
    </a>

    <hr class="sidebar-divider my-0 bg-light">

    <!-- Menu Items -->
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link text-light" href="{{ url('/dashboard') }}">
            <i class="fas fa-home"></i> <span>Home</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('dokumen*') ? 'active' : '' }}">
        <a class="nav-link text-light" href="{{ url('/dokumen') }}">
            <i class="fas fa-folder"></i> <span>Dokumen</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('artikel*') ? 'active' : '' }}">
        <a class="nav-link text-light" href="{{ url('/artikel') }}">
            <i class="fas fa-newspaper"></i> <span>Artikel</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('tentang*') ? 'active' : '' }}">
        <a class="nav-link text-light" href="{{ url('/tentang') }}">
            <i class="fas fa-building"></i> <span>Tentang Kami</span>
        </a>
    </li>

    <hr class="sidebar-divider bg-light">

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
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

@push('styles')
<style>
    /* Sidebar */
    .sidebar .nav-link {
        font-size: 0.95rem;
        transition: all 0.2s;
    }
    .sidebar .nav-item.active > .nav-link {
        background-color: #8B4513 !important;
        font-weight: bold;
    }
    .sidebar .nav-link:hover {
        background-color: #A0522D !important;
        color: #fff !important;
    }
    .sidebar-divider {
        border-top: 1px solid #f8f8f8 !important;
    }
</style>
@endpush
