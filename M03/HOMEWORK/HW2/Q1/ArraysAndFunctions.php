<?php

$courses = array(
    "C400",
    "I262",
    "C343",
    "I400",
    "I211"
);



function sequentialSearch($courseID, $courses): bool
{
    foreach($courses as $course)
    {
        if($course == $courseID)
        {
            return true;
        }
    }
    return false;
}

function constructPayload($courseID, $courses): array
{
    $payload = array(
        "courseID" => $courseID,
        "exists" => sequentialSearch($courseID, $courses)
    );

    return array("results" => $payload);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $preload = json_decode(file_get_contents('php://input'), true);
    $courseID = $preload["courseID"];
    $payload = constructPayload($courseID, $courses);
}
else
{
    $payload = array(
        "error" => "Invalid request",
        "input" => json_decode(file_get_contents('php://input'), true)
    );
}



echo json_encode($payload);