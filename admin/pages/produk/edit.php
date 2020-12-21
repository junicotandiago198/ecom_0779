<?php
include "../../lib/koneksi.php";

$id = $_POST['id'];
$kategori = $_POST['kategori'];
$nama_produk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$gambar = $_POST['gambar'];

mysqli_query($koneksi,"UPDATE tb_produk SET id_kategori_produk='$kategori', nama_produk='$nama_produk', deskripsi='$deskripsi', harga='$harga', gambar='$gambar' WHERE id_produk='$id'");
header("location:main.php");