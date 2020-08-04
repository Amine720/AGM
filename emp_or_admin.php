<?php
    
    $emp = $_SESSION['emp'];
    if($emp === 'emp'){
        echo "<script>
            document.location.replace('employe-profile.php');
        </script>";
    }
    if($emp === 'admin'){
        echo "<script>
            document.location.replace('service-list.php');
        </script>";
    }

?>