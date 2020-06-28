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
     * @param float $length
     */
    private function setLength($length)
    {
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
     * @param float $width
     */
    private function setWidth($width)
    {
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
     * @param float $height
     */
    private function setHeight($height)
    {
        $this->height = $height;
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

$box =  new Box($length, $width, $height);

echo $box;

