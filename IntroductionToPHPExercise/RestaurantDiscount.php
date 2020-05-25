<?php
$group = intval(readline());
$package = readline();

$price =0;
$priceAfterDiscount = 0;
$hall = "";

if ($group <= 50){
    $price = 2500;

    $hall = "Small Hall";
}
elseif ($group > 50 && $group <= 100){
    $price = 5000;

    $hall = "Terrace";
}
elseif ($group > 100 && $group <= 120){
    $price = 7500;

    $hall = "Great Hall";
}
else{
    echo "We do not have an appropriate hall.";
    return;

}

switch ($package){
    case "Normal":
        $price += 500;

        $priceAfterDiscount = $price - ($price * 0.05);
        break;
    case "Gold":
        $price += 750;

        $priceAfterDiscount = $price - ($price * 0.10);
        break;
    case "Platinum":
        $price += 1000;

        $priceAfterDiscount = $price - ($price * 0.15);
        break;
}

$priceAfterDiscount = number_format((float)$priceAfterDiscount / $group, 2, '.', '');

printf("We can offer you the $hall\nThe price per person is $priceAfterDiscount$");