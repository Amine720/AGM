<?php

    session_start();
    $login = $_SESSION['login'];
    $_SESSION['option'] = 1;
	if (!isset($login))
	{
        echo "<script>
            document.location.replace('authentification.php');
        </script>";
    }
    require('chef_or_admin.php');
    require('connection.php');
    $sql = "SELECT * FROM employe WHERE login='$_SESSION[login]'";
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
    <title>AGM</title>
</head>
<body>
    <div class="service">
        <?php require('header-emp.php'); ?>
        <div class="gestion-service">
            <h1>Mon profile</h1>
            <div class="update-form">
                <form action="profile-emp-update-save.php" method="post">
                    <?php echo "<input type=hidden name=ide value=$data[idemploye] />"; ?>

                    <label for="idemploye">Id employe</label>
                    <?php echo "<input type=text name=idemploye value=$data[idemploye] disabled />"; ?>

                    <label for="nom">Nom</label>
                    <?php echo "<input type=text name=nom value='$data[nom]' />"; ?>

                    <label for="prenom">prenom</label>
                    <?php echo "<input type=text name=prenom value='$data[prenom]' />"; ?>

                    <label for="cin">cin</label>
                    <?php echo "<input type=text name=cin value='$data[cin]' />"; ?>

                    <label for="ddn">date de naissance</label>
                    <?php echo "<input type=date name=ddn value='$data[ddn]' />"; ?>

                    <label for="adresse">adresse</label>
                    <?php echo "<input type=text name=adresse value='$data[adresse]' />"; ?>

                    <label for="ville">ville</label>
                    <?php echo "<input type=text name=ville value='$data[ville]' />"; ?>

                    <label for="email">email</label>
                    <?php echo "<input type=text name=email value='$data[email]' />"; ?>

                    <label for="ddr">date de recrutement</label>
                    <?php echo "<input type=date name=ddr value='$data[ddr]' />"; ?>

                    <label for="specialite">specialite</label>
                    <?php echo "<input type=text name=specialite value='$data[specialite]' />"; ?>

                    <label for="login">login</label>
                    <?php echo "<input type=text name=login value='$data[login]' />"; ?>

                    <label for="motdepasse">mot de passe</label>
                    <?php echo "<input type=text name=motdepasse value='$data[motdepasse]' />"; ?>

                    <button type="submit" class="modifier">Modifier</button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>