<?php
$num = (int)readline();

$sum = 0;

for ($i = 1;$i <= $num; $i++) {

    $currentNum = $i;

    while ($currentNum > 0) {
        $sum += $currentNum % 10;
        $currentNum /= 10;
    }

    if ($sum == 5 || $sum == 7 || $sum == 11){
        echo "$i -> True\n";
    }
    else {
        echo "$i -> False\n";
    }
}