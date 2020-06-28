<?php


namespace Factories;


use Vehicles\IVehicles;

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