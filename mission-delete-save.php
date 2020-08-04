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
    if(isset($_POST['supprimer'])){
        $idm = $_POST['idm'];
        $sql = "DELETE FROM mission WHERE idmission=$idm";
        if(mysql_query($sql)){
            echo "<script>
                document.location.replace('mission-list.php');
            </script>";
        }else{
            echo "error";
        }
    }

?>