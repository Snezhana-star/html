<?php
require '../views/connect.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);

$flat_sos = $_GET['flat_id_sos'];
$sos_calls = mysqli_query($connect, "SELECT SOS_calls FROM `Flat` WHERE flat_id = '$flat_sos'");
$qwe = mysqli_fetch_assoc($sos_calls);
$sos_calls = $qwe['SOS_calls'];
$count_sos = (int)$sos_calls + 1;

mysqli_query($connect, "UPDATE `Flat` SET SOS_calls = '$count_sos' WHERE flat_id ='$flat_sos'");

header('location: /index.php');
?>
