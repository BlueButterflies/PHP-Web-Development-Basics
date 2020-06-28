<?php
interface  ProduceSound{
    public function produceSound();
}

class Animal implements  ProduceSound {
    /** @var string */
    private $type;

    /** @var string */
    private $name;

    /** @var int */
    private $age;

    /** @var string */
    private $gender;

    const sound = "Not implemented!";

    /**
     * Animal constructor.
     * @param string $type
     * @param string $name
     * @param int $age
     * @param string $gender
     * @throws Exception
     */
    public function __construct(string $type, string $name, int $age, string $gender)
    {
        $this->setType($type);
        $this->setName($name);
        $this->setAge($age);
        $this->setGender($gender);

    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @throws Exception
     */
    protected function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @throws Exception
     */
    protected function setName(string $name): void
    {
        if (empty($name) || !isset($name)){
            throw new Exception("Invalid input!");
        }
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
     * @throws Exception
     */
    protected function setAge(int $age): void
    {
        if ($age < 0 || !isset($age)){
            throw new Exception("Invalid input!");
        }
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @throws Exception
     */
    protected function setGender(string $gender): void
    {
        if (empty($gender) || ($gender != "Female" && $gender != "Male") || !isset($gender)){
            throw new Exception("Invalid input!");
        }
        $this->gender = $gender;
    }

    public function produceSound():string {
        return self::sound;
    }

    public function __toString()
    {
        $output = $this->getType().' '.$this->getName().' '.$this->getAge().' '.$this->getGender()
            .PHP_EOL.$this->produceSound();

        return $output;
    }
}

class Cat extends Animal{
    const sound = "MiauMiau";

    public function produceSound():string {
        return self::sound;
    }
}

class Dog extends Animal {
    const sound = "BauBau";

    public function produceSound():string {

        return self::sound;
    }
}

class Frog extends Animal{
    const sound = "Frogggg";

    public function produceSound():string {

        return self::sound;
    }
}

class Kitten extends Cat{
    const sound = "Miau";
    const gender = "Female";
    const type = "Kitten";

    public function __construct($name, $age){
        parent::__construct(self::type, $name, $age, self::gender);
    }

    public function produceSound():string {

        return self::sound;
    }
}

class Tomcat extends Cat{
    const sound = "Give me one million b***h";
    const gender = "Male";
    const type = "Tomcat";

    public function __construct($name, $age){
        parent::__construct(self::type,$name, $age, self::gender);
    }

    public function produceSound():string {

        return self::sound;
    }
}

$animals = [];

$typeAnimal = trim(readline());

try {
while ($typeAnimal != "Beast!"){
    $infoAnimal =  explode(" ", trim(readline()));

    $name = $infoAnimal[0];
    $age = intval($infoAnimal[1]);
    $gender = $infoAnimal[2];


        switch ($typeAnimal){
            case"Cat":
                /** @var Cat $animals */
                $animals[] =  new Cat($typeAnimal, $name, $age, $gender);
                break;
            case "Dog":
                /** @var Dog $animals */
                $animals[] =  new Dog($typeAnimal, $name, $age, $gender);
                break;
            case"Frog":
                /** @var Frog $animals */
                $animals[] =  new Frog($typeAnimal, $name, $age, $gender);
                break;
            case"Kittens":
                if ($gender == "Male"){
                    throw new Exception("Invalid input!");
                }

                /** @var Animal $animals */
                $animals[] =  new Kitten($name, $age);
                break;
            case "Tomcat":
                if ($gender == "Female"){
                    throw new Exception("Invalid input!");
                }

                /** @var Animal $animals */
                $animals[] =  new Tomcat($name, $age);
                break;
            default:
                /** @var Animal $animals */
                $animals[] =  new Animal($typeAnimal, $name, $age, $gender);
                break;
        }

    $typeAnimal = trim(readline());
}

foreach ($animals  as $animal){
    echo $animal.PHP_EOL;
}
}catch (Exception $ex){
    echo  $ex->getMessage();
}