<?php
class Person
{
    public  $name;
    public $age;

    public function  __construct($name, $age){
        $this->name = $name;
        $this->age = $age;
    }
}

$name = readline();
$age = intval(readline());


$person = new Person($name,$age);

$person->name = $name;
$person->age = $age;

echo count(get_object_vars($person));