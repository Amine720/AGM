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
	$f = fopen('affectation.txt','w');
	$f = fopen('affectation.txt','a');

	$r = "select affectation.*, employe.*, service.* from affectation, employe, service where affectation.idemploye = employe.idemploye and affectation.idservice = service.idservice";
	$res=mysql_query($r);
	while($data = mysql_fetch_array($res))
	{
		$texte = '';
		$texte = $data['idaffectation'];
		$texte = $texte . ';' . $data['nom'] . ' ' . $data['prenom'];
		$texte = $texte . ';' . $data['nomservice'];
		$texte = $texte . ';' . $data['dda'];
		$texte = $texte . ';' . $data['dfa'];
		$texte = $texte . ';' . $data['fonction'];
		fputs($f,$texte);
		fputs($f,"\n");
	}
	fclose($f);
	echo "
		<script langage=javascript>
			document.location.replace('affectation_imprimer.php') 
		</script>
		";
?>