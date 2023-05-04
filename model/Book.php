<?php
include_once "Product.php";
include_once "../Helpers/inputsValidations.php";
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

    public function getFullData()
    {
        $fullData = array();
        $fullData['id'] = $this->getId();
        $fullData['name'] = $this->getName();
        $fullData['price'] = $this->getPrice();
        $fullData['category'] = $this->getCategory();
        $fullData['sku'] = $this->getSku();
        $fullData['weight'] = $this->getWeight();
        return $fullData;
    }

    function __construct(string $name, float $price, $category, string $sku, float $weight)
    {
        parent::__construct($name, $price, $category, $sku);
        $this->setWeight($weight);
    }
}
