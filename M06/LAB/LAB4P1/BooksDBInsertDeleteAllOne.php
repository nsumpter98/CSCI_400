<!DOCTYPE html>

<!-- Create a functioning form so people can use it to add/remove books -->
 
<html xmlns = "http://www.w3.org/1999/xhtml">
   <head>
      <meta charset="utf-8">
      <title>Adding and Removing records to the books DB</title>
	  <style type = "text/css">
         label  { width: 5em; float: left; }
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
	
    //Connect to MySQL Server: create a new object named $pdo
	try {
		$pdo = new PDO($dsn, $dbUser, $dbPassword);
	}
	catch (PDOException $e){
		die("Could not connect to the database server!" . "</body></html>" );
		//throw new PDOException($e->getMessage(), (int)$e->getCode());
	}
	//===========================================================================
	$bookid = ""; $bookid_error="";
	$title=""; $title_error="";
	$category=""; $category_error="";
	$isbn = ""; $isbn_error="";
	$price = ""; $price_error="";
	$author_error = "";
	$authors_ids = array (
		"Paul Deitel" => "A1111",
		"John Ulman" => "A2222",
		"Johny Scott" => "A3333",
		"Scott Davis" => "A4444",
		"Norman Finkelstein" => "A5555"
	);
	//===========================================================================
	if (isset($_POST['addbook'])) {
		//Create addop.php using the code that you have created for part 1 of the lab
		if(!@include("addop.php")) 
			die ("Couldn't open a required file, 'addop.php'");
		else
			require_once 'addop.php';
	}
	//===========================================================================
	if (isset($_POST['deletebook'])) {
		//deleteop.php needs to be created from scratch
		if(!@include("deleteop.php")) 
			die ("Couldn't open a required file, 'deleteop.php'");
		else
			require_once 'deleteop.php';
	}
	//===========================================================================
	if ($displayForm) {
	?>
      <p>Use the following form to add or remove a book to/from the book's database <br>
		 If you are removing a book, you need to enter only the book's ID
	  </p>
      <form method = "post" action = "BooksDBInsertDeleteAllOne.php">
	     <p>Book ID:</p>
         <p><input type = "text" name = "bookid" size = "40" value="<?php echo $bookid; ?>">
		 &nbsp;<input type="text" id="bookid_error" class ="error" size = "40" value="<?php echo $bookid_error; ?>">
		 </p>
         <p>Title:</p>
         <p><input type = "text" name = "title" size = "40" value="<?php echo $title; ?>">
		 &nbsp;<input type="text" id="title_error" class ="error" size = "40" value="<?php echo $title_error; ?>"></p>
		 <p>Category:</p>
         <p><input type = "text" name = "category" size = "40" value="<?php echo $category; ?>">
		 &nbsp;<input type="text" id="category_error" class ="error" size = "40" value="<?php echo $category_error; ?>"></p>
		 <p>ISBN:</p>
         <p><input type = "text" name = "isbn" size = "40" value="<?php echo $isbn; ?>">
		 &nbsp;<input type="text" id="isbn_error" class ="error" size = "40" value="<?php echo $isbn_error; ?>"></p>
		 <p>Price:</p>
         <p><input type = "text" name = "price" size = "40" value="<?php echo $price; ?>">
		 &nbsp;<input type="text" id="price_error" class ="error" size = "40" value="<?php echo $price_error; ?>"></p>
		 <p>
		 <fieldset>
				<input type="text" id="author_error" class ="error" size = "40" value="<?php echo $author_error; ?>">
                <legend>Select the author(s) of this book: </legend>
		  <!-- Below, We needed !empty($author_arr) because an array is not considered to be an array until it is filled with at least one value. -->
		  <br />
		  <input type="checkbox" name="author[]" value="Paul Deitel" <?php echo (!empty($author_arr) && in_array("Paul Deitel", $author_arr))  ? "checked" : "";?>/>Paul Deitel <br />
		  <input type="checkbox" name="author[]" value="John Ulman" <?php echo (!empty($author_arr) && in_array("John Ulman", $author_arr)) ? "checked" : "";?>/>John Ulman <br />
		  <input type="checkbox" name="author[]" value="Johny Scott" <?php echo (!empty($author_arr) && in_array("Johny Scott", $author_arr)) ? "checked" : "";?>/>Johny Scott" <br />
		  <input type="checkbox" name="author[]" value="Scott Davis" <?php echo (!empty($author_arr) && in_array("Scott Davis", $author_arr)) ? "checked" : "";?>/>Scott Davis <br />
          <input type="checkbox" name="author[]" value="Norman Finkelstein" <?php echo (!empty($author_arr) && in_array("Norman Finkelstein", $author_arr)) ? "checked" : "";?>/>Norman Finkelstein <br />
		</fieldset>
		 </p>
		 <p>
			<input type = "submit" name="addbook" value = "Add Book" />&nbsp;&nbsp;
			<input type = "submit" name="deletebook" value = "Delete Book" />&nbsp;&nbsp;
			<input type="reset" name="reset" value="Reset" />
		</p>
      </form>
	<?php
	}
	?>
   </body>
</html>

