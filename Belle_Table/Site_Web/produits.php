<!DOCTYPE html>
<html>
<head>
	<?php session_start();?>
	<?php $page = "produits.php"; ?>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
	<title>Belle Table</title>
</head>
<body>
	<center>
		<?php include("menu.php"); ?>
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

		<?php include("footer.php"); ?>
	</center>
</body>
</html>