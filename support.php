<?php

require_once ("class/Product.php");
require_once ("class/MySqlConnection.php");
require_once ("class/ProductMySqlRepository.php");
require_once ("class/JsonRepository.php");
require_once ("class/ProductRepository.php");

$connection = new MySqlConnection();
$productRepository = new ProductMySqlRepository($connection->getConnectionDB());

if (empty($productRepository->isEmptyDb())) {

    $jsonRep = new JsonRepository();
    $jsonRep->setJsonFile();
    $jsonRep->setJsonDataInFile();
    $productRepository->insertJsonArrayDataInDatabase($jsonRep->getJsonArrayData());
}