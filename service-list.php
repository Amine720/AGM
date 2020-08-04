<?php

    session_start();
    $login = $_SESSION['login'];
    $_SESSION['option'] = 1;
	if (!isset($login))
	{
        echo "<script>
            document.location.replace('authentification.php');
        </script>";
    }

    require('emp_or_chef.php');
    require('connection.php');
    $sql = "SELECT * FROM service";
    $res = mysql_query($sql);

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

    <title>Gestion des services</title>
</head>
<body>
    <div class="service">
        <?php require('header.php') ?>
        <div class="gestion-service">
            <h1>Gestion des services</h1>
            <div class="wrapper">
                <div>
                    <p><a href="service-add.php"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter une service</a></p>
                    <p><a href="service-creer-file.php"><i class="fa fa-print" aria-hidden="true"></i> Imprimer</a></p>
                </div>
                <table>
                    <tr>
                        <th>Id service</th>
                        <th>Nom service</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                    <?php
                        while($data = mysql_fetch_array($res)){
                            
                            echo "<tr>
                                    <td>$data[idservice]</td>
                                    <td> " . utf8_encode($data[nomservice]) . "</td>
                                    <td align=center><a href=service-update.php?ids=$data[idservice]><i class='fa fa-paint-brush'></i></a></td>
                                    <td align=center><a href=service-delete.php?ids=$data[idservice]><i class='fa fa-trash' aria-hidden=true></i></a></td>
                                </tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>