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
	require("connection.php");
	$f = fopen('tache.txt','w');
	$f = fopen('tache.txt','a+');
	$sql = "SELECT *  FROM tache";
	$res=mysql_query($sql);
	while($data = mysql_fetch_array($res))
	{
		$texte = '';
		$texte = $data['idtache'];
		$texte = $texte . ';' . $data['titretache'];
		$texte = $texte . ';' . $data['ddt'];
		$texte = $texte . ';' . $data['dftt'];
		$texte = $texte . ';' . $data['dfrt'];
		$texte = $texte . ';' . $data['idemploye'];
		$texte = $texte . ';' . $data['idmission'];
		fputs($f,$texte);
		fputs($f,"\n");
	}
	fclose($f);
	echo "
		<script langage=javascript>
			document.location.replace('tache_imprimer.php') 
		</script>
		";	
?>