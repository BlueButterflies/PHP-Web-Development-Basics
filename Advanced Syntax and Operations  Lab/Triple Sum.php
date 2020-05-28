<?php
$numbs = array_map('intval', explode(" ", readline()));
$counter = 0;

for ($i = 0; $i < count($numbs);$i++){
    for($j = $i + 1;$j < count($numbs);$j++){

        $a = $numbs[$i];
        $b = $numbs[$j];

        $sum = $a + $b;

        if (in_array($sum, $numbs)){
            echo"$numbs[$i] + $numbs[$j] == $sum\n";
            $counter++;
        }
    }
}
if ($counter == 0){
    echo "No";
}