<?php
require '../views/connect.php';

$name = $_POST['name'];
$tel = $_POST['tel'];

mysqli_query($connect, "INSERT INTO `Users` (`user_id`, `full_name`, `phone`) VALUES (NULL, '$name', '$tel')");

header('location: /createuser.php');
?>