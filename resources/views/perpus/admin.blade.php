<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar { background-color: #28a745; color: white; height: 100vh; }
        .sidebar .nav-link { color: white; }
        .content { background-color: #f8f9fa; }
        .card-icon { font-size: 2rem; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-3">
                    <div class="text-center mb-3">
                        <img src="admin-avatar.png" alt="Admin" class="rounded-circle" width="100">
                        <h5 class="mt-2">admin</h5>
                        <p>Status: Admin</p>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link active" href="/perpus/admin"><i class="fas fa-home"></i> Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/perpus/admin/peminjaman"><i class="fas fa-book"></i> Peminjaman</a></li>
                        <li class="nav-item"><a class="nav-link" href="/perpus/admin/databuku"><i class="fas fa-book-open"></i> Pustaka</a></li>
                        <li class="nav-item"><a class="nav-link" href="/perpus/admin/lapinjam"><i class="fas fa-chart-bar"></i> Laporan</a></li>
                        <li class="nav-item"><a class="nav-link" href="/perpus/admin/crew"><i class="fas fa-users"></i> Anggota</a></li>
                        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-user-tie"></i> Karyawan</a></li>
                        <li class="nav-item"><a class="nav-link" href="/perpus/admin/set"><i class="fas fa-cog"></i> Setting App</a></li>
                    </ul>
                </div>
                <div class="position-absolute bottom-0 start-0 p-3">
                    <img src="qr-code.png" alt="QR Code" width="100">
                    <p class="mt-2">03:49</p>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Home</h1>
                </div>

                <!-- Dashboard cards -->
                <div class="row row-cols-1 row-cols-md-4 g-4 mb-4">
                    <div class="col">
                        <div class="card text-white bg-info">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-users card-icon"></i> Anggota</h5>
                                <p class="card-text display-6">{{ $user_count }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-danger">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-book card-icon"></i> Jumlah Buku</h5>
                                <p class="card-text display-6">{{ $book_count }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-tag card-icon"></i> Peminjaman Hari ini</h5>
                                <p class="card-text display-6">NaN</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-warning">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-sync card-icon"></i> Buku Kembali Hari ini</h5>
                                <p class="card-text display-6">NaN</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart.js code would go here to create the borrowing graph
    </script>
</body>
</html>
