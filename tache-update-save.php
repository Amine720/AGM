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
    $sql = "UPDATE tache SET titretache='$titretache', ddt='$ddt', dftt='$dftt', dfrt='$dfrt', idemploye=$emp, idmission=$mis WHERE idtache=$idt";
    if(mysql_query($sql)){
        echo "<script>
            document.location.replace('tache-list.php');
        </script>";
    }else{
        echo mysql_error();
    }

?>