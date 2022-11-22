<?php
// connect to database

require('../../../email.php');
require_once('../database.php');

    $promoID = $_GET["id"];
    $query = "SELECT promotion_id, start_, end_, promotion_key, promotion_amount FROM promotion
                WHERE promotion_id = :_promotion_id";
    $statement = $db->prepare($query);
    $statement->bindValue(":_promotion_id",$promoID);
    $statement->execute();
    $info = $statement->fetch();

    $emailBody = 
        "B6 Cinemas is running a new promotion from " . $info["start_"] .
        " till " . $info["end_"] . ". To get " . $info["promotion_amount"] .
        "% off your next ticket, use code " . $info["promotion_key"] . "!";

    $getUsers = "SELECT * FROM user";
    $userStatement = $db->prepare($getUsers);
    $userStatement->execute();

    while($row = $userStatement->fetch(PDO::FETCH_ASSOC)) {
        if($row["promotion_opt_status"] == 1) {
            sendEmail($row["email"],"New B6",$emailBody);
        }
    }

    $updatePromoSent = "UPDATE promotion SET sent_status = 1 WHERE promotion_id = :_promotion_id";
    $sentStatusStatement = $db->prepare($updatePromoSent);
    $sentStatusStatement->bindValue(":_promotion_id", $promoID);
    $sentStatusStatement->execute();

    header("Location: ../../view/adminPortal/managePromotions.php");
?>