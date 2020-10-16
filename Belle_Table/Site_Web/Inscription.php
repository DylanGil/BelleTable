<!DOCTYPE html>
<html>
<head>
	<?php session_start(); ?>
	<?php $page = "inscription.php"; ?>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
	<title>Belle Table</title>
</head>
<body>
	<center>
		<?php include("menu.php"); ?>

		<?php if (isset($_GET["inscrit"])) echo "<p style=color:green>Votre compte a bien été crée</p>"; ?>

		<section id="possibilities">
			<?php 
				if (isset($_GET["erreur"]))
					{
						echo "<p style=color:red>Erreur un compte avec cette email existe déjà!</p>"; 
					}
			?>
			<div>
				<form action="InscriptionPHP.php" method="POST" style="margin: inherit;"><h1>Inscription</h1>
					<br>
					<div style="display: flex; flex-direction: row; justify-content: space-around; width: 255px;">
						<div style="display: flex; flex-direction: column; width: 255px;">
							<label for="nom">Nom*:</label><br>
							<input type="text" name="nom" id="nom" placeholder="Nom: " required> <br><br> 
							<label for="prenom">Prenom*:</label><br>
							<input type="text" name="prenom" id="prenom" placeholder="Prenom" required><br><br>
						</div>
						<div style="display: flex; flex-direction: column; width: 255px;">
							<label for="mdp">Mot de passe*:</label><br>
							<input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required><br><br>
							<label for="email">E-mail*:</label><br>
							<input type="email" name="email" id="email" placeholder="azerty@gmail.com" required><br><br>
						</div>	
					</div>
					<br>
					<label for="tel">Telephone +33*: </label><br>
					<input type="tel" name="tel" placeholder="601020304" pattern="[0-9]{9}" required><br><br>
					<p style="font-size: 12px; position: relative; right: 20px;">Obligatoire*</p>
					<br>
					<input type="submit" value="Envoyer" class="button-2" name="monboutinscription" style="border: 0; position: relative; right: 20px;" >
				</form>
				<br><br>

				
				<?php if (isset($_GET["erreur1"])) echo "<p style=color:red>Erreur email ou mot de passe incorrect</p>"; ?>
				<form action="InscriptionPHP.php" method="post" style="margin: inherit;"><h1>Se connecter</h1>
					<br>
					<label for="email2"> E-mail: </label><br>
					<input type="email" name="email" id="email2" placeholder="azerty@gmail.com" required><br><br>
					<label for="mdp2">Mot de passe: </label><br>
					<input type="password" name="mdp" id="mdp2" placeholder="Mot de passe" required><br><br>
					<br>
					<input type="submit" value="Envoyer" class="button-2" name="monboutconnexion" style="border: 0; position: relative; right: 16px;">
				</form>
			</div>
		</section>
		<?php include("footer.php"); ?>
	</center>
</body>
</html>