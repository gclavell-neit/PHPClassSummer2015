<?php
/*
 * products
 * product_id
 * category_id
 * product
 * price
 * image
 */


function getAllProducts() {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM products");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     
    return $results;
    
}

function createProduct($category_id, $product, $price, $image ) {
    
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO products SET category_id = :category_id, product = :product, price = :price, image = :image ");

    $binds = array(
        ":category_id" => $category_id,
        ":product" => $product,
        ":price" => $price,
        ":image" => $image
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
     
    return false;
    
    
}

function updateProduct($product_id, $product, $category_id, $price){
     $db = dbconnect();
     $stmt = $db->prepare("UPDATE products SET category_id = :category_id, product= :product, price = :price WHERE product_id = :product_id");
     
     $binds = array(
        ":category_id" => $category_id,
        ":product_id" => $product_id,
         ":product" => $product,
         ":price" => $price
         
    );
     if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
     
    return false;
}

function deleteProduct($value){
    $db = dbconnect();
     $stmt = $db->prepare("DELETE FROM products WHERE product_id = :product_id");

    $binds = array(
        ":product_id" => $value
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
     
    return false;
    
}

function isValidProduct($value) {
    if ( empty($value) ) {
        return false;
    }
    return true;    
}
function isValidPrice($value) {
    if ( empty($value) ) {
        return false;
    }
    return true;
}

