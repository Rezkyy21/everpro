<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Detail Review Iklan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .container { margin-top: 50px; }
        .card { border-radius: 1rem; }
        .ad-creative { max-width: 100%; height: auto; border-radius: 8px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Detail Review Iklan</h4>
                <a href="{{ route('admin.ad_review.index') }}" class="btn btn-light btn-sm"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <img src="{{ asset('storage/ad_reviews/' . $adReview->creative_image) }}" alt="{{ $adReview->campaign_name }}" class="ad-creative img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h5>**Nama Kampanye:** {{ $adReview->campaign_name }}</h5>
                        <p>**Pengaju:** {{ $adReview->user->name ?? 'N/A' }}</p>
                        <p>**Akun Iklan:** {{ $adReview->adAccount->platform->name ?? 'N/A' }}</p>
                        <hr>
                        <h6>**Teks Iklan:**</h6>
                        <p>{{ $adReview->creative_text ?? 'Tidak ada teks iklan.' }}</p>
                        <hr>
                        <h6>**Status Review:**</h6>
                        <span class="badge 
                            @if($adReview->status == 'pending') bg-warning
                            @elseif($adReview->status == 'approved') bg-success
                            @else bg-danger @endif">
                            {{ ucfirst($adReview->status) }}
                        </span>
                        <hr>
                        <h6>**Catatan Admin:**</h6>
                        <p>{{ $adReview->notes ?? 'Tidak ada catatan.' }}</p>

                        <hr>

                        <form action="{{ route('admin.ad_review.update', $adReview->id) }}" method="POST" class="mt-4">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="status" class="form-label">Ubah Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="pending" {{ $adReview->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="approved" {{ $adReview->status == 'approved' ? 'selected' : '' }}>Disetujui</option>
                                    <option value="rejected" {{ $adReview->status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="notes" class="form-label">Catatan</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3">{{ $adReview->notes }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
