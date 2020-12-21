<?php 
include "../../lib/koneksi.php";

$id = $_GET['id'];
mysqli_query ($koneksi,"DELETE FROM tb_pembayaran WHERE id_pembayaran = '$id'");
header("location:main.php");
?>