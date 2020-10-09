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
								<li><a href="Inscription.php?infos=offre.php">Se deconnecter <?php } ?></a></li>

						</ul>
					</nav>
				</div>
			</header>

	<section id="possibilities">
		<?php
			if (!isset($_SESSION['email'])){
				echo "connecte toi frere";
			}
			else{

				$login = $_SESSION['email'];
			if (!isset($_POST["boutlvl"]))
			{	?>
		<center>
		<form method="post" action="offre.php">
				<b> Choisir votre difficulté:</b> <br><br>Debutant<input type="radio" name="niveau" value="0"> <br>
				Expert							<input type="radio" name="niveau" value="1" checked> <br> <br>
				<input type="submit" value="Choisir" name="boutlvl">
			</form>		
			<?php   }   ?>



<form action="resultat.php" method="post">

<?php
	if (isset($_POST["boutlvl"]))
	{ ?>


<h1>QCM A COMPLETER</h1>


<?php
$niveau = $_POST['niveau'];
$_SESSION['niveau'] = $niveau;
		$id = mysqli_connect ("localhost", "root", "","belle_table");
		mysqli_query($id,"SET NAMES 'utf8'");
		$req = "select * from question where niveau = $niveau ORDER BY RAND() limit 10";
		$res = mysqli_query($id, $req); 
while($ligne = mysqli_fetch_assoc($res)){
echo '<br><br>';
		echo '<b>'.$ligne["label"].":<b>"; 
		//echo '<span class="terme">'.$data['Terme']."</span>:".$data['Definition'];
?>
 <br><br><br>
<?php
		$id = mysqli_connect ("localhost", "root", "","belle_table");
		$req2 = "select * from reponse where idq = ".$ligne["id"]." ORDER BY RAND()";
		$res2 = mysqli_query($id, $req2);
while($ligne2 = mysqli_fetch_assoc($res2)){ ?>

<input type="radio" name="<?= $ligne2["idq"]; ?>" value="<?= $ligne2["verif"]; ?>" required> <?php echo $ligne2["reponse"]?> <br> <br>


<?php }}?>
<input type="submit" value="Envoyer"> <br><br><br>
<?php } }  ?>


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
</center>
</html>