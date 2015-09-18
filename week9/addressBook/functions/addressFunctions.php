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

function getAddresses($user_id){
    $db = dbconnect(); 
    $addresses = null;
    $stmt = $db->prepare("SELECT * FROM address");
    
    $stmt = $db->prepare("SELECT * FROM address WHERE user_id = :user_id");
    
    $binds = array(
    			
    		":user_id" => $user_id
    );
    
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $addresses = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }
   
    return $addresses;
}

function getAddressById($address_id){
	$db = dbconnect();
	$address = array();
	$stmt = $db->prepare("SELECT * FROM address WHERE address_id = :address_id");
	
	$binds = array(
			
			":address_id" => $address_id
	);
	
	if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
		$address = $stmt->fetch(PDO::FETCH_ASSOC);
	
	}
	 
	return $address;

}