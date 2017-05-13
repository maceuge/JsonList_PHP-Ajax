<?php

require_once ("support.php");

    if (isset($_POST["id"])) {

        $valid = $productRepository->validateInput($_POST["id"]);

        if ($valid) {
            $product = $productRepository->getProductById($_POST["id"]);
            echo $product;
        } else {
            echo json_encode(array("invalid" => true));
        }

    }