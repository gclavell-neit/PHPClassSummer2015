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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    	<link rel="stylesheet" type="text/css" href="../includes/styles.css">
    	
    </head>
    <body>
    
    <div class = "wrapper">
    <h3>Address Book</h3><br>
        <?php
        require_once '../includes/session-start.req-inc.php';
        include '../functions/access-required.html.php';
        include '../functions/dbconnect.php';
        include_once '../functions/until.php';
        include 'functions/addressFunctions.php';
        $filter = filter_input(INPUT_GET, 'address_group_id');
        $action = filter_input(INPUT_GET, 'action');
        $column = filter_input(INPUT_GET, 'column');
        $orderby = filter_input(INPUT_GET, 'orderby');
        $search = filter_input(INPUT_GET, 'search');
        $user_id = $_SESSION['userId'];
        $groups = getGroups();
        
        $results = getAddresses($user_id);
        
       	if ($filter != ""){
       		$results = getAddressesWithFilter($user_id, $filter);
       	}
		
        if ( $action === 'search' ) {
        	
        	$results = searchAddresses($user_id, $column, $search);
        
        }
        if ( $action === 'sort' ) {
        	if ($filter != ""){
        		$results = sortAddressesWithFilter($user_id, $orderby, $filter);
        	}else
        	$results = sortAddresses($user_id, $orderby);
        	
        }

        ?>
        
        
        
       <?php if(!is_null($results)): ?>
      
        <?php 
        /*allows access to forms*/ 
        include 'includes/searchform.php'; ?>
        <?php include 'includes/sortform.php'; ?>
        <?php include 'includes/filterform.php'; ?>
        <br>
        
        <table border="2" class="table table-bordered">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                   
                    
                    <th></th>
                    <th></th>
                    <th></th>
                    
                </tr>
            </thead>
                <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                   
                    
                    
                    <td><a href="View.php?address_id=<?php echo $row['address_id']; ?>">View</a></td>      
                    <td><a href="Update.php?address_id=<?php echo $row['address_id']; ?>">Update</a></td>            
                    <td><a href="Delete.php?address_id=<?php echo $row['address_id']; ?>">Delete</a></td>  
                    <?php endforeach; ?>
                </tr>
            
        </table>
        
        <?php endif; ?>
        <?php if(is_null($results)): ?>
        <h3>No Addresses Found!</h3><br>
        
        
        <?php endif; ?>
        
        <a href="index.php">Show All</a><br><br>
        <a href="Add.php">Add New Address</a><br><br>
        <a href="../logout/index.php">Log Out</a>
        </div>
        
    </body>
</html>
