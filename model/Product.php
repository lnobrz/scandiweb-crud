<?php
abstract class Product
{
    private $_name;
    private $_price;
    private $_sku;

    public function getName(): string
    {
        return $this->_name;
    }

    public function getPrice(): float
    {
        return $this->_price;
    }

    public function getSku(): string
    {
        return $this->_sku;
    }

    public function __construct(string $name, float $price, string $sku)
    {
        $this->_name = $name;
        $this->_price = $price;
        $this->_sku = $sku;
    }
}
