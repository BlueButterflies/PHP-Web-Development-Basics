<?php


namespace Vehicles;


interface IVehicles
{
    public function drive(float $distance): string;

    public function refuel(float $liters): void;
}