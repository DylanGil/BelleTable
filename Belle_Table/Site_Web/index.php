<!DOCTYPE html>
<html>
<head>
	<?php session_start(); ?>
	<?php $page = "index.php"; ?>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
	<title>Belle Table</title>

</head>

<center>
<body>
	<?php include("menu.php"); ?>
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
					<p>
						<small>Le nombre de salariés a suivi cette évolution. Ce sont 40 salariés qui travaillent au sein de la société BELLETABLE, 37 à temps complet, 3 à mi-temps. Parfois, pour faire face à la charge supplémentaire, la société BELLETABLE fait appel à un ou plusieurs intérimaires</small>
					</p>
					<a href="info.php" class="button-2">Plus d'infos</a>
				</div>
			</article>

			<article style="background-image: url(images/image-2.jpg);">
				<div class="overlay">
					<h4>Notre société</h4>
					<p>
						<small>L’objet de cette société est la vente et la location de tous les matériels, la vaisselle, les couverts et tous autres accessoires permettant de dresser une « Belle Table ». Cette société est installée dans des locaux récents. Son numéro de Siret est : 732 829 320 00074.</small>
					</p>
					<a href="info.php" class="button-2">Plus d'infos</a>
				</div>
			</article>
			<div class="clear"></div>
		</div>
	</section>
	<section>
		<div class="section-contact">
			<h3 class="h3contact">Contacter nous</h3>

			<form class="contacter" action="" method="POST">

				<div class="form-contact">
					<div class="prenom-nom">
						<div class="prenom">
							<label for="prenom">Prénom</label>
							<input type="text" placeholder="prenom" name="prenom" id="prenom">
						</div>
						<div class="nom">
							<label for="nom">Nom</label>
							<input type="text" placeholder="nom" name="nom" id="nom">
						</div>
					</div>

					<div class="b-email">
						<div class="email">
							<label for="email">Adresse Email</label>
							<input style="border-radius: 0px; border-color: gray;" type="email" placeholder="Adresse email" name="email" id="email">
						</div>
					</div>

					<div class="b-message">
						<div class="message">
							<label for="message">Message</label>
							<textarea cols="47" rows="4" style="font-family: arial;" id="message" placeholder="Ecriver votre message..."></textarea>
						</div>
					</div>

					<div class="b-submit">
						<div class="submit">
							<input class="button-4" type="submit" name="submit">
						</div>
					</div>

				</div>
			</form>
		</div>
	</section>
	<?php include("footer.php"); ?>
</body>
</html>