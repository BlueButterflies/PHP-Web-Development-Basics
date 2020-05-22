<?php
$firstNum = (int)readline();
$secondNum = (int)readline();

if ($firstNum > $secondNum){
    for ($i = $secondNum; $i <= $firstNum; $i++)
    {
        echo "$i\n";
    }
}
else{
    for ($i = $firstNum; $i <= $secondNum; $i++)
    {
        echo "$i\n";
    }
}