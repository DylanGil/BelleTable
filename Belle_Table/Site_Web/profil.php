<?php session_start(); ?>
<?php if(isset($_SESSION['email'])): ?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
		<title>Profil de <?php echo $_SESSION['prenom'] . " " . $_SESSION['nom']; ?></title>

		<?php 
		
			$page = "profil.php"; 

			require_once('include/en-tete.php');

		 	@$email = $_SESSION['email'];

		 	$query = mysqli_query($bdd, "SELECT * FROM favoriss WHERE iduser = '$email'");

		 	$query2 = mysqli_query($bdd, "SELECT * FROM login WHERE email = '$email' AND noteqcm IS NOT NULL"); 

		?>

		<script type="text/javascript">
		    $(document).ready(function() 
		    {
		    	$('.box-panier').click(function() 
		    	{
		      		$('.body-box-panier').toggleClass('show');
		      		$('.header-box-panier').toggleClass('round');
		    	});

		    	$('.box-commande').click(function() 
		    	{
		      		$('.body-box-commande').toggleClass('show');
		      		$('.header-box-commande').toggleClass('round');
		    	});

		    	$('.box-note').click(function() 
		    	{
		      		$('.body-box-note').toggleClass('show');
		      		$('.header-box-note').toggleClass('round');
		    	});
		  	});
		</script>

		<style type="text/css">
			.body-box{display: none;}
			.show{display: block;}
		</style>

	</head>

	<body>
		<?php include("include/menu.php"); ?>

		<main style="background-image: url(images/image-1.jpg);" >
			<br><br>
			<center>
				<div style="background-color: #F0F0F0; width: 1190px; padding: 20px; ">
					<span class="msg-bvn">Mon compte</span>
					<br><br>
					<div class="column">

						<div class="content-box">
							<div class="box box-panier">
								<div class="header-box header-box-panier">
									<i class="fas fa-shopping-basket"></i> Mon panier
								</div>
								<div class="body-box body-box-panier <?php if(mysqli_num_rows($query) > 0): ?> height-box <?php endif; ?> ">
									<ul class="liste-panier">
										<?php if(mysqli_num_rows($query) > 0): ?>
											<?php while ($panier = mysqli_fetch_assoc($query)): ?>
												<li><a href="panier.php"><?php echo $panier['titre'] . " " . $panier['prix'] . "€"; ?></a></li>
											<?php endwhile; ?>
										<?php else: ?>
											<li>Panier vide</li>
										<?php endif; ?>
									</ul>
								</div>
							</div>
							<div>
								<a href="parametre.php" class="settings-btn"><i class="fas fa-pencil-alt"></i> Modifier mes information personnels</a>
							</div>

							<div class="box box-commande">
								<div class="header-box header-box-commande">
									<i class="fas fa-box"></i> Mes commandes
								</div>
								<div class="body-box body-box-commande <?php if(mysqli_num_rows($query) > 0): ?> height-box <?php endif; ?> ">
									<ul class="liste-commande">
										<li>Aucune commande</li>
									</ul>
								</div>
							</div>

						</div>

						<div class="content-box">

							<div class="box box-note">
								<div class="header-box header-box-note">
									<i class="fas fa-star"></i> Ma note au QCM
								</div>
								<div class="body-box body-box-note <?php if(mysqli_num_rows($query) > 0): ?> height-box <?php endif; ?> ">
									<ul class="liste-note">
										<?php if(mysqli_num_rows($query2) > 0): ?>
											<?php while ($qcm = mysqli_fetch_assoc($query2)): ?>
												<li><a href="panier.php"><?php echo $qcm['noteqcm'] . " / 20"; ?></a></li>
											<?php endwhile; ?>
										<?php else: ?>
											<li>Vous n'avez pas fait de QCM rendez vous sur <a href="offre.php" style="color: #007BFF; font-weight: bold;">cette page</a></li>
										<?php endif; ?>
									</ul>
								</div>
							</div>
							
							<div>
								<a href="emploi.php" class="settings-btn"><i class="fas fa-user-hard-hat"></i> Nos offres d'emplois</a>
							</div>

							<div>
								<a href="?infos=<?php echo $page; ?>&deconnecter=1" class="settings-btn"><i class="fas fa-power-off"></i> Se déconnecter</a>
							</div>			
						</div>
						<?php if($_SESSION['admin']==1): ?>
							<div>
								<a href="admin" class="btn-admin"><i class="fas fa-shield-alt"></i> Panel admin</a>
							</div>
						<?php endif; ?>
					</div>

				</div>

				<br>
			</center>		
		</main>
		<?php include("include/footer.php"); ?>
	</body>
	</html>
<?php else: ?>
	<?php header('location: index.php'); ?>
<?php endif; ?>