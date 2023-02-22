<?php
$bookid = $_POST['bookid'];
if (empty($bookid))
    $bookid_error = "Book ID is required";

//check if bookid exists in books table count
$query = "SELECT COUNT(*) FROM books WHERE ID = '$bookid'";


//if book exists - delete it


if (!($result = $pdo->query($query))) {
    print( "<p>Could not execute select book titles for each author query!</p>" );
    die("</body></html>");
} else {
    $row = $result->fetch();
    if ($row[0] == 1) {
        //delete from books_authors first
        $query = "DELETE FROM books_authors WHERE BID = '$bookid'";
        if (!($result = $pdo->query($query))) {
            print( "<p>Could not execute delete from books_authors query!</p>" );
            die("</body></html>");
        } else {
            echo "<h2>Book with ID = $bookid was successfully deleted from books_authors table</h2>";
        }
        //delete from books
        $query = "DELETE FROM books WHERE ID = '$bookid'";
        if (!($result = $pdo->query($query))) {
            print( "<p>Could not execute delete from books query!</p>" );
            die("</body></html>");
        } else {
            echo "<h2>Book with ID = $bookid was successfully deleted from books table</h2>";
        }
    } else {
        echo "<h2>Book with ID = $bookid does not exist</h2>";
    }
}


?>