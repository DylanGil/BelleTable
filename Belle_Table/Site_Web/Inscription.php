<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
	<title>Belle Table</title>

	<?php 

		require_once('include/en-tete.php');
		$page = "inscription.php"; 

		$error = "" ;
		if (isset($_POST["monboutinscription"]))
		{
			if(empty($_POST['nom'])) $error ='le champ : <strong> nom </strong> est vide <br>' ;
			if(empty($_POST['prenom'])) $error .=' le champ : <strong> prenom </strong> est vide <br>' ;
			if(empty($_POST['mdp'])) $error .=' le champ : <strong> mdp </strong> est vide <br>' ;
			if(empty($_POST['email'])) $error .=' le champ :<strong> email </strong> est vide <br>' ;
			if(!preg_match ( " /^.+@.+\.[a-zA-Z]{2,}$/ " , $_POST['email'])) $error .=' la syntaxe de votre <strong> email </strong> est incorrect veuillez respecter la syntaxe example@example.com <br>' ;
			if(empty($error))
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
						$errorAccountExist = true;
					}
				else
					{
						$req2 = "insert into login (nom, prenom, telephone, mdp, email, admin) values ('$nom','$prenom','$tel','$mdp', '$email', '0')";
						$res = mysqli_query($id, $req2);
						$accountCreate = true ;
						header("location:Inscription.php?inscrit=1");
					}
			}

			else
			{
		   		$errorEmptyField = true;
			}
		} 
	?>
</head>

<body>
	<?php include("include/menu.php"); ?>

	<section id="possibilities">
		
		<div class="login">
			<?php if(@$_GET['connexion']=="inscription"): ?>
				<center>
					<?php if (isset($accountCreate)) echo "<p style=color:green>Votre compte a bien été crée</p>"; ?>
					<?php if (isset($errorEmptyField)) echo "<span style=' display: block; color:red; width: 300px;'>Des erreur on étais détecté merci de corriger les erreurs suivantes :<br>" . $error . "</span>"; ?>
					<?php if (isset($errorAccountExist)) echo "<p style=color:red>Erreur un compte avec cette email existe déjà!</p>"; ?>
					<form action="" method="POST" style="margin: inherit;"><h1>Inscription</h1>
						<br>
						<div class="inscription-form">
							<div class="inscription-form-col">
								<label for="nom">Nom*:</label><br>
								<input type="text" name="nom" id="nom" placeholder="Nom:" > <br><br>
							</div>
							<div class="inscription-form-col">
								<label for="prenom">Prenom*:</label><br>
								<input type="text" name="prenom" id="prenom" placeholder="Prenom" ><br><br>
							</div>
						</div>
						<div class="inscription-form">
							<div class="inscription-form-col">
								<label for="mdp">Mot de passe*:</label><br>
								<input type="password" name="mdp" id="mdp" placeholder="Mot de passe" ><br><br>
							</div>
							<div class="inscription-form-col">
								<label for="email">E-mail*:</label><br>
								<input type="email" name="email" id="email" placeholder="azerty@gmail.com" ><br><br>
							</div>
						</div>
						<div class="inscription-form">
							<div class="inscription-form-col">
								<label for="adresse">Adresse: </label><br>
								<input type="text" name="adresse" placeholder="6 rue victor hugo"><br><br>
							</div> 
							<div class="inscription-form-col">
								<label for="tel">Telephone +33: </label><br>
								<input type="tel" name="tel" placeholder="0601020304" pattern="[0-9]{9}"><br><br>
							</div>
						</div>

						<p style="font-size: 12px; position: relative; right: 20px;">Obligatoire*</p>
					
						<input type="submit" value="S'inscrire" class="connexion-submit" name="monboutinscription" style=" position: relative; right: 20px;" > <a class="connexion" style="position: relative; right: 20px;" href="inscription.php">J'ai deja un compte</a>
					</form>
					<br>
				</center>

			<?php else: ?>
				<center>
					<?php if (isset($_GET["erreur1"])) echo "<p style=color:red>Erreur email ou mot de passe incorrect</p>"; ?>
					<form action="InscriptionPHP.php" method="post" style="margin: inherit;"><h1>Se connecter</h1>
						<br>
						<label for="email2"> E-mail: </label><br>
						<input type="email" name="email" id="email2" placeholder="azerty@gmail.com" required><br><br>
						<label for="mdp2">Mot de passe: </label><br>
						<input type="password" name="mdp" id="mdp2" placeholder="Mot de passe" required><br><br>
						<br>
						<input type="submit" value="Se connecter" class="connexion-submit" name="monboutconnexion"> <a class="connexion" href="?connexion=inscription">S'inscrire</a>
					</form>
				</center>
				<br>
			<?php endif; ?>
		</div>
	</section>
	<?php include("include/footer.php"); ?>
</body>
</html>