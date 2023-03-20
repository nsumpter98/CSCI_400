<?php

/**
 * A PHP class that represents a Physical address.
 */
class Address
{

    // Member variables (Class Properties)
    /**
     * @var string
     */
    private string $street_address_1;
    /**
     * @var string
     */
    private string $street_address_2;
    /**
     * @var string
     */
    private string $city_name;
    /**
     * @var string
     */
    private string $subdivision_name;
    /**
     * @var string
     */
    private string $country_name;
    /**
     * @var mixed
     */
    private mixed $postal_code;

    //A property that counts the number of addresses created thus far
    /**
     * @var int
     */
    private static int $address_count = 0;

    /**
     * Constructor.
     * @param array $propertiesArray array of property names and values
     */

    //Note that only one constructor is allowed when using __construct
    /**
     * @param array $propertiesArray
     */
    function __construct(array $propertiesArray = array())
    {
        // If there is at least one value in the array, populate the Address with it
        if (count($propertiesArray) > 0) {
            foreach ($propertiesArray as $name => $value) {
                $this->$name = $value;
            }
        }
        Address::$address_count++;
    }

    /**
     * @return int
     */
    public static function getNumAddresses(): int
    {
        return Address::$address_count;
    }

    /**
     * @param $postal_code
     * @return void
     */
    function setPostalCode($postal_code): void
    {
        if (!$postal_code == "")
            $this->postal_code = $postal_code;
        else
            $this->postal_code = $this->postal_code_guess();
    }

    /**
     * @return mixed
     * @noinspection PhpUnused
     */
    function getPostalCode(): mixed
    {
        return $this->postal_code;
    }

    /**
     * Guess the postal code given the subdivision and city name.
     * @return string
     * @todo Replace with a database lookup.
     */
    protected function postal_code_guess(): string
    {
        return 'Finding the postal code ....'; //will need to be implemented
    }
    //In PHP, you can automatically generate Getters and Setters using
    //__get and __set, which are “magic methods” in PHP.
    //Any method begins with __ is called a magic method in php
    /**
     * @param $property
     * @param $value
     * @return void
     */
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    /**
     * @param $property
     * @return void
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    /**
     * Magic __toString
     * @return string
     */
    function __toString()
    {
        $output = $this->street_address_1;
        if ($this->street_address_2) {
            $output .= '<br/>' . $this->street_address_2;
        }
        $output .= '<br/>';
        $output .= $this->city_name . ', ' . $this->subdivision_name;
        $output .= ' ' . $this->postal_code;

        $output .= '<br/>';
        $output .= $this->country_name;

        return $output;
    }
}//end class Address

























