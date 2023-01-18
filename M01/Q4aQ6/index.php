<html>
<head>

    <title>Q4aQ6</title>

</head>

<body>

<p>Example 4</p>
<?php
//Question 4
$caloriesPerPound = 3500;


$hours = 2;
$caloriesPerHour = 100;

$calories = $hours * $caloriesPerHour;
$pounds = $calories / $caloriesPerPound;

//echo hours and calories per hour

echo "Hours: " . $hours . "<br>";
echo "Calories per hour: " . $caloriesPerHour . "<br>";

echo "<h2>You burned $pounds pounds of fat!</h2>";

?>

<br/>
<p>Example 6</p>
<?php
//question 6

$radius = 5;
$diameter = $radius * 2;
$area = 3.14159 * $radius * $radius;

echo "Radius: " . $radius . "<br>";


echo "<h2>The diameter is $diameter and the area is $area</h2>";


?>

</body>

</html>



