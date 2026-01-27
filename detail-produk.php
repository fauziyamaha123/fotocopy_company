<?php
include 'config/database.php';
include 'partials/header.php';

$id = $_GET['id'];
$q  = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'");
$p  = mysqli_fetch_assoc($q);
?>

<section class="section">
<h2><?= $p['nama_produk'] ?></h2>

<p><b>Merk:</b> <?= $p['merk'] ?></p>
<p><b>Kondisi:</b> <?= $p['kondisi'] ?></p>
<p><b>Harga:</b> Rp <?= number_format($p['harga'],0,',','.') ?></p>

<p><?= $p['deskripsi'] ?></p>

<?php if($p['gambar']) : ?>
  <img src="asset/img/<?= $p['gambar'] ?>" width="300">
<?php endif; ?>

</section>

<?php include 'partials/footer.php'; ?>
