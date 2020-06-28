<?php
$input = readline();

$result = isPalindrome($input);
if( $result == true){
    echo 'true';
}
else{
    echo 'false';
}

function isPalindrome(string $str){
    for ($i = 0; $i < strlen($str) / 2; $i++){
        if ($str[$i] == $str[strlen($str) - $i - 1]){
            return true;
        }else{
            return  false;
        }

    }
}


?>