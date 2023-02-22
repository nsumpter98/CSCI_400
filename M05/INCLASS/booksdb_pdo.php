<!DOCTYPE html>

<!-- booksdb_pdo.php -->
<!-- Querying a database and displaying the results. -->
<!-- Using the PDO API:

PDO (PHP Data Objects) is the most secure and easiest API yet to access a MySQL database from PHP
Unlike other access methods such as direct access and mysqli API, PDO is lightweight
and consistent interface for accessing databases in PHP. 

 -->

<html>
<head>
    <meta charset="utf-8">
    <title>Search Results</title>
    <style type="text/css">
        body {
            font-family: sans-serif;
            background-color: lightyellow;
        }

        table {
            background-color: lightblue;
            border-collapse: collapse;
            border: 1px solid gray;
        }

        td {
            padding: 5px;
        }

        tr:nth-child(odd) {
            background-color: white;
        }
    </style>
</head>
<body>
<?php
require_once 'login.php';

//Connect to MySQL Server: create a new object named $pdo
try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
/*
    The -> operator indicates that the item on the right is a property or method
    of the object on the left.
*/

// Build a SELECT query:
$query = "SELECT Title, Price, ISBN FROM books WHERE Price > 100";

$selectValue = $_POST['bookselection'];

// Query the database:
if (!($result = $pdo->query($query))) {
    print("<p>Could not execute query!</p>");
    die("</body></html>");
}
/*
 If all went okay, all data returned by MySQL is now stored in the $result object.
*/
?>
<!-- Display the results of the query -->
<table>
    <caption>Results of <?php print("$query") ?> </caption>
    <?php
    // Fetch each record in the result set by iterating through each record
    while ($row = $result->fetch(PDO::FETCH_NUM)) {
        // build table to display results
        print("<tr>");

        foreach ($row as $value)
            print("<td>" . htmlspecialchars($value) . "</td>");
        //htmlspecialchars isa PHP function that converts predefined characters such as "<" and ">" to HTML entities
        print("</tr>");
    }

    /*
        Your options for fetching data - based on the param passed to the fetch method:
            PDO::FETCH_NUM: returns an array indexed by column number as returned in your result set, starting at column 0
            PDO::FETCH_BOTH (default): returns an array indexed by both column name and 0-indexed column number as returned in your result set
            PDO::FETCH_ASSOC: returns an array indexed by column name as returned in your result set:
            $row = $result->fetch (PDO::FETCH_ASSOC)
            echo 'Title: ' . $row['Title'] . '<br>';

            Full list: https://www.php.net/manual/en/pdostatement.fetch.php
    */
    ?>
</table>
<!-- Display number of rows -->
<p>Your search yielded
    <?php print($result->rowCount()) ?> results.

    <?php
    //Release the returned data to free mysql resources
    $result->close();

    //Close the database connection - free the memory you have been using
    $pdo->close();
    ?>
</p>
</body>
</html>

