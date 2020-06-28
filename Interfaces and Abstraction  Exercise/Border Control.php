<?php
interface IId{
    public function getId(): string;
}

class Citizens implements IId{

    /** @var string */
    private $name;

    /** @var int */
    private $age;

    /** @var string */
    private $id;

    /**
     * Citizens constructor.
     * @param string $name
     * @param int $age
     * @param string $id
     */
    public function __construct(string $name, int $age, string $id)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
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
}

class  Robot implements IId {
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

while ($command != "End"){
    $splitCommand = explode(" ", $command);

    if (count($splitCommand) === 3){
        $names = $splitCommand[0];
        $ages = $splitCommand[1];
        $ids = $splitCommand[2];

        $info[] = new Citizens($names, $ages, $ids);

    }
    elseif (count($splitCommand) === 2){
        $models = $splitCommand[0];
        $idsS = $splitCommand[1];

        $info[] = new Robot($models, $idsS);
    }

    $command = readline();
}

$checkId = readline();

foreach ($info as $item) {
        $res = substr($item->getId(), -strlen($checkId));

    if ($res == $checkId){
        echo $item->getId().PHP_EOL;
    }

}