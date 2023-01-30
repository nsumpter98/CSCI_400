<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8" />
    <title>Number Form</title>
  </head>
<body>
<h3>Civics Quiz:</h3>
<?php






//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
if ($displayForm) {
?>
      <form action="StateCapitals.php" method="post">
      
      <table border="0">
      <tr>
      	<td>The capital of Connecticut is: </td>
      	<td><input type="text" name="Connecticut" size = "25" /></td>
      </tr> 
      <tr>
      	<td>The capital of Maine is: </td>
      	<td><input type="text" name="Maine" size = "25"/></td>
      </tr>  
	  <tr></tr>	  
      <tr>
      	<td><input type="submit" name="send" id="submit" value="Check Answers" />&nbsp;&nbsp;&nbsp;
      	<input type="reset" name="resetButton" id="resetButton" value="Clear Form" /></td>
      </tr>				
      </table>
        
      </form>
<?php
}
?>
</body>
</html>

