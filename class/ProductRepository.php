<?php

require_once ("Product.php");

abstract class ProductRepository {

    public abstract function addProduct(Product $product);

}