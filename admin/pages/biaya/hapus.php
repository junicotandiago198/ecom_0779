<?php 
include "../../lib/koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM tb_biaya_kirim WHERE id_biaya_kirim = '$id'");
header("location:main.php");

?>