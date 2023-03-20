<?php

require 'Address.php';

echo '<h2>Instantiating default Address</h2>';
$address_1 = new Address();
echo '<h2>Empty Address</h2>';
//print_r displays information about a variable in human readable format
echo '<pre>' . print_r($address_1, TRUE) . '</pre>';
$address_1 -> setPostalCode("46904"); // Calling the pre-defined set method

//Accessing the private property via the magic set method
$address_1 -> city_name = "Kokomo"; 
// Accessing the private property via the magic get method
echo "<br>" . $address_1 -> city_name . "<br>";

echo '<h2>Displaying address 1...</h2>';
echo $address_1;

//Testing Address __construct with an array;
$address_2 = new Address(array(
  'street_address_1' => '2300 South Washington Street',
  'city_name' => 'Kokomo',
  'postal_code' => '46904',
  'country_name' => 'USA',
));
echo '<h2>Displaying address 2...</h2>';
echo '<pre>' . print_r($address_2, TRUE) . '</pre>';
echo $address_2;
echo "<br><br>";
echo  Address::getNumAddresses() . " addresses have been created thus far";




















