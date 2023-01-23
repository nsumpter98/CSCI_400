

<?php
include "../../STATIC/header.php";
include "../../STATIC/footer.php";

htmlHeader("Q1 - Calorie calculator", "../../STATIC/common.css");


//set static variables
$bikingCalories = 150;
$joggingCalories = 650;
$swimmingCalories = 100;
$caloriesPerPound = 3500;
$hoursBiking = 3;
$hoursJogging = 2;
$hoursSwimming = 4;

//calculate calories burned
$caloriesBurned = ($hoursBiking * $bikingCalories) + ($hoursJogging * $joggingCalories) + ($hoursSwimming * $swimmingCalories);

//calculate pounds lost
$poundsLost = $caloriesBurned / $caloriesPerPound;


echo "<div class=\"card\">";
echo "<h2>You burned {$caloriesBurned} calories and lost {$poundsLost} pounds.</h2>";
echo "<p>That's {$hoursBiking} hours of biking, {$hoursJogging} hours of jogging, and {$hoursSwimming} hours of swimming.</p>";
echo "</div>";

htmlFooter();


