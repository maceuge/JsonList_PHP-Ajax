<?php

require_once("Product.php");
require_once("ProductRepository.php");

class ProductMySqlRepository extends ProductRepository {

    private $database;
    private $productItems;

    public function __construct($databaseConnection) {
        $this->database = $databaseConnection;
    }


    public function getConnection() {
        return $this->database;
    }

    public function isEmptyDb () {
        $stmt = $this->database->prepare("SELECT * from products");
        $stmt->execute();
        $this->productItems = $stmt->fetchAll();

        return $this->productItems;
    }

    public function addProduct(Product $product) {

        try {
            $stmt = $this->database->prepare("INSERT INTO products (id, name, price, status) VALUES (:id, :name, :price, :status)");

            $stmt->bindValue(":id", $product->getId());
            $stmt->bindValue(":name", $product->getName());
            $stmt->bindValue(":price", $product->getPrice());
            $stmt->bindValue(":status", $product->getStatus());

            $stmt->execute();

        } catch (PDOException $e) {
            echo "No se pudo agregar item ". $e->getMessage();
        }

    }

    public function insertJsonArrayDataInDatabase ($jsonArrayData) {

        foreach ($jsonArrayData as $productItem) {
            $productId = $productItem["id"];
            $productName = $productItem["name"];
            $productPrice = $productItem["price"];
            $productStatus = 1;

            $product = new Product($productId, $productName, $productPrice, $productStatus);
            $this->addProduct($product);
        }
    }


    public function getAllActiveProducts () {
        $stmt = $this->database->prepare("SELECT * FROM products WHERE status = 1");
        $stmt->execute();
        $activeProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($activeProducts);
    }

    public function getProductById ($id) {
        $stmt = $this->database->prepare("SELECT * FROM products WHERE id = $id && status = 1 ");
        $stmt->execute();
        $productById = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (isset($productById)) {
            return json_encode($productById);
        } else {
            return null;
        }
    }

    public function deleteProduct ($id) {
        $stmt = $this->database->prepare("UPDATE products SET status = -1 WHERE id = $id");
        $stmt->execute();

        return $this->getAllActiveProducts();

    }


    public function validateInput ($id) {
        $stmt = $this->database->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $validate = $stmt->fetchAll();

        return $validate;

    }

}