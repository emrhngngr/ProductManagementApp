<?php

namespace App\Models;

class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'scandiweb_products';
    private $connection;

    public function __construct()
    {
        $this->connection = new \mysqli($this->host, $this->username, $this->password, $this->dbname);
        if ($this->connection->connect_error) {
            die("Database connection failed: " . $this->connection->connect_error);
        }
    }

    public function query($sql)
    {
        return $this->connection->query($sql);
    }

    public function fetch($sql)
    {
        $result = $this->query($sql);
        if ($result) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public function fetchAll($sql)
    {
        $result = $this->query($sql);
        if ($result) {
            $rows = [];
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return false;
        }
    }

    public function insertProduct(Product $product)
    {
        $data = $product->getData();

        $existingProduct = $this->fetch("SELECT * FROM products WHERE sku = '{$data['sku']}'");

        if ($existingProduct) {
            return false;
        }

        $sql = "INSERT INTO products (sku, name, price, type, attribute) VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ssdss", $data['sku'], $data['name'], $data['price'], $data['type'], $data['attribute']);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

    public function close()
    {
        $this->connection->close();
    }
}
