<?php
    session_start();
    require_once('../../controller/database.php');
    $conn = DBConnect::makeConnector();
    $conn->connect();

    $promoEntered = $_POST['entered_code'];

    try {
        $query = 'SELECT * FROM promotion WHERE promotion_key=:_promotion_key';

        $statement = $db->prepare($query);
        $statement->bindValue(':_promotion_key', $promoEntered);
        $statement->execute();

        $discount = 0;
        if ($info = $statement->fetch(PDO::FETCH_ASSOC)) {
            $discount = $info['promotion_amount'];
            $_SESSION["promoApplied"]=true;
        }

        header("Location: ../../view/orderConfirmation/confirmOrderPage.php?id=".$discount);
       
    } catch(PDOException $e) {
        echo 'Error!';
        echo $e;
    }
?>