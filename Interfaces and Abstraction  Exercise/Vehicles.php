<?php
interface IVehicleFactories
{
    /**
     * @param string $type
     * @param float $quantity
     * @param float $consumption
     * @throws \Exception
     * @return IVehicles
     */
    public function create(string  $type, float $quantity, float $consumption):IVehicles;

}

class VehicleFactory implements IVehicleFactories{

    /**
     * @param string $type
     * @param float $quantity
     * @param float $consumption
     * @return IVehicles
     * @throws \Exception
     */
    public function create(string $type, float $quantity, float $consumption): IVehicles
    {
        $className = $type;

        if (class_exists($className)){
            return new $className($quantity, $consumption);

        }

        throw new \Exception("Class not exists");
    }
}

interface IVehicles
{
    public function drive(float $distance): string;

    public function refuel(float $liters): void;
}

abstract class VehicleAbstract implements IVehicles
{
    /** @var float */
    protected $fuelQuantity;

    /** @var float */
    protected $fuelConsumption;

    /** @var float */
    protected $modifier;

    /**
     * VehicleAbstract constructor.
     * @param float $fuelQuantity
     * @param float $fuelConsumption
     * @param float $modifier
     */
    public function __construct(float $fuelQuantity, float $fuelConsumption, float $modifier)
    {
        $this->fuelQuantity = $fuelQuantity;
        $this->modifier = $modifier;
        $this->fuelConsumption = $fuelConsumption + $modifier;

    }

    /**
     * @return float
     */
    public function getFuelQuantity(): float
    {
        return $this->fuelQuantity;
    }

    /**
     * @param float $fuelQuantity
     */
    public function setFuelQuantity(float $fuelQuantity): void
    {
        $this->fuelQuantity = $fuelQuantity;
    }

    /**
     * @return float
     */
    public function getFuelConsumption(): float
    {
        return $this->fuelConsumption;
    }

    /**
     * @param float $fuelConsumption
     */
    public function setFuelConsumption(float $fuelConsumption): void
    {
        $this->fuelConsumption = $fuelConsumption;
    }

    /**
     * @return float
     */
    public function getModifier(): float
    {
        return $this->modifier;
    }

    /**
     * @param float $modifier
     */
    public function setModifier(float $modifier): void
    {
        $this->modifier = $modifier;
    }

    public function drive(float $distance): string
    {
        if ($this->fuelQuantity >= $this->fuelConsumption * $distance){
            $this->fuelQuantity -= $this->fuelConsumption * $distance;

            return basename(get_class($this)).' '."travelled ".$distance.' km'.PHP_EOL;
        }

        return basename(get_class($this))." needs refueling".PHP_EOL;
    }

    public function refuel(float $liters): void
    {
        $this->fuelQuantity += $liters;
    }

    public function __toString()
    {
        return basename(get_class($this)).': '.number_format($this->fuelQuantity, 2,'.', '');
    }
}

class Car extends  VehicleAbstract
{
    const FUEL_MODIFIER = 0.9;

    public function __construct(float $fuelQuantity, float $fuelConsumption)
    {
        parent::__construct($fuelQuantity, $fuelConsumption, self::FUEL_MODIFIER);
    }
}

class Truck extends VehicleAbstract
{
    const FUEL_MODIFIER = 1.6;
    const REFUEL_MODIFIER = 0.95;

    public function __construct(float $fuelQuantity, float $fuelConsumption)
    {
        parent::__construct($fuelQuantity, $fuelConsumption, self::FUEL_MODIFIER);
    }

    public function refuel(float $liters): void
    {
        parent::refuel($liters * self::REFUEL_MODIFIER);
    }
}

$vehicles = [];

try {
    $factory = new VehicleFactory();

    for ($i = 0; $i < 2; $i++)
    {
        list($type, $quantity, $consumption) = explode(" ", readline());

        $vehicle = $factory->create($type,$quantity, $consumption);

        $vehicles[$type] = $vehicle;
    }

    $n = readline();

    for ($i = 0; $i < $n; $i++){

        list($action, $type, $param) = explode(" ", readline());

        $vehicle = $vehicles[$type];

        $action = strtolower($action);
        echo $vehicle->$action($param);
    }

    foreach ($vehicles as $vehicle) {
        echo $vehicle.PHP_EOL;

    }
}catch (Exception $exception){
    echo $exception->getMessage();
}