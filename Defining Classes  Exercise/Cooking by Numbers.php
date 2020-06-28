<?php
function chops($num){
    return $num / 2;
}

function dice($num){
   return sqrt($num);
}

function spice($num){
    return $num + 1;
}

function bake($num){
   return $num * 3;
}

function fillet($num){
    return $num - ($num * 0.20);
}

$number = intval(readline());
$commands = explode(", ", readline());

$newNumber = $number;

for ($i = 0; $i < 5; $i++){
    $operations = $commands[$i];

switch ($operations){
    case"chop":
        $newNumber = chops($newNumber);
        break;
    case"dice":
        $newNumber = dice($newNumber);
        break;
    case"spice":
        $newNumber = spice($newNumber);
        break;
    case "bake":
        $newNumber = bake($newNumber);
        break;
    case "fillet":
        $newNumber = fillet($newNumber);
        break;
}

echo $newNumber. PHP_EOL;
}