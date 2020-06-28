<?php
interface IId
{
    public function getId(): string;
}

interface IBirth
{
    public function getBirthDate(): string;
}

interface IBuyer{
    public function getFood():int;
    public function buyFood(): void;
}

class Citizen implements IId, IBirth, IBuyer {
    /**
     * @var string
     */
    private $name;

    /** @var int */
    private $age;

    /** @var string */
    private $id;

    /** @var string */
    private $birthday;

    /** @var int */
    private $food = 0;

    /**
     * Citizen constructor.
     * @param string $name
     * @param int $age
     * @param string $id
     * @param string $birthday
     */
    public function __construct(string $name, int $age, string $id, string $birthday)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
        $this->setBirthDate($birthday);
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
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    private function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getBirthDate(): string
    {
        return $this->birthday;
    }

    /**
     * @param string $birthday
     */
    private function setBirthDate(string $birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * @return int
     */
    public function getFood(): int
    {
        return $this->food;
    }

    const FOOD_INCREASES = 10;

    public function buyFood():void
    {
        $this->food += self::FOOD_INCREASES;
    }
}

class Rebel implements IBuyer {

    /** @var string */
    private $name;

    /** @var int */
    private $age;

    /** @var string */
    private $group;

    /** @var int */
    private $food = 0;

    /**
     * Rebel constructor.
     * @param string $name
     * @param int $age
     * @param string $group
     */
    public function __construct(string $name, int $age, string $group)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setGroup($group);
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
     */
    public function setName(string $name): void
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
     * @return string
     */
    public function getGroup(): string
    {
        return $this->group;
    }

    /**
     * @param string $group
     */
    private function setGroup(string $group): void
    {
        $this->group = $group;
    }

    /**
     * @return int
     */
    public function getFood(): int
    {
        return $this->food;
    }

    const FOOD_INCREASES = 5;

    public function buyFood(): void
    {
        $this->food += self::FOOD_INCREASES;
    }
}

class  Pet implements IBirth
{

    /** @var string */
    private $name;

    /** @var string */
    private $birthday;

    /**
     * Pet constructor.
     * @param string $name
     * @param string $birthday
     */
    public function __construct(string $name, string $birthday)
    {
        $this->setName($name);
        $this->setBirthday($birthday);
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
     */
    private function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $birthday
     */
    private function setBirthday(string $birthday): void
    {
        $this->birthday = $birthday;
    }

    /** @return string */
    public function getBirthDate(): string
    {
        return $this->birthday;
    }
}

class  Robot implements IId
{
    /** @var string */
    private $model;

    /** @var string */
    private $id;

    /**
     * Robot constructor.
     * @param string $model
     * @param string $id
     */
    public function __construct(string $model, string $id)
    {
        $this->setModel($model);
        $this->setId($id);
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /** @param string id */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}

$info = [];

$n = intval(readline());

for ($i = 0;$i < $n; $i++) {
    $splitCommand = explode(" ", readline());

    if (count($splitCommand) === 4) {
        $names = $splitCommand[0];
        $age = intval($splitCommand[1]);
        $ids = $splitCommand[2];
        $birth = $splitCommand[3];

        $info[$names] = new Citizen($names, $age, $ids, $birth);

    } elseif (count($splitCommand) === 3) {
        $names = $splitCommand[0];
        $age = intval($splitCommand[1]);
        $group = $splitCommand[2];

        $info[$names] = new Rebel($names, $age, $group);
    }
}

$food = [];

$command = readline();

while ($command != "End") {

    if (key_exists($command, $info)){
        $human = $info[$command];

        $human->buyFood();

        $food[$command] = $human->getFood();
    }

    $command = readline();
}

echo array_sum($food);

