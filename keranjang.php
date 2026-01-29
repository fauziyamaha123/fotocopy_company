<?php include 'partials/header.php'; ?>

<section class="products">
  <div class="container">
    <h2>Keranjang Belanja</h2>

    <?php if (empty($_SESSION['cart'])): ?>
      <p>Keranjang masih kosong.</p>
    <?php else: ?>
      <ul>
        <?php foreach ($_SESSION['cart'] as $item): ?>
          <li>Produk ID: <?= $item ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </div>
</section>

<?php include 'partials/footer.php'; ?>
