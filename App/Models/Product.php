<?php


namespace App\Models;

abstract class Product
{
    protected string $sku;
    protected string $name;
    protected float $price;

    public function __construct()
    {
        $this->name = '';
        $this->sku = '';
        $this->price = 0.0;
    }

    public function setSku(string $sku): void
    {
        if (strlen($sku) > 2) {
            $this->sku = $sku;
        } else {
            throw new InvalidArgumentException('SKU must be at least 3 characters long');
        }
    }

    public function setName(string $name): void
    {
        if (strlen($name) > 1) {
            $this->name = $name;
        } else {
            throw new InvalidArgumentException('Name must be at least 2 characters long');
        }
    }

    public function setPrice(float $price): void
    {
        if ($price >= 0) {
            $this->price = $price;
        } else {
            throw new InvalidArgumentException('Price must be a non-negative number');
        }
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    abstract public function fillData(array $data): void;

    abstract public function getData(): array;
}
