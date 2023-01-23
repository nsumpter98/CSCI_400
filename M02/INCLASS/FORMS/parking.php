<!DOCTYPE html>
<!--
Handling the Tip calculation form data
Using Two-Part Form (i.e., a html file + a separate PHP file)
-->
<html>
<head>
    <meta charset = "utf-8" />
    <title>Tip calculation</title>
    <link rel="stylesheet" type="text/css" href="../../../STATIC/common.css" />
</head>
<body>
<h3>Thank you for using the Tip Calculator ...</h3>
<div class="card">
<?php

$hoursParked = floatval($_GET["hours"]);


if (empty($hoursParked)) {
    echo "<p>Please enter valid number</p>";
}
else {
    $charges = 0;
    if($hoursParked <= 3){
        $charges = 2;
    }else{
        $charges = (($hoursParked - 3) * .50) + 2;
    }
    $charges = min($charges, 10);
    echo "<p>$charges</p>";
}
?>
<p>
    <input type="button" value = "Go Back" onclick="javascript:history.go(-1)" style="float:left" />
</p>
</div>
</body>
</html>