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

    $sql_emp = "select * from employe";
    $res_emp = mysql_query($sql_emp);

    $sql_mission = "select * from mission";
    $res_mission = mysql_query($sql_mission);

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
                <form action="tache-update-save.php" method="post">
                    <?php echo "<input type=hidden name=idt value=$data[idtache] />"; ?>

                    <label for="idtache">Id tache</label>
                    <?php echo "<input type=text name=idtache value=$data[idtache] disabled />"; ?>

                    <label for="titretache">Titre de la tache</label>
                    <?php echo "<input type=text name=titretache value=$data[titretache] />"; ?>

                    <label for="ddt">Date début de la tache</label>
                    <?php echo "<input type=date value=$data[ddt] name=ddt />"; ?>

                    <label for="dftt">Date fin théorique de la tache</label>
                    <?php echo "<input type=date value=$data[dftt] name=dftt />"; ?>

                    <label for="dfrt">Date fin réelle de la tache</label>
                    <?php echo "<input type=date value=$data[dfrt] name=dfrt />"; ?>

                    <label for="employe">Employe</label>
                    <select name="emp">
                        <?php
                            while($row = mysql_fetch_array($res_emp)){
                                if($row['idemploye'] == $data['idemploye']){
                                   echo "<option value=$row[idemploye] selected>$row[nom] $row[prenom]</option>"; 
                                }else{
                                    echo "<option value=$row[idemploye]>$row[nom] $row[prenom]</option>"; 
                                }
                            } 
                        ?>
                    </select>

                    <label for="mission">Mission</label>
                    <select name="mis">
                        <?php
                            while($row = mysql_fetch_array($res_mission)){
                                if($row['idmission'] == $data['idmission']){
                                   echo "<option value=$row[idmission] selected>$row[titremission]</option>"; 
                                }else{
                                    echo "<option value=$row[idmission]>$row[titremission]</option>"; 
                                }
                            } 
                        ?>
                    </select>

                    <button type="submit" class="modifier">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>