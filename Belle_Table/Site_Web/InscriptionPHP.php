<?php 
	session_start();
	
	if (isset($_POST["monboutinscription"]))
	{
		$nom= $_POST["nom"];
		$prenom= $_POST["prenom"];
		$mdp= $_POST["mdp"];
		$email= $_POST["email"];
		$tel= $_POST["tel"];
		$id = mysqli_connect ("localhost", "root", "","belle_table"); // la ou il se connecte puis le user puis le mot de passe puis la BDD
		$req = "select * from login where email = '$email'";
		$res = mysqli_query($id,$req);

		if (mysqli_num_rows($res) > 0)
			{
				header("location:Inscription.php?erreur=1");
			}
		else
			{
				$req2 = "insert into login (nom, prenom, telephone, mdp, email, admin) values ('$nom','$prenom','$tel','$mdp', '$email', '0')";
				$res = mysqli_query($id, $req2);
				header("location:Inscription.php?inscrit=1");
			}
	}

	if (isset($_POST["monboutconnexion"]))
	{
		$mdp= str_replace("'","''",$_POST['mdp']);
		$email= str_replace("'","''",$_POST['email']);
		$id = mysqli_connect ("localhost", "root", "","belle_table"); // la ou il se connecte puis le user puis le mot de passe puis la BDD
		$req = "SELECT * FROM login WHERE email = '{$email}' and mdp = '{$mdp}'";
		$res = mysqli_query($id,$req);

		if (mysqli_num_rows($res) > 0)
			{	  
				$ligne = mysqli_fetch_assoc($res);
				$_SESSION["nom"] = $ligne['nom'];
				$_SESSION["prenom"] = $ligne['prenom'];
				$_SESSION["telephone"] = $ligne['telephone'];
				$_SESSION["mdp"] = $ligne['mdp'];
				$_SESSION["email"] = $ligne['email'];
				$_SESSION["admin"] = $ligne['admin'];
				header("location:index.php");
			
			}
		else
			{
				header("location:Inscription.php?erreur1=1");
			}
	}

?>