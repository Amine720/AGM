<?php

session_start();
$login = $_SESSION['login'];
if (!isset($login))
{
    echo "<script>
        document.location.replace('authentification.php');
    </script>";
}

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
                <form action="mission-ajouter-save.php" method="post">

                    <label>Id mission</label>
                    <input type="text" value="AUTO" disabled />

                    <label for="titre">Titre mission</label>
                    <input type="text" id="titre" name="titre" />

                    <label for="ddm">Date début de la mission</label>
                    <input type="date" id="ddm" name="ddm" />

                    <label for="dftm">Date fin théorique de la mission</label>
                    <input type="date" id="dftm" name="dftm" />

                    <label for="dfrm">Date fin réelle de la mission</label>
                    <input type="date" id="dfrm" name="dfrm" />

                    <button type="submit" class="ajouter" name="ajouter">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>