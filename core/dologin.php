<?php
	require("dbc.php");

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$errors = "";
		if(!empty($_POST["gebruiker"])) {
			$gebruiker = $_POST["gebruiker"];
		} else {
			$errors = "stop";
			echo"Vul uw gebruikersnaam in <br />";
		}
		if(!empty($_POST["wachtwoord"])) {
			$wachtwoord = sha1($_POST["wachtwoord"]);
		} else {
			$errors = "stop";
			echo"Vul uw wachtwoord in <br />";
		}

		if($errors == ""){
			$sql = "SELECT * FROM gebruikers WHERE gebruikersnaam = '$gebruiker'";
			$result = $dbc->query($sql);
			$row = mysqli_fetch_assoc($result);

			if($gebruiker != $row["gebruikersnaam"]) {
				echo("Verkeerde gebruikersnaam");
			} else if($wachtwoord != $row["wachtwoord"]) {
				echo("Verkeerd wachtwoord");
			} else {
				session_start();
				$_SESSION["gebruiker"] = $gebruiker;
				echo("U bent nu ingelogt");
			}
		}
	}
?>