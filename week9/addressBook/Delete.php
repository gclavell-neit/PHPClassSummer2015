<!DOCTYPE html>
<!--
DELETE PAGE IN ADDRESSBOOK FOLDER
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
        $user_id = $_SESSION['userId']; //must pass user id in getAddresses and adjust select statement to show only entries for that user
        $address_id = filter_input(INPUT_GET, 'address_id');
        $results = getAddressById($address_id);
        ?>
        
        <h1> Record for
        <?php echo $results['fullname']; ?>
        <?php if ( !deleteAddress($address_id) ): ?> 
        Not
        <?php endif; ?>
        Deleted</h1>
        
        <p><a href="index.php">Return to Address Book</a></p>
        <a href="../logout/index.php">Log Out</a>
    </body>
</html>