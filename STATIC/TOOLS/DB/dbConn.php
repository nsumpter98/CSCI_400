<?php

function connect_to_database()
{
    //TODO: find way to hide credentials - (these credentials are for testing)
    $servername = "localhost";
    $username = "natsumpt";
    $password = "natsumpt";
    $dbname = "natsumpt";

    try {
        // Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $conn;
    } catch (PDOException $e) {
        // Output error message
        echo "Connection failed: " . $e->getMessage();
    }
}

function execute_query($conn, $query)
{
    try {
        // Prepare statement
        $stmt = $conn->prepare($query);

        // Execute the statement
        $stmt->execute();

        // Return the result set
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        // Output error message
        echo "Error executing query: " . $e->getMessage();
    }
}

