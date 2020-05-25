<?php
$input = readline();
$search = readline();

$symbol = substr($search, 0, strpos($search, " "));
$occurrence = substr($search, strpos($search, " ") + 1);

$counter = 0;

for ($i = 0;$i < strlen($input);$i++){
    if ($input[$i] == $symbol){
        $counter++;

        if ($counter == $occurrence){
            echo $i;
            return;
        }
    }
}

echo "Find the letter yourself!";