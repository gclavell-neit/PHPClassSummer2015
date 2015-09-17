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
        require_once '../includes/session-start.req-inc.php';
        include '../functions/dbconnect.php';
        include_once '../functions/until.php';
        include 'functions/addressFunctions.php';
        $user_id = $_SESSION['userId']; //must pass user id in getAddresses and adjust select statement to show only entries for that user
        $results = getAddresses();
        

        ?>
        <table>
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Website</th>
                    <th>Birthday</th>
                    
                    <th></th>
                    <th></th>
                    <th></th>
                    
                </tr>
            </thead>
                <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['website']; ?></td>
                    <td><?php echo $row['birthday']; ?></td> 
                    
                    <?php $row = $results; ?>
                    <td><a href="View.php?id=<?php echo $row['address_id']; ?>">View</a></td>      
                    <td><a href="Update.php?id=<?php echo $row['address_id']; ?>">Update</a></td>            
                    <td><a href="Delete.php?id=<?php echo $row['address_id']; ?>">Delete</a></td>  
                    <?php endforeach; ?>
                </tr>
            
        </table>
    </body>
</html>
