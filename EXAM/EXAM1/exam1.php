<?php


// Import database connection function

require_once('../../STATIC/TOOLS/DB/dbConn.php');


$conn = connect_to_database();

function processData($data): array
{
    global $conn;

    $query = 'INSERT INTO visitors (fname, lname) VALUES (:fname, :lname)';
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':fname', $data[0]['fname']);
    $stmt->bindParam(':lname', $data[0]['lname']);

    //regex to validate name
    $regex = '/^[a-zA-Z]+$/';

    if(!preg_match($regex, $data[0]['fname'])){
        return array('response' => array('fname' => 'Invalid first name', 'lname' => $data[0]['lname'], 'code' => 'fnameerr'));
    }
    if(!preg_match($regex, $data[0]['lname'])){
        return array('response' => array('fname' => $data[0]['fname'], 'lname' => 'Invalid last name', 'code' => 'lnameerr'));
    }

    $stmt->execute();

    return array('response' => array('fname' => $data[0]['fname'], 'lname' => $data[0]['lname'], 'code' => 'success'));


}


function getRecords(){
    global $conn;
    $query = 'SELECT * FROM visitors';
    return execute_query($conn, $query);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {
        $data = json_decode(file_get_contents('php://input'), true);

        echo json_encode(processData($data));
    } catch (Exception $e) {
        echo json_encode(array('error' => $e->getMessage()));
    }

} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo json_encode(getRecords());
}




