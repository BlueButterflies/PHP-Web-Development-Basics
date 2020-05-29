<?php
$sizeMatrix = array_map("intval", explode(", ", readline()));

$rows = $sizeMatrix[0];
$cols = $sizeMatrix[1];

$matrix = [];

for ($row = 0; $row < $rows; $row++){
    $matrix[$row] = array_map("intval", explode(", ", readline()));
}

$sum = 0;

for ($row = 0; $row < count($matrix); $row++){
    for ($col = 0; $col < count($matrix[$row]); $col++){
        $sum += $matrix[$row][$col];
    }
}

echo $rows . PHP_EOL;
echo $cols . PHP_EOL;
echo $sum;
