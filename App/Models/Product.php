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
        $this->sku = $sku;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
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
