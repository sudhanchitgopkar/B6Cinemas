<?php

// connect to database
require_once('../database.php');

// Setting variables for the contents of the form
$first_name = filter_input(INPUT_POST, 'firstName');
$last_name = filter_input(INPUT_POST, 'lastName');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$promotionStatus = filter_input(INPUT_POST, 'promotions');
$status = filter_input(INPUT_POST, 'status');

$address_street = filter_input(INPUT_POST, 'addressStreet');
$address_city = filter_input(INPUT_POST, 'addressCity');
$address_state = filter_input(INPUT_POST, 'addressState');
$address_zip = filter_input(INPUT_POST, 'addressZip');
$address = $address_street . ' ' . $address_city . ' ' . $address_state . ' ' . $address_zip;

try {

    // Querying the database
    $query = 'INSERT INTO user
        (first_name, last_name, phone, email, password_, promotion_opt_status, status_, type_, address_)
        VALUES 
        (:_first_name, :_last_name, :_phone, :_email, :_password_, :_promotion_opt_status, :_status_, :_type_, :_address_)';
    $statement = $db->prepare($query);
    $statement->bindValue(':_first_name', $first_name);
    $statement->bindValue(':_last_name', $last_name);
    $statement->bindValue(':_phone', $phone);
    $statement->bindValue(':_email', $email);
    $statement->bindValue(':_password_', password_hash($password, PASSWORD_DEFAULT));
    $statement->bindValue(':_status_', 1);
    $statement->bindValue(':_type_', 1);
    $statement->bindValue(':_address_', $address);
    $statement->bindValue(':_promotion_opt_status', isset($promotionStatus));

    $statement->execute();
    $statement->closeCursor();

    // Redirecting to the sign_in page
    header("Location: ../../view/loginAndReg/login.php");

} catch(PDOException $e) {
    echo 'Error!';
    echo $e;
}

?>