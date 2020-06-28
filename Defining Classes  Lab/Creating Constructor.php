<?php

class Person
{
    /**
     * @var string
     */
    private $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    private function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @var int
     */
    private $age;

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    private function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function __construct(string $name, int $age)
    {
        $this->setName($name);
        $this->setAge($age);
    }
}

$name = readline();
$age = intval(readline());


$person = new Person($name, $age);


echo $person->getName() . ' ' . $person->getAge();