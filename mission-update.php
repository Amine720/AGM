<?php 

    session_start();
    $login = $_SESSION['login'];
    if (!isset($login))
    {
        echo "<script>
            document.location.replace('authentification.php');
        </script>";
    }

    require('connection.php');
    $idm = $_GET['idm'];
    $sql = "SELECT * FROM mission WHERE idmission=$idm";
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

    <title>Gestion des missions</title>
</head>
<body>
    <div class="service">
        <?php require('header.php') ?>
        <div class="gestion-service">
            <h1>Gestion des missions</h1>
            <div class="update-form">
                <form action="mission-update-save.php" method="post">
                    <?php echo "<input type=hidden name=idm value=$data[idmission] />"; ?>

                    <label for="idmission">Id mission</label>
                    <?php echo "<input type=text value=$data[idmission] disabled />"; ?>

                    <label for="titre">Titre mission</label>
                    <?php echo "<input type=text value='$data[titremission]' name=titre />"; ?>

                    <label for="ddm">Date début de la mission</label>
                    <?php echo "<input type=date value=$data[ddm] name=ddm />"; ?>

                    <label for="dftm">Date fin théorique de la mission</label>
                    <?php echo "<input type=date value=$data[dftm] name=dftm />"; ?>

                    <label for="dfrm">Date fin réelle de la mission</label>
                    <?php echo "<input type=date value=$data[dfrm] name=dfrm />"; ?>

                    <button type="submit" class="modifier">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>