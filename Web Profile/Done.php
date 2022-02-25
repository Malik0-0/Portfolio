<?php
include('Config.php');

$idpesanan = $_GET['Id'];
$query = mysqli_query($conn, "UPDATE service_order SET Status='Done!'");
$_SESSION['message'] = "Berhasil Hapus";
header("location: Admin_Details.php");
