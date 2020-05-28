<?php
list($rowCol, $pattern) = explode(", ", readline());

$rowCol = intval($rowCol);
$matrix = [];
$counter = 1;

if ($pattern == 'A'){
    for ($col = 0; $col < $rowCol; $col++){

        for ($row = 0; $row < $rowCol; $row++){
            $matrix[$row][$col] = $counter;
            $counter++;
        }
    }
}
else if ($pattern == 'B'){
    for ($col = 0; $col < $rowCol; $col++){

        if ($col % 2 == 0){
            for ($row = 0; $row < $rowCol; $row++){
                $matrix[$row][$col] = $counter;
                $counter++;
            }
        }
        else{
            for ($row = $rowCol - 1;$row >= 0; $row--){
                $matrix[$row][$col] = $counter;
                $counter++;

            }
        }
    }
}

foreach ($matrix as $output){
    echo implode(' ', $output) . PHP_EOL;
}
