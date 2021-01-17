<?php session_start(); ?>
<?php if (isset($_SESSION['id'])): ?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>Ajouter au panier</title>
	</head>
	<body>
		<?php include('include/en-tete.php'); ?>	
		<?php 
			
			$id = $_SESSION["id"] ;
			$idproduit = mysqli_real_escape_string($bdd, htmlspecialchars($_GET["idProduit"]));
			$quantite = mysqli_real_escape_string($bdd, htmlspecialchars($_POST["quantite"]));

			$req = "INSERT INTO `panier`(idproduit, iduser, quantite) VALUES ($idproduit, $id, $quantite)";
			$res = mysqli_query($bdd,$req); 
			header("location:panier.php");
		?>

	</body>
	</html>
<?php else: ?>
	<?php header('location:produits.php'); ?>
<?php endif ?>