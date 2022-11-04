<?php

function get_vehicles($customer_id) {
    global $db;
    $query = 'SELECT * FROM vehicles
              WHERE customer_id = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":customer_id", $customer_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicle($vehicle_id) {
    global $db;
    $query = 'SELECT * FROM vehicles
              WHERE vehicle_id = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":vehicle_id", $vehicle_id);
    $statement->execute();
    $vehicle = $statement->fetch();
    $statement->closeCursor();
    return $vehicle;
}



?>