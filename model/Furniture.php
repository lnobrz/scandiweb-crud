<?php
include_once "Product.php";

class Furniture extends Product
{
    private $_width;
    private $_height;
    private $_length;

    public function getWidth()
    {
        return $this->_width;
    }

    public function getHeight()
    {
        return $this->_height;
    }

    public function getLength()
    {
        return $this->_length;
    }

    public function __construct($name, $price, $width, $height, $length)
    {
        parent::__construct($name, $price);
        $this->_width = $width;
        $this->_height = $height;
        $this->_length = $length;
    }
    
}