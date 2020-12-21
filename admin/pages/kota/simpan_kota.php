<?php
include "../../lib/koneksi.php";

$nama_kota = $_POST['nama_kota'];
mysqli_query($koneksi, "INSERT INTO tb_kota VALUES ('','$nama_kota')");
header("location:main.php");
?>