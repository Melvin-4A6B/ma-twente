<?php
	require("dbc.php");
	require("init.php");
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST["submit"])) {
			$errors = array();
			if(!empty($_POST["gebruiker"])) {
				$gebruiker = $_POST["gebruiker"];
			} else {
				$errors[] = "Vul uw gebruikersnaam in";
			}
			if(!empty($_POST["wachtwoord"])) {
				$wachtwoord = md5($_POST["wachtwoord"]);
			} else {
				$errors[] = "Vul uw wachtwoord in";
			}
		
			$sql = "SELECT * FROM gebruikers WHERE gebruikersnaam = '$gebruiker'";
			$result = $dbc->query($sql);
			$row = mysqli_fetch_assoc($result);

			if($gebruiker != $row["gebruikersnaam"]) {
				$errors[] = "Verkeerde gebruikersnaam";
			} else if($wachtwoord != md5($row["wachtwoord"])) {
				$errors[] = "Verkeerd wachtwoord";
			} else {
				session_start();
				$_SESSION["gebruiker"] = $gebruiker;
				header("Location: ../home.php");
			}
		}
	}
?>