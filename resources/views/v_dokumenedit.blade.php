@extends('layout.v_template')

@section('title', 'Edit Dokumentasi')

@section('content')
<div class="container mt-4">
    <div class="card p-4 shadow-sm rounded-4">

        <h3 class="text-center fw-bold mb-4" style="color:#4b0082;">Edit Dokumentasi</h3>

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

        <form action="{{ route('dokumen.update', $dokumen->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_dokumen" class="form-label fw-semibold">Nama Dokumentasi</label>
                <input type="text" name="nama_dokumen" class="form-control rounded-3" id="nama_dokumen" required
                       value="{{ old('nama_dokumen', $dokumen->nama_dokumen) }}">
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label fw-semibold">Deskripsi (opsional)</label>
                <textarea name="deskripsi" class="form-control rounded-3" id="deskripsi" rows="3">{{ old('deskripsi', $dokumen->deskripsi) }}</textarea>
            </div>

            {{-- Pilihan tipe --}}
            <div class="mb-3">
                <label for="tipe" class="form-label fw-semibold">Tipe Dokumentasi</label>
                <select name="tipe" id="tipe" class="form-select rounded-3" required onchange="toggleInput()">
                    <option value="">-- Pilih Tipe --</option>
                    <option value="pdf" {{ $dokumen->tipe == 'pdf' ? 'selected' : '' }}>📄 Dokumen (PDF)</option>
                    <option value="foto" {{ $dokumen->tipe == 'foto' ? 'selected' : '' }}>🖼️ Foto</option>
                    <option value="video_link" {{ $dokumen->tipe == 'video_link' ? 'selected' : '' }}>🎥 Video Link</option>
                </select>
            </div>

            {{-- Input PDF --}}
            <div class="mb-3" id="fileInput" style="display:none;">
                <label for="file_path" class="form-label fw-semibold">Ganti File PDF (opsional)</label>
                <input type="file" name="file_path" class="form-control rounded-3" accept=".pdf">
                @if($dokumen->file_path)
                    <small class="text-muted d-block mt-1">
                        File saat ini:
                        <a href="{{ asset('storage/' . $dokumen->file_path) }}" target="_blank">📄 Lihat PDF</a>
                    </small>
                @endif
            </div>

            {{-- Input Foto --}}
            <div class="mb-3" id="fotoInput" style="display:none;">
                <label for="foto" class="form-label fw-semibold">Ganti Foto (opsional)</label>
                <input type="file" name="foto" class="form-control rounded-3" accept="image/*">
                @if($dokumen->foto)
                    <small class="text-muted d-block mt-1">
                        Foto saat ini:
                        <a href="{{ asset('storage/' . $dokumen->foto) }}" target="_blank">📷 Lihat Foto</a>
                    </small>
                @endif
            </div>

            {{-- Input Video Link --}}
            <div class="mb-3" id="videoInput" style="display:none;">
                <label for="video_link" class="form-label fw-semibold">Link Video</label>
                <input type="url" name="video_link" class="form-control rounded-3" placeholder="Contoh: https://youtube.com/watch?v=xxxx" value="{{ old('video_link', $dokumen->video_link) }}">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success px-4 rounded-4 fw-semibold">💾 Simpan Perubahan</button>
                <a href="{{ route('dokumen.index') }}" class="btn btn-secondary px-4 rounded-4 ms-2">Batal</a>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleInput() {
        const tipe = document.getElementById('tipe').value;
        document.getElementById('fileInput').style.display = tipe === 'pdf' ? 'block' : 'none';
        document.getElementById('fotoInput').style.display = tipe === 'foto' ? 'block' : 'none';
        document.getElementById('videoInput').style.display = tipe === 'video_link' ? 'block' : 'none';
    }
    document.addEventListener('DOMContentLoaded', toggleInput);
</script>
@endsection
