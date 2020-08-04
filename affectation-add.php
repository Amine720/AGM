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
    $sql_emp = "SELECT * FROM employe";
    $res_emp = mysql_query($sql_emp);

    $sql_ser = "SELECT * FROM service";
    $res_ser = mysql_query($sql_ser);

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

    <title>Gestion des affectations</title>
</head>
<body>
    <div class="service">
        <?php require('header.php') ?>
        <div class="gestion-service">
            <h1>Gestion des affectations</h1>
            <div class="update-form">
                <form action="affectation-ajouter-save.php" method="post">

                    <label>Id affectation</label>
                    <input type="text" value="AUTO" disabled />

                    <label for="idemploye">employe</label>
                    <select name="idemploye">
                        <?php
                            while($data = mysql_fetch_array($res_emp)){
                                echo "<option value=$data[idemploye]>$data[nom] $data[prenom]</option>";
                            }
                        ?>
                    </select>

                    <label for="idservice">Id service</label>
                    <select name="idservice">
                        <?php
                            while($data = mysql_fetch_array($res_ser)){
                                echo "<option value=$data[idservice]>$data[nomservice]</option>";
                            }
                        ?>
                    </select>

                    <label for="dda">Date début d'affectation</label>
                    <input type="date" id="dda" name="dda" />

                    <label for="dfa">Date fin d'affectation</label>
                    <input type="date" id="dfa" name="dfa" />

                    <label for="fonction">Fonction</label>
                    <input type="text" id="fonction" name="fonction" />

                    <button type="submit" class="ajouter" name="ajouter">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>