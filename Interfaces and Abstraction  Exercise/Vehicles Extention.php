<?php

class Vehicle
{
    protected $fuelQuantity; //liters
    protected $fuelConsumption; //liters per km
    protected $summerConsumption; // the air condition fuel increases consumption in the summer
    protected $fuelWastage; // of holes in the tank
    protected $type;
    protected $tankCapacity;

    /**
     * Vehicle constructor.
     * @param $fuelQuantity
     * @param $fuelConsumption
     * @param $tankCapacity
     */
    public function __construct($fuelQuantity, $fuelConsumption, $tankCapacity) {
        $this->fuelQuantity = $this->setFuelQuantity($fuelQuantity);
        $this->fuelConsumption = floatval($fuelConsumption);
        $this->tankCapacity = floatval($tankCapacity);
    }

    /**
     * @param float $fuelQuantity
     */
    public function setFuelQuantity($fuelQuantity) {
        $fuelQuantity = floatval($fuelQuantity);
        if ($fuelQuantity  > 0 && $this->checkCapacity()) {
            return $this->fuelQuantity = $fuelQuantity;
        } else {
            return $this->fuelQuantity = 0;
        }

    }

    /**
     * @return float
     */
    public function getFuelQuantity(): float {
        return $this->fuelQuantity;
    }

    private function checkFuelQuantity() {
        if ($this->fuelQuantity < 0) {
            echo 'Fuel must be a positive number'."\n";
        }
    }

    private function checkCapacity($newFuel = 0) {
        if (($this->type == 'Car' || $this->type == 'Bus') && $this->fuelQuantity + $newFuel > $this->tankCapacity) {
            echo 'Cannot fit fuel in tank'."\n";
            return false;
        } else {
            return true;
        }
    }

    public function driveDistance($distance) {
        $distance = floatval($distance);
        $consumption = $this->fuelConsumption + $this->summerConsumption;
        if ($this->fuelQuantity >= $distance * $consumption) {
            $this->fuelQuantity -= $distance * $consumption;
            echo $this->type.' travelled '.$distance.' km'."\n";
        } else {
            echo $this->type.' needs refueling'."\n";
        }
        $this->checkFuelQuantity();

    }

    public function refuel($newFuel) {
        $newFuel = floatval($newFuel);
        if ($this->checkCapacity($newFuel)) {
            $this->fuelQuantity += $newFuel - ($this->fuelWastage * $newFuel);
        }
    }
}

class Car extends Vehicle
{
    /**
     * Car constructor.
     * @param $fuelQuantity
     * @param $fuelConsumption
     * @param $tankCapacity
     */
    public function __construct($fuelQuantity, $fuelConsumption, $tankCapacity) {
        parent::__construct($fuelQuantity, $fuelConsumption, $tankCapacity);
        $this->summerConsumption = 0.9; // per km
        $this->type = 'Car';
    }

    protected function checkCapacity() {
        if (($this->type == 'Car' || $this->type == 'Bus') && $this->fuelQuantity >= $this->tankCapacity) {
            echo 'Cannot fit fuel in tank';
            return false;
        } else {
            return true;
        }
    }
}

class Truck extends Vehicle
{
    /**
     * Truck constructor.
     * @param $fuelQuantity
     * @param $fuelConsumption
     * @param $tankCapacity
     */
    public function __construct($fuelQuantity, $fuelConsumption, $tankCapacity) {
        parent::__construct($fuelQuantity, $fuelConsumption, $tankCapacity);
        $this->fuelWastage = 0.05;
        $this->summerConsumption = 1.6; // per km
        $this->type = 'Truck';
    }
}

class Bus extends Vehicle
{
    /**
     * @var mixed
     */
    protected $people;

    /**
     * Bus constructor.
     * @param $fuelQuantity
     * @param $fuelConsumption
     * @param $tankCapacity
     * @param $people
     */
    public function __construct($fuelQuantity, $fuelConsumption, $tankCapacity, $people) {
        parent::__construct($fuelQuantity, $fuelConsumption, $tankCapacity);
        $this->type = 'Bus';
        $this->switchAC($people);
    }

    public function switchAC($people) {
        if ($people) {
            $this->summerConsumption = 1.4; // per km
        } else {
            $this->summerConsumption = 0; // per km
        }
    }
}

$carInfo = trim(fgets(STDIN));
$truckInfo = trim(fgets(STDIN));
$busInfo = trim(fgets(STDIN));

$carInfoArr = explode(' ', $carInfo);
$truckInfoArr = explode(' ', $truckInfo);
$busInfoArr = explode(' ', $busInfo);

$car = new Car(floatval($carInfoArr[1]), floatval($carInfoArr[2]), floatval($carInfoArr[3]));
$truck = new Truck(floatval($truckInfoArr[1]), floatval($truckInfoArr[2]), floatval($truckInfoArr[3]));
$bus = new Bus(floatval($busInfoArr[1]), floatval($busInfoArr[2]), floatval($busInfoArr[3]), true);

$commandsCount = trim(intval(fgets(STDIN)));

for ($i = 0; $i < $commandsCount; $i++) {
    $command = trim(fgets(STDIN));
    $commandArr = explode(' ', $command);

    if ($commandArr[0] == 'DriveEmpty') {
        $bus->switchAC(false);
    } else {
        $bus->switchAC(true);
    }
    if ($commandArr[0] == 'Drive' || $commandArr[0] == 'DriveEmpty') {
        if ($commandArr[1] == 'Car') {
            $car->driveDistance($commandArr[2]);
        } elseif ($commandArr[1] == 'Truck') {
            $truck->driveDistance($commandArr[2]);
        } elseif ($commandArr[1] == 'Bus') {
            $bus->driveDistance($commandArr[2]);
        }
    } elseif ($commandArr[0] == 'Refuel') {
        if ($commandArr[1] == 'Car') {
            $car->refuel($commandArr[2]);
        } elseif ($commandArr[1] == 'Truck') {
            $truck->refuel($commandArr[2]);
        } elseif ($commandArr[1] == 'Bus') {
            $bus->refuel($commandArr[2]);
        }
    }
}


echo 'Car: '.number_format($car->getFuelQuantity(), 2,'.', '')."\n";
echo 'Truck: '.number_format($truck->getFuelQuantity(), 2, '.', '')."\n";
echo 'Bus: '.number_format($bus->getFuelQuantity(), 2, '.', '');