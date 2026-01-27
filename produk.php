<?php
include 'config/database.php';
include 'partials/header.php';

$q = mysqli_query($conn, "SELECT * FROM produk ORDER BY created_at DESC");
?>

<section class="section">
<h2>Produk Mesin Fotocopy</h2>

<div class="grid">
<?php while($p = mysqli_fetch_assoc($q)) : ?>
  <a class="card" href="detail-produk.php?id=<?= $p['id'] ?>">
    <h3><?= $p['nama_produk'] ?></h3>
    <p><?= $p['merk'] ?> • <?= $p['kondisi'] ?></p>
    <strong>Rp <?= number_format($p['harga'],0,',','.') ?></strong>
  </a>
<?php endwhile; ?>
</div>

</section>

<?php include 'partials/footer.php'; ?>
