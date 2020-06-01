<?php
$shopStock = [];
$input = readline();

while ($input !== "shopping time") {
    $info = explode(" ", $input);

    $product = $info[1];
    $quantity = $info[2];

    if (!key_exists($product, $shopStock)) {
        $shopStock[$product] = 0;
    }

    $shopStock[$product] += $quantity;

    $input = readline();
}

$input = readline();

while ($input !== "exam time") {
    $info = explode(" ", $input);

    $product = $info[1];
    $quantity = $info[2];

    if (!key_exists($product, $shopStock)) {
        echo "$product doesn't exist" . PHP_EOL;
    } else {
        if ($shopStock[$product] <= 0) {
            echo "$product out of stock" . PHP_EOL;
        }
        else {
            if ($quantity > $shopStock[$product]) {
                $shopStock[$product] = 0;
            }
            else {
                $shopStock[$product] -= $quantity;
            }
        }
    }

    $input = readline();
}

foreach ($shopStock as $product => $quantity) {
    if ($quantity > 0) {
        echo "$product -> $quantity" . PHP_EOL;
    }
}