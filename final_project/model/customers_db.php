<?php

function get_customers() {
    global $db;
    $query = 'SELECT * FROM customers
              ORDER BY customer_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $customers = $statement->fetchAll();
    $statement->closeCursor();
    return $customers;
}

function get_customer($customer_id) {
    global $db;
    $query = 'SELECT * FROM customers
              WHERE customerID = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":customer_id", $customer_id);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}

function search_customers ($customer_phone) {
    global $db;
    $query = 'SELECT * FROM customers
              WHERE customer_phone = :customer_phone';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_phone', $customer_phone); 
    $statement->execute(); 
    $customer = $statement->fetch();
    // $statement -> debugDumpparams();
    $statement->closeCursor();
    return $customer;
}
?>