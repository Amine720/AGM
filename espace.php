<?php
    session_start();
    require('connection.php');
    if(isset($_POST['connexion'])){
        $lg = $_POST['login'];
        $mdp = $_POST['mdp'];

        $sql = "SELECT * FROM employe WHERE login='$lg' AND motdepasse='$mdp'";
        $res = mysql_query($sql);
        $exist_user = mysql_num_rows($res);
        $user = mysql_fetch_array($res);
        if($exist_user==1 && $user['specialite'] == 'Manager'){
            $_SESSION['login'] = $lg;
            $_SESSION['option'] = 1;
            $_SESSION['emp'] = 'admin';
            echo "<script>document.location.replace('service-list.php')</script>";
        }else{
            $sql = "SELECT employe.*, chefdeservice.* FROM employe, chefdeservice WHERE login='$lg' AND motdepasse='$mdp' AND employe.idemploye=chefdeservice.idemploye";
            $res = mysql_query($sql);
            $exist_user = mysql_num_rows($res);
            $user = mysql_fetch_array($res);
            if($exist_user==1){
                $_SESSION['login'] = $lg;
                $_SESSION['idchef'] = $user['idchefdeservice'];
                $_SESSION['idemp'] = $user['idemploye'];
                $_SESSION['option'] = 1;
                $_SESSION['emp'] = 'chef';
                echo "<script>document.location.replace('profile.php')</script>";
            }else{
                $sql = "SELECT * FROM employe WHERE login='$lg' AND motdepasse='$mdp'";
                $res = mysql_query($sql);
                $exist_emp = mysql_num_rows($res);
                $emp = mysql_fetch_array($res);
                if($exist_emp==1){
                    $_SESSION['emp'] = 'emp';
                    $_SESSION['login'] = $lg;
                    $_SESSION['idemp'] = $emp['idemploye'];
                    $_SESSION['option'] = 1;
                    echo "<script>document.location.replace('employe-profile.php')</script>";
                }else{
                    echo "<script>document.location.replace('authentification.php')</script>";
                }
            }
        }

    }

?>