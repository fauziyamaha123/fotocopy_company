<?php
include '../config/database.php';

$id = $_GET['id'];

// ambil nama file gambar
$q = mysqli_query($conn, "SELECT gambar FROM produk WHERE id='$id'");
$data = mysqli_fetch_assoc($q);

if ($data['gambar'] != '') {
    unlink("../uploads/produk/".$data['gambar']);
}

// hapus data
mysqli_query($conn, "DELETE FROM produk WHERE id='$id'");

header("Location: produk.php");
