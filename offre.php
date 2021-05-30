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
		$page = "offre.php"; 
	?>

</head>
<body>
	<center>
		<?php include("include/menu.php"); ?>

		<section id="possibilities">
			<?php
			if (!isset($_SESSION['email']))
			{
				echo "Merci de vous connecter afin de pouvoir accéder au offres d'emploie";
			}
			else
			{
				$login = $_SESSION['email'];
				if (!isset($_POST["boutlvl"])) 
				{ 	
					if ($_SESSION['noteqcm'] != null): //AFFICHE LE QCM SEULEMENT SI IL A PAS DE NOTE
						header("location:emploi.php");
					endif;
					?>
					<form method="post" action="offre.php">
						<b> Choisir votre difficulté:</b> 
						<br><br>
						<label for="debutant">Debutant (1 point)</label>
						<input type="radio" name="niveau" id="debutant" value="0"><br>
						<label for="expert">Expert (2 points)</label>
						<input type="radio" name="niveau" value="1" id="expert" checked><br><br>
						<input type="submit" class="button-1" style="border: none;" value="Choisir" name="boutlvl">
					</form>	
					<?php
				} 	?>

				<form action="resultat.php" method="post">

					<?php if (isset($_POST["boutlvl"])) 
					{ 
						?>
						<h1>QCM A COMPLETER</h1>

						<?php

						$niveau = $_POST['niveau'];
						$_SESSION['niveau'] = $niveau;
						mysqli_query($bdd,"SET NAMES 'utf8'");
						$req = "select * from question where niveau = $niveau ORDER BY RAND() limit 10";
						$res = mysqli_query($bdd, $req); 

						while($ligne = mysqli_fetch_assoc($res))
						{
								echo '<br><br>';
								echo '<b>'.$ligne["label"].":<b>"; 
								//echo '<span class="terme">'.$data['Terme']."</span>:".$data['Definition'];
							?>
							 <br><br><br>
							<?php
									$req2 = "select * from reponse where idq = ".$ligne["id"]." ORDER BY RAND()";
									$res2 = mysqli_query($bdd, $req2);

							while($ligne2 = mysqli_fetch_assoc($res2))
							{ 
								?>
								<input type="radio" name="<?= $ligne2["idq"]; ?>" value="<?= $ligne2["verif"]; ?>" required> <?php echo $ligne2["reponse"]?> <br><br>
								<?php 
							} 	?>
							<?php 
						} 	?>
						<input type="submit" value="Envoyer" class="button-1" style="border: none;"> <br><br><br>
						<?php 
					} 	?>
				</form>
				<?php 
			} 	?>
		</section>
		<?php include("include/footer.php"); ?>
	</center>
</body>
</html>