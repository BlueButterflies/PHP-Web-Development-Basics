<?php
$coordinates = array_map('floatval', explode(", ", readline()));

$x1 = $coordinates[0];
$y1 = $coordinates[1];
$x2 = $coordinates[2];
$y2 = $coordinates[3];
$x3 = $coordinates[4];
$y3 = $coordinates[5];
shortWay($x1, $y1, $x2, $y2, $x3, $y3);

function shortWay(float $x1, float $y1, float $x2, float $y2, float $x3, float $y3)
{
    $distanceFirst = sqrt(pow(($x2 - $x1), 2) + pow(($y2 - $y1), 2));
    $distanceSecond = sqrt(pow(($x3 - $x2), 2) + pow(($y3 - $y2), 2));
    $distanceThird = sqrt(pow(($x3 - $x1), 2) + pow(($y3 - $y1), 2));

    if ($distanceFirst <= $distanceThird && $distanceThird >= $distanceSecond) {
        $result = $distanceFirst + $distanceSecond;
        echo "1->2->3: " . $result;
    } else if ($distanceFirst <= $distanceSecond && $distanceSecond > $distanceThird) {
        $result = $distanceFirst + $distanceThird;
        echo "2->1->3: " . $result;
    } else {
        $result = $distanceSecond + $distanceThird;
        echo "1->3->2: " . $result;
    }
}