<?php
    
    $emp = $_SESSION['emp'];
    if($emp === 'emp'){
        echo "<script>
            document.location.replace('employe-profile.php');
        </script>";
    }
    if($emp === 'chef'){
        echo "<script>
            document.location.replace('profile.php');
        </script>";
    }

?>