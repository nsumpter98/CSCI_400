<?php


function processFormJSON(): void
{
    $courseID = $_POST['courseID'];
    $grade = $_POST['grade'];

    global $message;
    $status = "success";
    $pass = true;

    if (strtoupper($courseID) != 'CSCI400' && strtoupper($courseID) != 'CSCI343') {
        $message = "Invalid course ID";
        $status = "error";
        $pass = false;
    }

    if (strtoupper($courseID) == 'CSCI400' && $grade < 70) {
        $message = "You have failed CSCI400";
        $status = "fail";
        $pass = false;
    }

    if (strtoupper($courseID) == 'CSCI343' && $grade < 75) {
        $message = "You have failed CSCI343";
        $status = "fail";
        $pass = false;
    }

    if (!is_numeric($grade)) {
        $message = "Invalid grade";
        $status = "error";
        $pass = false;
    }

    if (($grade < 0) || ($grade > 100)) {
        $message = "Invalid grade";
        $status = "error";
        $pass = false;
    }



    if ($pass) {
        $message = "You have successfully PASSED $courseID with a grade of $grade!";
    }


    $response = array(
        "courseID" => $courseID,
        "grade" => $grade,
        "message" => $message,
        "status" => $status,
        "pass" => $pass
    );
    echo json_encode($response);
}




//if method is post, form input
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    processFormJSON();
}
