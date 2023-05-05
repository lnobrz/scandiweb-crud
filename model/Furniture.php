<?php
include_once "Product.php";
include_once "../Helpers/inputsValidations.php";

class Furniture extends Product
{
    private $_weight;
    private $_height;
    private $_length;

    public function getWeight(): float
    {
        return $this->_weight;
    }

    public function setWidth($weight): void
    {
        if (!InputsValidations::validFloatInput($weight)) {
            throw new ProductException("Unsupported width value");
        }

        $this->_weight = $weight;
    }

    public function getHeight(): float
    {
        return $this->_height;
    }

    public function setHeight($height): void
    {
        if (!InputsValidations::validFloatInput($height)) {
            throw new ProductException("Unsupported height value");
        }

        $this->setHeight($height);
    }


    public function getLength(): float
    {
        return $this->_length;
    }


    public function setLength($length): void
    {
        if (!InputsValidations::validFloatInput($length)) {
            throw new ProductException("Unsupported length value");
        }

        $this->setLength($length);
    }

    
    public function getFullData()
    {
        $fullData = array();
        $fullData['id'] = $this->getId();
        $fullData['name'] = $this->getName();
        $fullData['price'] = $this->getPrice();
        $fullData['category'] = $this->getCategory();
        $fullData['sku'] = $this->getSku();
        $fullData['width'] = $this->getWeight();
        $fullData['height'] = $this->getHeight();
        $fullData['length'] = $this->getLength();
        return $fullData;
    }
    public function __construct(string $name, float $price, string $category, string $sku, float $weight, float $height, float $length)
    {
        parent::__construct($name, $price, $category, $sku);
        $this->setWidth($weight);
        $this->setHeight($height);
        $this->setLength($length);
    }
}
