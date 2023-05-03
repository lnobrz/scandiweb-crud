<?php
include_once "Product.php";
include_once "./Helpers/inputsValidations.php";
class Book extends Product
{
    private $_weight;

    public function getWeight(): float
    {
        return $this->_weight;
    }

    public function setWeight($weight): void
    {
        if (!InputsValidations::validFloatInput($weight)) {
            throw new ProductException("Unsupported weight value");
        }
        
        $this->_weight = $weight;
    }

    function __construct(string $name, float $price, string $sku, float $weight)
    {
        parent::__construct($name, $price, $sku);
        $this->setWeight($weight);
    }
}
