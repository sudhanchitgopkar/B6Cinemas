<?php

// connect to database
require_once('../database.php');

$login_user = filter_input(INPUT_POST, 'login_user_id');
$login_pass = filter_input(INPUT_POST, 'login_password');

try {
    $query = 'SELECT email, password_ FROM user WHERE email=:_email';

    $statement = $db->prepare($query);
    $statement->bindValue(':_email', $login_user);
    $statement->execute();
    $info = $statement->fetch();

    if(password_verify($login_pass, $info['password_'])) {
        // TODO start session with session variables for current logged in user HERE!!
        header("Location: ../../index.html");
    } else {
        // Notify User their username/password was incorrect
	    header("Location: ../../view/loginAndReg/login.php");
    }

} catch(PDOException $e) {
    echo 'Error!';
    echo $e;
}

?>