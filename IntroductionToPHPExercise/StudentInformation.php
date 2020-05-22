<?php
$name = readline();
$age = (int)readLine();
$grade =floatval(readline());

$formatting = number_format($grade, 2);

echo "Name: $name, Age: $age, Grade: $formatting";