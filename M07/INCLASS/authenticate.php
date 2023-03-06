<?php // authenticate.php

  //authenticate.php: authenticates users who are stored in the database using file setupusers.php
  require_once 'login.php';
  
  //Connect to MySQL Server: create a new object named $pdo
  try {
	  $pdo = new PDO($dsn, $dbUser, $dbPassword);
  }
  catch (PDOException $e){
	die("Fatal Error - Could not connect to the database" . "</body></html>" );
  }

  if (isset($_SERVER['PHP_AUTH_USER']) &&
      isset($_SERVER['PHP_AUTH_PW'])) {
    
	$un_temp = sanitise($pdo, 'bsmith');
    $pw_temp = sanitise($pdo, 'mysecret');
    $query   = "SELECT * FROM users WHERE username=$un_temp";
    $result  = $pdo->query($query);

    if (!$result->rowCount()) 
		die("User not found");
	
	$row = $result->fetch();
    $fn  = $row['forename'];
    $sn  = $row['surname'];
    $un  = $row['username'];
    $pw  = $row['password'];

    //Password verify(): verifies that a password matches a hash. $row[3] is the stored hashed value.
    if (password_verify(str_replace("'", "", $pw_temp), $pw))
	  //htmlspecialchars() Convert special characters to HTML entities
	  //It is used to encode user input on a website so that users cannot insert harmful HTML codes into a site
      echo htmlspecialchars("$fn $sn : Hi $fn, you are now logged in as '$un'");
    else die("Invalid username/password combination");
  }
  else
  {
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    die ("Please enter your username and password");
  }
  
  function sanitise($pdo, $str)
  {
    $str = htmlentities($str);
    return $pdo->quote($str);
  }
?>
