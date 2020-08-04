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

    <title>Gestion des employés</title>
</head>
<body>
    <div class="service">
        <?php require('header.php') ?>
        <div class="gestion-service">
            <h1>Gestion des employés</h1>
            <div class="update-form">
                <form action="employe-ajouter-save.php" method="post">

                    <label>Id employe</label>
                    <input type="text" value="AUTO" disabled />

                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" />

                    <label for="prenom">Prenom</label>
                    <input type="text" id="prenom" name="prenom" />

                    <label for="cin">cin</label>
                    <input type="text" id="cin" name="cin" />

                    <label for="ddn">Date de naissance</label>
                    <input type="date" id="ddn" name="ddn" />

                    <label for="adresse">adresse</label>
                    <input type="text" id="adresse" name="adresse" />

                    <label for="ville">ville</label>
                    <input type="text" id="ville" name="ville" />

                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" />

                    <label for="ddr">Date de recrutement</label>
                    <input type="date" id="ddr" name="ddr" />

                    <label for="specialite">specialite</label>
                    <input type="text" id="specialite" name="specialite" />

                    <label for="login">Login</label>
                    <input type="text" id="login" name="login" />

                    <label for="motdepasse">Mot de passe</label>
                    <input type="text" id="motdepasse" name="motdepasse" />

                    <button type="submit" class="ajouter" name="ajouter">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>