<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
	<title>Annonce</title>
	<?php 
		require_once('include/en-tete.php');
		$page = "produits.php";
		$email = $_SESSION["email"];
	?>
</head>
<body>
<center>
	<?php include("include/menu.php"); ?>
	<section id="possibilities">
<h1>Nos Produits</h1>
<!-- Ici c pour la recherche du medecins specialité ou service, le tableau apparait que lorsque le bouton est appuyer -->

<a href="favoris.php" style="margin-left: 1000px; text-decoration:none;">Mon Panier</a>

<form action="produits.php" method="post">
		Rechercher: <input type="text" name="search"> 
		Par : <select name = "filtreSearch">
		<option value = "titre" selected>Titre
		<option value = "prix">Prix
		<option value = "description">Description
		</select> <br><br> 
			<div>
			 Tri: 
			  <input type="radio" name="tri" value="ASC"checked>
			  <label>Croissant</label>
			  <input type="radio" name="tri" value="DESC">
			  <label>Decroissant</label>
			</div>

			<input type="submit" value="Envoyer" name="monBouton"> <br><br><br>

<?php
	if (isset($_POST["monBouton"]))
	{	
		?><center>
		<table width="45%" border="3" cellspacing="0">
	<tr bgcolor="silver">
		<th> Titre </th>
		<th> Prix </th>
		<th> Description </th>
		<th> Image </th>
		<th> Quantité </th>
	</tr>

	<?php
		$critere = $_POST["filtreSearch"];;		
		$search =$_POST["search"];
		$tri =$_POST["tri"];
		$req = "select * from annonce where $critere like '%$search%' order by titre $tri";
		$res = mysqli_query($bdd, $req); 
		$i = 0;
while($ligne = mysqli_fetch_assoc($res)){
?>
<tr <?php if ($i%2 == 0) echo "bgcolor='green'";?>>
	<td><?=$ligne["titre"]; ?></td>
	<td><?=$ligne["prix"]; ?></td>
	<td><?=$ligne["description"]; ?></td>
	<td><img src="<?=$ligne["image"]; ?>" height="100px" width="100px"></td>  
	<td><select name = "quantiteSelect">
		<option value = "un" selected>1
		<option value = "deux">2
		<option value = "trois">3
		<option value = "quatre">4
		<option value = "cinq">5
		</select> <br><br> </td>
	<td> <a href="addFavoris.php?idannonce=<?=$ligne["idannonce"]?>&titre=<?=$ligne["titre"]?>&prix=<?=$ligne["prix"]?>&description=<?=$ligne["description"]?>&image=<?=$ligne["image"]?>"><img src="images/panier.png"
				height="25px"	
				width="25px"/></a></td>
</tr>


<?php 
$i++;
}
echo"</table>";
}?>

<?php
	if (!isset($_POST["monBouton"]))
	{ ?>
<table width="45%" border="3" cellspacing="0">
	<tr bgcolor="silver">
		<th> Titre </th>
		<th> Prix </th>
		<th> Description </th>
		<th> Image </th>
		<th> Quantité </th>
	</tr>

<?php 
		$req = "SELECT * FROM `annonce` ORDER BY titre ASC";
$res = mysqli_query($bdd,$req);
$i = 0;
while($ligne = mysqli_fetch_assoc($res)){
?>
<tr <?php if ($i%2 == 0) echo "bgcolor='green'";?>>
	<td><?=$ligne["titre"]; ?></td>
	<td><?=$ligne["prix"]; ?></td>
	<td><?=$ligne["description"]; ?></td> 
	<td><img src="<?=$ligne["image"]; ?>" height="100px" width="100px"></td>
	<td><select name = "quantiteSelect">
		<option value = "un" selected>1
		<option value = "deux">2
		<option value = "trois">3
		<option value = "quatre">4
		<option value = "cinq">5
		</select> <br><br> </td>
	<td> <a href="addFavoris.php?idannonce=<?=$ligne["idannonce"]?>&titre=<?=$ligne["titre"]?>&prix=<?=$ligne["prix"]?>&description=<?=$ligne["description"]?>&image=<?=$ligne["image"]?>"><img src="images/panier.png"
				height="25px"	
				width="25px"/></a></td>
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
