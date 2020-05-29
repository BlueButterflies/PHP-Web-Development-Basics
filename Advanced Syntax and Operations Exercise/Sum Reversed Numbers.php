<?php
$input = explode(" ", readline());

$sum = 0;

for($i = 0; $i < count($input); $i++){
    $reversedNums[$i] = intval(strrev($input[$i]));

    $sum += $reversedNums[$i];
}
echo $sum;


