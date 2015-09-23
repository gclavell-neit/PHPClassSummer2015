<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once 'includes/session-start.req-inc.php';
        include_once 'functions/products-functions.php';
        $product = filter_input(INPUT_GET, 'product_id');
        array_push($_SESSION['cart'], $product);
        ?>
        
        <h3>Product was Added to your Cart</h3>
        
            
           
        <a href="index.php">Products Page</a>
    </body>
</html>
