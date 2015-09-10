<?php

function newUser( $email, $pass ) {
    
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password");
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

