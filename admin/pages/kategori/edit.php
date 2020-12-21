<?php
include "../../lib/koneksi.php";

$id = $_POST['id'];
$nama_kategori = $_POST['nama_kategori'];

mysqli_query($koneksi,"UPDATE tb_kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id'");
header("location:main.php");
?>