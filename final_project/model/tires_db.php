<?php

function get_tires($vehicle_id) {
    global $db;
    $query = 'SELECT * FROM tires
              WHERE vehicle_id = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":vehicle_id", $vehicle_id);
    $statement->execute();
    $tires = $statement->fetchAll();
    $statement->closeCursor();
    return $tires;
}

function get_tire($tire_id) {
    global $db;
    $query = 'SELECT * FROM tires
              WHERE tire_id = :tire_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":tire_id", $tire_id);
    $statement->execute();
    $tire = $statement->fetch();
    $statement->closeCursor();
    return $tire;
}

function update_tire ($tire_id, $position, $size, $name, $date, $number_of_repairs) {
    global $db;
    $query = 'UPDATE tires
              SET position = :position,
                  size = :size,
                  name = :name,
                  date = :date,
                  number_of_repairs = :number_of_repairs
              WHERE tire_id = :tire_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':tire_id', $tire_id);
    $statement->bindValue(':position', $position);
    $statement->bindValue(':size', $size);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':date', $date);
    $statement->bindValue(':number_of_repairs', $number_of_repairs);
    $statement->execute();
    $statement->closeCursor();
}

function delete_tire ($tire_id) {
    global $db;
    $query = 'DELETE FROM tires
              WHERE tire_id = :tire_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':tire_id', $tire_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_tire ($vehicle_id, $position, $size, $name, $date, $number_of_repairs) {
    global $db;
    $query = 'INSERT INTO tires
                (vehicle_id, position, size, name, date, number_of_repairs)
              VALUES
                (:vehicle_id, :position, :size, :name, :date, :number_of_repairs)';   
    $statement = $db->prepare($query);            
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->bindValue(':position', $position);
    $statement->bindValue(':size', $size);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':date', $date);
    $statement->bindValue(':number_of_repairs', $number_of_repairs);
    $statement->execute();
    $statement->closeCursor();
}

function check_tire_positions ($position, $vehicle_id) {
    global $db;
    $query = 'SELECT * FROM tires
              WHERE position = :position AND vehicle_id = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':position', $position);
    $statement->bindValue(':vehicle_id', $vehicle_id); 
    $statement->execute(); 
    $taken_positions = $statement->fetch();
    $statement->closeCursor();
    // echo 'in function1';
    // echo $taken_positions[1];
    // echo 'in function2';
    // print_r($taken_positions);
    // echo 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
    return $taken_positions;
}

function check_positions_update_tires ($tire_id, $vehicle_id) {
    global $db;
    $query = 'SELECT position
              FROM tires
              WHERE tire_id = :tire_id AND vehicle_id = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':tire_id', $tire_id);
    $statement->bindValue(':vehicle_id', $vehicle_id); 
    $statement->execute(); 
    $taken_positions = $statement->fetch();

    // echo 'in function1';
    // echo $taken_positions;
    // echo 'in function2';
    // print_r($taken_positions);


    $statement->closeCursor();
    return $taken_positions;
}



?>