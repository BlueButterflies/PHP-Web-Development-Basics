<?php
//$arr=;

$input=array_map('strtolower',explode(' ', readline()));

$occurrences=array();

for($i=0;$i<count($input);$i++){
    $currentStr=$input[$i];

    if(!array_key_exists($currentStr,$occurrences)){
        $occurrences[$input[$i]]=0;
    }

    $occurrences[$input[$i]]++;
}

$result=[];

foreach ($occurrences as $key => $value){

    if($value %2 !==0){
        array_push($result,$key);
    }
}

echo implode(', ', $result);