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
    $idt = $_GET['idt'];
    $sql = "SELECT * FROM tache WHERE idtache=$idt";
    $res = mysql_query($sql);
    $data = mysql_fetch_array($res);

    $sql_emp = "select * from employe WHERE idemploye=$data[idemploye]";
    $res_emp = mysql_query($sql_emp);
    $data_emp = mysql_fetch_array($res_emp);

    $sql_mission = "select * from mission where idmission=$data[idmission]";
    $res_mission = mysql_query($sql_mission);
    $data_mission = mysql_fetch_array($res_mission);

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

    <title>Gestion des taches</title>
</head>
<body>
    <div class="service">
        <?php require('header.php') ?>
        <div class="gestion-service">
            <h1>Gestion des taches</h1>
            <div class="update-form">
                <form action="tache-delete-save.php" method="post">
                    <?php echo "<input type=hidden name=idt value=$data[idtache] />"; ?>

                    <label for="idtache">Id tache</label>
                    <?php echo "<input type=text name=idtache value=$data[idtache] disabled />"; ?>

                    <label for="titretache">Titre de la tache</label>
                    <?php echo "<input type=text name=titretache value=$data[titretache] disabled />"; ?>

                    <label for="ddt">Date début de la tache</label>
                    <?php echo "<input type=date value=$data[ddt] name=ddt disabled />"; ?>

                    <label for="dftt">Date fin théorique de la tache</label>
                    <?php echo "<input type=date value=$data[dftt] name=dftt disabled />"; ?>

                    <label for="dfrt">Date fin réelle de la tache</label>
                    <?php echo "<input type=date value=$data[dfrt] name=dfrt disabled />"; ?>

                    <label for="employe">Employe</label>
                    <?php echo "<input type=text value='$data_emp[nom] $data_emp[prenom]' name=emp disabled />"; ?>

                    <label for="mission">Mission</label>
                    <?php echo "<input type=text value='$data_mission[titremission]' name=mission disabled />"; ?>

                    <button type="submit" class="supprimer">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>