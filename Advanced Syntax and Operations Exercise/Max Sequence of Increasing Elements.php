<?php
$input = explode(" ", readline());

$maxCount = 0;
$startIndex = 0;
for ($row = 0 ; $row < count($input); $row++){
    $currentCount = 0;
    for ($col = $row ; $col < count($input) - 1; $col++){
        if ($input[$col] < $input[$col + 1]){
            $currentCount++;

            if ($currentCount > $maxCount){
                $maxCount = $currentCount;

                $startIndex = $row;
            }
        }
        else{
            break;
        }
    }
}

for ($i = 0; $i <= $maxCount; $i++){
    echo $input[$startIndex + $i] ." ";
}