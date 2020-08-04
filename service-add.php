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
                <form action="service-ajouter-save.php" method="post">
                    <label for="idservice">Id service</label>
                    <input type="text" id="idservice" name="idservice" />
                    <label for="nomservice">Nom service</label>
                    <input type="text" id="nomservice" name="nomservice" />
                    <button type="submit" class="ajouter" name="ajouter">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>