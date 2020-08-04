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
    if(isset($_POST['ajouter'])){
        extract($_POST);
        $sql = "INSERT INTO affectation VALUES (NULL, '$idemploye', '$idservice', '$dda', '$dfa', '$fonction' )";
        if(mysql_query($sql)){
            echo "<script>
                document.location.replace('affectation-list.php');
            </script>";
        }else{
            echo mysql_error();
        }
    }

?>