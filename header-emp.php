<?php
	session_start();
    $option = $_SESSION['option'];
?>


<div class="header">
    <?php
    if($option == 2 && !$_GET['ide']){
        echo "<i class='fa fa-times' aria-hidden=true></i>";
    }
    ?>
    <h3>Espace employe</h3>
    <div class="gestions">
        <ul>
            <li <?php if ($option==1) echo "class=active"; ?>><a href="employe-profile.php">Mon profile</a> <i class="fa fa-address-book"></i></li>
            <li <?php if ($option==4) echo "class=active"; ?>><a href="mes-tache.php">Mes taches</a> <i class="fa fa-tasks"></i></li>
            <li <?php if ($option==5) echo "class=active"; ?>><a href="mes-activite.php">Mes activités</a> <i class="fas fa-random"></i></li>
            <li> <a href="logout.php">Déconnection</a> <i class="fa fa-arrow-right"></i></li>
        </ul>
    </div>
</div>