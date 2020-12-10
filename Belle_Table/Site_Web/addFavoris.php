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
	
	$email = $_SESSION["email"] ;
	$idannonce =$_GET["idannonce"];
	$titre =$_GET["titre"];
	$prix =$_GET["prix"];
	$description =$_GET["description"];
	$image =$_GET["image"];
	//$quantite = $_GET["quantite"];


$req = "INSERT INTO `favoriss`(`idannonce`, `iduser`, `titre`, `prix`, `description`, `image`) VALUES ($idannonce,'$email','$titre',$prix,'$description','$image')";
$res = mysqli_query($bdd,$req); 
header("location:favoris.php");
?>

</body>
</html>