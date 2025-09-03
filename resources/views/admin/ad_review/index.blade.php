<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Daftar Review Iklan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .container { margin-top: 50px; }
        .card { border-radius: 1rem; }
        .ad-image { max-height: 80px; object-fit: contain; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Daftar Review Iklan</h4>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                @if($adReviews->isEmpty())
                    <div class="alert alert-info text-center" role="alert">
                        Tidak ada review iklan yang diajukan saat ini.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Nama Kampanye</th>
                                    <th>Pengaju</th>
                                    <th>Akun Iklan</th>
                                    <th>Status</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($adReviews as $review)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/ad_reviews/' . $review->creative_image) }}" alt="{{ $review->campaign_name }}" class="img-thumbnail ad-image">
                                        </td>
                                        <td>{{ $review->campaign_name }}</td>
                                        <td>{{ $review->user->name ?? 'N/A' }}</td>
                                        <td>{{ $review->adAccount->platform->name ?? 'N/A' }}</td>
                                        <td>
                                            <span class="badge 
                                                @if($review->status == 'pending') bg-warning
                                                @elseif($review->status == 'approved') bg-success
                                                @else bg-danger @endif">
                                                {{ ucfirst($review->status) }}
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('admin.ad_review.show', $review->id) }}" class="btn btn-info btn-sm">Lihat Detail</a>
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
