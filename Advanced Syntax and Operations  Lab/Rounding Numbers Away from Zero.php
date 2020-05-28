<?php
$numbs = explode(" ", readline());

$numbers = array_map('floatval', $numbs);
$arr = array();

for ($i = 0;$i < count($numbers);$i++){

    $arr = round($numbers[$i] , 0 ,PHP_ROUND_HALF_UP);

    echo "$numbs[$i] => $arr\n";
}