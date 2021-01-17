<?php session_start(); ?>
<?php if(isset($_GET['p']) && !empty($_GET['p']) && is_numeric($_GET['p'])): ?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="produits.css">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
		<title>produit</title>
		
		<?php 
			require_once('include/en-tete.php');
			$page = "produits.php";

			@$id = mysqli_real_escape_string($bdd, htmlspecialchars($_GET['p'])); 
			$req = mysqli_query($bdd, "SELECT * FROM produit WHERE idproduit = $id ORDER BY idproduit"); 
			$produit = mysqli_fetch_array($req);
		?>
	</head>

	<body>
		<?php include("include/menu.php"); ?>

		<section id="possibilities">
			<div class="fiche-produit">
	          <div class="content-fiche">
	            <div class="fiche-col-1">
	              <div class="fiche-img">
	                <img src="produits/<?php echo $produit['image']; ?>" class="img-responsive">            
	              </div>
	              	<div class="fiche-btn">
	              		<?php if(@$_SESSION['admin']==1): ?>
	                		<a href="admin/produits.php?action=edit&id=<?php echo $produit['idproduit']; ?>" class="button-4 btn-edit">Modifier</a>
	               			<a href="produits.php?action=delete&id=<?php echo $produit["idproduit"]; ?>" class="button-4 btn-edit">Supprimer</a>
	          	  		<?php endif; ?>
	          	  			<a href="produits.php" class="button-4 btn-edit">Retourner sur la page</a>
	              	</div>
	            </div>
	  
	            <div class="fiche-col-2"> 
	              <div style="background-color: #FAFAFA;" align="center">
	                <span style="font-size: 24px; font-weight: bold;"> <?php echo $produit['titre']; ?></span>
	              </div>
	              
	              <div style="display: flex; flex-direction: column;" align="center">
	            	<span class="info-produit">Description : </span>
	               
                	<span class="donnee-produit">
                		<i class="fas fa-quote-left"></i> 
                			<?php echo $produit['description']; ?> 
                		<i class="fas fa-quote-right"></i>
                	</span>
	              
	              </div>
	              
	              <div style="background-color: #FAFAFA;" align="center">
	                <span style="font-size: 24px; font-weight: bold;"><?php echo $produit['prix']; ?>€ </span>
	              </div>
	              
	              <div align="center">
					<form method="POST" action="addPanier.php?p=<?php echo $id; ?>&idProduit=<?php echo $id; ?>" style="margin: inherit;">
						<label for="quantite">Quantité :</label><br>
						<input type="number" class="quantite" id="quantite" title="veuillez sélectionner une valeur supérieur ou égale à 1" name="quantite" value="1"><br>
						<label for="submit" class="button-4 btn-edit">Ajouter au panier <i class="fa fa-shopping-cart logo-panier"></i></label>
						<input type="submit" id="submit" hidden="" >
					</form>	              	
	              </div>
	                
	            </div>
	          </div>
        	</div>
		</section>
	</body>
	</html>
<?php else: ?>
	<?php header('location:produits.php'); ?>
<?php endif; ?>
