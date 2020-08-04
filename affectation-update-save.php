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
    $sql = "UPDATE affectation SET idemploye=$idemploye, idservice='$idservice', dda='$dda', dfa='$dfa',fonction='$fonction' WHERE idaffectation=$ida";
    if(mysql_query($sql)){
        echo "<script>
            document.location.replace('affectation-list.php');
        </script>";
    }else{
        echo mysql_error();
    }

?>