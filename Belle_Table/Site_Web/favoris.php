<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
	<title>Panier</title>
</head>
<body>
<center>
	<?php session_start();
	$email = $_SESSION["email"] ;
	include("menu.php");
	?>
	<section id="possibilities">
<h1>Mon Panier</h1>

<a href="produits.php" style="margin-right: 1000px; text-decoration:none;">Nos Produits</a>

<center>
		<table width="40%" border="3" cellspacing="0">
	<tr bgcolor="silver">
		<th> Titre </th>
		<th> Prix </th>
		<th> Description </th>
		<th> Image </th>
		<th> Quantité </th>
	</tr>

	<?php
		$id = mysqli_connect ("localhost", "root", "","favoris");
		$req = "select * from favoriss where iduser = '$email'";
		$res = mysqli_query($id, $req); 
		$i = 0;
while($ligne = mysqli_fetch_assoc($res)){
?>
<tr <?php if ($i%2 == 0) echo "bgcolor='green'";?>>
	<td><?=$ligne["titre"]; ?></td>
	<td><?=$ligne["prix"]; ?></td>
	<td><?=$ligne["description"]; ?></td>
	<td><img src="<?=$ligne["image"]; ?>" height="100px"	width="100px"></td>  
	<td><select name = "quantiteSelect">
		<option value = "un" selected>1
		<option value = "deux">2
		<option value = "trois">3
		<option value = "quatre">4
		<option value = "cinq">5
		</select> <br><br> </td>
	<td> <a href="deleteFavoris.php?idannonce=<?=$ligne["idannonce"]?>"><img src="images/deleteicon.png"
				height="25px"	
				width="25px"/></a></td>
</tr>


<?php 
$i++;
}
echo"</table>";?>
</section>