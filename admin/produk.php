<?php
session_start();
if (!isset($_SESSION['admin'])) exit;
include '../config/database.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Produk | FotocopyCo</title>
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
                <li><a href="dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                <li class="active"><a href="produk.php"><i class="fa-solid fa-box"></i> Produk</a></li>
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
                <h1>Data Produk</h1>
                <p>Kelola daftar layanan dan produk fotocopy Anda</p>
            </div>
            <div class="header-right">
                <a href="produk-tambah.php" class="btn-add-primary">
                    <i class="fa-solid fa-plus"></i> Tambah Produk
                </a>
            </div>
        </header>

        <section class="content-body">
            <div class="table-container">
                <table class="modern-table">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q = mysqli_query($conn, "SELECT * FROM produk");
                        while ($p = mysqli_fetch_assoc($q)) {
                        ?>
                        <tr>
                            <td>
                                <div class="product-img-wrapper">
                                    <img src="../upload/<?= $p['foto'] ?>" alt="<?= $p['nama_produk'] ?>">
                                </div>
                            </td>
                            <td><span class="product-name"><?= $p['nama_produk'] ?></span></td>
                            <td><span class="price-tag">Rp <?= number_format($p['harga'], 0, ',', '.') ?></span></td>
                            <td>
                                <div class="action-buttons">
                                    <a href="produk-edit.php?id=<?= $p['id'] ?>" class="btn-action edit" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="produk-hapus.php?id=<?= $p['id'] ?>" class="btn-action delete" title="Hapus" onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</div>

</body>
</html>