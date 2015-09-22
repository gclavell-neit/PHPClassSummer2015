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

function updateAddress($address_id, $address_group_id, $fullname, $email, $address, $phone, $website, $birthday){
	$db = dbconnect();
	$stmt = $db->prepare("UPDATE address SET address_group_id = :address_group_id, fullname = :fullname, email = :email, address = :address, phone = :phone, website = :website, birthday = :birthday WHERE address_id = :address_id");
	$binds = array(
			
			":address_id" => $address_id,
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
function groupName($address_group_id){
	$db = dbconnect();
	
	$stmt = $db->prepare("SELECT address_group FROM address_groups WHERE address_group_id = :address_group_id");
	
	$binds = array(
				
			":address_group_id" => $address_group_id
	);
	
	if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
		$groupName = $stmt->fetch(PDO::FETCH_ASSOC);
	
	}
	
	return $groupName['address_group'];

}

function searchAddresses($user_id, $column, $search){
	
	$db = dbconnect();
	/* passes values of $column and search into a prepared SELECT statement modified by a WHERE clause */
	$stmt = $db->prepare("SELECT * FROM address WHERE $column LIKE :search AND user_id = :user_id");
	
	$search = '%'.$search.'%';
	$binds = array(
			":search" => $search,
			":user_id" => $user_id
			
	);
	$results = array();
	
	if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	return $results;
	
}

function sortAddresses($user_id, $orderby){
	
	$db = dbconnect();
	
	$stmt = $db->prepare("SELECT * FROM address WHERE user_id = :user_id ORDER BY $orderby");
	$results = array();
	
	$binds = array(
			
			":user_id" => $user_id
		
				
	);
	
	if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	return $results;
	
	
}

function deleteAddress($address_id){
	
	$db = dbconnect();
	
	$stmt = $db->prepare("DELETE FROM address WHERE address_id = :address_id ");
	$results = array();
	
	$binds = array(
				
			":address_id" => $address_id
			
	);
	$isDeleted = false;
	if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
		$isDeleted = true;
	}
	return $isDeleted;
	
}

function getAddressesWithFilter($user_id, $filter){
	
	$db = dbconnect();
	$addresses = null;
	
	
	$stmt = $db->prepare("SELECT * FROM address WHERE user_id = :user_id AND address_group_id=:filter");
	
	$binds = array(
			 
			":user_id" => $user_id,
			":filter" => $filter
	
	);
	
	if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
		$addresses = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	}
	 
	return $addresses;
}


function sortAddressesWithFilter($user_id, $orderby, $filter){
	$db = dbconnect();
	
	$stmt = $db->prepare("SELECT * FROM address WHERE user_id = :user_id AND address_group_id=:filter ORDER BY $orderby");
	$results = array();
	
	$binds = array(
				
			":user_id" => $user_id,
			":filter" => $filter
	
	
	);
	
	if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	return $results;
	
}
