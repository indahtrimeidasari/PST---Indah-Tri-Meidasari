<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Mandiri Jaya Digital')</title>

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <!-- Style -->
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background-color: #0d1117;
      color: #f0f0f0;
      overflow-x: hidden;
    }

    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(12px);
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 80px;
      z-index: 1000;
    }

    header h2 {
      color: #ffd369;
      font-size: 1.8rem;
      font-weight: 700;
    }

    nav a {
      text-decoration: none;
      color: #ffffff;
      margin-left: 35px;
      font-size: 1rem;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    nav a:hover {
      color: #ffd369;
    }

    footer {
      text-align: center;
      padding: 25px;
      background: #0d1117;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      font-size: 0.95rem;
      color: #bbb;
      margin-top: 60px;
    }

    main {
      margin-top: 90px;
    }
  </style>
</head>

<body>

  <!-- HEADER -->
  <header>
    <h2>💻 Mandiri Jaya Digital</h2>
    <nav>
      <a href="{{ url('/') }}">Home</a>
      <a href="#tentang">Tentang</a>
      <a href="{{ url('login') }}">Login</a>
    </nav>
  </header>

  <!-- ISI HALAMAN -->
  <main>
    @yield('content')
  </main>

  <!-- FOOTER -->
  <footer>
    &copy; {{ date('Y') }} Mandiri Jaya Digital 💻 — Inovasi, Efisiensi, dan Solusi Tanpa Batas ⚡
  </footer>

</body>
</html>
