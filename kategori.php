<?php
session_start();
$data = $_GET['id'];
if ($data == NULL) {
    header('Location: http://localhost/projecttpe/');
}
include "admin/lib/koneksi.php";
include "tamplate/header.php";
include "pages/kategori.php";
include "tamplate/footer.php";