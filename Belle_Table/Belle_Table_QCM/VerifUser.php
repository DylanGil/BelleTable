<?php
session_start();
	if (isset($_POST["monbout"]))
	{
		$login = $_POST["login"];
		$mdp = $_POST["mdp"];


		$id = mysqli_connect("localhost","root","","belle_table");
		$req = "select * FROM connexion WHERE login='$login'and mdp='$mdp'";

		$res = mysqli_query($id, $req);
		if (mysqli_num_rows($res) > 0){

			$_SESSION["login"] = $login;
			$res = mysqli_query($id, $req2);
			header("location:pageprive.php");}
		else
		{
			$erreur = "<h3> Erreur login ou mot de passe invalide! </h3>";
		}
	}
?>




<!DOCTYPE html>
<html>
	<meta charset="UTF-8" />
<head>
	<title>Login</title>
</head>
<center>
	<h1> Login médecins</h1>
	<?php if (isset($erreur)) echo $erreur; ?>
	<form method="post" action="VerifUser.php">
		Login : <input type="text" name="login" value="prof"><br /><br />
		Mot de passe : <input type="text" name="mdp" value="prof"><br /><br />
		
		<input type="submit" value="Se connecter" name="monbout">
	</form>
</center>
</html>