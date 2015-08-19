<?php

function getDatabase() {
    $config = array(
        'DB_DNS' => 'mysql:host=localhost;port=3306;dbname=PHPClassSummer2015',
        'DB_USER' => 'php',
        'DB_PASSWORD' => 'summer15'
    );

    try {
        /* Create a Database connection and 
         * save it into the variable */
        $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (Exception $ex) {
        /* If the connection fails we will close the 
         * connection by setting the variable to null */
        $db = null;
    }

    return $db;
}


/*Not used in this Assignment, but returns all data in the corps table*/
function getAllCorpsData(){
    $db = getDatabase();
           
    $stmt = $db->prepare("SELECT * FROM corps");

     $results = array();
     if ($stmt->execute() && $stmt->rowCount() > 0) {
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
    return $results;
}


function searchCorps($column, $search){
    $db = getDatabase();
    /* passes values of $column and search into a prepared SELECT statement modified by a WHERE clause */           
    $stmt = $db->prepare("SELECT * FROM corps WHERE $column LIKE :search");

    $search = '%'.$search.'%';
    $binds = array(
        ":search" => $search
    );
    $results = array();
     /* if there is data to be retreived from the database, and the statement was set up correctly,
     * sets $results equal to the data */ 
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
}

function sortCorps($column, $order){
    
    $db = getDatabase();
    /* passes values of $column and $order into a prepared SELECT statement modified by an ORDER BY clause*/       
    $stmt = $db->prepare("SELECT * FROM corps ORDER BY $column $order");
   
    $results = array();
    /* if there is data to be retreived from the database, and the statement was set up correctly,
     * sets $results equal to the data */ 
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
    
}