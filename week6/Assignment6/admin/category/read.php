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
        include_once '../../functions/until.php';
        $categories = getAllCategories();
        ?>
        
        <h3>Categories List</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    
                   
                </tr>
            </thead>
            <?php
            /*
             * Use a for each loop to go through the
             * associative array. $results is a multi 
             * dimensional array. Arrays with arrays.
             * 
             * So we loop through each result to get back
             * an array with values
             * 
             * feel free to 
             * <?php echo print_r($results); ?>
             * to see how the array is structured
             */            
            ?>
            
            <?php foreach ($categories as $row): ?>
                <tr>
                    
                    <td><?php echo $row['category_id']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    
                    
                              
                </tr>
            <?php endforeach; ?>
            
        </table>
        <p> <a href="index.php">Admin Portal</a></p>
    </body>
</html>
