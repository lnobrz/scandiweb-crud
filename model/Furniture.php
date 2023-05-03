<?php
include_once "Product.php";

class Furniture extends Product
{
    private $_width;
    private $_height;
    private $_length;

    public function getWidth(): float
    {
        return $this->_width;
    }

    public function getHeight(): float
    {
        return $this->_height;
    }

    public function getLength(): float
    {
        return $this->_length;
    }

    public function __construct($name, $price, $sku, $width, $height, $length)
    {
        parent::__construct($name, $price, $sku);
        $this->_width = $width;
        $this->_height = $height;
        $this->_length = $length;
    }
    
}