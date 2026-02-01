<?php
session_start();
if (!isset($_SESSION['admin'])) exit;
include_once __DIR__ . '/../config/database.php';

if ($_POST) {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $desk = $_POST['deskripsi'];

  $foto = $_FILES['foto']['name'];
  $tmp  = $_FILES['foto']['tmp_name'];

  move_uploaded_file($tmp, "../upload/produk/$foto");

$sql = "INSERT INTO produk (nama_produk, harga, deskripsi, foto)
        VALUES ('$nama', '$harga', '$desk', '$foto')";

if (!mysqli_query($conn, $sql)) {
  die("Gagal simpan produk: " . mysqli_error($conn));
}

header("Location: produk.php");
exit;

}
?>

<h2>Tambah Produk</h2>
<form method="post" enctype="multipart/form-data">
  <input name="nama" placeholder="Nama Produk" required><br>
  <input name="harga" type="number" placeholder="Harga" required><br>
  <textarea name="deskripsi" placeholder="Deskripsi"></textarea><br>
  <input type="file" name="foto" required><br>
  <button>Simpan</button>
</form>
