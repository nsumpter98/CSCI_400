<?php

require 'Person.php';

$person1 = new Person('John Doe', '123 Main St', 25);
$person2 = new Person('Jane Doe', '456 Main St', 24);

//increment age of person 1 by 5
$person1->setAge($person1->getAge() + 5);

//display person 1
echo $person1;

echo "<br/>";

//display person 2
echo $person2;