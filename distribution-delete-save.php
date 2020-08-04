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
        $idam = $_POST['idam'];
        $sql = "DELETE FROM avoirmission WHERE idam=$idam";
        if(mysql_query($sql)){
            echo "<script>
                document.location.replace('distribution-list.php');
            </script>";
        }else{
            echo mysql_error();
        }
    }

?>