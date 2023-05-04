<?php
include "../Helpers/InputsValidations.php";

class ProductException extends Exception
{
}
abstract class Product
{
    private $_id;
    private $_name;
    private $_price;
    private $_category;
    private $_sku;

    public function getId(): int
    {
        return $this->_id;
    }

    public function setId($id): void
    {
        if (!InputsValidations::validIntInput($id)) {
            throw new ProductException("Invalid product id");;
        }
        $this->_id = $id;
    }

    public function getName(): string
    {
        return $this->_name;
    }

    public function setName($name): void
    {
        if (!InputsValidations::validStringInput($name)) {
            throw new ProductException("Unsupported product name");
        }

        $this->_name = $name;
    }

    public function getPrice(): float
    {
        return $this->_price;
    }

    public function setPrice($price): void
    {
        if (!InputsValidations::validFloatInput($price)) {
            throw new ProductException("Unsupported price value");
        }

        $this->_price = $price;
    }

    public function getCategory(): string
    {
        return $this->_category;
    }

    public function setCategory($category): void
    {
        if (!InputsValidations::validCategoryInput($category)) {
            throw new ProductException("Unexisted category name");
        }

        $this->_category = $category;
    }

    public function getSku(): string
    {
        return $this->_sku;
    }

    public function setSku($sku): void
    {
        if (!InputsValidations::validStringInput($sku)) {
            throw new ProductException("Unsupported SKU code");
        }

        $this->_sku = $sku;
    }

    public abstract function getFullData();

    public function __construct(string $name, float $price, string $category, string $sku)
    {
        $this->setName($name);
        $this->setPrice($price);
        $this->setCategory($category);
        $this->setSku($sku);
    }
}
