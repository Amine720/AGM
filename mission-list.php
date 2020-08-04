<?php

    session_start();
    $login = $_SESSION['login'];
    $_SESSION['option'] = 4;
	if (!isset($login))
	{
        echo "<script>
            document.location.replace('authentification.php');
        </script>";
    }
    require('emp_or_chef.php');
    require('connection.php');
    $sql = "SELECT * FROM mission";
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

    <title>Gestion des missions</title>
</head>
<body>
    <div class="service">
        <?php require('header.php') ?>
        <div class="gestion-service">
            <h1>Gestion des missions</h1>
            <div class="wrapper">
                <div>
                    <p><a href="mission-add.php"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter une mission</a></p>
                    <p><a href="mission-creer-file.php"><i class="fa fa-print" aria-hidden="true"></i> Imprimer</a></p>
                </div>
                <div>
                   <ul>
                        <li>(*) ddm: Date début de la mission</li>
                        <li>(*) dftm: Date fin théorique de la mission</li>       
                        <li>(*) dfrm: Date fin réelle de la mission</li>       
                   </ul>
                </div>
                <table>
                    <tr>
                        <th>Id mission</th>
                        <th>Titre mission</th>
                        <th>ddm</th>
                        <th>dftm</th>
                        <th>dfrm</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                    <?php
                        while($data = mysql_fetch_array($res)){
                            
                            echo "<tr>
                                    <td>$data[idmission]</td>
                                    <td>$data[titremission]</td>
                                    <td>$data[ddm]</td>
                                    <td>$data[dftm]</td>
                                    <td>$data[dfrm]</td>
                                    <td align=center><a href=mission-update.php?idm=$data[idmission]><i class='fa fa-paint-brush'></i></a></td>
                                    <td align=center><a href=mission-delete.php?idm=$data[idmission]><i class='fa fa-trash' aria-hidden=true></i></a></td>
                                </tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>