

<?php
include '../../../STATIC/header.php';
include '../../../STATIC/footer.php';


htmlHeader("Tip Calculator", "../../../STATIC/common.css");

echo "<div class=\"card\">";

$displayForm = TRUE;
$amount = "";
$tip = "";
//isset(var): Returns TRUE if var exists and has value other than NULL, it returns FALSE otherwise.  
if (isset($_GET['calculate'])) {
     $amount = floatval($_GET["total"]);
	 $tip = floatval($_GET["tip"]);
	 
     if (empty($amount) or empty($tip)) 
	 	echo "<h3>Both amount and tip fields are required to be valid numbers!!</h3>";
	 else 
		$displayForm = FALSE;
}
if ($displayForm) {
?>
<form action="TipCalculatorAllInOne.php" method="get">
      <table border="0">
      <tr>
      	<td>Enter bill total</td>
      	<td><input type="text" name="total" id="total" size = "10" value="<?php echo $amount; ?>" /></td>
      </tr>  
      <tr>
      	<td>Enter tip (%)</td>
      	<td><input type="text" name="tip" id="tip" size = "10" value="<?php echo $tip; ?>"/></td>
      </tr>		
      <tr>
      	<td><input type="submit" name="calculate" id="calculate" value="Calculate Tip" /></td>
      	<td><input type="reset" name="resetButton" id="resetButton" value="Reset" /></td>
      </tr>				
      </table>
</form>
<?php
}
else {
     echo "Tip amount is $" . round(($amount * $tip)/100.0, 2);
     echo "<p><a href=\"TipCalculatorAllInOne.php\">Try again?</a></p>\n";
}
echo "</div>";
htmlFooter("");
?>


