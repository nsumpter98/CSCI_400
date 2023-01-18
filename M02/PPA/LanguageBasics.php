<!DOCTYPE html>

<!--
PHP Language Basics (variables, concepts, data types, operators)

Awny Alnusair 
-->

<html>
   <head>
      <meta charset = "utf-8" />
      <title>PHP Basics</title>
	  <link rel="stylesheet" type="text/css" href="common.css" />
   </head>

   <body>

      <h2>PHP Variables:</h2>
      <ul>
      <li>Variable names must start with a $ sign.</li>
      <li>PHP is case-sensitive </li>
      <li>Follow the java naming convention</li>
      <li>Just like Javascript and Perl, PHP is a loosely-typed programming language. 
      You can use variables without declaring them and without providing a datatype: <br />
      PHP converts a var's data type automatically depending on the context. <br />
	  
      $myVar = 5;<br />
      echo "Output: ", $myVar + 10;<br />
      <pre>
      <?php 
      	$myVar = 5;
      	echo "Output: ",  $myVar + 10; 
      ?>
      </pre>
      </li>
      <li><strong>Data Types:</strong><br />
      PHP supports four scalar data types (scalar var contains only single value). 
      These are: Integer, Float (Double), String, Boolean <br /><br />
      PHP also supports two Compound data types: Array and Object<br /><br />
      PHP also supports two Special data types: <br />
      1- Resource: Contains a reference to a special resource such a file or a DB<br />
      2- Null: Meaning that the variable contains no value<br />
      </li>
      <li><strong>Finding the variable type:</strong><br />
      use the <em>gettype()</em> function <br /><br />
      <pre>
      	$tester;
      	#echo gettype($tester), "\n"; ... gives you a warning
      	$tester = 5;
      	echo gettype($tester), "\n";
      	$tester = 3.7;
      	echo gettype($tester), "\n";
      	$tester = true;
      	echo gettype($tester), "\n";
      	$tester = "hello";
      	echo gettype($tester), "\n";

      <?php 
      	$tester;
      	echo "<br />";
      	#echo gettype($tester), "\n"; 
      	$tester = 5;
      	echo gettype($tester), "\n";
      	$tester = 3.7;
      	echo gettype($tester), "\n";
      	$tester = true;
      	echo gettype($tester), "\n";
      	$tester = "hello";
      	echo gettype($tester), "\n";
      ?>
      </pre>
      </li>
      <li>
      To test a variable for a specific datatype, use one of the following <br />
      <em>is_int($var), is_float($var), is_string($var), is_bool($var), is_array($var), is_object($var), is_resource($var), is_null($var)</em><br />
        <pre>
      $tester = 70;
      $type = is_float($tester);
      echo gettype($type); 

      <?php 
      $tester = 70;
      $type = is_float($tester);
      echo gettype($type);
      ?>
      </pre>
      </li>
      <li>
      To set the type of a variable, use the function settype as in : <em>settype ($var, "integer");</em>
      </li>
      <li><strong>Casting:</strong> unlike settype, it doesn't change the actual value of the variable:<br />
      <pre>
      	$test_var = 8.23;
      	echo;
    	echo (int) $test_var; 
    	echo (float) $test_var;
    	echo (string) $test_var;
    	echo (boolean) $test_var;   
      <?php 
      $test_var = 8.23;
      echo "" . "<br />";
      echo (int) $test_var . "<br />";
      echo (float) $test_var . "<br />";
      echo (string) $test_var . "<br />";
      echo (boolean) $test_var . "<br />";
      ?>
      </pre>
      </li>
      
      <li><em><strong>intval(value), floatval(value), strval(value)</strong></em>: all these return value cast to int, float, or string</li>
      
	  </ul>
	  <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++  --> 
	  <h2>Operators and Expressions:</h2>
	  Arithmetic Operators: +, -, *, / , %<br />
	  Assignment Operators: =, +=, -=, etc <br />
	  Concatenation: 
	  <pre>
	  $a = "hello ... ";
	  $b = " and good bye";
	  echo $a .= $b, "\n";

	  <?php
	  $a = "hello ... ";
	  $b = " and good bye";
	  echo $a .= $b, "\n";
	  ?>
	 </pre>
	 Increment/Decrement: ++$x, $x++, etc. <br />
	 Comparison Operators: ==, != or <>, <, > , >=, <=, and <br />
	 ===: true if two vars are Identical (two vars equal each other and both are of the same datatype)<br />
	 !==: not identical<br /><br />
	 Logical Operators: (&& or 'and'), (|| or 'or'), xor, ! <br />
	 xor: $a xor $b: true if $a or $b (but not both) evaluate to true. <br /><br />
	 String operators (Concatenation operator): the dot (.) sign: <br />
	  <pre>
	  $a = "hello ... ";
	  $b = " and good bye";
	  echo $a . $b;

	  <?php
	  $a = "hello ... ";
	  $b = " and good bye";
	  echo $a . $b;
	  ?>
	 </pre>
	 
	 <pre>
	  $temp = 97;
	  echo $a . $b;

	  <?php
	  $a = "hello ... ";
	  $b = " and good bye";
	  echo $a . $b;
	  ?>
	 </pre>
	 <h2>Constants:</h2>
	 <ul>
      <li>Constants contain only scalar values</li>
      <li>Their names don't start with a dollar sign</li>
	  <li>Good practice to use all upper case letters for the name</li>
	  <li>To define constants, use the "define" function:<br />
	  <pre>
	  define ("My_CONSTANT", "It is 19");
	  echo My_CONSTANT, "\n";
	  define ("YOUR_CONSTANT", 19);
	  echo YOUR_CONSTANT;
	  <?php
	  define ("My_CONSTANT", "It is 19");
	  echo "" . "<br />";
	  echo My_CONSTANT, "\n";
	  define ("YOUR_CONSTANT", 19);
	  echo YOUR_CONSTANT;
	  ?>
	  </pre>
	  </li>
	  </ul>
   </body>
</html>