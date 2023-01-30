<!DOCTYPE html>

<!--
PHP User-defined Functions
-->

<html>
   <head>
      <meta charset = "utf-8" />
<title>User-defined Functions</title>
</head>
<body>

<h2>User-defined Functions in PHP:</h2>

<?php

//Value returning function
function returnMessage() {
     return "<p><strong>This message was returned from returnMessage().</strong></p>";
}

//Non-val returning function with two parameters, one param is assigned a default value:
function displayMessage($message, $number=1) {
     echo "<p>Message#$number is $message</p>";
}
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//Good practice is to place your function def. before the calls.

//In PHP, by default, params are passed to functions by value
displayMessage("This is my message!");
$msg = returnMessage();
echo $msg;

//Global variables: you must use the "global" keyword within a function to reference a global var:
$incrementValue = 10;

//Pass by reference:
function incrementByReference(&$number) {
    global $incrementValue;
	$number += $incrementValue;
    echo "<p>The new number is $number</p>";
}
$num = 5;
//Note: you must pass only a variable to such a function, not an expression!
incrementByReference($num); 
echo "<p>The value of num after calling the func by reference is {$num}</p>";
?>
</body>
</html>

