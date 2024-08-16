<?php

namespace App\Models\Types;
use App\Models\Product;
use App\Models\Database;


class Furniture extends Product
{
    public function getHeight(): int
    {
        return $this->height;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function setHeight($height)
    {
        if ($height > 0) {
            $this->height = $height;
        } else {
        }
    }

    public function setWidth($width)
    {
        if($width > 0){
            $this->width = $width;
        }else{
        }
    }

    public function setLength($length)
    {
        if($length > 0){
            $this->length = $length;
        }else{
        }
    }

    public function fillData(array $data): void
    {
        $this->setSku($data['sku']);
        $this->setName($data['name']);
        $this->setPrice($data['price']);
        $this->setHeight($data['height']);
        $this->setWidth($data['width']);
        $this->setLength($data['length']);
    }

    public function getData(): array
    {
        return [
            'name' => $this->getName(),
            'sku' => $this->getSku(),
            'price' => $this->getPrice(),
            'type' => "Furniture",
            'attribute' =>"Dimensions: " .$this->getHeight() ."x". $this->getWidth() ."x".  $this->getLength(),
        ];
    }
    public function save(Database $db): bool
    {
        $data = $this->getData();
        $sql = "INSERT INTO products (sku, name, price, type, attribute) VALUES (?, ?, ?, 'Furniture', ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssds", $data['sku'], $data['name'], $data['price'], $data['attribute']);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
}