<?php
include "../../STATIC/header.php";
include "../../STATIC/footer.php";

htmlHeader("Q3 - Credit Card Validator", "../../STATIC/common.css");

$creditCardNumber1 = "1234-5678-9012-3456A";
$creditCardNumber2 = "1234-5678-9012-3456";




function replaceHyphens($input): string
{
    $input = str_replace("-", "", $input);
    $input = str_replace(" ", "", $input);
    return $input;
}



function isCreditCardValid($creditCardNumber): void
{
    echo "<div class=\"card\">";
    if (is_numeric($creditCardNumber)){
        echo "<h2>Valid credit card number: {$creditCardNumber}</h2>";
    } else {
        echo "<h2>Invalid credit card number: {$creditCardNumber}</h2>";
    }
    echo "</div>";
}


isCreditCardValid(replaceHyphens($creditCardNumber1));
isCreditCardValid(replaceHyphens($creditCardNumber2));




htmlFooter();