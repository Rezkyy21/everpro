<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Kelola Iklan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .container { margin-top: 50px; }
        .card { border-radius: 1rem; }
        .iklan-img { max-height: 100px; object-fit: cover; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Kelola Iklan</h4>
                <a href="{{ route('admin.iklan.create') }}" class="btn btn-light btn-sm"><i class="fas fa-plus me-2"></i>Tambah Iklan Baru</a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                @if($iklans->isEmpty())
                    <div class="alert alert-info text-center" role="alert">
                        Tidak ada iklan yang tersedia. Silakan tambahkan satu.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($iklans as $iklan)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/iklan/' . $iklan->gambar) }}" alt="{{ $iklan->judul }}" class="img-thumbnail iklan-img">
                                        </td>
                                        <td>{{ $iklan->judul }}</td>
                                        <td><a href="{{ $iklan->link }}" target="_blank">{{ $iklan->link }}</a></td>
                                        <td>
                                            <span class="badge {{ $iklan->aktif ? 'bg-success' : 'bg-danger' }}">{{ $iklan->aktif ? 'Aktif' : 'Nonaktif' }}</span>
                                        </td>
                                        <td class="text-end">
                                            <form action="{{ route('admin.iklan.destroy', $iklan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus iklan ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
