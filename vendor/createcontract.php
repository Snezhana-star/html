<?php
require '../views/connect.php';

$user_id =  $_POST['user_id'];
$flat_id =  $_POST['flat_id'];
$start =  $_POST['start_date'];
$finish =  $_POST['finish_date'];

mysqli_query($connect, "INSERT INTO `Contracts` (`contract_id`, `user_id`, `flat_id`, `start_date`, `finish_date`, `status`, `SOS_signal`) VALUES (NULL, '$user_id', '$flat_id', '$start', '$finish', 'on', 'off')");

header('location: /');
?>