<?php
class Person{
    /** @var string */
    private $name;

    /**
     * @var int
     */
    private $age;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    private function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAge(): int
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

    /**
     * People constructor.
     * @param string $name
     * @param int $age
     */
    public function __construct(string  $name, int $age)
    {
        $this->setName($name);
        $this->setAge($age);
    }

    public function _toString()
    {
        return $this->getName().' - '.$this->getAge().PHP_EOL;
    }
}

$n = intval(readline());
$people = [];

for ($i = 0; $i < $n; $i++){
    $input = explode(" ", readline());

    $name = $input[0];
    $age = intval($input[1]);

    $person = new Person($name, $age);

    if ($age > 30){
        $people[] = $person;
    }

}

usort($people, function (Person $person1, Person $person2){
  return  $person1->getName() <=> $person2->getName();
});

/** @var Person $result */
foreach ($people as $result){

    echo $result->_toString();
}