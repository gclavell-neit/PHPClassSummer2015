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
        $address_id = filter_input(INPUT_GET, 'address_id');       
        $groups = getGroups();
        
        $results = getAddressById($address_id);
        ?>
        
        <div class="wrapper">
        <div class="row">
        <h3>Update</h3><br>

       <div class="col-md-4" >
       <h4>Update Form</h4>
        <?php
        if (isPostRequest()) {
        
        	$address_group_id = filter_input(INPUT_POST, 'address_group_id');
        	$fullname = filter_input(INPUT_POST, 'fullname');
        	$email = filter_input(INPUT_POST, 'email');
        	$address = filter_input(INPUT_POST, 'address');
        	$phone = filter_input(INPUT_POST, 'phone');
        	$website = filter_input(INPUT_POST, 'website');
        	$timestamp = strtotime(filter_input(INPUT_POST, 'birthday'));
            $birthday = date( 'Y-m-d H:i:s', $timestamp);
        	if(updateAddress($address_id, $address_group_id, $fullname, $email, $address, $phone, $website, $birthday)){
        		echo '<h3>Address updated successfully</h3>';
        	}else{
        		 
        		echo '<h3>Address was not updated successfully</h3>';
        	}
        
        }
        
        include 'includes/newAddressForm.php';
        ?>
        </div>
        <div class="col-md-8">
        <h4>Current Data</h4>
        <span>Name: <?php echo $results['fullname']; ?> </span><br>
        <span>Group: <?php echo groupName($results['address_group_id']); ?> </span><br>
        <span>Email: <?php echo $results['email']; ?> </span><br>
        <span>Address: <?php echo $results['address']; ?> </span><br>
        <span>Phone: <?php echo $results['phone']; ?> </span><br>
        <span>Website: <?php echo $results['website']; ?> </span><br>
        <span>Birthday: <?php echo $results['birthday']; ?> </span><br><br>
       </div>
        
        </div>
        <br>
        <p><a href="index.php">Return to Address Book</a></p>
        <a href="../logout/index.php">Log Out</a>
        </div>
    </body>
</html>
