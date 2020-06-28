<?php
class FoodFactory{
    /** @var string */
    private $food;

    /** @var int */
    private $points;

    /**
     * FoodFactory constructor.
     * @param string $food
     */
    public function __construct(string $food)
    {
        $this->setFood($food);
        $this->food();
    }

    /**
     * @return string
     */
    public function getFood(): string
    {
        return $this->food;
    }

    /**
     * @param string $food
     */
    private function setFood(string $food): void
    {
        $food = strtolower($food);
        $this->food = $food;
    }

    /**
     * @return int
     */
    public function getPoints(): int
    {
        return $this->points;
    }

    /**
     * @param int $points
     */
    private function setPoints(int $points): void
    {
        $this->points = $points;
    }

    private function food(){
        $foods = $this->getFood();

        switch ($foods){
            case"cram":
                $this->setPoints(2);
                break;
            case"lembas":
                $this->setPoints(3);
                break;
            case"apple":
            case"melon":
                $this->setPoints(1);
                break;
            case"honeycake":
                $this->setPoints(5);
                break;
            case"mushrooms":
                $this->setPoints(-10);
                break;
            default:
                $this->setPoints(-1);
                break;
        }
    }
}

class MoodFactory{
    /** @var int */
    private $points;

    /**
     * MoodFactory constructor.
     * @param int $points
     */
    public function __construct(int $points)
    {
        $this->points = $points;
    }

    /**
     * @return int
     */
    public function getPoints(): int
    {
        return $this->points;
    }

    /**
     * @param int $points
     */
    private function setPoints(int $points): void
    {
        $this->points = $points;
    }

    public function moods():string {
        $point = $this->getPoints();

        if ($point < -5){
            return "Angry";
        }elseif ($point >= -5 && $point < 0){
            return "Sad";
        }elseif ($point >= 0 && $point < 15){
            return  "Happy";
        }
        elseif($point >= 15){
            return "PHP";
        }
    }
}

$food = explode(",", readline());
$pointS = 0;

for ($i = 0; $i < count($food); $i++) {
    $currentFood = $food[$i];

    $foodFactory = new FoodFactory($currentFood);

    $pointS += $foodFactory->getPoints();
}

echo $pointS . PHP_EOL;

$mood = new MoodFactory($pointS);

echo $mood->moods();