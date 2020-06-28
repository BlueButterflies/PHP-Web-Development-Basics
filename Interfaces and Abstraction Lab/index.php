<?php

spl_autoload_register(function ($class){
    require_once  str_replace("\\", DIRECTORY_SEPARATOR, $class) .".php";
});

$vehicles = [];

try {
    $factory = new \Factories\VehicleFactory();

    $counter = 0;

    foreach (scandir('Vehicles') as $file) {
        if ($file == '.' || $file == '..'){
            continue;
        }
        $file = str_replace(".php", "", $file);
        $info = new ReflectionClass("Vehicle\\".$file);

        if (!$info->isAbstract() && !$info->isInterface()){
            $counter++;
        }
    }

    for ($i = 0; $i < $counter; $i++)
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
