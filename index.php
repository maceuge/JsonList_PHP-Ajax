<?php
require_once ("support.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <title>Productos</title>

    <style>
        .container {margin-top: 100px;}
        .adjust {margin-top: 13px;}
    </style>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h3>Buscar Producto</h3>
            <span><p class="text-danger"></p></span>
            <form class="form-inline" action="index.php" method="post">
                <div class="form-group">
                    <input type="text" name="id" id="productId" class="form-control" placeholder="ID" autocomplete="off" maxlength="8">
                </div>
                <button type="submit" class="btn btn-default" id="searchById">Consultar</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 adjust">
            <form class="form" action="index.php" method="post">
                <button type="submit" class="btn btn-info" id="viewProducts">Ver Todos</button>
            </form>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div id="result"></div>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/jquery-2.2.3.js"></script>
<script type="text/javascript" src="js/getProductById.js"></script>
<script type="text/javascript" src="js/getAllActiveProducts.js"></script>
<script type="text/javascript" src="js/deleteProductById.js"></script>

</body>
</html>