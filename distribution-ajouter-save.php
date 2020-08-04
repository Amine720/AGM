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
        try {
            extract($_POST);
            $arr = $chef;
        
            foreach($chef as $c){
                $sql = "INSERT INTO avoirmission VALUES (NULL, $idm, $c)";
                mysql_query($sql);
            }
        } catch (Exception $e) {
            echo "<script>
                document.location.replace('distribution-list.php');
            </script>";
        }

        echo "<script>
                document.location.replace('distribution-list.php');
            </script>";
    }

?>