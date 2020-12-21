<?php
include "../../lib/koneksi.php";

$kategori = $_POST['kategori'];
$nama_produk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$gambar = $_POST['gambar'];


mysqli_query($koneksi,"INSERT INTO tb_produk VALUES ('','$kategori','$nama_produk','$deskripsi','$harga','$gambar')");
header("location:main.php");
?>