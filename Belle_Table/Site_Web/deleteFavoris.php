<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>FormulaireSpecialte</title>
	<?php include('include/en-tete.php'); ?>
</head>
<body>
<center>

	
	<?php 
	
	//$email = $_SESSION["email"] ;
	$idannonce =$_GET["idannonce"];
	// $titre =$_GET["titre"];
	// $prix =$_GET["prix"];
	// $description =$_GET["description"];
	// $image =$_GET["image"];

 
$req = "DELETE FROM `favoriss` where `idannonce` = $idannonce";
$res2 = mysqli_query($bdd,$req); 
header("location:favoris.php");
?>

</body>
</html>