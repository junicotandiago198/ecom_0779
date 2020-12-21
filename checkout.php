<?php 
session_start();
if (!empty($_SESSION['email'])) {
include "tamplate/header.php";
include "pages/checkout.php";
include "tamplate/footer.php";
} else {
    header ("location:login.php");
}