<?php

/*
 * users
 * user_id
 * email
 * password
 */

function isValidUser( $email, $pass ) {
    
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email and password = :password");
    $pass = sha1($pass);
    $binds = array(
        ":email" => $email,
        ":password" => $pass        
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
     
    return false;
    
}

function getUserID($email){
	
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
    $binds = array(
        ":email" => $email
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $user_id = $result['user_id'];
        
    }

    return $user_id;
    
}