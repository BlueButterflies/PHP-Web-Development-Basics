<?php
function modifyNumber($number)
{
    $result = str_split($number);
    $sum = array_sum($result);

    while ($sum / count($result) <= 5){
        $number .= "9";

        $result = str_split($number);
        $sum = array_sum($result);
    }

    return $number;
}

$number = readline();

echo modifyNumber($number);