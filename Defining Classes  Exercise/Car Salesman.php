<?php
class Car
{
public $model;

/** @var Engine $engine */
public $engine;

public $weight;
public $color;

/**
* Car constructor.
* @param $model
* @param $engine
* @param $weight
* @param $color
*/
public function __construct($model, Engine $engine, $weight, $color)
{
$this->model = $model;
$this->engine = $engine;
$this->weight = $weight;
$this->color = $color;
}

public function __toString()
{
return "{$this->model}:
{$this->engine->model}:
Power: {$this->engine->power}
Displacement: {$this->engine->displacement}
Efficiency: {$this->engine->efficiency}
Weight: {$this->weight}
Color: {$this->color}
";
}
}

class Engine
{
public $model;
public $power;
public $displacement;
public $efficiency;

/**
* Engine constructor.
* @param $model
* @param $power
* @param $displacement
* @param $efficiency
*/
public function __construct($model, $power, $displacement, $efficiency)
{
$this->model = $model;
$this->power = $power;
$this->displacement = $displacement;
$this->efficiency = $efficiency;
}


}

$n = intval(readLine());

/** @var Car[] $cars */
$cars = [];

/** @var Engine[] $engines */
$engines = [];

for($i = 0; $i < $n; $i++) {
$input = explode(' ', readLine());

$model = $input[0];
$power = intval($input[1]);
$displacement = "n/a";
$efficiency = "n/a";

if (count($input) == 4) {
$displacement = $input[2];
$efficiency = $input[3];
}
else if (count($input) == 3) {
if (is_numeric($input[2])) {
$displacement = intval($input[2]);
}
else {
$efficiency = $input[2];
}
}

$engine = new Engine($model, $power, $displacement, $efficiency);

$engines[] = $engine;
}

$m = intval(readLine());

for($x = 0; $x < $m; $x++) {
$input = explode(' ', readLine());

$model = $input[0];
$engineName = $input[1];
$weight = "n/a";
$color = "n/a";


if (count($input) == 4) {
$weight = intval($input[2]);
$color = $input[3];
}
else if (count($input) == 3) {
if (is_numeric($input[2])) {
$weight = intval($input[2]);
}
else {
$color = $input[2];
}
}
foreach ($engines as $en) {
if ($engineName == $en->model) {
$currentEngine = $en;

break;
}
}

$cars[] = new Car($model, $currentEngine, $weight, $color);
}

foreach ($cars as $car) {
echo $car;
}