<?php 
include "../../lib/koneksi.php";

$id = $_POST['id'];
$metode_pembayaran = $_POST['metode_pembayaran'];
$kode_pembayaran = $_POST['kode_pembayaran'];

mysqli_query($koneksi,"UPDATE tb_pembayaran SET metode_pembayaran='$metode_pembayaran', kode_pembayaran='$kode_pembayaran' WHERE id_pembayaran='$id'");
header("location:main.php");

?>