<?php

// The beginning of the session
session_start();

// Setting variables for the contents of the form
$first_name = filter_input(INPUT_POST, 'firstName');
$last_name = filter_input(INPUT_POST, 'lastName');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$promotionStatus = filter_input(INPUT_POST, 'promotionStatus');
$status = filter_input(INPUT_POST, 'status');
$type = filter_input(INPUT_POST, 'type');
$address = filter_input(INPUT_POST, 'address');

// validating input
if ($firstName == null || $lastName == null || $email == null || $password == null ) {
    $error = "Invalid product data. Check all fields and try
    again.";
} else {

    require_once('database.php');

    // Querying the database
    $query = 'INSERT INTO user
                 (firstName, lastName, phone, email, password, promotionStatus, status, type, address)
              VALUES
                 (:first_name, :last_name, :email, :password, :promotion_opt_status, :status, :type, :address)';

    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $firstName);
    $statement->bindValue(':last_name', $lastName);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':promotion_opt_status', $promotionStatus);
    $statement->bindValue(':status', $status);
    $statement->bindValue(':type', 1);
    $statement->bindValue(':address', $address);
    
    $statement->execute();
    $statement->closeCursor();


}

// Redirecting to the sign_in page
header("Location: sign_in.php")

?>