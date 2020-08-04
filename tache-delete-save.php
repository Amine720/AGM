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
        $idt = $_POST['idt'];
        $sql = "DELETE FROM tache WHERE idtache=$idt";
        if(mysql_query($sql)){
            echo "<script>
                document.location.replace('tache-list.php');
            </script>";
        }else{
            echo "error";
        }
    }

?>