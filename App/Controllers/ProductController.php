<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController
{
    public function index()
    {
        require __DIR__ . "/../Views/products.php";
    }

    public function create()
    {
        require __DIR__ . "/../Views/add-product.php";
    }
}

