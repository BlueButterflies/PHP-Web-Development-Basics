<?php
interface Person{
    public function setName(string $name):void;

    public function setAge(int $age):void;
}

class Citizen implements Person
{
    /** @var string */
    private $name;

    /** @var int */
    private $age;

    /**
     * Citize constructor.
     * @param string $name
     * @param int $age
     */
    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function __toString()
    {
        return $this->name
            .PHP_EOL
        .$this->age;
    }
}

$name = readline();
$age = intval(readline());

$info = new Citizen($name, $age);

echo $info;