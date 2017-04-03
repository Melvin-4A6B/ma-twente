<?php
	session_start();
	session_unset($_SESSION["gebruiker"]);
	header("Location: http://ma-twente.16mb.com/index.php");
?>