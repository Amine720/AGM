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

    $sql_emp = "SELECT * FROM employe";
    $res_emp = mysql_query($sql_emp);

    $sql_ser = "SELECT * FROM service";
    $res_ser = mysql_query($sql_ser);
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
                <form action="affectation-update-save.php" method="post">
                    <?php echo "<input type=hidden name=ida value=$data[idaffectation] />"; ?>

                    <label for="idaffectation">Id affectation</label>
                    <?php echo "<input type=text value=$data[idaffectation] disabled />"; ?>

                    <label for="idemploye">Id employe</label>
                    <select name="idemploye">
                        <?php
                            while($row = mysql_fetch_array($res_emp)){
                                if($row[idemploye] == $data[idemploye]){
                                    echo "<option value=$row[idemploye] selected>$row[nom] $row[prenom]</option>";
                                }else{
                                    echo "<option value=$row[idemploye]>$row[nom] $row[prenom]</option>";
                                }
                            }
                        ?>
                    </select>

                    <label for="idservice">Id service</label>
                    <select name="idservice">
                        <?php
                            while($row = mysql_fetch_array($res_ser)){
                                if($row[idservice] == $data[idservice]){
                                    echo "<option value=$row[idservice] selected>$row[nomservice]</option>";
                                }
                                else{
                                    echo "<option value=$row[idservice]>$row[nomservice]</option>";
                                }
                            }
                        ?>
                    </select>

                    <label for="dda">Date début d'affectation</label>
                    <?php echo "<input type=date name=dda value='$data[dda]' />"; ?>

                    <label for="dfa">Date fin d'affectation</label>
                    <?php echo "<input type=date name=dfa value='$data[dfa]' />"; ?>

                    <label for="fonction">Fonction</label>
                    <?php echo "<input type=text name=fonction value='$data[fonction]' />"; ?>

                    <button type="submit" class="modifier">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>