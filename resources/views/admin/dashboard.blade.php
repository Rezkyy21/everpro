<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Everpro</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <!-- CSS Kustom untuk Tampilan Admin -->
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
</head>
<body>

<div class="dashboard-container">
    <!-- Sidebar Kiri - Admin -->
    <aside class="sidebar">
        <div class="logo">ADMIN</div>
        <nav>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}" href="#"><i class="fas fa-chart-line me-2"></i>Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-users me-2"></i>Manajemen User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-shopping-cart me-2"></i>Manajemen Pesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-box me-2"></i>Manajemen Produk</a>
                </li>
                
                <!-- Menu "Manajemen Iklan" dengan Submenu -->
                <li class="nav-item">
                    <details {{ Request::routeIs('admin.iklan.*') ? 'open' : '' }}>
                        <summary class="nav-link d-flex justify-content-between align-items-center">
                            <div><i class="fas fa-bullhorn me-2"></i>Manajemen Iklan</div>
                            <i class="fas fa-chevron-down summary-icon"></i>
                        </summary>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::routeIs('admin.iklan.index') ? 'active' : '' }}" href="{{ route('admin.iklan.index') }}">Lihat Daftar Iklan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::routeIs('admin.iklan.create') ? 'active' : '' }}" href="{{ route('admin.iklan.create') }}">Tambah Iklan Baru</a>
                            </li>
                        </ul>
                    </details>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-cog me-2"></i>Pengaturan</a>
                </li>
            </ul>
        </nav>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">
                Log Out
            </button>
        </form>
    </aside>

    <!-- Konten Utama -->
    <main class="main-content">
        <!-- Header Atas -->
        <header class="main-header d-flex align-items-center justify-content-between">
            <h2 class="mb-0 fw-bold text-dark">Dashboard Admin</h2>
            <div class="user-info">
                <span>Admin</span>
                <i class="fas fa-user-circle fs-3 text-secondary ms-2"></i>
            </div>
        </header>

        <!-- Kartu Statistik -->
        <div class="row g-4 mb-4">
            <div class="col-lg-4">
                <div class="card stat-card text-center">
                    <div class="card-body">
                        <div class="card-icon bg-success"><i class="fas fa-users"></i></div>
                        <h5 class="card-title text-muted">Total Pengguna</h5>
                        <div class="value">1,250</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card stat-card text-center">
                    <div class="card-body">
                        <div class="card-icon bg-warning"><i class="fas fa-shopping-cart"></i></div>
                        <h5 class="card-title text-muted">Total Pesanan</h5>
                        <div class="value">489</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card stat-card text-center">
                    <div class="card-body">
                        <div class="card-icon bg-info"><i class="fas fa-box"></i></div>
                        <h5 class="card-title text-muted">Total Produk</h5>
                        <div class="value">3,120</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Tabel Data Terbaru -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title fw-bold">Pesanan Terbaru</h5>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID Pesanan</th>
                                <th>Nama Pelanggan</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Contoh data dummy, ganti dengan data dari database -->
                            <tr>
                                <td>#1001</td>
                                <td>Budi Santoso</td>
                                <td><span class="badge bg-success">Selesai</span></td>
                                <td>Rp 250,000</td>
                            </tr>
                            <tr>
                                <td>#1002</td>
                                <td>Siti Aminah</td>
                                <td><span class="badge bg-warning">Tertunda</span></td>
                                <td>Rp 175,500</td>
                            </tr>
                            <tr>
                                <td>#1003</td>
                                <td>Joko Susanto</td>
                                <td><span class="badge bg-danger">Dibatalkan</span></td>
                                <td>Rp 50,000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
