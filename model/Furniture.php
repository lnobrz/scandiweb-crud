<?php
include_once "Product.php";
include_once "./Helpers/inputsValidations.php";

class Furniture extends Product
{
    private $_width;
    private $_height;
    private $_length;

    public function getWidth(): float
    {
        return $this->_width;
    }

    public function setWidth($width): void
    {
        if (!InputsValidations::validFloatInput($width)) {
            throw new ProductException("Unsupported width value");
        }

        $this->_width = $width;
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

    public function __construct(string $name, float $price, string $sku, float $width, float $height, float $length)
    {
        parent::__construct($name, $price, $sku);
        $this->setWidth($width);
        $this->setHeight($height);
        $this->setLength($length);
    }
}
