<!DOCTYPE html> 
<!-- Basic Example of Regular Expressions -->
<html lang="en">
   <head>
      <meta charset = "utf-8">
      <title>Regular expressions</title>
      <style type = "text/css">
         p { margin: 0; }
      </style>
   </head>
   <body>
      <?php
         $searchString = "Now is the time, 6:00PM";
         print( "<p>Test string is: '$searchString'</p>" );

         // call preg_match to search for pattern 'Now' in variable search
         if ( preg_match( "/Now/", $searchString ) )
            print( "<p>'Now' was found in this string.</p>" );

         // search for pattern 'Now' in the beginning of the string 
         if ( preg_match( "/^Now/", $searchString ) ) 
            print( "<p>'Now' found at beginning of the string.</p>" );
            
         // search for pattern 'Now' at the end of the string
         if ( !preg_match( "/Now$/", $searchString ) ) 
            print( "<p>'Now' was not found at the end of the string.</p>" );
            
         // search for any word ending in 'oW' - case insensitive
         if ( preg_match( "/\b([a-zA-Z]*ow)\b/i", $searchString, $matches ) )
            print( "<p>Word found ending in 'oW': " . $matches[ 0 ] . "</p>" );
          
         // search for any words beginning with 't'
         print( "<p>Words beginning with 't' found in this string: " );
		 while ( preg_match( "/\b(t[[:alpha:]]+)\b/i", $searchString, $match ) )
         {
            print( $match[ 0 ] . " " );

            // remove the first occurrence of a word beginning 
            // with 't' to find other instances in the string
            $searchString = preg_replace( "/" . $match[ 0 ] . "/", "", $searchString );
         } // end while  
		 
         // display the first instance of two digits that are after each other
         if ( preg_match( "/[0-9]{2}/", $searchString, $matches ) )
            print( "<p>First occurence of two digits: " . $matches[ 0 ] . "</p>" );
		
		//More complex example:
		$email = "firstn_ame.lastname@xxx.xxx";
		$regexp = "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+[.][A-z]{2,4}$/";

		if (preg_match($regexp, $email)) 
			echo "Email address is valid.";
		else
			echo "Email address is <u>not</u> valid.";
		
         print( "</p>" );
     ?>
	 <!-- 
	 Note that there are other RE functions in PHP, check out the following:
		preg_match_all: Perform a global regular expression match
		preg_replace(): Perform a regular expression search and replace
		preg_split: Split string by a regular expression
	 -->
   </body>
</html>
