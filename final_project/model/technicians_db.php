<?php

function check_tech_login ($username, $password) {
    global $db;
    $query = 'SELECT * FROM technicians
              WHERE username = :username AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password); 
    $statement->execute();
    // echo '------';
    // $statement->debugDumpParams();
    // echo '------';
    $technician = $statement->fetch();
    $statement->closeCursor();
    return $technician;
}

?>