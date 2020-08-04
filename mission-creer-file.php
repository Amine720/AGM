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
	$f = fopen('mission.txt','w');
	$f = fopen('mission.txt','a');

	$r = "select * from mission";
	$res=mysql_query($r);
	while($data = mysql_fetch_array($res))
	{
		$texte = '';
		$texte = $data['idmission'];
		$texte = $texte . ';' . $data['titremission'];
		$texte = $texte . ';' . $data['ddm'];
		$texte = $texte . ';' . $data['dftm'];
		$texte = $texte . ';' . $data['dfrm'];
		fputs($f,$texte);
		fputs($f,"\n");
	}
	fclose($f);
	echo "
		<script langage=javascript>
			document.location.replace('mission_imprimer.php') 
		</script>
		";
?>