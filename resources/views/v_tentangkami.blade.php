@extends('layout.v_template')
@section('title', 'Tentang Kami')

@section('content')
<div class="container mt-5">
    <div class="card p-4 shadow rounded-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-primary">📄Tentang Kami</h3>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Visi</th>
                        <th>Misi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($allTentang as $index => $row)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-semibold">{{ $row->judul }}</td>
                            <td class="text-start">{{ Str::limit($row->deskripsi, 70) }}</td>
                            <td class="text-start">{{ Str::limit($row->visi, 40) }}</td>
                            <td class="text-start">{{ Str::limit($row->misi, 40) }}</td>
                            <td>
                                @if($row->gambar)
                                    <img src="{{ asset('storage/'.$row->gambar) }}" alt="Gambar" width="80" class="rounded shadow-sm">
                                @else
                                    <small class="text-muted fst-italic">Tidak ada</small>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('tentang.edit', $row->id) }}" class="btn btn-primary btn-sm rounded-3 mb-1">✏️ Edit</a>
                                <form action="{{ route('tentang.destroy', $row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm rounded-3">🗑 Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Belum ada data Tentang Kami</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
