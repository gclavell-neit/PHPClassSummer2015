<?php

function newUser( $email, $pass ) {
    
    $db = dbconnect();
    $date = date('Y-m-d H:i:s');
    $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password, created = :date");
    $pass = sha1($pass);
    $binds = array(
        ":email" => $email,
        ":password" => $pass,
    	":date"=> $date
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
     
    return false;
    
}

