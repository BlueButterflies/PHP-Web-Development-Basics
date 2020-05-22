<?php
$input = readline();

$result = '';

while ($input != 'end'){
    $result .= "$input = ".strrev($input)."\n";
    $input = readline();
}
echo $result;