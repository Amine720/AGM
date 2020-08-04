<?php

    session_start();
    $login = $_SESSION['login'];
    if (!isset($login))
    {
        echo "<script>
            document.location.replace('authentification.php');
        </script>";
    }
    require('emp_or_chef.php');
    require('connection.php');

    $sql_chef = "SELECT chefdeservice.*, employe.* FROM chefdeservice, employe WHERE chefdeservice.idemploye = employe.idemploye";
    $res_chef = mysql_query($sql_chef);

    $sql_mission = "SELECT * FROM mission";
    $res_mission = mysql_query($sql_mission);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css"
    />

    <title>Gestion de distribution des mission</title>
</head>
<body>
    <div class="service">
        <?php require('header.php') ?>
        <div class="gestion-service">
            <h1>Gestion de distribution des mission</h1>
            <div class="update-form">
                <form action="distribution-ajouter-save.php" method="post">

                    <label>Idam:</label>
                    <input type="text" value="AUTO" disabled />

                    <label for="chef">Chef de service:</label>
                    <?php
                        while($data = mysql_fetch_array($res_chef)){
                            echo "<span class=checkbox><input type=checkbox id=chef name=chef[] value=$data[idchefdeservice] style='margin-left: 20px;' /> $data[nom] $data[prenom]</span>";
                        }
                    ?>

                    <label for="mission" style="margin-top: 20px;">Mission:</label>
                    <select name="idm" id="mission">
                        <?php
                            while($data = mysql_fetch_array($res_mission)){
                                echo "<option value=$data[idmission]>$data[titremission]</option>";
                            }
                        ?>
                    </select>                    

                    <button type="submit" class="ajouter" name="ajouter">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>