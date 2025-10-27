@extends('layout.v_template')

@section('title', 'Tambah Dokumentasi')

@section('content')
<div class="container mt-4">
  <div class="card p-4 shadow-sm rounded-4">
    <h3 class="text-center fw-bold mb-4 text-primary">Tambah Dokumentasi Baru</h3>

    {{-- Notifikasi error --}}
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('dokumen.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label class="form-label fw-semibold">Nama Dokumentasi</label>
        <input type="text" name="nama_dokumen" class="form-control rounded-3" value="{{ old('nama_dokumen') }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Deskripsi (Opsional)</label>
        <textarea name="deskripsi" class="form-control rounded-3" rows="3">{{ old('deskripsi') }}</textarea>
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Tipe Dokumentasi</label>
        <select name="tipe" id="tipe" class="form-select rounded-3" required onchange="toggleInput()">
          <option value="">-- Pilih Tipe --</option>
          <option value="pdf">📄 Dokumen (PDF)</option>
          <option value="foto">🖼️ Foto / Gambar</option>
          <option value="video">🎥 Video (Link)</option>
        </select>
      </div>

      <div class="mb-3" id="fileInput" style="display:none;">
        <label class="form-label fw-semibold">File</label>
        <input type="file" name="file" class="form-control rounded-3">
        <small class="text-muted">PDF max 10MB / Gambar max 10MB</small>
      </div>

      <div class="mb-3" id="videoInput" style="display:none;">
        <label class="form-label fw-semibold">Link Video</label>
        <input type="url" name="video_link" class="form-control rounded-3" placeholder="https://youtube.com/watch?v=xxxx">
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary px-4 rounded-4 fw-semibold">📤 Upload</button>
        <a href="{{ route('dokumen.index') }}" class="btn btn-secondary px-4 rounded-4 ms-2">Batal</a>
      </div>
    </form>
  </div>
</div>

<script>
  function toggleInput() {
    const tipe = document.getElementById('tipe').value;
    document.getElementById('fileInput').style.display = (tipe === 'pdf' || tipe === 'foto') ? 'block' : 'none';
    document.getElementById('videoInput').style.display = tipe === 'video' ? 'block' : 'none';
  }
</script>
@endsection
