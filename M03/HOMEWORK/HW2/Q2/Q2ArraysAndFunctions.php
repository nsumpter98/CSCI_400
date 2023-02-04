<?php
include "../../../../STATIC/header.php";
include "../../../../STATIC/footer.php";

htmlHeader("Q2 Arrays and Functions", "../../../../STATIC/common.css");


$numbers = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

function displayArray($numbers): void
{
    foreach($numbers as $number)
    {
        echo $number . " ";
    }
    echo "<br>";
}

function initialize($numbers, $value): array
{
    foreach($numbers as $index => $number)
    {
        $numbers[$index] = $value;
    }
    return $numbers;
}

function findSum($numbers)
{
    $sum = 0;
    foreach($numbers as $number)
    {
        $sum += $number;
    }
    return $sum;
}

function findMax($numbers)
{
    $max = $numbers[0];
    foreach($numbers as $number)
    {
        if($number > $max)
        {
            $max = $number;
        }
    }
    return $max;
}

echo "<div class='card'>";

displayArray($numbers);
echo "Sum: " . findSum($numbers) . "<br>";
echo "Max: " . findMax($numbers) . "<br>";
$numbers = initialize($numbers, 1.5);

echo "After reinitialization: <br>";
displayArray($numbers);
echo "Sum: " . findSum($numbers) . "<br>";
echo "Max: " . findMax($numbers) . "<br>";

echo "</div>";


htmlFooter("");