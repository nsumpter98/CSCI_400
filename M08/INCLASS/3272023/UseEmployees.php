<?php

require 'Employee.php';

$address_1 = new Address(array(
  'street_address_1' => '2300 South Washington street',
  'city_name' => 'Kokomo',
  'postal_code' => '46904',
  'country_name' => 'USA',
));
$address_2 = new Address(array(
  'street_address_1' => '1360 Carmel Dr',
  'city_name' => 'Carmel',
  'postal_code' => '46033',
  'country_name' => 'USA',
));

echo '<h2>Instantiating a salary employee</h2>';

$salaryEmployee1 = new SalaryEmployee(100000);
$salaryEmployee1 -> employee_name = "Johny Jones";
$salaryEmployee1 -> employee_address = $address_1;

echo '<pre>' . print_r($salaryEmployee1, TRUE) . '</pre>';
echo $salaryEmployee1; // made possible by the __toString method 

echo "<br><br>";

/*********************************
Testing the HourlyEmployee class 
*********************************/
echo '<h2>Instantiating a hourly employee</h2>';

$hourlyEmployee1 = new HourlyEmployee (25, 45);
$hourlyEmployee1 -> employee_name = "Jimmy Jones";
$hourlyEmployee1 -> employee_address = $address_2;

echo '<pre>' . print_r($hourlyEmployee1, TRUE) . '</pre>';
echo $hourlyEmployee1; 

//Using arrays of objects:
echo "<br><br>" . "*********************************" . "<br><br>" ;
$employeesArray = array($salaryEmployee1, $hourlyEmployee1);
for ($c = 0; $c < count($employeesArray); $c++)
	echo $employeesArray[$c] . "<br><br>";
