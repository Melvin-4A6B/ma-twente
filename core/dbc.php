<?php
	$host = "mysql.hostinger.nl";
	$username = "u540163247_admin";
	$password = "ma-twente1011";
	$dbname = "u540163247_mat";
	$dbc = mysqli_connect($host, $username, $password, $dbname);

	if(mysqli_connect_errno()) {
	  echo("Failed to connect to the database: " . mysqli_connect_error());
	}
?>