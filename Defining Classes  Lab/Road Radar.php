<?php
function getLimit($zone){
    switch ($zone){
        case"motorway":
            $speedyLimit = 130;
            break;
        case "interstate":
            $speedyLimit = 90;
            break;
        case "city":
            $speedyLimit = 50;
            break;
        case "residential":
            $speedyLimit = 20;
            break;
        default:
            echo  "Not a Valid Input";
            $speedyLimit = 1000;
    }
    return $speedyLimit;
}

function CalculateSpeedy ($speedy, $zone):string
{
    $limits = getLimit($zone);

    if ($speedy - $limits <= 20 && $speedy - $limits >= 0){
        return "speeding";
    }
    elseif ($speedy - $limits <= 40 && $speedy - $limits > 0){
        return  "excessive speeding";
    }
    elseif ($speedy - $limits > 40 && $speedy - $limits > 0){
        return  "reckless driving";
    }

    return  "";
}

$speedy = intval(readline());
$zone = readline();

echo  CalculateSpeedy($speedy, $zone);