<?php
require 'Address.php';
/*
 Employee class: The system maintains one address for every employee but the 
 address may belong to multiple employees. 
*/

//Abstract class: Can't be instantiated
abstract class Employee {

  // Member variables:
  protected $employee_name;
  protected $employee_address; // Composition: A reference to address
  
  //Default constructor:
  function Employee() {
	$this -> employee_name = "";
	//This is why it is a composition relationship, not Aggregation:
	$this -> employee_address = new Address();
  }
  /**
   * Constructor.
   * @param array $propertiesArray array of property names and values.
   */
  function __construct($propertiesArray = array()) {
    if (count($propertiesArray) > 0) {
      foreach ($propertiesArray as $name => $value) {
        $this -> $name = $value;
      }
    }
  }
  //__get and __set, which are “magic methods” in PHP:
  
  
  public function __set($property, $value) {
    if (property_exists($this, $property)) {
      $this -> $property = $value;
    }
  }
  public function __get($property) {
    if (property_exists($this, $property)) {
      return $this -> $property;
    }
  }

  /*
  public function setName($name) {
	$this->employee_name = $name;
  } 
  public function getName() {
	return $this->employee_name;
  }
  public function setAddress($address) {
	$this->employee_address = $address;
  }
  public function getAddress() {
	return $this->employee_address;
  } 
  */
  //Abstract function - must be overriden by sub-classes. This function must have no body
  abstract public function calculateWeeklyPay();
  /**
   * Display an address in HTML.
   * @return string 
   */
  function __toString() {
    $output = '';
    
    $output .= $this -> employee_name . '<br/>';
    $output .= $this -> employee_address->__toString();

    $output .= '<br/>';
    
    return $output;
  }

}//end class Employee

//*********** Sub classes ********************************
//********************************************************

final class SalaryEmployee extends Employee {
	private $annualSalary;
	
	//Constructor:
	function __construct($annualSalary) {
		parent::__construct(); // calling the super constructor
		$this -> annualSalary = $annualSalary;
	}
	function setAnnualSalary($annualSalary) {
		$this -> annualSalary = $annualSalary;
	}
  
	function getAnnualSalary() {
		return $this -> annualSalary;
	}
	
	//Method Overriding
	function calculateWeeklyPay() {
		return $this -> annualSalary/52;
	}
  
	/**
	* Magic __toString
	* @return string
	*/
	function __toString() {
	    //Calling the display method in the parent class:
		$output = parent::__toString();
		$output .= 'Salary is $' . $this->annualSalary . ', so the weekly pay is $' . $this->calculateWeeklyPay();
		return $output;
	}
}//end SalaryEmployee
//********************************************************
final class HourlyEmployee extends Employee {

	private $hourly_rate;
	private $number_hours;
	
	//Constructor:
	function __construct($hourly_rate, $number_hours) {
		parent::__construct(); // calling the super constructor
		$this->hourly_rate = $hourly_rate;
		$this->number_hours = $number_hours;
	}
	//Default constructor:
	function HourlyEmployee() {
		$this -> Employee();
		$this -> hourly_rate = 0;
		$this -> number_hours = 0;
	}
	//__get and __set:
	public function __get($property) {
		if (property_exists($this, $property)) {
			return $this -> $property;
		}
	}
	public function __set($property, $value) {
		if (property_exists($this, $property)) {
			$this -> $property = $value;
		}
	}
    //Method Overriding
	function calculateWeeklyPay() {
		if($this -> number_hours <= 40)
			return $this -> number_hours * $this -> hourly_rate;
		else
			return ($this -> hourly_rate * 40) + ($this -> number_hours - 40) * (2 * $this -> hourly_rate);
	}
	/**
	* Magic __toString
	* @return string
	*/
	function __toString() {
	   	//Calling the display method in the parent class:
		$output = parent::__toString();
		$output .= 'Hourly rate is $' . $this->hourly_rate . 
		'. Hours worked is ' . $this -> number_hours .', so the weekly pay is $' . $this -> calculateWeeklyPay();
		return $output;
	}
}//end HourlyEmployee





















