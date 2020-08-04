<?php
	session_start();
    $option = $_SESSION['option'];
?>

<body>
    <div class="header">
      <?php
        if($option == 2 && !$_GET['ide']){
          echo "<i class='fa fa-times' aria-hidden=true></i>";
        }
      ?>
      <h3>Espace Adminstratif</h3>
      <div class="gestions">
        <ul>
            <li <?php if ($option==1) echo "class=active"; ?>><a href="service-list.php">Gestion des services</a> <i class="fas fa-cogs"></i></li>
            <li <?php if ($option==2) echo "class=active"; ?>><a href="employe-list.php">Gestion des employés</a> <i class="fas fa-user-tie"></i></li>
            <li <?php if ($option==3) echo "class=active"; ?>><a href="affectation-list.php">Gestion des affectations</a> <i class="fas fa-random"></i></li>
            <li <?php if ($option==4) echo "class=active"; ?>><a href="mission-list.php">Gestion des missions</a> <i class="fas fa-briefcase"></i></li>
            <li <?php if ($option==5) echo "class=active"; ?>><a href="distribution-list.php">Gestion des distributions des missions aux chefs de service</a> <i class="fas fa-random"></i></li>
            <li <?php if ($option==6) echo "class=active"; ?>><a href="tache-list.php">Gestion des taches</a> <i class="fas fa-tasks"></i></li>
            <li <?php if ($option==7) echo "class=active"; ?>><a href="activite-list.php">Gestion des activités</a> <i class="fas fa-chart-line"></i></li>
            <li> <a href="logout.php">Déconnection</a> <i class="fa fa-arrow-right"></i></li>
        </ul>
      </div>
    </div>
</body>