<?php
include_once "Product.php";
class Dvd extends Product
{
    private $_size;

    public function getSize()
    {
        return $this->_size;
    }

    public function __construct($name, $price, $size)
    {
        parent::__construct($name, $price);
        $this->_size = $size;
    }
}