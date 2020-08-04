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
    $idservice = $_POST['idservice'];
    $ids = $_POST['ids'];
    $nomservice = $_POST['nomservice'];
    $sql = "UPDATE service SET idservice='$idservice', nomservice='$nomservice' WHERE idservice='$ids'";
    if(mysql_query($sql)){
        echo "<script>
            document.location.replace('service-list.php');
        </script>";
    }else{
        echo "error";
    }

?>