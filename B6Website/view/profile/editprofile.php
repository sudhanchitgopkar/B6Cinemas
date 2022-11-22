<?php
    require_once('../../controller/database.php');

    // The beginning of the session
    session_start();

    if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) 
    {
        header("Location: ../loginAndReg/login.php");
    }
    
    // Querys for matching sign-in info
    $query = 'SELECT * FROM user WHERE user_id=:user_id';
        
    $queryStatement = $db->prepare($query);
     
    $queryStatement->bindValue(':user_id', $_SESSION['userID']);
            
    $queryStatement->execute();
    $user = $queryStatement->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/WhiteB6.png" type="image/icon type">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="editprofile.css">
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg sticky-top navbar-light ">
            <a class="navbar-brand" href="../../index.php">
                <img src="../images/B6 Cinema (2).png" width="70" height="70" class="d-inline-block align-center" alt="B6 Cinemas logo">
               </a>
            
            <div class="nav-text navbar-nav navbar-center">
                Profile
            </div>
        </nav>   
    </div>

    <div class="main">
        <form class="personalInfo flexMe" action="../../model/profile/editUser.php" method="post">
           <h1>Personal Information</h1>
            <p>Click contents to edit</p>
            <div class="innerPersonalInfo">
                <div>
                <p><b>First Name: </b>  </p>
                <input name="firstName" id="firstName" contenteditable="true" placeholder="First Name" value=<?php echo $user['first_name'] ?>></input>
                <br>
                <p><b>Last Name: </b>  </p>
                <input name="lastName" id="lastName" contenteditable="true" placeholder="Last Name" value=<?php echo $user['last_name'] ?>></input>
                <br>
                <p><b>Email:</b></p>
                    <p><?php echo $user['email'] ?></p>
                <br>
                <p><b>Phone Number:</b></p>
                <input name="phone" id="phone" contenteditable="true" placeholder="Phone" value=<?php echo $user['phone'] ?>></input>
                <br>
                <p><b>Current Password:</b>   </p>
                <input name="password" id="password" contenteditable="true"></input>
                <br>
                <p><b>New Password:</b>   </p>
                <input name="newPassword" id="newPassword" contenteditable="true"></input>
                <br>

                <!--Optional Info-->
                <p><b>Home Address:</b></p><br>
                <p><b><?php echo $user['address_']?></b></p>
                <div class="addressInfo">
                    <p>Street:</p>
                    <input name="address_street" id="address_street"  contenteditable="true"></input>
                    <br>
                    <p>City:</p>
                    <input name="address_city" id="address_city"  contenteditable="true"></input>
                    <br>
                    <p>State: </p>
                    <input name="address_state" id="address_state"  contenteditable="true"></input>
                    <br>
                    <p>Zipcode:</p>
                    <input name="address_zip" id="address_zip"  contenteditable="true"></input>
                </div>
                <br>
                <div id="personalInfo">
                    <input type="checkbox" id="promotionStatus" name="promotionStatus" <?php echo ($user['promotion_opt_status'] == 1) ? 'checked="checked"' : ''; ?>></input>
                    <label for="promotionStatus">Recieve promotional emails</label>
                </div>
            </div>
            <button class="Btn">Update Personal Information</button>
            </div>
        </form>

        <div class="orders flexMe">
            <h1>Past Orders</h1>
        </div>

        <div class="paymentInfo flexMe">
            <h1>Saved Credit Cards</h1>
            <p>Click contents to edit</p>
            <div class="innerPaymentInfo">
                <div class="creditcard">
                    <h3>Card 1</h3>
                    <div class="innerCard">
                        <p><b>Card Type:</b></p>
                        <div id="edit"  contenteditable="true">
                            Credit
                        </div>
                        <br>
                        <p><b>Card Number:</b></p>
                        <div id="edit"  contenteditable="true">
                            1223 4576 1234
                        </div>
                        <br>
                        <p><b>Expiration Date:</b></p>
                        <div id="edit"  contenteditable="true">
                            12/22
                        </div>
                        <br>
                        <p><b>Billing Address</b></p>
                        <div class="billingInfo">
                            <p>Street:</p>
                        <div id="edit"  contenteditable="true">
                            123 Apple St
                        </div>
                        <br>
                        <p>City:</p>
                        <div id="edit"  contenteditable="true">
                            Athens
                        </div>
                        <br>
                        <p>State: </p>
                        <div id="edit"  contenteditable="true">
                            Georgia
                        </div>
                        <br>
                        <p>Zipcode:</p>
                        <div id="edit"  contenteditable="true">
                            12345
                        </div>
                    </div>
                    <br>
                </div>
                <br>
                <div class="creditcard">
                    <h3>Card 2</h3>
                    <div class="innerCard">
                        <p><b>Card Type:</b></p>
                        <div id="edit"  contenteditable="true">
                            Credit
                        </div>
                        <br>
                        <p><b>Card Number:</b></p>
                        <div id="edit"  contenteditable="true">
                            1223 4576 1234
                        </div>
                        <br>
                        <p><b>Expiration Date:</b></p>
                        <div id="edit"  contenteditable="true">
                            12/22
                        </div>
                        <br>
                        <p><b>Billing Address</b></p>
                        <div class="billingInfo">
                            <p>Street:</p>
                        <div id="edit"  contenteditable="true">
                            123 Apple St
                        </div>
                        <br>
                        <p>City:</p>
                        <div id="edit"  contenteditable="true">
                            Athens
                        </div>
                        <br>
                        <p>State: </p>
                        <div id="edit"  contenteditable="true">
                            Georgia
                        </div>
                        <br>
                        <p>Zipcode:</p>
                        <div id="edit"  contenteditable="true">
                            12345
                        </div>
                    </div>
                    <br>
                </div>
                </div>
                <br>
                <div class="creditcard">
                    <h3>Card 3</h3>
                    <div class="innerCard">
                        <p><b>Card Type:</b></p>
                        <div id="edit"  contenteditable="true">
                            xxx
                        </div>
                        <br>
                        <p><b>Card Number:</b></p>
                        <div id="edit"  contenteditable="true">
                            xxx
                        </div>
                        <br>
                        <p><b>Expiration Date:</b></p>
                        <div id="edit"  contenteditable="true">
                            xxx
                        </div>
                        <br>
                        <p><b>Billing Address</b></p>
                        <div class="billingInfo">
                            <p>Street:</p>
                        <div id="edit"  contenteditable="true">
                            xxx
                        </div>
                        <br>
                        <p>City:</p>
                        <div id="edit"  contenteditable="true">
                            xxx
                        </div>
                        <br>
                        <p>State: </p>
                        <div id="edit"  contenteditable="true">
                            xxx
                        </div>
                        <br>
                        <p>Zipcode:</p>
                        <div id="edit"  contenteditable="true">
                            xxx
                        </div>
                    </div>
                    <br>
                </div>
                </div>
                <button class="Btn">Update Information</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>