<?php


namespace App\Models;
use App\Models\Types\Book;
use App\Models\Types\DVD;
use App\Models\Types\Furniture;

class ProductFactory
{
    public function createProduct($productType): Product
    {
        switch ($productType) {
            case 'Book':
                return new Book();
            case 'DVD':
                return new DVD();
            case 'Furniture':
                return new Furniture();
            default:
                // Handle invalid product type
                throw new \InvalidArgumentException("Invalid product type: $productType");
        }
    }
}










?>