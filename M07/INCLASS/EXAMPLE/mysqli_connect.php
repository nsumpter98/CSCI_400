<?php

// This file contains the database access information. 
// This file also estables a connection to MySQL 

// Set the database access information as constants:

$dbHost = 'localhost';//use localhost on both AMPPS and Turing. 
$dbUser = 'root'; //use root on AMPPS
$dbPassword = 'mysql';//use empty string on AMPPS or your password if you have one
$dbName = 'users';//use your database name on AMPPS

//Make the connection:
$dbConnection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

//Check the status of the connection:
if ($dbConnection->connect_error) {
	die( "Could not connect to the database server: " . 
		$dbConnection->connect_error  . " " . $dbConnection->connect_errno .
			"</body></html>" );
} 

?>
