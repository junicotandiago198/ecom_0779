<?php
include "../../lib/koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

mysqli_query($koneksi,"UPDATE tb_user SET nama='$nama', email='$email', password='$password' WHERE id_user='$id'");
header("location:main.php");
?>