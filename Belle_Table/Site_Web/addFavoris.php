<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>FormulaireSpecialte</title>
</head>
<body>
<center>

	
	<?php 
	 session_start();
	$email = $_SESSION["email"] ;
	$idannonce =$_GET["idannonce"];
	$titre =$_GET["titre"];
	$prix =$_GET["prix"];
	$description =$_GET["description"];
	$image =$_GET["image"];
	//$quantite = $_GET["quantite"];


$id = mysqli_connect ("localhost", "root", "","favoris"); 
$req = "INSERT INTO `favoriss`(`idannonce`, `iduser`, `titre`, `prix`, `description`, `image`) VALUES ($idannonce,'$email','$titre',$prix,'$description','$image')";
$res = mysqli_query($id,$req); 
header("location:favoris.php");
?>

</body>
</html>