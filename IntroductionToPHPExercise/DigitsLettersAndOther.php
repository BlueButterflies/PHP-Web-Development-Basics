<?php
$input = readline();

$letters = "";
$symbols = '';

for ($i = 0; $i < strlen($input); $i++){

    if (ctype_digit($input[$i])) {
        echo $input[$i];
    }
    else if (ctype_alpha($input[$i])){
        $letters .= $input[$i];
    }

    else if (ctype_punct($input[$i])){
        $symbols .= $input[$i];
    }

}
echo "\n$letters\n$symbols";