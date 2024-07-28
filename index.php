<?php

class car{
    private $make;
    private $model;
    private $vin;
    function __construct($make,$model,$vin)
    {
        $this->make = $make;
        $this->model = $model;
        $this->vin = $vin;
        
    }
    function getdetails(){
        echo $this->make;
        echo $this->model;
        echo $this->vin;
    }
    function __destruct()
    {
        echo "the odject is empty";
    }

}



class Inventory {
    private $cars;

    public function __construct() {
        $this->cars = [];
    }

    public function addCar($car) {
        $this->cars[] = $car;
    }

    public function removeCarByVin($vin) {
        foreach ($this->cars as $key => $car) {
            if ($car->getVin() === $vin) {
                unset($this->cars[$key]);
                $this->cars = array_values($this->cars); // reindex array
                return true;
            }
        }
        return false;
    }

    public function listCars() {
        return $this->cars;
    }
}

// Example usage
$inventory = new Inventory();
$car1 = new Car("1HGCM82633A123456", "Toyota", "Camry");
$car2 = new Car("1HGCM82633A654321", "Honda", "Civic");

$inventory->addCar($car1);
$inventory->addCar($car2);

echo "Cars in inventory:\n";
foreach ($inventory->listCars() as $car) {
    echo $car . "\n";
}

$inventory->removeCarByVin("1HGCM82633A123456");

echo "Cars in inventory after removal:\n";
foreach ($inventory->listCars() as $car) {
    echo $car . "\n";
}
