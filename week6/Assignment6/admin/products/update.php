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
            
            $product = filter_input(INPUT_POST, 'product');
            $product_id = filter_input(INPUT_POST, 'product_id');
                                    
            if ( isValidProduct($product) ) {
                
                if ( updateProduct($product, $product_id) ) {
                    $results = 'Product Updated';
                } else {
                    $results = 'Product was not Updated';
                }
                               
            } else {
               $results = 'Product is not valid';
            }
            
        }
        
        ?>
        <h1>Update Category</h1>
        <?php include '../../includes/results.html.php'; ?>
         <form method="post" action="#">
            
            Category:
            <select name="category_id">
            <?php foreach ($categories as $row): ?>
                <option value="<?php echo $row['category_id']; ?>">
                    <?php echo $row['category']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br />
            New Name : <input type="text" name="category" value="" />
            
            <input type="submit" value="Submit" />
        </form>
         <p> <a href="index.php">Admin Portal</a></p>
    </body>
</html>
