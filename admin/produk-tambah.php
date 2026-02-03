<?php
session_start();
if (!isset($_SESSION['admin'])) exit;
include '../config/database.php';

// --- LOGIKA SIMPAN PRODUK ---
if (isset($_POST['simpan'])) {
    $nama      = mysqli_real_escape_string($conn, $_POST['nama']);
    $harga     = $_POST['harga'];
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    // Urus Foto
    $foto_nama = $_FILES['foto']['name'];
    $tmp_name  = $_FILES['foto']['tmp_name'];
    
    // Beri nama unik pada foto agar tidak bentrok
    $ekstensi  = pathinfo($foto_nama, PATHINFO_EXTENSION);
    $nama_baru = time() . "_" . $foto_nama;

    if (move_uploaded_file($tmp_name, "../upload/" . $nama_baru)) {
        $query = "INSERT INTO produk (nama_produk, harga, deskripsi, foto) 
                  VALUES ('$nama', '$harga', '$deskripsi', '$nama_baru')";
        
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Produk berhasil ditambah!'); window::location='produk.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Gagal mengunggah gambar.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk | FotocopyCo</title>
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
                <li><a href="produk.php"><i class="fa-solid fa-box"></i> Produk</a></li>
                <li class="active"><a href="produk-tambah.php"><i class="fa-solid fa-plus-circle"></i> Tambah Produk</a></li>
            </ul>
        </nav>
        <div class="sidebar-footer">
            <a href="logout.php" class="btn-logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </div>
    </aside>

    <main class="main-content">
        <header class="top-header">
            <div class="header-left">
                <h1>Tambah Produk Baru</h1>
                <p>Silakan isi form di bawah ini.</p>
            </div>
            <div class="header-right">
                <a href="produk.php" class="btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
            </div>
        </header>

        <section class="content-body">
            <div class="form-container">
                <form method="post" enctype="multipart/form-data" class="modern-form">
                    <div class="form-group">
                        <label><i class="fa-solid fa-tag"></i> Nama Produk</label>
                        <input type="text" name="nama" placeholder="Nama Produk" required>
                    </div>

                    <div class="form-group">
                        <label><i class="fa-solid fa-money-bill-wave"></i> Harga (Rp)</label>
                        <input type="number" name="harga" placeholder="Harga" required>
                    </div>

                    <div class="form-group">
                        <label><i class="fa-solid fa-align-left"></i> Deskripsi</label>
                        <textarea name="deskripsi" rows="4" placeholder="Deskripsi..."></textarea>
                    </div>

                    <div class="form-group">
                        <label><i class="fa-solid fa-image"></i> Foto Produk</label>
                        <div class="file-input-wrapper">
                            <input type="file" name="foto" required>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" name="simpan" class="btn-save">
                            <i class="fa-solid fa-cloud-arrow-up"></i> Simpan Produk
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</div>

</body>
</html>