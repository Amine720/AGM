<?php

    session_start();
    $login = $_SESSION['login'];
    $_SESSION['option'] = 2;
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

    <title>Gestion des employés</title>
</head>
<body>
    <div class="service">
        <div class="backdrop"></div>
        <div class="bar">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="header-visibility">
            <?php require('header.php'); ?>
        </div>
        <div class="gestion-service gestion-employe">
            <h1>Gestion des employés</h1>
            <div class="wrapper">
                <div>
                    <p><a href="employe-add.php"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter un employé</a></p>
                    <p><a href="employe-creer-file.php"><i class="fa fa-print" aria-hidden="true"></i> Imprimer</a></p>
                </div>
                <table class="employe-table">
                    <tr>
                        <th>Id employe</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>cin</th>
                        <th>ddn</th>
                        <th>address</th>
                        <th>ville</th>
                        <th>email</th>
                        <th>ddr</th>
                        <th>specialite</th>
                        <th>login</th>
                        <th>mot de passe</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                    <?php
                        while($data = mysql_fetch_array($res_emp)){
                            
                            echo "<tr>
                                    <td>$data[idemploye]</td>
                                    <td>$data[nom]</td>
                                    <td>$data[prenom]</td>
                                    <td>$data[cin]</td>
                                    <td>$data[ddn]</td>
                                    <td>$data[adresse]</td>
                                    <td>$data[ville]</td>
                                    <td>$data[email]</td>
                                    <td>$data[ddr]</td>
                                    <td>$data[specialite]</td>
                                    <td>$data[login]</td>
                                    <td>$data[motdepasse]</td>
                                    <td align=center><a href=employe-update.php?ide=$data[idemploye]><i class='fa fa-paint-brush'></i></a></td>
                                    <td align=center><a href=employe-delete.php?ide=$data[idemploye]><i class='fa fa-trash' aria-hidden=true></i></a></td>
                                </tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.fa-times').addEventListener('click', e => {
            document.querySelector('.header-visibility').classList.remove('show');
            document.querySelector('.backdrop').classList.remove('show');
        })
        document.querySelector('.fa-bars').addEventListener('click', e => {
            document.querySelector('.header-visibility').classList.add('show');
            document.querySelector('.backdrop').classList.add('show');
        })
    </script>
</body>
</html>