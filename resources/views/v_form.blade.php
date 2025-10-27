<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Budidaya Jamur Merang</title>
</head>
<body style="background-color: #f4e1d2;"> <!-- Coklat muda pastel -->

    <div class="container mt-5">
        <h2 class="text-center">Form Budidaya Jamur Merang</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card p-4 shadow">
            <form action="{{ route('budidaya.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Petani</label>
                    <input type="text" name="nama_petani" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Lokasi Budidaya</label>
                    <input type="text" name="lokasi" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Bibit (kg)</label>
                    <input type="number" name="jumlah_bibit" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Tanam</label>
                    <input type="date" name="tanggal_tanam" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Perkiraan Panen</label>
                    <input type="date" name="perkiraan_panen" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Simpan Data</button>
            </form>
        </div>
    </div>

</body>
</html>
