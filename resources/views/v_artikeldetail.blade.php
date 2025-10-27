<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $artikel->judul }} | Digital Innovation</title>

  <!-- Font & Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    /* ========= GLOBAL ========= */
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f7fb;
      color: #2d3436;
      overflow-x: hidden;
    }

    a {
      text-decoration: none;
      transition: 0.3s ease;
    }

    /* ========= NAVBAR ========= */
    nav {
      background: #ffffff;
      box-shadow: 0 2px 12px rgba(0,0,0,0.06);
      padding: 15px 50px;
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    nav .logo {
      font-size: 1.6rem;
      font-weight: 700;
      color: #1b3aa0;
    }

    nav .menu a {
      color: #333;
      margin-left: 25px;
      font-weight: 500;
      position: relative;
    }

    nav .menu a:hover {
      color: #1b3aa0;
    }

    /* ========= HERO ========= */
    .hero {
      position: relative;
      width: 100%;
      height: 320px;
      overflow: hidden;
      background: #1b3aa0;
    }

    .hero img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: brightness(0.75);
      transition: transform 1s ease;
    }

    .hero:hover img {
      transform: scale(1.05);
    }

    .hero-text {
      position: absolute;
      bottom: 40px;
      left: 50%;
      transform: translateX(-50%);
      text-align: center;
      color: #fff;
      animation: fadeIn 1.2s ease;
    }

    .hero-text h1 {
      font-size: 2rem;
      font-weight: 700;
      letter-spacing: 0.5px;
    }

    .hero-text p {
      font-size: 1rem;
      opacity: 0.9;
      margin-top: 6px;
    }

    /* ========= CONTENT ========= */
    .content {
      max-width: 850px;
      margin: 70px auto;
      background: #ffffff;
      border-radius: 20px;
      padding: 45px;
      box-shadow: 0 6px 25px rgba(0,0,0,0.07);
      animation: fadeUp 0.8s ease;
    }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(25px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .meta {
      color: #777;
      font-size: 0.95rem;
      text-align: center;
      margin-bottom: 30px;
    }

    .meta span {
      margin: 0 7px;
      color: #bbb;
    }

    .content p {
      line-height: 1.8;
      font-size: 1.06rem;
      color: #444;
      text-align: justify;
      margin-bottom: 20px;
    }

    /* ========= ARTICLE IMAGE ========= */
    .article-image {
      text-align: center;
      margin-bottom: 35px;
    }

    .article-image img {
      width: 100%;
      max-width: 650px;
      height: auto;
      border-radius: 15px;
      object-fit: cover;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }

    /* ========= BUTTON ========= */
    .btn-back {
      display: inline-block;
      background: linear-gradient(135deg, #1b3aa0, #325af3);
      color: white;
      padding: 12px 30px;
      border-radius: 30px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 5px 15px rgba(27,58,160,0.3);
    }

    .btn-back:hover {
      background: linear-gradient(135deg, #15307f, #224abe);
      transform: translateY(-3px);
    }

    /* ========= FOOTER ========= */
    footer {
      background: #0d1b4c;
      color: #ccc;
      padding: 50px 20px;
      text-align: center;
      margin-top: 70px;
      border-top-left-radius: 40px;
      border-top-right-radius: 40px;
    }

    footer a {
      color: #fff;
      font-weight: 600;
    }

    footer a:hover {
      color: #00b4ff;
    }

    /* ========= ANIMATION ========= */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 768px) {
      nav {
        padding: 15px 20px;
      }
      .hero {
        height: 240px;
      }
      .hero-text h1 {
        font-size: 1.6rem;
      }
      .content {
        padding: 25px;
        margin: 40px 15px;
      }
      .article-image img {
        max-width: 100%;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="d-flex justify-content-between align-items-center">
    <a href="{{ url('/') }}" class="logo">Digital Innovation</a>
    <div class="menu">
      <a href="{{ url('/') }}">Beranda</a>

    </div>
  </nav>

  <!-- Hero -->
  <section class="hero">
    @if($artikel->gambar)
      <img src="{{ asset('storage/'.$artikel->gambar) }}" alt="{{ $artikel->judul }}">
    @else
      <img src="https://via.placeholder.com/1200x400?text=Digital+Innovation" alt="Default Image">
    @endif

    <div class="hero-text">
      <h1>{{ $artikel->judul }}</h1>
      <p>Menjelajahi Dunia Teknologi & Inovasi</p>
    </div>
  </section>

  <!-- Content -->
  <div class="content">
    <div class="meta">
      ✍️ {{ $artikel->penulis ?? 'Admin' }}
      <span>•</span>
      🗓 {{ \Carbon\Carbon::parse($artikel->tanggal)->translatedFormat('d F Y') }}
    </div>

    <div class="article-image">
      @if($artikel->gambar)
        <img src="{{ asset('storage/'.$artikel->gambar) }}" alt="{{ $artikel->judul }}">
      @endif
    </div>

    <p>{{ $artikel->isi }}</p>

    <div class="text-center mt-4">
      <a href="{{ url('/') }}" class="btn-back">← Kembali ke Beranda</a>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <p>© {{ date('Y') }} <a href="{{ url('/') }}">Digital Innovation</a>. Semua Hak Dilindungi.</p>
  </footer>

</body>
</html>
