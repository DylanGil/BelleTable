<?php
session_start();
		$login = $_SESSION["login"];
	if (!isset($_POST["boutlvl"]))
	{	?>
<center>
<form method="post" action="pageprive.php">
		<b> Choisir votre difficulté:</b> <br><br>Debutant<input type="radio" name="niveau" value="0"> <br>
		Expert							<input type="radio" name="niveau" value="1" checked> <br> <br>
		<input type="submit" value="Choisir" name="boutlvl">
	</form>		
	<?php   }   ?>



<!DOCTYPE html>
<html>
<head>
	<title>QCM</title>
	<meta charset="UTF-8">
</head>
<body>
<form action="resultat.php" method="post">

<?php
	if (isset($_POST["boutlvl"]))
	{ ?>


<center>

<h1>QCM A COMPLETER</h1>


<?php
$niveau = $_POST['niveau'];
$_SESSION['niveau'] = $niveau;
		$id = mysqli_connect ("localhost", "root", "","belle_table");
		mysqli_query($id,"SET NAMES 'utf8'");
		$req = "select * from question where niveau = $niveau ORDER BY RAND() limit 10";
		$res = mysqli_query($id, $req); 
while($ligne = mysqli_fetch_assoc($res)){
echo '<br><br>';
		echo '<b>'.$ligne["label"].":<b>"; 
		//echo '<span class="terme">'.$data['Terme']."</span>:".$data['Definition'];
?>
 <br><br><br>
<?php
		$id = mysqli_connect ("localhost", "root", "","belle_table");
		$req2 = "select * from reponse where idq = ".$ligne["id"];
		$res2 = mysqli_query($id, $req2);
while($ligne2 = mysqli_fetch_assoc($res2)){ ?>

<input type="radio" name="<?= $ligne2["idq"]; ?>" value="<?= $ligne2["verif"]; ?>" required> <?php echo $ligne2["reponse"]?> <br> <br>


<?php }}?>
<input type="submit" value="Envoyer"> <br><br><br>
<?php }  ?>
</center>
</body>
</html>
