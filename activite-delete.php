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
    $idac = $_GET['idac'];
    $sql = "SELECT * FROM activite WHERE idactivite=$idac";
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

    <title>Gestion des activites</title>
</head>
<body>
    <div class="service">
        <?php require('header.php') ?>
        <div class="gestion-service">
            <h1>Gestion des activités</h1>
            <div class="update-form">
                <form action="activite-delete-save.php" method="post">
                    <?php echo "<input type=hidden name=idac value=$data[idactivite] />"; ?>

                    <label for="idactivite">Id activite</label>
                    <?php echo "<input type=text name=idactivite value=$data[idactivite] disabled />"; ?>

                    <label for="titreactivite">Titre de l'activité</label>
                    <?php echo "<input type=text name=titreactivite value=$data[titreactivite] disabled />"; ?>

                    <label for="ddt">Date de l'activité</label>
                    <?php echo "<input type=date value=$data[da] name=da disabled/>"; ?>

                    <label for="dftt">Heure de l'activité</label>
                    <?php echo "<input type=text value=$data[ha] name=ha disabled />"; ?>

                    <label for="idtache">Id tache</label>
                    <?php echo "<input type=text value=$data[idtache] name=idtache disabled />"; ?>

                    <label for="com">Commentaire</label>
                    <?php echo "<textarea name=com disabled>$data[commentaire]</textarea>"; ?>

                    <button type="submit" class="supprimer">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>