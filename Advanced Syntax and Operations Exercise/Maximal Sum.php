<?php
list($rows, $cols) = array_map('intval', explode(" ", readline()));

$matrix = [];

for ($row = 0; $row < $rows; $row++) {
    $matrix[$row] = array_map('intval', explode(" ", readline()));
}

$startCol = 0;
$startRow = 0;
$bestSum = 0;

for ($row = 0; $row < $rows - 2; $row++) {
    for ($col = 0; $col < count($matrix[$row]) - 2; $col++) {

        $currentSum = $matrix[$row][$col] + $matrix[$row][$col + 1] +
            $matrix[$row][$col + 2] + $matrix[$row + 1][$col] +
            $matrix[$row + 1][$col + 1] + $matrix[$row + 1][$col + 2] +
            $matrix[$row + 2][$col] + $matrix[$row + 2][$col + 1] +
            $matrix[$row + 2][$col + 2];

        if ($currentSum > $bestSum) {
            $bestSum = $currentSum;
            $startCol = $col;
            $startRow = $row;
        }
    }
}

echo "Sum = " . $bestSum . PHP_EOL;

for($row = $startRow; $row <= $startRow + 2; $row++) {
    for ($col = $startCol; $col <= $startCol + 2; $col++) {
        echo $matrix[$row][$col] . " ";
    }
    echo PHP_EOL;
}