<?php
require 'views/connect.php';
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security</title>
</head>
<style>
    th, td{
        padding: 10px;
    }
    th{
        background: #606060;
        color: white;
    }
    td{
        background: #b5b5b5;
    }

</style>
<body>
    <a href="index.php"><h2>Вернуться на главную</h2></a>
    <form action="vendor/createcontract.php" method="post">
        <p>№ владельца</p>
        <input type="number" name="user_id">
        <p>№ квартиры</p>
        <input type="number" name="flat_id">
        <p>Дата подписания договора</p>
        <input type="date" name="start_date">
        <p>Дата окончания договора</p>
        <input type="date" name="finish_date">
        <br><br>
        <button type="submit">Добавить</button>
    </form><br>
    <table>
        <tr>
            <th>№ квартиры</th>
            <th>Номер квартиры</th>
            <th>Адресс</th>
            <th>Номер владельца</th>
            <th>Кол-во выездов экипажей</th>
        </tr>
        <?php
        $flats = mysqli_query($connect, "SELECT * FROM `Flat`");
        $flats = mysqli_fetch_all($flats);
        foreach ($flats as $flat){
        ?>
        <tr>
            <td><?=  $flat[0]?></td>
            <td><?=  $flat[1]?></td>
            <td><?=  $flat[2]?></td>
            <td><?=  $flat[3]?></td>
            <td><?=  $flat[4]?></td>
        </tr>
        <?php
        }
    ?>
    </table>
    <table>
        <tr>
            <th>Номер Владельца</th>
            <th>ФИО Владелеца</th>
            <th>Номер телефона</th>
        </tr>
        <?php
        $users = mysqli_query($connect, "SELECT * FROM `Users`");
        $users = mysqli_fetch_all($users);
        foreach ($users as $user){
        ?>
        <tr>
            <td><?=  $user[0]?></td>
            <td><?=  $user[1]?></td>
            <td><?=  $user[2]?></td>
        </tr>
        <?php
        }
    ?>
    </table>
</body>
</html>