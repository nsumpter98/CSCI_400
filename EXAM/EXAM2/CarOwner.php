<?php
namespace EXAM\EXAM2;
final class CarOwner{
    private string $name;
    private Address $address;
    function __construct(string $name, Address $address)
    {
        $this->name = $name;
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     */
    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "Name: " . $this->name . " Address: " . $this->address. "<br>";
    }


}
