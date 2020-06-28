<?php
class Cargo{
    /** @var int */
    private $weight;

    /** @var string */
    private $type;

    /**
     * Cargo constructor.
     * @param int $weight
     * @param string $type
     */
    public function __construct(int $weight, string $type)
    {
        $this->weight = $weight;
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     */
    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }
}

class Engine{
    /** @var int */
    private $speed;

    /** @var int */
    private $power;

    /**
     * Engine constructor.
     * @param int $speed
     * @param int $power
     */
    public function __construct(int $speed, int $power)
    {
        $this->speed = $speed;
        $this->power = $power;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    /**
     * @param int $speed
     */
    public function setSpeed(int $speed): void
    {
        $this->speed = $speed;
    }

    /**
     * @return int
     */
    public function getPower(): int
    {
        return $this->power;
    }

    /**
     * @param int $power
     */
    public function setPower(int $power): void
    {
        $this->power = $power;
    }
}

class Tires{
    /** @var float */
    private $pressure;

    /** @var int */
    private $age;

    /**
     * Tires constructor.
     * @param float $pressure
     * @param int $age
     */
    public function __construct(float $pressure, int $age)
    {
        $this->pressure = $pressure;
        $this->age = $age;
    }

    /**
     * @return float
     */
    public function getPressure(): float
    {
        return $this->pressure;
    }

    /**
     * @param float $pressure
     */
    public function setPressure(float $pressure): void
    {
        $this->pressure = $pressure;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }
}

class Car{
    /** @var string */
    private $model;

    /** @var Engine */
    private $engine;

    /** @var Cargo */
    private $cargo;

    /** @var Tires[] */
    private $tires;

    /**
     * Car constructor.
     * @param string $model
     * @param Engine $engine
     * @param Cargo $cargo
     * @param Tires[] $tires
     */
    public function __construct(string $model, Engine $engine, Cargo $cargo, array $tires)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->cargo = $cargo;
        $this->tires = $tires;
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
     * @return Engine
     */
    public function getEngine(): Engine
    {
        return $this->engine;
    }

    /**
     * @param Engine $engine
     */
    public function setEngine(Engine $engine): void
    {
        $this->engine = $engine;
    }

    /**
     * @return Cargo
     */
    public function getCargo(): Cargo
    {
        return $this->cargo;
    }

    /**
     * @param Cargo $cargo
     */
    public function setCargo(Cargo $cargo): void
    {
        $this->cargo = $cargo;
    }

    /**
     * @return Tires[]
     */
    public function getTires(): array
    {
        return $this->tires;
    }

    /**
     * @param Tires[] $tires
     */
    public function setTires(array $tires): void
    {
        $this->tires = $tires;
    }
}

$cars = [];

$n = intval(readline());

while ($n--){
    $input = explode(" ", readline());

    $model= $input[0];
    $engineSpeed = intval($input[1]);
    $enginePower = intval($input[2]);
    $cargoWeigh = intval($input[3]);
    $cargoType = $input[4];
    $tire1Pressure = $input[5];
    $tire1Age = $input[6];
    $tire2Pressure = $input[7];
    $tire2Age = $input[8];
    $tire3Pressure = $input[9];
    $tire3Age = $input[10];
    $tire4Pressure = $input[11];
    $tire4Age = $input[12];

    $tiresInfo = [new Tires(floatval($tire1Pressure), intval($tire1Age)), new Tires(floatval($tire2Pressure), intval($tire2Age)),
        new Tires(floatval($tire3Pressure), intval($tire3Age)), new Tires(floatval($tire4Pressure), intval($tire4Age))];
    $engine = new Engine($engineSpeed, $enginePower);
    $cargo = new Cargo($cargoWeigh, $cargoType);

    $car = new Car($model, $engine, $cargo, $tiresInfo);

    $cars[] = $car;
}

$command = readline();

switch ($command){
    case "fragile":
        foreach ($cars as $car) {
            if ($car->getCargo()->getType() === 'fragile') {
                foreach ($car->getTires() as $tire) {
                    if ($tire->getPressure() < 1) {
                        echo $car->getModel() . "\n";
                        break;
                    }
                }
            }
        }
        break;
    case"flamable":
        $output = array_filter($cars, function (Car $car){ return $car->getCargo()->getType() == "flamable";});
        $output = array_filter($output, function (Car $car){
            return $car->getEngine()->getPower() > 250;
        });

        foreach ($output as $car){
            echo $car->getModel() . PHP_EOL;
        }
        break;
}