<?php
namespace EXAM\EXAM2;


abstract class Car
{
    private string $make;
    private string $model;
    private int $year;
    private string $vin;
    private CarOwner $owner;

    public function __construct($make, $model, $year, $vin, $owner)
    {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
        $this->vin = $vin;
        $this->owner = $owner;
    }

    /**
     * @return string
     */
    public function getMake(): string
    {
        return $this->make;
    }

    /**
     * @param string $make
     */
    public function setMake(string $make): void
    {
        $this->make = $make;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @return string
     */
    public function getVin(): string
    {
        return $this->vin;
    }

    /**
     * @param string $vin
     */
    public function setVin(string $vin): void
    {
        $this->vin = $vin;
    }

    /**
     * @return CarOwner
     */
    public function getOwner(): CarOwner
    {
        return $this->owner;
    }

    /**
     * @param CarOwner $owner
     */
    public function setOwner(CarOwner $owner): void
    {
        $this->owner = $owner;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "Make: " . $this->make . ", Model: " . $this->model . ", Year: " . $this->year . ", VIN: " . $this->vin . ", Owner: " . $this->owner . "<br>";
    }


}
