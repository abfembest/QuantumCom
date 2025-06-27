<?php session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	$_SESSION["status"] = "You have to log on.";
	header('Location: ../../home.php');
	exit;
}

?>