<?php 

$connect = mysqli_connect('localhost', 'root', 'QWEasd123', 'security');
if (!$connect){
    die('Error');
}

mysqli_query($connect, "SET NAMES 'utf8mb4'");
