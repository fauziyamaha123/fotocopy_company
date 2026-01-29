<?php
$base_url = "http://localhost/fotocopy_company/";
session_start();
$cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>PT Maju Fotocopy</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= $base_url ?>asset/css/base.css">
<link rel="stylesheet" href="<?= $base_url ?>asset/css/layout.css">
<link rel="stylesheet" href="<?= $base_url ?>asset/css/responsive.css">
<link rel="stylesheet" href="<?= $base_url ?>asset/css/style.css">

<!-- ICON -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<header class="navbar">
  <div class="container nav-flex">

    <!-- LOGO -->
    <div class="logo">
      <img src="<?= $base_url ?>asset/img/Logo.png" alt="Maju Fotocopy">
    </div>

    <!-- MENU -->
    <nav id="navMenu">
      <a href="<?= $base_url ?>">Home</a>
      <a href="<?= $base_url ?>produk.php">Produk</a>
      <a href="<?= $base_url ?>layanan.php">Layanan</a>
      <a href="<?= $base_url ?>tentang.php">Tentang</a>
      <a href="<?= $base_url ?>kontak.php">Kontak</a>
    </nav>

    <!-- CART + HAMBURGER -->
    <div class="nav-action">
      <a href="<?= $base_url ?>keranjang.php" class="cart">
        <i class="fa-solid fa-cart-shopping"></i>
        <span class="cart-count"><?= $cart_count ?></span>
      </a>

      <div class="hamburger" onclick="toggleMenu()">
        <i class="fa-solid fa-bars"></i>
      </div>
    </div>

  </div>
</header>
