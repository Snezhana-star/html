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
    <table>
        <tr>
            <th>Номер контракта</th>
            <th>№ Владелеца</th>
            <th>№ Квартиры</th>
            <th>Дата подписания</th>
            <th>Дата завершения</th>
            <th>Статус</th>
            <th>Вызов SOS</th>
        </tr>
        <?php
            $contracts = mysqli_query($connect, "SELECT * FROM `Contracts`");
            $contracts = mysqli_fetch_all($contracts);
            foreach ($contracts as $contract){
               ?> 
                    <tr>
                        <td><?=  $contract[0]?></td>
                        <td><?=  $contract[1]?></td>
                        <td><?=  $contract[2]?></td>
                        <td><?=  $contract[3]?></td>
                        <td><?=  $contract[4]?></td>
                        <td><?=  $contract[5]?></td>
                        <td><?=  $contract[6]?></td>
                        <td><a href="?user_id=<?=  $contract[1]?>&flat_id=<?=  $contract[2]?>">Данные</td>
                        <?php
                        if ($contract[6]==="on"){?>
                            <td><a href="vendor/sos.php?flat_id_sos=<?=  $contract[2]?>">Отправить экипаж</td>
                            <?php
                        }
                        ?>
                        <?php
                        if ($contract[4] < date('Y-m-d')){?>
                            <td><a style="color: red;"href="vendor/delete.php?contract_id=<?=  $contract[0]?>">Удалить контракт</td>
                        <?php   
                        }
                        ?>
                    </tr>
            <?php
        }
    ?>
    
    </table>
    <h2><a href="createcontract.php">Добавить новый контракт + </h2> </a>
    <h2>Данные о владельце и квартире</h2>
    <table>
        <tr>
            <th>Номер Владельца</th>
            <th>ФИО Владелеца</th>
            <th>Номер телефона</th>
            <th>Адресс </th>
            <th>Квартирный номер</th>
            <th>Кол-во Вызов SOS</th>
        </tr>
    <?php
        $user_id = $_GET['user_id'];
        $user = mysqli_query($connect, "SELECT * FROM `Users` WHERE `user_id` = '$user_id'");
        $user = mysqli_fetch_assoc($user);

        $flat_id = $_GET['flat_id'];
        $flat = mysqli_query($connect, "SELECT * FROM `Flat` WHERE `flat_id` = '$flat_id'");
        $flat = mysqli_fetch_assoc($flat);
    ?>
        <tr>
            <td><?=  $user['user_id']?></</td>
            <td><?=  $user['full_name']?></td>
            <td><?=  $user['phone']?></td>
            <td><?=  $flat['address']?></td>
            <td><?=  $flat['flat_phone']?></td>
            <td><?=  $flat['SOS_calls']?></td>
        </tr>
    </table>
    <h2><a href="createuser.php">Добавить нового владельца + </h2></a>
    <h2><a href="createflat.php">Добавить новую квартиру + </h2></a>

    
</body>
</html>
