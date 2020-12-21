<?php 
include "../../lib/koneksi.php";

$nama_kategori= $_POST['nama_kategori'];

mysqli_query($koneksi,"INSERT INTO tb_kategori VALUES ('','$nama_kategori')");
header("location:main.php");
?>