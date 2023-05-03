<?php
include_once "Product.php";
class Dvd extends Product
{
    private $_size;

    public function getSize():
    {
        return $this->_size;
    }

    public function __construct($name, $price, $sku, $size)
    {
        parent::__construct($name, $price, $sku);
        $this->_size = $size;
    }
}