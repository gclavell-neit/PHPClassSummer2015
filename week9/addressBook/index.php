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
        // address book main page
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
                $birthday = filter_input(INPUT_POST, 'birthday');
                 if(newAddress($user_id, $address_group_id, $fullname, $email, $address, $phone, $website, $birthday)){
                 echo '<h3>Added successfully</h3>';
                 }else{
                     
                   echo '<h3>You didnt do it right dummy</h3>';
                 }
          
        }
       
        include 'includes/newAddressForm.php';
        echo '<p><a href="../logout/index.php">Log Out</a></p>';
        ?>
       
    </body>
</html>
