<?php
class Person{
    /**
     * @var string
     */
    private $namePerson;

    /**
     * @var float
     */
    private $money;

    /** @var Product[] */
    private $bagOfProduct;

    /**
     * Person constructor.
     * @param string $namePerson
     * @param float $money
     * @throws Exception
     */
    public function __construct(string $namePerson, float $money)
    {
        $this->setNamePerson($namePerson);
        $this->setMoney($money);
        $this->bagOfProduct = [];

    }

    /**
     * @return string
     */
    public function getNamePerson(): string
    {
        return $this->namePerson;
    }

    /**
     * @param string $namePerson
     * @throws Exception
     */
    private function setNamePerson(string $namePerson): void
    {
        $this->ExceptionName($namePerson);
        $this->namePerson = $namePerson;
    }

    /**
     * @return float
     */
    public function getMoney(): float
    {
        return $this->money;
    }

    /**
     * @param float $money
     * @throws Exception
     */
    private function setMoney(float $money): void
    {
        $this->ExceptionMoney($money);
        $this->money = $money;
    }

    /**
     * @return Product[]
     */
    public function getBagOfProduct(): array
    {
        return $this->bagOfProduct;
    }

    /**
     * @param Product[] $bagOfProduct
     */
    private function setBagOfProduct(array $bagOfProduct): void
    {
        $this->bagOfProduct[] = $bagOfProduct;
    }

    /**
     * @param string $namePerson
     * @throws Exception
     */
    private function ExceptionName(string $namePerson){
        if (empty($namePerson)){
            throw new Exception("Name cannot be an empty");
        }
    }

    /**
     * @param float $money
     * @throws Exception
     */
    private function ExceptionMoney(float $money){
        if ($money < 0){
            throw new Exception("Money cannot be negative\n");
        }
    }

    /**
     * @param Product $product
     * @throws Exception
     */
    public function BuyProduct(Product $product){
        if ($product->getCost() > $this->getMoney()){
            throw new Exception("{$this->getNamePerson()} can't afford {$product->getName()}\n");
        }
        
        $this->bagOfProduct[] =  $product;
        $this->setMoney($this->getMoney() - $product->getCost());

        echo $this->getNamePerson(). " bought ". $product->getName(). PHP_EOL;

    }

    public function __toString()
    {
        if (count($this->getBagOfProduct()) === 0){
            return $this->namePerson." - Nothing bought\n";
        }

        return $this->getNamePerson() . " - " . implode(",",
                array_map(function (Product $product) {
                    return $product->getName();
                }, $this->getBagOfProduct())) . PHP_EOL;
    }
}

class Product
{
    /**
     * @var string
     */
    private $name;

    /** @var float */
    private $cost;

    /**
     * Product constructor.
     * @param string $name
     * @param float $cost
     */
    public function __construct(string $name, float $cost)
    {
        $this->setName($name);
        $this->setCost($cost);
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
     * @return float
     */
    public function getCost(): float
    {
        return $this->cost;
    }

    /**
     * @param float $cost
     */
    private function setCost(float $cost): void
    {
        $this->cost = $cost;
    }
}

    $personsData = preg_split("/[=;]/", readline(), -1, PREG_SPLIT_NO_EMPTY);
    $people = [];

    for ($i = 0; $i < count($personsData) - 1; $i += 2) {
        $personName = $personsData[$i];
        $personMoney = floatval($personsData[$i + 1]);

        try {
            $people[$personName] = new Person($personName, $personMoney);
        } catch (Exception $e) {
            echo $e->getMessage();
            return;
        }
    }

    $productsData = preg_split("/[=;]/", trim(readline()),-1, PREG_SPLIT_NO_EMPTY);
    $products = [];

    for ($i = 0; $i < count($productsData) - 1; $i += 2) {
        $productName = $productsData[$i];
        $productCost = floatval($productsData[$i + 1]);

        $products[$productName] = new Product($productName, $productCost);
    }

    $input = readline();

    while ($input !== "END") {
        $data = explode(" ", $input);

        $personName = $data[0];
        $productName = $data[1];

        if (key_exists($personName, $people) && key_exists($productName, $products)) {

            /** @var Person $person*/
            $person = $people[$personName];

            try {
                $person->BuyProduct($products[$productName]);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        $input = readline();
    }

    /** @var Person $person */
foreach ($people as $person) {
        echo $person;
    }