<?php

$daysEnglish = array(
    "Day1" => "Sunday",
    "Day2" => "Monday",
    "Day3" => "Tuesday",
    "Day4" => "Wednesday",
    "Day5" => "Thursday",
    "Day6" => "Friday",
    "Day7" => "Saturday"
);

$daysFrench = array(
    "Day1" => "Dimanche",
    "Day2" => "Lundi",
    "Day3" => "Mardi",
    "Day4" => "Mercredi",
    "Day5" => "Jeudi",
    "Day6" => "Vendredi",
    "Day7" => "Samedi"
);

/**
 * @param $input
 * @return bool
 */
function checkInput($input): bool
{
    return preg_match("/^Day\s[1-7]$/", $input);
}

/**
 * @param $input
 * @return string
 */
function translate($input): string
{
    global $daysEnglish;
    global $daysFrench;

    $payload = array(
        "input" => $input,
        "valid" => checkInput($input)
    );

    if ($payload["valid"]) {
        $payload["english"] = $daysEnglish[str_replace(" ", "", $input)];
        $payload["french"] = $daysFrench[str_replace(" ", "", $input)];
        $payload["dayNumber"] = str_replace("Day", "", str_replace(" ", "", $input));
    }

    return json_encode($payload);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //get json data
    $preload = json_decode(file_get_contents('php://input'), true);

    $input = $preload["input"];

    $payload = translate(trim($input));

    echo $payload;
}