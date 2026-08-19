<?php

class Product
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function getAllProducts()
    {
        $sql = "SELECT product_id, product_name, product_description, product_cost
                FROM products";
        $result = $this->conn->query($sql);
        $products = array();
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }
        return $products;
    }

    public function getProductById($product_id)
    {
        $product_id = intval($product_id);
        $sql = "SELECT product_id, product_name, product_description, product_cost
                FROM products
                WHERE product_id = $product_id";
        $result = $this->conn->query($sql);
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }
}
?>