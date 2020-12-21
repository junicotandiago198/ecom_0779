<?php
session_start();
include "admin/lib/koneksi.php";

$id = $_POST['id'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$id_session = session_id();
$_SESSION['card'] = $id_session;

$QuesryCheck = mysqli_query($koneksi, "SELECT id_produk FROM tb_order WHERE id_produk = '$id' AND id_session = '$id_session' AND status_order = 'C'");
$CheckCart = mysqli_num_rows($QuesryCheck);

if ($CheckCart == 0) {
    $QueryAdd = mysqli_query($koneksi, "INSERT INTO tb_order VALUES ('', 'C', '$id', '$quantity', '$price', '$id_session')");
} else {
    $QueryUpdate = mysqli_query($koneksi, "UPDATE tb_order SET jumlah = jumlah+'$quantity' WHERE id_produk = '$id' AND id_session = '$id_session'");
}
header('location:cart.php');