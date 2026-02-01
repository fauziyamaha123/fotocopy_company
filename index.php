<?php
include_once __DIR__ . '/partials/header.php';
include_once __DIR__ . '/config/database.php';
?>

<!-- HERO -->
<section class="hero" id="home">
  <div class="hero-content">
    <h1>Pusat Mesin Fotocopy Rekondisi</h1>
    <p>Jual • Sewa • Service Mesin Fotocopy Profesional</p>
    <a href="#produk" class="btn-primary">Lihat Produk</a>
  </div>
</section>

<!-- PRODUK -->
<section class="section" id="produk">
  <h2>Produk Unggulan</h2>
  <div class="produk-grid">
    <?php
    $q = mysqli_query($conn, "SELECT * FROM produk");
    while ($p = mysqli_fetch_assoc($q)) {
    ?>
    <div class="produk-card">
      <img src="uploads/<?= $p['foto'] ?>" alt="<?= $p['nama_produk'] ?>">
      <h4><?= $p['nama_produk'] ?></h4>
      <p class="harga">Rp <?= number_format($p['harga']) ?></p>
      <p><?= $p['deskripsi'] ?></p>
    </div>
    <?php } ?>
  </div>
</section>

<!-- LAYANAN -->
<section class="section bg-soft" id="layanan">
  <h2>Layanan Kami</h2>
  <div class="grid">
    <div class="card">🖨 Jual Mesin Fotocopy</div>
    <div class="card">📦 Sewa Mesin Fotocopy</div>
    <div class="card">🛠 Service & Sparepart</div>
  </div>
</section>

<!-- TENAGA -->
<section class="section" id="tenaga">
  <h2>Tenaga Profesional</h2>
  <p class="center">Didukung teknisi berpengalaman & bersertifikat</p>
</section>

<!-- KONTAK -->
<section class="section bg-soft" id="kontak">
  <h2>Hubungi Kami</h2>
  <p class="center">📞 08xxxxxxxx | 📍 Kota Anda</p>
</section>

<?php include_once __DIR__ . '/partials/footer.php'; ?>
