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
        
        //note: Look at assignment 3 in week 3. Your read and view action pages are the opposite of how they're represented in there.
        require_once '../includes/session-start.req-inc.php';
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
                
                
                <table>
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
                            <td><?php echo $results['birthday']; ?></td> 
                            
                            
                            <td><a href="Update.php?address_id=<?php echo $row['address_id']; ?>">Update</a></td>            
                            <td><a href="Delete.php?address_id=<?php echo $row['address_id']; ?>">Delete</a></td>            
                        </tr>
                    
                </table>
                <a href="index.php">View All Addresses</a>
        
    </body>
</html>
