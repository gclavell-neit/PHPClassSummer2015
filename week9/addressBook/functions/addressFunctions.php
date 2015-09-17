<?php

function newAddress($user_id, $address_group_id, $fullname, $email, $address, $phone, $website, $birthday) {
    
    $db = dbconnect();    
    $stmt = $db->prepare("INSERT INTO address SET user_id = :user_id, address_group_id = :address_group_id, fullname = :fullname, email = :email, address = :address, phone = :phone, website = :website, birthday = :birthday");
    $binds = array(
        ":user_id" => $user_id,
        ":address_group_id" => $address_group_id,
        ":fullname" => $fullname,
        ":email" => $email,
        ":address" => $address,
        ":phone" => $phone,
        ":website" => $website,
        ":birthday" => $birthday
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
     
    return false;
    
}

function getGroups(){
    $db = dbconnect();    
    $stmt = $db->prepare("SELECT * FROM address_groups");
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $groups = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
   
    return $groups;
}

function getAddresses(){
    $db = dbconnect();    
    $stmt = $db->prepare("SELECT * FROM address");
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $addresses = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }
   
    return $addresses;
}