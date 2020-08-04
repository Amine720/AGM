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
        $ida = $_POST['ida'];
        $sql = "DELETE FROM affectation WHERE idaffectation=$ida";
        if(mysql_query($sql)){
            echo "<script>
                document.location.replace('affectation-list.php');
            </script>";
        }else{
            echo mysql_error();
        }
    }

?>