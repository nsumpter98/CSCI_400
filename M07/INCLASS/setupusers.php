<?php //setupusers.php
require_once 'login.php';
//Connect to MySQL Server: create a new object named $pdo
try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch (PDOException $e) {
    die("Fatal Error - Could not connect to the database" . "</body></html>");
}

/*$query = "CREATE TABLE users (
  forename VARCHAR(32) NOT NULL,
  surname  VARCHAR(32) NOT NULL,
  username VARCHAR(32) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
)";

if (!($result = $pdo->query($query))) {
  print( "<p>Fatal Error - Could not execute query!</p>" );
  die( "</body></html>" );
} else
    echo "<h3>The users table has been created .. </h3>";*/

$forename = 'Bill';
$surname = 'Smith';
$username = 'bsmith';
$password = 'mysecret';
$hash = password_hash($password, PASSWORD_DEFAULT);
//password_hash() creates a new password hash using a strong one-way hashing algorithm
//PASSWORD_DEFAULT - Use the bcrypt algorithm. Note that this constant is designed to change
//over time as new and stronger algorithms are added to PHP
//password_hash works with PHP 5.5 or higher so it will not work on Turing.

add_user($pdo, $forename, $surname, $username, $hash);

$forename = 'Pauline';
$surname = 'Jones';
$username = 'pjones';
$password = 'acrobat';
$hash = password_hash($password, PASSWORD_DEFAULT);
$😂 = "test";

add_user($pdo, $forename, $surname, $username, $hash);

function add_user($pdo, $fn, $sn, $un, $pw)
{

    //PHP Supports executing a prepared statement, which is used to execute the same statement repeatedly with high efficiency.
    $stmt = $pdo->prepare('INSERT INTO users VALUES(?,?,?,?)');
    //Binds variables to a prepared statement as parameters
    //PARAM_STR: Used to represents the SQL CHAR, VARCHAR, or other string data type
    $stmt->bindParam(1, $fn, PDO::PARAM_STR, 32);
    $stmt->bindParam(2, $sn, PDO::PARAM_STR, 32);
    $stmt->bindParam(3, $un, PDO::PARAM_STR, 32);
    $stmt->bindParam(4, $pw, PDO::PARAM_STR, 255);

    $stmt->execute([$fn, $sn, $un, $pw]);
    echo "<h3>User " . $sn . " has been added to the database successfully.</h3>";
    //$stmt->close();
}

?>
