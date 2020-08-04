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
    $ids = $_GET['ids'];
    $sql = "SELECT * FROM service WHERE idservice='$ids'";
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

    <title>Gestion des services</title>
</head>
<body>
    <div class="service">
        <?php require('header.php') ?>
        <div class="gestion-service">
            <h1>Gestion des services</h1>
            <div class="update-form">
                <form action="service-delete-save.php" method="post">
                    <?php echo "<input type=hidden name=ids value='$data[idservice]' />"; ?>
                    <label for="idservice">Id service</label>
                    <?php echo "<input type=text name=idservice value='$data[idservice]' disabled />"; ?>
                    <label for="nomservice">Nom service</label>
                    <?php echo "<input type=text name=idservice value='$data[nomservice]' disabled />"; ?>
                    <button type="submit" class="supprimer" name="supprimer">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>