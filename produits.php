<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="produits.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
	<title>produit</title>
	
	<?php 
		require_once('include/en-tete.php');
		
		$page = "produits.php";
		
		$req = mysqli_query($bdd, "SELECT * FROM produit ORDER BY idproduit"); 

		@$id = mysqli_real_escape_string($bdd, htmlspecialchars($_GET['id'])); 
		
		if(@$_GET['action']=="delete" && @$_SESSION['admin']==1)
	      {
	        mysqli_query($bdd, "DELETE FROM produit WHERE idproduit = '$id'");
	     	header('location:produits.php');
	      } 
	    if(isset($_POST['monBouton']))
	    {
	    	$critere = $_POST['filtreSearch'];		
			$search =$_POST["search"];
			$tri =$_POST["tri"];
			$req = mysqli_query($bdd, "SELECT * FROM produit where $critere like '%$search%' order by $critere $tri");
	    }
    ?>

</head>
<body>
	<?php include("include/menu.php"); ?>

	<section id="possibilities">
		<div align="center">
			<h1>Nos Produits</h1>
			<br>
			<a href="panier.php" class="button-4" style="text-decoration:none;">Mon Panier <i class="fas fa-shopping-cart"></i></a>

			<form action="produits.php" method="POST">
				<label for="search">Rechercher:</label>
				<input type="text" id="search" name="search"> 
				<br><br>
				
				<label for="filtreSearch">Par : </label>
				<select name="filtreSearch" id="filtreSearch" class="select">
					<option value = "titre" selected>Titre </option>
					<option value = "prix">Prix </option>
					<option value = "description">Description </option>
				</select> <br><br> 
				<div>
					Tri :
				  	<input type="radio" name="tri" value="ASC"checked>
				  	<label>Croissant</label>
				  	<input type="radio" name="tri" value="DESC">
				  	<label>Decroissant</label>
				</div>
				<br>
				<input type="submit" class="button-4" value="Envoyer" name="monBouton"> <br><br><br>
			</form>

			<div class="content-product">
				<?php $i = 0; ?>
				<?php while($produit = mysqli_fetch_assoc($req)): ?>
					<style type="text/css">
						.hide-panier<?php echo $i; ?> {display: none; }
						.liste-quantite {background: #ff7a00; display: flex; flex-direction: column; border-radius: 12px; margin: inherit; padding: 10px;   }
						.quantite {border: 0px; margin: 6px 0px;}
					</style>
					<script type="text/javascript">
					    $(document).ready(function() {
					    $('.logo-panier<?php echo $i; ?>').click(function() {
					      $('.hide-panier<?php echo $i; ?>').toggleClass('liste-quantite');
					    });
					  });
					</script>
					<div class="product-card">
						<a href="afficher-produit.php?p=<?php echo $produit['idproduit']; ?>">
							<div class="product-tumb">
								<img src="produits/<?php echo $produit['image']; ?>" alt="">
							</div>
							<div class="product-details">
								<h4><a href="afficher-produit.php?p=<?php echo $produit['idproduit']; ?>"><?php echo $produit['titre']; ?></a></h4>
								<p><?php echo $produit['description']; ?></p>
								<div class="product-bottom-details">
									<div class="product-price">
										<?php if(isset($produit['old_prix'])): ?>
											<small><?php echo $produit['old_prix']; ?>€</small>
										<?php endif; ?>
										<?php echo $produit['prix']; ?>€
									</div>
									<div class="product-links">
										<?php $idproduit = mysqli_real_escape_string($bdd, htmlspecialchars($produit['idproduit'])); ?>
										<i class="fa fa-shopping-cart logo-panier<?php echo $i; ?>"></i>
									</div>
								</div>
								<form method="POST" action="addPanier.php?idProduit=<?php echo $idproduit ?>" class="hide-panier<?php echo $i; ?>">
									<?php if(isset($_SESSION['email'])): ?>
										<label for="quantite" style="color: white;">Quantité</label>
										<input type="number" min="1" value="1" id="quantite" name="quantite" class="quantite">
										<input type="submit" name="submit" value="Ajouter au panier" style="background-color: white; color: orange; border: 2px solid white;">
									<?php else: ?>
										<a href="inscription.php" style="color: white;">Connecter vous afin de pouvoir ajouter du contenue a votre panier</a>
									<?php endif; ?>
								</form>
							</div>
						</a>
					</div>
					<?php $i++; ?>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
</body>
</html>
