<!DOCTYPE html>
<!--
UPDATE PAGE IN ADDRESSBOOK FOLDER
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
        $address_id = filter_input(INPUT_GET, 'address_id');       
        $groups = getGroups();
        
        $results = getAddressById($address_id);
        ?>
       
        <h4>Current Data</h4>
        <span>Name: <?php echo $results['fullname']; ?> </span><br>
        <span>Group: <?php echo groupName($results['address_group_id']); ?> </span><br>
        <span>Email: <?php echo $results['email']; ?> </span><br>
        <span>Address: <?php echo $results['address']; ?> </span><br>
        <span>Phone: <?php echo $results['phone']; ?> </span><br>
        <span>Website: <?php echo $results['website']; ?> </span><br>
        <span>Birthday: <?php echo $results['birthday']; ?> </span><br><br><br>
       
       
       <h4>Update Form</h4>
        <?php
        if (isPostRequest()) {
        
        	$address_group_id = filter_input(INPUT_POST, 'address_group_id');
        	$fullname = filter_input(INPUT_POST, 'fullname');
        	$email = filter_input(INPUT_POST, 'email');
        	$address = filter_input(INPUT_POST, 'address');
        	$phone = filter_input(INPUT_POST, 'phone');
        	$website = filter_input(INPUT_POST, 'website');
        	$birthday = filter_input(INPUT_POST, 'birthday');
        	if(updateAddress($address_id, $address_group_id, $fullname, $email, $address, $phone, $website, $birthday)){
        		echo '<h3>Address updated successfully</h3>';
        	}else{
        		 
        		echo '<h3>Address was not updated successfully</h3>';
        	}
        
        }
        
        include 'includes/newAddressForm.php';
        ?>
       
        
        <p><a href="index.php">Return to Address Book</a></p>
        <a href="../logout/index.php">Log Out</a>
    </body>
</html>
