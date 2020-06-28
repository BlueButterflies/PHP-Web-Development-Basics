<?php
interface IFerrari{
    public function model();
    public function brakes();
    public function pedalGas();
}

class Ferrari implements IFerrari{

    const MODEL_CAR = "488-Spider";
    const BRAKES = "Brakes!";
    const GAS_PEDAL = "Zadu6avam sA!";
    /**
     * @var string
     */
    private $driverName;

    /**
     * Ferrari constructor.
     * @param string $driverName
     */
    public function __construct(string $driverName)
    {
        $this->setDriverName($driverName);
    }

    /**
     * @return string
     */
    public function getDriverName(): string
    {
        return $this->driverName;
    }

    /**
     * @param string $driverName
     */
    protected function setDriverName(string $driverName): void
    {
        $this->driverName = $driverName;
    }

    public function model(): string {
        return self::MODEL_CAR;
    }

    public function brakes(): string {
        return self::BRAKES;
    }

    public function pedalGas(): string {
        return self::GAS_PEDAL;
    }

    public function __toString()
    {
        return $this->model().'/'.$this->brakes().'/'.$this->pedalGas().'/'.$this->getDriverName();
    }
}

$driverName = readline();

$info = new Ferrari($driverName);

echo $info;
