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
    <h3>Address Book</h3>
        <?php
        require_once '../includes/session-start.req-inc.php';
        include '../functions/dbconnect.php';
        include_once '../functions/until.php';
        include 'functions/addressFunctions.php';
        $action = filter_input(INPUT_GET, 'action');
        $column = filter_input(INPUT_GET, 'column');
        $orderby = filter_input(INPUT_GET, 'orderby');
        $search = filter_input(INPUT_GET, 'search');
        $user_id = $_SESSION['userId'];
        
        $results = getAddresses($user_id);
		
        if ( $action === 'search' ) {
        	$results = searchAddresses($user_id, $column, $search);
        
        }
        if ( $action === 'sort' ) {
        	$results = sortAddresses($user_id, $orderby);
        	
        }

        ?>
        
        <?php 
        /*allows access to both forms*/ 
        include 'includes/searchform.php'; ?>
        <?php include 'includes/sortform.php'; ?>
        <br>
        
       <?php if(!is_null($results)): ?>
      
       
        <table>
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                   
                    
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
                   
                    
                    
                    <td><a href="View.php?address_id=<?php echo $row['address_id']; ?>">View</a></td>      
                    <td><a href="Update.php?address_id=<?php echo $row['address_id']; ?>">Update</a></td>            
                    <td><a href="Delete.php?address_id=<?php echo $row['address_id']; ?>">Delete</a></td>  
                    <?php endforeach; ?>
                </tr>
            
        </table>
        <?php endif; ?>
        <?php if(is_null($results)): ?>
        <h3>Your address book is empty!</h3><br>
        
        <?php endif; ?>
        
        
        <a href="Add.php">Add New Address</a><br><br>
        <a href="../logout/index.php">Log Out</a>
    </body>
</html>
