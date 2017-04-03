<?php
	require 'dbc.php';
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST["submit"])) {
			$gebruiker = $_POST["gebruiker"];
			$wachtwoord = md5($_POST["wachtwoord"]);
			$sql = "SELECT * FROM gebruikers WHERE gebruikersnaam = '$gebruiker'";
			$result = $dbc->query($sql);
			$row = mysqli_fetch_assoc($result);

			if($gebruiker != $row["gebruikersnaam"]) {
				echo "Verkeerde gebruikersnaam";
			} else if($wachtwoord != $row["wachtwoord"]) {
				echo "Verkeerd wachtwoord";
			} else {
				session_start();
				$gebruiker = $_SESSION["gebruiker"];
				header("Location: http://localhost/ma-twente/home.php");
			}
		}
	}
?>