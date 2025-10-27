@extends('layout.v_template')
@section('title', 'Tambah Tentang Kami')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-4 p-4">
        <h3 class="fw-bold text-primary mb-4 text-center">➕ Tambah Tentang Kami</h3>

        {{-- 🔔 Pesan Error --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- 📝 Form Tambah --}}
        <form action="{{ route('tentang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="deskripsi" rows="4" class="form-control" required>{{ old('deskripsi') }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Visi</label>
                    <textarea name="visi" rows="3" class="form-control">{{ old('visi') }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Misi</label>
                    <textarea name="misi" rows="3" class="form-control">{{ old('misi') }}</textarea>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Gambar (Opsional)</label>
                <input type="file" name="gambar" class="form-control" accept="image/*" onchange="previewImage(event)">
                <img id="preview" src="#" class="mt-3 rounded shadow-sm" style="display:none; max-width:150px;">
            </div>

            {{-- 🔘 Tombol Aksi --}}
            <div class="d-flex justify-content-between align-items-center mt-4">
                <a href="{{ route('tentang.index') }}" class="btn btn-secondary rounded-4 px-4">
                    ⬅ Kembali
                </a>
                <button type="submit" class="btn btn-success rounded-4 px-4">
                    💾 Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(event){
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('preview');
        output.src = reader.result;
        output.style.display = 'block';
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection
