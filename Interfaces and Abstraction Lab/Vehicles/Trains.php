<?php


namespace Vehicles;


class Trains extends VehicleAbstract
{
    const FUEL_MODIFIER = 10;

public function __construct(float $fuelQuantity, float $fuelConsumption)
{
    parent::__construct($fuelQuantity, $fuelConsumption, self::FUEL_MODIFIER);
}
}