<?php
    
    $emp = $_SESSION['emp'];
    if($emp === 'chef'){
        echo "<script>
            document.location.replace('profile.php');
        </script>";
    }
    if($emp === 'admin'){
        echo "<script>
            document.location.replace('service-list.php');
        </script>";
    }

?>