@extends('layout.v_template')

@section('title', 'Profil Saya')

@section('content')
<div class="container mt-4">
  <div class="card shadow-sm border-0 rounded-4">
    <div class="card-body">
      <h3 class="text-primary fw-bold text-center mb-3">👤 Ubah Profil</h3>
      <p class="text-center text-muted">Perbarui informasi akun Anda dengan mudah</p>

      @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
      @endif

      {{-- Form Ubah Profil --}}
      <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="text-center mb-4">
          <img id="previewFoto" 
               src="{{ $user->foto ? asset('storage/foto_user/' . $user->foto) : asset('images/default-avatar.png') }}" 
               alt="Foto Profil" 
               class="rounded-circle border border-3 border-primary shadow-sm mb-3" 
               width="120" height="120">
          <input type="file" name="foto" accept="image/*" class="form-control mx-auto" 
                 style="max-width: 300px;" onchange="previewImage(event)">
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Nama Lengkap</label>
          <input type="text" name="name" class="form-control rounded-3" 
                 value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Email</label>
          <input type="email" name="email" class="form-control rounded-3" 
                 value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Password Baru</label>
          <input type="password" name="password" class="form-control rounded-3" 
                 placeholder="Kosongkan jika tidak diubah">
        </div>

        <div class="mb-4">
          <label class="form-label fw-semibold">Konfirmasi Password</label>
          <input type="password" name="password_confirmation" class="form-control rounded-3" 
                 placeholder="Ulangi password baru">
        </div>

        <div class="text-end">
          <button type="submit" class="btn btn-primary px-4 fw-semibold">
            💾 Simpan Perubahan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Preview Gambar --}}
<script>
  function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
      document.getElementById('previewFoto').src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }
</script>
@endsection
