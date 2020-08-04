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
        $ids = $_POST['ids'];
        $sql = "DELETE FROM service WHERE idservice='$ids'";
        if(mysql_query($sql)){
            echo "<script>
                document.location.replace('service-list.php');
            </script>";
        }else{
            echo "error";
        }
    }

?>