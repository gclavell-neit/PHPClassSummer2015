<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <?php
        include './functions.php';
        include './functions/dbData.php';
        $action = filter_input(INPUT_GET, 'action');
        $column = filter_input(INPUT_GET, 'column');
        $order = filter_input(INPUT_GET, 'order');
        $search = filter_input(INPUT_GET, 'search');
        $results = getAllCorpsData();
        
        if ( $action === 'search' ) {
            $results = searchCorps($column, $search);
            
        }
        if ( $action === 'sort' ) {
            $results = sortCorps($column, $order);
        }
         ?>
       
        <?php 
        /*allows access to both forms*/ 
        include './forms/searchform.php'; ?>
        <h3>OR</h3>
        <?php include './forms/sortform.php'; ?>
        <br>
        <table border="2" class="table table-striped">
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
