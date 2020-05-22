<?php
$input = readline();
$str_arr = explode (" ", $input);

$result = "";

foreach ($str_arr as $text){

    $counter = strlen($text);

    for ($i = 0; $i < $counter; $i++){
        $result = $result.$text;
    }
}
print_r($result);