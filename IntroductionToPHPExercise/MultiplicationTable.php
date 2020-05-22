<?php
$num = intval(readline());

$result = 0;

for ($i = 1; $i <= 10;$i++){
    $result = $num * $i;

    echo "$num X $i = $result\n";
}