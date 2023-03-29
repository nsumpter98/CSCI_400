<?php
namespace EXAM\EXAM2;
require_once "Car.php";
final class SportsCar extends Car{
    private string $horsePower;
    private string $torque;
    private string $topSpeed;

    public function __construct($make, $model, $year, $vin, $owner, $horsePower, $torque, $topSpeed)
    {
        parent::__construct($make, $model, $year, $vin, $owner);
        $this->horsePower = $horsePower;
        $this->torque = $torque;
        $this->topSpeed = $topSpeed;
    }

    /**
     * @return string
     */
    public function getHorsePower(): string
    {
        return $this->horsePower;
    }

    /**
     * @param string $horsePower
     */
    public function setHorsePower(string $horsePower): void
    {
        $this->horsePower = $horsePower;
    }

    /**
     * @return string
     */
    public function getTorque(): string
    {
        return $this->torque;
    }

    /**
     * @param string $torque
     */
    public function setTorque(string $torque): void
    {
        $this->torque = $torque;
    }

    /**
     * @return string
     */
    public function getTopSpeed(): string
    {
        return $this->topSpeed;
    }

    /**
     * @param string $topSpeed
     */
    public function setTopSpeed(string $topSpeed): void
    {
        $this->topSpeed = $topSpeed;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "Make: " . $this->getMake() . " Model: " . $this->getModel() . " Year: " . $this->getYear() . " VIN: " . $this->getVin() . " Owner: " . $this->getOwner() . " Horse Power: " . $this->getHorsePower() . " Torque: " . $this->getTorque() . " Top Speed: " . $this->getTopSpeed(). "<br>";
    }
}
