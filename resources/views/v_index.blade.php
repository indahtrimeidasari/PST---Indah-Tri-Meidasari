<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SmartTech 🌿 Inovasi Teknologi Masa Depan</title>

  <!-- Fonts & Tailwind -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js" defer></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      scroll-behavior: smooth;
      background-color: #0f172a;
      color: #e0e0e0;
      background-image:
        radial-gradient(circle at 20% 20%, rgba(72, 187, 120, 0.02), transparent 40%),
        radial-gradient(circle at 80% 80%, rgba(88, 203, 189, 0.02), transparent 40%);
      background-attachment: fixed;
    }

    .highlight {
      color: #6ee7b7;
    }

    .glass {
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(15px);
      border: 1px solid rgba(255, 255, 255, 0.15);
      box-shadow: 0 0 25px rgba(110, 231, 183, 0.1);
      transition: all 0.3s ease;
    }

    .glass:hover {
      transform: translateY(-3px);
      box-shadow: 0 0 35px rgba(110, 231, 183, 0.2);
    }

    .glow-text {
      text-shadow: 0 0 8px #6ee7b7, 0 0 20px #34d399;
    }

    .footer-gradient {
      background: radial-gradient(circle at top center, #0c1f2b, #020c15);
    }

    @keyframes float {
      0%,
      100% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(-6px);
      }
    }

    .float {
      animation: float 4s ease-in-out infinite;
    }

    a,
    .highlight,
    .glass a {
      transition: color 0.3s, background-color 0.3s;
    }

    a:hover {
      color: #34d399;
    }

    button:hover {
      background-color: #34d399;
    }

    .hero-overlay {
      background: rgba(0, 0, 0, 0.5);
      position: absolute;
      inset: 0;
    }

    .section-overlay {
      background: rgba(0, 0, 0, 0.25);
      position: absolute;
      inset: 0;
      border-radius: 1rem;
    }
  </style>
</head>

<body x-data="{ open: false }" x-init="AOS.init();">

  <!-- NAVBAR -->
<header 
  x-data="{ open: false, scrolled: false }"
  x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 30)"
  :class="scrolled 
    ? 'bg-gradient-to-r from-emerald-400/20 via-teal-400/20 to-sky-500/20 shadow-lg py-3' 
    : 'bg-gradient-to-r from-emerald-300/10 via-teal-300/10 to-sky-400/10 py-5'"
  class="fixed top-0 w-full z-50 backdrop-blur-3xl transition-all duration-700 ease-in-out border-b border-emerald-300/10">

  <div class="container mx-auto px-6 flex justify-between items-center transition-all duration-500">
    <!-- Logo -->
    <a href="#Beranda" class="text-3xl font-extrabold text-white tracking-tight hover:text-teal-300 transition duration-300 drop-shadow-[0_0_8px_rgba(45,255,196,0.5)]">
      Smart<span class="text-teal-400">Tech</span>
    </a>

    <!-- Menu Desktop -->
    <nav class="hidden md:flex space-x-8 font-medium text-gray-100">
      <a href="#Beranda" class="relative group hover:text-teal-300 transition">
        Beranda
        <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-teal-300 transition-all duration-300 group-hover:w-full"></span>
      </a>
      <a href="#tentang-kami" class="relative group hover:text-teal-300 transition">
        Tentang Kami
        <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-teal-300 transition-all duration-300 group-hover:w-full"></span>
      </a>
      <a href="#features" class="relative group hover:text-teal-300 transition">
        Fitur
        <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-teal-300 transition-all duration-300 group-hover:w-full"></span>
      </a>
      <a href="#dokumen" class="relative group hover:text-teal-300 transition">
        Dokumen
        <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-teal-300 transition-all duration-300 group-hover:w-full"></span>
      </a>
      <a href="#contact" class="relative group hover:text-teal-300 transition">
        Contact
        <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-teal-300 transition-all duration-300 group-hover:w-full"></span>
      </a>
    </nav>

    <!-- Tombol Login -->
    <a href="{{ route('login') }}"
      class="hidden md:inline-block px-6 py-2 bg-gradient-to-r from-teal-400/90 to-sky-400/90 text-emerald-950 font-semibold rounded-full shadow hover:scale-105 hover:shadow-teal-300/40 transition-all duration-300">
      Login
    </a>

    <!-- Tombol Mobile -->
    <button class="md:hidden focus:outline-none" @click="open = !open">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
      </svg>
    </button>
  </div>

  <!-- Menu Mobile -->
  <nav x-show="open" x-transition.opacity.scale.origin.top 
    class="md:hidden bg-gradient-to-r from-emerald-800/20 via-teal-800/20 to-sky-800/20 backdrop-blur-3xl text-center py-6 space-y-4 text-lg font-semibold text-white border-t border-emerald-300/10">
    <a href="#Beranda" class="block hover:text-teal-300">Beranda</a>
    <a href="#tentang-kami" class="block hover:text-teal-300">Tentang Kami</a>
    <a href="#features" class="block hover:text-teal-300">Features</a>
    <a href="#dokumen" class="block hover:text-teal-300">Dokumen</a>
    <a href="#contact" class="block hover:text-teal-300">Contact</a>
    <a href="{{ route('login') }}"
       class="inline-block bg-gradient-to-r from-teal-400/90 to-sky-400/90 text-emerald-950 px-5 py-2 rounded-full hover:scale-105 transition duration-300">
      Login
    </a>
  </nav>
</header>


  <!-- HERO -->
  <section id="Beranda" class="relative h-screen flex items-center justify-center text-center overflow-hidden">
    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1920&q=80"
         alt="Smart Technology Background" 
         class="absolute inset-0 w-full h-full object-cover opacity-90" />
    <div class="hero-overlay"></div>
    <div class="relative z-10 max-w-3xl px-8 text-center text-white" data-aos="zoom-in">
  <h1 class="text-4xl md:text-6xl font-extrabold mb-6 tracking-wide leading-snug bg-gradient-to-r from-emerald-300 via-white to-emerald-400 bg-clip-text text-transparent drop-shadow-lg">
    SmartTech 🌿 <br>
    <span class="bg-gradient-to-r from-emerald-200 via-white to-teal-300 bg-clip-text text-transparent">
      Inovasi Digital Masa Kini
    </span>
  </h1>

  <p class="text-lg md:text-xl leading-relaxed mb-10 bg-gradient-to-r from-gray-100 via-white to-emerald-100 bg-clip-text text-transparent opacity-95">
    Menghadirkan solusi teknologi yang cerdas, efisien, dan berkelanjutan<br>
    untuk mendorong transformasi digital masa depan.
  </p>
      <a href="#tentang-kami"
   class="inline-flex items-center bg-gradient-to-r from-emerald-400 to-teal-400 text-emerald-950 px-8 py-3 rounded-full font-bold shadow-lg
          hover:from-teal-300 hover:to-sky-300 hover:text-white transition duration-300 text-lg">
  <!-- Icon -->
  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
  </svg>
  Pelajari lebih lanjut
</a>

    </div>
  </section>

  <!-- TENTANG KAMI -->
<section id="tentang-kami" class="py-20 relative">
  <div class="container mx-auto px-8 max-w-7xl text-gray-100" data-aos="fade-up">

    <!-- Judul Utama -->
    <h1 class="text-5xl font-extrabold mb-12 text-center bg-gradient-to-r from-green-400 to-blue-400 bg-clip-text text-transparent drop-shadow-lg">
      Tentang Kami
    </h1>

    @if($tentangkami->isEmpty())
      <p class="text-center text-gray-400 text-lg italic">Belum ada data Tentang Kami.</p>
    @else
      @foreach($tentangkami as $item)
      <div
        class="relative flex flex-col md:flex-row items-center justify-between gap-10 p-10 rounded-3xl shadow-xl border border-gray-700 bg-gray-900/40">
        <div class="section-overlay rounded-3xl"></div>
        <div class="md:w-1/2 text-justify relative z-10">
          <h2 class="text-4xl font-extrabold mb-4 pl-3 border-l-4 border-lime-500 bg-gradient-to-r from-green-300 to-blue-300 bg-clip-text text-transparent drop-shadow-md">
            {{ $item->judul }}
          </h2>
          <p class="text-gray-100 leading-relaxed mb-6">
            {{ $item->deskripsi }}
          </p>
          <div class="mt-6 space-y-5">
            <!-- Visi -->
            <div class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c1.656 0 3-1.344 3-3S13.656 2 12 2 9 3.344 9 5s1.344 3 3 3zM12 14c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
              </svg>
              <div>
                <h4 class="text-2xl font-semibold mb-2 bg-gradient-to-r from-green-300 to-blue-300 bg-clip-text text-transparent drop-shadow-sm">
                  Visi Kami
                </h4>
                <p class="text-gray-100 leading-relaxed">{{ $item->visi }}</p>
              </div>
            </div>
            <!-- Misi -->
            <div class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m-6-8h6M5 6h.01M5 18h.01M5 12h.01M19 6h.01M19 18h.01M19 12h.01" />
              </svg>
              <div>
                <h4 class="text-2xl font-semibold mb-2 bg-gradient-to-r from-green-300 to-blue-300 bg-clip-text text-transparent drop-shadow-sm">
                  Misi Kami
                </h4>
                <p class="text-gray-100 leading-relaxed">{{ $item->misi }}</p>
              </div>
            </div>
          </div>
        </div>
        @if($item->gambar)
        <div class="md:w-1/2 flex justify-end relative z-10">
          <img src="{{ asset('storage/'.$item->gambar) }}" alt="Tentang SmartTech"
            class="w-[460px] h-[320px] object-cover rounded-2xl shadow-2xl hover:scale-105 transition-transform duration-500 ease-in-out border border-gray-400/40">
        </div>
        @endif
      </div>
      @endforeach
    @endif
  </div>
</section>


  <!-- ARTIKEL TERBARU -->
<section id="artikel" class="py-20 text-center relative">
  <div class="container mx-auto px-6" data-aos="fade-up">
    <!-- Judul Section -->
    <h2 class="text-4xl md:text-5xl font-extrabold mb-12 flex items-center justify-center gap-3 drop-shadow-xl">
      📚
      <span class="bg-gradient-to-r from-green-400 to-blue-400 bg-clip-text text-transparent">
        Artikel Terbaru
      </span>
    </h2>


    @if($artikel->isEmpty())
      <p class="text-gray-400 text-lg">Belum ada artikel yang dipublikasikan.</p>
    @else
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($artikel as $item)
          <div class="glass p-6 rounded-2xl text-left relative shadow-lg hover:shadow-2xl transition-shadow duration-300 bg-gray-900/50">
            <div class="section-overlay rounded-2xl"></div>

            @if($item->gambar)
              <img src="{{ asset('storage/'.$item->gambar) }}" alt="Gambar Artikel"
                class="w-full h-48 object-cover rounded-xl mb-4 relative z-10 shadow-md hover:scale-105 transition-transform duration-500 ease-in-out">
            @endif

            <!-- Judul Artikel -->
            <h3 class="text-xl md:text-2xl font-extrabold mb-2 relative z-10 text-green-400 drop-shadow-lg">
              {{ Str::limit($item->judul, 60) }}
            </h3>

            <!-- Penulis & Tanggal -->
            <p class="text-sm text-gray-100 mb-3 relative z-10 flex items-center gap-2 justify-start">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-300 drop-shadow-md" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 12c2.21 0 4-1.79 4-4S14.21 4 12 4 8 5.79 8 8s1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
              </svg>
              <span class="text-lime-400 font-semibold">{{ $item->penulis ?? 'Admin' }}</span> ·
              {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
            </p>

            <!-- Deskripsi -->
            <p class="text-gray-100 text-sm mb-4 relative z-10 leading-relaxed">
              {{ Str::limit(strip_tags($item->isi), 120) }}
            </p>

            <!-- Tombol Baca Selengkapnya dengan Ikon Mata -->
            <a href="{{ url('/artikel/'.$item->id) }}" target="_blank"
              class="inline-flex items-center gap-2 bg-gradient-to-r from-green-400 to-blue-400 text-white px-5 py-3 rounded-full font-extrabold hover:from-blue-400 hover:to-green-400 transition-all relative z-10 drop-shadow-xl hover:scale-105">
              <!-- Ikon Mata -->
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white drop-shadow-md" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z"/>
              </svg>
              Baca Selengkapnya
            </a>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</section>


  <!-- FEATURES -->
  <section id="features" class="py-24 text-center">
  <div class="container mx-auto px-8" data-aos="fade-up">
    <h2 class="text-4xl font-extrabold mb-12 bg-gradient-to-r from-green-400 to-blue-400 bg-clip-text text-transparent drop-shadow-xl">
      Fitur Unggulan
    </h2>
    <div class="grid md:grid-cols-3 gap-10">
      <!-- Feature 1 -->
      <div class="glass p-8 rounded-2xl hover:scale-105 transform transition-transform duration-500 relative shadow-lg hover:shadow-2xl">
        <div class="text-6xl mb-4 text-lime-400 drop-shadow-lg">⚙</div>
        <h3 class="text-2xl font-bold mb-2 bg-gradient-to-r from-green-400 to-blue-400 bg-clip-text text-transparent">
          Teknologi Modern
        </h3>
        <p class="text-gray-200 leading-relaxed">
          Penerapan teknologi terkini untuk mendukung efisiensi dan kemudahan dalam berbagai aspek kehidupan.
        </p>
      </div>
      <!-- Feature 2 -->
      <div class="glass p-8 rounded-2xl hover:scale-105 transform transition-transform duration-500 relative shadow-lg hover:shadow-2xl">
        <div class="text-6xl mb-4 text-lime-400 drop-shadow-lg">💡</div>
        <h3 class="text-2xl font-bold mb-2 bg-gradient-to-r from-green-400 to-blue-400 bg-clip-text text-transparent">
          Inovasi Berkelanjutan
        </h3>
        <p class="text-gray-200 leading-relaxed">
          Terus berinovasi menciptakan solusi tangguh, adaptif, dan ramah lingkungan.
        </p>
      </div>
      <!-- Feature 3 -->
      <div class="glass p-8 rounded-2xl hover:scale-105 transform transition-transform duration-500 relative shadow-lg hover:shadow-2xl">
        <div class="text-6xl mb-4 text-lime-400 drop-shadow-lg">🌱</div>
        <h3 class="text-2xl font-bold mb-2 bg-gradient-to-r from-green-400 to-blue-400 bg-clip-text text-transparent">
          Ramah Lingkungan
        </h3>
        <p class="text-gray-200 leading-relaxed">
          Fokus pada teknologi hijau yang mendukung pelestarian alam dan efisiensi sumber daya.
        </p>
      </div>
    </div>
  </div>
</section>

 <section id="dokumen" class="py-20 text-center relative bg-gradient-to-b from-[#0b1e3f] to-[#091629]">
  <div class="container mx-auto px-6" data-aos="fade-up">

    {{-- Judul utama --}}
    <h2 class="text-4xl font-extrabold mb-12 flex justify-center items-center gap-3 text-transparent bg-clip-text bg-gradient-to-r from-[#7ade8a] via-[#7ac7ff] to-[#b3a3ff] drop-shadow-md">
      <span>📁</span>
      <span>Dokumen & Foto</span>
    </h2>

    @php
      $docsAndPhotos = $dokumen->filter(fn($d) => in_array(strtolower($d->tipe), ['pdf', 'foto']));
    @endphp
    @if($docsAndPhotos->isEmpty())
      <p class="text-gray-400 text-lg">Belum ada dokumen atau foto yang tersedia.</p>
    @else
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($docsAndPhotos as $item)
          @php
            $tipe = strtolower($item->tipe ?? '');
            $fileUrl = $item->file_path ? asset('storage/' . $item->file_path) : null;
            $fotoUrl = $item->foto ? asset('storage/' . $item->foto) : null;
          @endphp
          <div class="bg-[#14203a] rounded-xl p-6 shadow-lg hover:shadow-xl transition-transform transform hover:scale-[1.03] flex flex-col justify-between">

            {{-- Judul Dokumen --}}
            <h3 class="text-xl font-semibold mb-1 text-white">
              {{ $item->nama_dokumen ?? 'Tanpa Judul' }}
            </h3>
            <small class="text-gray-400 mb-4 block">{{ strtoupper($tipe) }}</small>

            {{-- File Preview --}}
            @if ($tipe === 'pdf' && $fileUrl)
              <iframe src="{{ $fileUrl }}" class="w-full h-48 rounded-lg mb-4 shadow-md" frameborder="0"></iframe>
            @elseif ($tipe === 'foto' && $fotoUrl)
              <img src="{{ $fotoUrl }}" alt="Foto" class="w-full h-48 object-cover rounded-lg mb-4 shadow-md" />
            @endif

            {{-- Tombol --}}
            <div>
              @if ($tipe === 'pdf' && $fileUrl)
                <a href="{{ $fileUrl }}" target="_blank" 
                  class="inline-block w-full text-center py-2.5 rounded-full font-bold
                         bg-gradient-to-r from-[#4ade80]/70 via-[#3b82f6]/70 to-[#8b5cf6]/70
                         text-white hover:from-[#4ade80]/100 hover:via-[#3b82f6]/100 hover:to-[#8b5cf6]/100
                         transition shadow-md backdrop-blur-sm">
                  📄 Lihat Dokumen
                </a>
              @elseif ($tipe === 'foto' && $fotoUrl)
                <a href="{{ $fotoUrl }}" target="_blank" 
                  class="inline-block w-full text-center py-2.5 rounded-full font-bold
                         bg-gradient-to-r from-[#4ade80]/70 via-[#3b82f6]/70 to-[#8b5cf6]/70
                         text-white hover:from-[#4ade80]/100 hover:via-[#3b82f6]/100 hover:to-[#8b5cf6]/100
                         transition shadow-md backdrop-blur-sm">
                  👁️ Lihat Foto
                </a>
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
      <h2 class="text-4xl font-extrabold mt-20 mb-12 flex justify-center items-center gap-3 text-transparent bg-clip-text bg-gradient-to-r from-[#7ade8a] via-[#7ac7ff] to-[#b3a3ff] drop-shadow-md">
        <span>🎬</span>
        <span>Video</span>
      </h2>
      <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($videos as $item)
          @php
            $ytID = null;
            if (preg_match('/youtu\.be\/([^\?]+)/', $item->video_link, $m)) $ytID = $m[1];
            elseif (preg_match('/youtube\.com\/watch\?v=([^\&]+)/', $item->video_link, $m)) $ytID = $m[1];
          @endphp
          @if($ytID)
            <div class="bg-[#14203a] rounded-xl p-6 shadow-lg hover:shadow-xl transition-transform transform hover:scale-[1.03] flex flex-col justify-between">
              <h3 class="text-xl font-semibold mb-4 text-white">
                {{ $item->nama_dokumen ?? 'Video Tanpa Judul' }}
              </h3>
              <iframe src="https://www.youtube.com/embed/{{ $ytID }}" class="w-full h-48 rounded-lg mb-4 shadow-md" frameborder="0" allowfullscreen></iframe>
              <a href="{{ $item->video_link }}" target="_blank"
                class="inline-block w-full text-center py-2.5 rounded-full font-bold
                       bg-gradient-to-r from-[#4ade80]/70 via-[#3b82f6]/70 to-[#8b5cf6]/70
                       text-white hover:from-[#4ade80]/100 hover:via-[#3b82f6]/100 hover:to-[#8b5cf6]/100
                       transition shadow-md backdrop-blur-sm">
                ▶️ Tonton Video
              </a>
            </div>
          @endif
        @endforeach
      </div>
    @endif
  </div>
</section>



  <style>
  /* Gradien untuk teks saja */
  .text-gradient {
    background: linear-gradient(90deg, #22d3ee, #84cc16); /* cyan ke lime */
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    color: transparent;
    display: inline-block; /* supaya clip background bekerja dengan baik di inline */
  }
</style>

<!-- KONTAK -->
<section id="contact" class="py-24 text-center">
  <div class="container mx-auto px-8 max-w-5xl" data-aos="fade-up">
    <h2 class="text-4xl font-bold mb-10 text-lime-400">
      <span class="inline-block mr-2">🏢</span>
      <span class="text-gradient">Kontak Perusahaan</span>
    </h2>
    <div class="grid md:grid-cols-2 gap-10 items-center">
      <div class="glass p-10 rounded-3xl text-left">
        <h3 class="text-2xl font-semibold mb-4 text-lime-300">
          <span class="text-gray-200 mr-2">🌿</span>
          <span class="text-gradient">SmartTech</span>
        </h3>
        <p class="text-gray-200 mb-6">
          Kami berkomitmen menghadirkan inovasi teknologi yang berkelanjutan dan efisien untuk masa depan yang lebih baik.
        </p>
        <ul class="space-y-4 text-gray-200">
          <li class="flex items-start gap-3">
            <span class="text-lime-400 text-xl">📍</span>
            Jl. Teknologi Hijau No. 88, Bandung, Jawa Barat, Indonesia
          </li>
          <li class="flex items-start gap-3">
            <span class="text-lime-400 text-xl">📞</span>
            +62 812-3456-7890
          </li>
          <li class="flex items-start gap-3">
            <span class="text-lime-400 text-xl">✉️</span>
            contact@smarttech.co.id
          </li>
          <li class="flex items-start gap-3">
            <span class="text-lime-400 text-xl">🕒</span>
            Senin – Jumat: 08.00 - 17.00 WIB
          </li>
        </ul>
      </div>
      <div class="glass p-5 rounded-3xl">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.9982987886785!2d110.41593271532556!3d-7.806984379701406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59f5a1a9d5f9%3A0x52d74e4f3ab9a28b!2sBandung!5e0!3m2!1sid!2sid!4v1697623843013!5m2!1sid!2sid"
          width="100%" height="380" style="border:0; border-radius: 20px;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="footer-gradient py-10 text-center text-gray-300">
  <div class="flex justify-center gap-4 mb-4">
    <a href="http://127.0.0.1:8000" target="_blank"
       class="px-4 py-2 border border-cyan-400 text-cyan-400 rounded-full hover:bg-cyan-400 hover:text-white transition">
       🌐 Website
    </a>
    <a href="https://wa.me/6281234567890" target="_blank"
       class="px-4 py-2 border border-cyan-400 text-cyan-400 rounded-full hover:bg-cyan-400 hover:text-white transition">
       💬 WhatsApp
    </a>
    <a href="mailto:example@mail.com"
       class="px-4 py-2 border border-cyan-400 text-cyan-400 rounded-full hover:bg-cyan-400 hover:text-white transition">
       ✉️ Email
    </a>
  </div>
  <p class="text-sm">© 2025 <span class="font-semibold text-gradient">SmartTech</span>. All Rights Reserved.</p>
</footer>

<script>
  AOS.init();
</script>


</html>
