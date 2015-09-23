<!DOCTYPE html>
<!--
Paget that empty's the user's cart
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
               
        unset($_SESSION['cart']);
        ?>
        
        <h3>Your cart has been Emptied</h3>
        
            
        <a href="viewcart.php">Return to Your Cart</a>
        <a href="index.php">Products Page</a>
    </body>
</html>
