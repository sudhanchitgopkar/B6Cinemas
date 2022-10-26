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
$address_state = filter_input(INPUT_POST, 'addressState');
$address_country = filter_input(INPUT_POST, 'addressCountry');
$address = $address_street . ' ' . $address_state . ' ' . $address_country;

$card_1_name = filter_input(INPUT_POST, 'creditCard1_name');
$card_1_date = filter_input(INPUT_POST, 'creditCard1_date');
$card_1_number = filter_input(INPUT_POST, 'creditCard1_number');
$card_1_cvv = filter_input(INPUT_POST, 'creditCard1_cvv');

$card_2_name = filter_input(INPUT_POST, 'creditCard2_name');
$card_2_date = filter_input(INPUT_POST, 'creditCard2_date');
$card_2_number = filter_input(INPUT_POST, 'creditCard2_number');
$card_2_cvv = filter_input(INPUT_POST, 'creditCard2_cvv');

$card_3_name = filter_input(INPUT_POST, 'creditCard3_name');
$card_3_date = filter_input(INPUT_POST, 'creditCard3_date');
$card_3_number = filter_input(INPUT_POST, 'creditCard3_number');
$card_3_cvv = filter_input(INPUT_POST, 'creditCard3_cvv');

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

    $query_ = 'INSERT INTO payment_card
           (first_name, last_name, phone, email, password_, promotion_opt_status, status_, type_, address_)
           VALUES
           (:_first_name, :_last_name, :_phone, :_email, :_password_, :_promotion_opt_status, :_status_, :_type_, :_address_)';

    if(isset($card_1_name) && isset($card_1_date) && isset($card_1_cvv) && isset($card_1_number)) {

    }
    if(isset($card_2_name) && isset($card_2_date) && isset($card_2_cvv) && isset($card_2_number)) {

    }
    if(isset($card_3_name) && isset($card_3_date) && isset($card_3_cvv) && isset($card_3_number)) {

    }

    // Redirecting to the sign_in page
    header("Location: ../../view/loginAndReg/login.php");

} catch(PDOException $e) {
    echo 'Error!';
    echo $e;
}

?>