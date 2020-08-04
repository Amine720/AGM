<?php

    session_start();
    $login = $_SESSION['login'];
    if (!isset($login))
    {
        echo "<script>
            document.location.replace('authentification.php');
        </script>";
    }
	require('emp_or_chef.php');
	$con = mysql_connect("localhost","root","");
	mysql_select_db("agm");
	$f = fopen('distribution.txt','w');
	$f = fopen('distribution.txt','a');

    $sql = "SELECT mission.*, chefdeservice.*, avoirmission.*, employe.* FROM mission, chefdeservice, avoirmission, employe WHERE mission.idmission = avoirmission.idmission AND avoirmission.idchefdeservice = chefdeservice.idchefdeservice AND employe.idemploye = chefdeservice.idchefdeservice";
    
	$res=mysql_query($sql);
	while($data = mysql_fetch_array($res))
	{
		$texte = '';
		$texte = $data['idam'];
		$texte = $texte . ';' . $data['nom'] . ' ' . $data['prenom'];
		$texte = $texte . ';' . $data['titremission'];
		fputs($f,$texte);
		fputs($f,"\n");
	}
	fclose($f);
	echo "
		<script langage=javascript>
			document.location.replace('distribution_imprimer.php') 
		</script>
		";
?>