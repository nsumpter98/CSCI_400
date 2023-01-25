<?php
include '../../../STATIC/header.php';
include '../../../STATIC/footer.php';

htmlHeader("Q3 - Integer to text", "../../../STATIC/common.css");

$displayForm = TRUE;

//collect data from form
$number = $_POST['number'];
$num = $number;

//check if all fields are filled
if (isset($_POST['submit'])) {
    if ($number < 0 || $number >= 1000) {
        echo "<h3>All fields are required to be valid numbers!!</h3>";
    } else {
        $displayForm = FALSE;
    }
}

//convert number to text
$numberText = "";
$ones = array("zero", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine");
$tens = array("ten", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen");
$twenties = array("twenty", "thirty", "forty", "fifty", "sixty", "seventy", "eighty", "ninety");

if ($number >= 100) {
    $numberText = $ones[floor($number / 100)] . " hundred";
    $number = $number % 100;
}

if ($number >= 20) {
    $numberText = $numberText . " " . $twenties[floor($number / 10) - 2];
    $number = $number % 10;
}

if ($number >= 10) {
    $numberText = $numberText . " " . $tens[$number - 10];
    $number = 0;
}

if ($number > 0) {
    $numberText = $numberText . " " . $ones[$number];
}

if($numberText == ""){
    $numberText = "zero";
}

if ($displayForm) {

    echo <<<FORM
    <div class='card'>
    <form action='Q3IntergerToText.php' method='post'>
    <label>Enter a number greater than or equal to 0 and less than 1000:</label> <input type='text' name='number'><br>
    <input name='submit' type='submit' value='submit'>
    </form>
    </div>
FORM;

} else {
    //display results
    echo "<div class='card'>";
    echo "<h3>The number $num is $numberText.</h3>";
    echo "<input type='button' value='Try again?' onclick='window.location.href=\"Q3IntergerToText.php\"' />";
    echo "</div>";
}

htmlFooter("");
