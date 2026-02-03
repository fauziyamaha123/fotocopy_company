<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | FotocopyCo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../asset/css/admin.css">
</head>
<body>

<div class="admin-wrapper">
    <aside class="sidebar">
        <div class="sidebar-brand">
            <i class="fa-solid fa-print"></i>
            <span>Fotocopy<strong>Co</strong></span>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li class="active"><a href="dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                <li><a href="produk.php"><i class="fa-solid fa-box"></i> Produk</a></li>
                <li><a href="produk-tambah.php"><i class="fa-solid fa-plus-circle"></i> Tambah Produk</a></li>
            </ul>
        </nav>
        <div class="sidebar-footer">
            <a href="logout.php" class="btn-logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </div>
    </aside>

    <main class="main-content">
        <header class="top-header">
            <div class="header-left">
                <h1>Dashboard</h1>
                <p>Selamat datang kembali, Admin.</p>
            </div>
            <div class="header-right">
                <div class="admin-profile">
                    <span class="status-indicator"></span>
                    <img src="https://ui-avatars.com/api/?name=Admin&background=0D6EFD&color=fff" alt="Profile">
                </div>
            </div>
        </header>

        <section class="content-body">
            <div class="stat-grid">
                <div class="stat-card card-blue">
                    <div class="stat-info">
                        <h3>Data Produk</h3>
                        <p>Kelola inventaris Anda</p>
                        <a href="produk.php" class="card-link">Lihat Detail →</a>
                    </div>
                    <div class="stat-icon">
                        <i class="fa-solid fa-boxes-stacked"></i>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-info">
                        <h3>Status Sistem</h3>
                        <span class="badge-online">Online</span>
                        <p>Server berjalan normal</p>
                    </div>
                    <div class="stat-icon icon-green">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

</body>
</html>