<?php
session_start();
include "../../admin/lib/koneksi.php";

$kurir = $_POST['kurir'];

$_SESSION['tempKurir'] = $kurir;

header('location: ../../checkout.php');