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

    <!-- Konten Utama dan Sidebar Kanan -->
    <main class="main-content">
        <div class="row g-4">
            <!-- Kolom Tengah -->
            <div class="col-lg-8">
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
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Tahapan Ads</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Review Iklan</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Data Invoice & PKS</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Pembuatan Ad Account</a></li>
                        </ul>
                        <button class="btn btn-primary btn-sm">
                            <i class="fas fa-plus me-2"></i>Ajukan Review Iklan
                        </button>
                    </div>
                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <div>
                            Ajukan review iklan sekarang agar tim kami bisa menilai konten iklan kamu dan melanjutkan proses aktivasi FB Ad Account Support.
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <img src="https://placehold.co/150x150/f0f2f5/888?text=Data" alt="Placeholder" class="mb-3">
                        <p class="text-muted">Data Tidak Ditemukan</p>
                    </div>
                </div>

            </div>

            <!-- Kolom Sidebar Kanan -->
            <div class="col-lg-4">
                <!-- Widget To Do List -->
                <div class="card widget-card widget-yellow mb-4">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">To Do List Shipping</h5>
                        <p class="card-text">Hore, semua To Do List sudah selesai!</p>
                    </div>
                </div>
                <!-- Widget Promo -->
                <div class="card widget-card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Iklan Bermasalah</h5>
                        <p class="card-text text-muted">Berikut adalah daftar iklan yang bermasalah.</p>
                        <ul class="list-group list-group-flush mt-3">
                             <!-- Menampilkan daftar iklan bermasalah dari database -->
                            @forelse($problemAds as $ad)
                            <li class="list-group-item d-flex align-items-center border-0 py-2 px-0">
                                <span class="badge bg-danger rounded-pill me-2">!</span>
                                <div>
                                    <span class="fw-bold">{{ $ad->campaign_name }}</span>
                                    <small class="d-block text-muted">Platform: {{ $ad->adAccount->platform->name ?? 'N/A' }}</small>
                                </div>
                            </li>
                            @empty
                            <li class="list-group-item border-0 text-muted px-0">Tidak ada iklan bermasalah saat ini.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
