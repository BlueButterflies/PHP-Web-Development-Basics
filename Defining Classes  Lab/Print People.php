<?php
class Person
{
    /**
     * @var string
     */
    private  $name;

    /**
     * @var int
     */
    private $age;

    /**
     * @var string
     */
    private $occupation;

    /**
     * Person constructor.
     * @param string $name
     * @param int $age
     * @param string $occupation
     */
    public function __construct(string $name, int $age, string $occupation)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setOccupation($occupation);
    }

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

    /**
     * @return string
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * @param string $occupation
     */
    private function setOccupation(string $occupation): void
    {
        $this->occupation = $occupation;
    }

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
    private function setName(string $name): void
    {
        $this->name = $name;
    }



    public function  _toString(){
        return $this->getName().' - age: '.$this->getAge().', occupation: '. $this->getOccupation().PHP_EOL;
    }
}

$people = [];

while (true) {
    $input = readline();

    if ($input === "END") {
        break;
    }
    $splitInput = explode(" ", $input);

    $name = $splitInput[0];
    $age = intval($splitInput[1]);
    $occupation = $splitInput[2];

    $person = new Person($name, $age, $occupation);

    $people[] = $person;
}
usort($people, function (Person $person1, Person $person2){

    return$person1->getAge() <=> $person2->getAge();
});

/** @var Person $item */
foreach ($people as $item){
    echo $item->_toString();
}
