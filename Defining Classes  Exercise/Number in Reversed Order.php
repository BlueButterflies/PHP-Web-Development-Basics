<?php
class DecimalNumber{
    /**
     * @var double
     */
    private $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    function reversed(){
        $result = strrev($this->number);

        return $result;
    }
}

$input = readline();

$result = new DecimalNumber($input);

echo $result->reversed();