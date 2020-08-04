<?php

    session_start();
    $login = $_SESSION['login'];
    $_SESSION['option'] = 7;
	if (!isset($login))
	{
        echo "<script>
            document.location.replace('authentification.php');
        </script>";
    }
    require('emp_or_chef.php');
    require('connection.php');
    $sql = "SELECT * FROM activite";
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

    <style>
        .wrapper table th, .wrapper table td{
            padding: 5px;
            text-align: center;
        }
    </style>

    <title>Gestion des activites</title>
</head>
<body>
    <div class="service">
        <?php require('header.php') ?>
        <div class="gestion-service">
            <h1>Gestion des activites</h1>
            <div class="wrapper">
                <div>
                    <!-- <p><a href="tache-add.php"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter une tache</a></p> -->
                    <p><a href="activite-creer-file.php"><i class="fa fa-print" aria-hidden="true"></i> Imprimer</a></p>
                </div>
                <div>
                   <ul>
                        <li>(*) ha: Heure de l'activité</li>
                        <li>(*) da: Date de l'activité</li>    
                   </ul>
                </div>
                <table>
                    <tr>
                        <th>Id activite</th>
                        <th>Titre activite</th>
                        <th>da</th>
                        <th>ha</th>
                        <th>idtache</th>
                        <th>commentaire</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                    <?php
                        while($data = mysql_fetch_array($res)){
                            
                            echo "<tr>
                                    <td>$data[idactivite]</td>
                                    <td>$data[titreactivite]</td>
                                    <td>$data[da]</td>
                                    <td>$data[ha]</td>
                                    <td>$data[idtache]</td>
                                    <td>$data[commentaire]</td>
                                    <td align=center><a href=activite-update.php?idac=$data[idactivite]><i class='fa fa-paint-brush'></i></a></td>
                                    <td align=center><a href=activite-delete.php?idac=$data[idactivite]><i class='fa fa-trash' aria-hidden=true></i></a></td>
                                </tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>