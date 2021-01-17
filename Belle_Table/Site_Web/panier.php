<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
	<title>Panier</title>
	<?php 
		require_once('include/en-tete.php');
		$page = "panier.php"; 
		@$id = $_SESSION["id"] ;

		$req = "SELECT id_panier, panier.idproduit, panier.quantite, image, titre, description, prix FROM `panier`, produit, login WHERE panier.idproduit = produit.idproduit AND iduser = login.id AND iduser = '$id' GROUP BY idproduit";
		$res = mysqli_query($bdd, $req); 
		$i = 0;
	?>
</head>
<body>
	<center>
		<?php include("include/menu.php"); ?>
		<section id="possibilities">
			<h1>Mon Panier</h1>

			<a href="produits.php" class="button-4" style="margin-right: 1000px; text-decoration:none;">Nos Produits</a>

			<?php if(mysqli_num_rows($res) > 0): ?>
				<table width="40%" border="3" cellspacing="0" class="table_emploi">
					<tr bgcolor="silver">
						<th> Titre </th>
						<th> Prix </th>
						<th> Description </th>
						<th> Image </th>
						<th> Quantité </th>
						<th> Supprimer</th>
					</tr>

					<?php while($panier = mysqli_fetch_assoc($res)): ?>
						<tr>
							<td><?php echo $panier["titre"]; ?></td>
							<td><?php echo $panier["prix"]; ?></td>
							<td><?php echo $panier["description"]; ?></td>
							<td><img src="produits/<?php echo $panier["image"]; ?>" height="100px"	width="100px"></td>  
							<td><?php echo $panier['quantite']; ?> </td>
							<td> 
								<center>
									<a href="deletePanier.php?id=<?=$panier["id_panier"]?>">
										<img src="images/deleteicon.png" height="25px" width="25px"/>
									</a>
								</center>
							</td>
						</tr>
					<?php endwhile; ?>
				</table>
			<?php else: ?>
				<center>
					<span>Vous n'avez d'articles dans votre paniers !</span>
				</center>
			<?php endif; ?>
		</section>
	</center>
</body>
</html>