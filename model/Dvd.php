<?php
include_once "Product.php";
include_once "./Helpers/inputsValidations.php";
class Dvd extends Product
{
    private $_size;

    public function getSize(): float
    {
        return $this->_size;
    }

    public function setSize($size): void
    {
        if (!InputsValidations::validFloatInput($size)) {
            throw new ProductException("Unsupported Size Value");
        }

        $this->_size = $size;
    }

    public function __construct(string $name, float $price, string $sku, float $size)
    {
        parent::__construct($name, $price, $sku);
        $this->setSize($size);
    }
}
