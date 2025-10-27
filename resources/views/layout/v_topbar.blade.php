<style>
    /* Tombol coklat */
    .btn-coklat {
        background-color: #795548;
        color: white;
        border: none;
    }
    .btn-coklat:hover {
        background-color: #5D4037;
        color: white;
    }

    /* Judul navbar gradasi */
    .navbar-brand-custom {
        font-family: 'Montserrat', sans-serif;
        font-size: 1.5rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        background: linear-gradient(45deg, rgb(231, 187, 76), #DAA520, #8B4513);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 1px 2px 4px rgba(0, 0, 0, 0.3);
        transition: all 0.4s ease-in-out;
    }
    .navbar-brand-custom:hover {
        transform: translateY(-2px) scale(1.02);
        opacity: 0.9;
        text-shadow: 2px 3px 6px rgba(0, 0, 0, 0.4);
    }

    /* Responsif judul */
    @media (max-width: 991.98px) {
        .navbar-brand-custom {
            font-size: 1.8rem;
            letter-spacing: 0.5px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }
    }
    @media (max-width: 767.98px) {
        .navbar-brand-custom {
            font-size: 1.4rem;
            font-weight: 700;
        }
        /* Sembunyikan elemen user info di layar kecil */
        .navbar-nav.ml-auto {
            display: none;
        }
    }
</style>

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Judul Smart Tech -->
<div class="container-fluid d-flex justify-content-center align-items-center flex-grow-1">
    <a class="navbar-brand-custom d-flex align-items-center" href="{{ url('/dashboard') }}">
        <i class="fas fa-leaf mr-2"></i>
        <span>DASHBOARD SMART TECH</span>
    </a>
</div>

<style>
    .navbar-brand-custom {
        font-weight: 700;
        font-size: 1.5rem;
        text-decoration: none;
        background: linear-gradient(90deg, #001F3F, #4B0082, #002244); /* gradasi biru dongker + ungu */
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        transition: all 0.3s ease;
    }

    .navbar-brand-custom:hover {
        text-shadow: 0 0 10px rgba(75, 0, 130, 0.6);
        transform: scale(1.05);
    }

    .navbar-brand-custom i {
        color: #4B0082; /* warna ikon */
    }
</style>


    <!-- Topbar Navbar (User) -->
    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- User Info -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" width="40" height="40"
                     src="{{ Auth::user()->foto ? asset('storage/foto_user/' . Auth::user()->foto) : asset('images/default-avatar.png') }}">
                <span class="ml-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    ✏️ Edit Profil
                </a>
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        🚪 Logout
                    </button>
                </form>
            </div>
        </li>
    </ul>

</nav>
