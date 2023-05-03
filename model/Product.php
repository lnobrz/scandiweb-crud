<?php
abstract class Product
{
    private $_name;
    private $_price;

    public function getName(){
        return $this->_name;
    }

    public function getPrice()
    {
        return $this->_price;
    }

    public function __construct($name, $price)
    {
        $this->_name = $name;
        $this->_price = $price;
    }
}
