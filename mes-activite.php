<?php

    session_start();
    $login = $_SESSION['login'];
    $idemp = $_SESSION['idemp'];
    $_SESSION['option'] = 5;
	if (!isset($login))
	{
        echo "<script>
            document.location.replace('authentification.php');
        </script>";
    }
    require('chef_or_admin.php');
    require('connection.php');
    $sql = "SELECT tache. * , activite. * 
            FROM tache, activite
            WHERE tache.idtache = activite.idtache
            AND tache.idemploye = $idemp";

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
        <?php require('header-emp.php'); ?>
        <div class="gestion-service">
        <h1>Mes activités</h1>
            <div class="wrapper">
                <table>
                    <tr>
                        <th>Id mission</th>
                        <th>Id tache</th>
                        <th>Titre tache</th>
                        <th>Id activite</th>
                        <th>Titre activite</th>
                        <th>da</th>
                        <th>ha</th>
                        <th>Commentaire</th>
                    </tr>
                    <?php
                        while($data = mysql_fetch_array($query)){
                            echo "<tr>
                                    <th>$data[idmission]</th>
                                    <th>$data[idtache]</th>
                                    <th>$data[titretache]</th>
                                    <th>$data[idactivite]</th>
                                    <th>$data[titreactivite]</th>
                                    <th>$data[da]</th>
                                    <th>$data[ha]</th>
                                    <th>$data[commentaire]</th>
                                </tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>