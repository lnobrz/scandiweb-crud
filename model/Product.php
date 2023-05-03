<?php
include "./Helpers/InputsValidations.php";

class ProductException extends Exception {}
abstract class Product
{
    private $_name;
    private $_price;
    private $_sku;

    public function getName(): string
    {
        return $this->_name;
    }

    public function setName($name): void
    {
        if(!InputsValidations::validStringInput($name))
        {
            throw new ProductException("Unsupported Product Name");
        }

        $this->_name = $name;
    }

    public function getPrice(): float
    {
        return $this->_price;
    }

    public function setPrice($price): void
    {
        if(!InputsValidations::validFloatInput($price))
        {
            throw new ProductException("Unsupported Price Value");
        }

        $this->_price = $price;
    }

    public function getSku(): string
    {
        return $this->_sku;
    }

    public function setSku($sku): void
    {
        if(!InputsValidations::validStringInput($sku))
        {
            throw new ProductException("Unsupported SKU Code");
        }

        $this->_sku = $sku;
    }

    public function __construct(string $name, float $price, string $sku)
    {
        $this->setName($name);
        $this->setPrice($price);
        $this->setSku($sku);
    }
}
