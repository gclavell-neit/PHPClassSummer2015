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
        include_once '../../functions/dbconnect.php';
        include_once '../../functions/category-functions.php';
        include_once '../../functions/products-functions.php';
        include_once '../../functions/until.php';
        
        $products = getAllProducts();
        
        if ( isPostRequest() ) {
            
            $product = filter_input(INPUT_POST, 'product_id');
        
        if ( deleteProduct($product) ) {
                    $results = 'Product Deleted';
                } else {
                    $results = 'Product was not Deleted';
                }
               
        }
        ?>
        <h1>Delete Product</h1>
        <?php include '../../includes/results.html.php'; ?>
         <form method="post" action="#">
            
            Product:
            <select name="product_id">
            <?php foreach ($products as $row): ?>
                <option value="<?php echo $row['product_id']; ?>">
                    <?php echo $row['product']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br />
            
            <input type="submit" value="Submit" />
        </form>
         <p> <a href="index.php">Product Admin Page</a></p>
    </body>
</html>
