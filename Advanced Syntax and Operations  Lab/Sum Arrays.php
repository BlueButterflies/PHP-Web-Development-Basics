<?php
$firstArray = array_map('intval',explode(" ", readline()));
$secondArray = array_map('intval',explode(" ", readline()));

$len = max(count($firstArray), count($secondArray));

for ($i = 0;$i < $len;$i++){
    $firstValue = $firstArray[$i % count($firstArray)];
    $secondValue = $secondArray[$i % count($secondArray)];

    echo $firstValue + $secondValue .' ';
}