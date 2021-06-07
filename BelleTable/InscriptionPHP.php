<?php 
	session_start();
	include("include/en-tete.php");

	if (isset($_POST["monboutconnexion"]))
	{
		$mdp= str_replace("'","''",$_POST['mdp']);
		$email= str_replace("'","''",$_POST['email']);
		$req = "SELECT * FROM login WHERE email = '{$email}' or login = '{$email}' and mdp = '{$mdp}'";
		$res = mysqli_query($bdd,$req);

		if (mysqli_num_rows($res) > 0)
			{	  
				$ligne = mysqli_fetch_assoc($res);
				$_SESSION["id"] = $ligne['id'];		
				$_SESSION["nom"] = $ligne['nom'];
				$_SESSION["prenom"] = $ligne['prenom'];
				$_SESSION["telephone"] = $ligne['telephone'];
				$_SESSION["mdp"] = $ligne['mdp'];
				$_SESSION["email"] = $ligne['email'];
				$_SESSION["admin"] = $ligne['admin'];
				$_SESSION["noteqcm"] = $ligne['noteqcm'];
				header("location:index.php");
			
			}
		else
			{
				header("location:Inscription.php?erreur1=1");
			}
	}

?>