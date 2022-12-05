<?php
// connect to database
require_once('../../controller/database.php');
$conn = DBConnect::makeConnector();
$conn->connect();

session_start();

$card_name = filter_input(INPUT_POST, 'creditCardName');
$card_date = filter_input(INPUT_POST, 'expirationDate');
$card_number = filter_input(INPUT_POST, 'creditCardNumber');
$card_address = filter_input(INPUT_POST, 'billingAddress');
$card_cvv = filter_input(INPUT_POST, 'cvv');

try {
    $r = filter_input(INPUT_POST, 'saveCardCheck');

    if(filter_input(INPUT_POST, 'saveCardCheck') !== null) {
        $query_ = 'INSERT INTO
        payment_card (owner_id, card_number, card_last_four, card_address, card_expiration, card_name)
        VALUES
        (:_owner_id, :_card_number, :_card_last_four, :_card_address, :_card_expiration, :_card_name)';

        $statementcc = $db->prepare($query_);
        $statementcc->bindValue(':_owner_id', $_SESSION['userID']);
        $statementcc->bindValue(':_card_number', password_hash($card_number, PASSWORD_DEFAULT));
        $statementcc->bindValue(':_card_last_four', substr($card_number, -4));
        $statementcc->bindValue(':_card_address', password_hash($card_address, PASSWORD_DEFAULT));
        $statementcc->bindValue(':_card_expiration', password_hash($card_date, PASSWORD_DEFAULT));
        $statementcc->bindValue(':_card_name', password_hash($card_name, PASSWORD_DEFAULT));

        $statementcc->execute();
    }

    header("Location: ../../view/orderConfirmation/orderConfirmation.php");

} catch(PDOException $e) {
    echo 'Error!';
    echo $e;
}

?>