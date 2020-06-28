<?php
class Cats{
    /** @var string */
    private $name;

    /**
     * Cat constructor.
     * @param string $name
     */
    protected function __construct(string $name)
    {
        $this->setName($name);
    }

    /**
     * @return string
     */
    protected function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    protected function setName(string $name): void
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->getName();
    }
}

class Siamese extends Cats{
    /** @var int */
    private $earsSize;

    /**
     * Siamese constructor.
     * @param string $name
     * @param int $earsSize
     */
    public function __construct(string $name, int $earsSize)
    {
        parent::__construct($name);
        $this->setEarsSize($earsSize);
    }

    /**
     * @return int
     */
    protected function getEarsSize(): int
    {
        return $this->earsSize;
    }

    /**
     * @param int $earsSize
     */
    protected function setEarsSize(int $earsSize): void
    {
        $this->earsSize = $earsSize;
    }

    public function __toString()
    {
        return "Siamese".' '.parent::__toString().' '.$this->getEarsSize();
    }
}
class Cymric extends Cats{
    /** @var int */
    private $furLength;

    /**
     * Cymric constructor.
     * @param string $name
     * @param int $furLength
     */
    public function __construct(string $name, int $furLength)
    {
        parent::__construct($name);
        $this->setFurLength($furLength);
    }

    /**
     * @return int
     */
    protected function getFurLength(): int
    {
        return $this->furLength;
    }

    /**
     * @param int $furLength
     */
    protected function setFurLength(int $furLength): void
    {
        $this->furLength = $furLength;
    }

    public function __toString()
    {
        return  'Cymric'.' '.parent::__toString().' '.$this->getFurLength();
    }
}

class StreetExtraordinaire extends Cats{
    /** @var int */
    private $decibelsOfMeows;

    /**
     * StreetExtraordinaire constructor.
     * @param string $name
     * @param int $decibelsOfMeows
     */
    public function __construct(string $name, int $decibelsOfMeows)
    {
        parent::__construct($name);
        $this->setDecibelsOfMeows($decibelsOfMeows);
    }

    /**
     * @return int
     */
    protected function getDecibelsOfMeows(): int
    {
        return $this->decibelsOfMeows;
    }

    /**
     * @param int $decibelsOfMeows
     */
    protected function setDecibelsOfMeows(int $decibelsOfMeows): void
    {
        $this->decibelsOfMeows = $decibelsOfMeows;
    }

    public function __toString()
    {
        return "StreetExtraordinaire".' '.parent::__toString().' '.$this->getDecibelsOfMeows();
    }
}
$cats = [];

$input = readline();

while ($input != "End"){
    $infoCats = explode(" ", $input);

    $type =  $infoCats[0];
    $name = $infoCats[1];

    switch ($type){
        case "Siamese":
            $earSize = intval($infoCats[2]);

            $cats[$name]  = new Siamese($name, $earSize);
            break;
        case "Cymric":
            $furLength = intval($infoCats[2]);

            $cats[$name] = new Cymric($name, $furLength);
            break;
        case "StreetExtraordinaire":
            $decibelsOfMeows = intval($infoCats[2]);

            $cats[$name] = new StreetExtraordinaire($name, $decibelsOfMeows);
            break;
    }

    $input = readline();
}

$givenInfoForCats = readline();

foreach ($cats as $cat => $value){
    if ($cat == $givenInfoForCats){
        echo $value;
    }
}