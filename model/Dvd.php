<?php
include_once "Product.php";
include_once "../Helpers/inputsValidations.php";
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

    
    public function getFullData()
    {
        $fullData = array();
        $fullData['id'] = $this->getId();
        $fullData['name'] = $this->getName();
        $fullData['price'] = $this->getPrice();
        $fullData['category'] = $this->getCategory();
        $fullData['sku'] = $this->getSku();
        $fullData['size'] = $this->getSize();
        return $fullData;
    }

    public function __construct(string $name, float $price, string $category, string $sku, float $size)
    {
        parent::__construct($name, $price, $category, $sku);
        $this->setSize($size);
    }
}
