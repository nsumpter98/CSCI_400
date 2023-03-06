<?php
// This is the main page for the site.

// Include the configuration file:
require_once ('config.php'); 

// Set the page title and include the HTML header:
$page_title = 'Welcome to this Site!';
include ('header.html');

// Welcome the user (by name if they are logged in):
session_start();
echo '<h1>Welcome';
if (isset($_SESSION['user_id'])) {
	$name = htmlspecialchars($_SESSION['name']);
	echo ", $name!";
}
echo '</h1>';
?>
<p>Spam spam spam spam spam spam
spam spam spam spam spam spam 
spam spam spam spam spam spam 
spam spam spam spam spam spam.</p>
<p>Spam spam spam spam spam spam
spam spam spam spam spam spam 
spam spam spam spam spam spam 
spam spam spam spam spam spam.</p>

<?php // Include the HTML footer file:
include ('footer.html');
?>
