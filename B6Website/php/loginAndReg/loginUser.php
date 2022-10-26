<?php

    session_start();

    // connect to database
    require_once('../database.php');

    $login_user = filter_input(INPUT_POST, 'login_user_id');
    $login_pass = filter_input(INPUT_POST, 'login_password');

    try {
        $query = 'SELECT email, password_, status_, type_, user_id FROM user WHERE email=:_email';

        $statement = $db->prepare($query);
        $statement->bindValue(':_email', $login_user);
        $statement->execute();
        $info = $statement->fetch();

        // if user is inactive, don't allow login
        if($info['status_'] == 1) {
            echo '<script>alert("You must activate your account before you can login.")</script>';
        } else if(password_verify($login_pass, $info['password_'])) {
            // TODO start session with session variables for current logged in user
            $_SESSION['loggedin'] = true;
            $_SESSION['userID'] = $info['user_id'];
            $_SESSION['userType'] = $info['type_'];

            if($info['type_'] == 2) {
                header("location: ../../view/adminPortal/manageAccounts.html");
            } else {
                header("Location: ../../index.php");
            }

        } else {
            // Notify User their username/password was incorrect
            echo '<script>alert("Your password is incorrect.")</script>';
            header("Location: ../../view/loginAndReg/login.php");
        }

    } catch(PDOException $e) {
        echo 'Error!';
        echo $e;
    }

?>