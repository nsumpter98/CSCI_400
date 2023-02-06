<!DOCTYPE html>
<!--
Web Forms: 
Redisplaying the Web form usign PHP
Emailing the Web form using the mail() function
-->
<html>
<head>
<meta charset = "utf-8" />
<title>Scholarship Form</title>
</head>

<body>
<?php
$errorCount = 0;
$firstName = validateInput($_POST['fName'], "First name");
$lastName = validateInput($_POST['lName'], "Last name");

//--------------------------------------------------------------------
function validateInput($data, $fieldName) {
     global $errorCount;
     if (empty($data)) {
          displayRequired($fieldName);
          ++$errorCount;
          $retval = "";
     } else { // Only clean up the input if it isn't empty
          $retval = trim($data);
          $retval = stripslashes($retval);
		  //trim: Strip whitespace (or other characters) from the beginning and end of a string
		  //stripslashes Returns a string with backslashes stripped off. (\' becomes ' and so on
     }
     return($retval);
}
//--------------------------------------------------------------------
function displayRequired($fieldName) {
	echo "The field \"$fieldName\" is required.<br />\n";
}

//--------------------------------------------------------------------
function redisplayForm($firstName, $lastName) {
?>
	<h2>Scholarship Form</h2>
	<form name = "scholarship" action = "email_scholarship.php" method = "post">
	<p>First Name: <input type="text" name="fName" value="<?php echo $firstName; ?>" /></p>
	<p>Last Name: <input type="text" name="lName" value="<?php echo $lastName; ?>" /></p>
	<p><input type="reset" value="Clear Form" />&nbsp; &nbsp;<input type="submit" name="Submit" value="Send Form" />
	</form>
<?php
}

if ($errorCount > 0) {
     echo "Please re-enter the information below.<br />\n";
     redisplayForm($firstName, $lastName);
}
else { // Send an e-mail
     $to = "someuser@iuk.edu";
     $subject = "Scholarship Form Results";
     $message = "Student Name: " . $firstName. " " . $lastName;
	 //optional headers argument
	 $headers = 'From: MySite@MyServer.com' . "\r\n" .
    'Cc: email@gmail.com' . "\r\n";
	
     $result = mail($to, $subject, $message, $headers);
     if ($result)
          $resultMsg = "Your message was successfully sent.";
     else
          $resultMsg = "There was a problem sending your message.";

?>

<h2 style = "text-align:center">Scholarship Form</h2>
<p style = "line-height:200%">Thanks for filling out the form<?php 
     if (!empty($firstName)) 
          echo ", $firstName" 
     ?>. <?php echo $resultMsg; ?>
<?php
}
?>
</body>
</html>

