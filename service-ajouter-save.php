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
        $idservice = $_POST['idservice'];
        $nomservice = $_POST['nomservice'];

        $sql = "INSERT INTO service(idservice, nomservice) VALUES ('$idservice', '$nomservice')";
        if(mysql_query($sql)){
            echo "<script>
                document.location.replace('service-list.php');
            </script>";
        }
    }

?>