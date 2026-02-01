<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
?>

<h2>Dashboard Admin</h2>
<a href="produk.php">Kelola Produk</a> |
<a href="logout.php">Logout</a>
