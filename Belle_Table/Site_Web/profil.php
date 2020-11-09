<!DOCTYPE html>
<html>
<head>
	<?php session_start(); ?>
	<?php $page = "profil.php"; ?>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
	<title>Profil</title>

</head>

<center>
<body>
	<?php include("menu.php"); ?>
		<main style="background-image: url(images/image-1.jpg);">
			<br>
			<div style="background-color: #F0F0F0; width: 1190px; padding: 20px; ">
				<span class="msg-bvn">Bonjour 
					<strong><?php echo $_SESSION['prenom'] . " " . $_SESSION['nom']; ?></strong>
				</span>
				<div>
					<a href="parametre.php">Modifier mes information personnels</a>
				</div>
			</div>
			<br>
		</main>
	<?php include("footer.php"); ?>
</body>
</html>