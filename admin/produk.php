<?php
session_start();
if (!isset($_SESSION['admin'])) exit;

include_once __DIR__ . '/../config/database.php';
?>

<h2>Data Produk</h2>
<a href="produk-tambah.php">+ Tambah Produk</a>

<table border="1" cellpadding="10">
<tr>
  <th>Foto</th>
  <th>Nama</th>
  <th>Harga</th>
  <th>Aksi</th>
</tr>

<?php
$q = mysqli_query($conn, "SELECT * FROM produk");
while ($p = mysqli_fetch_assoc($q)) {
?>
<tr>
  <td><img src="../upload/<?= $p['foto'] ?>" width="80"></td>
  <td><?= $p['nama_produk'] ?></td>
  <td>Rp <?= number_format($p['harga']) ?></td>
  <td>
    <a href="produk_edit.php?id=<?= $p['id'] ?>">Edit</a> |
    <a href="produk_hapus.php?id=<?= $p['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
  </td>
</tr>
<?php } ?>
</table>
