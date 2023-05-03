<?php
include_once "Product.php";
class Dvd extends Product
{
    private $_size;

    public function getSize(): float
    {
        return $this->_size;
    }

    public function __construct(string $name, float $price, string $sku, float $size)
    {
        parent::__construct($name, $price, $sku);
        $this->_size = $size;
    }
}