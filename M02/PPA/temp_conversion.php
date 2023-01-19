<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>PHP practice</title>
    <link rel="stylesheet" type="text/css" href="common.css"/>
</head>

<body>

<h2>Temperature Conversion</h2>


<?php
function createRow($fahrenheit, $celsius): void
{
    echo "<tr>";
    echo "<td>$fahrenheit</td>";
    echo "<td>$celsius</td>";
    echo "</tr>";
}

function fahrenheitToCelsius($fahrenheit): float|int
{
    return ($fahrenheit - 32) * 5/9;
}

echo "<table>";
echo "<tr><th>Fahrenheit</th><th>Celsius</th></tr>";
for ($fahrenheit = 0; $fahrenheit <= 100; $fahrenheit+=2){
    $celsius = fahrenheitToCelsius($fahrenheit);
    createRow($fahrenheit, round($celsius, 1));
}
echo "</table>";



?>



</body>

</html>
