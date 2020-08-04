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
    $ide = $_GET['ide'];
    $sql = "SELECT * FROM employe WHERE idemploye=$ide";
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

    <title>Gestion des employés</title>
</head>
<body>
    <div class="service">
        <?php require('header.php') ?>
        <div class="gestion-service">
            <h1>Gestion des employés</h1>
            <div class="update-form">
                <form action="employe-delete-save.php" method="post">
                <?php echo "<input type=hidden name=ide value=$data[idemploye] />"; ?>
                    <label for="idemploye">Id employe</label>
                    <?php echo "<input type=text name=idemploye value='$data[idemploye]' disabled />"; ?>

                    <label for="nom">Nom</label>
                    <?php echo "<input type=text name=nom value='$data[nom]' disabled />"; ?>

                    <label for="prenom">prenom</label>
                    <?php echo "<input type=text name=prenom value='$data[prenom]' disabled />"; ?>

                    <label for="cin">cin</label>
                    <?php echo "<input type=text name=cin value='$data[cin]' disabled />"; ?>

                    <label for="ddn">date de naissance</label>
                    <?php echo "<input type=text name=ddn value='$data[ddn]' disabled />"; ?>

                    <label for="adresse">adresse</label>
                    <?php echo "<input type=text name=adresse value='$data[adresse]' disabled />"; ?>

                    <label for="ville">ville</label>
                    <?php echo "<input type=text name=ville value='$data[ville]' disabled />"; ?>

                    <label for="email">email</label>
                    <?php echo "<input type=text name=email value='$data[email]' disabled />"; ?>

                    <label for="ddr">date de recrutement</label>
                    <?php echo "<input type=text name=ddr value='$data[ddr]' disabled />"; ?>

                    <label for="specialite">specialite</label>
                    <?php echo "<input type=text name=specialite value='$data[specialite]' disabled />"; ?>

                    <label for="login">login</label>
                    <?php echo "<input type=text name=login value='$data[login]' disabled />"; ?>

                    <label for="motdepasse">mot de passe</label>
                    <?php echo "<input type=text name=motdepasse value='$data[motdepasse]' disabled />"; ?>
                    <button type="submit" class="supprimer" name="supprimer">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>