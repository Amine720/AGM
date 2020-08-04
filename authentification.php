<?php
	session_start();
	$login = $_SESSION['login'];
	if (isset($login))
	{
		echo "<script>
			document.location.replace('service-list.php');
		</script>";
	}
?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<h1>Application de gestion des missions</h1>
<form method=POST action=espace.php> 
	<fieldset>
		<legend>Authentification</legend>
		<table>
			<tr>
				<td>Login</td>
                <td><input type="text" name="login"></td>
            </tr>
			<tr>
				<td>Mot de passe</td>
                <td><input type="password" name="mdp"></td>
            </tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Connexion" name='connexion' /></td>
            </tr>
		</table>
	</fieldset>
</form>