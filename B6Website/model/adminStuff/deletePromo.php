<?php
// connect to database
require_once('../../controller/database.php');
$conn = DBConnect::makeConnector();
$conn->connect();

try {
    $promoID = $_GET["id"];

    // Querying the database
    $query = 'DELETE FROM promotion WHERE promotion_id = :_promotion_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':_promotion_id', $promoID);
    $statement->execute();
    $statement->closeCursor();

    // Redirecting to the promotions page
    header("Location: ../../view/adminPortal/managePromotions.php");

} catch(PDOException $e) {
    echo 'Error!';
    echo $e;
}

?>