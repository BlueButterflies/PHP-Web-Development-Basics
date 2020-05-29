<?php


$nums = readline();
$k = readline();

$inputArray = explode(" ", $nums);
$countInput = count($inputArray);
$lengthArray = [];
$sum = array();

for ($rows = 0; $rows < $k; $rows++) {
    $inputArray = array_merge(array_splice($inputArray,-1), $inputArray);
    $lengthArray[$rows] = $inputArray;

}
foreach ($lengthArray as $key => $valueSub) {
    foreach ($valueSub as $id => $value) {

        if (!isset($sum[$id])) {
            $sum{$id} = 0;
        }
        $sum[$id] += $value;
    }

}
foreach ($sum as $sumValue) {
    echo $sumValue . " ";
}
