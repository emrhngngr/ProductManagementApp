<?php

namespace App\Controllers;

use App\Models\ProductFactory;
use App\Models\Types\Book;
use App\Models\Types\DVD;
use App\Models\Types\Furniture;
use App\Models\Product;
use App\Models\Database;

class ProductController
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function index()
    {
        $products = $this->database->fetchAll("SELECT * FROM products ORDER BY sku");
        
        require __DIR__ . "/../Views/products.php";
    }

    public function create()
    {
        require __DIR__ . "/../Views/add-product.php";
    }

    public function store()
    {
        $data = $_POST;
        $productType = $_POST['productType'];

        $productFactory = new ProductFactory();
        $product = $productFactory->createProduct($productType);
        
        $product->fillData($data);

        if ($this->database->insertProduct($product)) {
            header("Location: /scandiweb/products");
            exit();
        } else {
            $_SESSION['error_message'] = "Failed to insert product.";
            header("Location: /scandiweb/addproduct");
            exit();
        }
    }

    public function delete()
    {
        $skusToDelete = $_POST['deletesku'];

        foreach ($skusToDelete as $sku) {
            $this->database->query("DELETE FROM products WHERE sku = '$sku'");
        }

        header("Location: products");
        exit;
    }
}
