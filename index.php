<?php 
include "admin/lib/koneksi.php";
session_start();
if (!isset($_SESSION['email']) and !isset($_SESSION['password'])) {
    include "tamplate/header.php";
 } else {
    include "tamplate/header_login.php";
 }
include "tamplate/menubar.php";
include "tamplate/footer.php";
?>