<?php
namespace EXAM\EXAM2;
final class Address{
    private string $streetAddr1;
    private string $streetAddr2;
    private string $city;
    private string $state;
    private string $zipCode;

    public function __construct($streetAddr1, $streetAddr2, $city, $state, $zipCode)
    {
        $this->streetAddr1 = $streetAddr1;
        $this->streetAddr2 = $streetAddr2;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
    }

    /**
     * @return string
     */
    public function getStreetAddr1(): string
    {
        return $this->streetAddr1;
    }

    /**
     * @param string $streetAddr1
     */
    public function setStreetAddr1(string $streetAddr1): void
    {
        $this->streetAddr1 = $streetAddr1;
    }

    /**
     * @return string
     */
    public function getStreetAddr2(): string
    {
        return $this->streetAddr2;
    }

    /**
     * @param string $streetAddr2
     */
    public function setStreetAddr2(string $streetAddr2): void
    {
        $this->streetAddr2 = $streetAddr2;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     */
    public function setZipCode(string $zipCode): void
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "Address: " . $this->streetAddr1 . " " . $this->streetAddr2 . " " . $this->city . " " . $this->state . " " . $this->zipCode. "<br>";
    }


}
