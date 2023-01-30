<!DOCTYPE html>

<!--
PHP Arrays
-->

<html>
   <head>
      <meta charset = "utf-8" />
    <title>PHP One-dimensional Arrays</title>

  </head>
  <body>

    <h2>Experimenting with PHP One-dimensional Arrays</h2>
	<?php
	/*
		An Array is a simple data structure that defines an indexed collection of fixed 
		number of homogenous data elements. 
	*/
		//Declaring and initializing arrays:
		$courses = array ("I211", "C400", "CS343");
		$courses[] = "I210";
		//Elements in PHP arrays can be of different data types:
		$courses [] = 300;
		$courses [5] = "CS343";
		
		echo $courses[0] . "<br />"; //I211
		echo $courses[4] . "<br />"; //300
		
		echo "<br />";
		//Iterating through arrays: 
		for ($c = 0; $c < count($courses); $c++)
			echo $courses[$c] . "&nbsp;&nbsp;&nbsp;";
		
		echo "<br />";
		/*
			Using foreach loop:
			The foreach construct provides an easy way to iterate over arrays. 
			foreach works only on arrays and objects, not with variables
		*/
		foreach ($courses as $cr)
			echo $cr . "&nbsp;&nbsp;&nbsp;";
		/*	
		print_r() displays info about a variable in a way that's readable by humans. 
        var_dump() displays structured info about a var that includes its type and value	
        var_export() — Outputs or returns a parsable string representation of a variable	
		*/		
		echo "<pre>";
		echo var_dump($courses);
		echo "</pre>";
		
		//Array functions:
		//array_values — Return all the values of an array
		//echo array_values($courses);
		//array_unique — Removes duplicate values from an array
		$unique_courses = array_unique($courses);
		echo "<pre>";
		echo var_dump($unique_courses);
		echo "</pre>";
		
		//You can use the in_array() and array_search() to search an array for a value:
		if (in_array("C400", $courses))
			echo "<p>The key is found in the courses array </p>";
		
		//Returning portions of an array:
		/*
		array_slice() returns the sequence of elements from the array as specified by 
		the offset and length parameters*/
		$topCourses = array_slice($courses, 0, 3);
		echo "<pre>";
		echo var_dump($topCourses);
		echo "</pre>";
		
		//Sorting arrays: there are so many functions to sort arrays. Here's an example:
		$grades = array (98, 78, 77, 23, 89);
		sort($grades);
		echo "<pre>";
		echo var_dump($grades);
		echo "</pre>";
		
		//Associative Arrays: are key-value arrays - creates arrays of alphanumeric keys:
		$stateCapitals = array (
		"Indiana" => "Indy",
		"Illinois" => "Springfield"
		);
		//Or using a different syntax:
		$stateCapitals["Indiana"] = "Indianapolis";
		$stateCapitals["Illinois"] = "Springfield";
		
		echo "<p>The capital of Indiana is {$stateCapitals['Indiana']}. </p>";
		echo "<p>The capital of Illinois is {$stateCapitals['Illinois']}. </p>";
		
		//Or using foreach loop:
		foreach ($stateCapitals as $state => $capital)
			echo "<p>The capital of $state is $capital </p>";

		
		//Stepping Through an Array:
		echo "<h4>Stepping Through an Array:</h4>";
		$authors = array( "Nixon", "Adams", "Smith", "Dickens" );

		echo "<p>The array: " . print_r( $authors, true ) . "</p>";

		echo "<p>The current element is: " . current( $authors ) . ".</p>";
		echo "<p>The next element is: " . next( $authors ) . ".</p>";
		echo "<p>...and its index is: " . key( $authors ) . ".</p>";
	?>

  </body>
</html>
