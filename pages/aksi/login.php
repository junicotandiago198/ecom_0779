<?php
include '../../admin/lib/koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM tb_member WHERE email='$email' AND password='$password'";
$q = mysqli_query($koneksi,$sql);
$data = mysqli_fetch_array($q);
$jumlah = mysqli_num_rows($q);

if($jumlah==1) {
    session_start();
    $_SESSION['email'] = $data['email'];
    $_SESSION['nama'] = $data['nama'];
    header('location:../../index.php');
} else {
    header('location:index.php');
}