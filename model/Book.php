<?php
include_once "Product.php";
class Book extends Product
{
    private $_weight;

    public function getWeight(): float
    {
        return $this->_weight;
    }

    function __construct($name, $price, $weight)
    {
        parent::__construct($name, $price);
        $this->_weight = $weight;
    }
}