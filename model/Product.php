<?php
abstract class Product
{
    private $_name;
    private $_price;
    private $_sku;

    public function getName(): string{
        return $this->_name;
    }

    public function getPrice(): float
    {
        return $this->_price;
    }

    public function __construct($name, $price)
    {
        $this->_name = $name;
        $this->_price = $price;
    }
}
