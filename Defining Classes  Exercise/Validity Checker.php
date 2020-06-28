<?php
function validityCoordinates($x1, $y1, $x2, $y2)
{
    if (sqrt(pow(abs($x1 - $x2), 2) + pow((abs($y1 - $y2)), 2)) * 100 % 100 == 0) {
        return "{{$x1}, {$y1}} to {{$x2}, {$y2}} is valid";
    }

    return "{{$x1}, {$y1}} to {{$x2}, {$y2}} is invalid";
}


$coordinates = array_map('floatval', explode(", ", readline()));

$x1 = $coordinates[0];
$y1 = $coordinates[1];
$x2 = $coordinates[2];
$y2 = $coordinates[3];

echo validityCoordinates($x1,$y1,0,0) .PHP_EOL
    .validityCoordinates($x2,$y2,0,0) .PHP_EOL
    .validityCoordinates($x1,$y1,$x2,$y2);
