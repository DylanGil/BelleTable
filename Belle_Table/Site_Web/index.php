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
		<?php 
			$error =array() ;
			if(!empty($_POST))/* si les valeur dans les champ ne son pas remplie ALORS crée la variable erreur */
			{	
				if(empty($_POST['nom'])) $error[]='nom' ;
				if(empty($_POST['prenom'])) $error[]='prenom' ;
				if(empty($_POST['email'])) $error[]='email' ;
				if(!empty($_POST['email']))
				{
					if(!preg_match ( " /^.+@.+\.[a-zA-Z]{2,}$/ " , $_POST['email'])) $errorMail='désolé l\'email que vous nous avez fournis n\'est pas valide merci de respecter le format exemple@exemple.com';
				}
				if(empty($_POST['sdld'])) $error[]='sujet de la demande' ;
				if(empty($_POST['message'])) $error[]='message' ;	
				if(empty($error)) /* si la variable error et vide alors afficher ce code */ 
				{
					$prenom = $_POST['prenom'];
					$nom = $_POST['nom'];
					$email = $_POST['email'];
					$sujet = $_POST['sdld'];
					$message = $_POST['message'];
					
					$reqContact = "INSERT INTO contact(nom, prenom, email, sujet, message, date_creation, etat) VALUES ('{$nom}' , '{$prenom}', '{$email}', '{$sujet}' , '{$message}' , now(), 'Nouveau'); " ;
					mysqli_query($bdd, $reqContact);


				}
			}
		?>

	<section>
		<div class="section-contact">
			<h3 class="h3contact">Contacter nous</h3>

			<form class="contacter" action="" method="POST">
				<?php if(!empty($error)): ?>
					<span class="error-msg">
						Vous n'avez pas remplie les champs en rouge!
					</span><br><br>
				<?php endif; ?>
				<div class="form-contact">
					<div class="prenom-nom">
						<div class="prenom">
							<label for="prenom" <?php if(in_array('prenom' , @$error)): ?> class="error" <?php endif; ?> >Prénom</label>
							<input type="text" placeholder="prenom" name="prenom" id="prenom">
						</div>
						<div class="nom">
							<label for="nom" <?php if(in_array('nom' , @$error)): ?> class="error" <?php endif; ?>>Nom</label>
							<input type="text" placeholder="nom" name="nom" id="nom">
						</div>
					</div>

					<div class="b-email" >
						<div class="email">
							<label for="email" <?php if(in_array('email' , @$error)): ?> class="error" <?php endif; ?>>Adresse Email</label>
							<input style="border-radius: 0px; border-color: gray;" type="email" placeholder="Adresse email" name="email" id="email">
							<?php if(isset($errorMail)): ?> 
								<span class="error-msg" style="position: relative; right: 9px; top: 10px;"> <?php echo $errorMail; ?></span> 
							<?php endif; ?>
						</div>
					</div>

					<div class="b-email">
						<div class="email">
							<label for="sdld" <?php if(in_array('sujet de la demande' , @$error)): ?> class="error" <?php endif; ?>>Sujet de la demande</label>
							<input style="border-radius: 0px; border-color: gray;" type="text" placeholder="Sujet de la demande" name="sdld" id="sdld">
						</div>
					</div>
					<div class="b-message">
						<div class="message">
							<label for="message" <?php if(in_array('message' , @$error)): ?> class="error" <?php endif; ?>>Message</label>
							<textarea cols="47" rows="4" style="font-family: arial;" name="message" id="message" placeholder="Ecriver votre message..."></textarea>
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