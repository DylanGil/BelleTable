<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
    $('.compte').click(function() {
      $('.sous-menu').toggleClass('visible');
    });
  });
 </script>

<style type="text/css"> 
	.sous-menu {display: none; z-index: 999; position: relative; left: 12px;} 
	.visible {display: flex; justify-content: flex-end;} 
	.sous-menu li {padding: 7px 0; margin-left: 10px; text-align: left;}
	.sous-menu li:hover {background-color: red;}
	.ulsm {background: #ff7a00; display: flex; flex-direction: column; border-radius: 12px;}
	.ulsm li a {color: white;}
</style>

<header>
	<div class="wrapper Header" >
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
				if (isset($_SESSION['email'])): ?>
					<li class="compte">
						<a href="#">Mon Compte</a>
					</li>

					<div class="sous-menu">
						<ul class="ulsm">
							<li>
								<a  style="color: white;" href="#">Mon Profil</a>
							</li>

							<?php if ($_SESSION['admin']==1): ?> 
								<li>
									<a href="admin">Panel Admin</a>
								</li> 
							<?php endif; ?>
							<span class="line"></span>
							<li>
								<a href="?infos=<?php echo $page; ?>&deconnecter=1">Se deconnecter</a>
							</li>
						</ul>	
					</div>

				<?php endif; ?>

				<?php
					if(isset($_GET['deconnecter']) && $_GET['deconnecter']==1)
					{
						$info = $_GET["infos"]; // permet de recuperer l'info ecrit dans l'url a chaque page
						$redirect = "location:".$info; // permet de concatainer tout
						session_destroy();
						header($redirect); // je redirige vers la page ou le user était avant de se déconnecter
					}	
				?>
			</ul>
		</nav>

	</div>
</header>