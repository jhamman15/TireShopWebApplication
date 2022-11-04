<?php
require('../model/database.php');
require('../model/technicians_db.php');
require('../model/customers_db.php');
require('../model/tires_db.php');
require('../model/vehicles_db.php');


$action = filter_input(INPUT_POST, 'action');

// echo 'vehicle manager' . $action;


if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'login_technician';
    }
}

if ($action == 'login_technician') {
    session_start();
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $technician = check_tech_login($username, $password);

    if($technician[2] !== $username || $technician[3] !== $password) {
        $error = "Invalid Entry.";
        include('../errors/error.php');
    } else {
        $_SESSION['username']=$_POST['username'];
        // $customers = get_customers();
        include ('technician_home.php');
    }

} else if ($action == 'search_customers') {
    $phone = filter_input(INPUT_POST, 'phone');
    //take out any extra whitespace
    $phone = trim($phone);
    // echo $phone;
    $customer = search_customers($phone);
    // echo $phone;

    //use customers phone number from array to compare to entered phone
    if($customer[3] !== $phone) {
        // echo 'fail';
        $error = "Invalid Entry.";
        include('../errors/error.php');
    } else {
        // echo 'pass';
        $customer_id = $customer['customer_id'];
        $vehicles = get_vehicles($customer_id);
        include ('customer_info.php');
    }
    

} else if ($action == 'view_vehicle') {

    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
    $vehicle = get_vehicle($vehicle_id);
    $tires = get_tires($vehicle_id);
    include ('vehicle_info.php');

} else if ($action == 'view_tire_edit_form') {

    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
    $vehicle = get_vehicle($vehicle_id);
    $tire_id = filter_input(INPUT_POST, 'tire_id', FILTER_VALIDATE_INT);
    $tire = get_tire($tire_id);
    include ('edit_tire.php');

} else if ($action == 'update_tire') {

    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
    $tire_id = filter_input(INPUT_POST, 'tire_id', FILTER_VALIDATE_INT);

    // echo $vehicle_id;
    // echo $tire_id;

    $used_positions = check_positions_update_tires($tire_id, $vehicle_id);

    // echo $used_positions[0];
    // echo '<pre>'; print_r($used_positions); echo '</pre>';

    $customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
    $position = filter_input(INPUT_POST, 'position');
    $size = filter_input(INPUT_POST, 'size');
    $name = filter_input(INPUT_POST, 'name');
    $date = filter_input(INPUT_POST, 'date');
    $number_of_repairs = filter_input(INPUT_POST, 'number_of_repairs');

    if ($position === $used_positions[0]) {
        update_tire ($tire_id, $position, $size, $name, $date, $number_of_repairs);
        $vehicle = get_vehicle($vehicle_id);
        $tires = get_tires($vehicle_id);
        // echo 'first if statement';
        include ('vehicle_info.php');

    }   else  {
        // echo 'Else';
        $taken_positions = check_tire_positions ($position, $vehicle_id);
        // echo $taken_positions[1];

            if ($taken_positions[1] === $position) {
                // echo 'error if statement';
                $error = "Invalid Entry. Tire Position already taken.";
                include('../errors/error.php');

            } else {
                if ($position == 'FL' || $position == 'FR' || $position == 'RL' || $position == 'RR' ||
                $position == 'S' || $position == 'F' || $position == 'R') {
                update_tire ($tire_id, $position, $size, $name, $date, $number_of_repairs);
                // echo '2nd else statement';
                $vehicle = get_vehicle($vehicle_id);
                $tires = get_tires($vehicle_id);
                include ('vehicle_info.php');

                } else {
                    $error = "Invalid Entry. Not a valid Tire position.";
                    include('../errors/error.php');
                }
            }


    }

} else if ($action == 'delete_tire') {
    $tire_id = filter_input(INPUT_POST, 'tire_id', FILTER_VALIDATE_INT);
    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);

    delete_tire($tire_id);
    $vehicle = get_vehicle($vehicle_id);
    $tires = get_tires($vehicle_id);
    include ('vehicle_info.php');

} else if ($action == 'show_add_tire_form') {
    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
    $tire_id = filter_input(INPUT_POST, 'tire_id', FILTER_VALIDATE_INT);
    $tires = get_tires($vehicle_id);
    $vehicle = get_vehicle($vehicle_id);
    include('add_tire.php');


} else if($action == 'add_tire') {
    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id');
    $tire_id = filter_input(INPUT_POST, 'tire_id', FILTER_VALIDATE_INT);
    $position = filter_input(INPUT_POST, 'position');
    $size = filter_input(INPUT_POST, 'size');
    $name = filter_input(INPUT_POST, 'name');
    $date = filter_input(INPUT_POST, 'date');
    $number_of_repairs = filter_input(INPUT_POST, 'number_of_repairs');

    $taken_positions = check_tire_positions($position, $vehicle_id);
    // echo $position;
    // echo $vehicle_id;
    
    echo $taken_positions[6];
    print_r($taken_positions);

    if ($taken_positions[1] === $position && $taken_positions[6] === $vehicle_id) {
        $error = "Invalid Entry. Tire Position already taken.";
        include('../errors/error.php');

    } else {
        if ($position == 'FL' || $position == 'FR' || $position == 'RL' || $position == 'RR' ||
        $position == 'S' || $position == 'F' || $position == 'R') {
            add_tire ($vehicle_id, $position, $size, $name, $date, $number_of_repairs);
            $vehicle = get_vehicle($vehicle_id);
            $tires = get_tires($vehicle_id);
            // echo $taken_positions[6];
            include ('vehicle_info.php');

        } else {
                    $error = "Invalid Entry. Not a valid Tire position.";
                    include('../errors/error.php');
        }
    }

} else if ($action == 'logout') {
    header("Location: ..");
}





?>