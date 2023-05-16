<?php
require '../views/connect.php';

$tel = $_POST['tel'];
$address = $_POST['address'];
$user_id =  $_POST['user_id'];

mysqli_query($connect, "INSERT INTO `Flat` (`flat_id`, `flat_phone`, `address`, `user_id`, `SOS_calls`) VALUES (NULL, '$tel', '$address', '$user_id', '0')");

header('location: /createflat.php');
?>