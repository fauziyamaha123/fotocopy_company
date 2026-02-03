<?php
session_start();
if (!isset($_SESSION['admin'])) exit;
include_once __DIR__ . '/../config/database.php';

$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = mysqli_query($conn, "SELECT * FROM produk WHERE id=$id");
$p = mysqli_fetch_assoc($query);

// Jika ID tidak ditemukan
if (!$p) {
    header("Location: produk.php");
    exit;
}

if ($_POST) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $harga = $_POST['harga'];
    $desk = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    // Cek jika ada foto baru yang diunggah
    if ($_FILES['foto']['name']) {
        $foto = time() . "_" . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "../upload/$foto");
        
        // Hapus foto lama jika perlu (opsional)
        // unlink("../upload/" . $p['foto']); 
        
        mysqli_query($conn, "UPDATE produk SET foto='$foto' WHERE id=$id");
    }

    mysqli_query($conn, "UPDATE produk SET
        nama_produk='$nama',
        harga='$harga',
        deskripsi='$desk'
        WHERE id=$id
    ");

    echo "<script>alert('Data berhasil diperbarui!'); window.location='produk.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk | FotocopyCo Admin</title>
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
                <h1>Edit Produk</h1>
                <p>Memperbarui data: <strong><?= $p['nama_produk'] ?></strong></p>
            </div>
            <div class="header-right">
                <a href="produk.php" class="btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </div>
        </header>

        <section class="content-body">
            <div class="form-container">
                <form method="post" enctype="multipart/form-data" class="modern-form">
                    
                    <div class="form-group">
                        <label><i class="fa-solid fa-tag"></i> Nama Produk</label>
                        <input type="text" name="nama" value="<?= $p['nama_produk'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label><i class="fa-solid fa-money-bill-wave"></i> Harga (Rp)</label>
                        <input type="number" name="harga" value="<?= $p['harga'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label><i class="fa-solid fa-align-left"></i> Deskripsi Produk</label>
                        <textarea name="deskripsi" rows="5"><?= $p['deskripsi'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label><i class="fa-solid fa-image"></i> Foto Produk</label>
                        <div class="edit-photo-preview">
                            <div class="current-photo">
                                <p>Foto Saat Ini:</p>
                                <img src="../upload/<?= $p['foto'] ?>" alt="Foto Produk">
                            </div>
                            <div class="file-input-wrapper">
                                <input type="file" name="foto">
                                <small>Pilih file baru jika ingin mengganti foto</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-save">
                            <i class="fa-solid fa-save"></i> Simpan Perubahan
                        </button>
                        <a href="produk.php" class="btn-reset" style="text-decoration:none; text-align:center;">Batal</a>
                    </div>
                </form>
            </div>
        </section>
    </main>
</div>

</body>
</html>