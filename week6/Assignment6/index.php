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
        include_once 'functions/dbconnect.php';
        include_once 'functions/until.php';
        if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
        }
        $products = getAllProductsAndCategories();
        ?>
        
        <h3>Product List</h3>
        <table>
            <thead>
                <tr>
                    
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    
                    
                   
                </tr>
            </thead>
          
            
            <?php foreach ($products as $row): ?>
                <tr>
                    
                    <td><?php echo $row['product']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><a href="addedtocart.php?product_id=<?php echo $row['product_id'];?>">Add to Cart</a></td>
                    
                              
                </tr>
            <?php endforeach; ?>
            
        </table>
        <a href="viewcart.php">View Your Cart</a>
        <a href="admin/index.php">Administrator Login</a>
    </body>
</html>
