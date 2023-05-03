<?php
include_once "Product.php";
class Book extends Product
{
    private $_weight;

    public function getWeight(): float
    {
        return $this->_weight;
    }

    function __construct($name, $price, $sku, $weight)
    {
        parent::__construct($name, $price, $sku);
        $this->_weight = $weight;
    }
}