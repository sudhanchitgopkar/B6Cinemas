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

$card_1_name = filter_input(INPUT_POST, 'creditCard1_name');
$card_1_date = filter_input(INPUT_POST, 'creditCard1_date');
$card_1_number = filter_input(INPUT_POST, 'creditCard1_number');
$card_1_address = filter_input(INPUT_POST, 'creditCard1_address');
$card_1_cvv = filter_input(INPUT_POST, 'creditCard1_cvv');

$card_2_name = filter_input(INPUT_POST, 'creditCard2_name');
$card_2_date = filter_input(INPUT_POST, 'creditCard2_date');
$card_2_number = filter_input(INPUT_POST, 'creditCard2_number');
$card_2_address = filter_input(INPUT_POST, 'creditCard2_address');
$card_2_cvv = filter_input(INPUT_POST, 'creditCard2_cvv');

$card_3_name = filter_input(INPUT_POST, 'creditCard3_name');
$card_3_date = filter_input(INPUT_POST, 'creditCard3_date');
$card_3_number = filter_input(INPUT_POST, 'creditCard3_number');
$card_3_address = filter_input(INPUT_POST, 'creditCard3_address');
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

    $queryS = 'SELECT user_id FROM user WHERE email=:_email';

    $statementS = $db->prepare($queryS);
    $statementS->bindValue(':_email', $email);
    $statementS->execute();
    $infoS = $statementS->fetch();

    $query_ = 'INSERT INTO
        payment_card (owner_id, card_number, card_last_four, card_address, card_expiration, card_name)
        VALUES
        (:_owner_id, :_card_number, :_card_last_four, :_card_address, :_card_expiration, :_card_name)';

    if('' !== $card_1_name) {
        $statement1 = $db->prepare($query_);
        $statement1->bindValue(':_owner_id', $infoS['user_id']);
        $statement1->bindValue(':_card_number', password_hash($card_1_number, PASSWORD_DEFAULT));
        $statement1->bindValue(':_card_last_four', substr($card_1_number, -4));
        $statement1->bindValue(':_card_address', password_hash($card_1_address, PASSWORD_DEFAULT));
        $statement1->bindValue(':_card_expiration', password_hash($card_1_date, PASSWORD_DEFAULT));
        $statement1->bindValue(':_card_name', password_hash($card_1_name, PASSWORD_DEFAULT));

        $statement1->execute();
    }

    if('' !== $card_2_name) {
        $statement2 = $db->prepare($query_);
        $statement2->bindValue(':_owner_id', $infoS['user_id']);
        $statement2->bindValue(':_card_number', password_hash($card_2_number, PASSWORD_DEFAULT));
        $statement2->bindValue(':_card_last_four', substr($card_2_number, -4));
        $statement2->bindValue(':_card_address', password_hash($card_2_address, PASSWORD_DEFAULT));
        $statement2->bindValue(':_card_expiration', password_hash($card_2_date, PASSWORD_DEFAULT));
        $statement2->bindValue(':_card_name', password_hash($card_2_name, PASSWORD_DEFAULT));

        $statement2->execute();
    }

    if('' !== $card_3_name) {
        $statement3 = $db->prepare($query_);
        $statement3->bindValue(':_owner_id', $infoS['user_id']);
        $statement3->bindValue(':_card_number', password_hash($card_3_number, PASSWORD_DEFAULT));
        $statement3->bindValue(':_card_last_four', substr($card_3_number, -4));
        $statement3->bindValue(':_card_address', password_hash($card_3_address, PASSWORD_DEFAULT));
        $statement3->bindValue(':_card_expiration', password_hash($card_3_date, PASSWORD_DEFAULT));
        $statement3->bindValue(':_card_name', password_hash($card_3_name, PASSWORD_DEFAULT));

        $statement3->execute();
    }

    // Redirecting to the sign_in page
    header("Location: ../../view/loginAndReg/login.php");

} catch(PDOException $e) {
    echo 'Error!';
    echo $e;
}

?>