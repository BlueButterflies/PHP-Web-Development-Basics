<?php
$n = intval(readline());

$matrix = [];
for ($i = 0; $i < $n; $i++){
    $matrix[] = explode(" ", readline());
}

$rightDiagonal = 0; $leftDiagonal = 0;

for ($row = 0; $row < count($matrix); $row++) {

    $rightDiagonal += $matrix[$row][$row];
    $leftDiagonal += $matrix[$row][count($matrix)-$row-1];

}

echo abs($rightDiagonal - $leftDiagonal);

