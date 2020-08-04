<?php

    session_start();
    $login = $_SESSION['login'];
    if (!isset($login))
    {
        echo "<script>
            document.location.replace('authentification.php');
        </script>";
    }

    require('connection.php');
    extract($_POST);
    $sql = "UPDATE employe SET nom='$nom', prenom='$prenom', cin='$cin', ddn='$ddn',adresse='$adresse',ville='$ville',email='$email',ddr='$ddr',specialite='$specialite',login='$login',motdepasse='$motdepasse' WHERE idemploye=$ide";
    if(mysql_query($sql)){
        echo "<script>
            document.location.replace('profile.php');
        </script>";
    }else{
        echo mysql_error();
    }

?>