<?php
session_start();
if (!isset($_SESSION['admin'])) exit;
include_once __DIR__ . '/../config/database.php';

$id = $_GET['id'];
$p = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id=$id"));

if ($_POST) {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $desk = $_POST['deskripsi'];

  if ($_FILES['foto']['name']) {
    $foto = $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], "../uploads/$foto");
    mysqli_query($conn, "UPDATE produk SET foto='$foto' WHERE id=$id");
  }

  mysqli_query($conn, "UPDATE produk SET
    nama_produk='$nama',
    harga='$harga',
    deskripsi='$desk'
    WHERE id=$id
  ");

  header("Location: produk.php");
}
?>

<h2>Edit Produk</h2>
<form method="post" enctype="multipart/form-data">
  <input name="nama" value="<?= $p['nama_produk'] ?>"><br>
  <input name="harga" type="number" value="<?= $p['harga'] ?>"><br>
  <textarea name="deskripsi"><?= $p['deskripsi'] ?></textarea><br>
  <img src="../uploads/<?= $p['foto'] ?>" width="100"><br>
  <input type="file" name="foto"><br>
  <button>Update</button>
</form>
