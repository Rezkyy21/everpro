<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Iklan - Everpro</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- CSS Kustom yang sudah dipisah -->
    <link rel="stylesheet" href="{{ asset('css/client_custom.css') }}">
    <style>
        .ad-review-creative { max-height: 100px; object-fit: contain; }
        .dashboard-container { display: flex; }
        .main-content { flex-grow: 1; padding: 2rem; }
    </style>
</head>
<body>

<div class="dashboard-container">
    <!-- Sidebar Kiri (Navigasi) -->
    <aside class="sidebar">
        <div class="logo">everpro</div>
        <nav>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('client.dashboard') }}"><i class="fas fa-home me-2"></i>Beranda</a>
                </li>
                
                <!-- Menu "Ads" dengan Submenu -->
                <li class="nav-item">
                    <details open>
                        <summary class="nav-link text-muted d-flex justify-content-between align-items-center">
                            <div><i class="fas fa-bullhorn me-2"></i>Ads</div>
                            <i class="fas fa-chevron-down summary-icon"></i>
                        </summary>
                        <ul class="sub-menu">
                            <li class="nav-item"><a class="nav-link text-muted" href="{{ route('ads.platforms') }}"><i class="fas fa-desktop me-2"></i>Platform Iklan</a></li>
                            <li class="nav-item"><a class="nav-link active" href="#"><i class="fas fa-chart-line me-2"></i>Review Iklan</a></li>
                            <li class="nav-item"><a class="nav-link text-muted" href="{{ route('ads.balance') }}"><i class="fas fa-desktop me-2"></i>Saldo Iklan</a></li>
                            <li class="nav-item"><a class="nav-link text-muted" href="{{ route('ads.problem') }}"><i class="fas fa-desktop me-2"></i>Iklan Bermasalah</a></li>
                        </ul>
                    </details>
                </li>
                
                <!-- Menu lainnya -->
                <li class="nav-item">
                    <a class="nav-link text-muted" href="#"><i class="fas fa-cog me-2"></i>Pengaturan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted" href="#"><i class="fas fa-info-circle me-2"></i>Info Fitur Terbaru</a>
                </li>
            </ul>
        </nav>
        <div class="mt-auto p-3 border-top">
            <a href="#" class="btn btn-primary w-100 mb-2"><i class="fas fa-users me-2"></i>Gabung ke Grup Belajar</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-secondary w-100">
                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Konten Utama -->
    <main class="main-content">
        <div class="row g-4">
            <div class="col-lg-12">
                <!-- Header Atas -->
                <header class="main-header d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center w-50">
                        <div class="input-group me-3">
                            <input type="text" class="form-control" placeholder="Lacak Order ID">
                        </div>
                    </div>
                    <div class="user-info">
                        <span class="fw-bold me-3">Rp. 37.500</span>
                        <span>{{ $user->name }}</span>
                        <i class="fas fa-user-circle profile-pic fs-3 text-secondary"></i>
                    </div>
                </header>

                <div class="card p-4 shadow-sm mb-4">
                    <h3 class="fw-bold">Review Iklan</h3>
                    <p class="text-muted">Review dan kelola semua iklan Anda dari berbagai platform.</p>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link" href="#">Tahapan Ads</a></li>
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Review Iklan</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Data Invoice & PKS</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Pembuatan Ad Account</a></li>
                        </ul>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#reviewModal">
                            <i class="fas fa-plus me-2"></i>Ajukan Review Iklan
                        </button>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if($adReviews->isEmpty())
                        <div class="text-center mt-5">
                            <img src="https://placehold.co/150x150/f0f2f5/888?text=Data" alt="Placeholder" class="mb-3">
                            <p class="text-muted">Data Tidak Ditemukan</p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>Gambar</th>
                                        <th>Nama Kampanye</th>
                                        <th>Akun Iklan</th>
                                        <th>Status</th>
                                        <th>Catatan Admin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($adReviews as $review)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/ad_reviews/' . $review->creative_image) }}" alt="{{ $review->campaign_name }}" class="img-thumbnail ad-review-creative">
                                            </td>
                                            <td>{{ $review->campaign_name }}</td>
                                            <td>{{ $review->adAccount->platform->name ?? 'N/A' }}</td>
                                            <td>
                                                <span class="badge 
                                                    @if($review->status == 'pending') bg-warning
                                                    @elseif($review->status == 'approved') bg-success
                                                    @else bg-danger @endif">
                                                    {{ ucfirst($review->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $review->notes ?? 'Tidak ada.' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Modal Ajukan Review Iklan -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">Ajukan Review Iklan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ads.review.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="link_landing_page" class="form-label">*Link Landing Page</label>
                        <input type="url" class="form-control" id="link_landing_page" name="link_landing_page" placeholder="Contoh: https://landingpageku.domain/" required>
                    </div>
                    <div class="mb-3">
                        <label for="link_fanpage" class="form-label">*Link Fanpage</label>
                        <input type="url" class="form-control" id="link_fanpage" name="link_fanpage" placeholder="Contoh: https://www.facebook.com/FanPageku" required>
                    </div>
                    <div class="mb-3">
                        <label for="ad_copy" class="form-label">*Ad Copy</label>
                        <textarea class="form-control" id="ad_copy" name="ad_copy" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="link_creative_asset" class="form-label">*Link Creative Asset</label>
                        <input type="url" class="form-control" id="link_creative_asset" name="link_creative_asset" placeholder="Contoh: https://drive.google.com/drive/folders/creativeassetku" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
