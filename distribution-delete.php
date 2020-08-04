<?php 

    session_start();
    $login = $_SESSION['login'];
	if (!isset($login))
	{
        echo "<script>
            document.location.replace('authentification.php');
        </script>";
    }

    require('emp_or_chef.php');
    require('connection.php');
    $idam = $_GET['idam'];
    // $sql = "SELECT * FROM avoirmission WHERE idam=$idam";
    $sql = "SELECT mission.*, chefdeservice.*, avoirmission.*, employe.* FROM mission, chefdeservice, avoirmission, employe WHERE mission.idmission = avoirmission.idmission AND avoirmission.idchefdeservice = chefdeservice.idchefdeservice AND employe.idemploye = chefdeservice.idchefdeservice AND idam=$idam";
    $res = mysql_query($sql);
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

    <title>Gestion de distribution des mission</title>
</head>
<body>
    <div class="service">
        <?php require('header.php') ?>
        <div class="gestion-service">
            <h1>Gestion de distribution des mission</h1>
            <div class="update-form">
                <form action="distribution-delete-save.php" method="post">
                    <?php echo "<input type=hidden name=idam value=$data[idam] />"; ?>

                    <label for="idmission">Idam</label>
                    <?php echo "<input type=text value=$data[idam] disabled />"; ?>

                    <label for="idemploye">Chef de service</label>
                    <?php echo "<input type=text value='$data[nom] $data[prenom]' disabled />"; ?>

                    <label for="titre">Titre mission</label>
                    <?php echo "<input type=text value='$data[titremission]' disabled />"; ?>

                    <button type="submit" class="supprimer" name="supprimer">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>