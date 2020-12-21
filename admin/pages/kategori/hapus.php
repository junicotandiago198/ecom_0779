<?php 
include '../../lib/koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM tb_kategori WHERE id_kategori='$id'");
header("location:main.php");
?>