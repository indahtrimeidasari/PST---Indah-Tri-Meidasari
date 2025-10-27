@extends('layout.v_template')

@section('title', 'Dashboard')

@section('content')
<div class="container py-5 animate__animated animate__fadeIn">
  <div class="d-flex flex-column align-items-center justify-content-center text-center">

    <!-- 🌿 Kartu Selamat Datang -->
    <div class="card shadow-lg border-0 p-5" 
         style="max-width: 750px; border-radius: 25px; background: linear-gradient(135deg, #f8fbff, #f1f8f5);">
      <div class="card-body">
        <h2 class="fw-bold text-primary mb-3">
          Selamat Datang 🎉
        </h2>

        <h4 class="text-capitalize fw-semibold mb-3" style="color: #2e7d32;">
          Halo, {{ Auth::user()->name }}
        </h4>

        <p class="text-muted mb-1 fs-5">
          Selamat datang di sistem <strong>Smart Tech 🌿</strong>
        </p>

        <p class="text-secondary mt-3">
          Gunakan menu di sebelah kiri untuk mengelola profil dan dokumen Anda.
        </p>
      </div>
    </div>

    <!-- ✨ Info bawah -->
    <div class="mt-5 small text-muted">
      <i class="bi bi-lightbulb text-warning"></i> Navigasikan fitur melalui sidebar di sebelah kiri.
    </div>
  </div>
</div>

<!-- 🎨 Animasi & Ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection
