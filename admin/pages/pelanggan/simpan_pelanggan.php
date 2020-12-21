<?php 
include "../../lib/koneksi.php";

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

mysqli_query($koneksi,"INSERT INTO tb_user VALUES ('','$nama','$email','$password',1)");
header("location:main.php");
?>