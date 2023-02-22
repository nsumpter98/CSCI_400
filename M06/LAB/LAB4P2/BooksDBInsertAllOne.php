<!DOCTYPE html>

<!-- Create a functioning form so people can use to add books to the database -->

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>Adding records to the books DB</title>
    <style type="text/css">
        label {
            width: 5em;
            float: left;
        }

        .error {
            color: #ff0000;
            font-weight: bold;
            border: 0px none;
        }
    </style>
</head>
<body>
<?php

require_once 'login.php';

$displayForm = true;
$inputError = false;

// Connect to MySQL Server

//Connect to MySQL Server: create a new object named $pdo
try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch (PDOException $e) {
    echo "test";
    /*throw new PDOException($e->getMessage(), (int)$e->getCode());*/
}

//===========================================================================
$bookid = "";
$bookid_error = "";
$title = "";
$title_error = "";
$category = "";
$category_error = "";
$isbn = "";
$isbn_error = "";
$price = "";
$price_error = "";
$author_error = "";
$authors_ids = array(
    "Paul Deitel" => "A1111",
    "John Ulman" => "A2222",
    "Johny Scott" => "A3333",
    "Scott Davis" => "A4444",
    "Norman Finkelstein" => "A5555"
);
//===========================================================================
if (isset($_POST['addbook'])) {
    $bookid = $_POST['bookid'];
    if (empty($bookid))
        $bookid_error = "Book ID is required";
    $title = $_POST['title'];
    if (empty($title))
        $title_error = "Title is required";
    $category = $_POST['category'];
    if (empty($category))
        $category_error = "Category is required";
    $isbn = $_POST['isbn'];
    if (empty($isbn))
        $isbn_error = "ISBN is required";
    $price = $_POST['price'];
    if (!is_numeric($price))
        $price_error = "Price must be a numeric value";

    //PHP receive only selected checkboxes. Not selected checkboxes are not send by browser
    //So author[] is unknown to PHP unless the user has selected at least one index
    if (isset($_POST['author']))
        $author_arr = $_POST['author'];
    else
        $author_error = "Must select at least one author";


    if (!empty($bookid_error) || !empty($title_error) || !empty($category_error) ||
        !empty ($isbn_error) || !empty ($price_error) || !empty ($author_error))
        $inputError = true;
    //===========================================================================
    if ($inputError == false) {
        //Write your code below to insert into the books with a confirmation messages if insert was successful:
        $book_insert = "INSERT INTO books (ID, Title, Category, ISBN, Price) 
        VALUES (\"$bookid\", \"$title\", \"$category\", $isbn, $price)";

        if (!($result = $pdo->query($book_insert))) {
            print("<p>Could not INSERT</p>");
            die("</body></html>");
        }


        foreach ($author_arr as $author) {

            $authorId = $authors_ids[$author];

            $query = "INSERT INTO books_authors (BID, AID)
            VALUES (\"$bookid\", \"$authorId\")";

            if (!($result = $pdo->query($query))) {
                print("<p>Could not INSERT</p>");
                die("</body></html>");
            }

        }


        //Write your code below to insert into the books-authors table as well:


        //Display a message indicating that the table is uccessfully updated:
        echo "<h2>Successfully inserted</h2>";

        //Display all book ids and titles that are authored by each author whose name was checked in the
        //form during the insert operation:
        foreach ($author_arr as $author) {
            $query_author_titles = "SELECT books.Title FROM books, authors, books_authors ";
            $query_author_titles .= "WHERE books.ID = books_authors.BID AND authors.ID = books_authors.AID ";
            $query_author_titles .= "AND authors.Name = \"$author\"";
            if (!($result = $pdo->query($query_author_titles))) {
                print("<p>Could not execute select book titles for each author query!</p>");
                die("</body></html>");
            } else {
                echo "<p><strong>All books authord by " . "$author" . ":</strong></p>";
                while ($row = $result->fetch(PDO::FETCH_NUM)) {
                    foreach ($row as $value)
                        print("$value" . "<br>");
                }
            }
        }
        $displayForm = false;
        echo ">Add some more?</a></p>\n";
    }
}
//===========================================================================
if ($displayForm) {
    ?>
    <p>Use the following form to add a book to the book's database:</p>
    <form method="post" action="BooksDBInsertAllOne.php">
        <p>Book ID:</p>
        <p><input type="text" name="bookid" size="40" value="<?php echo $bookid; ?>">
            &nbsp;<input type="text" id="bookid_error" class="error" size="40" value="<?php echo $bookid_error; ?>">
        </p>
        <p>Title:</p>
        <p><input type="text" name="title" size="40" value="<?php echo $title; ?>">
            &nbsp;<input type="text" id="title_error" class="error" size="40" value="<?php echo $title_error; ?>"></p>
        <p>Category:</p>
        <p><input type="text" name="category" size="40" value="<?php echo $category; ?>">
            &nbsp;<input type="text" id="category_error" class="error" size="40" value="<?php echo $category_error; ?>">
        </p>
        <p>ISBN:</p>
        <p><input type="text" name="isbn" size="40" value="<?php echo $isbn; ?>">
            &nbsp;<input type="text" id="isbn_error" class="error" size="40" value="<?php echo $isbn_error; ?>"></p>
        <p>Price:</p>
        <p><input type="text" name="price" size="40" value="<?php echo $price; ?>">
            &nbsp;<input type="text" id="price_error" class="error" size="40" value="<?php echo $price_error; ?>"></p>
        <p>
        <fieldset>
            <input type="text" id="author_error" class="error" size="40" value="<?php echo $author_error; ?>">
            <legend>Select the author(s) of this book:</legend>
            <!-- Below, We needed !empty($author_arr) because an array is not considered to be an array until it is filled with at least one value. -->
            <br/>
            <input type="checkbox" name="author[]"
                   value="Paul Deitel" <?php echo (!empty($author_arr) && in_array("Paul Deitel", $author_arr)) ? "checked" : ""; ?>/>Paul
            Deitel <br/>
            <input type="checkbox" name="author[]"
                   value="John Ulman" <?php echo (!empty($author_arr) && in_array("John Ulman", $author_arr)) ? "checked" : ""; ?>/>John
            Ulman <br/>
            <input type="checkbox" name="author[]"
                   value="Johny Scott" <?php echo (!empty($author_arr) && in_array("Johny Scott", $author_arr)) ? "checked" : ""; ?>/>Johny
            Scott" <br/>
            <input type="checkbox" name="author[]"
                   value="Scott Davis" <?php echo (!empty($author_arr) && in_array("Scott Davis", $author_arr)) ? "checked" : ""; ?>/>Scott
            Davis <br/>
            <input type="checkbox" name="author[]"
                   value="Norman Finkelstein" <?php echo (!empty($author_arr) && in_array("Norman Finkelstein", $author_arr)) ? "checked" : ""; ?>/>Norman
            Finkelstein <br/>
        </fieldset>
        </p>
        <p>
            <input type="submit" name="addbook" value="Add Book"/>&nbsp;&nbsp;
            <input type="reset" name="reset" value="Reset"/>
        </p>
    </form>
    <?php
}
?>
</body>
</html>

