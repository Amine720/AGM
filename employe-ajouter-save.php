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

        $sql = "INSERT INTO employe VALUES (NULL, '$nom', '$prenom', '$cin', '$ddn', '$adresse', '$ville', '$email', '$ddr', '$specialite', '$login', '$motdepasse')";
        if(mysql_query($sql)){
            echo "<script>
                document.location.replace('employe-list.php');
            </script>";
        }else{
            echo mysql_error();
        }
    }

?>