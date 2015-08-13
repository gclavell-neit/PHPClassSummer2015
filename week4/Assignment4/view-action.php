<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include './functions.php';
        include './functions/dbData.php';
        $action = filter_input(INPUT_GET, 'action');
        $column = filter_input(INPUT_GET, 'column');
        $order = filter_input(INPUT_GET, 'order');
        $search = filter_input(INPUT_GET, 'search');
     
        if ( $action === 'search' ) {
            $results = searchCorps($column, $search);
            echo print_r($results);
        }
        if ( $action === 'sort' ) {
            $results = sortCorps($column, $order);
        }
         ?>
        <?php include './forms/searchform.php'; ?>
        <h3>OR</h3>
        <?php include './forms/sortform.php'; 
        ?>
        <br>
        <table>
            <thead>
                <tr>
                    
                    <th>ID</th>
                    <th>Corp</th>
                    <th>Incorp. Date</th>
                    <th>Email</th>
                    <th>Zipcode</th>
                    <th>Owner</th>
                    <th>Phone</th>
                    
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
            
            <?php foreach ($results as $row): ?>
                <tr>
                    
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo $row['incorp_dt']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['zipcode']; ?></td>
                    <td><?php echo $row['owner']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    
                  
                              
                </tr>
            <?php endforeach; ?>
                
        </table>

    </body>
</html>
