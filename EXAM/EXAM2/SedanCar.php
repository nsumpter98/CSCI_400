<?php
namespace EXAM\EXAM2;
require_once "Car.php";

final class SedanCar extends Car{
    private string $numberOfDoors;
    private float $trunkSizeInLiters;

    public function __construct($make, $model, $year, $vin, $owner, $numberOfDoors, $trunkSizeInLiters)
    {
        parent::__construct($make, $model, $year, $vin, $owner);
        $this->numberOfDoors = $numberOfDoors;
        $this->trunkSizeInLiters = $trunkSizeInLiters;
    }

    /**
     * @return string
     */
    public function getNumberOfDoors(): string
    {
        return $this->numberOfDoors;
    }

    /**
     * @param string $numberOfDoors
     */
    public function setNumberOfDoors(string $numberOfDoors): void
    {
        $this->numberOfDoors = $numberOfDoors;
    }

    /**
     * @return float
     */
    public function getTrunkSizeInLiters(): float
    {
        return $this->trunkSizeInLiters;
    }

    /**
     * @param float $trunkSizeInLiters
     */
    public function setTrunkSizeInLiters(float $trunkSizeInLiters): void
    {
        $this->trunkSizeInLiters = $trunkSizeInLiters;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "Sedan Car: " . $this->getMake() . " " . $this->getModel() . " " . $this->getYear() . " " . $this->getVin() . " " . $this->getOwner() . " " . $this->getNumberOfDoors() . " " . $this->getTrunkSizeInLiters(). "<br>";
    }


}
