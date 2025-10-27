@extends('layout.v_template')

@section('title', 'Kelola Dokumen')

@section('content')
@php use Illuminate\Support\Str; @endphp

<div class="container mt-4">
    <div class="card shadow-sm border-0 rounded-4 p-4">
        <h3 class="text-center fw-bold mb-4" style="color:#4b0082;">📁 Kelola Dokumentasi</h3>

        @if(session('success'))
            <div class="alert alert-success text-center rounded-3">{{ session('success') }}</div>
        @endif

        <div class="text-end mb-3">
            <a href="{{ route('dokumen.create') }}" class="btn text-white fw-semibold"
               style="background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%); border:none;">
               📤 Upload Dokumentasi
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered align-middle shadow-sm">
                <thead style="background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%); color:white;">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Dokumen</th>
                        <th>Tipe</th>
                        <th>Deskripsi</th>
                        <th>Preview</th>
                        <th>Tanggal Upload</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dokumen as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $item->nama_dokumen }}</td>
                            <td class="text-center text-capitalize">{{ $item->tipe ?? '-' }}</td>
                            <td>{{ $item->deskripsi ?? '-' }}</td>
                            <td class="text-center">
                                @php
                                    $tipe = strtolower($item->tipe ?? '');
                                    $yt_embed = null;

                                    if(!empty($item->video_link)) {
                                        preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^\&\?\/]+)/', $item->video_link, $matches);
                                        if(isset($matches[1])) {
                                            $yt_embed = "https://www.youtube.com/embed/".$matches[1];
                                        }
                                    }
                                @endphp

                                {{-- Preview PDF --}}
                                @if (($tipe === 'pdf' || $tipe === 'dokumen') && !empty($item->file_path))
                                    <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">📄 Lihat PDF</a>
                                {{-- Preview Foto --}}
                                @elseif ($tipe === 'foto' && !empty($item->foto))
                                    <a href="{{ asset('storage/' . $item->foto) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $item->foto) }}" width="90" height="70" style="object-fit: cover; border-radius:10px;">
                                    </a>
                                {{-- Preview Video --}}
                                @elseif ($tipe === 'video' && $yt_embed)
                                    <div style="max-width: 200px; margin:auto; border-radius:10px; overflow:hidden;">
                                        <iframe class="w-100" style="aspect-ratio:16/9; border:0;" src="{{ $yt_embed }}" allowfullscreen loading="lazy"></iframe>
                                    </div>
                                @else
                                    <span class="text-muted">Tidak ada file</span>
                                @endif
                            </td>
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($item->created_at)->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i') }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('dokumen.edit', $item->id) }}" class="btn btn-sm btn-warning">✏ Edit</a>
                                <form action="{{ route('dokumen.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus dokumentasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">🗑 Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-3">Belum ada dokumentasi yang diunggah.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
                                    