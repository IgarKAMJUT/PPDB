<?php
include 'config/koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: auth/login.php");
    exit;
}
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Dashboard</title>
</head>
<body style="background-color: #f4f6f9;">
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm mb-4" style="background: linear-gradient(90deg, #212529, #343a40);">
        <div class="container">
            <a class="navbar-brand fw-bold" href="dashboard.php">
                <i class="bi bi-grid-1x2-fill me-2"></i>Dashboard
            </a>
            <div class="d-flex text-white align-items-center">
                <div class="me-3 text-end">
                    <small class="d-block text-light" style="line-height: 1;">Selamat datang,</small>
                    <strong><?= $_SESSION['username'] ?></strong> 
                    <span class="badge bg-<?php echo ($role=='admin')?'primary':'success'; ?> ms-1"><?= strtoupper($role) ?></span>
                </div>
                <a href="auth/logout.php" class="btn btn-outline-light btn-sm rounded-pill px-3" onclick="return confirm('Keluar dari sistem?')">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="alert alert-info shadow-sm border-0 border-start border-4 border-info mb-4">
            <i class="bi bi-info-circle-fill me-2"></i> Silakan pilih modul kerja Anda sesuai dengan hak akses yang dimiliki.
        </div>
        
        <div class="row g-4">
            <?php if ($role == 'admin') { ?>
            <div class="col-md-4">
                <div class="card shadow-sm h-100 text-center text-decoration-none">
                    <div class="card-body py-5">
                        <div class="text-primary mb-3"><i class="bi bi-people-fill" style="font-size: 4rem;"></i></div>
                        <h4 class="card-title fw-bold">Modul PPDB</h4>
                        <p class="text-muted small">Kelola data penerimaan peserta didik baru.</p>
                        <a href="admin/index.php" class="btn btn-primary rounded-pill px-4 mt-2">Buka Aplikasi <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <?php } ?>

            <?php if ($role == 'kasir') { ?>
            <div class="col-md-4">
                <div class="card shadow-sm h-100 text-center text-decoration-none">
                    <div class="card-body py-5">
                        <div class="text-success mb-3"><i class="bi bi-wallet2" style="font-size: 4rem;"></i></div>
                        <h4 class="card-title fw-bold">Modul SPP</h4>
                        <p class="text-muted small">Kelola transaksi dan validasi pembayaran.</p>
                        <a href="kasir/index.php" class="btn btn-success rounded-pill px-4 mt-2">Buka Aplikasi <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>