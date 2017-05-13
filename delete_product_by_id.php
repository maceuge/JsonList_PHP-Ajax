<?php

require_once ("support.php");

if (isset($_POST["id"])) {
    $product = $productRepository->deleteProduct($_POST["id"]);

    echo $product;
}