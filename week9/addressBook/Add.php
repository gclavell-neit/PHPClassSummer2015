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
                $timestamp = strtotime(filter_input(INPUT_POST, 'birthday'));
                $birthday = date( 'Y-m-d H:i:s', $timestamp);
                if($fullname != "" && $email !="" && $address != "" && $phone!= ""){
                 if(newAddress($user_id, $address_group_id, $fullname, $email, $address, $phone, $website, $birthday)){
                 echo '<h3>Added successfully</h3>';
                 }else{
                     
                   echo '<h3>Address was not added successfully</h3>';
                 }
                }else echo '<h3>The Name, email, address, and phone fields cannot be left blank</h3>';
          
        }
        ?>
        <div class="wrapper">
        <h3>New Address</h3><br>
        <?php include 'includes/newAddressForm.php';?>
        <br>
        <p><a href="index.php">Return to Address Book</a></p>
        <p><a href="../logout/index.php">Log Out</a></p>
        </div>
        
       
    </body>
</html>
