<?php
include '../config/database.php';

if(isset($_POST['simpan'])) {

    $nama    = $_POST['nama_produk'];
    $merk    = $_POST['merk'];
    $kondisi = $_POST['kondisi'];
    $harga   = $_POST['harga'];

    // ambil file
    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];

    // rename agar tidak bentrok
    $namaFile = time() . '_' . $gambar;

    // simpan ke folder uploads/produk
    move_uploaded_file($tmp, "../uploads/produk/" . $namaFile);

    // simpan ke database
    mysqli_query($conn, "INSERT INTO produk
        (nama_produk, merk, kondisi, harga, gambar, created_at)
        VALUES
        ('$nama','$merk','$kondisi','$harga','$namaFile', NOW())");

    header("Location: produk.php");
}
?>

<form method="POST" enctype="multipart/form-data">

    <input type="text" name="nama_produk" placeholder="Nama Produk" required>

    <input type="text" name="merk" placeholder="Merk" required>

    <select name="kondisi">
        <option value="Baru">Baru</option>
        <option value="Bekas">Bekas</option>
    </select>

    <input type="number" name="harga" placeholder="Harga" required>

    <input type="file" name="gambar" accept="image/*" required>

    <button type="submit" name="simpan">Simpan Produk</button>

</form>
