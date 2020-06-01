<?php
//$phoneBook = [];

while (true){
    $input = trim(readline());

    if ($input == "Over"){
        break;
    }
    $commands = explode(" : ", $input);

    if (preg_match('/^[0-9]+$/', $commands[0])){
        $temp = $commands[0];

         $commands[0] = $commands[1];
         $commands[1] = $temp;
    }

    $phoneBook[$commands[0]] = $commands[1];
}

ksort($phoneBook);

foreach ($phoneBook as $firstElement => $phoneNumber){
    echo $firstElement ." -> ". $phoneNumber . PHP_EOL;
}