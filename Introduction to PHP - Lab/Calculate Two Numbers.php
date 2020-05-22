<?php
$num_one = (int)readline();
$num_two = (int)readline();
$operation  =readline();

switch ($operation){
    case"sum":
       echo $num_one + $num_two;
       break;
    case"subtract":
        echo $num_one - $num_two;
        break;
    case"multiply":
        echo $num_one * $num_two;
        break;
    case"divide":
        if ($num_one === 0 or $num_two === 0) {
            echo "Cannot divide by zero";
        }
        else{
            echo $num_one / $num_two;
        }
        break;
    default:
        echo"Wrong operation supplied";
}
