<?php


namespace Vehicles;


class Bus extends VehicleAbstract
{
    const FUEL_MODIFIER = 2;

    public function __construct(float $fuelQuantity, float $fuelConsumption)
    {
        parent::__construct($fuelQuantity, $fuelConsumption, self::FUEL_MODIFIER);
    }

}