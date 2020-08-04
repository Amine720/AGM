<?php

    session_start();
    $login = $_SESSION['login'];
    $_SESSION['option'] = 5;
	if (!isset($login))
	{
        echo "<script>
            document.location.replace('authentification.php');
        </script>";
    }
    require('emp_or_chef.php');
    require('connection.php');
    $sql = "SELECT mission.*, chefdeservice.*, avoirmission.*, employe.* FROM mission, chefdeservice, avoirmission, employe WHERE mission.idmission = avoirmission.idmission AND avoirmission.idchefdeservice = chefdeservice.idchefdeservice AND employe.idemploye = chefdeservice.idchefdeservice";
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

    <title>Gestion de distribution des mission</title>
</head>
<body>
    <div class="service">
        <?php require('header.php') ?>
        <div class="gestion-service">
            <h1>Gestion de distribution des mission</h1>
            <div class="wrapper">
                <div>
                    <p><a href="distribution-add.php"><i class="fa fa-plus" aria-hidden="true"></i> Affecter une mission au chef de services</a></p>
                    <p><a href="distribution-creer-file.php"><i class="fa fa-print" aria-hidden="true"></i> Imprimer</a></p>
                </div>
                <div>
                   <ul>
                        <li>(*) idam: Id affectation des missions</li>    
                   </ul>
                </div>
                <table>
                    <tr>
                        <th>Idam</th>
                        <th>Titre mission</th>
                        <th>Chef de service</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                    <?php
                        while($data = mysql_fetch_array($res)){
                            
                            echo "<tr>
                                    <td>$data[idam]</td>
                                    <td>$data[titremission]</td>
                                    <td>$data[nom] $data[prenom]</td>
                                    <td align=center><a href=distribution-update.php?idam=$data[idam]><i class='fa fa-paint-brush'></i></a></td>
                                    <td align=center><a href=distribution-delete.php?idam=$data[idam]><i class='fa fa-trash' aria-hidden=true></i></a></td>
                                </tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>