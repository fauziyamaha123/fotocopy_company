<?php
session_start();
if (!isset($_SESSION['admin'])) exit;

include_once __DIR__ . '/../config/database.php';

if (isset($_POST['nama'])) {

  $nama  = $_POST['nama'];
  $harga = $_POST['harga'];
  $desk  = $_POST['deskripsi'];

  // pastikan file dipilih
  if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {

    $foto = time() . '_' . basename($_FILES['foto']['name']);
    $tmp  = $_FILES['foto']['tmp_name'];

    // PATH YANG BENAR
    $path = __DIR__ . '/../upload/' . $foto;

    if (move_uploaded_file($tmp, $path)) {

      $sql = "
        INSERT INTO produk (nama_produk, harga, deskripsi, foto)
        VALUES ('$nama', '$harga', '$desk', '$foto')
      ";

      if (mysqli_query($conn, $sql)) {
        header("Location: produk.php");
        exit;
      } else {
        echo "Gagal simpan ke database: " . mysqli_error($conn);
      }

    } else {
      echo "Gagal memindahkan file ke folder upload";
    }

  } else {
    echo "File foto belum dipilih atau upload error";
  }
}
?>

<h2>Tambah Produk</h2>
<form method="post" enctype="multipart/form-data">
  <input type="text" name="nama" placeholder="Nama Produk" required><br><br>
  <input type="number" name="harga" placeholder="Harga" required><br><br>
  <textarea name="deskripsi" placeholder="Deskripsi"></textarea><br><br>
  <input type="file" name="foto" required><br><br>
  <button type="submit">Simpan</button>
</form>
