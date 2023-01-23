<!DOCTYPE html>
<!--
Handling the Tip calculation form data
Using Two-Part Form (i.e., a html file + a separate PHP file)
-->
<html>
   <head>
      <meta charset = "utf-8" />
      <title>Tip calculation</title>
	  <link rel="stylesheet" type="text/css" href="common.css" />
   </head>
   <body>
      <h3>Thank you for using the Tip Calculator ...</h3>
	  <?php 
	  	
		//floatval($var) attempts to convert a string into a float. 
		//It returns the float value of $var on success, or 0 on failure
	  	$amount = floatval($_GET["total"]);
	  	$tip = floatval($_GET["tip"]);
		/*
		Note:
		empty(var): returns TRUE if var has an empty value or a Zero value. Therefore, if you 
		want to allow zero as a valid input then use NULL instead: 
		if ($amount !=NULL or $tip != NULL)
		
		Also, if you want to ensure that the user entred a numeric value that can be converted 
		to a number:
		if (!is_numeric($amount)) 
			echo "Must enter a numeric value!" . "<br />";	
		*/	
		
	  	if (empty($amount) or empty($tip)) {
	  		echo "Both amount and tip fields are required to be valid numbers!!";
			//echo "<p><a href=\"TipCalculator.html\">Try again?</a></p>\n";
	  	}
	  	else {	
			echo "Tip amount is $" . round(($amount * $tip)/100.0, 2);
	  	}
	  ?>
	  <p>
	  	<input type="button" value = "Go Back" onclick="javascript:history.go(-1)" style="float:left" />
	  </p>
   </body>
</html>