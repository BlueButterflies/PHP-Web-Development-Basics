<?php
$n = intval(readline());

echo createDNAHelix($n);

function createDNAHelix($n)
{
    $stringOfModify = 'ATCGTTAGGG';

    $output = '';

    $letters = 0;

    for ($i = 0; $i < $n; $i++) {

        if ($i % 4 == 0) {

            $output .= "**" . $stringOfModify[$letters++] . $stringOfModify[$letters++] . "**\n";

        } elseif ($i % 2 !== 0) {

            $output .= "*" . $stringOfModify[$letters++] . "--" . $stringOfModify[$letters++] . "*\n";

        } else {

            $output .= $stringOfModify[$letters++] . "----" . $stringOfModify[$letters++] . "\n";
        }

        if (($letters) % 10 == 0) {
            $letters = 0;
        }
    }

    return $output;
}