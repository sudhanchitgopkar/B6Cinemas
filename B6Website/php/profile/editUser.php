<?php
    require_once("../database.php");

    // The beginning of the session
    session_start();

    // Setting variables for the contents of the form
    $first_name = filter_input(INPUT_POST, 'firstName');
    $last_name = filter_input(INPUT_POST, 'lastName');
    $phone = filter_input(INPUT_POST, 'phone');
    $password = filter_input(INPUT_POST, 'password');
    $newPassword = filter_input(INPUT_POST, 'newPassword');
    $promotionStatus = filter_input(INPUT_POST, 'promotionStatus');
    
    $address_street = filter_input(INPUT_POST, 'addressStreet');
    $address_city = filter_input(INPUT_POST, 'addressCity');
    $address_state = filter_input(INPUT_POST, 'addressState');
    $address_zip = filter_input(INPUT_POST, 'addressZip');
    $address = $address_street . ' ' . $address_city . ' ' . $address_state . ' ' . $address_zip;


        // Querying the database
        $query = 'UPDATE user SET first_name=:first_name WHERE user_id=:user_id';                    

        //, last_name=:last_name, phone=:phone, address_=:address_, promotion_opt_status=:promotion_opt_status

        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $_SESSION['userID']);
        $statement->bindValue(':first_name', "ttttt");
        // $statement->bindValue(':last_name', $last_name);
        // $statement->bindValue(':phone', $phone);
        // //$statement->bindValue(':password_', $password);
        // $statement->bindValue(':promotion_opt_status', $promotionStatus);
        // $statement->bindValue(':address_', $address);
        
        $statement->execute();
        $statement->closeCursor();
    

    // Redirecting to the sign_in page
    header("Location: ../../view/profile/editProfile.php")

?>