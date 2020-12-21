<?php 
include "../../lib/koneksi.php";

$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM tb_transaksi WHERE id_transaksi='$id'");
header("location:main.php");

?>