<!DOCTYPE html>

<!--
testing some String manipulation functions
-->

<html>

   <head>
      <meta charset = "utf-8" />
      <title>PHP practice</title>
	  <link rel="stylesheet" type="text/css" href="common.css" />
   </head>

   <body>

	  <h3>
		<?php 
		
			$aString ="Hello World!";
			echo "{$aString} from PHP! ......<br />"; #The curly brackets are optional
			echo strlen($aString) . "<br />";
			echo $aString[1] . "<br />";
			echo substr($aString, 3, 2) . "<br />";
			//strstr() Search for a substring within a string. If substring is not found, it returns false, otherwise, it 
			//returns the first occurence of the substring, including the rest of it
			echo strstr($aString, "Wor") . "<br />"; 
			echo strtoupper($aString) . "<br />"; 
		?>
	  </h3>
	  
   </body>
</html>
