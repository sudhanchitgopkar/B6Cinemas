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
    
    $address_street = filter_input(INPUT_POST, 'address_street');
    $address_city = filter_input(INPUT_POST, 'address_city');
    $address_state = filter_input(INPUT_POST, 'address_state');
    $address_zip = filter_input(INPUT_POST, 'address_zip');
    $address = $address_street . ' ' . $address_city . ' ' . $address_state . ' ' . $address_zip;


        // Querying the database
        $query = 'UPDATE user SET first_name=:first_name, last_name=:last_name, phone=:phone, address_=:address_, promotion_opt_status=:promotion_opt_status WHERE user_id=:user_id';                    

        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $_SESSION['userID']);
        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->bindValue(':phone', $phone);

        if (isset($promotionStatus)) {
            $statement->bindValue(':promotion_opt_status', 1);
        } else {
            $statement->bindValue(':promotion_opt_status', 0);
        }
        $statement->bindValue(':address_', $address);
        
        $statement->execute();
        $statement->closeCursor();


        $query2 = 'SELECT password_ FROM user WHERE user_id=:user_id';
        $statement2 = $db->prepare($query2);
        $statement2->bindValue(':user_id', $_SESSION['userID']);
        $statement2->execute();
        $info = $statement2->fetch();

        if(password_verify($password, $info['password_'])) {
            $query3 = 'UPDATE user SET password_=:password_ WHERE user_id=:user_id';

            $statement3 = $db->prepare($query3);
            $statement3->bindValue(':password_', password_hash($newPassword, PASSWORD_DEFAULT));
            $statement3->bindValue(':user_id', $_SESSION['userID']);
            $statement3->execute();
            $statement3->closeCursor();
        }

    // Redirecting to the sign_in page
    header("Location: ../../view/profile/editProfile.php")

?>


