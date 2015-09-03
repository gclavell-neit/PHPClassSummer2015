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
        ?>
        <h1>Products</h1>
        <p> <a href="create.php">Add New Product</a></p>
        <p> <a href="delete.php">Delete Product</a></p>
        <p> <a href="update.php">Update Product</a></p>
        <p> <a href="read.php">View All Products</a></p>
        <br><br>
         <p> <a href="../index.php">Return to Admin Portal</a></p>
    </body>
</html>
