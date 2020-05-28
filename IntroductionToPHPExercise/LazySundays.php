<?php
$month = readline();
$year = 2018;
$totalDays = date("t");

for($i = 1; $i <= $totalDays; $i++) {
    $date = strtotime("$i $month $year");
    if(date("l", $date) == "Sunday") {
        echo date("jS m, Y", $date) . "\n";
    }
} ?>