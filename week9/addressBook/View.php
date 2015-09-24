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
    	
        <?php
        require_once '../includes/session-start.req-inc.php';
        include '../functions/access-required.html.php';
        include '../functions/dbconnect.php';
        include_once '../functions/until.php';
        include 'functions/addressFunctions.php';
        $user_id = $_SESSION['userId'];
        $address_id = filter_input(INPUT_GET, 'address_id');
        $groups = getGroups();
      
        
        $results = getAddressById($address_id);
        $fullname = $results['fullname'];
        $group = groupName($results['address_group_id']);
        $email = $results['email'];
        $address = $results['address'];
        $phone = $results['phone'];
        $website = $results['website'];
        $birthday = $results['birthday'];
         
        ?>
                
              <div class="wrapper">  
              <h3>Address Book</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Group</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Website</th>
                            <th>Birthday</th>
                            <th></th>
                            <th></th>
                            
                        </tr>
                    </thead>
                   
                        <tr>
                            
                            <td><?php echo $results['fullname']; ?></td>
                            <td><?php echo $group; ?></td>
                            <td><a href="mailto:<?php echo $results['email']; ?>"><?php echo $results['email']; ?></a></td>
                            <td><a href="http://maps.google.com/?q=<?php echo $results['address'];?>"><?php echo $results['address']; ?></a></td>
                            <td><a href="tel:<?php echo $results['phone']; ?>"><?php echo $results['phone']; ?></a></td>
                            <td><a href="http://<?php echo $results['website']; ?>"><?php echo $results['website']; ?></a></td> 
                            <td><?php echo date('Y-m-d', strtotime(str_replace('-','/', $results['birthday']))); ?></td> 
                            
                            
                            <td><a href="Update.php?address_id=<?php echo $results['address_id']; ?>">Update</a></td>            
                            <td><a href="Delete.php?address_id=<?php echo $results['address_id']; ?>">Delete</a></td>            
                        </tr>
                    
                </table>
                <a href="index.php">View All Addresses</a>
               </div> 
        
    </body>
</html>
