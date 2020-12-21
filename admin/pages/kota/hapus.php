<?php
include "../../lib/koneksi.php";

$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM tb_kota WHERE id_kota='$id'");
header("location:main.php");
?>