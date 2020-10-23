<!DOCTYPE html>
<html>
<head>
	<title>QCM</title>
	<meta charset="UTF-8">
</head>
<body>
<center>
<h1>ADD QUESTION</h1>


<form method="post" action="addQCM.php">
		Quel est votre question ? : <input type="text" name="question" required><br><br>

		Quel est le niveau de votre question ?
		<input type="radio" id="0" name="niveau" value="0" checked> <label for="0">0</label>
		<input type="radio" id="1" name="niveau" value="1"> <label for="1">1</label> <br> <br>

		Quel est votre bonne reponse ? : 		 <input type="text" name="bonnereponse" required><br><br>
		Quel est votre 1ere mauvaise reponse ? : <input type="text" name="mauvaisereponse1" required><br><br>
		Quel est votre 2eme mauvaise reponse ? : <input type="text" name="mauvaisereponse2" required><br><br>
		Quel est votre 3eme mauvaise reponse ? : <input type="text" name="mauvaisereponse3" required><br><br>
		<input type="submit" value="add Question" name="monbout">
	</form>

<?php
if (isset($_POST["monbout"]))
	{
//pour envoyer la question
$question= $_POST["question"];
$niveau= $_POST["niveau"];


		$id = mysqli_connect ("localhost", "root", "","belle_table");
		mysqli_query($id,"SET NAMES 'utf8'");
		$req = "insert into question (label, niveau) values('$question', '$niveau')";
		$res = mysqli_query($id, $req); 

// pour recuperer l'id de la question

		$req2 = "select * FROM question order by id desc limit 1";
		$res2 = mysqli_query($id, $req2); 
		$ligne = mysqli_fetch_assoc($res2);
		$idq = $ligne["id"];



//pour envoyer les reponses
$bonnereponse= $_POST["bonnereponse"];
$mauvaisereponse1= $_POST["mauvaisereponse1"];
$mauvaisereponse2= $_POST["mauvaisereponse2"];
$mauvaisereponse3= $_POST["mauvaisereponse3"];

		$req3 = "insert into reponse (idq, reponse, verif) values ('$idq', '$bonnereponse', '1'), ('$idq', '$mauvaisereponse1', '0'), ('$idq', '$mauvaisereponse2', '0'), ('$idq', '$mauvaisereponse3', '0')";
		echo $req3;
		$res3 = mysqli_query($id, $req3);
		echo mysqli_error($id); // tres util, donne l'erreur relier a mysql
		} ?>
</center>
</body>
</html>
