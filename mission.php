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
    require('emp_or_admin.php');
    require('connection.php');
    $s = "SELECT idchefdeservice FROM employe, chefdeservice WHERE employe.idemploye = chefdeservice.idemploye AND login='$login'";
    $r = mysql_query($s);
    $d = mysql_fetch_array($r);

    $sql = "SELECT mission.*, avoirmission.* FROM mission, avoirmission WHERE avoirmission.idmission=mission.idmission AND avoirmission.idchefdeservice=$d[idchefdeservice]";
    $res = mysql_query($sql);
    $data = mysql_fetch_array($res);

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
            text-align: center;
        }
    </style>
    <title>AGM</title>
</head>
<body>
    <div class="service">
        <?php require('header-chef-service.php'); ?>
        <div class="gestion-service">
        <h1>Mes missions</h1>
            <div class="wrapper">
                <table>
                    <tr>
                        <th>Id mission</th>
                        <th>Titre mission</th>
                        <th>ddm</th>
                        <th>dftm</th>
                        <th>dfrm</th>
                    </tr>
                    <?php
                        echo "<tr>
                                <td>$data[idmission]</td>
                                <td>$data[titremission]</td>
                                <td>$data[ddm]</td>
                                <td>$data[dftm]</td>
                                <td>$data[dfrm]</td>
                            </tr>";
                    ?>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>