<?php
	session_start();
	session_destroy();
	header("Location: http://localhost/ma-twente/index.php");
?>	