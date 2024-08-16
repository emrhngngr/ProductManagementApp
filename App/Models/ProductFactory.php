<?php


namespace App\Models;

use App\Models\Types\Book;
use App\Models\Types\DVD;
use App\Models\Types\Furniture;

class ProductFactory {
    private static $productClasses = [
        'Book' => Book::class,
        'DVD' => DVD::class,
        'Furniture' => Furniture::class
    ];

    public static function createProduct($type, $params = []) {
        if (!isset(self::$productClasses[$type])) {
            throw new \Exception("Invalid product type: " . $type);
        }
        $className = self::$productClasses[$type];
        return new $className(...$params);
    }
}


?>