<?php

session_start();
$login = $_SESSION['login'];
$_SESSION['option'] = 3;
if (!isset($login))
{
    echo "<script>
        document.location.replace('authentification.php');
    </script>";
}
require('emp_or_chef.php');
    require('connection.php');
    $sql = "SELECT * FROM affectation";
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

    <title>Gestion des affectations</title>
</head>
<body>
    <div class="service">
        <?php require('header.php') ?>
        <div class="gestion-service gestion-affectation">
            <h1>Gestion des affectations</h1>
            <div class="wrapper">
                <div>
                    <p><a href="affectation-add.php"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter une affectation</a></p>
                    <p><a href="affectation-creer-file.php"><i class="fa fa-print" aria-hidden="true"></i> Imprimer</a></p>
                </div>
                <div>
                   <ul>
                        <li>(*) dda: Date début d'affectation</li>
                        <li>(*) dfa: Date fin d'affectation</li>       
                   </ul>
                </div>
                <table>
                    <tr>
                        <th>Id affectation</th>
                        <th>Id employe</th>
                        <th>Id service</th>
                        <th>dda</th>
                        <th>dfa</th>
                        <th>fonction</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                    <?php
                        while($data = mysql_fetch_array($res)){
                            
                            echo "<tr>
                                    <td>$data[idaffectation]</td>
                                    <td>$data[idemploye]</td>
                                    <td>$data[idservice]</td>
                                    <td>$data[dda]</td>
                                    <td>$data[dfa]</td>
                                    <td>$data[fonction]</td>
                                    <td align=center><a href=affectation-update.php?ida=$data[idaffectation]><i class='fa fa-paint-brush'></i></a></td>
                                    <td align=center><a href=affectation-delete.php?ida=$data[idaffectation]><i class='fa fa-trash' aria-hidden=true></i></a></td>
                                </tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>