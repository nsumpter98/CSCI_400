<?php
//array structure to hold answers
$answers = array(
    "Connecticut" => "Hartford",
    "Maine" => "Augusta",
    "Massachusetts" => "Boston",
    "New Hampshire" => "Concord",
    "Rhode Island" => "Providence",
    "Vermont" => "Montpelier"
);

function checkAnswer($state, $capital, $answers): bool
{
    return $answers[$state] == $capital;
}


function constructPayload($states, $capitals, $answers): array
{
    $payload = array();
    foreach($states as $index => $state)
    {
        $capital = $capitals[$index];
        $payload[] = array(
            "state" => $state,
            "capital" => $capital,
            "correct" => checkAnswer($state, $capital, $answers)
        );
    }
    return $payload;
}

if(isset($_POST["payload"]))
{
    $states = $_POST["payload"]["states"];
    $capitals = $_POST["payload"]["capitals"];
    $payload = constructPayload($states, $capitals, $answers);
}
else
{
    $payload = array(
        "error" => "Invalid request"
    );
}


echo json_encode($payload);