<?php
// connect to database
require_once('../database.php');

// Setting variables for the contents of the form
$code = filter_input(INPUT_POST, 'code');
$amount = filter_input(INPUT_POST, 'amount');
$startDate = filter_input(INPUT_POST, 'start');
$endDate = filter_input(INPUT_POST, 'end');

try {
    // Querying the database
    $query = 'INSERT INTO promotion
        (start_, end_, promotion_key, promotion_amount, sent_status))
        VALUES 
        (:_start, :_end, :_promotion_key, :_promotion_amount, :_sent_status)';
    $statement = $db->prepare($query);
    $statement->bindValue(':_start', $startDate);
    $statement->bindValue(':_end', $endDate);
    $statement->bindValue(':_promotion_key', $code);
    $statement->bindValue(':_promotion_amount', $amount);
    $statement->bindValue(':_sent_status', 0);



    $statement->execute();
    $statement->closeCursor();

    // Redirecting to the sign_in page
    header("Location: ../../view/adminPortal/managePromotions.php");

} catch(PDOException $e) {
    echo 'Error!';
    echo $e;
}

?>