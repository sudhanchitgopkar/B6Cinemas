<?php
    // connect to database
    require_once('../database.php');
    require('../../../email.php');
    
    $login_email = filter_input(INPUT_POST, 'login_email');

    try {
        $query = 'SELECT email FROM user WHERE email=:_email';

        $statement = $db->prepare($query);
        $statement->bindValue(':_email', $login_email);
        $statement->execute();
        $info = $statement->fetch();
        if ($info !== null) {
        $newPass = randomPass();
        $emailBody = "Hello B6Cinemas user,<br>We've recieved a password reset request for your account. Your new password is: <b> $newPass <b>.<br> If you did not send this reset request, please ignore this email.<br>Thanks, The Team at B6.";
        sendEmail($login_email, "Your New B6Cinemas Password", $emailBody);
        
        $updatePass = 'UPDATE user SET password_=:_pwd WHERE email=:_email';
        $statement = $db->prepare($updatePass);
        $statement->bindValue(':_email', $login_email);
        $statement->bindValue(':_pwd', password_hash($newPass, PASSWORD_DEFAULT));
        $statement->execute();
        header("Location: ../../view/loginAndReg/resetEmailSent.html");
        } //if
        
    } catch(PDOException $e) {
        echo 'Reset Exception!';
        echo $e;
    }

    function randomPass() {
        $alph = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pwd = array(); 
        $alphLen = strlen($alph) - 1;
        for ($i = 0; $i < 8; $i++) {
            $pwd[] = $alph[rand(0, $alphLen)];
        }
        return implode($pwd);
    } //randomPass
?>

