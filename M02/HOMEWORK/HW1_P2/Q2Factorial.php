<?php
include '../../../STATIC/header.php';
include '../../../STATIC/footer.php';

htmlHeader("Q2 - Factorial", "../../../STATIC/common.css");

$displayForm = TRUE;


//collect data from form
$number = $_POST['number'];

//check if all fields are filled
if(isset($_POST['calculate'])){
    if(empty($number) || $number < 0 || $number > 10){
        echo "<h3>All fields are required to be valid numbers!!</h3>";
    }
    else{
        $displayForm = FALSE;
    }
}

//calculate factorial
$factorial = 1;
for($i = 1; $i <= $number; $i++){
    $factorial = $factorial * $i;
}

if($displayForm){

    echo <<<FORM
    <div class='card'>
    <form action='Q2Factorial.php' method='post'>
    <label>Enter a number between 0 and 10:</label> <input type='text' name='number'><br>
    <input name='calculate' type='submit' value='submit'>
    </form>
    </div>
FORM;

}
else{
    //display results
    echo "<div class='card'>";
    echo "<h3>The factorial of $number is $factorial.</h3>";
    echo "<input type='button' value='Try again?' onclick='window.location.href=\"Q2Factorial.php\"' />";
    echo "</div>";
}

htmlFooter("");
