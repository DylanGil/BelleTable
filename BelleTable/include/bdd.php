<?php 
	if($_SERVER['HTTP_HOST']=="localhost") // si le site est en localhost alors se connecter a cette base de données
	{
		$bdd = mysqli_connect ("localhost", "root", "","belle_table");
	} 
	else // sinon se connecter a la base de données en ligne
	{
		$bdd = mysqli_connect("localhost", "mdhaamlh", "Bal4o15@","BelleTable");
	}
?>