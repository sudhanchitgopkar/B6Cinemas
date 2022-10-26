<?php  
    require("../database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Tab Logo-->
    <link rel="icon" href="../../images/WhiteB6.png" type="image/icon type">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="login.css">
    <script src="registerCollapsible.js"></script>
    <title>B6 Cinemas</title>
</head>

<body>
    <div id="navBar">
        <nav class="navbar navbar-expand-lg sticky-top navbar-light ">
            <a class="navbar-brand" href="#">
                <img src="../../images/B6 Cinema (2).png" width="70" height="70" class="d-inline-block align-center" alt="B6 Cinemas logo">
               </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <button>
                            <a class="nav-link" href="#">Login</a>
                        </button>
                    </li>
                    
                </ul>
            </div>
        </nav>  
    </div>

    <div class="card" id = "register">
        <img src="../../images/popcornIcon.png" class = "icon"></img>
        <h3 class = "loginText">Welcome to B6</h3>
         <form class="loginForm" action="../../php/loginAndReg/registerUser.php" method="post">
            <hr>
            <label for="firstName">👤</label> 
            <input class = "formField" name = "firstName" id="firstName" type="text" placeholder="First Name*"/>
            <br>
            <label for="lastName">👤</label> 
            <input class = "formField" name = "lastName" id="lastName" type="text" placeholder="Last Name*"/>
            <br>
            <label for="phone">📞</label>
            <input class = "formField" name = "phone" id="phone" type="text" placeholder="Phone Number*"/>
            <br>
            <label for="email">📧</label>
            <input class = "formField" name = "email" id="email" type="text" placeholder="Email*"/>
            <br>
            <label for="password">🔐</label>
            <input class = "formField" name = "password" id="password" type="password" placeholder="Password*"/>
            <br>
            <hr>
            <button type="button" class="optional">Home Address (Optional)</button>
            <div class = "optionalContent">
                <label for="address">📍</label>
                <input class = "formField" name = "addressStreet" id="addressStreet" type="text" placeholder="Street Name"/>
                <input class = "formField" name = "addressCity" id="addressCity" type="text" placeholder="City (e.g. Athens)"/>
                <br>
                <input class = "formField" name = "addressState" id="addressState" type="text" placeholder="State"/>
                <input class = "formField" name = "addressZip" id="addressZip type="text" placeholder="Zip"/>
             </div>
             <br>
             <hr>
             <button type="button" class="optional">Card #1 (Optional)</button>
             <div class = "optionalContent">
                <label for="creditCard">💳</label>
                <input class = "formField" name = "creditCard1_name" type="text" placeholder="Full name"/>
                <input class = "formField" name = "creditCard1_date" type="text" placeholder="Expiration Date"/>
                <br>
                <input class = "formField" name = "creditCard1_number" type="password" placeholder="Card Number"/>
                <input class = "formField" name = "creditCard1_cvv" type="password" placeholder="CVV"/>
             </div>
             <br>
             <button type="button" class="optional">Card #2 (Optional)</button>
             <div class = "optionalContent">
                <label for="creditCard">💳</label>
                <input class = "formField" name = "creditCard2_name" type="text" placeholder="Full name"/>
                <input class = "formField" name = "creditCard2_date" type="text" placeholder="Expiration Date"/>
                <br>
                <input class = "formField" name = "creditCard2_number" type="password" placeholder="Card Number"/>
                <input class = "formField" name = "creditCard2_cvv" type="password" placeholder="CVV"/>
             </div>
             <br>
             <button type="button" class="optional">Card #3 (Optional)</button>
             <div class = "optionalContent">
                <label for="creditCard">💳</label>
                <input class = "formField" name = "creditCard3_name" type="text" placeholder="Full name"/>
                <input class = "formField" name = "creditCard3_date" type="text" placeholder="Expiration Date"/>
                <br>
                <input class = "formField" name = "creditCard3_number" type="password" placeholder="Card Number"/>
                <input class = "formField" name = "creditCard3_cvv" type="password" placeholder="CVV"/>
             </div>
             <hr>
             <div class="submit" id="promotions">
                <input type="checkbox" id="promotions" name="promotions" value="true">
                <label for="promotions">Sign up for promotional emails</label><br>
             </div>
             <br>
            <hr>
            <button class = "submit" id = "btn" href = "loginConfirmation.html">Register</button>
            <p class = "auxtext">Have an account? <a href="login.html"><b>Sign in.</b></a>
        </form>
    </div>
   

    <script>
        var coll = document.getElementsByClassName("optional");
        var i;
        
        for (i = 0; i < coll.length; i++) {
          coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
              content.style.display = "none";
            } else {
              content.style.display = "block";
            }
          });
        }
        </script>
  </body>
</html>