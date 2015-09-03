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
        require_once '../../includes/session-start.req-inc.php';
        require_once '../../includes/access-required.html.php';
        
        include_once '../../functions/dbconnect.php';
        include_once '../../functions/category-functions.php';
        include_once '../../functions/products-functions.php';
        include_once '../../functions/until.php';
        
        $products = getAllProducts();
        $categories = getAllCategories();
        
        if ( isPostRequest() ) {
            
            $product = filter_input(INPUT_POST, 'product');
            $product_id = filter_input(INPUT_POST, 'product_id');
            $price = filter_input(INPUT_POST, 'price');
            $category_id = filter_input(INPUT_POST, 'category_id');
                                    
            if ( isValidProduct($product) ) {
                
                if ( updateProduct($product_id, $product, $category_id, $price) ) {
                    $results = 'Product Updated';
                } else {
                    $results = 'Product was not Updated';
                }
                               
            } else {
               $results = 'Product is not valid';
            }
            
        }
        
        ?>
        <h1>Update Product</h1>
        <?php include '../../includes/results.html.php'; ?>
         <form method="post" action="#">
            
            Product to Update:
            <select name="product_id">
            <?php foreach ($products as $row): ?>
                <option value="<?php echo $row['product_id']; ?>">
                    <?php echo $row['product']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br />
            <form method="post" action="#">
            
            Updated Category:
            <select name="category_id">
            <?php foreach ($categories as $row): ?>
                <option value="<?php echo $row['category_id']; ?>">
                    <?php echo $row['category']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br />
            New Product Name : <input type="text" name="product" value="" />
            <br />
            New Price : <input type="text" name="price" value="" />
            
            <input type="submit" value="Submit" />
        </form>
         <p> <a href="index.php">Admin Portal</a></p>
    </body>
</html>
