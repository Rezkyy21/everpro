<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Platform Iklan - Everpro</title>
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
                            <li class="nav-item"><a class="nav-link active" href="#"><i class="fas fa-desktop me-2"></i>Platform Iklan</a></li>
                             <li class="nav-item"><a class="nav-link text-muted" href="{{ route('ads.review') }}"><i class="fas fa-desktop me-2"></i>Review Iklan</a></li>
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
                    <h5 class="fw-bold text-everpro-blue"><i class="fas fa-bullhorn me-2"></i>Ads</h5>
                    <h3 class="mt-3">Ngiklan di Facebook dan Google lebih mudah, cepat, dan aman!</h3>
                    <p class="text-muted">Dengan memilih platform iklan di bawah ini, kami siap bantu optimalkan ads-mu di Everpro Academy.</p>
                    <hr>
                    <h5 class="mt-4 fw-bold">Apa saja keuntungan Everpro Ads?</h5>
                    <div class="row mt-3">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-medal text-everpro-blue me-3 fs-4 mt-1"></i>
                                <div>
                                    <h6 class="fw-bold">Fitur lengkap, ingin ngiklan auto scale? Bisa!</h6>
                                    <p class="text-muted small">Hubungkan dan kelola semua akun iklanmu (Facebook, Google, dll.) di satu tempat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-shield-alt text-everpro-blue me-3 fs-4 mt-1"></i>
                                <div>
                                    <h6 class="fw-bold">Aman dari limit ads 24/7.</h6>
                                    <p class="text-muted small">Tidak ada lagi ribet ngurus akun iklan, biar tim Everpro yang urus semuanya.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="mt-4 fw-bold">Layanan Iklan di Everpro</h5>
                    <hr>
                    <div class="list-group list-group-flush everpro-chat-list">
                        @foreach($platforms as $platform)
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-0 py-3">
                            <span class="fw-bold"><i class="fab fa-{{ strtolower(str_replace(' Ads', '', $platform->name)) }} me-2 text-primary"></i>{{ $platform->name }} Whitelist Account <span class="badge bg-secondary">Ongoing</span></span>
                            <a href="#" class="btn btn-outline-primary btn-sm rounded-pill">Daftar Sekarang</a>
                        </li>
                        @endforeach
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
