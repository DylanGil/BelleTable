<!DOCTYPE html>
<html>
<head>
	<title>QCM</title>
	<meta charset="UTF-8">
</head>
<body>
<center>
<form action="resultat.php" method="post">

<h1>Resultat</h1>




<?php
session_start();
		$login = $_SESSION["login"];
		$niveau = $_SESSION['niveau'];
$i = 1;
$total = 0;
$nbq = 0;
		$id = mysqli_connect ("localhost", "root", "","belle_table");

foreach ($_POST as $idq => $verif) {
?><br> <?php
		$req = "select * from reponse where idq = ".$idq." and verif = 1";
		$res = mysqli_query($id, $req); 
		$ligne = mysqli_fetch_assoc($res);
	if ($verif == 0) {
		echo "Question ".$i.": mauvaise réponse.  La bonne reponse était : ".$ligne["reponse"]."";
		$nbq++;
	} else if ($verif == 1) {
		echo "Question ".$i.": bonne réponse (".$ligne["reponse"].")";
		$nbq++;
		$total++;
	}
	
	$i++;
}
?> <br><br><br> <?php
echo "Vous avez un total de ".$total. " bonne réponse sur ".$nbq."";

			$req2 = "insert into resultat (login, note, niveau) values('$login', '$total', '$niveau')";
			$res2 = mysqli_query($id, $req2);	
?>

 <br><br><br>
</body>
</html>
