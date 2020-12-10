<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
	<title>QCM</title>
	
	<?php 
		$page = "info.php"; 
		require_once('include/en-tete.php');
	?>

</head>
<body>
<?php include("include/menu.php"); ?>
	<center>
	<section id="possibilities">
		<form action="resultat.php" method="post">

			<h1>Resultat</h1>

			<?php
				$login = $_SESSION['email'];
				$niveau = $_SESSION['niveau'];
				$i = 1;
				$total = 0; //total de points obtenu
				$nbq = 0; // nombre de questions 

				foreach ($_POST as $idq => $verif) 
				{ ?> <br> <?php 

					$req = "select * from reponse where idq = ".$idq." and verif = 1";		
					$res = mysqli_query($bdd, $req); 
					$ligne = mysqli_fetch_assoc($res);
					
					if ($verif == 0) 
					{
						echo "Question ".$i.": mauvaise réponse.  La bonne reponse était : ".$ligne["reponse"]."";
						$nbq++;
					} 
					else if ($verif == 1) 
					{
						if ($niveau == 1) {
						$total++; // si le niveau était en expert, une bonne réponse, vaut 2 points
						}
						echo "Question ".$i.": bonne réponse (".$ligne["reponse"].")";
						$nbq++;
						$total++;
					}
					$i++;
				}
			?>
			<br><br><br> 
			<?php
				echo "Votre note : ".$total. " / 20";
				// $req2 = "insert into resultat (login, note, niveau) values('$login', '$total', '$niveau')";
				// $res2 = mysqli_query($id, $req2);	
				$req3 = "UPDATE login SET noteqcm = '$total' where email = '$login'";
				$res3 = mysqli_query($bdd, $req3);	
				//Une fois le QCM fini, sa va modifier la noteqcm du user
			?>
			<br><br><br>
		</form>

		<a href="emploi.php" class="button-1">Nos emplois</a>
		</section>
	</center>
	<?php include("include/footer.php"); ?>
</body>
</html>
