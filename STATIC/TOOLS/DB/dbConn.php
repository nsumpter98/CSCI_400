<?php

function connect_to_database()
{
    $servername = "localhost";
    $username = "nsumpter";
    $password = "Leanahtan1";
    $dbname = "natsumpt";

    try {
        // Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

