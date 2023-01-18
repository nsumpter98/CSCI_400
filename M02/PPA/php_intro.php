<?php 
	//My First php statment:
	# Another single-line comments
	echo "Hello PHP! ........<br />"; 
	/*
	Since php can be embedded within html, the "< ? php " directive is
	needed to distinguish the two languages.
	echo is a statement used to display whatever can be displayed on a page.
	print acts exactly the same as echo.
	*/
?>
<br /><br />
<?php print "Hello PHP! ........"; ?>

<?php
	#The \n requires the <pre> tag to work!
	echo "\n"; 
?>
<br /><br />
<?php
	// Get the current time, format it as a string, and store it in a variable
	// use the built-in 'date' function
	//g, i, s are for hr, min, sec respectively. a is for am or pm as appropriate
	date_default_timezone_set('US/Eastern');
    //$currenttime = date('h:i:s:u');
	$currentTime = date( "g:i:s a" );

	// Get the current date in a readable format
	$currentDate = date( "D M j, Y" );
	echo "The current time is $currentTime on\n $currentDate";  
?>

<br /><br />
<?php
//Display the current day of the week
echo " Today is " . date("l") . ". ";
?>

<br /><br />

<?php phpinfo(); 
/* phpinfo is a built-in php function that displayes info about the php version
   running on your Web server */
?>