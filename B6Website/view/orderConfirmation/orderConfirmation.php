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
    <link rel="stylesheet" href="orderConfirmation.css">
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

    <div class = "confMsg">
        <h1> You're all set! </h1>
        <?php
            $query = "SELECT * FROM user WHERE user_id=:_user_id";
            $statement = $db->prepare($query);
            $statement->bindValue(":_user_id", $_SESSION['userID']);
            $statement->execute();
            $info = $statement->fetch(PDO::FETCH_ASSOC);


            $user = $info['first_name'];
            $email =$info['email']; 

            $query2 = "SELECT * FROM booking ORDER BY booking_id DESC";
            $statement2 = $db->prepare($query2);
            $statement2->execute();
            $info2 = $statement2->fetchAll(PDO::FETCH_ASSOC);

            $confNum = $info2[0]['booking_id'];
           
            echo "<p> Thanks for your order, " . $user . ".</p>";
            echo "<p>Your confirmation number is " . $confNum . ", and we've sent you an email confirmation.</p>";
        ?>
        <button class = "formField" id = "btn" href = "../../index.php">Keep Browsing</button>
    </div>
   
  </body>
</html>