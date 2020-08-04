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
    $sql = "UPDATE activite SET titreactivite='$titreactivite', da='$da', ha='$ha', idtache=$idtache, commentaire='$com' WHERE idactivite=$idac";
    if(mysql_query($sql)){
        echo "<script>
            document.location.replace('activite-list.php');
        </script>";
    }else{
        echo mysql_error();
    }

?>