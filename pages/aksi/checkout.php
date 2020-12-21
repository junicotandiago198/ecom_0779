<?php
session_start();
include "../../admin/lib/koneksi.php";

date_default_timezone_set('Asia/Jakarta');

$total = $_POST['total'];
$id_jasa = $_POST['id_jasa'];
$id_session = $_SESSION['card'];
// var_dump($id_session);
// die;
$QueryOrder = mysqli_query($koneksi, "SELECT id_order,jumlah FROM tb_order WHERE id_session = '$id_session' AND status_order = 'C'");

$inv = rand(100, 10000);
while ($rowOrder = mysqli_fetch_assoc($QueryOrder)) {
    $id_order = $rowOrder['id_order'];
    $jumlah = $rowOrder['jumlah'];
    $email = $_SESSION['email'];
    $tanggal = date('d/m/Y', time());
    $QuerySimpan = mysqli_query($koneksi, "INSERT INTO tb_detail_order (id_order, id_jasa, invoice, jumlah, total, email, tanggal) VALUES ('$id_order','$id_jasa', '$inv','$jumlah','$total','$email','$tanggal')");
    if ($QuerySimpan) {
        echo "<script>alert('Checkout Berhasil'); window.location = '$baseUrl2'+'index.php';</script>";
        unset($_SESSION['tempKurir']);
        $QueryUpdate = mysqli_query($koneksi, "UPDATE tb_order SET status_order = 'P' WHERE id_order = '$id_order'");
    } else {
        echo "<script>alert('Checkout Tidak Berhasil'); window.location = '$baseUrl2'+'index.php';</script>";
    }
}
