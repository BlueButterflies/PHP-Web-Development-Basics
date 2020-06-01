<?php
$mode= 'register';
$userInfo = [];
$counter = 0;


while (1){
    $input = readline();

    if ($input == 'end'){
        break;
    }

    if ($input == 'login'){
        $mode = 'login';
        continue;
    }

    $data = explode(' -> ', $input);

    if ($mode == 'register'){
        $userInfo[$data[0]] = $data[1];
    }
    else{
        if (array_key_exists($data[0], $userInfo)
        && $userInfo[$data[0]] == $data[1]){
            echo $data[0].": logged in successfully".PHP_EOL;
        }
        else{
            echo $data[0]. ": login failed".PHP_EOL;
            $counter++;
        }
    }
}
echo "unsuccessful login attempts: ".$counter;
