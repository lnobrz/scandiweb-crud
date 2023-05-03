<?php
include_once "Product.php";
class Book extends Product
{
    private $_weight;

    public function getWeight(): float
    {
        return $this->_weight;
    }

    function __construct(string $name, float $price, string $sku, float $weight)
    {
        parent::__construct($name, $price, $sku);
        $this->_weight = $weight;
    }
}
