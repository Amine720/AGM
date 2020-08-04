<?php

    session_start();
    $login = $_SESSION['login'];
    $idemp = $_SESSION['idemp'];
    $_SESSION['option'] = 3;
	if (!isset($login))
	{
        echo "<script>
            document.location.replace('authentification.php');
        </script>";
    }
    require('emp_or_admin.php');
    require('connection.php');
    $sql = "SELECT * FROM employe WHERE specialite=(SELECT specialite FROM employe WHERE login='$login') AND idemploye != $idemp ORDER BY nom, prenom ASC";
    $query = mysql_query($sql);
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
    <style>
        .fa-times{
            display: none;
        }
        td{
            text-align: center
        }
    </style>
    <title>AGM</title>
</head>
<body>
    <div class="service">
        <?php require('header-chef-service.php'); ?>
        <div class="gestion-service">
        <h1>Mes employés</h1>
            <div class="wrapper">
                <table>
                    <tr>
                        <th>Id employe</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Fonction</th>
                    </tr>
                    <?php
                        while($data = mysql_fetch_array($query)){
                            echo "<tr>
                                <td>$data[idemploye]</td>
                                <td>$data[nom]</td>
                                <td>$data[prenom]</td>
                                <td>Fonction</td>
                            </tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>