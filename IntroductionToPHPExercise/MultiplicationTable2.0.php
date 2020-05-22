<?php
$numOne = intval(readline());
$numTwo = intval(readline());

$result = 0;

if ($numTwo > 10) {

    $result = $numOne * $numTwo;

    echo "$numOne X $numTwo = $result";
}
else{
    for ($i = $numTwo; $i <= 10;$i++){
         $result = $numOne * $i;

         echo "$numOne X $i = $result\n";
    }
}