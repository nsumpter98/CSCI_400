<!DOCTYPE html>

<!--
HTML5 Template For PHP practice
-->

<html>
   <head>
      <meta charset = "utf-8" />
      <title>Aruba Taxes</title>
	  <link rel="stylesheet" type="text/css" href="common.css" />
   </head>

   <body>

      <h3>Welcome to PHP! ......</h3>
	  <h3><?php echo "Calculating taxes in Aruba on income"; ?></h3>

      <?php
        	$income = 10000;

            if ($income <= 10000) {
                $tax = $income * 0.02;
            } else if ($income <= 25000) {
                $tax = (10000 * .02) + (($income - 10000) * .03);
            } else{
                $tax = .03 * $income;
            }

            echo "The tax is $tax";
      ?>
	  

	  
   </body>
</html>
