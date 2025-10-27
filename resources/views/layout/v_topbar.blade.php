<style>
  .btn-coklat {
    background-color: #795548;
    color: white;
    border: none;
  }
  .btn-coklat:hover {
    background-color: #5D4037;
    color: white;
  }

  /* CSS untuk tombol coklat */
    .btn-coklat {
        background-color: #795548;
        color: white;
        border: none;
    }
    .btn-coklat:hover {
        background-color: #5D4037;
        color: white;
    }

    /* CSS untuk judul "Budidaya Jamur Merang" di navbar */
    .navbar-brand-custom {
        font-family: 'Montserrat', sans-serif; /* Font modern dan elegan */
        font-size: 1.5rem; /* Ukuran teks yang cukup besar */
        font-weight: 800; /* Ketebalan ekstra */
        text-transform: uppercase; /* Huruf kapital */
        letter-spacing: 1px; /* Spasi antar huruf */

        /* Warna Gradasi Elegan (Emas ke Coklat Gelap) */
        background: linear-gradient(45deg,rgb(231, 187, 76), #DAA520, #8B4513);
        
        -webkit-background-clip: text; /* Menerapkan gradasi ke teks */
        -webkit-text-fill-color: transparent; /* Membuat teks transparan agar gradasi terlihat */
        
        text-shadow: 1px 2px 4px rgba(0, 0, 0, 0.3); /* Bayangan untuk kedalaman */
        
        transition: all 0.4s ease-in-out; /* Efek transisi untuk hover */
    }

    .navbar-brand-custom:hover {
        transform: translateY(-2px) scale(1.02); /* Sedikit naik dan membesar saat hover */
        opacity: 0.9; /* Sedikit transparan saat hover */
        text-shadow: 2px 3px 6px rgba(0, 0, 0, 0.4); /* Bayangan lebih kuat saat hover */
    }

    /* Penyesuaian responsif untuk judul */
    @media (max-width: 991.98px) { /* Untuk ukuran tablet dan di bawahnya */
        .navbar-brand-custom {
            font-size: 1.8rem;
            letter-spacing: 0.5px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }
    }

    @media (max-width: 767.98px) { /* Untuk ukuran ponsel */
        .navbar-brand-custom {
            font-size: 1.4rem;
            font-weight: 700;
        }
        /* Opsional: sembunyikan elemen di sisi kanan navbar pada layar sangat kecil
           agar judul tidak terlalu tertekan */
        .navbar .navbar-nav.ml-auto {
            display: none;
        }
    }
</style>

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<div class="container-fluid d-flex justify-content-center align-items-center flex-grow-1">
        <a class="navbar-brand-custom" href="#">
            Budidaya Jamur Merang
        </a>
    </div>

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
      <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search fa-fw"></i>
      </a>
      <!-- Dropdown - Messages -->
      <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
        <form class="form-inline mr-auto w-100 navbar-search">
        </form>
      </div>
    </li>

    

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="#">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Profile
        </a>
        <a class="dropdown-item" href="#">
          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
          Settings
        </a>
        <a class="dropdown-item" href="#">
          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
          Activity Log
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </a>
      </div>
    </li>

  </ul>

</nav>
