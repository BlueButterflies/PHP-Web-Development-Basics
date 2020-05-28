<?php
$line = trim(fgets(STDIN));
$lineArray = explode(" ", $line);
$arrayCount = array_count_values($lineArray);
ksort($arrayCount);

foreach ($arrayCount as $key => $value) {
    echo "{$key} -> {$value}\n";
}