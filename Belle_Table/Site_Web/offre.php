<!DOCTYPE html>
<html>
<head>
	<?php session_start(); ?>
	<?php $page = "offre.php"; ?>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
	<title>Belle Table</title>
</head>
<body>
	<center>
		<?php include("menu.php"); ?>

		<section id="possibilities">
			<?php
			if (!isset($_SESSION['email']))
			{
				echo "connecte toi frere";
			}
			else
			{
				$login = $_SESSION['email'];
				if (!isset($_POST["boutlvl"])) 
				{ 	?>
					<form method="post" action="offre.php">
						<b> Choisir votre difficulté:</b> 
						<br><br>
						<label for="debutant">Debutant</label>
						<input type="radio" name="niveau" id="debutant" value="0"><br>
						<label for="expert">Expert</label>
						<input type="radio" name="niveau" value="1" id="expert" checked><br><br>
						<input type="submit" value="Choisir" name="boutlvl">
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
						$id = mysqli_connect ("localhost", "root", "","belle_table");
						mysqli_query($id,"SET NAMES 'utf8'");
						$req = "select * from question where niveau = $niveau ORDER BY RAND() limit 10";
						$res = mysqli_query($id, $req); 

						while($ligne = mysqli_fetch_assoc($res))
						{
								echo '<br><br>';
								echo '<b>'.$ligne["label"].":<b>"; 
								//echo '<span class="terme">'.$data['Terme']."</span>:".$data['Definition'];
							?>
							 <br><br><br>
							<?php
									$id = mysqli_connect ("localhost", "root", "","belle_table");
									$req2 = "select * from reponse where idq = ".$ligne["id"]." ORDER BY RAND()";
									$res2 = mysqli_query($id, $req2);

							while($ligne2 = mysqli_fetch_assoc($res2))
							{ 
								?>
								<input type="radio" name="<?= $ligne2["idq"]; ?>" value="<?= $ligne2["verif"]; ?>" required> <?php echo $ligne2["reponse"]?> <br><br>
								<?php 
							} 	?>
							<?php 
						} 	?>
						<input type="submit" value="Envoyer"> <br><br><br>
						<?php 
					} 	?>
				</form>
				<?php 
			} 	?>
		</section>
		<?php include("footer.php"); ?>
	</center>
</body>
</html>