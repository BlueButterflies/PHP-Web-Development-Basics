<?php
$numbers = array_map("intval", explode(" ", readline()));

while (count($numbers) > 1){
    $condensed = [count($numbers) - 1];

    for ($i = 0; $i < count($numbers) - 1; $i++){
        $condensed[$i] = $numbers[$i] + $numbers[$i+ 1];
    }

    $numbers = $condensed;
}

echo  implode(" ", $numbers);