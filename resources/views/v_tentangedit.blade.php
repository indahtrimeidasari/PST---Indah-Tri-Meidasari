@extends('layout.v_template')
@section('title', 'Edit Tentang Kami')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-4 p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-primary">✏️ Edit Tentang Kami</h3>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tentang.update', $tentang->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul', $tentang->judul) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" rows="4" class="form-control" required>{{ old('deskripsi', $tentang->deskripsi) }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Visi</label>
                    <textarea name="visi" rows="3" class="form-control">{{ old('visi', $tentang->visi) }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Misi</label>
                    <textarea name="misi" rows="3" class="form-control">{{ old('misi', $tentang->misi) }}</textarea>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar (Opsional)</label>
                <input type="file" name="gambar" class="form-control" accept="image/*" onchange="previewImage(event)">
                @if($tentang->gambar)
                    <img id="preview" src="{{ asset('storage/'.$tentang->gambar) }}" class="mt-2 rounded shadow" style="max-width:150px;">
                @else
                    <img id="preview" src="#" class="mt-2 rounded shadow" style="display:none; max-width:150px;">
                @endif
            </div>

            <button type="submit" class="btn btn-primary rounded-3">💾 Simpan Perubahan</button>
            <a href="{{ route('tentang.index') }}" class="btn btn-secondary rounded-4">⬅ Kembali</a>
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
