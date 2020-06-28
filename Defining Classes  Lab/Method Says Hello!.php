<?php
class Person {
    /**
     * @var string
     */
    public $name;

    function sayHello(string $name){
        echo $name . ' says "Hello"!';
    }
}

$name = readline();

$person = new Person();
$person->sayHello($name);

$fields = count(get_object_vars($person));
$methods = count(get_class_methods($person));

if ($fields != 1 || $methods != 1) {
    throw new Exception("Too many fields or methods");
}