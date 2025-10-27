<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Smart Tech Dashboard')</title>

  {{-- Bootstrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  {{-- Styling --}}
  <style>
    body {
      background: linear-gradient(135deg, #eef2ff, #f8f9ff);
      font-family: 'Nunito', sans-serif;
      color: #333;
    }

    /* Sidebar */
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 230px;
      height: 100%;
      background: linear-gradient(180deg, #5c6bc0, #7986cb, #c5cae9);
      box-shadow: 4px 0 12px rgba(0, 0, 0, 0.06);
      padding: 20px 0;
      border-radius: 0 20px 20px 0;
    }

    .sidebar h4 {
      text-align: center;
      color: #ffffff;
      font-weight: 800;
      margin-bottom: 25px;
    }

    .sidebar a {
      color: #f9f9ff;
      text-decoration: none;
      display: block;
      padding: 12px 22px;
      font-weight: 600;
      border-left: 4px solid transparent;
      border-radius: 8px;
      margin: 6px 15px;
      transition: all 0.25s ease;
    }

    .sidebar a:hover,
    .sidebar a.active {
      background: rgba(255, 255, 255, 0.25);
      border-left: 4px solid #fff;
      color: #fff;
      transform: translateX(4px);
    }

    /* Konten utama */
    .main-content {
      margin-left: 250px;
      padding: 35px;
    }

    /* Topbar */
    .topbar {
      background: #ffffff;
      padding: 15px 25px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(63, 81, 181, 0.08);
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
    }

    @media (max-width: 768px) {
      .main-content { margin-left: 0; padding: 20px; }
      .sidebar { width: 100%; height: auto; position: relative; border-radius: 0; }
    }
  </style>
</head>
<body>

  {{-- Sidebar --}}
  <div class="sidebar">
    <h4>Dashboard</h4>
    <a href="{{ url('/dashboard') }}" class="{{ Request::is('dashboard') ? 'active' : '' }}">🏠 Home</a>
    <a href="{{ url('/dokumen') }}" class="{{ Request::is('dokumen*') ? 'active' : '' }}">📂 Dokumen</a>
    <a href="{{ url('/artikel') }}" class="{{ Request::is('artikel*') ? 'active' : '' }}">📰 Artikel</a>
    <a href="{{ url('/tentang') }}" 
   class="hover:text-lime-300 transition {{ Request::is('tentang*') ? 'text-lime-400 font-semibold' : 'text-gray-200' }}">
   🏢 Tentang Kami
</a>


  </div>

  {{-- Konten utama --}}
  <div class="main-content">
    <div class="topbar">
      <h5>Selamat Datang, {{ Auth::user()->name }}</h5>
      <div class="dropdown">
        <button class="btn btn-light dropdown-toggle d-flex align-items-center"
                type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="{{ Auth::user()->foto ? asset('storage/foto_user/' . Auth::user()->foto) : asset('images/default-avatar.png') }}"
               alt="User" width="40" height="40" class="rounded-circle me-2">
          <span>{{ Auth::user()->name }}</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
          <li><a class="dropdown-item" href="{{ route('profile.edit') }}">✏️ Edit Profil</a></li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="dropdown-item text-danger">🚪 Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </div>

    {{-- Area konten dinamis --}}
    @yield('content')
  </div>

  {{-- Script Bootstrap --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
