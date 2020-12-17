<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>FormulaireSpecialte</title>
</head>
<body>
<?php include('include/en-tete.php'); ?>
<center>	
	<?php 
	
	$id = $_SESSION["id"] ;
	$idannonce = $_GET["idannonce"];
	//$quantite = $_GET["quantite"];


$req = "INSERT INTO `favoriss`(`idannonce`, `iduser`) VALUES ($idannonce, $id)";
$res = mysqli_query($bdd,$req); 
header("location:panier.php");
?>

</body>
</html>