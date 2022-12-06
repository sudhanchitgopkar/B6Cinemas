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

$payment_card = filter_input(INPUT_POST, 'savedCards');

try {
    $r = filter_input(INPUT_POST, 'saveCardCheck');

    if($payment_card == -1 && filter_input(INPUT_POST, 'saveCardCheck') !== null) {
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

        $query_ = 'SELECT * FROM payment_card ORDER BY card_id DESC';
        $statement = $db->prepare($query_);
        $statement->execute();

        $info = $statement->fetchAll();
        $payment_card = $info[0]['card_id'];
    }

    // create Booking
    $queryBooking = 'INSERT INTO
    booking (customer_id, show_id, total, payment_id, promo_id)
    VALUES
    (:_customer_id, :_show_id, :_total, :_payment_id, :_promo_id)';

    $statementB = $db->prepare($queryBooking);
    $statementB->bindValue(":_customer_id", $_SESSION['userID']);
    $statementB->bindValue(":_show_id", $_SESSION['showID']);
    $statementB->bindValue(":_total", $_SESSION['orderTotal']);
    $statementB->bindValue(":_payment_id", $payment_card);
    if($_SESSION['promoApplied'] !== null) {
        $statementB->bindValue(":_promo_id", $_SESSION['promoApplied']);
    } else {
        $statementB->bindValue(":_promo_id", -1);
    }

    $statementB->execute();

    header("Location: ../../view/orderConfirmation/orderConfirmation.php");

} catch(PDOException $e) {
    echo 'Error!';
    echo $e;
}

?>