<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
	<title>Belle Table</title>

	<?php
		require_once('include/en-tete.php');
		$page = "info.php"; 
	?>

</head>
<body>
	<center>
		<?php include("include/menu.php"); ?>
		<section id="possibilities">
			<div class="wrapper">
				<article style="background-image: url(images/image-1.jpg);">
					<div class="overlay">
						<h4>Nos employés</h4>
						<p>
							<small>Le nombre de salariés a suivi cette évolution. Ce sont 40 salariés qui travaillent au sein de la société BELLETABLE, 37 à temps complet, 3 à mi-temps. Parfois, pour faire face à la charge supplémentaire, la société BELLETABLE fait appel à un ou plusieurs intérimaires</small>
						</p>
					</div>
				</article>

				<article style="background-image: url(images/image-2.jpg);">
					<div class="overlay">
						<h4>Notre société</h4>
						<p><small>L’objet de cette société est la vente et la location de tous les matériels, la vaisselle, les couverts et tous autres accessoires permettant de dresser une « Belle Table ». Cette société est installée dans des locaux récents. Son numéro de Siret est : 732 829 320 00074.</small></p>
					</div>
				</article> 
				<div class="clear"></div> 
				<br><br>
				<h4>NOS SERVICES</h4>
				<p>
					Depuis quelques mois, BELLETABLE propose un service complet avec la location incluant la livraison, la mise en place des tables, l’installation des divers matériels, le service à table, lavage de la vaisselle et du linge. Aucune autre société ne propose un service aussi complet et haut de gamme avec des articles de la table de luxe.
				</p>

				<br><br>
				<h4>NOS LOCAUX</h4>
				<p>
					Nous nous situons  au 20 rue de la gare 75100 Paris. Un plan du batiment concernant les 2 étages avec la répartitions des locaux est également disponible <a href="images/plan_locaux.pdf" target="blank">ici</a>.
				</p>

				<br><br>
				<h4>NOTRE MATERIEL INFORMATIQUE</h4>
				<p>
					Notre parc informatique est simple : un PC fixe par salarié sédentaire (soit 27). Tous ne sont pas identiques et la plupart d’entre eux sont soit en fin de vin, soit manque de performances pour un travail efficace.
					Certains sont équipés d’une imprimante personnelle. <br>
					Plus d'information sur le matériel sont disponible <a href="images/materielinfo.pdf" target="blank">ici</a>.
				</p>
			</div>
		</section>
		<?php include("include/footer.php"); ?>
	</center>
</body>
</html>