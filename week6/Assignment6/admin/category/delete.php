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
        
        if ( isPostRequest() ) {
            
            $category = filter_input(INPUT_POST, 'category_id');
        
        if ( deleteCategory($category) ) {
                    $results = 'Category Deleted';
                } else {
                    $results = 'Category was not Deleted';
                }
               
        }
        ?>
         <h1>Delete Category</h1>
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
            
            <input type="submit" value="Submit" />
        </form>
         <p> <a href="index.php">Admin Portal</a></p>
    </body>
</html>
