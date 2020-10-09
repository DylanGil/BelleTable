<!DOCTYPE html>
	<html>
	<?php session_start();
			if (isset($_SESSION['email']))
			{
				$info = $_GET["infos"]; // permet de recuperer l'info ecrit dans l'url a chaque page
				$redirect = "location:".$info; // permet de concatainer tout
				session_destroy();
				header($redirect); // je redirige vers la page ou le user était avant de se déconnecter
			}
			?>
			<head>
			<meta charset="utf-8">
			<link rel="stylesheet" type="text/css" href="styles.css">
			<link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
			<title>Belle Table</title>
		</head>
		<center>
		<body>
			<header>
				<div class="wrapper Header">
					<h1>Belle Table<span class="orange">.</span></h1>
					<nav>
						<ul>
							<li><a href="index.php">Accueil</a></li>
							<li><a href="info.php">Nous découvrir</a></li>
							<li><a href="offre.php">Offres d'emplois</a></li>
							<li><a href="produits.php">Nos produits</a></li>
							<li><a href="infolegal.php">Infos legal</a></li>
							<!-- pas besoin de PHP ici car si le user va sur cette page c'est pour se connecter, ou il va dessus 
							car il a appuyer sur se deconnecter et n'a donc pas besoin de revoir le bouton se deconnecter -->
							<li><a href="Inscription.php">Se connecter</a></li>
						</ul>
					</nav>
				</div>
			</header>


<?php if (isset($_GET["inscrit"])) echo "<p style=color:green>Votre compte a bien été crée</p>"; ?>

<h1>Inscription</h1>

	<?php if (isset($_GET["erreur"])) echo "<p style=color:red>Erreur un compte avec cette email existe déjà!</p>"; ?>
	<form action="InscriptionPHP.php" method="POST">
		Nom*: <input type="text" name="nom" placeholder="Nom: " required> <br><br> 
		Prenom*: <input type="text" name="prenom" placeholder="Prenom" required><br><br>
		Mot de passe*: <input type="password" name="mdp"  required><br><br>
		E-mail*: <input type="email" name="email" placeholder="azerty@gmail.com" required><br><br>
		Telephone +33*: <input type="tel" name="tel" placeholder="601020304" pattern="[0-9]{9}" required><br><br>
		<p style="font-size: 12px">Obligatoire*</p>

 <br><br><br>
		<input type="submit" value="Envoyer" name="monboutinscription">
</form>
<br><br>

<h1>Se connecter</h1> <br>
	<?php if (isset($_GET["erreur1"])) echo "<p style=color:red>Erreur email ou mot de passe incorrect</p>"; ?>

	<form action="InscriptionPHP.php" method="post">
		E-mail: <input type="email" name="email" placeholder="azerty@gmail.com" required><br><br>
		Mot de passe: <input type="password" name="mdp"  required><br><br>
 <br><br><br>
		<input type="submit" value="Envoyer" name="monboutconnexion">
</form>
































			<section id="contact"> <!-- sert egalement de footer-->
				<div class="wrapper">
					<h3>Contactez-nous</h3>
					<p>Adresse : 20, rue de la gare 75100 Paris.<br> N° de téléphone : 01 75 02 77 14. <br> Adresse Mail: azerty@gmail.com</p> 
					<br><br>

					<h1>Belle Table<span class="orange">.</span></h1>
					<div class="copyright">Copyright © Tous droits réservés.</div>
				</div>
			</section>

</body>
</center>
</html>