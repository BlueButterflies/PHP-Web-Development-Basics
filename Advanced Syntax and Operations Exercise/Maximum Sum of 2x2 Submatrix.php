<?php
list($rows, $cols) = array_map('intval', explode(", ", readline()));


$matrix = [];

for ($row = 0; $row < $rows; $row++) {
    $matrix[$row] = array_map("intval", explode(", ", readline()));
}

$startCol = 0;
$startRow = 0;
$bestSum = 0;

for ($row = 0; $row < $rows - 1; $row++) {
    for ($col = 0; $col < count($matrix[$row]) - 1; $col++) {

        $currentSum = $matrix[$row][$col] + $matrix[$row][$col + 1] +
            $matrix[$row + 1][$col] + $matrix[$row + 1][$col + 1];

        if ($currentSum > $bestSum) {
            $bestSum = $currentSum;
            $startCol = $col;
            $startRow = $row;
        }
    }
}

for($row = $startRow; $row <= $startRow + 1; $row++) {
    for ($col = $startCol; $col <= $startCol + 1; $col++) {

        if ($row !== $startRow + 1 || $col !== $startCol + 1) {
            echo $matrix[$row][$col] . " ";
        } else {
            echo $matrix[$row][$col];
        }
    }
    echo PHP_EOL;
}
echo $bestSum;