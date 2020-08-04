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
	$f = fopen('service.txt','w');
	$f = fopen('service.txt','a+');
	$sql = "SELECT *  FROM service";
	$res=mysql_query($sql);
	while($data = mysql_fetch_array($res))
	{
		$texte = '';
		$texte = $data['idservice'];
		$texte = $texte . ';' . $data['nomservice'];
		fputs($f,$texte);
		fputs($f,"\n");
	}
	fclose($f);
	echo "
		<script langage=javascript>
			document.location.replace('service_imprimer.php') 
		</script>
		";	
?>