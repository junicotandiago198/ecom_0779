<?php
include 'lib/koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM tb_user WHERE email='$email' AND password='$password'";
$q = mysqli_query($koneksi,$sql);
$data = mysqli_fetch_array($q);
$jumlah = mysqli_num_rows($q);

if($jumlah==1) {
    session_start();
    $_SESSION['email'] = $data['email'];
    $_SESSION['status'] = $data['status'];
    header('location:dashboard.php');
} else {
    header('location:index.php');
}