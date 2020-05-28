<?php
$text = readline();

$letters = array();

for ($i = 0; $i < strlen($text); $i++) {

    $char = $text[$i];

    if (array_key_exists($char,$letters)){
        $letters[$char]++;
    }
    $letters[$char] = 1;
}
foreach ($letters as $key => $value) {
    echo "{$key} -> {$value}\n";
}