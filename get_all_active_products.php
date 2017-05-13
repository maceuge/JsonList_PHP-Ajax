<?php

require_once ("support.php");

    $products = $productRepository->getAllActiveProducts();

    echo $products;