<?php 
include "../../lib/koneksi.php";

$jasa = $_POST['jasa'];
$kota = $_POST['kota'];
$biaya = $_POST['biaya'];

$error = array();
if (empty($kota)) {
    $error['kota'] = 'Kota kosong';
}
if (empty($expedisi)) {
    $error['expedisi'] = 'Expedisi kosong';
}
if (empty($biaya)) {
    $error['biaya'] = 'Biaya kosong';
} else {
    if (!is_numeric($biaya)) {
        $error['biaya'] = 'Biaya harus berupa angka';
    }
}

mysqli_query($koneksi,"INSERT INTO tb_biaya_kirim VALUES('', '$kota', '$biaya', '$jasa')");
header("location:main.php");

?>