<?php
class Car{
    /** @var string */
    private $model;

    /** @var float */
    private $fuelAmount;

    /** @var float */
    private $fuelConsumptionPerKm;

    /** @var float */
    private $distance;

    /**
     * Car constructor.
     * @param string $model
     * @param float $fuelAmount
     * @param float $fuelConsumptionPerKm
     * @param float $distance;
     */
    public function __construct(string $model, float $fuelAmount, float $fuelConsumptionPerKm, float  $distance = 0)
    {
        $this->setModel($model);
        $this->setFuelAmount($fuelAmount);
        $this->setFuelConsumptionPerKm($fuelConsumptionPerKm);
        $this->setDistance();
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
     * @return float
     */
    public function getFuelAmount(): float
    {
        return $this->fuelAmount;
    }

    /**
     * @param float $fuelAmount
     */
    public function setFuelAmount(float $fuelAmount): void
    {
        $this->fuelAmount = $fuelAmount;
    }

    /**
     * @return float
     */
    public function getFuelConsumptionPerKm(): float
    {
        return $this->fuelConsumptionPerKm;
    }

    /**
     * @param float $fuelConsumptionPerKm
     */
    public function setFuelConsumptionPerKm(float $fuelConsumptionPerKm): void
    {
        $this->fuelConsumptionPerKm = $fuelConsumptionPerKm;
    }

    /**
     * @return float
     */
    public function getDistance(): float
    {
        return $this->distance;
    }

    /**
     * @param float $distance
     */
    public function setDistance(float $distance = 0): void
    {
        $this->distance = $distance;
    }

    public function CalculatedTravelDistance(float  $amountPerKm): bool
    {
        if ($amountPerKm * $this->getFuelConsumptionPerKm()<= $this->getFuelAmount()){

            $this->setFuelAmount(round($this->getFuelAmount(),2) - $this->getFuelConsumptionPerKm() * $amountPerKm);
            $this->setDistance($this->getDistance() + $amountPerKm);
            return true;
        }
        else{
            return  false;
        }
    }

    public function __toString()
    {
        return $this->getModel().' '. number_format(abs($this->getFuelAmount()),2,".", "").' '.$this->getDistance(). PHP_EOL;
    }
}

$cars = [];

$n = intval(readline());

for ($i = 0; $i < $n; $i++){
    $infoCar = explode(' ', trim(readline()));

    $model = $infoCar[0];
    $fuelAmount = floatval($infoCar[1]);
    $fuelConsumptionPerKm = floatval($infoCar[2]);

    $car =  new Car($model, $fuelAmount, $fuelConsumptionPerKm);

    $cars[$model] = $car;
}

$input =  trim(readline());

while ($input != 'End'){

    $splitInput = explode(" ", $input);

    $command = $splitInput[0];
    $modelCar = $splitInput[1];
    $distance = $splitInput[2];

    $result = $cars[$modelCar]->CalculatedTravelDistance($distance);

    if (!$result){
        echo "Insufficient fuel for the drive". PHP_EOL;
    }
    $input =  readline();
}

foreach ($cars as $car)
{
    echo $car;
}
