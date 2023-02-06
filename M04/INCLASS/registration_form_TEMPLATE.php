<!DOCTYPE html>
<!--
This is very basic validation 
-->
<html>
   <head>
      <meta charset = "utf-8" />
      <title>Form Validation - Registration Form</title>
      <style type = "text/css">
         p       { margin: 0px; }
         .error  { color: red }
         p.head  { font-weight: bold; margin-top: 10px; }
      </style>
   </head>
   <body>
 
	


 <!-- *******************************************************************************************  -->
 <?php
    $to = "name@iuk.edu";
    $subject = "Registration Form Submission";
    $message = "Name: " . $_POST["fullname"] .  
	"\n" .  $_POST["email"] . "\n" . $_POST["phone"] . "\n" . 
	$_POST["language"] . "\n" . $_POST["os"];
	//optional headers argument
	//$headers = 'From: MySite@MyServer.com' . "\r\n" .
    //'Cc: email@gmail.com' . "\r\n";
    //$result = mail($to, $subject, $message, $headers);
	$result = mail($to, $subject, $message);
    if ($result)
        echo "<strong>Your registration form was successfully sent to</strong> " . $to ;
    else {
        echo "There was a problem sending your submission via email.";
	    die();
	}
 ?>
      <p  class = "head">Hi <?php print( $_POST["fullname"] ); ?>. 
		Thank you for completing the survey!
	  </p>
      <p>The following information has been sent:</p>
      <p>Name: <?php print( $_POST["fullname"] ); ?></p>
      <p>Email: <?php print( $_POST["email"] ); ?></p>
      <p>Phone: <?php print( $_POST["phone"] ); ?></p>
	  <p>Language: <?php print( $_POST["language"] ); ?></p> 
      <p>OS: <?php print( $_POST["os"] ); ?></p> 
		 
   </body>
</html>	
   </body>
</html>

