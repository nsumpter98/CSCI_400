<html>

<head>
    <meta charset="utf-8"/>
    <title>PHP practice</title>
    <link rel="stylesheet" type="text/css" href="common.css"/>
</head>

<body>

<h3>Simulating the str_pad function in PHP</h3>

<h2>
<?php

function str_pad_simulate($input, $desiredLength){
    $inputLength = strlen($input);
    $difference = $desiredLength - $inputLength;
    $output = $input;
    for ($i = 0; $i < $difference; $i++){
        $output .= " ";
    }
    return $output;
}


$sampleString = "Hello World!";
$newString = str_pad_simulate($sampleString, 20);


echo "The original string length is: " . strlen($sampleString) . "<br /><br />";
echo $newString . "<br />";
echo "<br />The new string length is: " . strlen($newString) . "<br />";

?>

</h2>

</body>


</html>
