@extends('layout.v_template')

@section('title', 'Kelola Artikel')

@section('content')
<div class="container mt-4">
    <div class="card p-4 shadow-sm rounded-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold" style="color:#4b0082;">📰 Daftar Artikel</h3>
            <a href="{{ route('artikel.create') }}" class="btn btn-success rounded-4">➕ Tambah Artikel</a>
        </div>

        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light text-center">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tanggal</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($artikel as $index => $row)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $row->judul }}</td>
                    <td>{{ $row->penulis ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($row->tanggal)->format('d-m-Y') }}</td>
                    <td class="text-center">
                        @if($row->gambar)
                        <img src="{{ asset('storage/'.$row->gambar) }}" alt="Gambar" width="70" class="rounded">
                        @else
                        <small class="text-muted">Tidak ada</small>
                        @endif
                    </td>
                    <td class="text-center d-flex justify-content-center gap-2">
                        <a href="{{ route('artikel.edit', $row->id) }}" class="btn btn-primary btn-sm rounded-3">✏️ Edit</a>
                        <form action="{{ route('artikel.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Hapus artikel ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded-3">🗑 Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada artikel tersedia</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
