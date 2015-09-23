<!DOCTYPE html>
<!--
View cart page
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
        $total = 0;
        if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
        }
        
        ?>
        
        <h3>Cart</h3>
        <table>
            <thead>
                <tr>
                    
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th></th>
                    
                    
                   
                </tr>
            </thead>
          
            <?php $i = 0?>
            <?php foreach ( $_SESSION['cart'] as $product_id): ?>
            <?php $product = getProduct($product_id); ?>
                <tr>
                    <?php $product = getProduct($product_id); ?>
                    <td><?php echo $product['product']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['category']; ?></td>
                    <td><a href="removefromcart.php?index=<?php echo $i; ?>">Remove from Cart</a></td>
                    <?php  $total = $total + $product['price']; ?>
                    <?php $i++;?>      
                </tr>
            <?php endforeach; ?>
            
        </table><br>
        Your Total is: <?php echo $total;?><br>
        <br><a href="emptied.php">Empty Your Cart</a>
        <br><a href="index.php">Products Page</a>
    </body>
</html>
