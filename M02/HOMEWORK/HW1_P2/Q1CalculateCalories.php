<?php
include '../../../STATIC/header.php';
include '../../../STATIC/footer.php';

htmlHeader("Q1 - Calculate Calories", "../../../STATIC/common.css");

//calculate calories a person loses 1 pound of fat for every 3500 calories

$calories = 3500;
$displayForm = TRUE;



//collect data from form
$hoursCycling = $_POST['hoursCycling'];
$hoursRunning = $_POST['hoursJogging'];
$hoursSwimming = $_POST['hoursSwimming'];

//check if all fields are filled
if(isset($_POST['calculate'])){
    if(empty($hoursCycling) || empty($hoursRunning) || empty($hoursSwimming)){
        echo "<h3>All fields are required to be valid numbers!!</h3>";
    }
    else{
        $displayForm = FALSE;
    }
}




//calculate calories burned
$caloriesBurned = ($hoursCycling * 200) + ($hoursRunning * 475) + ($hoursSwimming * 275);

//calculate pounds lost
$poundsLost = $caloriesBurned / $calories;



if($displayForm){

echo <<<FORM
<div class='card'>
    <form action='Q1CalculateCalories.php' method='post'>
        <label>Number of hours cycling:</label> <input type='text' name='hoursCycling'><br>
        <label>Number of hours jogging:</label> <input type='text' name='hoursJogging'><br>
        <label>Number of hours swimming:</label> <input type='text' name='hoursSwimming'><br>
        <input name='calculate' type='submit' value='submit'>
    </form>
</div>
FORM;



}else{
    //display results
    echo "<div class='card'>";
    echo "<h3>You burned $caloriesBurned calories and lost $poundsLost pounds.</h3>";
    echo "<input type='button' value='Try again?' onclick='window.location.href=\"Q1CalculateCalories.php\"' />";
    echo "</div>";
}





htmlFooter("");
