<?php
$n = intval(readline());
$k = intval(readline());

$nums = array_fill(0,$n,0);

$nums[0] = 1;

for ($i = 0; $i < count($nums); $i++){
    $startIndex = max(0,$i - $k);

    $sum = 0;

    for ($j = $startIndex; $j <= $i;$j++){
        $sum += $nums[$j];
    }

    $nums[$i] = $sum;
}

echo  implode(" ", $nums);