<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            include './dbconnect.php';
            include './functions.php';

            /*
             * get and hold a database connection 
             * into the $db variable
            */
            $db = getDatabase();
            
                   $results = '';
                   
                   $id = filter_input(INPUT_GET, 'id');
                $stmt = $db->prepare("SELECT * FROM corps where id = :id");
                $binds = array(
                    ":id" => $id
                );
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $results = $stmt->fetch(PDO::FETCH_ASSOC);
                }
                if ( !isset($id) ) {
                    die('Record not found');
                }
                $corp = $results['corp'];
                $incorp_dt = $results['incorp_dt'];
                $email = $results['email'];
                $zipcode = $results['zipcode'];
                $owner = $results['owner'];
                $phone = $results['phone'];
           
        ?>
        
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Corp</th>
                    <th>Incorp Date</th>
                    <th>Email</th>
                    <th>Zipcode</th>
                    <th>Owner</th>
                    <th>Phone</th>
                    <th></th>
                    <th></th>
                    
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
            
            
                <tr>
                    <td><?php echo $results['id']; ?></td>
                    <td><?php echo $results['corp']; ?></td>
                    <td><?php echo $results['incorp_dt']; ?></td>
                    <td><?php echo $results['email']; ?></td>
                    <td><?php echo $results['zipcode']; ?></td>
                    <td><?php echo $results['owner']; ?></td> 
                    <td><?php echo $results['phone']; ?></td> 
                    
                    <?php $row = $results; ?>
                    <td><a href="Update.php?id=<?php echo $row['id']; ?>">Update</a></td>            
                    <td><a href="Delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>            
                </tr>
            
        </table>
        
        
        
        
        
        <p> <a href="view-action.php">View page</a></p>
        
        
        
    </body>
</html>

