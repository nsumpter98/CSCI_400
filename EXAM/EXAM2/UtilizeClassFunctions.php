<?php

namespace EXAM\EXAM2;

try {

    require_once "Address.php";
    require_once "CarOwner.php";
    require_once "SportsCar.php";
    require_once "SedanCar.php";





    //create new address
    $address = new Address("123 Main St", "", "Anytown", "NY", "12345");
    $address2 = new Address("456 Main St", "", "Anytown", "NY", "12345");

    //create new car owner
    $carOwner = new CarOwner("John Doe", $address);
    $carOwner2 = new CarOwner("Jane Doe", $address2);
    $carOwner3 = new CarOwner("John Doe", $address2);

    //create new SportsCar
    $sportsCar = new SportsCar("Ford", "Mustang", 2019, "123456789", $carOwner, "400", "400", "150");
    $sportsCar2 = new SportsCar("Ford", "Mustang", 2019, "123456789", $carOwner2, "400", "400", "150");
    $sportsCar3 = new SportsCar("Ford", "Mustang", 2019, "123456789", $carOwner2, "400", "400", "150");

    //create new SedanCar
    $sedanCar = new SedanCar("Ford", "Fusion", 2019, "123456789", $carOwner, "4", "400");
    $sedanCar2 = new SedanCar("Ford", "Fusion", 2019, "123456789", $carOwner2, "4", "400");
    $sedanCar3 = new SedanCar("Ford", "Fusion", 2019, "123456789", $carOwner2, "4", "400");


    echo "--------------------------\n";
    echo "Sports Cars:\n";
    echo "--------------------------\n";
    echo $sportsCar . "\n";
    echo $sportsCar2 . "\n";
    echo $sportsCar3 . "\n";

    echo "--------------------------\n";
    echo "Sedan Cars:\n";
    echo "--------------------------\n";
    echo $sedanCar . "\n";
    echo $sedanCar2 . "\n";
    echo $sedanCar3 . "\n";

    echo "--------------------------\n";
    echo "Owners:\n";
    echo "--------------------------\n";
    echo $sportsCar->getOwner() . "\n";
    echo $sportsCar2->getOwner() . "\n";
    echo $sportsCar3->getOwner() . "\n";
    echo $sedanCar->getOwner() . "\n";
    echo $sedanCar2->getOwner() . "\n";
    echo $sedanCar3->getOwner() . "\n";

    echo "--------------------------\n";
    echo "Addresses:\n";
    echo "--------------------------\n";
    echo $sportsCar->getOwner()->getAddress() . "\n";
    echo $sportsCar2->getOwner()->getAddress() . "\n";
    echo $sportsCar3->getOwner()->getAddress() . "\n";
    echo $sedanCar->getOwner()->getAddress() . "\n";
    echo $sedanCar2->getOwner()->getAddress() . "\n";

} catch (Exception $e) {
    echo $e->getMessage();
}
