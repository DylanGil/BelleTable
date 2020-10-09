<?php 
session_start();
if (isset($_POST["monboutinscription"])){
$nom= $_POST["nom"];
$prenom= $_POST["prenom"];
$mdp= $_POST["mdp"];
$email= $_POST["email"];
$tel= $_POST["tel"];
$id = mysqli_connect ("localhost", "root", "","ppe1"); // la ou il se connecte puis le user puis le mot de passe puis la BDD
$req = "select * from login where email = '$email'";
$res = mysqli_query($id,$req);

if (mysqli_num_rows($res) > 0)
		{header("location:Inscription.php?erreur=1");}
		else
		{
			$req2 = "insert into login (nom, prenom, telephone, mdp, email, admin) values ('$nom','$prenom','$tel','$mdp', '$email', '0')";
			$res = mysqli_query($id, $req2);
			header("location:Inscription.php?inscrit=1");

		}

}






if (isset($_POST["monboutconnexion"])){
$mdp= $_POST["mdp"];
$email= $_POST["email"];
$id = mysqli_connect ("localhost", "root", "","ppe1"); // la ou il se connecte puis le user puis le mot de passe puis la BDD
$req = "select * from login where email = '$email' and mdp = '$mdp'";
$res = mysqli_query($id,$req);

if (mysqli_num_rows($res) > 0){

			$_SESSION["email"] = $email;
			header("location:index.php");
		
		}
		else
		{
			
			header("location:Inscription.php?erreur1=1");

		}

	}

 ?>