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
	
	$id =$_GET["id"];


 
$req = "DELETE FROM `favoriss` where `id_panier` = $id";
$res2 = mysqli_query($bdd,$req); 
header("location:panier.php");
?>

</body>
</html>