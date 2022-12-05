<?php
    require_once('../../controller/database.php');
    $conn = DBConnect::makeConnector();
    $conn->connect();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Tab Logo-->
    <link rel="icon" href="../images/WhiteB6.png" type="image/icon type">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="login.css">
    <title>B6 Cinemas</title>
</head>

<body>
    <div id="navBar">
        <nav class="navbar navbar-expand-lg sticky-top navbar-light ">
            <a class="navbar-brand" href="../../index.php">
                <img src="../images/B6 Cinema (2).png" width="70" height="70" class="d-inline-block align-center" alt="B6 Cinemas logo">
               </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"> 
                    </li>
                    
                </ul>
            </div>
        </nav>  
    </div>

    <div class="card">
        <img src="../images/popcornIcon.png" class = "icon"></img>
        <h3 class = "loginText">Sign in to B6</h3>
         <form class="loginForm" id="sign-in" action="../../model/loginAndReg/loginUser.php" method="post">
            <label for="user_id">👤</label> 
            <input class = "formField" name="login_user_id" id="login_user_id" type="text" placeholder="Username"></input>
            <br>
            <label for="password">🔐</label>
            <input class = "formField" name = "login_password" id="login_password" type="password" placeholder="Password"></input>
            <br>
            <button class = "formField" id = "btn" href = "loginConfirmation.html">login</button>
            <p class = "auxtext">New to B6? <a href="register.php"><b>Create an account.</b></a>
            <br>Forgot password? <a href="pwdReset.html"> <b>Reset it here.</a></b><br>
                <input type="checkbox" id="remember" name="remember" value="true">
                <label for="promotions">Remember Me</label><br>
            </p>    
        </form>
    </div>
   
  </body>
</html>