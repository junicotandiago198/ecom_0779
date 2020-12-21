<?php 
include "../../lib/koneksi.php";

$nama_jasa = $_POST['nama_jasa'];

mysqli_query($koneksi,"INSERT INTO tb_jasa VALUES ('','$nama_jasa')");
header("location:main.php");
?>