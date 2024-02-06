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

    // Diğer veritabanı işlemleri için gerekli metodlar eklenebilir...

    public function escapeString($string)
    {
        return $this->connection->real_escape_string($string);
    }

    public function close()
    {
        $this->connection->close();
    }
}
