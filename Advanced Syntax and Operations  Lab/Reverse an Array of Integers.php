<?php
$n = intval(readline());

$array = array();

for ($i = 0; $i < $n; $i++){
    $array[$i] = intval(readline());
}
$array = array_reverse($array);
echo implode(" ", $array);