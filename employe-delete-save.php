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
        $ide = $_POST['ide'];
        $sql = "DELETE FROM employe WHERE idemploye=$ide";
        if(mysql_query($sql)){
            echo "<script>
                document.location.replace('employe-list.php');
            </script>";
        }else{
            echo "error";
        }
    }

?>