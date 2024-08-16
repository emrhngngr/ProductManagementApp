<?php


namespace App\Models\Types;
use App\Models\Product;
use App\Models\Database;


class Book extends Product{
    public function setWeight($weight)
    {
        if ($weight > 0) {
            $this->weight = $weight;
        } else {
        }
    }

    public function getWeight(): float
    {
        return $this->weight;
    }
    
    public function fillData(array $data): void
    {
        $this->setName($data['name']);
        $this->setPrice($data['price']);
        $this->setSku($data['sku']);
        $this->setWeight($data['weight']);
    }


    public function getData(): array
    {
        return [
            'name' => $this->getName(),
            'sku' => $this->getSku(),
            'price' => $this->getPrice(),
            'type' => "Book",
            'attribute' =>"Weight: " .$this->getWeight()."KG",
        ];
    }
    public function save(Database $db): bool
    {
        $data = $this->getData();
        $sql = "INSERT INTO products (sku, name, price, type, attribute) VALUES (?, ?, ?, 'Book', ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssds", $data['sku'], $data['name'], $data['price'], $data['attribute']);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
    
}