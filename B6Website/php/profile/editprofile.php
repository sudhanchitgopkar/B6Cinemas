<?php  
    require("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="WhiteB6.png" type="image/icon type">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="editprofile.css">
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg sticky-top navbar-light ">
            <a class="navbar-brand" href="index.html">
                <img src="B6 Cinema (2).png" width="70" height="70" class="d-inline-block align-center" alt="B6 Cinemas logo">
               </a>
            
            <div class="nav-text navbar-nav navbar-center">
                Profile
            </div>
        </nav>   
    </div>

    <div class="main">
        <div class="personalInfo flexMe">
           <h1>Personal Information</h1>
            <p>Click contents to edit</p>
            <div class="innerPersonalInfo">
                <div>
                <p><b>Name: </b>  </p>
                <div id="edit" contenteditable="true">
                    John Smith
                </div>
                <br>
                <p><b>Email:</b></p>
                <p>johnsmith@gmail.com</p> 
                <br>
                <p><b>Phone Number:</b></p>
                <div id="edit" contenteditable="true">
                    123-456-7890
                </div>
                <br>
                <p><b>Change Password:</b>   </p>
                <div id="password" contenteditable="true">
                    password
                </div>
                <br>
                <p><b>Re-enter Password to change:</b>   </p>
                <div id="confirmPassword" contenteditable="true">
                    password
                </div>
                <br>

                <!--Optional Info-->
                <p><b>Home Address</b></p>
                <div class="addressInfo">
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
                <div id="personalInfo">
                    <input type="checkbox" id="promotions">
                    <label for="promotions">Recieve promotional emails</label>
                </div>
            </div>
            <button class="Btn">Update Personal Information</button>
            </div>
        </div>

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