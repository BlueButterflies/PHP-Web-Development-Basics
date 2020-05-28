<?php
list($rows, $cols) = explode(", ", readline());

$matrix = [];

for($row = 0; $row < $rows; $row++){
    for ($col = 0; $col < $cols; $col++){
        $matrix[] = explode(", ", readline());
    }
}

$biggest = PHP_INT_MIN;
$small = PHP_INT_MAX;

for($row = 0; $row < $rows; $row++){
    for ($col = 0; $col < $cols; $col++){
        $value = $matrix[$row][$col];

        if ($value > $biggest){
            $biggest = $value;
        }

        if($value < $small){
            $small = $value;
        }
    }
}
echo "Min: $small\nMax: $biggest";

