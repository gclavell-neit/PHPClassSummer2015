<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php  
        
            $key = 'test';
            //echo sha1($key);
            //?id=a94a8fe5ccb19ba61c4c0873d391e987982fbbd3
            $id = filter_input(INPUT_GET, 'id');            
            //echo $id;  
            
            if ( $id === sha1($key) ) {
                echo 'Key entered';
            }
            
            
        ?>
    </body>
</html>
