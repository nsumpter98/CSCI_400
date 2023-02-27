<?php // authenticate2.php - same as authenticate but with sessions. 
  require_once 'login.php';

  //Connect to MySQL Server: create a new object named $pdo
  try {
	  $pdo = new PDO($dsn, $dbUser, $dbPassword);
  }
  catch (PDOException $e){
	die("Fatal Error - Could not connect to the database" . "</body></html>" );
  }

  if (isset($_SERVER['PHP_AUTH_USER']) &&
      isset($_SERVER['PHP_AUTH_PW']))
  {
    $un_temp = sanitise($pdo, $_SERVER['PHP_AUTH_USER']);
    $pw_temp = sanitise($pdo, $_SERVER['PHP_AUTH_PW']);
    $query   = "SELECT * FROM users WHERE username=$un_temp";
    $result  = $pdo->query($query);

    if (!$result->rowCount()) die("User not found");

    $row = $result->fetch();
    $fn  = $row['forename'];
    $sn  = $row['surname'];
    $un  = $row['username'];
    $pw  = $row['password'];

    if (password_verify(str_replace("'", "", $pw_temp), $pw)){
      
	  //Set up a session once a user has been authenticated.
	  session_start();
	
	  //Save the session variables that you need access to throught the lifetime of the session
      $_SESSION['forename'] = $fn;
      $_SESSION['surname']  = $sn;

      echo htmlspecialchars("$fn $sn : Hi $fn,
        you are now logged in as '$un'");
      
	  //This will be used to illustrate how the session will transfer to another program or PHP web page
      die ("<p><a href='continue2.php'>Click here to continue</a></p>");
    }
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
