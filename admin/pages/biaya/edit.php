<?php 
include "../../lib/koneksi.php";

$id = $_POST['id'];
$kota = $_POST['kota'];
$jasa = $_POST['jasa'];
$biaya = $_POST['biaya'];

mysqli_query($koneksi,"UPDATE tb_biaya_kirim SET id_kota='$kota', biaya='$biaya', id_jasa='$jasa' WHERE id_biaya_kirim='$id'");
header("location:main.php");