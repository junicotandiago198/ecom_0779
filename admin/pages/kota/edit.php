<?php
include "../../lib/koneksi.php";

$id = $_POST['id'];
$nama_kota = $_POST['nama_kota'];

mysqli_query($koneksi,"UPDATE tb_kota SET nama_kota='$nama_kota' WHERE id_kota='$id'");
header("location:main.php");

?>