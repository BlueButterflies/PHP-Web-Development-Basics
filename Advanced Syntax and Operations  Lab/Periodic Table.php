<?php
$input = explode(", ",readline());

$elemets = (array_count_values($input));

foreach ($elemets as $elment => $times){
    if($times == 1){
        echo $elment." ";
    }
}