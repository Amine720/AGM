<?php

	session_start();
	$login = $_SESSION['login'];
	
	require('emp_or_chef.php');
	if (!isset($login))
	{
        echo "<script>
            document.location.replace('authentification.php');
        </script>";
    }
	require("connection.php");
	$f = fopen('activite.txt','w');
	$f = fopen('activite.txt','a+');
	$sql = "SELECT *  FROM activite";
	$res=mysql_query($sql);
	while($data = mysql_fetch_array($res))
	{
		$texte = '';
		$texte = $data['idactivite'];
		$texte = $texte . ';' . $data['titreactivite'];
		$texte = $texte . ';' . $data['da'];
		$texte = $texte . ';' . $data['ha'];
		$texte = $texte . ';' . $data['idtache'];
		$texte = $texte . ';' . $data['commentaire'];
		fputs($f,$texte);
		fputs($f,"\n");
	}
	fclose($f);
	echo "
		<script langage=javascript>
			document.location.replace('activite_imprimer.php') 
		</script>
		";	
?>