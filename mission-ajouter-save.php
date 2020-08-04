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

        $sql = "INSERT INTO mission VALUES (NULL, '$titre', '$ddm', '$dftm', '$dfrm')";
        if(mysql_query($sql)){
            echo "<script>
                document.location.replace('mission-list.php');
            </script>";
        }else{
            echo mysql_error();
        }
    }

?>