<?php

interface IId
{
    public function getId(): string;
}

interface IBirth
{
    public function getBirthDate(): string;
}

class Citizens implements IId, IBirth
{

    /** @var string */
    private $name;

    /** @var int */
    private $age;

    /** @var string */
    private $id;

    /** @var string */
    private $birthDate;


    /**
     * Citizens constructor.
     * @param string $name
     * @param int $age
     * @param string $id
     * @param string $birthDate
     */
    public function __construct(string $name, int $age, string $id, string $birthDate)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
        $this->setBirthDate($birthDate);
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
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /** @param string $id */
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

    /**
     * @param string $birthDate
     */
    public function setBirthDate(string $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    /** @return string */
    public function getBirthDate(): string
    {
        return $this->birthDate;
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

$command = readline();

while ($command != "End") {
    $splitCommand = explode(" ", $command);

    $type = $splitCommand[0];

    if (count($splitCommand) === 5 && $type === "Citizen") {
        $names = $splitCommand[1];
        $ages = $splitCommand[2];
        $ids = $splitCommand[3];
        $birth = $splitCommand[4];

        $info[] = new Citizens($names, $ages, $ids, $birth);

    } elseif (count($splitCommand) === 3 && $type === "Pet") {
        $names = $splitCommand[1];
        $births = $splitCommand[2];

        $info[] = new Pet($names, $births);
    } elseif (count($splitCommand) === 3 && $type === "Robot") {
        $models = $splitCommand[1];
        $idsS = $splitCommand[2];

        $robot = new Robot($models, $idsS);
    }

    $command = readline();
}

$checkId = readline();

foreach ($info as $item) {
    $res = substr($item->getBirthDate(), -strlen($checkId));

    if ($res == $checkId) {
        echo $item->getBirthDate() . PHP_EOL;
    }

}