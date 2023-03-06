<?php
// This is the logout page for the site.

require_once ('config.php'); 
$page_title = 'Logout';
include ('header.html');

session_start();
$name = '';
// If no session variable exists, redirect the user:
if (!isset($_SESSION['user_id'])) {

	$url = BASE_URL; 
	header("Location: $url");
	exit(); // Quit the script.
	
} else { // Log the user out
    $name = htmlspecialchars($_SESSION['name']);
	$_SESSION = array(); // Destroy the variables.
	//setcookie (session_name(), '', time()-3600); // Destroy the cookie.
	session_destroy(); // Destroy the session itself and all its data.

}

// Print a customized message:
echo '<h3>You are now logged out, ' . $name . '</h3>';

include ('footer.html');
?>
