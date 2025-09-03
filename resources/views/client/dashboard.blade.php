<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Client Everpro</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Swiper.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
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
                    <a class="nav-link active" href="#"><i class="fas fa-home me-2"></i>Beranda</a>
                </li>
                
                <!-- Menu "Ads" dengan Submenu -->
                <li class="nav-item">
                    <details open>
                        <summary class="nav-link text-muted d-flex justify-content-between align-items-center">
                            <div><i class="fas fa-bullhorn me-2"></i>Ads</div>
                            <i class="fas fa-chevron-down summary-icon"></i>
                        </summary>
                        <ul class="sub-menu">
                            @foreach($adAccounts->unique('platform.name') as $account)
                                <li class="nav-item">
                                    <a class="nav-link text-muted" href="#">{{ $account->platform->name }}</a>
                                </li>
                            @endforeach
                            <li class="nav-item">
                                <a class="nav-link text-muted" href="{{ route('ads.platforms') }}">Platform Iklan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-muted" href="{{ route('ads.review') }}">Review Iklan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-muted" href="#">Saldo Iklan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-muted" href="#">Iklan Bermasalah</a>
                            </li>
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

                <!-- Swiper -->
                <div class="main-banner swiper mySwiper">
                    <div class="swiper-wrapper">
                        <!-- Menampilkan iklan secara dinamis dari database -->
                        @forelse($iklans as $iklan)
                            <a href="{{ $iklan->link }}" class="swiper-slide">
                                <img src="{{ asset('storage/iklan/' . $iklan->gambar) }}" onerror="this.onerror=null; this.src='https://placehold.co/800x350/E9F5FF/0d6efd?text=Iklan+Tidak+Ditemukan';" alt="{{ $iklan->judul }}">
                            </a>
                        @empty
                            <div class="swiper-slide d-flex flex-column align-items-center justify-content-center text-center p-5">
                                <h5 class="text-muted">Tidak ada iklan yang tersedia saat ini.</h5>
                                <p class="text-muted mt-2">Tambahkan iklan dari dashboard admin untuk ditampilkan di sini.</p>
                            </div>
                        @endforelse
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Navigation -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

                <!-- Selamat Datang & Interaksi -->
                <div class="card widget-card mt-4">
                    <div class="card-body">
                        <h4 class="card-title fw-bold">Selamat datang di everpro!</h4>
                        <p class="card-text text-muted">#JadiMakinPro optimalkan bisnismu dengan pilihan layanan lengkap dalam satu platform.</p>
                        <hr>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-0 py-3">
                                <span class="fw-bold"><i class="fas fa-question-circle text-primary me-2"></i>Mau sewa whitelist Akun Iklan + Top Up Ads?</span>
                                <a href="#" class="btn btn-outline-primary btn-sm rounded-pill">Daftar Sekarang</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-0 py-3">
                                <span class="fw-bold"><i class="fas fa-question-circle text-primary me-2"></i>Buka Ads Service</span>
                                <a href="#" class="btn btn-outline-primary btn-sm rounded-pill">Buka Sekarang</a>
                            </li>
                        </ul>
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
<!-- Swiper.js -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    // Inisialisasi Swiper
    document.addEventListener('DOMContentLoaded', function () {
        if (document.querySelector('.swiper')) {
            const swiper = new Swiper('.mySwiper', {
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        }
    });
</script>

</body>
</html>
