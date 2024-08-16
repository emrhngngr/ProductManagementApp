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

        public function prepare($sql)
    {
        return $this->connection->prepare($sql);
    }

    public function close()
    {
        $this->connection->close();
    }
}
