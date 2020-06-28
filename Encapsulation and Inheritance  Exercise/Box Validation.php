<?php
class  Box{
    /** @var float */
    private $length;

    /** @var float */
    private $width;

    /** @var float */
    private $height;

    /**
     * Box constructor.
     * @param float $length
     * @param float $width
     * @param float $height
     */
    public function __construct($length, $width, $height)
    {
        $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height);
    }

    /**
     * @return float
     */
    private function getLength()
    {
        return $this->length;
    }

    /**
     * @param $length
     * @throws Exception
     */
    private function setLength($length)
    {
        $this->ExceptionValidation($length, "Length");
        $this->length = $length;
    }

    /**
     * @return float
     */
    private function getWidth()
    {
        return $this->width;
    }

    /**
     * @param $width
     * @throws Exception
     */
    private function setWidth($width)
    {
        $this->ExceptionValidation($width, "Width");
        $this->width = $width;
    }

    /**
     * @return float
     */
    private function getHeight()
    {
        return $this->height;
    }

    /**
     * @param $height
     * @throws Exception
     */
    private function setHeight($height)
    {
        $this->ExceptionValidation($height, "Height");
        $this->height = $height;
    }

    /**
     * @param float $value
     * @param string $parameter
     * @throws Exception
     */
    private function ExceptionValidation(float $value, string $parameter): void
    {
        if ($value <= 0) {
            throw new Exception("{$parameter} cannot be zero or negative.");
        }
    }

    //Rectangular Parallelepiped
    private  function SurfaceArea(){
        // 2lw + 2lh + 2wh
        return 2 * $this->getLength() * $this->getWidth() + 2 * $this->getLength() * $this->getHeight()
            + 2 * $this->getWidth() * $this->getHeight();
    }

    private  function LateralSurfaceArea(){
        //2lh + 2wh
        return 2 * $this->getLength() * $this->getHeight() + 2 * $this->getWidth() * $this->getHeight();
    }

    private  function Volume(){
        //lwh
        return $this->getLength() * $this->getWidth() * $this->getHeight();
    }

    public function __toString()
    {
        $output = "Surface Area - ". number_format($this->SurfaceArea(),2, ".", "").PHP_EOL
            . "Lateral Surface Area - ". number_format($this->LateralSurfaceArea(), 2, ".", "").PHP_EOL
            . "Volume - ". number_format($this->Volume(), 2, ".", "");

        return $output;
    }
}

$length = floatval(readline());
$width = floatval(readline());
$height = floatval(readline());

try {
    $box =  new Box($length, $width, $height);
    echo $box;
}catch (Exception $ex){

    echo $ex->getMessage();
}