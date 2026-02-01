<?php
session_start();
if (!isset($_SESSION['admin'])) exit;
include_once __DIR__ . '/../config/database.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM produk WHERE id=$id");
header("Location: produk.php");
