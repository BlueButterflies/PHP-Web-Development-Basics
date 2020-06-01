<?php
$infoPerson = [];

while (true){
    $commands = explode(" ", readline());

    $command = $commands[0];

    if ($command == "END"){
        break;
    }

    switch ($command){
        case"A":
            $name = $commands[1];
            $number = $commands[2];

            $infoPerson [$name] = $number;
            break;
        case"S":
            $name = $commands[1];

            if (key_exists($name, $infoPerson)){
                echo $name ." -> ". $infoPerson[$name]. PHP_EOL;
            }
            else{
                echo "Contact {$name} does not exist.\n";
            }
            break;
        case "ListAll":
            ksort($infoPerson);

            foreach ($infoPerson as $names => $phone)
            echo $names ." -> ". $phone. PHP_EOL;

            break;
    }
}