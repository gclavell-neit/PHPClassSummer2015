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
        require './functions/dbconnect.php';
        require './functions/until.php';
        
        $db = dbConnect();
        $stmt = $db->prepare("SELECT * FROM sites");
            
            $result = '';
            if (isPostRequest()) {
                $site_id = filter_input(INPUT_POST, 'site_id');
                $site = filter_input(INPUT_POST, 'site');
                $date = filter_input(INPUT_POST, 'date');
                
                $stmt = $db->prepare("INSERT INTO sites SET site= :site, date = CURDATE()");
                
                $binds = array(
                                    
                    ":site" => $site,
                    ":date" => $date
                );
                
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $result = 'Record Created';
                }else echo 'Record Not Create';
            } 
        
        include './forms/webform.php';
        ?>
    </body>
</html>
