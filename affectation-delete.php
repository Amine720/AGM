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
    $ida = $_GET['ida'];
    $sql = "SELECT * FROM affectation WHERE idaffectation=$ida";
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

    <title>Gestion des affectations</title>
</head>
<body>
    <div class="service">
        <?php require('header.php') ?>
        <div class="gestion-service">
            <h1>Gestion des affectations</h1>
            <div class="update-form">
                <form action="affectation-delete-save.php" method="post">
                    <?php echo "<input type=hidden name=ida value=$data[idaffectation] />"; ?>

                    <label for="idaffectation">Id affectation</label>
                    <?php echo "<input type=text value=$data[idaffectation] disabled />"; ?>

                    <label for="idemploye">Id employe</label>
                    <?php echo "<input type=text value=$data[idemploye] disabled />"; ?>

                    <label for="idservice">Id service</label>
                    <?php echo "<input type=text value=$data[idservice] disabled />"; ?>

                    <label for="dda">Date début d'affectation</label>
                    <?php echo "<input type=date name=dda value='$data[dda]' disabled />"; ?>

                    <label for="dfa">Date fin d'affectation</label>
                    <?php echo "<input type=date name=dfa value='$data[dfa]' disabled />"; ?>

                    <label for="fonction">Fonction</label>
                    <?php echo "<input type=text name=fonction value='$data[fonction]' disabled />"; ?>

                    <button type="submit" class="supprimer" name="supprimer">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>