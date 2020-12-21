<?php 
include "../../lib/koneksi.php";

$metode_pembayaran = $_POST['metode_pembayaran'];
$kode_pembayaran = $_POST['kode_pembayaran'];

mysqli_query($koneksi,"INSERT INTO tb_pembayaran VALUES ('','$metode_pembayaran','$kode_pembayaran')");
header("location:main.php");
?>