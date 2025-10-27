@extends('layout.v_template')

@section('title', 'Tambah Artikel')

@section('content')
<div class="container mt-4">
  <div class="card p-4 shadow-sm rounded-4">
    <h3 class="text-center fw-bold mb-4" style="color:#4b0082;">Tambah Artikel Baru</h3>

    {{-- Menampilkan error validasi --}}
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label class="form-label fw-semibold">Judul Artikel</label>
        <input type="text" name="judul" class="form-control rounded-3" required value="{{ old('judul') }}">
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Isi Artikel</label>
        <textarea name="isi" class="form-control rounded-3" rows="5" required>{{ old('isi') }}</textarea>
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Penulis</label>
        <input type="text" name="penulis" class="form-control rounded-3" value="{{ old('penulis') }}">
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Tanggal</label>
        <input type="date" name="tanggal" class="form-control rounded-3" required value="{{ old('tanggal') }}">
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Gambar (opsional)</label>
        <input type="file" name="gambar" class="form-control rounded-3" accept="image/*" onchange="previewImage(event)">
        <div class="mt-2">
          <img id="preview" src="#" alt="Preview Gambar" class="img-fluid" style="display:none; max-height:200px;">
        </div>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary px-4 rounded-4 fw-semibold">📤 Simpan</button>
        <a href="{{ route('artikel.index') }}" class="btn btn-secondary px-4 rounded-4 ms-2">Batal</a>
      </div>
    </form>
  </div>
</div>

{{-- Script preview gambar --}}
<script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('preview');
    if(input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = '#';
        preview.style.display = 'none';
    }
}
</script>
@endsection
