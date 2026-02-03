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

<section class="section" id="produk">
  <div class="container">
    <div class="section-header">
      <h2>Produk Unggulan</h2>
      <p>Kualitas terbaik untuk menunjang produktivitas Anda</p>
    </div>

    <div class="produk-grid">
      <?php
      $q = mysqli_query($conn, "SELECT * FROM produk");
      while ($p = mysqli_fetch_assoc($q)) {
      ?>
        <div class="produk-card">
          <div class="produk-img">
            <img src="upload/<?= htmlspecialchars($p['foto']) ?>" alt="<?= htmlspecialchars($p['nama_produk']) ?>">
          </div>
          <div class="produk-info">
            <h4><?= htmlspecialchars($p['nama_produk']) ?></h4>
            <p class="harga">Rp <?= number_format($p['harga'], 0, ',', '.') ?></p>
            <p class="deskripsi"><?= nl2br(htmlspecialchars($p['deskripsi'])) ?></p>
    
          <?php 
        $pesan_wa = urlencode("Halo FotocopyCo, saya ingin bertanya tentang produk: " . $p['nama_produk']);
    ?>
    <a href="https://wa.me/628123456789?text=<?= $pesan_wa ?>" class="btn-wa" target="_blank">
        <i class="fab fa-whatsapp"></i> Tanya Detail Produk
    </a>
</div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- LAYANAN -->
<section class="section layanan bg-soft" id="layanan">
  <h2>Layanan Kami</h2>
  <p class="section-desc">
    Solusi lengkap untuk kebutuhan mesin fotocopy kantor & usaha Anda
  </p>

  <div class="layanan-grid">
    <div class="layanan-card">
      <div class="layanan-icon">🖨</div>
      <h4>Jual Mesin Fotocopy</h4>
      <p>Menyediakan berbagai mesin fotocopy rekondisi berkualitas & bergaransi.</p>
    </div>

    <div class="layanan-card highlight">
      <div class="layanan-icon">📦</div>
      <h4>Sewa Mesin Fotocopy</h4>
      <p>Solusi hemat untuk kantor, sekolah, dan instansi tanpa biaya besar.</p>
    </div>

    <div class="layanan-card">
      <div class="layanan-icon">🛠</div>
      <h4>Service & Sparepart</h4>
      <p>Didukung teknisi profesional dan sparepart original.</p>
    </div>
  </div>
</section>


<!-- TENAGA -->
<section class="section tenaga bg-soft" id="tenaga">
  <h2>Tenaga Profesional</h2>
  <p class="section-desc">
    Didukung oleh tim teknisi berpengalaman dan tersertifikasi di bidang mesin fotocopy
  </p>

  <div class="tenaga-grid">
    <div class="tenaga-card">
      <div class="tenaga-icon">👨‍🔧</div>
      <h4>Teknisi Bersertifikat</h4>
      <p>Tim kami telah memiliki sertifikasi resmi dan pengalaman bertahun-tahun.</p>
    </div>

    <div class="tenaga-card highlight">
      <div class="tenaga-icon">⚙️</div>
      <h4>Pengalaman Lapangan</h4>
      <p>Menangani ratusan mesin fotocopy dari berbagai merek ternama.</p>
    </div>

    <div class="tenaga-card">
      <div class="tenaga-icon">🤝</div>
      <h4>Layanan Profesional</h4>
      <p>Respon cepat, ramah, dan mengutamakan kepuasan pelanggan.</p>
    </div>
  </div>
</section>

<?php include_once __DIR__ . '/partials/footer.php'; ?>
