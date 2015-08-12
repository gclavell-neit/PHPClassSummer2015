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
    <h1>So Many Forms!</h1>
    <body>
     
        <?php
        
        $action = filter_input(INPUT_POST, 'submit');
        
        include './forms/form1.php';
        include './forms/form2.php';
        ?>
    </body>
</html>
