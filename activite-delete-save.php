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
        $idac = $_POST['idac'];
        $sql = "DELETE FROM activite WHERE idactivite=$idac";
        if(mysql_query($sql)){
            echo "<script>
                document.location.replace('activite-list.php');
            </script>";
        }else{
            echo "error";
        }
    }

?>