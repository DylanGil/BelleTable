<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
	<title>Formulaire</title>

	<?php 
		$page = "offre.php";

		require_once('include/en-tete.php');

		$idemail = $_SESSION["email"] ;
	?>

</head>
<body>
<center>
<?php include("include/menu.php"); ?>
<section id="possibilities">
<h1>Annonce en ligne</h1>
<!-- Ici c pour la recherche du medecins specialité ou service, le tableau apparait que lorsque le bouton est appuyer -->


<form action="emploi.php" method="post">
		Rechercher: <input type="text" name="search"><br><br> 
			<div>
			 Tri: <input type="radio" name="tri" value="ASC"
			         checked>
			  <label>Croissant</label>
			  <input type="radio" name="tri" value="DESC">
			  <label>Decroissant</label>
			</div>
</br>
			<input type="submit" value="Envoyer" name="monBouton" class="button-4"> <br><br><br>

<?php
	if (isset($_POST["monBouton"]))
	{	
		?><center>
		<table class="table_emploi">
	<tr>
		<th> Titre </th>
		<th> Description </th>
	</tr>

	<?php
		$critere = "libelle";		
		$search =$_POST["search"];
		$tri =$_POST["tri"];
		$req = "select * from emploi where libelle like '%$search%' order by libelle $tri";
		$res = mysqli_query($bdd, $req); 
		$i = 0;
while($ligne = mysqli_fetch_assoc($res)){
?>
<tr <?php if ($i%2 == 0) echo "bgcolor='green'";?>>
	<td><?=$ligne["libelle"]; ?></td>
	<td><?=$ligne["description"]; ?></td>
</tr>


<?php 
$i++;
}
echo"</table>";
}?>



<?php
	if (!isset($_POST["monBouton"]))
	{ ?>
	<!--table width="45%" border="3" cellspacing="0"-->
		<table class="table_emploi">
		<!--tr bgcolor="silver"-->
			<tr>
			<th> Titre </th>
			<th> Description </th>
		</tr>

		<?php 
			$req = "select noteqcm from login where email = '$idemail'";
			$res= mysqli_query($bdd,$req);
			while($lignenoteqcm = mysqli_fetch_assoc($res))
			{
				$noteqcm = $lignenoteqcm["noteqcm"];
			}
			$req2 = "SELECT * FROM emploi WHERE note <= '$noteqcm'";
			$res2 = mysqli_query($bdd,$req2);
			$i = 0;
			while($ligne = mysqli_fetch_assoc($res2))
			{ ?>
				<tr <?php if ($i%2 == 0) echo "bgcolor=#FFFFFF";?>>
					<td><?=$ligne["libelle"]; ?></td>
					<td><?=$ligne["description"]; ?></td> 
					<!-- td> <a href="addPanier.php?idannonce=<?=$ligne["idannonce"]?>&titre=<?=$ligne["titre"]?>&prix=<?=$ligne["prix"]?>&description=<?=$ligne["description"]?>&image=<?=$ligne["image"]?>"><img src="favicon.png"
								height="25px"	
								width="25px"/></a>/td-->
				</tr>
				<?php 
				$i++;
			}

			 /*while($ligne = mysqli_fetch_assoc($res)){
				echo "<tr><td>".$ligne["nom"]."</td>
					  <td>".$ligne["prenom"]."</td>
					  <td> ".$ligne["specialite"]."</td></tr>";
			} */
		?>

	</table>
<?php } ?>

</section>

