<?php

namespace App\Models\Types;
use App\Models\Product;

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
}