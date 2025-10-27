<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SmartTech 🌿 Inovasi Teknologi Masa Depan</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Optional: Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #0f172a;
      color: #e0e0e0;
      font-family: 'Montserrat', sans-serif;
    }
    .text-gradient {
      background: linear-gradient(90deg, #22d3ee, #84cc16);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      color: transparent;
    }
    .hero-section {
      background: url('https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1920&q=80') no-repeat center center;
      background-size: cover;
      position: relative;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-align: center;
    }
    .hero-overlay {
      position: absolute;
      inset: 0;
      background: rgba(0,0,0,0.5);
    }
    .hero-content {
      position: relative;
      z-index: 10;
    }
    .glass-card {
      background: rgba(255,255,255,0.08);
      backdrop-filter: blur(15px);
      border: 1px solid rgba(255,255,255,0.15);
      border-radius: 1rem;
      padding: 2rem;
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .glass-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 0 20px rgba(110,231,183,0.2);
    }
    /* Background konsisten untuk semua section gelap */
    .section-dark {
      background-color: #141f3a;
      color: #e0e0e0;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#Beranda">SmartTech</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#Beranda">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="#tentang-kami">Tentang Kami</a></li>
        <li class="nav-item"><a class="nav-link" href="#artikel">Artikel</a></li>
        <li class="nav-item"><a class="nav-link" href="#features">Fitur</a></li>
        <li class="nav-item"><a class="nav-link" href="#dokumen">Dokumentasi</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
        <li class="nav-item"><a class="btn btn-success ms-3" href="{{ route('login') }}">Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero -->
<section id="Beranda" class="hero-section">
  <div class="hero-overlay"></div>
  <div class="hero-content container">
    <h1 class="display-4 fw-bold mb-3">SmartTech 🌿<br>Inovasi Teknologi Digital</h1>
    <p class="lead mb-4">Membangun masa depan yang cerdas dan berkelanjutan melalui teknologi modern yang efisien dan ramah lingkungan.</p>
    <a href="#tentang-kami" class="btn btn-success btn-lg">Pelajari Lebih Lanjut</a>
  </div>
</section>

<!-- Tentang Kami -->
<section id="tentang-kami" class="py-5 section-dark">
  <div class="container">
    <h2 class="text-center display-5 fw-bold mb-5 text-gradient">Tentang Kami</h2>
    @if($tentangkami->isEmpty())
      <p class="text-center text-muted fst-italic">Belum ada data Tentang Kami.</p>
    @else
      @foreach($tentangkami as $item)
        <div class="row align-items-center mb-5 glass-card mx-auto">
          <div class="col-md-6">
            <h3 class="fw-bold">{{ $item->judul }}</h3>
            <p>{{ $item->deskripsi }}</p>
            <p><strong>Visi:</strong> {{ $item->visi }}</p>
            <p><strong>Misi:</strong> {{ $item->misi }}</p>
          </div>
          @if($item->gambar)
          <div class="col-md-6">
            <img src="{{ asset('storage/'.$item->gambar) }}" class="img-fluid rounded" alt="Tentang Kami">
          </div>
          @endif
        </div>
      @endforeach
    @endif
  </div>
</section>

<!-- ARTIKEL TERBARU -->
<section id="artikel" class="py-5 section-dark">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="display-5 fw-bold text-white">📚 <span class="text-warning">Artikel Terbaru</span></h2>
    </div>

    @if($artikel->isEmpty())
      <p class="text-center text-light fst-italic">Belum ada artikel yang dipublikasikan.</p>
    @else
      <div class="row g-4">
        @foreach($artikel as $item)
          <div class="col-sm-6 col-lg-4">
            <div class="card h-100 shadow-lg border-0 bg-white bg-opacity-10 text-white glass-card">
              @if($item->gambar)
                <img src="{{ asset('storage/'.$item->gambar) }}" class="card-img-top" alt="Gambar Artikel" style="height: 200px; object-fit: cover;">
              @endif
              <div class="card-body d-flex flex-column">
                <h5 class="card-title text-warning">{{ Str::limit($item->judul, 60) }}</h5>
                <p class="card-subtitle mb-2 small text-light">
                  <i class="bi bi-person-fill"></i> {{ $item->penulis ?? 'Admin' }} ·
                  {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                </p>
                <p class="card-text flex-grow-1">{{ Str::limit(strip_tags($item->isi), 120) }}</p>
                <a href="{{ url('/artikel/'.$item->id) }}" target="_blank" class="btn btn-warning mt-2 text-dark fw-bold">
                  <i class="bi bi-eye-fill"></i> Baca Selengkapnya
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</section>

<!-- Fitur -->
<section id="features" class="py-5 section-dark text-light">
  <div class="container text-center">
    <h2 class="display-5 fw-bold mb-5 text-gradient">Fitur Unggulan</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="glass-card">
          <div class="fs-1 mb-3">⚙</div>
          <h4 class="fw-bold">Teknologi Modern</h4>
          <p>Penerapan teknologi terkini untuk mendukung efisiensi dan kemudahan.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="glass-card">
          <div class="fs-1 mb-3">💡</div>
          <h4 class="fw-bold">Inovasi Berkelanjutan</h4>
          <p>Terus berinovasi menciptakan solusi tangguh dan ramah lingkungan.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="glass-card">
          <div class="fs-1 mb-3">🌱</div>
          <h4 class="fw-bold">Ramah Lingkungan</h4>
          <p>Fokus pada teknologi hijau yang mendukung pelestarian alam.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Dokumen & Foto -->
<section id="dokumen" class="py-5 section-dark">
  <div class="container">
    <h2 class="text-center display-5 fw-bold mb-5 text-gradient">Dokumen & Foto</h2>
    @php
      $docsAndPhotos = $dokumen->filter(fn($d) => in_array(strtolower($d->tipe), ['pdf', 'foto']));
    @endphp
    @if($docsAndPhotos->isEmpty())
      <p class="text-center text-muted fst-italic">Belum ada dokumen atau foto.</p>
    @else
      <div class="row g-4">
        @foreach($docsAndPhotos as $item)
          @php
            $tipe = strtolower($item->tipe ?? '');
            $fileUrl = $item->file_path ? asset('storage/'.$item->file_path) : null;
            $fotoUrl = $item->foto ? asset('storage/'.$item->foto) : null;
          @endphp
          <div class="col-md-4">
            <div class="glass-card h-100 d-flex flex-column justify-content-between">
              <h5>{{ $item->nama_dokumen ?? 'Tanpa Judul' }}</h5>
              <small class="text-muted mb-2">{{ strtoupper($tipe) }}</small>
              @if($tipe==='pdf' && $fileUrl)
                <iframe src="{{ $fileUrl }}" class="w-100 mb-3" style="height:200px;"></iframe>
                <a href="{{ $fileUrl }}" target="_blank" class="btn btn-success w-100">📄 Lihat Dokumen</a>
              @elseif($tipe==='foto' && $fotoUrl)
                <img src="{{ $fotoUrl }}" class="img-fluid mb-3 rounded" alt="Foto">
                <a href="{{ $fotoUrl }}" target="_blank" class="btn btn-success w-100">👁️ Lihat Foto</a>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    @endif

    {{-- Video Section --}}
    @php
        $videos = $dokumen->filter(fn($d) => strtolower($d->tipe) === 'video');
    @endphp
    @if($videos->isNotEmpty())
      <div class="container mt-5">
        <h2 class="text-center display-5 fw-bold text-gradient mb-5">🎬 Video</h2>
        <div class="row g-4">
          @foreach($videos as $item)
            @php
                $ytID = null;
                if (preg_match('/youtu\.be\/([^\?]+)/', $item->video_link, $m)) $ytID = $m[1];
                elseif (preg_match('/youtube\.com\/watch\?v=([^\&]+)/', $item->video_link, $m)) $ytID = $m[1];
            @endphp
            @if($ytID)
              <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card h-100 text-white section-dark glass-card">
                  <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-warning">{{ $item->nama_dokumen ?? 'Video Tanpa Judul' }}</h5>
                    <div class="ratio ratio-16x9 mb-3">
                      <iframe src="https://www.youtube.com/embed/{{ $ytID }}" frameborder="0" allowfullscreen class="rounded"></iframe>
                    </div>
                    <a href="{{ $item->video_link }}" target="_blank" class="btn btn-warning mt-auto fw-bold">▶️ Tonton Video</a>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    @endif
  </div>
</section>

<!-- KONTAK -->
<section id="contact" class="py-5" style="background-color: #0f172a; color: #e0e0e0;">
  <div class="container" data-aos="fade-up">
    <h2 class="text-center display-5 fw-bold mb-5 text-gradient">
      🏢 Kontak Perusahaan
    </h2>
    <div class="row g-4 align-items-stretch">
      <!-- Info Perusahaan -->
      <div class="col-md-6">
        <div class="glass-card p-4 h-100">
          <h3 class="fw-bold mb-3 text-gradient">🌿 SmartTech</h3>
          <p class="text-light mb-4">
            Kami berkomitmen menghadirkan inovasi teknologi yang berkelanjutan dan efisien untuk masa depan yang lebih baik.
          </p>
          <ul class="list-unstyled mb-0">
            <li class="mb-2 d-flex align-items-start gap-2">
              <span class="text-success fs-5">📍</span>
              Jl. Teknologi Hijau No. 88, Bandung, Jawa Barat, Indonesia
            </li>
            <li class="mb-2 d-flex align-items-start gap-2">
              <span class="text-success fs-5">📞</span>
              +62 812-3456-7890
            </li>
            <li class="mb-2 d-flex align-items-start gap-2">
              <span class="text-success fs-5">✉️</span>
              contact@smarttech.co.id
            </li>
            <li class="mb-2 d-flex align-items-start gap-2">
              <span class="text-success fs-5">🕒</span>
              Senin – Jumat: 08.00 - 17.00 WIB
            </li>
          </ul>
        </div>
      </div>

      <!-- Map Perusahaan -->
      <div class="col-md-6">
        <div class="glass-card h-100 p-0 overflow-hidden">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.9982987886785!2d110.41593271532556!3d-7.806984379701406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59f5a1a9d5f9%3A0x52d74e4f3ab9a28b!2sBandung!5e0!3m2!1sid!2sid!4v1697623843013!5m2!1sid!2sid"
            width="100%" height="380" style="border:0;" allowfullscreen="" loading="lazy">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- FOOTER -->
<footer class="py-5 text-center text-light section-dark">
  <div class="container">
    <div class="d-flex justify-content-center flex-wrap gap-3 mb-4">
      <a href="http://127.0.0.1:8000" target="_blank" class="btn btn-outline-info text-info rounded-pill px-4 py-2 fw-bold">🌐 Website</a>
      <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-outline-info text-info rounded-pill px-4 py-2 fw-bold">💬 WhatsApp</a>
      <a href="mailto:example@mail.com" class="btn btn-outline-info text-info rounded-pill px-4 py-2 fw-bold">✉️ Email</a>
    </div>
    <p class="small mb-0">© 2025 <span class="fw-bold text-info">SmartTech</span>. All Rights Reserved.</p>
  </div>
</footer>

<script>
  AOS.init();
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
