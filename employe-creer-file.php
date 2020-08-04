<?php

    session_start();
    $login = $_SESSION['login'];
    if (!isset($login))
    {
        echo "<script>
            document.location.replace('authentification.php');
        </script>";
    }

	$con = mysql_connect("localhost","root","");
	mysql_select_db("agm");
	$f = fopen('employe.txt','w');
	$f = fopen('employe.txt','a');

	$r = "select * from employe";
	$res=mysql_query($r);
	while($data = mysql_fetch_array($res))
	{
		$texte = '';
		$texte = $data['idemploye'];
		$texte = $texte . ';' . $data['nom'];
		$texte = $texte . ';' . $data['prenom'];
		$texte = $texte . ';' . $data['ddn'];
		$texte = $texte . ';' . $data['specialite'];
		$texte = $texte . ';' . $data['email'];
		fputs($f,$texte);
		fputs($f,"\n");
	}
	fclose($f);
	echo "
		<script langage=javascript>
			document.location.replace('employe_imprimer.php') 
		</script>
		";
?>