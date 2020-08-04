<?php

    session_start();
    $login = $_SESSION['login'];
    $_SESSION['option'] = 6;
	if (!isset($login))
	{
        echo "<script>
            document.location.replace('authentification.php');
        </script>";
    }
    require('emp_or_chef.php');
    require('connection.php');
    $sql = "SELECT * FROM tache";
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

    <title>Gestion des taches</title>
</head>
<body>
    <div class="service">
        <?php require('header.php') ?>
        <div class="gestion-service">
            <h1>Gestion des taches</h1>
            <div class="wrapper">
                <div>
                    <!-- <p><a href="tache-add.php"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter une tache</a></p> -->
                    <p><a href="tache-creer-file.php"><i class="fa fa-print" aria-hidden="true"></i> Imprimer</a></p>
                </div>
                <div>
                   <ul>
                        <li>(*) ddt: Date début de la tache</li>
                        <li>(*) dftt: Date fin théorique de la tache</li>       
                        <li>(*) dfrt: Date fin réelle de la tache</li>       
                   </ul>
                </div>
                <table>
                    <tr>
                        <th>Id tache</th>
                        <th>Titre tache</th>
                        <th>ddt</th>
                        <th>dftt</th>
                        <th>dfrt</th>
                        <th>idmission</th>
                        <th>idemploye</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                    <?php
                        while($data = mysql_fetch_array($res)){
                            
                            echo "<tr>
                                    <td>$data[idtache]</td>
                                    <td>$data[titretache]</td>
                                    <td>$data[ddt]</td>
                                    <td>$data[dftt]</td>
                                    <td>$data[dfrt]</td>
                                    <td>$data[idmission]</td>
                                    <td>$data[idemploye]</td>
                                    <td align=center><a href=tache-update.php?idt=$data[idtache]><i class='fa fa-paint-brush'></i></a></td>
                                    <td align=center><a href=tache-delete.php?idt=$data[idtache]><i class='fa fa-trash' aria-hidden=true></i></a></td>
                                </tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>