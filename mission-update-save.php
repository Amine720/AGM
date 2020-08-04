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
    $sql = "UPDATE mission SET titremission='$titre', ddm='$ddm', dftm='$dftm', dfrm='$dfrm' WHERE idmission=$idm";
    if(mysql_query($sql)){
        echo "<script>
            document.location.replace('mission-list.php');
        </script>";
    }else{
        echo mysql_error();
    }

?>