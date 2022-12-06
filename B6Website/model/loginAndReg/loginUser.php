<?php

    session_start();

    // connect to database
    require_once('../database.php');
    $conn = DBConnect::makeConnector();
    $conn->connect();

    $login_user = filter_input(INPUT_POST, 'login_user_id');
    $login_pass = filter_input(INPUT_POST, 'login_password');
    $remember = filter_input(INPUT_POST, 'remember');


    try {
        $query = 'SELECT email, password_, status_, type_, user_id FROM user WHERE email=:_email';

        $statement = $db->prepare($query);
        $statement->bindValue(':_email', $login_user);
        $statement->execute();
        $info = $statement->fetch();

        // if user is inactive, don't allow login
        if($info['status_'] == 1) {
            header("Location: ../../view/loginAndReg/login.php");
        } else if(password_verify($login_pass, $info['password_'])) {

            // start session with session variables for current logged in user
            $_SESSION['loggedin'] = true;
            $_SESSION['userID'] = $info['user_id'];
            $_SESSION['userType'] = $info['type_'];

            if($info['type_'] == 2) {
                header("location: ../../view/adminPortal/adminIndex.html");
            } else {
                header("Location: ../../index.php");
            }

        } else {
            // Notify User their username/password was incorrect
            header("Location: ../../view/loginAndReg/login.php?showMessage=true");
        }

    } catch(PDOException $e) {
        echo 'Error!';
        echo $e;
    }

?>