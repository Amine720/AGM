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
    <h3>Espace chef de service</h3>
    <div class="gestions">
        <ul>
            <li <?php if ($option==1) echo "class=active"; ?>><a href="profile.php">Mon profile</a> <i class="fa fa-address-book"></i></li>
            <li <?php if ($option==2) echo "class=active"; ?>><a href="mission.php">Mes missions</a> <i class="fas fa-briefcase"></i></li>
            <li <?php if ($option==3) echo "class=active"; ?>><a href="mes-employe.php">Mes employés</a> <i class="fas fa-user-tie"></i></li>
            <li <?php if ($option==4) echo "class=active"; ?>><a href="employe-tache.php">Les taches de mes employés</a> <i class="fa fa-tasks"></i></li>
            <li <?php if ($option==5) echo "class=active"; ?>><a href="employe-activite.php">Les activités de mes employés</a> <i class="fas fa-random"></i></li>
            <li> <a href="logout.php">Déconnection</a> <i class="fa fa-arrow-right"></i></li>
        </ul>
    </div>
</div>