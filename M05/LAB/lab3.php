<?php

// Import database connection function

require_once('../../STATIC/TOOLS/DB/dbConn.php');


try{
    $conn = connect_to_database();

}catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}




function processData($data): array
{
    $query = '';
    global $conn;


    $table = $data['input'];
    $dropdownValue = $data['input'];


    if($table['table'] === 'books') {
        switch ($dropdownValue['dropdownValue']) {
            case '1':
                $query = 'SELECT * FROM books';
                break;
            case '2':
                $query = 'SELECT ID FROM books';
                break;
            case '3':
                $query = 'SELECT Title FROM books';
                break;
            case '4':
                $query = 'SELECT Category FROM books';
                break;
            case '5':
                $query = 'SELECT Price FROM books';
                break;

        }

    } elseif($table['table'] === 'authors') {
        $conn = connect_to_database();
        $query = "SELECT books.Title, authors.Name FROM books, authors, books_authors WHERE books.ID = books_authors.BID AND authors.ID = books_authors.AID AND authors.Name = '{$dropdownValue['dropdownValue']}'";
    }else{
        echo 'Error';
    }


    // Execute the query
    $result = execute_query($conn, $query);

    //construct payload
    $data = array(
        'table' => $table,
        'dropdownValue' => $dropdownValue,
        'query' => $query,
        'result' => $result
    );

    // Close the connection
    $conn = null;
    return $data;
}




if($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {
        $data = json_decode(file_get_contents('php://input'), true);

        echo json_encode(processData($data));
    } catch (Exception $e) {
        echo json_encode(array('error' => $e->getMessage()));
    }

}

