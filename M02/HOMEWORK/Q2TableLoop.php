<?php
include "../../STATIC/header.php";
include "../../STATIC/footer.php";

htmlHeader("Q2 - Table Loop", "../../STATIC/common.css");

echo "<div class=\"card\">";
echo "<table>";
echo "<tr><th>N</th><th>N*10</th><th>N*100</th><th>N*1000</th></tr>";

for ($n = 1; $n <= 7; $n++){
    echo "<tr>";
    echo "<td>$n</td>";
    echo "<td>" . $n * 10 . "</td>";
    echo "<td>" . $n * 100 . "</td>";
    echo "<td>" . $n * 1000 . "</td>";
    echo "</tr>";
}

echo "</table>";
echo "</div>";


htmlFooter("01-22-2023");



