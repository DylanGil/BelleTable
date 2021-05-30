<?php 
	if($_SERVER['HTTP_HOST']=="localhost")
	{
		$bdd = mysqli_connect ("localhost", "root", "","belle_table");
	}
	else
	{
		$bdd = mysqli_connect("localhost", "ndd", "NathanSuperieureurDylan123","belle_table");
	}
?>