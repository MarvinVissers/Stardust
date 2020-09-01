<?php
	//connectie maken met de catabase
	$host = "localhost";
	$gebruiker = "root";
	$wachtwoord = "";
	$dbnaam = "stardust";

	$con = new PDO("mysql: host=$host; dbname=$dbnaam;",$gebruiker, $wachtwoord);
?>