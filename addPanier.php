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
			$idProduit = mysqli_real_escape_string($bdd, htmlspecialchars($_GET["idProduit"]));
			$quantite = mysqli_real_escape_string($bdd, htmlspecialchars($_POST["quantite"]));
			$verif = mysqli_query($bdd, "SELECT * FROM panier WHERE idproduit = '$idProduit' AND iduser = '$id' ");
			if(mysqli_num_rows($verif) > 0)
			{
				$nbQuantite = mysqli_fetch_array($verif);
				$ajoutQuantite = $nbQuantite['quantite'] + $quantite;
				$req = mysqli_query($bdd, "UPDATE panier SET quantite = '$ajoutQuantite' WHERE idproduit = '$idProduit'");
			}
			else
			{
				$req = "INSERT INTO `panier`(idproduit, iduser, quantite) VALUES ($idProduit, $id, $quantite)";
				$res = mysqli_query($bdd,$req); 
			}

			header("location:panier.php");
			
		?>

	</body>
	</html>
<?php else: ?>
	<?php header('location:produits.php'); ?>
<?php endif ?>