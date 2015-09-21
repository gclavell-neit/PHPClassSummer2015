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
        $user_id = $_SESSION['userId'];
        
        $groups = getGroups();
        if (isPostRequest()) {
                
                $address_group_id = filter_input(INPUT_POST, 'address_group_id');
                $fullname = filter_input(INPUT_POST, 'fullname');
                $email = filter_input(INPUT_POST, 'email');
                $address = filter_input(INPUT_POST, 'address');
                $phone = filter_input(INPUT_POST, 'phone');
                $website = filter_input(INPUT_POST, 'website');
                $birthday = date( 'Y-m-d', filter_input(INPUT_POST, 'birthday'));
                if($fullname != "" && $email !="" && $address != "" && $phone!= ""){
                 if(newAddress($user_id, $address_group_id, $fullname, $email, $address, $phone, $website, $birthday)){
                 echo '<h3>Added successfully</h3>';
                 }else{
                     
                   echo '<h3>Address was not added successfully</h3>';
                 }
                }else echo '<h3>The Name, email, address, and phone fields cannot be left blank</h3>';
          
        }
       
        include 'includes/newAddressForm.php';
        echo '<p><a href="index.php">Return to Address Book</a></p>';
        echo '<p><a href="../logout/index.php">Log Out</a></p>';
        ?>
       
    </body>
</html>
