<!DOCTYPE html>

<!--
Web Forms: Redisplaying the Web form - Sticky Forms Example

The code will validate user's input: 
All three fields are required
Only four majors are required. They must be stored in an array and your code will valid a major case-insensitive 
-->

<html>
<head>
<meta charset = "utf-8" />
<title>Scholarship Form</title>
</head>

<body>
<?php


//A function that will redisplay the form if errors exist:
function redisplayForm($firstName, $lastName, $major) {
?>
<h2 style = "text-align:center">Scholarship Form</h2>
<form name="scholarship" action="ScholarshipStartup.php" method = "post">
<p>First Name: <input type="text" name="fName" value="<?php 
echo $firstName; ?>" /></p>
<p>Last Name: <input type="text" name="lName" value="<?php 
echo $lastName; ?>" /></p>
<p>Major: <input type="text" name="major" value="<?php 
echo $major; ?>" /></p>
<p><input type="reset" value="Clear Form" />&nbsp; 
&nbsp;<input type="submit" name="Submit" value="Send Form" 
/>
</form>
<?php
}
?>

</body>
</html>

