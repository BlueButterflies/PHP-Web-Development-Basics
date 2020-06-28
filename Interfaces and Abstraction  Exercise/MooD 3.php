<?php
interface IUsers{
    public function setName(string $name):void ;
    public function getName():string ;
}
interface ILevel{
    public function setLevel(int $level):void;
    public function getLevel():int ;
}

interface HashedPassword{
    public function hashPass();
}
abstract  class InfoTypes implements IUsers, ILevel, HashedPassword {
    /** @var string */
    private $name;

    /** @var string */
    private $type;

    /** @var float */
    private $points;

    /** @var int */
    private $level;

    /**
     * Demon constructor.
     * @param string $name
     * @param string $type
     * @param float $points
     * @param int $level
     */
    public function __construct(string $name, string $type, float $points, int $level)
    {
        $this->name = $name;
        $this->type = $type;
        $this->points = $points;
        $this->level = $level;
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
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return float
     */
    public function getPoints(): float
    {
        return $this->points;
    }

    /**
     * @param float $points
     */
    public function setPoints(float $points): void
    {
        $this->points = $points;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }


}

class Archangel extends InfoTypes {
    public function hashPass()
    {
        $hashedPass =  strrev($this->getName()) . strlen($this->getName()) * 21;

        return $hashedPass;
    }

    public function __toString()
    {
        $mana = intval($this->getPoints() * $this->getLevel());

        return "\"".$this->getName()."\"".' | '."\"".$this->hashPass()."\"".' -> Archangel'.PHP_EOL.$mana;
    }
}

class Demon extends InfoTypes {
    public function hashPass()
    {
        return strlen($this->getName()) * 217;
    }

    public function __toString()
    {
        $energy = number_format($this->getPoints() * $this->getLevel(),'1', '.', '');

        return "\"".$this->getName()."\"".' | '."\"".$this->hashPass()."\"".' -> Demon'.PHP_EOL.$energy;
    }
}

$input= explode(' | ', readline());

$player = [];

$names = $input[0];
$type = $input[1];
$level = $input[3];

if ($type === "Demon"){
    $pointEnergy = floatval($input[2]);

    $player =  new Demon($names, $type, $pointEnergy, $level);
}
else{
    $pointMana = intval($input[2]);

    $player =  new Archangel($names, $type, $pointMana, $level);
}

echo $player;