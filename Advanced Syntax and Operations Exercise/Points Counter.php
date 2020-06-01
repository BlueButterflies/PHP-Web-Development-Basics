<?php
$infoTeam = [];
$score = [];

while (true) {
    $input = trim(readline());
    $symbols = ["@", "%", "&", "$", "*"];

    if ($input === "Result") {
        break;
    }
    $cleanInput = str_replace($symbols, "", $input);
    $cleanInput = explode("|", $cleanInput);

    if ($cleanInput[0] === strtoupper($cleanInput[0])) {
        $team = $cleanInput[0];
        $player = $cleanInput[1];
    }
    else {
        $team = $cleanInput[1];
        $player = $cleanInput[0];
    }

    $points = intval($cleanInput[2]);
    $infoTeam[$team][$player] = $points;

    arsort($infoTeam[$team]);
}

foreach ($infoTeam as $key => $value) {
    if (!array_key_exists($key, $score)) {
        $score[$key] = 0;
    }

    foreach ($value as $k => $v) {
        $score[$key] += $v;
    }
}

arsort($score);
foreach ($score as $key => $value) {
    echo $key . " => " . $value . PHP_EOL;
    echo "Most points scored by " . key($infoTeam[$key]) . PHP_EOL;
}