@extends('layout.v_template')

@section('title', 'Edit Artikel')

@section('content')
<div class="container mt-4">
  <h3 class="fw-bold mb-4">Edit Artikel</h3>

  <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Judul Artikel</label>
      <input type="text" name="judul" class="form-control" value="{{ $artikel->judul }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Isi Artikel</label>
      <textarea name="isi" class="form-control" rows="5" required>{{ $artikel->isi }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Penulis</label>
      <input type="text" name="penulis" class="form-control" value="{{ $artikel->penulis }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Tanggal</label>
      <input type="date" name="tanggal" class="form-control" value="{{ $artikel->tanggal }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Gambar</label>
      <input type="file" name="gambar" class="form-control">
      @if($artikel->gambar)
          <img src="{{ asset('storage/'.$artikel->gambar) }}" alt="Gambar" width="100" class="mt-2 rounded">
      @endif
    </div>

    <button type="submit" class="btn btn-primary px-4 rounded-pill">💾 Simpan Perubahan</button>
    <a href="{{ route('artikel.index') }}" class="btn btn-secondary rounded-pill">Kembali</a>
  </form>
</div>
@endsection
