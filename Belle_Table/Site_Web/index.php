<!DOCTYPE html>
	<html>
	<?php session_start();?>
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
							<?php
							if (!isset($_SESSION['email']))
							{
								?>
								<li><a href="Inscription.php">Se connecter</a></li>
								<?php
							}
							if (isset($_SESSION['email']))
							{
								?>
								<li><a href="Inscription.php?infos=index.php">Se deconnecter 
									<?php ;} ?></a></li>
								 

						</ul>
					</nav>
				</div>
			</header>
			

			<section id="main-image">
				<div class="wrapper" >
					<h2><strong>Les arts de la table</strong><br>Tout pour vos réceptions</h2>
					<a href="offre.php" class="button-1">Nos offres d'emplois</a>
				</div>
			</section>	

			<section id="possibilities">
				<div class="wrapper">
					<article style="background-image: url(images/image-1.jpg);">
						<div class="overlay">
							<h4>Nos employés</h4>
							<p><small>Le nombre de salariés a suivi cette évolution. Ce sont 40 salariés qui travaillent au sein de la
société BELLETABLE, 37 à temps complet, 3 à mi-temps. Parfois, pour faire face à la charge
supplémentaire, la société BELLETABLE fait appel à un ou plusieurs intérimaires</small></p>
							<a href="info.php" class="button-2">Plus d'infos</a>
						</div>
					</article>

					<article style="background-image: url(images/image-2.jpg);">
						<div class="overlay">
							<h4>Notre société</h4>
							<p><small>L’objet de cette société est la vente et la location de tous les matériels, la vaisselle, les
couverts et tous autres accessoires permettant de dresser une « Belle Table ».
Cette société est installée dans des locaux récents. Son numéro de Siret est : 732 829 320 00074.</small></p>
							<a href="info.php" class="button-2">Plus d'infos</a>
						</div>
					</article>
					<div class="clear"></div>

				</div>
			</section>

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
	</html>