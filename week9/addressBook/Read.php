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
        $user_id = $_SESSION['userId']; 
        $results = getAddresses($user_id);
        

        ?>
       <?php if(!is_null($results)): ?>
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
                    
                    
                    <td><a href="View.php?address_id=<?php echo $row['address_id']; ?>">View</a></td>      
                    <td><a href="Update.php?address_id=<?php echo $row['address_id']; ?>">Update</a></td>            
                    <td><a href="Delete.php?address_id=<?php echo $row['address_id']; ?>">Delete</a></td>  
                    <?php endforeach; ?>
                </tr>
            
        </table>
        <?php endif; ?>
        <?php if(is_null($results)): ?>
        <h3>Your address book is empty!</h3>
        
        <a href="index.php">Return to Address Listing</a><br>
        <?php endif; ?>
        
        
        
        <a href="../logout/index.php">Log Out</a>
    </body>
</html>
