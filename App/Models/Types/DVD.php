<?php

namespace App\Models\Types;
use App\Models\Product;
use App\Models\Database;


class DVD extends Product{
    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        if($size > 0){
            $this->size = $size;
        }else{
        }
    }

    public function fillData(array $data): void
    {
        $this->setName($data['name']);
        $this->setPrice($data['price']);
        $this->setSku($data['sku']);
        $this->setSize($data['size']);
    }

    public function getData(): array
    {
        return[
            'name' => $this->getName(),
            'sku' => $this->getSku(),
            'price' => $this->getPrice(),
            'type' => "DVD",
            'attribute' =>"Size: " .$this->getSize() ."MB",
        ];
    }
    public function save(Database $db): bool
    {
        $data = $this->getData();
        $sql = "INSERT INTO products (sku, name, price, type, attribute) VALUES (?, ?, ?, 'DVD', ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssds", $data['sku'], $data['name'], $data['price'], $data['attribute']);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
}