<?php

// The beginning of the session
session_start();

// Setting variables for the contents of the form
$user_id = filter_input(INPUT_POST, 'userID')
$first_name = filter_input(INPUT_POST, 'firstName');
$last_name = filter_input(INPUT_POST, 'lastName');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$newPassword = filter_input(INPUT_POST, 'newPassword');
$promotionStatus = filter_input(INPUT_POST, 'promotionStatus');
$status = filter_input(INPUT_POST, 'status');
$type = filter_input(INPUT_POST, 'type');
$address = filter_input(INPUT_POST, 'address');

// validating input
if ($firstName == null || $lastName == null || $email == null || $password == null ) {
    $error = "Invalid product data. Check all fields and try
    again.";
} 
else {

    require_once('database.php');

    // Querying the database
    $query = 'UPDATE user SET first_name=firstName WHERE user_id=userID';
    $query = 'UPDATE user SET last_name=lastName WHERE user_id=userID';
    $query = 'UPDATE user SET phone=phone WHERE user_id=userID';
    $query = 'UPDATE user SET email=email WHERE user_id=userID';

    //need to check password against user input before changing to new password
    $query = 'SELECT password FROM user WHERE user_id=user_id';

    $query = 'UPDATE user SET password=newPassword WHERE user_id=userID';
    $query = 'UPDATE user SET promotion_opt_status=promotionStatus WHERE user_id=userID';
    $query = 'UPDATE user SET status=status WHERE user_id=userID';
    $query = 'UPDATE user SET type=type WHERE user_id=userID';
    $query = 'UPDATE user SET address=address WHERE user_id=userID';
                

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