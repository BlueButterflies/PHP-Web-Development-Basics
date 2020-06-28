<?php


namespace Factories;


use Vehicles\IVehicles;

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
        $className = "Vehicles\\". $type;

        if (class_exists($className)){
            return new $className($quantity, $consumption);

        }

        throw new \Exception("Class not exists");
    }
}